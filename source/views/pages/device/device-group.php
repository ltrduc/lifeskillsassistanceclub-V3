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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Quản lý nhóm thiết bị </li>
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
              <h4>THÊM NHÓM THIẾT BỊ</h4>
            </div>
            <div class="card-body">
              <form action="Admin/DeviceGroup" method="post">
                <div class="form-group">
                  <label>Nhóm thiết bị</label>
                  <input type="text" name="devicegroup" placeholder="Bảng" class="form-control">
                </div>
                <div class="form-group">
                  <label>Ghi chú</label>
                  <input type="text" name="note" class="form-control">
                </div>
                <div class="form-group text-right">
                  <button class="btn btn-success mr-1" name="addDeviceGroup" type="submit">Thêm mới</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4>DANH SÁCH NHÓM THIẾT BỊ</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nhóm thiết bị</th>
                      <th>Ghi chú</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    if ($data['ListDeviceGroup']) {
                      while ($value = $data['ListDeviceGroup']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['devicegroup']; ?></td>
                          <td><?php echo $value['note']; ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-primary" onclick="updateDeviceGroup('<?php echo $value['id_devicegroup'] ?>', '<?php echo $value['devicegroup'] ?>','<?php echo $value['note'] ?>')" data-toggle="modal" data-target="#updateDeviceGroup"><i class="fas fa-file-signature"></i> Sửa </a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteDeviceGroup('<?php echo $value['id_devicegroup']; ?>', '<?php echo $value['devicegroup']; ?>')" data-toggle="modal" data-target="#deleteDeviceGroup"><i class="fas fa-trash"></i> Xóa </a>
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

  <!-- Xóa nhóm thiết bị -->
  <div class="modal fade" id="deleteDeviceGroup">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/DeviceGroup" method="post">
          <input type="hidden" id="delete-id_devicegroup" name="id_devicegroup">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA NHÓM THIẾT BỊ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn xóa nhóm thiết bị <strong id="delete-info-devicegroup"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteDeviceGroup" class="btn btn-danger">Xóa nhóm thiết bị</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Sửa nhóm thiết bị -->
  <div class="modal fade" id="updateDeviceGroup">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">CHỈNH SỬA NHÓM THIẾT BỊ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="Admin/DeviceGroup" method="post">
            <input type="hidden" id="update-id_devicegroup" name="id_devicegroup">
            <div class="form-group">
              <label>Nhóm thiết bị</label>
              <input type="text" id="update-devicegroup" name="devicegroup" placeholder="Bảng" class="form-control">
            </div>
            <div class="form-group">
              <label>Ghi chú</label>
              <input type="text" id="update-note" name="note" class="form-control">
            </div>
            <div class="form-group text-right">
              <button class="btn btn-primary mr-1" name="updateDeviceGroup" type="submit">Chỉnh sửa nhóm thiết bị</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>