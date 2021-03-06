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
                  <li class="breadcrumb-item"><a href="Admin/Collaborate"><i class="fas fa-chalkboard"></i>Quản lý cộng tác viên</a></li>
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
              <h4>DANH SÁCH CỘNG TÁC VIÊN</h4>
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
                      <th>Số điện thoại</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data['ListCollaborate']) {
                      $i = 1;
                      $fm = new Format();
                      while ($value = $data['ListCollaborate']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['id_student'] ?></td>
                          <td><?php echo $value['fullname'] ?></td>
                          <td><?php echo ($value['birthday'] != "") ? $fm->formatDate($value['birthday']) : '[---]'; ?></td>
                          <td><a href="<?php echo $value['facebook'] ?>"><?php echo ($value['facebook'] != "") ? $value['facebook'] : '[---]'; ?></a></td>
                          <td><?php echo ($value['phone'] != "") ? $value['phone'] : '[---]'; ?></td>
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