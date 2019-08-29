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
        $action = $CI->uri->segment(3, 0);

        // get modules =============================
        $qm = query("SELECT m.id FROM z_modules AS m WHERE m.module_name = '{$module}' ");
        if ($qm->num_rows() > 0) {
            $module_id = $qm->row()->id - 0;
        }

        // get controllers =========================
        $qc = query("SELECT c.id FROM z_controllers AS c WHERE c.module_id = '{$module_id}' AND c.controller_name = '{$controller}' ");
        if ($qc->num_rows() > 0) {
            $controller_id = $qc->row()->id - 0;
        }

        // get action_name =======================
        $qa = query("SELECT a.id FROM z_actions AS a WHERE a.controller_id = '{$controller_id}' AND a.action_name = '" . (($action != "") ? $action : "index") . "' ");
        if ($qa->num_rows() > 0) {
            $action_id = $qa->row()->id - 0;

            // permission =====================
            $role_id = $this->session->userdata('dmid');
            $q_ = query("SELECT
                                    z_a_r.id
                            FROM
                                    z_actions_in_roles AS z_a_r
                            WHERE
                                    z_a_r.role_id = '{$role_id}' AND z_a_r.action_id = '{$action_id}' ");
            if ($q_->num_rows() <= 0) {
                /* echo '<meta charset="UTF-8">';
                  echo "<div style='background: #DDD;font-family: khmer mef2;font-size: 30px;color: red;text-align: center;'>គ្មានសិទ្ធិ!<div>";
                 */
                redirect('rri/home/form', 'refresh');
                exit();
            }
        }
    }

}
