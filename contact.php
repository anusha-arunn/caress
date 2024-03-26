<?php


$name = ($_GET['name']) ? $_GET['name'] : $_POST['name'];
$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];
$phoneno = ($_GET['phoneno']) ?$_GET['phoneno'] : $_POST['phoneno'];
$date = ($_GET['date']) ?$_GET['date'] : $_POST['date'];
$event = ($_GET['event']) ?$_GET['event'] : $_POST['event'];




if ($_POST) $post=1;


if (!$name) $errors[count($errors)] = 'Please enter your Name.';
if (!$email) $errors[count($errors)] = 'Please enter your Email.'; 
if (!$phoneno) $errors[count($errors)] = 'Please enter your Phone number.'; 
if (!$date) $errors[count($errors)] = 'Please select a Date.'; 
if (!$event) $errors[count($errors)] = 'Please select an Event.'; 



if (!$errors) {

	//recipient - replace your email here
	$to = 'anchu.nandi@gmail.com';	
	
	$from = $name . ' <' . $email . '>';
	

	$subject = "Message from " . $name;	
	$message = "Name: " . $name . "<br/><br/>
		       Email: " . $email . "<br/><br/>
		       Phone Number: " . $phoneno . "<br/><br/>
		       Date: ". $date . "<br/><br/>
		       Event: ". $event . "<br/>";
		       
		      

	$result = sendmail($to, $subject, $message, $from);
	
	
	if ($_POST) {
		if ($result) echo "Thank you! You have been registered.";
		else echo "Sorry, unexpected error. Please try again later";
		
	
	} else {
		echo $result;	
	}

//if the errors array has values
} else {
	
	for ($i=0; $i<count($errors); $i++) echo $errors[$i] . "<br/>";
	echo '<a href="index.html">Back</a>';
	exit;
}


function sendmail($to, $subject, $message, $from) {
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= "From: ". $from . "\r\n";
	
	$result = mail($to,$subject,$message,$headers);
	
	if ($result) return 1;
	else return 0;
}

?>
