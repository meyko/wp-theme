<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	extract ($_POST);
	$mtext = "Имя : $name\r\nE-mail: $email\r\nНомер телефона :$phone\r\nСообщение:\r\n$message\r\n";
	$headers = "From: contact@b-inform.ru";
	if ($name&&$email){
		$ok = mail('business-inform@bk.ru', "От b-inform.ru:$theme",$mtext,$headers);
	}
	if ($ok)
		echo '{"result":1}';
	else 
		echo '{"result":0}';
	}