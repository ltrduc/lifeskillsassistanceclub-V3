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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Quản lý ban điều hành </li>
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
              <h4>THÊM BAN ĐIỀU HÀNH</h4>
            </div>
            <div class="card-body">
              <form action="Admin/Executive" method="post">
                <div class="form-group">
                  <label>Nhân sự</label>
                  <select class="form-control selectric" name="id_user">
                    <option value="" class="font-weight-bold">Chọn nhân sự</option>
                    <?php
                    if ($data['ListMember']) {
                      while ($value = $data['ListMember']->fetch_assoc()) { ?>
                        <option value="<?php echo $value['id_user'] ?>">[<?php echo $value['id_student'] ?>] <?php echo $value['fullname'] ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Chức vụ</label>
                  <select class="form-control selectric" name="id_position">
                    <option value="" class="font-weight-bold">Chọn chức vụ</option>
                    <?php
                    if ($data['ListPosition']) {
                      while ($value = $data['ListPosition']->fetch_assoc()) { ?>
                        <option value="<?php echo $value['id_position'] ?>"><?php echo $value['name'] ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
                <div class="form-group text-right">
                  <button class="btn btn-primary mr-1" name="addExecutive" type="submit">Thêm ban điều hành</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4>DANH SÁCH BAN ĐIỀU HÀNH</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>MSSV</th>
                      <th>Họ và tên</th>
                      <th>Chức vụ</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    if ($data['ListExecutive']) {
                      while ($value = $data['ListExecutive']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['id_student']; ?></td>
                          <td><?php echo $value['fullname']; ?></td>
                          <td><?php echo $value['position']; ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteExecutive('<?php echo $value['id_executive']; ?>', '<?php echo $value['fullname']; ?>')" data-toggle="modal" data-target="#deleteExecutive"><i class="fas fa-trash"></i> Xóa </a>
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

  <!-- Xóa ban điều hành -->
  <div class="modal fade" id="deleteExecutive">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/Executive" method="post">
          <input type="hidden" id="delete-id_executive" name="id_executive">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA BAN ĐIỀU HÀNH</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn xóa quyền điều hành của <strong id="delete-info-executive"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteExecutive" class="btn btn-danger">Xóa ban điều hành</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>