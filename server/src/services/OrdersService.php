<?php 

namespace App\services;
use App\repositories\OrdersRepository;
use Exception;

class OrdersService {
    private $repository;

    public function __construct() {
        $this->repository = new OrdersRepository();
    }

    public function create($data) {
        return $this->repository->create($data);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getByid($id) {
        if (!$id) {
            throw new Exception("Invalid order id");
        }
        return $this->repository->getById($id);
    }

    public function update($id, $data) {
        if (!$id) {
            throw new Exception("Invalid order id");
        }
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        if (!$id) {
            throw new Exception("Invalid order id");
        }
        return $this->repository->delete($id);
    }

    public function getUser($id) {
        if (!$id) {
            throw new Exception("Invalid order id");
        }
        return $this->repository->getUser($id);
    }

    public function setSubproduct($id, $data) {
        if (!$id) {
            throw new Exception("Invalid order id");
        }

        $data["total"] = $data["unit_price"] * $data["amount"];

        return $this->repository->setSubproduct($id, $data);
    }

    public function getSubproducts($id) {
        if (!$id) {
            throw new Exception("Invalid order id");
        }
        return $this->repository->getSubproducts($id);
    }

    public function updateSubproduct($idOrder, $idSubproduct, $data) {
        if (!$idOrder) {
            throw new Exception("Invalid order id");
        }
        if (!$idSubproduct) {
            throw new Exception("Invalid subproduct id");
        }

        $data["total"] = $data["unit_price"] * $data["amount"];

        return $this->repository->updateSubproduct($idOrder, $idSubproduct, $data);
    }

    public function removeSubproduct($idOrder, $idSubproduct) {
        if (!$idOrder) {
            throw new Exception("Invalid order id");
        }
        if (!$idSubproduct) {
            throw new Exception("Invalid subproduct id");
        }
        return $this->repository->removeSubproduct($idOrder, $idSubproduct);
    }
}