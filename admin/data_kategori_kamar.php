<?php 
include "koneksidb.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="0" class="tablestyle" align="center" cellpadding="3" cellspacing="2">
    <tr>
      <td colspan="5"><a href="?open=Tambah Kategori Kamar">Tambah Kategori Kamar</a></td>
    </tr>
    <tr>
      <td>No</td>
      <td>Kategori Kamar</td>
      <td>Fasilitas</td>
      <td colspan="2">Opsi</td>
    </tr>
    <?php 
	$mysql = "Select * from tbl_kategori_kamar order by jenis_kamar asc";
	$myqry = mysqli_query($koneksi,$mysql) or die ("Error".mysqli_error());
	$nomor = 0;
	while ($datakategori = mysqli_fetch_array($myqry)) {
		$nomor++;
		$Kode = $datakategori['kd_kategori'];
	?>
    <tr>
      <td><?php echo $nomor;?></td>
      <td><?php echo $datakategori['jenis_kamar'];?></td>
      <td><?php echo $datakategori['fasilitas_kamar'];?></td>
      <td><a href="?open=Update Data Kategori Kamar&Kode=<?php echo $Kode;?>">Edit</a></td>
      <td><a href="?open=Hapus Data Kategori Kamar&Kode=<?php echo $Kode;?>">Hapus</a></td>
    </tr>
    <?php }
	 ?>
  </table>
</form>
</body>
</html>