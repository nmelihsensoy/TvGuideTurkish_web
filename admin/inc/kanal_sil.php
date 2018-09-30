<?php
	$admin->adminGüvenlik();
	$id = g("id");
?>
<div class="page-header admin-header">
  <h2>Kanal Sil <small>Kanalı Sil</small></h2>
</div>
<?php
	
	$sil = $db->delete("kanallar", "kanal_id='$id'");
	
	if($sil){
		echo '<div class="alert alert-success">Kanal Başarıyla Silindi...</div>';
		go(URL."/admin/index.php?sayfa=kanallar", 1);
	}else{
		echo '<div class="alert alert-danger">Bir Sorun Oluştu...</div>';
		go(URL."/admin/index.php?sayfa=kanallar", 1);
	}	
	
?>