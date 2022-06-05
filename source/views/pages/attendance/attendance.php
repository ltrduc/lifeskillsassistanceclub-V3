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
      <form action="Admin/Attendance" method="post" class="needs-validation" novalidate="">
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h4>ĐIỂM DANH BUỔI TRỰC</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Năm học</label>
                  <select class="form-control selectric" name="id_schoolyear" tabindex="1" required autofocus>
                    <option value="" class="font-weight-bold">Chọn năm học</option>
                    <?php if ($data['ListSchoolYear']) {
                      while ($value = $data['ListSchoolYear']->fetch_assoc()) { ?>
                        <option value="<?php echo $value['id_schoolyear']; ?>"><?php echo $value['schoolyear']; ?></option>
                    <?php }
                    } ?>
                  </select>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
                <div class="form-group">
                  <label>Học kỳ</label>
                  <select class="form-control selectric" name="semester" tabindex="2" required autofocus>
                    <option value="" class="font-weight-bold">Chọn học kỳ</option>
                    <option value="Học kỳ 1">Học kỳ 1</option>
                    <option value="Học kỳ 2">Học kỳ 2</option>
                    <option value="Học kỳ Hè">Học kỳ Hè</option>
                  </select>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
                <div class="form-group">
                  <label>Ngày trực</label>
                  <input type="date" class="form-control" name="date" tabindex="3" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
                <input type="hidden" class="form-control" name="attendance" value="Present">
                <div class="form-group text-right">
                  <button class="btn btn-success mr-1" tabindex="5" type="submit">Điểm danh buổi trực</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h4>DANH SÁCH THÀNH VIÊN</h4>
                <div class="card-header-form">
                  <div class="input-group">
                    <input type="text" class="form-control" id="Search-Attendance" placeholder="Search">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <style>
                  .attendance-scrollbar {
                    position: relative;
                    height: 500px;
                    overflow: auto;
                  }

                  .table-wrapper-scroll-y-attendance {
                    display: block;
                  }
                </style>
                <table class="table table-md table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>MSSV</th>
                      <th>Họ và tên</th>
                      <th class="text-center">Ca 1</th>
                      <th class="text-center">Ca 2</th>
                      <th class="text-center">Ca 3</th>
                      <th class="text-center">Ca 4</th>                    
                    </tr>
                  </thead>
                </table>
                <div class="table-responsive table-wrapper-scroll-y-attendance attendance-scrollbar">
                  <table class="table table-md table-bordered table-hover" id="Attendance-Table">
                      <tbody>
                        <?php
                        $counter = 0;
                        $i = 1;
                        if ($data['ListPersonnel']) {
                          while ($value = $data['ListPersonnel']->fetch_assoc()) { ?>
                            <tr class="Attendance-tr">
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $value['id_student']; ?><input type="hidden" name="id_user[<?php echo $counter ?>]" value="<?php echo $value['id_user']; ?>"></td>
                              <td><?php echo $value['fullname']; ?></td>
                              <td class="text-center"><input type="checkbox" name="shift1[<?php echo $counter ?>]" value="Ca 1"></td>
                              <td class="text-center"><input type="checkbox" name="shift2[<?php echo $counter ?>]" value="Ca 2"></td>
                              <td class="text-center"><input type="checkbox" name="shift3[<?php echo $counter ?>]" value="Ca 3"></td>
                              <td class="text-center"><input type="checkbox" name="shift4[<?php echo $counter ?>]" value="Ca 4"></td>
                            </tr>
                        <?php $counter++;
                          }
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