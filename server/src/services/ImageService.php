<?php 

namespace App\services;
use App\repositories\ImageRepository;
use Exception;

class ImageService {
    private $repository;

    public function __construct() {
        $this->repository = new ImageRepository();
    }

    public function create($data) {
        return $this->repository->create($data);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getById($id) {
        if (!$id) {
            throw new Exception("Invalid image id");
        }
        return $this->repository->getById($id);
    }

    public function update($id, $data) {
        if (!$id) {
            throw new Exception("Invalid image id");
        }
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        if (!$id) {
            throw new Exception("Invalid image id");
        }
        return $this->repository->delete($id);
    }

    public function setProduct($id, $data) {
        if (!$id) {
            throw new Exception("Invalid image id");
        }
        return $this->repository->setProduct($id, $data);
    }

    public function getProducts($id) {
        if (!$id) {
            throw new Exception("Invalid image id");
        }
        return $this->repository->getProducts($id);
    }

    public function removeProduct($idImage, $idProduct) {
        if (!$idImage) {
            throw new Exception("Invalid ids");
        }
        if (!$idProduct) {
            throw new Exception("Invalid ids");
        }
        return $this->repository->removeProduct($idImage, $idProduct);
    }
}