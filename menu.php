<?php
session_start();
if($_SESSION['LOGUEO'] != '1')
{
    header("Location: login.php");
}
?>
    <!--alerts CSS -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
     <!-- Sweet-Alert  -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
     <!-- Navegación -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.php"><b><!--This is dark logo icon--><img src="imagenes/isotipo_un_color.png"  class="dark-logo" /><!--This is light logo icon--><img src="imagenes/isotipo_un_color.png" alt="home" class="light-logo" /></b><span class="hidden-xs"><!--This is dark logo text--><img src="imagenes/logo_text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="imagenes/logo_text.png" alt="home" class="light-logo" /></span></a></div>
            </div>
        </nav>
        <!-- fin navegación -->
        
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div><img src="imagenes/isotipo_un_color.png" class="img-circle"></div>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Naturalcare <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="mi_perfil.php"><i class="ti-user"></i> Mi perfíl</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="fa fa-power-off"></i> Salir</a></li>
                        </ul>
                    </div>
                </div>
                <!-- menu de navegacion-->
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Buscar...">
                            <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    
                    
                    <!---------------- /inicio menu de administrador -------------->
                   
                    <li> <a href="#" class="waves-effect"><i class="linea-icon linea-basic fa fa-user"></i> <span class="hide-menu"> USUARIOS<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                           <li><a href="usuarios_registrados.php">Ver Usuarios</a></li>
                         </ul>
                    </li>
                    
                    <li> <a href="#" class="waves-effect"><i class="linea-icon linea-basic fa fa-shopping-bag"></i> <span class="hide-menu"> PRODUCTOS<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="publicar_productos.php">Publicar productos</a></li>
                            <li><a href="productos_publicados.php">Ver publicados</a></li>
                            <li><a href="precio-presentacion.php">Asociar precio/presentación</a></li>
                            <li><a href="gestion-colores.php">gestionar colores</a></li>
                         </ul>
                    </li>
                    
                   <li> <a href="#" class="waves-effect"><i class="linea-icon linea-basic fa-fw fa fa-bookmark"></i> <span class="hide-menu">MED/PRESENTACIÓN<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="gestion_tallas.php">Crear</a></li>
                        </ul>
                    </li>
                    
                   <li> <a href="categorias_subcategorias.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw  fa fa-tasks"></i><span class="hide-menu"> CATEGORÍAS Y SUB</span></a> </li>
                    
                    <li> <a href="envio.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw  fa fa-truck"></i><span class="hide-menu"> TARIFA ENVÍOS</span></a> </li>
                    
                    <li> <a href="cupones-descuento.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw  fa fa-tag"></i><span class="hide-menu"> CUPONES DE DCTO</span></a> </li>
                    
                    <li> <a href="#" class="waves-effect"><i class="linea-icon linea-basic fa-fw fa fa-gift"></i><span class="hide-menu"> PLAN DE PUNTOS<span class="fa arrow"></span></span></a> 
                       <ul class="nav nav-second-level">
                            <li><a href="beneficios.php">Beneficios</a></li>
                            <li><a href="canjepuntos.php">Canje</a></li>
                            <!-- <li><a href="crear-beneficios.php">Gestionar beneficios</a></li>
                            <li><a href="atributos.php">Atributos</a></li> 
                            <li><a href="recompensas.php">Recompensas</a></li>
                            <li><a href="ajustes.php">Ajustes</a></li> -->
                        </ul>
                    </li>
                    
                    <li> <a href="resenas.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw  fa-fw fa fa-comments"></i><span class="hide-menu">RESEÑAS</span></a> </li>
                    
                 
                    
                    
                    
                    
                  <li class="nav-small-cap">---     HOME</li>  
                 <li> <a href="personalizar_sliders.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw  fa fa-file-image-o"></i><span class="hide-menu"> SLIDERS</span></a> </li>
                 <li> <a href="publicidad.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw  fa fa-list-alt"></i><span class="hide-menu"> LÍNEA DESTACADA</span></a> </li>

                    
                    
                    
                    
                    
                    
                    <li class="nav-small-cap">--- INGRESOS</li>
                    <li> <a href="pedidos.php" class="waves-effect"><i class="linea-icon linea-basic fa-fw  fa-fw fa fa-dollar"></i><span class="hide-menu"> VER MIS PEDIDOS</span></a> </li>
                    
                    
                    
                   <li> <a href="#" class="waves-effect"><i class="linea-icon linea-basic fa fa-credit-card-alt"></i> <span class="hide-menu">TRANSACCIONES PAYMENTEZ<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="transacciones.php">Transacciones</a></li>
                            <li><a href="reversar.php">Reversar Valores</a></li>
                        </ul>
                    </li>  
                    
                    
                    
                    <li class="nav-small-cap m-t-10">--- MI PERFÍL</li>
                    <li><a href="mi_perfil.php" class="waves-effect"><span class="hide-menu"><i class="linea-icon linea-basic fa fa-gears"></i> EDITAR MIS DATOS</span></a></li>
                    <li><a href="parametros.php" class="waves-effect"><span class="hide-menu"><i class="linea-icon linea-basic fa fa-gears"></i> PARAMETROS</span></a></li>
                    <li><a href="../index.php" class="waves-effect"><span class="hide-menu"><i class="linea-icon linea-basic fa fa-power-off"></i> SALIR</span></a></li>
                    
                    
                    
                    
            
                    
                    
                    
                 </ul>
                <!-- fin menu de navegacion-->
            </div>
        </div>
        <!-- final Left navbar-header -->
        <script type="text/javascript">
            function soloNumeros(e){

          key = e.keyCode ? e.keyCode : e.which

  // backspace

  if (key == 8) return true

  // 0-9

  if (key > 47 && key < 58) {

    if (field.value == "") return true

    regexp = /.[0-9]{2}$/

    return !(regexp.test(field.value))

  }

  // .

  if (key == 46) {

    if (field.value == "") return false

    regexp = /^[0-9]+$/

    return regexp.test(field.value)

  }

  // other key

  return false

      }
        </script>