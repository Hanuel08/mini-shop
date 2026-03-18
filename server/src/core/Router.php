<?php

class Router {
    private $routes = [];

    public function get($path, $handler) {
        $this->routes['GET'][$path] = $handler;
    }

    public function post($path, $handler) {
        $this->routes['POST'][$path] = $handler;
    }

    public function put($path, $handler) {
        $this->routes['PUT'][$path] = $handler;
    }

    public function delete($path, $handler) {
        $this->routes['DELETE'][$path] = $handler;
    }

    public function resolve() {
        $baseUrl = "/server/public/index.php";
        $method = Request::method();
        $uri = Request::uri();
        $uri = str_replace($baseUrl, "", $uri);

        if ($uri === "") {
            $uri = "/";
        }

        if (!isset($this->routes[$method])) {
            Response::json(["error" => "Route not found"], 404);
        }

        /* echo "uri\n\n";
        var_dump($uri);

        echo "routes\n\n";
        var_dump($this->routes);

        echo "\n\nJSON\n\n";
        //Response::json($this->routes);
        var_dump(json_encode($this->routes)); */



        /* echo "\nforeach\n"; */
        foreach($this->routes[$method] as $route => $handler) {
            /* echo "route\n";
            var_dump($route);
            echo "\n"; */

            // convertir /products/{id} -> /products/([^/]+)
            $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route);

            /* echo "pattern 1\n";
            var_dump($pattern);
            echo "\n"; */

            $pattern = "#^" . $pattern . "$#";

            /* echo "pattern 2\n";
            var_dump($pattern);
            echo "\n"; */


            $pattern = $this->convertRouteToRegex($route);

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);

                [$controller, $function] = $handler;

                if (!class_exists($controller)) {
                    Response::json(["error" => "Controller not found"], 500);
                }

                /* echo "controller\n";
                var_dump($controller);
                echo "\n";

                echo "function\n";
                var_dump($function);
                echo "\n"; */

                $controller = new $controller();

                if (!method_exists($controller, $function)) {
                    Response::json(["error" => "Method not found"], 500);
                }

                /* echo "new controller\n";
                var_dump($controller);
                echo "\n";

                echo "matches\n";
                var_dump($matches);
                echo "\n";

                echo "...matches\n";
                var_dump($matches);
                echo "\n"; */


                $controller->$function(...$matches);
                

                return;
            }
        }
        
        Response::json(["error" => "Route not found"], 404);
    }

    private function convertRouteToRegex($route) {
        $pattern = preg_replace_callback(
            '#\{(\w+)(?::([^}]+))?\}#',
            function ($matches) {
                $regex = $matches[2] ?? '[^/]+';
                return '(' . $regex . ')';
            },
            $route
        );

        return "#^" . $pattern . "$#";
    }
}








