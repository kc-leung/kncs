<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name           = strip_tags(htmlspecialchars($_POST['name']));
$email_address  = strip_tags(htmlspecialchars($_POST['email']));
$phone          = strip_tags(htmlspecialchars($_POST['phone']));
$message        = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'yourname@yourdomain.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.

$tos = array(
    'smlee36@myseneca.ca',
    'fmirzaei1@myseneca.ca',
);

$email_subject = "CPR101 Website Contact Form:  $name";
$email_body = "You have received a new message from your CPR101 website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@myseneca.ca\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   

foreach($tos as $to) {
    mail($to,$email_subject,$email_body,$headers);
}

return true;         