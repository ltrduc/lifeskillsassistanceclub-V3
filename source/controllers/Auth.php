<?php
class Auth extends Controller
{
  private $Login;

  function __construct()
  {
    $this->Login = $this->model("Login");
  }

  public function Login()
  {
    $Notification = [];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_student   = $_POST['id_student'];
      $password     = $_POST['password'];
      $Notification = $this->Login->myLogin($id_student, $password);
    }

    $this->view("login", ["Notification"  => $Notification,]);
  }

  public function Logout()
  {
    Session::destroy();
  }
}
