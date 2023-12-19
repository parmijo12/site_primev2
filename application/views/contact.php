<!DOCTYPE html>
<html lang="en">
    <head>
        

        <?php $this->load->view('header'); ?>
        <link href="<?php echo base_url('assets/homepage/');?>css/style_contact.css" rel="stylesheet" >
    </head>

    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <?php $this->load->view('menu'); ?>


            <section class="py-5 mt-5">
                <div class="container px-5">
                    <div class="rounded-3 px-4 px-md-5 mb-5">
                        <div class="text-center mb-2">
                            <h2 class="fw-bolder text-uppercase fnt-44">Contacto</h2>
                            <p class="lead fw-normal mb-0 font-ibm fnt-17 fc-plex">Completa el formulario y te contactaremos dentro de 24 horas hábiles.</p>
                        </div>

                        <div class="text-danger fnt-17 justify-content-center d-flex mb-3">
                            <?php echo validation_errors(); ?> 

                            <?php if (isset($mensaje)) { echo  $mensaje; } ?>
                                                
                            <?php if(!empty($this->session->flashdata('respuesta'))) {?> 
                            
                            <?php echo $this->session->flashdata('respuesta'); ?>
                            
                            <?php } ?>
                        </div>

                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <form id="contactForm" method="post" action="<?php echo base_url('contactando')?>">
                                <input type="hidden" name="user_id"  value="<?php echo $this->security->get_csrf_hash();?>">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"  value="<?php echo $this->security->get_csrf_hash();?>">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="nombre" name="nombre" type="text"  data-sb-validations="required" />
                                        <label for="nombre">Nombre</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email"  data-sb-validations="required,email" />
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                            <select class="form-select form-control" id="select_data" name="select_data" aria-label="Floating label select example">
                                                <option value="0" selected>Seleccione su Tema</option>                                                
                                                <?php 
                                                foreach ($listar as $lista ) {?>                                                                                                
                                                <option value="<?php echo $lista->id_tipo_caso; ?>"><?php echo $lista->descripcion; ?></option>
                                                <?php } ?>
                                            </select>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="telefono" name="telefono" type="number"  data-sb-validations="required"/>
                                        <label for="telefono">Teléfono Móvil (+569)</label>
                                    </div>
                                    <div class="form-floating mb-3 mensaje">
                                        <textarea class="form-control " id="message" name="mensaje" type="text"  style="height: 10rem" data-sb-validations="required"></textarea>
                                        <label for="message">Escribe tu mensaje</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                    
                                  

                                    <div class="form-floating mb-3  d-flex justify-content-center ">
                                            <div class="g-recaptcha" data-sitekey="<?php echo $secret_key_web; ?>"></div>
                                   </div>
                                    <div class="d-flex justify-content-center ">
                                        <button class="btn btn-bord btn-lg px-4 text-uppercase text-white fs-6" id="contactSubmit" type="submit">Enviar mensaje</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </section>

            <div class="py-3 mb-5">
                <img class="img-sub pe-none" src="<?php echo base_url('assets/homepage/');?>img/SUBSCRIBE.png" alt="imagen subscribe">
            </div>
  
        </main>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="<?php echo base_url('assets/homepage/');?>js/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="<?php echo base_url('assets/homepage/');?>js/traduccion.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/homepage/');?>js/scripts.js"></script>
                                
    </body>
</html>
