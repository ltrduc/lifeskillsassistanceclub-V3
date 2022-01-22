<?php
class Permission
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function Admin($pmsAdmin)
  {
    if ($pmsAdmin == 1) return true;
    return false;
  }

  public function Attendance($pmsAttendance)
  {
    if ($pmsAttendance == 1) return true;
    return false;
  }

  public function Post($pmsPost)
  {
    if ($pmsPost == 1) return true;
    return false;
  }
}
