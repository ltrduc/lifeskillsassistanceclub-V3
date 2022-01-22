<?php
class Recruitment
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function getRecruitment()
  {
    $query  = "SELECT tbl_recruitment.*, tbl_team.name AS team FROM tbl_recruitment, tbl_team WHERE tbl_recruitment.id_team = tbl_team.id_team ORDER BY id_team ASC";
    $result = $this->db->select($query);
    return $result;
  }

  public function deleteRecruitment()
  {
    $query  = "DELETE FROM tbl_recruitment";
    $result = $this->db->delete($query);

    if ($result) return ["status" => "success", "message" => "Đã xóa dữ liệu thành công!"];

    return ["status" => "error", "message" => "Đã xóa dữ liệu thất bại!"];
  }
}
