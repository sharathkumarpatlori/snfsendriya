<?php 

if ($isset($_POST["submit"])){
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];  
$subject = $_POST['subject']; 
$message = $_POST['message'];

 $to = "teamsnfsendriya@gmail.com";
$sub = $name."wants to contact you  (snf4.org)"; 
$msg = "Dear Admin, <br />".
		'Snf4 Contact Form<table border="1">'.
		"<table width=80% cellpadding=2 cellspacing=2><tr><td> Name:</td><td> $name</td></tr>".
		"<tr><td>Email Id:</td><td> $email</td></tr>".
		 "<tr><td>Phone:</td><td> $phone</td></tr>".       
		"<tr><td>Message:</td><td> $message</td></tr></table>";
$from =  $email;
$headers = "content-type: text/html"."\r\n"."from: $from";

if(mail($to, $sub, $msg, $headers)){
         echo("Mail Sent Successfully");
		 header("location:contact-us.html?success");
   }
	else
		{
			header('location:contact-us.html?error');
		}
   }
?>
