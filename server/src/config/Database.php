<?php

namespace App\config;
use \PDO;

class Database {

    public static function connect() {
        try {
            $dsn = "mysql:host=" . $_ENV["DB_HOST"] .
                   ";port=" . $_ENV["DB_PORT"] .
                   ";dbname=" . $_ENV["DB_NAME"] .
                   ";charset=utf8mb4";


            $connection = new PDO($dsn, $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
            
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            header("Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, DELETE");
            header("Access-Control-Max-Age: 3600");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

            return $connection;
        } catch (PDOException $err) {
            http_response_code(500);

            echo json_encode([
                "error" => "Database connection failed"
            ]);

            exit;
        }
    }
}

