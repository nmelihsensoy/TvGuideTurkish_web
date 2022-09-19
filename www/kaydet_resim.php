<?php
	ini_set('max_execution_time', 0);

	include('system/libs/Bot.php');
	include('system/libs/Json.php');
	
	$yayin = new yayinBot();

	$tarihArray = $yayin->tarihCek();

	//Eski program fotoğraflarını sil
	$files = glob('uploads/*'); 
	foreach($files as $file){ 
	  if(is_file($file))
	    unlink($file); 
	}
	
	foreach ($tarihArray as $tarih) {
		//Programların fotoğraflarını kaydet
		$dosya = date("dmY", strtotime($tarih)).'.json';
		$json = new Yayin('json/'.$dosya);
		$json->programResimKaydet('uploads');
	}
?>