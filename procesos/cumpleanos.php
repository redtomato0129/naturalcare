
<?php

include('/home/natujwoc/public_html/administrador/config/app_config.php');

echo $fecha=date('m-d');
//$fecha="06-08";//aqui cambiele

$sql="SELECT *FROM natuser where cumple like'%-".$fecha."%' ORDER BY id desc";
$retry = mysql_query($sql); 
//echo var_dump($retry);
$contadorrr=0;
$sql2="SELECT *FROM tipo_puntos where id=2";
$retry2 = mysql_query($sql2); 
$fptos = mysql_fetch_array($retry2);

$datos = "SELECT *FROM usuario_admin";
$rdatos = mysql_query($datos);
$fdatos = mysql_fetch_array($rdatos);

 while ($fila = mysql_fetch_assoc($retry))
 {
	$contadorrr=$contadorrr+1;


	$sqlcupon = "INSERT INTO puntos VALUES ('',2,".$fptos['puntos'].",".$fila['id'].",null,1,now())";
	mysql_query($sqlcupon);

	$sqlcuponuser = "UPDATE natuser set puntos=puntos+".$fptos['puntos']." where id=".$fila['id']."";
	mysql_query($sqlcuponuser);


	require_once('/home/natujwoc/public_html/administrador/PHPMailer-master/PHPMailerAutoload.php');
	require_once('/home/natujwoc/public_html/administrador/PHPMailer-master/class.phpmailer.php');
	date_default_timezone_set('Etc/UTC');
	$mail = new PHPMailer();
	$mail->isSMTP(); 
	$mail->SMTPDebug = 3;                                       // Set mailer to use SMTP
	$mail->Host = 'mail.naturalcare-ec.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'correos@naturalcare-ec.com';                 // SMTP username
	$mail->Password = 'tires0001%';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to
	$mail->setFrom('correos@naturalcare-ec.com', 'Naturalcare');
	//$mail->addAddress($fila['email'] ,$fila['nombres']);  
  $mail->addAddress($_POST['email'] ,$_POST['nombres']);  
	//$mail->addAddress('ventas@naturalcare-ec.com','Naturalcare');
	$mail->addAddress('bryancarvallo19@gmail.com','Naturalcare');
  $mail->addAddress('ccruz@estudionovaidea.com','Naturalcare');


	$mail->SMTPOptions = array(
	'ssl' => array(
	'verify_peer' => false,
	'verify_peer_name' => false,
	'allow_self_signed' => true
	)
	); 

	$mail->isHTML(true);  
	$hoy = date("Y-m-d");
	

	$mail->Subject = 'Feliz Cumpleaños en Naturalcare';
	$mail->Body    = '<div marginheight="0" marginwidth="0" bgcolor="#FFFFFF" style="font-family: verdana, sans-serif;font-size: 12px;font-style: italic;text-align: justify;">

	<div style="width:700px; height:1300px; margin: 0 auto; background-color: #FFF;">
	 <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
      <tbody>
        <tr>
          <td class="o_hide" align="center" style="display: none;font-size: 0;max-height: 0;width: 0;line-height: 0;overflow: hidden;mso-hide: all;visibility: hidden;">Email Summary (Hidden)</td>
        </tr>
      </tbody>
    </table>
    <!-- header-link -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs o_pt-lg o_xs-pt-xs" align="center" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;padding-top: 32px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table>
    
     <!-- image-full -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs" align="center" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-white o_sans o_text o_text-secondary" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;">
                    <p style="margin-top: 0px;margin-bottom: 0px;"><img class="o_img-full" src="'.$fdatos["imagenes"].'cumpleanos.png" width="632" height="352" alt="" style="max-width: 632px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;width: 100%;"></p>
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table>
    
    
    <!-- hero-icon-outline -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs" align="center" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
               
                  <td class="o_bg-ultra_light o_px-md o_py-xl o_xs-py-md o_sans o_text-md o_text-light" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #fff;color: #82899a;padding-left: 24px;padding-right: 24px;padding-top: 64px;padding-bottom: 5px;">
                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                      <tbody>
                        <tr>
                          <td class="o_sans o_text o_text-secondary o_b-primary o_px o_py o_br-max" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;border: 2px solid #126de5;border-radius: 96px;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                            <img src="'.$fdatos["imagenes"].'cake-48-primary.png" width="48" height="48" alt="" style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;">
                          </td>
                        </tr>
                        <tr>
                          <td style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </td>
                        </tr>
                      </tbody>
                    </table>
                     <h4 class="o_heading o_mb-xs o_text-secondary" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 8px;color: #424651;font-size: 18px;line-height: 23px;">Felicidades '.$fila['nombres'].',<br> se te acreditaron '.$fptos['puntos'].' puntos a tu cuenta </h4>
                   
                  </td>
               
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table>
   
   
   
    <!-- content -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs" align="center" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-white o_px-md o_py o_sans o_text o_text-secondary" align="center" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #ffffff;color: #424651;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                    <p style="margin-top: 0px;margin-bottom: 0px;">Puedes usarlos en la compra de productos desde nuestro sitio web</p>
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table>
    <!-- button-primary -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs" align="center" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-white o_px-md o_py-xs" align="center" style="background-color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 8px;padding-bottom: 8px;">
                    <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation">
                      <tbody>
                        <tr>
                          <td width="300" class="o_btn o_bg-primary o_br o_heading o_text" align="center" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #0d8b00;border-radius: 4px;">
                            <a class="o_text-white" href="https://www.naturalcare-ec.com" target="_blank" style="text-decoration: none;outline: none;color: #ffffff;display: block;padding: 12px 24px;mso-text-raise: 3px;">Iniciar mi compra&nbsp;→</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table>
    <!-- spacer-lg -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs" align="center" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-white" style="font-size: 48px;line-height: 48px;height: 48px;background-color: #ffffff;">&nbsp; </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table>
    <!-- footer-white-2cols -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs o_pb-lg o_xs-pb-xs" align="center" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;padding-bottom: 32px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              
              <tbody>
														<tr>
															<td class="column_cell px pt_xs pb_0 tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 8px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #a9b3ba;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;">
																
																<p class="mb_xxs" style="font-family: Arial, sans-serif;font-size: 14px;line-height: 23px;color: #a9b3ba;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 4px;">
																	Este mail fue enviado automáticamente, por favor no lo responda.
																</p>
																
															</td>
														</tr>
													</tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
            <div class="o_hide-xs" style="font-size: 64px; line-height: 64px; height: 64px;">&nbsp; </div>
          </td>
        </tr>
      </tbody>
    </table>


	</div>
	</div>';
	$mail->CharSet = 'UTF-8';
	if(!$mail->send()) {
	echo 'Message could not be sent.';

	echo 'Mailer Error: ' . $mail->ErrorInfo;

	} 
	

 }		
	






			
	



?>