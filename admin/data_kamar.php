<?php 
include "koneksidb.php";
//include "buka_halaman.php";
$baris = 5;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM tbl_kamar";
$pageQry = mysqli_query($koneksi,$pageSql) or die ("error paging: ".mysqli_error());
$jumlah	 = mysqli_num_rows($pageQry);
$maksData= ceil($jumlah/$baris);
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
  <table width="600" border="1" class="tablestyle" cellspacing="2" cellpadding="3" align="center">
    <tr>
      <td colspan="6" align="center"><a href="?open=Tambah Data">+Tambah Data Kamar||</a><a href="?open=Manajemen Kategori">Kategori Kamar</a></td>
      
    </tr>
    <tr>
      <td width="25%">No</td>
      <td width="25%">No.Kamar</td>
      <td width="25%">Jenis Kamar</td>
      <td width="25%">Stok Kamar</td>
      <td width="35%">Fasilitas</td>
      <td width="25%">Pengaturan</td>
    </tr>
    <?php 
	$mysql = "Select * from tbl_kamar order by no_kamar ASC LIMIT $hal, $baris ";
	$qry   = mysqli_query($koneksi,$mysql) or die ("Error".mysqli_error());
	$nomor = 0;
	while ($datakamar = mysqli_fetch_array($qry)) {
		$nomor++;
		$Kode = $datakamar['no_kamar'];
		
	?>
    <tr>
      <td width="25%"><?php echo $nomor;?></td>
      <td width="25%"><?php echo $datakamar['no_kamar'];?></td>
      <td width="25%"><?php echo $datakamar['jenis_kamar'];?></td>
      <td width="25%"><?php echo $datakamar['Ketersediaan'];?></td>
      <td width="35%"><?php echo $datakamar['fasilitas'];?></td>
      <td width="25%"><a href="?open=Update Data&Kode=<?php echo $Kode;?>">Update</a> |
        <label for="pilih"></label>
      <a href="?open=Hapus Data&Kode=<?php echo $Kode;?>">Hapus</a></td>
   
    <?php 
	}
	?>
  </table>
  <table width="500" border="0" align="center">
    <tr>
      <td>Jumlah Data : <?php echo $jumlah; ?></td>
      <td>Halaman Ke  :  <?php
	for ($h = 1; $h <= $maksData; $h++) {
		$list[$h] = $baris * $h - $baris;
		echo " <a href='?open=Manajemen Kamar&hal=$list[$h]'>$h</a> ";
	}
	?></td>
    </tr>
  </table>
   </tr>
  <tr>
      <td colspan="6">&nbsp;</td>
  </tr>
</form>
</div>
</body>
</html>