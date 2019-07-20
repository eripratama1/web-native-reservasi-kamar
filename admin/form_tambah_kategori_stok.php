<?php
include "koneksidb.php";
include "function.php";											
if (isset($_POST['btnsimpan'])) {
	$txtstok = $_POST['txtstok'];
	$txtstok = str_replace("'","&acute;",$txtstok);
	
	$pesanError = array();
	if (trim($txtstok)=="") {
		$pesanError[] = "Data Jenis Kategori Masih Kosong !";
	}
	
	$ceksql = "select * from tbl_kategori_stok where nama_stok = '$txtstok'";
	$cekqry = mysqli_query ($koneksi,$ceksql) or die ("Error".mysqli_error());
	if (mysqli_num_rows($cekqry)>=1) {
		$pesanError[] = "Jenis Kategori sudah ada";
	}
	if (count($pesanError)>=1) {
		echo "<div class='mssgBox'>";
		echo "<img src='images/attention.png'> <br><hr>";
		$nopesan=0;
		foreach ($pesanError as $indeks=>$pesan_tampil) {
			$nopesan++;
			echo "&nbsp;&nbsp; $nopesan. $pesan_tampil<br>";	
		}
	}
else {
	$kodebaru = buatKode("tbl_kategori_stok","STK");
	$mysql = "insert into tbl_kategori_stok set kd_stok = '$kodebaru', nama_stok='$txtstok'";
	$query = mysqli_query($koneksi,$mysql) or die ("Error".mysqli_error());
	if ($query) {
		
	}
}
}
 $datakode = buatKode("tbl_kategori_stok","STK");
 $datakategori = isset($_POST['txtjenis']) ? $_POST['txtjenis'] : ' ';
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="1">
    <tr>
      <td colspan="3">Tambah Kategori Kamar</td>
    </tr>
    <tr>
      <td>No.</td>
      <td>:</td>
      <td><label for="textfield"></label>
      <input name="textfield" type="text" id="textfield" value="<?php echo $datakode;?>" /></td>
    </tr>
    <tr>
      <td>Nama Stok</td>
      <td>:</td>
      <td><label for="txtstok"></label>
      <input name="txtstok" type="text" id="txtstok" value="<?php echo $datakategori;?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnsimpan" id="btnsimpan" value="Tambah" />
      <input type="submit" name="button2" id="button2" value="Batal" /></td>
    </tr>
  </table>
</form>
</body>
</html>