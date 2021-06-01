<head>
    <style>

    </style>
    <?php
    include '../php/koneksi.php';

    // mengaktifkan session
    session_start();

    $username = $_SESSION['username'];
    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    $d = mysqli_fetch_array($data);





    // cek apakah user telah login, jika belum login maka di alihkan ke halaman login
    if ($_SESSION['status'] != "login") {
        header("location:../index.php");
    }


    // menampilkan pesan selamat datang

    ?>


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- tampilan depan -->
    <link rel="stylesheet" type="text/css" href="css/sb-admin-2.css">
    <link rel="stylesheet" type="text/css" href="css/sb-admin-2.min.css">
    <script type="text/javascript" src="js/sb-admin-2.js"></script>
    <script type="text/javascript" src="js/sb-admin-2.min.js"></script>

</head>


<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-door-open"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIMKOS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="daftar-kost.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Daftar Kost</span>
                </a>


                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>

                <?php
                if ($d['roles'] == 1) {
                ?>
                    <!-- Nav Item - Penghuni kost -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Menu</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu:</h6>
                        <a class="collapse-item" href="profil.php">Profil</a>
                        <a class="collapse-item" href="tagihan.php">Tagihan</a>
                        <a class="collapse-item" href="kostku.php">Kostku</a>
                        <a class="collapse-item" href="wishlist.php">My Wishlist</a>
                        <!-- <a class="collapse-item" href="#">Bantuan</a>  -->

                    </div>
                </div>
            </li>
        <?php } else if ($d['roles'] == 2) { ?>
            <!-- Nav Item - OWNER MENU-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Owner Menu</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu:</h6>
                        <a class="collapse-item" href="tambah_kos.php">Tambah Kost</a>
                        <a class="collapse-item" href="properti.php">Kost Saya</a>
                        <!-- <a class="collapse-item" href="#">Keuangan</a>
                        <a class="collapse-item" href="#">Tagihan</a> -->
                        <a class="collapse-item" href="profil.php">Profilku</a>

                    </div>
                </div>
            </li>
        <?php } else if ($d['roles'] == 3) { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Admin Menu</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu:</h6>
                        <a class="collapse-item" href="user.php">User</a>
                        <a class="collapse-item" href="kost_management.php">Kost</a>
                        <a class="collapse-item" href="semua_transaksi.php">Management Transaksi</a>
                    </div>
                </div>
            </li>
        <?php } ?>


        <!-- Divider -->
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a class="nav-link" href="logout.php">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>

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
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <!-- Informasi user -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-800 small"><?php echo $_SESSION['username']; ?></span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
                    </div>

                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->