<?php 
 
class Assets_it extends MY_Controller{
 
	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$data['judul'] = "Kategori Asset";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		$data['user'] = $this->db->query("SELECT
			  `assets`.`id_asset`,
			  `assets`.`asset_name`,
			  `assets`.`id_jenis`,
			  `assets`.`status`,
			  `jenis_asset`.`id_jenis` AS `id_jenis1`,
			  `jenis_asset`.`jenis_name`
			FROM
			  `assets`
			LEFT JOIN `jenis_asset` ON `jenis_asset`.`id_jenis` = `assets`.`id_jenis`
			ORDER BY assets.id_asset DESC
		")->result();
		$data['baris_detail'] = $this;
		$data['st'] = $this;
		
		$this->render_page('pages/v_assets',$data);
	}
	
	public function jumlah_baris($id){
		$baris = $this->db->query("SELECT * FROM detail_asset WHERE id_asset='$id'")->num_rows();
		return $baris;
	}
	
	public function jumlah_barisstatus($id,$status){
		$st = $this->db->query("SELECT * FROM detail_asset WHERE id_asset='$id' AND status='$status'")->num_rows();
		return $st;
	}
	
	function add(){
		$data['judul'] = "Kategori Asset ";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		$this->render_page('pages/v_assetadd',$data);
	}
	
	function save(){
		$jenis = $this->input->post('jenis');
		$nama = $this->input->post('nama');
		
		
		$query = $this->db->query("
										INSERT INTO assets 
												(asset_name,id_jenis)
											VALUES
												('$nama','$jenis')
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<strong>Success!</strong> User Berhasil Di Tambahkan...
												</div>
		');
		
		redirect('assets_it');
	}
	
	function edit($id){
		$data['judul'] = "Kategori Asset";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		$data['user'] = $this->db->query("SELECT * FROM assets WHERE id_asset='$id'")->result();
			
		$this->render_page('pages/v_easset',$data);
	}
	
	function save_edit(){
		
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$nama = $this->input->post('nama');
		
		$query = $this->db->query("
						UPDATE assets SET asset_name='$nama',id_jenis='$jenis'
						WHERE id_asset='$id'
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-info">
								<strong>Success!</strong> Data Kategori Asset Berhasil Di Update
												</div>
		');
		
		redirect('assets_it');
	}
	
	function non_active($id){
		
		$query = $this->db->query("
				UPDATE assets SET status='5'
				WHERE id_asset='$id'
		");
		$query2 = $this->db->query("
				UPDATE detail_asset SET status='5'
				WHERE id_asset='$id'
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
		
		redirect('assets_it');
	}
	
	function active($id){
		
		$query = $this->db->query("
				UPDATE assets SET status='0'
				WHERE id_asset='$id'
		");
		$query2 = $this->db->query("
				UPDATE detail_asset SET status='0'
				WHERE id_asset='$id'
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
		
		redirect('assets_it');
	}
	
	function detail($id){
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		$data['judul'] = "Kategori Asset";
		$data['asset'] = $query = $this->db->query("SELECT * FROM assets WHERE id_asset='$id'")->result();
		$data['detail_asset'] = $this->db->query("SELECT
			  `detail_asset`.`id_detail`,
			  `detail_asset`.`model_name`,
			  `detail_asset`.`basis`,
			  `detail_asset`.`version_name`,
			  `detail_asset`.`stock_asset`,
			  `detail_asset`.`stock_user`,
			  `detail_asset`.`id_asset`,
			  `detail_asset`.`status`,
			  `assets`.`id_asset` AS `id_asset1`,
			  `assets`.`asset_name`,
			  `assets`.`note_asset`,
			  `assets`.`id_jenis`,
			  `jenis_asset`.`id_jenis` AS `id_jenis1`,
			  `jenis_asset`.`jenis_name`
			FROM
			  `detail_asset`
			  LEFT JOIN `assets` ON `assets`.`id_asset` = `detail_asset`.`id_asset`
			  LEFT JOIN `jenis_asset` ON `jenis_asset`.`id_jenis` = `assets`.`id_jenis`
			  WHERE `detail_asset`.`id_asset` = '$id'
		")->result();
		$data['baris_detail'] = $this;
		$data['st'] = $this;
		
		$this->render_page('pages/v_detailasset',$data);
	}
	
	public function jumlahdetail_baris($id){
		$baris = $this->db->query("SELECT * FROM detail_pemakaian WHERE id_asset='$id'")->num_rows();
		return $baris;
	}
	
	public function jumlahdetail_masuk($id){
		$barism = $this->db->query("SELECT * FROM barang_masuk WHERE id_asset='$id'")->num_rows();
		return $barism;
	}
	
	
	function non_activedetail($id,$ok){
		
		$query = $this->db->query("
				UPDATE detail_asset SET status='5'
				WHERE id_detail='$id'
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
		
		redirect('assets_it/detail/'.$ok);
	}
	
	function active_detail($id,$ok){
		
		$query = $this->db->query("
				UPDATE detail_asset SET status='0'
				WHERE id_detail='$id'
		");
		
		$query = $this->db->query("
				UPDATE assets SET status='0'
				WHERE id_asset='$ok'
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
		
		redirect('assets_it/detail/'.$ok);
	}
	
	function save_modal(){
		$asset_m = $this->input->post('id_asset');
		$model_m = $this->input->post('model_m');
		
		
		$query = $this->db->query("
										INSERT INTO detail_asset 
												(model_name,id_asset)
											VALUES
												('$model_m','$asset_m')
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<strong>Success!</strong> Model Asset Baru Berhasil Di Tambahkan...
												</div>
		');
		
		redirect('assets_it/detail/'.$asset_m);
	}
	
	function delete_detail($id,$ok){
		
		$query = $this->db->query("
				DELETE FROM detail_asset
				WHERE id_detail='$id'
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-danger alert-dismissible" 
		data-auto-dismiss="1000" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		  <strong>
			<span class="glyphicon glyphicon-ok"></span> Success!!!
		  </strong> Data Model Berhasil Di Hapus ...
		</div>
		');
		
		redirect('assets_it/detail/'.$ok);
	}
	
	function save_editmodal(){
		$asset_m = $this->input->post('id_asset');
		$id_detail = $this->input->post('id_detail');
		$model_m = $this->input->post('model_m');
		
		
		$query = $this->db->query("
										UPDATE detail_asset SET model_name='$model_m'
										WHERE id_detail='$id_detail'
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<strong>Success!</strong> Model Asset Berhasil Di Update...
												</div>
		');
		
		redirect('assets_it/detail/'.$asset_m);
	}
}