<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('header'); ?>
    
</head>

<body class="d-flex flex-column h-100">
    
    <main class="flex-shrink-0">

   <?php $this->load->view('menu'); ?>
        <div class="bg-principal py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-6">
                        <div class="my-5 text-center text-lg-start">
                            <div class="bg-lopr p-5"></div>

                            <picture>
                                <source srcset="<?php echo base_url('assets/homepage/');?>img/compressed/logo_lotoprime.webp" type="image/webp" class="mb-2 img-logoprime pe-none" width="screen" height="300">
                                <img src="<?php echo base_url('assets/homepage/');?>img/compressed/logo_lotoprime.png" alt="logo loto prime" width="screen" height="300" class="mb-2 img-logoprime pe-none">
                            </picture>

                            <p class="lead fw-normal font-ibm fnt-17">Ahora tus compras de Loto te permiten acceder a niveles de beneficios.</p>
                            <p class="lead fw-normal mb-4 font-ibm fnt-17">No te lo pierdas!</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-color btn-lg px-4 me-sm-3 text-uppercase fs-5" href="<?php echo base_url('login');?>">Tengo Cuenta en Polla.cl</a>
                                <a class="btn btn-bord btn-lg px-4 text-uppercase fs-5" href="<?php echo base_url('registrar');?>">Quiero ser Prime</a>
                            </div>
                        </div>
                    </div>
                 
                        <div class="col-lg-6 col-xl-6 d-lg-block text-center">
                            
                        <picture>
                            <source srcset="<?php echo base_url('assets/homepage/');?>img/compressed/Prime_Home1.webp" type="image/webp" class="img-fluid rounded-3 my-5 pe-none">    

                            <img class="img-fluid rounded-3 my-5 pe-none" src="<?php echo base_url('assets/homepage/');?>img/compressed/Prime_Home1.png" alt="imagen reward" />
                        </picture>

                        </div>
                   
                </div>
            </div>
        </div>

        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xxl-6" >
                    <div class="text-center my-5">
                        <h3 class="text-uppercase font-prin font-ibm fnt-20">Beneficios en cualquier momento</h3>
                        <h2 class="fw-bolder mb-3 text-uppercase fnt-44">¿Qué es <span class="font-prin fnt-44">Loto Prime?</span>
                        </h2>
                        <p class="lead fw-normal mb-4 font-ibm fnt-17">Es la plataforma de beneficios para jugadores online en LOTO.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                   
                    
                    <?php                  
                       // print_r($web->web_whatis); 
                        foreach ($web->web_whatis as  $whatis) { ?>
                    
                    
                    
                    <div class="card my-3 bg-card-lp mb-4">
                        <div class="card-body ">
                            <h3 class="text-uppercase fw-bold fnt-24 pt-1"><?php echo  $whatis->titulo; ?></h3>
                            <p class="font-ibm fw-normal fnt-17 mt-3 mb-0 "><?php echo  $whatis->detalle; ?></p>
                        </div>
                    </div>

                    
                    
                    <?php 
                        }
                    ?>
                    
         

                   
                   
                </div>
            </div>
        </div>

        <!-- CARD 1 Proximos sorteos -->
        <section class="py-5" >
            <div class="container px-5 my-2">
                <div class="row gx-5 justify-content-center mb-4">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                         <h3 class="text-uppercase fnt-20 font-prin font-ibm">Imperdibles</h3>
                        <h2 class="fw-bold text-uppercase fnt-44">Próximos <span class="font-prin fnt-44">Sorteos</span></h2>

                        </div>
                    </div>
                </div>

                <div class="carousel-inner"> 
                    <div class="owl-carousel owl-theme">

<?php 

