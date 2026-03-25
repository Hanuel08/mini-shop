<?php

namespace App\Controller;
use App\Service\UserService;
use App\Core\Request;
use App\Core\Response;

class UserController {
    private $service;

    public function __construct() {
        $this->service = new UserService();
    }

    public function create() {
        $data = Request::body();
        $this->service->create($data);
        Response::json(["result" => "User created successfuly"], 201);
    }

    public function getAll() {
        $users = $this->service->getAll();
        Response::json($users);
    }

    public function getById($id) {
        $user = $this->service->getById($id);
        Response::json($user);
    }

    public function update($id) {
        $data = Request::body();
        $this->service->update($id, $data);
        Response::json(["result" => "User updated successfuly"]);
    }

    public function delete($id) {
        $this->service->delete($id);
        Response::json(["result" => "User deleted successfuly"]);
    }

    public function getLanguage($id) {
        $language = $this->service->getLanguage($id);
        Response::json($language);
    }

    public function getReviews($id) {
        $reviews = $this->service->getReviews($id);
        Response::json($reviews);
    }

    public function getRoles($id) {
        $roles = $this->service->getRoles($id);
        Response::json($roles);
    }

    public function getOrders($id) {
        $roles = $this->service->getOrders($id);
        Response::json($roles);
    }
}





