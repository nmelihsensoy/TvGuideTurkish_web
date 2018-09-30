<div class="main_wrapper full-width">
	<div class="page_header">
		<div class="container_1140 row row-pad clearfix text-center">
			<h2 class="mpzero">İletişim</h2>
		</div>
	</div>
	<div class="page-content container_1140 clearfix">
		<div class="row row-pad clearfix">
			<div class="m_col-6 contact-form">
				<?php
		
					if($_POST){

						$email = p('email');
						$adsoyad = p('adsoyad');
						$konu = p('konu');
						$yazi = p('yazi');
						$captcha = p('captcha');

						if(!$email or !$adsoyad or !$konu or !$yazi or !$captcha){
							 echo '<div class="alert alert-warning">Gerekli alanları boş bırakmayınız.</div>';
						}else{
							if(session('code')==$captcha){

								$mail->SetFrom($mail->Username, $email);
								$mail->Subject = $konu;
								$content = $yazi;
								$mail->MsgHTML($content);
								if($mail->Send()) {
								   	echo '<div class="alert alert-success">Mesajınız İletildi.</div>';
								} else {
								   echo '<div class="alert alert-warning">'.$mail->ErrorInfo.'</div>';
								}

							}else{
								echo '<div class="alert alert-warning">Kodu doğru giriniz</div>';
							}
						}
					}

				?>
				<div class="panel">
					<h3 class="panel-title pad mpzero">Bize Ulaşın</h3>
					<div class="row">
						<div class="m_col-11">
							<form action="" class="form" method="post">
								<div class="form-group clearfix">
									<label for="adsoyad" class="form-label  m_col-3">Ad Soyad</label>
									<div class="form-element m_col-9">
										<input type="text" name="adsoyad" id="adsoyad" class="form-input" required>
									</div>
								</div>
								<div class="form-group clearfix">
									<label for="email" class="form-label  m_col-3">E-Posta</label>
									<div class="form-element m_col-9">
										<input type="email" name="email" id="email" class="form-input" required>
									</div>
								</div>
								<div class="form-group clearfix">
									<label for="konu" class="form-label  m_col-3">Konu</label>
									<div class="form-element m_col-9">
										<input type="text" name="konu" id="konu" class="form-input" placeholder="">
									</div>
								</div>
								<div class="form-group clearfix">
									<label for="yazi" class="form-label  m_col-3">Yorum</label>
									<div class="form-element m_col-9">
										<textarea class="form-input" name="yazi" id="yazi" rows="8" required></textarea>
									</div>
								</div>
								<div class="form-group clearfix">
									<label for="captcha" class="form-label  m_col-3">Kodu Giriniz</label>
									<div class="form-element mpzero m_col-9">
										<img class="captcha" src="system/captcha.php"/>
										<input type="text" name="captcha" id="captcha" class="form-input captcha-input" placeholder="" required>
									</div>
								</div>
								<div class="form-group clearfix">
									<div class="m_col-9 pull-right">
										<button type="submit" class="form-submit full-width btn btn-blue btn-big pull-right">Gönder</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>