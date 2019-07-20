<?php
function buatKode($tabel, $inisial){
	$struktur = mysqli_query("select * from $tabel ");
	$field    = mysqli_field_name ($struktur,0);
	$panjang  = mysqli_field_len ($struktur ,0);
	
	$hasil = mysqli_fetch_field($struktur,0);
	
	$qry	= mysqli_query("SELECT MAX(".$field.") FROM ".$tabel);
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
?>