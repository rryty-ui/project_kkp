<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='col-md-12'>
            <div class='sufee-alert alert with-close alert-primary alert-dismissible fade show'>
            <span class='badge badge-pill badge-primary'><strong> Berhasil! </strong></span>&emsp;Konfirmasi Pendaftaran<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span></button></div>";
    }
?>

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <strong class="card-title" style="margin-right: 50px; margin-top: 50px;">
                        <h1>Konfirmasi Pendaftaran</h1></strong><br>
                        <h5 class="alert-heading"><b>Lakukan konfirmasi pendaftaran calon siswa</b></h5>
                    </div>
                    <div class="card-body">
                        <h4><b>Data Siswa :</b></h4>
                        <hr>
                        <ol style="font-size:14px;">
                        <div class="table-responsive table-data">
                            <table class="table table-borderless table-earning" style="word-wrap: break-word;">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">No</th>
                                        <th style="text-align:center;">Nama</th>
                                        <th style="text-align:center;">Email</th>
                                        <th style="text-align:center;">Status</th>
                                        <th style="text-align:center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="text-transform: uppercase; font-weight: 500;" >
                                <?php  
                                    $query 	= "SELECT a.nama, a.id as id_daftar, b.id as id_akun,b.email,c.* 
                                            FROM pendaftaran a, akun b, detail_pendaftaran c 
                                            WHERE a.id=b.id_user
                                            AND b.role_user=1 
                                            AND c.id_user = a.id
                                            AND a.upload_akte != '' 
                                            AND a.upload_kartu_keluarga != '' 
                                            AND a.foto_anak != ''";

                                    $exec 	=	mysqli_query($conn, $query);

                                    if ($exec) {
                                        $total	= mysqli_num_rows($exec);
                                        if ($total > 0) {
                                            while ($rows = mysqli_fetch_array($exec)) {
                                                
                                                $status = $rows['status_pendaftaran'];

                                        
                                ?>
                                    <tr>
                                        <td><?php echo ++$no; ?></td>
										<td><?php echo $rows['nama']; ?></td>
										<td><?php echo $rows['email']; ?></td>
										<td><?php 
										$status == 0 ? 
										print("<font color='#e74c3c'>Belum dikonfirmasi</font>") : 
										print("<font color='##2ecc71'>Sudah dikonfirmasi</font>"); 
										?></td>
										<td>
											<!-- <a href="" class="btn btn-primary btn-sm">Konfirmasi</a> -->
											<a href="include/proses_konfirmasi_pendaftaran.php?ida=<?php echo $rows['id_akun'] ?>&idd=<?php echo $rows['id_daftar'] ?>&idu=<?php echo $Id ?>" class="btn btn-warning btn-sm">Konfirmasi</a>
										</td>
                                    </tr>
                                <?php
                                            }
                                        }else{
                                            echo "<td colspan='5' align='center'><h4>Belum ada siswa daftar</h4></td>";
                                        }
                                    }else{
                                        echo mysqli_error($conn);
                                    }
                                ?>    
                                </tbody>
                            </table>
                        </div>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  

unset($_SESSION['message']);

?>