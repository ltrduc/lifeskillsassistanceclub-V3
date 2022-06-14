<?php
class Evaluate
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  /*
  |--------------------------------------------------------------------------
  | ĐÁNH GIÁ NHÂN SỰ
  |--------------------------------------------------------------------------
  */
  public function GetPersonnelEvaluate()
  {
    $query  = "SELECT DISTINCT tbl_evaluate.id_schoolyear, schoolyear, semester FROM `tbl_evaluate`, `tbl_schoolyear` WHERE tbl_schoolyear.id_schoolyear = tbl_evaluate.id_schoolyear ORDER BY tbl_schoolyear.id_schoolyear DESC, semester DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function SetPersonnelEvaluate($id_schoolyear, $semester)
  {
    $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schoolyear));
    $semester       = mysqli_real_escape_string($this->db->link, $this->fm->validation($semester));

    // Kiểm tra dữ liệu đầu vào
    if (empty($id_schoolyear) || empty($semester)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    // Kiểm tra dữ liệu tại không
    $query  = "SELECT * FROM `tbl_evaluate` WHERE `id_schoolyear`='$id_schoolyear' AND `semester`='$semester'";
    $result = $this->db->select($query);
    if ($result) return ["status" => "error", "message" => "Danh sách đánh giá đã tồn tại trước đó!"];

    $query  = "SELECT * FROM `tbl_user`";
    $result = $this->db->select($query);

    $querySY  = "SELECT schoolyear FROM `tbl_schoolyear` WHERE id_schoolyear='$id_schoolyear'";
    $resultSY = $this->db->select($querySY);

    if ($result && $resultSY) {
      $valueSY = $resultSY->fetch_assoc();
      while ($value = $result->fetch_assoc()) {
        $id_student = $value['id_student'];
        $schoolyear = $valueSY['schoolyear'];
        $content_vn = 'Thành viên LSA hoàn thành nhiệm vụ '.$semester.' năm học '.$schoolyear.'';

        if ($semester == 'Học kỳ I') {
          $content_eng = 'The member of LSA has been recognized for having decent performance in the first semester of the academic year '.$schoolyear.'.'; 
        } else {
          $content_eng = 'The member of LSA has been recognized for having decent performance in the second semester of the academic year '.$schoolyear.'.'; 
        }

        $query = "INSERT INTO `tbl_evaluate`(`id_student`, `attendance`, `content_vn`, `content_eng`, `evaluate`, `id_schoolyear`, `semester`) VALUES ('$id_student','x', '$content_vn', '$content_eng', 'Hoàn thành', '$id_schoolyear', '$semester')";
        $this->db->insert($query);
      }
      return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];
    }
    return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
  }

  public function deletePersonnelEvaluate($id_schoolyear, $semester)
  {
    $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schoolyear));
    $semester       = mysqli_real_escape_string($this->db->link, $this->fm->validation($semester));

    if (empty($id_schoolyear) || empty($semester)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query  = "DELETE FROM `tbl_evaluate` WHERE`id_schoolyear`='$id_schoolyear' AND `semester`='$semester'";
    $result = $this->db->delete($query);

    if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];

    return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
  }

  public function getDetailedPersonnelEvaluate($id_schoolyear, $semester, $team)
  {
    $query  = "SELECT *, CASE WHEN id_student IS NOT NULL THEN '[----------]' END AS fullname FROM tbl_evaluate WHERE (id_student NOT IN (SELECT id_student FROM tbl_user)) AND id_schoolyear='$id_schoolyear' AND semester='$semester'";

    if ($team != 0) {
      $query  = "SELECT tbl_evaluate.*, fullname FROM `tbl_evaluate`, `tbl_user` WHERE tbl_user.id_team = '$team' AND id_schoolyear='$id_schoolyear' AND semester='$semester' AND tbl_user.id_student = tbl_evaluate.id_student";
    }

    $result = $this->db->select($query);
    return $result;
  }

  public function setDetailedPersonnelEvaluate($id_student, $note, $evaluate, $id_schoolyear, $semester)
  {
    $id_student     = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_student));
    $note           = mysqli_real_escape_string($this->db->link, $this->fm->validation($note));
    $evaluate       = mysqli_real_escape_string($this->db->link, $this->fm->validation($evaluate));
    $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schoolyear));
    $semester       = mysqli_real_escape_string($this->db->link, $this->fm->validation($semester));

    $content_vn   = "";
    $content_eng  = "";

    $querySY    = "SELECT schoolyear FROM `tbl_schoolyear` WHERE id_schoolyear='$id_schoolyear'";
    $resultSY   = $this->db->select($querySY);
    $valueSY    = $resultSY->fetch_assoc();
    $schoolyear = $valueSY['schoolyear'];

    if ($evaluate == 'Hoàn thành') {
      if ($semester == 'Học kỳ I') {
        $content_vn   = 'Thành viên LSA hoàn thành nhiệm vụ '.$semester.' năm học '.$schoolyear.'';
        $content_eng  = 'The member of LSA has been recognized for having decent performance in the first semester of the academic year '.$schoolyear.'.';
      } else {
        $content_vn   = 'Thành viên LSA hoàn thành nhiệm vụ '.$semester.' năm học '.$schoolyear.'';
        $content_eng  = 'The member of LSA has been recognized for having decent performance in the second semester of the academic year '.$schoolyear.'.';
      }
    }

    if ($evaluate == 'Hoàn thành tốt') {
      if ($semester == 'Học kỳ I') {
        $content_vn   = 'Thành viên LSA hoàn thành tốt nhiệm vụ '.$semester.' năm học '.$schoolyear.'';
        $content_eng  = 'The member of LSA has been recognized for having great performance in the first semester of the academic year '.$schoolyear.'.';
      } else {
        $content_vn   = 'Thành viên LSA hoàn thành tốt nhiệm vụ '.$semester.' năm học '.$schoolyear.'';
        $content_eng  = 'The member of LSA has been recognized for having great performance in the second semester of the academic year '.$schoolyear.'.';
      }
    }

    if ($evaluate == 'Hoàn thành xuất sắc') {
      if ($semester == 'Học kỳ I') {
        $content_vn   = 'Thành viên LSA hoàn thành xuất sắc nhiệm vụ '.$semester.' năm học '.$schoolyear.'';
        $content_eng  = 'The member of LSA has been recognized for having excellent performance in the first semester of the academic year '.$schoolyear.'.';
      } else {
        $content_vn   = 'Thành viên LSA hoàn thành xuất sắc nhiệm vụ '.$semester.' năm học '.$schoolyear.'';
        $content_eng  = 'The member of LSA has been recognized for having excellent performance in the second semester of the academic year '.$schoolyear.'.';
      }
    }

    $query  = "UPDATE `tbl_evaluate` SET `content_vn`='$content_vn',`content_eng`='$content_eng',`note`='$note',`evaluate`='$evaluate' WHERE `id_student`='$id_student'";
    $result = $this->db->insert($query);

    if ($result) return ["status" => "success", "message" => "Cập nhật đánh giá thành công!"];

    return ["status" => "error", "message" => "Cập nhật đánh giá không thành công!"];
  }
}