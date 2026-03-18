
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








        
