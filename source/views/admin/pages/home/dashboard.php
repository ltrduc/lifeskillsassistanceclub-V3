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
                    <img src="source/public/img/banner/1.png" style="width: 104px; height: 104px;" alt="">
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
                    <img src="source/public/img/banner/2.png" style="width: 104px; height: 104px;" alt="">
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
                    <img src="source/public/img/banner/4.png" style="width: 104px; height: 104px;" alt="">
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
                    <h2 class="mb-3 font-18"><?php echo $data['CountAdministration']; ?>/<?php echo $data['CountPosition']; ?></h2>
                    <p class="mb-0">Số lượng: <span class="col-orange"><?php echo $data['CountAdministration']; ?></span></p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="source/public/img/banner/3.png" style="width: 104px; height: 104px;" alt="">
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
            <h4>LỊCH HỌC HÔM NAY - NGÀY
              <?php
              date_default_timezone_set("Asia/Ho_Chi_Minh");
              echo strtoupper(date('d/m/Y - h:i a', time()));
              ?></h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover mb-0" id="table-1">
                <thead>
                  <tr>
                    <th>Mã môn</th>
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
                    $fm = new Format();
                    $i = 1;
                    while ($value = $data['ListCourseToday']->fetch_assoc()) { ?>
                      <tr>
                        <td><?php echo $value['code_subject']; ?></td>
                        <td><?php echo $value['subject']; ?></td>
                        <td><?php echo $value['group']; ?></td>
                        <td><?php echo $value['period']; ?></td>
                        <td><?php echo $fm->formatDate($value['date']); ?></td>
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

<div class="modal fade" id="happybirthday">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CHÚC MỪNG SINH NHẬT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <!-- <span aria-hidden="true">×</span> -->
        </button>
      </div>
      <div class="modal-body">
        <?php if ($data['ListMember']) { while ($value = $data['ListMember']->fetch_assoc()) { 
          $todaydate = getdate();
          $birthdaydate = getdate(strtotime($value['birthday']));
          if ($todaydate['mday'] == $birthdaydate['mday'] && $todaydate['mon'] == $birthdaydate['mon']) { ?>
          Hôm nay là sinh nhật của <strong><?php echo $value['fullname']?>.</strong> Hãy chúc bạn ấy có một ngày vui vẻ. <br>
          <strong>Link Facebook: </strong><a target="_blank" href="<?php echo $value['facebook']?>"><?php echo $value['fullname']?></a>
          <hr>
          <script>
            $(document).ready(function(){
              $("#happybirthday").modal({show: true});
            })
          </script>
        <?php } } }?>
      </div>
    </div>
  </div>
</div>