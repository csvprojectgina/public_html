<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');


class csv_new_framework_year extends Admin_Controller {

    public function index() {
        
        $this->load->view('header');
        $this->load->view('csv/csv_new_frame_year/index');
        $this->load->view('footer');


    }

    
    public function get_csv_new_framework()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
        $view = $this->load->view('csv/csv_new_frame_year/view_framework',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }
    
    public function new_framework_pdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv/csv_new_frame_year/framework_pdf',$data);
    }


}
