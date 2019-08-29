<?php
$strsql = "SELECT  cs.id,
                            cs.civil_servant_id,
                            cs.firstname,
                            cs.lastname,
                            cs.gender,
                            cs.mobile_phone,
                            w.current_role,
                            w.unit,
                            u.unit AS unit_name,
                            wnd.reason_deleting,
                            w.general_department,
                            w.department,

                            w.work_office,
                            cr.current_role_in_khmer,

                                        w.current_role_id,
                                       
                                    

                            su.on_date
                            
                                        
                            FROM
                            civilservant AS cs
                            LEFT JOIN `work` AS w ON cs.id = w.id
                            LEFT JOIN offices AS o ON o.id = w.work_office

                            LEFT JOIN unit AS u ON u.id = w.unit
                            LEFT JOIN `currentrole` AS cr ON cr.id = w.current_role_id

                             LEFT JOIN worknamedeleting AS wnd ON wnd.id = cs.id
                            
                            LEFT JOIN tbl_csvupdate as su ON su.csv_id=cs.id 

                            WHERE su.is_type = 'និវត្ដន៍'
                            
                             OR wnd.reason_deleting = 'និវត្ដន៍' ";

               
//    ////         AND su.on_date LIKE '$by_year%'

$i = 1;
$month = array("01" => "មករា", "02" => "កុម្ភះ",
    "03" => "មិនា", "04" => "មេសា",
    "05" => "ឧសភា", "06" => "មិថុនា",
    "07" => "កក្កដា", "08" => "សីហា",
    "09" => "កញ្ញា", "10" => "តុលា",
    "11" => "វិច្ឆិកា", "12" => "ធ្នូ");
// foreach ($month as $k => $value) {
    $getleader = $this->db->query(" {$strsql}");
    if ($getleader->num_rows() > 0) { ?>
        <!-- <tr>
            <td colspan="8">សរុប ខែ<?php echo $value ?>ចំនួន<?php echo $getleader->num_rows(); ?></td>
        </tr> -->
        <?php
        foreach ($getleader->result() as $row) { ?>

            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row->lastname . ' ' . $row->firstname ?></td>
                <td><?= $row->gender ?></td>
                <td><?= $row->current_role_in_khmer; ?></td>
                <td><?= $row->unit_name; ?></td>
               
               
                <td><?= date('d-M-Y', strtotime($row->on_date)); ?></td>
                <td><?= $row->mobile_phone; ?></td>
              
                <!-- <td><?= date('d-M-Y', strtotime($row->end_date)); ?></td> -->
                >
            </tr>

            <?php

        } ?>

        <?php
    }
//}
 
?>
