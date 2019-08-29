<?php
$strsql = "SELECT  cs.id,
                                    cs.civil_servant_id,
                                    cs.firstname,
                                    cs.lastname,
                                    cs.gender,
                                   
                                    w.current_role,
                                    w.unit,
                                    u.unit AS unit_name,
                                    
                                    w.general_department,
                                    w.department,
                                    tr.skill_train,
                tr.type_train,
                tr.country,
                                    w.work_office,
                                    cr.current_role_in_khmer,
                                   
                                                w.current_role_id,
                                            
                                  
                                     su.on_date,
                                     su.end_date
                                     
                                                
                FROM
                    civilservant AS cs
                LEFT JOIN `work` AS w ON cs.id = w.id
                LEFT JOIN offices AS o ON o.id = w.work_office
              
                LEFT JOIN unit AS u ON u.id = w.unit
                LEFT JOIN `currentrole` AS cr ON cr.id = w.current_role_id
               
                
                LEFT JOIN training AS tr ON tr.id = cs.id
                LEFT JOIN tbl_csvupdate as su ON su.csv_id=cs.id WHERE su.is_type = 'training'

                            AND tr.country != 'cambodia' AND tr.country !='khmer' AND tr.country != 'ខ្មែរ' 
                            AND tr.country !='កម្ពុជា' ";


               
//    ////         AND su.on_date LIKE '$by_year%'

$i = 1;
$month = array("01" => "មករា", "02" => "កុម្ភះ",
    "03" => "មិនា", "04" => "មេសា",
    "05" => "ឧសភា", "06" => "មិថុនា",
    "07" => "កក្កដា", "08" => "សីហា",
    "09" => "កញ្ញា", "10" => "តុលា",
    "11" => "វិច្ឆិកា", "12" => "ធ្នូ");
foreach ($month as $k => $value) {
    $getleader = $this->db->query(" {$strsql} AND su.on_date LIKE '{$by_year}-{$k}%'");
    if ($getleader->num_rows() > 0) { ?>
        <tr>
            <td colspan="10">សរុប ខែ<?php echo $value ?>ចំនួន<?php echo $getleader->num_rows(); ?></td>
        </tr>
        <?php
        foreach ($getleader->result() as $row) { ?>

            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row->lastname . ' ' . $row->firstname ?></td>
                <td><?= $row->gender ?></td>
                <td><?= $row->current_role_in_khmer; ?></td>
                <td><?= $row->unit_name; ?></td>
                <td><?= $row->type_train ?></td>
                <td><?= $row->skill_train; ?></td>
                <td><?= $row->country; ?></td>
                <td><?= date('d-M-Y', strtotime($row->on_date)); ?></td>
                <td><?= date('d-M-Y', strtotime($row->end_date)); ?></td>
                >
            </tr>

            <?php

        } ?>

        <?php
    }
} ?>
