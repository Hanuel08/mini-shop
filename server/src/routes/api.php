<?php



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










