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

    <section class="section mb-3">
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-2">
                        <div class="card-body p-2">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control selectric" name="team">
                                            <option value="0" <?php if(isset($data['Team'])) if($data['Team'] == 0) echo 'class="font-weight-bold" selected' ?>>Thành viên không còn hoạt động</option>
                                            <?php  if ($data['ListTeam']) { while ($value = $data['ListTeam']->fetch_assoc()) { ?>
                                                <option value="<?php echo $value['id_team']?>" <?php if(isset($data['Team'])) if($value['id_team'] == $data['Team']) echo 'class="font-weight-bold" selected' ?>><?php echo $value['name']?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-success mr-1" type="submit" name="searchTeam">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
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
                    <?php if(isset($data['Team'])) {?>
                        <form action="" method="post">
                            <input type="hidden" name="team" value="<?php echo $data['Team']; ?>">
                            <div class="card">
                                <div class="card-header">
                                    <h4>DANH SÁCH ĐÁNH GIÁ THÀNH VIÊN</h4>
                                    <div class="card-header-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="Search-Attendance" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header-action ml-3">
                                        <button class="btn btn-success" type="submit" name="evaluate"><i class="fas fa-save"></i> Lưu đánh giá</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <style>
                                    .attendance-scrollbar {
                                        position: relative;
                                        <?php if($data['CountListEvaluate']) {
                                            $counter = 0;
                                            while ($value1 = $data['CountListEvaluate']->fetch_assoc()) {
                                                $counter += 1;
                                            }
                                            if ($counter < 4) {
                                                echo 'height: auto;';
                                            } else {
                                                echo 'height: 400px;';
                                            }
                                        }?>
                                        overflow: auto;
                                    }
                                    .table-wrapper-scroll-y-attendance {
                                        display: block;
                                    }
                                    </style>
                                    <div class="table-responsive table-wrapper-scroll-y-attendance attendance-scrollbar">
                                        <table class="table table-md table-bordered table-hover" id="Attendance-Table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>MSSV</th>
                                                    <th>Họ và tên</th>
                                                    <th>Nội dung</th>
                                                    <th>Đánh giá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  if ($data['ListEvaluate']) { $i = 1; $count = 0; while ($value = $data['ListEvaluate']->fetch_assoc()) { ?>
                                                <tr class="Attendance-tr">
                                                    <td><?php echo $i++?></td>
                                                    <td><?php echo $value['id_student']?><input type="hidden" name="id_student[<?php echo $count ?>]" value="<?php echo $value['id_student']; ?>"></td>
                                                    <td><?php echo $value['fullname']?></td>
                                                    <td><textarea class="form-control" name="note[<?php echo $count?>]" cols="50" rows="4"><?php echo $value['note']?></textarea></td>
                                                    <td>
                                                        <select class="form-control selectric" name="evaluate[<?php echo $count?>]">
                                                            <option value="Hoàn thành" <?php if($value['evaluate'] == 'Hoàn thành') echo 'selected' ?>>Hoàn thành</option>
                                                            <option value="Hoàn thành tốt" <?php if($value['evaluate'] == 'Hoàn thành tốt') echo 'selected' ?>>Hoàn thành tốt</option>
                                                            <option value="Hoàn thành xuất sắc" <?php if($value['evaluate'] == 'Hoàn thành xuất sắc') echo 'selected' ?>>Hoàn thành xuất sắc</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <?php $count++; } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
</div>