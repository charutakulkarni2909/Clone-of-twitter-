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
        .center
        {
            margin-left : 30%;
            margin-right: 30%;
            padding-left: 5%;
            padding-right: 5%;
           padding-top: 2%;
        }
        .submit
        {
            text-align: center;
            padding-bottom: 10px;
            width: 20%;
            height: 30%;
            font-family: cursive;
        }
        .submit:hover
        {
            background-color: #1aa9b7;
            color: white;
        }
        .a:hover
        {
            color: black;
        }
    </style>
</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-info ">
		  	<div class="container-fluid">
			  	<div> <i class="fab fa-twitter-square fa-4x"></i></div>&nbsp &nbsp
			    <a class="navbar-brand"style ="font-size: 150%" href="launch.php" ><h3>Twitter</h3></a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarNavDropdown">
			      <ul class="navbar-nav" style="margin-left: 75% ;font-size: 100%;">
			        <li class="nav-item">
			          <a class="nav-link active " href="login.php"><h4>Login to existing account</h4></a>
			        </li>
			      </ul>
			    </div>
		  	</div>
		</nav>
		<div class = "center">
            <form action="confirmpassword.php" method="post">
                <h1>Create a new account</h1>
			    <h6>It's quick and easy</h6>
                <div class="row">
                    <div class="col lg-6">
                        <input type="text" class="form-control" placeholder="First name" name="firstname" pattern="[A-Za-z]{1,50}"required>
                    </div>
                    <div class="col lg-6">
                        <input type="text" class="form-control" placeholder="Last name" name="lastname" pattern = "[A-Za-z]{1,100}" required>
                    </div>
                    
                </div>
                <br>
                <div class = "row">
                    <div class = "col lg-6">
                        <input type="text" class="form-control" placeholder="Username" name="username" pattern = "[a-zA-Z][a-zA-Z0-9-_.]{1,20}" required><br>
                    </div>
                    <div class="col lg-6">
                        <input type="text" class="form-control" placeholder="Location" name="location" pattern = "[A-Za-z]{1,100}" required>
                    </div>
                </div>
                <div class ="row">
                    <div class="col">
                        <input type="email" class="form-control" placeholder="Email" name="email"  required>
                        <br>
                    </div>
                </div>
                <div class ="row">
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <br>
                    </div>
                </div>
                 <div class ="row">
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" required>
                        <br>
                    </div>
                </div>
                 <div class ="row">
                    <div class="col">
                        <input type="date" class="form-control" name="birthday" required>
                        <br>
                    </div>
                </div>
                <div>
                      <label><strong><h5>Gender</h5></strong></label><br>
                      <input type="radio" id="male" name="gender" value="male">
                      <label for="male">Male</label>&nbsp &nbsp
                      <input type="radio" id="female" name="gender" value="female" >
                      <label for="female">Female</label>&nbsp &nbsp
                      <input type="radio" id="other" name="gender" value="other">
                      <label for="custom">Custom</label><br><br>
                      <input type="submit" class="submit" value="Submit" name="btn-submit">
                </div>
            </form>    
		</div>
</body>
</html> 	