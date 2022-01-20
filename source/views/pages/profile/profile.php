<?php if ($data['Profile']) {
  $value = $data['Profile']->fetch_assoc(); ?>
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row mt-sm-4">
          <!-- THÔNG TIN CHUNG -->
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card author-box">
              <div class="card-body">
                <div class="author-box-center">
                  <img alt="image" src="source/public/img/logo.png" class="rounded-circle author-box-picture">
                  <div class="clearfix"></div>
                  <div class="author-box-name mt-3">
                    <a class="text-info"><?php echo $value['fullname'] ?></a>
                  </div>
                  <div class="author-box-job"><?php echo $value['id_student'] ?>@student.tdtu.edu.vn</div>
                </div>
                <div class="text-center">
                  <div class="mb-2 mt-3">
                    <div class="text-small font-weight-bold">Trang FaceBook</div>
                  </div>
                  <a href="<?php if ($value['facebook'] != '[---]') { echo $value['facebook']; } else { echo "Admin/Profile&user=" . $value['id_user'] . ""; } ?> " class="btn btn-social-icon mr-1 btn-facebook">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <div class="w-100 d-sm-none"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- THÔNG TIN CÁ NHÂN VÀ CHỈNH SỬA THÔNG TIN -->
          <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
              <div class="card-header">
                <ul class="nav nav-pills" id="myTab3" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link btn-sm active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">Thông tin cá nhân</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link btn-sm" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false">Chỉnh sửa thông tin</a>
                  </li>
                </ul>
              </div>
              <!-- THÔNG TIN CÁ NHÂN VÀ CHỈNH SỬA THÔNG TIN -->
              <div class="card-body">
                <div class="tab-content" id="myTabContent2">
                  <!-- THÔNG TIN CÁ NHÂN -->
                  <div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <div class="row">
                      <div class="col-md-12">
                        <h6 class="text-dark">[1]. THÔNG TIN CÁ NHÂN</h6>
                      </div>
                      <div class="col-md-4 col-12 b-r">
                        <strong>Họ và Tên</strong>
                        <br>
                        <p class="text-muted"><?php echo $value['fullname'] ?></p>
                      </div>
                      <div class="col-md-4 col-12 b-r">
                        <strong>Mã số sinh viên</strong>
                        <br>
                        <p class="text-muted"><?php echo $value['id_student'] ?></p>
                      </div>
                      <div class="col-md-4 col-12 b-r">
                        <strong>Số điện thoại</strong>
                        <br>
                        <p class="text-muted"><?php echo $value['phone'] ?></p>
                      </div>
                      <div class="col-md-4 col-12 b-r">
                        <strong>Ngày sinh</strong>
                        <br>
                        <p class="text-muted"><?php echo $value['birthday'] ?></p>
                      </div>
                      <div class="col-md-8 col-12 b-r">
                        <strong>Link Facebook</strong>
                        <br>
                        <p class="text-muted"><a href="<?php if ($value['facebook'] != '[---]') { echo $value['facebook']; } else { echo "Admin/Profile&user=" . $value['id_user'] . ""; } ?> "><?php echo $value['facebook'] ?></a></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <h6 class="text-dark">[2]. THÔNG TIN HOẠT ĐỘNG</h6>
                      </div>
                      <div class="col-md-4 col-12 b-r">
                        <strong>Nhân sự</strong>
                        <br>
                        <p class="text-muted"><?php echo $value['role'] ?></p>
                      </div>
                      <div class="col-md-4 col-12 b-r">
                        <strong>Ban hoạt động</strong>
                        <br>
                        <p class="text-muted"><?php echo $value['team'] ?></p>
                      </div>
                      <div class="col-md-4 col-12 b-r">
                        <strong>Chức vụ</strong>
                        <br>
                        <p class="text-muted"><?php echo $value['position'] ?></p>
                      </div>
                    </div>
                  </div>

                  <!-- CHỈNH SỬA THÔNG TIN -->
                  <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
                    <form action="" method="post" class="needs-validation" novalidate="">
                      <div class="row">
                        <div class="col-md-12">
                          <h6 class="text-dark">[1]. THÔNG TIN CÁ NHÂN</h6>
                        </div>
                        <div class="col-md-4 col-12 b-r">
                          <div class="form-group">
                            <label class="font-weight-bold">Họ và Tên</label>
                            <input type="text" class="form-control" placeholder="Nguyễn Văn A" name="fullname" value="<?php echo $value['fullname'] ?>" tabindex="1" required autofocus>
                            <div class="invalid-feedback">Vui lòng không bỏ trống họ và tên!</div>
                          </div>
                        </div>
                        <div class="col-md-4 col-12 b-r">
                          <div class="form-group">
                            <label class="font-weight-bold">Mã số sinh viên</label>
                            <input type="text" class="form-control" value="<?php echo $value['id_student'] ?>" disabled>
                          </div>
                        </div>
                        <div class="col-md-4 col-12 b-r">
                          <div class="form-group">
                            <label class="font-weight-bold">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="0377000001" value="<?php if ($value['phone'] == '[---]') echo ""; else echo $value['phone']; ?>" name="phone" tabindex="2" required autofocus>
                            <div class="invalid-feedback">Vui lòng không bỏ trống số điện thoại!</div>
                          </div>
                        </div>
                        <div class="col-md-4 col-12 b-r">
                          <div class="form-group">
                            <label class="font-weight-bold">Ngày sinh</label>
                            <input type="date" class="form-control" name="birthday" <?php if ($value['birthday'] == '[---]') echo 'tabindex="3" required autofocus'; else echo "value=".$value['birthday']."";?>>
                            <div class="invalid-feedback">Vui lòng không bỏ trống ngày sinh!</div>
                          </div>
                        </div>
                        <div class="col-md-8 col-12 b-r">
                          <div class="form-group">
                            <label class="font-weight-bold">Link Facebook</label>
                            <input type="text" class="form-control" placeholder="https://www.facebook.com/profile" name="facebook" tabindex="4" value="<?php if ($value['facebook'] == '[---]') echo ""; else echo $value['facebook']; ?>" required autofocus>
                            <div class="invalid-feedback">Vui lòng không bỏ trống link facebook!</div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <h6 class="text-dark">[2]. THÔNG TIN HOẠT ĐỘNG</h6>
                        </div>
                        <div class="col-md-4 col-12 b-r">
                          <div class="form-group">
                            <label class="font-weight-bold">Nhân sự</label>
                            <input type="text" class="form-control" value="<?php echo $value['role'] ?>" disabled>
                          </div>
                        </div>
                        <div class="col-md-4 col-12 b-r">
                          <div class="form-group">
                            <label class="font-weight-bold">Ban hoạt động</label>
                            <input type="text" class="form-control" value="<?php echo $value['team'] ?>" disabled>
                          </div>
                        </div>
                        <div class="col-md-4 col-12 b-r">
                          <div class="form-group">
                            <label class="font-weight-bold">Chức vụ</label>
                            <input type="text" class="form-control" value="<?php echo $value['position'] ?>" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="form-group text-right">
                        <button class="btn btn-sm btn-primary">Chỉnh sửa thông tin</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php } ?>