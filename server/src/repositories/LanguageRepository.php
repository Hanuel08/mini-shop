<?php

namespace App\repositories;
use App\config\Database;
use \PDO;

class LanguageRepository {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO language 
                    (name, code)
                    VALUES 
                    (:name, :code)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":code", $data["code"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM language";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT * 
                    FROM language 
                    WHERE language_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE language 
                    SET 
                        name = :name, 
                        code = :code
                    WHERE language_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":code", $data["code"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM language 
                    WHERE language_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}