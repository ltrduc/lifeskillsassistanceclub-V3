<?php
class Borrow
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function getBorrow()
  {
    $query  = "SELECT `id_borrow`, `borrower`, `phone`, `device`, `quantily`, `date`, `purpose`, `status` AS id_status, (CASE WHEN status = 0 THEN 'Chưa trả' ELSE 'Đã trả' END) AS status FROM `tbl_borrow` ORDER BY status ASC, id_borrow DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function setBorrow($borrower, $phone, $device, $quantily, $date, $purpose)
  {
    $borrower   = mysqli_real_escape_string($this->db->link, $this->fm->validation($borrower));
    $phone      = mysqli_real_escape_string($this->db->link, $this->fm->validation($phone));
    $device     = mysqli_real_escape_string($this->db->link, $this->fm->validation($device));
    $quantily   = mysqli_real_escape_string($this->db->link, $this->fm->validation($quantily));
    $date       = mysqli_real_escape_string($this->db->link, $this->fm->validation($date));
    $purpose    = mysqli_real_escape_string($this->db->link, $this->fm->validation($purpose));
    $status     = 0;

    if (empty($borrower) || empty($phone) || empty($device) || empty($quantily) || empty($date) || empty($purpose)) {
      return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];
    }

    $query  = "INSERT INTO `tbl_borrow`(`borrower`, `phone`, `device`, `quantily`, `date`, `purpose`, `status`) VALUES ('$borrower','$phone', '$device','$quantily','$date', '$purpose','$status')";
    $result = $this->db->insert($query);

    if ($result) return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];

    return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
  }

  public function editBorrow($id_borrow, $borrower, $phone, $device, $quantily, $date, $purpose)
  {
    $id_borrow  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_borrow));
    $borrower   = mysqli_real_escape_string($this->db->link, $this->fm->validation($borrower));
    $phone      = mysqli_real_escape_string($this->db->link, $this->fm->validation($phone));
    $device     = mysqli_real_escape_string($this->db->link, $this->fm->validation($device));
    $quantily   = mysqli_real_escape_string($this->db->link, $this->fm->validation($quantily));
    $date       = mysqli_real_escape_string($this->db->link, $this->fm->validation($date));
    $purpose    = mysqli_real_escape_string($this->db->link, $this->fm->validation($purpose));

    if (empty($id_borrow) || empty($borrower) || empty($phone) || empty($device) || empty($quantily) || empty($date) || empty($purpose)) {
      return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];
    }

    $query  = "UPDATE `tbl_borrow` SET `borrower`='$borrower',`phone`='$phone',`device`='$device',`quantily`='$quantily',`date`='$date',`purpose`='$purpose' WHERE `id_borrow`='$id_borrow'";
    $result = $this->db->update($query);

    if ($result) return ["status" => "success", "message" => "Đã cập nhật dữ liệu thành công!"];

    return ["status" => "error", "message" => "Đã cập nhật dữ liệu thất bại!"];
  }

  public function deleteBorrow($id_borrow)
  {
    $id_borrow  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_borrow));

    $query      = "SELECT * FROM `tbl_borrow` WHERE `id_borrow` = '$id_borrow'";
    $result     = $this->db->select($query);

    if ($result) {
      $query      = "DELETE FROM `tbl_borrow` WHERE `id_borrow` = '$id_borrow'";
      $result     = $this->db->delete($query);

      if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
    }
    return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
  }

  public function updateStatus($id_borrow, $status)
  {
    $id_borrow  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_borrow));
    $status     = mysqli_real_escape_string($this->db->link, $this->fm->validation($status));

    $query      = "UPDATE `tbl_borrow` SET `status`= '$status' WHERE id_borrow = '$id_borrow'";
    $result     = $this->db->update($query);

    if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];

    return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
  }
}
