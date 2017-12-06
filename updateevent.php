<?php
/*
    File: updateevent.php
    Location: /xampp/htcdocs/update.php
    Description: Create, join or delete event based on task ID passed in
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
				// user wants to leave the event
				if ($task == 0) {
					$q3 = "UPDATE eventreg SET $userNum=NULL WHERE ID=$eid";
					mysql_query($q3);
				}
				$q4 = "SELECT user1, user2, user3, user4, user5, user6, 
					CASE WHEN user1 IS NULL THEN 0 ELSE 1 END
					+ CASE WHEN user2 IS NULL THEN 0 ELSE 1 END
					+ CASE WHEN user3 IS NULL THEN 0 ELSE 1 END
					+ CASE WHEN user4 IS NULL THEN 0 ELSE 1 END
					+ CASE WHEN user5 IS NULL THEN 0 ELSE 1 END
					+ CASE WHEN user6 IS NULL THEN 0 ELSE 1 END
					AS reg_users
			   	FROM eventreg WHERE ID = $eid";
				$res4 = mysql_query($q4);
				while ($count = mysql_fetch_array($res4)) {
					// if no users registered, delete the event
					if ($count['reg_users'] == 0) {
						$q5 = "DELETE FROM eventreg WHERE ID=$eid";
						mysql_query($q5);
					}
				}
				break;
			} elseif ($event[$userNum] == NULL && $task == 1) {
				// user wants to join event and there is space
				$q2 = "UPDATE eventreg SET $userNum=$cuser WHERE ID=$eid";
				mysql_query($q2);
				break;
			}
			
		}
	}
	header('Location: calendar.php');
}
?>