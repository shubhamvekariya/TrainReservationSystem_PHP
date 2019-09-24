<?php
	session_start();
?>

<html>
	<head>
		<title>MyOrder</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<style>
				.header {
			  overflow: hidden;
			  width:100%;
			  margin-bottom:0%;
			  background-color: #dbd7d9;
			  padding: 20px 10px;
			}
			
			.header div{
			  display: inline-block;
			}

			.header a {
			  float: left;
			  color: black;
			  text-align: center;
			  padding: 12px;
			  text-decoration: none;
			  font-size: 18px; 
			  line-height: 25px;
			  border-radius: 4px;
			}

			.header a.logo {
			  font-size: 25px;
			  font-weight: bold;
			}

			.header a:hover {
			  background-color: #ddd;
			  color: black;
			}

			.header a.active {
			  background-color: dodgerblue;
			  color: white;
			}

			.header-right {
			  float: right;
			  padding: 15px;
			}
			
			.header-font{
				padding-bottom:5%;
				font-size:40px;
			} 
			@media screen and (max-width: 500px) {
			  .header a {
				float: none;
				display: block;
				text-align: left;
			  }
			  
			  .header-right {
				float: none;
			  }
			}
			.hidden_input{
				display : none;
			}
			#di {
				background-color:#F0F8FF;
				
				
				
			}
			table{
				 border-collapse: collapse;
				border-radius: 10px;
				overflow: hidden;
				font-size:20;
				
			}
			td{
				padding: 7px 70px ;
			}
		</style>

	</head>
	<body>
	<header>
		<div class="header">
			<i class="fas fa-train fa-5x"></i>
			<font class="header-font">&nbsp VSK</font>
			<div class="header-right">
                        <?php
                            if(isset($_SESSION["login"])){
                                echo '<a>'.$_SESSION["login"].'</a><a class="active" href="home.php">Home</a><a href="logout.php">Logout</a>';
                            }
                            else if(isset($_COOKIE["login"])){
                                echo '<a>'.$_COOKIE["login"].'</a><a class="active" href="home.php">Home</a><a href="logout.php">Logout</a>';
                            }
                            else{
                                echo '<a class="active" href="home.php">Home</a><a href="login.php">Login</a><a href="registration.php">Registration</a>';
                            }
                        ?>
			<a href="review.html">Review</a>
			</div>
		</div>
	</header>
	<div id=di class="data">
<?php
try{
	
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainappdb','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	if(isset($_SESSION["login"]))
	{
		$name=$_SESSION["login"];
		$query=$dbhandler->query("select * from booking_detail where username='$name'");
		
		
		while($r=$query->fetch(PDO::FETCH_ASSOC))
		{
			$user=$r['username'];
			$pnr=$r['pnr'];
			$train_no=$r['train_no'];
			$seat=$r['no_of_seat'];
			
			echo '<div id=table><center><table> <colgroup>
			<col span="2" style="background-color:#FAEBD7; border-radius:5px;">
			
			</colgroup>';
			echo '<tr><td><b>pnr no:</b></td><td>'.$pnr.'</td></tr>';
			echo '<tr><td><b>train_no:</b></td><td>'.$train_no.'</td></tr>';
			echo '<tr><td><b>no_of_seat:</b></td><td>'.$seat.'</td></tr><br><center></table><div><br>';
		}
	}
	else
	{
		header('LOCATION: ./login.php');
	}
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}
?>
	</div>
	<footer class="footer" class="container">
		<center>
			<a href="https://www.facebook.com/" class="fa fa-facebook"></a>
			<a href="https://twitter.com/login" class="fa fa-twitter"></a>
			<a href="https://www.google.com/" class="fa fa-google"></a>
			<a href="https://www.linkedin.com/uas/login" class="fa fa-linkedin"></a>
		</center>
		<hr>
		<div class="text-center p-t-40">
			<a href="aboutus.html">
				ABOUT US   
			</a><br>
			<a href="contactus.html">
				 &#x260F; COTECT US
			</a><br>
			<a href="help.html">
				HELP CENTER
			</a>
			<br>
		</div>
		&#169;  Copyright 2019 Pvt.
		
		
	</footer>

	</body>