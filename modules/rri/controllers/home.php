<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/home/index');
        $this->load->view('footer');
    }
    
    public function form() {
        $this->load->view('header');
        $this->load->view('rri/home/err_permission');
        $this->load->view('footer');
    }

}
