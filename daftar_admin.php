<?php  
	ini_set ("display_errors", "1");
    error_reporting(E_ALL);
    
    include 'koneksi/koneksi.php';

    $redirect = "";


	//check if button next is clicked
	if(isset($_POST['submit'])){


		//set all name attr and value to created variable
		foreach ($_POST as $key => $val) {
			${$key} = $val;
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

                
                $queryInsert = "INSERT INTO akun VALUES(null, '$email', '$hash', '$nama', 0, null)";
                $execQueryInsert = mysqli_query($conn,$queryInsert);


                if ($execQueryInsert) {
                    //check if session is not empty, then redirect to daftar_data_orangtua.php                                         
                    echo '<script>alert("berhasil melakukan pendaftaran")</script>';
                    echo "<script> window.location='login.php'</script>";
                
                }else{
                    echo mysqli_error($conn);
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

    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="assets/utama/img/logo.png" alt="Citra Indonesia" style="width: 80px; height: 80px;">
                                <h3 style="margin-top: 20px;">Admin Sekolah Citra Indonesia</h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Nama Admin</label>
                                    <input class="au-input au-input--full" type="text" name="nama" placeholder="Nama Admin" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" id="pass" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input class="au-input au-input--full" type="password" id="kpass" name="konfirmasi_password" placeholder="Konfirmasi Password" required>
                                    <font id="err" class="text-danger">Konfirmasi Password tidak sama dengan password</font>
                                </div>
                                <button id="btnsb" class="au-btn au-btn--block au-btn--green m-b-20" name="submit" type="submit">Daftar</button>

                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    include 'assets/footer.php';
?>

<script>
    $(document).ready(function() {
        $err = $("#err");
        $btn = $("#btnsb");
        $err.hide();
        
        $(':input[type="submit"]').prop('disabled', true);

        $("#kpass").on("change paste keyup",function(event) {
            /* Act on the event */
            event.preventDefault();
            var pass = $("#pass").val();
            var dpass = $("#kpass").val();
        
            if (pass != dpass) {
                $err.show();
                $(':input[type="submit"]').prop('disabled', true);
            }else{
                $(':input[type="submit"]').prop('disabled', false);
                $err.hide();
            }
        });
    });
</script>
