<?php 



class PermissionService {
    private $repository;

    public function __construct() {
        $this->repository = new PermissionRepository();
    }

    public function create($data) {
        return $this->repository->create($data);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getByid($id) {
        if (!$id) {
            throw new Exception("Invalid permission id");
        }
        return $this->repository->getById($id);
    }

    public function update($id, $data) {
        if (!$id) {
            throw new Exception("Invalid permission id");
        }
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        if (!$id) {
            throw new Exception("Invalid permission id");
        }
        return $this->repository->delete($id);
    }
}