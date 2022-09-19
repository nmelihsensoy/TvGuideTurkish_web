<?php
	ini_set('max_execution_time', 1000);

	include('system/libs/Bot.php');
	include('system/libs/Json.php');
	
	$yayin = new yayinBot();

	$tarihArray = $yayin->tarihCek();

	foreach ($tarihArray as $tarih) {

		$dosya = date("dmY", strtotime($tarih)).'.json';
		$yayin->tarih = $tarih;
		$yayin->jsonDosyaCikti('json/'.$dosya);	
		
	}

	//Veritabanına güncelleme tarihini kaydet
	$yayin->dbTarihYaz($tarihArray[0], $tarihArray[1], $tarihArray[2]);
?>