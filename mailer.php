<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tsl'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = 'primerstock.customer@gmail.com';
$mail->Password = 'primerstock1234';
$mail->setFrom('primerstock.customer@no-reply.com');# ,$emailFromName);
$mail->addAddress($email);#, $emailToName);
$mail->Subject = 'Registration Information';
$mail->msgHTML("Dear user,". "<br>".
                "Thank you for signing up to PrimerStock.". "<br>".
                "Here is your sign-up information:". "<br>". "<br>".
                "Institution: ". $institution  . "<br>". 
                "Group Name: ". $group_name  . "<br>".
                "Country: ". $country  . "<br>".
                "Email: ". $email  . "<br>".
                "Lab Code: " . $code. "<br>"."<br>"."<br>".
                "Your PrimerSTOCK team!". "<br>"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported';
$mail->addAttachment('primerstock.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error why message wasn't sent: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
}
?>