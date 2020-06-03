<?php
define('DB_SERVER', "sql301.byethost.com");
define('DB_USER', "b9_25698841");
define('DB_PASSWORD', "shimei99");
define('DB_DATABASE', "b9_25698841_freshfoods");
define('DB_DRIVER', "mysql");

$db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

date_default_timezone_set("Asia/Taipei");


 ?>
