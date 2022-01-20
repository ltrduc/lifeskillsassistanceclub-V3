<?php
include_once('./source/core/lib/database.php');
include_once('./source/core/helpers/format.php');
?>

<?php
/**
 * Permission
 */
class Permission
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function Admin($id_user)
  {
    $query  = "SELECT * FROM tbl_decentralization WHERE id_user = '$id_user' LIMIT 1";
    $result = $this->db->select($query);

    if ($result) {
      $value = $result->fetch_assoc();
      if ($value['admin'] == 1) {
        return true;
      }
    }
    return false;
  }

  public function Attendance($id_user)
  {
    $query  = "SELECT * FROM tbl_decentralization WHERE id_user = '$id_user' LIMIT 1";
    $result = $this->db->select($query);

    if ($result) {
      $value = $result->fetch_assoc();
      if ($value['attendance'] == 1) {
        return true;
      }
    }
    return false;
  }

  public function Post($id_user)
  {
    $query  = "SELECT * FROM tbl_decentralization WHERE id_user = '$id_user' LIMIT 1";
    $result = $this->db->select($query);

    if ($result) {
      $value = $result->fetch_assoc();
      if ($value['post'] == 1) {
        return true;
      }
    }
    return false;
  }
}
