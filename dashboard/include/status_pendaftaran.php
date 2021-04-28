<?php 

include '../../koneksi/koneksi.php';

$queryx     =   "SELECT * FROM detail_pendaftaran WHERE id_user = $id";
$execx      =   mysqli_query($conn, $queryx);

if($execx){
    $daftar = mysqli_fetch_array($execx);

}else{
    echo 'gagal';
}	

$idetail 	=	$daftar['Id'];

$query = "SELECT status_test FROM detail_pendaftaran WHERE id = $id";
$result = mysqli_query($conn, $query);

while($rows=mysqli_fetch_assoc($result))
{
    $status = $rows['status_test'];
}

?>

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <strong class="card-title" style="margin-right: 50px; margin-top: 50px;">
                        <h1>Status Pendaftaran</h1></strong>
                    </div>
                    <?php if ($daftar['status_pendaftaran'] == 1) {
                    ?>
                        <div class="card-body">
                        <h4><b>Data Siswa :</b></h4>
                        <hr>
                        <table class="table table-borderless table-striped table-earning" style="table-layout:fixed; word-wrap:break-word;">
                            <tbody>
                                <tr>
                                    <td><b>No Peserta<b></td>
                                    <td>: <?php echo $no_pendaftaran; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama Lengkap</b></td>
                                    <td>: <?php echo $nama; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama Panggilan</b></td>
                                    <td>: <?php echo $nama_panggilan; ?></td>
                                </tr>
                                    <td><b>Email</b></td>
                                    <td>: <?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tempat / Tanggal Lahir</b></td>
                                    <td>: <?php echo $tempat_lahir.", ".$tanggal_lahir; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td>: <?php echo $alamat; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Hasil Test</b></td>
                                    <td>
                                        <?php 
                                            if ($status == 0) {
                                                echo ': Verifikasi';
                                            } else if ($status == 1) {
                                                echo ': Lulus';
                                            } else {
                                                echo ': Tidak Lulus';
                                            }
										?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php 
                    } else {
                    ?>
                    <div class="card-body">
                        <h3>Anda belum melengkapi pendaftaran atau belom dikonfirmasi oleh admin, klik <a href="index.php?page=4">disini</a> untuk melengkapi atau melihat syarat daftar</h3>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>