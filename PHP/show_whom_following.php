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
	<title>	</title>
	
	<!--Bootstrap CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap js-->
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

 	<style type="text/css">
 		table{
 			width: 30%;
 			align-items: center;
 			padding-top: 300px;

 		
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
        	margin-top: 50px;
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
        	margin-top : 100px;
            margin-left: 480px;
        	width: 40%;
        	background-color: antiquewhite;
        	border-radius: 20px;
        	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
 	</style>
</head>
<body>
    <div style="overflow: auto;"><h1>FOLLOWING </h1></div>
    <?php
        $sql = "SELECT * FROM `registration` WHERE `user_id` IN (SELECT `receiver_id` from `follower` where `sender_id` = '$my_id')";
        $result = mysqli_query($con, $sql);
        $number_of_rows = mysqli_num_rows($result); ?>
        <div class= "card center">
            <table class = 'table table-responsive table-light table-hover table-striped'>
                <thead></thead>
                <tbody>
                    <?php while( $developer = mysqli_fetch_assoc($result)) { 
                        $user_id = $developer['user_id'];
                        $username = $developer['username'];
                    ?>
                       <tr>
                           <td class = 'text-center'><?php echo $developer ['first_name'].'  '.$developer ['last_name']; ?></td>
                           <td class="text-center"><?php echo $developer ['location']; ?></td>  
                           <td><button class="btn btn-primary">Following</button></td>                                    
                       </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    
</body>
</html>
    </body>