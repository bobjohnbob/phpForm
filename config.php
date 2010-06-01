<?php
//This is the only required setting.  Replace the email address below 
//with the email address you'd like to receive the forms at.
$sendToEmail = 'your@email.com';

//------------EVERYTHING BELOW THIS POINT IS OPTIONAL---------------

//This is the name of the file to use when no template is passed.
//Useful if you're pointing multiple contacts to the same form.

$templateFile = 'template.txt'; //Default is template.txt

//This is the default page that should show after the information is submitted.
$redirectDestination = NULL; 		 //Default is NULL

//This tells the script wether you want to use reCAPTCHA or not
$recaptchaEnabled = TRUE;

//If you have your own recaptcha pub/priv key enter it here.
//You CAN use the keys provided, but keep in mind they are publicly known.
//
//Default values:
//$recaptchaPubKey = "6LfGEwsAAAAAAEfdb77X7r7gbSJwOlLz44-RW6zA";
//$recaptchaPrivKey = "6LfGEwsAAAAAALlZSbCjaZpUdPhce7w03BAfQMpp";

$recaptchaPubKey = "6LfGEwsAAAAAAEfdb77X7r7gbSJwOlLz44-RW6zA";
$recaptchaPrivKey = "6LfGEwsAAAAAALlZSbCjaZpUdPhce7w03BAfQMpp";

//This is passed as the 5th paramter to the mail function.  You can use
//this to specify special paramaters to be used in the sendmail command.

$sendmailParam = "-ODeliveryMode=b";

?>
