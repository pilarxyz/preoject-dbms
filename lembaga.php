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

    <div class="container" style="margin-top:20px">
		<hr>
		<a href="tambahlembaga.php"><button class="btn btn-dark right">Tambah Lembaga</button></a>
        <hr>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No.</th>
					<th>Id</th>
					<th>Nama </th>
					<th>Alamat</th>
					<th>Kontak</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = mysqli_query($kon, "SELECT * FROM LEMBAGA ORDER BY IdLembaga ASC") or die(mysqli_error($kon));
				if(mysqli_num_rows($sql) > 0){
					$no = 1;
					while($data = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['IdLembaga'].'</td>
							<td>'.$data['Nama'].'</td>
							<td>'.$data['Alamat'].'</td>
							<td>'.$data['Kontak'].'</td>
							<td>
							<a href="detail_lembaga.php?IdLembaga='.$data['IdLembaga'].'" class="btn btn-primary btn-sm">Detail</a>
							</td>
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
	</div>