<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct() {
 		parent::__construct();
 		if (!$this->session->userdata('id_user')) {

 			redirect(base_url('Login'));
 		}

 	}

	public function index()
	{
		if ($this->session->userdata('role') == '1') {
			$data['data_pengajuan'] = $this->TransaksiModel->get_data_pengajuan();
		}
		else{
			$id_jabatan = $this->session->userdata('id_jabatan');
			$getatasan = $this->TransaksiModel->select_atasan($id_jabatan);
			if ($getatasan != null) {
				$id_user = $this->session->userdata('id_user');
				$data['data_pengajuan'] = $this->TransaksiModel->get_dt_pengajuan_pemakaian_mobil_atasan($id_user);				
			}
			else{
				$id_user = $this->session->userdata('id_user');
				$data['data_pengajuan'] = $this->TransaksiModel->get_dt_pengajuan_pemakaian_mobil_atasan2($id_user);
			}
		}
		
		$dataap['menu'] = 'transaksi';

 		$this->load->view('v_header');
 		$this->load->view('v_navbar',$dataap);
		$this->load->view('v_transaksi', $data);
 		$this->load->view('v_footer');
	}

	public function form_pengajuan()
	{
		if ($this->session->userdata('role')!='1') {
                return redirect('home');
        }
        else{
        	$data['data_mobil'] = $this->TransaksiModel->get_data_mobil();
        	$data['data_sopir'] = $this->TransaksiModel->get_data_sopir();
        	$data['data_atasan'] = $this->TransaksiModel->get_data_atasan();

        	$dataap['menu'] = 'transaksi';

        	$this->load->view('v_header');
        	$this->load->view('v_navbar',$dataap);
        	$this->load->view('v_pengajuan', $data);
        	$this->load->view('v_footer');
        }

	}

	public function form_ubah_pengajuan($id)
	{	
		if ($this->session->userdata('role')!='1') {
			return redirect('home');
		}
		else{
			$data['data_pengajuan'] = $this->TransaksiModel->get_data_pengajuanbyid($id);

			$data['data_mobil'] = $this->TransaksiModel->get_data_mobil();
			$data['data_sopir'] = $this->TransaksiModel->get_data_sopir();
			$data['data_atasan'] = $this->TransaksiModel->get_data_atasan();

			$dataap['menu'] = 'transaksi';

			$this->load->view('v_header');
			$this->load->view('v_navbar',$dataap);
			$this->load->view('v_ubah_pengajuan', $data);
			$this->load->view('v_footer');
		}
	}

	public function form_detail_pengajuan($id)
	{	
		$data['data_pengajuan'] = $this->TransaksiModel->get_data_pengajuanbyid($id);

		$data['data_mobil'] = $this->TransaksiModel->get_data_mobil();
		$data['data_sopir'] = $this->TransaksiModel->get_data_sopir();
		$data['data_atasan'] = $this->TransaksiModel->get_data_atasan();

		$dataap['menu'] = 'transaksi';

		$nipp = $this->session->userdata('nipp');
		$now = date('Y-m-d H:i:s');
		$datalog = array(
			'ip' => $_SERVER['REMOTE_ADDR'],
			'nipp' => $nipp,
			'aksi' => 'Lihat Detail Data Pengajuan Pemakaian Mobil',
			'created' => $now
		);
		$insertlog = $this->LogModel->insert_log($datalog);
		
		$this->load->view('v_header');
 		$this->load->view('v_navbar',$dataap);
		$this->load->view('v_detail_pengajuan', $data);
 		$this->load->view('v_footer');
	}

	public function simpan_ubah_pengajuan(){
		if (!$this->session->userdata('id_user')) {
            return redirect('login');
        }
        else{

            if ($this->session->userdata('role')!='1') {
                return redirect('home');
            }
            else{
             if($_SERVER['REQUEST_METHOD']=='POST'){

             	$date = new dateTime('now', new DateTimeZone('Asia/Jakarta'));
             	$nipp = $this->session->userdata('nipp');
             	$id = $this->input->post('id');
             	$no_pengajuan = "PM-". random_string('alnum', 6);
             	$jns_kendaraan = $this->input->post('jns_kendaraan');
             	$sopir = $this->input->post('sopir');
             	$lokasi_awal = $this->input->post('lokasi_awal');
             	$lokasi_tujuan = $this->input->post('lokasi_tujuan');
             	$jam_mulai_aktual = date("Y-m-d H:i:s", strtotime($this->input->post('jam_mulai_aktual')));
             	$jam_selesai_aktual = date("Y-m-d H:i:s", strtotime($this->input->post('jam_selesai_aktual')));
             	$id_user_pemeriksa = $this->input->post('id_user_pemeriksa');
             	$id_jabatan_pemeriksa = $this->input->post('id_jabatan_pemeriksa');
             	$alasan_pemakaian = $this->input->post('alasan_pemakaian');
             	$status = '1';


             	if ($id != "") {

             		$data = array(
             			'id_mobil' => $jns_kendaraan,
             			'id_sopir' => $sopir,
             			'status' => $status,
             			'lokasi_awal' => $lokasi_awal,
             			'lokasi_tujuan' => $lokasi_tujuan,
             			'jam_mulai_aktual' => $jam_mulai_aktual,
             			'jam_selesai_aktual' => $jam_selesai_aktual,
             			'alasan_pemakaian' => $alasan_pemakaian
             		);

             		$this->TransaksiModel->update_pengajuan($data, $id);

             		$this->TransaksiModel->delete_pemeriksa($id);

             		$atasan = $this->TransaksiModel->select_atasan($id_jabatan_pemeriksa);

             		$dataatasan = array(
             			'id_user' => $id_user_pemeriksa,
             			'id_pengajuan' => $id,
             			'status' => 'Y',
             			'no_urut' => 1
             		);
             		$this->TransaksiModel->insert_pemeriksa($dataatasan);
             		if($atasan != null)
             		{
             			$dataatasan2 = array(
             				'id_user' => $atasan['id_user'],
             				'id_pengajuan' => $id,
             				'status' => 'X',
             				'no_urut' => 2
             			);
             			$this->TransaksiModel->insert_pemeriksa($dataatasan2);
             		}

             		$now = date('Y-m-d H:i:s');
             		$datalog = array(
             			'ip' => $_SERVER['REMOTE_ADDR'],
             			'nipp' => $nipp,
             			'aksi' => 'Ubah Data Pengajuan Pemakaian Mobil',
             			'created' => $now
             		);
             		$insertlog = $this->LogModel->insert_log($datalog);

             		echo 1;
             		
             	}
             	else{

             		$data = array(
             			'no_pengajuan' => $no_pengajuan,
             			'id_mobil' => $jns_kendaraan,
             			'id_sopir' => $sopir,
             			'status' => $status,
             			'lokasi_awal' => $lokasi_awal,
             			'lokasi_tujuan' => $lokasi_tujuan,
             			'jam_mulai_aktual' => $jam_mulai_aktual,
             			'jam_selesai_aktual' => $jam_selesai_aktual,
             			'alasan_pemakaian' => $alasan_pemakaian,
             			'created' => $date->format('Y-m-d H:i:s')
             		);

             		$lastid = $this->TransaksiModel->insert_pengajuan($data);

             		$atasan = $this->TransaksiModel->select_atasan($id_jabatan_pemeriksa);

             		$dataatasan = array(
             			'id_user' => $id_user_pemeriksa,
             			'id_pengajuan' => $lastid,
             			'status' => 'Y',
             			'no_urut' => 1
             		);
             		$this->TransaksiModel->insert_pemeriksa($dataatasan);
             		if($atasan != null)
             		{
             			$dataatasan2 = array(
             				'id_user' => $atasan['id_user'],
             				'id_pengajuan' => $lastid,
             				'status' => 'X',
             				'no_urut' => 2
             			);
             			$this->TransaksiModel->insert_pemeriksa($dataatasan2);
             		}

             		$now = date('Y-m-d H:i:s');
             		$datalog = array(
             			'ip' => $_SERVER['REMOTE_ADDR'],
             			'nipp' => $nipp,
             			'aksi' => 'Tambah Data Pengajuan Pemakaian Mobil',
             			'created' => $now
             		);
             		$insertlog = $this->LogModel->insert_log($datalog);

             		echo 1;
             	}

             }
             else{
                return redirect('transaksi');
             }
            }
        }
	}

	public function hapus_pengajuan($id){
		if (!$this->session->userdata('id_user')) {
            return redirect('login');
        }
        else{

            if ($this->session->userdata('role')!='1') {
                return redirect('home');
            }
            else{
              
              $data = array(
              	'is_deleted' => '1' 
              );

              $this->TransaksiModel->hapus_data_pengajuan($data,$id);

              $nipp = $this->session->userdata('nipp');
              $now = date('Y-m-d H:i:s');
              $datalog = array(
              	'ip' => $_SERVER['REMOTE_ADDR'],
              	'nipp' => $nipp,
              	'aksi' => 'Hapus Data Pengajuan Pemakaian Mobil',
              	'created' => $now
              );
              $insertlog = $this->LogModel->insert_log($datalog);

              return redirect('transaksi');
            }
        }
	}

	public function form_approv_pengajuan($id)
	{
		if ($this->session->userdata('role')!='2') {
			return redirect('home');
		}
		else{
			$id_user = $this->session->userdata('id_user');

			$this->TransaksiModel->update_pemeriksaZ($id,$id_user);

			$dtpemeriksa = $this->TransaksiModel->get_pemeriksax($id);

			if($dtpemeriksa != null)
			{
				$this->TransaksiModel->update_pemeriksaY($dtpemeriksa['id_pemeriksa']);
				$this->TransaksiModel->approvel_pengajuan($id,2);
			}else
			{
				$this->TransaksiModel->approvel_pengajuan($id,3);	
			}

			$nipp = $this->session->userdata('nipp');
			$now = date('Y-m-d H:i:s');
			$datalog = array(
				'ip' => $_SERVER['REMOTE_ADDR'],
				'nipp' => $nipp,
				'aksi' => 'Menyetujui Data Pengajuan Pemakaian Mobil',
				'created' => $now
			);
			$insertlog = $this->LogModel->insert_log($datalog);		

			return redirect('transaksi');
		}

	}

	public function form_reject_pengajuan($id)
	{
		if ($this->session->userdata('role')!='2') {
			return redirect('home');
		}
		else{

			$this->TransaksiModel->reject_pengajuan($id,4);

			$nipp = $this->session->userdata('nipp');
			$now = date('Y-m-d H:i:s');
			$datalog = array(
				'ip' => $_SERVER['REMOTE_ADDR'],
				'nipp' => $nipp,
				'aksi' => 'Menolak Data Pengajuan Pemakaian Mobil',
				'created' => $now
			);
			$insertlog = $this->LogModel->insert_log($datalog);	

			return redirect('transaksi');
			
		}

		
	}

	public function report_pengajuan_excel($tgl_mulai, $tgl_selesai)
	{
		$tgl_start = date("Y-m-d H:i:s", strtotime($tgl_mulai));
		$tgl_end = date("Y-m-d H:i:s", strtotime($tgl_selesai));

		$data['data'] = $this->TransaksiModel->get_dt_pengajuan_report($tgl_start,$tgl_end);
		$data['tgl_mulai'] = $tgl_start;
		$data['tgl_selesai'] = $tgl_end;

		$nipp = $this->session->userdata('nipp');
		$now = date('Y-m-d H:i:s');
		$datalog = array(
			'ip' => $_SERVER['REMOTE_ADDR'],
			'nipp' => $nipp,
			'aksi' => 'Export Data Laporan Pemakaian Mobil',
			'created' => $now
		);
		$insertlog = $this->LogModel->insert_log($datalog);


		$this->load->view('v_report_excel_pengajuan',$data);

	}
	
}
?>