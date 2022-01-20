<?php
include './source/core/lib/session.php';
Session::checkSession();
?>
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
  private $Statistics;
  private $Subject;
  private $Course;
  private $Schedule;
  private $Password;
  private $Profile;
  private $Borrow;
  private $pmsAdmin;
  private $pmsAttendanc;
  private $pmsPost;

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
    $this->Statistics       = $this->model("Statistics");
    $this->Subject          = $this->model("Subject");
    $this->Course           = $this->model("Course");
    $this->Schedule         = $this->model("Schedule");
    $this->Profile          = $this->model("Profile");
    $this->Password         = $this->model("Password");
    $this->Borrow           = $this->model("Borrow");

    $this->pmsAdmin         = $this->Permission->Admin(Session::get('id_user'));
    $this->pmsAttendance    = $this->Permission->Attendance(Session::get('id_user'));
    $this->pmsPost          = $this->Permission->Post(Session::get('id_user'));
  }

  // TRANG CHỦ
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
      "ListCourseToday"       => $this->Course->getCourseToday(),
      "Notification"          => $Notification,
    ]);
  }

  // QUẢN LÝ LỊCH TRỰC
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
      "Notification"    => $Notification,
    ]);
  }

  public function Schedule()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addSchedule'])) {
        $id_student  = $_POST['id_student'];
        $session  = $_POST['session'];
        $shift1   = "";
        $shift2   = "";
        $shift3   = "";
        $shift4   = "";

        if (isset($_POST['shift1'])) $shift1 = $_POST['shift1'];
        if (isset($_POST['shift2'])) $shift2 = $_POST['shift2'];
        if (isset($_POST['shift3'])) $shift3 = $_POST['shift3'];
        if (isset($_POST['shift4'])) $shift4 = $_POST['shift4'];
        $Notification = $this->Schedule->setSchedule($id_student, $session, $shift1, $shift2, $shift3, $shift4);
      }
      if (isset($_POST['deleteSchedule'])) {
        $id_schedule  = $_POST['id_schedule'];
        $Notification = $this->Schedule->deleteSchedule($id_schedule);
      }
      if (isset($_POST['deleteAllSchedule'])) {
        $Notification = $this->Schedule->deleteAllSchedule();
      }
    }

    $this->view("layout", [
      "page"            => "schedule/Schedule",
      "Monday"          => $this->Schedule->getSchedule(),
      "Tuesday"         => $this->Schedule->getSchedule(),
      "Wednesday"       => $this->Schedule->getSchedule(),
      "Thursday"        => $this->Schedule->getSchedule(),
      "Friday"          => $this->Schedule->getSchedule(),
      "Saturday"        => $this->Schedule->getSchedule(),
      "ListMember"      => $this->Personnel->getMember(),
      "Notification"    => $Notification,
    ]);
  }

  public function Statistics()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_schoolyear  = $_POST['id_schoolyear'];
      $semester       = $_POST['semester'];
      $Notification   = $this->Statistics->deleteStatistics($id_schoolyear, $semester);
    }

    $this->view("layout", [
      "page"            => "attendance-statistics/statistics",
      "ListStatistics"  =>  $this->Statistics->getStatistics(),
      "Notification"    => $Notification,
    ]);
  }

  public function GeneralStatistics()
  {
    if ((!isset($_GET['id_schoolyear']) || $_GET['id_schoolyear'] == NULL) || (!isset($_GET['semester']) || $_GET['semester'] == NULL)) {
      header('Location: Statistics');
    }

    $Notification   = [];
    $id_schoolyear  = $_GET['id_schoolyear'];
    $semester       = $_GET['semester'];

    $this->view("layout", [
      "page"                  => "attendance-statistics/general",
      "id_schoolyear"         => $id_schoolyear,
      "semester"              => $semester,
      "ListGeneralStatistics" => $this->Statistics->getGeneralStatistics($id_schoolyear, $semester),
      "Notification"          => $Notification,
    ]);
  }

  public function DetailedStatistics()
  {
    if ((!isset($_GET['id_schoolyear']) || $_GET['id_schoolyear'] == NULL) || (!isset($_GET['semester']) || $_GET['semester'] == NULL)) {
      header('Location: Statistics');
    }

    $Notification   = [];
    $id_schoolyear  = $_GET['id_schoolyear'];
    $semester       = $_GET['semester'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_attendance  = $_POST['id_attendance'];
      $Notification   = $this->Statistics->deleteDetailedStatistics($id_attendance);
    }

    $this->view("layout", [
      "page"                    => "attendance-statistics/detailed",
      "id_schoolyear"           => $id_schoolyear,
      "semester"                => $semester,
      "ListDetailedStatistics"  => $this->Statistics->getDetailedStatistics($id_schoolyear, $semester),
      "Notification"            => $Notification,
    ]);
  }

  // QUẢN LÝ KHÓA HỌC
  public function Course()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addCourse'])) {
        $id_subject     = $_POST['id_subject'];
        $group          = $_POST['group'];
        $teacher        = $_POST['teacher'];
        $period         = $_POST['period'];
        $local          = $_POST['local'];
        $date           = $_POST['date'];
        $semester       = $_POST['semester'];
        $id_schoolyear  = $_POST['id_schoolyear'];
        $Notification   = $this->Course->setCourse($id_subject, $group, $teacher, $period, $local, $date, $semester, $id_schoolyear);
      }
      if (isset($_POST['deleteCourse'])) {
        $id_schoolyear  = $_POST['id_schoolyear'];
        $semester       = $_POST['semester'];
        $date           = $_POST['date'];
        $Notification   = $this->Course->deleteCourse($id_schoolyear, $semester, $date);
      }
    }

    $this->view("layout", [
      "page"            => "course/course",
      "ListSubject"     => $this->Subject->getSubject(),
      "ListCourse"      => $this->Course->getCourse(),
      "ListSchoolYear"  => $this->SchoolYear->getSchoolYear(),
      "Notification"    => $Notification,
    ]);
  }

  public function DetailedCourse()
  {
    if ((!isset($_GET['id_schoolyear']) || $_GET['id_schoolyear'] == NULL) || (!isset($_GET['semester']) || $_GET['semester'] == NULL) || (!isset($_GET['date']) || $_GET['date'] == NULL)) {
      header('Location: Course');
    }

    $Notification = [];
    $id_schoolyear  = $_GET['id_schoolyear'];
    $semester       = $_GET['semester'];
    $date           = $_GET['date'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_course      = $_POST['id_course'];
      $Notification   = $this->Course->deleteDetailedCourse($id_course);
    }

    $this->view("layout", [
      "page"                => "course/detailed",
      "ListDetailedCourse"  => $this->Course->getDetailedCourse($id_schoolyear, $semester, $date),
      "Notification"        => $Notification,
    ]);
  }

  public function Subject()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addSubject'])) {
        $subject        = $_POST['subject'];
        $note           = $_POST['note'];
        $Notification   = $this->Subject->setSubject($subject, $note);
      }
      if (isset($_POST['editSubject'])) {
        $id_subject     = $_POST['id_subject'];
        $subject        = $_POST['subject'];
        $note           = $_POST['note'];
        $Notification   = $this->Subject->editSubject($id_subject, $subject, $note);
      }
      if (isset($_POST['deleteSubject'])) {
        $id_subject     = $_POST['id_subject'];
        $Notification   = $this->Subject->deleteSubject($id_subject);
      }
    }

    $this->view("layout", [
      "page"          => "subject/subject",
      "ListSubject"   => $this->Subject->getSubject(),
      "Notification"  => $Notification,
    ]);
  }

  public function SchoolYear()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addSchoolYear'])) {
        $schoolyear     = $_POST['schoolyear'];
        $note           = $_POST['note'];
        $Notification   = $this->SchoolYear->setSchoolYear($schoolyear, $note);
      }
      if (isset($_POST['editSchoolYear'])) {
        $id_schoolyear  = $_POST['id_schoolyear'];
        $schoolyear     = $_POST['schoolyear'];
        $note           = $_POST['note'];
        $Notification   = $this->SchoolYear->editSchoolYear($id_schoolyear, $schoolyear, $note);
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

  // QUẢN LÝ THIẾT BỊ
  public function Borrow()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addBorrow'])) {
        $borrower     = $_POST['borrower'];
        $phone        = $_POST['phone'];
        $device       = $_POST['device'];
        $quantily     = $_POST['quantily'];
        $date         = $_POST['date'];
        $purpose      = $_POST['purpose'];
        $Notification = $this->Borrow->setBorrow($borrower, $phone, $device, $quantily, $date, $purpose);
      }
      if (isset($_POST['editBorrow'])) {
        $id_borrow    = $_POST['id_borrow'];
        $borrower     = $_POST['borrower'];
        $phone        = $_POST['phone'];
        $device       = $_POST['device'];
        $quantily     = $_POST['quantily'];
        $date         = $_POST['date'];
        $purpose      = $_POST['purpose'];
        $Notification = $this->Borrow->editBorrow($id_borrow, $borrower, $phone, $device, $quantily, $date, $purpose);
      }
      if (isset($_POST['deleteBorrow'])) {
        $id_borrow    = $_POST['id_borrow'];
        $Notification = $this->Borrow->deleteBorrow($id_borrow);
      }
      if (isset($_POST['updateStatus'])) {
        $id_borrow    = $_POST['id_borrow'];
        $status       = $_POST['updateStatus'];
        $Notification = $this->Borrow->updateStatus($id_borrow, $status);
      }
    }

    $this->view("layout", [
      "page"            => "borrow/borrow",
      "ListBorrow"      => $this->Borrow->getBorrow(),
      "Notification"    => $Notification,
    ]);
  }

  // QUẢN LÝ NHÂN SỰ
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

  // QUẢN LÝ CƠ CẤU
  public function Executive()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addExecutive'])) {
        $id_student   = $_POST['id_student'];
        $id_position  = $_POST['id_position'];
        $Notification = $this->Executive->setExecutive($id_student, $id_position);
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

  // THAO TÁC KHÁC
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
      "ListTeam"              => $this->Team->getTeam(),
      "ListPersonnel"         => $this->Personnel->getPersonnel(),
      "ListDecentralization"  => $this->Decentralization->getDecentralization(),
      "Notification"          => $Notification,
    ]);
  }

  public function ResetPassword()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_user      = $_POST['id_user'];
      $Notification = $this->Password->resetPassword($id_user);
    }

    $this->view("layout", [
      "page"          => "reset-password/reset-password",
      "ListPersonnel" =>  $this->Personnel->getPersonnel(),
      "Notification"  =>  $Notification,
    ]);
  }

  public function ChangePassword()
  {
    $Notification = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_user        = $_POST['id_user'];
      $oldPassword    = $_POST['oldPassword'];
      $newPassword    = $_POST['newPassword'];
      $reNewPassword  = $_POST['reNewPassword'];
      $Notification   = $this->Password->ChangePassword($id_user, $oldPassword, $newPassword, $reNewPassword);
    }

    $this->view("layout", [
      "page"          => "change-password/change-password",
      "Notification"  =>  $Notification,
    ]);
  }

  public function Profile()
  {
    if (!isset($_GET['user']) || $_GET['user'] == NULL) {
      header('Location: Home');
    }

    $Notification = [];
    $id_user      = $_GET['user'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $fullname       = $_POST['fullname'];
      $phone          = $_POST['phone'];
      $birthday       = $_POST['birthday'];
      $facebook       = $_POST['facebook'];
      $Notification   = $this->Profile->updateProfile($id_user, $fullname, $phone, $birthday, $facebook);
    }

    $this->view("layout", [
      "page"          => "profile/profile",
      "Profile"       =>  $this->Profile->getProfile($id_user),
      "Notification"  =>  $Notification,
    ]);
  }
}
