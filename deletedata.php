<?php

include('config.php');


	$namailmiah = $_GET['NamaIlmiah'];

	$del = mysqli_query($kon, "DELETE FROM KLASIFIKASI WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
	$del1 = mysqli_query($kon, "DELETE FROM EKOSISTEM WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
	$del2 = mysqli_query($kon, "DELETE FROM JENIS WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
	$del3 = mysqli_query($kon, "DELETE FROM GENETIK WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
		$del4 = mysqli_query($kon, "DELETE FROM ANGGOTA_BIODIVERSITY WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));

		if($del){
			if($del1){
			if($del2){
				if($del3){
					if($del4){
			echo '<script>alert("Berhasil menghapus data."); document.location="data.php";</script>';
		}
	}
}
			}
}else{
			echo '<script>alert("Gagal menghapus data."); document.location="data.php";</script>';

		}


?>