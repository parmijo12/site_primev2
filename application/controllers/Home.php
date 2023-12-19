<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	const SALT = 'njkys7G9Ix';
	function __construct() {
		
		parent::__construct();
	

		date_default_timezone_set ('America/Santiago');
		//$this->load->library('session');
	
        $this->load->library('form_validation');
		$this->form_validation->set_message('required', 'Debe ingresar un valor para %s');
		$this->form_validation->set_message('loginok', 'Usuario o clave incorrectos');
		$this->form_validation->set_message('matches', '%s no coincide con %s');
		//$this->form_validation->set_message('ingresook', 'Usuario y/o password no son válidos o la cuenta está desactivada de Loto Prime');
		$this->form_validation->set_message('rutok', 'Rut inválido ');
		$this->form_validation->set_message('repachaok', 'Seleccione el recaptcha');
		

		$this->form_validation->set_message('max_length', 'El máximo de caracteres permitidos es %s');

		//$this->load->database();
        //$this->load->helper('url','form');
		$this->load->model('Model_Apis');
     

	}
	public function consultas()
    {
		$email =$this->session->userdata('email');
		$data['lista_consultas'] =$this->Model_Apis->lista_consultas($email);
        $this->load->view('consultas', $data);
    }

	function consultas_ (){



		$this->form_validation->set_rules('mensaje','mensaje','required'); 
		$this->form_validation->set_rules('id_caso','caso id','required');

		if ($this->form_validation->run() == FALSE) 	
			{
				//$this->load->view('form');
				$this->consultas();
			} 
			else 
			{
			
		
				$email =$this->session->userdata('email');
				$mensaje = $this->input->post('mensaje');				
				$mensaje = stripslashes($mensaje);
				$mensaje = htmlspecialchars($mensaje);
				$id_caso = $this->input->post('id_caso');
				$id_caso = stripslashes($id_caso);
				$id_caso = htmlspecialchars($id_caso);
				
				$this->Model_Apis->ingresa_respuesta($id_caso, $mensaje, $email);


				redirect('consultas#collapse'.$id_caso);
			} 	


	}

	
	function user()
	{


		$this->form_validation->set_rules('rut','Rut','required|callback_rutok|callback_ingresook'); 
		$this->form_validation->set_rules('password','Contraseña','required');

		if ($this->form_validation->run() == FALSE) 	
			{
				//$this->load->view('form');
				$this->login();
			} 
			else 
			{
				redirect('perfil');
			} 		
	}
	


	public static function hash($password) {
        return hash('sha512', self::SALT . $password);
    }







	public function ingresook() {

		$user = $this->input->post('rut');
    	$pass = $this->input->post('password');		
		$token = $this->hash($pass);
		$respuesta=$this->Model_Apis->login($user, $pass,$token );

		
		if (isset($respuesta->FirstName)) {
			
    		$datosSession = array('Nombre' => $respuesta->FirstName,
    			                  'Appe' => $respuesta->LastName,
    			                  'email' => $respuesta->EmailAddress,
                                  'Puntos_usuario' => $respuesta->Puntos,
								  'Nivel_usuario' => $respuesta->Nivel,
								  'Puntos_restantes' => $respuesta->Restantes,
								  'token' => $respuesta->token,	
								  'id_nivel' => $respuesta->Id_nivel,
								  'puntos_minimos' => $respuesta->puntos_minimos,
								  'fecha_inicio' => $respuesta->fecha_inicio_ventas	,
								  'terminos' => $respuesta->terminos	
								  	
								);
    		$this->session->set_userdata($datosSession);
			return true;
		}else{
			//echo  "no existe";
			$this->load->helper('security');
			$this->form_validation->set_message('ingresook', $respuesta);

			return false;
		}

	}





	public function actualiza_puntos(){
		
		if (!($this->session->userdata('token'))) {

			redirect('index');
		}
		
		$token =$this->session->userdata('token');
		$respuesta=$this->Model_Apis->actualiza($token );
		//print_r($respuesta);
		$Puntos_actuales=$this->session->userdata('Puntos_usuario');
		//echo "<br>";
		//echo $Puntos_actuales;
		if ($respuesta->Puntos != $Puntos_actuales) {
					
				$this->session->unset_userdata('token');
				$this->session->unset_userdata('Puntos_restantes');
				$this->session->unset_userdata('Nivel_usuario');
				$this->session->unset_userdata('Puntos_usuario');
		
				$datosSession = array(
						'Puntos_usuario' => $respuesta->Puntos,
						'Nivel_usuario' => $respuesta->Nivel,
						'Puntos_restantes' => $respuesta->Restantes,
						'token' => $respuesta->token,		
				);

				$this->session->set_userdata($datosSession);

		}
		
		if (isset($respuesta->token)) {
			redirect('perfil');
		}else{
			$this->session->sess_destroy();
			redirect('home/index');

		}
	//	redirect('home/index');
	}


 	public function registrar()
	{


		$this->form_validation->set_rules('rut','Rut','required|callback_rutok'); 
		$this->form_validation->set_rules('nombre','Nombre','required');
		$this->form_validation->set_rules('apellido','Apellido','required');
		$this->form_validation->set_rules('nacimiento','Fecha de nacimiento','required');
		$this->form_validation->set_rules('ciudad','Ciudad','required');
		$this->form_validation->set_rules('direccion','Direccion','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('telefono','Telefono ','required');
		$this->form_validation->set_rules('password','Contraseña','required');
		$this->form_validation->set_rules('password_repeat','Repetir contraseña','required');
		$this->form_validation->set_rules('checkbox','Mayor de 18','required');
		


		if ($this->form_validation->run() == FALSE) 	
			{
				//$this->load->view('form');
					$this->registro();
			} 
			else 
			{
				

				$rut = $this->input->post('rut');
				$nombre = $this->input->post('nombre');
				$apellido = $this->input->post('apellido');
				$nacimiento = $this->input->post('nacimiento');
				$direccion = $this->input->post('direccion');
				$ciudad = $this->input->post('ciudad');
				$email = $this->input->post('email');
				$telefono = $this->input->post('telefono');
				$password = $this->input->post('password');
				$checkbox = $this->input->post('checkbox');

				$registro = new StdClass();
				$registro->rut =$rut ;
				$registro->apellido =$apellido ;
				$registro->nacimiento =$nacimiento ;
				$registro->nombre =$nombre ;
				$registro->direccion =$direccion ;
				$registro->ciudad =$ciudad ;
				$registro->email =$email ;
				$registro->telefono =$telefono ;
				$registro->password =$password ;
				$registro->checkbox =$checkbox ;
				 

				$respuesta=$this->Model_Apis->registro($registro );


				if ($respuesta=="Username already exists"){
					$respuesta="Nombre de usuario ya existe ";

					$data['respuesta'] = $respuesta;
					$this->registro($data);
					die();
				}
				
				
				if ($respuesta=="Username already exists"){
					$respuesta="Nombre de usuario ya existe ";

					$data['respuesta'] = $respuesta;
					$this->registro($data);
					die();
				}
				

				
				if ($respuesta=="Invalid Password parameter"){
					$respuesta="Password inválido ";
					$data['respuesta'] = $respuesta;
					$this->registro($data);

				}else{

					$data['respuesta'] = 'Hemos enviado un email de activación de tu cuenta desde el Club de Jugadores de Polla Chilena de Beneficencia. <br>
					Activa tu cuenta y podrás ingresar en Lotoprime.cl y Polla.cl';
					//print_r($respuesta);
					$this->registrook($data);

				}

			} 	


	}


	public function recuperar_()
	{
		# code...
		
		$this->form_validation->set_rules('email','Email','required'); 
		if ($this->form_validation->run() == FALSE) 	
		{
			$this->recuperar();

		}else{

			$email = $this->input->post('email');
			$respuesta=$this->Model_Apis->recuperar($email);
			if (isset($respuesta->errorCode)) {
				$respuesta = "Dirección de correo electrónico no válida";
            }
			else
			{
				$respuesta = " Hemos enviado un email de recuperación de tu cuenta desde el Club de Jugadores de Polla Chilena de Beneficencia.";
			}
			
			$data['mensaje'] = $respuesta;
		
			$this->session->set_flashdata('respuesta', $respuesta);
			$this->load->view('recuperar_clave');

		}

	}

	public function contacto_(){
		$this->load->library('session');
		$this->form_validation->set_rules('nombre','Nombre','required');
		$this->form_validation->set_rules('email','Email','required'); 
		$this->form_validation->set_rules('telefono','Telefono ','required');
		$this->form_validation->set_rules('mensaje','Mensaje ','required|max_length[300]');
		$this->form_validation->set_rules('g-recaptcha-response','captcha ','required|callback_repachaok');

		$data['listar'] =$this->Model_Apis->listar();


		if ($this->form_validation->run() == FALSE) 	
		{
			$this->contacto();

		}else{

			$nombre = $this->input->post('nombre');
			$email = $this->input->post('email');
			$telefono = $this->input->post('telefono');
			$mensaje = $this->input->post('mensaje');
			$token = $this->input->post("g-recaptcha-response");
			$tipo_caso= $this->input->post("select_data");
			
	
		   if($this->session->userdata('Puntos_restantes')){
				// do something when exist
				//print_r($this->session->userdata('Puntos_restantes'));
				$puntos_restantes=$this->session->userdata('Puntos_restantes');

		   }else{
			   	
				$respuesta=$this->Model_Apis->verificar_mail($email); // respuesta de la api

			
				if (isset($respuesta->puntos)) {
						$puntos_restantes=$respuesta->puntos;								
				}else{
						$puntos_restantes=-2;
				}

				
		


		   }
		
		   

			$respuesta=$this->Model_Apis->contacto_caso($nombre, $email, $telefono, $mensaje,$puntos_restantes,$tipo_caso);	
		   
				

			if (isset($respuesta->errorCode)) {
				$respuestas = "Datos de contacto no válidos";
            }
			else
			{
				$respuestas = "Gracias. Hemos recibido correctamente sus comentarios.";
			}
			
			
				//$this->session->set_flashdata('respuesta', $respuestas);

			$data['mensaje'] = $respuestas;			
			$data['secret_key_web'] = "6LcLRjkmAAAAAG76VCHw3MEevQszhE9h1g8WDeBm";
			$this->load->view('contact', $data );

		}


	}


	public function repachaok(){

			$token = $this->input->post("g-recaptcha-response");
			$secret_key = '6LcLRjkmAAAAALLSagIMdUcrLuORU0lPSLYzSPHx'; 
             
            // reCAPTCHA response verification
            $verify_captcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$token); 
            $verify_response = json_decode($verify_captcha); 
             
            // Check if reCAPTCHA response returns success 
            if($verify_response->success){
            	return true;
            }else{

            	return false;
            }
	}
	public function contacto()
	{
		$data['listar'] =$this->Model_Apis->listar();

		$data['secret_key_web'] = "6LcLRjkmAAAAAG76VCHw3MEevQszhE9h1g8WDeBm";
		$this->load->view('contact', $data );
		// $this->load->view('welcome_message');
	}

	public function recuperar()
	{
		# code...
		$this->load->view('recuperar_clave');

	}


	public function salir(){
		$this->session->sess_destroy();

		redirect('home/index');

	}
	
	public function cerrarsession () {

		$this->session->sess_destroy();
		$this->load->view('cerrarsession');				
	}



	public function rutok()
	{
		$rut = $this->input->post('rut');
		$rut = preg_replace('/[^k0-9]/i', '', $rut);

		$rut = preg_replace_callback(
			'~&#0*([0-9]+);~',
			function ($matches) {
				return chr($matches[1]);
			},
			$rut
			);


		$dv  = substr($rut, -1);
		$numero = substr($rut, 0, strlen($rut)-1);
		$i = 2;
		$suma = 0;
		foreach(array_reverse(str_split($numero)) as $v)
		{
			if($i==8)
				$i = 2;
	
			$suma += $v * $i;
			++$i;
		}
	
		$dvr = 11 - ($suma % 11);
		
		if($dvr == 11)
			$dvr = 0;
		if($dvr == 10)
			$dvr = 'K';
	
		if($dvr == strtoupper($dv))
			return true;
		else
			return false;
	}
		
	public function preguntas_frecuentes()
    {
        $politicas=$this->Model_Apis->politicas();
        $data['politicas'] = $politicas;
        $this->load->view('preguntas_frecuentes', $data);
    }



	public function index()
	{
					
	//$this->load->library('user_agent');
	//echo $this->agent->platform();
	//$mobile=$this->agent->is_mobile();
	//if($mobile){
	//echo "este es el codigo para ocultar el footer ";
	//}

		$web=$this->Model_Apis->web_index();
		$data['web'] = $web;

		$premios=$this->Model_Apis->premiosall();
		$data['premios'] = $premios;

		$respuesta=$this->Model_Apis->carrusel();
		$data['datos'] = $respuesta;
		$this->load->view('index',$data);		
	}

	public function eliminar_usuario()
	{
		$token = $this->session->userdata('token');
		$respuesta=$this->Model_Apis->eliminar_cuenta($token);
		$this->session->sess_destroy();		
		redirect('respuesta_eliminar');
	}

	public function respuesta_eliminar()
	{
		$this->load->view('respuesta_eliminar');
	}



	public function registro($data=null)
	{
		$this->load->view('registrar' , $data );
	}

	public function registrook($data=null)
	{
		$this->load->view('registro' , $data);
	}


	public function login()
	{
		$this->load->view('login');
	}

	public function recuperar_clave()
	{
		$this->load->view('recuperar_clave');
	}

	public function eliminar_cuenta()
	{
		$this->load->view('eliminar_cuenta');
	}
	public function politicas_terminos()
	{
		// $web=$this->Model_Apis->politicas();
		// $data['web'] = $web;
		$politicas=$this->Model_Apis->politicas();
		$data['politicas'] = $politicas;
		$this->load->view('politicas_terminos',$data);
	}

	public function contact()
	{					
		$this->load->view('contact');
	}

	public function perfil()
	{

			//echo  $this->session->userdata('token') ;
		$noticias=$this->Model_Apis->noticias();
		$respuesta=$this->Model_Apis->premiosall();		
		$data['noticias'] = $noticias;
		$data['datos'] = $respuesta;
		$this->load->view('perfil',$data);
	}

	public function perfil_premios()
	{		
		$premios= $this->Model_Apis->premios_usuarios($this->session->userdata('token'));
		//print_r($premios);
		$data['premios'] =$premios;
		$this->load->view('perfil_premios',$data);
	}

	public function loto_coins()
	{
		
		$this->form_validation->set_rules('fechaInicio','Fecha Inicio','required');
		$this->form_validation->set_rules('fechaFin','Fecha Fin','required'); 
		if ($this->form_validation->run() == FALSE) 	
		{
			$desde = date('Y-m-d');
			$data['compras']=$this->Model_Apis->compras($this->session->userdata('token'), $desde , $desde);
			$this->load->view('loto_coins' ,$data);
		}else{
			$desde = $this->input->post('fechaInicio');
			$hasta = $this->input->post('fechaFin');				
			$hasta=date_create($hasta);
			$desde=date_create($desde);
			$hasta =  date_format($hasta,"Y-m-d");
			$desde =  date_format($desde,"Y-m-d");
			$data['desde']=$this->input->post('fechaInicio');
			$data['hasta'] =$this->input->post('fechaFin');
			$data['compras']=$this->Model_Apis->compras($this->session->userdata('token'), $desde , $hasta);
			$this->session->set_flashdata('datass', $data);
			redirect('loto_coinss',$data );

			//$this->load->view('loto_coins' ,$data);

		}

	}
	public function loto_coinss()
	{

		if ($this->session->flashdata('datass') != ''){
			$data =$this->session->flashdata('datass');
		}else{
			$data['compras']= "0";		
		}		
		
		
		$this->load->view('loto_coins' ,$data);


	}
	function condisiones(){
		if ($this->input->is_ajax_request()) {
			
			if($this->session->userdata('Puntos_restantes')){
						
						
						$respuesta=$this->Model_Apis->guarda_terminos($this->session->userdata('token'));

						if($respuesta){
							$this->session->unset_userdata('terminos');
							$this->session->set_userdata('terminos', '1');
							echo $this->session->userdata('terminos');
						}else{
							echo $this->session->userdata('terminos');

						}
						

			}else{
				return 0;
			}
		

		
		} 

	}

}
