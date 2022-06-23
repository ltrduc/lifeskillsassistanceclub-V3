<?php
class Schedule
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function getSchedule()
  {
    $query  = "SELECT tbl_schedule.*, id_student, fullname, phone, tbl_team.name AS team FROM tbl_schedule, tbl_user, tbl_team WHERE tbl_schedule.id_user = tbl_user.id_user AND tbl_user.id_team = tbl_team.id_team ORDER BY tbl_team.id_team ASC";
    $result = $this->db->select($query);
    return $result;
  }

  public function setSchedule($id_student, $session, $shift1, $shift2, $shift3, $shift4)
  {
    $id_student = strtoupper(mysqli_real_escape_string($this->db->link, $this->fm->validation($id_student)));
    $session    = mysqli_real_escape_string($this->db->link, $this->fm->validation($session));
    $shift1     = mysqli_real_escape_string($this->db->link, $this->fm->validation($shift1));
    $shift2     = mysqli_real_escape_string($this->db->link, $this->fm->validation($shift2));
    $shift3     = mysqli_real_escape_string($this->db->link, $this->fm->validation($shift3));
    $shift4     = mysqli_real_escape_string($this->db->link, $this->fm->validation($shift4));

    if (empty($id_student) || empty($session)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $shift = "";
    if (!empty($shift1)) $shift = $shift . $shift1 . " ";
    if (!empty($shift2)) $shift = $shift . $shift2 . " ";
    if (!empty($shift3)) $shift = $shift . $shift3 . " ";
    if (!empty($shift4)) $shift = $shift . $shift4 . " ";

    if ($shift == "") return ["status" => "error", "message" => "Vui lòng nhập ca trực!"];

    $query_user  = "SELECT * FROM tbl_user WHERE id_student = '$id_student'";
    $result_user = $this->db->select($query_user);

    if (!$result_user) return ["status" => "error", "message" => "" . $id_student . " không tồn tại!"];

    $value_user = $result_user->fetch_assoc();
    $id_user    = $value_user['id_user'];

    $query      = "SELECT * FROM tbl_schedule WHERE id_user = '$id_user' AND session = '$session'";
    $result     = $this->db->select($query);

    if ($result) return ["status" => "error", "message" => "Buổi trực đã tồn tại!"];

    $query      = "INSERT INTO `tbl_schedule`(`id_user`, `session`, `shift`) VALUES ('$id_user', '$session','$shift')";
    $result     = $this->db->insert($query);

    if ($result) return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];

    return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
  }

  public function deleteSchedule($id_schedule)
  {
    $id_schedule  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schedule));

    $query        = "SELECT * FROM `tbl_schedule` WHERE id_schedule = '$id_schedule'";
    $result       = $this->db->select($query);

    if ($result) {
      $query      = "DELETE FROM `tbl_schedule` WHERE id_schedule = '$id_schedule'";
      $result     = $this->db->delete($query);

      if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
    }
    return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
  }

  public function Attendance($id_schoolyear, $semester, $date)
  {
    $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schoolyear));
    $semester       = mysqli_real_escape_string($this->db->link, $this->fm->validation($semester));
    $date           = mysqli_real_escape_string($this->db->link, $this->fm->validation($date));

    if (empty($id_schoolyear) || empty($semester) || empty($date)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];
    if (getdate(strtotime($date))['weekday'] != "Monday") return ["status" => "error", "message" => "Ngày bắt đầu phải là thứ 2!"];
    
    $query      = "SELECT * FROM `tbl_schedule`";
    $result     = $this->db->select($query);

    if ($result) {
      while ($value = $result->fetch_assoc()) {
        $id_user    = $value['id_user'];
        $attendance = 'Present';
        $newDate    = $date;

        if ($value['session'] == "Tuesday")   $newDate = date ('Y-m-d', strtotime("+1 days", strtotime($date)));
        if ($value['session'] == "Wednesday") $newDate = date ('Y-m-d', strtotime("+2 days", strtotime($date)));
        if ($value['session'] == "Thursday")  $newDate = date ('Y-m-d', strtotime("+3 days", strtotime($date)));
        if ($value['session'] == "Friday")    $newDate = date ('Y-m-d', strtotime("+4 days", strtotime($date)));
        if ($value['session'] == "Saturday")  $newDate = date ('Y-m-d', strtotime("+5 days", strtotime($date)));
        if ($value['session'] == "Sunday")    $newDate = date ('Y-m-d', strtotime("+6 days", strtotime($date)));

        for ($i = 0; $i < count(explode(" ", $value['shift'])); $i++) {
          $shift = explode(" ", $value['shift'])[$i];
          if ($shift != "") {
            $query = "INSERT INTO `tbl_attendance`(`id_user`, `id_schoolyear`, `semester`, `date`, `shift`, `attendance`) VALUES ('$id_user','$id_schoolyear','$semester','$newDate','$shift','$attendance')";
            $this->db->insert($query);
          }
        }
      }
      $query  = "DELETE FROM `tbl_schedule`";
      $this->db->delete($query);

      if ($result) return ["status" => "success", "message" => "Đã điểm danh thành công!"];
    }
    return ["status" => "error", "message" => "Lỗi trong quá trình điểm danh!"];
  }
}
