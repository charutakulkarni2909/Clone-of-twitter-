<?php
session_start();
$my_id = $_SESSION['user_id'];
$my_username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
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
if($_GET['userid']  && $_GET['username'])
{
	if($_GET['userid']!=$my_id) //ensures that we shouldn't follow or unfollow ourself
	{
		$unfollow_userid = $_GET['userid'];
		$unfollow_username = $_GET['username'];
		include 'db.php';
		$sql = "SELECT `follower_id`,`sender_id`, `receiver_id` FROM `follower` WHERE `sender_id`='$my_id' AND `receiver_id`='$unfollow_userid'";
		$result = mysqli_query($con, $sql) OR die(mysqli_error($con));
		$number_of_rows = mysqli_num_rows($result);
		
		if($number_of_rows>=1)
		{
			
			$sql_1 = "DELETE FROM `follower` 
				WHERE `sender_id`='$my_id' AND `receiver_id`='$unfollow_userid'";
			$result_1 = mysqli_query($con, $sql_1);	
			if($result_1)
			{
				$sql_2 = "UPDATE `registration` SET `number_of_followers` = `number_of_followers` - 1 WHERE `user_id`='$unfollow_userid';";
				$result_2 = mysqli_query($con, $sql_2);
				if($result_2)
				{
					echo "<h1>$my_username. unfollows .$unfollow_username</h1>";
				}
				else
				{
					echo "Can't unfollow! Please, try later.....";
				}
			}
			else
			{
				echo "Oops ! Something went wrong.....";
			}
			mysqli_close($con);
		}
	}
}		
?>