<?php 

namespace App\Service;
use App\Repository\AddressRepository;

class AddressService {
    private $repository;

    public function __construct() {
        $this->repository = new AddressRepository();
    }

    public function create($data) {
        return $this->repository->create($data);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getById($id) {
        if (!$id) {
            throw new Exception("Invalid address id");
        }
        return $this->repository->getById($id);
    }

    public function update($id, $data) {
        if (!$id) {
            throw new Exception("Invalid address id");
        }
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        if (!$id) {
            throw new Exception("Invalid address id");
        }
        return $this->repository->delete($id);
    }
}