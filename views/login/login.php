<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="./assets/js/jquery-3.1.1.js"></script>
    <script src="./assets/js/index.js"></script>
    <link rel="stylesheet" href="./assets/style/login.css" />
    <title for="">Thi trắc nhiêm trực tuyến</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form id="signinForm" method="POST" action="index.php?controller=login" class="sign-in-form">
                    <h2 class="title">Đăng nhập</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" placeholder="Số báo danh" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Mật khẩu" required />
                    </div>
                    <?php if (date("Y") <= 2107) echo "<button type='submit' class='btn' name='submit1' id='signinBtn'>Đăng nhập</button>"; ?>
                </form>
                <form id="adminForm" action="index.php?controller=loginAdmin" class="sign-up-form" method="POST">
                    <h2 class="title">Trang quản trị</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" id="taikhoan" name="taikhoan" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="matkhau" name="matkhau" required />
                    </div>
                    <input type="submit" class="btn" value="Đăng nhập" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Trang quản trị</h3>
                    <p>
                        Sử dụng tài khoản mật khẩu được cấp để đăng nhập vào trang quản
                        trị, quản lý thông tin về khì thi và thí sinh
                    </p>
                    <button class="btn transparent" id="sign-up-btn">Quản trị</button>
                </div>
                <img src="assets/image/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Tham gia khì thi</h3>
                    <p>
                        Thí sinh sử dụng tài khoản là số báo danh và mật khẩu được cập để
                        tham gia thi trong hệ thông
                    </p>
                    <button class="btn transparent" id="sign-in-btn">Vào thi</button>
                </div>
                <img src="assets/image/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/login.js"></script>
</body>

</html>