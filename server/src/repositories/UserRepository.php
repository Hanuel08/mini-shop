<?php

namespace App\repositories;
use App\config\Database;
use \PDO;

class UserRepository {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO user
                    (language_id, name, last_name, username, password, phone, email)
                    VALUES
                    (:language_id, :name, :last_name, :username, :password, :phone, :email)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":language_id", $data["language_id"], PDO::PARAM_INT);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":last_name", $data["last_name"], PDO::PARAM_STR);
        $stmt->bindParam(":username", $data["username"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);

        return $stmt->execute();
    }


    public function getAll() {
        $query = "SELECT *
                    FROM user";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM user
                        WHERE user_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE user 
                    SET 
                        language_id = :language_id, 
                        name = :name, 
                        last_name = :last_name, 
                        username = :username, 
                        password = :password,
                        phone = :phone, 
                        email = :email
                    WHERE user_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":language_id", $data["language_id"], PDO::PARAM_INT);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":last_name", $data["last_name"], PDO::PARAM_STR);
        $stmt->bindParam(":username", $data["username"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM user
                    WHERE user_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getLanguage($id) {
        $query = "SELECT l.language_id, l.name, l.code 
                    FROM language l
                    LEFT JOIN user u
                    ON l.language_id = u.language_id
                    WHERE u.user_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getReviews($id) {
        $query = "SELECT 
                    r.review_id, 
                    r.user_id, 
                    r.product_id, 
                    r.review, 
                    r.rating, 
                    r.created_at, 
                    r.updated_at 
                        FROM review r
                        LEFT JOIN user u
                        ON u.user_id = r.user_id
                    WHERE r.user_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getRoles($id) {
        $query = "SELECT 
                    r.role_id, 
                    r.role, 
                    r.description, 
                    r.created_at, 
                    r.updated_at 
                        FROM role r
                        INNER JOIN role_x_user rxu
                        ON rxu.role_id = r.role_id
                        INNER JOIN user u
                        ON u.user_id = rxu.user_id
                        WHERE u.user_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getOrders($id) {
        $query = "SELECT 
                    o.order_id, 
                    o.user_id, 
                    o.address_id, 
                    o.total, 
                    o.status, 
                    o.created_at, 
                    o.updated_at
                        FROM orders o
                        INNER JOIN user u
                        ON u.user_id = o.user_id
                        WHERE o.user_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}