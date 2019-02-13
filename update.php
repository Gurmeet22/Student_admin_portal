<?php
	    $info = json_decode($_REQUEST['q'], true);
	    $servername = "localhost";
		$username = "Gurmeet";
		$password = "WINDOWSTEN";
		$dbname = "studentdb";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
        }
        $name = $info["name"];
        $email = $info["email"];
        $ph = $info["contact"];
        $dob = date('Y-m-d', strtotime($info['dob']));
        $fname = $info["fname"];
        $age = $info["age"];
        $user = $info["uname"];
        $cat = $info["cat"];
        $gen = $info["gender"];
        $roll = $info["roll"];
		$sql = "UPDATE class 
        SET Name = '$name', Father = '$fname', Age = ".$age.", DOB = '$dob', Email = '$email', Gender = '$gen', Contact = '$ph', Username = '$user', Category = '$cat' 
        WHERE Roll=".$roll;		
		$conn->query($sql);
		echo $info["roll"];
?>