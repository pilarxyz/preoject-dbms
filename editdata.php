<?php include('config.php'); ?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Database Biodiversity Indonesia</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
  </head>
<body>
  <div class="menu-wrap">
  <ul>
  <li><a href="index.php">Beranda</a></li>
    <li><a href="data.php">Database</a>
      <ul>
      <li><a href="data.php">Biodiversity</a></li>
        <li><a href="flora.php">Flora</a></li>
        <li><a href="fauna.php">Fauna</a></li>
      </ul>
    </li>
    <li><a href="lembaga.php">Lembaga</a></li>
    <li><a href="search.php">Pencarian</a></li>
  </ul>
  </div>
</body>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <br>
    <h4>Database Biodiversity Indonesia</h4>
	<div class="container" style="margin-top:20px">
		<font size="6">Edit Data</font>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['NamaIlmiah'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$namailmiah = $_GET['NamaIlmiah'];
			$namailmiah2 = $_GET['NamaIlmiah'];
			$namailmiah3 = $_GET['NamaIlmiah'];
			$namailmiah4 = $_GET['NamaIlmiah'];
			$namailmiah5 = $_GET['NamaIlmiah'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($kon, "SELECT * FROM ANGGOTA_BIODIVERSITY WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$select2 = mysqli_query($kon, "SELECT * FROM GENETIK  WHERE NamaIlmiah='$namailmiah2'") or die(mysqli_error($kon));
			$select3 = mysqli_query($kon, "SELECT * FROM JENIS  WHERE NamaIlmiah='$namailmiah3'") or die(mysqli_error($kon));
			$select4 = mysqli_query($kon, "SELECT * FROM EKOSISTEM  WHERE NamaIlmiah='$namailmiah4'") or die(mysqli_error($kon));
			$select5 = mysqli_query($kon, "SELECT * FROM KLASIFIKASI  WHERE NamaIlmiah='$namailmiah5'") or die(mysqli_error($kon));
			

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				if(mysqli_num_rows($select2) == 0){
					if(mysqli_num_rows($select3) == 0){
						if(mysqli_num_rows($select4) == 0){
							if(mysqli_num_rows($select5) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}
		}
	}
}
}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
				$data2 = mysqli_fetch_assoc($select2);
				$data3 = mysqli_fetch_assoc($select3);
				$data4 = mysqli_fetch_assoc($select4);
				$data5 = mysqli_fetch_assoc($select5);

			}
		
	}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nama			= $_POST['nama'];
			$manfaat			= $_POST['manfaat'];
			$populasi		= $_POST['populasi'];
            $status		= $_POST['status'];
			$ciri		= $_POST['ciri'];
			$spesies	= $_POST['spesies'];
			$tipe	= $_POST['tipe'];
			$peran	= $_POST['peran'];
			$kategori	= $_POST['kategori'];
			$kode	= $_POST['kode'];
			$kingdom	= $_POST['kingdom'];
			$divisiofilum	= $_POST['divisiofilum'];
			$class	= $_POST['class'];
			$ordo	= $_POST['ordo'];
			$familia	= $_POST['familia'];


			$sql = mysqli_query($kon, "UPDATE ANGGOTA_BIODIVERSITY SET Nama='$nama', Manfaat='$manfaat', Populasi='$populasi', Status='$status', Kategori='$kategori' WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$sql2 = mysqli_query($kon, "UPDATE GENETIK SET Ciri='$ciri' WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$sql3 = mysqli_query($kon, "UPDATE JENIS SET Spesies='$spesies' WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$sql4 = mysqli_query($kon, "UPDATE EKOSISTEM SET Tipe='$tipe', Peran='$peran' WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$sql5 = mysqli_query($kon, "UPDATE KLASIFIKASI SET Kode='$kode', Kingdom='$kingdom', DivisioFilum='$divisiofilum', Class='$class', Ordo='$ordo', Familia='$familia' WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));

			if($sql){
				if($sql2){
					if($sql3){
						if($sql4){
							if($sql5){
				echo '<script>alert("Berhasil menyimpan data."); document.location="data.php";</script>';
			
			}
		}
	}
	}}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="editdata.php?NamaIlmiah=<?php echo $namailmiah; ?>" method="post">
			<div class="item form-group">
			<b> <label class="col-form-label col-md-3 col-sm-3 label-align">Biodiversity</label> </b>
			<br>
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Ilmiah</label> </br>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="namailmiah" class="form-control" value="<?php echo $data['NamaIlmiah']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['Nama']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Manfaat</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="manfaat" class="form-control" value="<?php echo $data['Manfaat']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Populasi</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="populasi" class="form-control" value="<?php echo $data['Populasi']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="status" class="form-control" value="<?php echo $data['Status']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Ciri</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="ciri" class="form-control" value="<?php echo $data2['Ciri']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Spesies</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="spesies" class="form-control" value="<?php echo $data3['Spesies']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tipe</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tipe" class="form-control" value="<?php echo $data4['Tipe']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Peran</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="peran" class="form-control" value="<?php echo $data4['Peran']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
			<b> <label class="col-form-label col-md-3 col-sm-3 label-align">Klasifikasi</label> </b>
				<br>  <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Klasifikasi</label></br>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kode" class="form-control" value="<?php echo $data5['Kode']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kindom</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kingdom" class="form-control" value="<?php echo $data5['Kingdom']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">DivisioFilum</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="divisiofilum" class="form-control" value="<?php echo $data5['DivisioFilum']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Class</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="class" class="form-control" value="<?php echo $data5['Class']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Ordo</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="ordo" class="form-control" value="<?php echo $data5['Ordo']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Familia</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="familia" class="form-control" value="<?php echo $data5['Familia']; ?>" required>
				</div>
			</div>

			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="data.php" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
