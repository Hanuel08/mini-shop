<?php

namespace App\repositories;
use App\config\Database;
use \PDO;

class PermissionRepository {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO permission 
                    (permission, description)
                    VALUES 
                    (:permission, :description)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":permission", $data["permission"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM permission";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM permission
                        WHERE permission_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE permission 
                    SET 
                        permission = :permission, 
                        description = :description
                    WHERE permission_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":permission", $data["permission"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM permission
                    WHERE permission_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}