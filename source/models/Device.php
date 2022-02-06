<?php
class Device
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ NHÓM THIẾT BỊ
  |--------------------------------------------------------------------------
  */
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

  public function updateDeviceGroup($id_devicegroup, $devicegroup, $note)
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

  /*
  |--------------------------------------------------------------------------
  | DANH MỤC THIẾT BỊ
  |--------------------------------------------------------------------------
  */
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

  public function updateDevice($id_device, $id_devicegroup, $device, $description, $note)
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

  /*
  |--------------------------------------------------------------------------
  | THỐNG KÊ THIẾT BỊ
  |--------------------------------------------------------------------------
  */
  public function getDeviceStatistics()
  {
    $query  = "SELECT tbl_devicestatistics.*, tbl_device.device, tbl_devicegroup.devicegroup FROM `tbl_devicestatistics`, `tbl_device`, `tbl_devicegroup` WHERE tbl_devicestatistics.id_device = tbl_device.id_device AND tbl_device.id_devicegroup = tbl_devicegroup.id_devicegroup";
    $result = $this->db->select($query);
    return $result;
  }

  public function setDeviceStatistics($id_device, $quantily)
  {
    $id_device  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_device));
    $quantily   = mysqli_real_escape_string($this->db->link, $this->fm->validation($quantily));

    if (empty($id_device) || empty($quantily)) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query      = "SELECT * FROM `tbl_devicestatistics` WHERE id_device = '$id_device' LIMIT 1";
    $result     = $this->db->select($query);

    if ($result) return ["status" => "error", "message" => "Thiết bị đã tồn tại!"];

    $query      = "INSERT INTO `tbl_devicestatistics`(`id_device`, `quantily`, `donotuse`) VALUES ('$id_device','$quantily','$quantily')";
    $result     = $this->db->insert($query);

    if ($result) return ["status" => "success", "message" => "Đã thêm dữ liệu thành công!"];

    return ["status" => "error", "message" => "Đã thêm dữ liệu thất bại!"];
  }

  public function deleteDeviceStatistics($id_devicestatistics)
  {
    $id_devicestatistics  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_devicestatistics));

    $query      = "SELECT * FROM tbl_devicestatistics WHERE id_devicestatistics = '$id_devicestatistics'";
    $result     = $this->db->select($query);

    if ($result) {
      $query    = "DELETE FROM tbl_devicestatistics WHERE id_devicestatistics = '$id_devicestatistics'";
      $result   = $this->db->delete($query);

      if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];
    }
    return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
  }

  public function updateDeviceStatistics($id_devicestatistics, $quantily, $donotuse, $broken, $lost)
  {
    $id_devicestatistics  = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_devicestatistics));
    $quantily             = mysqli_real_escape_string($this->db->link, $this->fm->validation($quantily));
    $donotuse             = mysqli_real_escape_string($this->db->link, $this->fm->validation($donotuse));
    $broken               = mysqli_real_escape_string($this->db->link, $this->fm->validation($broken));
    $lost                 = mysqli_real_escape_string($this->db->link, $this->fm->validation($lost));

    if (empty($id_devicestatistics) || $quantily == null || $donotuse == null || $broken == null || $lost == null) return ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];

    $query              = "SELECT * FROM tbl_devicestatistics WHERE id_devicestatistics = '$id_devicestatistics'";
    $result             = $this->db->select($query);
    $value              = $result->fetch_assoc();
    $quantily_initial   = $value['quantily'];

    if ($quantily < $quantily_initial) return ["status" => "error", "message" => "Số lượng nhập vào không hợp lệ!"];

    $query              = "UPDATE `tbl_devicestatistics` SET `quantily`='$quantily',`donotuse`='$donotuse'+('$quantily'-'$quantily_initial'),`using`=`quantily`-`donotuse`,`broken`='$broken',`lost`='$lost',`normal`=`using`-`broken`-`lost` WHERE `id_devicestatistics`='$id_devicestatistics'";
    $result             = $this->db->update($query);

    if ($result) return ["status" => "success", "message" => "Đã cập nhật liệu thành công!"];

    return ["status" => "error", "message" => "Đã cập nhật liệu thất bại!"];
  }
}
