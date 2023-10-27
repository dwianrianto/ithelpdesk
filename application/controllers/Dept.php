<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Dept extends MY_Controller{
 
	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$data['user'] = $this->db->get("mv_dept")->result();
		$data['judul'] = "Departemen";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		$this->render_page('pages/v_dept',$data);
	}
	
	function add(){
		$data['judul'] = "Departemen";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		$data['location'] = $this->db->get("m_location")->result();
		
		$this->render_page('pages/v_deptadd',$data);
	}
	
	function save(){
		
		$nama = $this->input->post('nama');
		$loc = $this->input->post('loc');
		
		$query = $this->db->query("
										INSERT INTO dept 
												(dept_name,id_location)
											VALUES
												('$nama','$loc')
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
		
		redirect('dept');
	}
	
	function edit($id){
		$data['judul'] = "Departemen";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		$data['user'] = $this->db->query("SELECT * FROM dept WHERE id_dept='$id'")->result();
		$data['lokasi'] = $this->db->query("SELECT * FROM location WHERE status='0'")->result();
			
		$this->render_page('pages/v_edept',$data);
	}
	
	function save_edit(){
		
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$loc = $this->input->post('loc');
		
		$query = $this->db->query("
				UPDATE dept SET dept_name='$nama',id_location='$loc'
				WHERE id_dept='$id'
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-info alert-dismissible" 
		data-auto-dismiss="1000" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		  <strong>
			<span class="glyphicon glyphicon-ok"></span> Success!!!
		  </strong> Data Berhasil Di Update ...
		</div>
		');
		
		redirect('dept');
	}
	
	function delete($id){
		
		$query = $this->db->query("
			UPDATE dept SET status='5'
			WHERE id_dept='$id'
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-danger alert-dismissible" 
		data-auto-dismiss="1000" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		  <strong>
			<span class="glyphicon glyphicon-ok"></span> Success!!!
		  </strong> Data Berhasil Di Hapus ...
			<br/>
				<a href='.base_url().'dept/cansel_delete/'.$id.'>Kembalikan Data</a>
		</div>
		');
		
		redirect('dept');
	}
	
	function cansel_delete($id){
		
		$query = $this->db->query("
			UPDATE dept SET status='0'
			WHERE id_dept='$id'
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
		
		redirect('dept');
	}
}