<?php

namespace App\repositories;
use App\Config\Database;
use \PDO;

class RoleRepository {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO role 
                    (role, description)
                    VALUES 
                    (:role, :description)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":role", $data["role"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM role";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM role
                        WHERE role_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE role 
                    SET 
                        role = :role, 
                        description = :description
                    WHERE role_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":role", $data["role"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM role
                    WHERE role_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function setPermission($id, $data) {
        $query = "INSERT INTO permission_x_role
                    (permission_id, role_id)
                    VALUES
                    (:permission_id, :id)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":permission_id", $data["permission_id"], PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    public function getPermissions($id) {
        $query = "SELECT 
                    p.permission_id, 
                    p.permission, 
                    p.description, 
                    p.created_at, 
                    p.updated_at 
                        FROM permission p
                        INNER JOIN permission_x_role pxr
                        ON p.permission_id = pxr.permission_id
                        INNER JOIN role r
                        ON pxr.role_id = r.role_id
                    WHERE r.role_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function setUser($id, $data) {
        $query = "INSERT INTO role_x_user 
                    (role_id, user_id)
                    VALUES 
                    (:id, :user_id)";

        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getUsers($id) {
        $query = "SELECT 
                    u.user_id, 
                    u.language_id, 
                    u.name, 
                    u.last_name, 
                    u.password, 
                    u.phone, u.email, 
                    u.created_at, 
                    u.updated_at 
                        FROM user u
                        INNER JOIN role_x_user rxu
                        ON rxu.user_id = u.user_id
                        INNER JOIN role r
                        ON r.role_id = rxu.role_id
                    WHERE r.role_id = :id";

        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}