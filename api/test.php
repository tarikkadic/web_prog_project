<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__).'/../vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.elasticemail.com', 2525))
  ->setUsername('tarik.kadic1349@gmail.com')
  ->setPassword('8A42163F47D71D4ADB7E6F2618957D8C2E1F')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['tarik.kadic1349@gmail.com' => 'Tarik'])
  ->setTo(['tarik.kadic1349@gmail.com'])
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);

print_r($result);
?>
