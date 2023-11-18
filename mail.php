<?php

$name=$_POST['name'];
$email=$_POST['email'];   // 
$phone=$_POST['phone'];
$message=$_POST['message'];

 
if (($name=="")||($email=="")||($message=="")|| ($phone==""))
{
echo "All fields are required, please fill <a href=\"\">the form</a> again.";  
}
else{

$subject = $_POST['name'] . '|| Contact-Us Notification'; // Subject of your email
$to = 'detailingstreet@gmail.com';  //Recipient's E-mail --- 
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "From: " . $_POST['email'] . "\r\n"; // Sender's E-mail
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
$message .= "<table width='98%' border='0' align='center' cellpadding='2' cellspacing='2' class='normaltext'>
			<tr>
			<td colspan='3' align='left' valign='top'>Dear Admin,</td>
			</tr>
				<tr>
				<td colspan='3' align='left' valign='top'>&nbsp;</td>
			</tr>
			<tr>
				<td colspan='3' align='left' valign='top'>Please find below an enquiry submitted. </td>
			</tr>
			 <tr>
				<td colspan='3' align='left' valign='top'>&nbsp;</td>
			</tr>
			 <tr>
				  <td width='30%' align='left' valign='top'><strong>Name</strong></td>
				  <td width='1%' align='left' valign='top'><strong>:</strong></td>
				  <td width='69%' align='left' valign='top'>$name </td>
			</tr>
			<tr>
				<td align='left' valign='top'><strong>Email</strong></td>
				<td align='left' valign='top'><strong>:</strong></td>
				<td align='left' valign='top'>$email</td>
			</tr>
			<tr>
				<td align='left' valign='top'><strong>Phone Number</strong></td>
				<td align='left' valign='top'><strong>:</strong></td>
				<td align='left' valign='top'>$phone</td>
			</tr>
			<tr>
				<td align='left' valign='top'><strong>Comments</strong></td>
				<td align='left' valign='top'><strong>:</strong></td>
				<td align='left' valign='top'>$message</td>
			</tr>
		 

			<tr>
				<td colspan='3' align='left' valign='top'>&nbsp;</td>
			</tr>

				<tr>
				<td colspan='3' align='left' valign='top'>Regards,</td>
				</tr>
				<tr>
				<td colspan='3' align='left' valign='top'>$name</td>
				</tr></table>";
if (@mail($to, $subject, $message, $headers))
{
	// Transfer the value 'sent' to ajax function for showing success message.
	echo 'sent';
}
else
{
	// Transfer the value 'failed' to ajax function for showing error message.
	echo 'failed';
}
}