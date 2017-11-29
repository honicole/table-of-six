<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
/*if( !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
}*/
?>


<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
</head>

<body>
<?php
date_default_timezone_set("EST");
$_SERVER['REQUEST_TIME'];

$query = "SELECT * FROM eventreg WHERE Date BETWEEN now() and adddate(now(),7) ORDER BY eventreg.Date ASC";
$result = mysql_query($query);
?>
<?php
while ($row = mysql_fetch_array($result)) {
	echo '<div style="display:inline-block;padding:75px;">';
	$datetime = new DateTime($row['Date']);
	$query2 = "SELECT * FROM restaurants WHERE ID=" . $row['Location'];
	$result2 = mysql_query($query2);

	$reg = $row['NumRegistered'];

	echo 'Date: ' . $datetime->format('F j, Y, g:ia') . '<br>';
	while ($row2 = mysql_fetch_array($result2)) {
		echo 'Location: ' . $row2['name'] . '<br>';
	}
	if ($reg >= 6) {
		echo 'This event is currently full.';
	} else {
		echo $reg. '/6 users registered<br>';
		echo 'Register for this event'; // UPDATE eventreg SET userX=//CURRENTUSER WHERE ID= this.id
	}
	echo '</div>';
}
/* SELECT user1, user2, user3, user4, user5, user6, 
       CASE WHEN user1 IS NULL THEN 0 ELSE 1 END
       + CASE WHEN user2 IS NULL THEN 0 ELSE 1 END
       + CASE WHEN user3 IS NULL THEN 0 ELSE 1 END
       + CASE WHEN user4 IS NULL THEN 0 ELSE 1 END
       + CASE WHEN user5 IS NULL THEN 0 ELSE 1 END
       + CASE WHEN user6 IS NULL THEN 0 ELSE 1 END
       AS empty_users
  FROM eventreg WHERE ID = 2;
*/
?>
</body>