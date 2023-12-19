// Validaciones

// Page Registrar
$(document).ready(function () {


    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
          $('#scrollToTopBtn').fadeIn();
        } else {
          $('#scrollToTopBtn').fadeOut();
        }
      });
    
      // Desplazarse hacia arriba al hacer clic en el botón de desplazamiento hacia arriba
      $('#scrollToTopBtn').click(function() {
        $('html, body').animate({scrollTop : 0}, 800);
        return false;
      });

    $.validator.addMethod("onlyTextReg", function (value, element, args) {
        return /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ]+$/.test(value);

    }, 'Debe ingresar solo letras y sin espacios');


    // Regex para validar email
    $.validator.addMethod("emailreg", function (value, element, args) {
        return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(value);

    }, 'Formato de email es incorrecto');

    $.validator.addMethod("rutReg", function (value, element, args) {
        // return /^\d{7,9}[1-9]$/.test(value);  este valida que solo sea num, pero acepta repetir num.
        //no acepta puntos ni guiones ni repetir mas de x veces:
        return /^(?!.*(\d{3,8})\1)\d{7,9}[Kk]?$/.test(value);

    }, 'Rut no válido. No debe contener puntos ni guion');

    $.validator.addMethod("passReg", function (value, element, args) {
            return /^(?=.*[a-zA-Z])(?!.*\s).*$/.test(value);
        }, 'Contraseña debe tener al menos 1 letra y sin espacios.');

    // validar edad
    $.validator.addMethod("ageCheck", function(value, element) {
        let birthday = new Date(value);
        let today = new Date();
        let age = today.getFullYear() - birthday.getFullYear();
        birthday.setFullYear(today.getFullYear());
        if (today < birthday) {
          age--;
        }
        return age >= 18;
    }, "Debes ser mayor de 18 años para registrarte");

    $.validator.addMethod("dateMin", function(value, element, args) {

        let dateMin = Date.parse("01-01-1923");
        let dateInput = Date.parse(value);
        return dateInput >= dateMin;
    }, "La fecha ingresada no es valida");

    $("#registro_form").validate({
        rules: {
            rut: {
                required: true,
                rutReg: true,
                minlength: 8,
                maxlength: 9,
                
                // number: true,
            },
            nombre: {
                required: true,
                minlength: 3,
                maxlength: 25,
                onlyTextReg: true
            },
            apellido: {
                required: true,
                minlength: 4,
                onlyTextReg: true,
                maxlength: 30
                
            },
            nacimiento: {
                required: true,
                date: true,
                min: "1923-01-01",
                ageCheck: true
            },
            ciudad: {
                required: true,
                minlength: 4,
                maxlength: 100
            },
            direccion: {
                required: true,
                minlength: 5,
                maxlength: 150
            },
            email: {
                required: true,
                emailreg: true
            },
            telefono: {
                required: true,
                number: true,
                minlength: 8,
                maxlength: 8
            },
            password: {
                required: true,
                passReg: true,
                minlength: 8
            },
            password_repeat: {
                required: true,
                equalTo: "#password"
            },
            checkbox: {
                required: true
            }

        },

        messages: {
            rut: {
                required: "Ingrese su Rut",
                // number: "Solo se aceptan números",
                minlength: "Rut debe tener mínimo 8 dígitos",
                maxlength: "Rut debe tener máximo 9 dígitos",
            },
            nombre: {
                required: "Ingrese su nombre",
                minlength: "Nombre debe tener mínimo 3 caracteres",
                maxlength: "Nombre debe tener máximo 25 caracteres"
            },
            apellido: {
                required: "Ingrese su apellido",
                minlength: "Apellido debe tener mínimo 4 caracteres",
                maxlength: "Apellido debe tener máximo 30 caracteres"
            },
            nacimiento: {
                required: "Ingrese su fecha de nacimiento",
                date: "Fecha de nacimiento debe tener un formato válido",
                min: "La fecha ingresada no es valida"
    
                // minlength: "Fecha de nacimiento debe tener mínimo 8 dígitos",
            },
            ciudad: {
                required: "Ingrese su ciudad",
                minlength: "Ciudad debe tener mínimo 4 caracteres",
                maxlength: "Ciudad debe tener máximo 100 caracteres"
            },
            direccion: {
                required: "Ingrese su dirección",
                minlength: "Dirección debe tener mínimo 5 caracteres",
                maxlength: "Dirección debe tener máximo 150 caracteres"
            },
            email: {
                required: "Ingrese su email",
            },
            telefono: {
                required: "Ingrese su teléfono",
                number: "Solo se aceptan números",
                minlength: "Teléfono debe tener 8 dígitos",
                maxlength: "Teléfono debe tener 8 dígitos",
            },
            password: {
                required: "Ingrese su contraseña",
                minlength: "Contraseña debe tener mínimo 8 caracteres"
            },
            password_repeat: {
                required: "Ingrese su contraseña",
                minlength: "Contraseña debe tener mínimo 8 caracteres",
                equalTo: "Las contraseñas no coinciden"
            },
            checkbox: {
                required: "Debe aceptar los términos y condiciones"
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("type") === "checkbox") {
              error.insertAfter(element.parent());
            } else {
              error.insertAfter(element);
            }
          
            
        }
       
    });


    $("#registrar").click(function(event){


        if ($("#registro_form").valid() == false )  {
            event.preventDefault();


            return;
        }

    });



    // Validación page contact

    $("#contactForm").validate({
        rules: {
            nombre: {
                required: true,
                minlength: 3,
                maxlength: 25
            },
            email: {
                required: true,
                emailreg: true
            },
            telefono: {
                required: true,
                number: true,
                minlength: 8,
                maxlength: 8
            },
            mensaje: {
                required: true,
                minlength: 10,
                maxlength: 300
            }

        },

        messages: {
            nombre: {
                required: "Ingrese su nombre",
                minlength: "Nombre debe tener mínimo 3 caracteres",
                maxlength: "Nombre debe tener máximo 25 caracteres"
            },
            email: {
                required: "Ingrese su email",
            },
            telefono: {
                required: "Ingrese su teléfono",
                number: "Solo se aceptan números",
                minlength: "Teléfono debe tener 8 dígitos",
                maxlength: "Teléfono debe tener 8 dígitos",

            },
            mensaje: {
                required: "Ingrese un mensaje",
                minlength: "Mensaje debe tener mínimo 10 caracteres",
                maxlength: "Mensaje debe tener máximo 300 caracteres"
            }
        }
    });

    $("#contactSubmit").click(function(event){


        if ($("#contactForm").valid() == false ){
            event.preventDefault();
          return;
        }

    });



    // Validación page Login

    $("#loginForm").validate({
        rules: {
            rut: {
                required: true,                
                // number: true,
                minlength: 8,
                maxlength: 10,
            },
            password: {
                required: true,
                passReg: false,
                minlength:3
            }
        },
        messages: {
            rut: {
                required: "Ingrese su Rut",
                // number: "Solo se aceptan números",
                minlength: "Rut debe tener mínimo 8 dígitos",
                maxlength: "Rut debe tener máximo 9 dígitos",
            },
            password: {
                required: "Ingrese su contraseña",
                minlength: "La Contraseña debe tener mínimo 3 caracteres"
            }

        }
    });

    $("#loginSubmit").click(function(event){


        if ($("#loginForm").valid() == false ){
            event.preventDefault();
            return;
        }

    });


    // Validacion page Recuperar clave

    $("#recuperarForm").validate({
        rules: {
            email: {
                required: true,
                emailreg: true
            }
        },
        messages: {
            email: {
                required: "Ingrese su email",
            }
        }
    });

    $("#recuperarSubmit").click(function(event){


        if ($("#recuperarForm").valid() == false ){
            event.preventDefault();
          return;
        }

    });

    // Validación fechas mis loto coins
    $("#lotoCoinsForm").validate({
        rules: {
            fechaInicio: {
                required: true,
                date: true
            },
            fechaFin: {
                required: true,
                date: true
            }
        },
        messages: {
            fechaInicio: {
                required: "Ingrese una fecha",
                date: "Fecha desde debe tener un formato válido"

            },
            fechaFin: {
                required: "Ingrese una fecha",
                date: "Fecha hasta debe tener un formato válido"
            }
        }
   
    });

    $("#buscarSubmit").click(function(event){
        if ($("#lotoCoinsForm").valid() == false ){
            event.preventDefault();
          return;
        }
    });


  

     $(".consultas").click(function(event){
             let  formulario =$(this).parent().parent();
            formulario.validate({
                rules: {
                    mensaje: {
                        required: true
                    }
                },
                messages: {
                    mensaje: {
                        required: "Debe ingresar un mensaje",
                    }
                }
            });
       

        if (formulario.valid() == false ){
              event.preventDefault();
              return;
        }else{
            $(this).prop('disabled', true);
            formulario.submit();
        }


    });


});
