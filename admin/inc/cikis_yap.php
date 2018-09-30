<?php
	$admin->adminGüvenlik();
	$admin->cikisYap();
	echo '<div class="alert alert-success">Çıkış Yapılıyor...</div>';
	go(URL."/admin", 1);
?>