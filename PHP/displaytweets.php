<?php
session_start();

	if(!isset($_SESSION['first_name'])){
		header('Location:./login.php');
	}
	else{
	$my_id = $_SESSION['user_id'];
	$my_username = $_SESSION['username'];
	$first_name = $_SESSION['first_name'];
	$last_name = $_SESSION['last_name'];
	}
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
 	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
 	<style>
 			.slideshow-container 
 			{
			  position: relative;
			  background-image: url('/twitter/images/distweet.jpg');
			  background-attachment: fixed;
			  opacity: 0.8;
			}

			/* Slides */
			.mySlides {
			  display: none;
			  padding: 80px;
			  text-align: center;
			  color:black;
			}
			#tweets{
				background: url('/twitter/images/doodle2.jpg');
				background-repeat: no-repeat;
			}
			.card{
					border-radius: 10px;
					box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  					transition: 0.3s;
  					background-color: #a00d53;
			}/*#ff528f;*/
			.card:hover {
			  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
			}
			.card-body{
				font-size: 130%;
				color: white;
				font-weight: 20%;
			}
			h4,h5{
				color: white;
				font-weight: 20%;
			}


 	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0b5e6f ">
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
		<section>
			<div class="row">
			<div class="col-lg-4">
			<section >
				<div class="slideshow-container"style="height: 660px;" >

					  <!-- Full-width slides/quotes -->
					  <div class="mySlides">
					    <q style="color: white;"><b style="color:#f8f9fa; font-size: 50px;font-family: 'Dancing Script', cursive;">I love you the more in that I believe you had liked me for my own sake and for nothing else</b></q>
					    <p class="author" style="color:#f8f9fa; font-size: 25px;font-family: 'Dancing Script', cursive;text-align: center">- John Keats</p>
					  </div>

					  <div class="mySlides">
					    <q style="color: white;"><b  style="color:#f8f9fa; font-size: 40px;font-family: 'Dancing Script', cursive;text-align: center">But man is not made for defeat. A man can be destroyed but not defeated.</b></q>
					    <p class="author" style="color:#f8f9fa; font-size: 25px;font-family: 'Dancing Script', cursive;text-align: center">- Ernest Hemingway</p>
					  </div>

					  <div class="mySlides">
					    <q style="color: white;"><b style="color:#f8f9fa; font-size: 40px;font-family: 'Dancing Script', cursive;text-align: center">I have not failed. I've just found 10,000 ways that won't work.</b></q>
					    <p class="author" style="color:#f8f9fa; font-size: 25px;font-family: 'Dancing Script', cursive;text-align: center">- Thomas A. Edison</p>
					  </div>
				</div>
					<script>
							var timer;
							var slideIndex = 1;
							showSlides(slideIndex);

							function plusSlides(n) {
							  showSlides(slideIndex += n);
							}

							function currentSlide(n) {
							  showSlides(slideIndex = n);
							}

							function showSlides(n) {
							  var i;
							  var slides = document.getElementsByClassName("mySlides");
							  if (n > slides.length) {slideIndex = 1}    
							  if (n < 1) {slideIndex = slides.length}
							  for (i = 0; i < slides.length; i++) {
							      slides[i].style.display = "none";  
							  }
							  slides[slideIndex-1].style.display = "block"; 
							  clearTimeout(timer);
								timer = setTimeout(() => plusSlides(1), 3000);
							}
					</script>
				</section>
			</div>
			<div class="col-lg-8" id = "tweets">
				<section >
					<?php
						$con = mysqli_connect("localhost","root","","twitter");
						if (mysqli_connect_error())
    					{
        				  die('Connect Error ('. mysqli_connect_errno() .')' . mysqli_connect_error());
   						}
   						else
   						{
   							$sender_id_me = $_SESSION['user_id'];
   							$sql = "SELECT * FROM `compose` WHERE `user_id` = '$sender_id_me' order by `post_date_time` DESC";
   							 

   							$result = mysqli_query($con , $sql) OR die(mysqli_error($con));
   							if($result)
   							{
   								//echo "<h3>'That's the latest tweet u made'</h3>";
   								while($row = mysqli_fetch_assoc($result))
   								{?>
   								<div class="card hovercard mt-5" style="padding-right: 5px">
                					 <div class="cardheader">
                					 	<div class="avatar">
											<h5 style='float:right';><?php echo".$row[post_date_time]"; ?></h5><h4><?php echo "  ".$first_name."  ".$last_name; ?></h4>
										</div>
                					 </div>
                					 <div class="card-body info">
                					 	<?php echo "<h4>$row[post_content]</h4>"; ?>
                					 </div>
                				</div>

   								<?php } 
   							}
   							 mysqli_close($con);
   						}
   					?>
				</section>
			</div>
		
		
</body>
</html>