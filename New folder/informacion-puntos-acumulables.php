<?php 
include('../administrador/config/app_config.php');
if(is_numeric($_SESSION["idcarrito"]) && $_SESSION["idcarrito"] > 0 && $_SESSION["idcarrito"] < 500000)
{
  if($_SESSION['flagretorno'] == '1')
  {
    header('Location: checkout.php');
  }  

    $datuser = "SELECT *FROM natuser where id=".$_SESSION['idcarrito'];
    $rdatosu = mysql_query($datuser);
    $fusuario = mysql_fetch_array($rdatosu);
}

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
   <meta name="description" content="productos para el cuidado personal, cuidado capilar elaborados a base de estractos de origen natural">
   
   
    <title>Términos y condiciones puntos acumulables - Natural Care ec</title>
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
                    <li><a href="../index.php">Inicio</a></li>
                    <li><span>Mi cuenta</span></li>
                </ul>
            </div>
        </div>
        <div class="holder mt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 aside aside--left">
                       <?php include('menu2.php'); ?>
                        
                    </div>
                    <div class="col-md-9 aside">
                        <h3>TÉRMINOS Y CONDICIONES DEL PROGRAMA DE RECOMPENSAS</h3>
                        <p>Hemos ideado algunas formas maravillosas de recompensarlo por comprar en Natural Care Ec, y registrarse es fácil. ¡Lo mejor de todo es que puede usar los puntos que gane para comprar más productos!

Los siguientes términos y condiciones (estos “Términos y Condiciones del Programa de Recompensas”) contienen información importante sobre el Programa POR FAVOR LEA ESTOS TÉRMINOS DETENIDAMENTE ANTES DE UTILIZAR ESTE SITIO. Al utilizar nuestro Sitio, acepta estos Términos y Condiciones. Si no está de acuerdo, no utilice el Sitio. Nos reservamos el derecho, en cualquier momento, de modificar, alterar o actualizar estos términos y condiciones de uso.</p><br><br>
                       
                       <h3>1. Membresía y Elegibilidad</h3>
                       <p>El Programa de recompensas se brinda en beneficio de nuestros clientes. La suscripción al Programa es automática después de la creación de una cuenta de cliente que incluye su información personal. El Programa permite que las personas que hayan completado los pasos de registro acumulen puntos al realizar compras y canjear estos puntos por recompensas o descuentos ofrecidos por la Compañía. El programa de recompensas es gratuito para sus clientes y se puede acceder a través de www.naturalcare-ec.com.<br>
El Programa de Recompensas se ofrece a la entera discreción de Natural Care Ec, está disponible para las personas solo para su uso personal y está limitado a una cuenta por persona. Las corporaciones, asociaciones u otros grupos no pueden participar en el Programa. Las personas que son residentes de Ecuador y al menos mayores de 18 años o más y que proporcionan y mantienen una dirección de correo electrónico válida son elegibles para convertirse en miembros.<br>
La membresía es gratuita y no se requiere una compra inicial para convertirse en miembro. Para convertirse en un Miembro válido, debe completar el proceso de inscripción proporcionando información completa y precisa e indicando su aceptación de los Términos del Programa. 
Los miembros no adquieren ningún derecho a la disponibilidad continua de ninguna recompensa, beneficio o nivel de canje en particular. Al crear una cuenta usted acepta estar obligado por estos términos y condiciones. 
</p><br>
          
                        
                          <h3>1.1. Participación</h3>     
                          <p>La participación en el Programa solo está abierta a los clientes de Natural Care Ec, que sean al menos mayores de 18 años o más, que tengan acceso a nuestra tienda en línea en www.naturalcare-ec.com. <br>
