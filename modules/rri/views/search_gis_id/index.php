<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ <?= t('ស្វែងរកតាម GIS ID') ?></h3>
        </div>

        <div class="panel-body">        
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">
                <thead>
                    <tr>
                        <th style="text-align: center;"><?= t('GIS ID') ?></th>
                        <th style="text-align: center;"><?= t('លេខ​ផ្លូវ') ?></th>
                        <th style="text-align: center;"><?= t('ឈ្មោះ​ផ្លូវ') ?></th>
                        <th style="text-align: center;"><?= t('ប្រភេទ​ផ្លូវ') ?></th>
                        <th style="text-align: center;"><?= t('ប្រវែង​ផ្លូវ') ?></th>
                        <th style="text-align: center;"><?= t('ទទឹង​ផ្លូវ') ?></th>
                        <th width="120px" style="text-align: center;"><a href="<?= site_url('rri/roads/form') ?>"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូលថ្មី') ?></a></th>            
                    </tr>
                </thead>
                <tbody>
                <td colspan="5" class="dataTables_empty"><?= t('កំពុងទាញព័ត៌មានពី server !') ?></td>
                </tbody>
            </table>
        </div>
    </div>
</form>

<!-- print -------------------->
<div id="print" class="print" style="display: none;">
    <?php
    $id = isset($main_id) ? $main_id : '';
    $pro_id = isset($pro_id) ? $pro_id : '';

    // pro. =========================
    $qr_pr = query("SELECT
                        pr.khmer_name
                FROM
                        province AS pr
                WHERE
                        pr.id = '{$pro_id}' ");
    if ($qr_pr->num_rows() > 0) {
        foreach ($qr_pr->result() as $row_pro) {
            $my_pro = '';
            if (TRIM($row_pro->khmer_name) == 'ភ្នំពេញ') {
                $my_pro .= 'រាជធានី ' . $row_pro->khmer_name;
            } else {
                $my_pro .= 'ខេត្ត ' . $row_pro->khmer_name;
            }
        }
    }

    $query = $this->db->query("SELECT * FROM road_info as r WHERE r.road_id='{$id}' ");

    if ($query->num_rows > 0) {
        foreach ($query->result() as $row) {
            $id = $row->road_id;
            ?>
            <!------------------------------------------------------------>
            <table cellpadding="0" cellspacing="0" align="center" style="width: 100%;font-family: khmer mef1;text-align: center;">
                <tr>
                    <td style="width: 40%;">
                        <!-- general info ---------------------->
                        <table align="left" border="1" style="border-collapse: collapse;border: 2px solid blue;">
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
                                <td colspan="2"><?= $row->length ?></td>
                            </tr>
                            <tr style="text-align: center;">
                                <td>ទទឹង</td>
                                <td colspan="2"><?= $row->width ?>​</td>
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
                        </table>
                    </td>
                    <!--------------------------->
                    <td>
                        <div style="width: 200px;height: auto;border: 2px solid blue;font-family: khmer mef2;font-size: 16px;">តារាងផ្លូវជនបទ</div>
                    </td>
                    <!--------------------------->
                    <td align="center" style="width: 30%;">
                        <table style="text-align: center;">
                            <tr>
                                <td​><img style="" width="70" height="75" src="<?= base_url('assets/bs/css/images/logo_rpt.gif') ?>" /></td>
                            </tr>
                            <tr>
                                <td>ក្រសួងអភិវឌ្ឍន៍ជនបទ</td>
                            </tr>
                            <tr>
                                <!--<td>មន្ទីរអភិវឌ្ឍន៍ជនបទ<?= $my_pro ?></td>-->
                            </tr>
                        </table> 
                    </td>
                </tr>                        
            </table><br />

            <?php
            // geo ==================================
            $query_geo = query("SELECT * FROM geography AS G WHERE G.road_id='{$id}' ");
            if ($query_geo->num_rows() > 0) {
                $array_geo = array();
                foreach ($query_geo->result() as $row) {
                    $array_geo[$row->line_id] = $row;
                }
            }

            // art ==================================
            $query_art = query("SELECT * FROM art_building AS A WHERE A.road_id='{$id}' ");
            if ($query_art->num_rows() > 0) {
                $array_art = array();
                foreach ($query_art->result() as $row) {
                    $array_art[$row->line_id] = $row;
                }
            }

            // pub =================================
            $query_pub = query("SELECT * FROM public_building AS Pub WHERE Pub.road_id='{$id}' ");
            if ($query_pub->num_rows() > 0) {
                $array_pub = array();
                foreach ($query_pub->result() as $row) {
                    $array_pub[$row->line_id] = $row;
                }
            }

            // his ================================
            $query_his = query("SELECT * FROM history AS His WHERE His.road_id='{$id}' ");
            if ($query_his->num_rows() > 0) {
                $array_his = array();
                foreach ($query_his->result() as $row) {
                    $array_his[$row->line_id] = $row;
                }
            }

            // pave ================================
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
                    $tr .= "<tr>";
                    // Geography ==========================
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

                    // Art ================================
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

                    // Pub =======================================
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

                    // his =============================
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

                    //​ pave ============================
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
            ?>
            <table cellpadding="0" cellspacing="0" border="1" style="width: 100%;font-family: khmer mef1;border-collapse: collapse;border: 2px solid blue;text-align: left;">
                <thead style="text-align: center;border-bottom: 2px solid blue;">
                    <tr style="font-family: khmer mef2;">
                        <td colspan="3" style="border-right: 2px solid blue;">ទីតាំងភូមិសាស្រ្ត</td>
                        <td colspan="5" style="border-right: 2px solid blue;">សំណង់សិល្បការ</td>
                        <td colspan="5" style="border-right: 2px solid blue;">សំណង់សាធារណៈ</td>
                        <td colspan="4" style="border-right: 2px solid blue;">ប្រវត្តិផ្លូវ</td>
                        <td colspan="6">កម្រាល</td>
                    </tr>
                    <tr>
                        <!-- geo ------------------------->
                        <td>ស្រុក</td>
                        <td>ឃុំ</td>
                        <td style="border-right: 2px solid blue;">ភូមិ</td>

                        <!-- art --------------------->
                        <td>ប្រភេទ</td>
                        <td>ប្រវែង/ទំហំ</td>
                        <td>ស្ថានភាព</td>
                        <td colspan="2" style="border-right: 2px solid blue;">និយាមកា</td>

                        <!-- pub ------------------------>
                        <td>ប្រភេទសំណង់</td>
                        <td>ឈ្មោះសំណង់</td>
                        <td colspan="2">និយាមកា</td>
                        <td style="border-right: 2px solid blue;">ទិស</td>

                        <!-- his ---------------------------->
                        <td>សកម្មភាព</td>
                        <td>ឆ្នាំ</td>
                        <td>អនុវត្តដោយ</td>
                        <td style="border-right: 2px solid blue;">ប្រភពថវិកា</td>

                        <!-- pave -------------------------->
                        <td>ប្រភេទ</td>
                        <td colspan="2">និយាមកាចាប់ផ្តើម</td>
                        <td colspan="2">និយាមកាបញ្ចប់</td>
                        <td>ប្រវែង</td>
                    </tr>        
                </thead>
                <tbody>
                    <?= $tr ?>    
                </tbody>    
            </table>
            <?php
        }
    }
    ?>
</div>

<style>
    .table-hover tbody tr:hover td {background: #EDEFF5;}
</style>

<script type="text/javascript">

    /* Table initialisation */
    var oTable;
    $(document).ready(function () {

        /* Init the table */
        oTable = $('#example').dataTable({
            "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ កំណត់ត្រាក្នុងមួយទំព័រ"
            },
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "<?= site_url('rri/search_gis_id/grid_gis_id') ?>"
        });

        $("body").delegate(".editor_edit", "click", function (e) {
            var tr = $(this).parent().parent();
            var id = tr.attr('id') - 0;
            var eid = (id);
            window.location = '<?= site_url('rri/roads/edit') ?>/' + encodeURIComponent(eid);
        });

        /* $("body").delegate(".editor_remove", "click", function(e) {
         if (confirm('<?= t('តើអ្នកពិតជាលុបឬ?') ?>')) {
         var tr = $(this).parent().parent();
         var id = tr.attr('id') - 0;
         var eid = simple_encrypt(id);
         window.location = '<?= site_url('rri/roads/delete') ?>/' + encodeURIComponent(eid);
         }
         }); */

        /* $("body").delegate(".l_prt", "click", function (e) {
         var tr = $(this).parent().parent();
         var id = tr.attr('id') - 0;
         var eid = (id);
         window.location = '<?= site_url('rri/search_gis_id/print_one_r') ?>/' + encodeURIComponent(eid);           
         }); */

    });

    /* Get the rows which are currently selected */
    function fnGetSelected(oTableLocal)
    {
        return oTableLocal.$('tr.row_selected');
    }

</script>