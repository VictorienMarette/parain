<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$message = $_POST['message'];

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 0;
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "youtubtips.fr@gmail.com";
	$mail->Password = "NeS9vh74G";
	$mail->setFrom($email, "un mec ou peux etre une meuf");
	$mail->addReplyTo($email, "client");
	$mail->addAddress('victorienmarette@gmail.com', 'vic');
	$mail->msgHTML($message, __DIR__);
	
	$mail->send();
	/*if (!$mail->send()) {
	    header("Location: ../../contacte.php");
	    exit();
	}else{
		header("Location: ../../contacte.php");
	    exit();
	}*/
}else{
	header("Location: ../../contacte.php");
	exit();
}