Si ya se registró en nuestra página web y generó una cuenta, automáticamente forma parte de nuestro programa de recompensas gratuito.
Estos Términos y Condiciones serán aceptados por usted y serán vinculantes para usted en el momento de optar por participar. Si no acepta estar sujeto a estos Términos y Condiciones, no participe en el Programa.
</p>  <br>     
                       
                        <h3>1.2. Contraseñas y Seguridad</h3>  
                <p>Para inscribirse en el Programa, deberá registrarse y crear una cuenta con nosotros y proporcionar uno o más nombres, dirección de correo electrónico, entre otros. Usted es responsable de mantener la confidencialidad de su identificación. Acepta no utilizar la identificación de ningún tercero ni divulgar su identificación a ningún tercero. Usted es responsable de todas y cada una de las actividades que ocurran en su Cuenta. Usted acepta proporcionarnos información de cuenta correcta y completa en todo momento e informarnos de cualquier cambio en la información que ha proporcionado. Mantendremos su identificación confidencial. Solo se permite una cuenta de recompensas por persona.</p>   <br>              
                        
                     <h3>1.3. Derechos de suspensión; Capacidad</h3>
                     <p> Si la Compañía determina que un Miembro del Programa ha abusado de cualquiera de los privilegios del Programa, no cumple con cualquiera de los Términos del Programa o hace cualquier declaración falsa a la Compañía, la Compañía puede, a su sola discreción, tomar las acciones que considere apropiadas, incluyendo, sin limitación, suspender los privilegios de dicho Miembro bajo el Programa, revocar alguno o todos los puntos en la Cuenta de dicho Miembro del Programa y/o revocar la membresía del Miembro del Programa, en cada caso, con o sin previo aviso al Miembro y sin responsabilidad para la Compañía. <br>
No se otorgarán puntos si, en la opinión razonable de la Compañía, la mercancía comprada se utilizará para reventa o uso comercial y se perderá cualquier punto otorgado en dichas compras. Si a un Miembro se le otorgaron puntos por una oferta o promoción en la que un Miembro compró productos en cantidades superiores a las razonables, los puntos otorgados como resultado de esa oferta o promoción pueden perderse sin previo aviso y la Cuenta puede suspenderse o cerrarse. <br>
A menos que se restrinja más en otras partes de los Términos del programa, la Membresía solo está disponible para personas mayores de edad y que tengan capacidad legal. Si un Miembro no cumple con los requisitos de capacidad establecidos anteriormente, todos los puntos otorgados a dicho Miembro pueden perderse sin previo aviso y la Cuenta puede suspenderse o cerrarse.</p> <br>
                    
                    
                    <h3>2.	Cómo funciona el programa y sus beneficios</h3>
                    <p>El Programa es una forma en la que recompensamos y agradecemos a nuestros clientes leales por comprar nuestros productos. Para que su compra califique para el Programa, DEBE HABER INICIADO SESIÓN EN SU CUENTA EN LÍNEA EN EL MOMENTO DE LA COMPRA EN EL SITIO. Puede ganar puntos al realizar compras elegibles. Una vez que alcance una cierta cantidad de puntos, puede ser elegible para ciertos beneficios y recompensas, los cuales pueden cambiar de vez en cuando y pueden ofrecerse en de forma limitada. Las compras elegibles y otras oportunidades para ganar puntos se publicarán en el Sitio o pueden publicarse a través de otros medios (por ejemplo, en comunicaciones de marketing, redes sociales, etc.).</p><br>
                    
                    <h3>2.1.	Puntos Acumulables</h3>
                    <p>Los miembros no pueden recibir puntos por compras realizadas antes de la inscripción y de la entrada en vigencia del programa.<br>
Según el Programa, tendrán determinados puntos acreditados en su cuenta por cada dólar gastado.<br>
Como parte de los Beneficios de ser miembro, sus puntos pueden canjearse por recompensas que Natural Care Ec pone a disposición de vez en cuando a su exclusivo criterio. Puede canjear Puntos por una recompensa si tiene suficientes puntos en su cuenta para esa recompensa específica. Las recompensas solo se pueden canjear en la tienda en línea y solo se envían a direcciones en Ecuador.<br>
Natural Care Ec puede, a su entera discreción, permitir que los puntos se canjeen por otros beneficios o artículos de mercadería de vez en cuando. Sin embargo, los puntos nunca se pueden canjear por dinero en efectivo.
</p><br>
                    
                    <h3>2.1.1.	Valor</h3>
                    <p>Los puntos de recompensa no tienen valor en efectivo y no se pueden canjear por efectivo. La acumulación de puntos no da derecho a los miembros del programa a ningún derecho adquirido, y la Compañía no garantiza de ninguna manera la disponibilidad continua de ninguna recompensa, nivel de canje, reembolso o cualquier otro beneficio. La Compañía no asume ninguna responsabilidad ante los Miembros con respecto a la adición o eliminación de artículos de los que se pueden acumular o canjear puntos o por los cuales se pueden obtener puntos.</p><br>
                    
                     <h3>2.1.2.	Transferibilidad</h3>
                     <p>Los puntos no pueden asignarse, intercambiarse, comprarse, regalarse ni venderse de ninguna otra manera. Los puntos así adquiridos son nulos. Para evitar dudas, tales transferencias prohibidas incluyen transferencias por operación o por ley tras la muerte de un Miembro.</p><br>
                     
                     <h3>2.1.3.	Vencimiento de los puntos</h3>
                    <p>Esperamos que canjee sus puntos con regularidad, no obstante, nuestros puntos no tienen vencimiento. La página de su cuenta enumera su historial de saldo de puntos, que muestra las fechas en que se ganaron los mismos.</p><br>
                     
                    <h3>3.	Recompensas </h3>
                    <h3>3.1.	En general </h3>
                    <p>Natural Care Ec puede ofrecer recompensas de vez en cuando y a su exclusivo criterio. Al comprar en línea, puede agregar Recompensas a su cesta en línea si ha iniciado sesión en su cuenta. <br>
