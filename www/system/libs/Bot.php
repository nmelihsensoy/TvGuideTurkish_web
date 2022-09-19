<?php
	
	include('Database.php');
	include('simple_html_dom.php');
	
	class yayinBot{
		
		public $tarih;
		private $db;

		function __construct(){
			$this->db = new Database('mysql:dbname=yayin;charset=utf8;host=127.0.0.1', 'DBUSERNAME', 'DBPASSWORD');
		}

		function kanalCurlSite($kanal){
			$tarih = $this->tarih;
			$user_agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Trans/20041002 Firefox/0.10';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://DATAPROVIDERURL/zaman-akisi/'.$tarih);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , FALSE);
	    	curl_setopt($ch, CURLOPT_RETURNTRANSFER , TRUE);
	    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION , TRUE);
	    	curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		    curl_setopt($ch, CURLOPT_COOKIEJAR, "cookies.txt");
		    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt");
	    	curl_setopt($ch, CURLOPT_REFERER, "http://DATAPROVIDERURL/yayin-akisi/".$kanal);
			curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
			$icerik = curl_exec($ch);
			curl_close($ch);
			return $icerik;
		}

		function tarihCek(){
			$html = new simple_html_dom();
			$html->load($this->kanalCurlSite('http://DATAPROVIDERURL/'), true, false);
			foreach($html->find('div.TVCalendar') as $article) {
				foreach($article->find('div.number a') as $articles) {
					$tarih = substr($articles->href, -10);
					$item[] = date('d.m.Y', strtotime($tarih));
				}
			}
			return $item;
		}

		function kanalCek($site){
			$html = new simple_html_dom();
			$html->load($this->kanalCurlSite($site), true, false);
			
			foreach($html->find('li.ProgramFilmExpanded') as $article) {
				$item['baslik']    = trim($article->find('div.TimelineName', 0)->plaintext);
				$time      		   = $article->find('div.TimelineDuration', 0)->plaintext;
				$time 			   = explode("-", mb_substr(trim($time),6,-12,'UTF-8'));
				$item['baslangic'] = date("H:i", strtotime($time[0]));
				$item['bitis']     = date("H:i", strtotime($time[1]));
				$item['tur']       = mb_substr(trim($article->find('div.TimelineGenre', 0)->plaintext),4, 30,'UTF-8');
				$resim             = $article->find('div.image img', 0)->getAttribute('src');
				//$resim1     	   = explode('/', $resim);
				$item['resim']     = $resim;
				$item['ozet']      = mb_substr(trim($article->find('div.TimelineSummary', 0)->plaintext),5,200,'UTF-8');
				
				$articles[] = $item;
			}

			return $articles;			
		}
		
		function dbTarihYaz($tarih, $tarihIki, $tarihUc){

			$tarih = array(
				"bot_tarih" => $tarih,
				"bot_tarih_iki" => $tarihIki,
				"bot_tarih_uc" => $tarihUc
			);

			$update = $this->db->update("bot", $tarih, "bot_id=1");

		}

		function dbKanalCek(){
			
			$sql = "SELECT * FROM kanallar";
			$query = $this->db->select($sql);
			
			foreach($query as $kanal){
				$item['kanal_adi'] = $kanal['kanal_baslik'];
				$item['kanal_logo'] = $kanal['kanal_logo'];
				$item['program'] = $this->kanalCek($kanal['kanal_bot_link']);
				
				$items[] = $item;
			}
			
			return $items;
		}
		
		function akisJson(){
			$channels["kanallar"] = $this->dbKanalCek();
			return json_encode($channels);
		}
		
		function jsonDosyaCikti($file){
			
			if(!file_exists($file)){
				touch($file);
			}
			
			$dosya = fopen($file, "w");
			fwrite($dosya, $this->akisJson());
			
			fclose($dosya);
		}
		
	}
	
?>