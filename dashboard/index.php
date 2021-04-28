<?php  

include '../auth.php';
include '../koneksi/koneksi.php';

$role = "";

$id 	= $_SESSION['auth'];


if ($_SESSION['role_user'] == 0) {
	$role = "Admin";
    $query      = "SELECT * FROM akun WHERE id = $id";

    $exec       = mysqli_query($conn, $query);

    if ($exec) {
    
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }

}else{
	$role = "User";
    $query      = "SELECT a.*,b.* FROM pendaftaran a, akun b WHERE a.id = $id AND b.id_user=$id";

    $exec       = mysqli_query($conn, $query);


    if ($exec) {
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }
}

$get_image = "SELECT foto_anak FROM pendaftaran WHERE id = $id";
$result = mysqli_query($conn, $get_image);

while($rows=mysqli_fetch_assoc($result))
{
    $gambar = $rows['foto_anak'];
}

$getPage = $_GET['page'];

switch ($getPage) {
	case 1:
		$page 				= "include/home.php";
		$_SESSION['active']	= "1";
		break;
	case 2:
		$page 				= "include/profile.php";
		$_SESSION['active']	= "2";
		break;
	case 3:
		$page 				= "include/edit_profile.php";
		$_SESSION['active']	= "2";
		break;
	case 4:
		$page 				= "include/syarat_pendaftaran.php";
		$_SESSION['active'] = "3";
		break;
	case 5:
		$page 				= "include/upload_akte.php";
		$_SESSION['active'] = "3";
		break;
	case 6:
		$page 				= "include/upload_foto2r.php";
		$_SESSION['active'] = "3";
		break;
	case 7:
		$page 				= "include/konfirmasi_pendaftaran.php";
		$_SESSION['active']	= "4";
		break;
    case 8:
        $page               = "include/detail_pendaftaran.php";
        $ida                = $_GET['ida'];
        $idd                = $_GET['idd'];
        $_SESSION['active'] = "4";
        break;
    case 9:
        $page               = "include/pembayaran.php";
        $_SESSION['active'] = "5";
        break;
    case 10:
        $page               = "include/konfirmasi_test.php";
        $_SESSION['active'] = "6";
        break;
    case 11:
        $page               = "include/detail_pendaftaran.php";
        $ida                = $_GET['ida'];
        $idd                = $_GET['idd'];
        $_SESSION['active'] = "6";
        break;
    case 12:
        $page               = "include/ubah_guru.php";
        $_SESSION['active'] = 6;
        $id                 = $_GET['id'];
        break;
    case 13:
        $page               = "include/review_pembayaran_pendaftaran.php";
        $_SESSION['active'] = '5';
        break;
    case 14:
        $page               =  "include/konfirmasi_pembayaran_user.php";
        $_SESSION['active'] = '7';
        break;
    case 15:
        $page               =  "include/konfirmasi_pembayaran_pendaftaran.php";
        $_SESSION['active'] = '7';
        break;
    case 16:
        $page               = "include/konfirmasi_pembayaran_spp.php";
        $_SESSION['active'] = '7';
        break;
    case 17:
        $page               = "include/konfirmasi_pembayaran_pendaftaran_admin.php";
        $_SESSION['active'] = '8';
        break;
    case 18:
        $page               = "include/laporan.php";
        $_SESSION['active'] = "9";
        break;
    case 19:
        $page               = "include/mapel.php";
        $_SESSION['active'] = "10";
        break;
    case 20:
        $page               = "include/tambah_mapel.php";
        $_SESSION['active'] = "10";
        break;
    case 21:
        $page               = "include/ubah_mapel.php";
        $_SESSION['active'] = "10";
        $id                 = $_GET['id'];
        break;
    case 22:
        $page               = "include/jadwal.php";
        $_SESSION['active'] = "11";
        break;
    case 23:
        $page               = "include/tambah_jadwal.php";
        $_SESSION['active'] = "11";
        $kelas              = $_GET['kelas'];
        break;
    case 24:
        $page               = "include/jadwal_user.php";
        $_SESSION['active'] = "12";        
        break;
    case 25:
        $page               = "include/konfirmasi_pembayaran_spp_admin.php";
        $_SESSION['active'] = "13";
        break;
    case 26:
        $page               = "include/konfirmasi_pembayaran_kegiatan_admin.php";
        $_SESSION['active'] = "14";
        break;
    case 27:
        $page               = "include/konfirmasi_pembayaran_kegiatan.php";
        $_SESSION['active'] = "7";
        break;
    case 28:
        $page               = "include/status_pendaftaran.php";
        $_SESSION['active'] = "15";
        break;
	default:
		$page 	= "include/home.php";
		$_SESSION['active']	= "1";
		break;
}

