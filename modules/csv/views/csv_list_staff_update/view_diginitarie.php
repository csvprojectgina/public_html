<?php
$strsql = "SELECT  cs.id,
                        cs.civil_servant_id,
                        cs.firstname,
                        cs.lastname,
                        cs.gender,
                        m.medal_type,
                        m.class,
                       


                        u.unit AS unit_name,


                        cr.current_role_in_khmer,
                        w.work_location,
                        w.current_role_id,
                        su.on_date       


                        
                                    
                        FROM
                        civilservant AS cs
                        LEFT JOIN `medal` AS m ON cs.id = m.id 
                        LEFT JOIN `work` AS w ON cs.id = w.id 
                        LEFT JOIN unit AS u ON u.id = w.unit
                        LEFT JOIN currentrole AS cr ON cr.id = w.current_role_id
                        LEFT JOIN tbl_csvupdate AS su ON su.csv_id = cs.id
                        WHERE su.is_type = 'Officers were awarded' OR m.medal_type !='null'";
//             AND su.on_date LIKE '$by_year%'

$i = 1;
$month = array("01" => "មករា", "02" => "កុម្ភះ",
    "03" => "មិនា", "04" => "មេសា",
    "05" => "ឧសភា", "06" => "មិថុនា",
    "07" => "កក្កដា", "08" => "សីហា",
    "09" => "កញ្ញា", "10" => "តុលា",
    "11" => "វិច្ឆិកា", "12" => "ធ្នូ");
// foreach ($month as $k => $value) {
    $getleader = $this->db->query(" {$strsql} ");
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
                <td><?= $row->medal_type ?></td>
                <td><?= $row->class; ?></td>
                
                <td><?= date('d-M-Y', strtotime($row->on_date)); ?></td>
                
            </tr>

            <?php

        } ?>

        <?php
    }
//} 
?>
