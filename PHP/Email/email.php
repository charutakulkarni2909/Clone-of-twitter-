<?php
session_start();
include "../db.php";
$email = $_SESSION['just_registered_email'];
?>
<?php 

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'vendor/autoload.php'; 

$mail = new PHPMailer(true); 

try { 
	$mail->SMTPDebug = 2;									 
	$mail->isSMTP();											 
	$mail->Host	 = 'smtp.gmail.com;';					 
	$mail->SMTPAuth = true;							 
	$mail->Username = 'your_mail_id@gmail.com';
	$mail->Password = '*********';
	
	$mail->SMTPSecure = 'tls';							 
	$mail->Port	 = 587; 

	//$mail->setFrom('asshelar@dktes.com', 'Alankar Shelar');		 
	//$mail->addAddress('alankarshelar5620@gmail.com'); 
	//$mail->addAddress('alankarshelar89@gmail.com', 'AS'); 
	
			//From email address and name
		$mail->From = "clone_of_twitter@gmail.com";
		//$mail->FromName = "Implementing our knowledge...";

		//To address and name
		$mail->addAddress($email, "Student");
		$mail->addAddress("pushti3701kansagara@gmail.com","student...."); //Recipient name is optional

		//Address to which recipient will reply
		//$mail->addReplyTo("asshelar@dktes.com", "Reply");

		//CC and BCC
		//$mail->addCC("cc@example.com");
		//$mail->addBCC("bcc@example.com");
	
	   //$mail->addAttachment("img1.jpg");
	
	$mail->isHTML(true);								 
	$mail->Subject = 'Registration At Clone of Twitter'; 
	$mail->Body = 'Thank you for registeration ...! '; 
	$mail->AltBody = 'Hope you enjoy our services'; 
	$mail->send(); 
	echo "Mail has been sent successfully!"; 

} 
catch (Exception $e) 
{ 
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
} 

?> 
