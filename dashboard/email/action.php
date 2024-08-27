<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../../config/database.php';

include '../../src/PHPMailer.php';
include '../../src/SMTP.php';
include '../../src/Exception.php';


if(isset($_POST['email_sender'])){

    $sander_name = $_POST['name'];
    $sander_email = $_POST['email'];
    $sander_body = $_POST['body'];

    if($sander_name && $sander_email && $sander_body){

        $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'citmiawd2402@gmail.com';                     //SMTP username
            $mail->Password   = 'xttunwbrbqulbgsk';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($mail->Username, 'Web Dev IAWD 2403');
            $mail->addAddress($sander_email, $sander_name);     //Add a recipient             //Name is optional
            $mail->addReplyTo($mail->Username);


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Welcome to our KUFA community.';
            $mail->Body    = "Thank you for sharing your valuable feedback! <br> Reguards <br> $sander_name";
            
            if($mail->send()){
                $insert = "INSERT INTO emails (name,email,body) VALUES ('$sander_name','$sander_email','$sander_body')";
                mysqli_query($db,$insert);
                header('location: ../../index.php#contact');
            }
            
            

}

}

?>