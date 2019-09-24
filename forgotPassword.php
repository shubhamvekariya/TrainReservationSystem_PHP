<?php  

try{
	
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainappdb','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $uname=trim(filter_input(INPUT_POST,"username"));
        $uemail=trim(filter_input(INPUT_POST,"email"));
	$query=$dbhandler->query("select * from passanger_detail where username='$uname'");
        
	  if($r=$query->fetch(PDO::FETCH_ASSOC))
	  {
			if($r['email_address']==$uemail){
			   $to = $uemail;  
                           $password=$r['password'];
			   $subject = "RESET PASSWORD";  
				$message="Your Password is ".$password;
			  
			   $header = "From:vsktrainsystem@gmail.com \r\n";  
			    
	
			  
			   $result = mail ($to,$subject,$message,$header);  
			  
			   if( $result == true ){  
				  echo "Message sent successfully...";  
			   }else{  
				  echo "Sorry, unable to send mail...";  
			   }
			   
			}
                        else echo'12345';
	  }
}catch(PDOException $e)
{
	echo 'Can not cunnect,,,'; 
}
?>  




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forgot Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="co" style="background-image: url('images/login.jpg'); background-size:cover;">
			<div class="wrap">
                            <form class="login-form validate-form" action="forgotPassword.php" method="POST">
					
					<span class="login-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login-form-title p-b-40 p-t-40">
						Forgot Password
					</span>
					
					<div class="wrap-input validate-input">
						<input class="input" type="text" name="username" placeholder="Username" required>
						<span class="focus-input" data-placeholder="&#xf207;"></span>
					</div>
					
					<div class="wrap-input validate-input">
                                            <input class="input" type="email" name="email" placeholder="Email Id " pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" required />
						<span class="focus-input" data-placeholder="&#x2709;"></span>
					</div>
					
					<br>
					<br><br>
					<div class="container-login-form-btn">
						<button class="login-form-btn " name="submit">
							Reset My Password
						</button>
					</div>
					<br>
					
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
</body>
</html>