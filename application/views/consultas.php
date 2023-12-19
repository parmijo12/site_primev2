<html lang="en">

<head>
    <?php $this->load->view('header'); ?>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <?php $this->load->view('menu'); ?>

        <div class="py-3 bg-secundario mt-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder text-uppercase fnt-56">Mis consultas</h1>
                </div>
            </div>
        </div>

        <section class="py-5">
            <div class="container no-pad-casos">

              
            <?php              
            if(!is_null($lista_consultas) || isset($lista_consultas) )
            { ?>
            
                <div class="rounded-3 px-4 px-md-5 mb-5">
                    <div class="mb-5">
                        <h2 class="fw-bolder text-uppercase fs-2"> Historial de casos</h2>
                    </div>
                </div>
                <?php  }else{ ?>  <!-- end if  -->     

                    <div class="rounded-3 px-4 px-md-5 mb-5">
                    <div class="mb-5 text-center">
                        <h2 class="fw-bolder text-uppercase fs-2"> No tienes consultas</h2>
                    </div>
                </div>


                <?php  } ?>
                <!-- Acordeon Inicio -->
                       
            <?php              
            if(!is_null($lista_consultas) || isset($lista_consultas) )
            {
            
                foreach ($lista_consultas as $consulta) { 
                
                       $class="";
                      if  ($consulta->id_estatus!=4) { 
                      
                        $class="font-secun";  
                    }else{
                        $class="font-terc";
                      }


                ?>

                <div class="accordion px-md-5 mt-4" id="accordion<?php echo  $consulta->id_caso?>">
                    <div class="accordion-item bg-color-cs">
                        <h2 class="accordion-header" id="heading<?php echo  $consulta->id_caso?>">
                            <button class="accordion-button bg-color-cs ocult-btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo  $consulta->id_caso?>" aria-expanded="true" aria-controls="collapse<?php echo  $consulta->id_caso?>">
                                <div class="col">
                                    <div class="card m-0 shadow-none">
                                        <div class="card-body p-0">
                                            <p class="m-0 text-end  text-uppercase <?php echo $class; ?>  "><?php echo  $consulta->estatus_caso?></p>
                                            <p class="m-0 mt-n2 text-start text-white ">ID CASO <span class="font-secun fw-normal text-uppercase "><?php echo  $consulta->id_caso?></span></p>
                                            <p class="mb-0 mt-n2 text-start"><span class="font-prin fw-normal text-uppercase fnt-14 font-siz-14"><?php echo  $consulta->tipo_caso?></span></p>
                                            <p class="font-ibm fw-normal fnt-14 font-secun mt-n2 text-start">Fecha creación <?php echo  $consulta->fecha_create?></p>
                                        </div>
                                    </div>
                                </div>
                            </button>




                                                    


                        </h2>
                        <div id="collapse<?php echo  $consulta->id_caso?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo  $consulta->id_caso?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">


                            
                                <div class="accordion" id="sub-accordionExample">
                                    
                                  <!-- Card -->
                                  <div class="card mt-3 mx-0 brd-img-p">
                                        <div class="card-body ">
                                            <p class="m-0 text-start text-white"><?php echo  $consulta->descripcion?></p>
                                        </div>
                                    </div>
                                    <!-- End Card -->


                                         <!-- inicio respuesta-->
            
                                         <?php  if  (!$consulta->respuestas==0) {  ?>   

                                                    <?php  foreach ($consulta->respuestas as $respuesta) { ?>
                                            
                                                    <div class="accordion-item bg-color-cs text-white mt-2">


                                                      <?php  if  ($respuesta->esuser==0) {  ?>   

                                                  
                                                            <h2 class="accordion-header" id="sub-headingTwo">
                                                                <button class="accordion-button bg-color-cs ocult-btn collapsed d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#sub-collapse<?php echo  $respuesta->id?>" aria-expanded="false" aria-controls="sub-collapse<?php echo  $respuesta->id?>">
                                                                    <p class="mb-0 font-prin fw-normal ms-auto text-uppercase"><?php echo  $respuesta->email?> <span class="fw-normal text-white "><?php echo  $respuesta->replied_at?></span></p>
                                                                </button>
                                                            </h2>

                                                            <?php  }else {  ?>   

                                                        <h2 class="accordion-header" id="sub-headingTwo">
                                                            <button class="accordion-button bg-color-cs ocult-btn collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#sub-collapse<?php echo  $respuesta->id?>" aria-expanded="false" aria-controls="sub-collapse<?php echo  $respuesta->id?>">
                                                                <p class="mb-0 text-md-start text-center font-prin fw-normal text-uppercase"><?php echo  $respuesta->email?> <span class="font-prin fw-normal text-white"><?php echo  $respuesta->replied_at?></span></p>
                                                            </button>
                                                        </h2>
                                                        <?php  }  ?>  

                                                        <div id="sub-collapse<?php echo  $respuesta->id?>" class="accordion-collapse collapse" aria-labelledby="sub-headingTwo" data-bs-parent="#sub-accordionExample">
                                                            <div class="accordion-body text-break">
                                                                <p class="fw-normal"><?php echo  $respuesta->message?></p>
                                                            </div>
                                                                <?php if(!$respuesta->adjuntos==0) {  ?> 
                                                                

                                                                        <?php  foreach ($respuesta->adjuntos as $adjunto) { 
                                                                            
                                                                            
                                                                           $img= str_replace("[removed]","data:image/jpeg;base64,",$adjunto->attachment);

                                                                            
                                                                            ?> 
                                                                      
                                                                            <a href="<?php echo $img?>" target="_blank">
                                                                        <img src="<?php echo  $img?>" width="50" height="50">
                                                                        </a>
                                                                    
                                                                        <?php  }  ?> 
                                                            
                                                                <?php  }  ?> 
                                                        </div>

                                                    </div>
                                                    <?php  }  ?>   
                                         <?php  }  ?>   
                                    <!-- // respuesta-->


                                    <!-- si falta espacio dentro podemos agregar un div cpm una clase de card text justo aqui-->
                                    <div class="collapse mt-4" id="review<?php echo  $consulta->id_caso?>">
                                        <div class="modal-body font-secun">

                                            <h5 class="modal-title font-prin text-uppercase" >Responder al equipo Loto Prime</h5>
                                            <p>Responder si necesitas enviar mayor información sobre tu caso o responder una consulta de nuestro equipo.</p>
                                            <div>
                                                <form id="consultasForm" class="consultasForm" method="post" action="<?php echo  base_url('consultas_')?>">
                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"  value="<?php echo $this->security->get_csrf_hash();?>">
                                                <input type="hidden" id="id_caso" name="id_caso" value="<?php echo  $consulta->id_caso?>"> 
                                                    <div class="mb-3 respconsulta">
                                                        <label for="mensaje" class="col-form-label font-prin">RESPONDER</label>
                                                        <textarea class="form-control bg-color-cs" id="mensaje" name="mensaje" type="text" style="height: 10rem" data-sb-validations="required"></textarea>
                                                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                                    </div>
                                                    <div class="modal-footer gap-2">
                                                        <button type="button" class="btn btn-bord p-3 text-uppercase" data-bs-toggle="collapse" data-bs-target="#review<?php echo  $consulta->id_caso?>" >Cancelar</button>
                                                         <button type="button" class="btn btn-color text-uppercase text-white p-3 text-uppercase consultas" id="consultasSubmit<?php echo  $consulta->id_caso?>" type="submit">Responder</button>
                                                   </div>
                                        
                                                </form>
                                            </div>
                                        </div>
                                       
                                    </div>

                                    

                                    
                                    <?php  if  ($consulta->id_estatus!=4) {  ?> 

                                    <!-- Arrow -->
                                        <div class="text-center mt-4">
                                            <a class="arrow-icon mt-4" href="#" data-bs-toggle="collapse" data-bs-target="#review<?php echo  $consulta->id_caso?>">
                                                <span class="arrow"><span></span><span></span></span>
                                            </a>
                                        </div>
                                    <!-- END Arrow -->

                                    <!-- <div class="text-end mt-3">
                                        <a href="#" data-bs-toggle="collapse" data-bs-target="#review<?php echo  $consulta->id_caso?>" class="btn btn-color text-uppercase text-white p-3">Responder al equipo</a>
                                    </div> -->
                                    <?php  }  ?>       


                                </div>
                            </div>
                        </div>

                       

                    </div>
                </div>
                <?php  } ?>  <!-- end foreach  -->   
            <?php  } ?>  <!-- end if  -->   
  <!-- fin  Acordeon -->   





            </div>
               

            <div class="text-center mt-5">
                <a href="<?php echo base_url('perfil'); ?>" class="btn btn-bord text-uppercase px-4 btn-lg">Volver</a>
            </div>
            </div>
        </section>

        <div class="py-3 mb-5">
            <img class="img-sub pe-none" src="<?php echo base_url('assets/homepage/'); ?>img/SUBSCRIBE.png" alt="imagen subscribe">
        </div>

    </main>

    <script src="<?php echo base_url('assets/homepage/'); ?>js/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url('assets/homepage/'); ?>js/scripts.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js'></script>

    <script type="text/javascript">
        $(document).ready(function () {
            if(location.hash != null && location.hash != ""){
                $('.collapse').removeClass('in');
                $(location.hash + '.collapse').collapse('show');
            }
        });
    </script>

    <script>
        $('.arrow').on('click', function() {
            $(this).toggleClass('active');
        });
    </script>
</body>

</html>