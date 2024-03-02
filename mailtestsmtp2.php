<?php 
use PHPMailer\PHPMailer\PHPMailer;

$html='<h2>Hello Bhavya</h2>';

echo smtp_mailer('bhavyaharia100@gmail.com','Hello Bhavya',$html);

function smtp_mailer($to,$subject, $msg)
{
	require_once("smtp/class.phpmailer.php");
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'TLS'; 
	$mail->Host = "smtp.sendgrid.net";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "no-reply@bluepen.co.in";
	$mail->Password = "gyaankabhandaar100";
	$mail->SetFrom("no-reply@bluepen.co.in");
	// $mail->addAttachment("dummy.pdf");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
}

?>