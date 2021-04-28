<?php
	//Start session  
	session_start();
	
	//import connection to database
	include "koneksi/koneksi.php";

	//check if $_SESSION is exist
	if (isset($_SESSION)) {
		foreach ($_SESSION as $key => $val) {
			${$key} = $val;	
		}


		$sql	= "INSERT INTO pendaftaran VALUES(null, '$daftar', '$nl', '$np', '$nik', '$jk'
					, '$agama', '$tl', '$tgl', '$anak', '$saudara', '$tb','$bb', '$ntlp', '$al', '$rt'
					, '$rw', '$kl', '$kc', '$kk', '$pv', '$kp', '$jks', '$transport','$n_ayah', '$tl_ayah'
					, '$tgl_ayah', '$agama_ayah', '$pd_ayah', '$pk_ayah', '$pn_ayah', '$ntlp_ayah', '$n_ibu'
					, '$tl_ibu', '$tgl_ibu', '$agama_ibu', '$pd_ibu', '$pk_ibu', '$pn_ibu', '$ntlp_ibu','','','')";

		$exec 	= mysqli_query($conn,$sql);

		if ($exec) {

			$id 		= $conn->insert_id;
			//echo $id;
			$query 		= "INSERT INTO akun VALUES(null, '$email', '$password', '',1, $id)";

			$exec_akun 	=  mysqli_query($conn, $query);

			$date_regis	= date("Y-m-d");

			$query2		= "INSERT INTO detail_pendaftaran (id_user,tanggal_daftar,status_pendaftaran)
							VALUES($id, '$date_regis', 0)";

			$exec_detil	= mysqli_query($conn, $query2);

			if ($exec_akun && $exec_detil) {
				session_destroy();
				echo'<script> window.location="berhasil_registrasi.php"; </script> ';
			}else{
				echo mysqli_error($conn);
				echo 'gagal';
			}

		}else{
			echo mysqli_error($conn);
		}
	}
?>