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
                        <h1 class="fw-bolder text-uppercase fnt-56">Registro</h1>
                    </div>
                </div>
            </div>
            <div class="py-5">
                <div class="container px-5">
                    <div class="rounded-3 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <h2 class="fw-bolder text-white fs-1"><?php if (isset($respuesta)) { echo  $respuesta; } ?></h2>
                        </div>

                        <div class="row justify-content-center">
                            <div class="d-flex justify-content-center mt-4">

                                <a href="<?php echo base_url(); ?>" ><button class="btn btn-color btn-lg px-4 text-uppercase text-white fs-6">Volver</button> </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="<?php echo base_url('assets/homepage/');?>js/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="<?php echo base_url('assets/homepage/');?>js/traduccion.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/homepage/');?>js/scripts.js"></script>
    </body>
</html>
