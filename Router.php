<?php


class Router
{
    private $routes = [];

    public function addRoute($method, $path, $callback)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback
        ];
    }

    public function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Извлекаем путь без GET параметров
        $queryParams = $_GET; // Получаем все GET параметры

        foreach ($this->routes as $route) {
            if ($route['method'] == $requestMethod && $route['path'] == $requestUri) {
                call_user_func($route['callback'], $queryParams); // Передаем GET параметры в функцию обработчик
            return;
        }
    }
        http_response_code(404);
        echo "error";
    }

    
}
