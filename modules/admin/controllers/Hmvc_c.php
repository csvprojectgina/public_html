<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hmvc_c extends Admin_Controller {

	public function index(){
		$this->load->view('hmvc_v');
	}
}
