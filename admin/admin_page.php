<html>
<head>
<title>Halaman Administrator</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="jquery.js"></script>
<link rel="stylesheet" type="text/css" href="tigra_calendar/tcal.css" />
<script type="text/javascript" src="tigra_calendar/tcal.js"></script> 
<script language="javascript" type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
   // selector: "textarea"
 });
</script>

</head>
<body>
<div class="content">
<header>
<h1 class="judul">Manajemen Sistem Hotel ABC</h1>
<h3 class="deskripsi">Sistem Reservasi Hotel ABC [Halaman Administrator]</h3>
</header>
<div class="menu">
<ul>
<li><a href="?open=Beranda">Beranda</a></li>
<li><a href="?open=Manajemen Kamar">Manajemen Kamar</a></li>
<li><a href="?open=Data Pemesanan">Data Pemesanan</a></li>
<li><a href="?open=Transaksi Pembayaran">Hitung Tagihan</a></li>
</ul>
</div>
<div class="badan">
<?php
include "buka_halaman.php";
?>
</div>
</div>
</body>
</html>