<?php 

class SubproductService {
    private $repository;

    public function __construct() {
        $this->repository = new SubproductRepository();
    }

    public function create($id, $data) {
        return $this->repository->create($id, $data);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getById($id) {
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->getById($id);
    }

    public function update($id, $data) {
        /* echo "ID\n\n";
        var_dump($id);
        echo "DATA\n\n";
        var_dump($data); */
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        return $this->repository->delete($id);
    }

    public function getProduct($id) {
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->getProduct($id);
    }
}