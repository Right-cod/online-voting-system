<?php
	require './PHPMailer.php';
	require './SMTP.php';
	require './Exception.php';
	//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	date_default_timezone_set('Africa/Nairobi');
	require_once 'dbcon.php';	
	$con = new mysqli('localhost', 'root', '', 'voting');					
	$conn->query("UPDATE voters SET account = 'Active'")or die(mysql_error());
	//
     //Create instance of PHPMailer
$mail = new PHPMailer();
//Set mailer to use smtp
$mail->isSMTP();
//Define smtp host
$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "tls";
//Port to connect smtp
$mail->Port = "587";
//Set gmail username
$mail->Username = "kimungemark@gmail.com";
//Set gmail password
$mail->Password = "33839814K.";
//Email subject
$mail->Subject = "DKUT OINLINE VOTING PORTAL";
//Set sender email
$mail->setFrom('kimungemark@gmail.com','ONLINE VOTING');
//Enable HTML
$mail->isHTML(true);
//Attachment
//$mail->addAttachment('img/attachment.png');
//Email body
$gg=mysqli_query($con,"SELECT * FROM voters");
while($kk=mysqli_fetch_array($gg)){
	$name=$kk['firstname']." ".$kk['lastname'];
	$reg=$kk['id_number'];
	$email=$kk['email'];
	$password=$kk['password'];
	$mail->Body = "
<h1 style='color:cyan;'>PASSWORD UPDATE OF DKUT ONLINE VOTING SYSTEM</h1></br>
<p>
Dear ".$name.", Registration number ".$reg.", We would like to inform you that your dkut online voting portal password has changed.<br>
Your new password is <u style='color:blue;font-size:20px;'>".$password."</u>
</p>";
$mail->addAddress($email,$name);
if ( $mail->send() ) {
	$statuss=1;
}
}
//
//Add recipient

if ( $statuss==1) {
	echo "<script>alert('Mails sent successfully. Thank you for your patience.')</script>";
}
//Closing smtp connection
$mail->smtpClose();
	//

	echo "<script> window.location='voters.php' </script>";
?>			