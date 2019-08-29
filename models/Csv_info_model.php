<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of csv_info
 *
 * @author manin
 */
class csv_info_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function form_insert($table,$data) {
        $this->db->insert($table, $data);
    }

}
