<?php
include_once('./source/core/lib/database.php');
include_once('./source/core/helpers/format.php');
?>

<?php
/**
 * Course
 */
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
            return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];
        }

        $query  = "SELECT * FROM `tbl_course` WHERE `id_subject` = '$id_subject' AND `group` = '$group' AND `period` = '$period' AND `local` = '$local' AND `date` = '$date' AND `semester` = '$semester' AND `id_schoolyear` = '$id_schoolyear' AND `teacher` = '$teacher'";
        $result = $this->db->select($query);

        if ($result) return ["status" => "error", "message" => "Dữ liệu đã tồn tại!"];

        $query  = "INSERT INTO `tbl_course`(`id_subject`, `group`, `teacher`, `period`, `local`, `date`, `semester`, `id_schoolyear`) VALUES ('$id_subject','$group', '$teacher','$period','$local', '$date','$semester','$id_schoolyear')";
        $result = $this->db->insert($query);

        if ($result) return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];

        return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
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

            if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
        }
        return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
    }

    public function getDetailedCourse($id_schoolyear, $semester, $date)
    {
        $query  = "SELECT tbl_course.*, tbl_subject.subject, tbl_schoolyear.schoolyear FROM  tbl_course, tbl_subject, tbl_schoolyear WHERE tbl_course.id_schoolyear = '$id_schoolyear' AND tbl_course.semester = '$semester' AND tbl_course.date = '$date' AND tbl_course.id_subject = tbl_subject.id_subject AND tbl_course.id_schoolyear = tbl_schoolyear.id_schoolyear ORDER BY period DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function deleteDetailedCourse($id_course)
    {
        $id_course      = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_course));

        $query          = "SELECT * FROM `tbl_course` WHERE `id_course` = '$id_course'";
        $result         = $this->db->select($query);

        if ($result) {
            $query      = "DELETE FROM `tbl_course` WHERE `id_course` = '$id_course'";
            $result     = $this->db->delete($query);

            if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
        }
        return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
    }
}
