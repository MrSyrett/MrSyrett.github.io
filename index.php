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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Syrett Web Services CONTACT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Contact Syrett Web Services</h1>
				<form class="form-horizontal" role="form" method="post" action="index.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
					<div class="col-sm-10">
					        <label for="phone" class="col-sm-2 control-label">Phone</label>
							<input type="text" class="form-control" id="phone" name="phone" placeholder="555 867 5309" value="<?php echo htmlspecialchars($_POST['phone']); ?>">
							<?php echo "<p class='text-danger'>$errPhone</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
				</form> 
			</div>
		</div>
	</div>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>