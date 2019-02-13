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
		$msg="";
		if($cat=="General" and $tot>90) {$msg = "Congratulations, you have qualified for JEE advanced";}
		else if($cat=="OBC" and $tot>70) {$msg = "Congratulations, you have qualified for JEE advanced";}
		else if($cat=="SC" and $tot>30) {$msg = "Congratulations, you have qualified for JEE advanced";}
		else if($cat=="ST" and $tot>25) {$msg = "Congratulations, you have qualified for JEE advanced";}
		else {$msg = "Unfortunately, you are not eligible for JEE advanced";}
		?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">				
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
				$("#edit").click(function(){
					$(this).attr("id","update");
					$('#update').attr("value","Update");
					$('#can').show();
					$('span.data').each( function() {
						$(this).replaceWith($('<input type="text" >').attr({ id: $(this).attr("id"), value: $(this).text(), class: 'updat  form-control'}));
					});
					$('span.a').each( function() {
						$(this).replaceWith($('<input type="number" >').attr({ value: $(this).text(), id: $(this).attr("id"),  class: 'updat  form-control'}));
					});
					$('span.dob').each( function() {
						$(this).replaceWith($('<input type="date" >').attr({ id: $(this).attr("id"), value: $(this).text(), class: 'updat  form-control'}));
					});
					$('span.em').each( function() {
						$(this).replaceWith($('<input type="email" >').attr({ id: $(this).attr("id"), value: $(this).text(), class: 'updat  form-control'}));
					});
					$('#g').each( function() {
						$(this).replaceWith($('<select  id="g" class="updat form-control"><option>Male</option><option>Female</option><option>Other</option></select>'));
					});
					$('#cat').each( function() {
						$(this).replaceWith($('<select  id="cat" class="updat form-control"><option>General</option><option>OBC</option><option>SC</option><option>ST</option></select>'));
					});
				
					$('#update').click(function(){
						var info = {
							roll : Number($('#rno').text()),
							name : $('#nam').val(),
							fname : $('#fnam').val(),
							gender : $('#g').find(":selected").text(),
							contact : $('#cn').val(),
							age : Number($('#a').val()),
							dob :  $('#dob').val(),
							email : $('#em').val(),
							cat : $('#cat').find(":selected").text(),
							uname: $('#unam').val()
						};
						//alert(info);
						var xmlhttp = new XMLHttpRequest();
						xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							location.reload();
						}
						};
						xmlhttp.open("GET", "http://localhost/JEE/update.php?q=" + JSON.stringify(info));
						xmlhttp.send();
					});
				});
			});
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
                            
                            <div class="row">
							
                                <div class="col-md-12" >
									
																				
										<span class="error" style="font-size: 150%;position:relative;top:-50px;left:-250px;" >Name: <span id="nam" class="data" style="color:#FFFFFF;"><?php echo $name; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-40px;left:-250px;">Father's Name: <span  id="fnam" class="data" style="color:#FFFFFF"><input  style="display:none"/><?php echo $fname; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-30px;left:-250px;" >Roll: <span  id="rno" style="color:#FFFFFF"><input style="display:none"/><?php echo $roll; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-20px;left:-250px;" >Category: <span  id="cat" style="color:#FFFFFF"><input  style="display:none"/><?php echo $cat; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:-10px;left:-250px;" >Email: <span class="em" id="em"  style="color:#FFFFFF"><input  style="display:none"/><?php echo $email; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:0px;left:-250px;" >Contact Number: <span id="cn" class="data" style="color:#FFFFFF"><input  style="display:none"/><?php echo $con; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:10px;left:-250px;" >Gender: <span id="g"  style="color:#FFFFFF"><input style="display:none"/><?php echo $gen; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:20px;left:-250px;" >DOB: <span id="dob" class="dob" style="color:#FFFFFF"><input  style="display:none"/><?php echo $dob; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:30px;left:-250px;" >Age: <span class="a" id="a" style="color:#FFFFFF"><input  style="display:none"/><?php echo $age; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;top:40px;left:-250px;" >Username: <span class="data" id="unam" class="data" style="color:#FFFFFF"><input style="display:none"/><?php echo $uname; ?></span></span><br>
										<input type="submit" name="LGform2" class="btnContactSubmit" id="edit" value="Edit" style="position:relative;top:-230px;left:250px;height:70px;font-size: 150%;"/>     
										<input type="submit" name="LGform2" class="btnContactSubmit" onclick="location.reload()" id="can" value="Cancel" style="display:none;position:relative;top:-230px;left:250px;height:70px;font-size: 150%;"/>    
                                     
                                </div>
								
								
                            </div>
                        </div>
                        <div class="tab-pane fade show text-align form-new" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="margin:5% 0 5% 5%;padding:0;">
                            
                            <div class="row">
                                <div class="col-md-6">
																				
										<span class="error" style="font-size: 150%;position:relative;left:150px;" >Physics: <span  style="color:#FFFFFF"><?php echo $phy; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;left:150px;">Chemistry: <span style="color:#FFFFFF"><?php echo $chem; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;left:150px;" >Maths: <span  style="color:#FFFFFF"><?php echo $math; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;left:150px;" >Total: <span  style="color:#FFFFFF"><?php echo $tot; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;left:150px;" >General rank: <span  style="color:#FFFFFF"><?php echo $grank; ?></span></span><br>
										<span class="error" style="font-size: 150%;position:relative;left:150px;" >Category rank: <span  style="color:#FFFFFF"><?php echo $crank; ?></span></span><br>
                                    
								</div>
								<div class="col-md-6">
																				
										<span class="error" style="font-size: 150%;position:relative;top:75px" ><h3><?php echo $msg; ?></h3></span><br>
                                    
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