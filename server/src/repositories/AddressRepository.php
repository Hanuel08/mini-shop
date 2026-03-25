<?php

namespace App\repositories;
use App\Config\Database;
use \PDO;

class AddressRepository {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO address
                    (user_id, country_id, city, street, cp)
                    VALUES
                    (:user_id, :country_id, :city, :street, :cp)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_INT);
        $stmt->bindParam(":country_id", $data["country_id"], PDO::PARAM_INT);
        $stmt->bindParam(":city", $data["city"], PDO::PARAM_STR);
        $stmt->bindParam(":street", $data["street"], PDO::PARAM_STR);
        $stmt->bindParam(":cp", $data["cp"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM address";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM address
                        WHERE address_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE address 
                    SET 
                        user_id = :user_id, 
                        country_id = :country_id,
                        city = :city,
                        street = :street,
                        cp = :cp
                    WHERE address_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_INT);
        $stmt->bindParam(":country_id", $data["country_id"], PDO::PARAM_INT);
        $stmt->bindParam(":city", $data["city"], PDO::PARAM_STR);
        $stmt->bindParam(":street", $data["street"], PDO::PARAM_STR);
        $stmt->bindParam(":cp", $data["cp"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM address
                    WHERE address_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}