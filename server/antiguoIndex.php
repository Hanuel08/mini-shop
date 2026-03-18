<?php 

require_once "../src/config/Database.php";

$connection = Database::connect();

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$method;

if (isset($_SERVER['REQUEST_METHOD'])) {
    $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
    echo $_SERVER['REQUEST_METHOD'];
}



$input = json_decode(file_get_contents('php://input'), true);


switch ($method) {
    case 'GET':
        handleGet($connection);
        break;
    case 'POST':
        handlePost($connection);
        break;
}



function handleGet($connection) {
    echo "ESTOY EN GET";
    
    $sql = "SELECT * FROM user";
    //$stmt = $connection->query($sql);

    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function handlePost() {
    echo "ESTOY EN GET";
}


function handlePut() {
    echo "ESTOY EN GET";
}


function handleDelete() {
    echo "ESTOY EN GET";
}
