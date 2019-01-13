<?php

		$servername = "localhost";
		$username = "Gurmeet";
		$password = "WINDOWSTEN";
		$dbname = "studentdb";
		$name="";$fname="";$email="";$dob="";$age="";$gen="";$con="";$uname="";$cat="";$phy="";$chem="";$math="";$tot="";$grank="";$crank="";$roll=$_REQUEST["q"];
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT * FROM class WHERE Roll = $roll";
		$sql1 = "SELECT Physics,Chemistry,Maths,Total,Rank,Category_Rank FROM marks WHERE Roll = $roll";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
				$name=$row['Name'];
				$cat=$row['Category'];
				$fname=$row['Father'];
				$dob=$row['DOB'];
				$email=$row['Email'];
				$con=$row['Contact'];
				$uname=$row['Username'];
				$age=$row['Age'];
				$gen=$row['Gender'];
			
		}
		$result = $conn->query($sql1);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
				$phy=$row['Physics'];
				$chem=$row['Chemistry'];
				$math=$row['Maths'];
				$tot=$row['Total'];
				$grank=$row['Rank'];
				$crank=$row['Category_Rank'];
		}
		?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="MainStyle.css" rel="stylesheet" type="text/css"/>
        <title>Student Portal</title>
    </head>
    <body>
		<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<h1>Student Profile</h1>
						<p><h4>Welcome, <?php echo $name; ?></h4></p>
					</div>
					<div class="col-md-2">
						<img src="mhrd.jpg" alt="mhrd" height="120" width="120"/>
					</div>
				</div>
			</div>
		 </div>
		 
		 <script type="text/javascript">
		 $(document).ready(function(){
		 $(".btnContactSubmit").on('click',function(){
			if($(".edit").is(":visible")) {  
				$(".edit").hide();
				$(".data").text(
					$(".edit").val()
				).show();
				$(".btnContactSubmit").text("Edit");
			} else {
				$(".data").hide();
				$(".edit").text(
					$(".data").val()
				).show();
				$(".btnContactSubmit").text("Update");
			}
		 }))};
		</script>
		 
		 
		 
		 <div class="container register" >
            <div class="row">
                <div class="col-md-12" >
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><h5>Personal Details</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><h5>Result</h5></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active text-align form-new" id="home" role="tabpanel" aria-labelledby="home-tab">
                            
                            <div class="row register-form">
							
                                <div class="col-md-12" >
									
									<div class="form-group">											
										<span class="error" style="font-size: 150%;position:relative;top:-50px;left:-250px;" >Name: <span class="data" style="color:#FFFFFF"><input class="edit" style="display:none"/><?php echo $name; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-40px;left:-250px;">Father's Name: <span  style="color:#FFFFFF"><input  style="display:none"/><?php echo $fname; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-30px;left:-250px;" >Roll: <span  style="color:#FFFFFF"><input style="display:none"/><?php echo $roll; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-20px;left:-250px;" >Category: <span  style="color:#FFFFFF"><input  style="display:none"/><?php echo $cat; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-10px;left:-250px;" >Email: <span style="color:#FFFFFF"><input  style="display:none"/><?php echo $email; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:0px;left:-250px;" >Contact Number: <span style="color:#FFFFFF"><input  style="display:none"/><?php echo $con; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:10px;left:-250px;" >Gender: <span style="color:#FFFFFF"><input style="display:none"/><?php echo $gen; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:20px;left:-250px;" >DOB: <span style="color:#FFFFFF"><input  style="display:none"/><?php echo $dob; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:30px;left:-250px;" >Age: <span style="color:#FFFFFF"><input  style="display:none"/><?php echo $age; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:40px;left:-250px;" >Username: <span style="color:#FFFFFF"><input style="display:none"/><?php echo $uname; ?></span></span><br>
										<input type="submit" name="LGform2" class="btnContactSubmit" value="Edit" style="position:relative;top:-200px;left:250px;height:70px;font-size: 150%;"/>         
                                     </div>
                                </div>
								
								
                            </div>
                        </div>
                        <div class="tab-pane fade show text-align form-new" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            
                            <div class="row register-form">
                                <div class="col-md-12">
									<div class="form-group">											
										<span class="error" style="font-size: 150%;position:relative;top:-50px;left:-150px;" >Physics: <span  style="color:#FFFFFF"><?php echo $phy; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-40px;left:-150px;">Chemistry: <span style="color:#FFFFFF"><?php echo $chem; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-30px;left:-150px;" >Maths: <span  style="color:#FFFFFF"><?php echo $math; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-20px;left:-150px;" >Total: <span  style="color:#FFFFFF"><?php echo $tot; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-10px;left:-150px;" >General rank: <span  style="color:#FFFFFF"><?php echo $grank; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-10px;left:-150px;" >Category rank: <span  style="color:#FFFFFF"><?php echo $crank; ?></span></span><br>
                                    </div>
                                </div>
                            </div>
                        </div>
						

                    </div>
					
                </div>
            </div>
        </div>
		
    </body>
</html>
		 
	</body>
</html>