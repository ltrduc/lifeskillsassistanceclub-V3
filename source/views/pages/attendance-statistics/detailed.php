<!-- Main Content -->
<div class="main-content">
  <section class="section mb-0">
    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body p-2">
              <nav aria-label="breadcrumb m-0">
                <ol class="breadcrumb bg-white m-0">
                  <li class="breadcrumb-item"><a href="Admin/Home"><i class="fas fa-home"></i>Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="Admin/Statistics"><i class="fas fa-chalkboard"></i> Thống kê buổi trực</a></li>
                  <?php if ($data['ListDetailedStatistics']) { $value = $data['ListDetailedStatistics']->fetch_assoc(); } ?>
                  <li class="breadcrumb-item active" aria-current="page"><i class="fab fa-squarespace"></i> Chi tiết <strong><?php echo $data['semester'] ?>|Năm học <?php echo $value['schoolyear'] ?></strong></li>
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
              <h4>DANH SÁCH CHI TIẾT</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>MSSV</th>
                      <th>Họ và tên</th>
                      <th>Ban hiện tại</th>
                      <th>Năm học</th>
                      <th>Học kỳ</th>
                      <th>Ngày trực</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    if ($data['ListDetailedStatistics']) {
                      while ($value = $data['ListDetailedStatistics']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['id_student']; ?></td>
                          <td><?php echo $value['fullname']; ?></td>
                          <td><?php echo $value['team']; ?></td>
                          <td><?php echo $value['schoolyear']; ?></td>
                          <td><?php echo $value['semester']; ?></td>
                          <td><?php echo $value['shift']; ?> : <?php echo $value['date']; ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteDetailedStatistics('<?php echo $value['id_attendance'] ?>','<?php echo $value['fullname'] ?>')" data-toggle="modal" data-target="#deleteDetailedStatistics"><i class="fas fa-trash"></i> Xóa </a>
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

  <!-- Xóa thống kê -->
  <div class="modal fade" id="deleteDetailedStatistics">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="" method="post">
          <input type="hidden" id="delete-id_attendance" name="id_attendance">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA THỐNG KÊ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn xóa dữ liệu <strong id="delete-info-fullname"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteDetailedStatistics" class="btn btn-danger">Xóa thống kê</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>