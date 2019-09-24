<?php
	try
	{
		$acity=trim(filter_input(INPUT_POST,"arrivalcity"));
		$dcity=trim(filter_input(INPUT_POST,"departcity"));
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainappdb','root','');
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
	
		$sql="select train_name,train_no,arrival_time,departure_time,price,distance from 
		train_detail natural join train_time_detail natural join train_distance_detail natural join station_detail
		where city='$dcity' and train_no in
		(select train_no from train_detail natural join train_time_detail natural join train_distance_detail natural join station_detail
		where city='$acity')";
		
		$query=$dbhandler->query($sql);
		$r=$query->fetch(PDO::FETCH_ASSOC);
		//echo '<strong>'.$r. '</strong>';
        print_r($r);           
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>