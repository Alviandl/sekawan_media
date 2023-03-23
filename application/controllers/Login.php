<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('v_login');
	}
	public function check_login()
	{
		$nipp = $this->input->post('nipp');
		$password = md5($this->input->post('password'));
		$cek = $this->LoginModel->get_user($nipp, $password);
		if(count($cek) > 0)
		{			
			foreach($cek as $data){
				$jumbawahan = $this->LoginModel->hitungbawahan($data["id_jabatan"]);
				$sess_data = array(
					'id_user' => $data["id_user"], 
					'nama' => $data["nama"],
					'nipp' => $data['username'], 
					'id_jabatan' => $data["id_jabatan"],
					'nm_jabatan' => $data["nm_jabatan"],
					'username' => $data["username"],
					'id_atasan' => $data["id_atasan"],
					'role' => $data["role"],
					'jumbawahan' => $jumbawahan
				);
				$this->session->set_userdata($sess_data);
			}
			$now = date('Y-m-d H:i:s');
			$datalog = array(
				'ip' => $_SERVER['REMOTE_ADDR'],
				'nipp' => $nipp,
				'aksi' => 'Login Sukses',
				'created' => $now
			);
			$this->LogModel->insert_log($datalog);
			redirect('home/index');
			
		}
		else
		{
			$now = date('Y-m-d H:i:s');
			$datalog = array(
				'ip' => $_SERVER['REMOTE_ADDR'],
				'nipp' => $nipp,
				'aksi' => 'Login Gagal',
				'created' => $now
			);
			$insertlog = $this->LogModel->insert_log($datalog);
			if ($insertlog) {
				echo "<script>";
				echo "alert('Username dan Password Salah!');";
				echo "location.href='".site_url("Login")."';";
				echo "</script>";
			}
		}
	}
	public function logout()
	{
		$now = date('Y-m-d H:i:s');
		$nipp = $this->session->userdata('nipp');
		$datalog = array(
			'ip' => $_SERVER['REMOTE_ADDR'],
			'nipp' => $nipp,
			'aksi' => 'Logout Aplikasi',
			'created' => $now
		);
		$insertlog = $this->LogModel->insert_log($datalog);

		$this->session->sess_destroy();
		redirect('Login');
	}
}
?>