Los puntos de recompensa que acumule pueden canjearse por recompensas que se muestran en nuestro sitio web. Las recompensas cambian y no podemos garantizar que una recompensa disponible un día siga estando disponible al día siguiente. Las cantidades de cada recompensa son limitadas y debe estar registrado para canjear las ofertas. Los puntos se deducirán en el momento del canje. Las recompensas están sujetas a cambios, alteraciones, sustituciones o rescisiones por parte de Natural Care Ec a su exclusivo criterio en cualquier momento.<br>
Todas las recompensas son intransferibles, no tienen valor en efectivo y no pueden venderse, transferirse ni devolverse. Las recompensas solo se pueden enviar a direcciones en Ecuador.
</p>
               <ul>
               <li>Las recompensas solo se pueden canjear en el sitio web de Natural Care Ec.</li>
<li>Para canjear cualquier Recompensa aplicable al realizar transacciones en línea en el sitio web, un miembro debe asegurarse de haber iniciado sesión en una cuenta válida.</li>
<li>Las recompensas no se pueden canjear junto con ninguna otra oferta a menos que se indique lo contrario.</li>
<li>Las recompensas no se pueden canjear por compras de vales de regalo, gastos de envío o productos de promoción.</li>
<li>Los puntos de recompensa no se aplican a las tarifas de envío.</li>
<li>Natural Care Ec se reserva el derecho de cambiar la fecha de vencimiento de cualquier Recompensa en cualquier momento sin previo aviso.</li>
<li>Natural Care Ec se reserva el derecho, a su absoluta discreción, de excluir ciertos artículos y promociones del canje mediante el uso de Recompensas.</li>
                 </ul> 

                 
                 <br>

                 <h3>3.2.	Canjear una recompensa</h3>  
                <p>Los miembros del programa pueden ganar puntos en relación con las compras de productos realizados a través de la página web www.naturalcare-ec.com, independientemente del método de pago, siempre que el usuario haya iniciado sesión en su cuenta en el momento de la compra.   <br>
Los puntos se pueden canjear por recompensas. Cuando se hayan acumulado suficientes puntos para obtener las recompensas deseadas. Las recompensas disponibles y otra información están disponibles en la página web.   <br>
Las recompensas se canjean "gastando" los puntos en www.naturalcare-ec.com. Se pueden canjear varias recompensas por diferentes valores de puntos y estos cambiarán de vez en cuando. <br>
Un miembro debe iniciar sesión en su cuenta al canjear puntos para proteger la integridad del saldo de puntos del miembro. Cada Miembro es responsable de garantizar que toda la Información personal sea correcta y esté actualizada y la Compañía se reserva el derecho de bloquear los canjes cuando la información del Miembro sea inexacta o incompleta. Los miembros son los únicos y enteramente responsables de mantener segura su cuenta. <br>
Las recompensas disponibles para canjear en la tienda en línea requieren la compra de una mercancía. Las recompensas canjeadas ya sea por descuento o productos gratis no se pueden usar junto con otros códigos promocionales o descuentos promocionales durante el pago. 
Si su pedido en línea no se completa durante la misma visita, las Recompensas permanecerán en su cesta de compras. Sin embargo, es posible que ya no estén disponibles cuando regrese y complete el pedido. Debido a la naturaleza limitada de las recompensas, lamentamos no poder reenviar las recompensas estándar si llegan dañadas. <br>
</p>   <br>

                 <h3>3.2.1.	Recompensa por canje en descuento</h3>    
                <p>Es un descuento que se aplica al precio de compra de la mercancía disponible para todos los miembros a cambio del canje de puntos.<br>
