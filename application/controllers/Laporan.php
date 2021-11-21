<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
        $kode = $this->session->userdata('kd_agen');
		$cut = substr($kode, 0, 2);
		if($cut == "AG"){
			// echo $kode;
			// echo "yes";
			$data['tiket'] = $this->db->query("SELECT a.*, b.*, sum(CAST(harga_tiket AS UNSIGNED)) as total FROM tbl_tiket a inner join tbl_order b on a.kd_tiket = b.kd_tiket WHERE b.kd_agen = 'AG001' ORDER BY a.kd_order ASC")->result_array();
		}else{
			// echo "no";
			// echo $id;
			$data['tiket'] = $this->db->query("SELECT a.*, b.* FROM tbl_tiket a inner join tbl_order b on a.kd_tiket = b.kd_tiket WHERE b.kd_agen = 'AG001' ORDER BY a.kd_order ASC")->result_array();
		}		
		//die(print_r($data));
		//die();
		$this->load->view('frontend/laporan', $data);
		//$this->load->view('frontend/laporan');
	}

	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
}