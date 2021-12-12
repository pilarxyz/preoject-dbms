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
        <li><a href="flora.php">Flora</a></li>
        <li><a href="fauna.php">Fauna</a></li>
      </ul>
    </li>
    <li><a href="search.php">Pencarian</a></li>
    <li><a href="index.php?page=tambah_data">Tambah Data</a></li>
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

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($kon, "SELECT * FROM anggota_biodiversity WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
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

			$sql = mysqli_query($kon, "UPDATE anggota_biodiversity SET Nama='$nama', Manfaat='$manfaat', Populasi='$populasi', Status='$status' WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="data.php";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="editdata.php?NamaIlmiah=<?php echo $namailmiah; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Ilmiah</label>
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
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="data.php" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
