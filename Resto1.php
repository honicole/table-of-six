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
<link rel="stylesheet" href="style2.css" type="text/css" />
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
            <li ><a href="home.php">About</a></li>
            <li><a href="calendar.php">Event Calendar</a></li>
            <li class="active"><a href="Resto.php">Restaurant Info</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user"></span>&nbsp;Hi, <?php echo $userRow['userEmail']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
  
<div style="text-align:center;">
</div>


<div id="plans" class="clearfix">
  <div class="title"> Suggested restaurants of the week </div>

        </div>

<div id="plans" class="clearfix">
        <?php
$res=mysql_query("SELECT name, address, price, phone, website FROM restaurants");
$userRow=mysql_fetch_array($res);
$hasResto = mysql_num_rows($res);

if ($hasResto > 0) {
    // output data of each row
    while($row = $userRow=mysql_fetch_array($res)) {

        echo '<div class="plan"> <div class="name"> Name: '. $row["name"] . '</div>';
        echo '<div class="price"> Address: '. $row["address"] . '</div>';
        echo '<div class="name"> Price: '. $row["price"] . '</div>';
        echo '<div class="name"> Phone: '. $row["phone"] . '</div>';
        echo '<div class="name"> Website: '. $row["website"] . '</div> </div>';

    }
} else {
    echo "0 results";
}
?> 
</div>

<!-- 
Hello 

<p> six and seven: (
<?php
$test =  exec('C:/Python27/python.exe C:/xampp/htdocs/six/testing/new/pyth.py');
$arr = explode(" ", $test);
$arr1 = preg_replace('/[^0-9.-]/', '', $arr);
$lat = $arr1[6]; 
$lot = $arr1[7]; 
echo $lat;
echo $lot;
?>)
</p>

insert Maps1.html at bottom of page with title: Search your preferred restaurant on the map 
<div class="map">
<object width="100%" height="100%" type="text/html" data="Maps1.html"></object>
</div> -->

<div id="map" style="width:100%;height:400px;"></div>

<script>
function myMap() {
var myCenter = new google.maps.LatLng(
<?php
$test =  exec('C:/Python27/python.exe C:/xampp/htdocs/six/testing/new/pyth.py');
$arr = explode(" ", $test);
$arr1 = preg_replace('/[^0-9.-]/', '', $arr);
$lat = $arr1[0]; 
echo $lat;
?>, 
<?php
$test =  exec('C:/Python27/python.exe C:/xampp/htdocs/six/testing/new/pyth.py');
$arr = explode(" ", $test);
$arr1 = preg_replace('/[^0-9.-]/', '', $arr);
$lot = $arr1[1]; 
echo $lot;
?>);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
    center: myCenter, zoom: 13,     
    zoomControl: true,
    mapTypeControl: true,
    scaleControl: true,
    streetViewControl: true,
    overviewMapControl: true,
    rotateControl: true};

  var myCenter2 = new google.maps.LatLng(
<?php
$test =  exec('C:/Python27/python.exe C:/xampp/htdocs/six/testing/new/pyth.py');
$arr = explode(" ", $test);
$arr1 = preg_replace('/[^0-9.-]/', '', $arr);
$lat = $arr1[2]; 
echo $lat;
?>, 
<?php
$test =  exec('C:/Python27/python.exe C:/xampp/htdocs/six/testing/new/pyth.py');
$arr = explode(" ", $test);
$arr1 = preg_replace('/[^0-9.-]/', '', $arr);
$lot = $arr1[3]; 
echo $lot;
?>);
  var mapOptions2 = {
    center: myCenter, zoom: 13};

  var myCenter3 = new google.maps.LatLng(
<?php
$test =  exec('C:/Python27/python.exe C:/xampp/htdocs/six/testing/new/pyth.py');
$arr = explode(" ", $test);
$arr1 = preg_replace('/[^0-9.-]/', '', $arr);
$lat = $arr1[4]; 
echo $lat;
?>, 
<?php
$test =  exec('C:/Python27/python.exe C:/xampp/htdocs/six/testing/new/pyth.py');
$arr = explode(" ", $test);
$arr1 = preg_replace('/[^0-9.-]/', '', $arr);
$lot = $arr1[5]; 
echo $lot;
?>);
  var mapOptions3 = {
    center: myCenter, zoom: 13};

      var myCenter4 = new google.maps.LatLng(
<?php
$test =  exec('C:/Python27/python.exe C:/xampp/htdocs/six/testing/new/pyth.py');
$arr = explode(" ", $test);
$arr1 = preg_replace('/[^0-9.-]/', '', $arr);
$lat = $arr1[6]; 
echo $lat;
?>, 
<?php
$test =  exec('C:/Python27/python.exe C:/xampp/htdocs/six/testing/new/pyth.py');
$arr = explode(" ", $test);
$arr1 = preg_replace('/[^0-9.-]/', '', $arr);
$lot = $arr1[7]; 
echo $lot;
?>);
  var mapOptions4 = {
    center: myCenter, zoom: 13};

  var map = new google.maps.Map(mapCanvas, mapOptions, mapOptions2);
  var marker = new google.maps.Marker({position:myCenter});
  var marker2 = new google.maps.Marker({position:myCenter2});
  var marker3 = new google.maps.Marker({position:myCenter3});
  var marker4 = new google.maps.Marker({position:myCenter4});
  marker.setMap(map);
  marker2.setMap(map);
  marker3.setMap(map);
  marker4.setMap(map);


    var infowindow = new google.maps.InfoWindow({ content: "O.Noir" });
    infowindow.open(map,marker);
    var infowindow2 = new google.maps.InfoWindow({ content: "Lola Rosa Parc" });
    infowindow2.open(map,marker2);
    var infowindow3 = new google.maps.InfoWindow({ content: "Restaurant Europea" });
    infowindow3.open(map,marker3);
    var infowindow4 = new google.maps.InfoWindow({ content: "BONAPARTE WITH PYTHON" });
    infowindow4.open(map,marker4);

}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbVDGBM6Ldf2uQ9K059qzL9ZSGsYqDhYc&libraries=places&callback=myMap"
        async defer></script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-10146041-24', 'auto');
  ga('send', 'pageview');
</script>
</body>
</html>

