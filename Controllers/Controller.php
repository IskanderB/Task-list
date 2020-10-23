<?php
namespace App\Controllers;
/**
 * Main controller
 */
abstract class Controller
{
    public $model;
    public $view;
    public $pageData = [];
}
