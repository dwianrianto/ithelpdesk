<?php 
 
class Barang_masuk extends MY_Controller{
 
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
		$data['judul'] = "Barang Masuk";
		
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
			  INNER JOIN `detail_asset` ON `detail_asset`.`id_detail` =
				`barang_masuk`.`id_asset`
			  INNER JOIN `assets` ON `assets`.`id_asset` = `detail_asset`.`id_asset`
			  INNER JOIN `jenis_asset` ON `jenis_asset`.`id_jenis` = `assets`.`id_jenis`
			  INNER JOIN `users` ON `users`.`id` = `barang_masuk`.`id_user`
			  INNER JOIN `jabatan` ON `jabatan`.`id_jabatan` = `users`.`id_jabatan`
			  INNER JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
			  INNER JOIN `location` ON `location`.`id_location` = `dept`.`id_location`
		")->result();
			
		$this->render_page('transaksi/v_barangmasuk',$data);
	}
	
	function add(){
		$id_user=$_SESSION['id_user'];
		$data['judul'] = "Barang Masuk";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		$data['ja'] = $this->db->query('SELECT * FROM jenis_asset GROUP BY jenis_name')->result();
		$data['an'] = $this->db->query('
							SELECT * FROM assets
				LEFT JOIN jenis_asset ON assets.id_jenis = jenis_asset.id_jenis ORDER BY asset_name
		')->result();
		$data['ma'] = $this->db->query('
							SELECT * FROM detail_asset
				LEFT JOIN assets ON detail_asset.id_asset = assets.id_asset ORDER BY model_name
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
						  WHERE `users`.`id`='$id_user'
		")->result();
		
		$this->render_page('transaksi/v_barangmasukadd',$data);
	}
	
	function save_modal(){
		$asset_m = $this->input->post('asset_m');
		$model_m = $this->input->post('model_m');
		
		
		$query = $this->db->query("
										INSERT INTO detail_asset 
												(model_name,id_asset)
											VALUES
												('$model_m','$asset_m')
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<strong>Success!</strong> User Berhasil Di Tambahkan...
												</div>
		');
		
		redirect('barang_masuk/add');
	}
	
	function save(){
		
		$model = $this->input->post('model');
		$create_date = date('Y-m-d');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$qty = $this->input->post('qty');
		$id_user = $this->input->post('id_user');
		$note = $this->input->post('note');
		
		$query = $this->db->query("
			INSERT INTO barang_masuk 
					(id_asset,qty_in,tgl_in,note_bm,id_user,create_date)
				VALUES
					('$model','$qty','$tgl_masuk','$note','$id_user','$create_date')
		");
		
		
		$query2 = $this->db->query("SELECT id_detail,stock_asset FROM detail_asset WHERE id_detail='$model'");
		$row = $query2->row();
		$no = $row->stock_asset + $qty;
		
		$query = $this->db->query("
				UPDATE detail_asset SET stock_asset='$no'
				WHERE id_detail='$model'
		");
		
				$max=$this->db->query("SELECT MAX(id_bm) AS id_bm FROM barang_masuk")->row();
				$id_bm=$max->id_bm;
		
				$query7 = $this->db->query("INSERT INTO transaksi
											(jenis_tr,id_asset,qty_tr,tgl_tr,bm)
												VALUES
											('1','$model','$qty','$tgl_masuk','$id_bm')
				");
				
		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<strong>Success!</strong> Pengajuan Service Berhasil Di Simpan...!!!
												</div>
		');
		
		redirect('barang_masuk');
	}
	
	function detail($id){
		
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		$data['judul'] = "Barang Masuk";
		$data['id'] = $id;
		$data['detail'] = $this->db->query("SELECT
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
				  `detail_asset`.`stock_asset`,
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
				  INNER JOIN `detail_asset` ON `detail_asset`.`id_detail` =
					`barang_masuk`.`id_asset`
				  INNER JOIN `assets` ON `assets`.`id_asset` = `detail_asset`.`id_asset`
				  INNER JOIN `jenis_asset` ON `jenis_asset`.`id_jenis` = `assets`.`id_jenis`
				  INNER JOIN `users` ON `users`.`id` = `barang_masuk`.`id_user`
				  INNER JOIN `jabatan` ON `jabatan`.`id_jabatan` = `users`.`id_jabatan`
				  INNER JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
				  INNER JOIN `location` ON `location`.`id_location` = `dept`.`id_location`
						WHERE `barang_masuk`.`id_bm` = '$id'
		")->result();
		
		$cekbm = $this->db->query("SELECT * FROM barang_masuk WHERE id_bm='$id'");
		$cek = $cekbm->row();
		$hasil = $cek->id_asset;
		
		$data['riwayat'] = $this->db->query("SELECT
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
				  INNER JOIN `detail_asset` ON `detail_asset`.`id_detail` =
					`barang_masuk`.`id_asset`
				  INNER JOIN `assets` ON `assets`.`id_asset` = `detail_asset`.`id_asset`
				  INNER JOIN `jenis_asset` ON `jenis_asset`.`id_jenis` = `assets`.`id_jenis`
				  INNER JOIN `users` ON `users`.`id` = `barang_masuk`.`id_user`
				  INNER JOIN `jabatan` ON `jabatan`.`id_jabatan` = `users`.`id_jabatan`
				  INNER JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
				  INNER JOIN `location` ON `location`.`id_location` = `dept`.`id_location`
					WHERE `barang_masuk`.`id_asset`= '$hasil'
		")->result();
		
		$this->render_page('transaksi/v_detailbarangmasuk',$data);
	}
	
	function edit($id){
		$data['user'] = $this->db->query("SELECT * FROM users WHERE id='$id'")->result();
			
		$this->render_page('transaksi/v_detailbarangmasuk',$data);
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
		$data['side'] = '<body class="hold-transition skin-blue-light sidebar-mini">';
		
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
			
		$this->render_page('transaksi/v_detailbarangmasuk',$data);
	}
}