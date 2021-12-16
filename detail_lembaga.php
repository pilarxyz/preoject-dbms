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
		if(isset($_GET['IdLembaga'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$idlembaga2 = $_GET['IdLembaga'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select2 = mysqli_query($kon, "SELECT * FROM LEMBAGA WHERE IdLembaga='$idlembaga2'") or die(mysqli_error($kon));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select2) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$datalembaga = mysqli_fetch_assoc($select2);
			}
		}
		?>

    

			
			<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['IdLembaga'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$idlembaga = $_GET['IdLembaga'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($kon,
			"SELECT *
			FROM LEMBAGA as l 
			join menangkar as m on l.Idlembaga=m.IdLembaga
			join ANGGOTA_BIODIVERSITY as a on m.NamaIlmiah=a.NamaIlmiah
			WHERE m.IdLembaga='$idlembaga'
			order by l.IdLembaga asc") or die(mysqli_error($kon));

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
			

			<div class="container">
    <br>

    <div class="container" style="margin-top:20px">
		<h4 value>Daftar biodiversity di lembaga "<?php echo $datalembaga['Nama']; ?>" </h4>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Ilmiah</th>
					<th>Nama </th>
					<th>Manfaat</th>
					<th>Populasi</th>
                    <th>Status</th>
					<th>Kategori</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$sql = mysqli_query($kon,
			"SELECT *
			FROM LEMBAGA as l 
			join menangkar as m on l.Idlembaga=m.IdLembaga
			join ANGGOTA_BIODIVERSITY as a on m.NamaIlmiah=a.NamaIlmiah
			WHERE m.IdLembaga='$idlembaga'") or die(mysqli_error($kon));
				if(mysqli_num_rows($sql) > 0){
					$no = 1;
					while($data = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['NamaIlmiah'].'</td>
							<td>'.$data['Nama'].'</td>
							<td>'.$data['Manfaat'].'</td>
							<td>'.$data['Populasi'].'</td>
                            <td>'.$data['Status'].'</td>
							<td>'.$data['Kategori'].'</td>
						</tr>
						';
						$no++;
					}
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>

		<form action="editdata.php?IdLembaga=<?php echo $idlembaga; ?>" method="post">
					<a href="lembaga.php" class="btn btn-warning">Kembali</a>
					
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