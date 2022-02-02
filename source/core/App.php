<?php
class App
{
    protected $controller   = "Admin";
    protected $action       = "Home";
    protected $params       = [];

    function __construct()
    {
        $arr        = $this->UrlProcess();
        $filepath   = realpath(dirname(__FILE__));

        // Controller
        if (isset($arr[0])) {
            if (file_exists($filepath . '/../controllers/' . $arr[0] . '.php')) {
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        require_once($filepath . '/../controllers/' . $this->controller . '.php');
        $this->controller = new $this->controller;

        // Action
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // Params
        $this->params = $arr ? array_values($arr) : [];
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    function UrlProcess()
    {
        if (isset($_GET["url"])) return explode("/", filter_var(trim($_GET["url"], "/")));
    }
}
?>