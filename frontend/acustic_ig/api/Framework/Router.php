<?php

namespace Framework;

use App\Controllers\ErrorController;

class Router {
  protected array $routes = [];

  /**
   * Register new route
   *
   * @param string $uri
   * @param string $httpMethod
   * @param string $action
   * @param array $middleware
   *
   * @return void
   */

  public function registerRoute(string $uri, string $httpMethod, string $action, array $middleware): void {
    // Extract controller and its method from $action, from "UserController@getAll" to ["UserController", "getAll"]

    list($controller, $controllerMethod) = explode("@", $action);

    // Add API URI prefix if the request is not for the /uploads folder

    if (!str_contains($uri, "uploads")) $uri = "/api/v1" . $uri;

    // ["auth" => ["admin", "user"]];

    $this->routes[] = ["method" => $httpMethod, "uri" => $uri, "controller" => $controller, "controllerMethod" => $controllerMethod, "middleware" => $middleware];
  }

  /**
   * Register a new GET route
   *
   * @param string $uri
   * @param string $controller
   * @param array $middleware
   * @return void
   */

  public function get(string $uri, string $controller, array $middleware = []): void {
    $this->registerRoute($uri, "GET", $controller, $middleware);
  }

  /**
   * Register a new POST route
   *
   * @param string $uri
   * @param string $controller
   * @param array $middleware
   *
   * @return void
   */

  public function post(string $uri, string $controller, array $middleware = []): void {
    $this->registerRoute($uri, "POST", $controller, $middleware);
  }

  /**
   * Register a new PATCH route
   *
   * @param string $uri
   * @param string $controller
   * @param array $middleware
   *
   * @return void
   */

  public function patch(string $uri, string $controller, array $middleware = []): void {
    $this->registerRoute($uri, "PATCH", $controller, $middleware);
  }

  /**
   * Register a new DELETE route
   *
   * @param string $uri
   * @param string $controller
   * @param array $middleware
   *
   * @return void
   */

  public function delete(string $uri, string $controller, array $middleware = []): void {
    $this->registerRoute($uri, "DELETE", $controller, $middleware);
  }

  /**
   * Route a request
   *
   * @param string $uri
   *
   * @return void
   */

  public function route(string $uri): void {
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    foreach ($this->routes as $route) {
      $uriSegments = explode("/", trim($uri, "/"));

      $routeSegments = explode("/", trim($route['uri'], "/"));

      if (count($uriSegments) === count($routeSegments) && strcasecmp($route['method'], $requestMethod) === 0) {
        $params = [];

        $match = true;

        for ($i = 0; $i < count($uriSegments); $i++) {
          if ($uriSegments[$i] !== $routeSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
            $match = false;

            break;
          }

          if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
            $params[$matches[1]] = $uriSegments[$i];
          }
        }

        if ($match) {
          // Middleware

          if (!empty($route['middleware'])) {
            $middlewareInstance = new Middleware();

            foreach ($route['middleware'] as $method => $args) {
              $middlewareInstance->$method(...$args);
            }
          }

          // Controllers

          $controller = "App\\Controllers\\{$route["controller"]}";
          $controllerMethod = $route["controllerMethod"];

          $controllerInstance = new $controller;
          $controllerInstance->$controllerMethod($params);

          return;
        }
      }
    }

    ErrorController::notFound();
  }
}