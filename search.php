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

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

    <div class="form-group">
        <label for="sel1">Pencarian berdasarkan:</label>
        <?php
        $namailmiah="";
        $nama="";
        $status="";
        if (isset($_POST['kolom'])) {

            if ($_POST['kolom']=="NamaIlmiah")
            {
                $namailmiah="selected";
            }else if ($_POST['kolom']=="Nama"){
                $nama="selected";
            }else {
                $status="selected";
            }
        }
        ?>
        
            <select class="form-control" name="kolom" required>
                <option value="" >Silahkan pilih kolom dulu</option>
                <option value="NamaIlmiah" <?php echo $namailmiah; ?> >Nama Ilmiah</option>
                <option value="Nama" <?php echo $nama; ?> >Nama</option>
                <option value="Status" <?php echo $status; ?> >Status</option>
         </select>
     </div>

     <?php
        $fauna="Fauna";
        $flora="Flora";
        if (isset($_POST['kategori'])) {

            if ($_POST['kategori']=="Flora")
            {
                $flora="selected";
            }else if  ($_POST['kategori']=="Fauna"){
                $fauna="selected";
            }
        }

        
        ?>

        

        <label for="sel1">Kategori</label>
     <select class="form-control" name="kategori" required>
                <option value="" >Silahkan pilih kategori dulu</option>
                <option value="Flora" <?php echo $flora; ?> >Flora</option>
                <option value="Fauna" <?php echo $fauna; ?> >Fauna</option>
         </select>
     

  

     

    <div class="form-group">
        <label for="sel1">Kata Kunci:</label>
        <?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
        <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control"  />
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih">
    </div>



    </form>

    

    <div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
        <br>
        <thead>
        <tr>
        <th>No</th>
            <th>Nama Ilmiah</th>
            <th>Nama</th>
            <th>Manfaat</th>
            <th>Populasi</th>
            <th>Status</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <?php


      if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);

            $kolom="";
            if ($_POST['kolom']=="NamaIlmiah")
            {
                $kolom="NamaIlmiah";
            }else if ($_POST['kolom']=="Nama"){
                $kolom="Nama";
            }else {
                $kolom="Status";
            }

            $kategori="";
            if ($_POST['kategori']=="Flora"){
                $kategori="Flora";
            }else if ($_POST['kategori']=="Fauna"){
                $kategori="Fauna";}

            $sql="select * from ANGGOTA_BIODIVERSITY where $kolom like '%".$kata_kunci."%'  and Kategori like '$kategori' order by Nama asc";

        }else {
            $sql="select * from ANGGOTA_BIODIVERSITY order by NamaIlmiah asc";
        }


        ?>

<tbody>
				<?php
                $hasil=mysqli_query($kon, $sql);
				$sql = mysqli_query($kon, "SELECT * FROM ANGGOTA_BIODIVERSITY ORDER BY NamaIlmiah ASC") or die(mysqli_error($kon));
				if(mysqli_num_rows($sql) > 0){
					$no = 1;
					while ($data = mysqli_fetch_array($hasil)) {
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['NamaIlmiah'].'</td>
							<td>'.$data['Nama'].'</td>
							<td>'.$data['Manfaat'].'</td>
							<td>'.$data['Populasi'].'</td>
                            <td>'.$data['Status'].'</td>
                            <td>'.$data['Kategori'].'</td>
							<td>
                            <a href="detail.php?NamaIlmiah='.$data['NamaIlmiah'].'" class="btn btn-primary btn-sm">Detail</a>
								<a href="editdata.php?NamaIlmiah='.$data['NamaIlmiah'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="deletedata.php?NamaIlmiah='.$data['NamaIlmiah'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
    <?php
      $queries = array();
      parse_str($_SERVER['QUERY_STRING'], $queries);
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      switch ($queries['page']) {
      	case 'tampil_data':
      		# code...
      		include 'data.php';
      		break;
      	case 'tambah_data':
      		# code...
      		include 'tambahdata.php';
      		break;


        default:
		          #code...
		      include 'none.php';
		      break;
        }
        ?>
</div>



</body>
</html>