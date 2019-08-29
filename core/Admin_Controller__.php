<?php

class Admin_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->my_permission_();
    }

    public function my_permission_() {
        $CI = get_instance();
        $module = $CI->uri->segment(1, 0);
        $controller = $CI->uri->segment(2, 0);

        // get modules ==========================================
        $qm = query("SELECT m.id FROM z_modules AS m WHERE m.module_name = '{$module}'");
        if ($qm->num_rows() > 0) {
            $module_id = $qm->row()->id - 0;
        }

        // get controllers ======================================
        $qc = query("SELECT c.id FROM z_controllers AS c WHERE c.module_id = '{$module_id}' AND c.controller_name = '{$controller}' ");
        if ($qc->num_rows() > 0) {
            $controller_id = $qc->row()->id - 0;
        }

        $_class_functions = get_class_methods(ucfirst($controller));
        if (count($_class_functions) > 0) {
            foreach ($_class_functions as $action) {
                if ($action != '__construct' && $action != 'get_instance' && $action != '__get') {

                    // get action_name ==================================
                    $qa = query("SELECT a.id FROM z_actions AS a WHERE a.controller_id = '{$controller_id}' AND a.action_name = '{$action}';");
                    if ($qa->num_rows() > 0) {
                        $action_id = $qa->row()->id - 0;

                        // permission ==============================
                        $role_id = $this->session->userdata('dmid');
                        $q_ = query("SELECT
                                                z_a_r.id
                                        FROM
                                                z_actions_in_roles AS z_a_r
                                        WHERE
                                                z_a_r.role_id = '{$role_id}' AND z_a_r.action_id = '{$action_id}' ");
                        if ($q_->num_rows() <= 0) {
                            echo 'no permission';
                            exit();
                        }
                    }
                }
            }
        }
    }

}
