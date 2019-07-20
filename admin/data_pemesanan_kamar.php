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
  <table width="900" border="1" class="tablestyle" align="center" cellpadding="2" cellspacing="3">
    <tr>
      <td colspan="9" align="center">Data Pemesanan Kamar</td>
    </tr>
    <tr>
      <td width="25%">No.</td>
      <td width="25%">No.Reservasi</td>
      <td width="25%">No.Kamar</td>
      <td width="25%">Jenis Kamar</td>
      <td width="40%">Nama Pemesan</td>
      <td width="20%">Tanggal Cek-in</td>
      <td width="20%">Tanggal Cek-Out</td>
      <td colspan="2" width="20%">Opsi</td>
    </tr>
    <?php 
	$mysql = "select * from tbl_reservasi_kamar";
	$query = mysqli_query($koneksi,$mysql) or die ("Gagal Menampilkan Data".mysqli_error());
	$nomor = 0;
	while ($datareservasi = mysqli_fetch_array($query)) {
		$nomor++;
		$kode = $datareservasi['no_kamar']
	
	
	?>
    <tr>
      <td width="25%"><?php echo $nomor;?></td>
      <td width="25%"><?php echo $datareservasi['no_reservasi'];?></td>
      <td width="25%"><?php echo $datareservasi['no_kamar'];?></td>
      <td width="25%"><?php echo $datareservasi['jenis_kamar'];?></td>
      <td width="40%"><?php echo $datareservasi['nama_reservasi'];?></td>
      <td width="20%"><?php echo $datareservasi['tgl_cek_in'];?></td>
      <td width="20%"><?php echo $datareservasi['tgl_cek_out'];?></td>
      <td><a href="?open=Hapus Data Pemesanan&kode=<?php echo $kode;?>">Kosongkan Kamar</a></td>
      <td>Update Data</td>
    </tr>
    <?php 
	}
	?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>