<?php
include_once('./source/core/lib/database.php');
include_once('./source/core/helpers/format.php');
?>

<?php
/**
 * Profile
 */
class Profile
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function getProfile($id_user)
  {
    $query  = "SELECT tbl_user.id_user, tbl_user.fullname, tbl_user.id_student,
    (CASE WHEN phone IS NULL THEN '[---]' ELSE (SELECT phone FROM tbl_user WHERE id_user = '$id_user') END) AS phone,
    (CASE WHEN birthday IS NULL THEN '[---]' ELSE (SELECT birthday FROM tbl_user WHERE id_user = '$id_user') END) AS birthday,
    (CASE WHEN facebook IS NULL THEN '[---]' ELSE (SELECT facebook FROM tbl_user WHERE id_user = '$id_user') END) AS facebook,
    (CASE WHEN tbl_user.role = 0 THEN 'Thành viên' ELSE 'Cộng tác viên' END) AS role,
    (CASE WHEN tbl_user.id_team IS NULL THEN '[---]' ELSE (SELECT tbl_team.name FROM tbl_user, tbl_team WHERE tbl_user.id_team = tbl_team.id_team AND tbl_user.id_user = '$id_user') END) AS team,
    (CASE WHEN COUNT(tbl_position.name) = 0 THEN '[---]' ELSE tbl_position.name END) AS position
    FROM tbl_user, tbl_executive, tbl_position WHERE tbl_executive.id_position = tbl_position.id_position AND tbl_executive.id_user = tbl_user.id_user AND tbl_user.id_user = '$id_user'";
    $result = $this->db->select($query);
    return $result;
  }
}
