<?php
class Controller
{
    public function model($model)
    {
        require_once(realpath(dirname(__FILE__)) . '/../models/' . $model . '.php');
        return new $model;
    }

    public function view($view, $data = [])
    {
        require_once(realpath(dirname(__FILE__)) . '/../views/' . $view . '.php');
    }
}
?>