<div class="main_wrapper full-width">
	<section class="banner banner-blue">
		<div class="container_1140 row row-pad clearfix">
			<h2 class="mpzero text-center">Popüler Kanallar</h2>
		</div>
		<div class="container_1140 row row-pad clearfix">
			<?php 
			foreach($this->kanalCek(1, 4) as $kanal) :	
			?>
			<div class="m_col-3 yayin-grid">
				<div class="yayin-box">
					<div class="yayin-top clearfix">
						<img src="<?php echo URL."/uploads/channels/".$kanal['kanal_logo']; ?>" class="kanal-logo pull-left" alt="" width="50" height="50">
						<h3 class="kanal-title mpzero"><a href="<?php echo URL."/kanal/".$kanal['kanal_link']; ?>"><?php echo $kanal['kanal_baslik']; ?></a></h3>
					</div>
					<ul class="yayin-list mpzero">
						<?php
							$cek = $this->yayin->tumProgramlariCek($kanal['kanal_bot_id']);
							end($cek);
							$last_id=key($cek);
							foreach($cek as $key => $program) :
							if($key == $last_id){
								$son = 1;
							}else{
								$son = 0;
							}

							if(aktifProgram($program->baslangic, $program->bitis, date("H:i"), $son)){
								$aktif = "active";
								$icon = '<span class="icon-live now pull-right"></span>';
							}else{
								$aktif = "";
								$icon = "";
							}
						?>
						<li class="<?php echo $aktif; ?>" data-baslik="<?php echo $program->baslik; ?>" data-ozet="<?php echo $program->ozet; ?>" data-tur="<?php echo $program->tur; ?>" data-resim="<?php echo $this->resimVarmi('/uploads/'.$this->yayin->programResimAdiCek($program->resim), '/uploads/000000.gif'); ?>"><span class="yayin-time"><?php echo $program->baslangic; ?></span> <?php echo $program->baslik.$icon; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</section>
	<section class="banner">
		<div class="container_1140 row row-pad clearfix">
			<h2 class="mpzero text-center">Tvde Şuan</h2>
		</div>
		<div class="container_1140 row row-pad clearfix">
			<ul class="timeline">
				<li class="now-saat">
					<h2 class="mpzero text-center">22:58</h2>
				</li>
				<?php 
				foreach($this->kanalCek() as $row) :
					$tum = $this->yayin->tumProgramlariCek($row['kanal_bot_id']);
					$sayi = count($tum)-1;
					foreach($tum as $keys => $kanal) :
						if($keys == $sayi){
								$sonp = 1;
							}else{
								$sonp = 0;
							}
						if(aktifProgram($kanal->baslangic, $kanal->bitis, date("H:i"), $sonp)) :
							if($sonp == 1){
								$d = date('d')+1;
								$bitisTime = $d.date('-m-Y H:i', strtotime($kanal->bitis));	
							}else{
								$bitisTime = $kanal->bitis;
							}
				?>
				<li>
					<div class="time">
						<div class="bubble"><?php echo $kanal->baslangic; ?></div>
					</div>
					<div class="info">
						<div class="bubble">
							<div class="bubble-left pull-left">
								<h3 class="mpzero"><?php echo $kanal->baslik; ?></h3>
								<p class="mpzero suan-tur"><strong>Tür: </strong><?php echo $kanal->tur; ?></p>
								<div class="progress">
									<p class="mpzero small-time"><?php echo $kanal->baslangic; ?></p>
									<progress value="<?php echo yuzdeYaz($kanal->baslangic, $bitisTime, date("H:i")); ?>" max="100"></progress>
									<p class="mpzero small-time time-bottom text-right"><?php echo $kanal->bitis; ?></p>
								</div>
							</div>
							<div class="suan-kanal-logo pull-right">
								<a href="<?php echo URL.'/kanal/'.$row['kanal_link']; ?>">
								<img src="<?php echo URL."/uploads/channels/".$kanal['kanal_logo']; ?>" alt="" width="50" height="50">
								<span><?php echo $row['kanal_baslik']; ?></span></a>
							</div>
						</div>
					</div>
				</li>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
</div>