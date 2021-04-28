<?php  


session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['idd'])) {
	$id 		=	$_GET['idd'];
	$idu 		=	$_GET['idu'];
	$idd 		=	$_GET['idd'];
	
	$query		=	"UPDATE detail_pendaftaran 
					SET status_test=1, id_admin=$idu WHERE id_user=$id";
	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message']	= "1";
		echo '<script>window.location="../index.php?page=10"</script>';
	}else{
		echo mysqli_error($conn);
	}
}else{
	echo 'tidak ada';
}

?>