<?php
	
	class Yayin{

		private $json;
		private $yayin;
		public  $hata;
		
		function __construct($site){

			$site = file_get_contents($site);
			if($site){
				$this->json = json_decode($site);
				foreach($this->json as $this->yayin);
			}else{
				$this->hata = "Hata Oluştu";
			}
		}

		public function kanalAdiCek($kanal_id){
			return $this->yayin[$kanal_id]->kanal_adi;			
		}
		
		public function tumKanallariCek(){
		
			foreach($this->yayin as $kanal_adi){
				$item['kanal_adi'] = $kanal_adi->kanal_adi;
				$item['kanal_logo'] = $kanal_adi->kanal_logo;

				$items[] = $item;
			}
			
			return $items;
		}
		
		public function kacKanalVar(){			
			return count($this->tumKanallariCek());
		}
		
		public function kanaldaKacProgramVar($kanal_id){			
			return count($this->yayin[$kanal_id]->program);
		}
		
		public function tumProgramlariCek($kanal_id){
			return $this->yayin[$kanal_id]->program;
		}
		
		public function kanalProgramCek($kanal_id, $program_id){
			return $this->yayin[$kanal_id]->program[$program_id];
		}

		public function kanalSonProgramCek($kanal_id){
			return end($this->yayin[$kanal_id]->program);
		}

		public function getYayin(){
			return $this->yayin;
		}

		public function getSonYayin(){
			return end($this->yayin);
		}

		public function kanalTumProgramCek(){
			$kanallar = $this->yayin;
			foreach($kanallar as $key =>$kanal){
				$item['kanal_adi'] = $kanal->kanal_adi;
				$item['kanal_logo'] = $kanal->kanal_logo;
				$item['program'] = $this->tumProgramlariCek($key);
				
				$items[] = $item;
			}
			$channels["kanallar"] = $items;

			return $channels;
		}

		public function programResimLinkCek(){
			foreach ($this->yayin as $program) {
				foreach ($program->program as $resim) {
					$don[] = $resim->resim;
				}
			}

			return $don;
		}

		public function programResimAdiCek($link){
			$new_link = explode('/', $link);
			return end($new_link);
		}

		public function programResimKaydet($destination){
			foreach ($this->programResimLinkCek() as $value){
				if(!file_exists($destination.'/'.$this->programResimAdiCek($value))){
					copy($value, $destination.'/'.$this->programResimAdiCek($value));
				}
			}
		}
		
	}
	
?>