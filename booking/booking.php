<?php
/*
	$ownerEmail = $_POST["owner_email"];
	$headers = 'From:' . $_POST["sender"] . 'Content-Type: '. $_POST["sender"] .'; charset=UTF-8' . "\r\n";
	$subject = 'An order from your site visitor';
	$messageBody = "";	
	
	$arr=array();
	$arr=$_POST;
	foreach ($arr as $key => $value) {
	   echo "$key".': '."$value".'&';
	   if (($value != 'nope') && ($key != 'owner_email') && ($key != 'sender')) {
		   $messageBody .="$key" . ': '."$value" . "\n\n";
		}
	}
		
	try{
		echo $_POST['Email'];
		echo $subject;
		echo $messageBody;

		if(!mail($ownerEmail, $subject, $messageBody, $headers)){
			throw new Exception('mail failed');
		}else{
			echo 'mail sent';
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
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

?>