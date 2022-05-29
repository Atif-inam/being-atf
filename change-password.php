<?php 
					if($row['profile_pic']!="")
					{
						?>
							<img src="profiles/<?php echo $row['profile_pic']; ?>"  height="100" width="100"/>
						<?php
					}
					?>
					
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
					if(isset($_POST['updatebtn'])){
						
						$opwd = isset($_POST['opwd']) ? filterData($_POST['opwd']) : "";
						$npwd = isset($_POST['npwd']) ? filterData($_POST['npwd']) : "";
						$cnpwd = isset($_POST['cnpwd']) ? filterData($_POST['cnpwd']) : "";
						
						
						// Username Validation
						if($opwd == ""){
							$errors['opwd'] = "Old password is required";
						}
						
						if($npwd == "")
						{
							$errors["npwd"] = "New Password is Required";
						}
						else{
							if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,20}$/',$npwd))
							{
								$errors["npwd"] = "Password Should contains 1 Digit, 1 Cap Letter, 1 Small Letter and a Digit, Length shound be 6 and 20";
							}
						}
						
						if($cnpwd == "")
						{
							$errors["cnpwd"] = "Confirm New Password is Required";
						}
						
						if($npwd !== $cnpwd)
						{
							$errors["cnpwd"] = "Password does not matched";
						}
						
						if(!password_verify($opwd,$row['password']))
						{
							$errors["opwd"] = "Password does not matched with db password";
						}
						
						
						if(count($errors) == 0)
						{
							$npwd = password_hash($npwd,PASSWORD_DEFAULT);
							mysqli_query($con,"update users set password='$npwd' where token='$token'");
							
							if(mysqli_affected_rows($con)==1)
							{
								setcookie("success","Password updated successfully",time()+3);
								header("Location:changepwd.php");
							}
							else
							{
								setcookie("error","Sorry! Unable to update the password",time()+3);
								header("Location:changepwd.php");
							}
						}
						
					} 
					?>
