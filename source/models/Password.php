<?php
class Password
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function resetPassword($id_user)
  {
    $id_user    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_user));

    $query      = "SELECT * FROM tbl_user WHERE id_user = '$id_user' LIMIT 1";
    $result     = $this->db->select($query);

    if ($result) {
      $value          = $result->fetch_assoc();
      $password_reset = md5($value['id_student']);

      $query          = "UPDATE `tbl_user` SET `password`='$password_reset' WHERE `id_user`='$id_user'";
      $result         = $this->db->update($query);

      if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];
    }
    return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
  }

  public function ChangePassword($id_user, $oldPassword, $newPassword, $reNewPassword)
  {
    $id_user        = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_user));
    $oldPassword    = md5(mysqli_real_escape_string($this->db->link, $this->fm->validation($oldPassword)));
    $newPassword    = mysqli_real_escape_string($this->db->link, $this->fm->validation($newPassword));
    $reNewPassword  = mysqli_real_escape_string($this->db->link, $this->fm->validation($reNewPassword));

    if (empty($oldPassword) || empty($newPassword) || empty($reNewPassword) || empty($id_user))
      return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query  = "SELECT * FROM tbl_user WHERE id_user = '$id_user' AND password = '$oldPassword' LIMIT 1";
    $result = $this->db->select($query);

    if (!$result)  return ["status" => "error", "message" => "Mật khẩu cũ không đúng!"];

    if (
      strlen($newPassword) < 8 || strlen($newPassword) > 30 ||
      strlen($reNewPassword) < 8 || strlen($reNewPassword) > 30
    )
      return ["status" => "error", "message" => "Mật khẩu của bạn phải dài 8-30 ký tự!"];

    if ($newPassword !== $reNewPassword) return ["status" => "error", "message" => "Mật khẩu xác nhận không trùng khớp!"];

    $password_hash  = md5($newPassword);
    $query          = "UPDATE `tbl_user` SET `password`='$password_hash' WHERE `id_user`='$id_user'";
    $result         = $this->db->update($query);

    if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];

    return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
  }
}
