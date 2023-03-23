<?php
class HomeModel extends CI_Model
{
	function get_jumlah_ditolak()
	{
		$sql = "SELECT COUNT(*) AS total FROM t_pengajuan WHERE status = '4'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	function get_jumlah_pengajuan()
	{
		$sql = "SELECT COUNT(*) AS total FROM t_pengajuan WHERE is_deleted = '0'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	function get_jumlah_kendaraan()
	{
		$sql = "SELECT COUNT(*) AS total FROM t_kendaraan";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function get_jumlah_sopir()
	{
		$sql = "SELECT COUNT(*) AS total FROM t_sopir";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
}
?>