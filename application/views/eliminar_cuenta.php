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
                    <h1 class="fw-bolder text-uppercase fnt-56">Eliminar cuenta</h1>
                </div>
            </div>
        </div>

        <section class="py-5">
            <div class="container px-5">
                <div class="rounded-3 px-4 px-md-5 mb-5">
                    <div class="text-center mb-5">
                        <h2 class="fw-bolder text-uppercase fs-1"> Si eliminas tu cuenta no podrás acceder a Loto Prime en forma permanente. </h2>
                        <p class="lead fw-normal mt-4 font-ibm fs-5 fc-plex">¿Estás segur@?
                         </p>
                    </div>
                </div>
                
                <div class="text-center mt-5 d-flex gap-4 justify-content-md-center flex-md-row flex-column">
                    <a href="<?php echo base_url('perfil'); ?>" class="btn btn-color btn-lg text-uppercase px-4 btn-lg text-white">Cancelar</a>
                    <a href="<?php echo base_url("eliminar_"); ?>" class="btn btn-danger rounded-0 text-uppercase px-4 btn-lg">Eliminar cuenta</a>
                </div>
            </div>
        </section>

        <div class="py-3 mb-5">
            <img class="img-sub pe-none" src="<?php echo base_url('assets/homepage/');?>img/SUBSCRIBE.png" alt="imagen subscribe">
        </div>

    </main>

    <script src="<?php echo base_url('assets/homepage/');?>js/jquery-3.6.4.min.js"></script>
</body>

</html>