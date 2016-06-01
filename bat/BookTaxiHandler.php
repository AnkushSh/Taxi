<?php
/*
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'postmaster@sandboxc5777705704342d9a88799eb39aa6249.mailgun.org';   // SMTP username
$mail->Password = '690f07d8d6d038fe8746729e947c02cb';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted

$mail->From = 'YOU@YOUR_DOMAIN_NAME';
$mail->FromName = 'Mailer';
$mail->addAddress('anku.nwaab@gmail.com');                 // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->Subject = 'Hello';
$mail->Body    = 'Testing some Mailgun awesomness';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
*/

require 'vendor/autoload.php';
use Mailgun\Mailgun;

$from = "<dhanvitourandtravels@gmail.com>";
$to = "<anku.nwaab@gmail.com>";

$subject = isset($_POST['subject']) ? $_POST['subject'] : 'Simple subject';
$overallMessage = isset($_POST['overallMessage']) ? $_POST['overallMessage'] : 'OverAllMessage';

$mg = new Mailgun("key-7f070cde69c94145ecfadfa6829e024d");
$domain = "sandboxc5777705704342d9a88799eb39aa6249.mailgun.org";

# Now, compose and send your message.
$mg->sendMessage($domain, array('from'    => $from, 
                                'to'      => $to, 
                                'subject' => $subject, 
                                'text'    => $overallMessage ));

  
	//SMTP server settings	
	
/*	
	
	$host = "smtp.mailgun.org";
    $port = "587";
    $username = "postmaster@sandboxc5777705704342d9a88799eb39aa6249.mailgun.org";
    $password = "690f07d8d6d038fe8746729e947c02cb";
	
	
	$messageBody = "";
	
	if($_POST['name']!='false'){
		$messageBody .= '<p>Visitor: ' . $_POST["name"] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['name']!='false'){
		$messageBody .= '<p>Country: ' . $_POST["country"] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['email']!='false'){
		$messageBody .= '<p>Email Address: ' . $_POST['email'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}else{
		$headers = '';
	}
	if($_POST['state']!='false'){		
		$messageBody .= '<p>State: ' . $_POST['state'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['phone']!='false'){		
		$messageBody .= '<p>Phone Number: ' . $_POST['phone'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}	
	if($_POST['fax']!='false'){		
		$messageBody .= '<p>Fax Number: ' . $_POST['fax'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['message']!='false'){
		$messageBody .= '<p>Message: ' . $_POST['message'] . '</p>' . "\n";
	}
	
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}
	
	if($host=="" or $username=="" or $password==""){
		$owner_email = $_POST["owner_email"];
		$headers = 'From:' . $_POST["email"] . "\r\n" . 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
		$subject = 'A message from your site visitor ' . $_POST["name"];
		
		try{
			if(!mail($owner_email, $subject, $messageBody, $headers)){
				throw new Exception('mail failed');
				}else{
				echo 'mail sent';
			}
			}catch(Exception $e){
			echo $e->getMessage() ."\n";
		}
	}else{	
		require_once 'Mail.php';

		$to = $_POST["owner_email"];
		$subject = 'A message from your site visitor ' . $_POST["name"];
		$headers = array (
		'From' => 'From:' . $_POST["email"] . "\r\n" . 'Content-Type: text/plain; charset=UTF-8' . "\r\n",
		'To' => $to,
		'Subject' => $subject);
		
		$smtp = Mail::factory(
					'smtp',
					array (
						'host' => $host,
						'port' => $port,
						'auth' => true,
						'username' => $username,
						'password' => $password));

		$mail = $smtp->send($to, $headers, $messageBody);
		
		try{
			if(PEAR::isError($mail)){
				echo $mail->getMessage();
				}else{
				echo 'mail sent';
			}
			}catch(Exception $mail){
			echo $mail->getMessage() ."\n";
		}
	} */
?>