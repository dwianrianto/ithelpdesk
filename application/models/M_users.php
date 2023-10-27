<?php 
 
class M_users extends CI_Model{	



	function save($table,$data){		
		return $this->db->insert($table,$data);
	}
	
	function show($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}