<?php

namespace App\controllers;
use App\services\ProductService;
use App\core\Request;
use App\core\Response;

class ProductController {
    private $service;

    public function __construct() {
        $this->service = new ProductService();
    }

    public function create() {
        $data = Request::body();
        $product = $this->service->create($data);
        Response::json(["result" => "Product created successfuly"], 201);
    }

    public function getAll() {
        $products = $this->service->getAll();
        Response::json($products);
    }

    public function getById($id) {
        $product = $this->service->getById($id);
        Response::json($product);
    }

    public function update($id) {
        $data = Request::body();
        $products = $this->service->update($id, $data);
        Response::json(["result" => "Product updated successfuly"]);
    }

    public function delete($id) {
        $products = $this->service->delete($id);
        Response::json(["result" => "Product deleted successfuly"]);
    }

    public function getSubproducts($id) {
        $subproducts = $this->service->getSubproducts($id);
        Response::json($subproducts);
    }
}










