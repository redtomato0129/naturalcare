<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    include('config/app_config.php');
    $scat = "SELECT *FROM categorias WHERE estado='1'";
    $rcat = mysql_query($scat);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="monadecloset">
    <link rel="icon" type="image/png" sizes="16x16" href="imagenes/favicon.png">
    <title>Publicar productos</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
     <!-- multiselect CSS -->
   
    <link href="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
   
    <link href="../plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="../plugins/bower_components/dropify/dist/css/dropify.min.css">
    
    <!-- Popup CSS -->
    <link href="../plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
     <!-- i check -->
     <link href="../plugins/bower_components/icheck/skins/all.css" rel="stylesheet">
     <link href="css/color.css" rel="stylesheet">
      <!-- switcher -->
      <link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
 <link href="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
 <!--alerts CSS -->
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
 
 

    
    
    
     
  </head>

<body>
    
    <div id="wrapper">
        
        <?php include('menu.php'); ?>
        
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                
                
                <!-- breadcup-->
                <div class="row bg-title" style="background: url(imagenes/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title" style="color: #FFF;">Panel de Administración</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        
                    </div>
                 </div>
                 <!-- breadcup-->
                
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Publicar productos</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                
                                
                                    
                             <form>
                           
                                     <hr>
                                     <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group m-b-40">
                                        <label for="input1">Nombre del producto</label>
                                           <input type="text" class="form-control" id="nombre" required><span class="highlight"></span> <span class="bar"></span>
                                           
                                       </div>
                                       </div>
                                        
                                         <div class="col-md-6">
                                             <div class="form-group m-b-40">
                                               <label for="input3">Código de item (SKU)</label>
                                            <input type="text" class="form-control" id="codigo" required><span class="highlight"></span> <span class="bar"></span>
                                          </div>
                                        </div>
                                      </div>
                                     <!-- fin de bloque-->
                                     
                                     
                                     
                                     <!-- inicio de bloque-->
                                     <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label>Precio </label> 
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="ti-money"></i></div>
                                                            <input type="number" class="form-control" id="precio" placeholder="Precio"> </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                       <label>Aplica Envio </label> 
                                                        <div class="input-group">
                                                            <select class="form-control p-0" id="envio" required>
                                                            <option value="1">SI</option>
                                                            <option value="0">NO</option>
                                                
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                               
                                            
                                                
                                                
                                        </div>
                                     <!-- fin de bloque-->
                                     
                                     
                                
                                                                         
                                   <!-- inicio de bloque-->
                                       <hr>
                                   <div class="row">
                                   <div class="col-md-12">
                                   <div class="form-group m-b-5">
                                      <label for="input7">Descripción</label>
                                       <textarea class="form-control" rows="4" id="descripcion" required></textarea><span class="highlight"></span> <span class="bar"></span>                                    
                                  </div>
                                  </div>
                                  
                                  
                                  
                                  </div><br><br>
                                  <!-- fin de bloque-->
                                     
                                     
                                     
                                     
                                     <!-- inicio de bloque-->
                                         <hr>
                                     <h3 class="box-title m-b-0">Categoría y Subcategoría</h3>
                                      <p class="text-muted m-b-30"> Seleccione a que línea de negocio pertenece el producto</p>
                                  
                                     <div class="row color-box">
                                     
                                     <div class="col-md-4 col-xs-12">
                                     <div class="form-group ">
                                      <label for="input6">Categoria</label>
                                            <select class="form-control p-0" id="categoria" onchange="buscar_sub()" required>
                                                <option value="0"></option>
                                                <?php 
                                                while($fcat = mysql_fetch_array($rcat)){
                                                ?>
                                                <option value="<?php echo $fcat['id'] ?>"><?php echo $fcat['descripcion']; ?></option>
                                                <?php } ?>
                                             </select><span class="highlight"></span> <span class="bar"></span>
                                           
                                        </div>
                                     </div>
                                     
                                     
                                     <div class="col-md-4 col-xs-12"  id="sub">
                                     <div class="form-group ">
                                      <label for="input6">Sub-Categoria</label>
                                            <select class="form-control p-0" id="subcategoria" required>
                                                <option></option>
                                                
                                             </select><span class="highlight"></span> <span class="bar"></span>
                                           
                                        </div>
                                     </div>
                                     
                                     
                                     <div class="col-md-4">
                                     <div class="form-group ">
                                     <label for="input6">Tallas</label>
                                            <select class="select2 m-b-10 select2-multiple" id="tallas" multiple="multiple" data-placeholder="Tallas disponibles">
                                                <option value="NO APLICA">NO APLICA</option>
                                            <?php  
                                            $stipos = "SELECT *FROM tipos_tallas WHERE estado='1'";
                                            $rtipos = mysql_query($stipos);
                                            while($ftipos = mysql_fetch_array($rtipos)){
                                            ?>    
                                            <optgroup label="<?php echo $ftipos['tipo_talla'] ?>">
                                               
                                                <?php 
                                                    $stallas = "SELECT *FROM tallas WHERE estado='1' and tipo_talla='".$ftipos['id']."'";
                                                    $rtallas = mysql_query($stallas);
                                                    while($ftallas = mysql_fetch_array($rtallas)){
                                                ?>
                                                 <option value="<?php echo $ftallas['talla']; ?>"><?php echo $ftallas['talla']; ?></option>
                                            <?php } ?>
                                            </optgroup>
                                
                                        <?php } ?>
                                
                            </select>
                                        </div>
                                     </div>
                                     
                                    </div>
                                     <!-- fin de bloque-->
                                     
                                     
                                     <!-- inicio de bloque-->
                                       <div class="row">
                                        
                                       <div class="col-md-5">
                                           
                                           <div class="form-check">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="chkuso" onclick="validarcheck(1)">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">colocar modo de uso</span>
                                            </label>
                                        </div>
                                           
                                           
                                     <div class="form-group  ">
                                      <input type="text" class="form-control" id="uso" disabled="disabled" required>
                                     </div>  </div> 
                                        
                                        <div class="col-md-5">
                                           
                                           <div class="form-check">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="chkbeneficios" onclick="validarcheck(2)">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">colocar beneficios</span>
                                            </label>
                                        </div>
                                           
                                           
                                     <div class="form-group  ">
                                      <input type="text" class="form-control" id="beneficios" disabled="disabled" required>
                                        </div>
                                     </div> 
                                        
                                        
                                        <div class="col-md-5">
                                           
                                           <div class="form-check">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="chkfrecuencia" onclick="validarcheck(3)">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">colocar frecuencia</span>
                                            </label>
                                        </div>
                                           
                                           
                                     <div class="form-group  ">
                                      <input type="text" class="form-control" id="frecuencia" disabled="disabled" required>
                                        </div>
                                     </div> 
                                         
                                         
                                     </div>
                                     <!-- fin de bloque-->
                                     
                                     
                                     
                                     
                                     
                                     <!-- inicio de bloque-->
                                       <hr>
                                     <h3 class="box-title m-t-30">Fotos</h3>
                                      <p class="text-muted m-b-30"> Sube hasta 4 fotos por producto</p>
                                    
                                     <div class="row">
                                                <div class="col-md-5">
                                                <p class="text-muted m-t-5">Foto principal</p>
                                                  <input type="file" id="foto_uno" name="archivo1" value="" data-parsley-id="0521">
                                                  <p class="text-muted m-t-5"> foto 2</p>
                                                  <input type="file" id="foto_dos" name="archivo2" value="" data-parsley-id="0521">
                                                  <p class="text-muted m-t-5"> foto 3</p>
                                                  <input type="file" id="foto_tres" name="archivo3" value="" data-parsley-id="0521"> 
                                                  <p class="text-muted m-t-5"> foto 4</p>
                                                  <input type="file" id="foto_cuatro" name="archivo4" value="" data-parsley-id="0521"> 
                                                </div>
                                                 
                                                
                                         
                        
                    </div>
                   <!-- fin de bloque-->
                   
                   
                   <!-- inicio de bloque-->
                                       <hr>
                                     <div class="row">
                                          <div class="col-md-11">
                                                    <div class="form-group">
                                                        <label class="control-label">Coloque una valoración</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline p-0">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="radio" id="radio1" value="1">
                                                                    <label for="radio1">1 Estrella</label>
                                                                </div>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="radio" id="radio1" value="2">
                                                                    <label for="radio2">2 Estrellas</label>
                                                                </div>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="radio" id="radio1" value="3">
                                                                    <label for="radio2">3 Estrellas</label>
                                                                </div>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="radio" id="radio1" value="4">
                                                                    <label for="radio2">4 Estrellas</label>
                                                                </div>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="radio" id="radio1" value="5">
                                                                    <label for="radio2">5 Estrellas</label>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                      </div>

                                       <div class="col-md-12">
                                        <h3 class="box-title m-b-0">elija los colores disponibles</h3>
                                        <div class="form-group">
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <div class="list-color-filter" id="inicio">
                                             <?php $col="select *from colores WHERE estado='1'";
                                                   $rcol=mysql_query($col);
                                                    while($fcol = mysql_fetch_array($rcol)){ 
                                              ?>
                                               <a href="<?php echo $fcol['color']; ?>" id="inicio" style="background-color:<?php echo $fcol['color']; ?>"></a>
                                             <?php  } ?>
                                          </div>
                                          </div>
                                          </div>
                                          </div>
                                      
                                      
                                      
                                      <div class="row"></div>
                                         
                                         
                                         
                                                  
                                        <hr>
                                        <div class="form-actions m-t-40">
                                       <input type="button" class="btn btn-success model_img" onclick="guardar_producto()" id="completar" value="Publicar Producto" />
                                        </div>
                                        
                                       
                                    </form>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    <div class="col-md-6">
                       
                                             
                        <div class="white-box">
                        <h3 class="box-title">Plan de Recompensas</h3>  
                         <div class="table-responsive">
                                <input type="checkbox" checked class="js-switch" data-color="#13dafe" /> <!--Deshabilitar/Habilitar-->
                         </div><br>
                           
                           <div class="row">
                                    <div class="col-md-11">
                                     <div class="form-group ">
                                     <label for="input6">Plan Disponible</label>
                                <select class="select2 m-b-10 select2-multiple" multiple="multiple" data-placeholder="Plan Disponible">
                                <optgroup label="elija:">
                                    <option value="BRONCE">BRONCE</option>
                                    <option value="PLATA">PLATA</option>
                                    <option value="ORO">ORO</option>
                                </optgroup>
                                </select>
                                        </div>
                                     </div>
                            </div>
                                    
                             <!-- inicio de bloque-->
                                     <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group m-b-40">
                                        <label for="input1">Cantidad de puntos</label>
                                           <input type="text" class="form-control" id="cant-puntos" required><span class="highlight"></span> <span class="bar"></span>
                                           
                                       </div>
                                       </div>
                                        
                                 
                                      </div>
                                     <!-- fin de bloque-->
                                     
                                     
                            
                            <hr>
                                        <div class="form-actions m-t-40">
                                        <button type="submit" class="btn btn-primary model_img" id="sa-success"> <i class="fa fa-check"></i> boton con efecto al guardar con éxito</button>
                                        </div>
                           
                        </div>
                        
                    </div>
                </div>
                <!--row -->
                
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2018 &copy; Naturalcare </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
   
   
    
   
    
    <!-- Magnific popup JavaScript -->
    <script src="../plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="../plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    
  


