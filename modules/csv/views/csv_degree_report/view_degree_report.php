
<?php
$strsql = " SELECT 
                    d.end_date,
                    cs.id,
                    cs.civil_servant_id,
                    cs.firstname,
                    cs.lastname,
                    cs.gender,                         
                    u.unit AS unit_name,
                    cr.current_role_in_khmer,
                    d.degree_level,
                    d.skill
                                                        
                    FROM
                    civilservant AS cs
                    LEFT JOIN `work` AS w ON cs.id = w.id
                    LEFT JOIN unit AS u ON u.id = w.unit
                    LEFT JOIN `currentrole` AS cr ON cr.id = w.current_role_id
                    LEFT JOIN degree AS d ON d.id = cs.id
                    
                    WHERE d.`skill`!='null' and d.`skill`!= ' ' 

                    -- ORDER BY u.id asc
              ";

$i = 1;
// $month = array("01" => "មករា", "02" => "កុម្ភះ",
//     "03" => "មិនា", "04" => "មេសា",
//     "05" => "ឧសភា", "06" => "មិថុនា",
//     "07" => "កក្កដា", "08" => "សីហា",
//     "09" => "កញ្ញា", "10" => "តុលា",
//     "11" => "វិច្ឆិកា", "12" => "ធ្នូ");


    $getleader = $this->db->query(" {$strsql} AND d.end_date ");
    if ($getleader->num_rows() > 0) { ?>
        
        <?php
        foreach ($getleader->result() as $row) { ?>

            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row->lastname . ' ' . $row->firstname ?></td>
                <td><?= $row->gender ?></td>
                <td><?= $row->current_role_in_khmer; ?></td>
                <td><?= $row->unit_name; ?></td>
                <td><?= $row->skill; ?></td>
                <td><?= $row->degree_level; ?></td>
                <td><?= date('Y', strtotime($row->end_date)); ?></td>
                
            </tr>

            <?php

        } ?>

        <?php
    }

 ?>
