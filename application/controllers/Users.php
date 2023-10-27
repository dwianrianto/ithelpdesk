<?php 
 
class Users extends MY_Controller{
 
	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('M_users','userm');
	}
 
	function index(){
		$data['user'] = $this->db->query("SELECT
			  `users`.`id`,
			  `users`.`nama_lengkap`,
			  `users`.`level`,
			  `users`.`id_jabatan`,
			  `users`.`username`,
			  `users`.`password`,
			  `jabatan`.`id_jabatan` AS `id_jabatan1`,
			  `jabatan`.`jabatan_name`,
			  `jabatan`.`id_dept`,
			  `dept`.`id_dept` AS `id_dept1`,
			  `dept`.`dept_name`,
			  `dept`.`id_location`,
			  `location`.`id_location` AS `id_location1`,
			  `location`.`location_name`
			FROM
			  `users`
			  LEFT JOIN `jabatan` ON `jabatan`.`id_jabatan` = `users`.`id_jabatan`
			  LEFT JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
			  LEFT JOIN `location` ON `location`.`id_location` = `dept`.`id_location`")->result();
		$data['judul'] = "User";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
			
		$this->render_page('pages/v_users',$data);
	}
	
	function add(){
		$data['judul'] = "User";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		$data['location'] = $this->db->query("SELECT * FROM location")->result();
		$data['department'] = $this->db->query("SELECT * FROM dept")->result();
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatan")->result();
		
		$this->render_page('pages/v_useradd',$data);
	}
	
	function save(){
		
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$location = $this->input->post('location');
		$dept = $this->input->post('dept');
		$jab = $this->input->post('jab');
		$level = $this->input->post('level');
		
		$pass= md5($password);
		
		$query = $this->db->query("
										INSERT INTO users 
												(username,password,nama_lengkap,level,id_jabatan)
											VALUES
												('$username','$pass','$nama','$level','$jab')
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<strong>Success!</strong> User Berhasil Di Tambahkan...
												</div>
		');
		
		redirect('users');
	}
	
	function edit($id){
		$data['user'] = $this->db->query("SELECT * FROM users WHERE id='$id'")->result();
		$data['judul'] = "User";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
			
		$this->render_page('pages/v_euser',$data);
	}
	
	function save_edit(){
		
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$level = $this->input->post('level');
		
		
		$query = $this->db->query("
										UPDATE users SET nama_lengkap='$nama',username='$username',level='$level'
										WHERE id='$id'
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<strong>Success!</strong> Data User Berhasil Di Update
												</div>
		');
		
		redirect('users/edit/'.$id);
	}
}