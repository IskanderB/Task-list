<?php
namespace App\Controllers;
use App\Models\TasksModel;
use App\Messages\{PositiveMessage, NegativeMessage};
/**
 * Controller for index page
 */
class TasksController extends Controller
{
    public function __construct()
    {
        $this->model = new TasksModel();

    }

    public function update()
    {
        $_POST['content'] = trim($_POST['content']);
        $result = $this->_update($_POST);

        if ($result) {
            PositiveMessage::send('The task was updated successfully.', true);
        }
        else{
            NegativeMessage::send("The task wasn't updated. Try it later.", true);
        }

    }

    public function _update($data)
    {
        return $this->model->update($data);
    }

    public function append()
    {
        $result = $this->insert($_POST);

        if ($result) {
            PositiveMessage::send('The task was appended successfully.');
        }
        else{
            NegativeMessage::send("The task wasn't appended. Try it later.");
        }

        header('Location: /');
    }

    public function insert($data)
    {
        return $this->model->insert($data);
    }
}
