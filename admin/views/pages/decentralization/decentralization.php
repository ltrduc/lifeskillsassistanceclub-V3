<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['Decentralization'])) {
    $id_student = $_POST['id_student'];
    $level = $_POST['level'];
    $check_Decentralization = $Decentralization->setDecentralization($id_student, $level);
  }

  if (isset($_POST['changeTeam'])) {
    $id_student = $_POST['id_student'];
    $id_team = $_POST['id_team'];
    $check_Decentralization = $Decentralization->changeTeam($id_student, $id_team);
  }

  if (isset($_POST['changePersonnel'])) {
    $id_student = $_POST['id_student'];
    $role = $_POST['role'];
    $check_Decentralization = $Decentralization->changePersonnel($id_student, $role);
  }

  if (isset($check_Decentralization)) {
    $dataMessage = json_decode($check_Decentralization);
  }
}
?>

<!-- Main Content -->
<div class="main-content">
  <section class="section mb-3">
    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-2">
            <div class="card-body p-2">
              <nav aria-label="breadcrumb m-0">
                <ol class="breadcrumb bg-white m-0">
                  <li class="breadcrumb-item"><a href="Home"><i class="fas fa-home"></i>Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Phân quyền</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card card-primary">
            <div class="card-header">
              <h4>QUYỀN QUẢN TRỊ</h4>
            </div>
            <div class="card-body">
              <form action="Decentralization" method="post">
                <div class="form-group">
                  <label>Mã số sinh viên</label>
                  <input type="text" name="id_student" class="form-control" placeholder="51900001">
                </div>
                <div class="form-group">
                  <label>Quyền quản trị</label>
                  <select class="form-control selectric" name="level">
                    <option value="" class="font-weight-bold">Chọn quyền quản trị</option>
                    <option value="0">Admin</option>
                    <option value="1">Điểm danh</option>
                    <option value="2">Bài đăng</option>
                    <option value="3">Hủy tất cả quyền</option>
                  </select>
                </div>
                <div class="form-group text-right">
                  <button class="btn btn-primary mr-1" name="Decentralization" type="submit">Tạo quyền quản trị</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h4>CHUYỂN BAN HOẠT ĐỘNG</h4>
            </div>
            <div class="card-body">
              <form action="Decentralization" method="post">
                <div class="form-group">
                  <label>Mã số sinh viên</label>
                  <input type="text" name="id_student" class="form-control" placeholder="51900001">
                </div>
                <div class="form-group">
                  <label>Ban hoạt động</label>
                  <select class="form-control selectric" name="id_team">
                    <option value="" class="font-weight-bold">Chọn ban hoạt động</option>
                    <?php
                    $getTeam = $Team->getTeam();
                    $i = 1;
                    if ($getTeam) {
                      while ($value = $getTeam->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $value['id_team']; ?>"><?php echo $value['name']; ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
                <div class="form-group text-right">
                  <button class="btn btn-primary mr-1" name="changeTeam" type="submit">Chuyển ban hoạt động</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card card-danger">
            <div class="card-header">
              <h4>CHUYỂN NHÂN SỰ</h4>
            </div>
            <div class="card-body">
              <form action="Decentralization" method="post">
                <div class="form-group">
                  <label>Mã số sinh viên</label>
                  <input type="text" name="id_student" class="form-control" placeholder="51900001">
                </div>
                <div class="form-group">
                  <label>nhân sự</label>
                  <select class="form-control selectric" name="role">
                    <option value="" class="font-weight-bold">Chọn nhân sự</option>
                    <option value="1">Thành viên</option>
                    <option value="2">Cộng tác viên</option>
                  </select>
                </div>
                <div class="form-group text-right">
                  <button class="btn btn-primary mr-1" name="changePersonnel" type="submit">Chuyển nhân sự</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>