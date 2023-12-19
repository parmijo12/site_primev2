<!DOCTYPE html>
<html lang="en">

<head>
        <?php $this->load->view('header'); ?>

        
        
        <script type="text/javascript" src="<?php echo base_url('assets/homepage/js');?>/bootstrap.min.js"></script>

</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <?php $this->load->view('menu'); ?>

        <div class="bg-principal pt-5 mt-5">
            <div class="container px-5">
                <div class="row justify-content-center">
                    <div class="text-center my-4">
                        
<?php          
                    if($this->session->userdata('Puntos_usuario') < $this->session->userdata('puntos_minimos'))
                    {?>
                     

                        <h1 class="fw-bolder mb-3 text-uppercase fs-1"> Hola <?php  echo $this->session->userdata('Nombre') ?>, todavía no tienes Loto Coins para participar.<br>
                 
                        <div class="d-flex justify-content-center mb-2 mt-2 flex-column flex-md-row">
                    <a class="btn btn-brd-2 btn-lg px-5 text-uppercase text-white fw-bold font-20"  target="_blank"  href="https://www.polla.cl/es/view/juego/loto">&nbsp;JUEGA TU LOTO AHORA&nbsp;&nbsp;</a>
                        </div> 
                         
                     


              <?php }else{?>
                            

                        <h1 class="fw-bolder mb-3 text-uppercase fs-1"> Hola <?php  echo $this->session->userdata('Nombre') ?>, tienes <?php  echo $this->session->userdata('Nivel_usuario') ?> con <span class="font-prin fs-1"><?php  echo  number_format($this->session->userdata('Puntos_usuario'), 0 , ",", ".")  ?> Loto Coins vigentes.</span>
                        <?php if($this->session->userdata('Puntos_restantes') != -1){ ?>                        
                            Te faltan <span class="font-prin fs-1"><?php  echo $this->session->userdata('Puntos_restantes') ?> Loto Coins para </span> el próximo nivel                       
                        <?php } ?>
                        </h1>  


    <?php         }  ?>
           
                        

                        <div class="d-flex justify-content-center mb-2 mt-2 flex-column flex-md-row">
                            <a class="btn btn-brd-2 btn-lg px-5 text-uppercase text-white fw-bold font-20" href="<?php echo base_url('perfil_');?>">Actualizar Loto Coins</a>
                        </div>


                        <?php          
                    if($this->session->userdata('Puntos_usuario') >= $this->session->userdata('puntos_minimos'))
                    {?>

                        
                        <div class="d-flex gap-2 gap-md-1 justify-content-md-center flex-column flex-md-row">
                            <a class="btn btn-bord btn-lg px-2 text-uppercase text-white fw-normal fs-6" href="<?php echo base_url('perfil_premios');?>">Mis premios</a>
                            <a class="btn btn-bord btn-lg px-2 text-uppercase text-white fw-normal fs-6" href="<?php echo base_url('loto_coins');?>">Mis Loto Coins</a>
                            <a class="btn btn-bord btn-lg px-2 text-uppercase text-white fw-normal fs-6" href="<?php echo base_url('consultas');?>">Mis Consultas</a>

                        </div>


                    <?php  }  ?>

                    </div>
                    
                </div>
            </div>
        </div>
<?php if ($noticias!="0"){ ?>
        <div class="py-2">
            <div class="container px-5 mb-5 mt-4">
                <div class="row gx-5">
                    <div class="col-lg-6"><img class="img-fluid mb-5 mb-lg-0 brd-img-p pe-none" src="<?php echo $noticias->img64 ?>" alt="imagen perfil" /></div>
                    <div class="col-lg-6">
                        <h3 class="text-uppercase fnt-20 font-prin font-ibm"><?php echo $noticias->subtitulo ?></h3>
                        <h2 class="fw-bold text-uppercase fs-1"><?php  echo$noticias->titulo ?></h2>
                        <p class="fnt-24 mt-4"><?php echo $noticias->introduccion ?></p>
                        <p class="card-text font-ibm fnt-17 fc-plex fw-normal"><?php  echo $noticias->cuerpo ?></p>
                      
                    </div>
                </div>
            </div>
        </div>
<?php } ?>

        <section class="py-1 bg-secundario">


        <?php  
        
            $lotocoins=$this->session->userdata('Puntos_usuario');


        if( $lotocoins!=0){    ?>

              <div class="container px-5 mt-5">
                <div class="row gx-5 justify-content-center mb-4">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h3 class="text-uppercase fnt-20 font-prin font-ibm">Imperdible</h3>
                            <h2 class="fw-bold text-uppercase fs-1">Tus <span class="font-prin fs-1">Beneficios Activos</span></h2>
                        </div>
                    </div>
                </div>

                <div  class="carousel-inner">
                
                    <div id="carousel1" class="owl-carousel owl-theme">
                          
        <?php } ?>
