<?php
if (isset($_GET['open'])) {
	switch($_GET['open']) {
		
		case 'Beranda':
		if(!file_exists("beranda.php")) die ("Halaman Tidak Ada!!");
		include "beranda.php"; break;
		
		case 'Manajemen Kamar':
		if (!file_exists("data_kamar.php")) die ("Halaman Tidak Ada!!");
		include "data_kamar.php"; break;
		
				
		case 'Manajemen Kategori':
		if (!file_exists("data_kategori_kamar.php")) die ("Halaman Tidak Ada!!");
		include "data_kategori_kamar.php"; break;
		
		case 'Tambah Data':
		if (!file_exists("form_tambah_kamar.php")) die ("Halaman Tidak ada !!");
		include "form_tambah_kamar.php"; break;
		
		case 'Update Data':
		if (!file_exists("form_update_kamar.php")) die ("Halaman Tidak Ada !!");
		include "form_update_kamar.php"; break;
		
		case 'Hapus Data':
		if (!file_exists("hapus_data_kamar.php")) die ("Halaman Tidak Ada !! ");
		include "hapus_data_kamar.php"; break;
		
		case 'Tambah Kategori Kamar':
		if (!file_exists("form_tambah_kategori_kamar.php")) die ("Halaman Tidak Ada !!");
		include "form_tambah_kategori_kamar.php"; break;
		
		case 'Update Data Kategori Kamar':
		if (!file_exists("form_update_kategori_kamar.php")) die ("Halaman Tidak Ada !!");
		include "form_update_kategori_kamar.php"; break;
		
		case 'Hapus Data Kategori Kamar':
		if (!file_exists("hapus_data_kategori_kamar.php")) die ("Halaman Tidak Ada !! ");
		include "hapus_data_kategeori_kamar.php"; break;
		
		case 'Data Pemesanan':
		if (!file_exists("data_pemesanan_kamar.php")) die ("Halaman Tidak Ada !! ");
		include "data_pemesanan_kamar.php"; break;
		
		case 'Transaksi Pembayaran':
		if (!file_exists("form_tagihan.php")) die ("Halaman Tidak Ada !! ");
		include "form_tagihan.php"; break;
		
		case 'Hapus Data Pemesanan':
		if (!file_exists("hapus_data_pemesanan_kamar.php")) die ("Halaman Tidak Ada !! ");
		include "hapus_data_pemesanan_kamar.php"; break;
		
		
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