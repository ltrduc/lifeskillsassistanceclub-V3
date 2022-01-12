<?php
include_once('./source/core/lib/database.php');
include_once('./source/core/helpers/format.php');
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

    public function getDecentralization()
    {
        $query  = " SELECT tbl_user.*, id_decentralization, admin, attendance, post FROM tbl_user, tbl_decentralization 
                    WHERE tbl_decentralization.id_user = tbl_user.id_user ORDER BY admin DESC, attendance DESC, post DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function Admin($id_decentralization, $admin)
    {
        $id_decentralization    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_decentralization));
        $admin                  = mysqli_real_escape_string($this->db->link, $this->fm->validation($admin));

        $query  = "UPDATE `tbl_decentralization` SET `admin`= '$admin', `attendance`='0', `post`='0' WHERE id_decentralization = '$id_decentralization'";
        $result = $this->db->update($query);

        if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];

        return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
    }

    public function Attendance($id_decentralization, $attendance)
    {
        $id_decentralization    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_decentralization));
        $attendance             = mysqli_real_escape_string($this->db->link, $this->fm->validation($attendance));

        $query  = "UPDATE `tbl_decentralization` SET `admin`= '0', `attendance`='$attendance' WHERE id_decentralization = '$id_decentralization'";
        $result = $this->db->update($query);

        if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];

        return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
    }

    public function Post($id_decentralization, $post)
    {
        $id_decentralization    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_decentralization));
        $post                   = mysqli_real_escape_string($this->db->link, $this->fm->validation($post));

        $query  = "UPDATE `tbl_decentralization` SET `admin`= '0', `post`='$post' WHERE id_decentralization = '$id_decentralization'";
        $result = $this->db->update($query);

        if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];

        return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
    }

    public function Administration($id_student, $role, $id_team)
    {
        $id_student = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_student));
        $role       = mysqli_real_escape_string($this->db->link, $this->fm->validation($role));
        $id_team    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_team));

        if (empty($id_student)) return ["status" => "error", "message" => "Vui lòng nhập mã số sinh viên!"];

        if ($role !== null) {
            if ($role == 0) {
                if (empty($id_team)) return ["status" => "error", "message" => "Vui lòng chọn ban hoạt động!"];

                $query  = "UPDATE `tbl_user` SET `id_team`='$id_team', `role`='$role' WHERE id_student = '$id_student'";
                $result = $this->db->update($query);

                if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];
            }
            if ($role == 1) {
                $query  = "UPDATE `tbl_user` SET `id_team`=null, `role`='$role' WHERE id_student = '$id_student'";
                $result = $this->db->update($query);

                if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];
            }
        }

        if (!empty($id_team)) {
            $query  = "SELECT * FROM `tbl_user` WHERE id_student = '$id_student'";
            $result = $this->db->select($query);
            $value  = $result->fetch_assoc();
            $role   = $value['role'];

            if ($role == 1) return ["status" => "error", "message" => "' . $id_student . ' chưa phải là thành viên!"];

            $query  = "UPDATE `tbl_user` SET `id_team`='$id_team' WHERE id_student = '$id_student'";
            $result = $this->db->update($query);

            if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];
        }
        return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
    }
}
