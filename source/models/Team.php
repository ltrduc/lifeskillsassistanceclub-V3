<?php
include_once('./source/core/lib/database.php');
include_once('./source/core/helpers/format.php');
?>

<?php
/**
 * Team
 */
class Team
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getTeam()
    {
        $query  = "SELECT * FROM tbl_team";
        $result = $this->db->select($query);
        return $result;
    }

    public function getTeamId($id_team)
    {
        $query  = "SELECT * FROM tbl_team WHERE id_team = '$id_team'";
        $result = $this->db->select($query);
        return $result;
    }

    public function setTeam($name, $description)
    {
        $name           = mysqli_real_escape_string($this->db->link, $this->fm->validation($name));
        $description    = mysqli_real_escape_string($this->db->link, $description);

        if (empty($name) || empty($description)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

        $query  = "SELECT * FROM tbl_team WHERE name = '$name' LIMIT 1";
        $result = $this->db->select($query);

        if ($result) return ["status" => "error", "message" => "" . $name . " đã tồn tại!"];

        $query  = "INSERT INTO `tbl_team`(`name`, `description`) VALUES ('$name', '$description')";
        $result = $this->db->insert($query);

        if ($result) return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];

        return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
    }

    public function deleteTeam($id_team)
    {
        $id_team    = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_team));

        $query      = "SELECT * FROM tbl_team WHERE id_team = '$id_team'";
        $result     = $this->db->select($query);

        if ($result) {
            $query  = "DELETE FROM tbl_team WHERE id_team = '$id_team'";
            $result = $this->db->delete($query);

            if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
        }
        return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
    }

    public function eidtTeam($id_team, $name, $description)
    {
        $id_team        = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_team));
        $name           = mysqli_real_escape_string($this->db->link, $this->fm->validation($name));
        $description    = mysqli_real_escape_string($this->db->link, $description);

        if (empty($name) || empty($description)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

        $query  = "UPDATE `tbl_team` SET `name`='$name', `description`='$description' WHERE `id_team`='$id_team'";
        $result = $this->db->update($query);

        if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];

        return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
    }
}
