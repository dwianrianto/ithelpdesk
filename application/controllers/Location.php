<?php 
 
class Location extends MY_Controller{
 
	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	public function index(){
		$data['user'] = $this->db->get("m_location")->result();
		$data['judul'] = "Lokasi";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
			
		$this->render_page('pages/v_location',$data);
	}
	
	public function add(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$data['judul'] = "Lokasi";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		if($this->input->post('simpan') == 'simpan'){
			
			$nama=$this->input->post('nama');
			$this->form_validation->set_rules('nama', 'Nama Lokasi', 'required|max_length[50]');
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('sukses', '<div class="alert alert-danger fade in">'.form_error('nama').'</div>
				');
				$this->render_page('pages/v_locadd',$data);
			}
			else
			{
				$this->db->query("CALL mi_location('$nama')");
				$this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible" 
					data-auto-dismiss="1000" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span></button>
					  <strong>
						<span class="glyphicon glyphicon-ok"></span> Success!!!
					  </strong> Data Baru Berhasil Di Simpan ...
					</div>
				');
				redirect('location');
			}
		}else{
			$this->render_page('pages/v_locadd',$data);
		}
	}
	
	function edit($id){
		$data['judul'] = "Lokasi";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		$data['user'] = $this->db->query("SELECT * FROM location WHERE id_location='$id'")->result();
			
		$this->render_page('pages/v_elocation',$data);
	}
	
	function save_edit(){
		
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		
		
		$query = $this->db->query("
			UPDATE location SET location_name='$nama'
			WHERE id_location='$id'
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
		
		redirect('location');
	}
	
	function delete($id){
		
		$query = $this->db->query("
			UPDATE location SET status='5'
			WHERE id_location='$id'
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-danger alert-dismissible" 
		data-auto-dismiss="1000" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		  <strong>
			<span class="glyphicon glyphicon-ok"></span> Success!!!
		  </strong> Data Berhasil Di Hapus ...
			<br/>
				<a href='.base_url().'location/cansel_delete/'.$id.'>Kembalikan Data</a>
		</div>
		');
		
		redirect('location');
	}
	
	function cansel_delete($id){
		
		$query = $this->db->query("
			UPDATE location SET status='0'
			WHERE id_location='$id'
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
		
		redirect('location');
	}
}