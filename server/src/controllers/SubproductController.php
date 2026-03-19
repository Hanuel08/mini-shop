<?php

namespace App\controllers;
use App\services\SubproductService;
use App\core\Request;
use App\core\Response;

class SubproductController {
    private $service;

    public function __construct() {
        $this->service = new SubproductService();
    }

    public function create($id) {
        $data = Request::body();
        $this->service->create($id, $data);
        Response::json(["result" => "Subproduct created successfuly"], 201);
    }

    public function getAll() {
        $subproducts = $this->service->getAll();
        Response::json($subproducts);
    }

    public function getById($id) {
        $subproduct = $this->service->getById($id);
        Response::json($subproduct);
    }

    public function update($id) {
        $data = Request::body();
        $this->service->update($id, $data);
        Response::json(["result" => "Subproduct updated successfuly"]);
    }

    public function delete($id) {
        $this->service->delete($id);
        Response::json(["result" => "Subproduct deleted successfuly"]);
    }

    public function getProduct($id) {
        $product = $this->service->getProduct($id);
        Response::json($product);
    }
}










