<?php include "koneksidb.php"; 
        
if (isset($_POST['btnsimpan'])) {
	
	$txtjenis = $_POST['txtjenis'];
	$rbstok  = $_POST['rbstok'];
	$txtharga = $_POST['txtharga'];
	$txtfasilitas = $_POST['txtfasilitas'];
	
	
    $pesanError = array();
	if (trim($txtjenis)=="") {
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
	                  Ketersediaan = '$rbstok' where no_kamar = '$Kode'";
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
 $datajenis = isset($_POST['txtjenis']) ? $_POST['txtjenis']:$dataedit['jenis_kamar'];
 $datastok  = isset($_POST['txtstok']) ? $_POST['txtstok']:$dataedit['Ketersediaan'];
 $datafasilitas = isset($_POST['txtfasilitas']) ? $_POST['txtfasilitas']:$dataedit['fasilitas'];
 $dataharga = isset($_POST['txtharga']) ? $_POST['txtharga']:$dataedit['harga_kamar'];

?>
<?php 
include "koneksidb.php";
include "function.php";

if (isset($_POST['btnsimpan'])) {
	
$txtnokamar         = $_POST['txtnokamar'];
$txtjenis           = $_POST['txtjenis'];
$rbstok             = $_POST['rbstok'];
$txtfasilitas       = $_POST['txtfasilitas'];    
$txtharga           = $_POST['txtharga'];
$txtnama            = $_POST['txtnama'];
$txtnoid            = $_POST['txtnoid'];
$txtalamat          = $_POST['txtalamat'];
$txtnotelepon       = $_POST['txtnotelepon'];
$txttglin           = $_POST['txttglin'];
$txttglout          = $_POST['txttglout'];
$txtnoreservasi     = $_POST['txtnoreservasi'];
 $pesanError = array();
	if (trim($rbstok)=="") {
		$pesanError[] = "Opsi pemesanan kamar belum di pilih ! ! !";
	}
	if (trim($txtnama)=="") {
		$pesanError[] = "Nama pemesan Masih Kosong ! ! !";
	}
	if (trim($txtnoid)=="") {
		$pesanError[] = "Nomor Identitas  Masih Kosong ! ! !";
	}
	if (trim($txtalamat)=="") {
		$pesanError[] = "Alamat pemesan  Masih Kosong ! ! !";
	}
	if (trim($txtnotelepon)=="") {
		$pesanError[] = "Nomor Telepon  Masih Kosong ! ! !";
	}
    if (trim($txttglin)=="") {
		$pesanError[] = "Tanggal Cek-In Masih Kosong ! ! !";
	}
	if (trim($txttglout)=="") {
		$pesanError[] = "Tanggal Cek-Out Masih Kosong ! ! !";
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


$mysql = "insert into tbl_reservasi_kamar (no_kamar,jenis_kamar,ketersediaan,harga_kamar,nama_reservasi,no_identitas,alamat,no_telepon,tgl_cek_in,tgl_cek_out,no_reservasi) values ('$txtnokamar','$txtjenis','$rbstok','$txtharga','$txtnama','$txtnoid','$txtalamat','$txtnotelepon','$txttglin','$txttglout','$txtnoreservasi')";
$query = mysqli_query($koneksi,$mysql) or die ("Gagal Simpan Data".mysqli_error());
if ($query) {
	echo "<script>alert('Pemesanan Berhasil Terima Kasih...'); window.location='index.php'</script>";
	} else {
		echo "<script>alert('Pemesanan Gagal Silahkan Ulangi Lagi !!!!');</script>";
		
	}

}

//$datajenis = isset($_POST['txtjenis']) ? $_POST['txtjenis'] : '';
//$dataharga = isset($_POST['txtharga']) ? $_POST['txtharga'] :'';
$kodebaru = isset($_POST['txtnoreservasi']) ? $_POST['txtnoreservasi']:'';
$datanokamar = isset($_POST['txtnokamar']) ? $_POST['txtnokamar']:'';
$datanama    = isset($_POST['txtnama']) ? $_POST['txtnama']:'';
$datanoid    = isset($_POST['txtnoid']) ? $_POST['txtnoid']:'';
$dataalamat  = isset($_POST['txtalamat']) ? $_POST['txtalamat']:'';
$datanotelepon = isset($_POST['txtnotelepon']) ? $_POST['txtnotelepon']:'';
$datatglin   = isset($_POST['txttglin']) ? $_POST['txttglin']:'';
$datatglout  = isset($_POST['txttglout']) ? $_POST['txttglout']:'';

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
      <td colspan="3" align="center">Form Reservasi Kamar</td>
    </tr>
    <tr>
      <td>No.Kamar</td>
      <td>:</td>
      <td><label for="fasilitas"></label>
      <input name="txtnokamar" type="text" id="txtnokamar" value="<?php echo $datakode;?>" size="20" readonly="readonly" /><input name="txtKode" type="hidden" value="<?php echo $datakode; ?>" /></td>
    </tr>
    <tr>
      <td>Jenis Kamar</td>
      <td>:</td>
      <td><label for="cmbjenis"></label>
        <label for="txtjenis"></label>
        <input name="txtjenis" type="text" id="txtjenis" value="<?php echo $datajenis;?>" size="50" readonly="readonly" />
<label for="txtkd"></label></td>
    </tr>
    <tr>
      <td>Ketersediaan Kamar</td>
      <td>:</td>
      <td><label for="cmbstok"></label>
        <label for="txtstok"></label>
        <input type="radio" name="rbstok" id="radio2" value="Reserved" required="required" />
        <label for="rbstok">Reserved</label></td>
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
      <input name="txtharga" type="text" id="txtharga" value="<?php echo $dataharga;?>" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>Nama Reservasi</td>
      <td>:</td>
      <td><label for="txtnama"></label>
      <input name="txtnama" type="text" placeholder="Nama Pemesan" required="required" id="txtnama" value="<?php echo $datanama;?>" size="50" /></td>
    </tr>
    <tr>
      <td>No.Identittas</td>
      <td>:</td>
      <td><label for="txtnoid"></label>
      <input name="txtnoid" type="text" placeholder="Nomor Identitas Pemesan" required="required" id="txtnoid" value="<?php echo $datanoid;?>" size="35" /></td>
    </tr>
    <tr>
      <td>Alamat </td>
      <td>:</td>
      <td><label for="txtalamat"></label>
      <textarea name="txtalamat" cols="45" rows="5" placeholder="Alamat" required="required" id="txtalamat"><?php echo $dataalamat;?></textarea></td>
    </tr>
    <tr>
      <td>No.Telepon</td>
      <td>:</td>
      <td><label for="txtnotelepon"></label>
      <input name="txtnotelepon" type="text" placeholder="Nomor Telepon" required="required" id="txtnotelepon" value="<?php echo $datanotelepon;?>" size="35" /></td>
    </tr>
    <tr>
      <td>Tanggal Cek-In</td>
      <td>:</td>
      <td><label for="txttglin"></label>
      <input name="txttglin" type="date" required="required" id="txttglin" value="<?php echo $datatglin;?>" /></td>
    </tr>
    <tr>
      <td>Tanggal Cek-Out</td>
      <td>:</td>
      <td><label for="txttglout"></label>
      <input name="txttglout" type="date" required="required" id="txttglout" value="<?php echo $datatglout;?>" /></td>
    </tr>
    <tr>
      <td>No.Reservasi</td>
      <td>:</td>
      <td><label for="txtnoreservasi"></label>
      <?php
	  $query = "SELECT max(no_reservasi) as maxKode FROM tbl_reservasi_kamar";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$kodebaru = $data['maxKode'];

$noUrut = (int) substr($kodebaru, 5,3 );	
$noUrut++;
$char = "Rsvd-";
$kodebaru = $char . sprintf("%03s", $noUrut);
	  ?>
      <input name="txtnoreservasi" type="text" required="required" id="txtnoreservasi" value="<?php echo 
	  $kodebaru;?>" size="20" readonly="readonly" /></td>
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
 
</form>
</body>
</html>