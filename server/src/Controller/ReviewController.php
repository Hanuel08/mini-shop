<?php

namespace App\Controller;
use App\Service\ReviewService;
use App\Core\Request;
use App\Core\Response;

class ReviewController {
    private $service;

    public function __construct() {
        $this->service = new ReviewService();
    }

    public function create() {
        $data = Request::body();
        $this->service->create($data);
        Response::json(["result" => "Review created successfuly"], 201);
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
        Response::json(["result" => "Review updated successfuly"]);
    }

    public function delete($id) {
        $this->service->delete($id);
        Response::json(["result" => "Review deleted successfuly"]);
    }
    
    public function getUser($id) {
        $user = $this->service->getUser($id);
        Response::json($user);
    }

    public function getProduct($id) {
        $user = $this->service->getProduct($id);
        Response::json($user);
    }
}





