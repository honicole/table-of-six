<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
} else {
	$cusr = $_SESSION['user'];
}

date_default_timezone_set("EST");
$_SERVER['REQUEST_TIME'];
?>

<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
</head>

<body>
	<div class="container"><?php
		for ($i = 0; $i <= 8; $i++) {
			if ($i == 0) {
				echo '<div class="row">';
			}
			if ($i % 3 == 0) {
				echo '<div class="w-100"></div>';
			}
			echo '<div class="col">';
			if ($i <= 6) {
				echo date('M d Y', strtotime("+" . $i . " days")) . '<br>';
				$d = date('Y-m-d', strtotime("+" . $i . " days"));
				$q = "SELECT * FROM eventreg WHERE Date LIKE '$d%'";
				$res = mysql_query($q);
				while ($event = mysql_fetch_array($res)) {
					$eid = $event['ID'];
					$datetime = new DateTime($event['Date']);
					$q2 = "SELECT * FROM restaurants WHERE ID=" . $event['Location'];
					$res2 = mysql_query($q2);
					echo $datetime->format('g:ia') . '<br>';
					while ($loc = mysql_fetch_array($res2)) {
						echo 'Location: ' . $loc['name'] . '<br>';
					}
					$q3 = "SELECT user1, user2, user3, user4, user5, user6, 
						CASE WHEN user1 IS NULL THEN 0 ELSE 1 END
						+ CASE WHEN user2 IS NULL THEN 0 ELSE 1 END
						+ CASE WHEN user3 IS NULL THEN 0 ELSE 1 END
						+ CASE WHEN user4 IS NULL THEN 0 ELSE 1 END
						+ CASE WHEN user5 IS NULL THEN 0 ELSE 1 END
						+ CASE WHEN user6 IS NULL THEN 0 ELSE 1 END
						AS empty_users
				   	FROM eventreg WHERE ID = $eid";
				   	$res3 = mysql_query($q3);
				   	while ($row = mysql_fetch_array($res3)) {
						$numReg = $row['empty_users'];
						if ($numReg >= 6) {
							echo 'This event is currently full.';
						} else {
							echo $numReg. '/6 users registered<br>';
							echo 'Register for this event'; 
						}
					}
				}
			}
			echo '</div>';
			if ($i == 8) {
				echo '</div>';
			}
		} 
			?>
	</div>
</body>