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
    <meta name="description" content="productos para el cuidado personal, cuidado capilar elaborados a base de estractos de origen natural">
    <meta name="author" content="cremas, jabones artesanales, shampoo gardenia, gel reductor, tratamiento capilar, tratamiento corporal, exfoliantes, jabón de aloe vera, jabón de romero">
     <meta name="robots" content="index,all">
    <meta name="revisit-after" content="5 days">
    <title>Preguntas Frecuentes Natural Care ec - Ecuador </title>
      <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
    <link href="../js/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../js/vendor/slick/slick.min.css" rel="stylesheet">
    <link href="../js/vendor/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <link href="../js/vendor/animate/animate.min.css" rel="stylesheet">
    <link href="../css/style-watches_1_light.css" rel="stylesheet">
    <link href="../fonts/icomoon/icomoon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- estilos custom -->
    <link href="../css/estilos.css" rel="stylesheet">
    
    <!--facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!--facebook-->

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
                    <li><a href="../index.php">Home</a></li>
                    <li><span>Preguntas frecuentes</span></li>
                </ul>
            </div>
        </div>
        <div class="holder mt-0">
            <div class="container">
                <!-- Page Title -->
                <div class="page-title page-title--blog">
                    <div class="title">
                        <h1>Preguntas frecuentes</h1>
                    </div>
                </div>
                <!-- /Page Title -->
                <div class="row">
                    <div class="col-md-9 aside" id="centerColumn">
                        
                         
  <!-- Grid row -->
  <div class="row accordion-gradient-bcg d-flex justify-content-left">

  <!-- Grid column -->
  <div class="col-md-10">
   <h3>Compras y pagos</h3>
  
    <div class="accordion md-accordion accordion-2" id="accordionEx7" role="tablist"
      aria-multiselectable="true">

      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading1">
          <a data-toggle="collapse" data-parent="#accordionEx7" href="#compras1" aria-expanded="false"
            aria-controls="collapse1">
            <h5 class="mb-0 white-text text-uppercase font-thin">¿Es seguro comprar?</h5>
          </a>
        </div>
        <div id="compras1" class="collapse" role="tabpanel" aria-labelledby="heading1"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Es totalmente seguro, nuestro sitio web no almacena información de tus tarjetas de crédito. Si te registras como usuario nos encargamos que tu cuenta sea privada. Tus datos personales, así como el contenido de tu pedido tampoco serán compartidos ni divulgados bajo ningún concepto.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->

      

      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#compras2"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
              ¿Natural Care Ec guarda mis datos de tarjeta?</h5>
          </a>
        </div>
        <div id="compras2" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>No, Natural Care Ec jamás almacena en nuestros servidores ningún dato de las tarjetas de los clientes, ni numeración, ni CCV, ni caducidad. Utilizamos medios de pago electrónico provisto por la banca privada y otros servicios internacionales como PayPhone, evitando así almacenar este tipo de datos tan sensibles.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#compras3"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
              ¿Con qué tarjetas puedo pagar mi pedido?
            </h5>
          </a>
        </div>
        <div id="compras3" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Para realizar el pago con tus tarjetas, por favor asegúrate de tenerlas habilitadas en tu banco para compras por internet. Aceptamos tarjetas de crédito Visa y Mastercard de cualquier banco emisor local. Si prefieres realizar tu pago con PayPhone, puedes cancelar tus compras con tu tarjeta de débito Produbanco o tus tarjetas de crédito corriente Visa y Mastercard de todos los bancos, excepto Visa Bankard, Banco Bolivariano y Visa Pichincha.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#compras4"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
              No tengo tarjeta de crédito ¿De qué otra forma puedo pagar?
            </h5>
          </a>
        </div>
        <div id="compras4" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Dentro de la página web tienes la opción de realizar tus pagos mediante depósito o transferencia bancaria, solo elige esta opción y te llegarán los datos de las cuentas disponibles para los pagos, realiza el pago, envíanos una foto del comprobante de pago al correo ventas@naturalcare-ec.com o vía WhatsApp 099 5566 900 y te ayudaremos con tu pedido. </p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#compras5"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
              ¿Cómo puedo pagar con Payphone?
            </h5>
          </a>
        </div>
        <div id="compras5" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Para agilitar el proceso te recomendamos tener la aplicación de PayPhone descargada y tus tarjetas activas. Tu tarjeta de crédito Visa, o Mastercard de cualquier banco emisor excepto Visa Bankard Banco Bolivariano y Visa Pichincha. También puedes pagar tu pedido con tarjeta de débito de banco PRODUBANCO.</p>
