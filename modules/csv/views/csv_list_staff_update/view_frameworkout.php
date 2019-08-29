<?php
$strsql = "SELECT  cs.id,
                                    cs.civil_servant_id,
                                    cs.firstname,
                                    cs.lastname,
                                    cs.gender,
                                    DATE_FORMAT(cs.dateofbirth,'%d-%m-%Y') AS dateofbirth,
                                    cs.mobile_phone,
                                    cs.common_official_code,
                                    w.current_role,
                                    w.unit,
                                    u.unit AS unit_name,
                                    IF(o.office IS NULL ,'',o.office ) AS office,
                                    IF(pro_o.office IS NULL ,'',pro_o.office ) AS province_office,
                                    w.general_department,
                                    w.department,
                                    w.land_official,
                                    w.work_office,
                                    cr.current_role_in_khmer,
                                    w.work_location,
                                    w.date_in,
                                    w.date_out,
                                                w.current_role_id,
                                            
                                     IF( lofc.land_official IS NULL,'',lofc.land_official) AS landofficail,
                                     su.on_date
                                     
                                                
                FROM
                    civilservant AS cs
                LEFT JOIN `work` AS w ON cs.id = w.id
                LEFT JOIN offices AS o ON o.id = w.work_office
                LEFT JOIN province_office AS pro_o ON pro_o.id = w.province_office
                LEFT JOIN unit AS u ON u.id = w.unit
                LEFT JOIN `currentrole` AS cr ON cr.id = w.current_role_id
                LEFT JOIN land_officials AS lofc ON lofc.id = w.land_official
                LEFT JOIN tbl_csvupdate as su ON su.csv_id=cs.id WHERE su.is_type = 'frameworkout'";
//             AND su.on_date LIKE '$by_year%'

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
            <td colspan="8">សរុប ខែ<?php echo $value ?>ចំនួន<?php echo $getleader->num_rows(); ?></td>
        </tr>
        <?php
        foreach ($getleader->result() as $row) { ?>

            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row->lastname . ' ' . $row->firstname ?></td>
                <td><?= $row->gender ?></td>
                <td><?= $row->current_role_in_khmer; ?></td>
                <td><?= $row->unit_name; ?></td>
                <td><?= date('d-M-Y', strtotime($row->on_date)); ?></td>
                <!-- <td><?= date('d-M-Y', strtotime($row->end_date)); ?></td>
                <td><?= date('d-M-Y', strtotime($row->issue_date)); ?></td> -->
            </tr>

            <?php

        } ?>

        <?php
    }
} ?>
