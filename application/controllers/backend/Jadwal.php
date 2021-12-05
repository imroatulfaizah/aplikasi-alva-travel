 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->model('getkod_model');
		$this->getsecurity();
		$this->load->library('form_validation');
		$this->load->helper('tglindo_helper');
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
	public function index(){
		$data['title'] = "List Tujuan";
		// $data['jadwal'] = $this->db->query("SELECT * FROM tbl_jadwal LEFT JOIN tbl_bus 
		// on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan 
		// on tbl_jadwal.kd_asal = tbl_tujuan.kd_tujuan 
		// WHERE month(tanggal)=month(now())")->result_array();
		$filter = $this->input->post('filter');
		if($filter!=null){
			//var_dump("tes");
			if($filter=="minggu"){
				//var_dump("tes1");
				// $data['order'] = $this->db->query("SELECT * FROM tbl_order
				// where tgl_berangkat_order> now() -  interval 7 day")->result_array();
				$data['jadwal'] = $this->db->query("SELECT * FROM tbl_jadwal LEFT JOIN tbl_bus 
				on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan 
				on tbl_jadwal.kd_asal = tbl_tujuan.kd_tujuan 
				WHERE tanggal> now() -  interval 7 day")->result_array();
			}else if($filter=="bulan"){
				$data['jadwal'] = $this->db->query("SELECT * FROM tbl_jadwal LEFT JOIN tbl_bus 
				on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan 
				on tbl_jadwal.kd_asal = tbl_tujuan.kd_tujuan 
				WHERE month(tanggal)=month(now())")->result_array();
			}else{
				$data['jadwal'] = $this->db->query("SELECT * FROM tbl_jadwal LEFT JOIN tbl_bus 
				on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan 
				on tbl_jadwal.kd_asal = tbl_tujuan.kd_tujuan 
				WHERE tanggal BETWEEN CURDATE() - INTERVAL 1 YEAR AND CURDATE()")->result_array();
			}
		}else{
			$data['jadwal'] = $this->db->query("SELECT * FROM tbl_jadwal LEFT JOIN tbl_bus 
				on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan 
				on tbl_jadwal.kd_asal = tbl_tujuan.kd_tujuan")->result_array();
		}

		$this->load->view('backend/jadwal', $data);
	}
	public function viewtambahjadwal($value=''){
		$data['title'] = "Tambah Jadwal";
		$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan ORDER BY kota_tujuan asc")->result_array();
		$this->load->view('backend/tambahjadwal', $data);
	}
	public function tambahjadwal(){
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required|min_length[5]|max_length[12]');
		if ($this->form_validation->run() ==  FALSE) {
			$data['title'] = "Tambah Jadwal";
			$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();
			$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan ORDER BY kota_tujuan asc")->result_array();
			$this->load->view('backend/tambahjadwal', $data);
		} else {
			$asal = $this->input->post('asal');
			$tujuan = $this->db->query("SELECT * FROM tbl_tujuan
               WHERE kd_tujuan ='".$this->input->post('tujuan')."'")->row_array();
			if ($asal == $tujuan['kd_tujuan']) {
				$this->session->set_flashdata('message', 'swal("Berhasil", "Tujuan Jadwal Tidak Boleh Sama", "error");');
			redirect('backend/jadwal');
			}else{
			$kode = $this->getkod_model->get_kodjad();
			$simpan = array(
					'kd_jadwal' => $kode,
					'kd_asal' => $asal,
					'kd_tujuan' => $tujuan['kd_tujuan'],
					'kd_bus' => $this->input->post('bus'),
					'wilayah_jadwal' => $tujuan['kota_tujuan'],
					'tanggal' => $this->input->post('tanggal'),
					'jam_berangkat_jadwal' => $this->input->post('berangkat'),
					'jam_tiba_jadwal' => $this->input->post('tiba'),
					'harga_jadwal' =>  $this->input->post('harga'),
					 );
			// die(print_r($simpan));
			$this->db->insert('tbl_jadwal', $simpan);
			$this->session->set_flashdata('message', 'swal("Berhasil", "Data Jadwal Di Simpan", "success");');
			redirect('backend/jadwal');
			}
			
		}
		
	}
	public function viewjadwal($id=''){
		$data['title'] = "List Tujuan";
	 	$sqlcek = $this->db->query("SELECT * FROM tbl_jadwal LEFT JOIN tbl_bus on tbl_jadwal.kd_bus = tbl_bus.kd_bus LEFT JOIN tbl_tujuan on tbl_jadwal.kd_tujuan = tbl_tujuan.kd_tujuan WHERE kd_jadwal ='".$id."'")->row_array();
	 	if ($sqlcek) {
	 		$data['asal'] = $this->db->query("SELECT * FROM tbl_tujuan WHERE kd_tujuan = '".$sqlcek['kd_asal']."'")->row_array();
	 		$data['jadwal'] = $sqlcek;
			$data['armada'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();

			// var_dump($data);
			// die();
			$data['title'] = "View jadwal";
			// die(print_r($data));
			$this->load->view('backend/view_jadwal',$data);
	 	}else{
	 		$this->session->set_flashdata('message', 'swal("Gagal", "Data Jadwal Di Simpan", "error");');
			redirect('backend/jadwal');
	 	}
	}	
	public function editharga($id=''){
		$kode = (trim(html_escape($this->input->post('kode'))));
		$where = array('kd_jadwal' => $kode );
		$update = array('harga_jadwal' =>  $this->input->post('harga'),'kd_bus' => $this->input->post('armada'));
		$this->db->update('tbl_jadwal', $update,$where);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Edit", "success");');
		redirect('backend/jadwal/');
	}
}