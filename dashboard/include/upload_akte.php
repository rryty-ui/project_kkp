<?php  

include '../koneksi/koneksi.php';

if (isset($_POST['upload'])) {
    $targetfolderBase   = "../assets/uploads/";

    $fileNameAkte   = date("h-m-s").basename( $_FILES['akte']['name']);
    $fileNameFoto   = date("h-m-s").basename( $_FILES['foto2r']['name']);

    $targetfolder   = $targetfolderBase . $fileNameAkte;
    $targetfolder2  = $targetfolderBase . $fileNameFoto;
    
    
    $ok=1;

    $file_type=$_FILES['akte']['type'];
    $file_type2=$_FILES['foto2r']['type'];


    if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpeg") {

        if(move_uploaded_file($_FILES['akte']['tmp_name'], $targetfolder))

        {

            $query  = "UPDATE pendaftaran SET upload_akte='$fileNameAkte' WHERE id=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {
            echo    "<div class='col-md-12'>
                        <div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
                        <span class='badge badge-pill badge-success'><strong> Berhasil! </strong></span>&emsp;Upload Akte&ensp;(PDF,&ensp;JPEG&ensp;,&ensp;PNG)<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";   
            }
        }

        else {

        echo " <div class='col-md-12'>
            <div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'>
            <span class='badge badge-pill badge-danger'><strong> Gagal! </strong></span>&emsp;Upload Akte&ensp;(PDF,&ensp;JPEG&ensp;,&ensp;PNG)<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";

        }

        }

    else {

    echo "<div class='col-md-12'>
        <div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'>
        <span class='badge badge-pill badge-danger'><strong> Gagal! </strong></span>&emsp;Upload Akte&ensp;(PDF,&ensp;JPEG&ensp;,&ensp;PNG)<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";

    }

    if ($file_type2=="application/pdf" || $file_type2=="image/png" || $file_type2=="image/jpeg") {
        if(move_uploaded_file($_FILES['foto2r']['tmp_name'], $targetfolder2))

        {

            $query  = "UPDATE pendaftaran SET upload_kartu_keluarga='$fileNameFoto' WHERE id=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {
                echo    "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
						<span class='badge badge-pill badge-success'><strong> Berhasil! </strong></span>&emsp;Upload Kartu Keluarga&ensp;(PDF,&ensp;JPEG&ensp;,&ensp;PNG)<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";                
            }


        }

        else {

        echo "<div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'>
            <span class='badge badge-pill badge-danger'><strong> Gagal! </strong></span>&emsp;Upload Kartu Keluarga&ensp;(PDF,&ensp;JPEG&ensp;,&ensp;PNG)<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";   

        }
    }else{
        echo "<div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'>
            <span class='badge badge-pill badge-danger'><strong> Gagal! </strong></span>&emsp;Upload Kartu Keluarga&ensp;(PDF,&ensp;JPEG&ensp;,&ensp;PNG)<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";   
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
                        <h1>Upload Akte dan Kartu Keluarga (PDF, JPEG, atau PNG)</h1></strong><br>
                        <h5 class="alert-heading"><b>Untuk melengkapi syarat pendaftaran, upload dengan format yang benar seperti yang sudah ditentukan</b></h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group floating-label">
                                        <label class="col-sm-12 alert-heading"><h4>Akte Kelahiran</h4></label>
                                        <label class="btn btn-primary" for="my-file-selector" style="margin-left: 15px; margin-top: 10px;">
                                            <input id="my-file-selector" name="akte" type="file" style="display:none" 
                                            onchange="$('#upload-file-info').html(this.files[0].name)">
                                            Upload Akte (PDF,&ensp;JPEG,&ensp;PNG)
                                        </label>
                                        <span class='label label-info' id="upload-file-info"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group floating-label" style="margin-top: 20px;">
                                        <label class="col-sm-12 alert-heading"><h4>Kartu Keluarga</h4></label>
                                        <label class="btn btn-primary" for="my-file-selector2" style="margin-left: 15px; margin-top: 10px;">
                                            <input id="my-file-selector2" name="foto2r" type="file" style="display:none" 
                                            onchange="$('#upload-file-info2').html(this.files[0].name)">
                                            Upload Kartu Keluarga Keluarga (PDF,&ensp;JPEG,&ensp;PNG)
                                        </label>
                                        <span class='label label-info' id="upload-file-info2"></span>
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