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
   ///edit 24 
    public function csv_terminate()
    {
        $this->load->view('header');
        $this->load->view('csv_list_staff_update/terminate');
        $this->load->view('footer');
    }

    public function csv_transfer_job()
    {
        $this->load->view('header');
        $this->load->view('csv_list_staff_update/transfer_in');
        $this->load->view('footer');
    }

    public function csv_units_diginitaries()
    {
        $this->load->view('header');
        $this->load->view('csv_list_staff_update/diginitarie');
        $this->load->view('footer');
    }

    public function csv_promoted_certificated()
    {
        $this->load->view('header');
        $this->load->view('csv_list_staff_update/promote_certificate');
        $this->load->view('footer');
    }


    public function csv_workframeworkout()
    {
        $this->load->view('header');
        $this->load->view('csv_list_staff_update/frameworkout');
        $this->load->view('footer');
    }
////// training out
    public function csv_training()
    {
        $this->load->view('header');
        $this->load->view('csv_list_staff_update/csv_training');
        $this->load->view('footer');
    }
/////training in cambodia
    public function csv_training_in()
    {
        $this->load->view('header');
        $this->load->view('csv_list_staff_update/training_in');
        $this->load->view('footer');
    }
//// training at royal school
    public function csv_training_royal_school()
    {
        $this->load->view('header');
        $this->load->view('csv_list_staff_update/royal_training');
        $this->load->view('footer');
    }


    public function csv_retires()
    {
        $this->load->view('header');
        $this->load->view('csv_list_staff_update/retires');
        $this->load->view('footer');
    }




//      public function get_terminate()
//     {
//         $by_year = $this->input->post('by_year');
//         $data['by_year'] = $by_year;
// //        $query = ("SELECT * FROM `tbl_csvupdate` WHERE `tbl_csvupdate`.`is_type` = 'Maternity leave' AND `on_date` LIKE '$by_year%'");
// //        $res = $this->db->query($query)->result();
//         $view = $this->load->view('csv_list_staff_update/view_maternity_leave',$data,true);
//         header('Content-Type: application/json; charset=utf-8');
//         echo json_encode($view);
//     }
    
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
    //edit start

//    public function csv_units_diginitaries()
//    {
//        $this->load->view('header');
//        $this->load->view('csv_list_staff_update/units_diginitaries');
//        $this->load->view('footer');
//    }

//     public function get_staff_units()
//     {
//         $by_year = $this->input->post('by_year');
//         $data['by_year'] = $by_year;
//         $view = $this->load->view('csv_list_staff_update/view_units_diginitaries',$data,true);
//         header('Content-Type: application/json; charset=utf-8');
//         echo json_encode($view);
//     }
//     public function get_reportUnits_byPdf()
//     {
//         $by_year = $this->input->get('by_year');
//         $data['by_year'] = $by_year;
//         $this->load->view('csv_list_staff_update/view_reportUnits_byPdf',$data);
//     }



    public function get_staff_terminate()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
    //        $query = ("SELECT * FROM `tbl_csvupdate` WHERE `tbl_csvupdate`.`is_type` = 'Maternity leave' AND `on_date` LIKE '$by_year%'");
    //        $res = $this->db->query($query)->result();
        $view = $this->load->view('csv_list_staff_update/view_terminate',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }



    public function get_terminate_report_byPdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv_list_staff_update/view_terminate_report_pdf',$data);
    }


    ///end function terminate

     public function get_staff_transfer()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
//        $query = ("SELECT * FROM `tbl_csvupdate` WHERE `tbl_csvupdate`.`is_type` = 'Maternity leave' AND `on_date` LIKE '$by_year%'");
//        $res = $this->db->query($query)->result();
        $view = $this->load->view('csv_list_staff_update/view_transfer_in',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }



    public function get_transfer_report_byPdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv_list_staff_update/view_transfer_report_pdf',$data);
    }

    ///end function transfer_in


    public function get_staff_certificate()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
    //        $query = ("SELECT * FROM `tbl_csvupdate` WHERE `tbl_csvupdate`.`is_type` = 'Maternity leave' AND `on_date` LIKE '$by_year%'");
    //        $res = $this->db->query($query)->result();
        $view = $this->load->view('csv_list_staff_update/view_certificate',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }



    public function get_certificate_report_byPdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv_list_staff_update/view_certificate_report_pdf',$data);
    }

    ////end function promote certificate


    public function get_staff_diginitarie()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
    //        $query = ("SELECT * FROM `tbl_csvupdate` WHERE `tbl_csvupdate`.`is_type` = 'Maternity leave' AND `on_date` LIKE '$by_year%'");
    //        $res = $this->db->query($query)->result();
        $view = $this->load->view('csv_list_staff_update/view_diginitarie',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }



    public function get_diginitarie_report_byPdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv_list_staff_update/view_diginitarie_report_pdf',$data);
    }

///////end function diginitarie

    public function get_staff_framework()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
    //        $query = ("SELECT * FROM `tbl_csvupdate` WHERE `tbl_csvupdate`.`is_type` = 'Maternity leave' AND `on_date` LIKE '$by_year%'");
    //        $res = $this->db->query($query)->result();
        $view = $this->load->view('csv_list_staff_update/view_frameworkout',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }



    public function get_framework_report_byPdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv_list_staff_update/view_frameworkout_report_pdf',$data);
    }
    ////end framworkout

    public function get_staff_training()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
    //        $query = ("SELECT * FROM `tbl_csvupdate` WHERE `tbl_csvupdate`.`is_type` = 'Maternity leave' AND `on_date` LIKE '$by_year%'");
    //        $res = $this->db->query($query)->result();
        $view = $this->load->view('csv_list_staff_update/view_training',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }



    public function get_training_report_byPdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv_list_staff_update/view_training_report_pdf',$data);
    }
////end training out

    public function get_staff_training_in()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
    //        $query = ("SELECT * FROM `tbl_csvupdate` WHERE `tbl_csvupdate`.`is_type` = 'Maternity leave' AND `on_date` LIKE '$by_year%'");
    //        $res = $this->db->query($query)->result();
        $view = $this->load->view('csv_list_staff_update/view_training_in',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }



    public function get_training_in_report_byPdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv_list_staff_update/view_training_in_report_pdf',$data);
    }

    ////end training in cambodia


    public function get_royal_training()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
    //        $query = ("SELECT * FROM `tbl_csvupdate` WHERE `tbl_csvupdate`.`is_type` = 'Maternity leave' AND `on_date` LIKE '$by_year%'");
    //        $res = $this->db->query($query)->result();
        $view = $this->load->view('csv_list_staff_update/view_royal_training',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }



    public function get_royal_training_report_byPdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv_list_staff_update/view_royal_training_report_pdf',$data);
    }


    //// end royal training


    public function get_retires()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
    //        $query = ("SELECT * FROM `tbl_csvupdate` WHERE `tbl_csvupdate`.`is_type` = 'Maternity leave' AND `on_date` LIKE '$by_year%'");
    //        $res = $this->db->query($query)->result();
        $view = $this->load->view('csv_list_staff_update/view_retires',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }



    public function get_retires_report_byPdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv_list_staff_update/view_retires_report_pdf',$data);
    }




}