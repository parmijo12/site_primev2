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
                    <h1 class="fw-bolder text-uppercase fnt-56">Mis loto coins</h1>
                </div>
            </div>
        </div>
                            <div class="text-danger fnt-17 justify-content-center d-flex">
                                <?php echo validation_errors(); ?>
                            </div>
        <div class="container mt-3">
            <div class="d-flex justify-content-center">

        <?php 
        
                if ($this->session->flashdata('datass') != ''){
                    $imput_desde=$desde;
                    $imput_hasta=$hasta;
                }else{
                    $imput_desde="";
                    $imput_hasta="";
                }
        
        
        ?>
                

                <form class="form-inline w-100" id="lotoCoinsForm" autocomplete="off" accept-charset="utf-8"   method="POST" action="<?php echo base_url('loto_coins')?>">

                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"  value="<?php echo $this->security->get_csrf_hash();?>">

                    <div class="row d-flex justify-content-center gap-md-4">
                        <div class="col-md-4">
                            <div class="form-floating my-4 ">
                                <input class="form-control" id="fechaInicio" type="date"  autocomplete="off" value="<?php echo  $imput_desde; ?>"  min="2023-08-01" name="fechaInicio" data-sb-validations="required" />
                                <label for="fechaInicio" class="text-uppercase">Desde</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-4 ">
                                <input class="form-control" id="fechaFin" type="date" autocomplete="off" value="<?php echo  $imput_hasta; ?>"  name="fechaFin" data-sb-validations="required" />
                                <label for="fechaFin" class="text-uppercase">Hasta</label>
                            </div>
                        </div>
                        
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-color text-white text-uppercase fw-normal" id="buscarSubmit">Buscar</button>
                    </div>
                </form>
            </div>
           
        </div>

        <section class="py-5">
            <div class="container px-5">
                <div class="rounded-3 px-4 px-md-5 mb-5">
                    <div class="mb-5 text-center">
                        <h2 class="fw-bolder text-uppercase fs-2">Loto coins por vencer <span class="fs-1 font-secun"><?php  echo  number_format($this->session->userdata('Puntos_usuario'), 0 , ",", ".")  ?></span></h2>
                    </div>

                    
                </div>
                <div class="row row-cols-auto row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">

                
                <?php                  
                  if ($compras!='0') {  
                     
                        foreach ($compras as  $compra) { 
                            //var_dump($compra);

                            $comprassX = number_format($compra->CouponCost, 0 , ",", ".");
                         
                            $puntosX = number_format($compra->puntos, 0 , ",", ".");  


                            ?>
                        
                            <?php     if ($compra->CouponCost=='0') {   ?>
                            
                            <div class="col w-auto">
                                <div class="card m-0">
                                    <div class="card-body bg-card-lp px-md-2">
                                        <p class="m-0"><span class="font-secun fnt-24 fw-normal"><?php echo $puntosX;?></span> Loto Coins</p>
                                        <p class="font-ibm fw-normal fnt-14 font-secun mt-n1">Vencen <?php echo $compra->VencimientoPuntos;?></p>

                                        <p class="mb-0 mt-2"><span class="font-prin fnt-24 fw-normal"><?php echo $compra->GameTitle;?></p>
                                        <p class="font-ibm fw-normal fnt-14 font-prin mt-n1 mb-0">Otorgado <?php echo $compra->CouponDate;?></p>
                                    </div>
                                </div>
                            </div>

                            <?php  }else{   ?>

                            <div class="col w-auto">
                                <div class="card m-0">
                                    <div class="card-body bg-card-lp px-md-2">
                                        <p class="m-0"><span class="font-secun fnt-24 fw-normal"><?php echo $puntosX;?></span> Loto Coins</p>
                                        <p class="font-ibm fw-normal fnt-14 font-secun mt-n1">Vencen <?php echo $compra->VencimientoPuntos;?></p>

                                        <p class="mb-0 mt-2"><span class="font-prin fnt-24 fw-normal">$<?php echo $comprassX;?></span> <?php echo $compra->GameTitle;?></p>
                                        <p class="font-ibm fw-normal fnt-14 font-prin mt-n1 mb-0">Compra <?php echo $compra->CouponDate;?></p>
                                    </div>
                                </div>
                            </div>
                                        
                            <?php }?>



                    <?php }?>
            <?php }?>
                  
                    

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

    <script>
        let today = new Date();
        let dd = today.getDate();
        let mm = today.getMonth()+1;
        let yyyy = today.getFullYear();
        if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("fechaFin").setAttribute("max", today);


    </script>
</body>

</html>