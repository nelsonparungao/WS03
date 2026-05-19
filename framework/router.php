<?php
namespace Framework;

use App\Controllers\ErrorController;
use Framework\Middleware\Authorize;

class Router {
    protected $routes = [];

    public function registerRoute($method, $uri, $controller, $middleware = []) {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => $middleware
        ];
    }

    public function get($uri, $controller, $middleware = []) {
        $this->registerRoute('GET', $uri, $controller, $middleware);
    }

    public function post($uri, $controller, $middleware = []) {
        $this->registerRoute('POST', $uri, $controller, $middleware);
    }

    public function put($uri, $controller, $middleware = []) {
        $this->registerRoute('PUT', $uri, $controller, $middleware);
    }

    public function delete($uri, $controller, $middleware = []) {
        $this->registerRoute('DELETE', $uri, $controller, $middleware);
    }

    public function route($url, $method) {
        // Remove trailing slash and decode
        $url = rtrim($url, '/');
        
        // Split URL into segments
        $urlSegments = $url ? explode('/', $url) : [];
        
        foreach ($this->routes as $route) {
            $routeUri = ltrim($route['uri'], '/');
            $routeSegments = $routeUri ? explode('/', $routeUri) : [];
            
            // Check if methods match
            if ($method !== $route['method']) {
                continue;
            }
            
            // Check if segment counts match
            if (count($urlSegments) !== count($routeSegments)) {
                continue;
            }
            
            $match = true;
            $params = [];
            
            // Compare each segment
            for ($i = 0; $i < count($routeSegments); $i++) {
                // Check if it's a parameter {id}
                if (preg_match('/\{([^}]+)\}/', $routeSegments[$i], $matches)) {
                    $params[$matches[1]] = $urlSegments[$i];
                } 
                // Check if segments match
                elseif ($routeSegments[$i] !== $urlSegments[$i]) {
                    $match = false;
                    break;
                }
            }
            
            if ($match) {
                // Run middleware
                foreach ($route['middleware'] as $middleware) {
                    $authorize = new Authorize();
                    $authorize->handle($middleware);
                }
                
                // Call controller
                list($controller, $controllerMethod) = explode('@', $route['controller']);
                $controllerClass = 'App\\Controllers\\' . $controller;
                $controllerInstance = new $controllerClass();
                $controllerInstance->$controllerMethod($params);
                return;
            }
        }
        
        // No route found
        ErrorController::notFound();
    }
}
?>