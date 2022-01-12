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
      $login_check  = $this->Login->myLogin($id_student, $password);

      if (isset($login_check)) $Notification = $login_check;
    }

    $this->view("login", [
      "Notification"  => $Notification,
    ]);
  }

  public function Logout()
  {
    Session::destroy();
  }
}
