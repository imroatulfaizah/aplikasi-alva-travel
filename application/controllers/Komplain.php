<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komplain extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if (empty($username)) {
			// $this->session->sess_destroy();
			redirect('login');
		}
	}

    public function index(){
        // var_dump("tes");
        // die();
		//$kode = $this->getkod_model->get_kodagen();
		// $data = array(
		// 	'kd_agen' => $kode,
		// 	'username_agen' => $this->input->post('username_agen'),
		// 	'password_agen' => $this->input->post('password_agen'),
		// 	'no_ktp_agen' => $this->input->post('no_ktp_agen'),
		// 	'nama_agen' => $this->input->post('nama_agen'),
		// 	'alamat_agen' => $this->input->post('alamat_agen'),
		// 	'email_agen' => $this->input->post('email_agen'),
		// 	'hp_agen' => $this->input->post('hp_agen'),
		// 	'img_agen'		 => $this->input->post('img_agen'),
		// 	'status_agen'		 => '1',
		// 	'date_create_agen'	=> $this->input->post('date_create_agen')
		// 	 );
		// $this->db->insert('tbl_agens', $data);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data agen Di Simpan", "success");');
		redirect('frontend/komplain');
	}
}
