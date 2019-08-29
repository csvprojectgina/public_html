<?php
/**
 * Created by PhpStorm.
 * User: lyhuoth
 * Date: 2018-09-07
 * Time: 9:43 AM
 */
class csv_list_staff_update extends Admin_Controller
{
    public function csv_maternity_leave()
    {
        $this->load->view('header');
        $this->load->view('csv_list_staff_update/maternity_leave');
        $this->load->view('footer');
    }

    public function get_staff_leave()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
//        $query = ("SELECT * FROM `tbl_csvupdate` WHERE `tbl_csvupdate`.`is_type` = 'Maternity leave' AND `on_date` LIKE '$by_year%'");
//        $res = $this->db->query($query)->result();
        $view = $this->load->view('csv_list_staff_update/view_maternity_leave',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }



    public function get_report_byPdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv_list_staff_update/view_report_pdf',$data);
    }

//    public function csv_units_diginitaries()
//    {
//        $this->load->view('header');
//        $this->load->view('csv_list_staff_update/units_diginitaries');
//        $this->load->view('footer');
//    }

    public function get_staff_units()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
        $view = $this->load->view('csv_list_staff_update/view_units_diginitaries',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }
    public function get_reportUnits_byPdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv_list_staff_update/view_reportUnits_byPdf',$data);
    }

/*  Rathana block     */

    public function csv_transfer_out()
    {
        $this->load->view('header');
        $this->load->view('csv_list_staff_update/civilservant_transfer_out');
        $this->load->view('footer');
    }

    public function get_csv_transfer_out()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
        $view = $this->load->view('csv_list_staff_update/view_csv_transfer_out',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }
    
    public function report_transfer_out_byPdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv_list_staff_update/view_report_transfer_out_pdf',$data);
    }

/* End Rathana block     */

}