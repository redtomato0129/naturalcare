
<?php

include('../config/app_config.php');

if(is_numeric($_POST['pedido']) && $_POST['pedido'] > 0)
{
	$sql = "UPDATE pedidos SET estado='".$_POST['estado']."'";
	if($_POST['guia'] != "")
	{
		$sql .= ",guia='".$_POST['guia']."'";
	}
	if($_POST['motivo'] != "")
	{
		$sql .= ",motivo_cancelar='".$_POST['motivo']."'";
	}

	echo $sql.=" WHERE id=".$_POST['pedido'];
	mysql_query($sql);


	if($_POST['estado']==3)
	{


		$sq = "Select *from pedidos where id=".$_POST['pedido'];
		$r= mysql_query($sq);
		$result = mysql_fetch_array($r);
		var_dump($result);
		$sumapuntos=$result['puntos_ganados'];


		echo $sql = "UPDATE natuser SET points=points+".$sumapuntos." where id=".$result['usuario'];
		mysql_query($sql);

		echo $sql2 = "UPDATE points_history SET process_points=1 where process_points=0 and user_id=".$result['usuario'];
		mysql_query($sql2);

		if($result['invitado']!='1'){
			require_once('../PHPMailer-master/PHPMailerAutoload.php');
				require_once('../PHPMailer-master/class.phpmailer.php');
				date_default_timezone_set('Etc/UTC');
				$mail = new PHPMailer();
			//	$mail->isSMTP(); 
			//	$mail->SMTPDebug = 3;                                       // Set mailer to use SMTP
				$mail->Host = 'mail.naturalcare-ec.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'correos@naturalcare-ec.com';                 // SMTP username
				$mail->Password = 'tires0001%';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 26;                                   // TCP port to connect to
				$mail->setFrom('correos@naturalcare-ec.com', 'Naturalcare');
				$mail->addAddress($result['email'] ,$result['nombres']);  
				$mail->addAddress('ventas@naturalcare-ec.com','Admin'); 
				$mail->addAddress('ccruz@estudionovaidea.com','Ventas Naturalcare');
				$mail->addAddress('bryancarvallo19@gmail.com','Ventas Naturalcare');
				
						
				$mail->isHTML(true);  
				$hoy = date("Y-m-d");

				$mail->Subject = 'Ganaste Puntos';
				$mail->Body    = '<div marginheight="0" marginwidth="0" bgcolor="#FFFFFF" style="font-family: verdana, sans-serif;font-size: 12px;font-style: italic;text-align: justify;">
				<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body email_start tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;padding-top: 32px;background-color: #f8f8f8;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell header_c bb brt pt pb" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;border-radius: 4px 4px 0 0;padding-top: 16px;padding-bottom: 16px;border-bottom: 1px solid #d7dbe0;line-height: inherit;min-width: 0 !important;">
										<!-- col-6 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_6" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 600px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px pt_xs pb_0 logo_c tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 8px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 100%;color: #616161;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;"><a href="#" style="text-decoration: none;line-height: inherit;color: #37c2ef;"><img src="https://naturalcare-ec.com/images/logo-naturalcare3.png" width="130" height="30" alt="naturalcare" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 168px;height: auto !important;"></a></td>
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

	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #f8f8f8;font-size: 0 !important;">
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
																			<td class="active_b" style="box-sizing: border-box;vertical-align: middle;background-color: #37c2ef;line-height: 100%;font-family: Helvetica, Arial, sans-serif;text-align: center;mso-line-height-rule: exactly;padding: 16px;border-radius: 80px;">
																				<p class="imgr mb_0" style="font-family: Helvetica, Arial, sans-serif;font-size: 0;line-height: 100%;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 0;clear: both;"><img src="https://naturalcare-ec.com/formatos_mail/images/star-48-white.png" width="82" height="82" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 82px;width: 100% !important;height: auto !important;display: block;margin-left: auto;margin-right: auto;"></p>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<h1 class="mb_xxs" style="color: #3e484d;margin-left: 0;margin-right: 0;margin-top: 10px;margin-bottom: 4px;padding: 0;font-weight: bold;font-size: 32px;line-height: 42px;">Has ganado una recompensa</h1>
																<h4 class="mb_xxs mte" style="color: #000;margin-left: 0;margin-right: 0;margin-top: 12px;margin-bottom: 4px;padding: 0;font-size: 13px;line-height: 25px;">Fecha de acreditación: '.$hoy.'</h4></td>
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
	
 
	

	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #f8f8f8;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<table class="hr_rl" align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;font-size: 0;line-height: 1px;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;background-color: transparent !important;">
											
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
	<!-- message_online -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #f8f8f8;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<!-- col-6 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_6" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 600px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px pt_xs pb_xs" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 8px;padding-bottom: 8px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #888888;mso-line-height-rule: exactly;padding-left: 16px;padding-right: 16px;">
																<table class="ncard" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
																	<tbody>
																		<tr>
																			<td class="ncard_c px py tl" style="box-sizing: border-box;vertical-align: top;color: #888888;overflow: hidden;border-radius: 4px;text-align: left;padding-top: 16px;padding-bottom: 1px;padding-left: 16px;padding-right: 16px;line-height: inherit;font-family: Helvetica, Arial, sans-serif;">
																				
																				<table class="hr_rl" align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;font-size: 0;line-height: 1px;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;background-color: transparent !important;">
														              <tbody>
														                <tr>
														                  <td class="hr_ep pb bt" style="box-sizing: border-box;vertical-align: top;font-size: 0;line-height: inherit;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;padding-bottom: 16px;border-top: 1px solid #d8dde4;font-family: Helvetica, Arial, sans-serif;background-color: transparent !important;">&nbsp; </td>
														                </tr>
														              </tbody>
														            </table>
																				<p style="font-family: Arial, sans-serif;font-size: 15px;line-height: 23px;color: #514d6a;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;">Hola, '.$result['nombres'].'</p>
																				<p style="font-family: Arial, sans-serif;font-size: 15px;line-height: 23px;color: #514d6a;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;">Muchas gracias por su confianza y preferencia hacia Natural Care Ec, nos complace informarle que, como resultado de su actividad reciente, ha acumulado una recompensa. Su saldo actual de puntos de recompensa es:</p>
																				
																				
																			</td>
																		</tr>
																		
																		<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #fff;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<!-- col_3 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
											<!--[if (mso)|(IE)]><table width="300" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:300px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
												<div class="col_3 col_center" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;max-width: 300px;margin-left: auto;margin-right: auto;line-height: inherit;min-width: 0 !important;">
													<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
														<tbody>
															<tr>
																<td class="column_cell px tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 16px;padding-bottom: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #888888;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;">
															
																	<table class="ncard" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
																		<tbody>
																			<tr>
																				<td class="ncard_c light_b tc px py" style="box-sizing: border-box;vertical-align: top;color: #3CCC00;overflow: hidden;border-radius: 4px;background-color: #CCFFD2; border-color: 3CCC00; text-align: center;padding-top: 16px;padding-bottom: 16px;padding-left: 16px;padding-right: 16px;line-height: inherit;font-family: Helvetica, Arial, sans-serif;">
																					<h3 class="mt_0 mb_0" style="color: #00770E;margin-left: 0;margin-right: 0;margin-top: 0;margin-bottom: 0;padding: 0;font-weight: bold;font-size: 23px;line-height: 30px;">+ '.$sumapuntos.' PUNTOS</h3>
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
						
						
						
						
						
						
								<tbody>
																		<tr>
																			<td class="ncard_c px py tl" style="box-sizing: border-box;vertical-align: top;color: #888888;overflow: hidden;border-radius: 4px;text-align: left;padding-top: 16px;padding-bottom: 1px;padding-left: 16px;padding-right: 16px;line-height: inherit;font-family: Helvetica, Arial, sans-serif;">
																				
																				<table class="hr_rl" align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;font-size: 0;line-height: 1px;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;background-color: transparent !important;">
														              <tbody>
														                <tr>
														                  <td class="hr_ep pb bt" style="box-sizing: border-box;vertical-align: top;font-size: 0;line-height: inherit;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;padding-bottom: 16px;border-top: 1px solid #d8dde4;font-family: Helvetica, Arial, sans-serif;background-color: transparent !important;">&nbsp; </td>
														                </tr>
														              </tbody>
														            </table>
																				
																				<p style="font-family: Arial, sans-serif;font-size: 15px;line-height: 23px;color: #514d6a;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;">Este es un mensaje para confirmar la actividad de acumulación de puntos en su cuenta de Natural Care Ec. Puede verificar la actividad específica y cualquier cambio accediendo a su cuenta en línea, en la sección mi cuenta.</p>
																				
																				
																			</td>
																		</tr>
																		
																		<tr>
													<td class="column_cell px pt_0 pb_xs tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 0;padding-bottom: 8px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #888888;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;">
														<table class="ebtn" align="center" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;display: table;margin-left: auto;margin-right: auto;">
															<tbody>
																<tr>
																	<td class="success_b" style="box-sizing: border-box;vertical-align: top;background-color: #3fdb98;line-height: 20px;font-family: Helvetica, Arial, sans-serif;mso-line-height-rule: exactly;border-radius: 4px;text-align: center;font-weight: bold;font-size: 17px;padding: 13px 22px;"><a href="https://www.naturalcare-ec.com/paginas/login.php" style="text-decoration: none;line-height: inherit;color: #ffffff;"><span style="text-decoration: none;line-height: inherit;color: #ffffff;">Ir a mi cuenta</span></a></td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
												
																		
																		
																	
																		
																		<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #fff;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<!-- col_3 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
											<!--[if (mso)|(IE)]><table width="300" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:300px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
												
											
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
																		
																	</tbody>
																	
																	
																		<tbody>
																		<tr>
																			<td class="ncard_c px py tl" style="box-sizing: border-box;vertical-align: top;color: #888888;overflow: hidden;border-radius: 4px;text-align: left;padding-top: 16px;padding-bottom: 1px;padding-left: 16px;padding-right: 16px;line-height: inherit;font-family: Helvetica, Arial, sans-serif;">
																				
																				<table class="hr_rl" align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;font-size: 0;line-height: 1px;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;background-color: transparent !important;">
														              <tbody>
														                <tr>
														                  <td class="hr_ep pb bt" style="box-sizing: border-box;vertical-align: top;font-size: 0;line-height: inherit;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;padding-bottom: 16px;border-top: 1px solid #d8dde4;font-family: Helvetica, Arial, sans-serif;background-color: transparent !important;">&nbsp; </td>
														                </tr>
														              </tbody>
														            </table>
																				
																				<p style="font-family: Arial, sans-serif;font-size: 15px;line-height: 23px;color: #514d6a;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px; text-align: center; font-style: italic">¡Tiene recompensas esperando!<br>
																				¡Canjéelos por grandes descuentos o productos GRATIS!<br>
																				Inicie sesión en su cuenta y compruebe los artículos que puede canjear.</p>
																				
																				
																			</td>
																		</tr>
																		
																	
																	</tbody>
							
																
					</div>
					<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
				</td>
			</tr>
		</tbody>
	</table>
																		
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
		<!-- spacer-lg -->

	<!-- footer_blank_center -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body email_end tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;padding-bottom: 32px;background-color: #f8f8f8;font-size: 0 !important;">
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
											<div class="col_6" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 600px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
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
	</div>
					';
					if(!$mail->send()) {
				  	 echo "0";
			    	}


}



	}

	if($_POST['guia'] != ""  && $_POST['estado']==2)
	{




$rutac = "https://naturalcare-ec.com/administrador/imagenes";

$scarritoc = "SELECT a.*,b.foto_uno ,b.nombre,b.codigo,b.foto_uno FROM pedido_detalle as a
		      LEFT JOIN productos as b ON (a.producto = b.id)
		      where a.pedido='".$_POST['pedido']."'";
$rcarritoc = mysql_query($scarritoc);

$spedid = "SELECT *from pedidos where id='".$_POST['pedido']."'";
$rpedid = mysql_query($spedid);
$fpedid = mysql_fetch_array($rpedid);
$subtotal=$fpedid['subtotal'];
$envio=$fpedid['envio'];
$iva=$fpedid['iva'];
$descuento=$fpedid['descuento'];
  


$descuento1 = 0;

if($fpedid['pago'] == 'Depósito/transferencia')
{
	

	$pago = '<img style="width:90%;" src="https://naturalcare-ec.com/formatos_mail/images/cuentas-banco.jpg" />
			<br>
         <p class="column_cell px tl" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px; background-color: #d8efef;">
         
         Al realizar tu pago por depósito bancario o transferencia electrónica, envíanos la foto de tu comprobante de pago al correo ventas@naturalcare-ec.com o vía WhatsApp 0995566900 con el Número de Orden, si no nos envías el comprobante de pago, no podremos procesar el envío de tu pedido. Tu orden será cancelada si no confirmas el pago en las próximas 24 horas.

         </p>';
}else
{
	$pago = '';
}








$detallepedido="";
while($fpedido = mysql_fetch_array($rcarritoc))
{
	
	$detallepedido .= '	<!-- sección de producto -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #dbe5ea;font-size: 0 !important;">
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell pb" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;padding-bottom: 16px;line-height: inherit;min-width: 0 !important;">
										<table class="hr_rl" align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;font-size: 0;line-height: 1px;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;background-color: transparent !important;">
											<!-- linea divisora -->
                                            <tbody>
												<tr>
													<td class="hr_ep pb bt" style="box-sizing: border-box;vertical-align: top;font-size: 0;line-height: inherit;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;padding-bottom: 16px;border-top: 1px solid #d7dbe0;background-color: transparent !important;">&nbsp; </td>
												</tr>
											</tbody>
                                            <!-- fin linea divisora -->
										</table>
										<!-- col-6 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										
                                            <!-- foto producto -->
                                            <div class="col_1" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 100px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px pt_0 pb_0 tl" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 0;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
																<p class="imgr imgr68 mb_0" style="font-family: Helvetica, Arial, sans-serif;font-size: 0;line-height: 100%;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 0;clear: both;">
																	<a href="#" style="text-decoration: none;line-height: 1;color: #37c2ef;"><img src="'.$rutac.'/productos/'.$fpedido["foto_uno"].'" width="270" height="345" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 68px;margin-left: auto;margin-right: auto;width: 100% !important;height: auto !important;"></a>
																</p>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
                                            <!-- fin foto producto -->
									        
                                            <!-- detalle producto -->
											<div class="col_4" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 400px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px pt_0 pb_0 tl" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 0;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
																<h5 class="mt_xs mb_xxs" style="color: #3e484d;margin-left: 0;margin-right: 0;margin-top: 8px;margin-bottom: 4px;padding: 0;font-weight: bold;font-size: 16px;line-height: 21px;">	'.$fpedido["nombre"].' <span class="tm" style="color: #a7b1b6;line-height: inherit;">× '.$fpedido["cantidad"].' </span></h5>
																<p class="small tm mb_0" style="font-family: Helvetica, Arial, sans-serif;font-size: 13px;line-height: 20px;color: #000;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 0;">Código: '.$fpedido["codigo"].' &#8226; <span>Precio Unit: $'.number_format($fpedido["precio"],2).'</span></p>';
 if($fpedido['presentacion'] != "")
{               
 $detallepedido .= '               <p class="small tm mb_0" style="font-family: Helvetica, Arial, sans-serif;font-size: 13px;line-height: 20px;color: #000;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 0;">presentación: '.$fpedido["presentacion"].'</p>';

}
 $detallepedido .= '               <!-- Agregado para color -->
                <p class="small tm mb_0" style="font-family: Helvetica, Arial, sans-serif;font-size: 13px;line-height: 20px;color: #000;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 0;">
                Color: <span style=" margin-left: 5px;  padding-left: 1x; padding-right: 15px; border-radius: 50%; background-color: '.$fpedido["color"].' "> </span> &nbsp;  
                </p>
                <!-- fin Agregado para color -->
                </td>
														</tr>
													</tbody>
												</table>
											</div>
                                            <!-- fin detalle producto -->
										
                                            <!-- precio -->
											<div class="col_1" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 100px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px pt_0 tr ord_cell" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 0;padding-bottom: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: right;padding-left: 16px;padding-right: 16px;">
																<p class="mb_0 mt_xs" style="font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 8px;margin-bottom: 0;">$'.number_format(($fpedido["precio"]*$fpedido["cantidad"]),2).'</p>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
                                            <!-- fin precio -->
                                        </div>
                                       </td>
								</tr>
							</tbody>
						</table>
                        </div>
				</td>
			</tr>
		</tbody>
	</table>
    <!-- fin sección de producto -->';

}

require_once('../PHPMailer-master/PHPMailerAutoload.php');
			require_once('../PHPMailer-master/class.phpmailer.php');
			date_default_timezone_set('Etc/UTC');
			$mail = new PHPMailer();
		//	$mail->isSMTP(); 
		//	$mail->SMTPDebug = 3;                                       // Set mailer to use SMTP
			$mail->Host = 'mail.naturalcare-ec.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'correos@naturalcare-ec.com';                 // SMTP username
			$mail->Password = 'tires0001%';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 26;                                   // TCP port to connect to
			$mail->setFrom('correos@naturalcare-ec.com', 'Naturalcare');
			$mail->addAddress($fpedid['email'] ,$fpedid['nombres']);  
			//$mail->addAddress('ventas@naturalcare-ec.com','Admin'); 
			$mail->addAddress('bryancarvallo19@gmail.com','Ventas Naturalcare');
			if($fpedid['pago'] == 'Payphone')
			{
				
				$url = 'Natulcare.jpg';
				$mail->AddAttachment($url,$url);
			}
					
			$mail->isHTML(true);  
			$hoy = date("Y-m-d");

			$mail->Subject = 'Pedido Actualizado';
			$mail->Body    = '<div marginheight="0" marginwidth="0" bgcolor="#FFFFFF" style="font-family: verdana, sans-serif;font-size: 12px;font-style: italic;text-align: justify;">

			<div style="width:700px; height:2200px; margin: 0 auto; background-color: #FFF;">
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body email_start tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;padding-top: 32px;background-color: #dbe5ea;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell header_c bb brt pt pb" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;border-radius: 4px 4px 0 0;padding-top: 16px;padding-bottom: 16px;border-bottom: 1px solid #d7dbe0;line-height: inherit;min-width: 0 !important;">
										<!-- col-6 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_6" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 600px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px pt_xs pb_0 logo_c tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 8px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 100%;color: #616161;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;"><a href="#" style="text-decoration: none;line-height: inherit;color: #37c2ef;"><img src="https://naturalcare-ec.com/formatos_mail/images/logo-naturalcare3.png" width="130" height="30" alt="naturalcare" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 168px;height: auto !important;"></a></td>
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

 
 
	<!-- jumbotron_icon_info -->
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
																			<td class="active_b" style="box-sizing: border-box;vertical-align: middle;background-color: #37c2ef;line-height: 100%;font-family: Helvetica, Arial, sans-serif;text-align: center;mso-line-height-rule: exactly;padding: 3px;border-radius: 80px;">
																				<p class="imgr mb_0" style="font-family: Helvetica, Arial, sans-serif;font-size: 30px;line-height: 100%;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 0;clear: both;"><img src="https://naturalcare-ec.com/formatos_mail/images/envio.png" width="100" height="100" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 100px;width: 100% !important;height: auto !important;display: block;margin-left: auto;margin-right: auto;"></p>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<h1 class="mb_xxs" style="color: #3e484d;margin-left: 0;margin-right: 0;margin-top: 10px;margin-bottom: 4px;padding: 0;font-weight: bold;font-size: 32px;line-height: 42px;">Su orden está en camino</h1>
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
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #dbe5ea;font-size: 0 !important;">
					
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell tc" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;line-height: inherit;min-width: 0 !important;">
										<!-- col-3x2 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto;"><tbody><tr><td width="300" style="width:300px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_3" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 300px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 16px;padding-bottom: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;">
																<table class="ncard" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
																	<tbody>
																		<tr>
																			<td class="ncard_c px light_b tl" style="box-sizing: border-box;vertical-align: top;color: #616161;overflow: hidden;border-radius: 4px;background-color: #f1f6f9;text-align: left;padding-left: 16px;padding-right: 16px;line-height: inherit;font-family: Helvetica, Arial, sans-serif;">
																				<h6 style="color: #3e484d;margin-left: 0;margin-right: 0;margin-top: 20px;margin-bottom: 8px;padding: 0;font-weight: bold;font-size: 13px;line-height: 20px;">Tus datos</h6>
																				<p class="small" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;">
																					'.$fpedid["nombres"].' '.$fpedid["apellidos"].'<br>
																					Email: '.$fpedid["email"].'<<br>
																					Telf Celular: '.$fpedid["celular"].'<br>
																					Telf fijo: 
																				</p>
																				
																			</td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										<!--[if (mso)|(IE)]></td><td width="300" style="width:300px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_3" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 300px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 16px;padding-bottom: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;">
																<table class="ncard" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
																	<tbody>
																		<tr>
																			<td class="ncard_c px light_b tl" style="box-sizing: border-box;vertical-align: top;color: #616161;overflow: hidden;border-radius: 4px;background-color: #f1f6f9;text-align: left;padding-left: 16px;padding-right: 16px;line-height: inherit;font-family: Helvetica, Arial, sans-serif;">
																				<h6 style="color: #3e484d;margin-left: 0;margin-right: 0;margin-top: 20px;margin-bottom: 8px;padding: 0;font-weight: bold;font-size: 13px;line-height: 20px;">Orden #'.$fpedid["id"].'</h6>
																				<p class="small" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 1px;">
																					<strong> ID de Transacción:</strong> '.$fpedid["autorizaciontran"].'<br>
																					</p>
                     
                     <p class="small" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;">
																					<strong>Autorización Transacción:</strong> '.$fpedid["autorizaciontran"].'<br>
																					</p>
																				
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
	<!-- order_header -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #dbe5ea;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell pb" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;padding-bottom: 16px;line-height: inherit;min-width: 0 !important;">
										<!-- col-6 -->
										<div class="email_row tl" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: left;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto 0 0;"><tbody><tr><td width="600" style="width:600px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_6" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 600px;line-height: inherit;min-width: 0 !important;">
												
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
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_6" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 600px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px pt_xs pb_xs" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 8px;padding-bottom: 8px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #888888;mso-line-height-rule: exactly;padding-left: 16px;padding-right: 16px;">
																<table class="ncard" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
																	<tbody>
																		<tr>
																			<td class="ncard_c px py tl" style="box-sizing: border-box;vertical-align: top;color: #888888;overflow: hidden;border-radius: 4px;text-align: left;padding-top: 16px;padding-bottom: 1px;padding-left: 16px;padding-right: 16px;line-height: inherit;font-family: Helvetica, Arial, sans-serif;">
																				
																				<table class="hr_rl" align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;font-size: 0;line-height: 1px;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;background-color: transparent !important;">
														              <tbody>
														                <tr>
														                  <td class="hr_ep pb bt" style="box-sizing: border-box;vertical-align: top;font-size: 0;line-height: inherit;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;padding-bottom: 16px;border-top: 1px solid #d8dde4;font-family: Helvetica, Arial, sans-serif;background-color: transparent !important;">&nbsp; </td>
														                </tr>
														              </tbody>
														            </table>
																				
																				<p style="font-family: Arial, sans-serif;font-size: 15px;line-height: 23px;color: #514d6a;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;">Nos complace informarle que hemos terminado de procesar su pedido, por lo que su orden ha sido
despachada al Courier SERVIENTREGA.<br><br>
                                                                            Su código de tracking es: '.$_POST["guia"].'<br><br>
                                                                           Puede seguir el estado de su envío haciendo clic en el siguiente enlace   <a href="https://bit.ly/RASTREATUGUIA"> https://bit.ly/RASTREATUGUIA</a> 
(debe digitar su número de guía en el campo correspondiente). <br><br>La página le mostrará el trayecto de su
paquete (por favor tenga en cuenta que los datos de seguimiento pueden tardar hasta 8 horas en
aparecer) o puede comunicarse de 08:00 a 17:00 al Call Center del Courier 3732000 opción 3 y luego escoja
opción 2. Si llama desde un celular, debe anteponer el código de área de su provincia.<br><br>
                                                                           A continuación los detalles de su orden:
                                                                            </p>
																				
																				
																			</td>
																		</tr>
																		
																		<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
	                                                              
                                                                    </table>
																		
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
		<!-- spacer-lg -->

    
   '.$detallepedido.'
    
	<!-- order_total_alt -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #dbe5ea;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					<div class="email_container" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 632px;margin: 0 auto;text-align: center;line-height: inherit;min-width: 0 !important;">
						<table class="content_section" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
							<tbody>
								<tr>
									<td class="content_cell pb" style="box-sizing: border-box;vertical-align: top;width: 100%;background-color: #ffffff;font-size: 0;text-align: center;padding-left: 16px;padding-right: 16px;padding-bottom: 16px;line-height: inherit;min-width: 0 !important;">
										<!-- col-6 -->
										<div class="email_row tr" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: right;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto;"><tbody><tr><td width="300" style="width:300px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;"> </td><td width="300" style="width:300px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_6" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 300px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px tl" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 16px;padding-bottom: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
																<table class="ncard" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
																	<tbody>
																		<tr>
																			<td class="ncard_c px pt light_b" style="box-sizing: border-box;vertical-align: top;color: #616161;overflow: hidden;border-radius: 4px;background-color: #f1f6f9;padding-left: 16px;padding-right: 16px;padding-top: 16px;line-height: inherit;font-family: Helvetica, Arial, sans-serif;">
																			<p class="mb_xxs small" style="font-family: Helvetica, Arial, sans-serif;font-size: 13px;line-height: 20px;color: #131c00;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 4px;"><span class="tm" style="color: #616161;line-height: inherit;">Subtotal sin iva</span> <span style="float:right;">$'.number_format(($subtotal/1.15),2).' USD</span></p>
																				<p class="mb_xxs small" style="font-family: Helvetica, Arial, sans-serif;font-size: 13px;line-height: 20px;color: #131c00;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 4px;"><span class="tm" style="color: #616161;line-height: inherit;">Descuento (-)</span> <span style="float:right;">$'.number_format($descuento,2).' USD</span></p>
																				<p class="mb_xxs small" style="font-family: Helvetica, Arial, sans-serif;font-size: 13px;line-height: 20px;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 4px;"><span class="tm" style="color: #131c00;line-height: inherit;">Envío ('.$fpedid["ciudade"].')</span> <span style="float:right;">$'.number_format(($envio),2).' USD</span></p>
<p class="mb_xxs small" style="font-family: Helvetica, Arial, sans-serif;font-size: 13px;line-height: 20px;color: #131c00;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 4px;"><span class="tm" style="color: #616161;line-height: inherit;">Puntos Canjeados (-)</span> <span style="float:right;">'.number_format($fpedid["punto_canjeados"],0).' PTS</span></p>





																				
																				<p class="mb_xxs small" style="font-family: Helvetica, Arial, sans-serif;font-size: 13px;line-height: 20px;color: #131c00;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 4px;"><span class="tm" style="color: #616161;line-height: inherit;">IVA 15%(+)</span> <span style="float:right;">$'.number_format($iva,2).' USD</span></p>
																				
																				
																				
																				
																				
																				

																			
                                                                               
																				<table class="hr_rl" align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;font-size: 0;line-height: 1px;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;background-color: transparent !important;">
																					<tbody>
																						<tr>
																							<td class="hr_ep pb" style="box-sizing: border-box;vertical-align: top;font-size: 0;line-height: inherit;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;padding-bottom: 16px;font-family: Helvetica, Arial, sans-serif;background-color: transparent !important;">&nbsp; </td>
																						</tr>
																						<tr>
																							<td class="hr_ep pb bt" style="box-sizing: border-box;vertical-align: top;font-size: 0;line-height: inherit;mso-line-height-rule: exactly;min-height: 1px;overflow: hidden;height: 2px;padding-bottom: 16px;border-top: 1px solid #d7dbe0;font-family: Helvetica, Arial, sans-serif;background-color: transparent !important;">&nbsp; </td>
																						</tr>
																					</tbody>
																				</table>
                                                                                <p class="mt_0 mb" style="font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;"><strong>Total</strong> <span class="tp" style="color: #37c2ef;line-height: inherit;"><span style="float:right;">$'.number_format(($subtotal+$iva+$envio-$descuento),2).'USD</span></span></p>
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

							
			<!-- spacer-lg -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;background-color: #f8f8f8;font-size: 0 !important;">
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
												
												<tr>
													<td class="column_cell px pt_0 pb_xs tc" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 0;padding-bottom: 8px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #888888;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px;">
														<table class="ebtn" align="center" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;display: table;margin-left: auto;margin-right: auto;">
															<tbody>
																<tr>
																	<td class="success_b" style="box-sizing: border-box;vertical-align: top;background-color: #3fdb98;line-height: 20px;font-family: Helvetica, Arial, sans-serif;mso-line-height-rule: exactly;border-radius: 4px;text-align: center;font-weight: bold;font-size: 17px;padding: 13px 22px;"><a href="#" style="text-decoration: none;line-height: inherit;color: #ffffff;"><span style="text-decoration: none;line-height: inherit;color: #ffffff;">Ir a mi cuenta</span></a></td>
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
	<!-- footer_blank_center -->
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body email_end tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;padding-bottom: 32px;background-color: #f8f8f8;font-size: 0 !important;">
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
											<div class="col_6" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 600px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
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

			</div>
			</div>';

			$mail->CharSet = 'UTF-8';
			if(!$mail->send()) {
			    
			   echo "0";

			} else {

				
				}

			
















	}
}




?>