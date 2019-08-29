<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Print_one_road extends Admin_Controller {

    public function index() {
        $id = $this->input->post('road_id');
        $pro_id = $this->input->post('pro_id');
        $data['id'] = $id;
        $data['pro_id'] = $pro_id;
        $this->load->view('rri/print_one_road/index', $data);
    }

}
