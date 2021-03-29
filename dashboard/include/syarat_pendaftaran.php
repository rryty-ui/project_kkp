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
                echo "<div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Selamat!</strong> pendaftaran anda sudah dikonfirmasi Admin. Selanjutnya, cetak kwitansi pembayaran <a href='index.php?page=9'><u>di menu pembayaran</u></a>. dan lakukan konfirmasi pembayaran setelah melakukan pembayaran.
                </div>";

                // echo '<a href="../assets/uploads/kwitansi-pembayaran.jpeg" class="btn btn-primary btn-md pull-left" download><i class="fa fa-print"></i> Cetak biaya yang harus dibayar untuk pendaftaran</a>';

                // echo '<a href="#" class="btn btn-primary btn-md pull-left" download data-toggle="modal" data-target="#myModal"><i class="fa fa-print"></i> Cetak biaya yang harus dibayar untuk pendaftaran</a>';

                // echo '<br><br>';
            }else if ($daftar['status_pendaftaran'] == 2) {
                echo "<div class='alert alert-warning alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Anda sudah melakukan pembayaran</strong> 
                </div>";
            }else if($daftar['status_pendaftaran'] == 0){
                echo "<div class='alert alert-warning alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Persyaratan sudah lengkap. tunggu konfirmasi admin paling lambat 2 hari kerja</strong> 
                </div>";
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
                                        echo '<font color="#2ecc71">Fotocopy Akte kelahiran dan kartu keluarga 2 lembar<i class="fa fa-check"></i></font> <a href="index.php?page=5" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga"><i class="fa fa-pencil"></i></a>';
                                    }

                                    
                                }else{
                                    echo 'Fotocopy Akte kelahiran dan kartu keluarga 2 lembar <a href="index.php?page=5" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga"><i class="fa fa-upload" style: "font-family: Poppins;"> Upload </i></a>';
                                }

                                ?></li>
                            <li><?php
                                if ($foto_anak != "") {

                                    if ($daftar['status_pendaftaran'] == 1) {
                                        echo '<font color="#2ecc71">Foto Calon Siswa ukuran 2R<i class="fa fa-check"></i></font>';
                                    }else if($daftar['status_pendaftaran'] >= 2){
                                        echo '<font color="#2ecc71">Foto Calon Siswa ukuran 2R<i class="fa fa-check"></i></font>';
                                    }else{
                                        echo '<font color="#2ecc71">Foto Calon Siswa ukuran 2R<i class="fa fa-check"></i></font> <a href="index.php?page=6" class="btn btn-primary btn-sm" title="Upload Akte Kelahiran dan Kartu Keluarga"><i class="fa fa-pencil"></i></a>';
                                    }
                                    
                                }else{
                                    echo 'Calon Siswa ukuran 2R <a href="index.php?page=6" class="btn btn-primary btn-sm" title="Upload Foto Calon Siswa"><i class="fa fa-upload"> Upload </i></a>';
                                }

                                ?></li>
                        </ol>                        
                        <hr>
                        <p class="mb-0" style="font-style: italic; font-weight: 600; text-transform: uppercase;">*Catatan : Konfirmasi admin paling lambat 2 hari kerja untuk konfirmasi file. "Jika sudah dikonfirmasi akan ada tanda centang di syarat pendaftaran yang harus dipenuhi."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>