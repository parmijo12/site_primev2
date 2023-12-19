<!DOCTYPE html>
<html lang="en">
    <head>
    <?php $this->load->view('header'); ?>
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <?php $this->load->view('menu'); ?>

            <form  id="registro_form" method="post" autocomplete="off" accept-charset="utf-8" action="<?php echo base_url('registro')?>">
        
            <div class="container py-5">
                
                <div class="text-danger fnt-17 justify-content-center d-flex">
                    <?php echo validation_errors(); ?> 
                    <?php if (isset($respuesta)) { echo  $respuesta; } ?>
                </div>

                <div class="row flex-row flex-wrap mt-5">
                    <div class="col-md-6"> 
                        <div class="accordion" id="accordionExample ">
                            <div class="accordion-item bg-acc">
                                <h3 class="accordion-header " id="headingUno">
                                    <button class="accordion-button collapsed text-uppercase bg-acc fnt-20" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUno" aria-expanded="false" 
                                    aria-controls="collapseUno">¿Por qué registrarme?</button></h3>
                                <div class="accordion-collapse collapse show" id="collapseUno" aria-labelledby="headingUno" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="m-0 font-ibm fw-normal fnt-17 fc-plex">Si te registras en Loto Prime podrás acumular Loto Coins por tus compras de Loto, Loto 3  y Loto 4.</p>
                                    </div>
                                </div>
                            </div>
                  
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"  value="<?php echo $this->security->get_csrf_hash();?>">

                                <div class="form-floating my-4 bg-acc">
                                    <input class="form-control bg-acc"  value="<?php echo  $this->input->post('rut');?>" id="rut" type="text" name="rut"  />
                                    <label for="rut"  class="text-uppercase">Rut</label>
                                </div>
                                <div class="form-floating my-4 bg-acc">
                                    <input class="form-control bg-acc"  value="<?php echo  $this->input->post('nombre');?>" id="nombre" type="text" name="nombre"  data-sb-validations="required" />
                                    <label for="nombre" class="text-uppercase">Nombre</label>
                                </div>
                                <div class="form-floating my-4 bg-acc">
                                    <input class="form-control bg-acc"  value="<?php echo  $this->input->post('apellido');?>"   id="apellido" type="text" name="apellido"  data-sb-validations="required" />
                                    <label for="apellido" class="text-uppercase">Apellido</label>
                                </div>
                                <div class="form-floating my-4 bg-acc">
                                    <input class="form-control bg-acc" id="nacimiento" type="date" min="1923-01-01" value="<?php echo  $this->input->post('nacimiento');?>"  name="nacimiento" data-sb-validations="required" />
                                    <label for="nacimiento" class="text-uppercase">Fecha nacimiento</label>
                                </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                      
                            <div class="form-floating bg-acc ">
                                <input class="form-control bg-acc" id="ciudad" type="text" name="ciudad"   value="<?php echo  $this->input->post('ciudad');?>" data-sb-validations="required" />
                                <label for="ciudad" class="text-uppercase">Ciudad</label>
                            </div>
                            <div class="form-floating my-4 bg-acc">
                                <input class="form-control bg-acc" id="direccion" type="text" name="direccion" value="<?php echo  $this->input->post('direccion');?>"  data-sb-validations="required" />
                                <label for="direccion" class="text-uppercase">Dirección</label>
                            </div>
                            <div class="form-floating bg-acc my-4">
                                <input class="form-control bg-acc" id="email" type="email" name="email" autocomplete="off" value="<?php echo  $this->input->post('email');?>"  data-sb-validations="required,email" />
                                <label for="email" class="text-uppercase">Email</label>
                            </div>
                            <div class="form-floating my-4 bg-acc">
                                <input class="form-control bg-acc" id="telefono" type="number" name="telefono" value="<?php echo  $this->input->post('telefono');?>"   data-sb-validations="required" />
                                <label for="telefono" class="text-uppercase">Teléfono Móvil (+569)</label>
                            </div>
                            <div class="form-floating my-4 bg-acc">
                                <input class="form-control bg-acc" id="password" type="password" name="password" autocomplete="off" data-sb-validations="required" />
                                <label for="password" class="text-uppercase">Contraseña</label>
                            </div>
                            <div class="form-floating my-4 bg-acc">
                                <input class="form-control bg-acc" id="password_repeat" type="password" name="password_repeat"  data-sb-validations="required" />
                                <label for="password_repeat" class="text-uppercase">Repetir Contraseña</label>
                            </div>
                       
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <div id="checkboxForm" class="formCheck">
                            <div class="form-check form-check-inline checkboxAlert">
                                <input type="checkbox" class="form-check-input" name="checkbox" id="checkbox">
                                <label class="form-check-label font-ibm fnt-20 mx-2" for="checkbox">Soy mayor de 18 años y acepto las <a class="font-prin text-decoration-none link-recuperar"  Target="_blank"  href="<?php echo base_url('Bases');?>/Bases_Promocionales.pdf">Bases Promocionales | </a><a class="font-prin text-decoration-none link-recuperar" href="<?php echo base_url('politicas_terminos');?>">Términos y Condiciones | Políticas de Privacidad</a></label>
                            </div>

                            <div class="d-flex justify-content-center mt-4">
                                <button class="btn btn-color btn-lg px-4 text-uppercase text-white fs-6" id="registrar" type="submit">Registrarme</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </form>
            <div class="py-3 mb-5">
                <img class="img-sub pe-none" src="<?php echo base_url('assets/homepage/');?>img/SUBSCRIBE.png" alt="imagen subscribe">
            </div>
             </div>
            </form>
        </main>
        
        <script src="<?php echo base_url('assets/homepage/');?>js/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="<?php echo base_url('assets/homepage/');?>js/traduccion.js"></script>
        <script src="<?php echo base_url('assets/homepage/');?>js/bootstrap.bundle.min.js" defer></script>
        <script type="text/javascript" src="<?php echo base_url('assets/homepage/');?>js/scripts.js"></script>
    </body>
</html>