<P>En caso de que aún no tengas instalada la aplicación Payphone, visita https://livepayphone.com/ y podrás conocer cómo completar tu registro.</P>
<ul>
<li>1.	Luego de tener activa tus tarjetas, ingresa a la página de Natural Care Ec y continúa la compra normalmente.</li>
<li>2.	Selecciona la forma de pago Payphone, ingresa el número de teléfono registrado en tu aplicación PayPhone.</li>
<li>3.	Autoriza el cobro por parte de Natural Care Ec y te llegará el voucher a tu teléfono.</li>
</ul>
<p>Para más información sobre las ventajas de PayPhone puedes ingresar a https://livepayphone.com/</p>



          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
    </div>
    <!--/.Accordion wrapper-->

  </div>
  <!-- Grid column -->

</div>
  <!-- Grid row -->
                       
                       
                       
  <!-- Grid row -->
  <div class="row accordion-gradient-bcg d-flex justify-content-left">

  <!-- Grid column -->
  <div class="col-md-10 pt-20"><br>
   <h3>envíos</h3>
  
    <div class="accordion md-accordion accordion-2" id="accordionEx7" role="tablist"
      aria-multiselectable="true">

      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading1">
          <a data-toggle="collapse" data-parent="#accordionEx7" href="#envios1" aria-expanded="false"
            aria-controls="collapse1">
            <h5 class="mb-0 white-text text-uppercase font-thin">¿Cuál es el tiempo de entrega?</h5>
          </a>
        </div>
        <div id="envios1" class="collapse" role="tabpanel" aria-labelledby="heading1"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Las órdenes llegan en un promedio de 24 a 48 horas laborables (sin considerar el día de despacho). Para ciudades secundarias este tiempo de entrega puede variar hasta 72 horas laborables. Debe contarse a partir del momento en que hayamos confirmado el pago. </p>
          </div>
        </div>
      </div>
      <!-- Accordion-->

      

      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#envios2"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
             ¿Qué pasa si no hay nadie cuando traen mi pedido?</h5>
          </a>
        </div>
        <div id="envios2" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Si la empresa de Courier va a al lugar de entrega y no encuentra a nadie, el pedido retorna a sus oficinas para realizar un nuevo envío sin costo, en caso que no encuentre nuevamente a alguien en el lugar de entrega el pedido llegará a la sucursal de Servientrega más cercano al lugar de envío en la que deberás acercarte a retirar el paquete. Contarás para ello con un plazo de 5 días hábiles. Pasado este plazo, si no hubo un reclamo, nos devuelve el paquete y nosotros nos comunicaremos contigo para coordinar un nuevo envío y el costo de este será a cargo del comprador.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
     
      
      
    </div>
    <!--/.Accordion wrapper-->

  </div>
  <!-- Grid column -->
  
  
   <!-- Grid column -->
  <div class="col-md-10"><br>
   <h3>Té + Bienestar</h3>
  
    <div class="accordion md-accordion accordion-2" id="accordionEx7" role="tablist"
      aria-multiselectable="true">

      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading1">
          <a data-toggle="collapse" data-parent="#accordionEx7" href="#te1" aria-expanded="false"
            aria-controls="collapse1">
            <h5 class="mb-0 white-text text-uppercase font-thin">¿Cómo funciona el programa?</h5>
          </a>
        </div>
        <div id="te1" class="collapse" role="tabpanel" aria-labelledby="heading1"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Creamos nuestro Programa de desintoxicación de 30 días para que sea súper simple y fácil de incorporar con un estilo de vida saludable. Viene con dos mezclas de té: Skinny Tea que se bebe todas las mañanas para comenzar tu día con mucha energía natural y Colon Tea que se bebe pasando una noche, antes de irte a la cama. </p>
          </div>
        </div>
      </div>
      <!-- Accordion-->

      

      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#te2"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
             ¿Con qué frecuencia puedes desintoxicarte?</h5>
          </a>
        </div>
        <div id="te2" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Puede hacer nuestro Programa de desintoxicación de 30 días tan a menudo como sienta que su cuerpo lo necesita. Recomendamos tomar al menos un descanso de 7 días entre la desintoxicación para descansar su cuerpo y tomar nuestro Profit Tea. </p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#te3"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
            ¿Cómo se preparan los tés?</h5>
          </a>
        </div>
        <div id="te3" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Nuestras mezclas de té son súper simples de preparar. Agregas 1 cucharadita de Skinny Tea a tu termo o infusor, y luego colocas las hojas en 8-12 onzas de agua caliente. Deje reposar durante al menos 3-5 minutos y luego bébalo. Pon una de las bolsas de Colon Tea en una taza y llénalo con 8 onzas de agua caliente. Recomendamos remojar el Colon Tea durante 1-3 minutos la primera vez y posteriormente ir aumentando el tiempo de infusión.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#te4"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
            ¿Es el Plan Detox para mujeres y hombres?</h5>
          </a>
        </div>
        <div id="te4" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>¡Seguro que lo es! Todos, sin importar si son hombres o mujeres, tienen una gran cantidad de toxinas en sus órganos internos. Es muy importante desintoxicarse cada dos meses para asegurarse de que su cuerpo elimine todos los desechos innecesarios que contiene.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#te5"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
            ¿Puedo desintoxicarme durante el embarazo / lactancia?</h5>
          </a>
        </div>
        <div id="te5" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Nuestro programa de desintoxicación de 30 días incluye dos mezclas, Skinny Tea + Colon Tea. Si bien el Skinny Tea generalmente está aprobado para beber durante el embarazo o la lactancia como un reemplazo natural del café, NO se recomienda tomar el Colon Tea durante el embarazo o la lactancia. El Colon Tea elimina las toxinas del cuerpo y, mientras está embarazada o amamantando, quiere que su cuerpo conserve todos los nutrientes, por lo que la desintoxicación es imposible. Cuando ya no esté amamantando, le recomendamos volver a la normalidad con nuestro Programa de desintoxicación de 30 días.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#te6"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
             ¿El Colon Tea crea un efecto laxante?</h5>
          </a>
        </div>
        <div id="te6" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>El té de limpieza de colon crea un suave efecto laxante para eliminar todas las toxinas no deseadas. Por lo general, esto solo significa que vas al baño a primera hora cuando te despiertas. Puede experimentar calambres leves y visitas frecuentes al baño debido al efecto laxante. </p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#te7"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
            ¿Sus productos me dan rebote o efectos secundarios?</h5>
          </a>
        </div>
        <div id="te7" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>¡NO! Al contrario, todos nuestros productos benefician a tu salud. Están hechos de ingredientes naturales y orgánicos. No contienen ningún producto nocivo para tu cuerpo.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#te8"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
            ¿Debo cambiar mi dieta?</h5>
          </a>
        </div>
        <div id="te8" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Se recomienda para tener mejores resultados llevar una alimentación balanceada, no consumir grasas, alcohol, refrescos, azúcar, alimentos procesados. Nuestro detox no es sustituto de ninguna comida, es un complemento.</p>
            <p>No es necesario un plan de dieta específico, pero recomendamos comer lo más sano posible durante la desintoxicación. Al alimentar a su cuerpo con alimentos frescos y saludables, facilitará la desintoxicación del colon de todos los desechos que han estado allí durante años. Si continúa comiendo alimentos procesados y poco saludables, no solo causará estrés en el colon, sino que también llevará más tiempo para que su cuerpo muestre los resultados.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#te9"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
             ¿Cuántos kilos bajaré con el Plan Detox?</h5>
          </a>
        </div>
        <div id="te9" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Debido a que cada cuerpo es diferente e influye la alimentación y el ejercicio que hagas durante tu programa Detox la cantidad de kilos que puedes perder es variable, normalmente de 2-5 kilos.
