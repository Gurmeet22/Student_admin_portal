<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="MainStyle.css" rel="stylesheet" type="text/css"/>
        <title>Admin Portal</title>
    </head>
    <body style="background-color : #FFFF66;">
	
		
	
		<div class="card" style="background-color:#FFFF66;">
		  <h3 class="card-header text-center font-weight-bold text-uppercase py-4" style="background: -webkit-linear-gradient(left, #0A1612, #1A2930);color:white;">Record of Registered Students</h3>
		  <div class="card-body col-lg-12  col-md-12 col-sm-12 col-xs-12" style="padding:0;" >
			<div id="table" class="table-editable" style="background: -webkit-linear-gradient(left, #0A1612, #1A2930);">
			  
			<form method="POST" action="http://localhost/JEE/sendinfo.php">
			  <table class="table table-bordered table-responsive-md  text-center" style="color:white;">
				<tr>
				  <th class="text-center">Roll No.</th>
				  <th class="text-center">Student Name</th>
				  <th class="text-center">Category</th>
				  <th class="text-center">Physics</th>
				  <th class="text-center">Chemistry</th>
				  <th class="text-center">Maths</th>
				  
				</tr>
				
				<?php
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
					
					$sql = "SELECT Roll,Name,Physics,Chemistry,Maths,Category FROM marks";
					$result = $conn->query($sql);
					
					
					if ($result->num_rows > 0) {
						// output data of each row
						$i=0;
						while($row = $result->fetch_assoc()) {
							$name=$row['Name'];
							$roll=$row['Roll'];
							$cat=$row['Category'];
							$phy=$row['Physics'];
							$chem=$row['Chemistry'];
							$maths=$row['Maths'];
							echo 
							   '<tr>
								   <td >'.$roll.'</td>
								   <td >'.$name.'</td>
								   <td >'.$cat.'</td>
								   <td width="50"><input value="'.$phy.'"type="number" name="phy'.$i.'" class="form-control" placeholder="Physics Marks" required="" style="width: 200px; " /></td>		
								   <td width="50"><input value="'.$chem.'" type="number" name="chem'.$i.'" class="form-control" placeholder="Chem Marks" required="" style="width: 200px; " /></td>
								   <td width="50"><input value="'.$maths.'" type="number" name="math'.$i.'" class="form-control" placeholder="Maths Marks" required="" style="width: 200px; " /></td>
								   
							   </tr>';
							$i++;
						}
					}
				?>
				
			  </table>
			  <input type="submit" name="submit" class="btnContactSubmit" value="Submit" style="width:20%;margin:0;position:relative;left:400px;margin-bottom:20px;" />
			  <input type="button"  class="btnContactSubmit" name="cancel" value="Cancel" onclick="window.location.href = 'http://localhost/JEE/index.php'" style="width:20%;margin:0;position:relative;left:500px;margin-bottom:20px;">
			  </form>
			</div>
		  </div>
		</div>
	</body>
</html>