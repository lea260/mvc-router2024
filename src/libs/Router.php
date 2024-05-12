<?php

declare(strict_types=1);

namespace Empresa\App\Libs;

class Router
{
    public function __construct(
        protected array $routes = [],
        protected array $params = [],
        private string $urlPrefix = URL_PREFIX,
    ) {
    }

    public function add(string $route, array $params): void
    {
        $route = trim($route, '/');
        $this->routes[$route] = $params;
    }

    public function dispatch(string $url): void
    {
        $url = $this->removePrefix($url, $this->urlPrefix);
        $url = $this->removeQueryString($url);
        $url = trim($url, '/');

        if (empty($url)) {
            $url = ''; // Set default route explicitly if needed
        }

        if ($this->match($url)) {
            $controller = "Empresa\\App\\Controllers\\" . $this->params['controller'] . "Controller";
            if (class_exists($controller)) {
                $controllerObject = new $controller();
                $action = $this->params['action'];

                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                } else {
                    echo "Method $action not found in controller $controller.";
                }
            } else {
                echo "Controller $controller not found.";
            }
        } else {
            echo "No route matched.";
        }
    }

    private function match(string $url): bool
    {
        if (array_key_exists($url, $this->routes)) {
            $this->params = $this->routes[$url];
            return true;
        }
        return false;
    }

    private function removeQueryString(string $url): string
    {
        if ($pos = strpos($url, '?')) {
            return substr($url, 0, $pos);
        }
        return $url;
    }

    private function removePrefix(string $url, string $prefix): string
    {
        $prefix = rtrim($prefix, '/') . '/'; // Ensure trailing slash
        if (substr($url, 0, strlen($prefix)) == $prefix) {
            return substr($url, strlen($prefix));
        }
        return $url;
    }
}
