<?php  
    //start the session
    session_start();

    if (!isset($_SESSION)) {
        echo 'ada';
        exit();
        //echo'<script> window.location="index.php"; </script> ';
    }

    $_SESSION['data_ortu_exist'] = "";
    $_SESSION['data_alamat_exist'] = "";
    $_SESSION['data_siswa_exist'] = "";
    $_SESSION['data_akun_exist'] = "";

    if(isset($_POST['submit'])){
        foreach ($_POST as $key => $val) {
            ${$key} = $val;
            $_SESSION[''.$key.''] = $val;
        }

        if (!empty($_SESSION)) {
            echo'<script> window.location="daftar_orang_tua.php"; </script> ';
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

<div class="container-fluid">
    <div class="row">
        <div class="col col-md-12">
            <h1 class="login-title m-t-30 m-b-30">Syarat Pendaftaran</h1>
            <div class="alert alert-warning p-l-50" role="alert">
                <h4 class="alert-heading">Berikut adalah syarat pendaftaran siswa baru yang harus dipenuhi :</h4>
                <ol class="m-l-30 m-t-20">
                    <li><font color="#2ecc71">Mengisi Formulir Pendaftaran <i class="fa fa-check"></font></i></li>
                    <li>Fotocopy Akte kelahiran dan kartu keluarga 2 lembar</li>
                    <li>Foto Calon Siswa 2R</li>
                </ol>                        
                <hr>
                <p class="mb-0" style="font-style: italic; font-weight: 600">*Catatan : Pengembalian Formulir berikut persyaratannya paling lambar 2 minggu setelah pengisian formulir secara online</p>
            </div>
        </div>
        <div class="col col-md-12">
            <h1 class="login-title m-t-30 m-b-30">Data Pendaftar</h1>
            <p class="text-danger m-b-10">
                <strong>Periksa Data Anda, Dan Pastikan Data Sudah Benar</strong>
            </p>
        </div>
        <div class="col-lg-6">
            <div class="table-responsive table--no-card m-b-30">
                <div class="card-header bg-dark">
                    <p style="font-weight: 600; color:azure; height:40px; font-size:25px;">Data Calon Siswa
                    <a href="daftar_calon_siswa.php" class="btn btn-primary pull-right " ><i class="fa fa-pencil"></i> Edit Data</a>
                    </p>
                </div>
                <table class="table table-borderless table-striped table-earning">
                    <tbody>
                        <tr>
                            <td><b>Email</b></td>
                            <td>: <?php isset($_SESSION['email'])  ?  print($_SESSION['email']) : ""; ?> <a href="daftar_akun.php" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a></td>
                        </tr>
                        <tr>
                            <td><b>Nama Lengkap</b></td>
                            <td>: <?php isset($_SESSION['nl'])  ?  print($_SESSION['nl']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>Nama Panggilan</b></td>
                            <td>: <?php isset($_SESSION['np'])  ?  print($_SESSION['np']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>Tempat / Tanggal Lahir</b></td>
                            <td>: <?php isset($_SESSION['tl'])  ?  print($_SESSION['tl']) : ""; ?>, <?php isset($_SESSION['tgl'])  ?  print($_SESSION['tgl']) : "2009-01-01"; ?></td>
                        </tr>
                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td>: <?php isset($_SESSION['jk']) && $_SESSION['jk'] == "L" ? print("Laki-laki") : print("Perempuan") ?></td>
                        </tr>
                        
                        <tr>
                            <td><b>Anak Ke -</b></td>
                            <td>: <?php isset($_SESSION['anak'])  ?  print($_SESSION['anak']) : ""; ?> dari <?php isset($_SESSION['saudara'])  ?  print($_SESSION['saudara']) : ""; ?> bersaudara</td>
                        </tr>
                        
                        <tr>
                            <td><b>No Telepon Siswa</b></td>
                            <td>: <?php isset($_SESSION['ntlp'])  ?  print($_SESSION['ntlp']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>Alamat</b></td>
                            <td>: <?php isset($_SESSION['al'])  ?  print($_SESSION['al']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>RT / RW</b></td>
                            <td>: <?php isset($_SESSION['rt'])  ?  print($_SESSION['rt']) : ""; ?> / <?php isset($_SESSION['rw'])  ?  print($_SESSION['rw']) : ""; ?></td>
                        </tr>                       
                        <tr>
                            <td><b>Kelurahan / Kecamatan<b></td>
                            <td>: <?php isset($_SESSION['kl'])  ?  print($_SESSION['kl']) : ""; ?> / <?php isset($_SESSION['kc'])  ?  print($_SESSION['kc']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>Kota / Kabupaten<b></td>
                            <td>: <?php isset($_SESSION['kk'])  ?  print($_SESSION['kk']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>Provinsi<b></td>
                            <td>: <?php isset($_SESSION['pv'])  ?  print($_SESSION['pv']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>Kode Pos<b></td>
                            <td>: <?php isset($_SESSION['kp'])  ?  print($_SESSION['kp']) : ""; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="table-responsive table--no-card m-b-30">
                <div class="card-header bg-dark">
                    <p style="font-weight: 600; color:azure; height:40px; font-size:25px;">Data Orangtua
                    <a href="daftar_orang_tua.php" class="btn btn-primary pull-right " ><i class="fa fa-pencil"></i> Edit Data</a>
                    </p>
                </div>
                <table class="table table-borderless table-striped table-earning">
                    <tbody>
                        <tr>
                            <td><b>Nama Ayah</b></td>
                            <td>: <?php isset($_SESSION['n_ayah'])  ?  print($_SESSION['n_ayah']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>Tempat / Tanggal Lahir</b></td>
                            <td>: <?php isset($_SESSION['tl_ayah'])  ?  print($_SESSION['tl_ayah']) : ""; ?>, <?php isset($_SESSION['tgl_ayah'])  ?  print($_SESSION['tgl_ayah']) : print("1990-01-01"); ?></td>
                        </tr>
                        <tr>
                            <td><b>Pendidikan Terakhir</b></td>
                            <td>: <?php isset($_SESSION['pd_ayah'])  ?  print($_SESSION['pd_ayah']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>Pekerjaan</b></td>
                            <td>: <?php isset($_SESSION['pk_ayah'])  ?  print($_SESSION['pk_ayah']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>Agama</b></td>
                            <td>: <?php isset($_SESSION['agama_ayah'])  ?  print($_SESSION['agama_ayah']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>Telepon</b></td>
                            <td>: <?php isset($_SESSION['ntlp_ayah'])  ?  print($_SESSION['ntlp_ayah']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><b>Nama Ibu</b></td>
                            <td>: <?php isset($_SESSION['n_ibu'])  ?  print($_SESSION['n_ibu']) : ""; ?></td>
                        </tr>
                        
                        <tr>
                            <td><b>Tempat / Tanggal Lahir</b></td>
                            <td>: <?php isset($_SESSION['tl_ibu'])  ?  print($_SESSION['tl_ibu']) : ""; ?>, <?php isset($_SESSION['tgl_ibu'])  ?  print($_SESSION['tgl_ibu']) : print("1990-01-01"); ?></td>
                        </tr>
                        <tr>
                            <td><b>Pendidikan Terakhir</b></td>
                            <td>: <?php isset($_SESSION['pd_ibu'])  ?  print($_SESSION['pd_ibu']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>Pekerjaan</b></td>
                            <td>: <?php isset($_SESSION['pk_ibu'])  ?  print($_SESSION['pk_ibu']) : ""; ?></td>
                        </tr>                       
                        <tr>
                            <td><b>Agama<b></td>
                            <td>: <?php isset($_SESSION['agama_ibu'])  ?  print($_SESSION['agama_ibu']) : ""; ?></td>
                        </tr>
                        <tr>
                            <td><b>Telepon<b></td>
                            <td>: <?php isset($_SESSION['ntlp_ibu'])  ?  print($_SESSION['ntlp_ibu']) : ""; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col col-md-6">
            <div class="alert alert-danger text-md-center" role="alert" style="height: 65px; padding-top:20px;">
                <strong>CATATAN:</strong> Field Harus Disi Untuk Kelengkapan Data Calon Siswa
            </div>
        </div>
        <div class="col col-md-6">
            <div class="alert alert-warning" role="alert" style="height: 65px; padding-top:20px;">
                <strong>Anda Yakin Data Diatas Sudah Benar?</strong>
                <a href="proses_simpan_pendaftaran.php" class="btn btn-primary pull-right" style="margin-top: -8px;">Yakin, kirim data pendaftaran</a>
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