<?php
$id = $kanal['kanal_id'];	
if (!cookie("kanal_".$id)){
	$bind = array("kanal_hit" => $kanal['kanal_hit']+1);
	$update = $this->db->update("kanallar", $bind, "kanal_id='$id'");

	setcookie("kanal_".$id, "_", time()+2 * 24 * 60 * 60); //2 Günlük
}
?>
<div class="main_wrapper full-width">
	<div class="page_header">
		<div class="container_1140 row row-pad clearfix text-center">
		<img src="<?php echo 'http://tvyayinrehberi.com/uploads/channels/'.$kanal['kanal_logo']; ?>" width="40" height="40" alt="">
			<h2 class="mpzero"><?php echo $kanal['kanal_baslik']; ?></h2>
		</div>
	</div>
	<div class="page-content container_1140 clearfix">
		<div class="row row-pad clearfix">
			<div class="m_col-8">
				<div class="panel">
					<div class="panel-title clearfix">
						<h3 class="pull-left m_hidden-phone title-text mpzero">Yayın Akışı</h3>
						<ul class="akis-tarih mpzero">
							<?php
								$gun = g("gun");
								if($gun and validateDate($gun, 'dmY')){
									$date = DateTime::createFromFormat('dmY', $gun);
									$gun = $date->format('N');
								}else{
									$gun = date('N');
								}

								$ilkGunSayi = date("N", strtotime($tarih['bot_tarih']));
								$ikiGunSayi = date("N", strtotime($tarih['bot_tarih_iki']));
								$ucGunSayi = date("N", strtotime($tarih['bot_tarih_uc']));

								$ilkGunLink = date("dmY", strtotime($tarih['bot_tarih']));
								$ikiGunLink = date("dmY", strtotime($tarih['bot_tarih_iki']));
								$ucGunLink = date("dmY", strtotime($tarih['bot_tarih_uc']));
							?>	
							<li class="<?php if($gun == $ilkGunSayi){ echo "active"; } ?>" ><a href="<?php echo URL."/kanal/".$kanal['kanal_link']; ?>/gun/<?php echo $ilkGunLink; ?>"><?php echo $gunler[$ilkGunSayi-1]; ?></a></li>
							<li class="<?php if($gun == $ikiGunSayi){ echo "active"; } ?>"><a href="<?php echo URL."/kanal/".$kanal['kanal_link']; ?>/gun/<?php echo $ikiGunLink; ?>"><?php echo $gunler[$ikiGunSayi-1]; ?></a></li>
							<li class="<?php if($gun == $ucGunSayi){ echo "active"; } ?>" ><a href="<?php echo URL."/kanal/".$kanal['kanal_link']; ?>/gun/<?php echo $ucGunLink; ?>"><?php echo $gunler[$ucGunSayi-1]; ?></a></li>
						</ul>
					</div>
					<ul class="yayin-akis mpzero">
						<?php	
							$cek = $this->yayin->tumProgramlariCek($kanal['kanal_bot_id']);
							if(!$cek){
								$this->hataYazdir("Bugün hiç program eklenmemiş", 1);
							}
							end($cek);
							$last_id=key($cek);

							foreach($cek as $key => $program) :
							if($key == $last_id){
								$son = 1;
							}else{
								$son = 0;
							}
							if($gun == date("N") and aktifProgram($program->baslangic, $program->bitis, date("H:i"), $son)){
								$aktif = "active";
								$icon = '<span class="icon-live now pull-right"></span>';
							}else{
								$aktif = "";
								$icon = "";
							}
						?>
							<li data-baslik="<?php echo $program->baslik ?>" data-ozet="<?php echo $program->ozet ?>" data-tur="<?php echo $program->tur ?>" data-resim="<?php echo $this->resimVarmi('/uploads/'.$this->yayin->programResimAdiCek($program->resim), '/uploads/000000.gif'); ?>" class="clearfix <?php echo $aktif; ?>">
								<div class="saat pull-left"><span><?php echo $program->baslangic ?></span>-<span><?php echo $program->bitis ?></span></div>
								<h3 class="mpzero"><?php echo $program->baslik ?><?php echo $icon; ?></h3>	
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="panel" style="height: 500px">
					<h3 class="panel-title pad mpzero">Yorumlar</h3>
					<div class="fb-comments m_hidden-phone m_hidden-tablet" data-href="<?php $uri = $_SERVER['REQUEST_URI']; ?>" data-width="744" data-numposts="8" data-colorscheme="light"></div>
				</div>
			</div>
			<div class="m_col-4 m_hidden-phone">
				<div class="panel">
					<h3 class="panel-title pad mpzero">Diğer Kanallar</h3>
					<ul class="widget-kanal mpzero clearfix">
						<?php 
						$shuffle = $this->digerKanal($kanal['kanal_id']);
						shuffle($shuffle);
						foreach($shuffle as $row) : ?>
						<li><a href="<?php echo URL.'/kanal/'.$row['kanal_link']; ?>"><img src="<?php echo 'http://tvyayinrehberi.com/uploads/channels/'.$row['kanal_logo']; ?>" width="60" height="60" alt=""><span><?php echo $row['kanal_kisa_baslik'] ? $row['kanal_kisa_baslik'] : $row['kanal_baslik']; ?></span></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
