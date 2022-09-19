<?php
	$meta = $system->temaMeta();
?>
<!doctype html>
<html lang="en">
<head>
	<meta name="description" content="<?php echo $meta[1]; ?>">
	<meta name="keywords" content="<?php echo $meta[2]; ?>">
	<meta charset="UTF-8">
	<title><?php echo $meta[0]; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>/css/normalize.css">
	<link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>/css/base.css">
	<link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>/css/m_grid.css">
	<link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>/css/avgrund.css">
	<link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>/css/custom.css">
</head>
<body>
	<!-- Popup -->
	<aside id="default-popup" class="avgrund-popup">
		<img src="<?php echo URL."/uploads/000000.gif"; ?>" class="pull-left" width="180" height="130" alt="">
		<h2 class="mpzero"></h2>
		<p class="mpzero"><strong>Tür: </strong> <span class="mpzero tur"></span></p>
		<p class="mpzero"><strong>Özet: </strong><span class="mpzero ozet"></span></p>
	</aside>
	<!-- #Popup -->
	<!-- Header -->
	<div class="header_wrapper full-width clearfix">
		<div class="container_1140 clearfix">
			<a href="<?php echo URL; ?>" class="logo mpzero pull-left"><?php echo $ayar['site_baslik']; ?></a>
			<div class="nav-button pull-right m_hidden-desktop"><span class="icon-menu"></span></div>
			<nav class="nav_menu pull-right m_hidden-phone m_hidden-tablet">
				<ul class="mpzero">
					<?php $s = g('sayfa'); ?>
					<li class="<?php if($s == ""){ echo "active"; } ?>"><a href="<?php echo URL; ?>">Ana Sayfa</a></li>
					<li class="<?php if($s == "tum-kanallar"){ echo "active"; } ?>"><a href="<?php echo URL; ?>/tum-kanallar">Tüm Kanallar</a></li>
					<li class="<?php if($s == "iletisim"){ echo "active"; } ?>"><a href="<?php echo URL; ?>/iletisim">İletişim</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- #Header -->
	<!-- Content -->
	<?php $system->temaIcerik(); ?>
	<!-- #Content -->
	<!-- Footer -->
	<div class="footer_wrapper footer-stick">
		<div class="container_1140 row row-pad clearfix">
			<p class="mpzero text-center"><?php echo $ayar['site_footer']; ?></p>
		</div>
	</div>
	<!-- #Footer -->
	<!-- Go to up -->
	<div class="go_up m_hidden-phone"><span class="icon-arrow-up"></span></div>
	<!-- #Go to up -->
	<!-- Popup -->
	<div class="avgrund-cover"></div>
	<!-- #Popup -->
	<!-- Javascript -->
	<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>/js/avgrund.js"></script>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=304548556361859";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	<script>
	$(function(){
		$(".nav-button").click(function(){
				$(".nav_menu").slideToggle(500);
		});
		
		$("ul.yayin-list li").click(function(){
			$("#default-popup h2").text($(this).data("baslik"));
			$("#default-popup span.tur").text($(this).data("tur"));
			$("#default-popup span.ozet").text($(this).data("ozet"));
			$("#default-popup img").attr("src", $(this).data("resim"));
			
			if($(this).data("baslik") && $(this).data("resim")){
				Avgrund.show( "#default-popup" );
			}	
		});
		
		$("ul.yayin-akis li").click(function(){
			$("#default-popup h2").text($(this).data("baslik"));
			$("#default-popup span.tur").text($(this).data("tur"));
			$("#default-popup span.ozet").text($(this).data("ozet"));
			$("#default-popup img").attr("src", $(this).data("resim"));
			
			if($(this).data("baslik") && $(this).data("resim")){
				Avgrund.show( "#default-popup" );
			}	
		});
		
		$(window).scroll(function(){   
			if ($(window).scrollTop() > 180) {  
				$(".page_header").addClass("sticky");  
			} else {  
				$(".page_header").removeClass("sticky");  
			}  
		}); 

		/**
		setInterval(function() {
			var date = new Date();
			$('.now-saat h2').text(
				date.getHours() + ":" + date.getMinutes()
				);
		}, 500);
		**/

		$(window).scroll(function(){
		    if ($(this).scrollTop() > 1000){
		        $(".go_up").fadeIn(400);
		    } else {
		        $(".go_up").fadeOut(400);
		    }
		});

		$(".go_up").click(function(){
		    $("html, body").animate({ scrollTop: "0" }, 500)
		});	
			
	});
	</script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-49811335-2', 'auto');
		ga('send', 'pageview');

	</script>
	<!-- Javascript -->
</body>
</html>