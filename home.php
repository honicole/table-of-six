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
    // select loggedin users detail
    $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
    $userRow=mysql_fetch_array($res);
    
    
    if ( isset($_POST['btn-reg']) ) {
        
        // clean user inputs to prevent sql injections
        $name = trim($_POST['name']);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);
        
        $date = trim($_POST['date']);
        $date = strip_tags($date);
        $date = htmlspecialchars($date);
        
        $location = trim($_POST['location']);
        $location = strip_tags($location);
        $location = htmlspecialchars($location);
        
        //$date = $date." ".$time;
        $date = $time;
        
        if( !$error ) {
            
            $query = "INSERT INTO eventreg(Date,Location,user1) VALUES('$date','$location','$cuser')";
    
            $res = mysql_query($query);
                
            if ($res) {
                $errTyp = "success";
                $errMSG = "Successfully registered a new event!";
                unset($name);
                unset($email);
                unset($pass);
            } else {
                $errTyp = "danger";
                $errMSG = "Something went wrong, try again later...";   
            }   
                
        }
    }
?>
<!DOCTYPE html>
<html>
<style>
            #popup-form {
                display: none;
                position: absolute;
            }


</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

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
      <li><a href="Resto.php">Restaurant Info</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <span class="glyphicon glyphicon-user"></span>&nbsp;Hi, <?php 
                      $getName = mysql_query("SELECT * FROM users WHERE userID=$cuser");
                          while ($row = mysql_fetch_array($getName)) {
                              echo $row['userName'];
                          } ?>&nbsp;<span class="caret"></span></a>
                          <ul class="dropdown-menu">
          <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
        </ul>
      </li>
    </ul>
  </div><!--/.nav-collapse -->
</div>
</nav> 

    <div id="wrapper">

    <div class="container">
    
<div id="bout">
        <div class="aboutt">
<div class="meet">Do you enjoy meeting new people? </div> 
<div class="try"> Did you always want to try a new restaurant? </div>
<div class="perfect"> Then Table of Six is perfect for you! </div><br><br>
<div class="event"> Each event accommodates up to six people at a restaurant. <br>The creator of the event is responsible making the reservation.</div>
<div class="inst"> You will meet up to 5 new strangers and enjoy a meal together.<br> A list of suggested restaurants for the current week is also provided! </div>
<div class="enjoy"> Enjoy! </div>
        </div>
    </div>

        
        <!--reg event button hereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee>
        <a id="popup-clickie" href="fallback-link-to-form-page">Add Event</a>
        <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
        <div id="popup-form">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <table border="0"> 
                <tr> 
                        <td>Userame</td>
                        <td> <input type="text" name="name"></td> 
                </tr> 
                <tr>
                    <td>Select the date</td>
                    <td>
                        <input type="date" name="date">
                    </td>
                    <td>Select the time</td>
                    <td>
                        <input type="time" name="time">
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
                        <input id="button" type="submit" name="btn-reg" value="Sign-Up">
                    </td> 
                </tr> 
            </form> </table>

        </div>
    </div-->
    
    </div>
    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
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