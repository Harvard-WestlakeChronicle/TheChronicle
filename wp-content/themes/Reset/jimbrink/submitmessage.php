<?php

include('connect.php');

if(empty($_POST)){
	die('error');
}


$name = mysql_real_escape_string( $_POST['name'] );
$email = mysql_real_escape_string( $_POST['email'] );
$message = mysql_real_escape_string( $_POST['message'] );
$anon = 0;
$image = mysql_real_escape_string( $_POST['image'] );

mysql_set_charset('utf8'); 


if(empty($name) || empty($email) || empty($message)){
	die('error');
}

mysql_query("INSERT INTO jimbrink (name, email, message, anon) VALUES ('$name', '$email', '$message', '$anon') ");
$id = mysql_insert_id();

if(!empty($image)){
	mysql_query("INSERT INTO jimbrinkimages (messageid, image) VALUES ('$id', '$image')");	
}

$body = "Thank you for sharing a memory of Jim Brink to the \"Remembering Jim Brink\" page on the Harvard-Westlake Chronicle website.

You can read your submission at http://hwchronicle.com/rememberingjimbrink.

If you did not submit a post, please immediately contact David Wolddenberg '15 or the Chronicle through our form at hwchronicle.com/about/#contact to remove the post.";

$subject = "Your post to Remembering Jim Brink";
$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=iso-8859-1";
$headers[] = "From: Chronicle <chronicle@hw.com>";
$headers[] = "Bcc: Zoe Dutton Editor in Chief <zdutton1@hwemail.com>";
$headers[] = "Subject: {$subject}";
$headers[] = "X-Mailer: PHP/".phpversion();

mail($email, $subject, $body, implode("\r\n", $headers));




die("dfd");

?>