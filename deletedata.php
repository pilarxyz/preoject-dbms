<?php

include('config.php');


	$namailmiah = $_GET['NamaIlmiah'];


		$del = mysqli_query($kon, "DELETE FROM anggota_biodiversity WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="data.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="data.php";</script>';

		}


?>