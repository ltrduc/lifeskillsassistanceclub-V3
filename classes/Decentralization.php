<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * Decentralization
 */
class Decentralization
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function setDecentralization($id_student, $level)
    {
        $id_student = strtoupper(mysqli_real_escape_string($this->db->link, $this->fm->validation($id_student)));
        $level      = mysqli_real_escape_string($this->db->link, $this->fm->validation($level));

        if (empty($id_student) || empty($level)) {
            return '{"status":"error", "message":"Vui lòng nhập đầy đủ dữ liệu!"}';
        }

        $query  = "SELECT * FROM `tbl_user` WHERE id_student = '$id_student' LIMIT 1";
        $result = $this->db->select($query);

        if (!$result) {
            return '{"status":"error", "message":"' . $id_student . ' không tồn tại!"}';
        }

        $query  = "UPDATE `tbl_user` SET `level`='$level' WHERE `id_student`='$id_student'";
        $result = $this->db->update($query);

        if ($result) {
            return '{"status":"success", "message":"Đã cập nhật liệu thành công!"}';
        }
        return '{"status":"error", "message":"Đã cập nhật liệu thất bại!"}';
    }

    public function changeTeam($id_student, $id_team)
    {
        $id_student = strtoupper(mysqli_real_escape_string($this->db->link, $this->fm->validation($id_student)));
        $id_team    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_team));

        if (empty($id_student) || empty($id_team)) {
            return '{"status":"error", "message":"Vui lòng nhập đầy đủ dữ liệu!"}';
        }

        $query  = "SELECT * FROM `tbl_user` WHERE id_student = '$id_student' LIMIT 1";
        $result = $this->db->select($query);

        if (!$result) {
            return '{"status":"error", "message":"' . $id_student . ' không tồn tại!"}';
        }

        $query  = "UPDATE `tbl_user` SET `id_team`='$id_team', `role`='0' WHERE `id_student`='$id_student'";
        $result = $this->db->update($query);

        if ($result) {
            return '{"status":"success", "message":"Đã cập nhật liệu thành công!"}';
        }
        return '{"status":"error", "message":"Đã cập nhật liệu thất bại!"}';
    }

    public function changePersonnel($id_student, $role)
    {
        $id_student = strtoupper(mysqli_real_escape_string($this->db->link, $this->fm->validation($id_student)));
        $role    = mysqli_real_escape_string($this->db->link, $this->fm->validation($role));

        if (empty($id_student) || empty($role)) {
            return '{"status":"error", "message":"Vui lòng nhập đầy đủ dữ liệu!"}';
        }

        $query  = "SELECT * FROM `tbl_user` WHERE id_student = '$id_student' LIMIT 1";
        $result = $this->db->select($query);

        if (!$result) {
            return '{"status":"error", "message":"' . $id_student . ' không tồn tại!"}';
        }

        if ($role == 1) $role = 0;
        else $role = 1;

        $query  = "UPDATE `tbl_user` SET `role`='$role', `level`='3' WHERE `id_student`='$id_student'";
        $result = $this->db->update($query);

        if ($result) {
            return '{"status":"success", "message":"Đã cập nhật liệu thành công!"}';
        }
        return '{"status":"error", "message":"Đã cập nhật liệu thất bại!"}';
    }
}
