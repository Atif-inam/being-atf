<?php session_start(); 
if( isset($_SESSION['loggedinId']) && !empty($_SESSION['loggedinId']) )
{
	header("Location:home.php");
}
?>


<?php 
			$errors = [];
			
			if(isset($_COOKIE['success']))
			{
				echo "<p class='successmsg'>".$_COOKIE['success']."</p>";
			}
			if(isset($_COOKIE['error']))
			{
				echo "<p class='errormsg'>".$_COOKIE['error']."</p>";
			}
			
			function filterData($data)
			{
				return addslashes(strip_tags(trim($data)));
			}
			
			if(isset($_POST['forgotbtn']))
			{
				
				$email = isset($_POST['email']) ? filterData($_POST['email']) : "";
				
				
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
				
				
				
				if(count($errors) == 0)
				{
					include("connect.php");					
					
					$result = mysqli_query($con,"select email,username,token from users where email='$email'");
					
					if(mysqli_num_rows($result)==1)
					{
						$row = mysqli_fetch_assoc($result);
						$subject = "Reset Password request - NIT";
						$token = $row['token'];
						$message = "Hi ".ucwords($row['username']).",<br><br>Your reset password request has been received, please click the below link to reset your password<br><br><a href='http://localhost/8pmfeb/reset_pwd.php?key=".$token."' target='_blank'>Click Here to Reset</a><br><br>Thanks<br>Team";
						
						$headers = 'From: webmaster@example.com' . "\r\n" .
						'Reply-To: webmaster@example.com' . "\r\n" .
						'Content-Type: text/html';
						
						if(mail($email,$subject,$message,$headers))
						{
							setcookie("success","Reset password link has been sent to your registred email. please check", time()+3);
							header("location:forget.php");
						}
						else
						{
							setcookie("error","Sorry! Unable to sent reset password link, contact admin", time()+3);
							header("location:forget.php");
						}
					}
					else
					{
						setcookie("error","Sorry! Unable to find your email account",time()+3);
						header("Location: forgot.php");
						
					}
					
					mysqli_close($con);
				}
			
				
				
			}
			?>
			
