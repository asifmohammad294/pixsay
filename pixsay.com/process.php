<?php

	$name = $_POST['name'];
    $email = $_POST['email'];
    // $Phone = $_POST['Phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    function clean_text($string)
    {
    	$string = trim($string);
    	$string = stringslashes($string);
    	$string = htmlspecialchars($string);
    	return $string;

    }

    if(isset($_POST['submit']))
    {
    	if(empty($_POST["name"]))
    	{
    		$error .='<p><label class="text-danger">Please Enter your Name</label></p>';
    	}
    	else
    	{
    		$name = clean_text($_POST["name"]);
    		if(!preg_match("/^[a-zA-Z]*$/", $name))
    		{
    			$error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
    		}
    	}
    	if(empty($_POST["email"]))
    	{
    		$error .='<p><label class="text-danger">Please Enter your Email</label></p>';
    	}
    	else
    	{
    		$email = clean_text($_POST["email"]);
    		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    		{
    			$error .= '<p><label class="text-danger">Invalid email format</label></p>';
    		}
    	}
    	if(empty($_POST["subject"]))
    	{
    		$error .= '<p><label class="text-danger">Subject is required</label></p>';
    	}
    	else
    	{
    		$subject = clean_text($_POST["subject"]);
    	}
    	if (empty($_POST["message"]))
    	{
    		$error .= '<p><label class="text-danger">Message is required</label></p>';
    	}
    	else
    	{
    		$message = clean_text($_POST["message"]);
    	}
    	if ($error != '')
    	{
    		require 'phpmailer/class.phpmailer.php';
			require 'phpmailer/PHPMailerAutoload.php';
    		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug = 2;
		$mail->Host='email-smtp.us-east-1.amazonaws.com';
		$mail->Port=587;
		$mail->SMPTAuth=true;
		$mail->SMPTSecure='tls';


		$mail->Username='AKIAS4G2FZNZOMCWJ3WH';
		$mail->Password='BG7PYSW/l2D+T993uO45nnoU8s8WxJxsYH+z/RzeWTxV';
		$mail->From = $_POST["email"];
		$mail->FromName = $_POST["name"];
		$mail->AddAddress('pixsay04@gmail.com', 'Pixsay');
		$mail->AddCC($_POST["email"], $_POST["name"]);
		$mail->wordwrap = 50;
		$mail->isHTML(true);
		$mail->Subject = $_POST["subject"];
		$mail->Body = $_POST["message"];
		if(!$mail->Send()){
			$error = '<label class="text-success">Thank you for contacting us</label>';
		}
		else
		{
			$error = '<label class="text-danger">There is an Error</label>';
		}
		$name = '';
		$email = '';
		$subject = '';
		$message = '';

    }
	}

?>