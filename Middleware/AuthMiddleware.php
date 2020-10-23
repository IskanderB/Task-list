<?php
namespace App\Middleware;

/**
 * Auth middleware
 */
class AuthMiddleware extends Middleware
{
    public function check()
    {
        if (!isset($_SESSION['user'])) {
            $this->denied();
        }
    }
}
