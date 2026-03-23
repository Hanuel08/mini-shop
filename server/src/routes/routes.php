<?php

use App\core\Router;

use App\controllers\LanguageController;
use App\controllers\UserController;
use App\controllers\ProductController;
use App\controllers\SubproductController;
use App\controllers\ReviewController;
use App\controllers\CountryController;
use App\controllers\AddressController;
use App\controllers\PermissionController;
use App\controllers\RoleController;
use App\controllers\OrdersController;
use App\controllers\CartController;


# language
$router->get('/languages', [LanguageController::class, 'getAll']);
$router->get('/languages/{id:\d+}', [LanguageController::class, 'getById']);

$router->post('/languages', [LanguageController::class, 'create']);

$router->put('/languages/{id:\d+}', [LanguageController::class, 'update']);

$router->delete('/languages/{id:\d+}', [LanguageController::class, 'delete']);


# user
$router->get('/users', [UserController::class, 'getAll']);
$router->get('/users/{id:\d+}', [UserController::class, 'getById']);

$router->post('/users', [UserController::class, 'create']);

$router->put('/users/{id:\d+}', [UserController::class, 'update']);

$router->delete('/users/{id:\d+}', [UserController::class, 'delete']);

$router->get('/users/{id:\d+}/language', [UserController::class, 'getLanguage']);

$router->get('/users/{id:\d+}/reviews', [UserController::class, 'getReviews']);

$router->get('/users/{id:\d+}/roles', [UserController::class, 'getRoles']);

$router->get('/users/{id:\d+}/orders', [UserController::class, 'getOrders']);


# product
$router->get('/products', [ProductController::class, 'getAll']);
$router->get('/products/{id:\d+}', [ProductController::class, 'getById']);

$router->post('/products', [ProductController::class, 'create']);

$router->put('/products/{id:\d+}', [ProductController::class, 'update']);

$router->delete('/products/{id:\d+}', [ProductController::class, 'delete']);

$router->get('/products/{id:\d+}/subproducts', [ProductController::class, 'getSubproducts']);


# subproduct 
$router->get('/products/subproducts', [SubproductController::class, 'getAll']);
//$router->get('/products/{id:\d+}/subproducts', [SubproductController::class, 'getAll']);
$router->get('/products/subproducts/{id:\d+}', [SubproductController::class, 'getById']);

$router->post('/products/{id:\d+}/subproducts', [SubproductController::class, 'create']);

$router->put('/products/subproducts/{id:\d+}', [SubproductController::class, 'update']);

$router->delete('/products/subproducts/{id:\d+}', [SubproductController::class, 'delete']);

$router->get('/products/subproducts/{id:\d+}', [SubproductController::class, 'getProduct']);


# review
$router->get('/reviews', [ReviewController::class, 'getAll']);
$router->get('/reviews/{id:\d+}', [ReviewController::class, 'getById']);

$router->post('/reviews', [ReviewController::class, 'create']);

$router->put('/reviews/{id:\d+}', [ReviewController::class, 'update']);

$router->delete('/reviews/{id:\d+}', [ReviewController::class, 'delete']);

$router->get('/reviews/{id:\d+}', [ReviewController::class, 'getUser']);

$router->get('/reviews/{id:\d+}', [ReviewController::class, 'getProduct']);


# country
$router->get('/countries', [CountryController::class, 'getAll']);
$router->get('/countries/{id:\d+}', [CountryController::class, 'getById']);

$router->post('/countries', [CountryController::class, 'create']);

$router->put('/countries/{id:\d+}', [CountryController::class, 'update']);

$router->delete('/countries/{id:\d+}', [CountryController::class, 'delete']);


# address
$router->get('/address', [AddressController::class, 'getAll']);
$router->get('/address/{id:\d+}', [AddressController::class, 'getById']);

$router->post('/address', [AddressController::class, 'create']);

$router->put('/address/{id:\d+}', [AddressController::class, 'update']);

$router->delete('/address/{id:\d+}', [AddressController::class, 'delete']);


# permission
$router->get('/permissions', [PermissionController::class, 'getAll']);
$router->get('/permissions/{id:\d+}', [PermissionController::class, 'getById']);

$router->post('/permissions', [PermissionController::class, 'create']);

$router->put('/permissions/{id:\d+}', [PermissionController::class, 'update']);

$router->delete('/permissions/{id:\d+}', [PermissionController::class, 'delete']);

$router->get('/permissions/{id:\d+}/roles', [PermissionController::class, 'getRoles']);


# role
$router->get('/roles', [RoleController::class, 'getAll']);
$router->get('/roles/{id:\d+}', [RoleController::class, 'getById']);

$router->post('/roles', [RoleController::class, 'create']);

$router->put('/roles/{id:\d+}', [RoleController::class, 'update']);

$router->delete('/roles/{id:\d+}', [RoleController::class, 'delete']);

$router->post('/roles/{id:\d+}/permissions', [RoleController::class, 'setPermission']);

$router->get('/roles/{id:\d+}/permissions', [RoleController::class, 'getPermissions']);

$router->post('/roles/{id:\d+}/users', [RoleController::class, 'setUser']);

$router->get('/roles/{id:\d+}/users', [RoleController::class, 'getUsers']);


# orders
$router->get('/orders', [OrdersController::class, 'getAll']);
$router->get('/orders/{id:\d+}', [OrdersController::class, 'getById']);

$router->post('/orders', [OrdersController::class, 'create']);

$router->put('/orders/{id:\d+}', [OrdersController::class, 'update']);

$router->delete('/orders/{id:\d+}', [OrdersController::class, 'delete']);

$router->get('/orders/{id:\d+}', [OrdersController::class, 'getUser']);

$router->post('/orders/{id:\d+}/subproducts', [OrdersController::class, 'setSubproduct']);

$router->get('/orders/{id:\d+}/subproducts', [OrdersController::class, 'getSubproducts']);

$router->put('/orders/{id:\d+}/subproducts/{id:\d+}', [OrdersController::class, 'updateSubproduct']);

$router->delete('/orders/{id:\d+}/subproducts/{id:\d+}', [OrdersController::class, 'removeSubproduct']);


# cart
$router->get('/carts', [CartController::class, 'getAll']);
$router->get('/carts/{id:\d+}', [CartController::class, 'getById']);

$router->post('/carts', [CartController::class, 'create']);

$router->put('/carts/{id:\d+}', [CartController::class, 'update']);

$router->delete('/carts/{id:\d+}', [CartController::class, 'delete']);

# cart subproducts
$router->get('/carts/{id:\d+}/subproducts', [CartController::class, 'getSubproducts']);
$router->post('/carts/{id:\d+}/subproducts', [CartController::class, 'setSubproduct']);

$router->put('/carts/{id:\d+}/subproducts/{subId:\d+}', [CartController::class, 'updateSubproduct']);

$router->delete('/carts/{id:\d+}/subproducts/{subId:\d+}', [CartController::class, 'removeSubproduct']);






