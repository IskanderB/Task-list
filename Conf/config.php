<?php

session_start();

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

require_once ROOT . '/vendor/autoload.php';

//define('CONTROLLER_PATH', ROOT . '/controllers/');
//define('MODEL_PATH', ROOT . '/models/');
define('VIEW_PATH', ROOT . '/Views/');
define('TPL_PATH', VIEW_PATH . '/tpl/');
//define('MIDDLEWARE_PATH', ROOT . '/middleware/');
//define('VALIDATOR_PATH', ROOT . '/validator/');
//define('TRAIT_PATH', ROOT . '/traits/');
//define('ERROR_PATH', ROOT . '/errors/');
//define('MESSAGE_PATH', ROOT . '/messages/');
//
////use App\Controllers\Controller;
//require_once('db.php');
//require_once('route.php');
//require_once('rights.php');
//require_once('redirect.php');
//require_once MODEL_PATH . 'Model.php';
//require_once VIEW_PATH . 'View.php';
////require_once CONTROLLER_PATH . 'Controller.php';
//require_once MIDDLEWARE_PATH . 'Middleware.php';
////require_once VALIDATOR_PATH . 'Validator.php';
//require_once ERROR_PATH . 'Errors.php';
//require_once MESSAGE_PATH . 'Message.php';
//require_once MESSAGE_PATH . 'PositiveMessage.php';
//require_once MESSAGE_PATH . 'NegativeMessage.php';

App\Conf\Route::buildRoute();
