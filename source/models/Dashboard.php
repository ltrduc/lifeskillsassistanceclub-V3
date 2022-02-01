<?php
class Dashboard
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
  | SỐ LƯỢNG BÀI ĐĂNG
  |--------------------------------------------------------------------------
  */
  public function Post()
  {
    return 0;
  }

  /*
  |--------------------------------------------------------------------------
  | SỐ LƯỢNG CỘNG TÁC VIÊN
  |--------------------------------------------------------------------------
  */
  public function Collaborate()
  {
    $query  = "SELECT COUNT(id_user) AS collaborate FROM tbl_user WHERE role = '1'";
    $result = $this->db->select($query);
    $value = $result->fetch_assoc();
    return $value['collaborate'];
  }

  /*
  |--------------------------------------------------------------------------
  | SỐ LƯỢNG THÀNH VIÊN
  |--------------------------------------------------------------------------
  */
  public function Member()
  {
    $query  = "SELECT COUNT(id_user) AS member FROM tbl_user WHERE role = '0'";
    $result = $this->db->select($query);
    $value  = $result->fetch_assoc();
    return $value['member'];
  }

  /*
  |--------------------------------------------------------------------------
  | SỐ LƯỢNG BAN ĐIỀU HÀNH
  |--------------------------------------------------------------------------
  */
  public function Administration()
  {
    $query  = "SELECT COUNT(id_executive) AS administration FROM tbl_executive";
    $result = $this->db->select($query);
    $value  = $result->fetch_assoc();
    return $value['administration'];
  }

  /*
  |--------------------------------------------------------------------------
  | SỐ LƯỢNG THÀNH VIÊN
  |--------------------------------------------------------------------------
  */
  public function Personnel()
  {
    $query  = "SELECT COUNT(id_user) AS personnel FROM tbl_user";
    $result = $this->db->select($query);
    $value = $result->fetch_assoc();
    return $value['personnel'];
  }

  /*
  |--------------------------------------------------------------------------
  | SỐ LƯỢNG CHỨC VỤ
  |--------------------------------------------------------------------------
  */
  public function Position()
  {
    $query  = "SELECT COUNT(id_position ) AS position FROM tbl_position";
    $result = $this->db->select($query);
    $value = $result->fetch_assoc();
    return $value['position'];
  }
}
