<?php
class Admin extends Controller
{
  private $Dashboard;
  private $Decentralization;
  private $Executive;
  private $Personnel;
  private $Position;
  private $Team;
  private $SchoolYear;
  private $Recruitment;
  private $Attendance;

  function __construct()
  {
    $this->Dashboard        = $this->model("Dashboard");
    $this->Executive        = $this->model("Executive");
    $this->Personnel        = $this->model("Personnel");
    $this->Position         = $this->model("Position");
    $this->Team             = $this->model("Team");
    $this->Decentralization = $this->model("Decentralization");
    $this->SchoolYear       = $this->model("SchoolYear");
    $this->Recruitment      = $this->model("Recruitment");
    $this->Attendance       = $this->model("Attendance");
  }

  // Trang chủ
  public function Home()
  {
    $Notification = [];
    $this->view("layout", [
      "page"                  => "home/dashboard",
      "CountPost"             => $this->Dashboard->Post(),
      "CountCollaborate"      => $this->Dashboard->Collaborate(),
      "CountMember"           => $this->Dashboard->Member(),
      "CountAdministration"   => $this->Dashboard->Administration(),
      "CountPersonnel"        => $this->Dashboard->Personnel(),
      "Notification"          => $Notification,
    ]);
  }

  // // Quản lý buổi trực
  public function Attendance()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (empty($_POST['id_schoolyear']) || empty($_POST['semester']) || empty($_POST['date']) || empty($_POST['shift'])) {
        $Notification = ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];
      } else if (empty($_POST['attendance'])) {
        $Notification = ["status" => "error", "message" => "Chưa có thành viên nào điểm danh!"];
      } else {
        foreach ($_POST['attendance'] as $id => $attendance) {;
          $id_user        = $_POST['id_user'][$id];
          $id_schoolyear  = $_POST['id_schoolyear'];
          $semester       = $_POST['semester'];
          $date           = $_POST['date'];
          $shift          = $_POST['shift'];
          $Notification   = $this->Attendance->setAttendance($id_user, $id_schoolyear, $semester, $date, $shift, $attendance);
        }
      }
    }

    $this->view("layout", [
      "page"            => "attendance/attendance",
      "ListPersonnel"   => $this->Personnel->getPersonnel(),
      "ListSchoolYear"  => $this->SchoolYear->getSchoolYear(),
      "Attendance"      => $this->model("Attendance"),
      "Notification"    => $Notification,
    ]);
  }

  // Quản lý khóa học
  public function SchoolYear()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addSchoolYear'])) {
        $schoolyear     = $_POST['schoolyear'];
        $Notification   = $this->SchoolYear->setSchoolYear($schoolyear);
      }
      if (isset($_POST['deleteSchoolYear'])) {
        $id_schoolyear  = $_POST['id_schoolyear'];
        $Notification   = $this->SchoolYear->deleteSchoolYear($id_schoolyear);
      }
    }

    $this->view("layout", [
      "page"            => "school-year/school-year",
      "ListSchoolYear"  => $this->SchoolYear->getSchoolYear(),
      "Notification"    => $Notification,
    ]);
  }

  // Thống kê buổi trực
  public function Statistics()
  {
    $Notification = [];
    $this->view("layout", [
      "page"          => "attendance-statistics/statistics",
      "Notification"  => $Notification,
    ]);
  }

  public function GeneralStatistics()
  {
    $Notification = [];
    $this->view("layout", [
      "page"          => "attendance-statistics/general",
      "Notification"  => $Notification,
    ]);
  }

  public function DetailedStatistics()
  {
    $Notification = [];
    $this->view("layout", [
      "page"          => "attendance-statistics/detailed",
      "Notification"  => $Notification,
    ]);
  }

  // Quản lý nhân sự
  public function Member()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addMember'])) {
        $id_student   = $_POST['id_student'];
        $fullname     = $_POST['fullname'];
        $id_team      = $_POST['id_team'];
        $Notification = $this->Personnel->setMember($id_student, $fullname, $id_team);
      }
      if (isset($_POST['deleteMember'])) {
        $id_user      = $_POST['id_user'];
        $Notification = $this->Personnel->deletePersonnel($id_user);
      }
      if (isset($_POST['editMember'])) {
        $id_user      = $_POST['id_user'];
        $id_student   = $_POST['id_student'];
        $fullname     = $_POST['fullname'];
        $Notification = $this->Personnel->eidtPersonnel($id_user, $id_student, $fullname);
      }
    }

    $this->view("layout", [
      "page"          => "member/member",
      "ListMember"    => $this->Personnel->getMember(),
      "ListTeam"      => $this->Team->getTeam(),
      "Notification"  => $Notification,
    ]);
  }

  public function DetailedMember()
  {
    $Notification = [];
    $this->view("layout", [
      "page"          => "member/detailed",
      "ListMember"    => $this->Personnel->getMember(),
      "Notification"  => $Notification,
    ]);
  }

  public function Collaborate()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addCollaborate'])) {
        $id_student   = $_POST['id_student'];
        $fullname     = $_POST['fullname'];
        $Notification = $this->Personnel->setCollaborate($id_student, $fullname);
      }
      if (isset($_POST['deleteCollaborate'])) {
        $id_user      = $_POST['id_user'];
        $Notification = $this->Personnel->deletePersonnel($id_user);
      }
      if (isset($_POST['editCollaborate'])) {
        $id_user      = $_POST['id_user'];
        $id_student   = $_POST['id_student'];
        $fullname     = $_POST['fullname'];
        $Notification = $this->Personnel->eidtPersonnel($id_user, $id_student, $fullname);
      }
    }

    $this->view("layout", [
      "page"              => "collaborate/collaborate",
      "ListCollaborate"   => $this->Personnel->getCollaborate(),
      "Notification"      => $Notification,
    ]);
  }

  public function DetailedCollaborate()
  {
    $Notification = [];
    $this->view("layout", [
      "page"              => "collaborate/detailed",
      "ListCollaborate"   => $this->Personnel->getCollaborate(),
      "Notification"      => $Notification,
    ]);
  }

  public function RecruitMember()
  {
    $Notification   = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $Notification = $this->Recruitment->deleteRecruitment();
    }

    $this->view("layout", [
      "page"              => "recruit-member/recruit",
      "ListRecruitment"   => $this->Recruitment->getRecruitment(),
      "Notification"      => $Notification,
    ]);
  }

  // Quản lý cơ cấu
  public function Executive()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addExecutive'])) {
        $id_user      = $_POST['id_user'];
        $id_position  = $_POST['id_position'];
        $Notification = $this->Executive->setExecutive($id_user, $id_position);
      }
      if (isset($_POST['deleteExecutive'])) {
        $id_executive = $_POST['id_executive'];
        $Notification = $this->Executive->deleteExecutive($id_executive);
      }
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
        $name         = $_POST['name'];
        $description  = $_POST['description'];
        $Notification = $this->Team->setTeam($name, $description);
      }
      if (isset($_POST['deleteTeam'])) {
        $id_team      = $_POST['id_team'];
        $Notification = $this->Team->deleteTeam($id_team);
      }
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
      $name         = $_POST['name'];
      $description  = $_POST['description'];
      $Notification = $this->Team->eidtTeam($id_team, $name, $description);
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
        $name         = $_POST['name'];
        $description  = $_POST['description'];
        $Notification = $this->Position->setPosition($name, $description);
      }
      if (isset($_POST['deletePosition'])) {
        $id_position  = $_POST['id_position'];
        $Notification = $this->Position->deletePosition($id_position);
      }
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
      $name         = $_POST['name'];
      $description  = $_POST['description'];
      $Notification = $this->Position->eidtPosition($id_position, $name, $description);
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
        $id_decentralization  = $_POST['id_decentralization'];
        $admin                = $_POST['admin'];
        $Notification         = $this->Decentralization->Admin($id_decentralization, $admin);
      }
      if (isset($_POST['attendance'])) {
        $id_decentralization  = $_POST['id_decentralization'];
        $attendance           = $_POST['attendance'];
        $Notification         = $this->Decentralization->Attendance($id_decentralization, $attendance);
      }
      if (isset($_POST['post'])) {
        $id_decentralization  = $_POST['id_decentralization'];
        $post                 = $_POST['post'];
        $Notification         = $this->Decentralization->Post($id_decentralization, $post);
      }
      if (isset($_POST['administration'])) {
        $id_student           = $_POST['id_student'];
        $role                 = $_POST['role'];
        $id_team              = $_POST['id_team'];
        $Notification         = $this->Decentralization->Administration($id_student, $role, $id_team);
      }
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
      $Notification = $this->Personnel->resetPassword($id_user);
    }

    $this->view("layout", [
      "page"          => "reset-password/reset-password",
      "ListPersonnel" =>  $this->Personnel->getPersonnel(),
      "Notification"  =>  $Notification,
    ]);
  }
}
