<?php include "koneksidb.php"; 
//include "function.php";
if (isset($_POST['btnsimpan'])) {
	
	$txtnokamar = $_POST['txtnokamar'];
	$cmbjenis = $_POST['cmbjenis'];
	$cmbstok  = $_POST['cmbstok'];
	$txtkd    = $_POST['txtkd'];
	$txtharga = $_POST['txtharga'];
	$txtharga = str_replace("'","&acute;",$txtharga);
	$txtfasilitas = $_POST['txtfasilitas'];
	$txtfasilitas = str_replace("'","&acute;",$txtfasilitas);
	
    $pesanError = array();
	if (trim($cmbjenis)=="") {
		$pesanError[] = "Jenis Kamar Masih Kosong ! ! !";
	}
	if (trim($txtfasilitas)=="") {
		$pesanError[] = "Fasilitas Kamar Masih Kosong ! ! !";
	}
	if (trim($txtharga)=="") {
		$pesanError[] = "Harga Kamar Masih Kosong ! ! !";
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
	
$mysql = "insert into tbl_kamar(no_kamar,jenis_kamar,Ketersediaan,fasilitas,harga_kamar,kd_kategori) values ('$txtnokamar','$cmbjenis','$cmbstok','$txtfasilitas','$txtharga','$txtkd')";
	$query = mysqli_query ($koneksi,$mysql) or die ("Gagal Simpan Data".mysqli_error());
	if ($query) {
		echo "<script>alert('Berhasil Tambah Data..'); window.location='?open=Manajemen Kamar'</script>";
	} else {
		echo "<script>alert('Gagal Tambah Data Silahkan Ulangi Lagi !!!!');</script>";
		
	}
	
}
}
 $kodebaru =  isset($_POST['txtnokamar']) ? $_POST['txtnokamar']:'';
 $datajenis = isset($_POST['cmbjenis']) ? $_POST['cmbjenis']:'';
 $datastok  = isset($_POST['cmbstok']) ? $_POST['cmbstok']:'';
 $datafasilitas = isset($_POST['txtfasilitas']) ? $_POST['txtfasilitas']:'';
 $dataharga = isset($_POST['txtharga']) ? $_POST['txtharga']:'';
 $datakd    = isset($_POST['txtkd']) ? $_POST['txtkd']:'';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="0" align="center" class="tablestyle">
    <tr>
      <td colspan="3" align="center">Form Tambah Kamar</td>
    </tr>
    <tr>
      <td>No.Kamar</td>
      <td>:</td>
      <td><label for="fasilitas"></label>
      <?php
	  $query = "SELECT max(no_kamar) as maxKode FROM tbl_kamar";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$kodebaru = $data['maxKode'];

$noUrut = (int) substr($kodebaru, 5,3 );	
$noUrut++;
$char = "Room-";
$kodebaru = $char . sprintf("%03s", $noUrut);
	  ?>
      <input name="txtnokamar" type="text" id="txtnokamar" readonly="readonly" value="<?php echo $kodebaru;?>" />
      <label for="textfield2"></label></td>
    </tr>
    <tr>
      <td>Jenis Kamar</td>
      <td>:</td>
      <td><label for="cmbjenis"></label>
        <select name="cmbjenis" onchange="changeValue(this.value)" id="cmbjenis">
        <option value="Kosong">....</option>
        <?php 
		$sql   = "select * from tbl_kategori_kamar";
		$result = mysqli_query($koneksi,$sql);
        $jsArray = "var dtkategori = new Array();\n";
		while ($row = mysqli_fetch_array($result)) {
    	echo '<option value="' . $row['jenis_kamar'] . '">' . $row['jenis_kamar'] . '</option>';
    	$jsArray .= "dtkategori['" . $row['jenis_kamar'] . "'] = {fasilitas_kamar:'" . addslashes($row['fasilitas_kamar']) . "',kd_kategori:'".addslashes($row['kd_kategori'])."',harga_kamar:'".addslashes($row['harga_kamar'])."'};\n";
		}
		?>
        
        
      </select>
      <input name="txtkd" type="hidden" id="txtkd" value="<?php echo $datakd;?>" /></td>
    </tr>
    <tr>
      <td>Ketersediaan Kamar</td>
      <td>:</td>
      <td><label for="cmbstok"></label>
        <select name="cmbstok" id="cmbstok">
         <option value="Kosong">....</option>
        <?php 
		$sql = "Select * from tbl_kategori_stok order by nama_stok";
		$qry = mysqli_query($koneksi,$sql) or die ("Error".mysqli_error());
		while ($data = mysqli_fetch_array($qry)) {
			if ($data['nama_stok']== $datakategori) {
				$cek = "selected";
			} else { $cek=""; }
			echo "<option value='$data[nama_stok]' $cek> $data[nama_stok] </option>";
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Fasilitas Kamar</td>
      <td>:</td>
      <td><label for="txtfasilitas"></label>
      <textarea  name="txtfasilitas" id="txtfasilitas" readonly="readonly" cols="45" rows="5"><?php echo $datafasilitas;?></textarea></td>
    </tr>
    <tr>
      <td>Harga Kamar</td>
      <td>:</td>
      <td><label for="fasilitas"></label>
      <input name="txtharga" type="text" id="txtharga" value="<?php echo ($dataharga);?>" /></td>
    </tr>
    <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><label for="txtfasilitas">
        <input type="submit" name="btnsimpan" id="btnsimpan" value="Simpan" />
        <input type="submit" name="button3" id="button3" value="Batal" />
      </label></td>
    </tr>
  </table>
  <script type="text/javascript">
<?php echo $jsArray; ?>
function changeValue(jenis_kamar){
document.getElementById('txtfasilitas').value = dtkategori[jenis_kamar].fasilitas_kamar;
document.getElementById('txtkd').value = dtkategori[jenis_kamar].kd_kategori;
document.getElementById('txtharga').value = dtkategori[jenis_kamar].harga_kamar;
};
</script>
</form>
</body>
</html>