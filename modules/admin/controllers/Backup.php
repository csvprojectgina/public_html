<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Backup extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('backup/index');
        $this->load->view('footer');
    }

}
