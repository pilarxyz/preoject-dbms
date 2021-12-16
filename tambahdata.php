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
    <li><a href="penyebaran.php">Penyebaran</a></li>
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
<br>

    <?php
      $queries = array();
      parse_str($_SERVER['QUERY_STRING'], $queries);
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      switch ($queries['page']) {
      	case 'tambah_data':
      		# code...
      		include 'tambahdata.php';
      		break;

              case 'data':
                # code...
                include 'data.php';
                break;

        default:
		          #code...
		      include 'none.php';
		      break;
        }
        ?>

</html>
		<font size="6">Tambah Data</font>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			
			$namailmiah = $_POST['namailmiah'];
			$nama = $_POST['nama'];
			$manfaat = $_POST['manfaat'];
			$populasi = $_POST['populasi'];
            $status	= $_POST['status'];
			$kategori	= $_POST['kategori'];
			$ciri	= $_POST['ciri'];
			$spesies	= $_POST['spesies'];
			$tipe	= $_POST['tipe'];
			$peran	= $_POST['peran'];
			$kode	= $_POST['kode'];
			$kingdom	= $_POST['kingdom'];
			$divisiofilum	= $_POST['divisiofilum'];
			$class	= $_POST['class'];
			$ordo	= $_POST['ordo'];
			$familia	= $_POST['familia'];



			$cek = mysqli_query($kon, "SELECT * FROM ANGGOTA_BIODIVERSITY WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$cek2 = mysqli_query($kon, "SELECT * FROM GENETIK WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$cek3 = mysqli_query($kon, "SELECT * FROM JENIS WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$cek4 = mysqli_query($kon, "SELECT * FROM EKOSISTEM WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$cek5 = mysqli_query($kon, "SELECT * FROM KLASIFIKASI WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));

			if(mysqli_num_rows($cek) == 0){
				if(mysqli_num_rows($cek2) == 0){
					if(mysqli_num_rows($cek3) == 0){
						if(mysqli_num_rows($cek4) == 0){
							if(mysqli_num_rows($cek5) == 0){
				$sql = mysqli_query($kon, "INSERT INTO ANGGOTA_BIODIVERSITY(NamaIlmiah, Nama, Manfaat, Populasi, Status, Kategori) VALUES('$namailmiah', '$nama', '$manfaat', '$populasi', '$status', '$kategori')") or die(mysqli_error($kon));
				$sql = mysqli_query($kon, "INSERT INTO GENETIK(NamaIlmiah, Ciri) VALUES('$namailmiah', '$ciri')") or die(mysqli_error($kon));
				$sql = mysqli_query($kon, "INSERT INTO JENIS(NamaIlmiah, Spesies) VALUES('$namailmiah', '$spesies')") or die(mysqli_error($kon));
				$sql = mysqli_query($kon, "INSERT INTO EKOSISTEM(NamaIlmiah, Tipe, Peran) VALUES('$namailmiah', '$tipe', '$peran')") or die(mysqli_error($kon));
				$sql = mysqli_query($kon, "INSERT INTO KLASIFIKASI(Kode, NamaIlmiah, Kingdom, DivisioFilum, Class, Ordo, Familia) VALUES('$kode','$namailmiah', '$kingdom', '$divisiofilum', '$class', '$ordo', '$familia')") or die(mysqli_error($kon));
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="data.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}
		}
	}
}
}else{
				echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
			}
		

}
		?>

		<form action="tambahdata.php" method="post">
			<div class="item form-group">
			<b> <label class="col-form-label col-md-3 col-sm-3 label-align">Biodiversity</label> </b>
			<br>
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Ilmiah</label> </br>
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
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kategori</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kategori" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Ciri</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="ciri" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Spesies</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="spesies" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tipe</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tipe" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Peran</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="peran" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<b> <label class="col-form-label col-md-3 col-sm-3 label-align">Klasifikasi</label> </b>
				<br>  <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Klasifikasi</label></br>
				<div class="col-md-6 col-sm-6">
					<input  type="text" name="kode" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kingdom</label>
				<div class="col-md-6 col-sm-6">
					<input  type="text" name="kingdom" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">DivisioFilum</label>
				<div class="col-md-6 col-sm-6">
					<input  type="text" name="divisiofilum" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Class</label>
				<div class="col-md-6 col-sm-6">
					<input  type="text" name="class" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Ordo</label>
				<div class="col-md-6 col-sm-6">
					<input  type="text" name="ordo" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Familia</label>
				<div class="col-md-6 col-sm-6">
					<input  type="text" name="familia" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="data.php" class="btn btn-warning">Kembali</a>
			</div>
		</form>
	</div>