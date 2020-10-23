<?php
namespace App\Middleware;

/**
 * Middleware base class
 */
abstract class Middleware
{
    protected $typeMessage;
    protected $checkAjax;
    protected $errorType = 'App\Errors\RightsErrors';
    protected $url;

    public function __construct($checkAjax, $url)
    {
        $this->checkAjax = $checkAjax;
        $this->url = $url;
    }

    protected function denied()
    {
        $error = new $this->errorType($this->checkAjax, $this->url);
        $error->error();
    }

}
