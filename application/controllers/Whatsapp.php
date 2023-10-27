<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsapp extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
			// Pull messages (for push messages please go to settings of the number) 
			$my_apikey = "A1KQAGF07Y29SU9QC2DI"; 
			$number = "6281316185608"; 
			$type = "TYPE OF MESSAGE: IN or OUT"; 
			$markaspulled = "1 or 0"; 
			$getnotpulledonly = "1 or 0"; 
			$api_url  = "http://panel.apiwha.com/get_messages.php"; 
			$api_url .= "?apikey=". urlencode ($my_apikey); 
			$api_url .=	"&number=". urlencode ($number); 
			$api_url .= "&type=". urlencode ($type); 
			$api_url .= "&markaspulled=". urlencode ($markaspulled); 
			$api_url .= "&getnotpulledonly=". urlencode ($getnotpulledonly); 
			$my_json_result = file_get_contents($api_url, false); 
			$my_php_arr = json_decode($my_json_result); 
			foreach($my_php_arr as $item) 
			{ 
			  $from_temp = $item->from; 
			  $to_temp = $item->to; 
			  $text_temp = $item->text; 
			  $type_temp = $item->type; 
			  echo "<br>". $from_temp ." -> ". $to_temp ." (". $type_temp ."): ". $text_temp; 
			  // Do something 
			}	

			// Send Message 
			$my_apikey = "A1KQAGF07Y29SU9QC2DI"; 
			$destination = "6281316185608"; 
			$message = "Ngetest Doank"; 
			$api_url = "http://panel.apiwha.com/send_message.php"; 
			$api_url .= "?apikey=". urlencode ($my_apikey); 
			$api_url .= "&number=". urlencode ($destination); 
			$api_url .= "&text=". urlencode ($message); 
			$my_result_object = json_decode(file_get_contents($api_url, false)); 
			echo "<br>Result: ". $my_result_object->success; 
			echo "<br>Description: ". $my_result_object->description; 
			echo "<br>Code: ". $my_result_object->result_code; 
	}
}
