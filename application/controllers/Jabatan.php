<?php 
 
class Jabatan extends MY_Controller{
 
	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$data['user'] = $this->db->query("SELECT
									  `jabatan`.`id_jabatan`,
									  `jabatan`.`jabatan_name`,
									  `jabatan`.`id_dept`,
									  `jabatan`.`status`,
									  `dept`.`id_dept` AS `id_dept1`,
									  `dept`.`dept_name`,
									  `dept`.`id_location`,
									  `location`.`id_location` AS `id_location1`,
									  `location`.`location_name`
									FROM
									  `jabatan`
									  LEFT JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
									  LEFT JOIN `location` ON `location`.`id_location` = `dept`.`id_location`
									  WHERE `jabatan`.`status` = '0'
		")->result();
		$data['judul'] = "Jabatan";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
			
		$this->render_page('pages/v_jabatan',$data);
	}
	
	function add(){
		$data['judul'] = "Jabatan";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		$data['location'] = $this->db->query("SELECT * FROM location")->result();
		$data['department'] = $this->db->query("SELECT * FROM dept")->result();
		
		$this->render_page('pages/v_jabatanadd',$data);
	}
	
	function save(){
		
		$nama = $this->input->post('nama');
		$loc = $this->input->post('loc');
		$dept = $this->input->post('dept');
		
		$query = $this->db->query("
										INSERT INTO jabatan 
												(jabatan_name,id_dept)
											VALUES
												('$nama','$dept')
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible" 
		data-auto-dismiss="1000" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		  <strong>
			<span class="glyphicon glyphicon-ok"></span> Success!!!
		  </strong> Data Baru Berhasil Di Simpan ...
		</div>
		');
		
		redirect('jabatan');
	}
	
	function edit($id){
		$data['user'] = $this->db->query("SELECT * FROM users WHERE id='$id'")->result();
			
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
	
	function delete($id){
		
		$query = $this->db->query("
			UPDATE jabatan SET status='5'
			WHERE id_jabatan='$id'
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-danger alert-dismissible" 
		data-auto-dismiss="1000" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		  <strong>
			<span class="glyphicon glyphicon-ok"></span> Success!!!
		  </strong> Data Berhasil Di Hapus ...
			<br/>
				<a href='.base_url().'jabatan/cansel_delete/'.$id.'>Kembalikan Data</a>
		</div>
		');
		
		redirect('jabatan');
	}
	
	function cansel_delete($id){
		
		$query = $this->db->query("
			UPDATE jabatan SET status='0'
			WHERE id_jabatan='$id'
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-warning alert-dismissible" 
		data-auto-dismiss="1000" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		  <strong>
			<span class="glyphicon glyphicon-ok"></span> Success!!!
		  </strong> Data Berhasil Di Kembalikan ...
		</div>
		');
		
		redirect('jabatan');
	}
}