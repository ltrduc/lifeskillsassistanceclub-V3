<?php
class Admin extends Controller
{
  private $Dashboard;
  private $Decentralization;
  private $Executive;
  private $Personnel;
  private $Position;
  private $Team;

  function __construct()
  {
    $this->Dashboard        = $this->model("Dashboard");
    $this->Executive        = $this->model("Executive");
    $this->Personnel        = $this->model("Personnel");
    $this->Position         = $this->model("Position");
    $this->Team             = $this->model("Team");
    $this->Decentralization = $this->model("Decentralization");
  }

  // Trang chủ
  public function Home()
  {
    $this->view("layout", [
      "page"                  => "home/dashboard",
      "CountPost"             => $this->Dashboard->Post(),
      "CountCollaborate"      => $this->Dashboard->Collaborate(),
      "CountMember"           => $this->Dashboard->Member(),
      "CountAdministration"   => $this->Dashboard->Administration(),
      "CountPersonnel"        => $this->Dashboard->Personnel(),
    ]);
  }

  // // Quản lý buổi trực
  public function Attendance()
  {
    $this->view("layout", [
      "page" => "attendance/attendance",
    ]);
  }

  // Thống kê buổi trực
  public function Statistics()
  {
    $this->view("layout", [
      "page" => "attendance-statistics/statistics",
    ]);
  }

  public function GeneralStatistics()
  {
    $this->view("layout", [
      "page" => "attendance-statistics/general",
    ]);
  }

  public function DetailedStatistics()
  {
    $this->view("layout", [
      "page" => "attendance-statistics/detailed",
    ]);
  }

  // Quản lý cơ cấu
  public function Executive()
  {
    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addExecutive'])) {
        $id_user          = $_POST['id_user'];
        $id_position      = $_POST['id_position'];
        $Executive_Check  = $this->Executive->setExecutive($id_user, $id_position);
      }
      if (isset($_POST['deleteExecutive'])) {
        $id_executive     = $_POST['id_executive'];
        $Executive_Check  = $this->Executive->deleteExecutive($id_executive);
      }
      if (isset($Executive_Check)) $Notification = $Executive_Check;
    }

    $this->view("layout", [
      "page"          => "organization/executive",
      "ListExecutive" => $this->Executive->getExecutive(),
      "ListMember"    => $this->Personnel->getMember(),
      "ListPosition"  => $this->Position->getPosition(),
      "Notification"  => $Notification,
    ]);
  }

  public function Team()
  {
    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addTeam'])) {
        $name           = $_POST['name'];
        $description    = $_POST['description'];
        $Team_Check     = $this->Team->setTeam($name, $description);
      }
      if (isset($_POST['deleteTeam'])) {
        $id_team        = $_POST['id_team'];
        $Team_Check     = $this->Team->deleteTeam($id_team);
      }
      if (isset($Team_Check)) $Notification = $Team_Check;
    }

    $this->view("layout", [
      "page"          => "organization/team/team",
      "ListTeam"      => $this->Team->getTeam(),
      "Notification"  => $Notification,
    ]);
  }

  public function EditTeam()
  {
    if (!isset($_GET['id']) || $_GET['id'] == NULL) {
      header('Location: Team');
    }

    $Notification = [];
    $id_team      = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name           = $_POST['name'];
      $description    = $_POST['description'];
      $Team_Check     = $this->Team->eidtTeam($id_team, $name, $description);

      if (isset($Team_Check)) $Notification = $Team_Check;
    }

    $this->view("layout", [
      "page"          => "organization/team/edit",
      "ListTeamId"    =>  $this->Team->getTeamId($id_team),
      "Notification"  =>  $Notification,
    ]);
  }

  public function Position()
  {
    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addPosition'])) {
        $name           = $_POST['name'];
        $description    = $_POST['description'];
        $Position_check = $this->Position->setPosition($name, $description);
      }
      if (isset($_POST['deletePosition'])) {
        $id_position    = $_POST['id_position'];
        $Position_check = $this->Position->deletePosition($id_position);
      }
      if (isset($Position_check)) $Notification = $Position_check;
    }

    $this->view("layout", [
      "page"          => "organization/position/position",
      "ListPosition"  => $this->Position->getPosition(),
      "Notification"  => $Notification,
    ]);
  }

  public function EditPosition()
  {
    if (!isset($_GET['id']) || $_GET['id'] == NULL) {
      header('Location: Position');
    }

    $Notification = [];
    $id_position  = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name           = $_POST['name'];
      $description    = $_POST['description'];
      $Position_check = $this->Position->eidtPosition($id_position, $name, $description);

      if (isset($Position_check)) $Notification = $Position_check;
    }

    $this->view("layout", [
      "page"              => "organization/position/edit",
      "ListPositionId"    =>  $this->Position->getPositionId($id_position),
      "Notification"      =>  $Notification,
    ]);
  }

  // Thao tác khác
  public function Decentralization()
  {
    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['admin'])) {
        $id_decentralization    = $_POST['id_decentralization'];
        $admin                  = $_POST['admin'];
        $Decentralization_check = $this->Decentralization->Admin($id_decentralization, $admin);
      }
      if (isset($_POST['attendance'])) {
        $id_decentralization    = $_POST['id_decentralization'];
        $attendance             = $_POST['attendance'];
        $Decentralization_check = $this->Decentralization->Attendance($id_decentralization, $attendance);
      }
      if (isset($_POST['post'])) {
        $id_decentralization    = $_POST['id_decentralization'];
        $post                   = $_POST['post'];
        $Decentralization_check = $this->Decentralization->Post($id_decentralization, $post);
      }
      if (isset($_POST['administration'])) {
        $id_student             = $_POST['id_student'];
        $role                   = $_POST['role'];
        $id_team                = $_POST['id_team'];
        $Decentralization_check = $this->Decentralization->Administration($id_student, $role, $id_team);
      }
      if (isset($Decentralization_check)) $Notification = $Decentralization_check;
    }

    $this->view("layout", [
      "page"                  => "decentralization/decentralization",
      "ListTeam"              =>  $this->Team->getTeam(),
      "ListDecentralization"  =>  $this->Decentralization->getDecentralization(),
      "Notification"          =>  $Notification,
    ]);
  }

  public function ResetPassword()
  {
    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_user      = $_POST['id_user'];
      $Member_Check = $this->Personnel->resetPassword($id_user);

      if (isset($Member_Check)) $Notification = $Member_Check;
    }

    $this->view("layout", [
      "page"          => "reset-password/reset-password",
      "ListPersonnel" =>  $this->Personnel->getPersonnel(),
      "Notification"  =>  $Notification,
    ]);
  }
}
