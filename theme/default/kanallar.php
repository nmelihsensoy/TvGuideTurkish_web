<div class="main_wrapper full-width">
	<div class="page_header">
		<div class="container_1140 row row-pad clearfix text-center">
			<h2 class="mpzero">Tüm Kanallar</h2>
		</div>
	</div>
	<div class="page-content container_1140 row row-pad">
		<ul class="kanal_list mpzero clearfix">
			<?php foreach($kanallar as $kanal) : ?>
			<li><a href="<?php echo URL."/kanal/".$kanal['kanal_link']; ?>"><div class="logo_wrap"><img src="<?php echo URL."/uploads/channels/".$kanal['kanal_logo']; ?>" width="60" height="60" alt=""></div><span><?php echo $kanal['kanal_baslik']; ?></span></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
