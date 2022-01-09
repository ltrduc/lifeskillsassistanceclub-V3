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
                    <h2 class="mb-3 font-18"><?php echo $Dashboard->Post() ?>/<?php echo $Dashboard->Post() ?></h2>
                    <p class="mb-0">Số lượng: <span class="col-green"><?php echo $Dashboard->Post() ?></span></p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="public/assets/img/banner/1.png" alt="">
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
                    <h2 class="mb-3 font-18"><?php echo $Dashboard->Member() ?>/<?php echo $Dashboard->Personnel() ?></h2>
                    <p class="mb-0">Số lượng: <span class="col-orange"><?php echo $Dashboard->Member() ?></span></p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="public/assets/img/banner/2.png" alt="">
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
                    <h2 class="mb-3 font-18"><?php echo $Dashboard->Collaborate() ?>/<?php echo $Dashboard->Personnel() ?></h2>
                    <p class="mb-0">Số lượng: <span class="col-green"><?php echo $Dashboard->Collaborate() ?></span> </p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="public/assets/img/banner/4.png" alt="">
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
                    <h2 class="mb-3 font-18"><?php echo $Dashboard->Administration() ?>/<?php echo $Dashboard->Personnel() ?></h2>
                    <p class="mb-0">Số lượng: <span class="col-orange"><?php echo $Dashboard->Administration() ?></span></p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="public/assets/img/banner/3.png" alt="">
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
            <h4>LỊCH HỌC HÔM NAY - NGÀY 04/01/2022</h4>
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
                  <tr>
                    <td>1</td>
                    <td>Thái độ sống 1</td>
                    <td>01</td>
                    <td>AM:01</td>
                    <td>07/01/2022</td>
                    <td>Hội trường 10A</td>
                    <td>Nguyễn Thị Nhung</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Thái độ sống 1</td>
                    <td>03</td>
                    <td>PM:02</td>
                    <td>07/01/2022</td>
                    <td>Hội trường 10A</td>
                    <td>Nguyễn Thị Nhung</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>