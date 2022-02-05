<?php
	session_start();
	if(!isset($_SESSION['first_name'])){
		header('Location:./login.php');
	}
	else{
		$my_name = $_SESSION['first_name'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Compose</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap js-->
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 	
</head>
	
<style>

	.bg-image {
		background-image: url('twitter_compose_img1.jpg');
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
		<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #105269">
		  	<div class="container-fluid">
			  	<div> <i class="fab fa-twitter-square fa-3x"style="color: white"></i></div>&nbsp &nbsp
			    <a class="navbar-brand"style ="font-size: 150%" href="launch.php" ><h3>Twitter</h3></a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarNavDropdown">
			      <ul class="navbar-nav" style="margin-left: 90% ;font-size: 100%;">
			        <li class="nav-item">
			          <a class="nav-link active " href="timeline.php"><h4>Home</h4></a>
			        </li>
			      </ul>
			    </div>
		  	</div>
		</nav>
		<div class="compose">
			<form action="#" method="post" enctype="multipart/form-data">
				<label for="exampleFormControlTextarea1" class="form-label" style="color: blue; font-size: 130%;"><b>Tweet here</b></label><br>
				
					<textarea class="shadow p-3 mb-4 bg-body rounded" id="content" name="content" rows="8" style="width: 125%" placeholder="What's happening?" autofocus></textarea>
                    <div id="count">
                        <span id="current_count"><strong>0</strong></span>
                        <span id="maximum_count"><strong>/ 164</strong></span>
                    </div>
					<input class="btn btn-primary" type="submit" value="Tweet" onclick="return ValidateLength()" name="btn-submit">
			</form>
		</div>
	</div>
	<script type="text/javascript">
	$('textarea').keyup(function() {    
    	var characterCount = $(this).val().length,
        current_count = $('#current_count'),
        maximum_count = $('#maximum_count'),
        count = $('#count');    
        current_count.text(characterCount); 
        if(characterCount > 164)
        {
        	maximum_count.css('color','red');
        }       
	});

    function ValidateLength(){
        var  post_content=document.getElementById("content");
        var maxLength=164;
        if(post_content.value.length == 0 || post_content.value == " ")
        {
        	alert("Write something");
        	return false;
        }
        else if(post_content.value.length > maxLength){
            alert(post_content.value.length + " characters\n" + "Post contain atmost 164 characters....");
            return false;
        }
    }
</script>
</body>
</html>
<?php

	
	include("db.php");
    
    // If you fail to connect, show an error
    if (mysqli_connect_error())
    {
        die('Connect Error ('. mysqli_connect_errno() .')' . mysqli_connect_error());
   	}
   	//connection established successfully
   	else
   	{	
   		if(isset($_POST['btn-submit']))
	    {

	   		$post_content=$_POST['content'];
	    	$user_id = $_SESSION['user_id'];
	    	//echo $post_content;
	    	//echo $user_id;
	    	$sql="INSERT INTO `compose` (`user_id`,`post_content`) VALUES ('$user_id','$post_content')";
	    	$result = mysqli_query($con, $sql) OR die(mysqli_error($con));
	    	if($result)
	    	{
	            #echo "Record inserted<br><br>";
	            $sql_1 = "UPDATE `registration` SET `number_of_tweets_made` = `number_of_tweets_made` + 1 WHERE `user_id`='$user_id'";
	            $result_1 = mysqli_query($con, $sql_1) OR die(mysqli_error($con));
	           	if($result_1)
	           	{
	           		echo "<script>alert('Tweet Posted Successfully');</script>";
	           	}
	           	else
	           	{
	           		echo "<script>alert('Please try again later');</script>";
	           	}
	        }
	        else
	        {
	        	echo "Record not inserted<br><br>";
	        }

	    }
	}
    mysqli_close($con);

?>