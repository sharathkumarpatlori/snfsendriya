<html>
<head>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head> 

<?php

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
   
    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }
	if (empty($subject)) {
        $errors[] = 'subject is empty';
    }
      
      if (empty($phone)) {
        $errors[] = 'Phone Number is empty';
    }

    if (empty($errors)) {
        $toEmail = 'teamsnfsendriya@gmail.com';
        $emailSubject = 'New Mail From snf4.org';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

       /* $msg = "Dear Admin, <br />";
$msga = 'Snf4 Contact Form<table border="1">';
$msgb = "<table width=80% cellpadding=2 cellspacing=2><tr><th> Name:</th><td> $name</td></tr>";
$msgc = "<tr><th>Email Id:</th><td> $email</td></tr>";
$msgd = "<tr><th>Phone:</th><td> $phone</td></tr>";        
$msge = "<tr><th>Message:</td><td> $message</th></tr></table>";
$result = $msg . $msga . $msgb . $msgc . $msgd . $msge ; */
        $bodyParagraphs =["Name: {$name}", 
        "Email: {$email}", "Phone: {$phone}", "subject: {$subject}",
        "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            
          echo '<script>
         alert("Thank You For Your Response We Will Get Back To You Soon");
		  window.location="contact-us.html";
   </script>';
           /* header('Location: index.html');
           echo "<h3 style='text-align:center; padding-top:20px;'>Thank You For Your Response We Will Get Back To You Soon</h3>";
           echo "<div style='text-align:center; padding-top:30px';><button onclick=\"location.href='index.html'\" style='position:absolute;' class=\"btn btn-primary\" >Go Back</button></div>";*/
           
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}

?>
