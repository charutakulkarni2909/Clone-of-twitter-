<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Twitter</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap js-->
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

 	<!--fontawsome Icons-->
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<style>
		
		body{
			background-image: url('twitter_launch_page.jpg');
			background-size: 100% 100%;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		

		}
	</style>


</head>
<body>
	<section>
		<nav class="navbar navbar-expand-lg navbar-dark bg-#3da4e4 ">
		  	<div class="container-fluid">
			  	<div> <i class="fab fa-twitter-square fa-4x"></i></div>&nbsp &nbsp
			    <a class="navbar-brand"style ="font-size: 150%" href="#" >Twitter</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarNavDropdown">
			      <ul class="navbar-nav" style="margin-left: 85% ;font-size: 110%;">
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="register.php">Register</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link active" href="login.php">Login</a>
			        </li>
			      </ul>
			    </div>
		  	</div>
		</nav>
	</section>
</body>
</html>