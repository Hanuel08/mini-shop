<?php 

namespace App\Service;
use App\Repository\FavoriteRepository;
use Exception;

class FavoriteService {
    private $repository;

    public function __construct() {
        $this->repository = new FavoriteRepository();
    }

    public function create($data) {
        return $this->repository->create($data);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getById($id) {
        if (!$id) {
            throw new Exception("Invalid favorite id");
        }
        return $this->repository->getById($id);
    }

    public function delete($id) {
        if (!$id) {
            throw new Exception("Invalid favorite id");
        }
        return $this->repository->delete($id);
    }

    public function setProduct($id, $data) {
        if (!$id) {
            throw new Exception("Invalid favorite id");
        }
        return $this->repository->setProduct($id, $data);
    }

    public function getProducts($id) {
        if (!$id) {
            throw new Exception("Invalid favorite id");
        }
        return $this->repository->getProducts($id);
    }

    public function removeProduct($idFavorite, $idProduct) {
        if (!$idFavorite) {
            throw new Exception("Invalid ids");
        }
        if (!$idProduct) {
            throw new Exception("Invalid ids");
        }
        return $this->repository->removeProduct($idFavorite, $idProduct);
    }
}