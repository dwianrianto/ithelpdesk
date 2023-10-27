<?php 
 
class Report extends MY_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		if($_SESSION['level'] == 'user'){
			redirect('profile');
		}
	}
 
	function pm(){
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		$this->render_page('report/v_pm',$data);
	}
	
	function bm(){
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		$this->render_page('report/v_bm',$data);
	}
	
	function detail_lappm(){
		$tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');
		$data['user'] = $this->db->query("
					SELECT
			  `pengajuan`.`id_pengajuan`,
			  `pengajuan`.`no_pengajuan`,
			  `pengajuan`.`work_priority`,
			  `pengajuan`.`id_asset`,
			  `pengajuan`.`tgl_pengajuan`,
			  `pengajuan`.`tgl_butuh`,
			  `pengajuan`.`periode`,
			  `pengajuan`.`tahun`,
			  `pengajuan`.`id_user`,
			  `pengajuan`.`note` AS pesan,
			  `pengajuan`.`id_technisi`,
			  `pengajuan`.`status_pengajuan`,
			  `pengajuan`.`proses_pengajuan`,
			  `detail_asset`.`id_detail`,
			  `detail_asset`.`model_name`,
			  `detail_asset`.`basis`,
			  `detail_asset`.`version_name`,
			  `detail_asset`.`id_asset` AS `id_asset1`,
			  `assets`.`id_asset` AS `id_asset2`,
			  `assets`.`asset_name`,
			  `assets`.`id_jenis`,
			  `jenis_asset`.`id_jenis` AS `id_jenis1`,
			  `jenis_asset`.`jenis_name`,
			  `users`.`id`,
			  `users`.`username`,
			  `users`.`password`,
			  `users`.`nama_lengkap`,
			  `users`.`level`,
			  `users`.`id_jabatan`,
			  `jabatan`.`id_jabatan` AS `id_jabatan1`,
			  `jabatan`.`jabatan_name`,
			  `jabatan`.`id_dept`,
			  `dept`.`id_dept` AS `id_dept1`,
			  `dept`.`dept_name`,
			  `dept`.`id_location`,`location`.`id_location` AS `id_location1`,
			  `location`.`location_name`
			FROM
			  `pengajuan`
			  LEFT JOIN `detail_asset` ON `detail_asset`.`id_detail` =
				`pengajuan`.`id_asset`
			  LEFT JOIN `assets` ON `assets`.`id_asset` = `detail_asset`.`id_asset`
			  LEFT JOIN `jenis_asset` ON `jenis_asset`.`id_jenis` = `assets`.`id_jenis`
			  LEFT JOIN `users` ON `users`.`id` = `pengajuan`.`id_user`
			  LEFT JOIN `jabatan` ON `jabatan`.`id_jabatan` = `users`.`id_jabatan`
			  LEFT JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
			  LEFT JOIN `location` ON `location`.`id_location` = `dept`.`id_location`
			  WHERE `pengajuan`.`tgl_pengajuan` BETWEEN '$tgl1' AND '$tgl2'
		")->result();
		
		$data['judul'] = "Laporan Pengajuan Masuk <br/> Dari " .$tgl1. " Sampai " .$tgl2;
		
		$this->load->view('report/v_detlappm',$data);
	}
	
	function detail_lapbm(){
		$tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');
		$data['user'] = $this->db->query("SELECT
			  `barang_masuk`.`id_bm`,
			  `barang_masuk`.`id_asset`,
			  `barang_masuk`.`qty_in`,
			  `barang_masuk`.`tgl_in`,
			  `barang_masuk`.`note_bm`,
			  `barang_masuk`.`id_user`,
			  `barang_masuk`.`create_date`,
			  `detail_asset`.`id_detail`,
			  `detail_asset`.`model_name`,
			  `detail_asset`.`basis`,
			  `detail_asset`.`version_name`,
			  `detail_asset`.`id_asset` AS `id_asset1`,
			  `assets`.`id_asset` AS `id_asset2`,
			  `assets`.`asset_name`,
			  `assets`.`note_asset`,
			  `assets`.`id_jenis`,
			  `assets`.`jumlah_asset`,
			  `jenis_asset`.`id_jenis` AS `id_jenis1`,
			  `jenis_asset`.`jenis_name`,
			  `users`.`id`,
			  `users`.`nama_lengkap`,
			  `users`.`level`,
			  `users`.`id_jabatan`,
			  `jabatan`.`id_jabatan` AS `id_jabatan1`,
			  `jabatan`.`jabatan_name`,
			  `jabatan`.`id_dept`,
			  `dept`.`id_dept` AS `id_dept1`,
			  `dept`.`dept_name`,
			  `dept`.`id_location`,
			  `location`.`id_location` AS `id_location1`,
			  `location`.`location_name`
			FROM
			  `barang_masuk`
			  LEFT JOIN `detail_asset` ON `detail_asset`.`id_detail` =
				`barang_masuk`.`id_asset`
			  LEFT JOIN `assets` ON `assets`.`id_asset` = `detail_asset`.`id_asset`
			  LEFT JOIN `jenis_asset` ON `jenis_asset`.`id_jenis` = `assets`.`id_jenis`
			  LEFT JOIN `users` ON `users`.`id` = `barang_masuk`.`id_user`
			  LEFT JOIN `jabatan` ON `jabatan`.`id_jabatan` = `users`.`id_jabatan`
			  LEFT JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
			  LEFT JOIN `location` ON `location`.`id_location` = `dept`.`id_location`
			  WHERE `barang_masuk`.`tgl_in` BETWEEN '$tgl1' AND '$tgl2'
		")->result();
		
		$data['judul'] = "Laporan Barang Masuk <br/> Dari " .$tgl1. " Sampai " .$tgl2;
		
		$this->load->view('report/v_detlapbm',$data);
	}
	
	function  chart_pm(){
		
		if($this->input->post('show') == 'Tampilkan'){
					$bulan = $this->input->post('bulan');
					$tahun = $this->input->post('tahun');
					$data['jumlah'] = $this;
					
					$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
					$this->render_page('report/v_cpm',$data);
				}else{
					$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
					$this->render_page('report/v_cpm',$data);
				}
	}
	
	public function cek_jumlah($status,$periode,$tahun){
		$cek = $this->db->query("SELECT * FROM pengajuan WHERE status_pengajuan='$status' AND periode='$periode' AND tahun='$tahun'")->num_rows();
		return $cek;
	}
	
	
	
	
	
}