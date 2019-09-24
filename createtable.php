<?php
try{
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainappdb','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql="create table passanger_detail(
            username VARCHAR(10) NOT NULL PRIMARY KEY,
            password VARCHAR(14) NOT NULL,
            full_name VARCHAR(50) NOT NULL,
            birth_date date,
            gender VARCHAR(12) NOT NULL,
            mobile_no VARCHAR(10),
            email_address VARCHAR(100),
            posted datetime	
	);
        create table station_detail(
            station_id int(5) AUTO_INCREMENT PRIMARY KEY,
            station_name VARCHAR(30) NOT NULL,
            city VARCHAR(15) NOT NULL
	);
        create table train_detail(
            train_no int(5) AUTO_INCREMENT PRIMARY KEY,
            train_name VARCHAR(30) NOT NULL,
            no_of_seat int(5) NOT NULL
	);
        create table train_availability(
            train_availability_id int(5) AUTO_INCREMENT PRIMARY KEY,
            train_no int(5),
            seat_availability int(5) default 100 NOT NULL,
            FOREIGN KEY (train_no) REFERENCES train_detail(train_no)
	);
        create table booking_detail(
            pnr int(10) PRIMARY KEY,
            username VARCHAR(10) NOT NULL, 
            train_no int(5),
            no_of_seat int(5) NOT NULL,
            price int(5),
            travel_date date,
            FOREIGN KEY (username) REFERENCES passanger_detail(username),
            FOREIGN KEY (train_no) REFERENCES train_detail(train_no)
	);
        create table train_time_detail(
            station_id int(5), 
            train_no int(5),
            arrival_time time,
            departure_time time,
            PRIMARY KEY (station_id,train_no),
            FOREIGN KEY (station_id) REFERENCES station_detail(station_id),
            FOREIGN KEY (train_no) REFERENCES train_detail(train_no)
	);
        create table train_distance_detail(
            train_distance_id int(5) AUTO_INCREMENT PRIMARY KEY, 
            train_no int(5) references train_detail(train_no),
            arrival_station_id int(5),
            departure_station_id int(5),
            price int(5),
            distance int(5),
            FOREIGN KEY (arrival_station_id) REFERENCES station_detail(station_id),
            FOREIGN KEY (departure_station_id) REFERENCES station_detail(station_id),
            FOREIGN KEY (train_no) REFERENCES train_detail(train_no)
	)";
	$query=$dbhandler->query($sql);
	echo "Table is created successfully";
		
		
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}

?>