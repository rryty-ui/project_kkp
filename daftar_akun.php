<?php  
	//start the session
	session_start();

    include 'koneksi/koneksi.php';

    $redirect = "";

	if (isset($_SESSION['is_data_student_exist'])) {
		$redirect = "<script> window.location='daftar_syarat.php'; </script>";
	}else{
		$redirect = "<script> window.location='daftar_calon_siswa.php'; </script>";
	}

	//check if button next is clicked
	if(isset($_POST['submit'])){



		//set all name attr and value to created variable
		foreach ($_POST as $key => $val) {
			${$key} = $val;
			$_SESSION[''.$key.''] = $val;
		}

        $query  =   "SELECT email FROM akun WHERE email='$email'";

        $exac   = mysqli_query($conn, $query);

        if ($exac) {
            $email_count = mysqli_num_rows($exac);
            if ($email_count > 0) {
                echo '<script>alert("Email sudah digunakan, silahkan gunakan email lain..")</script>';
            }else{
                $cost = 10;
                $hash = password_hash($password,PASSWORD_BCRYPT,["cost" => $cost]);

                $_SESSION['password'] = $hash;

                //check if session is not empty, then redirect to daftar_data_orangtua.php
                if (!empty($_SESSION)) {
                    echo $redirect;
                    print_r($_SESSION);
                }
            }
        }else{
            echo mysqli_error($conn);
        }   	   
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Penerimaan Siswa Baru</title>

    <!-- Fontfaces CSS-->
    <link href="assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">

<div class="container">
    <div class="row">
        <div class="col-lg-4 offset-lg-1">
            <h1 class="login-title m-t-95 m-b-20" style="text-align:center;">Pendaftaran Akun</br>Calon Siswa</h1>
            <div class="alert alert-danger" role="alert">
                Isi Form pendaftaran akun dengan benar, akan digunakan untuk login!
            </div>
        </div>
        
        <div class="col-lg-5 offset-lg-1 login-wrap">
            <div class="login-content">
                <div class="login-logo">
                    <img src="assets/utama/img/logo.png" alt="Citra Indonesia" style="width: 80px; height: 80px;">
                    <h3 style="margin-top: 20px;">Sekolah Citra Indonesia</h3>
                </div>
                <div class="login-form">
                    <form method="post" action="">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input class="form-control" type="email" name="email" value="<?php isset($_SESSION['email'])  ?  print($_SESSION['email']) : ""; ?>" required autofocus autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input class="form-control" type="password" name="password" value="<?php isset($_SESSION['password'])  ?  print($_SESSION['password']) : ""; ?>" required>
                        </div>

                        <?php  
                        if (isset($_SESSION['is_data_student_exist'])) {
                        ?>
                            <button type="submit" name="submit" class="btn btn-primary pull-right">Kembali <i class="fa fa-arrow-right"></i></button>
                        <?php
                        }else{
                        ?>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">Daftar</button>
                        <?php
                        }
                        ?>

                        <div class="clearfix"></div>
                    </form>
                    <div class="register-link">
                        <p>
                            Sudah Punya Akun?
                            <a href="login.php">Log In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>       
    </div>    
</div>
    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/vendor/slick/slick.min.js">
    </script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/animsition/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>
    
</body>

</html>