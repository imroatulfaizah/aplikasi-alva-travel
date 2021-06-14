<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class agen extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
	$data['title'] = "List Agen";
	$data['agen'] = $this->db->query("SELECT * FROM tbl_agen ORDER BY nama_agen asc")->result_array();
	// die(print_r($data));
	$this->load->view('backend/agen', $data);	
	}
	public function viewagen($id=''){
		$data['title'] = "View Agen";
		$data['agen'] = $this->db->query("SELECT * FROM tbl_agen WHERE kd_agen = '".$id."'")->row_array();
		// die(print_r($data));
		$this->load->view('backend/view_agen', $data);
	}
	public function tambahagen(){
		$kode = $this->getkod_model->get_kodagen();
		$data = array(
			'kd_agen' => $kode,
			'nama_agen' => $this->input->post('nama_agen'),
			'alamat_agen'		 => $this->input->post('alamat_agen'),
			'hp_agen'		 => $this->input->post('hp_agen'),
			'status_agen'			=> '1'
			 );
		$this->db->insert('tbl_agen', $data);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data agen Di Simpan", "success");');
		redirect('backend/agen');
	}

}