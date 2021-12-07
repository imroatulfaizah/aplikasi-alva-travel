<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
		$this->load->view('frontend/profile');
	}
	public function profilesaya($id=''){
		$data['cek'] = $this->db->query("SELECT * FROM tbl_pelanggan where kd_pelanggan ='".$id."'")->row_array();
		if($data['cek'] != null){
			$data['profile'] = $this->db->query("SELECT * FROM tbl_pelanggan WHERE kd_pelanggan LIKE '".$id."'")->row_array();
		}else{
			$data['profile'] = $this->db->query("SELECT * FROM tbl_agens WHERE kd_agen LIKE '".$id."'")->row_array();
		}
		
		// die(print_r($data));
		$this->load->view('frontend/profile',$data);
	}
	public function editprofile($id=''){
		$id = $this->input->post('kode');
		$data['cek'] = $this->db->query("SELECT * FROM tbl_pelanggan where kd_pelanggan ='".$id."'")->row_array();
		
		if($data['cek'] != null){
			$where = array('kd_pelanggan' => $id );
		$update = array(
			'no_ktp_pelanggan'			=> $this->input->post('ktp'),
			'nama_pelanggan'  => $this->input->post('nama'),
			'email_pelanggan'	    	=> $this->input->post('email'),
			'img_pelanggan'		=> 'assets/frontend/img/default.png',
			'alamat_pelanggan'		=> $this->input->post('alamat'),
			'telpon_pelanggan'		=> $this->input->post('hp'),
			 );
		$this->db->update('tbl_pelanggan', $update,$where);
		}else{
			$where = array('kd_agen' => $id );
		$update = array(
			'no_ktp_agen'			=> $this->input->post('ktp'),
			'nama_agen'  => $this->input->post('nama'),
			'email_agen'	    	=> $this->input->post('email'),
			'img_agen'		=> 'assets/frontend/img/default.png',
			'alamat_agen'		=> $this->input->post('alamat'),
			'hp_agen'		=> $this->input->post('hp'),
			 );
		$this->db->update('tbl_agens', $update,$where);
		}
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Edit", "success");');
		redirect('profile/profilesaya/'.$id);
	}
	public function tiketsaya($id=''){
		$this->getsecurity();
		$kode = $this->session->userdata('kd_agen');
		$cut = substr($kode, 0, 2);
		if($cut == "AG"){
			// echo $kode;
			// echo "yes";
			$data['tiket'] = $this->db->query("SELECT a.*, b.*, c.*, a.kd_tujuan, c.kota_tujuan as asal, c.kota_tujuan as tujuan FROM `tbl_jadwal` a inner join tbl_order b on a.kd_jadwal = b.kd_jadwal inner join tbl_tujuan c on a.kd_asal = c.kd_tujuan || a.kd_tujuan = c.kd_tujuan
			WHERE kd_agen ='".$kode."' group by kd_order")->result_array();
		}else{
			// echo "no";
			// echo $id;
			$data['tiket'] = $this->db->query("SELECT * FROM tbl_order 
			WHERE kd_pelanggan ='".$id."' group by kd_order")->result_array();
		}		
		//die(print_r($data));
		//die();
		$this->load->view('frontend/tiketmu',$data);
	}

	public function caritiketsaya($tanggal=''){
		$this->getsecurity();
		$tanggal = $_GET['tanggal'];
		$kode = $this->session->userdata('kd_agen');
		$kd_pelanggan = $this->session->userdata('kd_pelanggan');
		$cut = substr($kode, 0, 2);
		if($cut == "AG"){
			$sqlcek = $this->db->query("SELECT * FROM tbl_order WHERE tgl_berangkat_order ='".$tanggal."' && kd_agen = '".$kode."' group by kd_order")->result_array();
		}else{
			$sqlcek = $this->db->query("SELECT * FROM tbl_order WHERE tgl_berangkat_order ='".$tanggal."' && kd_agen = '".$kd_pelanggan."' group by kd_order")->result_array();
		}

		if ($sqlcek != null) {
		
		$data['tiket'] = $sqlcek;
		
		// var_dump($data);
		// die();
		$this->load->view('frontend/tiketmu',$data);
		}else{
			$this->session->set_flashdata('message', 'swal("Kosong", "Tiket Order Tidak Ada", "error");');
    		redirect('profile/tiketsaya');
		}
	}

	public function changepassword($id=''){
		$this->load->library('form_validation');
		$pelanggan = $this->db->query("SELECT password_pelanggan FROM tbl_pelanggan where kd_pelanggan ='".$id."'")->row_array();
		// die(print_r($pelanggan));
		$this->form_validation->set_rules('currentpassword', 'currentpassword', 'trim|required|min_length[8]',array(
			'required' => 'Masukan Password',
			 ));
		$this->form_validation->set_rules('new_password1', 'new_password1', 'trim|required|min_length[8]|matches[new_password2]',array(
			'required' => 'Masukan Password.',
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		$this->form_validation->set_rules('new_password2', 'new_password2', 'trim|required|min_length[8]|matches[new_password1]',array(
			'required' => 'Masukan Password.',
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/changepassword');
		} else {
			$currentpassword = $this->input->post('currentpassword');
			$newpassword 	 = $this->input->post('new_password1');
			if (!password_verify($currentpassword, $pelanggan['password_pelanggan'])) {
				$this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
					  Password Sebelumnya Salah
					</div>');
				redirect('profile/changepassword');
			}elseif ($currentpassword == $newpassword) {
				$this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
					  Password Tidak Boleh Sama Sebelumnya
					</div>');
				redirect('profile/changepassword');
			}else{
				$password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
				$where = array('kd_pelanggan' => $id );
				$update = array(
				'password_pelanggan'			=> $password_hash,
				 );
				$this->db->update('tbl_pelanggan', $update,$where);
				$this->session->set_flashdata('message', 'swal("Berhasil", "Data Di Edit", "success");');
				redirect('profile/profilesaya/'.$id);
			}
		}

	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
}