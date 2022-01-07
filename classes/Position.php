<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * Position
 */
class Position
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getPosition()
    {
        $query  = "SELECT * FROM tbl_position";
        $result = $this->db->select($query);
        return $result;
    }

    public function getPositionId($id_position)
    {
        $query  = "SELECT * FROM tbl_position WHERE id_position = '$id_position'";
        $result = $this->db->select($query);
        return $result;
    }

    public function setPosition($name, $description)
    {
        $name           = mysqli_real_escape_string($this->db->link, $this->fm->validation($name));
        $description    = mysqli_real_escape_string($this->db->link, $description);

        if (empty($name) || empty($description)) {
            return '{"status":"error", "message":"Vui lòng nhập đầy đủ dữ liệu!"}';
        }

        $query  = "SELECT * FROM tbl_position WHERE name = '$name' LIMIT 1";
        $result = $this->db->select($query);

        if ($result) {
            return '{"status":"error", "message":"' . $name . ' đã tồn tại!"}';
        }

        $query  = "INSERT INTO `tbl_position`(`name`, `description`) VALUES ('$name', '$description')";
        $result = $this->db->insert($query);

        if ($result) {
            return '{"status":"success", "message":"Đã thêm dữ liệu thành công!"}';
        }
        return '{"status":"error", "message":"Đã thêm dữ liệu thất bại!"}';
    }

    public function deletePosition($id_position)
    {
        $id_position    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_position));
        $query          = "SELECT * FROM tbl_position WHERE id_position = '$id_position'";
        $result         = $this->db->select($query);

        if ($result) {
            $query  = "DELETE FROM tbl_position WHERE id_position = '$id_position'";
            $result = $this->db->delete($query);

            if ($result) {
                return '{"status":"success", "message":"Đã xóa dữ liệu thành công!"}';
            }
        }
        return '{"status":"error", "message":"Đã xóa dữ liệu thất bại!"}';
    }

    public function eidtPosition($id_position, $name, $description)
    {
        $id_position    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_position));
        $name           = mysqli_real_escape_string($this->db->link, $this->fm->validation($name));
        $description    = mysqli_real_escape_string($this->db->link, $description);

        if (empty($name) || empty($description)) {
            return '{"status":"error", "message":"Vui lòng nhập đầy đủ dữ liệu!"}';
        }

        $query  = "UPDATE `tbl_position` SET `name`='$name', `description`='$description' WHERE `id_position`='$id_position'";
        $result = $this->db->update($query);

        if ($result) {
            return '{"status":"success", "message":"Đã cập nhật liệu thành công!"}';
        }
        return '{"status":"error", "message":"Đã cập nhật liệu thất bại!"}';
    }
}
