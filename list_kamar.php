<?php include "koneksidb.php"; ?>
<div class="halaman">
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="1" align="center" cellpadding="2" cellspacing="3" class="tablestyle">
    <tr>
      <td align="center">Daftar Kamar</td>
    </tr>
     <?php 
	$mysql = "Select * from tbl_kategori_kamar ";
	$qry   = mysqli_query($koneksi,$mysql) or die ("Error".mysqli_error());
	while ($mydatakamar = mysqli_fetch_array($qry)) {
		$Kode = $mydatakamar['kd_kategori'];
	?>
    <tr>
      <td align="center"><?php echo"<a href=?page=Kategori&Kode=$Kode>$mydatakamar[jenis_kamar]</a>"; ?></td>
    </tr>    
 <?php } ?>
  </table>
</form>
</div>