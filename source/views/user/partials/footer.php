<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="Auth/Login" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="loginLabel">Đăng nhập</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_stundet">Mã số sinh viên</label>
                        <input type="text" class="form-control" id="id_stundet" name="id_student"
                            placeholder="Nhập mã số sinh viên">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Nhập mật khẩu">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Đăng nhập</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="source/public/user/vendors/jquery/jquery.min.js"></script>
<script src="source/public/user/vendors/bootstrap/bootstrap.min.js"></script>
<script src="source/public/user/vendors/owl-carousel/js/owl.carousel.min.js"></script>
<script src="source/public/user/vendors/aos/js/aos.js"></script>
<script src="source/public/user/js/landingpage.js"></script>
</body>

</html>