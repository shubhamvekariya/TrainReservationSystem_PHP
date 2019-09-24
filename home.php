<?php
    session_start();
    $_SESSION["home"]='home';
?>
<html>
<head>
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">	
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
<style>

		body{
			background-image: url('images/login.jpg');
			background-repeat:no-repeat;
			background-size:100%;
			margin:0;
		}
		.box1{
			padding-bottom:20px;
		}
		#a1{
			color:black;
			padding-right:30px;
			type:button;
			color:black;

			
		}
		#a1:active , a1:hover{
		 	border-bottom:6px;
			border-bottom-color:orange;
			background-color:yellow;
			color:blue;


		}
		#a1:hover{
		 	border-bottom:6px;
			border-bottom-color:orange;
			background-color:yellow;
			color:blue;
			transition-duration:0.4s;
			

		}
		#a1:visited{
		 	border-bottom:6px;
			border-bottom-color:orange;
			background-color:tellow;
			color:blue;


		}
		.button{
			background-color:yellow;
			height:37px;
			width:65%;
			color:black;
			text-align: center;
                        text-decoration: none;
			display: inline-block;
			font-size: 16px;
			font-weight:700;
			border-radius:8px;
			float:right;
			margin:20px 5px 10px 50px;
			padding:7px 30px;
			text-align:center;
			transition-duration:0.4s;
		}
		.button:hover{
			color:blue;
		}
		#a3{
			padding-right:20px;
		}
		#a4{
			
		}
		#fbg{
			background-color:#eee;
			
			margin:0% 2%;
			border-radius:5px;
			padding:2% 2% ;
			
		} 
		.btn {
			  border: none;
		          
			  padding: 14px 28px;
			  font-size: 16px;
			  color:orange;
			  cursor: pointer;
			  display: inline-block;
			  transition-duration:0.6s;
			}
	.btn:hover{
		color:blue;
		font-weight:700;
	}
	.success {color: green;}
	.info {color: dodgerblue;}
	.warning {color: yellow;}
	.danger {color: red;}
	.default {color: black;}

	.wrapper { 
	  display: grid; 
	  grid-template-columns: repeat(4, 1fr); 
	  grid-auto-rows: 17px;
	} 

	.box4 { 
	  grid-column-start: 4;
	grid-column-end:5;  
	  grid-row-start: 1; 
	  grid-row-end: 4; 
	}
	.box5{
		  grid-column-start: 1;
	grid-column-end:2;  
	  grid-row-start: 2; 
	  grid-row-end: 4; 
	  
	}
	
	.box6{
		  grid-column-start: 2;
	grid-column-end:3;  
	  grid-row-start: 2; 
	  grid-row-end: 4; 
	}

	.i1{
		padding:7px 20px;
		margin:7px 15px 7px 1px;
		border-radius:8px;
	}
	.i2{
		padding:7px 20px;
		margin:7px 15px 7px 1px;
		border-radius:8px;

	}
	.i3{
		padding:5px 20px;
		padding-right:40%;
		margin:7px 15px 7px 1px;
		border-radius:8px;

	}
	
	.box7{
		  grid-column-start: 3;
	grid-column-end:4;  
	  grid-row-start: 2; 
	  grid-row-end: 4; 
	 
	}
	.wrapper1 {
	  display: grid;
	  grid-template-columns: 1fr 1fr 1fr;
	  
	}
	.c1{
		background-color:#eee;
		border-radius:5px;
		box-shadow:0px 8px 160px 0px;

	}
	#title1{
	   width:100%;
	   text-align:center;
	   font-size:28px;
	   margin:10px 0px;

	}


	
	#d1{
		font-size:20px;
		
	}
	#d2{
		font-size:20px;

	}
	#d3{
		font-size:20px;

	}

	.c1{
	margin:2% 2%;
	}

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
<body >
	<header>
		<div class="header">
			<i class="fas fa-train fa-5x"></i>
			<font class="header-font">&nbsp VSK</font>
			<div class="header-right">
                        <?php
                            if(isset($_SESSION["login"])){
                                echo '<a>'.$_SESSION["login"].'</a><a class="active" href="home.php">Home</a><a href="myorder.php">Myorder</a><a href="logout.php">Logout</a>';
                            }
                            else if(isset($_COOKIE["login"])){
                                echo '<a>'.$_COOKIE["login"].'</a><a class="active" href="home.php">Home</a><a href="myorder.php">Myorder</a><a href="logout.php">Logout</a>';
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
                                if(isset($_SESSION["error"])){
                                   if($_SESSION["error"]==1){
                                       $msg1="Date incorrect!!";
                                       $msg2="<br/>enter correct date";
                                   }
                                   echo "<div class=alert><span class=closebtn onclick=\"this.parentElement.style.display='none'\">&times;</span>";
                                   echo '<strong>'.$msg1.'</strong>'.$msg2.'</div>';
                                   unset($_SESSION["error"]);
                                }
                            ?>
	
		<div>
		<div>
			<table>
				<tr>
                               <td id=a1><button class="btn 1"><b>SEARCH TRAINS</b></button></td>
                               <td id=a1><a href="pnrstatus.php"><button class="btn 2"><b> PNR STATUS & CANCEL TICKET</b></button></a></td>
                               <td id=a1><a href="searchbynumber.php"><button class="btn 3"><b>SEARCH BY NUMBER</b></button></a></td>
					
				</tr>
			</table>

		</div>
	</div>    
    
	<div id=a2>
		<fieldset id =fbg>
		<form action="showtrain.php" method="POST">
		<div class="wrapper">
			<div class="box1">From</div>
			<div class="box2">To</div>
			<div class="box3">Date</div>
			<div class="box4"><input type="submit" class=button name="search" value="SEARCH" ></div>
			<div class="box5"><input type="text" name="departcity" class=i1 placeholder="Leaving form" size="15%" required /></div>
			<div class="box6"><input type="text" name="arrivedcity" class=i2 placeholder="Going to" size="15%" required /></div>
			<div class="box7"><input type="date" name="date" class=i3 size="15%" required /></div>
		</div>
		</form>
		</fieldset>
	</div>
        <fieldset class=c1>
	   <div id=title1>SPECIAL TRAINS<hr/></div>

		<div class="wrapper1" align="middle">
			 <div class="b1"><img src="rajdhani.jpg"/>
				  <div><div id=d1>Rajdhani</div>
				  <div>High speed train that connect new delhi to other destination.</div>
			</div>
		</div>
				   
				<div class="b2"><img src="shatabdi.jpg"/>
					<div><div id=d1>Shatabdi</div>
					<div>Day train connecting Metro cities  with other destination.</div>
				</div>
				</div>
				
				<div class="b3"><img src="garibrath.jpg" />
					<div><div id=d1>Garib Rath</div>
					<div>Long distance, affordable, no-frills and air conditioned trains.</div>

				</div>
				</div>
		</div>
	</fieldset>
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
</html>