La recompensa por descuento se puede usar para la compra de mercadería en línea. La Recompensa no se puede aplicar a compras anteriores ni cargos de envío.<br>
Solo se puede aplicar una recompensa por descuento por transacción y no son combinables con otros códigos de descuento ni con el canje de un producto por puntos.<br>
</p> 
                   <br>

                 <h3>3.3.	Cancelación de pedidos en línea</h3>    
                   <p>Debido a que todas las recompensas estándar canjeadas en línea se envían con pedidos de mercadería, si cancela todo su pedido, no se enviará ninguna Recompensa porque se requiere la compra de una mercancía.</p> 
                   
                    <br>

                 <h3>3.4.	Devoluciones o Reembolso</h3>  
                   <p>LOS PRODUCTOS CANJEADOS CON PUNTOS NO APLICAN A CAMBIOS, RECLAMOS, DEVOLUCIONES O REEMBOLSOS.<br>
En el caso de una devolución de cualquier compra elegible que inicialmente ganó puntos, dichos puntos se deducirán automáticamente de la Cuenta que se utilizó para la compra elegible. Los puntos se deducirán a la misma tasa que se ganaron.<br>
Tras la devolución de productos otorgados mediante el canje de puntos, todos los puntos canjeados se perderán.<br>
</p><br>

                 <h3>4.	Cambios, terminación y / o eliminación del programa</h3>
                   <p>Natural Care Ec puede, a su entera discreción, alterar, limitar o modificar las reglas, regulaciones, beneficios, Recompensas, elegibilidad para Membresía o cualquier otra característica del Programa (incluida la asignación de cualquiera de sus obligaciones a los clientes bajo el Programa en cualquier momento) o puede terminar el Programa en cualquier momento a su entera discreción, mediante la publicación de dichos cambios en el sitio web de Natural Care Ec. 
SU PARTICIPACIÓN CONTINUA EN EL PROGRAMA DESPUÉS DE DICHOS CAMBIOS CONSTITUYE SU ACEPTACIÓN DE LOS CAMBIOS.<br>
Natural Care Ec se reserva el derecho de excluir a personas del Programa o eliminar puntos de un miembro a su exclusivo pero razonable criterio. En particular, cualquier abuso, manipulación o “juego" del Programa o sus reglas (según lo determine Natural Care Ec), incumplimiento de los términos del Programa, inactividad de la Membresía durante más de 12 meses, cualquier tergiversación o cualquier conducta perjudicial para los intereses puede someter a los miembros a la revocación de la membresía o la deducción de los puntos obtenidos a través de estas actividades y afectará la elegibilidad para una mayor participación en el Programa. <br>
La membresía no es transferible y las compras de la membresía deben ser realizadas por el miembro. Si su Membresía es revocada o cancelada, cualquier punto en su cuenta expirará automáticamente. <br>
Natural Care Ec se reserva el derecho de realizar cambios en su sitio web y estos Términos en cualquier momento. Es su responsabilidad verificar o revisar estos Términos de vez en cuando para mantenerse informado de cualquier cambio. Al unirse al Programa, por la presente acepta estar sujeto a dichos Términos modificados.<br>
</p><br>

                 <h3>5.	Programa de Comunicaciones</h3>
                   <p>Al inscribirse en el Programa, se suscribirá automáticamente para recibir y dar su consentimiento para recibir correos electrónicos de marketing de Natural Care Ec y correos electrónicos relacionados con el Programa.<br>
