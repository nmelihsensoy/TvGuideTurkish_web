<?php
	$admin->adminGüvenlik();
	$sql = "SELECT * FROM kanallar";
	$kanal = $db->select($sql);

	$son = count($kanal);
?>
<div class="page-header admin-header">
  <h2>Kanal Ekle <small>Yeni Kanal Ekle</small></h2>
</div>
<?php

	if($_POST){
		
		$kanal_baslik = p("kanal_baslik", true);
		$kanal_link = sefLink($kanal_baslik);
		$kanal_bot_link = p("kanal_link", true);
		$kanal_logo = p("kanal_logo", true);
		$kanal_bot_id = p("kanal_bot_id", true);
		
		if(!$kanal_baslik or !$kanal_link){
			
			echo '<div class="alert alert-danger">Boş Bırakmayınız...</div>';
			
		}else{
			
			$kanal = array(
				"kanal_baslik" => $kanal_baslik,
				"kanal_link" => $kanal_link,
				"kanal_bot_link" => $kanal_bot_link,
				"kanal_logo" => $kanal_logo,
				"kanal_bot_id" => $kanal_bot_id
			);

			$insert = $db->insert("kanallar", $kanal);
		
			if($insert){
				echo '<div class="alert alert-success">Kanal Başarıyla Eklendi...</div>';
				go(URL."/admin/index.php?sayfa=kanallar", 1);
			}else{
				echo '<div class="alert alert-danger">Bir Sorun Oluştu...</div>';
			}	
			
		}
		
	}
?>
<div class="row">
	<div class="col-md-8">
		<form class="form-horizontal" role="form" action="" method="post">
		  <div class="form-group">
			<label for="kanal_baslik" class="col-sm-3 control-label">Kanal Başlık</label>
			<div class="col-sm-9">
			  <input type="text" class="form-control" id="kanal_baslik" name="kanal_baslik">
			</div>
		  </div>
		  <div class="form-group">
			<label for="kanal_link" class="col-sm-3 control-label">Kanal Link</label>
			<div class="col-sm-9">
			  <input type="text" class="form-control" id="kanal_link" name="kanal_link">
			</div>
		  </div>
		  <div class="form-group">
			<label for="kanal_logo" class="col-sm-3 control-label">Kanal Logo</label>
			<div class="col-sm-9">
			  <input type="text" class="form-control" id="kanal_logo" name="kanal_logo">
			</div>
		  </div>
		  <div class="form-group">
			<label for="kanal_bot_id" class="col-sm-3 control-label">Kanal Bot Id</label>
			<div class="col-sm-9">
			  <input type="text" class="form-control" id="kanal_bot_id" name="kanal_bot_id" value="<?php echo $son; ?>">
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-10">
			  <button type="submit" class="btn btn-primary">Ekle</button>
			</div>
		  </div>
		</form>
	</div>
</div>