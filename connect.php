<?php
// filepath: c:\Users\saran\OneDrive\Documents\GitHub\Portfolio\AgencyWebsite\connect.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Validate the input data
    if(empty($name) || empty($email) || empty($phone) || empty($message)){
        echo "All fields are required.";
        exit;
    }

    // Sanitize the input data
    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $phone = htmlspecialchars($phone);
    $message = htmlspecialchars($message); 
    
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();   
    $mail->SMTPAuth   = true;      

    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'pixodesigns4@gmail.com';                     //SMTP username
    $mail->Password   = 'Asap@pixo4';   //SMTP password   

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('pixodesigns4@gmail.com', 'Pixo Designs');
    $mail->addAddress('pixodesigns4@gmail.com', 'Pixo Designs');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Enquiry from your Pixo Designs';
    $mail->Body    = '<h3>Hello Team, We Got a New Enquiry and Make sure to follow up..</h3>
    <h4>Full Name: '.$_POST['name'].'</h4>
    <h4>Email: '.$_POST['email'].'</h4>
    <h4>Phone: '.$_POST['phone'].'</h4>
    <h4>Message: '.$_POST['message'].'</h4> 

    ';

    $mail->send();
    echo 'Message has been sent';
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
else{
    echo "Form not submitted.";
}
?>