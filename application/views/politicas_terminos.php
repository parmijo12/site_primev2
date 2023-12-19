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
                            <h1 class="fw-bolder text-uppercase fnt-56">Términos de uso y políticas de privacidad</h1>
                        </div>
                    </div>
                </div>

                <section class="">
                    <div class="container px-5">
                    
                    <div class="accordion mb-3" id="accordionExample ">
                        <div class="accordion-item bg-acc mt-4">
                            <h3 class="accordion-header " id="headingUno"><button
                                    class="accordion-button collapsed text-uppercase bg-acc fw-bold fnt-24" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseUno" aria-expanded="false"
                                    aria-controls="collapseUno">Términos y Condiciones de Servicio de Loto Prime.</button></h3>
                            <div class="accordion-collapse collapse " id="collapseUno" aria-labelledby="headingUno"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body text-break">
                                    <p class="m-0 font-ibm fw-normal fnt-17 "><?php  echo ($politicas->terminos->detalle); ?>     </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item bg-acc my-4">
                            <h3 class="accordion-header" id="headingDos"><button
                                    class="accordion-button collapsed text-uppercase bg-acc fw-bold fnt-24" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseDos" aria-expanded="false"
                                    aria-controls="collapseDos">Política de Privacidad de Loto Prime  </button></h3>
                            <div class="accordion-collapse collapse" id="collapseDos" aria-labelledby="headingDos"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body text-break">
                                    <p class="m-0 font-ibm fw-normal fnt-17"><?php  echo ($politicas->politicas->detalle); ?></p>
                                </div>
                        </div>
                    </div>
                    
                    </div>
                </section>

                <div class="py-3 mb-5">
                    <img class="img-sub pe-none" src="<?php echo base_url('assets/homepage/');?>img/SUBSCRIBE.png" alt="imagen subscribe">
                </div>
    
            </main>

            <script src="<?php echo base_url('assets/homepage/');?>js/bootstrap.bundle.min.js" defer></script>
            <script src="<?php echo base_url('assets/homepage/');?>js/jquery-3.6.4.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
            <script src="<?php echo base_url('assets/homepage/');?>js/traduccion.js"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/homepage/');?>js/scripts.js"></script>
        </body>
    </html>
