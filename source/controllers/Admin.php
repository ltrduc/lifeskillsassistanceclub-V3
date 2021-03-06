<?php Session::checkSession(); ?>
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
  private $Permission;
  private $Device;
  private $Evaluate;

  private $pmsAdmin;
  private $pmsAttendance;
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
    $this->Permission       = $this->model("Permission");
    $this->Device           = $this->model("Device");
    $this->Evaluate           = $this->model("Evaluate");

    $this->pmsAdmin         = $this->Permission->Admin(Session::get('pmsAdmin'));
    $this->pmsAttendance    = $this->Permission->Attendance(Session::get('pmsAttendance'));
    $this->pmsPost          = $this->Permission->Post(Session::get('pmsPost'));
  }

  /*
  |--------------------------------------------------------------------------
  | TRANG CHỦ
  |--------------------------------------------------------------------------
  */
  public function Home()
  {
    $this->viewAdmin("layout", [
      "page"                => "home/dashboard",
      "ListMember"          => $this->Personnel->getMember(),
      "CountPost"           => $this->Dashboard->Post(),
      "CountCollaborate"    => $this->Dashboard->Collaborate(),
      "CountMember"         => $this->Dashboard->Member(),
      "CountAdministration" => $this->Dashboard->Administration(),
      "CountPosition"       => $this->Dashboard->Position(),
      "CountPersonnel"      => $this->Dashboard->Personnel(),
      "ListCourseToday"     => $this->Course->getCourseToday(),
      "Notification"        => [],
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | ĐIỂM DANH BUỔI TRỰC
  |--------------------------------------------------------------------------
  */
  public function Attendance()
  {
    if (!$this->pmsAdmin && !$this->pmsAttendance) self::redirect("Home");

    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (empty($_POST['id_schoolyear']) || empty($_POST['semester']) || empty($_POST['date'])) {
        $Notification = ["status" => "error", "message" => "Vui lòng nhập đầy đủ dữ liệu!"];
      } elseif (empty($_POST['shift1']) && empty($_POST['shift2']) && empty($_POST['shift3']) && empty($_POST['shift4'])) {
        $Notification = ["status" => "error", "message" => "Chưa có thành viên nào điểm danh!"];
      } else {
        if (!empty($_POST['shift1'])) {
          foreach ($_POST['shift1'] as $id => $shift1) {
            $id_user        = $_POST['id_user'][$id];
            $id_schoolyear  = $_POST['id_schoolyear'];
            $semester       = $_POST['semester'];
            $date           = $_POST['date'];
            $attendance     = $_POST['attendance'];
            $Notification   = $this->Attendance->setAttendance($id_user, $id_schoolyear, $semester, $date, $shift1, $attendance);
          }
        }
  
        if (!empty($_POST['shift2'])) {
          foreach ($_POST['shift2'] as $id => $shift2) {
            $id_user        = $_POST['id_user'][$id];
            $id_schoolyear  = $_POST['id_schoolyear'];
            $semester       = $_POST['semester'];
            $date           = $_POST['date'];
            $attendance     = $_POST['attendance'];
            $Notification   = $this->Attendance->setAttendance($id_user, $id_schoolyear, $semester, $date, $shift2, $attendance);
          }
        }
  
        if (!empty($_POST['shift3'])) {
          foreach ($_POST['shift3'] as $id => $shift3) {
            $id_user        = $_POST['id_user'][$id];
            $id_schoolyear  = $_POST['id_schoolyear'];
            $semester       = $_POST['semester'];
            $date           = $_POST['date'];
            $attendance     = $_POST['attendance'];
            $Notification   = $this->Attendance->setAttendance($id_user, $id_schoolyear, $semester, $date, $shift3, $attendance);
          }
        }
  
        if (!empty($_POST['shift4'])) {
          foreach ($_POST['shift4'] as $id => $shift4) {
            $id_user        = $_POST['id_user'][$id];
            $id_schoolyear  = $_POST['id_schoolyear'];
            $semester       = $_POST['semester'];
            $date           = $_POST['date'];
            $attendance     = $_POST['attendance'];
            $Notification   = $this->Attendance->setAttendance($id_user, $id_schoolyear, $semester, $date, $shift4, $attendance);
          }
        }
      }
    }

    $this->viewAdmin("layout", [
      "page"            => "attendance/attendance",
      "ListPersonnel"   => $this->Personnel->getPersonnel(),
      "ListSchoolYear"  => $this->SchoolYear->getSchoolYear(),
      "Notification"    => $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ TRỰC BAN
  |--------------------------------------------------------------------------
  */
  public function NoteUpdateSchedule()
  {
    $id_schedule  = $_POST['id'];
    $note         = $_POST['note'];
    $this->Schedule->NoteUpdateSchedule($id_schedule, $note);
  }

  public function Schedule()
  {
    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addSchedule'])) {
        $id_student = $_POST['id_student'];
        $session    = $_POST['session'];
        $shift1     = "";
        $shift2     = "";
        $shift3     = "";
        $shift4     = "";

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
      if (isset($_POST['Attendance'])) {
        $id_schoolyear  = $_POST['id_schoolyear'];
        $semester       = $_POST['semester'];
        $date           = $_POST['date'];
        $Notification   = $this->Schedule->Attendance($id_schoolyear, $semester, $date);
      }
      if (isset($_POST['note_update'])) {
        NoteUpdateSchedule();
      }
    }

    $this->viewAdmin("layout", [
      "page"           => "schedule/schedule",
      "Monday"         => $this->Schedule->getSchedule(),
      "Tuesday"        => $this->Schedule->getSchedule(),
      "Wednesday"      => $this->Schedule->getSchedule(),
      "Thursday"       => $this->Schedule->getSchedule(),
      "Friday"         => $this->Schedule->getSchedule(),
      "Saturday"       => $this->Schedule->getSchedule(),
      "Sunday"         => $this->Schedule->getSchedule(),
      "ListMember"     => $this->Personnel->getMember(),
      "ListSchoolYear" => $this->SchoolYear->getSchoolYear(),
      "Notification"   => $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | THỐNG KÊ BUỔI TRỰC
  |--------------------------------------------------------------------------
  */
  public function Statistics()
  {
    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_schoolyear  = $_POST['id_schoolyear'];
      $semester       = $_POST['semester'];
      $Notification   = $this->Statistics->deleteStatistics($id_schoolyear, $semester);
    }

    $this->viewAdmin("layout", [
      "page"            => "attendance-statistics/statistics",
      "ListStatistics"  =>  $this->Statistics->getStatistics(),
      "Notification"    => $Notification,
    ]);
  }

  public function GeneralStatistics()
  {
    if ((!isset($_GET['id_schoolyear']) || $_GET['id_schoolyear'] == NULL) || (!isset($_GET['semester']) || $_GET['semester'] == NULL)) self::redirect("Statistics");

    $Notification   = [];
    $id_schoolyear  = $_GET['id_schoolyear'];
    $semester       = $_GET['semester'];

    $this->viewAdmin("layout", [
      "page"                  => "attendance-statistics/general",
      "ListGeneralStatistics" => $this->Statistics->getGeneralStatistics($id_schoolyear, $semester),
      "id_schoolyear"         => $id_schoolyear,
      "semester"              => $semester,
      "Notification"          => $Notification,
    ]);
  }

  public function DetailedStatistics()
  {
    if (!$this->pmsAdmin) self::redirect("Home");
    if ((!isset($_GET['id_schoolyear']) || $_GET['id_schoolyear'] == NULL) || (!isset($_GET['semester']) || $_GET['semester'] == NULL)) self::redirect("Statistics");

    $Notification     = [];
    $id_schoolyear    = $_GET['id_schoolyear'];
    $semester         = $_GET['semester'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_attendance  = $_POST['id_attendance'];
      $Notification   = $this->Statistics->deleteDetailedStatistics($id_attendance);
    }

    $this->viewAdmin("layout", [
      "page"                    => "attendance-statistics/detailed",
      "ListDetailedStatistics"  => $this->Statistics->getDetailedStatistics($id_schoolyear, $semester),
      "id_schoolyear"           => $id_schoolyear,
      "semester"                => $semester,
      "Notification"            => $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ LỊCH HỌC
  |--------------------------------------------------------------------------
  */
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
      if (isset($_POST['importCourse'])) {
        if ($_FILES["file"]["type"] != "text/csv") {
          $Notification = ["status" => "error", "message" => "Vui lòng chọn file định dạng là CSV!"];
        } else {
          $file         = $_FILES["file"]["tmp_name"];
          $Notification = $this->Course->importCourse($file);
        }
      }
    }

    $this->viewAdmin("layout", [
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
      self::redirect("Course");
    }

    $Notification   = [];
    $id_schoolyear  = $_GET['id_schoolyear'];
    $semester       = $_GET['semester'];
    $date           = $_GET['date'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['updateDetailedCourse'])) {
        $id_course      = $_POST['id_course'];
        $id_subject     = $_POST['id_subject'];
        $group          = $_POST['group'];
        $teacher        = $_POST['teacher'];
        $period         = $_POST['period'];
        $local          = $_POST['local'];
        $date           = $_POST['date'];
        $semester       = $_POST['semester'];
        $id_schoolyear  = $_POST['id_schoolyear'];
        $Notification   = $this->Course->updateDetailedCourse($id_course, $id_subject, $group, $teacher, $period, $local, $date, $semester, $id_schoolyear);
      }
      if (isset($_POST['deleteDetailedCourse'])) {
        $id_course    = $_POST['id_course'];
        $Notification = $this->Course->deleteDetailedCourse($id_course);
      }
    }

    $this->viewAdmin("layout", [
      "page"                => "course/detailed",
      "ListSubject"         => $this->Subject->getSubject(),
      "ListSchoolYear"      => $this->SchoolYear->getSchoolYear(),
      "ListDetailedCourse"  => $this->Course->getDetailedCourse($id_schoolyear, $semester, $date),
      "Notification"        => $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ MÔN HỌC
  |--------------------------------------------------------------------------
  */
  public function Subject()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addSubject'])) {
        $subject        = $_POST['subject'];
        $note           = $_POST['note'];
        $Notification   = $this->Subject->setSubject($subject, $note);
      }
      if (isset($_POST['updateSubject'])) {
        $id_subject     = $_POST['id_subject'];
        $subject        = $_POST['subject'];
        $note           = $_POST['note'];
        $Notification   = $this->Subject->updateSubject($id_subject, $subject, $note);
      }
      if (isset($_POST['deleteSubject'])) {
        $id_subject     = $_POST['id_subject'];
        $Notification   = $this->Subject->deleteSubject($id_subject);
      }
    }

    $this->viewAdmin("layout", [
      "page"            => "subject/subject",
      "ListSubject"     => $this->Subject->getSubject(),
      "Notification"    => $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ NĂM HỌC
  |--------------------------------------------------------------------------
  */
  public function SchoolYear()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addSchoolYear'])) {
        $schoolyear     = $_POST['schoolyear'];
        $note           = $_POST['note'];
        $Notification   = $this->SchoolYear->setSchoolYear($schoolyear, $note);
      }
      if (isset($_POST['updateSchoolYear'])) {
        $id_schoolyear  = $_POST['id_schoolyear'];
        $schoolyear     = $_POST['schoolyear'];
        $note           = $_POST['note'];
        $Notification   = $this->SchoolYear->updateSchoolYear($id_schoolyear, $schoolyear, $note);
      }
      if (isset($_POST['deleteSchoolYear'])) {
        $id_schoolyear  = $_POST['id_schoolyear'];
        $Notification   = $this->SchoolYear->deleteSchoolYear($id_schoolyear);
      }
    }

    $this->viewAdmin("layout", [
      "page"            => "school-year/school-year",
      "ListSchoolYear"  => $this->SchoolYear->getSchoolYear(),
      "Notification"    => $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ THIẾT BỊ
  |--------------------------------------------------------------------------
  */
  public function DeviceGroup()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addDeviceGroup'])) {
        $devicegroup    = $_POST['devicegroup'];
        $note           = $_POST['note'];
        $Notification   = $this->Device->setDeviceGroup($devicegroup, $note);
      }
      if (isset($_POST['updateDeviceGroup'])) {
        $id_devicegroup = $_POST['id_devicegroup'];
        $devicegroup    = $_POST['devicegroup'];
        $note           = $_POST['note'];
        $Notification   = $this->Device->updateDeviceGroup($id_devicegroup, $devicegroup, $note);
      }
      if (isset($_POST['deleteDeviceGroup'])) {
        $id_devicegroup = $_POST['id_devicegroup'];
        $Notification   = $this->Device->deleteDeviceGroup($id_devicegroup);
      }
    }

    $this->viewAdmin("layout", [
      "page"            => "device/device-group",
      "ListDeviceGroup" => $this->Device->getDeviceGroup(),
      "Notification"    => $Notification,
    ]);
  }

  public function Device()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addDevice'])) {
        $id_devicegroup = $_POST['id_devicegroup'];
        $device         = $_POST['device'];
        $description    = $_POST['description'];
        $note           = $_POST['note'];
        $Notification   = $this->Device->setDevice($id_devicegroup, $device, $description, $note);
      }
      if (isset($_POST['updateDevice'])) {
        $id_device      = $_POST['id_device'];
        $id_devicegroup = $_POST['id_devicegroup'];
        $device         = $_POST['device'];
        $description    = $_POST['description'];
        $note           = $_POST['note'];
        $Notification   = $this->Device->updateDevice($id_device, $id_devicegroup, $device, $description, $note);
      }
      if (isset($_POST['deleteDevice'])) {
        $id_device      = $_POST['id_device'];
        $Notification   = $this->Device->deleteDevice($id_device);
      }
    }

    $this->viewAdmin("layout", [
      "page"            => "device/device",
      "ListDevice"      => $this->Device->getDevice(),
      "ListDeviceGroup" => $this->Device->getDeviceGroup(),
      "Notification"    => $Notification,
    ]);
  }

  public function DeviceStatistics()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addDeviceStatistics'])) {
        $id_device            = $_POST['id_device'];
        $quantily             = $_POST['quantily'];
        $Notification         = $this->Device->setDeviceStatistics($id_device, $quantily);
      }
      if (isset($_POST['updateDeviceStatistics'])) {
        $id_devicestatistics  = $_POST['id_devicestatistics'];
        $quantily             = $_POST['quantily'];
        $donotuse             = $_POST['donotuse'];
        $broken               = $_POST['broken'];
        $lost                 = $_POST['lost'];
        $Notification         = $this->Device->updateDeviceStatistics($id_devicestatistics, $quantily, $donotuse, $broken, $lost);
      }
      if (isset($_POST['deleteDeviceStatistics'])) {
        $id_devicestatistics  = $_POST['id_devicestatistics'];
        $Notification         = $this->Device->deleteDeviceStatistics($id_devicestatistics);
      }
    }

    $this->viewAdmin("layout", [
      "page"                  => "device/device-statistics",
      "ListDevice"            => $this->Device->getDevice(),
      "ListDeviceStatistics"  => $this->Device->getDeviceStatistics(),
      "Notification"          => $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ MƯỢN TRẢ
  |--------------------------------------------------------------------------
  */
  public function Borrow()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

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
      if (isset($_POST['updateBorrow'])) {
        $id_borrow    = $_POST['id_borrow'];
        $borrower     = $_POST['borrower'];
        $phone        = $_POST['phone'];
        $device       = $_POST['device'];
        $quantily     = $_POST['quantily'];
        $date         = $_POST['date'];
        $purpose      = $_POST['purpose'];
        $Notification = $this->Borrow->updateBorrow($id_borrow, $borrower, $phone, $device, $quantily, $date, $purpose);
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

    $this->viewAdmin("layout", [
      "page"          => "borrow/borrow",
      "ListBorrow"    => $this->Borrow->getBorrow(),
      "Notification"  => $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ NHÂN SỰ
  |--------------------------------------------------------------------------
  */
  public function Member()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

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
      if (isset($_POST['updateMember'])) {
        $id_user      = $_POST['id_user'];
        $id_student   = $_POST['id_student'];
        $fullname     = $_POST['fullname'];
        $Notification = $this->Personnel->updatePersonnel($id_user, $id_student, $fullname);
      }
    }

    $this->viewAdmin("layout", [
      "page"          => "member/member",
      "ListMember"    => $this->Personnel->getMember(),
      "ListTeam"      => $this->Team->getTeam(),
      "Notification"  => $Notification,
    ]);
  }

  public function DetailedMember()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    $Notification = [];

    $this->viewAdmin("layout", [
      "page"          => "member/detailed",
      "ListMember"    => $this->Personnel->getMember(),
      "Notification"  => $Notification,
    ]);
  }

  public function Collaborate()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['addCollaborate'])) {
        $id_student     = $_POST['id_student'];
        $fullname       = $_POST['fullname'];
        $Notification   = $this->Personnel->setCollaborate($id_student, $fullname);
      }
      if (isset($_POST['deleteCollaborate'])) {
        $id_user        = $_POST['id_user'];
        $Notification   = $this->Personnel->deletePersonnel($id_user);
      }
      if (isset($_POST['updateCollaborate'])) {
        $id_user        = $_POST['id_user'];
        $id_student     = $_POST['id_student'];
        $fullname       = $_POST['fullname'];
        $Notification   = $this->Personnel->updatePersonnel($id_user, $id_student, $fullname);
      }
    }

    $this->viewAdmin("layout", [
      "page"            => "collaborate/collaborate",
      "ListCollaborate" => $this->Personnel->getCollaborate(),
      "Notification"    => $Notification,
    ]);
  }

  public function DetailedCollaborate()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    $Notification = [];

    $this->viewAdmin("layout", [
      "page"            => "collaborate/detailed",
      "ListCollaborate" => $this->Personnel->getCollaborate(),
      "Notification"    => $Notification,
    ]);
  }

  public function RecruitMember()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    $Notification   = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $Notification = $this->Recruitment->deleteRecruitment();
    }

    $this->viewAdmin("layout", [
      "page"            => "recruit-member/recruit",
      "ListRecruitment" => $this->Recruitment->getRecruitment(),
      "Notification"    => $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ ĐÁNH GIÁ
  |--------------------------------------------------------------------------
  */
  public function PersonnelEvaluate()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    $Notification   = [];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_schoolyear  = $_POST['id_schoolyear'];
      $semester       = $_POST['semester'];

      if (isset($_POST['addPersonnelEvaluate'])) {
        $Notification   = $this->Evaluate->SetPersonnelEvaluate($id_schoolyear, $semester);
      }

      if (isset($_POST['deletePersonnelEvaluate'])) {
        $Notification   = $this->Evaluate->deletePersonnelEvaluate($id_schoolyear, $semester);
      }
    }

    $this->viewAdmin("layout", [
      "page"            => "evaluate/personnel-evaluate",
      "ListSchoolYear"  => $this->SchoolYear->getSchoolYear(),
      "ListEvaluate"  => $this->Evaluate->GetPersonnelEvaluate(),
      "Notification"    => $Notification,
    ]);
  }

  public function DetailedPersonnelEvaluate()
  {
    if (!$this->pmsAdmin) self::redirect("Home");
    
    if ((!isset($_GET['id_schoolyear']) || $_GET['id_schoolyear'] == NULL) || (!isset($_GET['semester']) || $_GET['semester'] == NULL)) self::redirect("PersonnelEvaluate");

    $Notification   = [];
    $id_schoolyear  = $_GET['id_schoolyear'];
    $semester       = $_GET['semester'];
    $team           = 0;
    $checkTeam      = ($this->Team->getTeam()) ? 1 : 0;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $team = $_POST['team'];
      if (isset($_POST['evaluate'])) {
        if (isset($_POST['id_student'])) {
          foreach ($_POST['id_student'] as $id => $id_student) {
            $note           = $_POST['note'][$id];
            $evaluate       = $_POST['evaluate'][$id];
            $Notification   = $this->Evaluate->setDetailedPersonnelEvaluate($id_student, $note, $evaluate, $id_schoolyear, $semester);
          }
        } else {
          $Notification = ["status" => "error", "message" => "Cập nhật đánh giá không thành công!"];
        }
      }
      if (isset($_POST['searchTeam'])) {
        $team = $_POST['team'];
      }
    }

    $this->viewAdmin("layout", [
      "page"            => "evaluate/detailed-personnel-evaluate",
      "ListEvaluate"    => $this->Evaluate->getDetailedPersonnelEvaluate($id_schoolyear, $semester, $team),
      "CountListEvaluate"    => $this->Evaluate->getDetailedPersonnelEvaluate($id_schoolyear, $semester, $team),
      "ListTeam"        => $this->Team->getTeam(),
      "Team"            => $team,
      "checkTeam"       => $checkTeam,
      "Notification"    => $Notification,
    ]);
  }

  public function ExportEvaluate()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    $Notification   = [];
    $exportEvaluate = 0;
    $id_schoolyear  = "";
    $semester       = "";
    $evaluate       = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['exportEvaluate'])) {
        $exportEvaluate = $_POST['exportEvaluate'];
        $id_schoolyear  = $_POST['id_schoolyear'];
        $semester       = $_POST['semester'];
        $evaluate       = $_POST['evaluate'];
      }
    }

    $this->viewAdmin("layout", [
      "page"            => "evaluate/export-evaluate",
      "exportEvaluate"  => $exportEvaluate,
      "id_schoolyear"   => $id_schoolyear,
      "semester"        => $semester,
      "evaluate"        => $evaluate,
      "ListSchoolYear"  => $this->SchoolYear->getSchoolYear(),
      "ListEvaluate"    => $this->Evaluate->ExportEvaluate($id_schoolyear, $semester, $evaluate),
      "Notification"    => $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ BAN ĐIỀU HÀNH
  |--------------------------------------------------------------------------
  */
  public function Executive()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

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

    $this->viewAdmin("layout", [
      "page"          => "organization/executive",
      "ListExecutive" => $this->Executive->getExecutive(),
      "ListMember"    => $this->Personnel->getMember(),
      "ListPosition"  => $this->Position->getPosition(),
      "Notification"  => $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ BAN HOẠT ĐỘNG
  |--------------------------------------------------------------------------
  */
  public function Team()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

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

    $this->viewAdmin("layout", [
      "page"          => "organization/team/team",
      "ListTeam"      => $this->Team->getTeam(),
      "Notification"  => $Notification,
    ]);
  }

  public function updateTeam()
  {
    if (!$this->pmsAdmin) self::redirect("Home");
    if (!isset($_GET['id']) || $_GET['id'] == NULL) self::redirect("Team");

    $Notification     = [];
    $id_team          = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name           = $_POST['name'];
      $description    = $_POST['description'];
      $Notification   = $this->Team->updateTeam($id_team, $name, $description);
    }

    $this->viewAdmin("layout", [
      "page"          => "organization/team/edit",
      "ListTeamId"    =>  $this->Team->getTeamId($id_team),
      "Notification"  =>  $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ CHỨC VỤ
  |--------------------------------------------------------------------------
  */
  public function Position()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

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

    $this->viewAdmin("layout", [
      "page"          => "organization/position/position",
      "ListPosition"  => $this->Position->getPosition(),
      "Notification"  => $Notification,
    ]);
  }

  public function updatePosition()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    if (!isset($_GET['id']) || $_GET['id'] == NULL) self::redirect("Position");

    $Notification   = [];
    $id_position    = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name         = $_POST['name'];
      $description  = $_POST['description'];
      $Notification = $this->Position->updatePosition($id_position, $name, $description);
    }

    $this->viewAdmin("layout", [
      "page"            => "organization/position/edit",
      "ListPositionId"  =>  $this->Position->getPositionId($id_position),
      "Notification"    =>  $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | THAO TÁC KHÁC
  |--------------------------------------------------------------------------
  */
  public function Decentralization()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

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

    $this->viewAdmin("layout", [
      "page"                  => "decentralization/decentralization",
      "ListTeam"              => $this->Team->getTeam(),
      "ListPersonnel"         => $this->Personnel->getPersonnel(),
      "ListDecentralization"  => $this->Decentralization->getDecentralization(),
      "Notification"          => $Notification,
    ]);
  }

  public function ResetPassword()
  {
    if (!$this->pmsAdmin) self::redirect("Home");

    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_user        = $_POST['id_user'];
      $Notification   = $this->Password->resetPassword($id_user);
    }

    $this->viewAdmin("layout", [
      "page"          => "reset-password/reset-password",
      "ListPersonnel" =>  $this->Personnel->getPersonnel(),
      "Notification"  =>  $Notification,
    ]);
  }

  public function ChangePassword()
  {
    $Notification = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_user        = Session::get('id_user');
      $oldPassword    = $_POST['oldPassword'];
      $newPassword    = $_POST['newPassword'];
      $reNewPassword  = $_POST['reNewPassword'];
      $Notification   = $this->Password->ChangePassword($id_user, $oldPassword, $newPassword, $reNewPassword);
    }

    $this->viewAdmin("layout", [
      "page"          => "change-password/change-password",
      "Notification"  =>  $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ PROFILE
  |--------------------------------------------------------------------------
  */
  public function Profile()
  {
    $Notification     = [];
    $id_user          = Session::get('id_user');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $fullname       = $_POST['fullname'];
      $phone          = $_POST['phone'];
      $birthday       = $_POST['birthday'];
      $facebook       = $_POST['facebook'];
      $Notification   = $this->Profile->updateProfile($id_user, $fullname, $phone, $birthday, $facebook);
    }

    $this->viewAdmin("layout", [
      "page"          => "profile/profile",
      "Profile"       =>  $this->Profile->getProfile($id_user),
      "Notification"  =>  $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | QUẢN LÝ THÔNG TIN PHẦN MỀM
  |--------------------------------------------------------------------------
  */
  public function SoftwareInformation()
  {
    $Notification     = [];

    $this->viewAdmin("layout", [
      "page"          => "software-information/software-information",
      "Notification"  =>  $Notification,
    ]);
  }

  /*
  |--------------------------------------------------------------------------
  | HÀM CHUYỂN HƯỚNG
  |--------------------------------------------------------------------------
  */
  public static function redirect($url)
  {
    ob_start();
    if (!empty($url)) header("location: {$url}");
    ob_end_flush();
  }
}