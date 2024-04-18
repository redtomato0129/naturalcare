
<?php
session_start();
include('../config/app_config.php');

$_SESSION['nombresfinal'] = $_POST['nombres'];
$_SESSION['apellidosfinal'] = $_POST['apellidos'];
$scarritoc = "SELECT a.*,b.foto_uno ,b.nombre,b.codigo,b.foto_uno FROM carrito as a
		      LEFT JOIN productos as b ON (a.producto = b.id)
		      where carro='".$_SESSION["idcarrito"]."'";
$rcarritoc = mysql_query($scarritoc);
$rutac = "https://naturalcare-ec.com/administrador/imagenes";
  
$envio=0;
$valor ='No Hacemos Envios a esta ciudad';
$sq = "Select *from valores_envio where trim(ciudad) like ('".trim($_POST['ciudad'])."') and estado='1'";
$r= mysql_query($sq);
$result = mysql_fetch_array($r);


if(isset($result['valor']))
{
	 $envio = $result['valor'];
	 $valor = "$ ".number_format($result['valor'],2);
}

$scarrocsum = "SELECT SUM((precio*cantidad)) as subtotal FROM carrito WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritosum = mysql_query($scarrocsum);
$fsuma = mysql_fetch_array($rcarritosum);
$subtotal = $fsuma['subtotal'];

$descuento = 0;
$scupon = "select b.*,a.valor as descuento from carrito_cupon as a
LEFT JOIN cupones as b on (a.cupon=b.codigo) 
where a.carro='".$_SESSION["idcarrito"]."'";
$rcupon = mysql_query($scupon);
$fcupon = mysql_fetch_array($rcupon);

  if($fcupon['id'] > 0)
	{
		if($fcupon['descuento']>0){
          $descuento2 = $fcupon['descuento'];
        }
        else{
		if($fcupon['tipo'] == '1')
		{
			$descuento2 =((($subtotal/1.15)*$fcupon['valor'])/100);

		}else
		{
			$descuento2 = $fcupon['valor'];
		}
	}
	}	

$descuento1 = 0;

if($_POST['pago'] == 'Depósito/transferencia')
{
	$sdesc = "select *from descuentos";
	$rdesc = mysql_query($sdesc);
	$fdesc = mysql_fetch_array($rdesc);


	 if($fdesc['id'] > 0)
	  {
	    
	      $descuento1 =((($subtotal/1.15)*$fdesc['valor'])/100);

	}

	$pago = '<img style="width:90%;" src="https://naturalcare-ec.com/formatos_mail/images/cuentas-banco.jpg" />
			<br>
         <p class="column_cell px tl" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: center;padding-left: 16px;padding-right: 16px; background-color: #d8efef;">
         
         Al realizar tu pago por depósito bancario o transferencia electrónica, envíanos la foto de tu comprobante de pago al correo ventas@naturalcare-ec.com o vía WhatsApp 0990499789 con el Número de Orden, si no nos envías el comprobante de pago, no podremos procesar el envío de tu pedido. Tu orden será cancelada si no confirmas el pago en las próximas 24 horas.

         </p>';
}else
{
	$pago = '';
}



$scarrocsumenvi = "SELECT SUM((b.envio)) as sumenvio FROM carrito as a
LEFT JOIN productos as b ON (a.producto=b.id)
WHERE carro='".$_SESSION["idcarrito"]."'";
$rcarritosumenvi = mysql_query($scarrocsumenvi);
$fsumaenvi = mysql_fetch_array($rcarritosumenvi);

if($fsumaenvi['sumenvio']== 0)
{
    $envio = 0;
}


$senviogratis = "SELECT *FROM envio_gratis";
$renviogratis = mysql_query($senviogratis);
$fenviogratis = mysql_fetch_array($renviogratis);


if($subtotal > $fenviogratis['valor'])
{   
    $envio = 0;
}




$descuento = $descuento1+$descuento2;




$secuencia = "SELECT `AUTO_INCREMENT` as valor
FROM  INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'natujwoc_web'
AND   TABLE_NAME   = 'pedidos' ";
$rsecuencia = mysql_query($secuencia);
$fsecuencia = mysql_fetch_array($rsecuencia);

$ipedido = "INSERT INTO pedidos VALUES (
			".$fsecuencia['valor'].",
			now(),
			'".$_SESSION["idcarrito"]."',
			'".number_format(($subtotal/1.15),2)."',
			'".number_format(((($subtotal/1.15)-$descuento)*0.15),2)."',
			'".number_format(($descuento),2)."',
			'".number_format(($envio),2)."',
			'1',
			'".$_POST['direccion']."',
			'".$_POST['provincia']."',
			'".$_POST['ciudad']."',
			'".$_POST['referencia']."',
			'','".$_POST['ruc']."',
			'".$_POST['pago']."','','','','',
			'".$_POST['nombres']."',
			'".$_POST['apellidos']."',
			'".$_POST['celular']."',
			'".$_POST['telefono']."',
			'".$_POST['razon']."',
			'".$_POST['direccionf']."',
			'".$_POST['email']."',
			'".$_POST['telefonof']."',
			'".$_SESSION['invitado']."',
			'".$_POST['ci']."'
		)";
