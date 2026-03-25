<?php 

namespace App\Service;
use App\Repository\LanguageRepository;

class LanguageService {
    private $repository;

    public function __construct() {
        $this->repository = new LanguageRepository();
    }

    public function create($data) {
        return $this->repository->create($data);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getById($id) {
        if (!$id) {
            throw new Exception("Invalid language id");
        }
        return $this->repository->getById($id);
    }

    public function update($id, $data) {
        if (!$id) {
            throw new Exception("Invalid language id");
        }
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        if (!$id) {
            throw new Exception("Invalid language id");
        }
        return $this->repository->delete($id);
    }
}