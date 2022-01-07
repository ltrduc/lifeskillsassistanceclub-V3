<?php
$arr = UrlProcess();
if (isset($arr[0])) {
  switch ($arr[0]) {
    case 'Home':
      require_once 'pages/home/dashboard.php';
      break;

      // Quản lý buổi trực
    case 'Attendance':
      require_once 'pages/attendance/attendance.php';
      break;

      // Thống kê buổi trực
    case 'Statistics':
      require_once 'pages/attendance-statistics/statistics.php';
      break;
    case 'GeneralStatistics':
      require_once 'pages/attendance-statistics/general.php';
      break;
    case 'DetailedStatistics':
      require_once 'pages/attendance-statistics/detailed.php';
      break;

      // Quản lý nhân sự
    case 'Member':
      require_once 'pages/member/member.php';
      break;
    case 'DetailedMember':
      require_once 'pages/member/detailed.php';
      break;
    case 'Collaborate':
      require_once 'pages/collaborate/collaborate.php';
      break;
    case 'DetailedCollaborate':
      require_once 'pages/collaborate/detailed.php';
      break;
    case 'RecruitMember':
      require_once 'pages/recruit-member/recruit.php';
      break;

      // Quản lý cơ cấu
    case 'Executive':
      require_once 'pages/organization/executive.php';
      break;
    case 'Team':
      require_once 'pages/organization/team/team.php';
      break;
    case 'EditTeam':
      require_once 'pages/organization/team/edit.php';
      break;
    case 'Position':
      require_once 'pages/organization/position/position.php';
      break;
    case 'EditPosition':
      require_once 'pages/organization/position/edit.php';
      break;

      // Lỗi 404
    default:
      require_once 'pages/error/error-404.php';
      break;
  }
} else {
  require_once 'pages/home/dashboard.php';
}

function UrlProcess()
{
  if (isset($_GET["url"])) {
    return explode("/", filter_var(trim($_GET["url"], "/")));
  }
}
