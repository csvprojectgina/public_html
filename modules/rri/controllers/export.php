<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export extends Admin_Controller {

    public function index($id = 0) {
        echo '<meta charset="UTF-8">';
        // =======================================================
        $query = $this->db->query("SELECT * FROM road_info as r WHERE r.road_id={$id} ");
        $row = $query->row();

        // =====================================================
        $q_pro_khmer = query("SELECT
                                                rd.pro_id,
                                                pr.province_name,
                                                pr.khmer_name
                                        FROM
                                                road_info AS rd
                                        INNER JOIN province AS pr ON rd.pro_id = pr.id
                                        WHERE
                                                rd.road_id = '{$id}' ")->row();
        $str_pro_khmer = "";
        if ($q_pro_khmer->pro_id == '19') {
            $str_pro_khmer .= 'រាជធានី ' . $q_pro_khmer->khmer_name;
        } else {
            $str_pro_khmer .= 'ខេត្ត ' . $q_pro_khmer->khmer_name;
        }

        $str = "";
        if ($query->num_rows > 0) {
            // general info =================================================
            $str .= '<table style="font-size: 16px;">
                        <tr>';
            // ==============================================
            $str .= '<td>' .
                    '<table border="1" bordercolor="blue" style="font-family: khmer mef1;border-collapse: collapse;border: 2px solid blue;">' .
                    // number road ===============================================
                    '<tr style="vertical-align: middle;">' .
                    '<td>' . 'លេខផ្លូវ' . '</td>' .
                    '<td colspan="3">' . $row->road_number . '</td>' .
                    '</tr>' .
                    // name road ===============================================
                    '<tr style="vertical-align: middle;">' .
                    '<td>' . 'ឈ្មោះផ្លូវ' . '</td>' .
                    '<td colspan="3">' . $row->road_name . '</td>' .
                    '</tr>' .
                    // type road ===============================================
                    '<tr style="vertical-align: middle;">' .
                    '<td>' . 'ប្រភេទ' . '</td>' .
                    '<td colspan="3" style="text-align: center;">' . $row->type . '</td>' .
                    '</tr>' .
                    // length and width road ===============================================
                    '<tr style="vertical-align: middle;">' .
                    '<td rowspan="2">' . 'ទំហំ' . '</td>' .
                    '<td>' . 'ប្រវែង' . '</td>' .
                    '<td colspan="2" style="text-align: center;">' . $row->length . '</td>' .
                    '</tr>' .
                    '<tr style="vertical-align: middle;">' .
                    '<td>' . 'ទទឹង' . '</td>' .
                    '<td colspan="2" style="text-align: center;">' . $row->width . '</td>' .
                    '</tr>' .
                    // start and end pos. ==============================================
                    '<tr style="vertical-align: middle;">' .
                    '<td rowspan="2">' . 'និយាមកា' . '</td>' .
                    '<td>' . 'ចាប់ផ្តើម' . '</td>' .
                    '<td style="text-align: center;">' . $row->first_point_x . '</td>' .
                    '<td style="text-align: center;">' . $row->first_point_y . '</td>' .
                    '</tr>' .
                    '<tr style="vertical-align: middle;">' .
                    '<td>' . 'បញ្ចប់' . '</td>' .
                    '<td style="text-align: center;">' . $row->last_point_x . '</td>' .
                    '<td style="text-align: center;">' . $row->last_point_y . '</td>' .
                    '</tr>' .
                    '</table>' .
                    '</td>';
            // ======================================================
            $str .= '<td colspan="5"></td>';
            // ======================================================
            $str .= '<td>' .
                    '<table>' .
                    '<tr></tr><tr></tr><tr><td colspan="3" style="vertical-align: middle;text-align: center;border: 2px solid blue;font-family: khmer mef2;font-size:20px;">' .
                    'តារាងព័ត៌មានផ្លូវជនបទ' .
                    '</td></tr>' .
                    '</table>' .
                    '</td>';

            $str .= '<td colspan="3"></td>' .
                    '<td>' .
                    '<table>' .
                    // ================================================
                    '<tr><td colspan="2"></td>' .
                    '<td rowspan="4" colspan="2">' .
                    '<img src="' . base_url('assets/bs/css/images/rpt_one_xls.gif') . '" />' .
                    '</td><td colspan="2"></td>' .
                    '</tr><tr></tr><tr></tr><tr></tr>' .
                    // ================================================
                    '<tr>' .
                    '<td colspan="6" style="vertical-align: middle;text-align: center;font-family: khmer mef2;font-size:18px;">' .
                    'ក្រសួងអភិវឌ្ឍន៍ជនបទ' .
                    '</td>' .
                    '</tr>' .
                    // ================================================
                    '<tr>' .
                    '<td colspan="6" style="vertical-align: middle;text-align: center;font-family: khmer mef1;font-size:18px;">' .
                    'ក្រសួងអភិវឌ្ឍន៍ជនបទ' . $str_pro_khmer .
                    '</td>' .
                    '</tr>' .
                    '</table>' .
                    '</td>';
            // ===================================================
            $str .= '</tr></table>';

            // ===================================================
            $str .= '<br /><br />';

            /* geo ------------------- */
            $query_geo = query("SELECT * FROM geography AS G WHERE G.road_id='{$id}' ");
            if ($query_geo->num_rows() > 0) {
                $array_geo = array();
                foreach ($query_geo->result() as $row) {
                    $array_geo[$row->line_id] = $row;
                }
            }

            /* art ------------------- */
            $query_art = query("SELECT * FROM art_building AS A WHERE A.road_id='{$id}' ");
            if ($query_art->num_rows() > 0) {
                $array_art = array();
                foreach ($query_art->result() as $row) {
                    $array_art[$row->line_id] = $row;
                }
            }

            /* pub ------------------- */
            $query_pub = query("SELECT * FROM public_building AS Pub WHERE Pub.road_id='{$id}' ");
            if ($query_pub->num_rows() > 0) {
                $array_pub = array();
                foreach ($query_pub->result() as $row) {
                    $array_pub[$row->line_id] = $row;
                }
            }

            /* his ------------------- */
            $query_his = query("SELECT * FROM history AS His WHERE His.road_id='{$id}' ");
            if ($query_his->num_rows() > 0) {
                $array_his = array();
                foreach ($query_his->result() as $row) {
                    $array_his[$row->line_id] = $row;
                }
            }

            /* pave ------------------- */
            $query_pave = query("SELECT * FROM pavement AS Pave WHERE Pave.road_id='{$id}' ");
            if ($query_pave->num_rows() > 0) {
                $array_pave = array();
                foreach ($query_pave->result() as $row) {
                    $array_pave[$row->line_id] = $row;
                }
            }

            $all_data = query("SELECT
                                g.line_id
                                FROM
                                geography AS g
                                WHERE g.road_id='{$id}'
                                UNION 

                                SELECT
                                g.line_id
                                FROM
                                art_building AS g
                                WHERE g.road_id='{$id}'
                                UNION 

                                SELECT
                                g.line_id
                                FROM
                                public_building AS g
                                WHERE g.road_id='{$id}'
                                UNION 

                                SELECT
                                g.line_id
                                FROM
                                history AS g
                                WHERE g.road_id='{$id}'
                                UNION 
                                
                                SELECT
                                g.line_id
                                FROM
                                pavement AS g 
                                WHERE g.road_id='{$id}'");
            $tr = '';
            if ($all_data->num_rows() > 0) {
                foreach ($all_data->result() as $row) {
                    $tr .= "<tr style='vertical-align: middle;font-family: khmer mef1;'>";
                    //​ Geography ===============================
                    if (isset($array_geo[$row->line_id])) {
                        $r = $array_geo[$row->line_id];
                        $tr .= "<td>" . $r->district . "</td>" .
                                "<td>" . $r->commune . "</td>" .
                                "<td style='border-right: 2px solid blue;'>" . $r->village . "</td>";
                    } else {
                        $tr .= "<td></td>" .
                                "<td></td>" .
                                "<td style='border-right: 2px solid blue;'></td>";
                    }

                    // Art =====================================
                    if (isset($array_art[$row->line_id])) {
                        $r = $array_art[$row->line_id];
                        $tr .= "<td>" . $r->type_building_art . "</td>" .
                                "<td>" . $r->dimension_building_art . "</td>" .
                                "<td>" . $r->quality_building_art . "</td>" .
                                "<td>" . $r->position_x_building_art . "</td>" .
                                "<td style='border-right: 2px solid blue;'>" . $r->position_y_building_art . "</td>";
                    } else {
                        $tr .= "<td></td>" .
                                "<td></td>" .
                                "<td></td>" .
                                "<td></td>" .
                                "<td style='border-right: 2px solid blue;'></td>";
                    }

                    // Pub ====================================
                    if (isset($array_pub[$row->line_id])) {
                        $r = $array_pub[$row->line_id];
                        $tr .= "<td>" . $r->type_building . "</td>" .
                                "<td>" . $r->name_building . "</td>" .
                                "<td>" . $r->position_x . "</td>" .
                                "<td>" . $r->position_y . "</td>" .
                                "<td style='border-right: 2px solid blue;'>" . $r->direction . "</td>";
                    } else {
                        $tr .= "<td></td>" .
                                "<td></td>" .
                                "<td></td>" .
                                "<td></td>" .
                                "<td style='border-right: 2px solid blue;'></td>";
                    }

                    // his =======================================
                    if (isset($array_his[$row->line_id])) {
                        $r = $array_his[$row->line_id];
                        $tr .= "<td>" . $r->activity . "</td>" .
                                "<td>" . $r->year_construct . "</td>" .
                                "<td>" . $r->apply_by . "</td>" .
                                "<td style='border-right: 2px solid blue;'>" . $r->source_budget . "</td>";
                    } else {
                        $tr .= "<td></td>" .
                                "<td></td>" .
                                "<td></td>" .
                                "<td style='border-right: 2px solid blue;'></td>";
                    }

                    // pave ===================================
                    if (isset($array_pave[$row->line_id])) {
                        $r = $array_pave[$row->line_id];
                        $tr .= "<td>" . $r->type_pavement . "</td>" .
                                "<td>" . $r->first_point_x_pavement . "</td>" .
                                "<td>" . $r->last_point_x_pavement . "</td>" .
                                "<td>" . $r->last_point_x_pavement . "</td>" .
                                "<td>" . $r->last_point_y_pavement . "</td>" .
                                "<td>" . $r->length_pavement . "</td>";
                    } else {
                        $tr .= "<td></td>" .
                                "<td></td>" .
                                "<td></td>" .
                                "<td></td>" .
                                "<td></td>" .
                                "<td></td>";
                    }
                    $tr .= "</tr>";
                }
            }

            $str .= '<table border="1" bordercolor="blue" style="border-collapse: collapse;border: 2px solid blue;font-size: 16px">
                            <thead>
                                <tr style="vertical-align: middle;font-family: khmer mef2;text-align: center;">
                                    <td colspan="3" style="border-right: 2px solid blue;">ទីតាំងភូមិសាស្រ្ត</td>
                                    <td colspan="5" style="border-right: 2px solid blue;">សំណង់សិល្បការ</td>
                                    <td colspan="5" style="border-right: 2px solid blue;">សំណង់សាធារណៈ</td>
                                    <td colspan="4" style="border-right: 2px solid blue;">ប្រវត្តិផ្លូវ</td>
                                    <td colspan="6" style="border-right: 2px solid blue;">កម្រាល</td>
                                </tr>
                                <tr style="vertical-align: middle;font-family: khmer mef1;text-align: center;">
                                    <!-geo--------------------->
                                    <td style="border-bottom: 2px solid blue;">ស្រុក</td>
                                    <td style="border-bottom: 2px solid blue;">ឃុំ</td>
                                    <td style="border-right: 2px solid blue;border-bottom: 2px solid blue;">ភូមិ</td>

                                    <!-art--------------------->
                                    <td style="border-bottom: 2px solid blue;">ប្រភេទ</td>
                                    <td style="border-bottom: 2px solid blue;">ប្រវែង/ទំហំ</td>
                                    <td style="border-bottom: 2px solid blue;">ស្ថានភាព</td>
                                    <td colspan="2" style="border-right: 2px solid blue;border-bottom: 2px solid blue;">និយាមកា</td>

                                    <!-pub--------------------->
                                    <td style="border-bottom: 2px solid blue;">ប្រភេទ</td>
                                    <td style="border-bottom: 2px solid blue;">ឈ្មោះ</td>
                                    <td colspan="2" style="border-bottom: 2px solid blue;">និយាមកា</td>
                                    <td style="border-right: 2px solid blue;border-bottom: 2px solid blue;">ទិស</td>

                                    <!-his--------------------->
                                    <td style="border-bottom: 2px solid blue;">សកម្មភាព</td>
                                    <td style="border-bottom: 2px solid blue;">ឆ្នាំ</td>
                                    <td style="border-bottom: 2px solid blue;">អនុវត្តដោយ</td>
                                    <td style="border-right: 2px solid blue;border-bottom: 2px solid blue;">ប្រភពថវិកា</td>

                                    <!-pave--------------------->
                                    <td style="border-bottom: 2px solid blue;">ប្រភេទ</td>
                                    <td colspan="2" style="border-bottom: 2px solid blue;">និយាមកាចាប់ផ្តើម</td>
                                    <td colspan="2" style="border-bottom: 2px solid blue;">និយាមកាបញ្ចប់</td>
                                    <td style="border-bottom: 2px solid blue;">ប្រវែង</td>
                                </tr>        
                            </thead>' .
                    '<tbody>' .
                    $tr;
            $str .= '</tbody>' .
                    '</table>';
            header("Content-Disposition: attachment; filename=road.xls");
            echo $str;
        }// end if ==================================================
    }

// end action ==================================================
}
