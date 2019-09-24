<?php 
	try{
	session_start();
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainappdb','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	if (isset($_POST['submit']))
	{
	$searchbynumber=$_POST['searchbynumber'];
	date_default_timezone_set('Asia/Kolkata');
	$time=date('H:i:s');
	$query=$dbhandler->query("SELECT * FROM train_detail natural join train_time_detail natural join station_detail WHERE train_no = '$searchbynumber' and 
			arrival_time < '$time' and departure_time > '$time'");
	$r=$query->fetch(PDO::FETCH_ASSOC);
	
	
		if($r==NULL)	echo "<script type='text/javascript'>alert('Invalid Train Number');</script>";
		else echo "<script type='text/javascript'>alert('Train status is ' +'$r[station_name]');</script>";	
	}
	
}
catch(PDOException $e)
{
	echo 'can not connect';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>SEARCH TRAIN</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#pnr	{
			font-size: 20px;
			background-color: white;
			width: 500px;
			height: 300px;
			margin: auto;
			border-radius: 25px;
			border: 2px solid blue; 
			margin: auto;
  			position: absolute;
  			left: 0; 
  			right: 0;
  			padding-top: 40px;
  			padding-bottom:20px;
  			margin-top: 130px;
 
		}
		html { 
		  background: url(images/login.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#pnrtext	{
			padding-top: 20px;
			box-radius:5px;
		}
		.b1{
			border-radius:3px;
			padding:5px;
		}
	</style>
</head>
<body>

<center>
	<div id="pnr">SEARCH TRAIN<br/><br/>
	<form method="post" name="search" action="searchbynumber.php">
	<div id="pnrtext"><input type="text" name="searchbynumber" size="30" style="border-radius:5px;" maxlength="10" placeholder="ENTER TRAIN NUMBER"></div>
	<br/><br/>
	<input type="submit" name="submit" value="Check here!" class="button btn btn-primary" id="submit"><br/>
	</form>
	</div>
</center>
</body>
</html>