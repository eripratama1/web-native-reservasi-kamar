<?php
function buatKode($tabel, $inisial){
	include "koneksidb.php";
	$sql      = ("Select * from $tabel");
	$struktur = mysqli_query($koneksi,$sql);
	$field    = mysqli_fetch_field_direct ($struktur,0);
	$panjang  = mysqli_field_len ($struktur,0);
	
	$hasil = mysqli_fetch_field($struktur,0);
	
	$Sql    = ("SELECT MAX(".$field.") FROM ".$tabel); 
	$qry	= mysqli_query($koneksi,$Sql);
 	$row	= mysqli_fetch_array($qry); 
	
	if ($row[0]=="") {
		$angka=0;
	}
	
	else {
		$angka = substr($row[0], strlen($inisial));
	}
	
	$angka++;
	$angka = strval($angka);
	$tmp = "";
	for ($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";
	}
	return $inisial.$tmp.$angka;
}
function format_angka($angka) {
	if ($angka > 1) {
		$hasil =  number_format($angka,0, ",",".");
	}
	else {
		$hasil = 0; 
	}
	return $hasil;
}
function buatKodeOtomatisKamar(){
	include "koneksidb.php";
// mencari kode barang dengan nilai paling besar
$query = "SELECT max(no_kamar) as maxKode FROM tbl_kamar";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$kodebaru = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodebaru, 5,3 );

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "Room-";
$kodebaru = $char . sprintf("%03s", $noUrut);
echo $kodebaru;
}
?>