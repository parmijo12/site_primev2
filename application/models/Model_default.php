<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_Default extends CI_Model {



	function __construct() {

		parent::__construct();

    }

    



      function get_id_data($table,$id )

    {



        $sql = "

            select 0 as id , 'Todos'  as nombre union 

            select id, nombre from ".$table." where id='".$id."'" ;

        $datos = $this->db->query($sql);

        $data = array();

        foreach($datos->result() as $dato)

        {

            $data[$dato->id] = $dato->nombre;

        }

        return $data;

    }





    function sqlsolo($tablefrom){



      

        $query = $this->db->query($tablefrom);





        return $query->result();



        

    }



    







    function pasartepTable($tablefrom , $campos, $tablefin, $whrere){



        $sql = "

            insert into  $tablefin

            Select ". $campos ." from  ".$tablefrom ." ".  $whrere  ;

           // echo   $sql ;

            $query = $this->db->query($sql);

        

    }

















    function maxwhere ($table, $return_id)

    {

    $sql = "

            

            select $return_id  from  $table where  id in (select max(id) from  $table )    " ;



            //echo  $sql;

       $query = $this->db->query($sql);

        return $query->result();

    }







     function truncateTable($table){

        $sql = 'truncate table  '.$table;

        $query = $this->db->query($sql);

        



     }



     function getdatos($table,$idadjacency, $where,$wheredato  )

    {







        $sql = "

            select 0 as id , 'Todos'  as nombre union 

            select id, nombre from ".$table." where id in ( select ".$idadjacency." from adjacency_lists where ".$where."=".$wheredato.")" ;

        $datos = $this->db->query($sql);

        $data = array();

        foreach($datos->result() as $dato)

        {

            $data[$dato->id] = $dato->nombre;

        }

        return $data;

    }







    function mimysql($sql){



             $query = $this->db->query($sql);



              return $query->result();

    }





    function todos ($table) {



        $this->db->from($table);

        $query = $this->db->get();

        return $query->result();

    }

    function todos_orden ($table ,$order ) {



        $this->db->from($table);

        $this->db->order_by($order, "asc");

        $query = $this->db->get();

        return $query->result();

    }





    function get_listas($table,$id, $name) {

        $lista = array();

        $this->load->model('Model_default');

        $registros = $this->Model_default->all($table);

            $lista[0] = 'Seleccione';



        foreach ($registros as $registro) {

            $lista[$registro->$id] = $registro-> $name;

        }

        return $lista;

    }







      function getdatosjob($table,$idadjacency, $where,$wheredato, $where2,$wheredato2  )

    {







        $sql = "

            select 0 as id , 'Todos'  as nombre union 

            select id, nombre from ".$table." where id in ( select ".$idadjacency." from adjacency_lists where ".$where."=".$wheredato." and ".$where2."=".$wheredato2."  )" ;

        $datos = $this->db->query($sql);

        $data = array();

        foreach($datos->result() as $dato)

        {

            $data[$dato->id] = $dato->nombre;

        }

        return $data;

    }

    



    function seleccionados($table, $tablecom , $idtable,$idtablcom ,  $camponombre , $comparate )

    {

    $sql = "

            

            select $idtable as id , $camponombre as nombre from  $table  where  $idtable  $comparate (select $idtablcom  from   $tablecom  ) " ;



            //echo  $sql;

        $datos = $this->db->query($sql);

        $data = array();

        foreach($datos->result() as $dato)

        {

            $data[$dato->id] = $dato->nombre;

        }

        return $data;

    }





     function seleccionadosw($table, $tablecom , $idtable,$idtablcom ,  $camponombre , $comparate ,$gr )

    {

    $sql = "

            

            select $idtable as id , $camponombre as nombre from  $table  where  $idtable  $comparate (select $idtablcom  from   $tablecom  where   idGrupo =$gr )  " ;



            //echo  $sql;

        $datos = $this->db->query($sql);

        $data = array();

        foreach($datos->result() as $dato)

        {

            $data[$dato->id] = $dato->nombre;

        }

        return $data;

    }





 

     function seleccionados2($table, $tablecom , $idtable,$idtablcom ,  $camponombre , $comparate ,$gr , $where )

    {

    $sql = "

            

            select $idtable as id , $camponombre as nombre from  $table  where  $idtable  $comparate (select $idtablcom  from   $tablecom  where   $where =$gr )  " ;



            //echo  $sql;

       $query = $this->db->query($sql);

        return $query->result();

    }







    function getdatosrbd($table, $field   )

    {







        $sql = "

            select 0 as id , 'Todos'  as nombre union 

            select id, name from  adjacency_lists  where  id_job=".$job." and idUT=".$idut." and id_super=".$id_super."" ;

        $datos = $this->db->query($sql);

        $data = array();

        foreach($datos->result() as $dato)

        {

            $data[$dato->id] = $dato->nombre;

        }

        return $data;

    }













    function all($table) {

       



        $query = $this->db->get($table);

        print_r($query);

        return $query->result();

    }





     function allwhere($table,$id, $field) {

        $this->db->where($field, $id);       

        return $this->db->get($table)->row();

    }







  function select_data($table,$select , $where) {

    $sql = "select ". $select ." from  ".$table . ' ' .$where ;

    //echo $sql;

  $query = $this->db->query($sql);

        return $query->result();



    }



    







    function insert_codigos(){



        $sql = 'INSERT INTO `codigos_premios` SELECT null as id, codigo, current_timestamp() as FechaCarga, 0 as id_campaign, 1 as estado , id_premio FROM tem_codigos where estatus=1'; 

        $query = $this->db->query($sql);

      // print_r($query);

















   }









    function temp_tables($tabletemp, $fieldtemp, $table ){



         $sql = 'insert into  '.$table.' select '.$fieldtemp.'  from '. $tabletemp ; 

         $query = $this->db->query($sql);

         $insert_id = $this->db->insert_id();

        return  $insert_id;







    }







    function allwhereorder($table,$id, $field, $orden) {



        $sql = "select * from ".$table." where  " . $id . "='" .  $field ."' order by ". $orden; 

        //echo  $sql;

         $query = $this->db->query($sql);

        return $query->result();





    }





    function allwhere2($table,$id, $field) {



        $sql = "select * from ".$table." where  " . $id . "='" .  $field ."'"; 

        //echo  $sql;

         $query = $this->db->query($sql);

        return $query->result();





    }



    function truncate_table  ($table) {



        $sql = "truncate ".$table.""; 

        //echo  $sql;

         $this->db->query($sql);

       





    }





    function delete_table  ($table, $anho,$mes ) {



        $sql = "DELETE FROM ".$table." WHERE Anho='".$anho."' and Mes='".$mes."'  "; 

        echo  $sql;

         $this->db->query($sql);

       





    }

        









     function es_uniquo($table,  $field, $str)

    {

     

     $query = $this->db->limit(1)->get_where($table, array($field => $str)); 

     $sql = $this->db->last_query();

     

     return $query->num_rows() ;

    }







    function all_filter($table,$limit, $start)

    {

        $sql = 'select * from '.$table.' limit ' . $start . ', ' . $limit;

        $query = $this->db->query($sql);

        return $query->result();

    }



   function allf($table,$limit=null, $start=null,  $st = NULL) {

     if ($st == "NIL") $st = "";

        $this->db->limit($limit ,$start  );

        $this->db->like('name', $st);

        $query = $this->db->get($table);

        return $query->result();

    }







     function get_count($table,$st = NULL)

    {

        if ($st == "NIL") $st = "";

        $this->db->like('name', $st);

        $query =  $this->db->get($table);

        return $query->num_rows();





    }





    function allFiltered($table,$field, $value) {

        $this->db->like($field, $value);

        $query = $this->db->get($table);

        return $query->result();

    }



    function find($table,$id) {

    	$this->db->where('id', $id);



		return $this->db->get($table)->row();

    }



    function insert($table,$registro) {

    	$this->db->set($registro);

		$this->db->insert($table);

        $insert_id = $this->db->insert_id();

        return  $insert_id;

    }



    



   function update2($table,$registro) {

        $this->db->set($registro);

        $this->db->where('id', $registro['id']);

        $this->db->update($table);

    }





    function update($table,$registro) {

    	$this->db->set($registro);

		$this->db->where('CertificadoID', $registro['CertificadoID']);

		$this->db->update($table);

    }

   function update4($table,$registro) {

        $this->db->set($registro);

        $this->db->where('idProducto', $registro['idProducto']);

        $this->db->update($table);

    }









    function delete($table,$id) {

    	$this->db->where('id', $id);

		$this->db->delete($table);

    }

    function delete_campo($table,$id,$campo) {

        $this->db->where($campo, $id);

        $this->db->delete($table);

    }

    





    function get_dropdown_listsql($sql)

    {

    $query = $this->db->query($sql);

    $result = $query->result();

    $return = "" ;
 

    if ( !empty($result) ||  count($result) > 0) {

        // array does not exist or is empty

        

            foreach($result as $row) {



                          
                               $return .= '  <option value="'.$row->id.'">'.$row->nombre.'</option>' ;
            }





    }


    return $return;



    }







        function get_dropdown_list($table)

        {

        $this->db->from($table);

        $this->db->where('estado', 1);

        $this->db->order_by('nombre');

        $result = $this->db->get();

        

        
        $return="";
 
        if($result->num_rows() > 0) {

           

            foreach($result->result_array() as $row) {


                $return .= '  <option value="'.$row['id'].'">'. $row['nombre'].'</option>' ;


                }

        }



                return $return;



        }

        

/*



controler

$data['city_list'] = $this->City_model->get_dropdown_list();

$this->load->view('my_view_file', $data); 

View

<?php echo form_dropdown('city_id', $city_list, set_value('city_id', $city_id));

*/



}

