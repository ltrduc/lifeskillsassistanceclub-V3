<?php
include_once('./source/core/lib/database.php');
include_once('./source/core/helpers/format.php');
?>

<?php
/**
 * Device
 */
class Device
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  // Quản lý nhóm thiết bị
  public function getDeviceGroup()
  {
    $query  = "SELECT * FROM `tbl_devicegroup`";
    $result = $this->db->select($query);
    return $result;
  }

  public function setDeviceGroup($devicegroup, $note)
  {
    $devicegroup  = mysqli_real_escape_string($this->db->link, $this->fm->validation($devicegroup));
    $note         = mysqli_real_escape_string($this->db->link, $this->fm->validation($note));

    if (empty($devicegroup)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query        = "SELECT * FROM `tbl_devicegroup` WHERE devicegroup = '$devicegroup' LIMIT 1";
    $result       = $this->db->select($query);

    if ($result) return ["status" => "error", "message" => "Nhóm thiết bị đã tồn tại!"];

    $query        = "INSERT INTO `tbl_devicegroup`(`devicegroup`, `note`) VALUES ('$devicegroup','$note')";
    $result       = $this->db->insert($query);

    if ($result) return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];

    return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
  }

  public function editDeviceGroup($id_devicegroup, $devicegroup, $note)
  {
    $id_devicegroup = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_devicegroup));
    $devicegroup    = mysqli_real_escape_string($this->db->link, $this->fm->validation($devicegroup));
    $note           = mysqli_real_escape_string($this->db->link, $this->fm->validation($note));

    if (empty($devicegroup)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query          = "UPDATE `tbl_devicegroup` SET `devicegroup`='$devicegroup',`note`='$note' WHERE `id_devicegroup`='$id_devicegroup'";
    $result         = $this->db->update($query);

    if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];

    return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
  }

  public function deleteDeviceGroup($id_devicegroup)
  {
    $id_devicegroup = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_devicegroup));

    $query          = "SELECT * FROM tbl_devicegroup WHERE id_devicegroup = '$id_devicegroup'";
    $result         = $this->db->select($query);

    if ($result) {
      $query        = "DELETE FROM tbl_devicegroup WHERE id_devicegroup = '$id_devicegroup'";
      $result       = $this->db->delete($query);

      if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
    }
    return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
  }

  // Quản lý thiết bị
  public function getDevice()
  {
    $query  = "SELECT tbl_device.*, tbl_devicegroup.devicegroup FROM tbl_device, tbl_devicegroup WHERE tbl_device.id_devicegroup = tbl_devicegroup.id_devicegroup";
    $result = $this->db->select($query);
    return $result;
  }

  public function setDevice($id_devicegroup, $device, $description, $note)
  {
    $id_devicegroup = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_devicegroup));
    $device         = mysqli_real_escape_string($this->db->link, $this->fm->validation($device));
    $description    = mysqli_real_escape_string($this->db->link, $this->fm->validation($description));
    $note           = mysqli_real_escape_string($this->db->link, $this->fm->validation($note));

    if (empty($id_devicegroup) || empty($device)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query        = "SELECT * FROM `tbl_device` WHERE id_devicegroup='$id_devicegroup' AND device = '$device' LIMIT 1";
    $result       = $this->db->select($query);

    if ($result) return ["status" => "error", "message" => "Thiết bị đã tồn tại!"];

    $query        = "INSERT INTO `tbl_device`(`id_devicegroup`, `device`, `description`, `note`) VALUES ('$id_devicegroup','$device','$description','$note')";
    $result       = $this->db->insert($query);

    if ($result) return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];

    return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
  }

  public function editDevice($id_device, $id_devicegroup, $device, $description, $note)
  {
    $id_device      = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_device));
    $id_devicegroup = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_devicegroup));
    $device         = mysqli_real_escape_string($this->db->link, $this->fm->validation($device));
    $description    = mysqli_real_escape_string($this->db->link, $this->fm->validation($description));
    $note           = mysqli_real_escape_string($this->db->link, $this->fm->validation($note));

    if (empty($id_device) || empty($id_devicegroup) || empty($device)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query          = "UPDATE `tbl_device` SET `id_devicegroup`='$id_devicegroup',`device`='$device',`description`='$description',`note`='$note' WHERE `id_device`='$id_device'";
    $result         = $this->db->update($query);

    if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];

    return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
  }

  public function deleteDevice($id_device)
  {
    $id_device  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_device));

    $query      = "SELECT * FROM tbl_device WHERE id_device = '$id_device'";
    $result     = $this->db->select($query);

    if ($result) {
      $query    = "DELETE FROM tbl_device WHERE id_device = '$id_device'";
      $result   = $this->db->delete($query);

      if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
    }
    return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
  }
}
