<?php 
 
class Persediaan_asset extends MY_Controller{
 
	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		if($_SESSION['level'] == 'user'){
			redirect('home');
		}
	}
 
	function index(){
		$id_user=$_SESSION['id_user'];
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		$data['judul'] = "Persediaan Asset";
		
		$data['user'] = $this->db->query("SELECT
			  `detail_asset`.`id_detail`,
			  `detail_asset`.`model_name`,
			  `detail_asset`.`basis`,
			  `detail_asset`.`version_name`,
			  `detail_asset`.`stock_asset`,
			  `detail_asset`.`stock_user`,
			  `detail_asset`.`id_asset`,
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
			  ORDER BY `jenis_asset`.`id_jenis` ASC
		")->result();
			
		$this->render_page('laporan/v_persediaan',$data);
	}
	
	function detail($id){
		
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		$data['judul'] = "Persediaan Asset";
		$data['id'] = $id;
		$data['detail'] = $this->db->query("SELECT
			  `detail_asset`.`id_detail`,
			  `detail_asset`.`model_name`,
			  `detail_asset`.`basis`,
			  `detail_asset`.`version_name`,
			  `detail_asset`.`stock_asset`,
			  `detail_asset`.`stock_user`,
			  `detail_asset`.`id_asset`,
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
					WHERE `detail_asset`.`id_detail` = '$id'
		")->result();
		
		$data['riwayat_all'] = $this->db->query("
			SELECT
			  `transaksi`.`id_tr`,
			  `transaksi`.`jenis_tr`,
			  `transaksi`.`no_tr`,
			  `transaksi`.`id_asset`,
			  `transaksi`.`qty_tr`,
			  `transaksi`.`tgl_tr`,
			  `transaksi`.`status_tr`,
			  `transaksi`.`bm`,
			  `transaksi`.`kl`,
			  `detail_asset`.`id_detail`,
			  `detail_asset`.`model_name`,
			  `detail_asset`.`id_asset` AS `id_asset1`,
			  `assets`.`id_asset` AS `id_asset2`,
			  `assets`.`asset_name`,
			  `assets`.`note_asset`
			FROM
			  `transaksi`
			  LEFT JOIN `detail_asset` ON `detail_asset`.`id_detail` =
				`transaksi`.`id_asset`
			  LEFT JOIN `assets` ON `assets`.`id_asset` = `detail_asset`.`id_asset`
				WHERE `transaksi`.`id_asset`='$id'
				ORDER BY `transaksi`.`tgl_tr`
		")->result();
		
		$data['riwayat'] = $this->db->query("SELECT * FROM barang_masuk WHERE id_asset='1'")->result();
		
		$data['riwayat_keluar'] = $this->db->query("SELECT * FROM detail_pemakaian WHERE id_asset='1'")->result();
		
		$this->render_page('laporan/v_detailpersediaan',$data);
	}
	
	function close(){
		
		$id_pengajuan = $this->input->post('id_pengajuan');
		$note = $this->input->post('note');
		$id_user = $_SESSION['id_user'];
		$tgl_proses = date('Y-m-d H:i:s');
		
		$query = $this->db->query("
				UPDATE pengajuan SET status_pengajuan='5'
				WHERE id_pengajuan='$id_pengajuan'
		");
		
		$query2 = $this->db->query("
			INSERT INTO pengajuan_detail
					(id_pengajuan,id_status,note,tgl_detail,id_user)
				VALUES
					('$id_pengajuan','5','$note','$tgl_proses','$id_user')
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<strong>Success!</strong> Pengajuan Berhasil Di Close...!!!
												</div>
		');
		
		redirect('pengajuan');
	}
	
	function riwayat(){
		
		$id_user=$_SESSION['id_user'];
		$data['judul'] = "Riwayat Pengajuan Anda";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		$data['user'] = $this->db->query("SELECT
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
		  INNER JOIN `detail_asset` ON `detail_asset`.`id_detail` =
			`pengajuan`.`id_asset`
		  INNER JOIN `assets` ON `assets`.`id_asset` = `detail_asset`.`id_asset`
		  INNER JOIN `jenis_asset` ON `jenis_asset`.`id_jenis` = `assets`.`id_jenis`
		  INNER JOIN `users` ON `users`.`id` = `pengajuan`.`id_user`
		  INNER JOIN `jabatan` ON `jabatan`.`id_jabatan` = `users`.`id_jabatan`
		  INNER JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
		  LEFT JOIN `location` ON `location`.`id_location` = `dept`.`id_location`
			WHERE `pengajuan`.`id_user`='$id_user'
				AND `pengajuan`.`status_pengajuan` = '5'
		")->result();
			
		$this->render_page('transaksi/v_riwayatpengajuan',$data);
	}
}