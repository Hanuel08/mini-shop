<?php 



class ReviewService {
    private $repository;

    public function __construct() {
        $this->repository = new ReviewRepository();
    }

    public function create($data) {
        return $this->repository->create($data);
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function getByid($id) {
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->getById($id);
    }

    public function update($id, $data) {
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->update($id, $data);
    }

    public function delete($id) {
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->delete($id);
    }

    public function getUser($id) {
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->getUser($id);
    }

    public function getProduct($id) {
        if (!$id) {
            throw new Exception("Invalid user id");
        }
        return $this->repository->getProduct($id);
    }
}