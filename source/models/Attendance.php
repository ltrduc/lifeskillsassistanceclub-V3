<?php
class Attendance
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function setAttendance($id_user, $id_schoolyear, $semester, $date, $shift, $attendance)
  {
    $id_user        = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_user));
    $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schoolyear));
    $semester       = mysqli_real_escape_string($this->db->link, $this->fm->validation($semester));
    $date           = mysqli_real_escape_string($this->db->link, $this->fm->validation($date));
    $shift          = mysqli_real_escape_string($this->db->link, $this->fm->validation($shift));
    $attendance     = mysqli_real_escape_string($this->db->link, $this->fm->validation($attendance));

    $query  = "SELECT * FROM tbl_attendance WHERE id_user = '$id_user' AND id_schoolyear = '$id_schoolyear' AND semester = '$semester' AND date = '$date' AND shift = '$shift'";
    $result = $this->db->select($query);

    if ($result) return ["status" => "success", "message" => "Đã điểm danh thành công!"];

    $query  = "INSERT INTO `tbl_attendance`(`id_user`, `id_schoolyear`, `semester`, `date`, `shift`, `attendance`) VALUES ('$id_user ','$id_schoolyear ','$semester','$date','$shift','$attendance')";
    $result = $this->db->insert($query);

    if ($result) return ["status" => "success", "message" => "Đã điểm danh thành công!"];

    return ["status" => "error", "message" => "Đã điểm danh không thành công!"];
  }
}
