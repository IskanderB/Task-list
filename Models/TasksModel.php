<?php
namespace App\Models;
/**
 * Model for index page
 */
class TasksModel extends Model
{
    const DEFAULT_COUNT_ON_PAGE = 3;

    public function insert($data)
    {
        $data = $this->safeXSS($data);
        $sql = "INSERT INTO tasks (name, email, content) VALUES (:name, :email, :content);";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":name", trim($data['name']), \PDO::PARAM_STR);
        $stmt->bindValue(":email", trim($data['email']), \PDO::PARAM_STR);
        $stmt->bindValue(":content", trim($data['content']), \PDO::PARAM_STR);
        $result = $stmt->execute();

        return $result;
    }

    public function select($begin, $sort)
    {
        $sortColumn = $sort['sort'];
        $sortWay = mb_strtoupper($sort['way']);

        $sql = "SELECT * FROM tasks ORDER BY " . $sortColumn . " " . $sortWay . " LIMIT :begin, :count;";

        $stmt = $this->db->prepare($sql);
        // $stmt->bindValue(":sort", $sort, \PDO::PARAM_STR);
        $stmt->bindValue(":begin", $begin, \PDO::PARAM_INT);
        $stmt->bindValue(":count", self::DEFAULT_COUNT_ON_PAGE, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $data = $this->safeXSS($data);
        $sql = "UPDATE tasks SET content = :content, status = :checkbox, done = :done WHERE id = :id;";
        $checkbox = $this->checkboxStrToInt($data['checkbox']);
        $done = $this->checkboxStrToInt($data['done']);

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":content", trim($data['content']), \PDO::PARAM_STR);
        $stmt->bindValue(":checkbox", $checkbox, \PDO::PARAM_INT);
        $stmt->bindValue(":done", $done, \PDO::PARAM_INT);
        $stmt->bindValue(":id", $data['id'], \PDO::PARAM_STR);
        $result = $stmt->execute();

        return $result;
    }

    private function checkboxStrToInt($checkboxStr)
    {
        if ($checkboxStr == 'true') {
            return 1;
        }
        else {
            return 0;
        }
    }

    public function countRows()
    {
        $sql = "SELECT COUNT(*) count FROM tasks;";
        $count = $this->db->query($sql)->fetch(\PDO::FETCH_ASSOC);

        return $count['count'];
    }

    private function safeXSS($data)
    {
        foreach ($data as &$value) {
            $value = htmlspecialchars($value);
        }
        return $data;
    }
}
