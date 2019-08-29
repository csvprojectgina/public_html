<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Framework_detail_report extends Admin_Controller {

    /*..*/

    public function index() {

      /*Select currentrole*/

      $this->db->select('*');

      $this->db->from('currentrole');

      $this->db->where('status', '1');

      $this->db->where('id !=',1 );

      $data['get_currentrole']=$this->db->get()->result();



      $this->load->view('header');

      $this->load->view('framework_detail_report/index',$data);

      $this->load->view('footer');

    }



}

