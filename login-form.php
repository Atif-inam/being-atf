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

                     if(isset($_POST['loginbtn'])){
                       $email = isset($_POST['email']) ? filterData($_POST['email']) : "";
			  $pwd = isset($_POST['pwd']) ? filterData($_POST['pwd']) : "";
                       // email validation
                       if($email==""){
                              $errors['email']="Email is Required";
                       }else{
                            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                            {
                                   $errors['email'] = "Enter valid email id";
                            }
                       }
                       // password valiadtion 
                       if($pwd == "")
                       {
                              $errors["pwd"] = "Password is Required";
                       }
                       
                       if(count($errors) == 0)
                       {
                              include("connect.php");					
                              
                              $result = mysqli_query($con,"select email,password,username,token,status from users where email='$email'");
                              
                              if(mysqli_num_rows($result)==1)
                              {
                                     $row = mysqli_fetch_assoc($result);
                                     if(password_verify($pwd, $row['password']))
                                     {
                                            if($row['status'] == "active")
                                            {
                                                   $_SESSION['loggedinId'] = $row['token'];
                                                   header("Location: home.php");
                                            }
                                            else{
                                                   setcookie("error","Please activate your account",time()+3);
                                                   header("Location: login.php");
                                            }
                                     }
                                     else{
                                            setcookie("error","Sorry! Password does not matched",time()+3);
                                            header("Location: login.php");
                                     }
                                     
                              }
                              else
                              {
                                     setcookie("error","Sorry! Unable to find your email account",time()+3);
                                     header("Location: login.php");
                                     
                              }
                              
                              mysqli_close($con);
                       }
                     }
                     
                     ?>
