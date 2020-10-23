<?php
namespace App\Models;
/**
 * Model for index page
 */
class UsersModel extends Model
{
    public function checkUser($data)
    {
        $sql = "SELECT * FROM users WHERE login = :login;";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $data['login'], \PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user) {
            return password_verify($data['password'], $user['password']);
        }
        return false;


        // $sql = "INSERT INTO users (login, password) VALUES (:login, :password);";
        //
        // $stmt = $this->db->prepare($sql);
        // $stmt->bindValue(":login", $data['login'], PDO::PARAM_STR);
        // $stmt->bindValue(":password", password_hash($data['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
        // $stmt->execute();
        // print_r($stmt->fetch(PDO::FETCH_ASSOC));
        // die();
        // return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
