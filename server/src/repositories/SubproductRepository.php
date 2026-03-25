<?php

namespace App\repositories;
use App\Config\Database;
use \PDO;

class SubproductRepository {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($id, $data) {
        $query = "INSERT INTO subproduct
                    (product_id, feature, cover, price, remaining_amount)
                    VALUES
                    (:product_id, :feature, :cover, :price, :remaining_amount)";

        $stmt = $this->db->prepare($query);

        //$stmt->bindParam(":product_id", $data["product_id"], PDO::PARAM_INT);
        $stmt->bindParam(":product_id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":feature", $data["feature"], PDO::PARAM_STR);
        $stmt->bindParam(":cover", $data["cover"], PDO::PARAM_STR);
        $stmt->bindParam(":price", $data["price"], PDO::PARAM_STR);
        $stmt->bindParam(":remaining_amount", $data["remaining_amount"], PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM subproduct";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM subproduct
                    WHERE subproduct_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE subproduct 
                    SET 
                        product_id= :product_id, 
                        feature = :feature, 
                        cover =:cover, 
                        price = :price, 
                        remaining_amount = :remaining_amount
                    WHERE subproduct_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":product_id", $data["product_id"], PDO::PARAM_INT);
        $stmt->bindParam(":feature", $data["feature"], PDO::PARAM_STR);
        $stmt->bindParam(":cover", $data["cover"], PDO::PARAM_STR);
        $stmt->bindParam(":price", $data["price"], PDO::PARAM_STR);
        $stmt->bindParam(":remaining_amount", $data["remaining_amount"], PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM subproduct
                    WHERE subproduct_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getProduct($id) {
        $query = "SELECT 
                    p.product_id, 
                    p.name, 
                    p.description, 
                    p.cover, 
                    p.price, 
                    p.remaining_amount, 
                    p.created_at, 
                    p.updated_at 
                        FROM product p
                        LEFT JOIN subproduct s
                        ON p.product_id = s.product_id
                        WHERE s.subproduct_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}