<?php
$pro_id = isset($pro_id) ? $pro_id : '';
?>
<meta charset="UTF-8">
<div style="margin: 0 auoto;">
    <?php
    $query = query("SELECT
                                rd.idtemp,
                                rd.first_point_x,
                                rd.first_point_y,
                                rd.last_point_x,
                                rd.last_point_y,
                                rd.length,
                                rd.width,
                                rd.type,
                                rd.file_name
                        FROM
                                road_info AS rd
                        WHERE
                                rd.pro_id = '{$pro_id}'

                        ORDER BY
                                rd.idtemp - 0 ASC ");
    if ($query->num_rows > 0) {
        ?>
        <table style="border-collapse: collapse;border: 5px solid blue;">
            <thead>
                <tr>
                    <th style='text-align: center;' rowspan="2">ល.រ</th>
                    <th style='text-align: center;' rowspan="2">លរ. ឯកសារ</th>
                    <th style='text-align: center;' colspan="2">និយាមកាចាប់ផ្តើម</th>
                    <th style='text-align: center;'​ colspan="2">និយាមកាបញ្ចប់</th>                        
                    <th style='text-align: center;' rowspan="2">ប្រវែងផ្លូវ (ម)</th>
                    <th style='text-align: center;' rowspan="2">ទទឹង (ម)</th>
                    <th style='text-align: center;' rowspan="2">ប្រភេទ</th>
                    <th style='text-align: center;' rowspan="2">ឈ្មោះឯកសារ</th>
                </tr>
                <tr>
                    <th style='text-align: center;'>x</th>
                    <th style='text-align: center;'>y</th>
                    <th style='text-align: center;'>x</th>
                    <th style='text-align: center;'>y</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($query->result() as $row) {
                    echo "<tr>" .
                    "<td>" . $i . "</td>" .
                    "<td>" . $row->idtemp . "</td>" .
                    "<td>" . $row->first_point_x . "</td>" .
                    "<td>" . $row->first_point_y . "</td>" .
                    "<td>" . $row->last_point_x . "</td>" .
                    "<td>" . $row->last_point_y . "</td>" .
                    "<td>" . $row->length . "</td>" .
                    "<td>" . $row->width . "</td>" .
                    "<td>" . $row->type . "</td>" .
                    "<td>" . $row->file_name . "</td>" .
                    "</tr>";
                    $i++;
                }
                ?>
            </tbody>
            <tfoot>
            </tfoot>
        <?php } else {
            ?>
            <div class="alert alert-danger" style="font-family: khmer-mef1;font-size: 16px;">
                អត់មានទិន្នន័យ !
            </div>
        <?php }
        ?>
</div>