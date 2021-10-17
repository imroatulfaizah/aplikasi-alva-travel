<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bus extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
	$data['title'] = "List Bus";
	$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();
	// die(print_r($data));
	$this->load->view('backend/bus', $data);	
	}
	public function viewbus($id=''){
		$data['title'] = "View Bus";
		$data['bus'] = $this->db->query("SELECT * FROM tbl_bus WHERE kd_bus = '".$id."'")->row_array();
		// die(print_r($data));
		$this->load->view('backend/view_bus', $data);
	}
	public function tambahbus(){
		$kode = $this->getkod_model->get_kodbus();
		$data = array(
			'kd_bus' => $kode,
			'nama_bus' => $this->input->post('nama_bus'),
			'plat_bus'		 => $this->input->post('plat_bus'),
			'kapasitas_bus'		 => $this->input->post('seat'),
			'status_bus'			=> '1'
			 );
		$this->db->insert('tbl_bus', $data);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Bus Di Simpan", "success");');
		redirect('backend/bus');
	}

	public function editstatus($id=''){
		$kode = (trim(html_escape($this->input->post('kode'))));
		$where = array('kd_bus' => $kode );
		$update = array('status_bus' =>  $this->input->post('status'));
		$this->db->update('tbl_bus', $update,$where);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Edit", "success");');
		redirect('backend/bus/');
	}

}