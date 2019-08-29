<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');


class internship_info extends Admin_Controller 
{


    // public function __construct()
    // {
    //    parent::__construct();
    //     //        session_start();

    //     unset($_SESSION['path_file']);
    //     $_SESSION['path_file'] = 'reference-file';
    // }

    public function index() {
        
        $this->load->view('header');
        $this->load->view('csv/internship_info/index');
        $this->load->view('footer');

    }

    public function save_internship_info()
    {
        $lastname = $this->input->post('lastname');

        $first_name = $this->input->post('first_name');

        $intern_id = $this->input->post('intern_id');

        $english_full_name = $this->input->post('english_full_name');

        $gender = $this->input->post('gender');

        $date_of_birth = date('Y-m-d', strtotime($this->input->post('date_of_birth')));
        $start_date = date('Y-m-d', strtotime($this->input->post('start_date')));
            
        $place_of_birth = $this->input->post('place_of_birth');

        $address = $this->input->post('address');

        $phone = $this->input->post('phone_number');

        $email = $this->input->post('email');

        $major = $this->input->post('major');

        $school = $this->input->post('school');

        $work_as = $this->input->post('work_as');

        $photo = $this->input->post('photo');

        $intern_cv = serialize($this->input->post('intern_cv'));
                
        if($lastname !='' && $first_name != '' && $date_of_birth !='')
        {
            $data =[

                'intern_id' => $intern_id,
                'last_name' =>  $lastname,
                'first_name' => $first_name,
                'gender' => $gender,
                'date_of_birth' => $date_of_birth,
                'place_of_birth' => $place_of_birth,
                'address' => $address,
                'phone' =>  $phone,
                'email' => $email,
                'major' => $major,
                'school' =>  $school,
                'work_as' =>  $work_as,
                'photo' => $photo,
                'intern_cv' => $intern_cv,
                'english_full_name' => $english_full_name,
                'start_date' => $start_date
                    
            ];
              
            $this->db->insert('internship', $data);
    
            header('Content-Type: application/json; charset=utf-8');
    
            echo json_encode(['status' => 'success']);
            // echo json_encode(array('success'=>'true'));
        }else
        {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(['status' => 'error']);
        }

    }

/////// Report 

    public function intern_report() {
            
        $this->load->view('header');
        $this->load->view('csv/internship_info/intern_report');
        $this->load->view('footer');

    }


    public function get_intern_report()
    {
        $by_year = $this->input->post('by_year');
        $data['by_year'] = $by_year;
        $view = $this->load->view('csv/internship_info/view_intern_report',$data,true);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($view);
    }

    public function intern_report_pdf()
    {
        $by_year = $this->input->get('by_year');
        $data['by_year'] = $by_year;
        $this->load->view('csv/internship_info/intern_report_pdf',$data);
    }


}
