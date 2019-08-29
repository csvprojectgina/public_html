<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Print_summarize extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/print_summarize/index');
        $this->load->view('footer');
    }

    public function prt_summarize() {
        $this->load->view('rri/print_summarize/form');
    }

}
