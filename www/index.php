<?php

	// Gerekli Dosyalar
	require_once('system/ayar.php');
	require_once('system/function.php');
	require_once('system/libs/Json.php');
	require_once('system/libs/class.phpmailer.php');
	require_once('system/libs/System.php');
	

	$bugun = date('dmY');
	$gun = g('gun');

	if(validateDate($gun, 'dmY')){
		$dosya = $gun;
	}else{
		$dosya = $bugun;
	}
	
	if(file_exists('json/'.$dosya.'.json')){
		$jsonFile = 'json/'.$dosya.'.json';
	}else{
		$jsonFile = 'json/'.$bugun.'.json';
	}

	if($ayar['site_durum'] == 1){

		$yayin = new Yayin($jsonFile);
		$system = new System($db, $yayin);
		require(TEMPLATE."/index.php");
		
	}else{
		echo "Site Kapalı";
	}

?>