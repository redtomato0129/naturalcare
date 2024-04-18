
!function($) {
    "use strict";

    var SweetAlert = function() {};

    //examples 
    SweetAlert.prototype.init = function() {
        
    //Basic
    $('#sa-basic').click(function(){
        swal("Here's a message!");
    });

    //A title with a text under
    $('#sa-title').click(function(){
        swal("Here's a message!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.")
    });

    //Success Message
    $('#sa-success').click(function(){
        swal("Correcto!", "El producto ya está visible en la tienda", "success")
    });
				
				//Success Message
    $('#sa-success2').click(function(){
        swal("Correcto!", "Dato agregado con éxito", "success")
    });
        
 		
				//Success Message
    $('#sa-notificacion').click(function(){
        swal("Correcto!", "el mensaje fu enviado con éxito", "success")
    });
				
				//Cambio de contrasena
    $('#sa-password').click(function(){
        swal("bien!", "La contraseña fue cambiada", "success")
    });
				
				//Cambio de contrasena2
    $('#sa-contrasena2').click(function(){
         swal({   
            title: "La contraseña fue cambiada!",   
            text: "I will close in 2 seconds.",   
            timer: 2000,   
            showConfirmButton: false 
        });
    });


 
				
				
				//crear cupón
    $('#sa-cupon').click(function(){
        swal("Correcto!", "el cupón de descuento se generó con éxito", "success")
    });
        
    //guardar_cambios
    $('#sa-cambios').click(function(){
        swal("Correcto!", "cambios guardados", "success")
    });

    //Warning Message
    $('#sa-warning').click(function(){
        swal({   
            title: "Deseas Eliminarlo?",   
            text: "confirmalo por favor",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Si, deseo eliminarlo!",   
            closeOnConfirm: false 
        }, function(){   
            swal("Eliminado!", "El producto fue borrado con éxito.", "success"); 
        });
    });
				
				
				//Warning Message
    $('#borrar_usuario').click(function(){
        swal({   
            title: "Deseas Eliminarlo?",   
            text: "confirmalo por favor",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Si, deseo eliminarlo!",   
            closeOnConfirm: false 
        }, function(){   
            swal("Eliminado!", "El usuario fue borrado con éxito.", "success"); 
        });
    });
				
				

    //Parameter
    $('#sa-params').click(function(){
        swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this imaginary file!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel plx!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("Deleted!", "Your imaginary file has been deleted.", "success");   
            } else {     
                swal("Cancelled", "Your imaginary file is safe :)", "error");   
            } 
        });
    });

    //Custom Image
    $('#sa-image').click(function(){
        swal({   
            title: "Ups!",    
            text: "Faltó agregar algo",   
            imageUrl: "../plugins/images/users/alerta.jpg" 
        });
    });

    //Auto Close Timer
    $('#sa-close').click(function(){
         swal({   
            title: "Auto close alert!",   
            text: "I will close in 2 seconds.",   
            timer: 2000,   
            showConfirmButton: false 
        });
    });


    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);