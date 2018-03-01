<?php

require_once('phpmailer/PHPMailerAutoload.php');



// Form Processing Messages
$message_success = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';

// Add this only if you use reCaptcha with your Contact Forms
//$recaptcha_secret = ''; // Your reCaptcha Secret

$mail = new PHPMailer();

// If you intend you use SMTP, add your SMTP Code after this Line

$mail->IsSMTP();
$mail->CharSet="UTF-8";
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = 'gaut9a8m@gmail.com';
$mail->Password = 'gautaM@5';
$mail->SMTPAuth = true;


		$name = 'guatam';
		$email = 'gaut9a8m@gmail.com';
		$message ='testing mail fuction';

		$subject = 'testing localhost';

		//$botcheck = $_POST['quick-contact-form-botcheck'];

	

			$mail->SetFrom( $email , $name );
			$mail->AddReplyTo( $email , $name );
			
				$mail->AddAddress( 'ank9i8t@gmail.com' ,'ankit' );
			
			$mail->Subject = $subject;

			$name = isset($name) ? "Name: $name<br><br>" : '';
			$email = isset($email) ? "Email: $email<br><br>" : '';
			$message = isset($message) ? "Message: $message<br><br>" : '';

			//$referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

			$body = "$name $email $message";

			// Runs only when reCaptcha is present in the Contact Form
			

			$mail->MsgHTML( $body );
			$sendEmail = $mail->Send();

			if( $sendEmail == true ):
				echo '{ "alert": "success", "message": "' . $message_success . '" }';
			else:
				echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
			endif;
		
?>