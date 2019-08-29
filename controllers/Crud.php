<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

    //functions  
//    function index() {
//        $this->load->view('header');
//        $this->load->view('crud_view');
//        $this->load->view('footer');
//    }

    function fetch_user() {
        $this->load->model("crud_model");
        $fetch_data = $this->crud_model->make_datatables();
        $data = array();
        foreach ($fetch_data as $row) {
            $sub_array = array();
//            $sub_array[] = '<img src="' . base_url() . 'upload/' . $row->image . '" class="img-thumbnail" width="50" height="35" />';
            $sub_array[] = $row->id;
            $sub_array[] = $row->civil_servant_id;
            $sub_array[] = $row->lastname . '  ' . $row->firstname;
            $sub_array[] = $row->gender;
            $sub_array[] = $row->current_role_in_khmer;
            $sub_array[] = $row->mobile_phone;
            $sub_array[] = $row->unit;
           // $sub_array[] = '<!-- Single button -->
             //                                       <div class="btn-group">
               //                                       <button type="button" class="btn btn-default dropdown-toggle​ btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 //                                       សកម្មភាព <span class="caret"></span>
                   //                                   </button>
                     //                                 <ul class="dropdown-menu">
                       //                                 <li><a href="#">កែប្រែ</a></li>
                         //                               <li><a href="#">កំណត់ចួលនិវត្តន៍</a></li>                                                        
                           //                           </ul>
                             //                       </div> ';

            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->crud_model->get_all_data(),
            "recordsFiltered" => $this->crud_model->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function fetch_user_delete($value = '') {
        $this->load->model("crud_model");
        $fetch_data = $this->crud_model->make_datatables();
        $data = array();
        foreach ($fetch_data as $row) {
            $sub_array = array();
//            $sub_array[] = '<img src="' . base_url() . 'upload/' . $row->image . '" class="img-thumbnail" width="50" height="35" />';
            $sub_array[] = $row->id;
            $sub_array[] = $row->lastname . '  ' . $row->firstname;
            $sub_array[] = $row->gender;
            $sub_array[] = $row->current_role_in_khmer;
            $sub_array[] = $row->mobile_phone;
            $sub_array[] = $row->unit;
            $sub_array[] = '<a  style="text-align: center;" href="' . site_url('csv/csv_info/edit/' . $row->id) . '" title="Edit" >លម្អិត</a> | <a href="javascript: void(0)" data-id="' . $row->id . '" class="delete">លុប</a>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->crud_model->get_all_data(),
            "recordsFiltered" => $this->crud_model->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }

}