Usted acepta recibir comunicaciones transaccionales, comerciales y de marketing tanto relacionadas con nuestro Programa de Recompensas específicamente, como con nuestros productos en general (incluidos los productos relacionados con www.naturalcare-ec.com), de nuestra parte de forma electrónica. Las comunicaciones comerciales y de marketing pueden incluir notificaciones sobre ofertas especiales u oportunidades relevantes disponibles de nuestros socios. <br>
Nos comunicaremos con usted por correo electrónico o publicando avisos en www.naturalcare-ec.com y nuestras redes sociales. Usted acepta que todos los acuerdos, avisos, divulgaciones y otras comunicaciones que le proporcionamos electrónicamente satisfacen cualquier requisito legal de que dichas comunicaciones se realicen por escrito.<br>
Cualquier correspondencia que enviemos en relación con nuestro programa de recompensas se hará por correo electrónico y a la dirección de correo electrónico que se haya registrado con nosotros.<br>
</p><br>

                 <h3>6.	Contacto</h3>
                   <p>Si tiene alguna pregunta acerca de estos Términos y Condiciones o si desea brindar algún comentario con respecto al Programa, comuníquese con nosotros a: ventas@naturalcare-ec.com.</p><br>

                 <h3>7.	Información adicional sobre el programa</h3>
                   <ul>
                       
                       <li>El programa Natural Rewards es operado por Natural Care Ec.</li>
<li>Como condición para el uso de este Sitio, usted garantiza que tiene al menos 18 años de edad; posee la autoridad legal para crear una obligación legal vinculante; utilizará este Sitio de acuerdo con este Acuerdo; sólo utilizará este Sitio para realizar compras legítimas; y toda la información proporcionada por usted en este Sitio es verdadera, precisa, actual y completa. Nos reservamos el derecho, a nuestra entera discreción, de denegar el acceso a cualquier persona a este Sitio y a los servicios que ofrecemos, en cualquier momento y por cualquier motivo, incluidos, entre otros.</li>
<li>Las recompensas de Natural Care Ec están disponibles solo para clientes de Ecuador y son nulas donde lo prohíba la ley. Nuestro Programa de Recompensas está disponible solo para individuos, no para organizaciones o grupos. </li>
<li>Debe tener una dirección de correo electrónico válida para ser elegible para ser miembro del Programa de Recompensas. Las cuentas del programa de fidelización se identificarán mediante el correo electrónico del miembro. Los miembros no recibirán una tarjeta de membresía ni un número de membresía.</li>
<li>Una persona puede actualizar su perfil de miembro en cualquier momento visitando el sitio web. Es responsabilidad del miembro actualizar su perfil de miembro, incluido su correo electrónico, apellido, fecha de nacimiento, teléfono y dirección postal. Si un Miembro no ha proporcionado o actualizado su cuenta con los detalles correctos, es posible que Natural Care Ec no pueda comunicarse con el Miembro sobre su membresía, recompensas, ofertas especiales o entrada a concursos.</li>
<li>En cualquier momento, los miembros solo pueden tener una cuenta en el programa de recompensas Natural Care Ec. Los miembros no pueden transferir su cuenta o recompensas a otra persona.</li>
<li>Al calificar para el Programa de recompensas de Natural Care Ec, una persona da su consentimiento para que Natural Care Ec se comunique con ellos para proporcionarles información de marketing o de consumidor y les notifique las recompensas u otros productos y ofertas especiales.</li>
<li>Cada miembro del Programa de Recompensas está sujeto a los términos y condiciones completos del programa, que pueden variar de vez en cuando.</li>
<li>Usted es responsable de mantener la confidencialidad de su identificación de usuario y contraseña.
<li>Nos reservamos el derecho de cancelar y eliminar cualquier cuenta a nuestro exclusivo y absoluto criterio en cualquier momento y sin previo aviso.</li>
<li>Puede utilizar www.naturalcare-ec.com y los beneficios del Programa de Recompensas solo para fines personales y no para fines comerciales o de otro tipo.</li>
<li>Los puntos se redondean a la cantidad en dólares sin considerar los centavos. </li>
<li>Los puntos se acreditan en una cuenta al completar (una vez que se haya comprobado la recepción) un pedido en línea a través de naturalcare-ec.com.</li>
<li>Los miembros no pueden recibir puntos por compras realizadas antes de la inscripción.</li>
<li>Los puntos solo se emitirán si se registra en la cuenta en el momento de la compra. LOS PEDIDOS DE INVITADOS NO ACUMULAN PUNTOS.
<li>Los puntos de recompensa no tienen valor en efectivo y no se pueden canjear por efectivo. Los puntos acumulados no son propiedad del miembro y pueden ser revocados, cancelados, limitados o modificados en cualquier momento.</li>
<li>Si devuelve un producto para obtener un reembolso, deduciremos la cantidad de puntos recolectados de su cuenta del Programa de Recompensas por ese producto. Nuestro personal de atención al cliente puede reembolsar o aplicar puntos de recompensa a su cuenta caso por caso.</li>
<li>Las recompensas no se pueden canjear ni devolver por puntos, otro producto o un reembolso monetario.</li>
<li>Los puntos deben canjearse en múltiplos de diez. Los puntos son intransferibles y no se pueden combinar con la cuenta de otro miembro.
<li>Los clientes afiliados al programa, acumulan los puntos en función a las condiciones establecidas por Natural Care Ec.
<li>El cliente afiliado al programa es el único que puede redimir los puntos.</li>
<li>Natural Care Ec puede adaptar y modificar las reglas del programa en cualquier momento. Algunos cambios pueden afectar el valor de los puntos. Natural Care Ec notificará a los miembros de dichos cambios en naturalcare-ec.com. Asegúrese de revisar las reglas y regulaciones en el sitio web de vez en cuando, ya que son y serán la declaración autorizada de las reglas vigentes en cualquier momento. Su participación continua en este programa constituye su consentimiento a dichos cambios.</li>
<li>Natural Care Ec se reserva el derecho de modificar o cancelar el programa en cualquier momento.</li>
<li>Natural Care Ec puede cancelar cualquier membresía si se sospecha de fraude. Si en cualquier momento, en nuestra opinión razonable, se considera que está abusando de nuestro programa de recompensas, nos reservamos el derecho de retirarlo del programa y cancelar los puntos acumulados en su cuenta.</li>
<li>Natural Care Ec no se hace responsable de los puntos perdidos debido a un uso fraudulento o no autorizado.</li>
<li>Los empleados y familiares de Natural Care Ec o las personas que viven en el mismo hogar que un empleado de Natural Care Ec no son elegibles para participar en el programa.</li>

                   </ul><br>
                   <h3>7.1.	Natural Care Ec tiene las siguientes obligaciones:</h3>
                   
                   <ul>
                   
                   <li>Reconocer al CLIENTE los beneficios, así como las recompensas a las que tiene derecho luego de cumplir con los requisitos establecidos para que pueda canjear los productos ofrecidos en el programa.</li>
