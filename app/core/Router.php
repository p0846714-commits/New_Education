<?php

require_once dirname(__DIR__) . "/controller/authController.php";
require_once dirname(__DIR__) . "/controller/noteController.php";

class Router
{
    public array $routes = [];

    public function __construct()
    {
        $this->routes = [
            '/' => [
                'controller' => 'noteController',
                'action' => 'accueil'
            ],

            '/login' => [
                'controller' => 'authController',
                'action' => 'login'
            ]
        ];
    }

    public function run(): void
    {
        $uri = parse_url(
            $_SERVER['REQUEST_URI'],
            PHP_URL_PATH
        );

        $route = $this->routes[$uri] ?? null;

        if ($route === null) {
            http_response_code(404);
            echo "Page not found";
            return;
        }

        $controllerName = $route['controller'];
        $action = $route['action'];

        $controllerFile =
            dirname(__DIR__) .
            "/controller/" .
            $controllerName .
            ".php";

        if (!file_exists($controllerFile)) {
            http_response_code(404);
            echo "Controller introuvable";
            return;
        }

        require_once $controllerFile;

        if (!class_exists($controllerName)) {
            http_response_code(404);
            echo "Classe Controller introuvable";
            return;
        }

        $controller = new $controllerName();

        if (!method_exists($controller, $action)) {
            http_response_code(404);
            echo "Action introuvable";
            return;
        }

        $controller->$action();
    }
}