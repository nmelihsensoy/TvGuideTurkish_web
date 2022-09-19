<div class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <i class="fa fa-bars fa-inverse"></i>
          </button>
          <a class="navbar-brand" href="<?php echo URL."/admin"; ?>"><?php echo ADMIN_TITLE; ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a target="__blank" href="<?php echo URL; ?>"><i class="fa fa-share"></i> Siteyi Gör</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo session("uye_kadi"); ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?sayfa=ayarlar"><i class="fa fa-cog"></i> Ayarlar</a></li>
                <li class="divider"></li>
                <li><a href="?sayfa=cikis_yap"><i class="fa fa-power-off"></i> Çıkış Yap</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="list-group">
					<?php $s = g("sayfa"); ?>
					<a href="index.php" class="list-group-item <?php if($s == ""){ echo "active"; } ?>"><i class="fa fa-tachometer"></i> Dashboard<i class="fa fa-chevron-right pull-right"></i></a>
					<div class="list-group-title">
						<strong>KANALLAR</strong>
					</div>
					<a href="?sayfa=kanal_ekle" class="list-group-item sub-item <?php if($s == "kanal_ekle"){ echo "active"; } ?>"><i class="fa fa-plus"></i> Kanal Ekle<i class="fa fa-chevron-right pull-right"></i></a>
					<a href="?sayfa=kanallar" class="list-group-item sub-item <?php if($s == "kanallar" or $s == "kanal_duzenle" or $s == "kanal_sil"){ echo "active"; } ?>"><i class="fa fa-pencil"></i> Kanallar<i class="fa fa-chevron-right pull-right"></i></a>
					<div class="list-group-title">
						<strong>MENU</strong>
					</div>
					<a href="#" class="list-group-item sub-item"><i class="fa fa-plus"></i> Menu Ekle<i class="fa fa-chevron-right pull-right"></i></a>
					<a href="#" class="list-group-item sub-item"><i class="fa fa-list-ul"></i> Menu Düzenle<i class="fa fa-chevron-right pull-right"></i></a>
					<div class="list-group-title">
						<strong>SİTE AYARLARI</strong>
					</div>
					<a href="?sayfa=ayarlar" class="list-group-item sub-item <?php if($s == "ayarlar"){ echo "active"; } ?>"><i class="fa fa-cog"></i> Ayarlar<i class="fa fa-chevron-right pull-right"></i></a>
				</div>
			</div>
			<div class="col-md-9">
				<?php
					
					$sayfa = g("sayfa");
					if(file_exists("inc/".$sayfa.".php")){
						require("inc/".$sayfa.".php");
					}else{
						require("inc/anasayfa.php");
					}
					
				?>
			</div>	
		</div><!--/.row -->		
	</div><!--/.container -->