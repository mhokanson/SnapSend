<?php
	file_put_contents("uploads/post.log",print_r($_POST,true)."\r\n");
	file_put_contents("uploads/post.log",print_r($_FILES,true),FILE_APPEND);


	$note = $_POST["note"];
	$img = $_POST["image"];
	$sender = $_POST["sender"];

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$img = substr($img,strpos($img,",")+1);
	
//	echo "about to require phpmailer\r\n";
	use PHPMailer\PHPMailer\PHPMailer;
	require_once('PHPMailer.php');

	
	$mail = new PHPMailer(true);
	

	$encoded_string = $img;
	$imgdata = base64_decode($encoded_string);

	$f = finfo_open();
	
	$mime_type = finfo_buffer($f, $imgdata, FILEINFO_MIME_TYPE);
	
	
	$base64_string = $img;
	$emailBody = "Email sent by ".$sender."\r\n\r\n".$note;
	
	$mail->setFrom('SnapSend@domain.com', 'Snap Send');
	$mail->addReplyTo('NoReply@domain.com','No Reply');
	$mail->addAddress('firstPerson@domain.com','FirstName LastName');
	$mail->addAddress('secondPerson@domain.com','FirstName LastName');
	$mail->addBCC('bccPerson@domain.com','FirstName LastName');
	$mail->Subject = 'New Note';
	$mail->Body = $emailBody;
	$mail->addStringAttachment(base64_decode($base64_string),"Pic.png","base64",$mime_type);
	
	//send the message, check for errors
	if(!$mail->send()) {
		echo 'Message was not sent.';
		echo 'Mailer error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent.';
	}
?>

?>