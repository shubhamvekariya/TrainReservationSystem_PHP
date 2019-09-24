<?php
	try{
		session_start();
		if(isset($_POST['submit']))
		{
				$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainappdb','root','');
				$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
				$pnr=$_POST['pnr'];
				$name=$_POST['name'];
				$query2=$dbhandler->query("select * from booking_detail");
				$r=$query2->fetchAll(PDO::FETCH_ASSOC);
				
				foreach ($r as $r1)
				{
					if($r1['pnr']==$pnr && $r1['username']==$name)
					{
						$train_no=$r1['train_no'];
						$query4=$dbhandler->query("select * from train_availability where train_no='$train_no'");
						$r2=$query4->fetch(PDO::FETCH_ASSOC);
						
						$passangers=$r1['no_of_seat'];
						$total_available_seat=$r2['seat_availability'];
						$availablepassanger=$total_available_seat+$passangers;
						$query2=$dbhandler->query("update train_availability set seat_availability='$availablepassanger' where train_no='$train_no'");
						$query3=$dbhandler->query("delete from booking_detail where pnr='$pnr' and username='$name'");

						
							echo "<script type='text/javascript'>alert('Your ticket has been cancelled');</script>";
							header('Location:./home.php');
					}
					else
					{
						echo "<script type='text/javascript'>alert('enter valid data');</script>";
					}
				}
		}
	}catch(PDOException $e)
	{
		echo 'can\'t connect with database:'.$e->getMessage();
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Cancel Tickit</title>
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
		  background: url(img/bg7.jpg) no-repeat center center fixed; 
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
	<div id="pnr">Cancel Your Tickit<br/><br/>
	<form method="post" name="canceltickit" action="canceltickit.php">
	<div id="pnrtext"><input type="text" name="name" size="30" style="border-radius:5px;" maxlength="10" placeholder="Enter User name"></div>
	<div style="margin:10px;">
	<input type="text" name="pnr" size="30" style="border-radius:5px;" maxlength="10" placeholder="Enter  PNR"></div>
	<input type="submit" name="submit" value="Cencel Tickit" class="button btn btn-primary" id="submit"><br/>
	<br>
	</form>
	</div>
</center>
</body>
</html>