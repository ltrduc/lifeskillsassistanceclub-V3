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
                      <th>Lý do</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Lê Trí Đức</td>
                      <td>0377025449</td>
                      <td>Bút chiếu</td>
                      <td>1</td>
                      <td>2021-01-22</td>
                      <td>Giảng dạy</td>
                      <td>Đã trả</td>
                      <td>
                        <form action="Admin/Borrow" method="post" style="display: inline;">
                          <button type="submit" value="0" class="btn btn-sm btn-success btn-icon icon-left">
                            <i class="fas fa-toggle-on"></i></span>
                          </button>
                          <button type="submit" value="1" class="btn btn-sm btn-danger btn-icon icon-left">
                            <i class="fas fa-toggle-off"></i></span>
                          </button>
                        </form>
                        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editBorrow"><i class="fas fa-file-signature"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteBorrow"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
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
                  <input type="text" class="form-control" placeholder="Nguyễn Văn A" tabindex="1" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống người mượn!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="number" class="form-control" placeholder="0377000001" tabindex="2" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống số điện thoại!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Thiết bị</label>
                  <input type="text" class="form-control" placeholder="Bút chiếu" tabindex="3" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống thiết bị!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Số lượng</label>
                  <input type="number" class="form-control" placeholder="1" tabindex="4" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống số lượng!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ngày mượn</label>
                  <input type="text" class="form-control datepicker" tabindex="5" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống ngày mượn!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Lý do</label>
                  <input type="text" class="form-control" placeholder="Giảng dạy" tabindex="6" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống lý do!</div>
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
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA MƯỢN-TRẢ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc chắn muốn xóa người mượn <strong id="delete-info-borrow">Lê Trí Đức</strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteBorrow" class="btn btn-danger">Xóa mượn-trả</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Sửa mượn trả -->
  <div class="modal fade" id="editBorrow">
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
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Người mượn</label>
                  <input type="text" class="form-control" placeholder="Nguyễn Văn A" tabindex="1" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống người mượn!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="number" class="form-control" placeholder="0377000001" tabindex="2" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống số điện thoại!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Thiết bị</label>
                  <input type="text" class="form-control" placeholder="Bút chiếu" tabindex="3" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống thiết bị!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Số lượng</label>
                  <input type="number" class="form-control" placeholder="1" tabindex="4" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống số lượng!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ngày mượn</label>
                  <input type="text" class="form-control datepicker" tabindex="5" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống ngày mượn!</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Lý do</label>
                  <input type="text" class="form-control" placeholder="Giảng dạy" tabindex="6" required autofocus>
                  <div class="invalid-feedback">Vui lòng không bỏ trống lý do!</div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group text-right">
                  <button type="submit" name="editBorrow" tabindex="7" class="btn btn-primary m-t-15 waves-effect">Chỉnh sửa</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>