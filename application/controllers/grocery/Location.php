<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}
	
	
	
	public function index()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('users');
			$crud->columns('username','password','nama_lengkap','level','id_jabatan');
			$crud->display_as('username','username')
				 ->display_as('password','password')
				 ->display_as('nama_lengkap','Nama Lengkap')
				 ->display_as('level','level')
				 ->display_as('id_jabatan','Jabatan');
			$crud->set_subject('Customer');
			$crud->set_relation('id_jabatan','jabatan','jabatan_name');

			$output = $crud->render();

			$this->_example_output($output);
	}
	
	public function barang_masuk()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('barang_masuk');
			$crud->columns('id_asset','qty_in','tgl_in','note_bm','id_detail','id_user');
			$crud->display_as('id_asset','Asset')
				 ->display_as('qty_in','Jumlah Masuk')
				 ->display_as('tgl_in','Tanggal Masuk')
				 ->display_as('note_bm','Keterangan')
				 ->display_as('id_detail','Keterangan')
				 ->display_as('id_user','User');
			$crud->set_subject('Barang Masuk');
			$crud->set_relation('id_asset','detail_asset','model_name');
			$crud->set_relation('id_user','users','username');
			
			$crud->unset_clone();
			
			$output = $crud->render();

			$this->_example_output($output);
	}
}