Recomendamos antes de empezar tomar tus medidas y fotos para que notes la diferencia al terminar tu programa de desintoxicación.
</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#te10"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
             ¿Cuál es la diferencia entre el infusor y el Termo?</h5>
          </a>
        </div>
        <div id="te10" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Nuestros termos están hechos para llevar tus tés mientras viajas, y tienen un colador incorporado. El infusor debe colocarse en una taza o jarro, ya que es solo el colador y no una taza.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#te11"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
             ¿El Polvo de Superalimento Greens contiene cafeína?</h5>
          </a>
        </div>
        <div id="te11" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Sí, nuestro polvo verde contiene matcha que tiene cafeína natural a base de plantas. Sin embargo, esto no causará nerviosismo ni fallas, y te dará un impulso durante todo el día.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#te12"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
             ¿Cuántas veces al día puedes beber el Polvo de Superalimento Greens?</h5>
          </a>
        </div>
        <div id="te12" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Recomendamos usar una cucharada de nuestro polvo verde al día. Contiene el 80% de sus vitaminas diarias en una sola cucharada.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
     
    </div>
    <!--/.Accordion wrapper-->

  </div>
  <!-- Grid column -->
  
  
   <!-- Grid column -->
  <div class="col-md-10"><br>
   <h3>Línea facial</h3>
  
    <div class="accordion md-accordion accordion-2" id="accordionEx7" role="tablist"
      aria-multiselectable="true">

      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading1">
          <a data-toggle="collapse" data-parent="#accordionEx7" href="#facial1" aria-expanded="false"
            aria-controls="collapse1">
            <h5 class="mb-0 white-text text-uppercase font-thin">¿Es segura la mascarilla Detox para todo tipo de piel?</h5>
          </a>
        </div>
        <div id="facial1" class="collapse" role="tabpanel" aria-labelledby="heading1"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Sí, creamos nuestra mascarilla para que sea 100% natural, segura y efectiva para todo tipo de piel. </p>
          </div>
        </div>
      </div>
      <!-- Accordion-->

      

      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#facial2"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
             ¿Cómo usas la mascarilla Detox?</h5>
          </a>
        </div>
        <div id="facial2" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>¡Es súper fácil! Todo lo que tiene que hacer es humedecer su cara, aplicar una capa uniforme de la mascarilla en toda su cara o en cualquier área problemática, y luego lavarla después de unos 15 minutos cuando esté seca. Aplícate esta mascarilla antes de colocarte serums, aceites o humectantes en tu cara.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#facial3"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
            ¿Con qué frecuencia puedes usar la mascarilla Detox?</h5>
          </a>
        </div>
        <div id="facial3" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Recomendamos usar nuestra Mascarilla Detox 3-4 veces por semana.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#facial4"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
           ¿Cuáles son los ingredientes principales de la mascarilla Detox?</h5>
          </a>
        </div>
        <div id="facial4" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Los tres ingredientes más importantes son matcha, hierba de limón y arcilla de bentonita. Estos ingredientes trabajan de la mano para eliminar las impurezas de la piel y dejarla limpia y fresca.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#facial5"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
            ¿Con que frecuencia puedo usar el exfoliante de té verde?</h5>
          </a>
        </div>
        <div id="facial5" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Recomendamos usar nuestro exfoliante de té verde 3-4 veces a la semana.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#facial6"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
             ¿Es este exfoliante seguro para todo tipo de piel?</h5>
          </a>
        </div>
        <div id="facial6" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Sí, creamos nuestro exfoliante para que sea 100% natural, seguro y efectivo para todo tipo de piel.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#facial7"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
           ¿El Aceite Repair es seguro para pieles sensibles?</h5>
          </a>
        </div>
        <div id="facial7" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Sí, nuestro aceite Repair está creado con ingredientes relajantes y perfectos para pieles sensibles!</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
      
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#facial8"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
           ¿Puedo usar el Aceite Repair si tengo la piel grasa?</h5>
          </a>
        </div>
        <div id="facial8" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Contrariamente a la creencia popular, usar un aceite facial no hace que su piel sea más grasa. Agregar un aceite facial a su rutina de cuidado de la piel puede evitar que su piel produzca aceite en exceso, que es lo que causa la piel grasa. Si su tipo de piel es grasa, esta podría ser la pieza que falta en su rutina de cuidado de la piel.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
            
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#facial9"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
             ¿Cuándo puedes usar nuestro serum de vitamina C?</h5>
          </a>
        </div>
        <div id="facial9" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Puede usar este serum dos veces al día, por la mañana y antes de acostarse. Recomendamos usarlo después de limpiar su cara y antes de usar aceites o humectantes.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
      
            
      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading3">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx7" href="#facial10"
            aria-expanded="false" aria-controls="collapse3">
            <h5 class="mb-0 white-text text-uppercase font-thin">
            ¿Es seguro el serum de vitamina C para todo tipo de piel?</h5>
          </a>
        </div>
        <div id="facial10" class="collapse" role="tabpanel" aria-labelledby="heading3"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>Sí, creamos nuestro serum de vitamina C para que sea seguro y efectivo para todo tipo de piel.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->
     </div>
    <!--/.Accordion wrapper-->

  </div>
  <!-- Grid column -->
  
  
  
  <!-- Grid column -->
  <div class="col-md-10 pt-20"><br>
   <h3>Suplementos</h3>
  
    <div class="accordion md-accordion accordion-2" id="accordionEx7" role="tablist"
      aria-multiselectable="true">

      <!-- Accordion-->
      <div class="card">
        <div class="card-header rgba-stylish-strong z-depth-1 mb-1" role="tab" id="heading1">
          <a data-toggle="collapse" data-parent="#accordionEx7" href="#envios1" aria-expanded="false"
            aria-controls="collapse1">
            <h5 class="mb-0 white-text text-uppercase font-thin">Mi contenedor no está lleno. ¿Obtengo lo que pago?</h5>
          </a>
        </div>
        <div id="envios1" class="collapse" role="tabpanel" aria-labelledby="heading1"
          data-parent="#accordionEx7">
          <div class="card-body mb-1 rgba-grey-light white-text">
            <p>¡Sí! Nuestros productos se miden y venden por PESO. Cuando el polvo es dispensado en los contenedores, estos están casi llenos, sin embargo, durante el envío los polvos se asientan debido a las vibraciones, dejando espacio adicional. Esto se llama relleno flojo y es inevitable durante el envío y la manipulación. Dependiendo de cuánto tiempo permanezca el producto, se produce un mayor asentamiento. Recomendamos darle a su contenedor algunos batidos antes de usar para airear un poco el polvo. Tenga la seguridad de que este contiene todas sus porciones.</p>
          </div>
        </div>
      </div>
      <!-- Accordion-->

      

      
      
    </div>
    <!--/.Accordion wrapper-->

  </div>
  <!-- Grid column -->

