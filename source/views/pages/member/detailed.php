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
                  <li class="breadcrumb-item"><a href="Admin/Home"><i class="fas fa-home"></i>Trang chủ</a></li>
                  <li class="breadcrumb-item"><a href="Admin/Member"><i class="fas fa-chalkboard"></i>Quản lý thành viên</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><i class="fab fa-squarespace"></i> Danh sách chi tiết</strong></li>
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
              <h4>DANH SÁCH THÀNH VIÊN</h4>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>MSSV</th>
                      <th>Họ và tên</th>
                      <th>Ngày sinh</th>
                      <th>Facebook</th>
                      <th>Ban hiện tại</th>
                      <th>Số điện thoại</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data['ListMember']) {
                      $i = 1;
                      while ($value = $data['ListMember']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['id_student'] ?></td>
                          <td><?php echo $value['fullname'] ?></td>
                          <td><?php echo $value['birthday'] ?></td>
                          <td><a href="<?php echo $value['facebook'] ?>"><?php echo $value['fullname'] ?></a></td>
                          <td><?php echo $value['team'] ?></td>
                          <td><?php echo $value['phone'] ?></td>
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
</div>