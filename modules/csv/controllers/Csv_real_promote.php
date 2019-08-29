<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');


class csv_real_promote extends Admin_Controller {

    public function index() {
        
        $this->load->view('header');
        $this->load->view('csv/csv_real_promote/index');
        $this->load->view('footer');


    }

    
    public function get_csv_real_promote()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
        $view = $this->load->view('csv/csv_real_promote/view_report',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }
    
    public function report_pdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv/csv_real_promote/report_pdf',$data);
    }


}