$x=1;
if ($datos!="0"){
    foreach ($datos as $dato) {
        $fechaUno=new DateTime($dato->start_date);
        $today = new DateTime('now');
        $intervalo = $today->diff($fechaUno);
        if( $intervalo->invert==0)
        {
            $minutos= ($intervalo->h *60) + $intervalo->i;
            $dias= $intervalo->days ."d";
            $horas= $intervalo->h ."h";              
            $minutoss= $intervalo->i ."m";

        }else{
            $minutos=0;
        }
   
     ?>

                            <div class="card py-2">
                                <div class="bg-card-bac brd-card-ba">
                                    <div class="my-4 d-flex mx-3 font-ibm justify-content-xl-between flex-column flex-xl-row">
                                        <a href="#" class="info-bs mb-3 mb-xl-0 me-xl-0"><?php echo  "  " .$dias ." " .$horas ." " .$minutoss."  " ; ?></a>
                                        <a href="#" class="info-bs brd-1"><?php echo $dato->nivel;?></a>
                                    </div>
                                    <div class="img-wrapper px-3">
                                        <img src="<?php echo $dato->img64;?>" class="d-block w-100" alt="Imágen sorteo" loading="lazy">
                                    </div>
                                    <div class="card-body bg-cb">
                                        <h4 class="text-uppercase font-ibm fnt-14"><?php echo $dato->desc_corta; ?></h4>
                                        <h5 class="card-title text-uppercase fw-bold"><?php echo $dato->titulo; ?></h5>
                                        <p class="card-text mb-4 font-ibm fnt-17 fw-normal"><?php echo $dato->descripcions; ?></p>
                                    </div>
                                </div>
                            </div>

     <?php 
        $x=$x+1;
    }//end foreach

    if ( $x<4) {

        for ($i=$x; $i < 4; $i++) { ?>

                       <!-- <div class="card py-2">
                            <div class=" bg-card-bac brd-card-ba">
                                <div class="my-4 d-flex mx-3 font-ibm justify-content-xl-between flex-column flex-xl-row">
                                    <a href="#" class="info-bs mb-3 mb-xl-0 me-xl-0">5d 0h 0m</a>
                                    <a href="#" class="info-bs brd-2">Todos los niveles</a>
                                </div>
                                <div class="img-wrapper px-3">
                                    <img src="<?php echo base_url('assets/homepage/');?>img/falabella.png" class="d-block w-100" alt="Imágen Falabella" loading="lazy">
                                </div>
                                <div class="card-body bg-cb">
                                    <h4 class="text-uppercase font-ibm fnt-14">Gift cards</h4>
                                    <h5 class="card-title text-uppercase fw-bold">Tarjetas Falabella con $20.000</h5>
                                    <p class="card-text font-ibm fnt-17 fw-normal">Utiliza tu tarjeta en lo que quieras, dentro de
                                        Falabella.com <br>Participan los socios Inicio y Star.</p>
                                </div>
                            </div>
                        </div>-->
     <?php         
        }
    }
} 
else
    { ?>
                    
                    <div class="card py-2">
                        <div class=" bg-card-bac brd-card-ba">
                            <div class="my-4 d-flex mx-3 font-ibm justify-content-xl-between flex-column flex-xl-row">
                                <a href="#" class="info-bs mb-3 mb-xl-0 me-xl-0">SORTEOS</a>
                                <a href="#" class="info-bs brd-2">POR NIVELES</a>
                            </div>
                            <div class="img-wrapper px-3">
                                <img src="<?php echo base_url('assets/homepage/');?>img/sorteos.png" class="d-block w-100" alt="Imágen Falabella" loading="lazy">
                            </div>
                            <div class="card-body bg-cb">
                                <h4 class="text-uppercase font-ibm fnt-14">¡REGISTRATE!</h4>
                                <h5 class="card-title text-uppercase fw-bold">NO PIERDAS TIEMPO</h5>
                                <p class="card-text font-ibm fnt-17 fw-normal">¡Pronto nuevos sorteos de beneficios para los jugadores registrados en Loto Prime!</p>
                            </div>
                        </div>
                    </div>

                  
             
<?php
}   
?>
                    
                    </div>
                </div>

            </div>
        </section>

    <section class="py-2">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center mb-4">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                      
                             <h3 class="text-uppercase fnt-20 font-prin font-ibm">Imperdibles</h3>
                            <h2 class="fw-bold text-uppercase fnt-44">Beneficios <span class="font-prin fnt-44">Activos</span></h2>
                    </div>
                </div>
            </div>

            <div class="carousel-inner">
                <div class="owl-carousel owl-theme">
    <?php 

    $x=1;
