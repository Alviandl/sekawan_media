 <?php
 class Home extends CI_Controller
 {
 	public function __construct() {
 		parent::__construct();
 		if (!$this->session->userdata('id_user')) {

 			redirect(base_url('Login'));
 		}

 	}
 	public function index()
 	{

		$data['jumlah_ditolak']= $this->HomeModel->get_jumlah_ditolak();
		$data['jumlah_pengajuan']= $this->HomeModel->get_jumlah_pengajuan();
		$data['jumlah_kendaraan']= $this->HomeModel->get_jumlah_kendaraan();
		$data['jumlah_sopir']= $this->HomeModel->get_jumlah_sopir();

		$dataap['menu'] = 'home';

 		$this->load->view('v_header');
 		$this->load->view('v_navbar',$dataap);
 		$this->load->view('v_home',$data);
 		$this->load->view('v_footer');
 	}
 }
 ?>
