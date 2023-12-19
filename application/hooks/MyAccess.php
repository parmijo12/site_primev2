<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



// validacion de perfiles de usurios 



if ( ! function_exists('autentificar')) {



	function autentificar() {

		$CI = & get_instance();



		$controlador = $CI->uri->segment(1);

		$accion = $CI->uri->segment(2);

		
		

		$url = $controlador;
		

		$libres = array(
			'',	
			'login',
			'recuperar',
			'index',
			'registrar',
			'registro',
			'recuperando',
			'user',
			'contacto',
			'contactando',
			'politicas_terminos',
			'respuesta_eliminar',
			'cerrarsession',
			'preguntas_frecuentes',
			'terminos'
		);



		if(in_array($url, $libres)) {

			echo $CI->output->get_output();
			
		}

		else {



				
			
								if($CI->session->userdata('Nombre')) {






									



																$privadas = array(																
																	'perfil',
																	'perfil_',
																	'perfil_premios',
																	'salir',
																	'eliminar_cuenta',
																	'eliminar_',
																	'loto_coins',
																	'loto_coinss',
																	'consultas',
																	'consultas_',																
																    );



																if(in_array($url, $privadas)) {

																	echo $CI->output->get_output();

																	

																}else{

																		redirect('perfil');

																}


									

								}

								else {


										if ($url=="perfil"){										
											redirect('login');
										}else{
											redirect('index');
										}

													

								}
			






		}



	}



}



function autorizar() {

	$CI = & get_instance();



	// El perfil del usuario logueado

	$perfil_id = $CI->session->userdata('perfil_id');



	// Con el controlador, buscar la opción de menú

	$CI->load->library('menuLib');

	$controlador = $CI->uri->segment(1);

	

	$menu_id = $CI->menulib->findByControlador($controlador)->id;



	

	if(!$menu_id) {

		return FALSE;

	}



	// Recuperar de la tabla de permisos, la combinación Menu - Perfil

	$CI->load->library('menu_PerfilLib');

	$acceso = $CI->menu_perfillib->findByMenuAndPerfil($menu_id, $perfil_id);

	if(!$acceso) {

		return FALSE;

	}



	return TRUE;

}

