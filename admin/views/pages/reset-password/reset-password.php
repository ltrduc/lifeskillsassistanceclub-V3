<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['resetPassword'])) {
    $id_user      = $_POST['id_user'];
    $check_Member = $Personnel->resetPassword($id_user);
  }

  if (isset($check_Member)) {
    $dataMessage = json_decode($check_Member);
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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Đặt lại mật khẩu</li>
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>DANH SÁCH TÀI KHOẢN</h4>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>MSSV</th>
                      <th>Họ và tên</th>
                      <th class="text-center">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $getPersonnel = $Personnel->getPersonnel();
                    $i = 1;
                    if ($getPersonnel) {
                      while ($value = $getPersonnel->fetch_assoc()) {
                    ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['id_student'] ?></td>
                          <td><?php echo $value['fullname'] ?></td>
                          <td class="text-center">
                            <a href="#" class="btn btn-sm btn-danger" onclick="resetPassword('<?php echo $value['id_user'] ?>','<?php echo $value['fullname'] ?>')" data-toggle="modal" data-target="#resetPassword"><i class="fas fa-trash"></i> Reset Password </a>
                          </td>
                        </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- reset password -->
  <div class="modal fade" id="resetPassword">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="ResetPassword" method="post">
          <input type="hidden" id="resetpassword-id_user" name="id_user">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ĐẶT LẠI MẬT KHẨU</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn đặt lại mật khẩu của <strong id="resetpassword-info-user"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="resetPassword" class="btn btn-danger">Reset Password</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>