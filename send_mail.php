<?php
   require 'PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "USERNAME";
   $mail ->Password = "PASSWORD";
   $mail ->SetFrom("GMAIL ACCOUNT");
   $mail ->Subject = "TestEMail";
   $mail ->Body = "This is a test email";
   $mail ->AddAddress("GMAIL ACCOUNT");

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }





   

