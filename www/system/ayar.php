<?php
require_once('libs/Database.php');

//Guvenlik
define('akis', 1);	

session_start();
ob_start("ob_gzhandler");
ini_set("display_errors", false);
date_default_timezone_set('Europe/Istanbul');

//Mysql Ayar
define('DB_HOST', 'mysql:dbname='.getenv('DBNAME').';charset=utf8;host='.getenv('DBHOST').'');
define('DB_USER', getenv('DBUSERNAME'));
define('DB_PASS', getenv('DBPASSWORD'));

//Mysql Bağlantısı
$db = new Database(DB_HOST, DB_USER, DB_PASS);

//Ayarları Çek
$sql = "SELECT * FROM ayarlar";
$ayar = $db->select($sql)[0];

define("PATH", realpath("."));
define("URL", $ayar['site_url']);
define("TEMPLATE", PATH."/theme/".$ayar['site_tema']);
define("TEMPLATE_URL", $ayar['site_url']."/theme/".$ayar['site_tema']);
define("TEMPLATE_DIR", $ayar["site_tema"]);
define("SITE_TITLE", $ayar["site_baslik"]);
define("SITE_DESC", $ayar["site_desc"]);
define("SITE_KEYW", $ayar["site_keyw"]);

//Admin
define("ADMIN_TITLE", "Admin Panel - ".$ayar["site_baslik"]); 
define("ADMIN_USERNAME", $ayar['admin_kadi']);
define("ADMIN_PASSWORD", $ayar['admin_sifre']);


?>