<li>Registrar en cuentas independientes los puntos acumulados por el CLIENTE, los cuales se informarán en la consulta de saldo que está a disposición del CLIENTE de manera virtual.</li>
<li>Mantener una versión actualizada de los términos y condiciones del programa, en www.naturalcare-ec.com, la cual debe estar siempre disponible para cualquier consulta de los clientes.</li>

                   </ul><br>
                   
                   <h3>7.2.	Son obligaciones del CLIENTE las siguientes:</h3>
                   <ul>
                       
                       
                       <li>Observar las normas constantes en los presentes términos y condiciones.</li>
<li>Es obligación y responsabilidad de todos los clientes del programa conocer, cumplir y actualizarse de todas las reglas y políticas del programa de recompensas, información adicional para los clientes y sus estados de cuenta a través de www.naturalcare-ec.com, para poder entender los derechos, responsabilidades y su status de cliente bajo el programa.</li>
<li>No abuse ni haga mal uso de los Beneficios, Recompensas, servicios o acuerdos del Programa de Recompensas de Natural Care Ec, como:</li>
                   
                   <ul>
                     
                      <li>Participar en actividades ilegales o fraudulentas;</li>
<li>Proporcionar o intentar proporcionar información falsa o engañosa, o hacer una declaración falsa a Natural Care Ec;</li>
<li>Vender, asignar, transferir o adquirir, u ofrecer vender, asignar, transferir o adquirir cualquier Beneficio o Recompensa del Programa de Recompensas de Natural Care Ec;</li>
<li>Actuar de manera hostil, abusiva o agresiva hacia el Programa de Recompensas o los representantes de Natural Care Ec o cualquier socio del programa; o</li>
<li>Crear varias cuentas de membresía para que cada una reciba los beneficios del Programa de Recompensas de Natural Care Ec.</li>
</ul>

                  
                   
             <li>Cada Miembro es responsable de verificar regularmente su Cuenta de Membresía y mantener sus detalles de Membresía actualizados y debe notificar a Natural Care Ec de cualquier cambio, omisión o información incorrecta. </li>
                   
                </ul> 

                    
                    </div>
                </div>
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