<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="../plugins/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="../plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="../plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="../plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
    
     
 <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    
    
    
    
    
    
    
    
    
    
    <script src="../plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../plugins/bower_components/multiselect/js/jquery.multi-select.js"></script>
<script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());

        });
        // For select 2

        $(".select2").select2();
        $('.selectpicker').selectpicker();

        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }

        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();

        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });

        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });

        // For multiselect

        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });

        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });

    });
    </script>
    
<!-- color picker -->
    <script src="js/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="js/colorpicker/docs.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="js/theme.js"></script>
    <script>
        function validarcheck(id)
        {
            switch(id)
            {
              case 1:
                if( $('#chkuso').prop('checked') )
                {
                    $('#uso').removeAttr("disabled");
                }else
                {
                    $('#uso').attr("disabled", "disabled");
                }
                break;
              case 2:
                if( $('#chkbeneficios').prop('checked') )
                {
                    $('#beneficios').removeAttr("disabled");
                }else
                {
                    $('#beneficios').attr("disabled", "disabled");
                }
                break;
              case 3:
              if( $('#chkfrecuencia').prop('checked') )
                {
                    $('#frecuencia').removeAttr("disabled");
                }else
                {
                    $('#frecuencia').attr("disabled", "disabled");
                }
              break;
              
            }
        }
  
            function buscar_sub()
            {
                    var cat = document.getElementById("categoria").value;
                    var paqueteDeDatos = new FormData();
                    paqueteDeDatos.append('pais', cat);
              
            $.ajax({
            type: "POST",
            url: "procesos/buscar_sub.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                    $("#sub").html(msg);
           
         
                }); 
            }




