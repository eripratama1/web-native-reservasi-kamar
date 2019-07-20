<?php
if (isset($_GET['page'])) {
	switch($_GET['page']) {
		
		case 'Beranda':
		if(!file_exists("beranda.php")) die ("Halaman Tidak Ada!!");
		include "beranda.php"; break;
		
		case 'Daftar Kamar':
		if(!file_exists("list_kamar.php")) die ("Halaman Tidak Ada!!");
		include "list_kamar.php"; break;
		
		case 'Kategori':
		if(!file_exists("kategori_kamar2.php")) die ("Halaman Tidak Ada!!");
		include "kategori_kamar2.php"; break;
		
		case 'Layanan':
		if(!file_exists("layanan.php")) die ("Halaman Tidak Ada!!");
		include "layanan.php"; break;
		
		case 'Reservasi':
		if(!file_exists("form_pesan_kamar.php")) die ("Halaman Tidak Ada!!");
		include "form_pesan_kamar.php"; break;
			
		default:
		if(!file_exists("beranda.php")) die ("Halaman Tidak Ada!!");
		include "beranda.php"; break;
		
	}
}
    else {
		if(!file_exists("beranda.php")) die ("Halaman Tidak Ada!!");
		include "beranda.php";
	}
?>