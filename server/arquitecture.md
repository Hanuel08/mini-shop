
# Arquitecture


Request
   ↓
Router
   ↓
Controller
   ↓
Service
   ↓
Repository
   ↓
Database




Router → decide qué endpoint se ejecuta

Controller → recibe request y responde

Service → lógica de negocio

Repository → consultas SQL

Database → conexión PDO





simple-shop-api
│
├── public
│   └── index.php
│
├── src
│
│   ├── config
│   │   └── Database.php
│
│   ├── core
│   │   ├── Router.php
│   │   ├── Request.php
│   │   └── Response.php
│
│   ├── controllers
│   │   ├── UserController.php
│   │   └── ProductController.php
│
│   ├── services
│   │   ├── UserService.php
│   │   └── ProductService.php
│
│   ├── repositories
│   │   ├── UserRepository.php
│   │   └── ProductRepository.php
│
│   └── routes
│       └── api.php






src
│
├── config
│   └── Database.php
│
├── core
│   ├── Router.php
│   ├── Request.php
│   ├── Response.php
│   └── Controller.php      ← NUEVO
│
├── controllers
│
├── services
│
├── repositories
│
├── middleware              ← NUEVO
│   ├── AuthMiddleware.php
│   └── RoleMiddleware.php
│
├── utils                   ← NUEVO
│   ├── Validator.php
│   ├── JWT.php
│   └── Helpers.php
│
├── exceptions              ← NUEVO
│   └── ApiException.php
│
└── routes
    └── api.php



200 → OK
201 → creado
204 → eliminado sin contenido
400 → mal request
401 → no autorizado
404 → no encontrado
409 → conflicto (duplicados)
422 → validación
500 → error interno


src/
│
├── Controller/
├── Service/
├── Repository/
├── Core/
├── Config/
└── Routes/





TAREAS

# Agregar try catch en repository y en index.php a $router->resolve();:

try {
    $stmt->execute();
} catch (PDOException $e) {
    throw new HttpException("Database error", 500);
}


# Agregar verificacion de json en ::body en Request:

if (json_last_error() !== JSON_ERROR_NONE) {
    throw new HttpException("Invalid JSON", 400);
}


# Usar Reponse::success en controllers


# Hacer procedures para:

orders
cart → order
pagos


# Agregar middlewares que se usen en controller


# Agregar auth













PDO::PARAM_STR: Utilizado para cadenas de caracteres (strings), textos, fechas y tipos numéricos no enteros. Es el tipo por defecto si no se especifica otro.
PDO::PARAM_INT: Utilizado para valores enteros (integer).
PDO::PARAM_BOOL: Utilizado para valores booleanos (boolean).
PDO::PARAM_NULL: Representa el tipo de dato nulo (NULL).
PDO::PARAM_LOB: Representa un objeto binario grande (Large Object o BLOB), utilizado para archivos o datos binarios, que se envían por paquetes.
PDO::PARAM_INPUT_OUTPUT: Un modificador utilizado con OR a nivel de bits (ej. PDO::PARAM_STR | PDO::PARAM_INPUT_OUTPUT) para procedimientos almacenados que devuelven un valor (INOUT)









/* $query = "
            INSERT INTO product
            (name, description, cover, price, remaining_amount)
            VALUES
            (?, ?, ?, ?, ?)
        ";

        $stmt = $this->db->prepare($query);

        $stmt = bindParam(1, $name);
        $stmt = bindParam(2, $description);
        $stmt = bindParam(3, $cover);
        $stmt = bindParam(4, $price);
        $stmt = bindParam(5, $remaining_amount); */




$stmt = $this->db->prepare(
            "SELECT * FROM product WHERE product_id = :id"
        );

        $stmt->execute([
            "id" => $id
        ]);








        