function eliminar(id){
         
        swal({   
            title: "Deseas Eliminarlo?",   
            text: "confirmalo por favor",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Si, deseo eliminarlo!",   
            closeOnConfirm: false 
        }, function(){   
                    var paqueteDeDatos = new FormData();
                   
                    paqueteDeDatos.append('id', id);
              
            $.ajax({
            type: "POST",
            url: "procesos/deletepro.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
             swal({ 
                    title: "Producto Inactivo!",
                    text: "",
                    type: "success" 
                    },
                    function(){
                    window.location.href = 'publicar_productos.php';
                    });

            });
                           });

           
         
                }



         function guardar_producto(){
          $('#completar').attr('onclick','');
          var nombre = document.getElementById("nombre").value;
          var codigo = document.getElementById("codigo").value;
          var precio = document.getElementById("precio").value;
          var descripcion = document.getElementById("descripcion").value;
          var categoria = document.getElementById("categoria").value;
          var subcategoria = document.getElementById("subcategoria").value;
          var envio = document.getElementById("envio").value;
          var mostrar = "";
          var uso = "";
          var beneficios = "";
          var frecuencia = "";
          var puntos =  $('input:radio[name=radio]:checked').val();

          if( $('#chkuso').prop('checked') )
            {
                uso = document.getElementById("uso").value;
            }

          if( $('#chkfrecuencia').prop('checked') )
            {
                frecuencia = document.getElementById("frecuencia").value;
            }

          if( $('#chkbeneficios').prop('checked') )
            {
                beneficios = document.getElementById("beneficios").value;
            }
         
          bandera='0';
         
         
          var colores = ":;:";
           $("a#inicio.active").each(function(){
             colores += ($(this).attr('href'))+':;:';
            
            });

            fi = colores.length - 1; // calculo cantidad de caracteres menos 1 para eliminar la coma final
            //colores = colores.substr( 0, fi ); // elimino la coma final

           var selected = '';
           var tallas = ':;:';
            $('#tallas option:selected').each(function(){
            tallas += $(this).val() + ':;:'; 
            });
            fin = tallas.length - 1; // calculo cantidad de caracteres menos 1 para eliminar la coma final
           // tallas = tallas.substr( 0, fin ); // elimino la coma final



        if(nombre){
            if(codigo){
                if(precio){
                 if(descripcion){
                     if(categoria){
                         if(subcategoria){
                                if(tallas){
                                  var paqueteDeDatos = new FormData();
                                    paqueteDeDatos.append('archivo', $('#foto_uno')[0].files[0]);
                                    paqueteDeDatos.append('archivo_dos', $('#foto_dos')[0].files[0]);
                                    paqueteDeDatos.append('archivo_tres', $('#foto_tres')[0].files[0]);
                                    paqueteDeDatos.append('archivo_cuatro', $('#foto_cuatro')[0].files[0]);
                                    paqueteDeDatos.append('nombre', nombre);
                                    paqueteDeDatos.append('codigo', codigo);
                                    paqueteDeDatos.append('precio', precio);
                                    paqueteDeDatos.append('descripcion', descripcion);
                                    paqueteDeDatos.append('categoria', categoria);
                                    paqueteDeDatos.append('subcategoria', subcategoria);
                                    paqueteDeDatos.append('tallas', tallas);
                                    paqueteDeDatos.append('puntos', puntos);
                                    paqueteDeDatos.append('colores', colores);
                                    paqueteDeDatos.append('uso', uso);
                                    paqueteDeDatos.append('beneficios', beneficios);
                                    paqueteDeDatos.append('frecuencia', frecuencia);
                                    paqueteDeDatos.append('envio', envio);
            //alert(editor);
            $.ajax({
            type: "POST",
            url: "procesos/savepro.php",
            contentType: false,
                        data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
                        processData: false,
                        cache: false, 
                         }).done(function( msg ) {
                          if(msg.trim() == "00::00")
                          {
                            swal("Alto!","Ya existe un producto publicado con ese código" , "error");
                             $('#completar').attr('onClick', 'guardar_producto();');
                          }else
                          {
                           swal({ 
                                  title: "Correcto!",
                                  text: "",
                                  type: "success" 
                                  },
                                  function(){
                                  location.reload();
                                  });
                           }

            });

           }else{
            swal("Alto!","Seleciona una talla" , "error");
            $('#completar').attr('onClick', 'guardar_producto();');
            
           }

           }else{
             swal("Alto!","Ingresa una Subcategoría" , "error");
             $('#completar').attr('onClick', 'guardar_producto();');
            
           }

           }else{
             swal("Alto!","Ingresa una Categoría" , "error");
             $('#completar').attr('onClick', 'guardar_producto();');
            
           }

         
              }else{
            swal("Alto!","Ingresa una descripción" , "error");
            $('#completar').attr('onClick', 'guardar_producto();');
            
           }

          
           }else{
            
             swal("Alto!","Ingresa un precio" , "error");
             $('#completar').attr('onClick', 'guardar_producto();');
           }

           
            }else{
            swal("Alto!","Ingresa un código para tu producto" , "error");
            $('#completar').attr('onClick', 'guardar_producto();');
            
           }
            
            }else{
            swal("Alto!","Ingresa un nombre para tu producto" , "error");
            $('#completar').attr('onClick', 'guardar_tienda();');
            
           }
         
                }




    </script>
    



<!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    
</body>

</html>
