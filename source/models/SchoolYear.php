<?php
include_once('./source/core/lib/database.php');
include_once('./source/core/helpers/format.php');
?>

<?php
/**
 * SchoolYear
 */
class SchoolYear
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function getSchoolYear()
  {
    $query  = "SELECT * FROM tbl_schoolyear ORDER BY schoolyear DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function setSchoolYear($schoolyear)
  {
    $schoolyear   = mysqli_real_escape_string($this->db->link, $this->fm->validation($schoolyear));

    if (empty($schoolyear)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query  = "SELECT * FROM tbl_schoolyear WHERE schoolyear = '$schoolyear' LIMIT 1";
    $result = $this->db->select($query);

    if ($result) return ["status" => "error", "message" => "Năm học " . $schoolyear . " đã tồn tại!"];

    $query  = "INSERT INTO `tbl_schoolyear`(`schoolyear`) VALUES ('$schoolyear')";
    $result = $this->db->insert($query);

    if ($result) return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];

    return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
  }

  public function deleteSchoolYear($id_schoolyear)
  {
    $id_schoolyear  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_schoolyear));

    $query  = "SELECT * FROM tbl_schoolyear WHERE id_schoolyear = '$id_schoolyear'";
    $result = $this->db->select($query);

    if ($result) {
      $query  = "DELETE FROM tbl_schoolyear WHERE id_schoolyear = '$id_schoolyear'";
      $result = $this->db->delete($query);

      if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
    }
    return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
  }
}