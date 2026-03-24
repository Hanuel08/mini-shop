<?php

namespace App\repositories;
use App\config\Database;
use \PDO;

class FavoriteRepository {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO favorite
                    (user_id)
                    VALUES
                    (:user_id)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM favorite";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM favorite
                        WHERE favorite_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function delete($id) {
        $query = "DELETE FROM favorite
                    WHERE favorite_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function setProduct($id, $data) {
        $query = "INSERT INTO favorite_x_product 
                    (favorite_id, product_id) 
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
                        FROM favorite_x_product fxp
                        INNER JOIN product p
                        ON p.product_id = fxp.product_id
                        WHERE fxp.favorite_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function removeProduct($idFavorite, $idProduct) {
        $query = "DELETE FROM favorite_x_product
                    WHERE favorite_id = :idFavorite AND product_id = :idProduct";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":idFavorite", $idFavorite, PDO::PARAM_INT);
        $stmt->bindParam(":idProduct", $idProduct, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
