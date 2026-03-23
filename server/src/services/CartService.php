<?php 

namespace App\services;
use App\repositories\CartRepository;
use Exception;

class CartService {
    private $repository;

    public function __construct() {
        $this->repository = new CartRepository();
    }

    public function create($data) {
        $data["total"] = $data["unit_price"] * $data["amount"];
        return $this->repository->create($data);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getById($id) {
        if (!$id) {
            throw new Exception("Invalid cart id");
        }
        return $this->repository->getById($id);
    }

    public function update($id, $data) {
        if (!$id) {
            throw new Exception("Invalid cart id");
        }
        $data["total"] = $data["unit_price"] * $data["amount"];

        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        if (!$id) {
            throw new Exception("Invalid cart id");
        }
        return $this->repository->delete($id);
    }

    public function setSubproduct($id, $data) {
        if (!$id) {
            throw new Exception("Invalid cart id");
        }
        $data["total"] = $data["unit_price"] * $data["amount"];
        
        return $this->repository->setSubproduct($id, $data);
    }

    public function getSubproducts($id) {
        if (!$id) {
            throw new Exception("Invalid cart id");
        }
        return $this->repository->getSubproducts($id);
    }

    public function updateSubproduct($idCart, $idSubproduct, $data) {
        if (!$idCart) {
            throw new Exception("Invalid cart id");
        }
        if (!$idSubproduct) {
            throw new Exception("Invalid subproduct id");
        }

        $data["total"] = $data["unit_price"] * $data["amount"];

        return $this->repository->updateSubproduct($idCart, $idSubproduct, $data);
    }

    public function removeSubproduct($idCart, $idSubproduct) {
        if (!$idCart) {
            throw new Exception("Invalid cart id");
        }
        if (!$idSubproduct) {
            throw new Exception("Invalid subproduct id");
        }
        return $this->repository->removeSubproduct($idCart, $idSubproduct);
    }
}