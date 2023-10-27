<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('v_login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$new = md5($password);
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("users",$where)->num_rows();
		
			$query2 = $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$new'");
			$row = $query2->row();
		
		if($cek > 0){

			$data_session = array(
				'nama_lengkap' => $row->nama_lengkap,
				'id_user' => $row->id,
				'level' => $row->level,
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("home"));

		}else{
			$this->session->set_flashdata('error', '<div class="alert alert-danger">
								<strong>Gagal!!!</strong> Username Atau Password Anda Salah...
												</div>');
   
         //redirect to
         redirect('Login'); 
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}