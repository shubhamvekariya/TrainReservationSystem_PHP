<html>
<head>
<title>succesfull book ticket.</title>
	
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
			body {
				background-color:#F0F8FF;
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
				padding: 20px 70px ;
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
						session_start();
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
	try{
		
		if(isset($_POST['submit'])){
			$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainappdb','root','');
			$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$passangers=$_SESSION['passangers'];
		    $pnr= mt_rand(1000000000,mt_getrandmax());
			$name=$_SESSION['login'];
		    $depart_city=$_SESSION['depart_city'];
			$arrival_city=$_SESSION['arrive_city'];
			$depart_time=$_SESSION['depart_time'];
			$arrival_time=$_SESSION['arrive_time'];
			
			$train_no=$_SESSION['trainno'];
			$query4=$dbhandler->query("select * from train_availability");
			while($r=$query4->fetch(PDO::FETCH_ASSOC))
			{
				$date=$r['date'];
				$train_no1=$r['train_no'];
				if($_SESSION['date']==$date && $train_no==$train_no1)
				{
					$_SESSION["count"]=1;
					break;
				}
				else
				{
					$_SESSION["count"]=0;
				}
			}
							$date=$_SESSION['date'];

			if($_SESSION["count"]==0)
			{	
				$query5=$dbhandler->query("insert into train_availability(train_no,seat_availability,date) values ('".$train_no."','100','".$_SESSION["date"]."')");
				$query=$dbhandler->query("select * from train_availability where train_no='$train_no' and date='$date'");
				$r=$query->fetch(PDO::FETCH_ASSOC);
				$total_available_seat=$r['seat_availability'];
				
				
				$flag = 1;
				
				$availablepassanger=$total_available_seat-$passangers;
				if($availablepassanger>=0)
				{
					$query2=$dbhandler->query("update train_availability set seat_availability='$availablepassanger' where train_no='$train_no'");
					$sql="insert into booking_detail (pnr,username,train_no,no_of_seat) values ('".$pnr."','".$name."','".$train_no."','".$passangers."')";
					$query=$dbhandler->query($sql);
				}
				else
				{
					echo'no place available';
					$flag = 0;
				}

			}
			else
			{
				$query=$dbhandler->query("select * from train_availability where train_no='$train_no' and date='$dates'");
				$r=$query->fetch(PDO::FETCH_ASSOC);
				$total_available_seat=$r['seat_availability'];
				
				
				$flag = 1;
				
				$availablepassanger=$total_available_seat-$passangers;
				if($availablepassanger>=0)
				{
					$query2=$dbhandler->query("update train_availability set seat_availability='$availablepassanger' where train_no='$train_no'");
					$sql="insert into booking_detail (pnr,username,train_no,no_of_seat) values ('".$pnr."','".$name."','".$train_no."','".$passangers."')";
					$query=$dbhandler->query($sql);
				}
				else
				{
					echo'no place available';
					$flag = 0;
				}
			}
			if($flag == 1)
			{
						$email=$dbhandler->query("select * from passanger_detail where username='$name'");
						$email=$email->fetch(PDO::FETCH_ASSOC);
					    $to = $email['email_address'];  
						//$bid=$dbhandler->query("select * from booking_detail where username='$name' and pnr='".$pnr['PNR']."'");
						//$bid=$bid->fetch(PDO::FETCH_ASSOC);
					    $subject = "Your Ticket";  
						$message="<br><h5>username:</h5>".$name.
							"<br><h5>Train no. </h5>".$train_no.
							"<br><h5>you have booked Ticket</h5>".$passangers.
							"<br><h5>pnr</h5>".$pnr.
							"<br><h5>departure city</h5>".$depart_city.
							"<br><h5>arrival city</h5>".$arrival_city.
							"<br><h5>depart time</h5>".$depart_time.
							"<br><h5>arrival time</h5>".$arrival_time;
					    $headers = "MIME-Version: 1.0" . "\r\n";
					    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					    $headers .= "From:xyz@example.com \r\n";
						
						
			 
					  
					    $result = mail($to,$subject,$message,$headers);  
					  
					    
					echo "<div id=di class='data'><div id=table><center><table>
							<col span='2' style='background-color:#FAEBD7; border-radius:5px;'>
							
							</colgroup><tr><td clospan=2 style='padding-left:30px; padding-right:30px'>Ticket Detail</td></tr></table></center></div></div><br>";
					
					
					echo "<div id=di class='data'><div id=table><center><table>
							<col span='2' style='background-color:#FAEBD7; border-radius:5px;'>
			
							</colgroup>
							<tr><td><h5>Username</h5></td><td>".$name."</td></tr>".
							"<tr><td><h5>Train No. </h5></td><td>".$train_no."</td></tr>".
							"<tr><td><h5>You Have Booked Ticket</h5></td><td>".$passangers."</td></tr>".
							"<tr><td><h5>PNR</h5></td><td>".$pnr."</td></tr>".
							"<tr><td><h5>departure city</h5></td><td>".$depart_city."</td></tr>".
							"<tr><td><h5>Arrival City</h5></td><td>".$arrival_city."</td></tr>".
							"<tr><td><h5>Depart Time</h5></td><td>".$depart_time."</td></tr>".
							"<tr><td><h5>Arrival Time</h5></td><td>".$arrival_time."</td></tr></table></center></div></div><br><br>";
					unset($_SESSION['depart_city']);
					unset($_SESSION['arrive_time']);
					unset($_SESSION['arrive_city']);
					unset($_SESSION['depart_time']);
					unset($_SESSION["date"]);
					

									
			}
		}
					
		}
		catch(PDOException $e){
			echo 'SORRY!!!  Could not Connect Due to Some Database issue: '.$e->getMessage();
			die();
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