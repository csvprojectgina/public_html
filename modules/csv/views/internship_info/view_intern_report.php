
<?php
$strsql = "SELECT 
                    its.id,
                    its.intern_id,
                    its.last_name,
                    its.first_name,
                    its.gender,
                    its.date_of_birth,
                    its.work_as,
                    its.start_date,
                    its.school
                                
            FROM
                    internship AS its
            WHERE  1=1   ";


$i = 1;
$month = array("01" => "មករា", "02" => "កុម្ភះ",
    "03" => "មិនា", "04" => "មេសា",
    "05" => "ឧសភា", "06" => "មិថុនា",
    "07" => "កក្កដា", "08" => "សីហា",
    "09" => "កញ្ញា", "10" => "តុលា",
    "11" => "វិច្ឆិកា", "12" => "ធ្នូ");

foreach ($month as $k => $value) {
    $getleader = $this->db->query(" {$strsql} AND its.start_date LIKE '{$by_year}-{$k}%'");
    if ($getleader->num_rows() > 0) { ?>
        <tr>
            <td colspan="7">សរុប ខែ<?php echo $value ?>ចំនួន<?php echo $getleader->num_rows(); ?></td>
        </tr>
        <?php
        foreach ($getleader->result() as $row) { ?>

            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row->last_name . ' ' . $row->first_name ?></td>
                <td><?= $row->gender ;?></td>
                <td><?= $row->date_of_birth ;?></td>
                <td><?= $row->school; ?></td>
                <td><?= $row->work_as; ?></td>
                <td><?= date('d-M-Y', strtotime($row->start_date)); ?></td>
                
            </tr>

            <?php

        } ?>

        <?php
    }
} 

?>
