<?php 
 
class Pengajuan_masuk extends MY_Controller{
 
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
		WHERE `pengajuan`.`status_pengajuan` = '0'
		")->result();
		$data['judul'] = "Pengajuan";
			
		$this->render_page('transaksi/v_pengajuanmasuk',$data);
	}
	
	function proses(){
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
			  INNER JOIN `detail_asset` ON `detail_asset`.`id_detail` =
				`pengajuan`.`id_asset`
			  INNER JOIN `assets` ON `assets`.`id_asset` = `detail_asset`.`id_asset`
			  INNER JOIN `jenis_asset` ON `jenis_asset`.`id_jenis` = `assets`.`id_jenis`
			  INNER JOIN `users` ON `users`.`id` = `pengajuan`.`id_user`
			  INNER JOIN `jabatan` ON `jabatan`.`id_jabatan` = `users`.`id_jabatan`
			  INNER JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
			  LEFT JOIN `location` ON `location`.`id_location` = `dept`.`id_location`
		WHERE `pengajuan`.`status_pengajuan` = '1'
			OR `pengajuan`.`status_pengajuan` = '3'
		")->result();
		$data['judul'] = "Pengajuan";
		
			
		$this->render_page('transaksi/v_pengajuanproses',$data);
	}
	
	function detail($id){
		
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		$data['judul'] = "Pengajuan Masuk";
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
				  `pengajuan`.`tgl_proses`,
				  `pengajuan`.`tgl_selesai`,
				  
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
				  LEFT JOIN `assets` ON `assets`.`id_asset` =
					`pengajuan`.`id_asset`
				  LEFT JOIN `jenis_asset` ON `jenis_asset`.`id_jenis` = `assets`.`id_jenis`
				  LEFT JOIN `users` ON `users`.`id` = `pengajuan`.`id_user`
				  LEFT JOIN `jabatan` ON `jabatan`.`id_jabatan` = `users`.`id_jabatan`
				  LEFT JOIN `dept` ON `dept`.`id_dept` = `jabatan`.`id_dept`
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
			WHERE `pengajuan_detail`.`id_pengajuan`='$id'")->result();
		
		$data['pakai'] = $this->db->query("SELECT
			  `detail_asset`.`id_detail`,
			  `detail_asset`.`model_name`,
			  `detail_asset`.`basis`,
			  `detail_asset`.`version_name`,
			  `detail_asset`.`id_asset`,
			  `assets`.`id_asset` AS `id_asset1`,
			  `assets`.`asset_name`,
			  `assets`.`note_asset`,
			  `assets`.`id_jenis`,
			  `detail_asset`.`stock_asset`
			FROM
			  `assets`
			  LEFT JOIN `detail_asset` ON `assets`.`id_asset` = `detail_asset`.`id_asset`
			  WHERE `assets`.`id_jenis` = '1'
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
		
		$this->render_page('transaksi/v_detailpengajuanmasuk',$data);
	}
	
	function cek_stock(){
		
		$jumlah = $this->input->post('jumlah');
		$ap = $this->input->post('ap');
		
		$query = $this->db->query("SELECT * FROM detail_asset WHERE id_detail='$ap'")->row();
		$stock=$query->stock_asset;
		$hitung=$stock-$jumlah;
		if($hitung < 0){
			echo 1;
		}if($hitung > -1){
			echo 0;
		}
	}
	
	function save_modal(){
		
		$id_pengajuan = $this->input->post('id_pengajuan');
		$qty = $this->input->post('qty');
		$ap = $this->input->post('ap');
		$tanggal = date('Y-m-d');
		
		$query6 = $this->db->query("
			SELECT * FROM transaksi WHERE id_asset='$ap' AND kl='$id_pengajuan'
		")->num_rows();
		
		if($query6 > 0){
				
				$this->session->set_flashdata('sukses', '<div class="alert alert-danger alert-dismissible" 
				data-auto-dismiss="1000" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span></button>
				  <strong>
					<span class="glyphicon glyphicon-ok"></span> Peringatan!!!
				  </strong> Asset Ini Sudah Di Masukkan ...!!!
				  </div>
				');
				
				redirect('pengajuan_masuk/detail/'.$id_pengajuan);
		}if($query6 == 0){
				
		
				$query3 = $this->db->query("UPDATE pengajuan SET pemakaian='1' WHERE id_pengajuan='$id_pengajuan'");
				
				$query4 = $this->db->query("
					SELECT * FROM detail_asset WHERE id_detail='$ap'
				")->row();
				$stock=$query4->stock_asset;
				$hitung=$stock-$qty;
				
				$query5 = $this->db->query("
					UPDATE detail_asset SET stock_asset='$hitung' WHERE id_detail='$ap'
				");
				
				$query7 = $this->db->query("INSERT INTO transaksi
											(jenis_tr,id_asset,qty_tr,tgl_tr,kl)
												VALUES
											('2','$ap','$qty','$tanggal','$id_pengajuan')
				");
				
				$this->session->set_flashdata('sukses', '<div class="alert alert-success alert-dismissible" 
				data-auto-dismiss="1000" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span></button>
				  <strong>
					<span class="glyphicon glyphicon-ok"></span> Peringatan!!!
				  </strong> Asset Pemakaian Berhasl Di Tambahkan...!!!
				  </div>
				');
				redirect('pengajuan_masuk/detail/'.$id_pengajuan);
		}
	}
	
	function delete_pakai($id,$id_asset,$qty,$idp){
		$query = $this->db->query("
			DELETE FROM transaksi WHERE id_tr='$id'
		");
		$query2 = $this->db->query("
			SELECT * FROM detail_asset WHERE id_detail='$id_asset'
		")->row();
		$stock=$query2->stock_asset;
		$hitung=$stock+$qty;
		
		$query3 = $this->db->query("
			UPDATE detail_asset SET stock_asset='$hitung' WHERE id_detail='$id_asset'
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
		
		redirect('pengajuan_masuk/detail/'.$idp);
	}
	
	function acc(){
		
		$id_pengajuan = $this->input->post('id_pengajuan');
		$note = $this->input->post('note');
		$id_user = $_SESSION['id_user'];
		$tgl_proses = date('Y-m-d H:i:s');
		
		$query = $this->db->query("
				UPDATE pengajuan SET status_pengajuan='1',id_technisi='$id_user',tgl_proses='$tgl_proses'
				WHERE id_pengajuan='$id_pengajuan'
		");
		
		$query2 = $this->db->query("
			INSERT INTO pengajuan_detail
					(id_pengajuan,id_status,note,tgl_detail,id_user)
				VALUES
					('$id_pengajuan','1','$note','$tgl_proses','$id_user')
		");
		
		$this->session->set_flashdata('sukses', '<div class="alert alert-success">
								<strong>Success!</strong> Pengajuan Mulai Di Proses...!!!
												</div>
		');
		
		redirect('pengajuan_masuk');
	}
	
	function selesai(){
		// print_r($this->input->post('selesai'));die();
		
		if($this->input->post('pilihan') == 3){
			
			$id_pengajuan = $this->input->post('id_pengajuan');
			$note = $this->input->post('note');
			$id_user = $_SESSION['id_user'];
			$tgl_proses = date('Y-m-d H:i:s');
			
			$query = $this->db->query("
					UPDATE pengajuan SET status_pengajuan='3',id_technisi='$id_user',tgl_selesai='$tgl_proses'
					WHERE id_pengajuan='$id_pengajuan'
			");
			$query2 = $this->db->query("
				INSERT INTO pengajuan_detail
						(id_pengajuan,id_status,note,tgl_detail,id_user)
					VALUES
						('$id_pengajuan','3','$note','$tgl_proses','$id_user')
			");
			
			$this->session->set_flashdata('sukses', '<div class="alert alert-default">
									<strong>Success!</strong> Asset Sedang Dalam Perbaikan Vendor...!!!
													</div>
			');
			
			redirect('pengajuan_masuk/proses');
			
		}
		if($this->input->post('pilihan') == 2){
					
			$id_pengajuan = $this->input->post('id_pengajuan');
			$note = $this->input->post('note');
			$id_user = $_SESSION['id_user'];
			$tgl_proses = date('Y-m-d H:i:s');
			
			$query = $this->db->query("
					UPDATE pengajuan SET status_pengajuan='2',id_technisi='$id_user',tgl_selesai='$tgl_proses'
					WHERE id_pengajuan='$id_pengajuan'
			");
			$query2 = $this->db->query("
				INSERT INTO pengajuan_detail
						(id_pengajuan,id_status,note,tgl_detail,id_user)
					VALUES
						('$id_pengajuan','2','$note','$tgl_proses','$id_user')
			");
			
			$this->session->set_flashdata('sukses', '<div class="alert alert-success">
									<strong>Success!</strong> Proses Pengajuan Telah Di Selesaikan...!!!
													</div>
			');
			
			redirect('pengajuan_masuk/proses');
		}			
	}
	
	function laprp(){
		
		$id_user=$_SESSION['id_user'];
		$data['judul'] = "Pengajuan Selesai";
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
			WHERE `pengajuan`.`status_pengajuan` = '5' OR `pengajuan`.`status_pengajuan` = '2' ORDER BY id_pengajuan DESC
		")->result();
			
		$this->render_page('transaksi/v_laprp',$data);
	}
}