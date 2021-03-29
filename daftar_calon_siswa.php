<?php  
	//start the session
	session_start();

    include 'koneksi/koneksi.php';

    $query = mysqli_query($conn, "SELECT max(no_pendaftaran) as pendaftar FROM pendaftaran");
    $data = mysqli_fetch_array($query);
    $pendaftar = $data['pendaftar'];

    $urutan = (int) substr($pendaftar, 3, 3);
    $urutan++;

    $huruf = "PSB";
    $pendaftar = $huruf . sprintf("%03s", $urutan);
    $_SESSION['daftar'] = $pendaftar;

	$redirect = "";

	if (isset($_SESSION['data_siswa_exist'])) {
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

<?php
    include 'assets/header.php';
?>

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
                                    <input type="text" name="no_pendaftaran" placeholder="Disabled" disabled="" class="form-control" value="<?php isset($_SESSION['daftar'])  ?  print($_SESSION['daftar']) : ""; ?>" readonly>
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
                                    <label for="select" class=" form-control-label">Agama</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="agama" id="select" class="form-control" required>
                                        <option value="" disabled selected>Agama</option>
                                        <option value="Islam" <?php isset($_SESSION['agama']) && $_SESSION['agama'] == "Islam" ? print("selected") : "" ?>>Islam</option>
                                        <option value="Kristen" <?php isset($_SESSION['agama']) && $_SESSION['agama'] == "Kristen" ? print("selected") : "" ?>>Kristen</option>
                                        <option value="Katolik" <?php isset($_SESSION['agama']) && $_SESSION['agama'] == "Katolik" ? print("selected") : "" ?>>Katolik</option>
                                        <option value="Buddha" <?php isset($_SESSION['agama']) && $_SESSION['agama'] == "Buddha" ? print("selected") : "" ?>>Buddha</option>
                                        <option value="Hindu" <?php isset($_SESSION['agama']) && $_SESSION['agama'] == "Hindu" ? print("selected") : "" ?>>Hindu</option>
                                        <option value="Konghucu" <?php isset($_SESSION['agama']) && $_SESSION['agama'] == "Konghucu" ? print("selected") : "" ?>>Konghucu</option>
                                    </select>
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
                                if (isset($_SESSION['data_siswa_exist'])) {
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