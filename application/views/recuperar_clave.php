<!DOCTYPE html>
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
                        <h1 class="fw-bolder text-uppercase fnt-56">Recupera tu contraseña</h1>
                    </div>
                </div>
            </div>

            <div class="text-danger fnt-17 justify-content-center d-flex">
                <?php echo validation_errors(); ?> 
                <?php if (isset($mensaje)) { echo  $mensaje; } ?>
                
                
                <?php if(!empty($this->session->flashdata('respuesta'))) {?> 
                
                <?php echo $this->session->flashdata('respuesta'); ?>
                
                <?php } ?>
            </div>
                                     
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="rounded-3 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <p class="lead fw-normal mb-0 font-ibm fnt-17 fc-plex">Usa tu email registrado en Polla.cl</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <form id="recuperarForm"  method="post" accept-charset="utf-8" action="<?php echo base_url('recuperando')?>">

                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"  value="<?php echo $this->security->get_csrf_hash();?>">
                                     
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email" placeholder="Email" data-sb-validations="required,email" />
                                        <label for="email">Email</label>
                                    </div>
                                    
                                    <div class="d-flex justify-content-end ">
                                        <button class="btn btn-color btn-lg px-4 text-uppercase text-white" id="recuperarSubmit" type="submit">Enviar</button>
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
        
        <script src="<?php echo base_url('assets/homepage/');?>js/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="<?php echo base_url('assets/homepage/');?>js/traduccion.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/homepage/');?>js/scripts.js"></script>
    </body>
</html>
