<?php
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$category = $_POST["category"];
$message = $_POST["message"];
$email_user = $_POST["email"];
$message = $_POST["message"];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tsl'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = 'primerstock.customer@gmail.com';
$mail->Password = 'primerstock1234';
$mail->setFrom('primerstock.customer@no-reply.com' ,'PrimerSTOCK');


$emails = array($email_user, 'primerstock.customer@gmail.com');

	if ($emails[0] != 'primerstock.customer@gmail.com') {
		$mail->ClearAllRecipients( ); // clear all
		$mail->addAddress($emails[0]);#, $emailToName);
		$mail->Subject = 'Request Information';
		$mail->msgHTML( "Your request has been sent – we will be in contact with you shortly.". "<br>".
	                "Here is a copy of your message:". "<br>". "<br>". $message  . "<br>". "<br>".

	                "Your PrimerSTOCK team!". "<br>"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
		#include 'mailer_contact_us.php';
		$mail->AltBody = 'HTML messaging not supported';
		$mail->addAttachment('primerstock.png'); //Attach an image file
				if(!$mail->send()){
		    echo "Mailer Error why message wasn't sent: " . $mail->ErrorInfo;
		}
		 


	} if( $emails[1] == 'primerstock.customer@gmail.com'  ) {
		$mail->ClearAllRecipients( );
		$mail->addAddress('primerstock.customer@gmail.com', 'PrimerSTOCK');
		$mail->Subject = 'Received Request Information';
		$mail->msgHTML( "PrimerSTOCK has received a request!". "<br>".
		                "Here are the request details:". "<br>". "<br>".
		                "First name: ". $firstname  . "<br>". 
		                "Last name: ". $lastname  . "<br>".               
		                "Email: ". $email_user  . "<br>".
		                "Category: ". $category  . "<br>".
		                "Message: ". $message  . "<br>");
		$mail->AltBody = 'HTML messaging not supported';
		$mail->addAttachment('primerstock.png'); //Attach an image file
				if(!$mail->send()){
		    echo "Mailer Error why message wasn't sent: " . $mail->ErrorInfo;
		}
}

?>