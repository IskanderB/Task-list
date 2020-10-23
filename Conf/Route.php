<?php
namespace App\Conf;
use App\Validator\Validator;
//use App\Controllers as Controllers;
/*
 Routing classes
 http://tasklist.ru/
 http://tasklist.ru/login

 */
abstract class Route
{
    // Default controller, model and action
    const DEFAULT_CONTROLLER = 'IndexController';
    const DEFAULT_MODEL = 'IndexModel';
    const DEFAULT_ACTION = 'index';
    
    

    public static function buildRoute()
    {
        // Set default controller, model and action
        $controllerName = self::DEFAULT_CONTROLLER;
        $modelName = self::DEFAULT_MODEL;
        $action = self::DEFAULT_ACTION;
        
        $route = self::split_URI();
        self::rights($route['request']);
        self::validator([
            '_GET' => $GLOBALS['_GET'],
            '_POST' => $GLOBALS['_POST'],
        ], $route['request']);

        // Set controller
        if ($route['controllerAndModel'] != '') {
            $controllerName = ucfirst($route['controllerAndModel'] . 'Controller');
            $modelName = ucfirst($route['controllerAndModel'] . 'Model');
        }

//        require_once CONTROLLER_PATH . $controllerName . '.php'; // IndexController.php
//        require_once MODEL_PATH . $modelName . '.php'; // IndexModel.php
        
        

        if (isset($route['action']) and $route['action'] != '') {
            $action = $route['action'];
        }
        
        $controllerName = 'App\Controllers\\' . $controllerName;

        $controller = new $controllerName();
        $controller->$action();

    }

    private static function checkAjax()
    {
        $_GET['ajax'] = false;
        if (!isset($_POST['ajax'])) {
            $_POST['ajax'] = false;
        }
        else {
            $_POST['ajax'] = true;
            return true;
        }
        return false;
    }

    private static function validator($request, $redirectTo)
    {
        $validator = new Validator($request, $redirectTo);
        $validator->check();
    }

    private static function rights($route)
    {
        $checkAjax = self::checkAjax();

        $rights = new Rights();
        $check = $rights->check($route, $checkAjax);
        if (!$check and !$checkAjax) {
            $_SESSION['message'] = 'Permission denied';
            $_SESSION['error'] = true;
            header('Location: /');
            exit();
        }
        elseif (!$check and $checkAjax) {
            $response = json_encode([
                'message' => 'Permission denied',
                'error' => true,
            ]);
            echo $response;
            exit();
        }
    }

    public static function errorPage()
    {
        // code...
    }

    private static function split_URI()
    {
        $lenght_without_params = strripos($_SERVER['REQUEST_URI'], '?');
        if ($lenght_without_params) {
            $request_uri_without_params = substr($_SERVER['REQUEST_URI'], 0, $lenght_without_params);
        }
        else {
            $request_uri_without_params = $_SERVER['REQUEST_URI'];
        }

        $route = explode('/', $request_uri_without_params);
        if (!isset($route[2])) {
            return [
                'controllerAndModel' => $route[1],
                'request' => $request_uri_without_params,
            ];
        }
        return [
            'controllerAndModel' => $route[1],
            'action' => $route[2],
            'request' => $request_uri_without_params,
        ];
    }
}
