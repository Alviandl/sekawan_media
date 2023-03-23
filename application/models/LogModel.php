<?php
class LogModel extends CI_Model
{
	
	function insert_log($data)
	{
		return $this->db->insert('t_log', $data);
	}
	
}
?>