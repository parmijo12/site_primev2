/* make a file under application/models/ called db_model.php */
<?php
class db_model extends CI_Model  {
public function get_default($table, $field)
{
	$query = "SHOW COLUMNS FROM `" .  $table . "` WHERE field = '" . $field . "'";
	$result = $this->db->query($query);
	return $result;
}


}