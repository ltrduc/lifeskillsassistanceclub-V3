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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Quản lý ban hoạt động </li>
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
              <h4>DANH SÁCH BAN HOẠT ĐỘNG</h4>
              <div class="card-header-action">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addTeam"><i class="fas fa-plus"></i> Thêm mới ban hoạt động</a>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                <?php $i = 1;
                if ($data['ListTeam']) {
                  while ($value = $data['ListTeam']->fetch_assoc()) { ?>
                    <li class="media">
                      <div class="media-body">
                        <div class="media-title mb-1" style="text-transform: uppercase; color: brown;">
                          [<?php echo $i++ ?>] <?php echo $value['name'] ?>
                        </div>
                        <div class="media-description text-dark">
                          <?php echo $value['description']; ?>
                        </div>
                        <div class="media-links">
                          <a href="Admin/updateTeam&id=<?php echo $value['id_team'] ?>">Chỉnh sửa</a>
                          <div class="bullet"></div>
                          <a href="#" class="text-danger" onclick="deleteTeam('<?php echo $value['id_team'] ?>', '<?php echo $value['name'] ?>');" data-toggle="modal" data-target="#deleteTeam">Xóa ban hoạt động</a>
                        </div>
                      </div>
                    </li>
                <?php }
                } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Thêm Ban hoạt động -->
  <div class="modal fade" id="addTeam">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModal">THÊM MỚI BAN HOẠT ĐỘNG</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="Admin/Team" method="post">
            <div class="form-group">
              <label>Tên ban hoạt động</label>
              <input type="text" name="name" class="form-control" placeholder="Ban Hành chính">
            </div>
            <div class="form-group">
              <label>Mô tả ban hoạt động</label>
              <textarea name="description" id="description"></textarea>
              <script>
                CKEDITOR.replace('description');
              </script>
            </div>
            <div class="form-group text-right mb-0">
              <button class="btn btn-success mr-1" name="addTeam" type="submit">Thêm mới ban hoạt động</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Xóa Ban hoạt động -->
  <div class="modal fade" id="deleteTeam">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/Team" method="post">
          <input type="hidden" id="delete-id_team" name="id_team">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA BAN HOẠT ĐỘNG</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn xóa <strong id="delete-info-team"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteTeam" class="btn btn-danger">Xóa ban hoạt động</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>