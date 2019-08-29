<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Print_book extends Admin_Controller {

    public function index($id = 0) {
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('print_book/index', $data);
        $this->load->view('footer');
    }

    public function show_dis() {
        $pro_code = $this->input->post('pro_code');
        $str = '';
        $query_dis = query("SELECT * FROM district AS D WHERE D.pro_code='{$pro_code}' ORDER BY dis_khmer");
        if ($query_dis->num_rows() > 0) {
            foreach ($query_dis->result() as $row) {
                $str .="<option value='{$row->dis_code}'>" . $row->dis_khmer . "</option>";
            }
        }
        echo $str;
    }

    public function search_data() {
        $pro_code = $this->input->post('pro_code');
        $dis_code = $this->input->post('dis_code');
        $rd_print = $this->input->post('rd_print');

        $data['rd_print'] = $rd_print;
        $data['pro_code'] = $pro_code;
        $data['dis_code'] = $dis_code;
        $this->load->view('rri/print_book/print_book', $data);
    }

}
