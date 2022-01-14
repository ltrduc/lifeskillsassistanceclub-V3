<!-- Main Content -->
<div class="main-content">
  <section class="section mb-3">
    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body p-2">
              <nav aria-label="breadcrumb m-0">
                <ol class="breadcrumb bg-white m-0">
                  <li class="breadcrumb-item"><a href="Home"><i class="fas fa-home"></i>Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Điểm danh buổi trực</li>
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
      <form action="Admin/Attendance" method="post">
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h4>THAO TÁC</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Năm học</label>
                  <select class="form-control selectric" name="id_schoolyear">
                    <option value="" class="font-weight-bold">Chọn Năm học</option>
                    <?php if ($data['ListSchoolYear']) {
                      while ($value = $data['ListSchoolYear']->fetch_assoc()) { ?>
                        <option value="<?php echo $value['id_schoolyear']; ?>"><?php echo $value['schoolyear']; ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Học kỳ</label>
                  <select class="form-control selectric" name="semester">
                    <option value="" class="font-weight-bold">Chọn Học kỳ</option>
                    <option value="Học kỳ 1">Học kỳ 1</option>
                    <option value="Học kỳ 2">Học kỳ 2</option>
                    <option value="Học kỳ Hè">Học kỳ Hè</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Ngày trực</label>
                  <input type="date" class="form-control" name="date">
                </div>
                <div class="form-group">
                  <label>Ca trực</label>
                  <select class="form-control selectric" name="shift">
                    <option value="" class="font-weight-bold">Chọn Ca trực</option>
                    <option value="Ca 1">Ca 1</option>
                    <option value="Ca 2">Ca 2</option>
                    <option value="Ca 3">Ca 3</option>
                    <option value="Ca 4">Ca 4</option>
                  </select>
                </div>
                <div class="form-group text-right">
                  <button class="btn btn-primary mr-1" type="submit">Điểm danh</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h4>DANH SÁCH THÀNH VIÊN</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="table-1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>MSSV</th>
                        <th>Họ và tên</th>
                        <th class="text-center">Có mặt</th>
                        <th class="text-center">Trễ</th>
                        <th class="text-center">Vắng</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $counter = 0;
                      $i = 1;
                      while ($value = $data['ListPersonnel']->fetch_assoc()) {
                      ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['id_student']; ?><input type="hidden" name="id_user[<?php echo $counter ?>]" value="<?php echo $value['id_user']; ?>"></td>
                          <td><?php echo $value['fullname']; ?></td>
                          <td class="text-center"><input type="radio" name="attendance[<?php echo $counter ?>]" value="Present"></td>
                          <td class="text-center"><input type="radio" name="attendance[<?php echo $counter ?>]" value="Late"></td>
                          <td class="text-center"><input type="radio" name="attendance[<?php echo $counter ?>]" value="Absent"></td>
                        </tr>
                      <?php $counter++;
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>