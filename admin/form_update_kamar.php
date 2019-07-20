<?php include "koneksidb.php"; 

if (isset($_POST['btnsimpan'])) {
	
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
	$Kode = $_POST['txtKode'];
	$mysql = "Update tbl_kamar set 
	                  jenis_kamar  = '$cmbjenis',
					  Ketersediaan = '$cmbstok',
					  fasilitas    = '$txtfasilitas',
					  harga_kamar  = '$txtharga',
					  kd_kategori  = '$txtkd'  where no_kamar = '$Kode'";
	$query = mysqli_query ($koneksi,$mysql) or die ("Error query".mysqli_error());
	if ($query) {
		
	}
	
}
}
 $Kode  = isset($_GET['Kode']) ? $_GET['Kode'] : $_POST['txtKode'];
 $mySql = "Select * from tbl_kamar where no_kamar = '$Kode'";
 $myQry = mysqli_query($koneksi,$mySql) or die ("Error Update".mysqli_error());
 $dataedit = mysqli_fetch_array($myQry); 
 
 $datakode = $dataedit['no_kamar'];
 $datajenis = isset($_POST['cmbjenis']) ? $_POST['cmbjenis']:$dataedit['jenis_kamar'];
 $datastok  = isset($_POST['cmbstok']) ? $_POST['cmbstok']:$dataedit['Ketersediaan'];
 $datafasilitas = isset($_POST['txtfasilitas']) ? $_POST['txtfasilitas']:$dataedit['fasilitas'];
 $dataharga = isset($_POST['txtharga']) ? $_POST['txtharga']:$dataedit['harga_kamar'];
 $datakd    = isset($_POST['txtkd']) ? $_POST['txtkd']:$dataedit['kd_kategori'];
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
      <td colspan="3" align="center">Form Update Kamar</td>
    </tr>
    <tr>
      <td>No.Kamar</td>
      <td>:</td>
      <td><label for="fasilitas"></label>
      <input name="textfield" type="text" id="textfield" readonly="readonly" value="<?php echo $datakode;?>" /><input name="txtKode" type="hidden" value="<?php echo $datakode; ?>" /></td>
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
    	$jsArray .= "dtkategori['" . $row['jenis_kamar'] . "'] = {fasilitas_kamar:'" . addslashes($row['fasilitas_kamar']) . "',kd_kategori:'".addslashes($row['kd_kategori'])."'};\n";
		}
		?>
        
        
      </select>
        <label for="txtkd"></label>
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
      <input name="txtharga" type="text" id="txtharga" value="<?php echo $dataharga;?>" /></td>
    </tr>
    <tr>
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
};
</script>
</form>
</body>
</html>