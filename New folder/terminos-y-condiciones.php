<?php
session_start();

    include('../administrador/config/app_config.php');
     {
        $scat = "SELECT *FROM categorias WHERE estado='1'";
        $rcat = mysql_query($scat);

        $scatd = "SELECT *FROM categorias WHERE estado='1'";
        $rcatd = mysql_query($scatd);

        $subcat = "SELECT *FROM subcategorias WHERE estado='1' and id=".$_GET['id'];
        $rsubcat = mysql_query($subcat);
        $fsubcat = mysql_fetch_array($rsubcat);

        
        $ruta = "../administrador/imagenes";

        $sdetalle = "SELECT *FROM productos WHERE estado='1' and id=".$_GET['id']." ORDER BY id desc LIMIT 4";
        $rdetalle = mysql_query($sdetalle);
        $fdetalle = mysql_fetch_array($rdetalle);
        $tallas = explode(":;:", $fdetalle['tallas']);
        $colores = explode(":;:", $fdetalle['colores']);

         $sultimo = "SELECT *FROM productos WHERE estado='1' and subcategoria='".$_GET['id']."' ORDER BY id desc LIMIT 12";
         $rultimo = mysql_query($sultimo);

         $scontar = "SELECT *FROM productos WHERE estado='1' and subcategoria='".$_GET['id']."'";
         $rcontar = mysql_query($scontar);
         $contador = mysql_num_rows($rcontar);
               

        
    }



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
     <title>Términos y Condiciones Natural Care ec - Ecuador </title>
     
    <meta name="description" content="productos para el cuidado personal, cuidado capilar elaborados a base de estractos de origen natural">
    <meta name="author" content="cremas, jabones artesanales, shampoo gardenia, gel reductor, tratamiento capilar, tratamiento corporal, exfoliantes, jabón de aloe vera, jabón de romero">
    <meta name="robots" content="index,all">
    <meta name="revisit-after" content="5 days">
   
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
    <link href="../js/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../js/vendor/slick/slick.min.css" rel="stylesheet">
    <link href="../js/vendor/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <link href="../js/vendor/animate/animate.min.css" rel="stylesheet">
     <link href="../css/style-watches_1_light.css" rel="stylesheet">
    <link href="../fonts/icomoon/icomoon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="../css/estilos.css" rel="stylesheet">
    
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154164370-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-154164370-1');
</script>
<!-- fin - Google Analytics -->

</head>

