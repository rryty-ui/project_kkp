<?php  
	//start the session
	session_start();

    include 'koneksi/koneksi.php';

    $redirect = "";

	if (isset($_SESSION['data_akun_exist'])) {
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

<?php
    include 'assets/header.php';
?>

    <div id="container" class="container">
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
                            if (isset($_SESSION['data_akun_exist'])) {
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

<?php
    include 'assets/footer.php';
?>