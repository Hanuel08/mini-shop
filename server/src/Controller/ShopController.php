<?php

namespace App\Controller;
use App\Service\ShopService;
use App\Core\Request;
use App\Core\Response;

class ShopController {
    private $service;

    public function __construct() {
        $this->service = new ShopService();
    }

    public function create() {
        $data = Request::body();
        $this->service->create($data);
        Response::json(["result" => "Shop created successfuly"], 201);
    }

    public function getAll() {
        $shops = $this->service->getAll();
        Response::json($shops);
    }

    public function getById($id) {
        $shop = $this->service->getById($id);
        Response::json($shop);
    }

    public function update($id) {
        $data = Request::body();
        $this->service->update($id, $data);
        Response::json(["result" => "Shop updated successfuly"]);
    }

    public function delete($id) {
        $this->service->delete($id);
        Response::json(["result" => "Shop deleted successfuly"]);
    }

    public function getProducts($id) {
        $products = $this->service->getProducts($id);
        Response::json($products);
    }

    public function setProduct($id) {
        $data = Request::body();
        $this->service->setProduct($id, $data);
        Response::json(["result" => "Product added to shop successfuly"], 201);
    }

    public function removeProduct($idShop, $idProduct) {
        $this->service->removeProduct($idShop, $idProduct);
        Response::json(["result" => "Product removed from shop successfuly"]);
    }

    public function getFollowers($id) {
        $followers = $this->service->getFollowers($id);
        Response::json($followers);
    }

    public function setFollower($id) {
        $data = Request::body();
        $this->service->setFollower($id, $data);
        Response::json(["result" => "Follower added to shop successfuly"], 201);
    }

    public function removeFollower($idShop, $idUser) {
        $this->service->removeFollower($idShop, $idUser);
        Response::json(["result" => "Follower removed from shop successfuly"]);
    }
}