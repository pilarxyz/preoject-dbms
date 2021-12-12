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
    <li><a href="tambahdata.php">Tambah Data</a></li>
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
                $jurusan="selected";
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

    <div class="form-group">
        <label for="sel1">Kata Kunci:</label>
        <?php
        $kata_kunci="";
        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=$_POST['kata_kunci'];
        }
        ?>
        <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control"  required/>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih">
    </div>



    </form>

    

    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
        <th>No</th>
            <th>Nama Ilmiah</th>
            <th>Nama</th>
            <th>Manfaat</th>
            <th>Populasi</th>
            <th>Status</th>
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

            $sql="select * from anggota_biodiversity where $kolom like '%".$kata_kunci."%'  order by Nama asc";

        }else {
            $sql="select * from anggota_biodiversity order by Nama asc";
        }


        $hasil=mysqli_query($kon, $sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["NamaIlmiah"]; ?></td>
                <td><?php echo $data["Nama"];   ?></td>
                <td><?php echo $data["Manfaat"];   ?></td>
                <td><?php echo $data["Populasi"];   ?></td>
                <td><?php echo $data["Status"];   ?></td>
            </tr>
            </tbody>
            <?php
        }
        ?>
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