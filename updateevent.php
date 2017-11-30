<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
} else {
	$cuser = trim($_SESSION['user']);
	$cuser = strip_tags($cuser);
	$cuser = htmlspecialchars($cuser);

	$eid = trim($_GET['eid']);
	$eid = strip_tags($eid);
	$eid = htmlspecialchars($eid);

	$task = trim($_GET['task']);
	$task = strip_tags($task);
	$task = htmlspecialchars($task); 

	$q = "SELECT * FROM eventreg WHERE ID=$eid";
	$res = mysql_query($q);
	while ($event = mysql_fetch_array($res)) {
		for ($i = 1; $i <= 6; $i++) {
			$userNum = 'user' . $i;
			if ($event[$userNum] == $cuser) {
				if ($task == 0) {
					$q3 = "UPDATE eventreg SET $userNum=NULL WHERE ID=$eid";
					mysql_query($q3);
				}
				break;
			} elseif ($event[$userNum] == NULL && $task == 1) {
				// spot available
				$q2 = "UPDATE eventreg SET $userNum=$cuser WHERE ID=$eid";
				mysql_query($q2);
				break;
			}
			
		}
	}
	header('Location: calendar.php');
}
?>