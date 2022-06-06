<?php
class Controller
{
    public function model($model)
    {
        require_once(realpath(dirname(__FILE__)) . '/../models/' . $model . '.php');
        return new $model;
    }

    public function viewAuth($view, $data = [])
    {
        require_once(realpath(dirname(__FILE__)) . '/../views/' . $view . '.php');
    }

    public function viewAdmin($view, $data = [])
    {
        require_once(realpath(dirname(__FILE__)) . '/../views/admin/' . $view . '.php');
    }

    public function viewUser($view, $data = [])
    {
        require_once(realpath(dirname(__FILE__)) . '/../views/user/' . $view . '.php');
    }
}
?>