<body class="is-dropdn-click">
    <?php include('header.php'); ?>
    
    
    
   <div class="page-content">
        <div class="holder mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="index.php">Inicio</a></li>
                    <li><span>Términos y condiciones</span></li>
                </ul>
            </div>
        </div>
        <div class="holder mt-0">
            <div class="container">
                <!-- Page Title -->
                <div class="page-title text-center">
                    <div class="title">
                        <h1>Términos y Condiciones</h1>
                    </div>
                </div>
                <!-- /Page Title -->
                <h3>Aviso legal</h3>
                <strong>TRATAMIENTO DE DATOS</strong>
                <p>El usuario, mediante la marcación de la casilla correspondiente, acepta expresamente y de forma libre e inequívoca que sus datos personales sean tratados por parte de Natural Care Ec con los siguientes fines:</p>
                <ol class="list list--marker-squared">
                    <li>Mejorar su experiencia de compra.</li>
                    <li>Procesar sus pedidos en línea, incluido el envío de correos electrónicos y/o mensajes de texto para informarle sobre el estado de un envío.</li>
                    <li>Procesar devoluciones de pedidos.</li>
                    <li>Gestionar su cuenta en www.naturalcare-ec.com</li>
                    <li>Contactar con usted en caso que haya algún problema con alguno de sus pedidos o por otros motivos de logística.</li>
                    <li>Responder a sus dudas y consultas.</li>
                    <li>Enviarle comunicaciones comerciales a través de e-mail o SMS para informarle de nuevos productos, ofertas especiales y novedades en general y catálogos. </li>
                </ol>
                <p>Las referidas comunicaciones comerciales serán relativas a los productos o servicios ofrecidos por Natural Care Ec. En ningún caso, los colaboradores o socios tendrán acceso a los datos personales de los usuarios. En todo caso, las comunicaciones comerciales serán realizadas por parte de Natural Care Ec y serán relativas a productos y servicios relacionados con su sector comercial.</p>
                
                 <p>La Web utiliza técnicas de seguridad de la información tales como procedimientos de control de acceso y mecanismos criptográficos, todo ello con el objetivo de evitar el acceso no autorizado a los datos y garantizar la confidencialidad de los mismos. Para lograr estos fines, el usuario acepta que Natural Care Ec obtenga datos a efectos de la correspondiente autenticación de los controles de acceso. Adicionalmente, cualquier transacción realizada a través de la Web se lleva a cabo a través de sistemas de pago seguros. </p>
                 
                 <p>Los datos confidenciales de pago son transmitidos directamente y de forma encriptada (SSL) a la entidad correspondiente. Natural Care Ec manifiesta que ha adoptado todas las medidas técnicas y de organización necesarias para lograr la seguridad e integridad de los datos de carácter personal que trate, así como para evitar su pérdida, alteración y/o acceso por parte de terceros no autorizados.</p>
                 
                 
                <div class="mt-3"></div>
                <h3>USO DE NUESTRA WEB</h3>
                <p>El usuario se compromete a hacer un uso adecuado de los contenidos de la Web, y estará obligado a:</p>
                
                 <ol class="list list--marker-squared">
                    <li>Facilitar información veraz y exacta sobre los datos solicitados en el formulario de registro o de realización del pedido, y mantenerlos actualizados, toda vez que haga uso de la Web;</li>
                    <li>No provocar daños en los sistemas físicos y lógicos de la Web, de los proveedores de Natural Carec Ec o de terceras personas, ni introducir ni difundir en la red virus informáticos o cualesquiera otros sistemas físicos o lógicos que sean susceptibles de provocar los daños anteriormente mencionados;</li>
                    <li>No utilizar los contenidos de la Web y la información de la misma para remitir publicidad, o enviar mensajes con cualquier otro fin comercial, ni para recoger o almacenar datos personales de terceros;</li>
                    <li>No intentar acceder y, en su caso, utilizar las cuentas de correo electrónico de otros usuarios y modificar o manipular sus mensajes.</li>
                </ol>
                
                
                
                <p>Natural Care Ec se reserva el derecho de efectuar sin previo aviso las modificaciones que considere oportunas en su Web, y podrá cambiar, suprimir o añadir tanto los contenidos y servicios que se presten a través de la misma como la forma en la que éstos aparezcan presentados o localizados en su portal. El usuario se compromete a respetar los derechos de propiedad intelectual e industrial de los que Natural Care Ec sea titular. El usuario podrá utilizar la Web y sus contenidos para su uso personal y privado. Cualquier otro uso queda prohibido y requerirá al usuario obtener la previa autorización expresa y escrita de Natural Care Ec. El usuario deberá abstenerse de suprimir, alterar, eludir o manipular cualquier dispositivo de protección o sistema de seguridad que estuviera instalado en la Web.</p>
                
                
                <div class="mt-3"></div>
                 <h3>Políticas de envío</h3>
                
                <p>Todos los pedidos se procesan dentro de 1 a 3 días hábiles. Por favor revise su correo no deseado para verificar su orden. Solo se enviarán las órdenes cuyos pagos hayan sido EFECTIVIZADOS Y VERIFICADOS con la entidad bancaria y el vendedor, caso contrario no se procederá con el envío de las mismas. No contamos con entregas ni procesamiento de pedidos en días no hábiles (feriados) o sábados y domingos.</p>
                
                
<p>Toda la información detallada en el envío, tales como: dirección de envío, número de contacto, datos de la factura, entre otros, es de EXCLUSIVA RESPONSABILIDAD DEL CLIENTE. Seguimos al pie de la letra la información de envío que nos proporciona durante el proceso de pago. Confiamos en que usted conozca su dirección mejor que nadie, por lo que no nos hacemos responsables por errores de entrega, paquetes perdidos, retenidos o dañados debido a una dirección de envío incorrecta.</p>
<p>Los envíos son realizados únicamente mediante Servientrega. No nos comprometemos con fechas ni horas exactas de entrega, ya que esto depende de factores y empresas ajenas a nosotros. Natural Care Ec se limita a informar el tiempo de entrega promedio.</p>
<p>Una vez que su pedido haya salido de nuestro almacén, recibirá vía WhatsApp o al correo que nos proporcionó, el número de rastreo para que pueda realizar el seguimiento a su paquete, también le llegará un mensaje de texto a su celular por parte del courier. A partir de ese momento la responsabilidad de la entrega es directamente con el courier. </p>
                
<p>En virtud de lo anterior, el Usuario será el único responsable de llevar a cabo el rastreo de dicho paquete y de obtener cualquier información respecto a este. En el detalle de su pedido podrá ver el número de guía del envío realizado mediante el courier, para esto puede iniciar sesión en su cuenta y verificar el número de tracking. </p>
                
