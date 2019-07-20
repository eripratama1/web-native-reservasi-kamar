<?php
include "koneksidb.php";
include "function.php";											
if (isset($_POST['btnsimpan'])) {
	$txtjenis = $_POST['txtjenis'];
	$txtjenis = str_replace("'","&acute;",$txtjenis);
	
	$txtharga = $_POST['txtharga'];
	$txtharga = str_replace("'","&acute;",$txtharga);
	
	$txtfasilitas = $_POST['txtfasilitas'];
	$txtfasilitas = str_replace("'","&acute;",$txtfasilitas);
	
	$pesanError = array();
	if (trim($txtjenis)=="") {
		$pesanError[] = "Data Jenis Kategori Masih Kosong !";
	}
	
	if (trim($txtharga)=="") {
		$pesanError[] = "Harga Kategori Kamar Masih Kosong !";
	}
	
	if (trim($txtfasilitas)=="") {
		$pesanError[] = "Data Fasilitas Kategori Masih Kosong !";
	}
	
	
	//$ceksql = "select * from tbl_kategori_kamar where jenis_kamar = '$txtjenis'";
	//$cekqry = mysql_query ($ceksql, $koneksi) or die ("Error".mysql_error());
	//if (mysql_num_rows($cekqry)>=1) {
		//$pesanError[] = "Jenis Kategori sudah ada";
	//}
	
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
    $Kode = $_POST['txtKode'];
	$mysql = "Update tbl_kategori_kamar set 
	jenis_kamar ='$txtjenis',
	fasilitas_kamar   ='$txtfasilitas', harga_kamar='$txtharga' where kd_kategori='$Kode'";
	$query = mysqli_query($koneksi,$mysql) or die ("Error".mysqli_error());
	if ($query) {
		echo "<script>alert('Berhasil Update Data..'); window.location='?open=Manajemen Kategori'</script>";
	} else {
		echo "<script>alert('Gagal Update Data Silahkan Ulangi Lagi !!!!');</script>";
		
		
	}
}
}
  $Kode  = isset($_GET['Kode']) ? $_GET['Kode'] : $_POST['txtKode'];
  $mySql = "Select * from tbl_kategori_kamar where kd_kategori = '$Kode'";
  $myQry = mysqli_query($koneksi,$mySql) or die ("Error".mysqli_error());
  $dataedit = mysqli_fetch_array($myQry); 
 
 $datakode = $dataedit['kd_kategori'];
 $datakategori = isset($_POST['txtjenis']) ? $_POST['txtjenis'] :$dataedit['jenis_kamar'];
 $datafasilitas = isset($_POST['txtfasilitas']) ? $_POST['txtfasilitas'] :$dataedit['fasilitas_kamar'];
 $dataharga = isset($_POST['txtharga']) ? $_POST['txtharga'] :$dataedit['harga_kamar'];
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="tinymce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        	// General options
        	mode : "textareas",
        	theme : "advanced",
});
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="1" class="tablestyle" align="center">
    <tr>
      <td colspan="3">Update Kategori Kamar</td>
    </tr>
    <tr>
      <td>No.</td>
      <td>:</td>
      <td><label for="textfield"></label>
      <input name="textfield" type="text" id="textfield" value="<?php echo $datakode;?>" /><input name="txtKode" type="hidden" value="<?php echo $dataKode; ?>"/> </td>
    </tr>
    <tr>
      <td>Jenis Kamar</td>
      <td>:</td>
      <td><label for="txtharga"></label>
      <input name="txtjenis" type="text" id="txtjenis" value="<?php echo $datakategori;?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td>Fasilitas Kamar</td>
      <td>:</td>
      <td><label for="txtharga"></label>
      <textarea name="txtfasilitas" cols="50" rows="5" id="txtfasilitas"><?php echo $datafasilitas;?></textarea></td>
    </tr>
    <tr>
      <td>Harga Kamar</td>
      <td>:</td>
      <td><label for="txtharga"></label>
      <input name="txtharga" type="text" id="txtharga" value="<?php echo $dataharga;?>" size="50" /></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnsimpan" id="btnsimpan" value="Update" />
      <input type="submit" name="button2" id="button2" value="Batal" /></td>
    </tr>
  </table>
</form>
</body>
</html>