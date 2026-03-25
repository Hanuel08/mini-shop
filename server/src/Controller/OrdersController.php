<?php

namespace App\Controller;
use App\Service\OrdersService;
use App\core\Request;
use App\core\Response;

class OrdersController {
    private $service;

    public function __construct() {
        $this->service = new OrdersService();
    }

    public function create() {
        $data = Request::body();
        $this->service->create($data);
        Response::json(["result" => "Order created successfuly"], 201);
    }

    public function getAll() {
        $orders = $this->service->getAll();
        Response::json($orders);
    }

    public function getById($id) {
        $order = $this->service->getById($id);
        Response::json($order);
    }

    public function update($id) {
        $data = Request::body();
        $this->service->update($id, $data);
        Response::json(["result" => "Order updated successfuly"]);
    }

    public function delete($id) {
        $this->service->delete($id);
        Response::json(["result" => "Order deleted successfuly"]);
    }

    public function getUser($id) {
        $user = $this->service->getUser($id);
        Response::json($user);
    }

    public function setSubproduct($id) {
        $data = Request::body();
        $this->service->setSubproduct($id, $data);
        Response::json(["result" => "Subproduct asigned to order successfuly"]);
    }

    public function getSubproducts($id) {
        $subproducts = $this->service->getSubproducts($id);
        Response::json($subproducts);
    }

    public function updateSubproduct($idOrder, $idSubproduct) {
        $data = Request::body();
        $this->service->updateSubproduct($idOrder, $idSubproduct, $data);
        Response::json(["result" => "Subproduct details updated successfuly"]);
    }

    public function removeSubproduct($idOrder, $idSubproduct) {
        $this->service->removeSubproduct($idOrder, $idSubproduct);
        Response::json(["result" => "Order subproduct removed successfuly"]);
    }
}