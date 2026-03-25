<?php 

namespace App\Service;
use App\Repository\ShopRepository;
use Exception;

class ShopService {
    private $repository;

    public function __construct() {
        $this->repository = new ShopRepository();
    }

    public function create($data) {
        return $this->repository->create($data);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getById($id) {
        if (!$id) {
            throw new Exception("Invalid shop id");
        }
        return $this->repository->getById($id);
    }

    public function update($id, $data) {
        if (!$id) {
            throw new Exception("Invalid shop id");
        }
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        if (!$id) {
            throw new Exception("Invalid shop id");
        }
        return $this->repository->delete($id);
    }

    public function setProduct($id, $data) {
        if (!$id) {
            throw new Exception("Invalid shop id");
        }
        return $this->repository->setProduct($id, $data);
    }

    public function getProducts($id) {
        if (!$id) {
            throw new Exception("Invalid shop id");
        }
        return $this->repository->getProducts($id);
    }

    public function removeProduct($idShop, $idProduct) {
        if (!$idShop) {
            throw new Exception("Invalid shop id");
        }
        if (!$idProduct) {
            throw new Exception("Invalid product id");
        }
        return $this->repository->removeProduct($idShop, $idProduct);
    }

    public function setFollower($id, $data) {
        if (!$id) {
            throw new Exception("Invalid shop id");
        }
        return $this->repository->setFollower($id, $data);
    }

    public function getFollowers($id) {
        if (!$id) {
            throw new Exception("Invalid shop id");
        }
        return $this->repository->getFollowers($id);
    }

    public function removeFollower($idShop, $idUser) {
        if (!$idShop) {
            throw new Exception("Invalid shop id");
        }
        if (!$idUser) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->removeFollower($idShop, $idUser);
    }
}