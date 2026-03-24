<?php

namespace App\controllers;
use App\services\FavoriteService;
use App\core\Request;
use App\core\Response;

class FavoriteController {
    private $service;

    public function __construct() {
        $this->service = new FavoriteService();
    }

    public function create() {
        $data = Request::body();
        $this->service->create($data);
        Response::json(["result" => "Favorite created successfuly"], 201);
    }

    public function getAll() {
        $favorites = $this->service->getAll();
        Response::json($favorites);
    }

    public function getById($id) {
        $favorite = $this->service->getById($id);
        Response::json($favorite);
    }

    public function delete($id) {
        $this->service->delete($id);
        Response::json(["result" => "Favorite deleted successfuly"]);
    }

    public function getProducts($id) {
        $products = $this->service->getProducts($id);
        Response::json($products);
    }

    public function setProduct($id) {
        $data = Request::body();
        $this->service->setProduct($id, $data);
        Response::json(["result" => "Product added to favorite successfuly"], 201);
    }

    public function removeProduct($idFavorite, $idProduct) {
        $this->service->removeProduct($idFavorite, $idProduct);
        Response::json(["result" => "Product removed from favorite successfuly"]);
    }
}