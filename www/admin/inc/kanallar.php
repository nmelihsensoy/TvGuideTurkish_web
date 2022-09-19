<?php $admin->adminGüvenlik(); ?>
<div class="page-header admin-header">
  <h2>Kanallar <small>Kanalları Düzenle</small></h2>
</div>
<?php
	$sql = "SELECT * FROM kanallar";
	$kanal = $db->select($sql);
?>
<table class="table table-hover">
  <thead>
	<tr>
	  <th>Kanal Adı</th>
	  <th>Kanal Link</th>
	  <th>Kanal Hit</th>
	  <th>İşlemler</th>
	</tr>
  </thead>
  <tbody>
	<?php foreach($kanal as $row) : ?>	
	<tr>	
	  <td><?php echo $row['kanal_baslik']; ?></td>
	  <td><?php echo $row['kanal_link']; ?></td>
	  <td><?php echo $row['kanal_hit']; ?></td>
	  <td><a title="Düzenle" href="?sayfa=kanal_duzenle&id=<?php echo $row['kanal_id']; ?>" class="btn btn-default btn-xs"><i class="fa fa-pencil fa-lg"></i></a> <a onclick="return confirm('Kanalı silmek istediğinize emin misiniz?')" class="btn btn-danger btn-xs" title="Sil" href="?sayfa=kanal_sil&id=<?php echo $row['kanal_id']; ?>"><i class="fa fa-trash-o fa-lg"></i></a></td>
	</tr>
	<?php endforeach; ?>
  </tbody>
</table>