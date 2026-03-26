<?php 

require_once __DIR__ . '../../../vendor/autoload.php';
require_once "../src/utils/passwordHash.php";

use App\Core\Router;
use App\Core\Response;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

set_exception_handler(function ($e) {
    if ($e instanceof BaseException) {
        Response::error(
            $e->getMessage(),
            $e->getStatus(),
            $e->getErrors()
        );
    }

    Response::error("Internal Server Error", 500);
});

set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
});

$router = new Router();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

require_once "../src/routes/routes.php";


$router->resolve();





