<?php
try{
	$uname=trim(filter_input(INPUT_POST,"username"));
        $pass=trim(filter_input(INPUT_POST,"password"));
	$remeberme=filter_input(INPUT_POST,"remember-me");
        session_start();
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainappdb','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	if(!empty($uname)){
		$query=$dbhandler->prepare("select * from passanger_detail where username=?");
		$query->execute(array($uname));
		if($r=$query->fetch(PDO::FETCH_ASSOC))
		{
			if($r['password']==$pass)
			{
				$_SESSION["login"]=$uname;
							if($remeberme){
							   setcookie('login',$uname,60*1+time()); 
							}
							if(isset($_SESSION["book"]))
							{
								unset($_SESSION["book"]);
								header('LOCATION: ./booking.php');
							}
							else
							{
								echo $_SESSION["login"];
								header('LOCATION: ./home.php');
							}
			}
			else
			{
				$_SESSION["error"]=1;
							header('LOCATION: ./login.php');
			}
		}
		else
		{
			$_SESSION["error"]=2;
			header('LOCATION: ./login.php');
		}
	}
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}
?>