<?php
namespace App\Conf;
/**
 * Routes middleware
 */
class Rights
{
    private $routes = [
        '/users' => 'Guest',
        '/users/login' => 'Guest',
        '/tasks/update' => 'Auth',
        '/users/logout' => 'Auth',
    ];

    public function check($route, $checkAjax)
    {
        if (isset($this->routes[$route])) {

            $middlewareName = "App\Middleware\\" . $this->routes[$route] . 'Middleware';

            $middleware = new $middlewareName($checkAjax, $route);
            $middleware->check();
        }
        return true;
    }
}
