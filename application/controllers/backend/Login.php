<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if ($username) {
			redirect('backend/home');
			$this->session->sess_destroy();
			redirect('backend/login');
		}else{
			redirect('backend/login');
		}
	}
	function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
        
    }
	public function index(){
		// $this->getsecurity();
		$data['ipaddres'] = $this->getUserIP();
		// die(print_r($data));
		$this->load->view('backend/login',$data);
	}

    public function register(){
		$this->form_validation->set_rules('nomor', 'Nomor', 'trim|required|is_unique[tbl_pelanggan.telpon_pelanggan]',array(
			'required' => 'Nomor HP Wajib Di isi.',
			'is_unique' => 'Nomor Sudah Di Gunakan.'
			 ));
		$this->form_validation->set_rules('name', 'Name', 'trim|required',array(
			'required' => 'Nama Wajib Di isi.',
			 ));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[tbl_pelanggan.username_pelanggan]',array(
			'required' => 'Username Wajib Di isi.',
			'is_unique' => 'Username Sudah Di Gunakan.'
			 ));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_pelanggan.email_pelanggan]',array(
			'required' => 'Email Wajib Di isi.',
			'valid_email' => 'Masukan Email Dengan Benar',
			'is_unique' => 'Email Sudah Di Gunakan.'
			 ));
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]',array(
			'matches' => 'Password Tidak Sama.',
			'min_length' => 'Password Minimal 8 Karakter.'
			 ));
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('backend/register');
		} else {
			$this->load->model('getkod_model');
			$data = array(
			'kd_agen'	=> $this->getkod_model->get_kodagen(),
			'nama_agen'  => $this->input->post('name'),
			'email_agen'	    	=> $this->input->post('email'),
			'img_agen'		=> 'assets/frontend/img/default.png',
			'alamat_agen'		=> $this->input->post('alamat'),
			'hp_agen'		=> $this->input->post('nomor'),
			'username_agen'		=> $this->input->post('username'),
			'status_agen' => 1,
			'date_create_agen' => time(),
			'password_agen'		=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT)
			);
			$this->db->insert('tbl_agens', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil", "Pendaftaran Berhasil! Silahkan login kembali.", "success");');
    		redirect('login');
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('backend/login'));
	}
	public function cekuser(){
    $username = strtolower($this->input->post('username'));
    $ambil = $this->db->query('select * from tbl_admin where username_admin = "'.$username.'"')->row_array();
    $password = $this->input->post('password');

    if (password_verify($password,$ambil['password_admin'])) {
    	$this->db->where('username_admin',$username);
        $query = $this->db->get('tbl_admin');
            foreach ($query->result() as $row) {
                $sess = array(
                	'kd_admin' => $row->kd_admin,
                    'username_admin' => $row->username_admin,
                    'password_admin' => $row->password_admin,
                    'nama_admin'     => $row->nama_admin,
                    'img_admin'	=> $row->img_admin,
                    'email_admin'   => $row->email_admin,
                    'telpon_admin'   => $row->telpon_admin,
                    'alamat_admin'	=> $row->alamat_admin,
                    'level'	=> $row->level_admin
                );
                // die(print_r($sess));
                $this->session->set_userdata($sess);
                redirect('backend/home');
            }
    }else{
    	$this->session->set_flashdata('message', 'swal("Gagal", "Email/Password Salah", "error");');
    	redirect('backend/login');
    	}
	}

}
