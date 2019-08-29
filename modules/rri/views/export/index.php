<?php
$id = isset($id) ? $id : 0;
?>
<!!-- print one road ------------------------------------------------------>
<div style="margin: auto;display: none;" class="prt_one_road" id="prt_one_road">
    <?php
    $query = $this->db->query("SELECT * FROM road_info as r WHERE r.road_id={$id} ");
    $row = $query->row();
    if ($query->num_rows > 0) {
        ?>
        <html>
            <head>
                <title></title>
            </head>
            <body>
                <div style="text-align: center;">
                    <img src="<?= base_url('assets/bs/css/images/logo1.gif') ?>" />
                    <h5 style='font-family: khmer mef2;'>របាយការណ៍ព័ត៌មានខ្សែផ្លូវនីមួយៗ</h5>
                </div>
                <!--general info-->
                <table border="2" style='border-collapse: collapse;'>
                    <caption style="text-align: left;">ព័ត៌មានទូទៅ</caption>
                    <thead>
                    </thead>
                    <tbody>
                        <tr style="text-align: center;">
                            <td>លេខផ្លូវ</td>
                            <td  colspan="3"><?= $row->road_number ?>​</td>
                        </tr>
                        <tr style="text-align: center;">
                            <td>ឈ្មោះផ្លូវ</td>
                            <td  colspan="3"><?= $row->road_name ?></td>
                        </tr>

                        <tr style="text-align: center;">
                            <td>ប្រភេទ</td>
                            <td colspan="3"><?= $row->type ?></td>
                        </tr>

                        <tr style="text-align: center;">
                            <td rowspan="2">ទំហំ</td>
                            <td>ប្រវែង</td>
                            <td colspan="2"><?= $row->length ?> ម</td>
                        </tr>
                        <tr style="text-align: center;">
                            <td>ទទឹង</td>
                            <td colspan="2"><?= $row->width ?>​ ម</td>
                        </tr>

                        <tr style="text-align: center;">
                            <td rowspan="2">និយាមកា</td>
                            <td>ចាប់ផ្តើម</td>
                            <td><?= $row->first_point_x ?></td>
                            <td><?= $row->first_point_y ?></td>  
                        </tr>

                        <tr style="text-align: center;">
                            <td>បញ្ចប់</td>
                            <td><?= $row->last_point_x ?></td>
                            <td><?= $row->last_point_y ?></td>
                        </tr>
                    </tbody>
                </table><br/>

                <!--geography-->
                <table border="2" style='border-collapse: collapse;'>
                    <caption​ style="text-align: left;">ទីតាំងភូមិសាស្ត្រ</caption>
                    <thead>
                        <tr style="background-color:#999;">
                            <th>ល.រ</th>
                            <th>ស្រុក</th>
                            <th>ឃុំ</th>
                            <th>ភូមិ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1 = "SELECT * FROM geography as g WHERE g.road_id = '{$id}' ";
                        $query1 = query($sql1);
                        $i = 1;
                        if ($query1->num_rows() > 0) {
                            foreach ($query1->result() as $row) {
                                echo "<tr>" .
                                "<td style='text-align: center;'>" . $i . "</td>" .
                                "<td>" . $row->district . "</td>" .
                                "<td>" . $row->commune . "</td>" .
                                "<td>" . $row->village . "</td>" .
                                "</tr>";
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table><br/>

                <!--art_building-->
                <table border="2" style='border-collapse: collapse;'>
                    <caption​ style="text-align: left;">សំណង់សិល្បការ</caption>
                    <thead>
                        <tr style="background-color:#999;">
                            <th>ល.រ</th>
                            <th>ប្រភេទ</th>
                            <th>ប្រវែង ឬទំហំ</th>
                            <th>ស្ថានភាព</th>
                            <th colspan="2">និយាមកា</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT * FROM art_building as ar WHERE ar.road_id = '{$id}' ";
                        $query2 = query($sql2);
                        if ($query2->num_rows() > 0) {
                            foreach ($query2->result() as $row) {
                                echo "<tr>" .
                                "<td style='text-align: center;'>" . $i . "</td>" .
                                "<td>" . $row->type_building_art . "</td>" .
                                "<td>" . $row->dimension_building_art . "</td>" .
                                "<td>" . $row->quality_building_art . "</td>" .
                                "<td>" . $row->position_x_building_art . "</td>" .
                                "<td>" . $row->position_y_building_art . "</td>" .
                                "</tr>";
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table><br/>

                <!--art_building-->
                <table border="2" style='border-collapse: collapse;'>
                    <caption​ style="text-align: left;">សំណង់សាធារណៈ</caption>
                    <thead>
                        <tr style="background-color:#999;">
                            <th>ល.រ</th>
                            <th>ប្រភេទសំណង់</th>
                            <th>ឈ្មោះសំណង់</th>
                            <th colspan="2">និយាមកា</th>
                            <th>ទិស</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql3 = "SELECT * FROM public_building as p WHERE p.road_id = '{$id}' ";
                        $query3 = query($sql3);
                        if ($query3->num_rows() > 0) {
                            foreach ($query3->result() as $row) {
                                echo "<tr>" .
                                "<td style='text-align: center;'>" . $i . "</td>" .
                                "<td>" . $row->type_building . "</td>" .
                                "<td>" . $row->name_building . "</td>" .
                                "<td>" . $row->position_x . "</td>" .
                                "<td>" . $row->position_y . "</td>" .
                                "<td>" . $row->direction . "</td>" .
                                "</tr>";
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table><br/>

                <!--history-->
                <table border="2" style='border-collapse: collapse;'>
                    <caption​ style="text-align: left;">ប្រវត្តិផ្លូវ</caption>
                    <thead>
                        <tr style="background-color:#999;">
                            <th>ល.រ</th>
                            <th>សកម្មភាព</th>
                            <th>ឆ្នាំ</th>
                            <th>អនុវត្តដោយ</th>
                            <th>ប្រភពថវិកា</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql4 = "SELECT * FROM history as h WHERE h.road_id = '{$id}' ";
                        $query4 = query($sql4);
                        if ($query4->num_rows() > 0) {
                            foreach ($query4->result() as $row) {
                                echo "<tr>" .
                                "<td style='text-align: center;'>" . $i . "</td>" .
                                "<td>" . $row->activity . "</td>" .
                                "<td>" . $row->year_construct . "</td>" .
                                "<td>" . $row->apply_by . "</td>" .
                                "<td>" . $row->source_budget . "</td>" .
                                "</tr>";
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table><br/>

                <!--pavement-->
                <table border="2" style='border-collapse: collapse;'>
                    <caption​ style="text-align: left;">ប្រភេទកម្រាល</caption>
                    <thead>
                        <tr style="background-color:#999;">
                            <th>ល.រ</th>
                            <th>ប្រភេទ</th>
                            <th colspan="2">និយាមកាចាប់ផ្តើម</th>
                            <th colspan="2">និយាមកាបញ្ចប់</th>
                            <th>ប្រវែង</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql5 = "SELECT * FROM pavement as pv WHERE pv.road_id = '{$id}' ";
                        $query5 = query($sql5);
                        if ($query5->num_rows() > 0) {
                            foreach ($query5->result() as $row) {
                                echo "<tr>" .
                                "<td style='text-align: center;'>" . $i . "</td>" .
                                "<td>" . $row->type_pavement . "</td>" .
                                "<td>" . $row->first_point_x_pavement . "</td>" .
                                "<td>" . $row->last_point_x_pavement . "</td>" .
                                "<td>" . $row->last_point_x_pavement . "</td>" .
                                "<td>" . $row->last_point_y_pavement . "</td>" .
                                "<td>" . $row->length_pavement . " ម​ </td>" .
                                "</tr>";
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </body>
        </html>
    <?php }
    ?>
</div>
