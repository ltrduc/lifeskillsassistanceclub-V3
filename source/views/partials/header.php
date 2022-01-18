<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Life Skills Assistance</title>

  <base href="http://127.0.0.1:8080/">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="source/public/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="source/public/bundles/prism/prism.css">
  <link rel="stylesheet" href="source/public/css/app.min.css">
  <link rel="stylesheet" href="source/public/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="source/public/bundles/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="source/public/bundles/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="source/public/bundles/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="source/public/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="source/public/css/style.css">
  <link rel="stylesheet" href="source/public/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="source/public/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='source/public/img/favicon.ico' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.2/ckeditor.js"></script>
</head>

<body onload="showMessage()">
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" id="search-sidebar" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="button">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="source/public/img/logo.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Xin chào, <?php echo Session::get('fullname') ?></div>
              <a href="Admin/Profile&user=<?php echo Session::get('id_user') ?>" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Thông tin cá nhân
              </a>
              <a href="Admin/ChangePassword" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Đổi mật khẩu
              </a>
              <div class="dropdown-divider"></div>
              <a href="Auth/Logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Đăng xuất
              </a>
            </div>
          </li>
        </ul>
      </nav>