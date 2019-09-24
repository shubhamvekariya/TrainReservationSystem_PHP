<?php 
try{
	session_start();
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainappdb','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	if (isset($_POST['submit']))
	{
	$pnr=$_POST['pnr'];
		
	$query=$dbhandler->query("SELECT * from booking_detail WHERE PNR = '$pnr'");
	$r=$query->fetch(PDO::FETCH_ASSOC);
	$user=$r['username'];
	$t=$r['train_no'];
	$s=$r['no_of_seat'];

		if($r==NULL)	echo "<script type='text/javascript'>alert('PNR not found');</script>";
		else echo "<script type='text/javascript'>alert('Your username is ' +'$user' +' . '+'your train_no is'+'$t'+' . '+'your no_of_seat is'+'$s');</script>";	
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
	<title>PNR Status</title>
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
			height: 400px;
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
	<div id="pnr">Check your PNR status here:<br/><br/>
	<form method="post" name="pnrstatus" action="pnrstatus.php">
	<div id="pnrtext"><input type="text" name="pnr" size="30" style="border-radius:5px;" maxlength="10" placeholder="Enter PNR here"></div>
	<br/><br/>
	<input type="submit" name="submit" value="Check here!" class="button btn btn-primary" id="submit"><br/>
	<br>
	</form>
	<?php  
		if(isset($_SESSION['login'])){
			echo '<form action="canceltickit.php" method="post"><br><br><input type="submit" class="button btn btn-primary" value="Cancel your ticket!" name="cancel" id="cancel"/></form>';
        }
		else
			echo '<A HREF="register.php">Register</A>&nbsp &nbsp &nbsp<A HREF="login.php">Login</A>';
		?>
	
	</div>
</center>
</body>
</html>