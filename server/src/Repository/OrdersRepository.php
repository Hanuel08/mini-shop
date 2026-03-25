<?php

namespace App\Repository;
use App\Config\Database;
use \PDO;

use App\controllers\UserController;

class OrdersRepository {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO orders
                    (user_id, address_id, total, status)
                    VALUES
                    (:user_id, :address_id, :total, :status)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_INT);
        $stmt->bindParam(":address_id", $data["address_id"], PDO::PARAM_INT);
        $stmt->bindParam(":total", $data["total"], PDO::PARAM_STR);
        $stmt->bindParam(":status", $data["status"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM orders";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM orders
                        WHERE order_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE orders 
                    SET 
                        user_id = :user_id, 
                        address_id = :address_id,
                        total = :total,
                        status = :status
                    WHERE order_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_INT);
        $stmt->bindParam(":address_id", $data["address_id"], PDO::PARAM_INT);
        $stmt->bindParam(":total", $data["total"], PDO::PARAM_STR);
        $stmt->bindParam(":status", $data["status"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM orders
                    WHERE order_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getUser($id) {
        $query = "SELECT 
                    u.user_id, 
                    u.language_id, 
                    u.name, 
                    u.last_name, 
                    u.username, 
                    u.password, 
                    u.phone, 
                    u.email, 
                    u.created_at, 
                    u.updated_at
                        FROM user u
                        INNER JOIN orders o
                        ON o.user_id = u.user_id 
                        WHERE o.order_id = :id";


        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function setSubproduct($id, $data) {
        $query = "INSERT INTO subproduct_x_order 
                    (subproduct_id, order_id, total, amount, unit_price) 
                    VALUES 
                    (:subproduct_id, :id, :total, :amount, :unit_price)";


        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":subproduct_id", $data["subproduct_id"], PDO::PARAM_INT);
        $stmt->bindParam(":total", $data["total"], PDO::PARAM_STR);
        $stmt->bindParam(":amount", $data["amount"], PDO::PARAM_INT);
        $stmt->bindParam(":unit_price", $data["unit_price"], PDO::PARAM_STR);

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
                    sxo.total, 
                    sxo.amount, 
                    sxo.unit_price
                        FROM subproduct_x_order sxo
                        INNER JOIN orders o
                        ON o.order_id = sxo.order_id
                        INNER JOIN subproduct s
                        ON s.subproduct_id = sxo.subproduct_id
                        WHERE sxo.order_id = :id";


        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateSubproduct($idOrder, $idSubproduct, $data) {
        $query = "UPDATE subproduct_x_order 
                    SET 
                        subproduct_id = :subproduct_id, 
                        total = :total, 
                        amount = :amount, 
                        unit_price = :unit_price
	                WHERE order_id = :idOrder AND subproduct_id = :idSubproduct";


        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":idOrder", $idOrder, PDO::PARAM_INT);
        $stmt->bindParam(":idSubproduct", $idSubproduct, PDO::PARAM_INT);
        $stmt->bindParam(":subproduct_id", $data["subproduct_id"], PDO::PARAM_INT);
        $stmt->bindParam(":total", $data["total"], PDO::PARAM_STR);
        $stmt->bindParam(":amount", $data["amount"], PDO::PARAM_INT);
        $stmt->bindParam(":unit_price", $data["unit_price"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function removeSubproduct($idOrder, $idSubproduct) {
        $query = "DELETE FROM subproduct_x_order
	                WHERE order_id = :idOrder AND subproduct_id = :idSubproduct";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":idOrder", $idOrder, PDO::PARAM_INT);
        $stmt->bindParam(":idSubproduct", $idSubproduct, PDO::PARAM_INT);
        return $stmt->execute();
    }
}