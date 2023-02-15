<?php 

declare(strict_types=1);

namespace Nemanja\Ewa\Router;

use Exception;
use Nemanja\Ewa\Router\Attributes\Route;

class Router {

    private array $routes = [];

    public function register(string $requestMethod, string $route, callable|array $action): self {

        $this->routes[$requestMethod][$route] = $action;
        return $this;
    }

    public function get(string $route, callable|array $action): self {

        return $this->register('GET', $route, $action);
    }

    public function post(string $route, callable|array $action): self {

        return $this->register('POST', $route, $action);
    }

    // public function routess(): array {

    //     return $this->routes;
    // }

    public function resolve(string $requestUri, string $requestMethod) {

        $route = explode('?', $requestUri)[0];

        $action = $this->routes[$requestMethod][$route] ?? null;

        if(!$action) {
            throw new Exception('Route not found!');
        }

        if(is_callable($action)) {

            return call_user_func($action);
        }

        if(is_array($action)) {
            [$class, $method] = $action;

            if(class_exists($class)) {
                $class = new $class();

                if(method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }

        if(!$action) {
            throw new Exception('Route not found!');
        }
    }

    public function getAttributesFromControllers(array $controllers) {

        foreach($controllers as $controller) {
            $reflectionController = new \ReflectionClass($controller);

            foreach($reflectionController->getMethods() as $method) {
                $attributes = $method->getAttributes(Route::class);

                foreach($attributes as $attribute) {
                    $route = $attribute->newInstance();
                    $this->register($route->method, $route->routePath, [$controller, $method->getName()]);
                }
            }
        }
    }
}