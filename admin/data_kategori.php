<?php 
include "koneksidb.php";
?>
<div class="halaman">
<form name="form1" method="post" action="">
  <table width="500" border="1" cellspacing="2" cellpadding="3" align="center">
    <tr>
      <td colspan="5">Tambah Data Kategori</td>
    </tr>
    <tr>
      <td>No</td>
      <td>Kode Kategori</td>
      <td>Nama Kategori</td>
      <td colspan="2">Pengaturan</td>
    </tr>
    <?php 
	$mysql = "Select * from tbl_kategori_stok order by nama_stok";
	$myqry = mysqli_query($koneksi,$mysql) or die ("Error".mysqli_error());
	$nomor = 0;
	while ($datakategori = mysqli_fetch_array($myqry)) {
		$nomor++;
		$kode = $datakategori['kd_stok'];
	?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $datakategori['kd_stok'];?></td>
      <td><?php echo $datakategori['nama_stok'];?></td>
      <td><a href="?open=Update Data Kategori Kamar&Kode=<?php echo $Kode;?>">Edit</a></td>
      <td><input type="checkbox" name="checkbox" id="checkbox">
      <label for="checkbox"></label>
      Hapus</td>
    </tr>
    <?php 
	}
	?>
  </table>
</form>
</div>