?>

<!Doctype html>
<html lang="en">
	
<head>
    
    <title>Dashboard <?php echo $role; ?></title>
	

    <?php  
    	include "include/libs.php";
    ?>
</head>

<link rel="stylesheet" href="/dashboard/">
<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="../assets/utama/img/logo_edit.png" alt="Citra Indonesia"/>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub class="<?php $_SESSION['active'] == 1 ? print("active") : print("") ?>"">
                            <a class="js-arrow" href="index.php?page=1">
                                <i class="fas fa-home"></i>Home
                            </a>
                        </li>

                        <?php  
                            if ($role == "User") {
                        ?>

                        <li class="<?php $_SESSION['active'] == 2 ? print("active") : print("") ?>">
                            <a href="index.php?page=2">
                                <i class="fas fa-user"></i>Profil Siswa</a>
                        </li>

                        <?php
                            }
                        ?>

                        <?php  
                            if ($role == "Admin") {
                        ?>

                        <li class="<?php $_SESSION['active'] == 4 ? print("active") : print("") ?>">
                            <a href="index.php?page=7">
                            <i class="fas fa-clipboard"></i>Konfirmasi Pendaftaran</a>
                        </li>
                        <li class="<?php $_SESSION['active'] == 6 ? print("active") : print("") ?>">
                            <a href="index.php?page=10">
                                <i class="fas fa-user"></i>Konfirmasi Hasil Test</a>
                        </li>
                        <li class="<?php $_SESSION['active'] == 9 ? print("active") : print("") ?>">
                            <a href="index.php?page=18">
                                <i class="far fa-file-alt"></i>Laporan</a>
                        </li>
                        
                        <?php
                            }
                        ?>

                        <?php  
                            if ($role == "User") {
                        ?>
                        <li class="<?php $_SESSION['active'] == 3 ? print("active") : print("") ?>">
                            <a href="index.php?page=4">
                                <i class="fas fa-clipboard-list"></i>Syarat Pendaftaran</a>
                        </li>
                        <li class="<?php $_SESSION['active'] == 7 ? print("active") : print("") ?>">
                            <a href="index.php?page=28">
                                <i class="fas fa-clipboard-check"></i>Status Pendaftaran</a>
                        </li>
                        <li class="<?php $_SESSION['active'] == 5 ? print("active") : print("") ?>">
                            <a href="index.php?page=9">
                                <i class="fas fa-credit-card"></i>Rincian Biaya</a>
                        </li>
                        <li class="<?php $_SESSION['active'] == 12 ? print("active") : print("") ?>">
                            <a href="index.php?page=24">
                                <i class="fas fa-calendar-alt"></i>Jadwal Kegiatan</a>
                        </li>

                        <?php
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap" style="float: right;">
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                        <?php
                                            if ($role == "Admin") {
                                                echo '<img src="../assets/uploads/admin.jpg" alt="admin" />';
                                            } else {
                                                echo '<img src="../assets/uploads/'.$gambar.'" alt="profile" />';
                                            }                                          
                                        ?>
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">
                                                <?php $role == "Admin" ? print($nama_admin) : print($nama_panggilan); ?>
                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <?php
                                                            if ($role == "Admin") {
                                                                echo '<img src="../assets/uploads/admin.jpg" alt="admin" />';
                                                            } elseif ($role == "User") {
                                                                echo '<img src="../assets/uploads/'.$gambar.'" alt="profile" />';
                                                            }                                       
                                                        ?>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">
                                                            <?php $role == "Admin" ? print($nama_admin) : print($nama); ?>
                                                        </a>
                                                    </h5>
                                                    <span class="email">
                                                        <?php $role == "Admin" ? print($email) : print($email); ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Pengaturan Akun</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <?php  
                                        include $page;
                                    ?>
                                </div>
                            </div>
                        </div>                               
                    </div>
                </div>
            </div>
        </div>    
    </div>
    


    <!-- Jquery JS-->
    <script src="../assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../assets/vendor/slick/slick.min.js">
    </script>
    <script src="../assets/vendor/wow/wow.min.js"></script>
    <script src="../assets/vendor/animsition/animsition.min.js"></script>
    <script src="../assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../assets/js/main.js"></script>
</body>

    <script>
        $(document).ready(function(){
            $("#cetak").click(function(){
                window.print();
            });
        });
    </script>

</html>