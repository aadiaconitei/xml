<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Send email via Gmail SMTP server in PHP</title>
		<meta name="robots" content="noindex, nofollow">
		<style>
			@import url(http://fonts.googleapis.com/css?family=Raleway);

			h1{
			text-align:center;
			//color: black;
			font-size: 2em;
			margin-top: 40px;
			margin-bottom: 40px;
			}

			#main{
			margin: 25px 100px;
			font-family: 'Raleway', sans-serif;
			}

			h2{
			background-color: #FEFFED;
			text-align:center;
			border-radius: 10px 10px 0 0;
			margin: -10px -40px;
			padding: 30px 40px;
			color: black;
			font-weight: bolder;
			font-size: 1.5em;
			margin-top: -1px !important;
			// margin-bottom: -19px !important;
			}

			hr{
			border:0;
			border-bottom:1px solid #ccc;
			margin: 10px -40px;
			margin-bottom: 30px;
			}

			#login{
			width:580px;
			float: left;
			border-radius: 10px;
			font-family:raleway;
			border: 2px solid #ccc;
			padding: 0px 40px 0px;
			margin-top: 70px;
			//margin: 50px;
			margin: 0% 25%;
			}

			input[type=text],input[type=email],input[type=password]{
			width:99.5%;
			padding: 10px;
			margin-top: 8px;
			border: 1px solid #ccc;
			padding-left: 5px;
			font-size: 16px;
			font-family:raleway;
			}

			textarea{
			width:99.5%;
			padding: 10px;
			margin-top: 8px;
			border: 1px solid #ccc;
			padding-left: 5px;
			margin-bottom: 5px;
			font-size: 16px;
			font-family:raleway;
			}

			input[type=submit]{
			width: 100%;
			background-color:red;
			color: white;
			border: 2px solid red;
			padding: 10px;
			font-size:20px;
			cursor:pointer;
			border-radius: 5px;
			margin-bottom: 40px;
			}
			#para{
			clear: both;
			margin: 0 35%;
			}
		</style>
		<!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script> -->
		<script src="https://nightly.ckeditor.com/18-05-16-06-04/full/ckeditor.js"></script>
		<script src="https://nightly.ckeditor.com/18-05-16-06-04/full/samples/js/sample.js"></script>
	</head>
	<body>
		<div id="main">
			<h1>Timite email via Gmail SMTP server in PHP</h1>
			<div id="login">
				<h2>Gmail SMTP</h2>
				<hr/>
				<form action="trimitmail.php" method="post">
					<input type="text" placeholder="Adresa de email Expeditor Gmail" name="email"/>
					<input type="password" placeholder="Parola Expeditor Gmail" name="password"/>
					<input type="text" placeholder="To : Email Destinatie " name="toid"/>
					<input type="text" placeholder="Subject : " name="subject"/>
					<textarea id="editor" rows="4" cols="50" placeholder="Mesajul de trimis" name="message"></textarea>
					<input type="submit" value="Trimite" name="send"/>
				</form>
			</div>
		</div>
		<script>
			initSample();
		</script>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if(isset($_POST['send']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$to_id = $_POST['toid'];
	$message = $_POST['message'];
	$subject = $_POST['subject'];
	$mail = new PHPMailer;

	//Enable SMTP debugging. 
	$mail->SMTPDebug = 2;                               
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();  
	$mail->CharSet = "utf-8";          

	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password     
	$mail->Username = $email;                 
	$mail->Password = $password;                           
	//If SMTP requires TLS encryption then set it
	$mail->SMTPSecure = "tls";                           
	//Set TCP port to connect to 
	$mail->Port = 587;   
	//Set SMTP host name                          
	$mail->Host = "tls://smtp.gmail.com:587";
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);                                
	// de la ce adresa se trimite
	$mail->setFrom($email, 'Test');
	$mail->FromName = "Adrian";

	// la cine se trimite
	$mail->addAddress($to_id, "Nume Destinatoar");

	$mail->isHTML(true);

	$mail->Subject = $subject ;
	$mail->Body = $message;
	$mail->AltBody = "This is the plain text version of the email content";

	if(!$mail->send()) 
	{
		echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
		echo "Message has been sent successfully";
	}

}

;?>
	</body>
</html>