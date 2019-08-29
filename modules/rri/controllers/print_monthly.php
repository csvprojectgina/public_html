<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Print_monthly extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/print_monthly/index');
        $this->load->view('footer');
    }

    // end action =============================

    public function prt_monthly() {
        $this->load->view('rri/print_monthly/form');
    }

    // end action ==============================
}
