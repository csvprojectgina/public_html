<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Print_index extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('print_index/index');
        $this->load->view('footer');
    }

    public function form($id = '') {
        $data['id'] = $id;
        $data['failedlogin'] = t('អត់មានទិន្នន័យ​សម្រាប់បោះពុម្ព !');
        $this->load->view('header');
        $this->load->view('print_index/form', $data);
        $this->load->view('footer');
    }

    public function search_index() {
        $pro_id = $this->input->post('pro_id');
        $data['pro_id'] = $pro_id;
        $this->load->view('rri/print_index/form', $data);
    }

}
