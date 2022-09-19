<?php
	require_once('../system/ayar.php');
	require_once('../system/function.php');
	require_once('../system/libs/Admin.php');

	$admin = new Admin;
?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
    <title><?php echo ADMIN_TITLE; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/custom.css">

	<script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- HTML5 IE8 DESTEGI -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
    <?php
		if(session("login")){
			
			require_once("inc/default.php");
			
		}else{ 
				
			if($_POST){
				
				$kadi = p("kadi");
				$ksifre = p("ksifre");
				
				if(!$kadi or !$ksifre){
					$hata = 'Gerekli alanları boş bırakmayınız.';
				}else{
					$giris = $admin->adminGirisYap($kadi, md5($ksifre));
					if($giris){
						$admin->adminSessionOlustur($kadi);
						go(URL."/admin");
					}else{
						$hata = 'Kullanıcı adı veya şifre yanlış';
					}
				}
			}
			
		?>	
			<div class="container bosluk">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 login-panel">
						<?php
						if($hata){
							echo '<div class="alert alert-danger">'.$hata.'</div>';
						}
						?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<span class="glyphicon glyphicon-lock"></span> Yönetici Girişi</div>
							<div class="panel-body">
								<form class="form-horizontal" role="form" method="POST" action="">
								<div class="form-group">
									<label for="kadi" class="col-sm-3 control-label">
										Kullanıcı Adı</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="kadi" name="kadi" placeholder="Kullanıcı Adı" required>
									</div>
								</div>
								<div class="form-group">
									<label for="ksifre" class="col-sm-3 control-label">
										Şifre</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" name="ksifre" id="ksifre" placeholder="Şifre" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<button type="submit" class="btn btn-success btn-lg btn-block">
											Giriş Yap</button>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
	<?php } ?>
  </body>
</html>