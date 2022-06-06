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
                  <li class="breadcrumb-item"><a href="Admin/Team"><i class="fas fa-chalkboard"></i>Quản lý ban hoạt động</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><i class="fab fa-squarespace"></i> Chỉnh sửa ban hoạt động</strong></li>
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
              <h4>CHỈNH SỬA BAN HOẠT ĐỘNG</h4>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <?php $value = $data['ListTeamId']->fetch_assoc(); ?>
                <div class="form-group">
                  <label>Tên ban hoạt động</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $value['name'] ?>" placeholder="Ban Hành chính">
                </div>
                <div class="form-group">
                  <label>Mô tả ban hoạt động</label>
                  <textarea name="description" id="description"><?php echo $value['description'] ?></textarea>
                  <script>
                    CKEDITOR.replace('description');
                  </script>
                </div>
                <div class="form-group text-right mb-0">
                  <button class="btn btn-primary mr-1" name="addTeam" type="submit">Chỉnh sửa ban hoạt động</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>