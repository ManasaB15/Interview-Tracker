<?php
	$to      = $email; // Send email to our user
	$subject = 'set password'; // Give the email a subject 
	$message = '
	 
	Thanks for signing up!
	Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
	 
	------------------------
	User_name: '.$name.'
	Password: '.$password.'
	------------------------
	 
	Please click this link to activate your account:
	http://www.yourwebsite.com/verify.php?email='.$email.'&hash='.$hash.'
	 
	';
	$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
	mail($to, $subject, $message, $headers); // Send our email
?>