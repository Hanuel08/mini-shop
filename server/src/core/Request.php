<?php

namespace App\core;

class Request {
    public static function method() {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    public static function uri() {
        //echo "URI\n";
        //var_dump(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public static function body() {
        return json_decode(file_get_contents('php://input'), true);
    }

    public static function query($key) {
        return $_GET[$key] ?? null;
    }
}