<p>Una vez el pedido se encuentre en reparto la entrega se realiza en el transcurso del día, por lo tanto, es la empresa courier la entidad autorizada en informar horarios de entrega al cliente, en caso de que este lo requiera. En caso de que el cliente requiera conocer el estado de su orden, puede hacerlo mediante el siguiente enlace utilizando su respectivo número de guía de seguimiento o tracking: http://www.servientrega.com.ec</p>
                
                
<p>Las órdenes llegan en un promedio de 48 a 72 horas laborables (sin considerar el día de despacho). Para ciudades secundarias este tiempo de entrega puede variar hasta 72 horas laborables. </p>
                
<p>Los tiempos de entrega son estimados únicamente y no están garantizados. Estos se estiman en días hábiles (no incluye fines de semana / festivos). Por eso si necesita los productos para una fecha exacta debe contemplar nuestros tiempos y hacer el pedido con la suficiente anticipación.</p>
                
<p>En caso de que su orden no haya llegado dentro de 72 horas laborables, informar inmediatamente al vendedor o comunicarse directamente con los agentes de la Empresa Courier con su respectivo número de guía de seguimiento o tracking: CALL CENTER SERVIENTREGA 3732000.</p>
                
<p>En el caso de Galápagos, los envíos demoran de 4 a 6 días laborables en llegar, este tiempo puede verse afectado por el cupo restringido en las aerolíneas con este destino.</p>
                
<p>Para dar cumplimiento a los tiempos de entrega estipulados, es necesario que al momento de realizar la compra las direcciones brindadas sean completas y detalladas. El cliente se RESPONSABILIZA POR NUEVOS COSTOS DE ENVÍO generados en caso de que:</p>

      <ol class="list list--marker-squared">
                    <li> 1.	La dirección proporcionada por el mismo sea errónea o incompleta para proceder con la entrega.</li>
                    <li>2.	No acercarse a realizar el retiro de su orden en un máximo de 5 a 7 días laborables.</li>
                    <li>3.	No se encuentre el comprador o alguien de su confianza en la dirección proporcionada, que sea capaz de recibir la orden.</li>
                   
                </ol>           
                
                
                
                
          


     
                
                
                
                
                
                
                
                
                
                

                

                 <div class="mt-3"></div>
                <h3>Políticas de devoluciones</h3>
               <p> No existen cambios ni devoluciones en artículos, excepto en el caso que el cliente reciba un producto con fecha de caducidad vencida, producto erróneo o dañado, esta Política de devolución se aplica únicamente al comprador original de un producto de Natural Care Ec. <br>
                   Para hacer válida la devolución el producto deberá cumplir con los siguientes requisitos:</p>

<ol class="list ">
                    <li>El producto está sellado (sin abrir y sin usar).</li>
                    <li>El producto se compró en www.naturalcare-ec.com con prueba del pedido. No aceptamos devoluciones de cualquiera de nuestros minoristas. Las devoluciones deben iniciarse con el minorista al que le compró. </li>
                    <li>El producto se devuelve dentro de los 15 días posteriores a la recepción del pedido. No se aceptarán devoluciones después de este período de tiempo.</li>
                    <li>Además, si el producto está dañado o falta un artículo, se debe proporcionar fotos o videos del producto en el momento de la entrega con sus respectivas evidencias al correo reclamos@naturalcare-ec.com detallando la siguiente información: <br>
                    
                <ol class="list list--marker-squared">
                    <li>Nombre y número de pedido con el que compró su producto</li>
                    <li>Descripción y fotografías de cómo se recibió el artículo y/o pedido, la bolsa de paquetería en que se recibió, el empaque, guía, etc.</li>
                    <li>Forma de pago con la que se realizó la compra</li>

                </ol>
                
                
</li>
                </ol>
                
           
     
              <p>  Las condiciones del producto deberán ser evaluadas por parte del equipo Natural Care Ec antes de proceder a un posible cambio. Las solicitudes de cambio se analizarán y se dará aviso al cliente tanto en casos de proceder como en casos de no procedencia y los motivos de estos. </p>
