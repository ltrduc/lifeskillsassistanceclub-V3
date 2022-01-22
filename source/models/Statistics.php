<?php
class Statistics
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function getStatistics()
  {
    $query  = "SELECT DISTINCT tbl_attendance.id_schoolyear, schoolyear, semester FROM tbl_attendance, tbl_schoolyear WHERE tbl_attendance.id_schoolyear = tbl_schoolyear.id_schoolyear ORDER BY id_schoolyear DESC, semester DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function deleteStatistics($id_schoolyear, $semester)
  {
    $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schoolyear));
    $semester       = mysqli_real_escape_string($this->db->link, $this->fm->validation($semester));

    $query          = "SELECT * FROM `tbl_attendance` WHERE id_schoolyear = '$id_schoolyear' AND semester = '$semester'";
    $result         = $this->db->select($query);

    if ($result) {
      $query        = "DELETE FROM `tbl_attendance` WHERE id_schoolyear = '$id_schoolyear' AND semester = '$semester'";
      $result       = $this->db->delete($query);

      if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
    }
    return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
  }

  public function getGeneralStatistics($id_schoolyear, $semester)
  {
    $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schoolyear));
    $semester       = mysqli_real_escape_string($this->db->link, $this->fm->validation($semester));

    $query = "SELECT tbl_schoolyear.schoolyear, tbl_user.id_student, tbl_user.fullname, CASE WHEN tbl_user.id_team IS NULL THEN '[---]' ELSE (SELECT tbl_team.name FROM tbl_team WHERE tbl_user.id_team = tbl_team.id_team) END AS team,
    (SELECT COUNT(tbl_attendance.id_user) FROM tbl_attendance WHERE attendance = 'Present' AND tbl_attendance.id_schoolyear = '$id_schoolyear' AND semester = '$semester' AND tbl_attendance.id_user = tbl_user.id_user) AS Present,
    (SELECT COUNT(tbl_attendance.id_user) FROM tbl_attendance WHERE attendance = 'Late' AND tbl_attendance.id_schoolyear = '$id_schoolyear' AND semester = '$semester' AND tbl_attendance.id_user = tbl_user.id_user) AS Late, 
    (SELECT COUNT(tbl_attendance.id_user) FROM tbl_attendance WHERE attendance = 'Absent' AND tbl_attendance.id_schoolyear = '$id_schoolyear' AND semester = '$semester' AND tbl_attendance.id_user = tbl_user.id_user) AS Absent 
    FROM tbl_attendance, tbl_user, tbl_schoolyear
    WHERE tbl_attendance.id_schoolyear = '$id_schoolyear' AND tbl_attendance.semester = '$semester' AND tbl_attendance.id_user = tbl_user.id_user AND tbl_attendance.id_schoolyear = tbl_schoolyear.id_schoolyear
    GROUP BY tbl_attendance.id_user ORDER BY tbl_attendance.id_user ASC, team ASC, date DESC";

    $result = $this->db->select($query);
    return $result;
  }

  public function getDetailedStatistics($id_schoolyear, $semester)
  {
    $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schoolyear));
    $semester       = mysqli_real_escape_string($this->db->link, $this->fm->validation($semester));

    $query = "SELECT tbl_attendance.*, tbl_schoolyear.schoolyear, tbl_user.id_student, tbl_user.fullname, 
    CASE WHEN tbl_user.id_team IS NULL THEN '[---]' ELSE (SELECT tbl_team.name FROM tbl_team WHERE tbl_user.id_team = tbl_team.id_team) END AS team
    FROM tbl_attendance, tbl_user, tbl_schoolyear
    WHERE tbl_attendance.id_schoolyear = '$id_schoolyear' AND tbl_attendance.semester = '$semester' AND tbl_attendance.id_user = tbl_user.id_user AND tbl_attendance.id_schoolyear = tbl_schoolyear.id_schoolyear
    ORDER BY tbl_attendance.id_user ASC, team ASC, date DESC";

    $result = $this->db->select($query);
    return $result;
  }

  public function deleteDetailedStatistics($id_attendance)
  {
    $id_attendance  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_attendance));

    $query          = "SELECT * FROM `tbl_attendance` WHERE id_attendance = '$id_attendance'";
    $result         = $this->db->select($query);

    if ($result) {
      $query        = "DELETE FROM `tbl_attendance` WHERE id_attendance = '$id_attendance'";
      $result       = $this->db->delete($query);

      if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
    }
    return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
  }
}
