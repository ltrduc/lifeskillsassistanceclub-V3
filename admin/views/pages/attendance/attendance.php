<!-- Main Content -->
<div class="main-content">
  <section class="section mb-3">
    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body p-2">
              <nav aria-label="breadcrumb m-0">
                <ol class="breadcrumb bg-white m-0">
                  <li class="breadcrumb-item"><a href="Home"><i class="fas fa-home"></i>Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chalkboard"></i> Điểm danh buổi trực</li>
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
              <h4>THAO TÁC</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Năm học</label>
                <select class="form-control selectric">
                  <option>2021 - 2022</option>
                  <option>2022 - 2023</option>
                </select>
              </div>
              <div class="form-group">
                <label>Học kỳ</label>
                <select class="form-control selectric">
                  <option>Học kỳ 1</option>
                  <option>Học kỳ 2</option>
                  <option>Học kỳ Hè</option>
                </select>
              </div>
              <div class="form-group">
                <label>Ngày trực</label>
                <input type="date" class="form-control">
              </div>
              <div class="form-group">
                <label>Ca trực</label>
                <select class="form-control selectric">
                  <option>Ca 1</option>
                  <option>Ca 2</option>
                  <option>Ca 3</option>
                  <option>Ca 4</option>
                </select>
              </div>
              <div class="form-group text-right">
                <button class="btn btn-primary mr-1" type="submit">Điểm danh</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4>DANH SÁCH THÀNH VIÊN</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>MSSV</th>
                      <th>Họ và tên</th>
                      <th class="text-center">Có mặt</th>
                      <th class="text-center">Trễ</th>
                      <th class="text-center">Vắng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>51900040</td>
                      <td>Lê Trí Đức</td>
                      <td class="text-center"><input type="radio" name="attendance[0]" value="Present"></td>
                      <td class="text-center"><input type="radio" name="attendance[0]" value="Late"></td>
                      <td class="text-center"><input type="radio" name="attendance[0]" value="Absent"></td>
                    </tr>
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