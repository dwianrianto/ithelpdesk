<?php 
 
class Profile extends MY_Controller{
 
	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	public function index(){
		$id_user=$_SESSION['id_user'];
		
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
		
		$data['judul'] = "Profile Anda";
		$data['side'] = '<body class="hold-transition skin-blue sidebar-mini">';
			
		$this->render_page('pages/v_profile',$data);
	}
	
	function cek_notif_user(){
		$id_user = $_SESSION['id_user'];
		$output = '';

		$count = $this->db->query("SELECT * FROM pengajuan WHERE status_pengajuan='2' AND id_user = '$id_user'")->num_rows();
		// print_r($count);die();
		
		
		$data = array(
		   'notification' => $output,
		   'unseen_notification'  => $count
		);
		echo json_encode($data);
		
		
	}
}