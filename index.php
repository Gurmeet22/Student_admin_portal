<?php

		$servername = "localhost";
		$username = "Gurmeet";
		$password = "WINDOWSTEN";
		$dbname = "studentdb";
		$rerr = "";
		$perr = "";
		$aerr = "";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		if (isset($_POST["LGform1"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
			$roll = $_POST["rno"];
			$sql = "SELECT Password FROM class WHERE Username='$roll'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$pass = $row["Password"];
				if(strcmp($pass,$_POST["user_pwd"])==0){
					header('Location: http://localhost/JEE/user.php?q='.$roll); }
				else{
					$perr = "*Invalid Password";
					//header('Location: http://localhost/scripts/index.php');
				}
			}
			else{
				$rerr = "*Invalid Username";/*header('Location: http://localhost/scripts/index.html');die;*/
			}
		}
		if (isset($_POST["LGform2"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
			$ap = $_POST["apwd"];
			if(strcmp($ap,"admin")==0){
				header('Location: http://localhost/JEE/table.php');
			}
			else{
				$aerr="*Invalid Password";
			}
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
        <title>Login Portal</title>
    </head>
    <body>
		
		
		<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<h1>JEE Main Login Portal</h1>
						<p><h4>Login or Register to continue.</h4></p>
					</div>
					<div class="col-md-2">
						<img src="mhrd.jpg" alt="mhrd" height="120" width="120"/>
					</div>
				</div>
			</div>
		 </div>
		 
		<script>
			function myfunction(){
				var roll = prompt("Enter your roll number, Password will be sent to your email");
				if(roll.length > 0){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				  if (this.readyState == 4 && this.status == 200) {
					var msg = this.responseText;
					alert(msg);
				  }
				};
				xmlhttp.open("GET", "http://localhost/JEE/sendmail.php?q=" + roll, true);
				xmlhttp.send();
				}
				else{return;}
			}
		</script>
		
		
        <div class="container register">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><h5>Canditate Login</h5></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><h5>Admin Login</h5></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active text-align form-new" id="home" role="tabpanel" aria-labelledby="home-tab">
                            
                            <div class="row register-form">
							
								
								
                                <div class="col-md-11" >
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        <div class="form-group">											
											<span class="error"><?php echo "$rerr";?></span>									    
                                            <input type="text" name="rno" class="form-control" placeholder="Your Username *" required/>
                                        </div>
                                        <div class="form-group" >
											<span class="error"><?php echo "$perr";?></span>	
                                            <input type="password" name="user_pwd" class="form-control" placeholder="Your Password *" required  />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="LGform1" class="btnContactSubmit" value="Login" />
                                            <span role="button" onclick="myfunction()" class="btnForgetPwd" >Forgot Password?</span>										
                                        </div>
										<div class="form-group">
                                            <a href="http://localhost/JEE/register.php" class="btnForgetPwd" >New User? Register...</a>
                                        </div>
                                    </form>
                                </div>
								
								<div class="col-md-1">
									<img src="user.png" alt="user" height="150" width="150" style="position:absolute;left:120px;"/>
								</div>
                            </div>
                        </div>
                        <div class="tab-pane fade show text-align form-new" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            
                            <div class="row register-form">
                                <div class="col-md-10">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        
                                        <div class="form-group">
											<span class="error"><?php echo "$aerr";?></span>
                                            <input type="password" name="apwd" class="form-control" placeholder="Enter Password *" required=""  />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="LGform2" class="btnContactSubmit" value="Login" />                                        
                                        </div>
                                    </form>
                                </div>
								
								<div class="col-md-2">
									<img src="admin.png" alt="admin" height="150" width="150" style="position:absolute;left:120px;"/>
								</div>
                            </div>
                        </div>
						

                    </div>
					
                </div>
            </div>
        </div>
		
    </body>
</html>