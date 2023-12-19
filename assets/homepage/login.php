<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
 

    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-secundario pt-3">
                <div class="container px-5">
                    <img src="img/logo-chile-1.png" alt="logotipo-loto" class="navbar-brand">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                            <li class="nav-item"><a class="nav-link text-uppercase" href="https://giga.cl/site_prime/homepage/index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-uppercase" href="https://giga.cl/site_prime/homepage/index.html#que-es-loto">¿Qué es Loto prime?</a></li>
                        <li class="nav-item"><a class="nav-link text-uppercase" href="https://giga.cl/site_prime/homepage/index.html#beneficios-activos">Beneficios activos</a></li>
                        <li class="nav-item"><a class="nav-link text-uppercase" href="https://giga.cl/site_prime/homepage/index.html#niveles-prime">Niveles prime</a></li>
                        <li class="nav-item"><a class="nav-link text-uppercase" href="https://giga.cl/site_prime/homepage/index.html#preguntas-frecuentes">Preguntas frecuentes</a></li>
                            <li class="nav-item ms-2"><a class="nav-link btn btn-bord btn-lg px-4 text-uppercase" href="https://giga.cl/site_prime/homepage/login.html">Ingresar</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="py-3 bg-secundario">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder text-uppercase fnt-56">Vamos por los beneficios.
                        </h1>
                    </div>
                </div>
            </div>

            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="rounded-3 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <h2 class="fw-bolder text-uppercase fnt-44">Revisa tus Loto Coins!</h2>
                            <p class="lead fw-normal mb-0 font-ibm fnt-17 fc-plex">Puedes usar tu misma clave de Polla.cl!</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">

                                <form id="loginForm">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="rut" type="text" name="rut" placeholder="Rut" data-sb-validations="required" />
                                        <label class="text-uppercase" for="name">Rut</label>
                                    </div>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" name="password" type="password" placeholder="Contraseña" data-sb-validations="required,email" />
                                        <label for="email">Contraseña</label>
                                    </div>
                                   
                                    <div class="recuperar-ps">
                                        <a class="text-uppercase text-decoration-none font-prin link-recuperar" href="https://giga.cl/site_prime/homepage/recuperar-clave.html">Recuperar contraseña</a>
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

            <!-- Imagen subscribe -->
            <div class="py-3 mb-5">
                <img class="img-sub" src="img/SUBSCRIBE.png" alt="imagen subscribe">
            </div>

        </main>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.6.4.min.js"></script>
        <!-- Core theme JS-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="js/traduccion.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    </body>
</html>
