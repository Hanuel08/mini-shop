<?php 

namespace App\services;
use App\repositories\RoleRepository;

class RoleService {
    private $repository;

    public function __construct() {
        $this->repository = new RoleRepository();
    }

    public function create($data) {
        return $this->repository->create($data);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getByid($id) {
        if (!$id) {
            throw new Exception("Invalid role id");
        }
        return $this->repository->getById($id);
    }

    public function update($id, $data) {
        if (!$id) {
            throw new Exception("Invalid role id");
        }
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        if (!$id) {
            throw new Exception("Invalid role id");
        }
        return $this->repository->delete($id);
    }

    public function setPermission($id, $data) {
        if (!$id) {
            throw new Exception("Invalid role id");
        }
        return $this->repository->setPermission($id, $data);
    }

    public function getPermissions($id) {
        if (!$id) {
            throw new Exception("Invalid role id");
        }
        return $this->repository->getPermissions($id);
    }
}