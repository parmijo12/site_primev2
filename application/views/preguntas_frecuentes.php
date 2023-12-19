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
                            <h1 class="fw-bolder text-uppercase fnt-56">Preguntas frecuentes</h1>
                        </div>
                    </div>
                </div>

            <div class="container px-5">
                <div class="accordion mb-5" id="accordionExample ">
                


                    <?php     
                
                        
                    $Y=4;             
                        

                        function numeroAletras($numero){
                            $numeros = ["0","1","2","3","4","5","6","7","8","9"];
                            $letras = ["cero ","Uno","Dos", "Tres", "Cuatro","Cinco","Seis","Siete","Ocho","Nueve "];
                            return str_replace($numeros, $letras, $numero);
                            }
                            

                            foreach ($politicas->web_faqs as  $faqs) { 

                                $res = $Y%2;
                            // echo $res;
                                if ($res==1){$classe="my-4";}else{$classe="";}
                            // echo numeroAletras($Y); // uno cuatro cinco seis nueve 
                                ?>

                    
                                        <div class="accordion-item bg-acc <?php echo $classe; ?>">
                                            <h3 class="accordion-header" id="heading<?php echo numeroAletras($Y);?>"><button
                                                    class="accordion-button collapsed text-uppercase bg-acc fw-bold fnt-24" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse<?php echo numeroAletras($Y);?>" aria-expanded="false"
                                                    aria-controls="collapse<?php echo numeroAletras($Y);?>"><?php echo  $faqs->titulo; ?></button></h3>
                                            <div class="accordion-collapse collapse" id="collapse<?php echo numeroAletras($Y);?>" aria-labelledby="heading<?php echo numeroAletras($Y);?>"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p class="m-0 font-ibm fw-normal fnt-17 "><?php echo  $faqs->detalle; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>    

                        <?php 
                            $Y=$Y+1; 
                            }
                        ?>
                        


            
            
                </div>
            </div>

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
