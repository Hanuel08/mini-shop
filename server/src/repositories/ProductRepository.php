<?php

namespace App\repositories;
use App\config\Database;
use \PDO;

class ProductRepository {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO product
                    (name, description, cover, price, remaining_amount)
                    VALUES
                    (:name, :description, :cover, :price, :remaining_amount)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
        $stmt->bindParam(":cover", $data["cover"], PDO::PARAM_STR);
        $stmt->bindParam(":price", $data["price"], PDO::PARAM_STR);
        $stmt->bindParam(":remaining_amount", $data["remaining_amount"], PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM product";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM product
                    WHERE product_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE product 
                    SET 
                        name = :name, 
                        description = :description, 
                        cover = :cover, 
                        price = :price, 
                        remaining_amount = :remaining_amount
                    WHERE product_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
        $stmt->bindParam(":cover", $data["cover"], PDO::PARAM_STR);
        $stmt->bindParam(":price", $data["price"], PDO::PARAM_STR);
        $stmt->bindParam(":remaining_amount", $data["remaining_amount"], PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM product
                    WHERE product_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
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
                    s.updated_at 
                        FROM subproduct s
                        LEFT JOIN product p
                        ON s.product_id = p.product_id
                        WHERE s.product_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}