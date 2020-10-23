<?php
namespace App\Middleware;
/**
 * Guest middleware
 */
class GuestMiddleware extends Middleware
{
    public function check()
    {
        if (isset($_SESSION['user'])) {
            $this->denied();
        }
    }
}
