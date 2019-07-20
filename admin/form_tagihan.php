<?php 
include "koneksidb.php";
include "function.php";
if (isset($_POST['btnhitung'])) {
	$txttglin  = $_POST['txttglin'];
	$txttglout = $_POST['txttglout'];
	$txtharga  = $_POST['txtharga'];
	$cmbrsvd   = $_POST['cmbrsvd'];
	$txtnama   = $_POST['txtnama'];
		
	$selisih = ((abs(strtotime($txttglin)-strtotime($txttglout)))/(60*60*24));
	$total = $txtharga*$selisih;
	echo "<center><h3>Total Tagihan atas Nama $txtnama No Reservasi $cmbrsvd adalah Rp.$total</h3></center>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">

  <table width="500" border="1" class="tablestyle" align="center">
    <tr>
      <td colspan="2">Hitung Tagihan</td>
    </tr>
   
    <tr>
      <td>Masukkan No Pemesanan</td>
      <td><label for="cmbrsvd"></label>
        <select name="cmbrsvd" id="cmbrsvd" onchange="changeValue(this.value)">
        <option value="Pilih">Pilih No Pemesanan Yang Tersedia</option>
        <?php 
        $sql = "Select * from tbl_reservasi_kamar";
		$result = mysqli_query($koneksi,$sql) or die ("Error");
		$jsArray = "var dtorder = new Array();\n";
		while  ($row = mysqli_fetch_array($result)) {
			echo '<option value="' . $row['no_reservasi']. '">' . $row['no_reservasi'] . '</option>';
$jsArray .= "dtorder['" . $row['no_reservasi'] . "'] = {jenis_kamar:'" . addslashes($row['jenis_kamar']) . "',harga_kamar:'".addslashes($row['harga_kamar'])."',tgl_cek_in:'".addslashes($row['tgl_cek_in'])."',tgl_cek_out:'".addslashes($row['tgl_cek_out'])."',nama_reservasi:'".addslashes($row['nama_reservasi'])."'};\n";
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Jenis &amp; Harga Kamar</td>
      <td><label for="txtjenis"></label>
      <input type="text" name="txtjenis" id="txtjenis" /> <label for="txtharga"></label>
      <input name="txtharga" type="text" id="txtharga" /></td>
    </tr>
    <tr>
      <td>Tgl Cek In</td>
      <td><label for="txttglin"></label>
      <input type="text" name="txttglin" id="txttglin" />
      <label for="txtnama"></label>
      <input type="hidden" name="txtnama" id="txtnama" /></td>
    </tr>
    <tr>
      <td>Tgl Cek Out</td>
      <td><label for="txttglout"></label>
      <input type="text" name="txttglout" id="txttglout" />
      <input name="txtselisih" type="hidden" id="txtselisih" value="<?php echo $selisih;?>" /></td>
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td><label for="txttglout"></label>
       <label for="txtselisih">
         <input type="submit" name="btnhitung" id="btnhitung" value="Hitung" />
       </label></td>
    </tr>
    
  </table>
  <script type="text/javascript">
<?php echo $jsArray; ?>
function changeValue(no_reservasi){
document.getElementById('txtjenis').value = dtorder[no_reservasi].jenis_kamar;
document.getElementById('txtharga').value = dtorder[no_reservasi].harga_kamar;
document.getElementById('txttglin').value = dtorder[no_reservasi].tgl_cek_in;
document.getElementById('txttglout').value = dtorder[no_reservasi].tgl_cek_out;
document.getElementById('txtnama').value = dtorder[no_reservasi].nama_reservasi;
};
</script>
</form>

</body>
</html>