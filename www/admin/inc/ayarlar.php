<?php
	$admin->adminGüvenlik();
	$sql = "SELECT * FROM ayarlar";
	$ayar = $db->select($sql)[0];
?>
<div class="page-header admin-header">
  <h2>Ayarlar <small>Site Ayarlarını Düzenle</small></h2>
</div>
<?php
	
	if($_POST){
		
		$site_url = p("site_url", true);
		$site_baslik = p("site_baslik", true);
		$site_footer = p("site_footer", true);
		$site_desc = p("site_desc", true);
		$site_keyw = p("site_keyw", true);
		$site_durum = p("site_durum", true);
		$site_tema = p("site_tema", true);
		$admin_kadi = p("admin_kadi", true);
		if (p("admin_sifre")){
			$admin_sifre = md5(p("admin_sifre", true));
		}else {
			$admin_sifre = $ayar["admin_sifre"];
		}
		
		if(!$site_url or !$site_baslik){
			
			echo '<div class="alert alert-danger">Boş Bırakmayınız...</div>';
			
		}else{
			
			$ayarlar = array(
				"site_url" => $site_url,
				"site_baslik" => $site_baslik,
				"site_footer" => $site_footer,
				"site_desc" => $site_desc,
				"site_keyw" => $site_keyw,
				"site_durum" => $site_durum,
				"site_tema" => $site_tema,
				"admin_kadi" => $admin_kadi,
				"admin_sifre" => md5($admin_sifre)
			);
			$update = $db->update("ayarlar", $ayarlar, "id=0");
			
			if($update){
				echo '<div class="alert alert-success">Yeni Ayarlar Başarıyla Kaydedildi...</div>';
				go(URL."/admin/index.php?sayfa=ayarlar", 1);
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
			<label for="site_url" class="col-sm-3 control-label">Site Url</label>
			<div class="col-sm-9">
			  <input type="text" class="form-control" id="site_url" name="site_url" value="<?php echo $ayar['site_url']; ?>">
			</div>
		  </div>
		  <div class="form-group">
			<label for="site_baslik" class="col-sm-3 control-label">Site Başlık</label>
			<div class="col-sm-9">
			  <input type="text" class="form-control" id="site_baslik" name="site_baslik" value="<?php echo ss($ayar['site_baslik']); ?>">
			</div>
		  </div>
		  <div class="form-group">
			<label for="site_footer" class="col-sm-3 control-label">Site Footer</label>
			<div class="col-sm-9">
			  <input type="text" class="form-control" id="site_footer" name="site_footer" value="<?php echo ss($ayar['site_footer']); ?>">
			</div>
		  </div>
		  <div class="form-group">
			<label for="site_desc" class="col-sm-3 control-label">Site Açıklaması</label>
			<div class="col-sm-9">
			  <textarea class="form-control" rows="3" id="site_desc" name="site_desc" ><?php echo ss($ayar['site_desc']); ?></textarea>
			</div>
		  </div>
		  <div class="form-group">
			<label for="site_keyw" class="col-sm-3 control-label">Site Keywords</label>
			<div class="col-sm-9">
			<textarea class="form-control" rows="3" id="site_keyw" name="site_keyw" ><?php echo ss($ayar['site_keyw']); ?></textarea>
			</div>
		  </div>
		  <div class="form-group">
			<label for="site_durum" class="col-sm-3 control-label">Site Durum</label>
			<div class="col-sm-9">
				<select class="form-control" id="site_durum" name="site_durum">
				  <option value="1" <?php echo $ayar["site_durum"] ? 'selected' : null; ?>>Açık</option>
				  <option value="0" <?php echo !$ayar["site_durum"] ? 'selected' : null; ?>>Kapalı</option>
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="site_tema" class="col-sm-3 control-label">Site Tema</label>
			<div class="col-sm-9">
				<select class="form-control" id="site_tema" name="site_tema">
				  <?php klasorListele("../theme"); ?>
				</select>
			</div>
		  </div>
		</hr>
		  <div class="form-group">
			<label for="admin_kadi" class="col-sm-3 control-label">Admin Kullanıcı Adı</label>
			<div class="col-sm-9">
			  <input type="text" class="form-control" id="admin_kadi" name="admin_kadi" value="<?php echo ss($ayar['admin_kadi']); ?>">
			</div>
		  </div>
		  <div class="form-group">
			<label for="admin_sifre" class="col-sm-3 control-label">Admin Şifre</label>
			<div class="col-sm-9">
			  <input type="password" class="form-control" id="admin_sifre" name="admin_sifre">
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-sm-offset-10">
			  <button type="submit" class="btn btn-primary">Ayarları Güncelle</button>
			</div>
		  </div>
		</form>
	</div>
</div>