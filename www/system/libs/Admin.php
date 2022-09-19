<?php
	
	class Admin{

		function __construct(){
			define(ADMIN, true);
		}

		function adminGüvenlik(){
			echo !defined("ADMIN") ? die("Hacking?") : null;
		}

		function adminGirisYap($kadi, $ksifre){

			if(($kadi == ADMIN_USERNAME) and ($ksifre == ADMIN_PASSWORD)){
				return true;		
			}else{
				return false;
			}
		}

		function adminSessionOlustur($uyeKadi){
			$session = array(
				"login" => true,
				"uye_kadi" => $uyeKadi
			);

			sessionOlustur($session);
		}

		function cikisYap(){
			session_destroy();
			$_SESSION = array();
		}

	}

?>