<!-- Main Content -->
<div class="main-content">
  <section class="section mb-0">
    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body p-2">
              <nav aria-label="breadcrumb m-0">
                <ol class="breadcrumb bg-white m-0">
                  <li class="breadcrumb-item"><a href="Admin/Home"><i class="fas fa-home"></i>Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Thống kê buổi trực</li>
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
        <?php if ($data['ListStatistics']) {
          while ($value = $data['ListStatistics']->fetch_assoc()) { ?>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
              <article class="article">
                <div class="article-header">
                  <div class="article-image" data-background="source/public/img/banner/5.png">
                  </div>
                  <div class="article-title">
                    <h2><a href="#"><?php echo $value['semester'] ?> <br> Năm học <?php echo $value['schoolyear'] ?></a></h2>
                  </div>
                </div>
                <div class="article-details">
                  <p class="text-justify">Thống kê dữ liệu liệu điểm danh <strong><?php echo $value['semester'] ?> / <?php echo $value['schoolyear'] ?></strong>.</p>
                  <div class="article-cta">
                    <a href="Admin/GeneralStatistics&id_schoolyear=<?php echo $value['id_schoolyear'] ?>&semester=<?php echo $value['semester'] ?>" class="btn btn-primary btn-icon icon-right"><i class="fas fa-paperclip"></i> Tổng quan</a>
                    <a href="#" class="btn btn-icon icon-left btn-danger" onclick="deleteStatistics('<?php echo $value['id_schoolyear'] ?>', '<?php echo $value['semester'] ?>','<?php echo $value['schoolyear'] ?>')" data-toggle="modal" data-target="#deleteStatistics"><i class="fas fa-trash"></i> Xóa</a>
                  </div>
                </div>
              </article>
            </div>
        <?php }
        } ?>
      </div>
    </div>
  </section>

  <!-- Xóa thống kê -->
  <div class="modal fade" id="deleteStatistics">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/Statistics" method="post">
          <input type="hidden" id="delete-id_schoolyear" name="id_schoolyear">
          <input type="hidden" id="delete-semester" name="semester">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA THỐNG KÊ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn xóa dữ liệu <strong id="delete-info-semester"></strong> / <strong id="delete-info-schoolyear"></strong>?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteStatistics" class="btn btn-danger">Xóa thống kê</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>