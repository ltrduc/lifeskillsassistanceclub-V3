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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Đổi mật khẩu</li>
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
        <div class="col-md-7">
          <div class="card">
            <div class="card-header">
              <h4>ĐỔI MẬT KHẨU</h4>
            </div>
            <div class="card-body">
              <form action="" method="post" class="needs-validation" novalidate="">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Mật khẩu cũ</label>
                      <input type="password" name="oldPassword" class="form-control" tabindex="1" required autofocus>
                      <div class="invalid-feedback">Vui lòng nhập mật khẩu cũ!</div>
                      <small id="passwordHelpBlock" class="form-text text-muted">
                        Mật khẩu của bạn phải dài 8-30 ký tự, chứa các chữ cái và số,
                        đồng thời không được chứa dấu cách, ký tự đặc biệt hoặc biểu tượng cảm xúc.
                      </small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Mật khẩu mới</label>
                      <input type="password" name="newPassword" class="form-control" tabindex="2" required autofocus>
                      <div class="invalid-feedback">Vui lòng nhập mật khẩu mới!</div>
                    </div>
                    <div class="form-group">
                      <label>Xác nhận mật khẩu</label>
                      <input type="password" name="reNewPassword" class="form-control" tabindex="3" required autofocus>
                      <div class="invalid-feedback">Vui lòng nhập xác nhận mật khẩu!</div>
                    </div>
                  </div>
                </div>
                <div class="form-group text-right">
                  <input type="hidden" name="id_user" value="<?php echo Session::get('id_user') ?>">
                  <button class="btn btn-primary" tabindex="4" type="submit">Đổi mật khẩu</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>