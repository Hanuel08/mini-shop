<?php

namespace App\repositories;
use App\config\Database;
use \PDO;

class CategoryRepository {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO category
                    (name)
                    VALUES
                    (:name)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM category";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM category
                        WHERE category_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE category 
                    SET 
                        name = :name
                    WHERE category_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM category
                    WHERE category_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function setProduct($id, $data) {
        $query = "INSERT INTO category_x_product 
                    (category_id, product_id) 
                    VALUES 
                    (:id, :product_id)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":product_id", $data["product_id"], PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getProducts($id) {
        $query = "SELECT 
                    p.product_id,
                    p.name,
                    p.description,
                    p.price,
                    p.created_at,
                    p.updated_at
                        FROM category_x_product cxp
                        INNER JOIN product p
                        ON p.product_id = cxp.product_id
                        WHERE cxp.category_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function removeProduct($idCategory, $idProduct) {
        $query = "DELETE FROM category_x_product
                    WHERE category_id = :idCategory AND product_id = :idProduct";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":idCategory", $idCategory, PDO::PARAM_INT);
        $stmt->bindParam(":idProduct", $idProduct, PDO::PARAM_INT);
        return $stmt->execute();
    }
}