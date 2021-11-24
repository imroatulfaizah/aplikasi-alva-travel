<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
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
	$data['title'] = "Laporan Keuangan";
    $data['jumlah'] = $this->db->query("SELECT sum(CAST(a.harga_tiket AS UNSIGNED)) as total FROM tbl_tiket a inner join tbl_order b on a.kd_order = b.kd_order")->result_array();
	$data['keuangan'] = $this->db->query("SELECT a.*, b.* FROM tbl_tiket a inner join tbl_order b on a.kd_tiket = b.kd_tiket")->result_array();
	//$data['keuangan'] = $this->db->query("SELECT * FROM tbl_ group by kd_keuangan")->result_array();
	$this->load->view('backend/keuangan', $data);	
	}

	public function viewkeuangan($id=''){
	 $sqlcek = $this->db->query("SELECT * FROM tbl_keuangan WHERE kd_order ='".$id."'")->result_array();
	 $data['title'] = "View Keuangan";
	 if ($sqlcek == NULL) {
	 	$this->session->set_flashdata('message', 'swal("Kosong", "Tidak Ada Kiriman keuangan", "error");');
		redirect('backend/order/vieworder/'.$id);
	 }else{		
		$data['keuangan'] = $sqlcek;
	 	$this->load->view('backend/view_keuangan',$data);
		}
	}
}
