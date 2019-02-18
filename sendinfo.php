<?php
	$p=array();$ch=array();$m=array();$t=array();
	$size=sizeof($_POST);
	$number=$size/3;
	$i=0;$number--;
	for($i=0;$i<$number;$i++)
	{
		$index1="phy".$i;
		$p[$i]=$_POST[$index1];
		$index2="chem".$i;
		$ch[$i]=$_POST[$index2];
		$index3="math".$i;
		$m[$i]=$_POST[$index3];
		$t[$i]=$p[$i]+$ch[$i]+$m[$i];
	}
	$servername = "localhost";
	$username = "Gurmeet";
	$password = "WINDOWSTEN";
	$dbname = "studentdb";
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	for($i=0;$i<$number;$i++){
		$sql = "UPDATE marks SET Physics = $p[$i], Chemistry = $ch[$i], Maths = $m[$i], Total = $t[$i]
		WHERE Roll = ".($i+1);		
		$conn->query($sql);
	}
	//header('Location: http://localhost/JEE/table.php');
	echo '<script>window.location = "http://localhost/JEE/table.php";alert("Data updated Successfully");</script>';
	
	
?>