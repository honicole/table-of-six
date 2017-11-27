<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
}
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

$query = mysql_query("SELECT * FROM eventreg WHERE Date BETWEEN now() and adddate(now(),7))")
foreach ($row = mysql_fetch_array($query)) {
	'echo' . $row['Date'] . '<br>';
}


// Multi-day events merged into one event, calendar sorted by start date, max 6 results
$caltxt = 'https://www.googleapis.com/calendar/v3/calendars/' . $cal_id . '/events?key=AIzaSyD64ooXK0dHFdatc7EyiTZYSpUxoFYuPYY&singleEvents=true&orderBy=startTime&maxResults=6&timeMin=' . date(DateTime::ATOM);
$cal = file_get_contents($caltxt);
$arr = json_decode($cal, true);
$cal_tz = $arr['timeZone'];
date_default_timezone_set($cal_tz);
if (empty($arr['items'])) {
	echo '<div id="empty">';
	if (ICL_LANGUAGE_CODE == 'en') {
		echo 'No upcoming events.';
	} else {
		echo 'Aucun événement à venir.';
	}
	echo '</div>';
}
foreach ($arr['items'] as $event) {
    $title = $event['summary'];
    $descr = $event['description'];
    $dateStr = $event['start']['dateTime']; // starting date
    $dateStrEnd = $event['end']['dateTime']; // ending date
    if (empty($dateStr)) {
        $dateStr = $event['start']['date'];
    }
    if (empty($dateStrEnd)) {
	    $dateStrEnd = $event['end']['date'];
    }
    $temp_tz = $event->start->timeZone; // override default calendar timezone
    if (!empty($temp_tz)) {
        $timezone = new DateTimeZone($temp_tz);
    } else { // if no special timezone, set default calendar timezone
        $timezone = new DateTimeZone($cal_tz);
    }
    $datetime = new DateTime($dateStr, $timezone); // parse date string
    $datetimeend = new DateTime($dateStrEnd, $timezone);
    $link = $event['htmlLink'];
    $tzLink = $link . "&ctz=" . $calTimeZone; // append calendar time zone
    
    $t0 = "";
    if ($datetime->format("Y-m-d") !== $datetimeend->format("Y-m-d")) { // if start and end date are different
	    $t1 = "difEndDate";
	    if ($datetime->format("m") !== $datetimeend->format("m")) // if start and end month are different
		    $t0 = "difEndMonth";
	} else {
		$t1 = "sameEndDate";
	}
?>

<div class="event-container">
    <div class="<?php
	if (preg_match('/Deadline|deadline/', $title)) { // translation
		echo 'deadline';
	} else if (preg_match('/Training|training/', $title)) { //translation
	    echo 'training';
	} else {
		echo 'event';
	}
	?>">
        <span class=<?php echo $t1; ?>><?php
            if ($t0 !== "difEndMonth") {
	            echo $datetime->format('j');
            }
            if ($t1 == "difEndDate") {
	            if ($t0 == "difEndMonth") {
		            echo '<span class="difEndMonth">' . $datetime->format('j') . " ";
		            if (ICL_LANGUAGE_CODE == 'en') {
			            echo $datetime->format('M');
			        } else {
			            echo $months[$datetime->format('n')];
			        }
			        echo "-";
	            } else {
	            	echo "-" . $datetimeend->format('j');
	            }
            }
        ?></span><br>
        <span class="month"><?php
	        if ($t0 == "difEndMonth") {
		        echo $datetimeend->format('j') . " ";
		        if (ICL_LANGUAGE_CODE == 'en') {
			            echo $datetimeend->format('M');
			    } else {
			            echo $months[$datetimeend->format('n')];
			    }
	        } else {
	            if (ICL_LANGUAGE_CODE == 'en') {
	                echo $datetime->format('M');
	            } else {
	            echo $months[$datetime->format('n')];
	        }
        }
        ?></span>
    </div>

    <div class="summary">
        <a href="<?php echo $descr ?>"><?php echo mb_strimwidth($title, 0, 65, "..."); ?></a><br>
        <a href="<?php echo $event['htmlLink'] ?>" class="add"><?php
	        if (ICL_LANGUAGE_CODE == 'en') {
		        echo 'Add to calendar';
		    } else {
			    echo 'Ajouter au calendrier';
			}
		?></a>
    </div>
</div><?php
}
?>
</body>