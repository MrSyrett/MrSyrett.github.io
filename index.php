<?php
    session_start();
    require 'libs/PHPMailerAutoload.php';
    
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		$from = 'Syrett Web Services'; 
		$to = 'MrSyrett@gmail.com'; 
		$subject = 'Message from Syrett Web Services';
		
		$body ="From: $name\n E-Mail: $email\n Phone: $phone\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		if (!$_POST['phone']) {
			$errPhone = 'Please enter your Phone Number';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errPhone && !$errMessage) {
    $m = new PHPMailer;
    
    $m->isSMTP();
    $m->SMTPAuth = true;
    
    $m->Host = 'smtp.gmail.com';
    $m->Username = 'mrsyrett@gmail.com';
    $m->Password = 'DontP@nic1701';
    $m->SMTPSecure = 'ssl';
    $m->Port = 456;
    
    $m->isHTML(true);
    
    $m->Subject = 'Contact Form Submitted';
    $m->Body = "A Test";
    $m->FromName = "Me";
    
    $m->AddAddress('mrsyrett@gmail.com', 'Michael Syrett');
    
    
	if ($m->send()) {
		$result='<div class="alert alert-success">Thank You! Your message was recieved!</div>';
	} 
	
	else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?>
