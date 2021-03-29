<?php  

    $queryx     =   "SELECT * FROM detail_pendaftaran WHERE id_user = $id";
    $execx      =   mysqli_query($conn, $queryx);
    if($execx){
        $daftar = mysqli_fetch_array($execx);

    }else{
        echo 'gagal';
    }	

?>

<div class="section__content section__content--p30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <strong class="card-title">
                        <h1>Rincian Biaya Pembayaran Sekolah</h1></strong>
                    </div>
                    <div class="card-body">
                        <h4><b>Print Kwitansi biaya pendaftaran yang harus dibayarkan. Ketentuan setelah pembayaran sebagai berikut:</b></h4>
                        <hr>
                        <ol style="margin-top:-10px; margin-left:20px;">
                            <li>Siswa berusia 5-6 tahun 6 bulan, akan masuk ke dalam kelas A, sedangkan Siswa berusia lebih dari 6 tahun 6 bulan akan masuk ke dalam kelas B</li>
                            <li>Perhitunag Usia akan di hitung otomatis oleh sistem, tegantung dari usia yang telah diinputkan dalam form pendaftaran siswa secara online sebelumnya oleh pendaftar</li>
                        </ol>
                        <hr>

                        <h4><b>Biaya yang harus dibayarkan tegantung dari jenis kelasnya (A/B), kententuan sebagai berikut: </b></h4>
                        <hr>
                        <ol style="margin-left: 20px;">
                            <li style="margin-bottom: 20px;"><b>Kelas A : </b></li>
                            <table class="table table-borderless table-striped table-earning" style="table-layout:fixed; word-wrap:break-word;">
                                <thead>
                                    <tr>
                                        <th>Jenis Pengeluaran</th>
                                        <th align="right">Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Uang pangkal gedung</td>
                                        <td align="right">350.000</td>
                                    </tr>
                                    <tr>
                                        <td>Uang Administrasi dan Seragam 5 Hari</td>
                                        <td align="right">445.000</td>
                                    </tr>
                                    <tr>
                                        <td>Uang pembayaran bulan 1 (pertama)</td>
                                        <td align="right">85.000</td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>Total</b></td>
                                        <td align="right"><b>Rp.880.000</b></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <li style="margin-bottom: 20px; margin-top:20px;"><b>Kelas B : </b></li>
                            <table class="table table-borderless table-striped table-earning" style="table-layout:fixed; word-wrap:break-word;">
                                <thead>
                                    <tr>
                                        <th>Jenis Pengeluaran</th>
                                        <th align="right">Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Uang pangkal gedung</td>
                                        <td align="right">350.000</td>
                                    </tr>
                                    <tr>
                                        <td>Uang Administrasi dan Seragam 5 Hari</td>
                                        <td align="right">445.000</td>
                                    </tr>
                                    <tr>
                                        <td>Uang pembayaran bulan 1 (pertama)</td>
                                        <td align="right">100.000</td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>Total</b></td>
                                        <td align="right"><b>Rp.895.000</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
