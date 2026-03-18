<?php



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





