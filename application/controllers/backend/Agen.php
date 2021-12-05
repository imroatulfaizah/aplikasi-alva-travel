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
	$data['agen'] = $this->db->query("SELECT * FROM tbl_agens ORDER BY kd_agen asc")->result_array();
	// die(print_r($data));
	$this->load->view('backend/agen', $data);	
	}
	
	public function viewagen($id=''){
		$data['title'] = "View Agen";
		$data['agen'] = $this->db->query("SELECT * FROM tbl_agens WHERE kd_agen = '".$id."'")->row_array();
		// die(print_r($data));
		$this->load->view('backend/view_agen', $data);
	}
	public function tambahagen(){
		$kode = $this->getkod_model->get_kodagen();
		$data = array(
			'kd_agen' => $kode,
			'username_agen' => $this->input->post('username_agen'),
			'password_agen' => $this->input->post('password_agen'),
			'no_ktp_agen' => $this->input->post('no_ktp_agen'),
			'nama_agen' => $this->input->post('nama_agen'),
			'alamat_agen' => $this->input->post('alamat_agen'),
			'email_agen' => $this->input->post('email_agen'),
			'hp_agen' => $this->input->post('hp_agen'),
			'img_agen'		 => $this->input->post('img_agen'),
			'status_agen'		 => '1',
			'date_create_agen'	=> $this->input->post('date_create_agen')
			 );
		$this->db->insert('tbl_agens', $data);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data agen Di Simpan", "success");');
		redirect('backend/agen');
	}

	public function editstatus($id=''){
		$kode = (trim(html_escape($this->input->post('kode'))));
		$where = array('kd_agen' => $kode );
		$update = array('alamat_agen' => $this->input->post('alamat'),'hp_agen' => $this->input->post('telp'),
		'status_agen' =>  $this->input->post('status'));
		$this->db->update('tbl_agens', $update,$where);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Edit", "success");');
		redirect('backend/agen/');
	}

}