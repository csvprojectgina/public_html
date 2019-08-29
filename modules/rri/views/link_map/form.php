<meta charset="UTF-8">
<?php
$query = $this->db->query("SELECT * FROM road_info AS r WHERE Left(r.road_id,2)={$id} OR Left(r.road_id,1)={$id} ");
$row = $query->row();
if ($query->num_rows > 0) {
    ?>
    <div style="width:793px;border:0px solid #cccccc;text-align: center;">
        <!--general info-->
        <html>
            <head>
                <title></title>
            </head>
            <body>
                <div​ style="text-align: center;">
                    <img src="<?= base_url('assets/bs/css/images/logo1.gif') ?>" />
                    <p style="font-family: khmer mef2">ក្រសួងអភិវឌ្ឍន៍ជនបទ</p>
                    <p style="font-family: khmer mef2">
                        <?php
                        $querys = $this->db->query("SELECT * FROM province AS p WHERE p.id ={$id} OR p.id={$id} ");
                        if ($id - 0 != 18) {
                            $rows = $querys->row();
                            echo 'របាយការណ៍ព័ត៌មានខ្សែផ្លូវតាមសន្ទទស្សន៍សម្រាប់ខេត្ត' . "&nbsp;" . $rows->khmer_name;
                        } else {
                            $rows = $querys->row();
                            echo 'របាយការណ៍ព័ត៌មានខ្សែផ្លូវតាមសន្ទទស្សន៍សម្រាប់រាជធានី' . "&nbsp;" . $rows->khmer_name;
                        }
                        ?>
                    </p>
                </div>
                <table border="2" style='border-collapse: collapse;'>
                    <thead>
                        <tr style='background-color:#999;'>
                            <!--<th style='text-align: center;'>ល.រ</th>-->
                            <th style='text-align: center;'>ល.រ Files</th>
                            <th style='text-align: center;'>Start_x</th>
                            <th style='text-align: center;'>Start_y</th>
                            <th style='text-align: center;'>Last_x</th>
                            <th style='text-align: center;'>Last_y</th>
                            <th style='text-align: center;'>ឈ្មោះឯកសារ</th>
                            <th style='text-align: center;'>ប្រវែងផ្លូវ</th>
                            <th style='text-align: center;'>ប្រភេទ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM road_info as r WHERE Left(r.road_id,2)={$id} OR Left(r.road_id,1)={$id} ";
                        $query = query($sql);
                        $i = 1;
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {
                                if ($i % 2 == 0) {
                                    echo "<tr style='background-color: #F2F2F2;'>" .
                                    //"<td style='text-align: center;'>" . $i . "</td>" .
                                    "<td style='text-align: center;'>" . $row->road_id . "</td>" .
                                    "<td style='text-align: center;'>" . $row->first_point_x . "</td>" .
                                    "<td style='text-align: center;'>" . $row->first_point_y . "</td>" .
                                    "<td style='text-align: center;'>" . $row->last_point_x . "</td>" .
                                    "<td style='text-align: center;'>" . $row->last_point_y . "</td>" .
                                    "<td>" . $row->file_name . "</td>" .
                                    "<td>" . $row->length . "</td>" .
                                    "<td style='text-align: center;'>" . $row->type . "</td>" .
                                    "</tr>";
                                } else {
                                    echo "<tr>" .
                                    //"<td style='text-align: center;'>" . $i . "</td>" .
                                    "<td style='text-align: center;'>" . $row->road_id . "</td>" .
                                    "<td style='text-align: center;'>" . $row->first_point_x . "</td>" .
                                    "<td style='text-align: center;'>" . $row->first_point_y . "</td>" .
                                    "<td style='text-align: center;'>" . $row->last_point_x . "</td>" .
                                    "<td style='text-align: center;'>" . $row->last_point_y . "</td>" .
                                    "<td>" . $row->file_name . "</td>" .
                                    "<td>" . $row->length . "</td>" .
                                    "<td style='text-align: center;'>" . $row->type . "</td>" .
                                    "</tr>";
                                }
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </body>
        </html>
    </div>
    <?php
} else {
    echo 'អត់មានទិន្នន័យ!';
}
?>