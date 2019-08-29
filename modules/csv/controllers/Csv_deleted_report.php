<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');


class csv_deleted_report extends Admin_Controller {

    public function index() {
        
        $this->load->view('header');
        $this->load->view('csv/csv_deleted_report/index');
        $this->load->view('footer');

    }

    
    public function get_csv_deleted_report()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
        $view = $this->load->view('csv/csv_deleted_report/view_deleted_report',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }
    
    public function deleted_report_pdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv/csv_deleted_report/deleted_report_pdf',$data);
    }


}
