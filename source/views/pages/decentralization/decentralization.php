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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Phân quyền</li>
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
              <h4>CHUYỂN NHÂN SỰ</h4>
            </div>
            <div class="card-body">
              <form action="Admin/Decentralization" method="post">
                <div class="form-group">
                  <label>Mã số sinh viên</label>
                  <input type="text" class="form-control" placeholder="51900001" name="id_student">
                </div>
                <div class="form-group">
                  <label>Chuyển nhân sự</label>
                  <select class="form-control selectric" name="role">
                    <option value="" class="font-weight-bold">Chọn nhân sự</option>
                    <option value="0">Thành viên</option>
                    <option value="1">Cộng tác viên</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Chuyển ban hoạt động</label>
                  <select class="form-control selectric" name="id_team">
                    <option value="" class="font-weight-bold">Chọn ban hoạt động</option>
                    <?php $i = 1;
                    if ($data['ListTeam']) {
                      while ($value = $data['ListTeam']->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $value['id_team']; ?>"><?php echo $value['name']; ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
                <div class="form-group text-right">
                  <button class="btn btn-primary mr-1" name="administration" type="submit">Chuyển nhân sự</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4>BẢNG PHÂN QUYỀN</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>MSSV</th>
                      <th>Họ và tên</th>
                      <th class="text-center">Admin</th>
                      <th class="text-center">Điểm danh</th>
                      <th class="text-center">Bài đăng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    if ($data['ListDecentralization']) {
                      while ($value = $data['ListDecentralization']->fetch_assoc()) {
                    ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['id_student'] ?></td>
                          <td><?php echo $value['fullname'] ?></td>
                          <td class="text-center">
                            <form action="Admin/Decentralization" method="post">
                              <?php if ($value['admin'] == 1) { ?>
                                <input type="hidden" style="width: 50px;" name="id_decentralization" value="<?php echo $value['id_decentralization'] ?>">
                                <button type="submit" name="admin" value="0" class="btn btn-sm btn-success btn-icon icon-left">
                                  <i class="fas fa-toggle-on"></i></span>
                                </button>
                              <?php } else { ?>
                                <input type="hidden" style="width: 50px;" name="id_decentralization" value="<?php echo $value['id_decentralization'] ?>">
                                <button type="submit" name="admin" value="1" class="btn btn-sm btn-danger btn-icon icon-left">
                                  <i class="fas fa-toggle-off"></i></span>
                                </button>
                              <?php } ?>
                            </form>
                          </td>
                          <td class="text-center">
                            <form action="Admin/Decentralization" method="post">
                              <?php if ($value['attendance'] == 1) { ?>
                                <input type="hidden" style="width: 50px;" name="id_decentralization" value="<?php echo $value['id_decentralization'] ?>">
                                <button type="submit" name="attendance" value="0" class="btn btn-sm btn-success btn-icon icon-left">
                                  <i class="fas fa-toggle-on"></i></span>
                                </button>
                              <?php } else { ?>
                                <input type="hidden" style="width: 50px;" name="id_decentralization" value="<?php echo $value['id_decentralization'] ?>">
                                <button type="submit" name="attendance" value="1" class="btn btn-sm btn-danger btn-icon icon-left">
                                  <i class="fas fa-toggle-off"></i></span>
                                </button>
                              <?php } ?>
                            </form>
                          </td>
                          <td class="text-center">
                            <form action="Admin/Decentralization" method="post">
                              <?php if ($value['post'] == 1) { ?>
                                <input type="hidden" style="width: 50px;" name="id_decentralization" value="<?php echo $value['id_decentralization'] ?>">
                                <button type="submit" name="post" value="0" class="btn btn-sm btn-success btn-icon icon-left">
                                  <i class="fas fa-toggle-on"></i></span>
                                </button>
                              <?php } else { ?>
                                <input type="hidden" style="width: 50px;" name="id_decentralization" value="<?php echo $value['id_decentralization'] ?>">
                                <button type="submit" name="post" value="1" class="btn btn-sm btn-danger btn-icon icon-left">
                                  <i class="fas fa-toggle-off"></i></span>
                                </button>
                              <?php } ?>
                            </form>
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
</div>