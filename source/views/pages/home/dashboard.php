<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Bài đăng</h5>
                    <h2 class="mb-3 font-18"><?php echo $data['CountPost']; ?>/<?php echo $data['CountPost']; ?></h2>
                    <p class="mb-0">Số lượng: <span class="col-green"><?php echo $data['CountPost']; ?></span></p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="source/public/img/banner/1.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Thành viên</h5>
                    <h2 class="mb-3 font-18"><?php echo $data['CountMember']; ?>/<?php echo $data['CountPersonnel']; ?></h2>
                    <p class="mb-0">Số lượng: <span class="col-orange"><?php echo $data['CountMember']; ?></span></p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="source/public/img/banner/2.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Cộng tác viên</h5>
                    <h2 class="mb-3 font-18"><?php echo $data['CountCollaborate']; ?>/<?php echo $data['CountPersonnel']; ?></h2>
                    <p class="mb-0">Số lượng: <span class="col-green"><?php echo $data['CountCollaborate']; ?></span> </p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="source/public/img/banner/4.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Ban điều hành</h5>
                    <h2 class="mb-3 font-18"><?php echo $data['CountAdministration']; ?>/<?php echo $data['CountPersonnel']; ?></h2>
                    <p class="mb-0">Số lượng: <span class="col-orange"><?php echo $data['CountAdministration']; ?></span></p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="source/public/img/banner/3.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>LỊCH HỌC HÔM NAY - NGÀY <?php echo date("d/m/Y"); ?></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Môn học</th>
                    <th>Nhóm</th>
                    <th>Thời gian</th>
                    <th>Ngày bắt đầu</th>
                    <th>Địa điểm</th>
                    <th>Giảng viên</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($data['ListCourseToday']) {
                    $i = 1;
                    while ($value = $data['ListCourseToday']->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $value['subject']; ?></td>
                        <td><?php echo $value['group']; ?></td>
                        <td><?php echo $value['period']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($value['date'])); ?></td>
                        <td><?php echo $value['local']; ?></td>
                        <td><?php echo $value['teacher']; ?></td>
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
  </section>
</div>