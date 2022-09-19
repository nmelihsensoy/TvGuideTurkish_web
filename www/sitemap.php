<?php
	require_once 'system/ayar.php';
	header('Content-type: text/xml'); 
	echo '<?xml version="1.0" encoding="UTF-8"?>';
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

	echo '  <url>
       <loc>'.URL.'/</loc>
       <lastmod>'.date("Y").'-'.date("m").'-'.date("d").'</lastmod>
       <changefreq>daily</changefreq>
       <priority>1</priority>
  </url>
    <url>
       <loc>'.URL.'/tum-kanallar</loc>
       <lastmod>'.date("Y").'-'.date("m").'-'.date("d").'</lastmod>
       <changefreq>daily</changefreq>
       <priority>0.9</priority>
  </url>
  <url>
       <loc>'.URL.'/iletisim</loc>
       <lastmod>'.date("Y").'-'.date("m").'-'.date("d").'</lastmod>
       <changefreq>daily</changefreq>
       <priority>0.9</priority>
  </url>';
  $sql = "SELECT * FROM kanallar ORDER BY kanal_hit DESC";
  $row = $db->select($sql);
  foreach($row as $kanal){
    echo '
<url>
       <loc>'.URL.'/kanal/'.$kanal['kanal_link'].'</loc>
       <lastmod>'.date("Y")."-".date("m")."-".date("d").'</lastmod>
       <changefreq>daily</changefreq>
       <priority>0.8</priority>
  </url>';
  }
	echo "</urlset>";
?>