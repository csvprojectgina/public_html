<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');

class Boot {

    public function load() {
        $CI = get_instance();
        $module = $CI->uri->segment(1, 0);
        $controller = $CI->uri->segment(2, 0);

        // insert modules ==========================================
        $qm = query("SELECT m.id FROM z_modules AS m WHERE m.module_name = '{$module}'");
        if ($qm->num_rows() > 0) {
            $module_id = $qm->row()->id - 0;
        } else {
            $data = array(
                'module_name' => $module
            );
            $CI->db->insert('z_modules', $data);
            $module_id = $CI->db->insert_id();
        }

        // insert controllers ======================================
        $qc = query("SELECT c.id FROM z_controllers AS c WHERE c.module_id = '{$module_id}' AND c.controller_name = '{$controller}' ");
        if ($qc->num_rows() > 0) {
            $controller_id = $qc->row()->id - 0;
        } else {
            $data = array(
                'controller_name' => $controller,
                'module_id' => $module_id
            );
            $CI->db->insert('z_controllers', $data);
            $controller_id = $CI->db->insert_id();
        }

        $_class_functions = get_class_methods(ucfirst($controller));

        // if (count($_class_functions) > 0) {
        //     foreach ($_class_functions as $action) {
        //         if ($action != '__construct' && $action != 'get_instance' && $action != '__get') {
        //             $page = "{$module}/{$controller}/{$action}";

        //             // Insert action_name ==================================
        //             $qa = query("SELECT a.id FROM z_actions AS a WHERE a.controller_id = '{$controller_id}' AND a.action_name = '{$action}';");
        //             if ($qa->num_rows() > 0) {
        //                 $action_id = $qa->row()->id - 0;
        //             } else {
        //                 $data = array(
        //                     'controller_id' => $controller_id,
        //                     'action_name' => $action
        //                 );
        //                 $CI->db->insert('z_actions', $data);
        //                 $action_id = $CI->db->insert_id();
        //             }
        //         }
        //     }
        // }
        $this->load_boot();
    }

    public function load_boot() {
        $CI = get_instance();
        $module = $CI->uri->segment(1, 0);
        $controller = $CI->uri->segment(2, 0);
        $action = $CI->uri->segment(3, 0);
        $action = ($action != "") ? $action : "index";
        $page = "{$module}/{$controller}/{$action}";

        if (!$CI->session->userdata('user_name')) {
            if ($module === 'admin' && $controller === 'login') {
                
            } else {
                redirect('admin/login', 'refresh');
            }
        } else {
            $id = $CI->session->userdata('id') - 0;
            $user_name = $CI->session->userdata('user_name');
            if ($id <= 0) {
                redirect('admin/login', 'refresh');
            } else {
                
            }
        }
    }

}
