<?php
// check if fields passed are empty
if(empty($_POST['company'])   ||
   empty($_POST['firstname']) ||
   empty($_POST['lastname'])  ||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$company = $_POST['company'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// create email body and send it	
$to = "d.morris@drmorris-itservices.de"; // put your email
$email_subject = "Contact form submitted by:  $firstname $lastname";
$email_body = "Company: $company \n 
               First Name: $firstname \n 
               Last Name: $lastname \n 
              Email: $email_address\n 
              Message: $message";
$headers = "From: $email_address \n";
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
