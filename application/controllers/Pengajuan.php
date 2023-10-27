<?php 
 
class Pengajuan extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		if($_SESSION['level'] == 'admin'){
			redirect('home');
		}
	}
 
	function index(){
		$id_user=$_SESSION['id_user'];
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
			  LEFT JOIN `detail_asset` ON `detail_asset`.`id_detail` =
				`pengajuan`.`id_asset`
			  LEFT JOIN `assets` ON `assets`.`id_asset` = `detail_asset`.`id_asset`
			  LEFT JOIN `jenis_asset` ON `jenis_asset`.`id_jenis` = `assets`.`id_jenis`
			  LEFT JOIN `users` ON `users`.`id` = `pengajuan`.`id_user`
			  LEFT JOIN `jabatan` ON `jabatan`.`id_jabatan` = `users`.`id_jabatan`
			  LEFT JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
			  LEFT JOIN `location` ON `location`.`id_location` = `dept`.`id_location`
				WHERE `pengajuan`.`id_user`='$id_user'
					AND `pengajuan`.`status_pengajuan` < '5'
		")->result();
		$data['judul'] = "Pengajuan";
		
		$this->load->view('template/header',$data);
		$this->load->view('transaksi/v_pengajuan',$data);
		$this->load->view('template/footer');
	}
	
	function cansel($id){
		
		$query = $this->db->query("
					DELETE FROM pengajuan WHERE id_pengajuan='$id'
		");
		
		$query2 = $this->db->query("
					DELETE FROM pengajuan_detail WHERE id_pengajuan='$id'
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-danger alert-dismissible" 
		data-auto-dismiss="1000" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		  <strong>
			<span class="glyphicon glyphicon-ok"></span> Success!!!
		  </strong> Data Berhasil Di Hapus ...
		  </div>
		');
		
		redirect('pengajuan');
	}
	
	function add(){
		$id_user=$_SESSION['id_user'];
		$data['judul'] = "Pengajuan";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		$data['ja'] = $this->db->query('SELECT * FROM jenis_asset GROUP BY jenis_name')->result();
		$data['an'] = $this->db->query('
							SELECT * FROM assets
				INNER JOIN jenis_asset ON assets.id_jenis = jenis_asset.id_jenis ORDER BY asset_name
		')->result();
		$data['ma'] = $this->db->query('
							SELECT * FROM detail_asset
				INNER JOIN assets ON detail_asset.id_asset = assets.id_asset ORDER BY model_name
		')->result();
		$data['user'] = $this->db->query("SELECT
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
			  `users`
			  LEFT JOIN `jabatan` ON `jabatan`.`id_jabatan` = `users`.`id_jabatan`
			  LEFT JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
			  LEFT JOIN `location` ON `location`.`id_location` = `dept`.`id_location`
			  WHERE `users`.`id`='$id_user'")->result();
		
		$this->load->view('template/header',$data);
		$this->load->view('transaksi/v_pengajuanadd',$data);
		$this->load->view('template/footer');
	}
	
	function save(){
		
		$wp = $this->input->post('wp');
		$model = $this->input->post('model');
		$tgl_pengajuan = date('Y-m-d H:i:s');
		$tgl_butuh = $this->input->post('tgl_butuh');
		$periode = date('m');
		$tahun = date('Y');
		$id_user = $this->input->post('id_user');
		$note = $this->input->post('note');
		
		
		$query2 = $this->db->query("SELECT MAX(id_pengajuan) AS nomor FROM pengajuan");
		$row = $query2->row();
		$no = $row->nomor + 1;
		$nook = $no.'/'.$periode.'/'.$tahun;
		
		$query = $this->db->query("
			INSERT INTO pengajuan 
					(no_pengajuan,work_priority,id_asset,tgl_pengajuan,tgl_butuh,periode,tahun,id_user
						,note)
				VALUES
					('$nook','$wp','$model','$tgl_pengajuan','$tgl_butuh','$periode','$tahun','$id_user'
						,'$note')
		");
		
		$query3 = $this->db->query("SELECT MAX(id_pengajuan) AS nomor FROM pengajuan");
		$row3 = $query3->row();
		$no3 = $row3->nomor;
		
		$query2 = $this->db->query("
			INSERT INTO pengajuan_detail
					(id_pengajuan,id_status,note,tgl_detail,id_user)
				VALUES
					('$no3','0','$note','$tgl_pengajuan','$id_user')
		");
		
		
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<strong>Success!</strong> Pengajuan Service Berhasil Di Simpan...!!!
												</div>
		');
		
		redirect('pengajuan');
	}
	
	function detail($id){
		
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		$data['judul'] = "Pengajuan";
		$data['detail'] = $this->db->query("SELECT
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
			  `pengajuan`.`pemakaian`,
			  
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
			  `dept`.`id_location`,
			  
			  `location`.`id_location` AS `id_location1`,
			  `location`.`location_name`
			FROM
			  `pengajuan`
			  INNER JOIN `assets` ON `assets`.`id_asset` =
				`pengajuan`.`id_asset`
			  INNER JOIN `jenis_asset` ON `jenis_asset`.`id_jenis` = `assets`.`id_jenis`
			  INNER JOIN `users` ON `users`.`id` = `pengajuan`.`id_user`
			  INNER JOIN `jabatan` ON `jabatan`.`id_jabatan` = `users`.`id_jabatan`
			  INNER JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
			  LEFT JOIN `location` ON `location`.`id_location` = `dept`.`id_location`
					WHERE `pengajuan`.`id_pengajuan` = '$id'
		")->result();
		
		$data['riwayat'] = $this->db->query("SELECT
			  `pengajuan_detail`.`id_det`,
			  `pengajuan_detail`.`id_pengajuan`,
			  `pengajuan_detail`.`id_status`,
			  `pengajuan_detail`.`note`,
			  `pengajuan_detail`.`tgl_detail`,
			  `pengajuan_detail`.`id_user`,
			  `users`.`id`,
			  `users`.`nama_lengkap`
			FROM
			  `pengajuan_detail`
			  LEFT JOIN `users` ON `users`.`id` = `pengajuan_detail`.`id_user`
			  WHERE `pengajuan_detail`.`id_pengajuan`='$id'
		")->result();
		
		
		$data['riwayat_keluar'] = $this->db->query("
			SELECT
			  `transaksi`.`id_tr`,
			  `transaksi`.`jenis_tr`,
			  `transaksi`.`no_tr`,
			  `transaksi`.`id_asset`,
			  `transaksi`.`qty_tr`,
			  `transaksi`.`tgl_tr`,
			  `transaksi`.`status_tr`,
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
				WHERE `transaksi`.`kl`='$id'
		")->result();
		
		$this->load->view('template/header',$data);
		$this->load->view('transaksi/v_detailpengajuan',$data);
		$this->load->view('template/footer');
	}
	
	function edit($id){
		$data['user'] = $this->db->query("SELECT * FROM users WHERE id='$id'")->result();
			
		$this->load->view('template/header');
		$this->load->view('pages/v_euser',$data);
		$this->load->view('template/footer');
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
			
		$this->load->view('template/header',$data);
		$this->load->view('transaksi/v_riwayatpengajuan',$data);
		$this->load->view('template/footer');
	}
}