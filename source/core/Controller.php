<?php
class Controller
{
    public function model($model)
    {
        require_once "./source/models/" . $model . ".php";
        return new $model;
    }

    public function view($view, $data = [])
    {
        require_once "./source/views/" . $view . ".php";
    }
}
?>
