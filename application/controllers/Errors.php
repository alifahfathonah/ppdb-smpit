<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	class Errors extends CI_Controller { 

		public function __construct() {

	 		parent::__construct();

		}

		public function index() {

			$data=array('title'=>'ERROR 404 - SMP IT IQRA BENGKULU');

			$this->load->view('errors/error404',$data);

		}

	}

?>