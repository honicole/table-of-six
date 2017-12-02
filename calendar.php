<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
	header("Location: index.php");
    exit;
} else {
	$cuser = $_SESSION['user'];
}

date_default_timezone_set("EST");
$_SERVER['REQUEST_TIME'];
?>

<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/calendar.js"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event calendar</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body style="background-color:#e0fffb;">


	    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"><b>Table of Six</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">About</a></li>
            <li><a href="calendar.php">Event Calendar</a></li>
            <li><a href="Resto.html">Restaurant Info</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user"></span>&nbsp;My account&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 


	<div class="container-fluid">
		<div class="jumbotron text-center"><h1>Calendar</h1></div>
		<div class="row"><?php
		for ($i = 0; $i <= 8; $i++) {
			echo '<div class="col-lg-4 col-md-6 col-sm-12 cal text-center">';
			echo '<h1>' . date('M d', strtotime("+" . $i . " days")) . '</h1>';
			echo '<div class="info">';
			$d = date('Y-m-d', strtotime("+" . $i . " days"));
			$q = "SELECT * FROM eventreg WHERE Date LIKE '$d%'";
			$res = mysql_query($q);
			$hasEvent = mysql_num_rows($res);
			if ($hasEvent > 0) {
				while ($event = mysql_fetch_array($res)) {
					$eid = $event['ID'];
					$datetime = new DateTime($event['Date']);
					$q2 = "SELECT * FROM restaurants WHERE ID=" . $event['Location'];
					$res2 = mysql_query($q2);
					while ($loc = mysql_fetch_array($res2)) {
						echo '<p class="location '. $loc['ID'] . '">' . 
						$datetime->format('g:ia') . ' @ ' . $loc['name'] . '</p>';
					}
					$q3 = "SELECT user1, user2, user3, user4, user5, user6, 
						CASE WHEN user1 IS NULL THEN 0 ELSE 1 END
						+ CASE WHEN user2 IS NULL THEN 0 ELSE 1 END
						+ CASE WHEN user3 IS NULL THEN 0 ELSE 1 END
						+ CASE WHEN user4 IS NULL THEN 0 ELSE 1 END
						+ CASE WHEN user5 IS NULL THEN 0 ELSE 1 END
						+ CASE WHEN user6 IS NULL THEN 0 ELSE 1 END
						AS reg_users
					FROM eventreg WHERE ID = $eid";
					$res3 = mysql_query($q3);
					while ($row = mysql_fetch_array($res3)) {
						$numReg = $row['reg_users'];
						
						if ($numReg >= 6) {
							echo 'This event is currently full.<br>';
						} else {
							echo $numReg. '/6 users registered<br>';
						}
						$isRegistered = false;
						for ($j = 1; $j <= 6; $j++) {
							$userNum = 'user' . $j;
							if ($event[$userNum] == $cuser) {
								$isRegistered = true;
							}
						} 
						if ($isRegistered) {
							echo '<a href="updateevent.php?eid='.$eid.'&task=0" class="btn btn-danger" role="button">Leave</a>';
						} elseif ($numReg < 6) {
							echo '<a href="updateevent.php?eid='.$eid.'&task=1" class="btn btn-success" role="button">Join</a>';
						
						}
					}
				}
			} else {
				echo 'There are currently no events on this date!';
				echo '<p><a href="" class="btn btn-info role="button">Create Event</a></p>';
			}
			echo '</div></div>';
		}
		?>
		</div>
	</div>
</body>