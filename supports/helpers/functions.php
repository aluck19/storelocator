<?php

//email function using PHPmailer
function email($to, $reply_to_email, $reply_to_name, $subject, $body){
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->CharSet="UTF-8";
  $mail->SMTPSecure = 'tls';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->Username = 'abhishekguptablog@gmail.com';
  $mail->Password = '22447435G9';
  $mail->SMTPAuth = true;

  $mail->FromName = 'StoreMapper by TechLekh.com'; //from
  $mail->AddAddress($to); //recipients
  $mail->AddReplyTo($reply_to_email, $reply_to_name); //Name and email of reply to
  $mail->IsHTML(true);
  $mail->Subject    = $subject; //subject
  $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; //required in order to read email
  $mail->Body    = $body; //body
  if(!$mail->Send())
  {
    echo "Mailer Error: " . $mail->ErrorInfo;
  }
  
}
//Test for email
//email('abhishek.gupta@deerwalk.edu.np', 'techlekhnp@gmail.com', 'StoreMapper: TechLekh', 'Check', 'Checked' );
?>