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
              <div class="card-header-action">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addCourse"><i class="fas fa-plus"></i> Thêm lịch học</a>
              </div>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th style="width: 5%;">#</th>
                      <th style="width: 6%;">Ngày học</th>
                      <th style="width: 6%;">Học kỳ</th>
                      <th style="width: 6%;">Năm học</th>
                      <th style="width: 10%;">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data['ListCourse']) {
                      $i = 1;
                      while ($value = $data['ListCourse']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo date("d/m/Y", strtotime($value['date'])); ?></td>
                          <td>Học kỳ 1</td>
                          <td>2020-2021</td>
                          <td>
                            <a href="Admin/DetailedCourse&id_schoolyear=<?php echo $value['id_schoolyear'] ?>&semester=<?php echo $value['semester'] ?>&date=<?php echo $value['date'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-book"></i> Xem lịch học </a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteCourse('<?php echo $value['id_schoolyear'] ?>','<?php echo $value['semester'] ?>','<?php echo $value['date'] ?>')" data-toggle="modal" data-target="#deleteCourse"><i class="fas fa-trash"></i> Xóa lịch học </a>
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

  <!-- Quản lý lịch học -->
  <div class="modal fade" id="addCourse">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">THÊM LỊCH HỌC</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="Admin/Course" method="POST">
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <label for="subjects">Môn học: </label>
                  <select name="id_subject" class="form-control">
                    <option value="" class="font-weight-bold">Chọn môn học</option>
                    <?php if ($data['ListSubject']) {
                      while ($value = $data['ListSubject']->fetch_assoc()) { ?>
                        <option value="<?php echo $value['id_subject'] ?>"><?php echo $value['subject'] ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="group">Nhóm:</label>
                  <input type="text" class="form-control" name="group" placeholder="01">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <label for="teacher">Tên Giảng viên: </label>
                  <input type="text" class="form-control" name="teacher" placeholder="Nguyễn Thị Nhung">
                </div>
              </div>
              <div class="col-sm">
                <label for="period">Buổi học: </label>
                <select name="period" class="form-control mb-3">
                  <option value="" class="font-weight-bold">Chọn buổi học</option>
                  <option value="SA:01">SA:01</option>
                  <option value="SA:02">SA:02</option>
                  <option value="CH:01">CH:01</option>
                  <option value="CH:02">CH:02</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <label for="local">Địa điểm</label>
                <select name="local" class="form-control mb-3">
                  <option value="" class="font-weight-bold">Chọn địa điểm</option>
                  <option value="HT 02A">HT 02A</option>
                  <option value="HT 06B">HT 06B</option>
                  <option value="HT 10A">HT 10A</option>
                  <option value="HT 10F">HT 10F</option>
                  <option value="[---]">[---]</option>
                </select>
              </div>
              <div class="col-sm">
                <label for="date">Ngày bắt đầu:</label>
                <input type="text" class="form-control datepicker" name="date">
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <label for="semester">Học kỳ</label>
                <select name="semester" class="form-control mb-3">
                  <option value="" class="font-weight-bold">Chọn học kỳ</option>
                  <option value="Học kỳ 1">Học kỳ 1</option>
                  <option value="Học kỳ 2">Học kỳ 2</option>
                  <option value="Học kỳ Hè">Học kỳ Hè</option>
                </select>
              </div>
              <div class="col-sm">
                <label for="id_schoolyear">Niên học:</label>
                <select name="id_schoolyear" class="form-control">
                  <option value="" class="font-weight-bold">Chọn niên học</option>
                  <?php if ($data['ListSchoolYear']) {
                    while ($value = $data['ListSchoolYear']->fetch_assoc()) { ?>
                      <option value="<?php echo $value['id_schoolyear'] ?>"><?php echo $value['schoolyear'] ?></option>
                  <?php }
                  } ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <div class="form-group">
                <button name="addCourse" type="submit" class="btn btn-success">Thêm lịch học</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Xóa thành viên -->
  <div class="modal fade" id="deleteCourse">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/Course" method="post">
          <input type="hidden" id="delete-id_schoolyear" name="id_schoolyear">
          <input type="hidden" id="delete-semester" name="semester">
          <input type="hidden" id="delete-date" name="date">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA LỊCH HỌC</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc chắn muốn xóa lịch học ngày <strong id="delete-info-date"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteCourse" class="btn btn-danger">Xóa lịch học</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>