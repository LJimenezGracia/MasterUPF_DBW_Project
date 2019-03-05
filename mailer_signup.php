<?php
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
$mail->setFrom('primerstock.customer@no-reply.com');# ,$emailFromName);
$mail->addAddress($email);#, $emailToName);

$value1 = $_SESSION['name'];
$value2 = $_SESSION['surname'];
$value3 = $_SESSION['email'];
$value4 = $_SESSION['password'];
$value5 = $_SESSION['labcode'];


$mail->Subject = 'Registration Information';
$mail->msgHTML("Dear user,". "<br>".
                "Thank you for signing up to PrimerStock.". "<br>".
                "Here is your sign-up information:". "<br>". "<br>".

                "Name: ". $value1  . "<br>".
                "Surname: ". $value2 . "<br>".
                "Email: ". $value3  . "<br>".
                "Lab Code: " . $value5. "<br>"."<br>"."<br>".
                "Your PrimerSTOCK team!". "<br>". "<br>". "<br>". "<br>".

                "This email message and any attachments it carries may contain confidential or legally protected material and are intended solely for the individual or organization to whom they are addressed. If you are not the intended recipient of this message or the person responsible for processing it, then you are not authorized to read, save, modify, send, copy or disclose any part of it. If you have received the message by mistake, please inform the sender of this and eliminate the message and any attachments it carries from your account.". "<br>"
                ); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported';
$mail->addAttachment('primerstock.png','logo_2u'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error why message wasn't sent: " . $mail->ErrorInfo;
}#else{
    #echo "Message sent!";
#}
?>