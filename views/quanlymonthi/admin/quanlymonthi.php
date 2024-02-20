<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/style/sb-admin-2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/style/dtdanhmuc.css" type="text/css">
    <script src="assets/js/jquery-3.1.1.js"></script>
    <script src="assets/js/dtdanhmuc.js"></script>
    <style>
        #li3 {
            color: rgba(255, 204, 0, 1);
            font-weight: bolder
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?controller=homeAdmin">
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
            <li class="nav-item active">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                        <h1 class="h3 mb-0 text-gray-800">Quản lý môn thi</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="chitiet">
                                <p class="h5 mb-0 text-gray-600">CHỌN KỲ THI</p>
                                <select name="" id="">
                                    <option value=""></option>
                                </select>

                                <hr>
                                <p class="h5 mb-0 text-gray-600">DANH MỤC MÔN THI</p>
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Mã môn thi</th>
                                                        <th>Tên môn thi</th>
                                                        <th>Bắt đầu</th>
                                                        <th>Kết thúc</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Mã môn thi</th>
                                                        <th>Tên môn thi</th>
                                                        <th>Bắt đầu</th>
                                                        <th>Kết thúc</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody class="ttb2">
                                                    <?php
                                                    // $h = mysqli_query($connect, "select mamodun,tenmodun,tenkythi,batdau,ketthuc from modun,kythi where kythi.makythi=modun.makythi and kythi.makythi='" . $_SESSION['kythi'] . "'");
                                                    $i = 1;
                                                    while (5 > $i) {
                                                        echo "<tr>";
                                                        echo "<td style='text-align:left; padding:0.5em 1em;'>
							" . 'mamodun' . $i . "
						</td>
						";
                                                        echo "<td style='text-align:left; padding:0.5em 1em;'>
							" . 'tenmodun' . "
						</td>
						";
                                                        echo "<td style='text-align:left; padding:0.5em 1em;'>
							" . 'batdau' . "
						</td>
						";
                                                        echo "<td style='text-align:left; padding:0.5em 1em;'>
							" . 'ketthuc' . "
						</td>
						";
                                                        echo "</tr>";
                                                        $i++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="thaotac">
                                    <form method="post" id="suamodun">
                                        <span style="margin-left:1em; margin-bottom:1em;">Mã môn thi</span>
                                        <input style="margin-left:1em; margin-bottom:1em;width:30em;" type='text' name='mmt' id='mmt' value='' autofocus><br>
                                        <span style="margin-left:1em; margin-bottom:1em;">Tên môn thi</span>
                                        <input style="margin-left:0.8em; margin-bottom:1em;width:30em;" type='text' name='tenmt' id='tenmt' value=''><br>
                                        <span style="margin-left:1em; margin-bottom:1em;">Bắt đầu</span>
                                        <input style="margin-left:2.9em; margin-bottom:1em;width:30em;" type='text' name='tkt' id='tkt' value=''><br>
                                        <span style="margin-left:1em; margin-bottom:1em;">Kết thúc</span>
                                        <input style="margin-left:2.5em; margin-bottom:1em;width:30em;" type='text' name='tkt2' id='tkt2' value=''>
                                    </form>
                                    <img id="add1" src="assets/image/add.png" width="33" height="33" title="Thêm mới" style="margin-left:4em;margin-top:1em; cursor:pointer;">
                                    <img id="edit1" src="assets/image/edit.ico" width="33" height="33" title="Sửa" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                                    <img id="delete1" src="assets/image/delete.png" width="33" height="33" title="Xóa" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                                </div>


                                <hr>
                                <p class="h5 mb-0 text-gray-600">DANH MỤC NỘI DUNG THI</p>
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Mã nội dung</th>
                                                        <th>Tên nội dung</th>
                                                        <th>Môn thi</th>
                                                        <th>Kỳ thi</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Mã nội dung</th>
                                                        <th>Tên nội dung</th>
                                                        <th>Môn thi</th>
                                                        <th>Kỳ thi</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody class="table12">
                                                    <?php
                                                    // $h = mysqli_query($connect, "select bode.mabode as mabode, bode.tenbode as tenbode,modun.tenmodun as tenmodun,kythi.tenkythi as tenkythi from modun,kythi,bode where kythi.makythi=modun.makythi and modun.mamodun=bode.mamodun and kythi.makythi='" . $_SESSION['kythi'] . "'");
                                                    $i = 1;
                                                    while (5 > $i) {
                                                        echo "<tr>";
                                                        echo "<td style='text-align:left; padding:0.5em 1em;'>
							" . 'mabode' . $i . "
						</td>
						";
                                                        echo "<td style='text-align:left; padding:0.5em 1em;'>
							" . 'tenbode' . "
						</td>
						";
                                                        echo "<td style='text-align:left; padding:0.5em 1em;'>
							" . 'tenmodun' . "
						</td>
						";
                                                        echo "<td style='text-align:left; padding:0.5em 1em;'>
							" . 'tenkythi' . "
						</td>
						";
                                                        echo "</tr>";
                                                        $i++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="thaotac">
                                    <form method="post" id="suamodun">
                                        <span style="margin-left:1em; margin-bottom:1em;">Mã nội dung thi</span>
                                        <input style="margin-left:1em; margin-bottom:1em;width:30em;" type='text' name='mmt1' id='mmt1' value='' autofocus><br>
                                        <span style="margin-left:1em; margin-bottom:1em;">Tên nội dung thi</span>
                                        <input style="margin-left:0.75em; margin-bottom:1em;width:30em;" type='text' name='tenmt1' id='tenmt1' value=''><br>
                                        <span style="margin-left:1em; margin-bottom:1em;">Tên môn thi</span>
                                        <input style="margin-left:2.83em; margin-bottom:1em;width:30em;" type='text' name='tkt1' id='tkt1' value=''>
                                    </form>
                                    <img id="add2" src="assets/image/add.png" width="33" height="33" title="Thêm mới" style="margin-left:4em;margin-top:1em; cursor:pointer;">
                                    <img id="edit2" src="assets/image/edit.ico" width="33" height="33" title="Sửa" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                                    <img id="delete2" src="assets/image/delete.png" width="33" height="33" title="Xóa" style="margin-left:1em;margin-top:1em; cursor:pointer;">
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
</body>

</html>