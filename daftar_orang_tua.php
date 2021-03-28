<?php  
	//start the session
	session_start();

    include 'koneksi/koneksi.php';

    $redirect = "";
    
    if (isset($_SESSION['data_ortu_exist'])) {
        $redirect = "<script> window.location='daftar_syarat.php'; </script>";
    }else{
        $redirect = "<script> window.location='daftar_syarat.php'; </script>";
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
            <h1 class="login-title m-t-30 m-b-30" style="text-align:center;">Data Orangtua</h1>
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
                                <label for="disabled-input" class=" form-control-label"><strong>Data Ayah</strong></label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama Ayah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="n_ayah" placeholder="Nama Ayah" class="form-control" value="<?php isset($_SESSION['n_ayah'])  ?  print($_SESSION['n_ayah']) : ""; ?>" autofocus required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tempat Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="tl_ayah" placeholder="Tempat Lahir" class="form-control" value="<?php isset($_SESSION['tl_ayah'])  ?  print($_SESSION['tl_ayah']) : ""; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" name="tgl_ayah" placeholder="Tanggal Lahir" class="form-control" value="<?php isset($_SESSION['tgl_ayah'])  ?  print($_SESSION['tgl_ayah']) : print("1990-01-01"); ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Agama Ayah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="agama_ayah" id="select" class="form-control" required>
                                    <option value="" disabled selected>Pendidikan Terakhir Ibu</option>
                                    <option value="Islam" <?php isset($_SESSION['agama_ayah']) && $_SESSION['agama_ayah'] == "Islam" ? print("selected") : "" ?>>Islam</option>
                                    <option value="Kristen" <?php isset($_SESSION['agama_ayah']) && $_SESSION['agama_ayah'] == "Kristen" ? print("selected") : "" ?>>Kristen</option>
                                    <option value="Katolik" <?php isset($_SESSION['agama_ayah']) && $_SESSION['agama_ayah'] == "Katolik" ? print("selected") : "" ?>>Katolik</option>
                                    <option value="Buddha" <?php isset($_SESSION['agama_ayah']) && $_SESSION['agama_ayah'] == "Buddha" ? print("selected") : "" ?>>Buddha</option>
                                    <option value="Hindu" <?php isset($_SESSION['agama_ayah']) && $_SESSION['agama_ayah'] == "Hindu" ? print("selected") : "" ?>>Hindu</option>
                                    <option value="Konghucu" <?php isset($_SESSION['agama_ayah']) && $_SESSION['agama_ayah'] == "Konghucu" ? print("selected") : "" ?>>Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Pendidikan Ayah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="pd_ayah" id="select" class="form-control" required>
                                    <option value="" disabled selected>Pendidikan Terakhir Ayah</option>
                                    <option value="SD" <?php isset($_SESSION['pd_ayah']) && $_SESSION['pd_ayah'] == "SD" ? print("selected") : "" ?>>SD</option>
                                    <option value="SMP" <?php isset($_SESSION['pd_ayah']) && $_SESSION['pd_ayah'] == "SMP" ? print("selected") : "" ?>>SMP</option>
                                    <option value="SMA" <?php isset($_SESSION['pd_ayah']) && $_SESSION['pd_ayah'] == "SMA" ? print("selected") : "" ?>>SMA</option>
                                    <option value="Perguruan Tinggi" <?php isset($_SESSION['pd_ayah']) && $_SESSION['pd_ayah'] == "Perguruan Tinggi" ? print("selected") : "" ?>>Perguruan Tinggi</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Pekerjaan Ayah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="pk_ayah" id="select" class="form-control" required>
                                    <option value="" disabled selected>Pekerjaan Ayah</option>
                                    <option value="Tidak Bekerja" <?php isset($_SESSION['pk_ayah']) && $_SESSION['pk_ayah'] == "Tidak Bekerja" ? print("selected") : "" ?>>Tidak Bekerja</option>
                                    <option value="Pensiunan" <?php isset($_SESSION['pk_ayah']) && $_SESSION['pk_ayah'] == "Pensiunan" ? print("selected") : "" ?>>Pensiunan</option>
                                    <option value="PNS_S" <?php isset($_SESSION['pk_ayah']) && $_SESSION['pk_ayah'] == "PNS_S" ? print("selected") : "" ?>>PNS Selain "Guru, Dokter, dan Perawat"</option>
                                    <option value="PNS" <?php isset($_SESSION['pk_ayah']) && $_SESSION['pk_ayah'] == "PNS" ? print("selected") : "" ?>>PNS</option>
                                    <option value="TNI / Polri" <?php isset($_SESSION['pk_ayah']) && $_SESSION['pk_ayah'] == "TNI / Polri" ? print("selected") : "" ?>>TNI / Polri</option>
                                    <option value="Wiraswasta" <?php isset($_SESSION['pk_ayah']) && $_SESSION['pk_ayah'] == "Wiraswasta" ? print("selected") : "" ?>>Wiraswasta</option>
                                    <option value="Wirausaha" <?php isset($_SESSION['pk_ayah']) && $_SESSION['pk_ayah'] == "Wirausaha" ? print("selected") : "" ?>>Wirausaha</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Penghasilan Ayah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="pn_ayah" id="select" class="form-control" required>
                                    <option value="" disabled selected>Penghasilan Ayah</option>
                                    <option value="0 - 500rb" <?php isset($_SESSION['pn_ayah']) && $_SESSION['pn_ayah'] == "0 - 500rb" ? print("selected") : "" ?>>0 - 500rb</option>
                                    <option value="500rb - 1jt" <?php isset($_SESSION['pn_ayah']) && $_SESSION['pn_ayah'] == "500rb - 1jt" ? print("selected") : "" ?>>500rb - 1jt</option>
                                    <option value="1jt - 2jt" <?php isset($_SESSION['pn_ayah']) && $_SESSION['pn_ayah'] == "1jt - 2jt" ? print("selected") : "" ?>>1jt - 2jt</option>
                                    <option value="2jt - 3jt" <?php isset($_SESSION['pn_ayah']) && $_SESSION['pn_ayah'] == "2jt - 3jt" ? print("selected") : "" ?>>2jt - 3jt</option>
                                    <option value="3jt - 5jt" <?php isset($_SESSION['pn_ayah']) && $_SESSION['pn_ayah'] == "3jt - 5jt" ? print("selected") : "" ?>>3jt - 5jt</option>
                                    <option value="5jt - 10jt" <?php isset($_SESSION['pn_ayah']) && $_SESSION['pn_ayah'] == "5jt - 10jt" ? print("selected") : "" ?>>5jt - 10jt</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">No Telepon Ayah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="ntlp_ayah" placeholder="No Telp" class="form-control" value="<?php isset($_SESSION['ntlp_ayah'])  ?  print($_SESSION['ntlp_ayah']) : ""; ?>" >
                                <small class="form-text text-danger" style="font-weight: 600;">No Telepon Yang Dapat Dihubungi</small>
                            </div>
                        </div>

                        <hr style="width: 100%; border: 1px solid grey;">

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="disabled-input" class=" form-control-label"><strong>Data Ibu</strong></label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama Ibu</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="n_ibu" placeholder="Nama Ibu" class="form-control" value="<?php isset($_SESSION['n_ibu'])  ?  print($_SESSION['n_ibu']) : ""; ?>" autofocus required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tempat Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="tl_ibu" placeholder="Tempat Lahir" class="form-control" value="<?php isset($_SESSION['tl_ibu'])  ?  print($_SESSION['tl_ibu']) : ""; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" name="tgl_ibu" placeholder="Tanggal Lahir" class="form-control" value="<?php isset($_SESSION['tgl_ibu'])  ?  print($_SESSION['tgl_ibu']) : print("1990-01-01"); ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Agama Ibu</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="agama_ibu" id="select" class="form-control" required>
                                    <option value="" disabled selected>Pendidikan Terakhir Ibu</option>
                                    <option value="Islam" <?php isset($_SESSION['agama_ibu']) && $_SESSION['agama_ibu'] == "Islam" ? print("selected") : "" ?>>Islam</option>
                                    <option value="Kristen" <?php isset($_SESSION['agama_ibu']) && $_SESSION['agama_ibu'] == "Kristen" ? print("selected") : "" ?>>Kristen</option>
                                    <option value="Katolik" <?php isset($_SESSION['agama_ibu']) && $_SESSION['agama_ibu'] == "Katolik" ? print("selected") : "" ?>>Katolik</option>
                                    <option value="Buddha" <?php isset($_SESSION['agama_ibu']) && $_SESSION['agama_ibu'] == "Buddha" ? print("selected") : "" ?>>Buddha</option>
                                    <option value="Hindu" <?php isset($_SESSION['agama_ibu']) && $_SESSION['agama_ibu'] == "Hindu" ? print("selected") : "" ?>>Hindu</option>
                                    <option value="Konghucu" <?php isset($_SESSION['agama_ibu']) && $_SESSION['agama_ibu'] == "Konghucu" ? print("selected") : "" ?>>Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Pekerjaan Ibu</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="pk_ibu" id="select" class="form-control" required>
                                    <option value="" disabled selected>Pekerjaan Ibu</option>
                                    <option value="Tidak Bekerja" <?php isset($_SESSION['pk_ibu']) && $_SESSION['pk_ibu'] == "Tidak Bekerja" ? print("selected") : "" ?>>Tidak Bekerja</option>
                                    <option value="Pensiunan" <?php isset($_SESSION['pk_ibu']) && $_SESSION['pk_ibu'] == "Pensiunan" ? print("selected") : "" ?>>Pensiunan</option>
                                    <option value="PNS_S" <?php isset($_SESSION['pk_ibu']) && $_SESSION['pk_ibu'] == "PNS_S" ? print("selected") : "" ?>>PNS Selain "Guru, Dokter, dan Perawat"</option>
                                    <option value="PNS" <?php isset($_SESSION['pk_ibu']) && $_SESSION['pk_ibu'] == "PNS" ? print("selected") : "" ?>>PNS</option>
                                    <option value="TNI / Polri" <?php isset($_SESSION['pk_ibu']) && $_SESSION['pk_ibu'] == "TNI / Polri" ? print("selected") : "" ?>>TNI / Polri</option>
                                    <option value="Wiraswasta" <?php isset($_SESSION['pk_ibu']) && $_SESSION['pk_ibu'] == "Wiraswasta" ? print("selected") : "" ?>>Wiraswasta</option>
                                    <option value="Wirausaha" <?php isset($_SESSION['pk_ibu']) && $_SESSION['pk_ibu'] == "Wirausaha" ? print("selected") : "" ?>>Wirausaha</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Penghasilan Ibu</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="pn_ibu" id="select" class="form-control" required>
                                    <option value="" disabled selected>Penghasilan Ibu</option>
                                    <option value="0 - 500rb" <?php isset($_SESSION['pn_ibu']) && $_SESSION['pn_ibu'] == "0 - 500rb" ? print("selected") : "" ?>>0 - 500rb</option>
                                    <option value="500rb - 1jt" <?php isset($_SESSION['pn_ibu']) && $_SESSION['pn_ibu'] == "500rb - 1jt" ? print("selected") : "" ?>>500rb - 1jt</option>
                                    <option value="1jt - 2jt" <?php isset($_SESSION['pn_ibu']) && $_SESSION['pn_ibu'] == "1jt - 2jt" ? print("selected") : "" ?>>1jt - 2jt</option>
                                    <option value="2jt - 3jt" <?php isset($_SESSION['pn_ibu']) && $_SESSION['pn_ibu'] == "2jt - 3jt" ? print("selected") : "" ?>>2jt - 3jt</option>
                                    <option value="3jt - 5jt" <?php isset($_SESSION['pn_ibu']) && $_SESSION['pn_ibu'] == "3jt - 5jt" ? print("selected") : "" ?>>3jt - 5jt</option>
                                    <option value="5jt - 10jt" <?php isset($_SESSION['pn_ibu']) && $_SESSION['pn_ibu'] == "5jt - 10jt" ? print("selected") : "" ?>>5jt - 10jt</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">No Telepon Ibu</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="ntlp_ibu" placeholder="No Telp" class="form-control" value="<?php isset($_SESSION['ntlp_ibu'])  ?  print($_SESSION['ntlp_ibu']) : ""; ?>" >
                                <small class="form-text text-danger" style="font-weight: 600;">No Telepon Yang Dapat Dihubungi</small>
                            </div>
                        </div>
                        <?php  
                            if (isset($_SESSION['data_ortu_exist'])) {
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