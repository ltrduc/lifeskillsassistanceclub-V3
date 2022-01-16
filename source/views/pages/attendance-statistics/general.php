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
              <h4>DANH SÁCH TỔNG QUAN</h4>
              <div class="card-header-action">
                <a href="Admin/DetailedStatistics&id_schoolyear=<?php echo $data['id_schoolyear'] ?>&semester=<?php echo $data['semester'] ?>" class="btn btn-primary btn-icon icon-right">Xem chi tiết <i class="fas fa-chevron-right"></i></a>
              </div>
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
                      <th>Có mặt</th>
                      <th>Trễ</th>
                      <th>Vắng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    if ($data['ListGeneralStatistics']) {
                      while ($value = $data['ListGeneralStatistics']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['id_student']; ?></td>
                          <td><?php echo $value['fullname']; ?></td>
                          <td><?php echo $value['team']; ?></td>
                          <td><?php echo $value['Present']; ?></td>
                          <td><?php echo $value['Late']; ?></td>
                          <td><?php echo $value['Absent']; ?></td>
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
</div>