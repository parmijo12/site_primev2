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
                    <h1 class="fw-bolder text-uppercase fnt-56">Cuenta eliminada exitosamente</h1>
                </div>
            </div>
        </div>

        <section class="py-5">
            <div class="container px-5">
                <div class="rounded-3 px-4 px-md-5 mb-5">
                    <div class="text-center mb-5">
                     <a href="<?php echo base_url(); ?>" class="btn btn-color btn-lg text-uppercase px-4 btn-lg text-white">Volver al home</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="py-3 mb-5">
            <img class="img-sub pe-none" src="<?php echo base_url('assets/homepage/');?>img/SUBSCRIBE.png" alt="imagen subscribe">
        </div>

    </main>

</body>

</html>