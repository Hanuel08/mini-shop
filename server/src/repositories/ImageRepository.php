<?php

namespace App\repositories;
use App\config\Database;
use \PDO;

class ImageRepository {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO image
                    (image)
                    VALUES
                    (:image)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM image";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM image
                        WHERE image_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE image 
                    SET 
                        image = :image
                    WHERE image_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM image
                    WHERE image_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function setProduct($id, $data) {
        $query = "INSERT INTO product_x_image 
                    (product_id, image_id) 
                    VALUES 
                    (:product_id, :id)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":product_id", $data["product_id"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

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
                        FROM product_x_image pxi
                        INNER JOIN product p
                        ON p.product_id = pxi.product_id
                        WHERE pxi.image_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function removeProduct($idImage, $idProduct) {
        $query = "DELETE FROM product_x_image
                    WHERE image_id = :idImage AND product_id = :idProduct";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":idImage", $idImage, PDO::PARAM_INT);
        $stmt->bindParam(":idProduct", $idProduct, PDO::PARAM_INT);
        return $stmt->execute();
    }
}