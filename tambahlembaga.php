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
    <h4>Lembaga Biodiversity Indonesia</h4>
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
			$idlembaga = $_POST['idlembaga'];
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$kontak = $_POST['kontak'];




			$cek = mysqli_query($kon, "SELECT * FROM LEMBAGA WHERE IdLembaga='$idlembaga'") or die(mysqli_error($kon));

			if(mysqli_num_rows($cek) == 0){

				$sql = mysqli_query($kon, "INSERT INTO LEMBAGA VALUES('$idlembaga', '$nama', '$alamat', '$kontak')") or die(mysqli_error($kon));
				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="lembaga.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			
		
	
}
else{
				echo '<div class="alert alert-warning">Gagal, data sudah terdaftar.</div>';
			}
		

}
		?>

		<form action="tambahlembaga.php" method="post">
			<div class="item form-group">
			<br>
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id Lembaga</label> </br>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="idlembaga" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="alamat" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kontak</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kontak" class="form-control" required>
				</div>
			</div>
			
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="lembaga.php" class="btn btn-warning">Kembali</a>
			</div>
		</form>
	</div>