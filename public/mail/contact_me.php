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
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'members@kodavaconvention2019.boston'; 
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$from = "KodavaConventionBoston@gmail.com"; 
//$headers .= "Reply-To: $email_address";   
//mail($to,$email_subject,$email_body,$headers);
//return true;

$mail = new PHPMailer;
$mail->SMTPDebug = 2;
//HTML-friendly debug output
$mail->Debugoutput = 'html';
$mail ->  isSMTP();
$mail ->  Host = 'smtp.gmail.com';
$mail ->  SMTPAuth =true;
$mail ->  Username='KodavaConventionBoston@gmail.com';
$mail ->  Password= 'bo$ton2019';
$mail ->  SMTPSecure ='tls';
$mail ->  Port =587;

$mail ->  setFrom($from);
$mail ->  addAddress($to);

$mail ->  addReplyTo($from);
$mail ->  Subject=$email_subject;
$mail ->  Body=$email_body;
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    return false;
} else {
    echo "Message sent!";
    return true;
}    
?>