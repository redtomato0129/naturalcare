
<?php

include('../config/app_config.php');

if($_POST['ordenar'] == '1')
{
	$orden = "nombre";
}else
{
	$orden = "precio";
}
 $ruta = "../administrador/imagenes";

$sultimo = "SELECT *FROM productos WHERE estado='1' and subcategoria='".$_POST['subcategoria']."' ORDER BY ".$orden." desc LIMIT ".$_POST['registros']."";
$rultimo = mysql_query($sultimo);


 $mostrar = '';

 while($fproductos = mysql_fetch_array($rultimo)){ 
 $tallas = explode(":;:", $fproductos['tallas']);
$mostrar.=' <div class="prd prd-has-loader">
                        <div class="prd-inside">
                            <div class=""><a href="producto.php?id='.$fproductos["id"].'" class="prd-img"><img src="'.$ruta.'/productos/'.$fproductos["foto_uno"].'" data-srcset="'.$ruta.'/productos/'.$fproductos["foto_uno"].'" alt="Tyssot 1853" class="js-prd-img lazyload"></a>
                                
                            </div>
                            <div class="prd-info">
                                <div class="prd-tag prd-hidemobile"><a href="producto.php?id='.$fproductos["id"].'">'.$fproductos["nombre"].'</a></div>
                                <div class="prd-rating prd-hidemobile">';
                                    $cconp=0; while($fproductos['estrellas']> $cconp){ $cconp++; 
                                    $mostrar.='<i class="icon-star fill"></i>';
                                    } 
                               
                                $mostrar.='</div>
                                <div class="prd-price">
                                    <div class="price-new">$'.number_format($fproductos["precio"],2).'</div>
                                </div>
                                <div class="prd-hover">
                                    <div class="prd-action">
                                        <a href="producto.php?id='.$fproductos["id"].'"><input type="hidden"> <button class="btn" ><span>Ver producto</span></button></a>
                                        
                                    </div>
                                    <div class="prd-options prd-hidemobile"><span class="label-options">Presentación:</span>
                                        <ul class="list-options size-swatch">';
                                              for($i=1;$i<count($tallas);$i++){
                                        
                                       if($tallas[$i] != ":;:"  && $tallas[$i] != "" )
                                       { 
                                    $mostrar.='  <li><span>'.$tallas[$i].'</span></li>';
                                       } } 
                                            
                                      $mostrar.='  </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><input type="hidden" name="registros" id="registros" value="'.$_POST['registros'].'">       
                       ';
 }
 
echo $mostrar;
	



?>