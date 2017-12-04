<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';

	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	} else {
		$cuser = $_SESSION['user'];
	}
		$error = false;
	
	if ( isset($_POST['btn-reg']) ) {
		
		// clean user inputs to prevent sql injections
		
		$date = trim($_POST['date']);
		$date = strip_tags($date);
		$date = htmlspecialchars($date);
		
		$location = trim($_POST['location']);
		$location = strip_tags($location);
		$location = htmlspecialchars($location);
		
		if( !$error ) {
			
			$query = "INSERT INTO eventreg(Date,Location,user1) VALUES('$date','$location','$cuser')";
	
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully registered a new event!";
				unset($location);
				unset($date);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
	}
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/calendar.js"></script>

	<title>Create Event</title>
</head>
<body>

<!---a id="popup-clickie" href="fallback-link-to-form-page">Add Event</a-->
<?php
if ($errTyp=="success" || $errType=="danger") {
	echo '<div class="alert alert-' . (($errTyp=="success") ? "success" : $errTyp) . '">
		<span class="glyphicon glyphicon-info-sign"></span>' . $errMSG . '</div>';
}?>
<div id="popup-form">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
	<table border="0"> 
		<tr>
			<td>Select the date and time</td>
			<td>
				<input type="datetime-local" name="date">
			</td>
		</tr> 
		<tr>
			<td>Select the restaurant</td>
			<td>
				<select name="location">
				<?php
				$result = mysql_query("SELECT * FROM restaurants");
				while ($row = mysql_fetch_assoc($result)){
					echo '<option value=' . $row['ID'] . '>' . $row['name'] . '</option>';
				}
				?>
				</select>
			</td>
		<tr> 
			<td>
				<input id="button" type="submit" name="btn-reg" value="Add Event" role="button" class="btn btn-success">
			</td> 
		</tr> 
	</form> </table>
	<a href="calendar.php" role="button" class="btn btn-warning">Go back to calendar</a>

</div>
</div>


					<script>
            var showPopup = function(event) {
                event.preventDefault();
                document
                    .getElementById('popup-form')
                    .style.display = 'block';
            };

            document
                .getElementById('popup-clickie')
                .addEventListener('click', showPopup);

        </script>
</body>
</html>
<?php ob_end_flush(); ?>