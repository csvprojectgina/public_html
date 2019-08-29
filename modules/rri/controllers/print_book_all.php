<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Print_book_all extends Admin_Controller {

    public function index() {
        $this->load->view('header');
        $this->load->view('print_book_all/index');
        $this->load->view('footer');
    }

}
