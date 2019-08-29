<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');


class csv_degree_report extends Admin_Controller {

    public function index() {
        
        $this->load->view('header');
        $this->load->view('csv/csv_degree_report/index');
        $this->load->view('footer');


    }

    
    public function get_csv_degree_report()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
        $view = $this->load->view('csv/csv_degree_report/view_degree_report',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }
    
    public function degree_report_pdf()
    {
        // $by_year = $this->input->get('by_year');
        // $data['by_year'] = $by_year;
        // $this->load->view('csv/csv_degree_report/degree_report_pdf',$data);

        $this->load->view('csv/csv_degree_report/degree_report_pdf');
    }


}
