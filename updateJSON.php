<?php
/*
    File: updateJSON.php
    Location: /xampp/htcdocs/updateJSON.php
    Description: Export SQL database to JSON file for geocoding
    Author: Nicole Ho
*/

ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
	header("Location: index.php");
    exit;
} else {
	$q = "SELECT name, address FROM restaurants";
	$res = mysql_query($q);
	$arr = array();
	while ($row = mysql_fetch_assoc($res)) {
		$arr[] = $row;
	}

	$fp = fopen('restaurantdata.json', 'w+');
	fwrite($fp, json_encode($arr));
	fclose($fp);
	echo 'update complete';
}
?>