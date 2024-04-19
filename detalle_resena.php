<?php
session_start();

if(isset($_GET['id'])) {
    $selectedData = $_GET['id'];
} else {
    $selectedData = 0;
}

include('config/app_config.php');

// Create the SQL query with proper escaping
$selectedData = mysql_real_escape_string($selectedData);
$sql = "SELECT * FROM reviews WHERE id = '$selectedData'";
$result = mysql_query($sql);

if ($result) {
    if (mysql_num_rows($result) > 0) {
        $row = mysql_fetch_assoc($result);
        $respond = json_decode($row['respond'], true); // Add true as the second parameter to return an associative array
        
        if (isset($respond["reply_name"])) {
            $replyName = intval($respond["reply_name"]);
            
            $userQuery = "SELECT * FROM usuario_admin WHERE id = $replyName";
            $userResult = mysql_query($userQuery);
            
            if ($userResult && mysql_num_rows($userResult) > 0) {
                $user = mysql_fetch_assoc($userResult);
                $respond["user"] = $user['usuario'];
                $respond["imagenes"] = $user['imagenes'];
            }
        }

        $item = array(
            'id' => $row['id'],
            'author' => $row['name'],
            'ageRange' => $row['age_range'],
            'date' => $row['review_date'],
            'rating' => $row['rating'],
            'title' => $row['title'],
            'reviewText' => $row['review_text'],
            'images' => $row['image_path_list'],
            'recommend' => $row['recommend'],
            'approve' => $row['approve'],
            'user' => $respond['user'],
            'imagenes' => $respond['imagenes'],
            'reply_date' => $respond['reply_date'],
            'description' => $respond['description'],

        );
    }
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
    <title>Detalle de reseña</title>
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
    <script type="text/javascript">
    function convertDate(inputDate) {
        if (inputDate === "") return "";
        var parts = inputDate.split(/[- :]/);
        var year = parts[0];
        var month = parts[1];
        var day = parts[2];
        var monthNames = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

        // Format the date in the desired output format
        var formattedDate = day + " de " + monthNames[parseInt(month) - 1] + " de " + year;
        return formattedDate;
    }
    function generateImages(images) {
        if (images === "") return "";
        var imageHTML = '';
        var images = images.split(',');
        images.forEach(function(image) {
            imageHTML += `<a href="javascript:void(0)"> <img class="img-thumbnail img-responsive" src="${image}"> </a></div>`
        });
        return imageHTML;
    }
    function generateRatingStars(rating) {
        const maxStars = 5;
        let starsHTML = "";
        
        for (let i = 1; i <= maxStars; i++) {
            const starClass = (i <= rating) ? "fill" : "";
            starsHTML += `<i class="icon-star ${starClass}"></i>`;
        }
        
        return starsHTML;
    }
    </script>
    <style type="text/css">
        /* Star icon styling */
        .icon-star {
          font-size: 20px;
          color: #27c7d8;
        }

        /* Filled star icon */
        .icon-star.fill:before {
          content: "★";
        }

        /* Empty star icon */
        .icon-star:before {
          content: "☆";
        }
    </style>
</head>

<body>
    
    <div id="wrapper">

       
        <!-- Left navbar-header -->
        <?php include('menu.php'); ?>
        <!-- final Left navbar-header --> 
        
        
        
        
        
                               <!------------ modal de estados ----------------->
                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel2">Actualizar estado</h4>
                                            </div>
                                            <div class="modal-body">
                                               
                                            <div class="form-group m-b-40">
                                                <select class="form-control p-0" id="input6" required>
                                                <option>elije</option>
                                                <option>Orden recibida</option>
                                                <option>entregada al courier</option>
                                                <option>Entregado con éxito</option>
                                                <option>Cancelado</option>
                                             </select><span class="highlight"></span> <span class="bar"></span>
                                            </div>
                                            
                                            <div class="form-group m-b-40">
                                                <div class="form-group m-b-40">
                                                <span class="help-block"><small>bryan este campo de aquí solo aparece con el estado de "entregado al courier", pilas</small></span>  
                                            <label for="input1">Indique el número de guía</label>
                                     <input type="text" class="form-control" id="input1" required><span class="highlight"></span> <span class="bar"></span>
                                        
                                       </div>
                                            </div>
                                            
                       
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary">Guardar</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- modal de estados-->
        
        
        
        
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                            </div>
                </div>
                <!-- /.row -->
                <div class="row">
              
                    
                    <div class="col-md-12">
                        <div class="white-box printableArea">
                            <div class="card-body p-t-0">
                                       
                                     
                                       
                                        <div class=" shadow-none">
                                           <div class="card-body">
                                                <h5 class="card-title m-b-0"><script>document.write(convertDate(<?php echo json_encode($item["date"]); ?>));</script></h5>
                                            </div> 
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex m-b-40">
                                                    
                                                    
                                                     <div class="col-auto">
                                        <div class="circulo-inicial"><span class="inicial"><script>document.write((<?php echo json_encode($item["author"]); ?>).charAt(0));</script></span></div>
                                    </div>
                                                   
                                                   
                                                    <div class="p-l-10">
                                                        <h4 class="m-b-0"><script>document.write(<?php echo json_encode($item["author"]); ?>);</script></h4>
                                                        <small class="text-muted">Rango edad: <script>document.write(<?php echo json_encode($item["ageRange"]); ?>);</script></small>
                                                       
                                                    </div>
                                                    
                                                   
                                                </div>
                                                <p><b><script>document.write(<?php echo json_encode($item["title"]); ?>);</script></b></p>
                                                <p><script>document.write(<?php echo json_encode($item["reviewText"]); ?>);</script></p>
                                                
                                                <div class="card-body">
                                                <h4>Fotos </h4>
                                                <div class="row">
                                                    <div class="col-md-2">                                                        
                                                        <script>
                                                            document.write(
                                                                generateImages(<?php echo json_encode($item["images"]); ?>)
                                                            );

                                                        </script>
                                                    </div>
                                                  
                                                </div>
                                                
                                                <div class="row"><div class="col-sm-6">
                                                   <div class="b-all m-t-20 p-20">
                                                    <p class="">Valoración</p>
                                                        <div class="review-item_rating">
                                                            <script>
                                                                document.write(
                                                                    generateRatingStars(<?php echo json_encode($item["rating"]); ?>)
                                                                );
                                                            </script>
                                                        </div>
                                                </div></div>
                                                <div class="col-sm-6">
                                                <div class="b-all m-t-20 p-20">
                                                <ul class="list-inline list-unstyled ">
                                                    <li class="list-inline-item"><small>Recomendarías este producto?</small></li>
                                                    <!-- <div class="list-inline-item"><div class="yes"></div> </div> -->
                                                    <div class="list-inline-item"><div class=<?php echo json_encode($item["recommend"] == '1' ? 'yes' : 'no'); ?> style="top: 10;">                                   
                                                    </div>
                                                </ul></div></div>
                                                 <hr> </div>
                                                
                                            </div>
                                                
                        
                    
                    <div class="post-comment respuesta m-l-15 m-t-20">
                                <div class="row">
                                    <div class="col-auto">
                                        <script>
                                            document.write(
                                                <?php echo json_encode($item["user"] != null ? '<div class="post-comment-author-img"><img src="../images/user-natural.png" alt="" class="img-fluid"></div>' : '<div></div>'); ?>
                                            );
                                        </script>
                                    </div>
                                    <div class="col">
                                        <div class="post-comment-author"><script>document.write(<?php echo json_encode($item["user"] !== null ? $item["user"] : ""); ?>);</script></div>
                                        <div class="post-comment-date"><small><script>document.write(convertDate(<?php echo json_encode($item["reply_date"] !== null ? $item["reply_date"] : ""); ?>));</script></small></div>
                                        <div class="post-comment-text">
                                            <p><script>document.write(<?php echo json_encode($item["description"] !== null ? $item["description"] : ""); ?>);</script></p>
                                        </div>
                                        
                                    </div>
                                </div>
                    </div>
                                           
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
                <!-- /.row -->
                
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
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

</body>

</html>
