<?php
/* Check all form inputs using check_input function */
$client_name = check_input($_POST['contact_phone'], "Enter Your Phone Number");
$client_zip = check_input($_POST['contact_city']);
$client_phone = check_input($_POST['contact_name'], "Enter Your Name");
$client_bttc = check_input($_POST['contact_jobtype'], "Please select a Job Type");
$client_email = check_input($_POST['contact_email']);
$client_notes = check_input($_POST['contact_email']);

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $contact_email))
{
    show_error("E-mail Address Not Valid!");
}
/* If the phoen number is not correct, show an error message */
if (!is_numeric($contact_phone)) {
    show_error("Invalid Phone Number! Please Use Numbers Only.");
}

/* Let's prepare the message for the e-mail */
$contact_message = "
Name: $contact_name

Phone Number: $contact_phone
City: $contact_city

Job Type: 
$contact_jobtype

E-mail: 
$contact_email

End of Message
";

/* Send the message using mail() function */
mail($contact_sendAddress, $contact_sendTitle, $contact_message);

/* Redirect visitor to the thank you page */
header('Location: thankyou.php');
exit();

/**
 * Functions
 */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError) { ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Contact Form</title>
	</head>
	<body>
	<b>Please correct the following error(s):</b><br />
	<?php echo $myError; ?>
	</body>
	</html>
	<?php
	exit();
}
?>