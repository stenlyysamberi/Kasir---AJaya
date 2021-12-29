<?php 

function salam(){
	date_default_timezone_set("Asia/Jakarta");

	$jam = date('H:i');

	if ($jam > '05:30' && $jam < '10.00') {
		// code...
		echo "Hi, Selamat Pagi";
	}elseif($jam >= '10:00' && $jam < '15:00'){
		echo "Hi, Selamat Siang";
	}elseif($jam < '18:00'){
		echo "Hi, Selamat Sore";
	}else{
		echo "Hi, Selamat Malam";
	}

}
