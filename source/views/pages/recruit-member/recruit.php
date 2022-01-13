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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Quản lý tuyển thành viên</li>
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
              <h4>DANH SÁCH TUYỂN THÀNH VIÊN</h4>
              <div class="card-header-action">
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteRecruit"><i class="fas fa-trash"></i> Xóa dữ liệu</a>
              </div>
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
                      <th>Ban hoạt động</th>
                      <th>Số điện thoại</th>
                      <th>Tại sao biết đến LSA</th>
                      <th>Tại sao chọn ban này</th>
                      <th>Kinh nghiệm</th>
                      <th>Mong muốn</th>
                      <th>Sở trường</th>
                      <th>Sở đoản</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    while ($value = $data['ListRecruitment']->fetch_assoc()) {
                    ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $value['id_student'] ?></td>
                        <td><?php echo $value['fullname'] ?></td>
                        <td><?php echo $value['birthday'] ?></td>
                        <td><a href="<?php echo $value['facebook'] ?>"><?php echo $value['facebook'] ?></a></td>
                        <td><?php echo $value['team'] ?></td>
                        <td><?php echo $value['phone'] ?></td>
                        <td><?php echo $value['content1'] ?></td>
                        <td><?php echo $value['content2'] ?></td>
                        <td><?php echo $value['content3'] ?></td>
                        <td><?php echo $value['content4'] ?></td>
                        <td><?php echo $value['content5'] ?></td>
                        <td><?php echo $value['content6'] ?></td>
                      </tr>
                    <?php } ?>
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