<?php 
$x=1;
$cuenta_mostrarno=1;
if ($datos!="0"){

    foreach ($datos as $dato) {




                 $mostrar="NO";

                foreach ($dato->niveles as $nivel){

                            if ($nivel->Nivel ==$this->session->userdata('Nivel_usuario')){                    
                              //echo "Si correponde mostrar";
                                $mostrar="SI";
                            }
                }   
                if( $lotocoins==0){
                    $mostrar="NO";
                }



                                         $dato->mostrar= $mostrar;

                                        if ($dato->mostrar == "SI"){
                                            $cuenta_mostrarno=$cuenta_mostrarno+1;
                                        ?>
                                            
                                                <div class="card py-2">
                                                    <div class="bg-card-bac brd-card-ba">
                                                        <div class="img-wrapper px-4 mt-4">
                                                            <img src="<?php echo $dato->img64;?>" class="d-block w-100" alt="Imágen Cruz Verde">
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title text-uppercase "><?php echo $dato->titulo; ?></h5>
                                                            <p class="card-text font-ibm fnt-18 fw-normal "><?php echo $dato->descripcions; ?></p>

                                                            <a href="#" class="info-bs brd-1 px-3 fw-normal"> Beneficio Activo</a>
                                                        </div>
                                                    </div>
                                                </div>

                                         <?php 
                                         }
    $x=$x+1;
    }

    
    
  if ($cuenta_mostrarno==2) {

       
                        $SCRIP1=   '$("#carousel1").owlCarousel({
                            autoplay: true,
                            autoplayHoverPause: true,
                            autoplayTimeout: 5000,
                            loop: false,
                            margin: 0,
                            center: true,
                            responsiveClass: true,
                            responsive: {
                                0: {
                                    items: 1,
                                },
                                760: {
                                    items: 2,
                                },
                                1000: {
                                    items: 3,
                                    
                                },
                            }
                        });';



   }elseif ($cuenta_mostrarno<4) {

            
                    $SCRIP1=   '$("#carousel1").owlCarousel({
                        autoplay: true,
                        autoplayHoverPause: true,
                        autoplayTimeout: 5000,
                        loop: false,
                        margin: 0,
                        responsiveClass: true,
                        responsive: {
                            0: {
                                items: 1,
                            },
                            760: {
                                items: 2,
                            },
                            1000: {
                                items: 3,
                                
                            },
                        }
                    });';

    }else{

                    $SCRIP1=   '$("#carousel1").owlCarousel({
                        autoplay: true,
                        autoplayHoverPause: true,
                        autoplayTimeout: 5000,
                        loop: true,
                        margin: 0,
                        responsiveClass: true,
                        responsive: {
                            0: {
                                items: 1,
                            },
                            760: {
                                items: 2,
                            },
                            1000: {
                                items: 3,
                                
                            },
                        }
                    });';



    }

}
else
{ //vacio  sin beneficios
?>


<?php
} // fin if sin datos
?>
                    </div>
                    
                </div>
            </div>
        </section>
