<?php

class Database {
    private static $HOST = "localhost";
    private static $PORT = "3306";
    private static $DATABASE_NAME = "simple_shop";
    private static $USERNAME = "simple_shop";
    private static $PASSWORD = "338thwT2";

    public static function connect() {
        try {
            $dsn = "mysql:host=" . self::$HOST .
                   ";port=" . self::$PORT .
                   ";dbname=" . self::$DATABASE_NAME .
                   ";charset=utf8mb4";


            $connection = new PDO($dsn, self::$USERNAME, self::$PASSWORD);
            
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



/* class Database {
    public static function connect() {
        try {
            $HOST = "localhost";
            $PORT = "3306";
            $DATABASE_NAME = "simple_shop";
            $USERNAME = "simple_shop";
            $PASSWORD = "338thwT2";

            $connection = new PDO("mysql:host={$HOST};port={$PORT};dbname={$DATABASE_NAME}", $USERNAME, $PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $err) {
            die("ERROR to connect to database: ".$err->getMessage());
        }
    }
} */
