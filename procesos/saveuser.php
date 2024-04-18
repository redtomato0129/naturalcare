
<?php

include('../config/app_config.php');

function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}


$datos = "SELECT *FROM usuario_admin";
$rdatos = mysql_query($datos);
$fdatos = mysql_fetch_array($rdatos);

$svalidar = "SELECT *FROM natuser WHERE email='".$_POST['email']."'";
$rvalidar = mysql_query($svalidar);
$validador=0;
while($fvalidar = mysql_fetch_array($rvalidar))
{
$validador++;
}

$sql="SELECT *FROM tipo_puntos where id=1";
$retry = mysql_query($sql); 
$fptos = mysql_fetch_array($retry);


if($validador == 0)
{
	$secuencia = "SELECT `AUTO_INCREMENT` as valor
				FROM  INFORMATION_SCHEMA.TABLES
				WHERE TABLE_SCHEMA = 'natujwoc_web'
				AND   TABLE_NAME   = 'natuser' ";
	$rsecuencia = mysql_query($secuencia);
	$fsecuencia = mysql_fetch_array($rsecuencia);
	
	$sql = "INSERT INTO natuser VALUES ('','".$_POST['nombres']."','".$_POST['apellidos']."','".$_POST['celular']."','".$_POST['telefono']."','EC','".$_POST['provincia']."','".$_POST['ciudad']."','".$_POST['direccion']."','".$_POST['referencia']."','".$_POST['ruc']."','".$_POST['razon']."','".$_POST['direccionf']."','".$_POST['telefonof']."','".$_POST['email']."','".md5($_POST['contrasena'])."','1','".$fptos['puntos']."',now(),'','','".$_POST['cumple']."')";
	$res=mysql_query($sql);
	

	     $sql="SELECT *FROM natuser where  email='".$_POST['email']."' ORDER BY id desc";
		 $retry = mysql_query($sql); 
		 $contadorrr=0;
		 while ($fila = mysql_fetch_assoc($retry))
		 {
			$contadorrr=$contadorrr+1;
			$scarrito = "UPDATE carrito set carro='".$fila['id']."' where carro='".$_SESSION['idcarrito']."'";
			mysql_query($scarrito);
			$_SESSION['idcarrito']=$fila['id'];
			$_SESSION['idusuario']=$fila['id'];
			$_SESSION['nombres']=$fila['nombres']; 

		 }
	
			if($res == true)
			{
			require_once('../PHPMailer-master/PHPMailerAutoload.php');
			require_once('../PHPMailer-master/class.phpmailer.php');
			date_default_timezone_set('Etc/UTC');
			$mail = new PHPMailer();
			$mail->SMTPDebug = 3; 
			$mail->isSMTP(); 
			$mail->Host = 'mail.naturalcare-ec.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'correos@naturalcare-ec.com';                 // SMTP username
			$mail->Password = 'tires0001%';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                   // TCP port to connect to
			$mail->setFrom('correos@naturalcare-ec.com', 'Naturalcare');
			$mail->addAddress($_POST['email'] ,$_POST['nombres']);  
			//$mail->addAddress('ventas@naturalcare-ec.com','Naturalcare');
           // $mail->addAddress('ccruz@estudionovaidea.com','Ventas Naturalcare');
				$mail->addAddress('bryancarvallo19@gmail.com','Naturalcare');

				$mail->SMTPOptions = array(
			        'ssl' => array(
			            'verify_peer' => false,
			            'verify_peer_name' => false,
			            'allow_self_signed' => true
			        )
			    	); 
					
			$mail->isHTML(true);  
			$hoy = date("Y-m-d");

			$mail->Subject = 'Nuevo usuario en Naturalcare';
			$mail->Body    = '<div marginheight="0" marginwidth="0" bgcolor="#FFFFFF" style="font-family: verdana, sans-serif;font-size: 12px;font-style: italic;text-align: justify;">

			<div style="width:700px; height:1300px; margin: 0 auto; background-color: #FFF;">
			<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body email_start tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;padding-top: 32px;background-color: #d8dde4;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
	<!-- jumbotron_light_icon_success -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
	 <tbody>
		 <tr>
			 <td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #d8dde4;font-size: 0 !important;">
				 <!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
				 <div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
					 <table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
						 <tbody>
							 <tr>
								 <td class="content_cell light_b brt" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #f2f2f5;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;border-radius: 4px 4px 0 0;line-height: inherit;min-width: 0 !important;">
									 <!-- col-6 -->
									 <div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
									 <!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto 0 0;"><tbody><tr><td width="600" style="width:600px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
										 <div class="col_6" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 600px;line-height: inherit;min-width: 0 !important;">
                                             
                                             <table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
												 <tbody>
													 <tr>
														 <td class="column_cell px pte tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 32px;padding-bottom: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;">
               
															 <img class="braf" src="'.$fdatos["imagenes"].'icon_default_favorite.gif" width="295%" height="117" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;border-radius: 200px;max-width: 80px;margin-left: auto;margin-right: auto;width: 100% !important;height: auto !important;">
                
                
															 <h2 class="mb_xxs" style="color: #000;margin-left: 0;margin-right: 0;margin-top: 20px;margin-bottom: 4px;padding: 0;font-weight: bold;font-size: 20px;line-height: 42px;">Es un gusto que seas parte de nosotros!</h2>
                                                             <p class="lead" style="font-family: Helvetica, Arial, sans-serif;font-size: 19px;line-height: 27px;color: #000;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;">haz creado con éxito tu nueva cuenta en</p>
														 </td>
													 </tr>
												 </tbody>
                                                 
											 </table>
                                             
                                             
											 
										 </div>
									 <!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
									 </div>
								 </td>
							 </tr>
						 </tbody>
					 </table>
				 </div>
				 <!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
			 </td>
		 </tr>
	 </tbody>
	</table>
	<!-- spacer -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #d8dde4;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<table class="hr_rl" align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;font-size: 0;line-height: 1px;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;background-color: transparent !important;">
											<tbody>
												<tr>
													<td class="hr_ep pt" style="box-sizing: border-box;vertical-align: top;font-size: 0;line-height: inherit;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;padding-top: 16px;background-color: transparent !important;">&nbsp; </td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
 
 <table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #d8dde4;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell pl_0 pr_0" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 0;padding-right: 0;line-height: inherit;min-width: 0 !important;">
										<p class="mb_0 imgr imgr632" style="font-family: Helvetica, Arial, sans-serif;font-size: 0;line-height: 100%;color: #888888;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 0;clear: both;"><img src="'.$fdatos["imagenes"].'banner.jpg" width="632" height="" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 632px;margin-left: auto;margin-right: auto;width: 100% !important;height: auto !important;"></p>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
 
	<!-- content_center -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #d8dde4;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<!-- col-6 -->
										<div class="email_row tl" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: left;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto 0 0;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_6" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 600px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 16px;padding-bottom: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #000;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;">
																<p style="font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #000;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;">Puedes ya empezar a realizar tus compras online en nuestro sitio web
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
	<!-- button_accent -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #d8dde4;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell tc" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
											<tbody>
												<tr>
													<td class="column_cell px pt_0 pb_xs tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 0;padding-bottom: 8px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #888888;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;">
														<table class="ebtn" align="center" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;display: table;margin-left: auto;margin-right: auto;">
															<tbody>
																<tr>
																	<td class="active_b" style="box-sizing: border-box;vertical-align: top;background-color: #47a30c;line-height: 20px;font-family: Helvetica, Arial, sans-serif;mso-line-height-rule: exactly;border-radius: 4px;text-align: center;font-weight: bold;font-size: 17px;padding: 13px 22px;"><a href="https://www.naturalcare-ec.com/" target="_blank" style="text-decoration: none;line-height: inherit;color: #ffffff;"><span style="text-decoration: none;line-height: inherit;color: #ffffff;">Ir a tu cuenta</span></a></td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
	<!-- spacer-lg -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #d8dde4;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<table class="hr_rl" align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;font-size: 0;line-height: 1px;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;background-color: transparent !important;">
											<tbody>
												<tr>
													<td class="hr_ep pte" style="box-sizing: border-box;vertical-align: top;font-size: 0;line-height: inherit;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;padding-top: 32px;background-color: transparent !important;">&nbsp; </td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
	<!-- image_full_width -->
	
	<!-- content_center -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #d8dde4;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
	<!-- footer -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body email_end tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;padding-bottom: 32px;background-color: #d8dde4;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell footer_c bt brb pt pb" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;border-radius: 0 0 4px 4px;padding-top: 16px;padding-bottom: 16px;border-top: 1px solid #d8dde4;line-height: inherit;min-width: 0 !important;">
										<!-- col-2-4 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto;"><tbody><tr><td width="400" style="width:400px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_4" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 400px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px pt_xs pb_0 tl" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 8px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #a9b3ba;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
																<p class="mb_xxs" style="font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #a9b3ba;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 4px;">
																	©2020 naturalcare ec<br>
																	
																</p>
																
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										<!--[if (mso)|(IE)]></td><td width="200" style="width:200px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_2" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 200px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px pt_xs pb_0 ord_cell tr" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 8px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #a9b3ba;mso-line-height-rule: exactly;text-align: right;padding-left: 16px;padding-right: 16px;">
																<p class="fsocial mb_0" style="font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 100%;color: #a9b3ba;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 0;">
																
																<a href="https://www.facebook.com/Naturalcare.ec/" target="_blank" style="text-decoration: underline;line-height: inherit;color: #a9b3ba;"><img src="'.$fdatos["imagenes"].'social-facebook.png" width="24" height="24" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 24px;height: auto !important;"></a> &nbsp;&nbsp;
																
															
																
																<a href="https://www.instagram.com/naturalcare_ec/" target="_blank" style="text-decoration: underline;line-height: inherit;color: #a9b3ba;"><img src="'.$fdatos["imagenes"].'social-instagram.png" width="24" height="24" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 24px;height: auto !important;"></a>
																
																</p>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
									</div></td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
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

			} else {

				$fecha_actual = date("d/m/Y");
				$date_now = date('d-m-Y');
				$date_future = strtotime('+7 day', strtotime($date_now));
				$date_future = date('d-m-Y', $date_future);
				$fecha_nueva = date("d/m/Y", strtotime($date_future)); 
				$codigo= generarCodigo(6);
				$rango = $fecha_actual." - ".$fecha_nueva;

				$sreg = "SELECT *FROM registro";
				$rreg = mysql_query($sreg);
				$freg = mysql_fetch_array($rreg);

/*				$sqlcupon = "INSERT INTO cupones VALUES ('','1','".$freg['valor']."','".$rango."','Bienvenido a NatulCare','0','".$codigo."','1','".$fsecuencia['valor']."',now(),'',0)";
			  	mysql_query($sqlcupon);
*/
			  	
			

			  	$sqlcupon = "INSERT INTO puntos VALUES ('',1,".$fptos['puntos'].",".$_SESSION['idusuario'].",null,1,now())";
			  	mysql_query($sqlcupon);


			require_once('../PHPMailer-master/PHPMailerAutoload.php');
			require_once('../PHPMailer-master/class.phpmailer.php');
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
			$mail->addAddress($_POST['email'] ,$_POST['nombres']);  
			//$mail->addAddress('ventas@naturalcare-ec.com','Naturalcare');
			$mail->addAddress('bryancarvallo19@gmail.com','Naturalcare');

				$mail->SMTPOptions = array(
			        'ssl' => array(
			            'verify_peer' => false,
			            'verify_peer_name' => false,
			            'allow_self_signed' => true
			        )
			    	); 
					
			$mail->isHTML(true);  
			$hoy = date("Y-m-d");

			$mail->Subject = 'Puntos de agradecimiento en Naturalcare';
			$mail->Body    = '<div marginheight="0" marginwidth="0" bgcolor="#FFFFFF" style="font-family: verdana, sans-serif;font-size: 12px;font-style: italic;text-align: justify;">

			<div style="width:700px; height:1300px; margin: 0 auto; background-color: #FFF;">
				<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body email_start tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;padding-top: 32px;background-color: #dbe5ea;font-size: 0 !important;">
					
				</td>
			</tr>
		</tbody>
	</table>
    
    
    
    
    <table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #dbe5ea;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell pl_0 pr_0" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 0;padding-right: 0;line-height: inherit;min-width: 0 !important;">
										<p class="mb_0 imgr imgr632" style="font-family: Helvetica, Arial, sans-serif;font-size: 0;line-height: 100%;color: #888888;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 0;clear: both;"><img src="'.$fdatos["imagenes"].'bienvenida.jpg" width="632" height="" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 632px;margin-left: auto;margin-right: auto;width: 100% !important;height: auto !important;"></p>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
    
    
    
    
    
	<!-- jumbotron_icon_success -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #dbe5ea;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<!-- col-6 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto 0 0;"><tbody><tr><td width="600" style="width:600px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_6" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 600px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px pte tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 32px;padding-bottom: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;">
																<table class="ic_h" align="center" width="64" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;display: table;margin-left: auto;margin-right: auto;width: 64px;">
																	<tbody>
																		<tr>
																			<td class="success_b" style="box-sizing: border-box;vertical-align: middle;background-color: #32d373;line-height: 100%;font-family: Helvetica, Arial, sans-serif;text-align: center;mso-line-height-rule: exactly;padding: 16px;border-radius: 80px;">
																				<p class="imgr mb_0" style="font-family: Helvetica, Arial, sans-serif;font-size: 0;line-height: 100%;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 0;clear: both;"><img src="'.$fdatos["imagenes"].'android-checkmark.png" width="32" height="32" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 32px;width: 100% !important;height: auto !important;display: block;margin-left: auto;margin-right: auto;"></p>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<h1 class="mb_xxs" style="color: #3e484d;margin-left: 0;margin-right: 0;margin-top: 20px;margin-bottom: 4px;padding: 0;font-weight: bold;font-size: 22px;line-height: 42px;">Ganaste tus primeros puntos acumulables!!</h1>
																<p class="lead" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px;margin-bottom: 8px;color: #424651;font-size: 17px;line-height: 23px;">Esto es en agradecimiento por haber creado tu cuenta en nuestra tienda en línea. </p>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
	<!-- label -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #dbe5ea;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<!-- col_2 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
											<!--[if (mso)|(IE)]><table width="200" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:200px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
												<div class="col_2 col_center" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;max-width: 200px;margin-left: auto;margin-right: auto;line-height: inherit;min-width: 0 !important;">
													<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
														<tbody>
															<tr>
																<td class="column_cell px tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 16px;padding-bottom: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;">
																	<h5 class="tm" style="color: #000;margin-left: 0;margin-right: 0;margin-top: 20px;margin-bottom: 8px;padding: 0;font-weight: bold;font-size: 16px;line-height: 21px;">Se te acreditaron:</h5>
																	<table class="ncard" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
																		<tbody>
																			<tr>
																				<td class="ncard_c light_b tc px py" style="box-sizing: border-box;vertical-align: top;color: #616161;overflow: hidden;border-radius: 4px;background-color: #f1f6f9;text-align: center;padding-top: 16px;padding-bottom: 16px;padding-left: 16px;padding-right: 16px;line-height: inherit;font-family: Helvetica, Arial, sans-serif;">
																					<h3 class="mt_0 mb_0" style="color: #3e484d;margin-left: 0;margin-right: 0;margin-top: 0;margin-bottom: 0;padding: 0;font-weight: bold;font-size: 23px;line-height: 30px;">'.$fptos['puntos'].' Puntos</h3>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
	<!-- button_success -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #dbe5ea;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell tc" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
											<tbody>
												<tr>
													<td class="column_cell px pt_0 pb_xs tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 0;padding-bottom: 8px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;">
														<table class="ebtn" align="center" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;display: table;margin-left: auto;margin-right: auto;">
															<tbody>
																<tr>
																	<td class="success_b" style="box-sizing: border-box;vertical-align: top;background-color: #47a30c;line-height: 20px;font-family: Helvetica, Arial, sans-serif;mso-line-height-rule: exactly;border-radius: 4px;text-align: center;font-weight: bold;font-size: 17px;padding: 13px 22px;"><a href="https://www.naturalcare-ec.com/" style="text-decoration: none;line-height: inherit;color: #ffffff;"><span style="text-decoration: none;line-height: inherit;color: #ffffff;">Ir a la tienda online</span></a></td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
	<!-- spacer-lg -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #dbe5ea;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<table class="hr_rl" align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;font-size: 0;line-height: 1px;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;background-color: transparent !important;">
											<tbody>
												<tr>
													<td class="hr_ep pte" style="box-sizing: border-box;vertical-align: top;font-size: 0;line-height: inherit;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;padding-top: 32px;background-color: transparent !important;">&nbsp; </td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
	<!-- alert_info -->
<!-- footer_blank_center -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body email_end tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;padding-bottom: 32px;background-color: #dbe5ea;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell brb pt_xs" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;border-radius: 0 0 4px 4px;padding-top: 8px;line-height: inherit;min-width: 0 !important;">&nbsp; </td>
								</tr>
								<tr>
									<td class="blank_cell footer_c pt pb" style="box-sizing: border-box;vertical-align: top;padding-top: 16px;padding-bottom: 16px;line-height: inherit;">
										<!-- col-6 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
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

			
	}
		
	
}else
{
	echo "00::00";
}



?>