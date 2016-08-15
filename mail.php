<?php

require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->CharSet = "UTF-8";
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'autosteamsa@gmail.com';          // SMTP username
$mail->Password = // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('info@codexworld.com', 'AutoSteam');
//$mail->addReplyTo('info@codexworld.com', 'CodexWorld');
$mail->addAddress('autosteamsa@gmail.com');   // Add a recipient
$mail->AddEmbeddedImage('images/logoAutoSteam-small-mobil.png', "myattach");

//$mail->AddEmbeddedImage("logoAutoSteam-small.png", "my-attach", "logoAutoSteam-small.png");

//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);

	if(isset($_POST['name']))
	{
	    $name = $_POST['name'];
	}else
	{
		$name ='No se ingreso un nombre';
	}

	if(isset($_POST['email']))
	{
	    $email = $_POST['email'];
	}else
	{
		$email = 'No se ingreso un correo';
	}

	if(isset($_POST['phone']))
	{
	    $phone = $_POST['phone'];
	}else
	{
		$phone = 'No se ingreso un email';
	}

	if(isset($_POST['message']))
	{
	    $message = $_POST['message'];
	}else
	{
		$message = 'No se ingreso un mensaje';
	}

$bodyContent ='<html lang="es">';
$bodyContent .='<head><title>AutoSteam</title></head>';
$bodyContent .='<body style="background-color:#00b3e6;">';
$bodyContent .='<div id="logo" style="padding: 70px 0; text-align: center;"><img src="cid:myattach"></div>';
//$bodyContent .='<div style=" padding: 5px 170px 170px 170px;">';
$bodyContent .='<div>';
$bodyContent .='<p style="color: white; font-size: 20px; text-align: center; text-align: center;">Haz recibido un mensaje de:<span style="color: #ffdd30; font-size: 22px;">'.$name.'</span><span> </span>';
$bodyContent .='<span style="color: #ffdd30; font-size: 22px;">'.$email.'</span>';
$bodyContent .='<br/><br/>'.$message.'<br/><span style="color: #ffdd30; font-size: 22px;">'.$phone.'</span>';
$bodyContent .='</p></div><br/><br/><br/><br/></body>';
$bodyContent .='</html>';

$mail->Subject = 'Tienes una solicitud nueva en tu página de AutoSteam';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Gracias por tu preferencia, nos pondremos en contacto contigo de forma inmediata';
}
?>
