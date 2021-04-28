<div class="section__content section__content--p30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <h1>Profile Siswa</h1>
                    </div>
                    <div class="card-body">
                        <div class="default-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Data Siswa</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Data Orang Tua</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">Data Alamat</a>
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table table-borderless table-striped table-earning" style="table-layout:fixed; word-wrap:break-word;">
                                    <tbody>
                                        <tr>
                                            <td><b>No Pendaftaran<b></td>
                                            <td>: <?php echo $no_pendaftaran; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Nama Lengkap</b></td>
                                            <td>: <?php echo $nama; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Tempat / Tanggal Lahir</b></td>
                                            <td>: <?php echo $tempat_lahir.", ".$tanggal_lahir; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Agama</b></td>
                                            <td>: <?php echo $agama; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Jenis Kelamin</b></td>
                                            <td>: <?php if ($jenis_kelamin == 'L') {
                                                            echo "Laki-laki";
                                                        }
                                                        else {
                                                            echo "Perempuan"; }
                                                        ; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Tinggi Badan</b></td>
                                            <td>: +/- <?php echo $tinggi_badan; ?> Cm</td>
                                        </tr>
                                        <tr>
                                            <td><b>Berat Badan</b></td>
                                            <td>: +/- <?php echo $berat_badan; ?> Kg</td>
                                        </tr>
                                        <tr>
                                            <td><b>Anak Ke -</b></td>
                                            <td>: <?php echo $anak_ke; ?> dari <?php echo $jumlah_saudara; ?> bersaudara</td>
                                        </tr>
                                        
                                        <tr>
                                            <td><b>No Telepon Siswa</b></td>
                                            <td>: <?php echo $no_tlp; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table table-borderless table-striped table-earning" style="table-layout:fixed; word-wrap:break-word;">
                                    <tbody>
                                    <tr>
                                        <td><b>Nama Ayah</b></td>
                                        <td>: <?php echo $nama_ayah; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tempat / Tanggal Lahir</b></td>
                                        <td>: <?php echo $tempat_lahir_ayah.", ".$tanggal_lahir_ayah; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pendidikan Terakhir</b></td>
                                        <td>: <?php echo $pendidikan_terakhir_ayah; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pekerjaan</b></td>
                                        <td>: <?php echo $pekerjaan_ayah; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Agama</b></td>
                                        <td>: <?php echo $penghasilan_ayah; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Telepon</b></td>
                                        <td>: <?php echo $tlp_ayah; ?></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Ibu</b></td>
                                        <td>: <?php echo $nama_ibu; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><b>Tempat / Tanggal Lahir</b></td>
                                        <td>: <?php echo $tempat_lahir_ibu.", ".$tanggal_lahir_ibu; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pendidikan Terakhir</b></td>
                                        <td>: <?php echo $pendidikan_terakhir_ibu; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pekerjaan</b></td>
                                        <td>: <?php echo $pekerjaan_ibu; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Agama</b></td>
                                        <td>: <?php echo $penghasilan_ibu; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Telepon</b></td>
                                        <td>: <?php echo $tlp_ibu; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table table-borderless table-striped table-earning" style="table-layout:fixed; word-wrap:break-word">
                                    <tbody>
                                        <tr>
                                            <td><b>Alamat</b></td>
                                            <td>: <?php echo $alamat; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>RT / RW</b></td>
                                            <td>: <?php echo $rt; ?> / <?php echo $rw; ?></td>
                                        </tr>                       
                                        <tr>
                                            <td><b>Kelurahan / Kecamatan<b></td>
                                            <td>: <?php echo $kelurahan; ?> / <?php echo $kecamatan; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Kota / Kabupaten<b></td>
                                            <td>: <?php echo $kota; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Provinsi<b></td>
                                            <td>: <?php echo $provinsi; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Kode Pos</b></td>
                                            <td>: <?php echo $kode_pos; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Jarak Ke Sekolah</b></td>
                                            <td>: +/- <?php echo $jarak; ?> Km</td>
                                        </tr>
                                        <tr>
                                            <td><b>Transportasi Ke Sekolah</b></td>
                                            <td>: <?php echo $transportasi; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>