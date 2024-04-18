<?php
session_start();
if($_SESSION['LOGUEO'] == '1')
{
    
      include('config/app_config.php');
      $sadmin = "SELECT *FROM usuario_admin";
      $radmin = mysql_query($sadmin);
      $fadmin = mysql_fetch_array($radmin);
     
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="icon" type="image/png" sizes="16x16" href="imagenes/favicon.png">
    <title>Reseñas</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
     <link href="../plugins/bower_components/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
  
 <!-- switcher -->
      <link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
 <link href="../plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
 <!--alerts CSS -->
    <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        .vertical-center {
            display: flex;
            align-items: center; /* Align items vertically at the center */
        }
    </style>
    
</head>

<body>
    
    <div id="wrapper">
        <?php include('menu.php'); ?>
        
        
        <!------------ modal de respuesta ----------------->
                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel2">Responder reseña</h4>
                                            </div>
                                            <div class="modal-body">
                                               
                                            <div class="form-group m-b-40">
                                                <label for="input7">Descripción</label>
                                       <textarea class="form-control" rows="4" selectedID="" id="input7" required></textarea><span class="highlight"></span> <span class="bar"></span>     
                                            </div>
                                            
                                            
                                            
                       
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary" id = "guardarBtn">Guardar</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- modal de estados-->
        
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                
              
                
                
                <!-- breadcup-->
                <div class="row bg-title" style="background: url(imagenes/heading-title-bg.jpg) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title" style="color: #FFF;">Reseñas </h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                     </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        
                    </div>
               </div>
            <!-- breadcup-->
                
                
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                        
                              <div class="table-responsive">
                                <table class="table product-overview" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Autor</th>
                                            <th>Comentario</th>
                                            <th>Al producto:</th>
                                            <th>Fecha</th>
                                           
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td>Christian Cruz</td>
                                            <td>
                                            <div class="row">
                                            <p>Lorem ipsum dolor sit amet consestuer adicpising elitr anno dolor sit amet. Lorem ipsum dolor sit amet consestuer adicpising elitr anno dolor sit amet. Lorem ipsum dolor sit amet consestuer adicpising elitr anno dolor sit amet. Lorem ipsum dolor sit amet consestuer adicpising elitr anno dolor sit amet. Lorem ipsum dolor sit amet consestuer adicpising elitr anno dolor sit amet.</p><br>
                                            </div>
                                            
                                            
                                            <div class="row">
                                                <div class="col-sm-6 text-left"><div class="btn-group mt-3" data-bs-toggle="buttons" role="group">
                                            
                                            <label class="btn btn-info text-white">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="options" value=" aprobar"
                                                        class="form-check-input">
                                                    <label class="form-check-label" for="customRadio2"> <i
                                                            class="ti-check text-active" aria-hidden="true"></i>
                                                          Aprobar</label>
                                                </div>
                                            </label>
                                            <label class="btn btn-danger active text-white">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio3" name="options" value=" rechazar"
                                                        class="form-check-input">
                                                    <label class="form-check-label" for="customRadio3"> <i
                                                            class="text-active pr-10 btn-sm" aria-hidden="true"></i>
                                                          Rechazar</label>
                                                </div>
                                            </label>
                                        </div>
                                            </div>
                                                <div class="col-sm-6">
                                                    
                                                    <div class="d-flex justify-content-end align-items-center">
                          
                            
                            
                             <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><button type="button" class="btn btn-success d-none d-lg-block m-l-15 text-white"> Responder</button></a><br>
                             
                        </div>
                                                </div>
                                            </div>
                                            
                                            
                                            </td>
                                            <td>KIT FACIAL DE LIMPIEZA Y DESINTOXICACIÓN DE TÉ VERDE CON APLICADOR</td>
                                            <td>10/04/2024</td>
                                           
                                           
                                            <td>
                                            <a href= "detalle_resena.html"><div class="fileupload btn btn-info waves-effect waves-light"><span>Ver Detalle</span>                                            </div></a>
                                            </td>
                                        </tr>
                                        
                                        
                                        
                                        
                                      
                                       
                                   </tbody>
                                </table>
                            </div>
                       
                       
                       
                        </div>
                    </div>
                </div>
                <!--row -->
                
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; Naturalcare </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
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
    <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    </script>
    
    <!-- bt-switch -->
    <script src="../plugins/bower_components/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
        $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
        var radioswitch = function() {
            var bt = function() {
                $(".radio-switch").on("switch-change", function() {
                        $(".radio-switch").bootstrapSwitch("toggleRadioState")
                    }),
                    $(".radio-switch").on("switch-change", function() {
                        $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
                    }),
                    $(".radio-switch").on("switch-change", function() {
                        $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
                    })
            };
            return {
                init: function() {
                    bt()
                }
            }
        }();
        $(document).ready(function() {
            radioswitch.init();
            fetchReviews();
        });

        function fetchReviews() {
            const formData = new FormData();
            formData.append('type', 'getReviewsByAll');

            $.ajax({
                type: "POST",
                url: "../administrador/procesos/review.php",
                contentType: false,
                processData: false,
                data: formData,
                success: function(data) {
                    data.forEach(function(item) {
                        var row = `
                            <tr>
                                <td>${item.author}</td>
                                <td>
                                    <div class="row">
                                        <p>${item.reviewText}</p>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 text-left">
                                            <div class="btn-group mt-3" data-bs-toggle="buttons" role="group">
                                                <label class="btn btn-info text-white">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2_${item.id}" name="options_${item.id}" value="1"
                                                            class="form-check-input" ${item.approve === "1" ? 'checked' : ''} onchange="handleRadioChange(this)">
                                                        <label class="form-check-label" for="customRadio2_${item.id}"> <i
                                                                class="ti-check text-active" aria-hidden="true"></i>
                                                            Aprobar</label>
                                                    </div>
                                                </label>
                                                <label class="btn btn-danger active text-white">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio3_${item.id}" name="options_${item.id}" value="0"
                                                            class="form-check-input" ${item.approve === "0" ? 'checked' : ''} onchange="handleRadioChange(this)">
                                                        <label class="form-check-label" for="customRadio3_${item.id}"> <i
                                                                class="text-active pr-10 btn-sm" aria-hidden="true"></i>
                                                            Rechazar</label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="d-flex justify-content-end align-items-center vertical-center">
                                                <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><button type="button" class="btn btn-success d-none d-lg-block m-l-15 text-white" onclick="showResponderModal('${item.id}')"> Responder</button></a><br>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>${item.product}</td>
                                <td>${formatDate(item.date)}</td>
                                <td>
                                    <a href="detalle_resena.html">
                                        <div class="fileupload btn btn-info waves-effect waves-light"><span>Ver Detalle</span></div>
                                    </a>
                                </td>
                            </tr>
                        `;
                        $('#myTable tbody').append(row);
                        // Append or handle row as needed
                    });
                }
            });
        }

        function showResponderModal(itemId) {
            // Set the data attribute 'data-item-id' on the modal to store the item ID
            $('#input7').data('selectedID', itemId);
        }

        function formatDate(dateString) {
            var date = new Date(dateString);
            var formattedDate = date.toLocaleDateString('en-GB', {year: 'numeric', month: '2-digit', day: '2-digit'}).replace(/\//g, '/');
            return formattedDate;
        }

        function handleRadioChange(radioBtn) {
            const selectedItem = radioBtn.id.split('_')[1];
            const selectedValue = radioBtn.value;
            
            // Call your API with selected item ID and value
            console.log(`API request triggered for item id: ${selectedItem} with value: ${selectedValue}`);

            const formData = new FormData();
            formData.append('type', 'reverseApprove');
            formData.append('id', selectedItem);
            formData.append('value', selectedValue);
            $.ajax({
                type: "POST",
                url: "../administrador/procesos/review.php",
                contentType: false,
                processData: false,
                data: formData,
                success: function(data) {
                    console.log(data);
                    alert(data.message);
                }
            });
        }
        document.getElementById('guardarBtn').addEventListener('click', function() {
            const description = document.getElementById('input7').value;
            const id = $('#input7').data('selectedID');

            const formData = new FormData();
            formData.append('type', 'replyReview');
            formData.append('id', id);
            formData.append('description', description);
            $.ajax({
                type: "POST",
                url: "../administrador/procesos/review.php",
                contentType: false,
                processData: false,
                data: formData,
                success: function(data) {
                    console.log(data);
                    alert(data.message);
                }
            });
        });
    </script>
   
  
    
    <!-- Sweet-Alert  -->
    <script src="../plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
</body>

</html>
