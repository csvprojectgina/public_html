<?php
$id = isset($id) ? $id : 0;
?>

<form class="form-horizontal" role="form" action="<?= site_url('rri/plan/insert') ?>" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/edit_road_detail.gif') ?>" /> <?= t('Surface Types') . (isset($query_pro_id->khmer_name) ? t('​​ : ខេត្ត ') . $query_pro_id->khmer_name : '') ?></h3>
            <input type="hidden" class="form-control" value="<?= set_value('road_id', $id) ?>"  id="road_id" name="road_id" /> 
            <input type="hidden" class="form-control" value="<?= set_value('id', isset($row_->id) ? $row_->id : '') ?>"  id="id" name="id" /> 
        </div>

        <div class="panel-body"> 
            <!-- surface types --------------------------->
            <table cellpadding="0" cellspacing="0" border="1"​ id="tbl_data" style="text-align: center;vertical-align: middle;" class="table table-striped table-bordered table-hover" id="tbl_geography">
                <thead>
                    <tr>
                        <th><?= t('#') ?></th>
                        <th><?= t('TypeID') ?></th>
                        <th><?= t('Name') ?></th>
                        <th><?= t('GPM') ?></th>
                        <th><?= t('ADT1') ?></th>
                        <th><?= t('Yrs1') ?></th>
                        <th><?= t('ADT2') ?></th>
                        <th><?= t('Yrs2') ?></th>
                        <th><?= t('Life1') ?></th>
                        <th><?= t('Life2') ?></th>
                        <th><?= t('Unit Rate') ?></th>
                        <th><?= t('Use?') ?><input type="checkbox" class="checkbox chk_all" name="chk_all" id="chk_all" value="" /></th>
                        <th><?= t('Rank') ?></th>
                        <th><?= t('HDM') ?></th>
                        <th class="add_row" id="add_row"><a href="javascript:void(0)"><?= t('Add') ?></a></th>
                    </tr>
                </thead>
                <tbody style="vertical-align: middle;">
                    <?php
                    $qr_s = query("SELECT DISTINCTROW
                                                s.TypeID,
                                                s.LongName,
                                                s.Periodictreatment,
                                                s.ADT1,
                                                s.ADT2,
                                                s.LifeA1,
                                                s.LifeA2,
                                                s.LifeE1,
                                                s.LifeE2,
                                                s.m1,
                                                s.c1,
                                                s.m2,
                                                s.c2,
                                                s.Cflag,
                                                s.Uflag,
                                                s.UnitCost,
                                                s.DefaultCulvertSpacings,
                                                s.HDMType,
                                                s.RankingFactor,
                                                s.Notes,
                                                s.`Use`,
                                                s.SRT,
                                                s.SRR,
                                                s.RT,
                                                s.RR
                                        FROM
                                                y_surfacetypes AS s
                                        WHERE
                                                s.TypeID NOT LIKE 'NA'
                                        ORDER BY
                                                s.TypeID ");
                    $i = 1;
                    if ($qr_s->num_rows() > 0) {
                        foreach ($qr_s->result() as $row) {
                            echo "<tr>" .
                            "<td style='width: 3px;'>" . $i . "</td>" .
                            "<td style='width: 95px;'><input type='text' class='form-control TypeID' name='TypeID[]' id='TypeID' value='{$row->TypeID}' /></td>" .
                            "<td style='width: 165px;'><input type='text' class='form-control LongName' name='LongName[]' id='LongName' value='{$row->LongName}' /></td>" .
                            "<td style='width: 92px;'><input type='text' class='form-control Periodictreatment' name='Periodictreatment[]' id='Periodictreatment' value='{$row->Periodictreatment}' /></td>" .
                            "<td><input type='text' class='form-control ADT1' name='ADT1[]' id='ADT1' value='{$row->ADT1}' /></td>" .
                            "<td><input type='text' class='form-control LifeA1' name='LifeA1[]' id='LifeA1' value='{$row->LifeA1}' /></td>" .
                            "<td><input type='text' class='form-control ADT2' name='ADT2[]' id='ADT2' value='{$row->ADT2}' /></td>" .
                            "<td><input type='text' class='form-control LifeA2' name='LifeA2[]' id='LifeA2' value='{$row->LifeA2}' /></td>" .
                            "<td><input type='text' class='form-control LifeE1' name='LifeE1[]' id='LifeE1' value='{$row->LifeE1}' /></td>" .
                            "<td><input type='text' class='form-control LifeE2' name='LifeE2[]' id='LifeE2' value='{$row->LifeE2}' /></td>" .
                            "<td><input type='text' class='form-control UnitCost' name='UnitCost[]' id='UnitCost' value='{$row->UnitCost}' /></td>" .
                            "<td><input type='checkbox' class='TypeID' name='TypeID[]' id='TypeID' value='{$row->Use}' /></td>" .
                            "<td><input type='text' class='form-control RankingFactor' name='RankingFactor[]' id='RankingFactor' value='{$row->RankingFactor}' /></td>" .
                            "<td><input type='text' class='form-control HDMType' name='HDMType[]' id='HDMType' value='{$row->HDMType}' /></td>" .
                            "<td></td>" .
                            "</tr>";
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div><!-- end body ----------------------------->

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg">
                <button type="button" class="btn btn-default glyphicon glyphicon-save" id="btn" value="save"> <?= t('Save') ?></button>
            </div>
        </div>
    </div>
</form>

<style>
    th{text-align: center;vertical-align: middle;padding-bottom: 10px;}   
    .table-hover tbody tr:hover td {background: #EDEFF5;}
</style>

<script type="text/javascript">
    $(function() {
        $("#tabs").tabs();

        /* $('#add_row').on("click", function() {
         new_row();
         }); */

        $('#back').on('click', function() {
            window.location = "<?= site_url('rri/resources/index') ?>";
        });

    }); // end ready fun. =================

    // add_row ============================
    function new_row() {
        // var i = $(".g_no").length + 1;
        var new_row = "<tr>" +
                "<td style='width: 5px;'></td>" +
                "<td style='width: 95px;'><input type='text' class='form-control TypeID' name='TypeID[]' id='TypeID' value='{$row->TypeID}' /></td>" +
                "<td style='width: 165px;'><input type='text' class='form-control LongName' name='LongName[]' id='LongName' value='{$row->LongName}' /></td>" +
                "<td style='width: 100px;'><input type='text' class='form-control Periodictreatment' name='Periodictreatment[]' id='Periodictreatment' value='{$row->Periodictreatment}' /></td>" +
                "<td><input type='text' class='form-control ADT1' name='ADT1[]' id='ADT1' value='{$row->ADT1}' /></td>" +
                "<td><input type='text' class='form-control LifeA1' name='LifeA1[]' id='LifeA1' value='{$row->LifeA1}' /></td>" +
                "<td><input type='text' class='form-control ADT2' name='ADT2[]' id='ADT2' value='{$row->ADT2}' /></td>" +
                "<td><input type='text' class='form-control LifeA2' name='LifeA2[]' id='LifeA2' value='{$row->LifeA2}' /></td>" +
                "<td><input type='text' class='form-control LifeE1' name='LifeE1[]' id='LifeE1' value='{$row->LifeE1}' /></td>" +
                "<td><input type='text' class='form-control LifeE2' name='LifeE2[]' id='LifeE2' value='{$row->LifeE2}' /></td>" +
                "<td style='width: 10px;'><input type='text' class='form-control UnitCost' name='UnitCost[]' id='UnitCost' value='{$row->UnitCost}' /></td>" +
                "<td><input type='checkbox' class='' name='TypeID[]' id='TypeID' value='' /></td>" +
                "<td><input type='text' class='form-control RankingFactor' name='RankingFactor[]' id='RankingFactor' value='{$row->RankingFactor}' /></td>" +
                "<td><input type='text' class='form-control HDMType' name='HDMType[]' id='HDMType' value='{$row->HDMType}' /></td>" +
                "<td></td>" +
                "</tr>";
        $("#tbl_data tbody").append(new_row);
    }
</script>