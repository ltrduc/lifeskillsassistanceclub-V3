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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Quản lý môn học</li>
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
              <h4>THÊM MÔN HỌC</h4>
            </div>
            <div class="card-body">
              <form action="Admin/Subject" method="post">
                <div class="form-group">
                  <label>Môn học</label>
                  <input type="text" name="subject" placeholder="Thái độ sống 1" class="form-control">
                </div>
                <div class="form-group">
                  <label>Ghi chú</label>
                  <input type="text" name="note" class="form-control">
                </div>
                <div class="form-group text-right">
                  <button class="btn btn-primary mr-1" name="addSubject" type="submit">Thêm môn học</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-8">
          <div class="card">
            <div class="card-header">
              <h4>DANH SÁCH MÔN HỌC</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Môn học</th>
                      <th>Ghi chú</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    if ($data['ListSubject']) {
                      while ($value = $data['ListSubject']->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $value['subject']; ?></td>
                          <td><?php echo $value['note']; ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-primary" onclick="editSubject('<?php echo $value['id_subject'] ?>', '<?php echo $value['subject'] ?>','<?php echo $value['note'] ?>')" data-toggle="modal" data-target="#editSubject"><i class="fas fa-file-signature"></i> Sửa </a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteSubject('<?php echo $value['id_subject']; ?>', '<?php echo $value['subject']; ?>')" data-toggle="modal" data-target="#deleteSubject"><i class="fas fa-trash"></i> Xóa </a>
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

  <!-- Xóa môn học -->
  <div class="modal fade" id="deleteSubject">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/Subject" method="post">
          <input type="hidden" id="delete-id_subject" name="id_subject">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA MÔN HỌC</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn xóa môn học <strong id="delete-info-subject"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteSubject" class="btn btn-danger">Xóa môn học</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Sửa môn học -->
  <div class="modal fade" id="editSubject">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">CHỈNH SỬA MÔN HỌC</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="Admin/Subject" method="post">
            <input type="hidden" id="edit-id_subject" name="id_subject">
            <div class="form-group">
              <label>Năm học</label>
              <input type="text" id="edit-subject" name="subject" placeholder="Thái độ sống 1" class="form-control">
            </div>
            <div class="form-group">
              <label>Ghi chú</label>
              <input type="text" id="edit-note" name="note" class="form-control">
            </div>
            <div class="form-group text-right">
              <button class="btn btn-primary mr-1" name="editSubject" type="submit">Chỉnh sửa môn học</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>