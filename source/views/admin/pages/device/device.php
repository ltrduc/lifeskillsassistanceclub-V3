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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Danh mục thiết bị </li>
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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>THÊM MỚI THIẾT BỊ</h4>
            </div>
            <div class="card-body">
              <form action="Admin/Device" method="post">
                <div class="row">
                  <div class="col-sm">
                    <div class="form-group">
                      <label>Nhóm thiết bị</label>
                      <select class="form-control selectric" name="id_devicegroup">
                        <option value="" class="font-weight-bold">Chọn nhóm thiết bị</option>
                        <?php if ($data['ListDeviceGroup']) {
                          while ($value = $data['ListDeviceGroup']->fetch_assoc()) { ?>
                            <option value="<?php echo $value['id_devicegroup']; ?>"><?php echo $value['devicegroup']; ?></option>
                        <?php }
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="form-group">
                      <label>Thiết bị</label>
                      <input type="text" name="device" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="form-group">
                      <label>Mô tả</label>
                      <input type="text" name="description" class="form-control">
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="form-group">
                      <label>Ghi chú</label>
                      <input type="text" name="note" class="form-control">
                    </div>
                  </div>
                  <div class="col-12 text-right">
                    <button class="btn btn-success mr-1" name="addDevice" type="submit">Thêm mới thiết bị</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>DANH MỤC THIẾT BỊ</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nhóm thiết bị</th>
                      <th>Thiết bị</th>
                      <th>Mô tả</th>
                      <th>Ghi chú</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    if ($data['ListDevice']) {
                      while ($value = $data['ListDevice']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['devicegroup']; ?></td>
                          <td><?php echo $value['device']; ?></td>
                          <td><?php echo $value['description']; ?></td>
                          <td><?php echo $value['note']; ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-primary" onclick="updateDevice('<?php echo $value['devicegroup']; ?>','<?php echo $value['id_device']; ?>', '<?php echo $value['id_devicegroup']; ?>', '<?php echo $value['description']; ?>', '<?php echo $value['device']; ?>', '<?php echo $value['note']; ?>');" data-toggle="modal" data-target="#updateDevice"><i class="fas fa-file-signature"></i> Sửa </a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteDevice('<?php echo $value['id_device']; ?>', '<?php echo $value['device']; ?>');" data-toggle="modal" data-target="#deleteDevice"><i class="fas fa-trash"></i> Xóa </a>
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

  <!-- Xóa thiết bị -->
  <div class="modal fade" id="deleteDevice">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/Device" method="post">
          <input type="hidden" id="delete-id_device" name="id_device">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA THIẾT BỊ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn xóa thiết bị <strong id="delete-info-device"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteDevice" class="btn btn-danger">Xóa thiết bị</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Sửa thiết bị -->
  <div class="modal fade" id="updateDevice">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">CHỈNH SỬA THIẾT BỊ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="Admin/Device" method="post">
            <input type="hidden" id="update-id_device" name="id_device">
            <div class="form-group">
              <label>Nhóm thiết bị</label>
              <input type="hidden" id="update-id_devicegroup" name="id_devicegroup" class="form-control">
              <input type="text" id="update-id_devicegroup-disabled" disabled name="id_devicegroup" class="form-control">
            </div>
            <div class="form-group">
              <label>Thiết bị</label>
              <input type="text" id="update-device" name="device" class="form-control">
            </div>
            <div class="form-group">
              <label>Mô tả</label>
              <input type="text" id="update-description" name="description" class="form-control">
            </div>
            <div class="form-group">
              <label>Ghi chú</label>
              <input type="text" id="update-note" name="note" class="form-control">
            </div>
            <div class="form-group text-right">
              <button class="btn btn-primary mr-1" name="updateDevice" type="submit">Chỉnh sửa thiết bị</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>