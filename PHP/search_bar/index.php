<?php
session_start();
	if(!isset($_SESSION['first_name'])){
		header('Location:./login.php');
	}
	else{
		$my_name = $_SESSION['first_name'];
		$my_id = $_SESSION['user_id'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Professional search bar</title>
	<link rel = "stylesheet" href = "css/style.css">
	
		
	 <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap js-->
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<style type="text/css">
		.center
        {
            margin-left : 30%;
            margin-right: 30%;
           	padding-right: 3%;
           	padding-left: 3%;
            
            
        }
        form{
        	margin-top: 3%;
        }
        *{
        	font-family: Dancing Script , cursive;
			text-align: center;
        }

	</style>

</head>
<body>
	<center>
		<a href = "../timeline.php">Home</a>
		<form action="index.php" method="POST">
			<input type="text" id="searchBar" name = "search" placeholder="Search..." maxlength="25" autocomplete="off"><input type="submit" id="searchBtn" name = "submit" value="Go!"><br><br><br>	
		</form>

	</center>	


</body>
</html>


<?php
	include "../db.php";
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: ".mysqli_connect_error();
	  }
	  else
	  {
		if(isset($_POST['submit']))
		{
			$str = mysqli_real_escape_string($con,$_POST['search']);
			//echo $str;
			$sql = "SELECT `user_id`, `first_name`, `last_name`, `username`, `email`, `location`, `gender`, `date_of_birth`, `password` FROM `registration` WHERE `first_name` LIKE '%$str%' OR `last_name` LIKE '%$str%' OR `username` LIKE '%$str%'";
			$result = mysqli_query($con , $sql);
			

			//$count = mysqli_num_rows($result);
			
			//echo $count;

			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$user_id = $row['user_id'];
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					$username = $row['username'];
					echo "<div class = 'center'>";

					//echo $first_name." ".$last_name.str_repeat('&nbsp;', 5);
					echo "<table class = 'table table-responsive table-light table-hover table-striped '>";
				    echo "<tr>";
				    echo "<td class = 'text-center'>".$first_name."</td>";
				    echo "<td class = 'text-center '>".$last_name."</td>";
				    

					//if user already follows the user , then show Unfollow button
					//else show Follow button
					if($my_id)
					{
						if($my_id != $user_id)
						{
							$sql_1 = "SELECT `follower_id`, `sender_id`, `receiver_id` FROM `follower` WHERE `sender_id`= '$my_id' AND `receiver_id`= '$user_id'";
							$result_1 = mysqli_query($con , $sql_1);
							$number_of_rows = mysqli_num_rows($result_1);
							if($number_of_rows >= 1)
							{
								echo "<td><a href='../unfollow.php?userid=$user_id&username=$username' class='btn btn-primary btn-xs' style='float:right;'>Unfollow</a></td>";
							}
							else
							{
								echo "<td><a href='../follow1.php?userid=$user_id&username=$username' class='btn btn-primary btn-xs' style='float:right;'>Follow</a></td>";
							}
							echo "</tr>";
				    		echo "</table>";
						}
					}
					
					
					

					//echo "<br>";
					echo "</div>";
				}

			}
			else
			{
				echo "No data found";
			}
		}
	}
?>

