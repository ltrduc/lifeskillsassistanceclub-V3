<?php
class Executive
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function getExecutive()
  {
    $query  = "SELECT id_executive, tbl_user.id_student AS id_student, tbl_user.fullname AS fullname, tbl_position.name AS position FROM tbl_executive, tbl_user, tbl_position WHERE tbl_executive.id_user = tbl_user.id_user AND tbl_executive.id_position = tbl_position.id_position";
    $result = $this->db->select($query);
    return $result;
  }

  public function setExecutive($id_student, $id_position)
  {
    $id_student     = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_student));
    $id_position    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_position));

    if (empty($id_student) || empty($id_position)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query_user  = "SELECT * FROM tbl_user WHERE id_student = '$id_student' AND role = '0'";
    $result_user = $this->db->select($query_user);

    if (!$result_user) return ["status" => "error", "message" => "" . $id_student . " không tồn tại hoặc chưa phải là thành viên!"];

    $value_user = $result_user->fetch_assoc();
    $id_user    = $value_user['id_user'];

    $query  = "SELECT * FROM tbl_executive WHERE id_user = '$id_user' OR id_position = '$id_position' LIMIT 1";
    $result = $this->db->select($query);

    if ($result) return ["status" => "error", "message" => "Nhân sự hoặc chức vụ đã tồn tại!"];

    $query  = "INSERT INTO `tbl_executive`(`id_user`, `id_position`) VALUES ('$id_user', '$id_position')";
    $result = $this->db->insert($query);

    if ($result) {
      $query  = "UPDATE `tbl_decentralization` SET `admin`= '1' WHERE id_user = '$id_user'";
      $result = $this->db->update($query);

      if ($result) return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];
    }
    return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
  }

  public function deleteExecutive($id_executive)
  {
    $id_executive   = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_executive));

    $query          = "SELECT * FROM `tbl_executive` WHERE id_executive = '$id_executive'";
    $result         = $this->db->select($query);

    if ($result) {
      $value      = $result->fetch_assoc();
      $id_user    = $value['id_user'];

      $query      = "DELETE FROM tbl_executive WHERE id_executive = '$id_executive'";
      $result     = $this->db->delete($query);

      if ($result) {
        $query  = "UPDATE `tbl_decentralization` SET `admin`= '0' WHERE id_user = '$id_user'";
        $result = $this->db->update($query);

        if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
      }
    }
    return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
  }
}
