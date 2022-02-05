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
	<title>Welcome To Timeline</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap js-->
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

 	<!--Google Font Link-->
 	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

	
 	
 	<link rel = "stylesheet" href = "style.css">
 	<style type="text/css">
 		*{
 			font-family: Dancing Script , cursive;
			text-align: center;
 		}
 		img{
 			width:30%;
 			}
 		nav{
	 		position: sticky;
	 		
 		}
 		p{
 			font-family: 'Luckiest Guy', cursive;
 			text-align:  center;
 			font-size: 50px;
 			padding-top: 10px;
 			padding-bottom: 10px;
 			text-shadow: 2px 2px #FF0000;
 		}
		
 			.slideshow-container 
 			{
			  position: relative;
			  background-image: url('/twitter/images/crop.jfif');
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
  					background-color: #ff528f;;
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
	<nav class="navbar navbar-expand-lg navbar-light bg-info">

		<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src ="./logo1.png"></a>
			<div class="dropdown">
			  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
			  Profile
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
			    <li><a class="dropdown-item" href="show_my_followers.php">Followers</a></li>
			    <li><a class="dropdown-item" href="show_whom_following.php">Following</a></li>
			    <li><a class="dropdown-item" href="displaytweets.php">My Tweets</a></li>
			  </ul>
			</div>

			<a href = "compose.php"><button type="button" class="btn btn-dark" name = "compose">COMPOSE TWEET</button></a>
			

		
			<form>
			<input type="text" id="searchBar" name = "search" placeholder="Search..." maxlength="30" autocomplete="off"><input type="button" id="searchBtn" name = "searchBtn" value="Go!" onclick = "window.location = '/twitter/php/search_bar/index.php';">
			</form>
		   

		    <a href = "logout.php"><button class="btn btn-dark" type="submit" name = "logout">Logout</button></a>
		</div>

	</nav>
	
	<div>
		<p class ="bg-light">Welcome <?php echo $my_name;?> !</p>

	</div>

	<section>
			<div class="row">
			<div class="col-lg-4">
			<section >
				<div class="slideshow-container"style="height: 660px;" >

					  <!-- Full-width slides/quotes -->
					  <div class="mySlides">
					    <q style="color: white;"><b style="color:#f8f9fa; font-size: 40px;font-family: 'Dancing Script', cursive;">I love you the more in that I believe you had liked me for my own sake and for nothing else</b></q>
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
				<section>
					<?php
						$con = mysqli_connect("localhost","root","","twitter");
						if (mysqli_connect_error())
    					{
        				  die('Connect Error ('. mysqli_connect_errno() .')' . mysqli_connect_error());
   						}
   						else
   						{
   							$sender_id_me = $_SESSION['user_id'];
   							//$sql = "SELECT * FROM `compose` WHERE `user_id` = '$sender_id_me' order by `post_date_time` DESC";
   							$sql = "SELECT * FROM `compose`, `registration` WHERE compose.`user_id` = registration.`user_id` AND compose.`user_id` IN (SELECT `receiver_id`FROM `follower` WHERE `sender_id` = '$sender_id_me')  ORDER BY `post_date_time` DESC"; 

   							$result = mysqli_query($con , $sql) OR die(mysqli_error($con));
   							if($result)
   							{
   								//echo "<h3>'That's the latest tweet u made'</h3>";
   								while($row = mysqli_fetch_assoc($result))
   								{?>
   								<div class="card hovercard mt-5" style="padding-right: 5px">
                					 <div class="cardheader">
                					 	<div class="avatar">
											<h5 style='float:right';><?php echo".$row[post_date_time]"; ?></h5><h4><?php echo "  "."$row[first_name]"."  "."$row[last_name]";?></h4>
										</div>
                					 </div>
                					 <div class="card-body info">
                					 	<?php echo "$row[post_content]"; ?>
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




