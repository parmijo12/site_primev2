<nav class="navbar navbar-expand navbar-dark bg-menu pt-3" name="menu" id="menu" >
        <div class="container px-2"> <!-- px-5 -->
            <a href="<?php echo base_url();?>">
            <picture>
                <source srcset="<?php echo base_url('assets/homepage/');?>img/compressed/logo_polla.webp" type="image/webp" height="60" alt="logotipo-loto" class="navbar-brand" >
                <img src="<?php echo base_url('assets/homepage/');?>img/compressed/logo_polla2.png"  height="60" alt="logotipo-loto" class="navbar-brand" >
            </picture>
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-end">
                    
                    <li class="nav-item mx-1"><a class="nav-link text-uppercase" href="<?php echo base_url('contacto');?>"><img title="Contacto" class="my-svg" src="<?php echo base_url('assets/homepage/');?>img/main_icons/contacto1.svg" alt="icon contacto" width="35" height="35"></a></li>

                    <?php
                    if (!$this->session->userdata('Nombre'))
                    { ?>

                    <li class="nav-item mx-1"><a class="nav-link text-uppercase" href="<?php echo base_url('login');?>"><img title="Ingresar" class="my-svg" src="<?php echo base_url('assets/homepage/');?>img/main_icons/User1.svg" alt="icon ingresar" width="35" height="35"></a> </li>
                <?php  }else{?>

                    <li class="nav-item mx-1"><a class="nav-link text-uppercase" href="<?php echo base_url('perfil');?>"><img title="Perfil" class="my-svg" src="<?php echo base_url('assets/homepage/');?>img/main_icons/User1.svg" alt="icon perfil" width="35" height="35"></a></li>

                    <li class="nav-item mx-1"><a class="nav-link text-uppercase" href="<?php echo base_url('salir');?>"><img title="Salir" class="my-svg" src="<?php echo base_url('assets/homepage/');?>img/main_icons/CerrarPerfil.svg" alt="icon salir" width="35" height="35"></a> </li>

                    <?php    } ?>

                </ul>
            </div>
        </div>
</nav>