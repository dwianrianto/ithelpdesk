<?php 
 
class Home extends MY_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		if($_SESSION['level'] == 'user'){
			redirect('profile');
		}
	}
 
	function index(){
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
		
		$data['waiting'] = $this->db->query("SELECT * FROM pengajuan WHERE status_pengajuan='0'")->num_rows();
		$data['proses'] = $this->db->query("SELECT * FROM pengajuan WHERE status_pengajuan='1'")->num_rows();
		$data['sukses'] = $this->db->query("SELECT * FROM pengajuan WHERE status_pengajuan='2'")->num_rows();
		$data['close'] = $this->db->query("SELECT * FROM pengajuan WHERE status_pengajuan='5'")->num_rows();
		
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
		")->result();
		
		$data['persediaan'] = $this->db->query("SELECT
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
		
		$data['pengajuan'] = $this->db->query("SELECT
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
		WHERE `pengajuan`.`status_pengajuan` < '2'
			  ORDER BY id_pengajuan DESC
		")->result();
		
		$data['jumlah'] = $this;
		$data['cek'] = $this->db->query("SELECT
			  `detail_asset`.`id_detail`,
			  `detail_asset`.`model_name`,
			  `detail_asset`.`stock_asset`,
			  `detail_asset`.`id_asset`,
			  `detail_asset`.`status`,
			  `assets`.`id_asset` AS `id_asset1`,
			  `assets`.`asset_name`,
			  `assets`.`id_jenis`
			FROM
			  `detail_asset`
			  LEFT JOIN `assets` ON `assets`.`id_asset` = `detail_asset`.`id_asset`
				WHERE `assets`.`id_jenis` = '1'
		")->result();
		
		$this->render_page('pages/v_home',$data);
	}
	
	public function cek_pengajuan(){
		$cek = $this->db->query("SELECT id_pengajuan,no_pengajuan,tahun FROM pengajuan")->result();
		
			$data = array();
			foreach ($cek as $row) {
				$data[] = $row;
			}
		echo json_encode($data);
	}
	
	public function cek_jumlah($periode,$tahun){
		$cek = $this->db->query("SELECT * FROM pengajuan WHERE periode='$periode' AND tahun='$tahun'")->num_rows();
		return $cek;
	}
	
	public function cek_stock(){
		$cek = $this->db->query("SELECT * FROM model_asset GROUP BY id_asset")->num_rows();
		return $cek;
	}
	
	function cek_notif(){
		$output = '';

		$count = $this->db->query("SELECT * FROM pengajuan WHERE status_pengajuan='0'")->num_rows();
		$data = array(
		   'notification' => $output,
		   'unseen_notification'  => $count
		);
		echo json_encode($data);
	}
	
}