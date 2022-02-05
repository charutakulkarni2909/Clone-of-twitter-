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
<?php
	include "db.php";
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}
	else
	{
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<!--Bootstrap CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap js-->
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

 	<style type="text/css">
 		table,tr{
 			width: 30%;
 			align-items: center;
 			padding-top: 50%;

 		
 		}
 		.center
        {
            margin-left : 30%;
            margin-right: 30%;
           	padding-right: 3%;
           	padding-left: 3%;
           	margin-top: 5%; 
            
            
        }
        h1,p{
        	font-family: 'Dancing Script', cursive;
        	text-align: center;
        	margin-top: 0px;
        	position: relative;
        }
        img{
        	width: 3%;
        	border-radius: 25px;
        	margin-top: 120px;
        	margin-right: 0px;
        	margin-left: 500px;
        }
        
        td{
        	font-family: 'Dancing Script', cursive;
        	padding: 0;
        	margin : 0;
        	

        }

        div{

        	display: block;
        	padding: 1px;

        }
        .card{
        	margin : 100px 480px;
        	width: 40%;
        	background-color: antiquewhite;
        	border-radius: 20px;
        	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
 	</style>
</head>
<body>
	<!--<table class = "table-dark" style="align-items: center;margin: 100px;margin-left: 40%;">-->
		<?php
		$sql_1 = "SELECT * FROM `registration` WHERE `user_id` = '$my_id'";
		$result_1 = mysqli_query($con,$sql_1);
		$row = mysqli_fetch_assoc($result_1);
		?>
		<div style="overflow: auto"><img src = "/twitter/images/follower_image.jpg"><h1>MY FOLLOWERS </h1></div>
		<p style="font-size: 20px"><strong>Followers :  </strong><?php echo $row['number_of_followers'];?></p>
	
		<?php
		$sql = "SELECT * FROM `registration` WHERE `user_id` IN (SELECT `sender_id` from `follower` where `receiver_id` = '$my_id')";
		$result = mysqli_query($con, $sql);
		$number_of_rows = mysqli_num_rows($result); ?>
		<div class= "card center">
			<table class = 'table table-responsive table-light table-hover table-striped'>
				<tbody>

					<?php 
				while( $developer = mysqli_fetch_assoc($result)) { 
						$user_id = $developer['user_id'];
						$username = $developer['username'];
						echo "<tr><td class = 'text-center'>".$developer ['first_name'].'  '.$developer ['last_name']."</td>";
						echo "<td class='text-center'>".$developer ['location']."</td>";
					

					if($my_id)
					{
						if($my_id != $user_id)
						{
							$sql_1 = "SELECT `follower_id`, `sender_id`, `receiver_id` FROM `follower` WHERE `sender_id`= '$my_id' AND `receiver_id`= '$user_id'";
							$result_1 = mysqli_query($con , $sql_1);
							$number_of_rows = mysqli_num_rows($result_1);
							
							if($number_of_rows >= 1)
							{
								echo "<td><a href='./unfollow.php?userid=$user_id&username=$username' class='btn btn-primary btn-xs' style='float:right;'>Unfollow</a></td>";
							}
							else
							{
								echo "<td><a href='./follow1.php?userid=$user_id&username=$username' class='btn btn-primary btn-xs' style='float:right;'>Follow</a></td>";
							}
							echo "</tr>";
						}	
					}
				}		?>   
				</tbody>
				
			</table>
		</div>
	
</body>
</html>
