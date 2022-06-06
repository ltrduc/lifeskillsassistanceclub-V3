<?php
class Auth extends Controller
{
  private $Login;

  function __construct()
  {
    $this->Login = $this->model("Login");
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ ĐĂNG NHẬP
  |--------------------------------------------------------------------------
  */
  public function Login()
  {
    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_student   = $_POST['id_student'];
      $password     = $_POST['password'];
      $Notification = $this->Login->myLogin($id_student, $password);
    }

    $this->viewAuth("login", ["Notification"  => $Notification,]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ ĐĂNG XUẤT
  |--------------------------------------------------------------------------
  */
  public function Logout()
  {
    Session::destroy();
  }
}
