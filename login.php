<?php  

session_start();

include 'koneksi/koneksi.php';

if (isset($_POST['submit'])) {
	
	foreach ($_POST as $key => $val) {
		${$key} = $val;
	}

	$query	=	"SELECT a.password,a.role_user as role,a.id as id_akun, b.id as id_daftar from akun a, pendaftaran b 
				WHERE email='$email' 
				AND b.id = a.id_user";

	$exec 	= mysqli_query($conn, $query);

	if ($exec) {

		if (mysqli_num_rows($exec) > 0) {
			while ($rows = mysqli_fetch_array($exec)) {
			    
			    if (password_verify($password,$rows['password'])) {
			    	$_SESSION['role_user'] 	= $rows['role'];
			    	$_SESSION['auth']		= $rows['id_daftar'];

			    	
			    	echo'<script> window.location="dashboard/index.php"; </script> ';

			    }else{
			    	echo 'Password Salah!';
			    }

			}
		}else{

			$query	=	"SELECT password,role_user,id from akun 
				WHERE email='$email'";

			$exec 	= mysqli_query($conn, $query);

			if ($exec) {
				if (mysqli_num_rows($exec) > 0) {
					while ($rows = mysqli_fetch_array($exec)) {
					    
					    if (password_verify($password,$rows['password'])) {
					    	$_SESSION['role_user'] 	= $rows['role_user'];
					    	$_SESSION['auth']		= $rows['id'];

					    	echo'<script> window.location="dashboard/index.php"; </script> ';

					    }else{
					    	echo 'Password Salah!';
					    }

					}
				}else{
					echo 'Tidak ada user terdaftar';
				}
			}else{
				
				$exec 	= mysqli_query($conn, $query);

				
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

    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto">
            <h1 class="text-center login-title mt-5 mb-5">Pendaftaran Siswa Baru</h1>
                <div class="card">
                    <div class="card-header" style="font-weight: 600;">Masuk</div>
                        <div class="card-body card-block">
                            <form action="" method="post" class="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-asterisk"></i>
                                        </div>
                                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button name="submit" type="submit" class="btn btn-success btn-sm">Masuk</button>
                                    <a href="#" class="pull-right need-help">Butuh bantuan? </a><span class="clearfix"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <h4 class="text-center" style="font-weight: 500;">Daftar Jika Belum Punya Akun <a href="../aaa/daftar_akun.php">Daftar disini!</a></h4>
                </div>
            </div>
        </div>    
    </div>

<?php
    include 'assets/footer.php';
?>