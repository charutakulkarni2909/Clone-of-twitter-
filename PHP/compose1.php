<!DOCTYPE>
<html>
<head>
	<title>Compose</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap js-->
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

 	
</head>
	
<style>

	.bg-image {
		background-image: url('twitter_compose_img.jpg');
		background-repeat: no-repeat;
		background-size: cover; 
		height: 100vh; 
		width: 100%;
		
	}

		

	.compose{
		margin-left: 30%;
        margin-right: 30%;
        border: 0% ;
        padding-left:5%; 
        padding-right:5%;
        padding-bottom:3%; 
        padding-top:7%; 
	}

</style>

<body>


	
	<div class="bg-image">
	
	

		<div class="compose">
			<form action="#" method="post" enctype="multipart/form-data">
				<label for="exampleFormControlTextarea1" class="form-label" style="color: blue; font-size: 130%;"><b>Tweet here</b></label><br>
				
					<textarea class="shadow p-3 mb-4 bg-body rounded" name="content" data-emojiable="true" data-emoji-input="unicode" id="compose_id" rows="8" style="width: 125%" placeholder="What's happening?"></textarea>
				
					<input class="btn btn-primary" type="submit" value="Tweet" name="btn-submit">
				<!--<button type="button" class="btn btn-primary" name="btn-submit" ><b>Tweet</b></button>-->
			</form>
				
		</div>
	</div>
	
</body>

</html>


<?php

	session_start();
	$user_id = $_SESSION['user_id'];
	$conn=mysqli_connect("localhost","root","","twitter");
    if($conn->connect_error){
        die("Error in database connection".$conn->connect_error);
    }
    else{
       #echo "Database connected successfully......!"."<br><br>";
    }

    	if(isset($_POST['btn-submit'])){
    
    	$post_content=$_POST["content"];
    	


    	$sql="INSERT INTO `compose`(`user_id`,`post_content`) VALUES ('$user_id',$post_content')";
    	$result = mysqli_query($conn , $sql);
    	if($result){
            #echo "Record inserted<br><br>";
        }
        else{
        	echo "Record not inserted<br><br>";
        }

        


    }
    $conn->close();

?>