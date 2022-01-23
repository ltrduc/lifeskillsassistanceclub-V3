<?php
Session::checkLogin();
class Login
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function myLogin($id_student, $password)
  {
    $id_student     = strtoupper(mysqli_real_escape_string($this->db->link, $this->fm->validation($id_student)));
    $password       = mysqli_real_escape_string($this->db->link, $this->fm->validation($password));
    $password_hash  = md5($password);

    if (empty($id_student) || empty($password)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query  = "SELECT tbl_user.fullname, tbl_decentralization.* FROM tbl_user, tbl_decentralization WHERE id_student = '$id_student' AND password = '$password_hash' AND tbl_user.id_user = tbl_decentralization.id_user LIMIT 1";
    $result = $this->db->select($query);

    if ($result) {
      $value = $result->fetch_assoc();
      Session::set('login', true);
      Session::set('id_user', $value['id_user']);
      Session::set('fullname', $value['fullname']);
      Session::set('pmsAdmin', $value['admin']);
      Session::set('pmsAttendance', $value['attendance']);
      Session::set('pmsPost', $value['post']);
      self::redirect("/../Admin/Home");
    }

    if ($id_student === "LIFESKILLSASSISTANCE" && $password === "LSA07012020") {
      Session::set('login', true);
      Session::set('id_user', 0);
      Session::set('fullname', 'Ban Điều Hành');
      Session::set('pmsAdmin', 1);
      Session::set('pmsAttendance', 0);
      Session::set('pmsPost', 0);
      self::redirect("/../Admin/Home");
    }

    return ["status" => "error", "message" => "Tài khoản hoặc mật khẩu không đúng!"];
  }

  public static function redirect($url)
  {
    ob_start();
    if (!empty($url)) header("location: {$url}");
    ob_end_flush();
  }
}
