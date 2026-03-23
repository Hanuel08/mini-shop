<?php 

namespace App\services;
use App\repositories\UserRepository;

//require_once "../utils/passwordHash.php";

class UserService {
    private $repository;

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function create($data) {
        $data['password'] = passwordHash($data['password']);

        return $this->repository->create($data);
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
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        $data['password'] = passwordHash($data['password']);
        
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->delete($id);
    }

    public function getLanguage($id) {
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->getLanguage($id);
    }

    public function getReviews($id) {
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->getReviews($id);
    }

    public function getRoles($id) {
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->getRoles($id);
    }

    public function getOrders($id) {
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->getOrders($id);
    }
}