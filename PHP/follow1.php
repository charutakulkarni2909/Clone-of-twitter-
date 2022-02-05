<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style type="text/css">
		h1{
			font-family: Dancing Script , cursive;
			text-align: center;
		}
		
	</style>
</head>
<body>
	  <a href = "./search_bar/index.php">Back</a>
</body>
</html>
<?php
session_start();
//saves userid and username of logged in user 
$my_id = $_SESSION["user_id"];
$my_username = $_SESSION['username'];
//connection established
include "db.php";

?>
<?php
if($_GET['userid']&&$_GET['username'])
{
	if($_GET['userid']!=$my_id) //ensures that we shouldn't follow or unfollow ourself
	{
		//userid and username of that user to whom logged user want to follow
		$follow_userid = $_GET['userid'];
		$follow_username = $_GET['username'];

		$sql = "SELECT `follower_id`, `sender_id`, `receiver_id` FROM `follower` WHERE `sender_id`= '$my_id' AND `receiver_id`= '$follow_userid'";
		$result = mysqli_query($con, $sql) OR die(mysqli_error($con));
		mysqli_close($con);
		$number_of_rows = mysqli_num_rows($result);
		//if above query returns any row means user alrady follow that user 
		//else add record to follow table
		if(!($number_of_rows>=1))
		{
			include "db.php";
			$sql_1 = "INSERT INTO `follower`(`sender_id`, `receiver_id`) VALUES ('$my_id','$follow_userid')";
			$result_1 = mysqli_query($con ,$sql_1) OR die(mysqli_error($con));
			if($result_1)
			{
				
				$sql_2 = "UPDATE `registration`SET `number_of_followers` =`number_of_followers` + 1 WHERE `user_id`='$follow_userid'";
				$result_2 = mysqli_query($con, $sql_2);
				if($result_2)
				{
					echo "<h1>$my_username. started Following .$follow_username</h1>";
					//echo "<i class='fa fa-cloud'></i>";
					//echo "<i class='fa fa-handshake fa-5x'></i>";
				}
				else
				{
					echo "Can't follow! Please, try later.....";
				}
						

			}
			else
			{
				echo "Something went wrong!";
			}
		}
	}	
				
		mysqli_close($con);


}
	

?>
