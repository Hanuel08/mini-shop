<?php

namespace App\Controller;
use App\Service\AddressService;
use App\core\Request;
use App\core\Response;

class AddressController {
    private $service;

    public function __construct() {
        $this->service = new AddressService();
    }

    public function create() {
        $data = Request::body();
        $this->service->create($data);
        Response::json(["result" => "Address created successfuly"], 201);
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
        Response::json(["result" => "Address updated successfuly"]);
    }

    public function delete($id) {
        $this->service->delete($id);
        Response::json(["result" => "Address deleted successfuly"]);
    }
}





