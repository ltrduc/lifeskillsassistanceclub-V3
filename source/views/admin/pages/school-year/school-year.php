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
              <h4>THÊM MỚI NĂM HỌC</h4>
            </div>
            <div class="card-body">
              <form action="Admin/SchoolYear" method="post">
                <div class="form-group">
                  <label>Năm học</label>
                  <input type="text" name="schoolyear" placeholder="2021-2022" class="form-control">
                </div>
                <div class="form-group">
                  <label>Ghi chú</label>
                  <input type="text" name="note" class="form-control">
                </div>
                <div class="form-group text-right">
                  <button class="btn btn-success mr-1" name="addSchoolYear" type="submit">Thêm mới năm học</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4>DANH SÁCH NĂM HỌC</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Năm học</th>
                      <th>Ghi chú</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data['ListSchoolYear']) {
                      while ($value = $data['ListSchoolYear']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $value['id_schoolyear']; ?></td>
                          <td><?php echo $value['schoolyear']; ?></td>
                          <td><?php echo $value['note']; ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-primary" onclick="updateSchoolYear('<?php echo $value['id_schoolyear'] ?>', '<?php echo $value['schoolyear'] ?>','<?php echo $value['note'] ?>')" data-toggle="modal" data-target="#updateSchoolYear"><i class="fas fa-file-signature"></i> Sửa </a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteSchoolYear('<?php echo $value['id_schoolyear']; ?>', '<?php echo $value['schoolyear']; ?>')" data-toggle="modal" data-target="#deleteSchoolYear"><i class="fas fa-trash"></i> Xóa </a>
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

  <!-- Xóa năm học -->
  <div class="modal fade" id="deleteSchoolYear">
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

  <!-- Sửa năm học -->
  <div class="modal fade" id="updateSchoolYear">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">CHỈNH SỬA NĂM HỌC</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="Admin/SchoolYear" method="post">
            <input type="hidden" id="update-id_schoolyear" name="id_schoolyear">
            <div class="form-group">
              <label>Năm học</label>
              <input type="text" id="update-schoolyear" name="schoolyear" placeholder="2021-2022" class="form-control">
            </div>
            <div class="form-group">
              <label>Ghi chú</label>
              <input type="text" id="update-note" name="note" class="form-control">
            </div>
            <div class="form-group text-right">
              <button class="btn btn-primary mr-1" name="updateSchoolYear" type="submit">Chỉnh sửa năm học</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>