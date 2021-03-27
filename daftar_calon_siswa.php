<?php  
	//start the session
	session_start();

    include 'koneksi/koneksi.php';

    $query = mysqli_query($conn, "SELECT max(no_pendaftaran) as pendaftrar FROM pendaftaran");
    $data = mysqli_fetch_array($query);
    $pendaftar = $data['pendaftar'];

    $urutan = (int) substr($pendaftar, 3, 3);
    $urutan++;

    $huruf = "PSB";
    $pendaftar = $huruf . sprintf("%03s", $urutan);

	$redirect = "";

	if (isset($_SESSION['is_data_student_exist'])) {
		$redirect = "<script> window.location='daftar_syarat.php'; </script>";
	}else{
		$redirect = "<script> window.location='daftar_alamat.php'; </script>";
	}

	//check if button next is clicked
	if(isset($_POST['submit'])){

		//set all name attr and value to created variable
		foreach ($_POST as $key => $val) {
			${$key} = $val;
			$_SESSION[''.$key.''] = $val;
		}

		//check if session is not empty, then redirect to daftar_data_orangtua.php
		if (!empty($_SESSION)) {
			echo $redirect;
			print_r($_SESSION);
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
        <div class="col-lg-6 m-auto">
            <h1 class="login-title m-t-30 m-b-30" style="text-align:center;">Data Calon Siswa</h1>
        </div>
        <div class="col-lg-7 m-auto">
            <div class="card">
                <div class="card-header">
                <p class="text-danger" style="font-weight: 600;">Isi Form pendaftaran dengan benar!</p>
                </div>
                <div class="card-body card-block">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="disabled-input" class=" form-control-label">No Pendaftaran</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="id" name="id" placeholder="Disabled" disabled="" class="form-control" value="<?php echo $pendaftar; ?>" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama Lengkap</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nl" placeholder="Nama Lengkap" class="form-control" value="<?php isset($_SESSION['nl'])  ?  print($_SESSION['nl']) : ""; ?>" autofocus required>
                                <small class="form-text text-danger" style="font-weight: 600;">Sesuai akte kelahiran / ijazah</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama Panggilan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="np" placeholder="Nama Panggilan" class="form-control" value="<?php isset($_SESSION['np'])  ?  print($_SESSION['np']) : ""; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">NIK Siswa</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="nik" placeholder="Nomor Induk Keluarga" class="form-control" value="<?php isset($_SESSION['nik'])  ?  print($_SESSION['nik']) : ""; ?>" required>
                                <small class="form-text text-danger" style="font-weight: 600;">Sesuai akte kelahiran</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Jenis Kelamin</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="jk" id="select" class="form-control" required>
                                    <option value="" disabled selected>Jenis Kelamin</option>
                                    <option value="L" <?php isset($_SESSION['jk']) && $_SESSION['jk'] == "L" ? print("selected") : "" ?>>Laki-laki</option>
                                    <option value="P" <?php isset($_SESSION['jk']) && $_SESSION['jk'] == "P" ? print("selected") : "" ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tempat Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="tl" placeholder="Tempat Lahir" class="form-control" value="<?php isset($_SESSION['tl'])  ?  print($_SESSION['tl']) : ""; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" name="tgl" placeholder="Tanggal Lahir" class="form-control" value="<?php isset($_SESSION['tgl'])  ?  print($_SESSION['tgl']) : print("2000-01-01"); ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Agama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="agama" placeholder="Agama yang dianut" class="form-control" value="<?php isset($_SESSION['agama'])  ?  print($_SESSION['agama']) : ""; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-6">
                                <label for="text-input" class=" form-control-label">Anak Ke-</label>
                                <input type="number" name="anak" class="form-control" value="<?php isset($_SESSION['anak'])  ?  print($_SESSION['anak']) : ""; ?>" required>
                            </div>
                            <div class="col col-md-6">
                                <label for="text-input" class=" form-control-label">Jumlah Saudara Kandung</label>
                                <input type="number" name="saudara" class="form-control" value="<?php isset($_SESSION['saudara'])  ?  print($_SESSION['saudara']) : ""; ?>" required>
                            </div>                            
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-6">
                                <label for="text-input" class=" form-control-label">Tinggi Badan</label>
                                <input type="number" name="tb" class="form-control" value="<?php isset($_SESSION['tb'])  ?  print($_SESSION['tb']) : ""; ?>" required>
                                <small class="form-text text-danger" style="font-weight: 600;">Dalam Centimeter / Cm</small>
                            </div>
                            <div class="col col-md-6">
                                <label for="text-input" class=" form-control-label">Berat Badan</label>
                                <input type="number" name="bb" class="form-control" value="<?php isset($_SESSION['bb'])  ?  print($_SESSION['bb']) : ""; ?>" required>
                                <small class="form-text text-danger" style="font-weight: 600;">Dalam Kilogram / Kg</small>
                            </div>                            
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">No Telepon Siswa</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="ntlp" placeholder="No Telp" class="form-control" value="<?php isset($_SESSION['ntlp'])  ?  print($_SESSION['ntlp']) : ""; ?>" >
                                <small class="form-text text-danger" style="font-weight: 600;">No Telepon Yang Dapat Dihubungi</small>
                            </div>
                        </div>
                        <?php  
                            if (isset($_SESSION['is_data_student_exist'])) {
                            ?>
                            <button type="submit" name="submit" class="btn btn-primary pull-right">Kembali 
                            <i class="fa fa-arrow-right"></i></button>
                            <?php
                            }else{
                            ?>
								<div class="form-actions form-group">
                                    <button name="submit" type="submit" class="btn btn-success btn-sm pull-right">Lanjut</button>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="clearfix"></div>
                    </form>
                </div>
            </div>                
            <div class="alert alert-danger" role="alert">
                <strong>CATATAN:</strong> Field Harus Disi Untuk Kelengkapan Data Calon Siswa
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