mysql_query($ipedido);
$detallepedido="";
while($fpedido = mysql_fetch_array($rcarritoc))
{
	$ipedido = "INSERT INTO pedido_detalle VALUE('','".$fsecuencia['valor']."','".$fpedido['producto']."','".$fpedido['color']."','".$fpedido['presentacion']."','".$fpedido['cantidad']."','".$fpedido['precio']."',now())";
	mysql_query($ipedido);
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
			$mail->addAddress($_POST['email'] ,$_POST['nombres']);  
			//$mail->addAddress('ccruz@estudionovaidea.com','Admin'); ventas@naturalcare-ec.com
			$mail->addAddress('ccruz@estudionovaidea.com','Ventas Naturalcare');
			if($_POST['pago'] == 'Payphone')
			{
				
				$url = 'Natulcare.jpg';
				$mail->AddAttachment($url,$url);
			}
					
			$mail->isHTML(true);  
			$hoy = date("Y-m-d");

			$mail->Subject = 'Nuevo Pedido';
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
																			<td class="active_b" style="box-sizing: border-box;vertical-align: middle;background-color: #37c2ef;line-height: 100%;font-family: Helvetica, Arial, sans-serif;text-align: center;mso-line-height-rule: exactly;padding: 16px;border-radius: 80px;">
																				<p class="imgr mb_0" style="font-family: Helvetica, Arial, sans-serif;font-size: 0;line-height: 100%;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 0;clear: both;"><img src="https://naturalcare-ec.com/formatos_mail/images/shopping_basket.png" width="32" height="32" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 32px;width: 100% !important;height: auto !important;display: block;margin-left: auto;margin-right: auto;"></p>
																			</td>
																		</tr>
																	</tbody>
																</table>
																<h1 class="mb_xxs" style="color: #3e484d;margin-left: 0;margin-right: 0;margin-top: 10px;margin-bottom: 4px;padding: 0;font-weight: bold;font-size: 32px;line-height: 42px;">Gracias por tu nueva compra!</h1>
																<h4 class="mb_xxs mte" style="color: #000;margin-left: 0;margin-right: 0;margin-top: 12px;margin-bottom: 4px;padding: 0;font-size: 13px;line-height: 25px;">Fecha de pedido: '.date("d-m-y").'</h4></td>
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
																					Cedula: '.$_POST["ci"].' <br>
																					Nombres: '.$_POST["nombres"].' '.$_POST["apellidos"].'<br>
																					Email: '.$_POST["email"].'<br>
																					Telf Celular: '.$_POST["celular"].'<br>
																					Telf fijo: '.$_POST["telefono"].' <br>

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
																				<h6 style="color: #3e484d;margin-left: 0;margin-right: 0;margin-top: 20px;margin-bottom: 8px;padding: 0;font-weight: bold;font-size: 13px;line-height: 20px;">Pedido # '.str_pad($fsecuencia["valor"], 6, "0", STR_PAD_LEFT).'</h6>
																				<p class="small" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 1px;">
																					<strong> ID de Transacción:</strong> '.$_POST["id_transaccion"].'<br>
																					</p>
                     
                     <p class="small" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;">
																					<strong>Autorización Transacción:</strong> '.$_POST["codigo_autorizacion"].'<br>
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
																				<p class="mb_xxs small" style="font-family: Helvetica, Arial, sans-serif;font-size: 13px;line-height: 20px;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 4px;"><span class="tm" style="color: #131c00;line-height: inherit;">Envío ('.$_POST["ciudad"].')</span> <span style="float:right;">$'.number_format(($envio/1.15),2).' USD</span></p>
																				
																				<p class="mb_xxs small" style="font-family: Helvetica, Arial, sans-serif;font-size: 13px;line-height: 20px;color: #131c00;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 4px;"><span class="tm" style="color: #616161;line-height: inherit;">IVA 15%(+)</span> <span style="float:right;">$'.number_format((((($subtotal/1.15)-$descuento)*0.15)+(($envio/1.15)*0.15)),2).' USD</span></p>
																				
																				
																				
																				
																				
																				

																			
                                                                               
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
                                                                                <p class="mt_0 mb" style="font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;"><strong>Total</strong> <span class="tp" style="color: #37c2ef;line-height: inherit;"><span style="float:right;">$'.number_format((($subtotal/1.15))-($descuento)+(((($subtotal/1.15)-$descuento)*0.15))+($envio/1.15)+(($envio/1.15)*0.15),2).'USD</span></span></p>
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
	<!-- order_address_plain --->
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
									 <p class="column_cell px tl" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px; background-color: #d8efef;">forma de pago: '.($_POST["pago"]).'</p>'.$pago.'
         
										<!-- col-3x2 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto;"><tbody><tr><td width="300" style="width:300px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_3" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 300px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px tl" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 16px;padding-bottom: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
																<h6 style="color: #3e484d;margin-left: 0;margin-right: 0;margin-top: 20px;margin-bottom: 8px;padding: 0;font-weight: bold;font-size: 13px;line-height: 20px;">Información de envío</h6>
																<p class="small" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;">'.$_POST["direccion"].'<br>
																	'.$_POST["provincia"].' - '.$_POST["ciudad"].'<br>
																	<strong>Referencia:</strong> '.$_POST["referencia"].'
																</p>
																
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
															<td class="column_cell px tl" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 16px;padding-bottom: 16px;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #616161;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
																<h6 style="color: #3e484d;margin-left: 0;margin-right: 0;margin-top: 20px;margin-bottom: 8px;padding: 0;font-weight: bold;font-size: 13px;line-height: 20px;">Datos de facturación</h6>
																<p class="small" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 20px;color: #616161;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 16px;">
																	RUC/CI: '.$_POST["ruc"].'<br>
																	Nombre: '.$_POST["razon"].'<br>
																	Dirección: '.$_POST["direccionf"].'<br>
																	Teléfono: '.$_POST["telefonof"].'<br>
																	
																</p>
																
															</td>
														</tr>
													</tbody>
												</table>
											</div>
									
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
	<!-- footer_blank -->
    		<tr>
									<td class="blank_cell footer_c pt pb" style="box-sizing: border-box;vertical-align: top;padding-top: 16px;padding-bottom: 16px;line-height: inherit;">
										<!-- col-2-4 -->
										<div class="email_row" style="box-sizing: border-box;font-size: 0;display: block;width: 100%;vertical-align: top;margin: 0 auto;text-align: center;clear: both;line-height: inherit;min-width: 0 !important;max-width: 600px !important;">
										<!--[if (mso)|(IE)]><table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:600px;Margin:0 auto;"><tbody><tr><td width="400" style="width:400px;line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
											<div class="col_4" style="box-sizing: border-box;font-size: 0;display: inline-block;width: 100%;vertical-align: top;max-width: 400px;line-height: inherit;min-width: 0 !important;">
												<table class="column" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
													<tbody>
														<tr>
															<td class="column_cell px pt_xs pb_0 tl" style="box-sizing: border-box;vertical-align: top;width: 100%;min-width: 100%;padding-top: 8px;padding-bottom: 0;font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #a7b1b6;mso-line-height-rule: exactly;text-align: left;padding-left: 16px;padding-right: 16px;">
																<p class="mb_xxs" style="font-family: Helvetica, Arial, sans-serif;font-size: 16px;line-height: 23px;color: #a7b1b6;mso-line-height-rule: exactly;display: block;margin-top: 0;margin-bottom: 4px;">
																	©2020 naturalcare-ec<br>
																	
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
																
																<a href="https://www.facebook.com/Naturalcare.ec/" target="_blank" style="text-decoration: underline;line-height: inherit;color: #a9b3ba;"><img src="https://naturalcare-ec.com/formatos_mail/images/social-facebook.png" width="24" height="24" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 24px;height: auto !important;"></a> &nbsp;&nbsp;
																
															
																
																<a href="https://www.instagram.com/naturalcare_ec/" target="_blank" style="text-decoration: underline;line-height: inherit;color: #a9b3ba;"><img src="https://naturalcare-ec.com/formatos_mail/images/social-instagram.png" width="24" height="24" alt="" style="outline: none;border: 0;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;line-height: 100%;max-width: 24px;height: auto !important;"></a>
																
																</p>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										<!--[if (mso)|(IE)]></td></tr></tbody></table><![endif]-->
									</div></td>
								</tr>
							
	<table class="email_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="box-sizing: border-box;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;width: 100%;min-width: 100%;">
		<tbody>
			<tr>
				<td class="email_body email_end tc" style="box-sizing: border-box;vertical-align: top;line-height: 100%;text-align: center;padding-left: 16px;padding-right: 16px;padding-bottom: 32px;background-color: #dbe5ea;font-size: 0 !important;">
					<!--[if (mso)|(IE)]><table width="632" border="0" cellspacing="0" cellpadding="0" align="center" style="vertical-align:top;width:632px;Margin:0 auto;"><tbody><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
					
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

				$limpiar = "delete from carrito where carro='".$_SESSION["idcarrito"]."'";
				mysql_query($limpiar);
				$limpiarcupon = "delete from carrito_cupon where carro='".$_SESSION["idcarrito"]."'";
				mysql_query($limpiarcupon);

				echo $fsecuencia['valor'];
			}




?>