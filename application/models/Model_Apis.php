<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Apis extends CI_Model {

	function __construct() {
		parent::__construct();
    }



function login ($user,$pass,$token)
{
	$curl = curl_init();	
	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/checklogin',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => array('username' => $user,'password' => $pass,'token' => $token),
	
	));
	$response = curl_exec($curl);
	curl_close($curl);
	return   json_decode($response, false)   ;
}	


function  actualiza($token){
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/puntos_user',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => array('token' => $token)
	  
	));
	
	$response = curl_exec($curl);
	
	curl_close($curl);
	return   json_decode($response, false)   ;
	




}


function registro( StdClass  $registro ){


		

	$username =  $registro->rut;
	$username =str_replace("-","",$username );
	$username =str_replace(".","",$username );
	$newDateOfBirth = date("Y-m-d", strtotime($registro->nacimiento));
	
		
	


	$curl = curl_init();

	curl_setopt_array($curl, array(
	//	  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/register_user',

	CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/register_user',
	
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => array('username' => $username,'password' => $registro->password,'firstName' => $registro->nombre,'lastName' => $registro->apellido,'dateOfBirth' => $newDateOfBirth ,'emailAddress' => $registro->email,'city' => $registro->ciudad,'address' =>  $registro->direccion,'fono' => $registro->telefono)
	 
	));
	$response = curl_exec($curl);	
	curl_close($curl);
	return   json_decode($response, false)   ;

}

	public function recuperar($mail)
	{
	# code...$client = new http\Client;
					$curl = curl_init();

					curl_setopt_array($curl, array(
					CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/reset',
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => '',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => 'POST',
					CURLOPT_POSTFIELDS => array('email' => $mail)
					
					));
					
					$response = curl_exec($curl);
					
					curl_close($curl);
					
					return   json_decode($response, false);
					
					


	}

	public function contacto($nombre, $email, $telefono, $mensaje)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/contacto',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('nombre' => $nombre,'email' => $email,'telefono' => $telefono,'mensaje' => $mensaje)
		));

		$response = curl_exec($curl);

		curl_close($curl);
		// echo $response;

		return json_decode($response, false);

	}






public function carrusel(){




		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/premios',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET'
		));

		$response = curl_exec($curl);

		curl_close($curl);
			return json_decode($response, false);




}




	public function premiosall()
	{
			
			$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/premiosall',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'GET'
				));

				$response = curl_exec($curl);

				curl_close($curl);
				return json_decode($response, false);

		// code...
	}


	 public function noticias()
	{
	


			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/noticias',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'GET'
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return json_decode($response, false);


		// code...
	}



 public function premios_usuarios($token)
	{
	

					$curl = curl_init();
					curl_setopt_array($curl, array(
					  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/premios_user',
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => '',
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => 'POST',
					  CURLOPT_POSTFIELDS => array('token' => $token)
					));

					$response = curl_exec($curl);

					curl_close($curl);
					return json_decode($response, false);



	}

	public function eliminar_cuenta($token) 
	{	
		$curl = curl_init();
					curl_setopt_array($curl, array(
					  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/desactivar_cuenta',
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => '',
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => 'POST',
					  CURLOPT_POSTFIELDS => array('token' => $token)
					));

					$response = curl_exec($curl);

					curl_close($curl);
					return json_decode($response, false);
	}



	public function guarda_terminos($token) 
	{	
		$curl = curl_init();
					curl_setopt_array($curl, array(
					  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/guarda_terminos',
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => '',
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => 'POST',
					  CURLOPT_POSTFIELDS => array('token' => $token)
					));

					$response = curl_exec($curl);

					curl_close($curl);
					return json_decode($response, false);
	}





	public function politicas()
	{
	


			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/politicas',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'GET'
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return json_decode($response, false);


		// code...
	}



	public function compras($token, $desde , $hasta){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/compras',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array('token' => $token,'desde' => $desde,'hasta' => $hasta)
		 
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		return json_decode($response, false);

		
	}



	public function  web_index() {

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/web_index',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET'		
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		
		return json_decode($response, false);

		

	}
	public function  contacto_caso($nombre, $email, $telefono, $mensaje, $puntos_restantes,$tipo_caso) {
		
		
	
		


		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://www.lotogo.lotoprime.cl/game_api/prime_caso',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => array('nombre' => $mensaje,'email' => $email,'telefono' => $telefono,'mensaje' => $mensaje,'tipo_caso' => $tipo_caso,'restantes' => $puntos_restantes ),
		CURLOPT_HTTPHEADER => array(
			'Authorization: Basic R2lnYV9hZG1pbjpHaWdhX2FkbWluLiw=',
			'Cookie: PHPSESSID=vp6t6ki3jm3isbs1dg6ubk2qdo'
		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
	
		
		return json_decode($response, false);

		

	}

	public function  listar() {
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://www.lotogo.lotoprime.cl/game_api/lista',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Basic R2lnYV9hZG1pbjpHaWdhX2FkbWluLiw='
			),
			));

			$response = curl_exec($curl);
		
			curl_close($curl);
		
			return json_decode($response, false);

		

	}

	function ingresa_respuesta($id_caso, $mensaje, $email){
		
		
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://www.lotogo.lotoprime.cl/game_api/responderpr',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array('id_caso' => $id_caso,'response' => $mensaje,'email' => $email),
		  CURLOPT_HTTPHEADER => array(			
			'Authorization: Basic R2lnYV9hZG1pbjpHaWdhX2FkbWluLiw='
		
		  ),
		));
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		echo $response;


	}


	function lista_consultas ($email){

		$curl = curl_init();
		
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://www.lotogo.lotoprime.cl/game_api/listarse',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array('email' => $email,'id_juego' => '2'),
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Basic R2lnYV9hZG1pbjpHaWdhX2FkbWluLiw='
		  ),
		));
		
		$response = curl_exec($curl);	
		curl_close($curl);		
		return json_decode($response, false);
	}

	function verificar_mail($mail)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://admin.lotoprime.cl/prime_api/consulta_user',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array('email' => $mail),
		 
		));
		
		$response = curl_exec($curl);
		
			curl_close($curl);
		
			return json_decode($response, false);


	}

	 

	


	
	
}
