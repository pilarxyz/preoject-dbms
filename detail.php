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
    <?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['NamaIlmiah'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$namailmiah2 = $_GET['NamaIlmiah'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select2 = mysqli_query($kon, "SELECT * FROM ANGGOTA_BIODIVERSITY WHERE NamaIlmiah='$namailmiah2'") or die(mysqli_error($kon));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select2) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$datanama = mysqli_fetch_assoc($select2);
			}
		}
		?>
    <center> <h4>Detail <h4 value>"<?php echo $datanama['Nama']; ?>" </h4> </h4> </center>

    

			
			<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['NamaIlmiah'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$namailmiah = $_GET['NamaIlmiah'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($kon, "SELECT * FROM ANGGOTA_BIODIVERSITY WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$select2 = mysqli_query($kon, "SELECT * FROM GENETIK  WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$select3 = mysqli_query($kon, "SELECT * FROM JENIS  WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$select4 = mysqli_query($kon, "SELECT * FROM EKOSISTEM  WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			$select5 = mysqli_query($kon, "SELECT * FROM KLASIFIKASI  WHERE NamaIlmiah='$namailmiah'") or die(mysqli_error($kon));
			

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
			


		<form action="editdata.php?NamaIlmiah=<?php echo $namailmiah; ?>" method="post">
			<div class="item form-group">
			<b><label class="col-form-label col-md-3 col-sm-3 label-align">Nama Ilmiah</label> </b>
				<div class="col-md-6 col-sm-6">
					  <p value=> <?php echo $data['NamaIlmiah']; ?> </p>
				</div>
			</div>
			<div class="item form-group">
			<b><label class="col-form-label col-md-3 col-sm-3 label-align">Nama </label> </b>
				<div class="col-md-6 col-sm-6">
				<p value=> <?php echo $data['Nama']; ?> </p>
				</div>
			</div>
			<div class="item form-group">
			<b><label class="col-form-label col-md-3 col-sm-3 label-align">Manfaat</label> </b>
				<div class="col-md-6 col-sm-6 ">
				<p value=> <?php echo $data['Manfaat']; ?> </p>
				</div>
			</div>
			<div class="item form-group">
			<b><label class="col-form-label col-md-3 col-sm-3 label-align">Populasi</label> </b>
				<div class="col-md-6 col-sm-6">
				<p value=> <?php echo $data['Populasi']; ?> </p>
				</div>
			</div>
            <div class="item form-group">
			<b><label class="col-form-label col-md-3 col-sm-3 label-align">Status</label> </b>
				<div class="col-md-6 col-sm-6">
				<p value=> <?php echo $data['Status']; ?> </p>
				</div>
			</div>
			<div class="item form-group">
			<b><label class="col-form-label col-md-3 col-sm-3 label-align">Kategori</label> </b>
				<div class="col-md-6 col-sm-6">
				<p value=> <?php echo $data['Kategori']; ?> </p>
				</div>
			</div>
			<div class="item form-group">
			<b><label class="col-form-label col-md-3 col-sm-3 label-align">Ciri</label> </b>
				<div class="col-md-6 col-sm-6">
				<p value=> <?php echo $data2['Ciri']; ?> </p>
				</div>
			</div>
			<div class="item form-group">
			<b><label class="col-form-label col-md-3 col-sm-3 label-align">Spesies</label> </b>
				<div class="col-md-6 col-sm-6">
				<p value=> <?php echo $data3['Spesies']; ?> </p>
				</div>
			</div>
			<div class="item form-group">
				<b> <label class="col-form-label col-md-3 col-sm-3 label-align">Tipe</label> </b>
				<div class="col-md-6 col-sm-6">
				<p value=> <?php echo $data4['Tipe']; ?> </p>
				</div>
			</div>
            <div class="item form-group">
				<b> <label class="col-form-label col-md-3 col-sm-3 label-align">Peran</label> </b>
				<div class="col-md-6 col-sm-6">
				<p value=> <?php echo $data4['Peran']; ?> </p>
				</div>
			</div>
			<b> <label class="col-form-label col-md-3 col-sm-3 label-align">Klasifikasi</label> </b>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6">
				<p value=> Kingdom = <?php echo $data5['Kingdom']; ?> </p>
				<p value=> DivisioFilum = <?php echo $data5['DivisioFilum']; ?> </p>
				<p value=> Class = <?php echo $data5['Class']; ?> </p>
				<p value=> Ordo = <?php echo $data5['Ordo']; ?> </p>
				<p value=> Familia = <?php echo $data5['Familia']; ?> </p>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<a href="data.php" class="btn btn-warning">Kembali</a>
					
				</div>
			</div>
		</form>
	</div>

	<?php
	
	$queries = array();
	parse_str($_SERVER['QUERY_STRING'], $queries);
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	switch ($queries['page']) {
		case 'editdata':
			# code...
			include 'editdata.php';
			break;

	  default:
				#code...
			include 'none.php';
			break;
	  }
	  ?>