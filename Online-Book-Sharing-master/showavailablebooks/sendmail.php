<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/login.php');
}
$con = mysqli_connect('localhost', 'root', '', 'omegaread');
$book_id = $_POST['book_data'];
$userid = $_SESSION['user_id'];
$query = "select book_id, book_name, email from books natural join customer where book_id= '$book_id'";
$result = mysqli_query($con, $query);
$rows = mysqli_fetch_assoc($result);
$email = $rows['email'];
$book_name = $rows['book_name'];
$query = "select email from customer where user_id = '$userid'";
$result = mysqli_query($con, $query);
$rows = mysqli_fetch_assoc($result);
$useremail = $rows['email'];

if(isset($_POST['book_data']))
{
	require 'class.phpmailer.php';
	$output = '';
	$mail = new PHPMailer;
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP
	$mail->SMTPDebug = 2; 
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'in-v3.mailjet.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	
	$mail->Port = 25;								//Sets the default SMTP server port
	$mail->IsHTML(true);
	$mail->Username = "b97f0ffd049e7ec9870ef46bb4e77d7d";					//Sets SMTP username
	$mail->Password = "0a1e60e96111fd0a7b88f5a9c5c866a4";					//Sets SMTP password
	$mail->SMTPSecure = '';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->setFrom('sid94048.more@gmail.com');			//Sets the From email address for the message
	$mail->FromName = 'OmegaRead';					//Sets the From name of the message
	$mail->addAddress($email, $email);	//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML
	$mail->Subject = 'Hey there! We found a reader who might be interested in your book'; //Sets the Subject of the message
	//An HTML or plain text message body
	$mail->Body = "<html><h2>The Book Name is</h2>$book_name
	<h2>The one who requested to share this book has Email <h2>
	<a href='mailto:$useremail'>$useremail</a></html>"
	;
	$mail->AltBody = '';
	$result = $mail->Send();						//Send an Email. Return true on success or false on error
	if($result["code"] == '400')
	{
		$output .= html_entity_decode($result['full_error']);
	}
	}
	if($output == '')
	{
		echo 'OK';
	}
	else
	{
		echo $output;
	}

	$message = "The mail has been sent, the user will respond soon";
	echo "<script type='text/javascript'>alert('$message');</script>";

	header("Location: showbooks.php");

?>


