<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Csv_info_1 extends CI_Controller {
    function fetch_user() {
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
            $sub_array[] = '<a  style="text-align: left; font-size: 11 " href="' . site_url('csv/csv_info/edit/' . $row->id) . '" title="Edit" >លម្អិត</a>';

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
    public function fetch_user_delete($value='')
    {
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
            $sub_array[] = '<a  style="text-align: center;" href="' . site_url('csv/csv_info/edit/' . $row->id) . '" title="Edit" >លម្អិត</a> | <a href="javascript: void(0)" data-id="'.$row->id.'" class="delete">លុប</a>';

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
