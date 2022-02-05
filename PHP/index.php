<!DOCTYPE html>
<html>
<head>
	<title>Professional search bar</title>
	<link rel = "stylesheet" href = "css/style.css">
	<script type="text/javascript">
		/*function active()
		{
			var sb = document.getElementById('searchBar');
			if(sb.value == 'Search..')
			{
				sb.value = ' ';
				sb.placeholder = 'Search..';

			}
		}

		function inactive()
		{
			var sb = document.getElementById('searchBar');
			if(sb.value == ' ')
			{
				sb.value = 'Search..';
				sb.placeholder = ' ';

			}
		}*/
	</script>
	<style type="text/css">
		.center
        {
            margin-left : 30%;
            margin-right: 30%;
            padding-left: 5%;
            padding-right: 5%;
            padding-top: 5%;

        }
	</style>

</head>
<!--<body>
	<center>
		<form action="index.php" method="POST">
			<input type="text" id="searchBar" name = "search" placeholder="Search..." maxlength="25" autocomplete="off"><input type="submit" id="searchBtn" name = "submit" value="Go!">	
		</form>
	</center>	


</body>
</html>-->


<?php

	$con = mysqli_connect("localhost","root","","Twitter");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: ".mysqli_connect_error();
	  }

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
				echo "<div class = 'center'>";
				echo $row['first_name']." ".$row['last_name'].str_repeat('&nbsp;', 5);
				echo "<input type='button' value = 'Follow' name = 'searchBtn'>";

				echo "<br>";
				echo "</div>";
			}

		}
		else
		{
			echo "No data found";
		}
	}
?>