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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Quản lý lịch học</li>
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
              <h4>DANH SÁCH LỊCH HỌC</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Môn học</th>
                      <th>Nhóm</th>
                      <th>Thời gian</th>
                      <th>Ngày bắt đầu</th>
                      <th>Địa điểm</th>
                      <th>Giảng viên</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data['ListDetailedCourse']) {
                      $i = 1;
                      while ($value = $data['ListDetailedCourse']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['subject']; ?></td>
                          <td><?php echo $value['group']; ?></td>
                          <td><?php echo $value['period']; ?></td>
                          <td><?php echo date("d/m/Y", strtotime($value['date'])); ?></td>
                          <td><?php echo $value['local']; ?></td>
                          <td><?php echo $value['teacher']; ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteDetailedCourse('<?php echo $value['id_course'] ?>', '<?php echo $value['subject'] ?>', '<?php echo $value['group'] ?>')" data-toggle="modal" data-target="#deleteDetailedCourse"><i class="fas fa-trash"></i> Xóa </a>
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
  <!-- Xóa lịch học-->
  <div class="modal fade" id="deleteDetailedCourse">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="" method="post">
          <input type="hidden" id="delete-id_course" name="id_course">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA LỊCH HỌC</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn xóa <strong id="delete-info-subject"></strong><strong>, Nhóm </strong><strong id="delete-info-group"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteDetailedCourse" class="btn btn-danger">Xóa lịch học</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>