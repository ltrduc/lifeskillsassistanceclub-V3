<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Life Skills Assistance</title>
  <base href="http://127.0.0.1:8080/">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="source/public/css/app.min.css">
  <link rel="stylesheet" href="source/public/bundles/prism/prism.css">
  <link rel="stylesheet" href="source/public/bundles/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="source/public/bundles/izitoast/css/iziToast.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="source/public/css/style.css">
  <link rel="stylesheet" href="source/public/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="source/public/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='source/public/img/favicon.ico' />
</head>

<body onload="showMessage()">
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 mt-5">
            <div class="card card-primary">
              <div class="card-header">
                <h4>HỆ THỐNG ĐĂNG NHẬP</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="Auth/Login" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="id_student">Mã số sinh viên</label>
                    <input id="id_student" type="text" class="form-control" name="id_student" tabindex="1" required autofocus>
                    <div class="invalid-feedback">Vui lòng nhập mã số sinh viên!</div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Mật khẩu</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required autofocus>
                    <div class="invalid-feedback"> Vui lòng nhập mật khẩu!</div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" required>
                      <label class="custom-control-label" for="remember-me">Tiếp tục đăng nhập</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Đăng nhập
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-2 text-muted text-center">
              <a href="ahttps://www.facebook.com/lsa.lifeskillsassistanceclub">@lsa.lifeskillsassistanceclub · Cộng đồng</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="source/public/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="source/public/bundles/prism/prism.js"></script>
  <script src="source/public/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Template JS File -->
  <script src="source/public/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="source/public/js/custom.js"></script>
  <script src="source/public/js/page/toastr.js"></script>

  <!-- JS main -->
  <script src="source/public/js/main.js"></script>
  <script>
    DisplayReset();

    function showMessage() {
      <?php if ($data['Notification'] > 0) { ?>
        iziToast.<?php echo $data['Notification']['status'] ?>({
          message: "<?php echo $data['Notification']['message'] ?>",
          position: "topRight"
        });
      <?php } ?>
    };
  </script>
</body>

</html>