<?php if ($this->session->userdata('id_nivel')!= 3) {?>
        <section class="py-1 bg-secundario">
            <div class="container px-5 mt-5">
                <div class="row gx-5 justify-content-center mb-4">
                    <div class="col-lg-9">
                        <div class="text-center">
                        
                        <?php if( $lotocoins==0){    ?>

                        <h2 class="fw-bold text-uppercase fs-1"><span class="font-secun fs-1">Sin beneficios activos </span></h2>    
                        <?php } ?> 
                        
                        <h2 class="fw-bold text-uppercase fs-1">Conviértete en <span class="font-prin fs-1">Prime y desbloquea</span> más <span class="font-prin fs-1">beneficios!</span></h2>
                        </div>
                    </div>
                </div>

                <div class="carousel-inner">
                    <div id="carousel2" class="owl-carousel owl-theme">
        <?php 
        if ($datos!="0"){
        $x=1;
        $cuenta_mostrarno=1;
            foreach ($datos as $dato) {

           


                    if ($dato->mostrar == "NO"){
                    $cuenta_mostrarno=$cuenta_mostrarno+1;
                    ?>

                            <div class="card py-2">
                                <div class="bg-card-bac brd-card-ba">
                                    <div class="img-wrapper px-4 mt-4">
                                        <img src="<?php echo $dato->img64;?>" class="d-block w-100" alt="Imágen beneficios" loading="lazy">
                                    </div>
                                    <div class="card-body">
                                    <h5 class="card-title text-uppercase "><?php echo $dato->titulo; ?></h5>
                                                            <p class="card-text font-ibm fnt-18 fw-normal "><?php echo $dato->descripcions; ?></p>

                                        <a href="#" class="info-bs brd-1 px-3 fw-normal">Desbloquear beneficio</a>
                                    </div>
                                </div>
                            </div>

                     <?php 
                     }
            $x=$x+1;
            } // end foreach


            if ($cuenta_mostrarno<4) {



               
                 $SCRIP2=   '$("#carousel2").owlCarousel({
                        autoplay: true,
                        autoplayHoverPause: true,
                        autoplayTimeout: 5000,
                        loop: false,
                        margin: 0,
                        responsiveClass: true,
                        responsive: {
                            0: {
                                items: 1,
                            },
                            760: {
                                items: 2,
                            },
                            1000: {
                                items: 3,
                                
                            },
                        }
                    });';
                


                
            }else{


                $SCRIP2=   '$("#carousel2").owlCarousel({
                    autoplay: true,
                    autoplayHoverPause: true,
                    autoplayTimeout: 5000,
                    loop: true,
                    margin: 0,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        760: {
                            items: 2,
                        },
                        1000: {
                            items: 3,
                            
                        },
                    }
                });';



            }

         }
         else
         { //pasas cuando la varible esta vacia
         ?>

                             

         <?php   
         } // fin if vacio   
        ?>

                    </div>
                
                </div>
            </div>
        </section>
<?php }?>
        <!-- Info final-->
        <div class="container px-5 py-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <h3 class="text-uppercase fnt-20 font-prin font-ibm">No esperes más</h3>
                        

<?php if ($this->session->userdata('id_nivel')!= 3) {?>
                            <h2 class="fw-bold text-uppercase fs-1">Quiero <span class="font-prin fs-1">Subir de nivel!</span><br><span class="font-prin fs-1"> suma + loto coins!</span><br>Juega ahora</h2>

<?php }?>

                                    <h2 class="fw-bold text-uppercase fs-1"></h2>                        
                                    <h2 class="fw-bold text-uppercase fs-1"></h2>
                        

                        <div class="d-flex align-items-center justify-content-md-center flex-column flex-md-row">
                            <a href="https://www.polla.cl/es/view/juego/loto" target="_blank" ><img class=" m-md-3 mt-1 mt-md-3 pe-none" src="<?php echo base_url('assets/homepage/');?>img/loto.png" alt="Logo Loto clasico" width="220" height="82" loading="lazy"></a>
                            <a href="https://www.polla.cl/es/view/juego/loto3" target="_blank" ><img class="m-md-3 pe-none" src="<?php echo base_url('assets/homepage/');?>img/logo_loto3.png" alt="Logo Loto 3" width="220" height="82" loading="lazy"></a>
                            <a href="https://www.polla.cl/es/view/juego/loto4" target="_blank" ><img class="m-md-3 mb-1 mb-md-3 pe-none" src="<?php echo base_url('assets/homepage/');?>img/logo_loto4.png" alt="Logo Loto 4" width="220" height="82" loading="lazy"></a>
                        </div>
                        <h2 class="fw-bold text-uppercase fs-1">Por cada <span class="font-prin fs-1">$100 pesos que</span> juegues sumas <span class="font-prin fs-1">1 loto coin.</span></h2>
                    </div>
                    <div class="mt-5 text-center">

                        <a href="<?php echo base_url('eliminar_cuenta');?>" class="text-decoration-none text-uppercase fnt-20 font-prin font-ibm link-recuperar">¿Deseas eliminar tu cuenta?</a>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="<?php echo base_url('assets/homepage/');?>js/jquery-3.6.4.min.js" ></script>
    <script src="<?php echo base_url('assets/homepage/');?>js/owl.carousel.min.js" defer></script>
    

    <script type="text/javascript">
    $(document).ready(function () {
  
     
        

        <?php   if (isset($SCRIP1)) {?>
            <?php echo $SCRIP1;?>

            <?php  }?>
           


        

        
        <?php   if (isset($SCRIP2)) {?>
            <?php echo $SCRIP2;?>

            <?php  }?>
           


    });

