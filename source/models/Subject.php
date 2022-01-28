<?php
class Subject
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function getSubject()
  {
    $query  = "SELECT * FROM tbl_subject ORDER BY subject ASC";
    $result = $this->db->select($query);
    return $result;
  }

  public function setSubject($subject, $note)
  {
    $subject    = mysqli_real_escape_string($this->db->link, $this->fm->validation($subject));
    $note       = mysqli_real_escape_string($this->db->link, $this->fm->validation($note));

    if (empty($subject)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query      = "SELECT * FROM tbl_subject WHERE subject = '$subject' LIMIT 1";
    $result     = $this->db->select($query);

    if ($result) return ["status" => "error", "message" => "Môn " . $subject . " đã tồn tại!"];

    $query      = "INSERT INTO `tbl_subject`(`subject`, `note`) VALUES ('$subject', '$note')";
    $result     = $this->db->insert($query);

    if ($result) return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];

    return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
  }

  public function updateSubject($id_subject, $subject, $note)
  {
    $id_subject = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_subject));
    $subject    = mysqli_real_escape_string($this->db->link, $this->fm->validation($subject));
    $note       = mysqli_real_escape_string($this->db->link, $this->fm->validation($note));

    if (empty($id_subject) || empty($subject)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query      = "UPDATE `tbl_subject` SET `subject`='$subject',`note`='$note' WHERE id_subject = '$id_subject'";
    $result     = $this->db->update($query);

    if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];

    return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
  }

  public function deleteSubject($id_subject)
  {
    $id_subject     = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_subject));

    $query          = "SELECT * FROM `tbl_subject` WHERE id_subject = '$id_subject'";
    $result         = $this->db->select($query);

    if ($result) {
      $query      = "DELETE FROM `tbl_subject` WHERE id_subject = '$id_subject'";
      $result     = $this->db->delete($query);

      if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
    }
    return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
  }
}
