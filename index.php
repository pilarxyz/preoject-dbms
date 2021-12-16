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
    <h5>Anggota Kelompok</h5>
    <h6> - Nina Nur Aidha (M0520060) <br> - Pilar Rangga Saputra  (M0520061) <br> - Qonita Nisa (M0520065) <br> - Tita Syakharani Alrizqa (M0520076)<h6>
    

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