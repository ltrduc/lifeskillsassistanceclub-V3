<?php
include_once('./source/core/lib/database.php');
include_once('./source/core/helpers/format.php');
?>

<?php
/**
 * Dashboard
 */
class Dashboard
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    // Số lượng bài đăng
    public function Post()
    {
        return 0;
    }

    // Số lượng cộng tác viên
    public function Collaborate()
    {
        $query  = "SELECT COUNT(id_user) AS collaborate FROM tbl_user WHERE role = '1'";
        $result = $this->db->select($query);
        $value = $result->fetch_assoc();
        return $value['collaborate'];
    }

    // Số lượng thành viên
    public function Member()
    {
        $query  = "SELECT COUNT(id_user) AS member FROM tbl_user WHERE role = '0'";
        $result = $this->db->select($query);
        $value  = $result->fetch_assoc();
        return $value['member'];
    }

    // Số lượng ban điều hành
    public function Administration()
    {
        $query  = "SELECT COUNT(id_executive) AS administration FROM tbl_executive";
        $result = $this->db->select($query);
        $value  = $result->fetch_assoc();
        return $value['administration'];
    }

    // Tổng số lượng nhân sự
    public function Personnel()
    {
        $query  = "SELECT COUNT(id_user) AS personnel FROM tbl_user";
        $result = $this->db->select($query);
        $value = $result->fetch_assoc();
        return $value['personnel'];
    }
}