</div>
  <!-- Grid row -->
                        
   
                        
         
               
                   
                    </div>
                    
                    
                    
                    <div class="col-md-3 aside aside--right" id="sideColumn">
                      
                       
                        <div class="aside-block-delimiter"></div>
                        <div class="aside-block">
                           <h2 class="text-uppercase">Post en fanspage</h2>
                           <!--caja de facebook-->
                            <div class="block left-module">
                            <div class="fb-page" data-href="https://www.facebook.com/naturalcareecu/" data-tabs="timeline" data-height="450px" data-small-header="false"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/naturalcareecu/"
                            class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/naturalcareecu/">Naturalcare</a></blockquote></div>
                            </div>
                            <!-- fin caja de facebook-->
                           
                           
                           
                           
                           
                        </div>
                     
                        <div class="aside-block-delimiter"></div>
                        <div class="aside-block">
                            <h2 class="text-uppercase">Síguenos</h2>
                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/naturalcareecu/" target="_blank" class="icon icon-facebook"></a></li>
                                <li><a href="https://www.instagram.com/naturalcare_ec/" target="_blank" class="icon icon-instagram"></a></li>
                            </ul>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
  
   
    
     
       
   
    
   <?php include('footer.php'); ?>
    
      
    
    <a class="back-to-top js-back-to-top compensate-for-scrollbar" href="#" title="Scroll To Top"><i class="icon icon-angle-up"></i></a>
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