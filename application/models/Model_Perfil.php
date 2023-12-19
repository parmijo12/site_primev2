<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Perfil extends CI_Model {

	function __construct() {
		parent::__construct();
    }

    function all() {
        $query = $this->db->get('perfil');
        return $query->result();
    }

    function all_filter($limit, $start)
    {
        $sql = 'select * from perfil limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

 function allf($limit=null, $start=null,  $st = NULL) {
     if ($st == "NIL") $st = "";
        $this->db->limit($limit ,$start  );
        $this->db->like('name', $st);
        $query = $this->db->get('perfil');
        return $query->result();
    }



function get_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        $this->db->like('name', $st);
        $query =  $this->db->get('perfil');
        return $query->num_rows();


    }


    function allFiltered($field, $value) {
        $this->db->like($field, $value);
        $query = $this->db->get('perfil');
        return $query->result();
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('perfil')->row();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('perfil');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('perfil');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('perfil');
    }


        function get_files($id) {
        $lista = array();
        $this->load->model('Model_usuario_carpeta');
        $registros = $this->Model_usuario_carpeta->all_perfil1($id);
    
        $x=0;
        foreach ($registros as $registro) {
               if( is_null($registro->UT))
               {
                $registro->UT="Todos";
               }
                if( is_null($registro->Job))
               {
                $registro->Job="Todos";
               }
                if( is_null($registro->supervisor))
               {
                $registro->supervisor="Todos";
               }
                if( is_null($registro->sucursal))
               {
                $registro->sucursal="Todos";
               }
                if( is_null($registro->rbd))
               {
                $registro->rbd="Todos";
               }

                       
                       $lista[]  =array(
                        'id' => $registro->id,
                        'user_id' => $registro->user_id,
                        'idUT'    =>  $registro->idUT,
                        'id_job'    =>  $registro->id_job,
                        'id_supervisor'    =>  $registro->id_supervisor,
                        'idrbd'    =>  $registro->idrbd,
                        'id_sucursal'    =>  $registro->id_Sucursal,
                        'UT'    =>  $registro->UT,
                        'job'    =>  $registro->Job,
                        'supervisor'    =>  $registro->supervisor,
                        'Sucursal'    =>  $registro->sucursal,
                        'rbd'    =>  $registro->rbd,
                        
                        );        
                       $x++;
        }

        return $lista;
    }

}
