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
                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteRecruitMember"><i class="fas fa-trash"></i> Xóa tất cả dữ liệu</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>MSSV</th>
                      <th>Họ và tên</th>
                      <th>Ngày sinh</th>
                      <th>Ban hoạt động</th>
                      <th>Biết đến LSA</th>
                      <th>Ban được chọn</th>
                      <th>Kinh nghiệm</th>
                      <th>Mong muốn</th>
                      <th>Sở trường</th>
                      <th>Sở đoản</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    $fm = new Format();
                    if ($data['ListRecruitment']) {
                      while ($value = $data['ListRecruitment']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['id_student'] ?></td>
                          <td><?php echo $value['fullname'] ?></td>
                          <td><?php echo $fm->formatDate($value['birthday']) ?></td>
                          <td><?php echo $value['team'] ?></td>
                          <td><?php echo $value['content1'] ?></td>
                          <td><?php echo $value['content2'] ?></td>
                          <td><?php echo $value['content3'] ?></td>
                          <td><?php echo $value['content4'] ?></td>
                          <td><?php echo $value['content5'] ?></td>
                          <td><?php echo $value['content6'] ?></td>
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

  <!-- Xóa dữ liệu -->
  <div class="modal fade" id="deleteRecruitMember">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/RecruitMember" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA TẤT CẢ DỮ LIỆU</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc chắn muốn xóa tất cả dữ liệu?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteRecruitMember" class="btn btn-danger">Xóa dữ liệu</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>