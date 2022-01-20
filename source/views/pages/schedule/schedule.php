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
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Quản lý trực ban</li>
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
              <h4>DANH SÁCH LỊCH TRỰC</h4>
              <div class="card-header-form mr-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="Search-Schedule" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
              <div class="card-header-action">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addSchedule"><i class="fas fa-plus"></i> Đăng ký lịch trực</a>
                <?php if (Session::get('pmsAdmin') == 1) { ?>
                  <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteAllSchedule"><i class="fas fa-trash"></i> Xóa tất cả</a>
                <?php } ?>
              </div>
            </div>
            <div class="card-body">
              <div class="fc-overflow">
                <div class="fc fc-unthemed fc-ltr">
                  <div class="fc-view-container">
                    <div class="fc-scroller">
                      <table class="fc-list-table" id="Schedule-Table">
                        <tbody>
                          <!-- THỨ 2 -->
                          <tr class="fc-list-heading">
                            <td class="fc-widget-header" colspan="6"><span class="fc-list-heading-main">Monday</span></td>
                          </tr>
                          <?php if ($data['Monday']) {
                            while ($value = $data['Monday']->fetch_assoc()) {
                              if ($value['session'] == 'Monday') { ?>
                                <tr class="fc-list-item">
                                  <td class="fc-list-item-time fc-widget-content"><?php echo $value['shift']; ?></td>
                                  <td class="fc-list-item-marker fc-widget-content"><span class="fc-event-dot" style="background-color:#<?php echo substr('00000' . dechex(mt_rand(0, 0xffffff)), -6); ?>"></span></td>
                                  <td class="fc-list-item-title fc-widget-content"><a>[<?php echo $value['id_student']; ?>] - <?php echo $value['fullname']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content"><a><?php echo $value['phone']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content"><a><?php echo $value['team']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content">
                                    <?php if (Session::get('pmsAdmin') == 1 || Session::get('id_user') == $value['id_user']) { ?>
                                      <div class="bullet"></div>
                                      <a href="#" class="text-danger" onclick="deleteSchedule('<?php echo $value['id_schedule']; ?>');" data-toggle="modal" data-target="#deleteSchedule" style="font-size: 13px;">Xóa</a>
                                    <?php } ?>
                                  </td>
                                </tr>
                          <?php }
                            }
                          } ?>

                          <!-- THỨ 3 -->
                          <tr class="fc-list-heading">
                            <td class="fc-widget-header" colspan="6"><span class="fc-list-heading-main">Tuesday</span></td>
                          </tr>
                          <?php if ($data['Tuesday']) {
                            while ($value = $data['Tuesday']->fetch_assoc()) {
                              if ($value['session'] == 'Tuesday') { ?>
                                <tr class="fc-list-item">
                                  <td class="fc-list-item-time fc-widget-content"><?php echo $value['shift']; ?></td>
                                  <td class="fc-list-item-marker fc-widget-content"><span class="fc-event-dot" style="background-color:#<?php echo substr('00000' . dechex(mt_rand(0, 0xffffff)), -6); ?>"></span></td>
                                  <td class="fc-list-item-title fc-widget-content"><a>[<?php echo $value['id_student']; ?>] - <?php echo $value['fullname']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content"><a><?php echo $value['phone']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content"><a><?php echo $value['team']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content">
                                    <?php if (Session::get('pmsAdmin') == 1 || Session::get('id_user') == $value['id_user']) { ?>
                                      <div class="bullet"></div>
                                      <a href="#" class="text-danger" onclick="deleteSchedule('<?php echo $value['id_schedule']; ?>');" data-toggle="modal" data-target="#deleteSchedule" style="font-size: 13px;">Xóa</a>
                                    <?php } ?>
                                  </td>
                                </tr>
                          <?php }
                            }
                          } ?>

                          <!-- THỨ 4 -->
                          <tr class="fc-list-heading">
                            <td class="fc-widget-header" colspan="6"><span class="fc-list-heading-main">Wednesday</span></td>
                          </tr>
                          <?php if ($data['Wednesday']) {
                            while ($value = $data['Wednesday']->fetch_assoc()) {
                              if ($value['session'] == 'Wednesday') { ?>
                                <tr class="fc-list-item">
                                  <td class="fc-list-item-time fc-widget-content"><?php echo $value['shift']; ?></td>
                                  <td class="fc-list-item-marker fc-widget-content"><span class="fc-event-dot" style="background-color:#<?php echo substr('00000' . dechex(mt_rand(0, 0xffffff)), -6); ?>"></span></td>
                                  <td class="fc-list-item-title fc-widget-content"><a>[<?php echo $value['id_student']; ?>] - <?php echo $value['fullname']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content"><a><?php echo $value['phone']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content"><a><?php echo $value['team']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content">
                                    <?php if (Session::get('pmsAdmin') == 1 || Session::get('id_user') == $value['id_user']) { ?>
                                      <div class="bullet"></div>
                                      <a href="#" class="text-danger" onclick="deleteSchedule('<?php echo $value['id_schedule']; ?>');" data-toggle="modal" data-target="#deleteSchedule" style="font-size: 13px;">Xóa</a>
                                    <?php } ?>
                                  </td>
                                </tr>
                          <?php }
                            }
                          } ?>

                          <!-- THỨ 5 -->
                          <tr class="fc-list-heading">
                            <td class="fc-widget-header" colspan="6"><span class="fc-list-heading-main">Thursday</span></td>
                          </tr>
                          <?php if ($data['Thursday']) {
                            while ($value = $data['Thursday']->fetch_assoc()) {
                              if ($value['session'] == 'Thursday') { ?>
                                <tr class="fc-list-item">
                                  <td class="fc-list-item-time fc-widget-content"><?php echo $value['shift']; ?></td>
                                  <td class="fc-list-item-marker fc-widget-content"><span class="fc-event-dot" style="background-color:#<?php echo substr('00000' . dechex(mt_rand(0, 0xffffff)), -6); ?>"></span></td>
                                  <td class="fc-list-item-title fc-widget-content"><a>[<?php echo $value['id_student']; ?>] - <?php echo $value['fullname']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content"><a><?php echo $value['phone']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content"><a><?php echo $value['team']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content">
                                    <?php if (Session::get('pmsAdmin') == 1 || Session::get('id_user') == $value['id_user']) { ?>
                                      <div class="bullet"></div>
                                      <a href="#" class="text-danger" onclick="deleteSchedule('<?php echo $value['id_schedule']; ?>');" data-toggle="modal" data-target="#deleteSchedule" style="font-size: 13px;">Xóa</a>
                                    <?php } ?>
                                  </td>
                                </tr>
                          <?php }
                            }
                          } ?>

                          <!-- THỨ 6 -->
                          <tr class="fc-list-heading">
                            <td class="fc-widget-header" colspan="6"><span class="fc-list-heading-main">Friday</span></td>
                          </tr>
                          <?php if ($data['Friday']) {
                            while ($value = $data['Friday']->fetch_assoc()) {
                              if ($value['session'] == 'Friday') { ?>
                                <tr class="fc-list-item">
                                  <td class="fc-list-item-time fc-widget-content"><?php echo $value['shift']; ?></td>
                                  <td class="fc-list-item-marker fc-widget-content"><span class="fc-event-dot" style="background-color:#<?php echo substr('00000' . dechex(mt_rand(0, 0xffffff)), -6); ?>"></span></td>
                                  <td class="fc-list-item-title fc-widget-content"><a>[<?php echo $value['id_student']; ?>] - <?php echo $value['fullname']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content"><a><?php echo $value['phone']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content"><a><?php echo $value['team']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content">
                                    <?php if (Session::get('pmsAdmin') == 1 || Session::get('id_user') == $value['id_user']) { ?>
                                      <div class="bullet"></div>
                                      <a href="#" class="text-danger" onclick="deleteSchedule('<?php echo $value['id_schedule']; ?>');" data-toggle="modal" data-target="#deleteSchedule" style="font-size: 13px;">Xóa</a>
                                    <?php } ?>
                                  </td>
                                </tr>
                          <?php }
                            }
                          } ?>

                          <!-- THỨ 7 -->
                          <tr class="fc-list-heading">
                            <td class="fc-widget-header" colspan="6"><span class="fc-list-heading-main">Saturday</span></td>
                          </tr>
                          <?php if ($data['Saturday']) {
                            while ($value = $data['Saturday']->fetch_assoc()) {
                              if ($value['session'] == 'Saturday') { ?>
                                <tr class="fc-list-item">
                                  <td class="fc-list-item-time fc-widget-content"><?php echo $value['shift']; ?></td>
                                  <td class="fc-list-item-marker fc-widget-content"><span class="fc-event-dot" style="background-color:#<?php echo substr('00000' . dechex(mt_rand(0, 0xffffff)), -6); ?>"></span></td>
                                  <td class="fc-list-item-title fc-widget-content"><a>[<?php echo $value['id_student']; ?>] - <?php echo $value['fullname']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content"><a><?php echo $value['phone']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content"><a><?php echo $value['team']; ?></a></td>
                                  <td class="fc-list-item-title fc-widget-content">
                                    <?php if (Session::get('pmsAdmin') == 1 || Session::get('id_user') == $value['id_user']) { ?>
                                      <div class="bullet"></div>
                                      <a href="#" class="text-danger" onclick="deleteSchedule('<?php echo $value['id_schedule']; ?>');" data-toggle="modal" data-target="#deleteSchedule" style="font-size: 13px;">Xóa</a>
                                    <?php } ?>
                                  </td>
                                </tr>
                          <?php }
                            }
                          } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Thêm lịch trực -->
  <div class="modal fade" id="addSchedule">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>ĐĂNG KÝ LỊCH TRỰC</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="Admin/Schedule" method="post">
            <div class="form-group">
              <label>Mã số sinh viên</label>
              <input type="text" class="form-control" placeholder="Nhập số sinh viên" name="id_student" list="id_student">
              <datalist id="id_student">
                <?php if ($data['ListMember']) {
                  while ($value = $data['ListMember']->fetch_assoc()) { ?>
                    <option value="<?php echo $value['id_student'] ?>">[<?php echo $value['team'] ?>] <?php echo $value['fullname'] ?></option>
                <?php }
                } ?>
              </datalist>
            </div>
            <div class="form-group">
              <label>Buổi trực</label>
              <select class="form-control selectric" name="session">
                <option value="" class="font-weight-bold">Chọn buổi trực</option>
                <option value="Monday">Thứ 2</option>
                <option value="Tuesday">Thứ 3</option>
                <option value="Wednesday">Thứ 4</option>
                <option value="Thursday">Thứ 5</option>
                <option value="Friday">Thứ 6</option>
                <option value="Saturday">Thứ 7</option>
              </select>
            </div>
            <div class="form-group">
              <label>Ca trực:</label>
              <div class="form-group">
                <div class="form-check form-check-inline m-0">
                  <input class="form-check-input" type="checkbox" name="shift1" id="shift1" value="Ca1">
                  <label class="form-check-label" for="shift1">Ca 1</label>
                </div>
                <div class="form-check form-check-inline m-0">
                  <input class="form-check-input" type="checkbox" name="shift2" id="shift2" value="Ca2">
                  <label class="form-check-label" for="shift2">Ca 2</label>
                </div>
                <div class="form-check form-check-inline m-0">
                  <input class="form-check-input" type="checkbox" name="shift3" id="shift3" value="Ca3">
                  <label class="form-check-label" for="shift3">Ca 3</label>
                </div>
                <div class="form-check form-check-inline m-0">
                  <input class="form-check-input" type="checkbox" name="shift4" id="shift4" value="Ca4">
                  <label class="form-check-label" for="shift4">Ca 4</label>
                </div>
              </div>
            </div>
            <div class="form-group text-right">
              <button class="btn btn-success mr-1" name="addSchedule" type="submit">Đăng ký lịch trực</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Xóa lịch trực -->
  <div class="modal fade" id="deleteSchedule">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/Schedule" method="post">
          <input type="hidden" id="delete-id_schedule" name="id_schedule">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA LỊCH TRỰC</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn xóa lịch trực?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteSchedule" class="btn btn-danger">Xóa lịch trực</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteAllSchedule">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Admin/Schedule" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">XÓA TẤT CẢ LỊCH TRỰC</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Bạn có chắc muốn <strong>xóa tất cả</strong> lịch trực?</div>
          <div class="modal-footer bg-whitesmoke br">
            <button type="submit" name="deleteAllSchedule" class="btn btn-danger">Xóa tất cả</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>