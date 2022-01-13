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
                  <li class="breadcrumb-item"><a href="Home"><i class="fas fa-home"></i>Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Quản lý năm học </li>
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
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h4>THÊM NĂM HỌC</h4>
            </div>
            <div class="card-body">
              <form action="Admin/SchoolYear" method="post">
                <div class="form-group">
                  <label>Năm học</label>
                  <input type="text" name="schoolyear" placeholder="2021-2022" class="form-control">
                </div>
                <div class="form-group text-right">
                  <button class="btn btn-primary mr-1" name="addSchoolYear" type="submit">Thêm năm học</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="section-body">
            <h2 class="section-title mt-0">DANH SÁCH NĂM HỌC</h2>
            <div class="activities">
              <?php while ($value = $data['ListSchoolYear']->fetch_assoc()) { ?>
                <div class="activity">
                  <div class="activity-icon bg-primary text-white">
                    <i class="fas fa-arrows-alt"></i>
                  </div>
                  <div class="activity-detail">
                    <div class="mb-2">
                      <span class="text-job" style="font-size: 11px;">Năm học: <span class="text-success"><?php echo $value['schoolyear'] ?></span></span>
                      <span class="bullet"></span>
                      <a class="text-danger" style="font-size: 11px;" href="#" onclick="deleteShoolYear('<?php echo $value['id_schoolyear']; ?>', '<?php echo $value['schoolyear']; ?>')" data-toggle="modal" data-target="#deleteShoolYear">Xóa</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Xóa năm học -->
  <div class="modal fade" id="deleteShoolYear">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/SchoolYear" method="post">
          <input type="hidden" id="delete-id_schoolyear" name="id_schoolyear">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA NĂM HỌC</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn xóa năm học <strong id="delete-info-schoolyear"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteSchoolYear" class="btn btn-danger">Xóa năm học</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>