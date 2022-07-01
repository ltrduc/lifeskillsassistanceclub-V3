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
                      <th>Mã môn</th>
                      <th>Môn học</th>
                      <th>Nhóm</th>
                      <th>Thời gian</th>
                      <th>Ngày bắt đầu</th>
                      <th>Địa điểm</th>
                      <th>Giảng viên</th>
                      <?php if (Session::get('pmsAdmin') == 1) { ?>
                        <th>Thao tác</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data['ListDetailedCourse']) {
                      $fm = new Format();
                      while ($value = $data['ListDetailedCourse']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $value['code_subject']; ?></td>
                          <td><?php echo $value['subject']; ?></td>
                          <td><?php echo $value['group']; ?></td>
                          <td><?php echo $value['period']; ?></td>
                          <td><?php echo $fm->formatDate($value['date']); ?></td>
                          <td><?php echo $value['local']; ?></td>
                          <td><?php echo $value['teacher']; ?></td>
                          <?php if (Session::get('pmsAdmin') == 1) { ?>
                            <td>
                              <a href="#" onclick="updateDetailedCourse('<?php echo $value['id_course'] ?>', '<?php echo $value['id_subject'] ?>', '<?php echo $value['group'] ?>', '<?php echo $value['teacher'] ?>', '<?php echo $value['period'] ?>', '<?php echo $value['local'] ?>', '<?php echo $value['date'] ?>', '<?php echo $value['semester'] ?>', '<?php echo $value['id_schoolyear'] ?>')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateDetailedCourse"><i class="fas fa-file-signature"></i> Sửa </a>
                              <a href="#" class="btn btn-sm btn-danger" onclick="deleteDetailedCourse('<?php echo $value['id_course'] ?>', '<?php echo $value['subject'] ?>', '<?php echo $value['group'] ?>')" data-toggle="modal" data-target="#deleteDetailedCourse"><i class="fas fa-trash"></i> Xóa </a>
                            </td>
                          <?php } ?>
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

  <!-- Quản lý lịch học -->
  <div class="modal fade" id="updateDetailedCourse">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">CHỈNH SỬA LỊCH HỌC</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST" class="needs-validation" novalidate="">
            <input type="hidden" id="update-id_course" name="id_course">
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <label for="subjects">Môn học: </label>
                  <select name="id_subject" id="update-id_subject" class="form-control" tabindex="1" required autofocus>
                    <option value="" class="font-weight-bold">Chọn môn học</option>
                    <?php if ($data['ListSubject']) {
                      while ($value = $data['ListSubject']->fetch_assoc()) { ?>
                        <option value="<?php echo $value['id_subject'] ?>"><?php echo $value['subject'] ?></option>
                    <?php }
                    } ?>
                  </select>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="group">Nhóm:</label>
                  <input type="text" class="form-control" id="update-group" name="group" placeholder="01" tabindex="2" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <label for="teacher">Giảng viên: </label>
                  <input type="text" class="form-control" id="update-teacher" name="teacher" placeholder="Nguyễn Thị Nhung" tabindex="3" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="period">Buổi học: </label>
                  <select name="period" id="update-period" class="form-control" tabindex="4" required autofocus>
                    <option value="" class="font-weight-bold">Chọn buổi học</option>
                    <option value="SA:01">SA:01</option>
                    <option value="SA:02">SA:02</option>
                    <option value="CH:01">CH:01</option>
                    <option value="CH:02">CH:02</option>
                  </select>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <label for="local">Địa điểm</label>
                  <select name="local" id="update-local" class="form-control" tabindex="5" required autofocus>
                    <option value="" class="font-weight-bold">Chọn địa điểm</option>
                    <option value="HT 02A">HT 02A</option>
                    <option value="HT 06B">HT 06B</option>
                    <option value="HT 10A">HT 10A</option>
                    <option value="HT 10F">HT 10F</option>
                    <option value="[---]">[---]</option>
                  </select>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="date">Ngày bắt đầu:</label>
                  <input type="date" id="update-date" class="form-control" name="date" tabindex="6" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <label for="semester">Học kỳ</label>
                  <select name="semester" id="update-semester" class="form-control" tabindex="7" required autofocus>
                    <option value="" class="font-weight-bold">Chọn học kỳ</option>
                    <option value="Học kỳ 1">Học kỳ 1</option>
                    <option value="Học kỳ 2">Học kỳ 2</option>
                    <option value="Học kỳ Hè">Học kỳ Hè</option>
                  </select>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="id_schoolyear">Năm học:</label>
                  <select name="id_schoolyear" id="update-id_schoolyear" class="form-control" tabindex="8" required autofocus>
                    <option value="" class="font-weight-bold">Chọn năm học</option>
                    <?php if ($data['ListSchoolYear']) {
                      while ($value = $data['ListSchoolYear']->fetch_assoc()) { ?>
                        <option value="<?php echo $value['id_schoolyear'] ?>"><?php echo $value['schoolyear'] ?></option>
                    <?php }
                    } ?>
                  </select>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="form-group">
                <button name="updateDetailedCourse" type="submit" tabindex="9" class="btn btn-primary">Chỉnh sửa lịch học</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

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