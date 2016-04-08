<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
   
require_once "Mail.php";  
  
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


$from = '<noreply@khalilsomani.com>'; //change this to your email address
$to = '<khalilsomani@gmail.com>'; // change to address
$subject = "Website Contact Form:  $name"; // subject of mail
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'khalilsomani@gmail.com', //your gmail account
        'password' => 'lyvdugllndrbiquf' // your password
    ));

// Send the mail
$mail = $smtp->send($to, $headers, $body);

	
	
	
	
// Create the email and send the message
//$to = 'khalilsomani@gmail.net'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
//$email_subject = "Website Contact Form:  $name";
//$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
//$headers = "From: noreply@khalilsomani.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
//$headers .= "Reply-To: $email_address";	
//mail($to,$email_subject,$email_body,$headers); 
return true;			
?>
