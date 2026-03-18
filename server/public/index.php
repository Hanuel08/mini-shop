<?php 


require_once "../src/config/Database.php";

require_once "../src/core/Request.php";
require_once "../src/core/Response.php";
require_once "../src/core/Router.php";

require_once "../src/controllers/UserController.php";
require_once "../src/services/UserService.php";
require_once "../src/repositories/UserRepository.php";

require_once "../src/controllers/ProductController.php";
require_once "../src/services/ProductService.php";
require_once "../src/repositories/ProductRepository.php";


require_once "../src/controllers/SubproductController.php";
require_once "../src/services/SubproductService.php";
require_once "../src/repositories/SubproductRepository.php";

require_once "../src/controllers/ReviewController.php";
require_once "../src/services/ReviewService.php";
require_once "../src/repositories/ReviewRepository.php";

require_once "../src/controllers/CountryController.php";
require_once "../src/services/CountryService.php";
require_once "../src/repositories/CountryRepository.php";

require_once "../src/controllers/AddressController.php";
require_once "../src/services/AddressService.php";
require_once "../src/repositories/AddressRepository.php";


require_once "../src/utils/passwordHash.php";


$router = new Router();

require_once "../src/routes/routes.php";

$router->resolve();

