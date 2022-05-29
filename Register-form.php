<html>
	<head>
		<title>Register Here</title>
		<link href="css/register.css" rel="stylesheet" />
	</head>
	<body>
		<div class="container">
			<h1 class="hed">Register here</h1>
			
			<?php 
			
	$errors = [];
			
	if(isset($_COOKIE['success']))
			{
				echo "<p>".$_COOKIE['success']."</p>";
			}
			if(isset($_COOKIE['error']))
			{
				echo "<p>".$_COOKIE['error']."</p>";
			}
			
			function filterData($data)
			{
				return addslashes(strip_tags(trim($data)));
			}
			
			
			if(isset($_POST['registerbtn']))
			{
				$uname = isset($_POST['uname']) ? filterData(ucwords($_POST['uname'])) : "";
				$email = isset($_POST['email']) ?filterData($_POST['email']) : "";
				$pwd = isset($_POST['pwd']) ? filterData($_POST['pwd']) : "";
				$cpwd = isset($_POST['cpwd']) ? filterData($_POST['cpwd']) : "";
				$hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
				$mobile  = isset($_POST['mobile']) ? filterData($_POST['mobile']) : "";
				$gender  = isset($_POST['gender']) ? filterData($_POST['gender']) : "";
				$state  = isset($_POST['state']) ? filterData($_POST['state']) : "";
				$ip = $_SERVER['REMOTE_ADDR'];
				$token = md5(str_shuffle('qwertyuioplkjhgfdsazxcvbnm'.time()));
			
				// Validation
				
				// Username Validation
				if($uname == ""){
					$errors['uname'] = "Username is Required...";
				}
				else{
					if(strlen($uname) <= 4 || strlen($uname) >= 20){
						$errors["uname"] = "Username shoulb bewteen 4 and 20 chars only";
					}
				}
				
				// Email Validation
				
				if($email == ""){
					$errors['email'] = "Email is Required...";
				}
				else{
					if(!filter_var($email,FILTER_VALIDATE_EMAIL))
					{
						$errors['email'] = "Enter valid email id";
						
					}
					
					
				}
				
				// Password Validation
				
				if($pwd == "")
				{
					$errors["pwd"] = "Password is Required";
				}
				else{
					if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,20}$/',$pwd))
					{
						$errors["pwd"] = "Password Should contains 1 Digit, 1 Cap Letter, 1 Small Letter and a Digit, Length shound be 6 and 20";
					}
				}
				
				if($cpwd == "")
				{
					$errors["cpwd"] = "Confirm Password is Required";
				}
				
				if($pwd != $cpwd)
				{
					$errors["cpwd"] = "Passwords does not matched";
				}
				
				// Mobile Validation
				if($mobile == "")
				{
					$errors["mobile"] = "mobile is Required";
				}
				else{
					if(!preg_match('/^[0-9]{10}+$/',$mobile))
					{
						$errors["mobile"] = "Mobile No. should be  10 Digit numbers only...";
						
					}
					
					
				}
				
				// Gender Validation
				
				
				// State Validation
				
				if($state == "")
				{
					$errors['state'] = "Select State";
				}
				
				
				if(count($errors) == 0)
				{
					include("connect.php");
					
					mysqli_query($con,"insert into users(username,email,password,mobile,gender,state,ip,token) values('$uname','$email','$hashpwd','$mobile','$gender','$state','$ip','$token')");
					
					if(mysqli_affected_rows($con) == 1)
					{
						// send an email notification to the registered user
						
						$subject = "Account activation process";
						
						$message = "Hi ".$uname."<br>,Thanks for creating an account with us. To access our services, please click the below link to activate your account<br><br>
						<a href='http://localhost/nit.code/activate.php?key=".$token."' target='_blank'>Activate Now</a><br><br>Thanks,<br>Team";
						
						$headers = 'From: webmaster@example.com' . "\r\n" .
						'Reply-To: webmaster@example.com' . "\r\n" .
						'Content-Type: text/html';
						
						if(mail($email, $subject, $message, $headers))
						{
							setcookie("success","Account created successfully, please activate your account
							 check your email and activate your acoount", time() + 5);
							header("Location:register.php");
						}
						else
						{
							setcookie("error","Account created successfully, Sorry! Unable to sent an email. please contact admin", time() + 5);
							header("Location:register.php");
						}
						
					}
					else{
						
						setcookie("error","Sorry! Unbale to create an account",time()+5);
						header("Location: register.php");
						
					}
					
					
					mysqli_close($con);
				}	
				
			}
			?>
			
			
			<form method="POST" action="">
				
				<div class="formgroup">
					<label>Username</label>
					<input type="text" name="uname" class="formcontrol" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>" />
					<small class="error"><?php if(isset($errors['uname'])) echo $errors['uname']; ?></small>
				</div>
				
				<div class="formgroup">
					<label>Email</label>
					<input type="text" name="email" class="formcontrol" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" />
					<small class="error"><?php if(isset($errors['email'])) echo $errors['email']; ?></small>
				</div>
				
				<div class="formgroup">
					<label>Password</label>
					<input type="password" name="pwd" class="formcontrol" value="<?php if(isset($_POST['pwd'])) echo $_POST['pwd']; ?>" />
					<small class="error"><?php if(isset($errors['pwd'])) echo $errors['pwd']; ?></small>
				</div>
				
				<div class="formgroup">
					<label>Confirm Password</label>
					<input type="password" name="cpwd" class="formcontrol" value="<?php if(isset($_POST['cpwd'])) echo $_POST['cpwd']; ?>" />
					<small class="error"><?php if(isset($errors['cpwd'])) echo $errors['cpwd']; ?></small>
				</div>
				
				<div class="formgroup">
					<label>Mobile</label>
					<input type="text" name="mobile" class="formcontrol" />
					<small class="error"><?php if(isset($errors['mobile'])) echo $errors['mobile']; ?></small
				</div>
				
				<div class="formgroup">
					<label>Gender</label>
					<label><input type="radio" name="gender" value="Male" />Male </label>
					<label><input type="radio" name="gender" value="Female" />Female</label>
				</div>
				
				<div class="formgroup">
					<label>Select State</label>
					<select name="state" class="formcontrol">
						<option value="">--Select State--</option>
						<option  value="Telanagana" <?php if(isset($_POST['state'])) if($_POST['state'] === "Telanagana") echo "selected";  ?> >Telanagana</option>
						
						<option  value="Andhrapradesh" <?php if(isset($_POST['state'])) if($_POST['state'] === "Andhrapradesh") echo "selected";  ?> >Andhrapradesh</option>
						
						<option  value="Odisha" <?php if(isset($_POST['state'])) if($_POST['state'] === "Odisha") echo "selected";  ?> >Odisha</option>
						
					</select>
					<small class="error"><?php if(isset($errors['state'])) echo $errors['state']; ?></small>
				</div>
				
				<div class="formgroup">
					<input type="submit" value="signup" name="registerbtn" class="btn" />
					<a href="login.php">Login here</a>
				</div>
				
			</form>
		</div>
	</body>
</html>
