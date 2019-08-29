<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Print_pavement extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/print_pavement/index');
        $this->load->view('footer');
    }

    // end action ==================================================

    public function rpt_pave() {
        $this->load->view('rri/print_pavement/form');
    }

    // end action ==================================================
}
