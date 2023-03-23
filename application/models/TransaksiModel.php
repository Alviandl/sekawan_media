<?php
class TransaksiModel extends CI_Model
{
	
	function get_data_pengajuan()
	{
		$sql = "SELECT t.*, s.nama, u.nama as pemeriksa FROM t_pengajuan t 
		inner join t_sopir s on s.id_sopir = t.id_sopir 
		inner join t_pemeriksa p on p.id_pengajuan = t.id_pengajuan 
		inner join t_user u on u.id_user = p.id_user WHERE p.no_urut = '1' AND t.is_deleted = '0'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_data_pengajuanbyid($id)
	{
		$sql = "SELECT t.*, s.nama, u.id_user as id_user_pemeriksa, u.id_jabatan as id_jabatan_pmeriksa, u.nama as pemeriksa FROM t_pengajuan t 
		inner join t_sopir s on s.id_sopir = t.id_sopir 
		inner join t_pemeriksa p on p.id_pengajuan = t.id_pengajuan 
		inner join t_user u on u.id_user = p.id_user WHERE p.no_urut = '1' AND t.id_pengajuan = '$id' AND t.is_deleted = '0'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	function get_data_mobil()
	{
		$sql = "SELECT * FROM t_kendaraan";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_data_sopir()
	{
		$sql = "SELECT * FROM t_sopir";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_data_atasan()
	{
		$sql = "SELECT * FROM t_user u 
		inner join t_jabatan j on u.id_jabatan = j.id_jabatan 
		WHERE u.role = '2' AND j.id_atasan != '0'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function insert_pengajuan($data)
	{
		$this->db->insert('t_pengajuan', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	function update_pengajuan($data, $id_pengajuan)
	{
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('t_pengajuan', $data);
	}

	function select_atasan($id_jabatan)
	{
		$sql = "SELECT t.* FROM t_jabatan j
		INNER JOIN t_user t ON j.id_atasan = t.id_jabatan
		WHERE j.id_jabatan = ".$id_jabatan."";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}

	function insert_pemeriksa($data)
	{
		return $this->db->insert('t_pemeriksa', $data);
	}

	function delete_pemeriksa($id_pengajuan)
	{
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->delete('t_pemeriksa'); 
		return true;
	}

	function hapus_data_pengajuan($data, $id_pengajuan)
	{
		$this->db->where('id_pengajuan', $id_pengajuan);
		$this->db->update('t_pengajuan', $data);
		return true;
	}


	function get_dt_pengajuan_pemakaian_mobil_atasan($id_user)
	{
		$sql = "SELECT tp.*, s.nama, tu.nama as pemeriksa FROM t_pengajuan tp
		INNER JOIN t_sopir s on s.id_sopir = tp.id_sopir  
		INNER JOIN t_pemeriksa p on tp.id_pengajuan = p.id_pengajuan
		INNER JOIN t_user tu on p.id_user = tu.id_user
    	and p.id_user = '$id_user' and p.status = 'Y'
		WHERE tp.status = 1 and tp.is_deleted = 0
		UNION
		SELECT tp.*, s.nama, tu.nama as pemeriksa FROM t_pengajuan tp
		INNER JOIN t_sopir s on s.id_sopir = tp.id_sopir  
		INNER JOIN t_pemeriksa p on tp.id_pengajuan = p.id_pengajuan
		INNER JOIN t_user tu on p.id_user = tu.id_user
    	and p.id_user = '$id_user'
		WHERE tp.status = 3 or tp.status = 4 and tp.is_deleted = 0";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_dt_pengajuan_pemakaian_mobil_atasan2($id_user)
	{
		$sql = "SELECT tp.*, s.nama, tu.nama as pemeriksa FROM t_pengajuan tp
		INNER JOIN t_sopir s on s.id_sopir = tp.id_sopir  
		INNER JOIN t_pemeriksa p on tp.id_pengajuan = p.id_pengajuan
		INNER JOIN t_user tu on p.id_user = tu.id_user
    	and p.id_user = '$id_user' and p.status = 'Y'
		WHERE tp.status = 2 and tp.is_deleted = 0
		UNION
		SELECT tp.*, s.nama, tu.nama as pemeriksa FROM t_pengajuan tp
		INNER JOIN t_sopir s on s.id_sopir = tp.id_sopir  
		INNER JOIN t_pemeriksa p on tp.id_pengajuan = p.id_pengajuan
		INNER JOIN t_user tu on p.id_user = tu.id_user
    	and p.id_user = '$id_user'
		WHERE tp.status = 3 or tp.status = 4 and tp.is_deleted = 0";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function update_pemeriksaZ($id, $id_user)
	{
		$this->db->set('status', 'Z');
		$this->db->where('id_pengajuan', $id);
		$this->db->where('id_user', $id_user);
		$this->db->update('t_pemeriksa');

		return true;
	}

	function update_pemeriksaY($id)
	{
		$this->db->set('status', 'Y');
		$this->db->where('id_pemeriksa', $id);
		$this->db->update('t_pemeriksa');

		return true;
	}
	
	function get_pemeriksax($id)
	{
		$sql = "SELECT * FROM t_pemeriksa
		WHERE id_pengajuan = ".$id." AND status = 'X' order by no_urut";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}

	function approvel_pengajuan($id,$status)
	{
		$this->db->set('status', $status);
		$this->db->where('id_pengajuan', $id);
		$this->db->update('t_pengajuan');

		return true;
	}

	function reject_pengajuan($id,$status)
	{
		$this->db->set('status', $status);
		$this->db->where('id_pengajuan', $id);
		$this->db->update('t_pengajuan');

		return true;
	}

	function get_dt_pengajuan_report($tgl_start,$tgl_end)
	{
		$sql = "SELECT t.*, s.nama, GROUP_CONCAT(u.nama ORDER BY p.no_urut ASC) AS pemeriksa FROM t_pengajuan t 
		inner join t_sopir s on s.id_sopir = t.id_sopir 
		inner join t_pemeriksa p on p.id_pengajuan = t.id_pengajuan 
		inner join t_user u on u.id_user = p.id_user WHERE t.is_deleted = '0' AND t.jam_mulai_aktual >= '".$tgl_start."' AND t.jam_selesai_aktual <= '".$tgl_end."' GROUP BY t.id_pengajuan";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
?>