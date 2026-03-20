<?php

namespace App\controllers;
use App\services\RoleService;
use App\core\Request;
use App\core\Response;

class RoleController {
    private $service;

    public function __construct() {
        $this->service = new RoleService();
    }

    public function create() {
        $data = Request::body();
        $this->service->create($data);
        Response::json(["result" => "Role created successfuly"], 201);
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
        Response::json(["result" => "Role updated successfuly"]);
    }

    public function delete($id) {
        $this->service->delete($id);
        Response::json(["result" => "Role deleted successfuly"]);
    }

    public function setPermission($id) {
        $data = Request::body();
        $this->service->setPermission($id, $data);
        Response::json(["result" => "Permission asigned to role successfuly"]);
    }

    public function getPermissions($id) {
        $permissions = $this->service->getPermissions($id);
        Response::json($permissions);
    }

    public function setUser($id) {
        $data = Request::body();
        $this->service->setUser($id, $data);
        Response::json(["result" => "Role asigned to user successfuly"]);
    }

    public function getUsers($id) {
        $users = $this->service->getusers($id);
        Response::json($users);
    }
}





