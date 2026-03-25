<?php

namespace App\Controller;
use App\Service\CategoryService;
use App\Core\Request;
use App\Core\Response;

class CategoryController {
    private $service;

    public function __construct() {
        $this->service = new CategoryService();
    }

    public function create() {
        $data = Request::body();
        $this->service->create($data);
        Response::json(["result" => "Category created successfuly"], 201);
    }

    public function getAll() {
        $categories = $this->service->getAll();
        Response::json($categories);
    }

    public function getById($id) {
        $category = $this->service->getById($id);
        Response::json($category);
    }

    public function update($id) {
        $data = Request::body();
        $this->service->update($id, $data);
        Response::json(["result" => "Category updated successfuly"]);
    }

    public function delete($id) {
        $this->service->delete($id);
        Response::json(["result" => "Category deleted successfuly"]);
    }

    public function getProducts($id) {
        $products = $this->service->getProducts($id);
        Response::json($products);
    }

    public function setProduct($id) {
        $data = Request::body();
        $this->service->setProduct($id, $data);
        Response::json(["result" => "Product added to category successfuly"], 201);
    }

    public function removeProduct($idCategory, $idProduct) {
        $this->service->removeProduct($idCategory, $idProduct);
        Response::json(["result" => "Product removed from category successfuly"]);
    }
}