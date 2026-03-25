<?php 

namespace App\Service;
use App\Repository\CategoryRepository;
use Exception;

class CategoryService {
    private $repository;

    public function __construct() {
        $this->repository = new CategoryRepository();
    }

    public function create($data) {
        return $this->repository->create($data);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getById($id) {
        if (!$id) {
            throw new Exception("Invalid category id");
        }
        return $this->repository->getById($id);
    }

    public function update($id, $data) {
        if (!$id) {
            throw new Exception("Invalid category id");
        }
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        if (!$id) {
            throw new Exception("Invalid category id");
        }
        return $this->repository->delete($id);
    }

    public function setProduct($id, $data) {
        if (!$id) {
            throw new Exception("Invalid category id");
        }
        return $this->repository->setProduct($id, $data);
    }

    public function getProducts($id) {
        if (!$id) {
            throw new Exception("Invalid category id");
        }
        return $this->repository->getProducts($id);
    }

    public function removeProduct($idCategory, $idProduct) {
        if (!$idCategory) {
            throw new Exception("Invalid category id");
        }
        if (!$idProduct) {
            throw new Exception("Invalid product id");
        }
        return $this->repository->removeProduct($idCategory, $idProduct);
    }
}