<?php

namespace App\repositories;
use App\config\Database;
use \PDO;

class CartRepository {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO cart
                    (user_id)
                    VALUES
                    (:user_id)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM cart";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM cart
                        WHERE cart_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE cart 
                    SET 
                        user_id = :user_id
                    WHERE cart_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM cart
                    WHERE cart_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function setSubproduct($id, $data) {
        $query = "INSERT INTO cart_x_subproduct 
                    (cart_id, subproduct_id, total, amount, unit_price, selected) 
                    VALUES 
                    (:id, :subproduct_id, :total, :amount, :unit_price, :selected)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":subproduct_id", $data["subproduct_id"], PDO::PARAM_INT);
        $stmt->bindParam(":total", $data["total"], PDO::PARAM_STR);
        $stmt->bindParam(":amount", $data["amount"], PDO::PARAM_INT);
        $stmt->bindParam(":unit_price", $data["unit_price"], PDO::PARAM_STR);
        $stmt->bindParam(":selected", $data["selected"], PDO::PARAM_BOOL);

        return $stmt->execute();
    }

    public function getSubproducts($id) {
        $query = "SELECT 
                    s.subproduct_id, 
                    s.product_id, 
                    s.feature, 
                    s.cover, 
                    s.price, 
                    s.remaining_amount, 
                    s.created_at, 
                    s.updated_at, 
                    cxp.total, 
                    cxp.amount, 
                    cxp.unit_price,
                    cxp.selected
                        FROM cart_x_subproduct cxp
                        INNER JOIN cart c
                        ON c.cart_id = cxp.cart_id
                        INNER JOIN subproduct s
                        ON s.subproduct_id = cxp.subproduct_id
                        WHERE cxp.cart_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateSubproduct($idCart, $idSubproduct, $data) {
        $query = "UPDATE cart_x_subproduct 
                    SET 
                        subproduct_id = :subproduct_id, 
                        total = :total, 
                        amount = :amount, 
                        unit_price = :unit_price,
                        selected = :selected
                    WHERE cart_id = :idCart AND subproduct_id = :idSubproduct";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":idCart", $idCart, PDO::PARAM_INT);
        $stmt->bindParam(":idSubproduct", $idSubproduct, PDO::PARAM_INT);
        $stmt->bindParam(":subproduct_id", $data["subproduct_id"], PDO::PARAM_INT);
        $stmt->bindParam(":total", $data["total"], PDO::PARAM_STR);
        $stmt->bindParam(":amount", $data["amount"], PDO::PARAM_INT);
        $stmt->bindParam(":unit_price", $data["unit_price"], PDO::PARAM_STR);
        $stmt->bindParam(":selected", $data["selected"], PDO::PARAM_BOOL);

        return $stmt->execute();
    }

    public function removeSubproduct($idCart, $idSubproduct) {
        $query = "DELETE FROM cart_x_subproduct
                    WHERE cart_id = :idCart AND subproduct_id = :idSubproduct";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":idCart", $idCart, PDO::PARAM_INT);
        $stmt->bindParam(":idSubproduct", $idSubproduct, PDO::PARAM_INT);
        return $stmt->execute();
    }
}