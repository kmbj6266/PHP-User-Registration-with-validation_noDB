<?php
	session_start();

//always put this empty $_SESSION array at the top to declare it so that
//when you reference it at the bottom of your process page, it will recognize the
//empty array. So if you don't have any errors upon logging in, it will redirect
//you to the success.php page. SEE BELOW AT END OF FILE.

$_SESSION['error'] = array();
	// var_dump($_POST);
	// die;
if(empty($_POST['email']))
{
	$_SESSION['error'][] = "Email cannot be empty.";
}
else
{
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{	
		$_SESSION['email'] = $_POST['email'];
	}
	else
	{
		$_SESSION['error'][] = "The email address you entered, " . $_POST['email'] .", is NOT a valid email address! Please re-enter a valid email address.";
	}
	
}

// ------------------if first_name is empty, say first name can't be empty------------
//else if first name is the correct format, set session first_name, if not, send error.

if(empty ($_POST['first_name']))
{
	$_SESSION['error'][] = "First name cannot be empty.";
}
else
{

	if(preg_match( '/[0-9]/', $_POST['first_name']))
	{
		$_SESSION['error'][] = "Only letters allowed in the first name";
		
	}
	else
	{ 
		$_SESSION['first_name'] = $_POST['first_name'];
	}

}

// ------------------if last_name is empty, say last name can't be empty------------
//else if last name is the correct format, set session last_name, if not, send error.

if(empty ($_POST['last_name']))
{
	$_SESSION['error'][] = "Last name cannot be empty.";
}
else
{
	if(preg_match( '/[0-9]/', $_POST['last_name']))
	{
		$_SESSION['error'][] = "Only letters allowed in the last name";
	}
	else
	{ 
		 $_SESSION['last_name'] = $_POST['last_name'];
	}
}


// ------------------if password is empty, say password can't be empty------------
//else if the password's string length is less than  7 digits, set session password, if not, send error.
if(empty ($_POST['password']))
{
	$_SESSION['error'][] = "Password name cannot be empty.";
}
else
{
	if(strlen($_POST['password']) < 7)
	{
		$_SESSION['error'][] = "Your password must contain at least 7 characters.";
	}
	else
	{ 
		 $_SESSION['password'] = $_POST['password'];
	}
}


// ------------------if password confirmation is empty, say it can't be empty------------
//else if the password confirmations's string is not equal to password, 
//set session password, if not, send error.
if(empty ($_POST['confirm_password']))
{
	$_SESSION['error'][] = "You must confirm your password.";
}
else
{
	if ($_POST['confirm_password'] != $_POST['password'])
	{
		$_SESSION['error'][] = "Your confirmation is not correct.";
	}
	else
	{ 
		$_SESSION['confirm_password'] = $_POST['confirm_password']; 
	}
}


// -----------------------------------

if(empty ($_POST['birthdate']))
{
	$_SESSION['error'][] = "You must enter your birthdate.";
}
else
{
	$bdate = explode('-', $_POST['birthdate']);
	if(!checkdate($bdate[1], $bdate[2], $bdate[0]))
	{
		$_SESSION['error'][] = "Please re-enter your date in the correct format.";
	}
	else
	{ 
		$_SESSION['birthdate'] = $_POST['birthdate']; 
	}
}


//----------------------------------------------

// now count the $_SESSION['error'] and see if the errors are greater than 0,
//if you have errors, it will direct you back to the index page, and show the errors, if NO errors, it will direct you to the success page, success.php
if(count($_SESSION['error'])>0)
{	
	header('Location: indexAdvRegistration.php');
	die();
}
else
{
	header('Location: success.php');
	die();
}


?>