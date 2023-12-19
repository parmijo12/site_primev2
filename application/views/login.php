<!DOCTYPE html>
<html lang="en">
    <head>
    <?php $this->load->view('header'); ?>

    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <?php $this->load->view('menu'); ?>

           

            <section class="py-5 mt-5">
                <div class="container px-5">
                    <div class="rounded-3 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <h2 class="fw-bolder text-uppercase fnt-44">Revisa tus Loto Coins!</h2>
                            <p class="lead fw-normal mb-0 font-ibm fnt-17 fc-plex">Puedes usar tu misma clave de Polla.cl!</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                            
                            <div class="text-danger fnt-17 justify-content-center d-flex">
                                <?php echo validation_errors(); ?>
                            </div>
                                
                                <form  id="loginForm" method="post" accept-charset="utf-8" action="<?php echo base_url('user')?>">

                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"  value="<?php echo $this->security->get_csrf_hash();?>">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="rut" type="text" name="rut" placeholder="RUT ej: 123456789" data-sb-validations="required" />
                                        <label class="text-uppercase" for="name">Rut</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" name="password" type="password" placeholder="Contraseña" data-sb-validations="required,email" />
                                        <label for="email">Contraseña</label>
                                    </div>
                                    <div class="recuperar-ps">
                                        <a class="text-uppercase text-decoration-none font-prin link-recuperar" href="<?php echo base_url('recuperar');?>">Recuperar contraseña</a>
                                    </div>
                                    <div class="d-flex justify-content-end ">
                                        <button class="btn btn-color btn-lg px-4 text-uppercase text-white" id="loginSubmit" type="submit">Ingresar</button>
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
