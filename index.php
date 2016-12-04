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
    <title>Syrett Web Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="contact_stylesheet.css">
  </head>
  <body>
  	<nav class="navbar navbar-default navbar-fixed-top">
           <div class="container">
               <div class="navbar-header">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                       <span class="sr-only">Toggle Navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button>
                <a class="navbar-brand" href="#">Syrett Web Services</a></a>
           </div>
           <div class="navbar-collapse collapse">
               <ul class="nav navbar-nav navbar-right">
                   <li class="active"><a href="index.html">Home</a></li>
                   <li><a href="index.html/#Services">Services</a></li>
                   <li><a href="index.html/#Portfolio">Portfolios</a></li>
                   <li><a href="index.html/#Pricing">Pricing</a></li>
                   <li><a href="#">Contact</a></li>
               </ul>
           </div>
        </div>
        </nav>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Contact</h1>
				<form class="form-horizontal" role="form" method="post" action="index.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='error'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='error'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
					<div class="col-sm-10">
					        <label for="phone" class="col-sm-2 control-label">Phone</label>
							<input type="text" class="form-control" id="phone" name="phone" placeholder="555 867 5309" value="<?php echo htmlspecialchars($_POST['phone']); ?>">
							<?php echo "<p class='error'>$errPhone</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='error'>$errMessage</p>";?>
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
	<div class="navbar navbar-inverse  navbar-fixed-bottom footer" role="navigation">
                    <div class="container">
                        <div class="navbar-text pull-left">
                        <p>&copy 2016 Michael Syrett</p>
                        </div>
                        <div class="navbar-text pull-right">
                            <a href="https://www.linkedin.com/in/michael-syrett-88976750?trk=hp-identity-photo"><i class="fa fa-linkedin fa-2x"></i></a>
                            <a href="https://vimeo.com/user1791347"><i class="fa fa-vimeo fa-2x"></i></a>
                            <a href="https://github.com/MrSyrett"><i class="fa fa-github fa-2x"></i></a>
                            <a href="https://codepen.io/MrSyrett/"><i class="fa fa-codepen fa-2x"></i></a>
                        </div>
                    </div>
                </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>