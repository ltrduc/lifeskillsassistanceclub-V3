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
                                    <li class="breadcrumb-item"><a href="Admin/Home"><i class="fas fa-home"></i>Trang
                                            chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><i
                                            class="fas fa-chalkboard"></i> Quản lý đánh giá </li>
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
                            <h4>THÊM ĐÁNH GIÁ NĂM HỌC</h4>
                        </div>
                        <div class="card-body">
                            <form action="Admin/PersonnelEvaluate" method="post">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <select class="form-control selectric" name="id_schoolyear">
                                                <option value="" class="font-weight-bold">Chọn năm học</option>
                                                <?php if ($data['ListSchoolYear']) { while ($value = $data['ListSchoolYear']->fetch_assoc()) { ?>
                                                    <option value="<?php echo $value['id_schoolyear']; ?>"><?php echo $value['schoolyear']; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <select class="form-control selectric" name="semester">
                                            <option value="" class="font-weight-bold">Chọn học kỳ</option>
                                            <option value="Học kỳ I">Học kỳ I</option>
                                            <option value="Học kỳ II">Học kỳ II</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-success mr-1" type="submit" name="addPersonnelEvaluate">Thêm mới</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>DANH SÁCH ĐÁNH GIÁ NĂM HỌC</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nội dung</th>
                                            <th>Năm học</th>
                                            <th>Học kỳ</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($data['ListEvaluate']) {
                                            $i = 1;
                                          while ($value = $data['ListEvaluate']->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $i++?></td>
                                            <td>Đánh giá BĐH/TV/CTV LSA</td>
                                            <td><?php echo $value['schoolyear']?></td>
                                            <td><?php echo $value['semester']?></td>
                                            <td>
                                                <a href="Admin/DetailedPersonnelEvaluate&id_schoolyear=<?php echo $value['id_schoolyear'] ?>&semester=<?php echo $value['semester'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-file-signature"></i> Đánh giá </a>
                                                <a href="#" class="btn btn-sm btn-danger" onclick="deletePersonnelEvaluate('<?php echo $value['id_schoolyear']; ?>', '<?php echo $value['schoolyear']; ?>', '<?php echo $value['semester']; ?>')" data-toggle="modal" data-target="#deletePersonnelEvaluate">
                                                    <i class="fas fa-trash"></i> Xóa
                                                </a>
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

    <div class="modal fade" id="deletePersonnelEvaluate">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="Admin/PersonnelEvaluate" method="post">
                <input type="hidden" id="delete-id_schoolyear" name="id_schoolyear">
                <input type="hidden" id="delete-semester" name="semester">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">XÓA ĐÁNH GIÁ NĂM HỌC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn có chắc muốn xóa đánh giá năm học <strong id="delete-PersonnelEvaluate"></strong>?</div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" name="deletePersonnelEvaluate" class="btn btn-danger">Xóa đánh giá</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>