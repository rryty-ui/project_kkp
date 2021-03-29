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

<?php
    include 'assets/header.php';
?>

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
                                    <label for="text-input" class=" form-control-label">Kota / Kabupaten</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="kk" placeholder="Kota / Kabupaten" class="form-control" value="<?php isset($_SESSION['kk'])  ?  print($_SESSION['kk']) : ""; ?>" required>
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
                                        <option value="Transportasi Umum" <?php isset($_SESSION['transport']) && $_SESSION['transport'] == "Transportasi Umum" ? print("selected") : "" ?>>Transportasi Umum</option>
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
    
<?php 
    include 'assets/footer.php'; 
?>