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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Thống kê thiết bị </li>
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
              <h4>DANH SÁCH THỐNG KÊ</h4>
              <div class="card-header-action">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addDeviceStatistics"><i class="fas fa-plus"></i> Thêm mới thống kê</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-md table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th colspan="4">Thông tin thiết bị</th>
                      <th colspan="2">Hiện trạng sử dụng</th>
                      <th colspan="3">Tình trạng thiết bị</th>
                      <th colspan="2"></th>
                    </tr>
                    <tr>
                      <th>#</th>
                      <th>Nhóm <br> Thiết bị</th>
                      <th>Thiết bị</th>
                      <th>Số lượng</th>
                      <th>Chưa <br> Sử dụng</th>
                      <th>Đang <br> Sử dụng</th>
                      <th>Còn sử<br> dụng được</th>
                      <th>Hỏng</th>
                      <th>Mất</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data['ListDeviceStatistics']) {
                      $i = 1;
                      while ($value = $data['ListDeviceStatistics']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['devicegroup']; ?></td>
                          <td><?php echo $value['device']; ?></td>
                          <td><?php echo $value['quantily']; ?></td>
                          <td class="font-weight-bold" style="color: brown;"><?php echo $value['donotuse']; ?></td>
                          <td class="font-weight-bold" style="color: brown;"><?php echo $value['using']; ?></td>
                          <td><?php echo $value['normal']; ?></td>
                          <td><?php echo $value['broken']; ?></td>
                          <td><?php echo $value['lost']; ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-file-signature"></i></a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteDeviceStatistics('<?php echo $value['id_devicestatistics'] ?>','<?php echo $value['device'] ?>')" data-toggle="modal" data-target="#deleteDeviceStatistics"><i class="fas fa-trash"></i></a>
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

  <!-- Thêm thống kê -->
  <div class="modal fade" id="addDeviceStatistics">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">THÊM THỐNG KÊ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="Admin/DeviceStatistics" method="post" class="needs-validation" novalidate="">
            <div class="form-group">
              <label>Thiết bị</label>
              <select class="form-control selectric" name="id_device" tabindex="1" required autofocus>
                <option value="" class="font-weight-bold">Chọn thiết bị</option>
                <?php if ($data['ListDevice']) {
                  while ($value = $data['ListDevice']->fetch_assoc()) { ?>
                    <option value="<?php echo $value['id_device']; ?>"><?php echo $value['device']; ?></option>
                <?php }
                } ?>
              </select>
              <div class="invalid-feedback">Vui lòng không bỏ trống thiết bị!</div>
            </div>
            <div class="form-group">
              <label>Số lượng</label>
              <input type="number" class="form-control" placeholder="200" name="quantily" tabindex="2" required autofocus>
              <div class="invalid-feedback">Vui lòng không bỏ trống số lượng!</div>
            </div>
            <div class="form-group text-right">
              <button type="submit" name="addDeviceStatistics" tabindex="3" class="btn btn-success m-t-15 waves-effect">Thêm mới thống kê</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Xóa thống kê -->
  <div class="modal fade" id="deleteDeviceStatistics">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/DeviceStatistics" method="post">
          <input type="hidden" id="delete-id_devicestatistics" name="id_devicestatistics">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA THỐNG KÊ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn xóa thống kê <strong id="delete-info-device"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteDeviceStatistics" class="btn btn-danger">Xóa thống kê</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>