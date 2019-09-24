<?php
    session_start();
?>
<html>
<head>
<title>
booking..
</title>
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
	  margin-bottom:8%;
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

<?php
if(isset($_SESSION["login"]))
{
	echo'<form action="submit.php" method="post">';
	echo 'no. of Passangers: &nbsp &nbsp'.' 
		<select name="passanger">.
		<option value="1" >1</option>.
		<option value="2" >2</option>.
		<option value="3" >3</option>.
		<option value="4" >4</option>.
		<option value="5" >5</option>.
		<option value="6" >6</option>
		</select>';
		echo '<br/>';
		if(filter_input(INPUT_POST,"book_now1"))
			{
				$trainno=trim(filter_input(INPUT_POST,"trainno1"));
			}	
		if(filter_input(INPUT_POST,"book_now2"))
			{
				$trainno=trim(filter_input(INPUT_POST,"trainno2"));
			}
		if(filter_input(INPUT_POST,"book_now3"))
			{
				$trainno=trim(filter_input(INPUT_POST,"trainno3"));
			}
		if(filter_input(INPUT_POST,"book_now4"))
			{
				$trainno=trim(filter_input(INPUT_POST,"trainno4"));
			}
		if(!isset($_SESSION['trainno']))
		{
			$_SESSION['trainno']= $trainno;
			
		}
		echo '<br/>';
	echo'Enter Code <img src="captchafont.php"> <br/><br/>
		<input type="text" name="vercode1" />
		<input type="submit" name="Submit" value="Submit" />
		

	</form>';
}
else
{
	$_SESSION["book"]=1;
	header('LOCATION: ./login.php');
}
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
</body>
</html>
