<?php 
session_start();

if( isset($_SESSION['loggedinId']) && !empty($_SESSION['loggedinId']) )
{
	session_unset();
	session_destroy();
	header("Location:login.php");
}
else
{
	header("Location:login.php");
}
