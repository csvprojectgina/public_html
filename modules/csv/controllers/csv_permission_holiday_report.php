<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');


class csv_permission_holiday_report extends Admin_Controller {

    public function index() {
        
        $this->load->view('header');
        $this->load->view('csv/csv_permission_holiday_report/index');
        $this->load->view('footer');


    }
    public function get_csv_permission_holiday_report()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
        $view = $this->load->view('csv/csv_permission_holiday_report/permission_holiday_report',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }
    
    public function permission_holiday_pdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv/csv_permission_holiday_report/permission_holiday_pdf',$data);
    }


}
