<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
	$data['title'] = "List Driver";
	$data['driver'] = $this->db->query("SELECT * FROM tbl_driver ORDER BY nama_driver asc")->result_array();
	// die(print_r($data));
	$this->load->view('backend/driver', $data);	
	}
	public function viewdriver($id=''){
		$data['title'] = "View driver";
		$data['driver'] = $this->db->query("SELECT * FROM tbl_driver WHERE kd_driver = '".$id."'")->row_array();
		// die(print_r($data));
		$this->load->view('backend/view_driver', $data);
	}
	public function tambahdriver(){
		$kode = $this->getkod_model->get_koddriver();
		$data = array(
			'kd_driver' => $kode,
			'nama_driver' => $this->input->post('nama_driver'),
			'alamat_driver'		 => $this->input->post('alamat_driver'),
			'hp_driver'		 => $this->input->post('hp_driver'),
			'status_driver'			=> '1'
			 );
		$this->db->insert('tbl_driver', $data);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data driver Di Simpan", "success");');
		redirect('backend/driver');
	}

	public function editstatus($id=''){
		$kode = (trim(html_escape($this->input->post('kode'))));
		$where = array('kd_driver' => $kode );
		$update = array('alamat_driver' =>  $this->input->post('alamat'),
		'hp_driver' =>  $this->input->post('telp'), 'status_driver' =>  $this->input->post('status'));
		$this->db->update('tbl_driver', $update,$where);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Edit", "success");');
		redirect('backend/driver/');
	}

}