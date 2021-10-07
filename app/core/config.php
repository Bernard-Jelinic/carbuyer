<?php

define("WEBSITE_TITLE", ' | Kupi auto.hr');

//database name
define("DB_NAME", 'carbuyer');
define("DB_USER", 'root');
define("DB_PASS", '');
define("DB_TYPE","mysql");
DEFINE('DB_HOST',"localhost");

define('THEME','carbuyer/');

$public = $_SERVER['DOCUMENT_ROOT'] . str_replace("index.php","",$_SERVER['PHP_SELF']);

define('PUBLIC_DIR',$public);

define("DEBUG", true);

if (DEBUG) {

    ini_set('display_errors', 1);

} else {
    
    ini_set('display_errors', 0);
}