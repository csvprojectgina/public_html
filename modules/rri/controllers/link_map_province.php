<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Link_map_province extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/link_map_province/index');
        $this->load->view('footer');
    }

    // pro. map ==============================
    public function form($pro_id = '') {
        $data['pro_id'] = $pro_id;
        $this->load->view('header');
        $this->load->view('rri/link_map_province/pro_map', $data);        
        $this->load->view('footer');
    }

}