if ($premios!="0"){
    foreach ($premios as $dato) {

                $Z=0;
                
                $nivel2="Nivel ";
            

                $cuenta_niveles= 0;

                foreach ($dato->niveles as $nivel){                
                    $cuenta_niveles= $cuenta_niveles +1 ;
                }   
               
                switch ($cuenta_niveles) {
                    case 1:
                          $nivel2= $dato->niveles[0]->Nivel ;
                        break;
                    case 2:
                         $nivel2= $dato->niveles[0]->Nivel ." ". $dato->niveles[1]->Nivel ;
                        break;
                    case 3:
                           $nivel2="Todos los Niveles";
                        break;
                }
        ?>

                    <div class="card py-2">
                        <div class="bg-card-bac brd-card-ba">
                            <div class="my-4 d-flex mx-3 font-ibm justify-content-xl-between flex-column flex-xl-row">
                                
                                <a href="#" class="info-bs brd-1"><?php echo   $nivel2;?></a>
                            </div>
                            <div class="img-wrapper px-3">
                                <img src="<?php echo $dato->img64;?>" class="d-block w-100" alt="Imágen Cruz Verde" loading="lazy">
                            </div>
                            <div class="card-body bg-cb">
                                <h4 class="text-uppercase font-ibm fnt-14"><?php echo $dato->desc_corta; ?></h4>
                                <h5 class="card-title text-uppercase fw-bold"><?php echo $dato->titulo; ?></h5>
                                <p class="card-text mb-4 font-ibm fnt-17 fw-normal"><?php echo $dato->descripcions; ?></p>
                            </div>
                        </div>
                    </div>

    <?php 
        $x=$x+1;
    }//end foreach

    if ( $x<4) {

        for ($i=$x; $i < 4; $i++) { ?>

                <div class="card py-2">
                        <div class=" bg-card-bac brd-card-ba">
                            <div class="my-4 d-flex mx-3 font-ibm justify-content-xl-between flex-column flex-xl-row">
                            <a href="#" class="info-bs brd-1">SE VIENEN</a>
                            </div>
                            <div class="img-wrapper px-3">
                                <img src="<?php echo base_url('assets/homepage/');?>img/premios.png" class="d-block w-100" alt="Imágen premios" loading="lazy">
                            </div>
                            <div class="card-body bg-cb">
                                <h4 class="text-uppercase font-ibm fnt-14">LOTO PRIME</h4>
                                <h5 class="card-title text-uppercase fw-bold">BENEFICIOS IMPERDIBLES.</h5>
                                <p class="card-text font-ibm fnt-17 fw-normal">¡Pronto nuevos beneficios para los jugadores registrados en Loto Prime!</p>
                            </div>
                        </div>
                    </div>
     <?php         
        }
    
    }
 }
 else
 {?>
                    <div class="card py-2">
                        <div class=" bg-card-bac brd-card-ba">
                            <div class="my-4 d-flex mx-3 font-ibm justify-content-xl-between flex-column flex-xl-row">
                            <a href="#" class="info-bs brd-1">SE VIENEN</a>
                            </div>
                            <div class="img-wrapper px-3">
                                <img src="<?php echo base_url('assets/homepage/');?>img/premios.png" class="d-block w-100" alt="Imágen premios" loading="lazy">
                            </div>
                            <div class="card-body bg-cb">
                                <h4 class="text-uppercase font-ibm fnt-14">LOTO PRIME</h4>
                                <h5 class="card-title text-uppercase fw-bold">BENEFICIOS IMPERDIBLES.</h5>
                                <p class="card-text font-ibm fnt-17 fw-normal">¡Pronto nuevos beneficios para los jugadores registrados en Loto Prime!</p>
                            </div>
                        </div>
                    </div>
                 
   <?php 
 }   
    ?>
                </div>
            </div>
        </div>
    </section>

        <div class="bg-nvl-prime">
            <div class="container px-5 py-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 ">
                        <div class="text-center ">
                            <h3 class="text-uppercase fnt-20 font-prin font-ibm">El viaje</h3>
                            <h2 class="fw-bold text-uppercase fnt-44">Niveles <span class="font-prin fnt-44">prime</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row gx-5 mt-5">


                <?php                  
                    // print_r($web->web_niveles); 
                     $x=1;
                        foreach ($web->web_niveles as  $niveless) { 
                            switch ($x) {
                                case 1:
                                    $classe = "card-nvl-inicio";
                                  break;
                                case 2:
                                    $classe = "card-nvl-inicio";
                                  break;
                                case 3:
                                    $classe = "card-nvl-prime";
                                  break;
                              
                              }                            
                            $x= $x+1;   
                            ?>
                    
                    <div class="col-lg-4 mb-5 ">
                        <div class="card h-100  <?php echo  $classe; ?> bg-shadow">
                            <div class="card-body p-4 ">
                                <h2 class="card-title mb-3 text-uppercase fw-bold fs-2"><?php echo  $niveless->titulo; ?></h2>
                                <ul class="ps-3">
                                    <li class="card-text mb-1 fw-normal fnt-17 font-ibm"><?php echo  $niveless->t1; ?></li>
                                    <li class="card-text mb-1 fw-normal fnt-17 font-ibm"><?php echo  $niveless->t2; ?></li>
                                    <li class="card-text mb-1 fw-normal fnt-17 font-ibm"><?php echo  $niveless->t3; ?></li>
                                    <li class="card-text fw-normal fnt-17 font-ibm"><?php echo  $niveless->t4; ?></li>
                                </ul>
                               
                            </div>
                        </div>
                    </div>


                    
                    
                    <?php 
                        }
                    ?>






                  


                
                </div>
            </div>
        </div>

       

        <?php $this->load->view('footer'); ?>
        
    </main>

    <button aria-label="Botton up" class="btn btn-sm btn-scroll-top rounded-circle position-fixed bottom-0 end-0 translate-middle d-none" onclick="scrollToTop()" id="back-to-up">
        <img src="<?php echo base_url('assets/homepage/');?>assets/ArrowUp.svg" alt="icon up" class="scroll-up" width="12" height="20">
    </button>

    <script src="<?php echo base_url('assets/homepage/');?>js/jquery-3.6.4.min.js" type="text/javascript" defer></script>
    <script src="<?php echo base_url('assets/homepage/');?>js/scroll-to-top.js" defer></script>
    <script src="<?php echo base_url('assets/homepage/');?>js/owl.carousel.min.js" defer></script>
    <script src="<?php echo base_url('assets/homepage/');?>js/carrusel.js" defer></script>
    <script src="<?php echo base_url('assets/homepage/');?>js/bootstrap.bundle.min.js" defer></script>
    
</body>

</html>
