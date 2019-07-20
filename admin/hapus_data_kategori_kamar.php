<?php 
include "koneksidb.php";
if(empty($_GET['Kode'])){
	echo "<b>Data yang dihapus tidak ada</b>";
}
else {
	
	$Kode	= $_GET['Kode'];
	$mySql 	= "DELETE FROM tbl_kategori_kamar WHERE no_kamar='$Kode'";
	$myQry 	= mysqli_query($koneksi,$mySql) or die ("Error hapus data".mysqli_error());
	if($myQry){
		echo "<meta http-equiv='refresh' content='0; url=?open=Manajemen Kategori'>";
	}
}
?>