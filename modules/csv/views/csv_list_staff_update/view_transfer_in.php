<?php
$strsql = "SELECT  cs.id,
                    cs.civil_servant_id,
                    cs.firstname,
                    cs.lastname,
                    cs.gender,
                    w.current_role,
                    w.unit,
                    w.unit_name AS uname,
                    u.unit AS unit_name,


                    cr.current_role_in_khmer,
                    w.work_location,
                    w.current_role_id,
                    wh.department,
                    td.d_name,        
                    wh.position,
                    wh.stop_date


                                
                    FROM
                    civilservant AS cs
                    LEFT JOIN `work` AS w ON cs.id = w.id 
                    LEFT JOIN unit AS u ON u.id = w.unit
                    LEFT JOIN `workhistory` AS wh ON cs.id = wh.id
                    LEFT JOIN tbl_departments AS td ON td.d_id = wh.office

                    LEFT JOIN `currentrole` AS cr ON cr.id = w.current_role_id
                    WHERE w.is_transfer = 'transfered'"; 
// AND td.d_name != 'null'";
//             AND su.on_date LIKE '$by_year%'

$i = 1;
$month = array("01" => "មករា", "02" => "កុម្ភះ",
    "03" => "មិនា", "04" => "មេសា",
    "05" => "ឧសភា", "06" => "មិថុនា",
    "07" => "កក្កដា", "08" => "សីហា",
    "09" => "កញ្ញា", "10" => "តុលា",
    "11" => "វិច្ឆិកា", "12" => "ធ្នូ");
foreach ($month as $k => $value) {
    $getleader = $this->db->query(" {$strsql} AND wh.stop_date LIKE '{$by_year}-{$k}%'");
    if ($getleader->num_rows() > 0) { ?>
        <tr>
            <td colspan="8">សរុប ខែ<?php echo $value ?>ចំនួន<?php echo $getleader->num_rows(); ?></td>
        </tr>
        <?php
        foreach ($getleader->result() as $row) { ?>

            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row->lastname . ' ' . $row->firstname ?></td>
                <td><?= $row->gender ?></td>
                <td><?= $row->position; ?></td>
                
                <td><?= $row->department; ?></td>
                <!-- <td><?= $row->d_name; ?></td> -->
                <td><?= $row->current_role_in_khmer; ?></td>
               
                <td><?= $row->unit_name; ?></td>
               
               
                <td><?= date('d-M-Y', strtotime($row->stop_date)); ?></td>
                <!-- <td><?= date('d-M-Y', strtotime($row->end_date)); ?></td>
                <td><?= date('d-M-Y', strtotime($row->issue_date)); ?></td> -->
            </tr>

            <?php

        } ?>

        <?php
    }
} ?>
