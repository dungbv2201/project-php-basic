<?php
use PHPMailer\PHPMailer\PHPMailer;

function sendMail(){
	$errors = [];
	$errorMessage = '';
	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->Host = 'smtp.mailtrap.io';
	$mail->SMTPAuth = true;
	$mail->Username = '436a0b2468fdb2';
	$mail->Password = '42f799c547a8b6';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 2525;

	$mail->setFrom('dungbv2201@gmail.com', 'Mailtrap Website');
	$mail->addAddress('dungbv2201@gmail.com', 'Me');
	$mail->Subject = 'New message from your website';

	// Enable HTML if needed
	$mail->isHTML(true);

	$bodyParagraphs = ["Name: <h1>dungbv</h1>", "Email: dungbv2201@gmail.com", "Message:", nl2br('hello')];
	$body = join('<br />', $bodyParagraphs);
	$mail->Body = $body;

	echo $body;
	if($mail->send()){
		echo "success";
		die;
	} else {
		echo 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
		die;
	}
}

