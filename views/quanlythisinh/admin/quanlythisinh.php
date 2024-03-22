<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title for="">Thi trắc nhiêm trực tuyến</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="assets/js/jquery-3.1.1.js"></script><!-- Custom styles for this template-->
    <link href="assets/style/sb-admin-2.min.css" rel="stylesheet" />

</head>
<style>
.thb {
    border: 1px solid rgba(136, 136, 136, 0.8);
    border-collapse: collapse;
    width: 99%;
    margin: auto;
    margin-top: 1em;
}

.thb td {
    padding: 0.5em 0.5em;
    text-align: left;
}

.thb tr:nth-child(even) {
    background-color: white;
}

.thb tr:nth-child(odd) {
    background-color: #f1f1f1;
}

.thb tr:hover {
    cursor: default;
    background: rgba(0, 102, 153, 0.1);
}

.thb th {
    height: 22px;
    padding: 0.1em;
    background: #4267b2;
    color: white;
    font-size: 14px;
}

#update {
    width: 90%;
    margin: auto;
    display: block;
    margin-top: 2em;
    padding-bottom: 1em;
}

.over {
    position: fixed;
    display: none;
    background: rgba(0, 0, 0, 0.8);
    width: 100%;
    height: 100%;
}

.show {
    width: 23%;
    height: 7em;
    position: fixed;
    display: block;
    margin: auto;
    margin-top: 8em;
    margin-left: 3em;
    background: rgba(255, 255, 255, 0.7);
}

.csbd {
    margin-top: 0.5em;
}

input {
    height: 1.5em;
    width: 80%;
    display: block;
    margin: auto;
    margin-bottom: 0;
    margin-top: 0.5em;
    padding: 0 0.5em;
}

#li1 {
    color: rgba(255, 204, 0, 1);
    font-weight: bolder;
}

