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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Quản lý cộng tác viên</li>
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
              <h4>DANH SÁCH CỘNG TÁC VIÊN</h4>
              <div class="card-header-action">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addCollaborate"><i class="fas fa-plus"></i> Thêm mới cộng tác viên</a>
                <a href="Admin/DetailedCollaborate" class="btn btn-primary">Xem chi tiết <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th style="width: 5%;">#</th>
                      <th style="width: 10%;">MSSV</th>
                      <th style="width: 10%;">Họ và tên</th>
                      <th style="width: 10%;">Số điện thoại</th>
                      <th style="width: 10%;">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    if ($data['ListCollaborate']) {
                      while ($value = $data['ListCollaborate']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['id_student'] ?></td>
                          <td><?php echo $value['fullname'] ?></td>
                          <td><?php echo $value['phone'] ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-primary" onclick="editCollaborate('<?php echo $value['id_user'] ?>', '<?php echo $value['id_student'] ?>','<?php echo $value['fullname'] ?>')" data-toggle="modal" data-target="#editCollaborate"><i class="fas fa-file-signature"></i> Chỉnh sửa </a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteCollaborate('<?php echo $value['id_user'] ?>','<?php echo $value['fullname'] ?>')" data-toggle="modal" data-target="#deleteCollaborate"><i class="fas fa-trash"></i> Xóa </a>
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

  <!-- Thêm cộng tác viên -->
  <div class="modal fade" id="addCollaborate">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">THÊM CỘNG TÁC VIÊN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="Admin/Collaborate" method="post" class="needs-validation" novalidate="">
            <div class="form-group">
              <label>Họ và tên</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user-check"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Nguyễn Văn A" name="fullname" tabindex="1" required autofocus>
                <div class="invalid-feedback">Vui lòng không bỏ trống họ và tên!</div>
              </div>
            </div>
            <div class="form-group">
              <label>Mã số sinh viên</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-address-card"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="51900001" name="id_student" tabindex="2" required autofocus>
                <div class="invalid-feedback">Vui lòng không bỏ trống mã số sinh viên!</div>
              </div>
            </div>
            <div class="form-group">
              <label>Ban hoạt động</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-layer-group"></i>
                  </div>
                </div>
                <input type="text" class="form-control" disabled placeholder="[---]" name="team">
              </div>
            </div>
            <div class="form-group text-right">
              <button type="submit" name="addCollaborate" tabindex="3" class="btn btn-success m-t-15 waves-effect">Thêm mới cộng tác viên</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Xóa cộng tác viên -->
  <div class="modal fade" id="deleteCollaborate">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/Collaborate" method="post">
          <input type="hidden" id="delete-id_user" name="id_user">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA CỘNG TÁC VIÊN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc chắn muốn xóa <strong id="delete-info-collaborate"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteCollaborate" class="btn btn-danger">Xóa cộng tác viên</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Sửa cộng tác viên -->
  <div class="modal fade" id="editCollaborate">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">CHỈNH SỬA CỘNG TÁC VIÊN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="Admin/Collaborate" method="post" class="needs-validation" novalidate="">
            <input type="hidden" id="edit-id_user" name="id_user">
            <div class="form-group">
              <label>Họ và tên</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user-check"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Nguyễn Văn A" id="edit-fullname" name="fullname" tabindex="1" required autofocus>
                <div class="invalid-feedback">Vui lòng không bỏ trống họ và tên!</div>
              </div>
            </div>
            <div class="form-group">
              <label>Mã số sinh viên</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-address-card"></i>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="51900001" id="edit-id_student" name="id_student" tabindex="2" required autofocus>
                <div class="invalid-feedback">Vui lòng không bỏ trống mã số sinh viên!</div>
              </div>
            </div>
            <div class="form-group">
              <label>Ban hoạt động</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-layer-group"></i>
                  </div>
                </div>
                <input type="text" class="form-control" disabled placeholder="[---]" name="team">
              </div>
            </div>
            <div class="form-group text-right">
              <button type="submit" name="editCollaborate" tabindex="3" class="btn btn-primary m-t-15 waves-effect">Chỉnh sửa cộng tác viên</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>