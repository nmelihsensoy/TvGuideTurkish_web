<?php
	
	function validateDate($date, $format = 'Y-m-d H:i:s'){
	    $d = DateTime::createFromFormat($format, $date);
	    return $d && $d->format($format) == $date;
	}
	
	function klasorListele($dizin){
		$dizinAc = opendir($dizin) or die ("Dizin Bulunamadı!");
		while ($dosya = readdir($dizinAc)){
			if (is_dir($dizin."/".$dosya) && $dosya != '.' && $dosya != '..'){
				echo "<option ";
				echo $dosya == TEMPLATE_DIR ? 'selected' : null;
				echo " value='{$dosya}'>{$dosya}</option>";
			}
		}
	}
	
	function aktifProgram($start_date, $end_date, $todays_date, $isLast=0){

	    $start_timestamp = strtotime($start_date);
		$end_timestamp = strtotime($end_date);
		$today_timestamp = strtotime($todays_date);

		if(($today_timestamp > $start_timestamp) and ($today_timestamp <= $end_timestamp)){
			return true;
		}elseif (($today_timestamp > $start_timestamp) and ($isLast == 1)) {
			return true;
		}else{
			return false;
		}

	}
	
	function yuzdeYaz($ilk, $son, $now){
		
		$ilktime = strtotime($ilk);
		$sontime = strtotime($son);
		$nowtime = strtotime($now);
		
		return ($nowtime-$ilktime) / ($sontime-$ilktime) * 100;
		
	}
	
	function p($par, $st = false){
		if ($st){
			return htmlspecialchars(addslashes(trim($_POST[$par])));
		}else {
			return addslashes(trim($_POST[$par]));
		}
	}
	
	function g($par){
		return strip_tags(trim(addslashes($_GET[$par])));
	}
	
	function kisalt($par, $uzunluk = 50){
		if (strlen($par) > $uzunluk){
			$par = mb_substr($par, 0, $uzunluk, "UTF-8")."..";
		}
		return $par;
	}
	
	function go($par, $time = 0){
		if ($time == 0){
			header("Location: {$par}");
		}else {
			header("Refresh: {$time}; url={$par}");
		}
	}
	
	function session($par){
		if ($_SESSION[$par]){
			return $_SESSION[$par];
		}else {
			return false;
		}
	}

	function cookie($par){
		if ($_COOKIE[$par]){
			return $_COOKIE[$par];
		}else {
			return false;
		}
	}
	
	function ss($par){
		return stripslashes($par);
	}
	
	function sessionOlustur($par){
		foreach ($par as $anahtar => $deger){
			$_SESSION[$anahtar] = $deger;
		}
	}
	
	function sefLink($baslik){
		$bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
		$yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
		$perma = strtolower(str_replace($bul, $yap, $baslik));
		$perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
		$perma = trim(preg_replace('/\s+/',' ', $perma));
		$perma = str_replace(' ', '-', $perma);
		return $perma;
	}
	
?>