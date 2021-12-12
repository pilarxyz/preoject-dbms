<?php include('config.php'); ?>

		<font size="6">Tambah Data</font>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$namailmiah = $_POST['namailmiah'];
			$nama = $_POST['nama'];
			$manfaat = $_POST['manfaat'];
			$populasi = $_POST['populasi'];
            $status	= $_POST['status'];

			$cek = mysqli_query($kon, "SELECT * FROM anggota_biodiversity WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($kon, "INSERT INTO anggota_biodiversity(NamaIlmiah, Nama, Manfaat, Populasi, Status) VALUES('$namailmiah', '$nama', '$manfaat', '$populasi', '$status')") or die(mysqli_error($kon));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="data.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
			}
		}
		?>

		<form action="tambahdata.php" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Ilmiah</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="namailmiah" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Manfaat</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="manfaat" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Populasi</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="populasi" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="status" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>