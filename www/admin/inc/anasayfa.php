<?php 
	$admin->adminGüvenlik(); 
	$sql = "SELECT * FROM bot";
	$bot = $db->select($sql)[0];

	$sqls = "SELECT * FROM kanallar ORDER BY kanal_hit DESC";
	$row = $db->select($sqls);

?>
<div class="page-header admin-header">
  <h2>Dashboard <small>İstatistikler</small></h2>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> İstatistikler</h3>
		  </div>
		  <div class="panel-body">
			Bot son güncelleme tarihleri: <br><span class="label label-success"><?php echo $bot['bot_tarih']; ?></span> <span class="label label-success"><?php echo $bot['bot_tarih_iki']; ?></span> <span class="label label-success"><?php echo $bot['bot_tarih_uc']; ?></span>
		  	<hr>
		  	Toplam Kanal Sayısı: <span class="label label-success"><?php echo count($row); ?></span>
		  	<hr>
		  	En Çok Takip Edilen Kanal: <span class="label label-success"><?php echo $row[0]['kanal_baslik']; ?></span>
		  </div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-comments"></i> Son Yorumlar</h3>
		  </div>
		  <div class="panel-body">
			Panel content
		  </div>
		</div>
	</div>
</div>