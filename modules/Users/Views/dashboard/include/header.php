<?php
$hostname = 'localhost';
$username = 'u555116338_mycoinmedia';
$password = 'Mycoinmedia@2244';
$database = 'u555116338_mycoinmedia';

$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session()->has("logged_in_user");
$user = $_SESSION['logged_in_user'];
$uid = $user['user_id'];

// var_dump($uid);
// exit;

$result = $conn->query("SELECT * FROM `users` where `user_id` = '$uid';");
// print_r($result);exit;
if ($result->num_rows > 0){
    // echo "true";exit;
    while ($row = $result->fetch_assoc()){
        // echo "true";exit;
        if (!empty($row['user_profile_pic']) || !empty($row['user_name'])){
            // echo "true";exit;
            $image_user = $row['user_profile_pic'];
            $name = $row['user_name'];
        }
    }
}

// var_dump($name);
      
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyCoinMedia | User | Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/public/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/user/bootstrap/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/public/assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Data tables css -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/user/css/jquery.dataTables.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>/userdashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text  mx-3">MyCoinMedia</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url() ?>/userdashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>/userdashboard/myProfile">
                    <i class="far fa-user"></i>
                    <span>My Profile</span>
                </a>
            </li>

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>/userdashboard/myGallery">
                    <i class="fas fa-images"></i>
                    <span>My Gallery</span>
                </a>
            </li> -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="<?= base_url() ?>/userdashboard/companyProfile">
                    <i class="fas fa-suitcase"></i>
                    <span>Company Profile</span>
                </a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>/userdashboard/myPressRelease">
                    <i class="fas fa-shopping-cart"></i>
                    <span>My Press Release</span>
                </a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="<?= base_url() ?>/pricing">
                    <i class="fas fa-cart-plus"></i>
                    <span>Submit PR</span>
                </a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="<?= base_url() ?>/userdashboard/prHistory">
                    <i class="fas fa-history"></i>
                    <span>PR History</span>
                </a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="<?=  base_url(); ?>/userdashboard/payHistory">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Payment History</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="<?= base_url() ?>/userdashboard/signOut" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>SignOut</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item -Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <!-- Dropdown of Pages Nav Item Dashboard-->
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <ul type="none">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <i class="fas fa-headset"></i>
                                <span>Support</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <i class="far fa-newspaper"></i>
                                <span>News Room</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?= base_url(); ?>/pricing">
                                <i class="fas fa-hand-holding-usd"></i>
                                <span>Pricing</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <i class="far fa-address-book"></i>
                                <span>Contact Us</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- End Dropdown of Pages Nav Item Dashboard -->
            </li>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

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
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- User name and profile picture -->
                                <?php if(!empty($image_user) && !empty($name)) {?>
                                    <span class="mr-2 1 d-none d-lg-inline text-gray-600 small"><?= $name; ?></span>
                                    <img class="img-profile rounded-circle" src="<?= base_url(); ?>/public/uploads/<?= $image_user; ?>">
                                <?php }elseif(!empty($image_user) && empty($name)){ ?>
                                    <span class="mr-2 2 d-none d-lg-inline text-gray-600 small"> User Name </span>
                                    <img class="img-profile rounded-circle" src="<?= base_url(); ?>/public/uploads/<?= $image_user; ?>">
                                <?php }elseif(empty($image_user) && !empty($name)){ ?>
                                    <span class="mr-2 3 d-none d-lg-inline text-gray-600 small"><?= $name; ?></span>
                                    <img class="img-profile rounded-circle" src="<?= base_url(); ?>/public/assets/admin/images/undraw_profile.svg" alt="user_image">
                                <?php }else{ ?>
                                    <span class="mr-2 4 d-none d-lg-inline text-gray-600 small"> User Name </span>
                                    <img class="img-profile rounded-circle" src="<?= base_url(); ?>/public/assets/admin/images/undraw_profile.svg" alt="user_image">
                                <?php } ?>
                                     
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


                <!-- Main Content -->
                <?= $this->renderSection('content'); ?>
                <!-- Main Content Ends -->



                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; MyCoinMedia 2022</span>
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
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url() ?>/userlogout">Logout</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url() ?>/public/assets/admin/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>/public/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- js  -->
        
        <!-- Core plugin JavaScript-->
        <script src="<?= base_url() ?>/public/assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Data tables Javascript -->
        <script src="<?= base_url() ?>/public/assets/user/js/jquery.dataTables.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url() ?>/public/assets/admin/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <!-- <script src="<?= base_url() ?>/public/assets/admin/vendor/chart.js/Chart.min.js"></script> -->

        <!-- Page level custom scripts -->
        <!-- <script src="<?= base_url() ?>/public/assets/admin/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>/public/assets/admin/js/demo/chart-pie-demo.js"></script> -->

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script> 


</body>

</html>