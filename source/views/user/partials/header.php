<!DOCTYPE html>
<html lang="en">

<head>
  <title>Life Skills Assistance</title>

  <?php
  if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://' . $_SERVER['HTTP_HOST'] . '/';
  } else {
    $uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
  }
  ?>

  <base href="<?php echo $uri ?>">
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="source/public/user/vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="source/public/user/vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="source/public/user/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="source/public/user/vendors/aos/css/aos.css">
  <link rel="stylesheet" href="source/public/user/css/style.min.css">
  <style>
    .responsive-img {
      width: 55%;
      height: auto;
    }
  </style>
</head>

<body id="body" class="home" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header>
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0 pt-3 pb-3" id="navbar">
      <div class="container">
        <div class="navbar-brand-wrapper d-flex w-100">
          <img src="source/public/user/images/logo/logo.png" class="responsive-img" alt="">
          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="mdi mdi-menu navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
            <li class="d-flex align-items-center justify-content-between pl-3 pl-lg-0">
              <div class="navbar-collapse-logo">
                <img src="source/public/user/images/logo/logo.png" style="width: 120px;" alt="">
              </div>
              <button class="navbar-toggler close-button p-0" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
              </button>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="width: 110px; font-family: Arial, Helvetica, sans-serif; padding: 0px 10px;"
                href="/Home/Index">Trang
                chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="width: 110px; font-family: Arial, Helvetica, sans-serif; padding: 0px 10px;"
                href="/Introduce/Index">Giới thiệu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="width: 140px; font-family: Arial, Helvetica, sans-serif; padding: 0px 10px;"
                href="/Identified/Index">Bộ nhận diện</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="width: 160px; font-family: Arial, Helvetica, sans-serif; padding: 0px 10px;"
                href="/Team/Index">Bộ phận
                chức năng</a>
            </li>
            <?php if (Session::checkSessionUiUser() == false) {?>
              <li class="nav-item btn-contact-us pl-3 pl-lg-0">
              <button class="btn btn-primary pt-2 pb-2" data-toggle="modal" data-target="#login">Đăng nhập</button>
            </li>
            <?php } else { ?>
              <li class="nav-item btn-contact-us pl-3 pl-lg-0">
              <a href="/Admin/Home" class="btn btn-primary pt-2 pb-2">Truy cập hệ thống</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