<p>Si un producto llega dañado a su ubicación de envío o si cometimos un error que no se puede remediar con piezas de repuesto, cubriremos los gastos para devolvernos el artículo y enviarle un reemplazo.</p>
<p>Natural Care Ec no se hace responsable por alguna otra situación de cambio o devolución de producto que no entre en estas políticas. Productos con promociones o descuentos no aplican a cambios ni reclamos. En caso de que el cliente agregue un producto erróneo en su compra, no habrá devoluciones ni cambios. La insatisfacción con los resultados del producto no será motivo de devolución. </p>

              
               
       <div class="mt-3"></div>
                <h3>Políticas de Reembolso</h3>   
         <p>Para devolver un artículo debe ser autorizado previamente por Natural Care Ec y se tomará en consideración los siguientes aspectos:</p>    
        <ol class="list list--marker-squared">
                    <li>En caso de reembolso de un producto que no haya salido del almacén, el proceso se iniciará de inmediato.</li>
                    <li>En caso de haber realizado el despacho del pedido, tenga en cuenta que los costos de envío y los gastos para devolvernos el artículo serán deducidos de su reembolso (los productos deben permanecer sin abrir y sin usar). </li>
                    <li>Considere que en ambos casos se deducirá en el reembolso la comisión cobrada por el uso de tarjeta de crédito o débito, al igual que la comisión por transferencias interbancarias.</li>
                    <li>Algunos de nuestros pedidos se ofrecen con envío gratuito, así que tenga en cuenta que si solicita el reembolso en uno de estos pedidos, nuestros costos de envío se deducirán de su reembolso.</li>

                </ol>   
                
                
                
        <p>Una vez recibida la devolución, se procesará el reembolso por los productos de su orden. Los reembolsos pueden demorar de 6 a 10 días hábiles en procesarse y mostrarse en su cuenta. </p>
<p>Si el artículo coincide con la descripción de Natural Care Ec y el comprador no está satisfecho, Natural Care Ec no es responsable del reembolso. Natural Care Ec no promete ni garantiza ningún resultado o efecto específico del uso de los productos. Natural Care Ec estará obligado a garantizar que el producto sea seguro y cumpla con las condiciones satisfactorias hasta el momento de la entrega. La insatisfacción con los resultados del producto no será motivo de reembolso.</p>
<p>Contamos con un equipo de especialistas dedicados a ayudarlo a lograr los mejores resultados con sus productos. Si tiene alguna pregunta sobre los productos adquiridos, comuníquese con nuestro equipo de Servicio al Cliente a través del chat en nuestra página web, ¡nos encantaría ayudarlo!
</p>        
                
                
    <div class="mt-3"></div>
                <h3>Política de cancelación </h3>                
                
                <p>Si desea cancelar su pedido, debe enviar un aviso de cancelación de inmediato. El equipo de Natural Care Ec trabaja increíblemente rápido para asegurarse de que obtenga su pedido lo antes posible, por lo que debe enviarnos un aviso de cancelación dentro de 1 hora posterior a su pedido para asegurarse de que aún no lo hayamos procesado. Su pedido solo puede ser cancelado si nos ha enviado su aviso dentro de este tiempo. </p>
<p>Todos los avisos de cancelación deben enviarse a nuestro equipo de Servicio al Cliente al correo a ventas@naturalcare-ec.com con el asunto Cancelación del pedido (detallar número de pedido). Nuestro horario de atención es de lunes a viernes de 09:00 a 16:30 hora de Ecuador Continental.
</p>    
                
                
                
                
                
                
                
                
                
                
       
            </div>
        </div>
    </div>
    
    
     
<?php include('footer.php'); ?>
   
   
   
    <script src="../js/vendor/jquery/jquery.min.js"></script>
    <script src="../js/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/vendor/slick/slick.min.js"></script>
    <script src="../js/vendor/scrollLock/jquery-scrollLock.min.js"></script>
    <script src="../js/vendor/instafeed/instafeed.min.js"></script>
    <script src="../js/vendor/countdown/jquery.countdown.min.js"></script>
    <script src="../js/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="../js/vendor/ez-plus/jquery.ez-plus.min.js"></script>
    <script src="../js/vendor/tocca/tocca.min.js"></script>
    <script src="../js/vendor/bootstrap-tabcollapse/bootstrap-tabcollapse.min.js"></script>
    <script src="../js/vendor/isotope/jquery.isotope.min.js"></script>
    <script src="../js/vendor/fancybox/jquery.fancybox.min.js"></script>
    <script src="../js/vendor/cookie/jquery.cookie.min.js"></script>
    <script src="../js/vendor/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="../js/vendor/lazysizes/lazysizes.min.js"></script>
    <script src="../js/vendor/lazysizes/ls.bgset.min.js"></script>
    <script src="../js/vendor/form/jquery.form.min.js"></script>
    <script src="../js/vendor/form/validator.min.js"></script>
    <script src="../js/vendor/slider/slider.js"></script>
    <script src="../js/app.js"></script>
    
    
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5debc01d43be710e1d210734/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


</body>

</html>