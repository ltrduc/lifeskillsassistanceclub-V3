<?php
$filepath = realpath(dirname(__FILE__));
require_once($filepath . '/../source/core/lib/session.php');
Session::checkSession();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Thời khóa biểu</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="components/bootstrap2/css/bootstrap.css">
    <link rel="stylesheet" href="components/bootstrap2/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="css/calendar.css">
</head>

<body style="background-image: url(../source/public/img/bg-3.jpg);">
    <div class="container">
        <div style="margin-top: 20px;">
            <h2>Thời khóa biểu - Câu lạc bộ Kỹ Năng Sống</h2>
            <p style="font-size: 15px;">Thời khóa biểu tổng quan - Những kỹ năng thiết yếu cho sự phát triển bền vững</p>
            <a class="btn btn-default btn-primary" href="/Auth/Login">Truy cập hệ thống</a>
            <a class="btn btn-default" href="https://www.facebook.com/tdtu.lsa">Fanpage @tdtu.lsa</a>
	    </div>
        <div class="page-header">
            <div class="pull-right form-inline">
                <div class="btn-group">
                    <button class="btn btn-primary" data-calendar-nav="prev">--</button>
                    <button class="btn" data-calendar-nav="today">Hiện tại</button>
                    <button class="btn btn-primary" data-calendar-nav="next">++</button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-warning" data-calendar-view="year">Năm</button>
                    <button class="btn btn-warning active" data-calendar-view="month">Tháng</button>
                    <button class="btn btn-warning" data-calendar-view="week">Tuần</button>
                    <button class="btn btn-warning" data-calendar-view="day">Ngày</button>
                </div>
            </div>
            <h3></h3>
        </div>

        <div class="row">
            <div class="span9">
                <div id="calendar"></div>
            </div>
            <div class="span3">
                <!-- <h4>Events</h4>
                <small>This list is populated with events dynamically</small>
                <ul id="eventlist" class="nav nav-list"></ul> -->

                <h4 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Ghi chú</h4>
                <div class="note">
                    <p style="margin-top: 3px;" class="pull-left event event-info"></p>Buổi sáng: 7:40 – 12:00 <br>
                    <p style="margin-top: 3px;" class="pull-left event event-warning"></p>Buổi chiều: 13:35 – 17:55 <br>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="footer1" style="margin-top: 30px; background-color: #777;">
		<div class="row">
		    <div class="col-md-2 col-md-offset-10">
				<a href="#" ><span class="pull-right" style="color: #fff">&nbsp;Về đầu trang&nbsp;&nbsp;</span></a>
		    </div>
		</div>
	</div>
    <div class="footer2" style="background-color: #013766;">
		<div class="container">
			<div class="col-md-6" style="color: white; padding-top: 20px; padding-bottom: 20px;"> Copyright © 2021. Câu lạc bộ Kỹ Năng Sống.<br>
					ĐC: Tòa nhà A lầu 10, Số 19, Đường Nguyễn Hữu Thọ, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh.<br>
					Hotline: (028) 377 55 049; Email: lifeskills@tdtu.edu.vn; Email LSA: lsa.tdtu@gmail.com</div>
		</div>
	</div>

    <script type="text/javascript" src="components/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="components/underscore/underscore-min.js"></script>
    <script type="text/javascript" src="components/bootstrap2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="components/jstimezonedetect/jstz.min.js"></script>
    <script type="text/javascript" src="js/calendar.js"></script>
    <script type="text/javascript" src="js/app.js"></script>

    <script type="text/javascript">
        var disqus_shortname = 'bootstrapcalendar'; // required: replace example with your forum shortname
        (function() {
            var dsq = document.createElement('script');
            dsq.type = 'text/javascript';
            dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
</body>

</html>