<?php
namespace App\Models;
/**
 * Model for index page
 */
class IndexModel extends Model
{
    public function getTasks($begin, $sort)
    {
        $task = new TasksModel();

        return $task->select($begin, $sort);
    }

    public function countPages()
    {
        $task = new TasksModel();

        $countRows = $task->countRows();
        $countPages = ceil($countRows/3);

        return $countPages;
    }
}
