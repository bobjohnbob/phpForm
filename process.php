<?php

require_once('config.php');

function templateLogic($matches)
{
	$temp = trim($matches[0], "{}");

	if(isset($_POST[$temp]))
	{
		return $_POST[$temp];
	}
	elseif($temp == "phpfEVERYTHING")
	{
		foreach($_POST as $key => $value)
		{
			if($key == "recaptcha_challenge_field" 
				|| $key == "recaptcha_response_field")
			{
				continue;
			}
			$everything .= $key.": ".$value."<br>\n";
		}

		return $everything;
 	}
	
	return "{TEMPLATE FIELD NOT SPECIFIED}";
}


if($recaptchaEnabled)
{
	if(!isset($_POST["recaptcha_challenge_field"]) 
		|| !isset($_POST["recaptcha_response_field"]))
	{
		die("Invalid CAPTCHA verification.  Please go back and try again.");
	}	
	require_once('recaptchalib.php');

	$resp = recaptcha_check_answer($recaptchaPrivKey,
	       	$_SERVER["REMOTE_ADDR"],
		$_POST["recaptcha_challenge_field"],
		$_POST["recaptcha_response_field"]);
	
	if(!$resp->is_valid)
	{
		die("Invalid CAPTCHA verification.  Please go back and try again.");
	}
}
if(isset($_POST["template"]))
{
	$template = file($_POST["template"]);
}
else
{
	$template = file($templateFile);
}

$emailBody = "";
$subject = "";

if(isset($_POST["email"]))
{
	$subject = "Contact form message from ".$_POST["email"];
}
else
{
	$subject = "Contact form message.";
}

$pattern = "/\{([a-zA-Z0-9_]+)\}/i";

foreach($template as $line)
{
	$emailBody .= preg_replace_callback(
		$pattern, "templateLogic", 
		$line);
}

if(isset($_POST["redirectURL"]))
{
	$redirectDestination = $_POST["redirectURL"];
}

if(@mail($sendToEmail, $subject, $emailBody, NULL, $sendmailParam))
{
	if(isset($redirectDestination))
	{
		header("Location: $redirectDestination");
	}
	else
	{
		echo "Thank You for using John's form processing script.  Your message has delivered successfuly.";
	}
}
else
{
	echo "An error prevented your message from sending.  Please try again later.";
}
?>
