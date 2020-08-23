<?php

// Report all PHP errors (see changelog)
//error_reporting(E_ALL);
error_reporting(0);

$CONF = array();

// The MySQL credentials
$CONF['host'] = 'localhost';
$CONF['user'] = 'root';
$CONF['pass'] = '199443';
$CONF['name'] = 'restaurant_db';


// The Installation URL path
$CONF['installation_path'] = 'http://localhost:8081/demo/restaurant/';
// The Server path
$CONF['server_path'] = dirname(__FILE__);
// Restaurant Favicon
$CONF['favicon_url'] = $CONF['installation_path'] . 'skin/images/logo.png';
// Restaurant Logo
$CONF['logo_url'] = $CONF['installation_path'] . 'skin/images/touchRestoLogo.png';


// Book a table restaurant image for ROOM #1
// Recommended size in px: 1170x546px 
$CONF['restaurant_tables_image'] = $CONF['installation_path'] . 'skin/images/book-a-table_1.jpg';


//Base connexion
$con = mysqli_connect($CONF["host"], $CONF["user"], $CONF["pass"]) or trigger_error($lang['db_imposible_to_connect'] . mysqli_error($con));
mysqli_select_db($con, $CONF["name"]) or trigger_error($lang['db_imposible_to_change_the_db'] . mysqli_error($con));


//get site functions
require_once('system/functions.php');

// Default value of error
$_SESSION['error'] = "";

?>