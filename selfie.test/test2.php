<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('src/class.phpmailer.php');
//$url = "http://98.101.223.10:8080/2/webcam.jpg";
$name2 = "A Salty Dog Friend";$email2 = "rob@saltydog.com";$message = "No Message";
if(isset($_POST['name'])){
	$name2 = $_POST['name'];
}
if(isset($_POST['email'])){
	$email2 = urldecode($_POST['email']);
}
if(isset($_POST['message'])){
	$message = $_POST['message'];
}
$kat = 'kat@saltydog.com';
// $bob = '8433846463@vzwpix.com';
// $rob = '8432903443@vzwpix.com'; //kat number now
$sent = 'yes';
$email = new PHPMailer();
$email->From      = 'selfie@saltydog.com';
$email->FromName  = $name2;
$email->Subject   = 'Hello from '.$name2.' at the Salty Dog Cafe';
$email->Body      = $message;
// $email->AddBCC($bob);
$email->AddBCC($kat);
$email->AddAddress( $email2 );

$file_to_attach = 'src/'.$_POST['image'].'.jpg';
//$email->addCustomHeader("CC: bob@saltydog.com");
$email->AddAttachment( $file_to_attach , 'saltydogcafe.jpg' );

return $email->Send();
//ßheader('Location:http://saltydogcafe.com/selfie.test/smile');
?>