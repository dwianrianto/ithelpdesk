<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	function render_page($content, $data = NULL){
		$data['jumlah_proses'] = $this->db->query("SELECT * FROM pengajuan
													WHERE status_pengajuan = 1
														OR status_pengajuan = 3
												")->num_rows();
		
        $data['header'] = $this->load->view('template/header', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/footer', $data, TRUE);
		
        $this->load->view('template/index', $data);
    }
	
	public function _example_output($output = null)
	{
		$this->load->view('example.php',(array)$output);
	}
	
	
	// base64
	function encrypt($str) {
		$kunci = '979a218e0632df2935317f98d47956c7';
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)+ord($kuncikarakter));
			$hasil = $karakter;
    }
		return urlencode(base64_encode($hasil));
	}
 
	function decrypt($str) {
		$str = base64_decode(urldecode($str));
		$hasil = '';
		$kunci = '979a218e0632df2935317f98d47956c7';
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)-ord($kuncikarakter));
			$hasil = $karakter;
		}
		return $hasil;
	}
	
	// md5
	public function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
	}

	public function decryptIt( $q ) {
		$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
		$qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
		return( $qDecoded );
	}
}