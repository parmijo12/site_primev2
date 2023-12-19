<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['index']='Home/index';
// $route['contacto']='Home/index';
$route['registrar']='Home/registro';
$route['login']='Home/login';

$route['contact']='Home/contact';
$route['perfil']='Home/perfil';
$route['perfil_']='Home/actualiza_puntos';
$route['perfil_premios']='Home/perfil_premios';
$route['user']='Home/user';
$route['salir']='Home/salir';
$route['registro']='Home/registrar';
$route['recuperar']='Home/recuperar'; //carga la vista formulario hace submit a recuperando


$route['recuperando']='Home/recuperar_'; // submit datos coenctata con api

$route['contacto']='Home/contacto'; //Carga la vista
$route['contactando']='Home/contacto_'; // Submit datos form..

$route['eliminar_cuenta']='Home/eliminar_cuenta'; // muestra la vista eliminar
$route['eliminar_']='Home/eliminar_usuario'; // Elimina los usuarios, llama la api
$route['respuesta_eliminar']='Home/respuesta_eliminar'; // Elimina los usuarios, llama la api

$route['politicas_terminos']='Home/politicas_terminos';
$route['cerrarsession']='Home/cerrarsession';

$route['loto_coins']='Home/loto_coins';
$route['loto_coinss']='Home/loto_coinss';
$route['consultas']='Home/consultas';
$route['consultas_']='Home/consultas_';
$route['preguntas_frecuentes']='Home/preguntas_frecuentes';
$route['terminos']='Home/condisiones';
