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
                    <div class="card-header" style="display: flex;">
                        <strong class="card-title">
                        <h1>Rincian Biaya Pembayaran Sekolah</h1></strong>
                        <a href="include/cetak_jadwal_user.php?id=<?php echo $id ?>" style="margin-left:auto;" class="btn btn-primary">
                            <h5 style="margin-top: 10px; color: white;"><i class="fas fa-print"></i> Cetak Rincian Pembayaran</h5>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4><b>Keterangan :</b></h4>
                        <hr>
                        <ol style="margin-top:-10px; margin-left:20px;">
                            <li><i class="text-danger" style="text-transform: uppercase; font-weight:700;">&emsp;Biaya Pendaftaran Murid Sebesar Rp. 200.000</i></li>
                            <li>&emsp;Pembayaran biaya sekolah dapat dibayarkan secara lunas / bertahap (dicicil) <br>
                                &emsp; - Tahap 1 : &ensp; 50% uang pangkal ditambah semua biaya lainnya <br>
                                &emsp;&emsp;(Pelunasan Cicilan Tahap 1 Paling Lambat bulan Mei <?php echo date("Y"); ?> ) <br> &emsp; - Tahap 2 : &ensp; Sisa 50% uang pangkal dapat dilunasi sepanjang semester 1
                            </li>
                            <li>&emsp;Pembayaran dapat dilakukan secara tunai atau melalui transfer rekening bank yang telah ditentukan sekolah</li>
                            <li><i class="text-danger" style="text-transform: uppercase; font-weight:700;">&emsp;uang yang sudah dibayarkan tidak dapat ditarik kembali dengan alasan apapun</i></li>
                            <li>&emsp;Murid akan terdaftar sebagai siswa SMP Citra indonesia apabila sudah melakukan pendaftaran <br> &emsp; dan sudah melakukan pembayaran biaya sekolah minimal tahap 1</li>
                        </ol>
                        <hr>

                        <h4><b>Biaya Sekolah :</b></h4>
                        <hr>
                        <ol style="margin-left: 20px;">
                            <table class="table border border-secondary table-striped table-earning" style="table-layout:fixed; word-wrap:break-word;">
                                <thead>
                                    <tr>
                                        <th>Jenis Pengeluaran</th>
                                        <th align="right">Biaya</th>
                                    </tr>
                                </thead>
                                <tbody style="text-transform: uppercase; font-weight: 500;">
                                    <tr>
                                        <td>Uang pangkal</td>
                                        <td align="right">17.000.000</td>
                                    </tr>
                                    <tr>
                                        <td>SPP Bulanan</td>
                                        <td align="right">1.200.000</td>
                                    </tr>
                                    <tr>
                                        <td>Seragam</td>
                                        <td align="right">1.100.000</td>
                                    </tr>
                                    <tr>
                                        <td>Worksheet, Modul dan Buku Paket</td>
                                        <td align="right">1.000.000</td>
                                    </tr>
                                    <tr>
                                        <td>Internet dan Komite</td>
                                        <td align="right">350.000</td>
                                    </tr>
                                    <tr>
                                        <td>Buku Tulis dan Agenda</td>
                                        <td align="right">250.000</td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>Total</b></td>
                                        <td align="right"><b>Rp.&ensp;20.900.000</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </ol>
                        <h4 style="margin-left: 22px;"><b>Diskon Uang Pangkal :</b></h4>
                        <hr>
                        <ol style="margin-top:-10px; margin-left:70px;">
                            <li>&ensp; Tahap 1 : &ensp;(Okt.&ensp;-&ensp;Des. <?php echo date("Y"); ?>)&ensp;=&ensp;Disk. Uang Pangkal 20%</li>
                            <li>&ensp; Tahap 2 : &ensp;(Jan.&ensp;-&ensp;Feb. <?php echo date("Y")+1; ?>)&ensp;=&ensp;Disk. Uang Pangkal 15%</li>
                            <li>&ensp; Tahap 3 : &ensp;(Mar.&ensp;-&ensp;Apr. <?php echo date("Y")+1; ?>)&ensp;=&ensp;Disk. Uang Pangkal 10%</li>
                        </ol>
                        <i class="text-danger" style="margin-left: 22px; font-weight: 700;">Untuk Siswa dari SD Citra Disk. Uang Pangkal 50% Sampai Maret <?php echo date("Y") ?></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
