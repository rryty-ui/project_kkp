<?php  
    if ($upload_akte != "" && $upload_kartu_keluarga != "" && $foto_anak != "") {
            $queryx     =   "SELECT * FROM detail_pendaftaran WHERE id_user = $id";
            $execx      =   mysqli_query($conn, $queryx);
            if($execx){
                $daftar = mysqli_fetch_array($execx);

            }else{
                echo 'gagal';
            }

            if ($daftar['status_pendaftaran'] == 1) {
                echo "<div class='col-md-12'>
                        <div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
                        <span class='badge badge-pill badge-success'><strong> Selamat! </strong></span>&emsp;pendaftaran anda sudah dikonfirmasi Admin. Selanjutnya, cetak kartu ujian <a href='index.php?page=9'><u>di menu cetak kartu ujian</u></a><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";

                // echo '<a href="../assets/uploads/kwitansi-pembayaran.jpeg" class="btn btn-primary btn-md pull-left" download><i class="fa fa-print"></i> Cetak biaya yang harus dibayar untuk pendaftaran</a>';

                // echo '<a href="#" class="btn btn-primary btn-md pull-left" download data-toggle="modal" data-target="#myModal"><i class="fa fa-print"></i> Cetak biaya yang harus dibayar untuk pendaftaran</a>';

                // echo '<br><br>';
            }else if ($daftar['status_pendaftaran'] == 2) {
                echo "<div class='col-md-12'>
                        <div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'><strong>Anda Sudah Melakukan Pembayaran</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";

            }else if($daftar['status_pendaftaran'] == 0){
                echo "<div class='col-md-12'>
                        <div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'><strong>Persyaratan sudah lengkap. tunggu konfirmasi admin paling lambat 2 hari kerja</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";
            }
        
    }
?>

<div class="section__content section__content--p30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <strong class="card-title">
                        <h1>Syarat Pendaftaran</h1></strong>
                    </div>
                    <div class="card-body">
                        <h4 class="alert-heading">Berikut adalah syarat pendaftaran siswa baru yang harus dipenuhi : </h4>
                        <ol class="m-l-30 m-t-20">
                            <li><font color="#2ecc71">Mengisi Formulir Pendaftaran <i class="fa fa-check"></font></i></li>
                            <li><?php 
                                if ($upload_akte != "" && $upload_kartu_keluarga != "") {

                                    if ($daftar['status_pendaftaran'] == 1) {
                                        echo '<font color="#2ecc71">Fotocopy Akte kelahiran dan kartu keluarga 2 lembar<i class="fa fa-check"></i></font>';
                                    }else if($daftar['status_pendaftaran'] >= 2){
                                        echo '<font color="#2ecc71">Fotocopy Akte kelahiran dan kartu keluarga 2 lembar<i class="fa fa-check"></i></font>';
                                    }else{
                                        echo '<font color="#2ecc71">Fotocopy Akte kelahiran dan kartu keluarga 2 lembar<i class="fa fa-check"></i></font> <a href="index.php?page=5" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga" style=" margin-left: 10px; font-family: Poppins;">Edit</a>';
                                    }

                                    
                                }else{
                                    echo 'Fotocopy Akte kelahiran dan kartu keluarga 2 lembar <a href="index.php?page=5" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga" style=" margin-left: 10px; font-family: Poppins;">Upload</a>';
                                }

                                ?></li>
                            <li><?php
                                if ($foto_anak != "") {

                                    if ($daftar['status_pendaftaran'] == 1) {
                                        echo '<font color="#2ecc71">Foto Calon Siswa ukuran 2R<i class="fa fa-check"></i></font>';
                                    }else if($daftar['status_pendaftaran'] >= 2){
                                        echo '<font color="#2ecc71">Foto Calon Siswa ukuran 2R<i class="fa fa-check"></i></font>';
                                    }else{
                                        echo '<font color="#2ecc71">Foto Calon Siswa ukuran 2R<i class="fa fa-check"></i></font> <a href="index.php?page=6" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga" style=" margin-left: 10px; font-family: Poppins;">Edit</a>';
                                    }
                                    
                                }else{
                                    echo 'Calon Siswa ukuran 2R <a href="index.php?page=6" class="btn btn-primary btn-sm" title="Upload Foto Calon Siswa" style=" margin-left: 10px; font-family: Poppins;">Upload</a>';
                                }

                                ?></li>
                        </ol>                        
                        <hr>
                        <p class="mb-0 text-danger" style="font-style: italic; font-weight: 700; text-transform: uppercase;">*Catatan&ensp;:&ensp;Konfirmasi admin paling lambat 2 hari kerja untuk konfirmasi file.&ensp;"Jika sudah dikonfirmasi akan ada tanda centang di syarat pendaftaran yang harus dipenuhi."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>