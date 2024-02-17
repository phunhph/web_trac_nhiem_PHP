<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style/index.css" type="text/css">
    <link rel="stylesheet" href="./assets/style/monthi.css" type="text/css">
    <script src="./assets/js/jquery-3.1.1.js"></script>
    <script src="./assets/js/index.js"></script>
</head>

<body>
    <div class="back_out"></div>
    <div class="back_over"></div>

    <div class="main">
        <div class="banner"></div>

        <div class="form-container" id="loadajax1">
            <div class="bod">
                <p>ĐĂNG NHẬP HỆ THỐNG THI TRẮC NGHIỆM TRỰC TUYẾN</p>
            </div>
            <form id="signinForm" method="POST" action="index.php?controller=login">
                <label for="username">Số báo danh</label>
                <input type="text" id="username" name="username" autofocus>

                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password">

                <?php if (date("Y") <= 2107) echo "<button type='submit' name='submit1' id='signinBtn'>Đăng nhập</button>"; ?>
                <button type="reset" class="reset">Nhập lại</button>
            </form>
            <button class="toggleFormBtn" data-target="#loadajax2">Admin</button>
        </div>

        <div class="form-container" id="loadajax2" style="display:none;">
            <div class="bod">
                <p>QUẢN TRỊ HỆ THỐNG</p>
            </div>
            <form id="adminForm" action="index.php?controller=loginAdmin" method="POST">
                <label for="taikhoan">Tài khoản</label>
                <input type="text" id="taikhoan" name="taikhoan">

                <label for="matkhau">Mật khẩu</label>
                <input type="password" id="matkhau" name="matkhau">

                <button type="submit" name="submit2" id="adminBtn">Đăng nhập</button>
                <span id="spankothanhcong">Tài khoản không tồn tại</span>
            </form>
            <button class="toggleFormBtn" data-target="#loadajax1">Làm bài</button>
        </div>
    </div>
</body>

</html>