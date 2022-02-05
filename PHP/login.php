<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login To Twitter Account</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap js-->
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

 	<style>
        .center
        {
            margin-left : 30%;
            margin-right: 30%;
            padding-left: 5%;
            padding-right: 5%;
            padding-top: 5%;
        }
        .myform{
        	box-shadow: 5px 5px 3px antiquewhite;
        	border:1px solid antiquewhite;
        	padding: 10%;
        }
        h3,h6
        {
        	color: #2196f3;

        }
    </style>


</head>
<body>
	
	<div class="center">
		<h3>Login To Your Account</h3><br><br>
		<form class="myform" action = "#" method="post">
			<div class="mb-3">
				<label for ="inputEmail" class="form-label">Email</label><br>
				<input type="email" name="email1" id="email1" placeholder="email" class = "form-control" width="100%">
			</div>	
			<div class="mb-3">
				<label for ="inputPassword" class="form-label">Password</label><br>
				<input type="password" name="password1" id="password1" placeholder="" class = "form-control" width="100%">
			</div>	
			<div>
				<input class= "btn btn-primary" type="submit" name="login" value = "Login">
			</div>
		</form>
		<br><br>
		<div class="row">
			<div class="col">
				<h6>New To Twitter?</h6>
				<a href="register.php">Create an account</a>
			</div>
		</div>
	</div>

</body>
</html>

<?php
	if(isset($_POST['login']))
	{
		include('db.php');
		$email = filter_input(INPUT_POST, 'email1');
		//echo $username;
		//$username variable will contain email address
		$password = filter_input(INPUT_POST, 'password1');
		//echo $password;
		if (!empty($email)) 
		{
  			if (!empty($password)) 
  			{
  				// If you fail to connect, show an error
    			if (mysqli_connect_error())
    			{
        			die('Connect Error ('. mysqli_connect_errno() .')' . mysqli_connect_error());
   				}
   				//If successfully connected to database
   				else
   				{
   					$sql = "SELECT * FROM `registration` WHERE `email` = '$email'";
   					$result = mysqli_query($con , $sql) OR die(mysqli_error($con));

   					$row = mysqli_fetch_array($result);
   					//$passwordHash =password_hash($password, PASSWORD_DEFAULT);
   					//var_dump($row['username']);
			        //var_dump($row['password']);
			       // echo $passwordHash;

   					//if query returns null checks email is present in database
   					if(isset($row['email']))
   					{

   						$passwordHash = password_hash($row['password'],PASSWORD_DEFAULT);
   						//echo $passwordHash;
   						//echo "<br>";
   						
   						if(password_verify($password,$passwordHash))
   						{
   							//echo "Oh Yes!";
   							$_SESSION["profileName"] = $email;
   							$_SESSION["user_id"] = $row['user_id'];
   							$_SESSION["first_name"] = $row['first_name'];
                $_SESSION["last_name"] = $row['last_name'];
                $_SESSION["username"] = $row['username'];
   							header("Location:./timeline.php");
   						}
   						else
   						{
   							echo "<script>alert('Oops!Wrong password');</script>";
   						}

   					}	
   					else
   					{
   						 echo "<script> alert('An error has occured. You were not found in the database');</script>";
   					}


   				}

  				
  			}
  			else
  			{
  				echo "Password can't be empty !";
  			}
  		}	
  		else
  		{
  			echo "Username can't be empty!";
  		}
      mysqli_close($con);

	}


?>