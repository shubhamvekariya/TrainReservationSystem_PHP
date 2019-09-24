<?php

session_start();
if ($_POST['vercode1'] != $_SESSION['vercode'] OR $_SESSION['vercode']=='')  {
     echo  '<strong>Incorrect verification code.</strong>';
	  header('LOCATION: ./booking.php');
	  
	 
} else {
     // add form data processing code here

	 $pass=$_POST["passanger"];
	 $_SESSION['passangers']=$pass;
	 echo '<html><head><meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <meta name="viewport" content="width=device-width, initial-scale=1">	
		
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style>
		#bg{
			background:linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url(images/payment.png) no-repeat;
			background-size:cover;
			
			
		}
		.row{
			display: -ms-flexbox; /* IE 10 */
			  display: flex;
			  -ms-flex-wrap: wrap; /* IE 10 */
			  flex-wrap: wrap;
			  padding: 0 4px;
		}
				.content {
		  position: absolute;
		  bottom: 0;
		  background: rgb(0, 0, 0); /* Fallback color */
		  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
		  color: #f1f1f1;
		  align-text:center;
		  width: 100%;
		  margin-top:10%;
		  position: absolute;
		  font-size:50
		}
		.header {
	  overflow: hidden;
	  width:100%;
	
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
	</style>
	</head>';
		echo '<body><header>
		<div class="header">
			<i class="fas fa-train fa-5x"></i>
			<font class="header-font">&nbsp VSK</font>
			<div class="header-right">';
                       
                            if(isset($_SESSION["login"])){
                                echo '<a>'.$_SESSION["login"].'</a><a class="active" href="home.php">Home</a><a href="logout.php">Logout</a>';
                            }
                            else if(isset($_COOKIE["login"])){
                                echo '<a>'.$_COOKIE["login"].'</a><a class="active" href="home.php">Home</a><a href="logout.php">Logout</a>';
                            }
                            else{
                                echo '<a class="active" href="home.php">Home</a><a href="login.php">Login</a><a href="registration.php">Registration</a>';
                            }
                        
			echo '<a href="review.html">Review</a>
			</div>
		</div>
	</header>';
		echo '<form action="payment.php" method="POST">';
	  echo '<div class="row">';
	  echo ' <div id="bg" class="col-sm-4" >';
	
	
	 echo  '<input type="submit" name="submit" class="btn btn-primary" style="margin-top:50%; margin-left:40%; padding:10px; font-size:30; " value="payment"/></div>';
	 echo '</form>';
	 echo '<div class="col-sm-8"><img src="images/login.jpg" width=100%/>
	       <div class="content"><center>Thank You for Booking</center></div></div>';
	 
	 echo '</div>';
};

?>
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

</body></html>