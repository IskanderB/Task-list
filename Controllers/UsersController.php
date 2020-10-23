<?php
namespace App\Controllers;
use App\Models\UsersModel;
use App\Views\View;
use App\Messages\{PositiveMessage, NegativeMessage};
use App\Conf\Redirect;
/**
 * Controller for users
 */
class UsersController extends Controller
{
    private $pageName = 'login';
    public function __construct()
    {
        $this->model = new UsersModel();
        $this->view = new View();

    }

    public function index()
    {
        $this->pageData['title'] = 'Login';
        $this->view->render($this->pageName, $this->pageData);
    }

    public function login()
    {
        $checkUser = $this->model->checkUser($_POST);

        if ($checkUser) {
            PositiveMessage::send("Authorisation is successfully.");
            $_SESSION['user'] = true;
            return header('Location: /');
        }
        else {
            NegativeMessage::send("Incorrect login or password.");
            return header('Location: http://testtask1.ru/users');
            exit();
        }
    }

    public function logout()
    {
        PositiveMessage::send("Logout is successfully.");
        unset($_SESSION['user']);
        return header('Location: /');
    }
}
