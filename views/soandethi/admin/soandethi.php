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
    <link rel="stylesheet" href="assets/style/taodethi.css">
    <!-- Custom styles for this template-->
    <link href="assets/style/sb-admin-2.min.css" rel="stylesheet" />
</head>

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
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=quanlythisinh">
                    <i class="fas fa-user"></i>
                    <span>Quản lý thí sinh</span></a>
            </li>
            <!-- Soạn đề thi -->
            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
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
                        <h1 class="h3 mb-0 text-gray-800">Soạn đề thi</h1>
                    </div>

                    <div>
                        <div class="tttk">
                            <div class="pp1">
                                <p style="margin-left:3em;margin-top:0.5em;font-size:17px;color:blue;font-weight:bold;">
                                    Thông tin tìm kiếm</p>
                            </div>
                            <div class="pp2">


                                <span style="margin-left:2em;">Danh mục kỳ thi</span>
                                <select name="kythi" id="kythi"
                                    style="margin-top:0em; width:30%;height:2em; margin-left:2em;">
                                    <option>--Chọn kỳ thi--</option>
                                    <?php foreach ($kythi as $key => $value) : ?>
                                    <option value="<?= $value->getMaKyThi() ?>">
                                        <?= $value->getTenKyThi() ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>

                                <div class="loada">
                                    <span style="margin-left:2em;">Danh mục môn thi</span>
                                    <select id="monthi" name="monthi"
                                        style="margin-top:1em;margin-left:1em;width:30%;height:2em;">
                                        <option value="all">--Chọn môn thi--</option>
                                    </select>
                                </div>
                                <div class="loada">
                                    <span style="margin-left:2em;">Bộ đề</span>
                                    <select id="pthi" name="pthi"
                                        style="margin-top:1em;margin-left:6.6em;width:30%;height:2em;">
                                        <option value="all">--Chọn phần thi--</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="kqtk">
                            <div class="pp1" style="padding:0;">

                                <p style="margin-left:3em;margin-top:0.5em;font-size:17px;color:blue;font-weight:bold;">
                                    Kết quả tìm kiếm</p>
                            </div>
                            <div class="pp2" id="loadndch">
                                <form method="post" action="" name='f'>
                                    <table class="tabley" id="cauhoilist">
                                        <tr style="color:rgba(255,153,0,1); margin-bottom:2em;">
                                            <th style='width:7%;'>Mã câu hỏi</th>
                                            <th style='width:20%;'>Tên câu hỏi</th>
                                            <th style='width:15%;'>Phương án đúng</th>
                                            <th style='width:15%;'>Phương án sai 1</th>
                                            <th style='width:15%;'>Phương án sai 2</th>
                                            <th style='width:15%;'>Phương án sai 3</th>
                                            <th style='width:5%;'>Mức độ</th>
                                        </tr>

                                    </table>
                                </form>
                            </div>
                        </div>
                        <div class="chititet">
                            <div class="pp1" style="padding:0;">

                                <p style="margin-left:3em;margin-top:0.5em;font-size:17px;color:blue;font-weight:bold;">
                                    Xử lý câu hỏi</p>
                            </div>
                            <div class="sua" style="padding-bottom:2em;width:100%; float:left;">
                                <form name="update" id="update" method="POST" enctype="multipart/form-data">
                                    <div class="csbd">
                                        <span>Mã câu hỏi</span>
                                        <br>
                                        <input type="text" name="macauhoi" id="macauhoi" value="" autofocus>
                                    </div>
                                    <div class="csbd">
                                        <span>Tên câu hỏi</span>
                                        <br>
                                        <input type="text" name="tencauhoi" id="tencauhoi" value="">
                                        <input type="file" name="file1" id="file1"
                                            title="Chọn file ảnh, audio, hoặc video">
                                        <p
                                            style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;margin-top:-2.4em; z-index:1;">
                                            Thêm hình ảnh, âm thanh hoặc video</p>
                                    </div>
                                    <div class="csbd">
                                        <span>Phương án đúng</span>
                                        <br>
                                        <input type="text" name="padung" id="padung" value="">
                                        <input type="file" name="file2" id="file2"
                                            title="Chọn file ảnh, audio, hoặc video">
                                        <p
                                            style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;margin-top:-2.4em; z-index:1;">
                                            Thêm hình ảnh, âm thanh hoặc video</p>
                                    </div>
                                    <div class="csbd">
                                        <span>Phương án sai 1</span>
                                        <br>
                                        <input type="text" name="pasai1" id="pasai1" value="">
                                        <input type="file" name="file3" id="file3"
                                            title="Chọn file ảnh, audio, hoặc video">
                                        <p
                                            style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;margin-top:-2.4em; z-index:1;">
                                            Thêm hình ảnh, âm thanh hoặc video</p>
                                    </div>
                                    <div class="csbd">
                                        <span>Phương án sai 2</span>
                                        <br>
                                        <input type="text" name="pasai2" id="pasai2" value="">
                                        <input type="file" name="file4" id="file4"
                                            title="Chọn file ảnh, audio, hoặc video">
                                        <p
                                            style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;margin-top:-2.4em; z-index:1;">
                                            Thêm hình ảnh, âm thanh hoặc video</p>
                                    </div>
                                    <div class="csbd">
                                        <span>Phương án sai 3</span>
                                        <br>
                                        <input type="text" name="pasai3" id="pasai3" value="">
                                        <input type="file" name="file5" id="file5"
                                            title="Chọn file ảnh, audio, hoặc video">
                                        <p
                                            style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;margin-top:-2.4em; z-index:1;">
                                            Thêm hình ảnh, âm thanh hoặc video</p>
                                    </div>
                                    <div class="csbd">
                                        <span>Mức độ</span>
                                        <br>
                                        <input type="text" name="tl" id="tl" value="">
                                    </div>
                                </form>
                                <div class="add">
                                    <img id="add" src="assets/image/add.png" width="30" height="30"
                                        title="Thêm câu hỏi mới"
                                        style="margin-left:4em;margin-top:1em; cursor:pointer;">
                                    <img id="edit" src="assets/image/edit.ico" width="30" height="30"
                                        title="Sửa câu hỏi" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                                    <img id="delete" src="assets/image/delete.png" width="30" height="30"
                                        title="Xóa câu hỏi" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                                    <img id="refresh" src="assets/image/refresh-icon.png" width="30" height="30"
                                        title="Refresh" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                                </div>
                            </div>
                            <div class="load6" style="width: 100%;">
                                <div class="addByExcel" style="width: 100%;">
                                    <p
                                        style="background:rgba(100%,40%,20%,1); cursor:pointer; border-radius:4px; width:100%; height:2.2em; color:white; display:block; margin:auto; margin-top:1em; padding-top:0.5em; z-index:1;">
                                        Thêm câu hỏi bằng file excel</p>
                                    <form id="upcauhoi" method="post" enctype="multipart/form-data"
                                        style="margin-top:-2.6em;">
                                        <input type="file" id="uploacauhoi" name="upch" title="Click chọn file excel"
                                            style="cursor:pointer;opacity:0; background:red; width:100%; height:3.2em; margin-top:-6.2em; z-index:1000;">
                                        <input type="submit" name="clickup" id="Submit" value="Tải lên"
                                            title="Click tải lên"
                                            style="margin-top:2em; border:none; background:blue;cursor:pointer; color:white; width:80%; height:1.5em;">
                                    </form>
                                    <script>
                                    document.getElementById("upcauhoi").addEventListener("submit", function(e) {
                                        e.preventDefault();

                                        var fileInput = document.getElementById("uploacauhoi");
                                        var file = fileInput.files[0];

                                        var modun = document.getElementById("pthi").value;

                                        if (file && modun !== "all") {
                                            var formData = new FormData();
                                            formData.append("upf", file);
                                            formData.append("modun", modun);

                                            var xhr = new XMLHttpRequest();
                                            xhr.open("POST", "index.php?controller=createthisinhByexcel", true);

                                            xhr.onload = function() {
                                                if (xhr.status >= 200 && xhr.status < 300) {
                                                    var responseData = xhr.responseText;
                                                    var data = JSON.parse(responseData);
                                                    // Kiểm tra xem có lỗi không
                                                    if (data.error) {
                                                        alert("Lỗi từ máy chủ: " + data.error);
                                                    } else {
                                                        // Thực hiện các hành động khác dựa trên dữ liệu nhận được
                                                        renderExcel(data.success, data.phong);
                                                    }
                                                } else {
                                                    console.error("Có lỗi xảy ra khi gửi yêu cầu.");
                                                }
                                            };

                                            xhr.onerror = function() {
                                                console.error("Đã xảy ra lỗi trong quá trình gửi yêu cầu.");
                                            };

                                            xhr.send(formData);
                                        } else {
                                            if (file) {
                                                alert("Vui lòng nhập bộ đề.");
                                            } else if (modun !== "all") {
                                                alert("Vui lòng chọn file.");
                                            } else {
                                                alert("Vui lòng chọn file và nhập bộ đề.");
                                            }
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
    <script src="assets/js/taodethi.js"></script>
</body>

</html>