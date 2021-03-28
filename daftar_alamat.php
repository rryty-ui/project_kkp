<?php  
	//start the session
	session_start();

    include 'koneksi/koneksi.php';

    $redirect = "";
    
    if (isset($_SESSION['data_alamat_exist'])) {
        $redirect = "<script> window.location='daftar_syarat.php'; </script>";
    }else{
        $redirect = "<script> window.location='daftar_orang_tua.php'; </script>";
    }

    if(isset($_POST['submit'])){
        foreach ($_POST as $key => $val) {
            ${$key} = $val;
            $_SESSION[''.$key.''] = $val;
        }

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

    <style>
        body {
            background-color: hsl(220, 7.69%, 92.35%);
        }
    </style>
    
</head>

<body class="animsition">

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <h1 class="login-title m-t-30 m-b-30" style="text-align:center;">Data Alamat Calon Siswa</h1>
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
                                <label for="text-input" class=" form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="al" placeholder="Alamat" class="form-control" value="<?php isset($_SESSION['al'])  ?  print($_SESSION['al']) : ""; ?>" autofocus required>
                                <small class="form-text text-danger" style="font-weight: 600;">Cukup Dituliskan Nama Jalan </small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-1">
                                <label for="text-input" class=" form-control-label">RT</label>
                            </div>
                            <div class="col col-md-5">
                                <input type="text" name="rt" class="form-control" placeholder="RT" value="<?php isset($_SESSION['rt'])  ?  print($_SESSION['rt']) : ""; ?>" required>
                            </div>
                            <div class="col col-md-1">
                                <label for="text-input" class=" form-control-label">RW</label>
                            </div>
                            <div class="col col-md-5">                                
                                <input type="text" name="rw" class="form-control" placeholder="RW`" value="<?php isset($_SESSION['rw'])  ?  print($_SESSION['rw']) : ""; ?>" required>
                            </div>                          
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Kelurahan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="kl" placeholder="Kelurahan" class="form-control" value="<?php isset($_SESSION['kl'])  ?  print($_SESSION['kl']) : ""; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Kecamatan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="kc" placeholder="Kecamatan" class="form-control" value="<?php isset($_SESSION['kc'])  ?  print($_SESSION['kc']) : ""; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Kota/Kabupaten</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="kk" placeholder="Kota/Kabupaten" class="form-control" value="<?php isset($_SESSION['kk'])  ?  print($_SESSION['kk']) : ""; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Provinsi</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="pv" placeholder="Provinsi" class="form-control" value="<?php isset($_SESSION['pv'])  ?  print($_SESSION['pv']) : ""; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Kode Pos</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" name="kp" placeholder="Kode Pos" class="form-control" value="<?php isset($_SESSION['kp'])  ?  print($_SESSION['kp']) : ""; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Jarak Ke Sekolah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" name="jks" class="form-control" value="<?php isset($_SESSION['jks'])  ?  print($_SESSION['jks']) : ""; ?>" required>
                                <small class="form-text text-danger" style="font-weight: 600;">Dalam Satuan Kilometer / Km</small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Transportasi Yang Digunakan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="transport" id="select" class="form-control" required>
                                    <option value="" disabled selected>Pilih Transportasi</option>
                                    <option value="T_Umum" <?php isset($_SESSION['transport']) && $_SESSION['transport'] == "T_Umum" ? print("selected") : "" ?>>Transportasi Umum</option>
                                    <option value="Kereta" <?php isset($_SESSION['transport']) && $_SESSION['transport'] == "Kereta" ? print("selected") : "" ?>>Kereta</option>
                                    <option value="Sepedah" <?php isset($_SESSION['transport']) && $_SESSION['transport'] == "Sepedah" ? print("selected") : "" ?>>Sepedah</option>
                                    <option value="Motor" <?php isset($_SESSION['transport']) && $_SESSION['transport'] == "Motor" ? print("selected") : "" ?>>Motor</option>
                                    <option value="Mobil" <?php isset($_SESSION['transport']) && $_SESSION['transport'] == "Mobil" ? print("selected") : "" ?>>Mobil</option>
                                    <option value="Lain-lain" <?php isset($_SESSION['transport']) && $_SESSION['transport'] == "Lain-lain" ? print("selected") : "" ?>>Lain-lain</option>
                                </select>
                            </div>
                        </div>                        
                        <?php  
                            if (isset($_SESSION['data_alamat_exist'])) {
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