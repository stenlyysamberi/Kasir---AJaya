<?php 

function enkrip ( $s){
	$key = 'd8578edf8458ce06fbc5bb76a58c5ca4';
	$keycode = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,md5($key), $s, MCRYPT_MODE_CBC, md5(md5($key))));
 return($keycode);

}

function dekrip ($s){
		$key = 'd8578edf8458ce06fbc5bb76a58c5ca4';
		$keydek = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,md5($key),base64_decode($s), MCRYPT_MODE_CBC,md5(md5($key))),"\0");
		return($keydek);
}