span {
    margin: 0;
}
</style>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="index.php?controller=homeAdmin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>
            <!-- Trang chủ -->
            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=homeAdmin">
                    <i class="fas fa-home"></i>
                    <span>Trang chủ</span></a>
            </li>
            <!-- Quản lý môn thi -->
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=quanlymonthi">
                    <i class="fas fa-book"></i>
                    <span>Quản Lý môn thi</span></a>
            </li>
            <!-- Quản lý thí sinh -->
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php?controller=quanlythisinh">
                    <i class="fas fa-user"></i>
                    <span>Quản lý thí sinh</span></a>
            </li>
            <!-- Soạn đề thi -->
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=soandethi">
                    <i class="fas fa-edit"></i>
                    <span>Soạn đề thi</span></a>
            </li>
            <!-- Phân quyền thí sinh -->
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=phanquyenthi">
                    <i class="fas fa-lock"></i>
                    <span>Phân quyền thi</span></a>
            </li>

            <!-- Cấu trúc đề -->
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=soancautrucde">
                    <i class="fas fa-sitemap"></i>
                    <span>Soạn cấu trúc đề</span></a>
            </li>
            <!-- Điểm thi -->
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=diemthi">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Điểm thi</span></a>
            </li>
            <!-- Chi tiết bài thi -->
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=chitietbaithi">
                    <i class="fas fa-file"></i>
                    <span>Chi tiết bài thi</span></a>
            </li>
            <!-- Tình trạng thi -->
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=tinhtrangthi">
                    <i class="fas fa-chart-line"></i>
                    <span>Tình trạng thi</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
        </ul>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <!-- Nav Item - Alerts -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Quản lý thí sinh</h1>
                    </div>

                    <div>
                        <div class="emain">
                            <div class="ml-5">
                                <p class="h5 ml-0 text-gray-500">CHỌN KỲ THI</p>
                                <select class="ml-5" style=" width:48%; height:1.6em;" name="kythi" id="kythi">
                                    <option value="...">...</option>
                                    <?php foreach ($kythi as $key => $value) : ?>
                                    <option value="<?= $value->getMaKyThi() ?>">
                                        <?= $value->getTenKyThi() ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="phanquyen ml-5 mt-2">
                                <div class="loadphong">
                                    <p class="h5 ml-0 text-gray-500">Chọn phòng</p>
                                    <form method='post' class="ml-5" id='loaddshvphong' style='margin-top:1em;'>
                                        <select style='width:50%; height:1.6em;' id='phong' name='phong'>
                                            <option value='....'>...</option>";
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="htdanhsach mt-2">
                                <div class="dshv">
                                    <p class="h5 ml-5 text-gray-500">DANH SÁCH THÍ SINH</p>
                                    <samp style="margin-left:3em;"><button id="dlpassword">
                                            Tải mật khẩu các thí sinh trong phòng
                                        </button></samp>
                                    <div class="loaddshv">
                                        <div class="card shadow mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="" width="100%"
                                                        cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th style='width:7%;'>SBD</th>
                                                                <th style='width:13%;'>Họ đệm</th>
                                                                <th style='width:7%;'>Tên</th>
                                                                <th style='width:11%;'>Ngày sinh</th>
                                                                <th style='width:15%;'>Nơi sinh</th>
                                                                <th style='width:10%;'>Mã đơn vị</th>
                                                                <th style='width:27%;'>Tên đơn vị</th>
                                                                <th style='width:13%;'>Tên PT</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th style='width:7%;'>SBD</th>
                                                                <th style='width:13%;'>Họ đệm</th>
                                                                <th style='width:7%;'>Tên</th>
                                                                <th style='width:11%;'>Ngày sinh</th>
                                                                <th style='width:15%;'>Nơi sinh</th>
                                                                <th style='width:10%;'>Mã đơn vị</th>
                                                                <th style='width:27%;'>Tên đơn vị</th>
                                                                <th style='width:13%;'>Tên PT</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody class="thb" id="thisinh">

                                                            <td valign="top" style="text-align: center;" colspan="8"
                                                                class="dataTables_empty">
                                                                No data available in table</td>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chitiet">
                                    <form name="update" id="update" method="post">
                                        <div class="csbd"><span>Số báo danh</span><input type="text" name="sbd" id="sbd"
                                                value="" autofocus></div>
                                        <div class="csbd"><span>Họ, tên đệm</span><input type="text" name="hodem"
                                                id="hodem" value=""></div>
                                        <div class="csbd"><span>Tên học viên</span><input type="text" name="ten"
                                                id="ten" value=""></div>
                                        <div class="csbd"><span>Ngày sinh</span><input type="text" name="ns" id="ns"
                                                value=""></div>
                                        <div class="csbd"><span>Nơi sinh</span><input type="text" name="noisinh"
                                                id="noisinh" value=""></div>
                                        <div class="csbd"><span>Mã đơn vị</span><input type="text" name="madonvi"
                                                id="madonvi" value=""></div>
                                        <div class="csbd"><span>Tên đơn vị</span><input type="text" name="tendonvi"
                                                id="tendonvi" value=""></div>
                                        <div class="csbd"><span>Tên phòng thi</span><input type="text" name="phongthi"
                                                id="phongthi" value=""></div>
                                        <hr>
                                        <p style="color:blue;">Ảnh đại diện</p>
                                        <input type="file" name="pictureprofile" id="pictureprofile" value=""
                                            title="Thêm ảnh đại diện của thí sinh"
                                            style="background:blue;cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;z-index:1000;opacity:0;">
                                        <p
                                            style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:31.5%;height:1.8em;color:white;display:block;margin:auto;margin-top:-1.8em; text-align:center;">
                                            Chọn ảnh đại diện từ máy tính (*.ipg,*.png)</p>
                                    </form>
                                    <div class="add">
                                        <img id="add" src="assets/image/add.png" width="40" height="40"
                                            title="Thêm học viên mới"
                                            style="margin-left:4em;margin-top:1em; cursor:pointer;">
                                        <img id="edit" src="assets/image/edit.ico" width="40" height="40"
                                            title="Sửa thông tin học viên"
                                            style="margin-left:1em;margin-top:1em; cursor:pointer;">
                                        <img id="delete" src="assets/image/delete.png" width="43" height="40"
                                            title="Xóa học viên"
                                            style="margin-left:1em;margin-top:1em; cursor:pointer;">
                                        <a href=""><img id="refresh" src="assets/image/refresh-icon.png" width="43"
                                                height="40" title="Refresh"
                                                style="margin-left:1em;margin-top:1em; cursor:pointer;"></a>
                                    </div>

                                </div>
                                <div class="load5">
                                    <hr>
                                    <p style="color:blue; margin-left:3.1em;">Thêm danh sách học viên bằng file excel
                                    </p>
                                    <form id="upload" method="post" enctype="multipart/form-data">
                                        <input type="file" id="uploads" name="upf" title="Chọn file Excel"
                                            style="background:blue;cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;z-index:1000;opacity:0;">
                                        <p
                                            style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:31.5%;height:1.8em;color:white;display:block;margin:auto;margin-top:-1.8em; text-align:center;">
                                            Chọn tệp excel (*.xlsx)</p>
                                        <input type="submit" name="clickup" id="Submit" value="Tải lên"
                                            title="Nhấn để tải lên"
                                            style="margin-top:2em; border:none; background:blue;cursor:pointer; color:white; width:80%; height:1.5em;">
                                    </form>

                                    <script>
                                    document.getElementById('upload').addEventListener('submit', function(e) {
                                        e.preventDefault(); // Ngăn chặn hành động mặc định của form

                                        var fileInput = document.getElementById('uploads');
                                        var file = fileInput.files[0];

                                        if (file) {
                                            var formData = new FormData();
                                            formData.append('upf', file);

                                            var xhr = new XMLHttpRequest();
                                            xhr.open('POST', 'index.php?controller=createthisinhByexcel', true);

                                            xhr.onload = function() {
                                                if (xhr.status >= 200 && xhr.status < 300) {
                                                    var responseData = xhr.responseText;
                                                    var data = JSON.parse(responseData);
                                                    // Kiểm tra xem có lỗi không
                                                    if (data.error) {
                                                        alert('Lỗi từ máy chủ: ' + data.error);
                                                    } else {
                                                        // Xử lý dữ liệu thành công
                                                        console.log('Thành công:', data.success);
                                                        // Thực hiện các hành động khác dựa trên dữ liệu nhận được
                                                    }
                                                } else {
                                                    console.error('Có lỗi xảy ra khi gửi yêu cầu.');
                                                }
                                            };

                                            xhr.onerror = function() {
                                                console.error('Đã xảy ra lỗi trong quá trình gửi yêu cầu.');
                                            };

                                            xhr.send(formData);
                                        } else {
                                            alert('Không có file được chọn');
                                        }
                                    });
                                    </script>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span> Hệ thống trắc nhiệm &copy; trực tuyến </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script src="assets/js/quanlythisinh.js"></script>
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/demo/datatables-demo.js"></script>
</body>

</html>