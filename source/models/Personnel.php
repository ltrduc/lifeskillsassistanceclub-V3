<?php
include_once('./source/core/lib/database.php');
include_once('./source/core/helpers/format.php');
?>

<?php
/**
 * Personnel
 */
class Personnel
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    // Thành viên
    public function getMember()
    {
        $query  = "SELECT tbl_user.*, tbl_team.name AS team FROM tbl_user, tbl_team WHERE tbl_user.id_team = tbl_team.id_team AND role = '0' ORDER BY id_team ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function setMember($id_student, $fullname, $id_team)
    {
        $id_student     = strtoupper(mysqli_real_escape_string($this->db->link, $this->fm->validation($id_student)));
        $fullname       = mysqli_real_escape_string($this->db->link, $this->fm->validation($fullname));
        $id_team        = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_team));
        $password_hash  = md5($id_student);
        $role           = 0;

        if (empty($id_student) || empty($fullname) || empty($id_team))
            return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

        if (strlen($id_student) > 9) return ["status" => "error", "message" => "Mã số sinh viên không đúng cú pháp!"];

        $query  = "SELECT * FROM tbl_user WHERE id_student = '$id_student' LIMIT 1";
        $result = $this->db->select($query);

        if ($result) return ["status" => "error", "message" => "Mã số ' . $id_student . ' đã tồn tại!"];

        $query  = "INSERT INTO `tbl_user`(`id_student`, `password`, `fullname`, `id_team`, `role`) VALUES ('$id_student', '$password_hash', '$fullname', '$id_team', '$role')";
        $result = $this->db->insert($query);

        if ($result) {
            $query  = "SELECT * FROM tbl_user WHERE id_student = '$id_student' LIMIT 1";
            $result = $this->db->select($query);

            if ($result) {
                $value      = $result->fetch_assoc();
                $id_user    = $value['id_user'];

                $query      = "INSERT INTO `tbl_decentralization`(`id_user`) VALUES ('$id_user')";
                $result     = $this->db->insert($query);

                if ($result) return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];
            }
        }
        return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
    }

    // Cộng tác viên
    public function getCollaborate()
    {
        $query  = "SELECT * FROM tbl_user WHERE role = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function setCollaborate($id_student, $fullname)
    {
        $id_student     = strtoupper(mysqli_real_escape_string($this->db->link, $this->fm->validation($id_student)));;
        $fullname       = mysqli_real_escape_string($this->db->link, $this->fm->validation($fullname));
        $password_hash  = md5($id_student);
        $role           = 1;

        if (empty($id_student) || empty($fullname)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

        if (strlen($id_student) > 9) return ["status" => "error", "message" => "Mã số sinh viên không đúng cú pháp!"];

        $query  = "SELECT * FROM tbl_user WHERE id_student = '$id_student' LIMIT 1";
        $result = $this->db->select($query);

        if ($result) return ["status" => "error", "message" => "Mã số ' . $id_student . ' đã tồn tại!"];

        $query  = "INSERT INTO `tbl_user`(`id_student`, `password`, `fullname`, `role`) VALUES ('$id_student', '$password_hash', '$fullname', '$role')";
        $result = $this->db->insert($query);

        if ($result) {
            $query  = "SELECT * FROM tbl_user WHERE id_student = '$id_student' LIMIT 1";
            $result = $this->db->select($query);

            if ($result) {
                $value      = $result->fetch_assoc();
                $id_user    = $value['id_user'];

                $query      = "INSERT INTO `tbl_decentralization`(`id_user`) VALUES ('$id_user')";
                $result     = $this->db->insert($query);

                if ($result) return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];
            }
        }
        return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
    }

    // Nhân sự (Chung)
    public function getPersonnel()
    {
        $query  = " SELECT * FROM tbl_user";
        $result = $this->db->select($query);
        return $result;
    }

    public function deletePersonnel($id_user)
    {
        $id_user    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_user));
        $query      = "SELECT * FROM tbl_user WHERE id_user = '$id_user'";
        $result     = $this->db->select($query);

        if ($result) {
            $query  = "DELETE FROM tbl_user WHERE id_user = '$id_user'";
            $result = $this->db->delete($query);

            if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
        }
        return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
    }

    public function eidtPersonnel($id_user, $id_student, $fullname)
    {
        $id_user    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_user));
        $id_student = strtoupper(mysqli_real_escape_string($this->db->link, $this->fm->validation($id_student)));
        $fullname   = mysqli_real_escape_string($this->db->link, $this->fm->validation($fullname));

        if (empty($id_student) || empty($fullname)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

        if (strlen($id_student) > 9) return ["status" => "error", "message" => "Mã số sinh viên không đúng cú pháp!"];

        $query  = "UPDATE `tbl_user` SET `id_student`='$id_student',`fullname`='$fullname' WHERE `id_user`='$id_user'";
        $result = $this->db->update($query);

        if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];

        return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
    }

    // Đặt lại mật khẩu
    public function resetPassword($id_user)
    {
        $id_user    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_user));
        $query      = "SELECT * FROM tbl_user WHERE id_user = '$id_user' LIMIT 1";
        $result     = $this->db->select($query);

        if ($result) {
            $value          = $result->fetch_assoc();
            $password_reset = md5($value['id_student']);

            $query          = "UPDATE `tbl_user` SET `password`='$password_reset' WHERE `id_user`='$id_user'";
            $result         = $this->db->update($query);

            if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];
        }
        return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
    }

    // Tuyển thành viên
    public function getRecruitment()
    {
        $query  = "SELECT tbl_recruitment.*, tbl_team.name AS team FROM tbl_recruitment, tbl_team WHERE tbl_recruitment.id_team = tbl_team.id_team ORDER BY id_team ASC";
        $result = $this->db->select($query);
        return $result;
    }
}
