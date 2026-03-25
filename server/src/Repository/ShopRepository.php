<?php

namespace App\Repository;
use App\Config\Database;
use \PDO;

class ShopRepository {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($data) {
        $query = "INSERT INTO shop
                    (name, cover)
                    VALUES
                    (:name, :cover)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":cover", $data["cover"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT *
                    FROM shop";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT *
                    FROM shop
                        WHERE shop_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $query = "UPDATE shop 
                    SET 
                        name = :name,
                        cover = :cover
                    WHERE shop_id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":cover", $data["cover"], PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM shop
                    WHERE shop_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function setProduct($id, $data) {
        $query = "INSERT INTO shop_x_product 
                    (shop_id, product_id) 
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
                        FROM shop_x_product sxp
                        INNER JOIN product p
                        ON p.product_id = sxp.product_id
                        WHERE sxp.shop_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function removeProduct($idShop, $idProduct) {
        $query = "DELETE FROM shop_x_product
                    WHERE shop_id = :idShop AND product_id = :idProduct";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":idShop", $idShop, PDO::PARAM_INT);
        $stmt->bindParam(":idProduct", $idProduct, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function setFollower($id, $data) {
        $query = "INSERT INTO shop_follower 
                    (shop_id, user_id) 
                    VALUES 
                    (:id, :user_id)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getFollowers($id) {
        $query = "SELECT 
                    u.user_id,
                    u.language_id,
                    u.name,
                    u.last_name,
                    u.username,
                    u.password,
                    u.phone,
                    u.email,
                    u.created_at,
                    u.updated_at,
                    sf.followed
                        FROM shop_follower sf
                        INNER JOIN user u
                        ON u.user_id = sf.user_id
                        WHERE sf.shop_id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function removeFollower($idShop, $idUser) {
        $query = "DELETE FROM shop_follower
                    WHERE shop_id = :idShop AND user_id = :idUser";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":idShop", $idShop, PDO::PARAM_INT);
        $stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
        return $stmt->execute();
    }
}