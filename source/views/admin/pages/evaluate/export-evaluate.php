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
                        <div class="card-body">
                            <form action="Admin/ExportEvaluate" method="post">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <select class="form-control selectric" name="id_schoolyear">
                                                <option value="" <?php if(isset($data['id_schoolyear'])) if($data['id_schoolyear'] == "") echo 'class="font-weight-bold" selected' ?>>Chọn năm học</option>
                                                <?php if ($data['ListSchoolYear']) { while ($value = $data['ListSchoolYear']->fetch_assoc()) { ?>
                                                    <option value="<?php echo $value['id_schoolyear']; ?>" <?php if(isset($data['id_schoolyear'])) if($data['id_schoolyear'] == $value['id_schoolyear']) echo 'class="font-weight-bold" selected' ?>><?php echo $value['schoolyear']; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-control selectric" name="semester">
                                            <option value="" <?php if(isset($data['semester'])) if($data['semester'] == "") echo 'class="font-weight-bold" selected' ?>>Chọn học kỳ</option>
                                            <option value="Học kỳ I" <?php if(isset($data['semester'])) if($data['semester'] == "Học kỳ I") echo 'class="font-weight-bold" selected' ?>>Học kỳ I</option>
                                            <option value="Học kỳ II" <?php if(isset($data['semester'])) if($data['semester'] == "Học kỳ II") echo 'class="font-weight-bold" selected' ?>>Học kỳ II</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-control selectric" name="evaluate">
                                            <option value="" <?php if(isset($data['evaluate'])) if($data['evaluate'] == "") echo 'class="font-weight-bold" selected' ?>>Chọn mức đánh giá</option>
                                            <option value="Hoàn thành" <?php if(isset($data['evaluate'])) if($data['evaluate'] == "Hoàn thành") echo 'class="font-weight-bold" selected' ?>>Hoàn thành</option>
                                            <option value="Hoàn thành tốt" <?php if(isset($data['evaluate'])) if($data['evaluate'] == "Hoàn thành tốt") echo 'class="font-weight-bold" selected' ?>>Hoàn thành tốt</option>
                                            <option value="Hoàn thành xuất sắc" <?php if(isset($data['evaluate'])) if($data['evaluate'] == "Hoàn thành xuất sắc") echo 'class="font-weight-bold" selected' ?>>Hoàn thành xuất sắc</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-success mr-1" type="submit" name="exportEvaluate" value="1">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <?php if (isset($data['exportEvaluate'])) { if ($data['exportEvaluate']) {?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>DANH SÁCH ĐÁNH GIÁ NĂM HỌC</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tableExport">
                                        <thead>
                                            <tr>
                                                <th>stt</th>
                                                <th>mssv</th>
                                                <th>noidung</th>
                                                <th>content</th>
                                                <th>Điểm theo quy chế</th>
                                                <th>Ghi chú</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($data['ListEvaluate']) {
                                                $i = 1;
                                            while ($value = $data['ListEvaluate']->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $i++?></td>
                                                <td><?php echo $value['id_student']?></td>
                                                <td><?php echo $value['content_vn']?></td>
                                                <td><?php echo $value['content_eng']?></td>
                                                <td><?php echo $value['scores']?></td>
                                                <td><?php echo $value['note']?></td>
                                            </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } }?>
            </div>
        </div>
    </section>
</div>