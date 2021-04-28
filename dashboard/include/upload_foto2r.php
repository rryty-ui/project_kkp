<?php  

include '../koneksi/koneksi.php';

if (isset($_POST['upload'])) {
    $targetfolderBase   = "../assets/uploads/";

    $fileNameFotoAnak   = date("h-m-s").basename( $_FILES['foto_anak']['name']);

    $targetfolder   = $targetfolderBase . $fileNameFotoAnak;
    
    
    $ok=1;

    $file_type=$_FILES['foto_anak']['type'];


    if ($file_type=="image/jpeg" || $file_type=="image/png" || $file_type=="application/pdf") {

        if(move_uploaded_file($_FILES['foto_anak']['tmp_name'], $targetfolder))

        {

            $query  = "UPDATE pendaftaran SET foto_anak='$fileNameFotoAnak' WHERE id=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {
            echo "<div class='col-md-12'>
                    <div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
                    <span class='badge badge-pill badge-success'><strong> Berhasil! </strong></span>&emsp;Upload Foto 2R&ensp;(PDF,&ensp;JPEG&ensp;,&ensp;PNG)<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";   
            }
        }

        else {

        echo "<div class='col-md-12'>
                <div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'>
                <span class='badge badge-pill badge-danger'><strong> Gagal! </strong></span>&emsp;Upload Foto 2R&ensp;(PDF,&ensp;JPEG&ensp;,&ensp;PNG)<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";

        }

        }

    else {

    echo "<div class='col-md-12'>
            <div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'>
            <span class='badge badge-pill badge-danger'><strong> Gagal! </strong></span>&emsp;Upload Foto 2R&ensp;(PDF,&ensp;JPEG&ensp;,&ensp;PNG)<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";

    }  
    
}

?>

<div class="section__content section__content--p30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border border-secondary">
                    <div class="card-header">
                        <strong class="card-title" style="margin-right: 50px; margin-top: 50px;">
                        <h1>Upload Foto Calon Siswa 2R (PDF, JPEG, atau PNG)</h1></strong><br>
                        <h5 class="alert-heading"><b>Untuk melengkapi syarat pendaftaran, upload dengan format yang benar seperti yang sudah ditentukan</b></h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group floating-label">
                                        <label class="col-sm-12 alert-heading"><h4>Foto Calon Siswa 2R</h4></label>
                                        <label class="btn btn-primary" for="my-file-selector" style="margin-left: 15px; margin-top: 10px;">
                                            <input id="my-file-selector" name="foto_anak" type="file" style="display:none" 
                                            onchange="$('#upload-file-info').html(this.files[0].name)">
                                            Upload Foto 2R (PDF,&ensp;JPEG,&ensp;PNG)
                                        </label>
                                        <span class='label label-info' id="upload-file-info"></span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" name="upload" class="btn btn-primary blue pull-right"><i class="fa fa-upload"></i> Upload File</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>