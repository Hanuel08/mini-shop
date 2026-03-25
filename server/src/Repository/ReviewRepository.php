<?php

namespace App\Repository;
use App\Config\Database;
use \PDO;

class ReviewRepository {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO review
                    (user_id, product_id, review, rating)
                    VALUES
                    (:user_id, :product_id, :review, :rating)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_INT);
        $stmt->bindParam(":product_id", $data["product_id"], PDO::PARAM_INT);
        $stmt->bindParam(":review", $data["review"], PDO::PARAM_STR);
        $stmt->bindParam(":rating", $data["rating"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM review";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM review
                        WHERE review_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE review 
                    SET 
                        user_id = :user_id, 
                        product_id = :product_id, 
                        review = :review, 
                        rating = :rating
                    WHERE review_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_INT);
        $stmt->bindParam(":product_id", $data["product_id"], PDO::PARAM_INT);
        $stmt->bindParam(":review", $data["review"], PDO::PARAM_STR);
        $stmt->bindParam(":rating", $data["rating"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM review
                    WHERE review_id = :id";

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
                    u.password, 
                    u.phone, 
                    u.email, 
                    u.created_at, 
                    u.updated_at 
                        FROM user u
                        LEFT JOIN review r
                        ON u.user_id = r.user_id
                        WHERE r.review_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
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
                        LEFT JOIN review r
                        ON p.product_id = r.product_id
                        WHERE r.review_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}