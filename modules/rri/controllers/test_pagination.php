<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test_pagination extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('rri/test_pagination/index');
        $this->load->view('footer');
    }

    public function autocomplete_() {
        $q = $this->input->post('q');    
        $qr = query("SELECT
                                pr.khmer_name
                        FROM
                                province AS pr
                        WHERE
                                pr.khmer_name LIKE '%{$q}%'
                        ORDER BY
                                pr.khmer_name ");
        $re = $qr->result();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($re);
    }

}
