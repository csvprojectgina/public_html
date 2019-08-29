<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Link_map extends Admin_Controller {

    public function index($id = 0) {
        /* $data['x'] = 11.549487143890776;
          $data['y'] = 104.8953857421875; */
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('rri/link_map/g_map', $data);       
        $this->load->view('footer');
    }
    
    public function g_map2() {
        $this->load->view('header');  
        $this->load->view('rri/link_map/g_map2'); 
        $this->load->view('footer');
    }
    
    public function g_map2_admin() {
        $this->load->view('header');  
        $this->load->view('rri/link_map/g_map2_admin'); 
        $this->load->view('footer');
    }
    
    public function show_track() {        
        $qr = query("SELECT * FROM trackpoint AS tr ");
        header('Content-Type: application/json; charset=utf-8');
        $data = $qr->row();
        echo json_encode($data);
    }

}
