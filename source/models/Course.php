<?php
class Course
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function getCourseToday()
  {
    $query  = "SELECT tbl_course.*, tbl_subject.subject, tbl_schoolyear.schoolyear FROM tbl_course, tbl_subject, tbl_schoolyear WHERE tbl_course.id_subject = tbl_subject.id_subject AND tbl_course.id_schoolyear = tbl_schoolyear.id_schoolyear AND tbl_course.date = CURDATE() ORDER BY period DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function getCourse()
  {
    $query  = "SELECT DISTINCT tbl_course.date, tbl_course.semester, tbl_schoolyear.schoolyear,tbl_course.id_schoolyear FROM tbl_course, tbl_schoolyear WHERE tbl_course.id_schoolyear = tbl_schoolyear.id_schoolyear ORDER BY id_schoolyear DESC, semester DESC, id_schoolyear DESC, date DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function setCourse($id_subject, $group, $teacher, $period, $local, $date, $semester, $id_schoolyear)
  {
    $id_subject     = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_subject));
    $group          = mysqli_real_escape_string($this->db->link, $this->fm->validation($group));
    $teacher        = mysqli_real_escape_string($this->db->link, $this->fm->validation($teacher));
    $period         = mysqli_real_escape_string($this->db->link, $this->fm->validation($period));
    $local          = mysqli_real_escape_string($this->db->link, $this->fm->validation($local));
    $date           = mysqli_real_escape_string($this->db->link, $this->fm->validation($date));
    $semester       = mysqli_real_escape_string($this->db->link, $this->fm->validation($semester));
    $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schoolyear));

    if (empty($id_subject) || empty($group) || empty($teacher) || empty($period) || empty($local) || empty($date) || empty($semester) || empty($id_schoolyear)) {
      return ["status" => "error", "message" => "Vui l??ng nh???p ?????y ????? d??? li???u!"];
    }

    $query  = "SELECT * FROM `tbl_course` WHERE `id_subject` = '$id_subject' AND `group` = '$group' AND `period` = '$period' AND `local` = '$local' AND `date` = '$date' AND `semester` = '$semester' AND `id_schoolyear` = '$id_schoolyear' AND `teacher` = '$teacher'";
    $result = $this->db->select($query);

    if ($result) return ["status" => "error", "message" => "D??? li???u ???? t???n t???i!"];

    $query  = "INSERT INTO `tbl_course`(`id_subject`, `group`, `teacher`, `period`, `local`, `date`, `semester`, `id_schoolyear`) VALUES ('$id_subject','$group', '$teacher','$period','$local', '$date','$semester','$id_schoolyear')";
    $result = $this->db->insert($query);

    if ($result) return ["status" => "success", "message" => "???? th??m d??? li???u th??nh c??ng!"];

    return ["status" => "error", "message" => "???? th??m d??? li???u th???t b???i!"];
  }

  public function deleteCourse($id_schoolyear, $semester, $date)
  {
    $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schoolyear));
    $semester       = mysqli_real_escape_string($this->db->link, $this->fm->validation($semester));
    $date           = mysqli_real_escape_string($this->db->link, $this->fm->validation($date));

    $query          = "SELECT * FROM `tbl_course` WHERE `id_schoolyear` = '$id_schoolyear' AND `semester` = '$semester' AND `date` = '$date'";
    $result         = $this->db->select($query);

    if ($result) {
      $query      = "DELETE FROM `tbl_course` WHERE `id_schoolyear` = '$id_schoolyear' AND `semester` = '$semester' AND `date` = '$date'";
      $result     = $this->db->delete($query);

      if ($result) return ["status" => "success", "message" => "???? x??a d??? li???u th??nh c??ng!"];
    }
    return ["status" => "error", "message" => "???? x??a d??? li???u th???t b???i!"];
  }

  public function getDetailedCourse($id_schoolyear, $semester, $date)
  {
    $query  = "SELECT tbl_course.*, tbl_subject.subject, tbl_schoolyear.schoolyear FROM  tbl_course, tbl_subject, tbl_schoolyear WHERE tbl_course.id_schoolyear = '$id_schoolyear' AND tbl_course.semester = '$semester' AND tbl_course.date = '$date' AND tbl_course.id_subject = tbl_subject.id_subject AND tbl_course.id_schoolyear = tbl_schoolyear.id_schoolyear ORDER BY period DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function updateDetailedCourse($id_course, $id_subject, $group, $teacher, $period, $local, $date, $semester, $id_schoolyear)
  {
    $id_course      = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_course));
    $id_subject     = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_subject));
    $group          = mysqli_real_escape_string($this->db->link, $this->fm->validation($group));
    $teacher        = mysqli_real_escape_string($this->db->link, $this->fm->validation($teacher));
    $period         = mysqli_real_escape_string($this->db->link, $this->fm->validation($period));
    $local          = mysqli_real_escape_string($this->db->link, $this->fm->validation($local));
    $date           = mysqli_real_escape_string($this->db->link, $this->fm->validation($date));
    $semester       = mysqli_real_escape_string($this->db->link, $this->fm->validation($semester));
    $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schoolyear));

    if (empty($id_course) || empty($id_subject) || empty($group) || empty($teacher) || empty($period) || empty($local) || empty($date) || empty($semester) || empty($id_schoolyear)) {
      return ["status" => "error", "message" => "Vui l??ng nh???p ?????y ????? d??? li???u!"];
    }

    $query  = "UPDATE `tbl_course` SET `id_subject`='$id_subject',`group`='$group',`teacher`='$teacher',`period`='$period',`local`='$local',`date`='$date',`semester`='$semester',`id_schoolyear`='$id_schoolyear' WHERE `id_course`='$id_course'";
    $result = $this->db->update($query);

    if ($result) return ["status" => "success", "message" => "???? c???p nh???t d??? li???u th??nh c??ng!"];

    return ["status" => "error", "message" => "???? c???p nh???t d??? li???u th???t b???i!"];
  }

  public function deleteDetailedCourse($id_course)
  {
    $id_course      = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_course));

    $query          = "SELECT * FROM `tbl_course` WHERE `id_course` = '$id_course'";
    $result         = $this->db->select($query);

    if ($result) {
      $query      = "DELETE FROM `tbl_course` WHERE `id_course` = '$id_course'";
      $result     = $this->db->delete($query);

      if ($result) return ["status" => "success", "message" => "???? x??a d??? li???u th??nh c??ng!"];
    }
    return ["status" => "error", "message" => "???? x??a d??? li???u th???t b???i!"];
  }

  public function importCourse($file)
  {
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    if (empty($file)) return ["status" => "error", "message" => "Vui l??ng ch???n file ????? Import!"];

    $file_open = fopen($file,"r");
    $checkCount = 0;

    while(($csv = fgetcsv($file_open, 1000, ",")) !== false) {
      if ($checkCount > 0) {
        $code_subject   = mysqli_real_escape_string($this->db->link, $this->fm->validation($csv[0])); 
        $group          = mysqli_real_escape_string($this->db->link, $this->fm->validation($csv[1])); 
        $id_subject     = mysqli_real_escape_string($this->db->link, $this->fm->validation($csv[2]));
        $period         = mysqli_real_escape_string($this->db->link, $this->fm->validation($csv[3]));
        $teacher        = mysqli_real_escape_string($this->db->link, $this->fm->validation($csv[4]));
        $dateStart      = mysqli_real_escape_string($this->db->link, $this->fm->validation($csv[5]));
        $dateEnd        = mysqli_real_escape_string($this->db->link, $this->fm->validation($csv[6]));
        $sum            = mysqli_real_escape_string($this->db->link, $this->fm->validation($csv[7]));
        $local          = mysqli_real_escape_string($this->db->link, $this->fm->validation($csv[8]));
        $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($csv[9]));
        $semester       = mysqli_real_escape_string($this->db->link, $this->fm->validation($csv[10]));
  
        if ($semester == 3) $semester = "H??";
  
        if($sum == 5) {
          $this->db->insert("INSERT INTO `tbl_course`(`code_subject`,`id_subject`, `group`, `teacher`, `period`, `local`, `date`, `semester`, `id_schoolyear`) 
          VALUES ('$code_subject','$id_subject','$group','$teacher','$period:01','$local', '$dateStart','H???c k??? $semester','$id_schoolyear')");
        } else {
          $this->db->insert("INSERT INTO `tbl_course`(`code_subject`,`id_subject`, `group`, `teacher`, `period`, `local`, `date`, `semester`, `id_schoolyear`) 
          VALUES ('$code_subject','$id_subject','$group','$teacher','$period:01','$local', '$dateStart','H???c k??? $semester','$id_schoolyear')");
  
          $this->db->insert("INSERT INTO `tbl_course`(`code_subject`,`id_subject`, `group`, `teacher`, `period`, `local`, `date`, `semester`, `id_schoolyear`) 
          VALUES ('$code_subject','$id_subject','$group','$teacher','$period:02','$local', '$dateEnd','H???c k??? $semester','$id_schoolyear')");
        }
      }
      $checkCount++;
    }

    return ["status" => "success", "message" => "???? th??m d??? li???u th??nh c??ng!"];
  }
}
