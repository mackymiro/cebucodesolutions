<?php

function send_mail($recipient,$msg,$subject,$sender) {
		require_once("phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();		 
		/* not gmail */
		
		$mail->IsSMTP();// send via SMTP	
		$mail->SMTPDebug = 1; // 1 tells it to display SMTP errors and messages, 0 turns off all errors and messages, 2 prints messages only.
		$mail->Host = "localhost";
		$mail->Username   = "f4mamuhc"; // SMTP account username
		$mail->Password   = "rAs!1batrocks";     // SMTP account passwor$mail->SMTPDebug = 1; // 1 tells it to display SMTP errors and messages, 0 turns off all errors and messages, 2 prints messages only.
		
		$mail->From     = $sender;
		$mail->FromName = 'Magento Cebu';		
		$mail->AddAddress($recipient); 
		$mail->AddReplyTo($sender);
		$mail->WordWrap = 50;// set word wrap	 
		$mail->Body = $msg."\n";
								
		$mail->IsHTML(true);// send as HTML
		$mail->Subject  =  $subject;
		if(!$mail->Send())
		{
		   echo "Message was not sent <p>";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}	
		//return $mail->ErrorInfo;
		
}//end fct
?>
