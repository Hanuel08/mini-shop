<?php

namespace App\Controller;
use App\Service\CartService;
use App\Core\Request;
use App\Core\Response;

class CartController {
    private $service;

    public function __construct() {
        $this->service = new CartService();
    }

    public function create() {
        $data = Request::body();
        $this->service->create($data);
        Response::json(["result" => "Cart created successfuly"], 201);
    }

    public function getAll() {
        $carts = $this->service->getAll();
        Response::json($carts);
    }

    public function getById($id) {
        $cart = $this->service->getById($id);
        Response::json($cart);
    }

    public function update($id) {
        $data = Request::body();
        $this->service->update($id, $data);
        Response::json(["result" => "Cart updated successfuly"]);
    }

    public function delete($id) {
        $this->service->delete($id);
        Response::json(["result" => "Cart deleted successfuly"]);
    }

    public function getSubproducts($id) {
        $subproducts = $this->service->getSubproducts($id);
        Response::json($subproducts);
    }

    public function setSubproduct($id) {
        $data = Request::body();
        $this->service->setSubproduct($id, $data);
        Response::json(["result" => "Subproduct added to cart successfuly"], 201);
    }

    public function updateSubproduct($idCart, $idSubproduct) {
        $data = Request::body();
        $this->service->updateSubproduct($idCart, $idSubproduct, $data);
        Response::json(["result" => "Subproduct updated successfuly"]);
    }

    public function removeSubproduct($idCart, $idSubproduct) {
        $this->service->removeSubproduct($idCart, $idSubproduct);
        Response::json(["result" => "Subproduct removed successfuly"]);
    }
}