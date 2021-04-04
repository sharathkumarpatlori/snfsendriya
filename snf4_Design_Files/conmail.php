
<?php 

if ($isset($_POST["submit"])){
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];  
$subject = $_POST['subject']; 
$message = $_POST['message'];

 $to = "teamsnfsendriya@gmail.com";
$sub = $name."wants to contact you  (snf4.org)";

if(empty($name) || empty($email) || empty($phone) || empty($message))
{
	header('location:index.html?error');
}
else{
		$msg = "Dear Admin, \n".
				"User name : $name.\n".
				"User email : $email.\n".
				"User Phone Number : $phone.\n".
				"User Message : $message.\n";


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
}
   
?>
