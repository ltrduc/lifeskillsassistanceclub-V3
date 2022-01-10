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

        if ($result) {
            return '{"status":"success", "message":"Đã cập nhật liệu thành công!"}';
        }
        return '{"status":"error", "message":"Đã cập nhật liệu thất bại!"}';
    }

    public function Attendance($id_decentralization, $attendance)
    {
        $id_decentralization    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_decentralization));
        $attendance             = mysqli_real_escape_string($this->db->link, $this->fm->validation($attendance));

        $query  = "UPDATE `tbl_decentralization` SET `admin`= '0', `attendance`='$attendance' WHERE id_decentralization = '$id_decentralization'";
        $result = $this->db->update($query);

        if ($result) {
            return '{"status":"success", "message":"Đã cập nhật liệu thành công!"}';
        }
        return '{"status":"error", "message":"Đã cập nhật liệu thất bại!"}';
    }

    public function Post($id_decentralization, $post)
    {
        $id_decentralization    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_decentralization));
        $post                   = mysqli_real_escape_string($this->db->link, $this->fm->validation($post));

        $query  = "UPDATE `tbl_decentralization` SET `admin`= '0', `post`='$post' WHERE id_decentralization = '$id_decentralization'";
        $result = $this->db->update($query);

        if ($result) {
            return '{"status":"success", "message":"Đã cập nhật liệu thành công!"}';
        }
        return '{"status":"error", "message":"Đã cập nhật liệu thất bại!"}';
    }
}
