<?php

namespace App\core;

class Response {
    public static function json($data, $status = 200) {
        http_response_code($status);

        echo json_encode($data); # esto es para pruebas

        return json_encode($data);
        exit;
    }
}