<?php

class fn_coresystem {

    public function get_retired($dob_employee,$age_retired) {
        $dob = date('Y-m-d', strtotime($dob_employee));
        $dob_ex = explode("-", $dob);
        $age_diff = date_diff(date_create($dob), date_create('today'))->y;
        $year_of_retire = (int)$age_retired - $age_diff;
        $end = date('Y', strtotime('+' . $year_of_retire . 'years'));
        $date_of_retire = $end . "-" . $dob_ex[1] . "-" . $dob_ex[2];

        if ($year_of_retire > 0) {
            return $date_of_retire;
        } else if ($year_of_retire < 0) {
            return "retired";
        }
    }

}
