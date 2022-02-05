<?php
session_start();
$_SESSION['just_registered_email'] = $_POST['email'];
 
//use PHPMailer\PHPMailer\PHPMailer; 
//use PHPMailer\PHPMailer\Exception; 


//require 'vendor/autoload.php'; 

	//$err=$_POST["error"];
	$pass=$_POST["password"];
	$conpass=$_POST["confirmpassword"];
	$fname=$_POST["firstname"];
	$usrname=$_POST["username"];
	$location=$_POST["location"];
	$lname=$_POST["lastname"];
	$email=$_POST["email"];
	$bday=$_POST["birthday"];
	$gender = $_POST["gender"];
	
	if(isset($_POST["btn-submit"])){
		if($pass==$conpass){
			$_SESSION["username"]=$usrname;
			// $_SESSION["firstname"]=$fname;
			// $_SESSION["lastname"]=$lname;
			include('db.php');
			if (mysqli_connect_error())
    		{
        			die('Connect Error ('. mysqli_connect_errno() .')' . mysqli_connect_error());
   			}
   			//connection established
   			else
   			{
   				$sql = "SELECT * FROM `registration` WHERE `email` = '$email' OR `username`='$usrname'";
   				$result = mysqli_query($con , $sql);
   				$number_of_rows = mysqli_num_rows($result); 
   				if($number_of_rows>=1)
   				{
   					echo "<script>alert('Username must be unique');</script>";
   				}
   				else
   				{
	   				$sql_1 = "INSERT INTO `registration`(`first_name`, `last_name`, `username`, `email`, `location`, `gender`, `date_of_birth`, `password`) VALUES ('$fname','$lname','$usrname','$email','$location','$gender','$bday','$pass')";
	   				$result_1 = mysqli_query($con , $sql_1) OR die(mysqli_error($con));
	   				if($result_1)
	   				{
	   					$message ="Registered Successfully!!!";
	   					include './Email/email.php';
	   					echo "<script type='text/javascript'>alert('$message'); window.location.href= 'login.php'</script>";
	   				}
	   				else
	   				{
	   					echo "Oops! Something went wrong. Please try again";
	   				}
   				}
   			}

		}
		else{
        	$message = "Password mismatch.Try again.";
        	echo "<script type='text/javascript'>alert('$message'); window.location.href= 'register.php'</script>";
		}
		mysqli_close($con);
	}
?>