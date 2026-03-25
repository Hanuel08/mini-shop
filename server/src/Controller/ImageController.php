<?php

namespace App\Controller;
use App\Service\ImageService;
use App\Core\Request;
use App\Core\Response;

class ImageController {
    private $service;

    public function __construct() {
        $this->service = new ImageService();
    }

    public function create() {
        $data = Request::body();
        $this->service->create($data);
        Response::json(["result" => "Image created successfuly"], 201);
    }

    public function getAll() {
        $images = $this->service->getAll();
        Response::json($images);
    }

    public function getById($id) {
        $image = $this->service->getById($id);
        Response::json($image);
    }

    public function update($id) {
        $data = Request::body();
        $this->service->update($id, $data);
        Response::json(["result" => "Image updated successfuly"]);
    }

    public function delete($id) {
        $this->service->delete($id);
        Response::json(["result" => "Image deleted successfuly"]);
    }

    public function getProducts($id) {
        $products = $this->service->getProducts($id);
        Response::json($products);
    }

    public function setProduct($id) {
        $data = Request::body();
        $this->service->setProduct($id, $data);
        Response::json(["result" => "Product added to image successfuly"], 201);
    }

    public function removeProduct($idImage, $idProduct) {
        $this->service->removeProduct($idImage, $idProduct);
        Response::json(["result" => "Product removed from image successfuly"]);
    }
}