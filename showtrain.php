<?php
    session_start();
    if(!isset($_SESSION["home"]))
    {
        header('LOCATION: ./home.php');
    }
	$date=filter_input(INPUT_POST,"date");
	if($date<date("Y-m-d"))
	{
		$_SESSION["error"]=1;
        header('LOCATION: ./home.php');
	}
	$_SESSION['date']=$date;
?>
<html>
<head>
	<title>Show Train</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">	
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
<style>
	
		#cen{
			background-image: url('images/login.jpg'); 
			background-repeat:no-repeat; 
			background-size:100%; 
			margin:0;
		}
	
        #a {
                background-color: #4CAF50;
                border: none;
                padding: 15px 80px;
                text-decoration: none;
                margin: 4px 200px;
                cursor: pointer;
                font-size:20px;
        }
	#a:hover{
	 	border-bo0ttom:6px;			
                border-bottom-color:orange;
		background-color:yellow;
		color:blue;
		transition-duration:0.4s;
	}
        
	#a:visited{
	 	border-bottom:6px;
		border-bottom-color:orange;
		background-color:yellow;
		color:blue;
        }

        .a1{
                background-color:#eee;
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
	.hidden_input{
		display : none;
	}
	#div{
		padding-left:50px;
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
	</header
<div id="cen">
<?php
try{
	$departcity=trim(filter_input(INPUT_POST,"departcity"));
    $arrivedcity=trim(filter_input(INPUT_POST,"arrivedcity"));
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainappdb','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query=$dbhandler->query("select train_no from  station_detail natural join train_detail natural join train_time_detail 
		where city='$arrivedcity'");
        
        while($r=$query->fetchAll(PDO::FETCH_ASSOC))
        {   
            $i=0;
			$k=1;
            while ($i!=$query->rowCount()) 
			{

                $trainno=$r[$i]['train_no'];
                $query1=$dbhandler->query("select * from station_detail natural join train_detail natural join train_time_detail
                    where train_no='$trainno' and city='$arrivedcity' and arrival_time>
                    (select arrival_time from  station_detail natural join train_detail natural join train_time_detail
                    where city='$departcity' and train_no='$trainno')");
                echo '<div id=div>';
				while($r1=$query1->fetchAll(PDO::FETCH_ASSOC))
                {
					    echo'<form action="booking.php" method="POST"><fieldset id=a1>';
						echo '<b>Train name:</b> '.$r1[0]['train_name'].'('.$r1[0]["train_no"].')'.'<input type="text" class="hidden_input" value="'.$r1[0]["train_no"].'" name="trainno'.$k.'"><br/>';
						
						
                        $query2=$dbhandler->query("select * from  station_detail natural join train_detail natural join train_time_detail
                        where city='$departcity' and train_no='$trainno' ");
                        if($r2=$query2->fetch(PDO::FETCH_ASSOC))
						{
						$_SESSION['depart_time']=$r2['departure_time'];
						$_SESSION['depart_city']=$r2['station_name'];
						$_SESSION['arrive_time']=$r1[0]['arrival_time'];
						$_SESSION['arrive_city']=$r1[0]['station_name'];
						
                        echo '<b>Departure time:</b> '.$r2['departure_time'].'&nbsp &nbsp &nbsp &nbsp';
                        echo '<b>Arrival time:</b> '.$r1[0]['arrival_time'].' &nbsp ';
						echo '<input type="submit" value="book now" id=a name="book_now'.$k.'"/> <br/>';
                        echo '<b>Departure station:</b> '.$r2['station_name'].','.$r2['city'].'&nbsp &nbsp &nbsp &nbsp';
						}
						echo '<b>Arrival station:</b> '.$r1[0]['station_name'].','.$r1[0]['city'];
							'</fieldset></form>';
						echo '<br><br><br><br>';
						$k+=1;
                }
				echo '</div>';
                $i+=1;
            }
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
</html>