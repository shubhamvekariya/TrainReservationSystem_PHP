<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration</title>
	<meta charset="UTF-8">
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
        .alert {
          padding: 20px;
          background-color: #f44336;
          color: white;
        }

        .closebtn {
          margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 22px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;
        }

        .closebtn:hover {
          color: black;
        }
        </style>
</head>
<body>
        <header>
		<div class="header">
			<i class="fas fa-train fa-5x"></i>
			<font class="header-font">&nbsp VSK</font>
			<div class="header-right">
			<a href="Home.php">Home</a>
			<a class="active" href="Registration.php">Registration</a>
			<a href="review.html">Review</a>
			</div>
		</div>
	</header>
	
	<div class="limiter">
		<div class="co" style="background-image: url('images/login.jpg'); background-size:cover;">
			<div class="wrap">
                             <?php
                                session_start();
                                if(isset($_SESSION["error"])){
                                   if($_SESSION["error"]==1){
                                       $msg1="Password incorrect!!";
                                       $msg2="<br/>confirm password and password aren't same";
                                   }
                                   if($_SESSION["error"]==2){
                                       $msg1="Username already exist!!";
                                       $msg2="";
                                   }
								   if($_SESSION["error"]==3){
                                       $msg1="Mobile Number is invalid!!";
                                       $msg2="</br>enter correct mobile number";
                                   }
                                   echo "<div class=alert><span class=closebtn onclick=\"this.parentElement.style.display='none'\">&times;</span>";
                                   echo '<strong>'.$msg1.'</strong>'.$msg2.'</div>';
                                   unset($_SESSION["error"]);
                                }
                            ?>
				<form class="login-form validate-form" action="insertdataofregistration.php" method="POST">
					<span class="login-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login-form-title p-b-20 p-t-10">
						Sign UP
					</span>
					<div class="row">
						<div class="col-md-6">
						<div class="wrap-input validate-input" >
						<input class="input" type="text" name="firstname" placeholder="First Name" required>
						<span class="focus-input" data-placeholder="&#xf207;"></span>
					</div></div>
						<div class="col-md-6">
						<div class="wrap-input validate-input" >
						<input class="input" type="text" name="lastname" placeholder="Last Name"required>
						<span class="focus-input" data-placeholder="&#xf207;"></span>
					</div></div>
					</div>
					<div class="wrap-input validate-input">
						<input class="input" type="text" name="username" placeholder="Username" minlength=6 maxlength=10 required>
						<span class="focus-input" data-placeholder="&#xf207;"></span>
					</div>
					
					<div class="row">
						<div class="col-md-4">	
						<input type="radio" name="gender" value="male" checked> Male</div>
						<div class="col-md-4">
                        <input type="radio" name="gender" value="female"> Female</div>
						<div class="col-md-4">
                        <input type="radio" name="gender" value="transgender"> Transgender</div>
					</div>
					<br>

					<div class="wrap-input validate-input">
                                            <input class="input" type="email" name="email" placeholder="Email Id" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" required />
						<span class="focus-input" data-placeholder="&#x2709;"></span>
					</div>
					
					<div class="wrap-input validate-input">
                                            <input class="input" type="date" name="birthdate" placeholder="Birth Date" required>
						<span class="focus-input" data-placeholder="&#x1F5D3;"></span>
					</div>
					
					<div class="wrap-input validate-input">
						<input class="input" type="text" name="mobileno" placeholder="Mobile Number" pattern="\d{10}" >
						<span class="focus-input" data-placeholder="&#x2706;"></span>
					</div>
					
					<div class="wrap-input validate-input">
						<input class="input" type="password" name="password" placeholder="Password" minlength=8 maxlength=14 required>
						<span class="focus-input" data-placeholder="&#xf191;"></span>
					</div>
					
					<div class="wrap-input validate-input">
						<input class="input" type="password" name="confirmpassword" placeholder="Confirm Password" minlength=8 maxlength=14 required>
						<span class="focus-input" data-placeholder="&#xf191;"></span>
					</div>
					
					<input type="checkbox" name="agree" required /> I have read and agree with <a style="text-decoration:none; color:blue;"href="termsandcondition.html">Terms and Conditions</a>.
					<br>
					<br>
					<div class="container-login-form-btn">
						<button class="login-form-btn">
							Sign Up
						</button>
					</div>
					<br>
					<div class="text-center p-t-10">
					Already have an account?
						<a class="txt1" href="login.php">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
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