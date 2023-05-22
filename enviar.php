<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
/*
include  'PHPMailer/src/Exception.php' ;
include  'PHPMailer/src/PHPMailer.php' ;
include  'PHPMailer/src/SMTP.php' ;
*/
require 'vendor/autoload.php';

    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $telefone=$_POST['telefone'];
    $msg=$_POST['mensagem'];




//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
 
try {
	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	//$mail->Host = 'smtp.gmail.com';// host do google
	$mail->Host = 'email-ssl.com.br';//host da localweb
	$mail->SMTPAuth = true;
	$mail->Username = 'contato@queenvanelli.com.brs';
	$mail->Password = 'Queen2022$';
	$mail->Port = 587;
 
	$mail->setFrom('contato@queenvanelli.com.br');
	$mail->addAddress('contato@queenvanelli.com.br');//recebe os emails do site
	
 
	$mail->isHTML(true);
	$mail->Subject = 'Contato pelo site';
	$mail->Body = '<h2>Contato Site</h2><strong>Nome:</strong> '.$nome."<br><br> <strong>Telefone:</strong> ".$telefone."<br> <br><strong>Email:</strong> ".$email."<br><br><strong>Mensagem:</strong> ".$msg."<br>";
	$mail->AltBody = 'TransCJ';
 
	if($mail->send()) {
		header('location:index.php');
	} else {
		echo "erro";
        
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}