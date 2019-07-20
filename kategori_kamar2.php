<?php 
include "koneksidb.php";
include "function.php";


if (isset($_GET['Kode'])) {
	$Kode = $_GET['Kode'];
	
	if (trim($_GET['Kode']) == "") {
		$filtersql = " ";
	}
	else { 
	  $filtersql = "where tbl_kamar.kd_kategori='$Kode' && Ketersediaan LIKE '%Available%'";
	  
	}
}
$datasql = "Select * from tbl_kategori_kamar where kd_kategori ='$Kode'";
$dataqry = mysqli_query($koneksi,$datasql) or die ("Data Error".mysqli_error());
$mydata = mysqli_fetch_array($dataqry);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="halaman">
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="1"  class="tablestyle" align="center">
    <tr>
      <td colspan="7">Kategori Kamar</td>
    </tr>
    <tr>
      <td>No</td>
      <td>No Kamar</td>
      <td>Kategori Kamar</td>
      <td>Harga Kamar</td>
      <td>Ketersediaan</td>
      <td colspan="2">Opsi</td>
    </tr>
     <?php 
$kamarsql = "select * from tbl_kamar $filtersql";
	$qry   = mysqli_query($koneksi,$kamarsql) or die ("Error".mysqli_error());
	$nomor = 0;
	while ($datakamar = mysqli_fetch_array($qry)) {
		$nomor++;
		$Kode = $datakamar['no_kamar'];
		//$Kodekategori = $datakamar['kd_kategori'];
	?>
    <tr>
      <td><?php echo $nomor;?></td>
      <td><?php echo $datakamar['no_kamar'];?></td>
      <td><?php echo $datakamar['jenis_kamar'];?></td>
      <td>Rp.<?php echo format_angka ($datakamar['harga_kamar']);?></td>
      <td><?php echo $datakamar['Ketersediaan'];?></td>
      <td><a href="?page=Reservasi&Kode=<?php echo $Kode;?>">Pesan</a></td>
      <td>Detail</td>
    </tr>
     <?php 
	}
	?>
  </table>
</form>
</div>
</body>
</html>