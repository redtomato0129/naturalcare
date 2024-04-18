
<?php

include('../config/app_config.php');

require_once "recaptchalib.php";
// your secret key
$secret = "6LfeJMYUAAAAAJsbVTQvUAeK6DGOptpCgF2aTxEe";
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["response"]
    );
}



if ($response != null && $response->success) 
{

			require_once('../PHPMailer-master/PHPMailerAutoload.php');
			require_once('../PHPMailer-master/class.phpmailer.php');
			date_default_timezone_set('Etc/UTC');
			$mail = new PHPMailer();
			//$mail->isSMTP(); 
		//	$mail->SMTPDebug = 3;                                       // Set mailer to use SMTP
			$mail->Host = 'mail.naturalcare-ec.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'correos@naturalcare-ec.com';                 // SMTP username
			$mail->Password = 'tires0001%';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 26;                                   // TCP port to connect to
			$mail->setFrom('correos@naturalcare-ec.com', 'Naturalcare');
			$mail->addAddress('ventas@naturalcare-ec.com','Usuario');  
			//$mail->addAddress('ccruz@estudionovaidea.com','Usuario');
					
			$mail->isHTML(true);  
			$hoy = date("Y-m-d");

			$mail->Subject = 'Quiero Ser Distribuidor';
			$mail->Body    = '<div marginheight="0" marginwidth="0" bgcolor="#FFFFFF" style="font-family: verdana, sans-serif;font-size: 12px;font-style: italic;text-align: justify;">

			<div style="width:700px; height:1300px; margin: 0 auto; background-color: #FFF;">
			Hola, se contactaron con nosotros y nos dejaron la siguiente información <br />
			Nombre: '.$_POST["nombres"].'<br />
			Empresa: '.$_POST["empresa"].'<br />
			Email: '.$_POST["email"].'<br />
			Telefono: '.$_POST["telefono"].'<br />
			Direccion: '.$_POST["direccion"].'<br />
			Provincia: '.$_POST["provincia"].'<br />
			Web: '.$_POST["web"].'<br />
			Mensaje: '.$_POST["mensaje"].'<br /><br />
			Tipo de Comercio: '.$_POST["comercio"].'<br /><br />
			Como supo: '.$_POST["supiste"].'<br /><br />
			Vende: '.$_POST["vendes"].'<br /><br />

			</div>
			</div>';

			$mail->CharSet = 'UTF-8';
			if(!$mail->send()) {
			    echo 'Message could not be sent.';

			   echo 'Mailer Error: ' . $mail->ErrorInfo;

			} else {
				echo "1";
			}
		
	
}else
{
	echo "2";
}



?>