<?php
class LoginModel extends CI_Model
{
	
	function get_user($username, $password)
	{
		$sql = "SELECT t.id_user,t.nama,t.username,t.role,j.id_jabatan,j.nm_jabatan,j.id_atasan FROM t_user t
		inner join t_jabatan j
		on t.id_jabatan = j.id_jabatan
		WHERE t.username = '$username' and t.password = '$password'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function hitungbawahan($id_jabatan)
	{
		$sql = "SELECT * FROM t_jabatan where id_atasan = ".$id_jabatan."";
		$query = $this->db->query($sql);
		$result = $query->num_rows();
		return $result;
	}
}
?>