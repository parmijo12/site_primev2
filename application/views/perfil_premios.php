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
                    <h1 class="fw-bolder text-uppercase fnt-56">Mis premios</h1>
                </div>
            </div>
        </div>

        <section class="py-5">
            <div class="container px-5">
                <div class="rounded-3 px-4 px-md-5 mb-5">
                    <div class="text-center mb-5">
                        <h2 class="fw-bolder text-uppercase fnt-44"><?php if ($premios!="0"){ ?> Estos son tus premios obtenidos <?php }else{  ?> Aún no consigues  premios    <?php }  ?> </h2>
                        <p class="lead fw-normal mt-4 font-ibm fnt-17 fc-plex">Sorteamos beneficios entre todos los usuarios de cada nivel.
                         </p>
                    </div>
                </div>

                <div class="row row-cols-auto row-cols-sm-2 row-cols-md-4 row-cols-lg-6 g-4 justify-content-center">

                    <?php 

                    if ($premios!="0"){ 

                        foreach ($premios as $premio) { 

                        $fecha=new DateTime($premio->date);
                         ?>
                   
                        <div class="col">
                            <div class="card">
                                <div class="card-body bg-card-lp">
                                    <h6 class="font-ibm fw-normal fnt-15 fc-plex"><?php echo $fecha->format('d.m.Y');  ?></h6>
                                    <h5 class="card-title fnt-24 mb-0"><?php echo $premio->nombre; ?></h5>
                                </div>
                            </div>
                        </div>


                    <?php 
                       }
                    }  
                     ?>

                </div>

                <div class="text-center mt-5">
                    <a href="<?php echo base_url('perfil'); ?>" class="btn btn-bord text-uppercase px-4 btn-lg">Volver</a>
                </div>
            </div>
        </section>

        <div class="py-3 mb-5">
            <img class="img-sub pe-none" src="<?php echo base_url('assets/homepage/');?>img/SUBSCRIBE.png" alt="imagen subscribe">
        </div>

    </main>

    <script src="<?php echo base_url('assets/homepage/');?>js/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url('assets/homepage/');?>js/scripts.js"></script>
</body>

</html>