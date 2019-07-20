<?php
include "koneksidb.php";
//include "function.php";											
if (isset($_POST['btnsimpan'])) {
	
	$txtkodekategori = $_POST['txtkodekategori'];
	$txtfasilitas = $_POST['txtfasilitas'];
	$txtfasilitas = str_replace("'","&acute;",$txtfasilitas);
	
	$txtharga = $_POST['txtharga'];
	$txtharga = str_replace("'","&acute;",$txtharga);
	
	$txtjenis = $_POST['txtjenis'];
	$txtjenis = str_replace("'","&acute;",$txtjenis);
	
	$pesanError = array();
	if (trim($txtjenis)=="") {
		$pesanError[] = "Data Jenis Kategori Masih Kosong !";
				
	}
	
	if (trim($txtfasilitas)=="") {
		$pesanError[] = "Data Fasilitas Masih Kosong !";
				
	}
	if (trim($txtharga)=="") {
		$pesanError[] = "Data Harga Masih Kosong !";
				
	}
	
	$ceksql = "select * from tbl_kategori_kamar where jenis_kamar = '$txtjenis'";
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
	$mysql = "insert into tbl_kategori_kamar set kd_kategori = '$txtkodekategori', jenis_kamar='$txtjenis', fasilitas_kamar='$txtfasilitas',harga_kamar='$txtharga'";
	$query = mysqli_query($koneksi,$mysql) or die ("Error".mysqli_error());
	if ($query) {
		
		echo "<script>alert('Berhasil Tambah Data..'); window.location='?open=Manajemen Kategori'</script>";
	} else {
		echo "<script>alert('Gagal Tambah Data Silahkan Ulangi Lagi !!!!');</script>";
		
	
		
	}
}
}
 $kodebaru = isset($_POST['txtkodekategori']) ? $_POST['txtkodekategori'] : ' '; 
 $datakategori = isset($_POST['txtjenis']) ? $_POST['txtjenis'] : ' ';
 $datafasilitas = isset($_POST['txtfasilitas']) ? $_POST['txtfasilitas'] :'';
 $dataharga = isset($_POST['txtharga']) ? $_POST['txtharga'] :'';
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
      <td colspan="3">Tambah Kategori Kamar</td>
    </tr>
    <tr>
      <td>No.</td>
      <td>:</td>
      <td><label for="txtharga"></label>
       <?php
	  $query = "SELECT max(kd_kategori) as maxKode FROM tbl_kategori_kamar";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$kodebaru = $data['maxKode'];

$noUrut = (int) substr($kodebaru, 3,3 );	
$noUrut++;
$char = "KTG";
$kodebaru = $char . sprintf("%03s", $noUrut);
	  ?>
      <input name="txtkodekategori" type="text" id="txtkodekategori" readonly="readonly" value="<?php echo $kodebaru;?>" /></td>
    </tr>
    <tr>
      <td>Jenis Kamar</td>
      <td>:</td>
      <td><label for="txtfasilitas"></label>
      <input name="txtjenis" type="text" id="txtjenis" value="<?php echo $datakategori;?>" size="50" maxlength="100" /></td>
    </tr>
    <tr>
      <td>Fasilitas</td>
      <td>:</td>
      <td><label for="txtfasilitas"></label>
      <textarea name="txtfasilitas" cols="50" rows="5" id="txtfasilitas"><?php echo $datafasilitas;?></textarea></td>
    </tr>
    <tr>
     <td>Harga Kamar</td>
      <td>:</td>
      <td><label for="txtharga"></label>
      <input name="txtharga" type="text" id="txtharga" value="<?php echo $dataharga;?>" /></td>
    </tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnsimpan" id="btnsimpan" value="Tambah" />
      <input type="submit" name="button2" id="button2" value="Batal" /></td>
    </tr>
  </table>
</form>
</body>
</html>