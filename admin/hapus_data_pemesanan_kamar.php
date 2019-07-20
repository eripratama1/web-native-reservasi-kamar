<?php 
include "koneksidb.php";
if(empty($_GET['kode'])){
	echo "<b>Data yang dihapus tidak ada</b>";
}
else {
	
	$kode	= $_GET['kode'];
	$mySql 	= "DELETE FROM tbl_reservasi_kamar WHERE no_kamar='$kode'";
	$myQry 	= mysqli_query($koneksi,$mySql) or die ("Error hapus data".mysqli_error());
	if($myQry){
		//echo "<meta http-equiv='refresh' content='0; url=?open=Data Pemesanan'>";
	}
}
?>
<?php

 //$stok = $_POST['stok'];
	$kode = $_GET['kode'];
	$mysql = "Update tbl_kamar set 
	                  Ketersediaan = 'Available' where no_kamar = '$kode'";
	$query = mysqli_query ($koneksi,$mysql) or die ("Error query".mysqli_error());
	if ($query) {
		echo "<script>alert('Kamar Berhasil Di Kosongkan...'); window.location='?open=Data Pemesanan'</script>";
	} else {
		echo "<script>alert('Perubahan Gagal Silahkan Ulangi Lagi !!!!');</script>";
		
	}




?>