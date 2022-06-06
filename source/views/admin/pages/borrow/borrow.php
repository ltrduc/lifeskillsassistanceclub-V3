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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Quản lý mượn-trả</li>
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
              <h4>DANH SÁCH MƯỢN-TRẢ</h4>
              <div class="card-header-action">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addBorrow"><i class="fas fa-plus"></i> Thêm mới mượn-trả</a>
              </div>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Người mượn</th>
                      <th>Số ĐT</th>
                      <th>Thiết bị</th>
                      <th>Số lượng</th>
                      <th>Ngày mượn</th>
                      <th>Mục đích</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data['ListBorrow']) {
                      $i = 1;
                      while ($value = $data['ListBorrow']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['borrower']; ?></td>
                          <td><?php echo $value['phone']; ?></td>
                          <td><?php echo $value['device']; ?></td>
                          <td><?php echo $value['quantily']; ?></td>
                          <td><?php echo $value['date']; ?></td>
                          <td><?php echo $value['purpose']; ?></td>
                          <td>
                            <?php if ($value['id_status'] == 1) { ?>
                              <h6><span class="badge badge-success"><?php echo $value['status']; ?></span></h6>
                            <?php } else { ?>
                              <h6><span class="badge badge-danger"><?php echo $value['status']; ?></span></h6>
                            <?php } ?>
                          </td>
                          <td>
                            <form action="Admin/Borrow" method="post" style="display: inline;">
                              <input type="hidden" name="id_borrow" value="<?php echo $value['id_borrow']; ?>">
                              <?php if ($value['id_status'] == 1) { ?>
                                <button type="submit" value="0" name="updateStatus" class="btn btn-sm btn-success btn-icon icon-left"><i class="fas fa-toggle-on"></i></span></button>
                              <?php } else { ?>
                                <button type="submit" value="1" name="updateStatus" class="btn btn-sm btn-danger btn-icon icon-left"><i class="fas fa-toggle-off"></i></span></button>
                              <?php } ?>
                            </form>
                            <a href="#" class="btn btn-sm btn-primary" onclick="updateBorrow('<?php echo $value['id_borrow'] ?>','<?php echo $value['borrower'] ?>','<?php echo $value['phone'] ?>','<?php echo $value['device'] ?>','<?php echo $value['quantily'] ?>','<?php echo $value['date'] ?>','<?php echo $value['purpose'] ?>')" data-toggle="modal" data-target="#updateBorrow"><i class="fas fa-file-signature"></i></a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteBorrow('<?php echo $value['id_borrow'] ?>','<?php echo $value['borrower'] ?>')" data-toggle="modal" data-target="#deleteBorrow"><i class="fas fa-trash"></i></a>
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

  <!-- Thêm mượn trả -->
  <div class="modal fade" id="addBorrow">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">THÊM MỚI MƯỢN-TRẢ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="Admin/Borrow" method="post" class="needs-validation" novalidate="">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Người mượn</label>
                  <input type="text" class="form-control" placeholder="Nguyễn Văn A" name="borrower" tabindex="1" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="number" class="form-control" placeholder="0377000001" name="phone" tabindex="2" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Thiết bị</label>
                  <input type="text" class="form-control" placeholder="Bút chiếu" name="device" tabindex="3" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Số lượng</label>
                  <input type="number" class="form-control" placeholder="1" name="quantily" tabindex="4" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ngày mượn</label>
                  <input type="date" class="form-control" name="date" tabindex="5" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Mục đích</label>
                  <input type="text" class="form-control" placeholder="Giảng dạy" name="purpose" tabindex="6" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống dữ liệu!</div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group text-right">
                  <button type="submit" name="addBorrow" tabindex="7" class="btn btn-success m-t-15 waves-effect">Thêm mới</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Xóa mượn trả -->
  <div class="modal fade" id="deleteBorrow">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/Borrow" method="post">
          <input type="hidden" id="delete-id_borrow" name="id_borrow">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA MƯỢN-TRẢ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc chắn muốn xóa người mượn <strong id="delete-info-borrower"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteBorrow" class="btn btn-danger">Xóa mượn-trả</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Sửa mượn trả -->
  <div class="modal fade" id="updateBorrow">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">CHỈNH SỬA MƯỢN-TRẢ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="Admin/Borrow" method="post" class="needs-validation" novalidate="">
            <input type="hidden" id="update-id_borrow" name="id_borrow">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Người mượn</label>
                  <input type="text" class="form-control" placeholder="Nguyễn Văn A" id="update-borrower" name="borrower" tabindex="1" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống người mượn!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="number" class="form-control" placeholder="0377000001" id="update-phone" name="phone" tabindex="2" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống số điện thoại!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Thiết bị</label>
                  <input type="text" class="form-control" placeholder="Bút chiếu" id="update-device" name="device" tabindex="3" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống thiết bị!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Số lượng</label>
                  <input type="number" class="form-control" placeholder="1" id="update-quantily" name="quantily" tabindex="4" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống số lượng!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ngày mượn</label>
                  <input type="text" class="form-control datepicker" id="update-date" name="date" tabindex="5" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống ngày mượn!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Mục đích</label>
                  <input type="text" class="form-control" placeholder="Giảng dạy" id="update-purpose" name="purpose" tabindex="6" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống mục đích!</div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group text-right">
                  <button type="submit" name="updateBorrow" tabindex="7" class="btn btn-primary m-t-15 waves-effect">Chỉnh sửa</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>