<?php
	
	class System{
		
		private $db;
		private $yayin;
		
		public function __construct($db, $yayin){
			$this->db = $db;
			$this->yayin = $yayin;
		}

		function resimVarmi($link, $default){
			if(file_exists(dirname(dirname(dirname(__FILE__))).$link)){
				return URL.$link;
			}else{
				return URL.$default;
			}
		}

		function hataYazdir($yazi, $tip=0){
			switch ($tip) {
				case '0':
					echo '<div class="alert alert-success">'.$yazi.'</div>';
					break;
				case '1':
					echo '<div class="alert alert-error">'.$yazi.'</div>';
					break;
			}
		}

		function digerKanal($id){
			
			$sql = "SELECT * FROM kanallar WHERE kanal_id != '$id'";
			$row = $this->db->select($sql);
			
			return $row;
		}
		
		function kanalCek($mode=0, $limit=4){
			
			if($mode == 0){
				$sql = "SELECT * FROM kanallar ORDER BY kanal_hit DESC";
			}else{
				$sql = "SELECT * FROM kanallar ORDER BY kanal_hit DESC LIMIT $limit";
			}
			$row = $this->db->select($sql);
			
			return $row;
		}
		
		function temaMeta(){

			$sayfa = g('sayfa');
			$link = g("link");
			$tip = array();

			switch ($sayfa) {
				case 'tum-kanallar':
					$sql = "SELECT * FROM kanallar";
					$kanallar = $this->db->select($sql);
					foreach ($kanallar as $kanal) {
						$yaz[] = $kanal['kanal_baslik'];
					}
					$tumKanallar = implode(", ", $yaz);

					$tip[0] = 'Tüm Kanallar - '.SITE_TITLE;
					$tip[1] = $tumKanallar;
					$tip[2] = 'Türkiyedeki bütün kanalların yayın akışı';
				break;
				case 'kanal':
					if($link){

						$bind = array(
							":link" => $link
						);
						$sql = "SELECT * FROM kanallar WHERE kanal_link= :link";
						$kanal = $this->db->select($sql, $bind)[0];

						$tip[0] = $kanal['kanal_baslik'].' Yayın Akışı - '.SITE_TITLE;
						$tip[1] = $kanal['kanal_baslik'].' kanalının günlük yayın akışı';
						$tip[2] = SITE_KEYW;
					}
				break;
				case 'iletisim':
					$tip[0] = 'İletişim - '.SITE_TITLE;
					$tip[2] = SITE_KEYW;
				break;
				default:
					$tip[0] = SITE_TITLE;
					$tip[1] = SITE_DESC;
					$tip[2] = SITE_KEYW;
				break;
			}

			return $tip;
		}

		function kanalTarihMenu(){

			$sql = "SELECT * FROM bot WHERE bot_id=1";
			$row = $this->db->select($sql)[0];

			return $row;
		}

		function temaIcerik(){
			
			$sayfa = g('sayfa');
			switch ($sayfa){
				
				case "tum-kanallar":
				
					$sql = "SELECT * FROM kanallar";
					$kanallar = $this->db->select($sql);
					
					require(TEMPLATE."/kanallar.php");
				break;
				case "kanal":
				if($link = g("link")){

					$gunler = array(
					    'Pazartesi',
					    'Salı',
					    'Çarşamba',
					    'Perşembe',
					    'Cuma',
					    'Cumartesi',
					    'Pazar'
					);

					$tarih = $this->kanalTarihMenu();

					$bind = array(
						":link" => $link
					);
					$sql = "SELECT * FROM kanallar WHERE kanal_link= :link";
					if($this->db->affectedRows($sql, $bind) > 0){
						$kanal = $this->db->select($sql, $bind)[0];
					}else{
						go(URL.'/tum-kanallar');
					}

					require(TEMPLATE."/kanal.php");
				}else{
					go(URL);
				}
				break;
				case "iletisim":

					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->SMTPAuth = true;
					$mail->Host = 'smtp.gmail.com';
					$mail->Port = 465;
					$mail->SMTPSecure = 'ssl';
					$mail->Username = 'EMAILADDRESS';
					$mail->Password = 'EMAILPASSWORD';
					$mail->CharSet = 'UTF-8';
					$mail->AddAddress('EMAILADDRESS', 'NAME');

					require(TEMPLATE."/iletisim.php");
				break;
				default:
				require_once(TEMPLATE."/default.php");
				break;
			}
			
		}
		
	}
	
?>