</script>







    <script type="text/javascript">
                function gonative_library_ready() {

                        var items =[
                                {
                                    url: "https://www.lotoprime.cl/politicas_terminos",
                                    label: "Términos y Privacidad",
                                    subLinks: [],
                                    icon: "far fa-rectangle-list"
                                },
                                {
                                    url: "https://giga.cl/",
                                    label: "App desarrollada por GIGA 2023",
                                    subLinks: [],
                                    icon: "far fa-user-large"
                                },
                                {
                                    label: "Salir",
                                    subLinks: [],
                                    url: "https://www.lotoprime.cl/cerrarsession",
                                    icon: "far fa-right-from-bracket"
                                }
                                ]
                                ;
                        var json = JSON.stringify(items);




                        window.location.href="gonative://sidebar/setItems?items=" + encodeURIComponent(json);
                }


</script>
</body>
<!-- Button trigger moclass="modal-dialog modal-fullscreen-sm-down"dal -->

<!-- Modal -->
<div class="modal fade modal-xl" class="modal-dialog modal-fullscreen-sm-down"   id="staticBackdrop"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-body">
                        <form action="#" id="terminos_form" method="post" autocomplete="off" accept-charset="utf-8" name="terminos_form" >
                        <div id="checkboxForm" class="formCheck ">
                            <div class="form-check form-check-inline checkboxAlert">
                                <input type="checkbox" class="form-check-input" name="checkbox" id="checkbox">
                                <label class="form-check-label font-ibm fnt-20 mx-2" for="checkbox">Soy mayor de 18 años y acepto las <a class="font-prin text-decoration-none link-recuperar" Target="_blank" href="<?php echo base_url('Bases');?>/Bases_Promocionales.pdf">Bases Promocionales | </a><a class="font-prin text-decoration-none link-recuperar" href="<?php echo base_url('politicas_terminos');?>">Términos y Condiciones | Políticas de Privacidad</a></label>
                            </div>

                            <div class="d-flex justify-content-center mt-4 gap-3">
                                <button class="btn btn-color btn-lg px-4 text-uppercase text-white fs-6" id="terminos" type="submit">Aceptar</button>
                                <button type="button" class="btn btn-color2 btn-lg px-4 text-uppercase text-white fs-6" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                        </form>
      </div>
    
    </div>
  </div>
</div>




</html>

<style>

.modal-content{
    background: #141a31; 
}

</style>



<script type="text/javascript" src="<?php echo base_url('assets/homepage/js');?>/jquery.validate.min.js"></script>


<?php if($this->session->userdata('terminos')==0){ ?>

<script>
$(document).ready(function() {
  $('#staticBackdrop').modal('show');
});
$("#terminos_form").validate({
        rules: {            
            checkbox: {
                required: true
            }
        },
        messages: {           
            checkbox: {
                required: "Debe aceptar los términos y condiciones"
            }
        },
        submitHandler: function(form) { 
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
            csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var dataJson = { [csrfName]: csrfHash, resp: "1"};

            $.ajax({
             url:'<?php echo base_url(); ?>terminos',

              type:'POST',
              data: dataJson,    
              dataType: 'json',
              success: function(data) {
              
                $('#staticBackdrop').modal('hide');
                
              }
           });
           return false; // required to block normal submit since you used ajax
       },
        errorPlacement: function(error, element) {
            if (element.attr("type") === "checkbox") {
              error.insertAfter(element.parent());
            } else {
              error.insertAfter(element);
            }
          
            
        }
       
    });
    $("#terminos").click(function(event){
        if ($("#terminos_form").valid() == false )  {
            event.preventDefault();
            return;
        }
    });
</script>

<?php }?>
