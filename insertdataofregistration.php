<?php
    $uname=trim(filter_input(INPUT_POST,"username"));
    $pass=trim(filter_input(INPUT_POST,"password"));
    $cpass=trim(filter_input(INPUT_POST,"confirmpassword"));	
    $fname=trim(filter_input(INPUT_POST,"firstname"));
    $lname=trim(filter_input(INPUT_POST,"lastname"));
    $name=$fname.' '.$lname;
    $bdt=date(filter_input(INPUT_POST,"birthdate")); 
    $gen=filter_input(INPUT_POST,"gender");
    $mob=trim(filter_input(INPUT_POST,"mobileno"));
    $email=trim(filter_input(INPUT_POST,"email"));
	$pattern="/^[6-9][0-9]{9}$/";
    session_start();
	if($pass==$cpass)
	{	
		if(preg_match($pattern,$mob))
		{
			try{
				$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainappdb','root','');
				$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$sql="insert into passanger_detail (username,password,full_name,birth_date,gender,Mobile_no,Email_address,Posted) values ('$uname','$pass','$name','$bdt','$gen','$mob','$email',now())";
				$query=$dbhandler->query($sql);
				$_SESSION["login"]= $uname;
				if(isset($_SESSION["book"]))
				{
					unset($_SESSION["book"]);
					header('LOCATION: ./booking.php');
				}
				else
				{
					header('LOCATION: ./home.php');
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
				$_SESSION["error"]=2;
				header('LOCATION: ./registration.php');
			}
		}
		else
		{
			$_SESSION["error"]=3;
			header('LOCATION: ./registration.php');
		}
	}
	else
	{
        $_SESSION["error"]=1;
		header('LOCATION: ./registration.php');
	}
?>
