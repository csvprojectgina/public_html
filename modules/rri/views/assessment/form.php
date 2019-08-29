<?php
$id = isset($id) ? $id : 0;
?>

<form class="form-horizontal" role="form" action="<?= site_url('rri/assessment/insert') ?>" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php
            if ($id == 0) {
                ?>
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('') ?></h3>        
            <?php } else {
                ?>                
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/edit_road_detail.gif') ?>" /> <?= t('Edit Assessment') . (isset($query_pro_id->khmer_name) ? t('​​ : ខេត្ត ') . $query_pro_id->khmer_name : '') ?></h3>
            <?php }
            ?>
            <input type="hidden" class="form-control" value="<?= set_value('road_id', $id) ?>"  id="road_id" name="road_id" /> 
            <input type="hidden" class="form-control" value="<?= set_value('id', isset($row_->id) ? $row_->id : '') ?>"  id="id" name="id" /> 
        </div>

        <div class="panel-body"> 

            <!------------------------------------>
            <table align="center" style="width: 100%;">
                <tr>
                    <td>
                        <div class = "form-group">
                            <label for = "pro_id" class = "col-sm-2 control-label"><?= t('Region:') ?></label>
                            <div class="col-sm-10">
                                <select data-toggle="tooltip" data-placement="left" title="" class="form-control"  id="region" placeholder="" name="region">
                                    <?php ?>
                                    <?php
                                    echo getoption("SELECT
                                                                r.RegionID,
                                                                r.RegionName
                                                        FROM
                                                                y_regions AS r ", "RegionID", "RegionName", set_value('region', isset($row_->region) ? $row_->region : ''), true);
                                    ?>
                                    <?php ?>
                                </select>                        
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "pro_id" class = "col-sm-2 control-label"><?= t('Province:') ?></label>
                            <div class="col-sm-10">
                                <select disabled="disabled" data-toggle="tooltip" data-placement="left" title="រាជធានី-ខេត្ត (ឧ.​ រាជធានីភ្នំពេញ...)" class="form-control"  id="pro_id" placeholder="" name="pro_id">
                                    <?php ?><?= getoption("SELECT * FROM province ORDER BY province_name", "id", "province_name", set_value('pro_id', isset($row->pro_id) ? $row->pro_id : ''), true) ?>
                                    <?php ?>
                                </select>                        
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "pro_id" class = "col-sm-2 control-label"><?= t('Road:') ?></label>
                            <div class="col-sm-10">
                                <input disabled="disabled" data-toggle="tooltip" data-placement="left" title="Road Name" type="text" class="form-control"  value="<?= set_value('road_name', isset($row->road_name) ? $row->road_name : '') ?>"  id="road_name" placeholder="Road Name" name="road_name">                      
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <hr style="width: 80%;display: none;" />
            <table align="center" style="width: 100%;display: none;">
                <tr>
                    <td>
                        <div class = "form-group">
                            <label for = "road_number" class = "col-sm-2 control-label"><?= t('លេខផ្លូវ') ?></label>
                            <div class="col-sm-10">
                                <input data-toggle="tooltip" data-placement="left" title="លេខផ្លូវ" type="text" class="form-control"  value="10"  id="road_number" placeholder="លេខផ្លូវ" name="road_number">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class = "form-group">
                            <label for = "road_number" class = "col-sm-2 control-label"><?= t('លេខផ្លូវ') ?></label>
                            <div class="col-sm-10">
                                <input data-toggle="tooltip" data-placement="left" title="លេខផ្លូវ" type="text" class="form-control"  value="10"  id="road_number" placeholder="លេខផ្លូវ" name="road_number">
                            </div>
                        </div>
                    </td>

                </tr>
            </table>
            <!-- tabs ---------------------------------------------->
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1" data-toggle="tooltip" data-placement="left" title="IQL4 Condition Data"><?= t('IQL4 Condition Data') ?></a></li>
                    <li><a href = "#tabs-2" data-toggle="tooltip" data-placement="left" title="IQL3 Condition Data"><?= t('IQL3 Condition Data') ?></a></li>
                    <li><a href = "#tabs-3" data-toggle="tooltip" data-placement="left" title="ESR Assessment"><?= t('ESR Assessment') ?></a></li>                   
                </ul>

                <!-- tab1 ------------------------>
                <div id = "tabs-1">
                    <div class = "form-group">
                        <label for = "mer_liability" class = "col-sm-2 control-label"><?= t('Emergency Maintenance Workload:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="mer_liability" class="form-control" id="mer_liability" name="mer_liability">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                                    h.ID,
                                                                    h.`Value`,
                                                                    h.f
                                                            FROM
                                                                    y_hmlu AS h ", "ID", "Value", set_value('mer_liability', isset($row_->mer_liability) ? $row_->mer_liability : ''), true);
                                ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "pro_id" class = "col-sm-2 control-label"><?= t('Unpaved Surface Condition:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="surface_condition_u" class="form-control" id="surface_condition_u" name="surface_condition_u">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                                sc.`Condition`,
                                                                sc.Classification,
                                                                sc.Roughness,
                                                                sc.HDMrough,
                                                                sc.SurfFactor
                                                        FROM
                                                                y_surface_condition_u AS sc ", "Condition", "Classification", set_value('surface_condition_u', isset($row_->surface_condition_u) ? $row_->surface_condition_u : ''), true);
                                ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "drain_cond" class = "col-sm-2 control-label"><?= t('Side Drainage Condition:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="drain_cond" class="form-control" id="drain_cond" name="drain_cond">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                                dc.`Condition`,
                                                                dc.Classification,
                                                                dc.`Function`,
                                                                dc.DrFactor
                                                        FROM
                                                                y_drainage_condition AS dc ", "Condition", "Classification", set_value('drain_cond', isset($row_->drain_cond) ? $row_->drain_cond : ''), true);
                                ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "mat_qual" class = "col-sm-2 control-label"><?= t('Materials Quality:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="mat_qual" class="form-control" id="mat_qual" name="mat_qual">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                                dc.`Condition`,
                                                                dc.Classification,
                                                                dc.`Function`,
                                                                dc.DrFactor
                                                        FROM
                                                                y_drainage_condition AS dc ", "Condition", "Classification", set_value('mat_qual', isset($row_->mat_qual) ? $row_->mat_qual : ''), true);
                                ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "fence_cond" class = "col-sm-2 control-label"><?= t('Fencing Condition:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="fence_cond" class="form-control" id="fence_cond" name="fence_cond">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            fc.`Condition`,
                                                            fc.Classification,
                                                            fc.`Function`,
                                                            fc.FfFactor
                                                    FROM
                                                            y_fence_condition AS fc ", "Condition", "Classification", set_value('fence_cond', isset($row_->fence_cond) ? $row_->fence_cond : ''), true);
                                ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_shape" class = "col-sm-2 control-label"><?= t('Road X-Section Shape:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="road_shape" class="form-control" id="road_shape" name="road_shape">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            rs.Quality,
                                                            rs.Classification,
                                                            rs.`Condition`,
                                                            rs.ShapeFactor
                                                    FROM
                                                            y_roadshape AS rs ", "Quality", "Classification", set_value('road_shape', isset($row_->road_shape) ? $row_->road_shape : ''), true);
                                ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "gen_cucond" class = "col-sm-2 control-label"><?= t('Cross Drainage Condition:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="gen_cucond" class="form-control" id="gen_cucond" name="gen_cucond">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            g.ID,
                                                            g.`Value`,
                                                            g.f
                                                    FROM
                                                            y_gfpu AS g ", "ID", "Value", set_value('gen_cucond', isset($row_->gen_cucond) ? $row_->gen_cucond : ''), true);
                                ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "traf_gp" class = "col-sm-2 control-label"><?= t('Traffic Group:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="traf_gp" class="form-control" id="traf_gp" name="traf_gp">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            tg.GROUP,
                                                            tg.Classification,
                                                            tg.Discription,
                                                            tg.RepresentativeADT,
                                                            tg.TrafFactor,
                                                            tg.TrafGravelLoss,
                                                            tg.Lowerbound,
                                                            tg.Upperbound
                                                    FROM
                                                            y_traffic_groups AS tg ", "GROUP", "Classification", set_value('traf_gp', isset($row_->traf_gp) ? $row_->traf_gp : ''), true);
                                ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "shoulder_cond" class = "col-sm-2 control-label"><?= t('Shoulder Condition:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="shoulder_cond" class="form-control" id="shoulder_cond" name="shoulder_cond">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            sc.`Condition`,
                                                            sc.Classification,
                                                            sc.Discription,
                                                            sc.ShFactor
                                                    FROM
                                                            y_shoulder_condition AS sc ", "Condition", "Classification", set_value('shoulder_cond', isset($row_->shoulder_cond) ? $row_->shoulder_cond : ''), true);
                                ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "gen_brcond" class = "col-sm-2 control-label"><?= t('General Bridge Condition:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="gen_brcond" class="form-control" id="gen_brcond" name="gen_brcond">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            g.ID,
                                                            g.`Value`,
                                                            g.f
                                                    FROM
                                                            y_gfpu AS g ", "ID", "Value", set_value('gen_brcond', isset($row_->gen_brcond) ? $row_->gen_brcond : ''), true);
                                ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "sf_cond" class = "col-sm-2 control-label"><?= t('Signs + Furniture Condition:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="sf_cond" class="form-control" id="sf_cond" name="sf_cond">
                                <?php ?><?= getoption("SELECT
                                                                g.ID,
                                                                g.`Value`,
                                                                g.f
                                                        FROM
                                                                y_gfpu AS g ", "ID", "Value", set_value('sf_cond', isset($row_->sf_cond) ? $row_->sf_cond : ''), true) ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "custom_parameter" class = "col-sm-2 control-label"><?= t('customcp1') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="custom_parameter" class="form-control" id="custom_parameter" name="custom_parameter">
                                <?php ?><?= getoption("SELECT
                                                                cp.Quality,
                                                                cp.Classification,
                                                                cp.Performance,
                                                                cp.QualFactor
                                                        FROM
                                                                y_custom_parameter AS cp ", "Quality", "Classification", set_value('custom_parameter', isset($row_->custom_parameter) ? $row_->custom_parameter : ''), true) ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>

                </div><!-- end tabs-1 ---------->

                <!-- tab2 ------------------------>
                <div id = "tabs-2">
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('AADT') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Fine Crack Area:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Minor Surface Defects:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Patched Area:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Loss of Pavement Layer:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Corrugation:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Structural Number:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Surface Condition Index:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Roughness - BI') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Wide Crack Area:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Ravelled Area:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Pothole Area:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Edge Break:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Average Shoulder Step:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Subgrade CBR') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Mean Depth:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Standard dev.') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Area:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Include as HDM section definition') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="10"  id="road_number" placeholder="" name="road_number">
                        </div>
                    </div>
                </div>

                <!-- tab3 ------------------------>
                <div id = "tabs-3">
                    <?= t('Environmental Risk Assessment') ?><br /><br />
                    <div class = "form-group">
                        <label for = "risk_of_land_slides" class = "col-sm-2 control-label"><?= t('Risk Of Land Slides:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control" id="risk_of_land_slides" name="risk_of_land_slides">
                                <?php ?><?= getoption("SELECT
                                                                    h.ID,
                                                                    h.`Value`,
                                                                    h.f
                                                            FROM
                                                                    y_hmlu AS h ", "ID", "Value", set_value('risk_of_land_slides', isset($row_->risk_of_land_slides) ? $row_->risk_of_land_slides : ''), true) ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "risk_of_flooding" class = "col-sm-2 control-label"><?= t('Risk Of Flooding:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control" id="risk_of_flooding" name="risk_of_flooding">
                                <?php ?><?= getoption("SELECT
                                                                h.ID,
                                                                h.`Value`,
                                                                h.f
                                                        FROM
                                                                y_hmlu AS h ", "ID", "Value", set_value('risk_of_flooding', isset($row_->risk_of_flooding) ? $row_->risk_of_flooding : ''), true) ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "risk_of_erosion" class = "col-sm-2 control-label"><?= t('Risk Of Erosion:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control" id="risk_of_erosion" name="risk_of_erosion">
                                <?php ?><?= getoption("SELECT
                                                                h.ID,
                                                                h.`Value`,
                                                                h.f
                                                        FROM
                                                                y_hmlu AS h ", "ID", "Value", set_value('risk_of_erosion', isset($row_->risk_of_erosion) ? $row_->risk_of_erosion : ''), true) ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div><hr />

                    <?= t('Social and Environmental Impact Assessment') ?><br /><br />
                    <div class = "form-group">
                        <label for = "adverse_social_impact" class = "col-sm-2 control-label"><?= t('Social Impact (Current Situation):') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control" id="adverse_social_impact" name="adverse_social_impact">
                                <?php ?><?= getoption("SELECT
                                                                ha.ID,
                                                                ha.`Value`,
                                                                ha.f
                                                        FROM
                                                                y_hapu AS ha ", "ID", "Value", set_value('adverse_social_impact', isset($row_->adverse_social_impact) ? $row_->adverse_social_impact : ''), true) ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "adverse_habitat_impact" class = "col-sm-2 control-label"><?= t('EIA') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control" id="adverse_habitat_impact" name="adverse_habitat_impact">
                                <?php ?><?= getoption("SELECT
                                                                ha.ID,
                                                                ha.`Value`,
                                                                ha.f
                                                        FROM
                                                                y_hapu AS ha ", "ID", "Value", set_value('adverse_habitat_impact', isset($row_->adverse_habitat_impact) ? $row_->adverse_habitat_impact : ''), true) ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div><hr />

                    <?= t('Road Safety Assessment (Accident Frequency)') ?><br /><br />
                    <div class = "form-group">
                        <label for = "accidents_vv" class = "col-sm-2 control-label"><?= t('Vehicle/Vehicle:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control" id="accidents_vv" name="accidents_vv">
                                <?php ?><?= getoption("SELECT
                                                                h.ID,
                                                                h.`Value`,
                                                                h.f
                                                        FROM
                                                                y_hmlu AS h ", "ID", "Value", set_value('accidents_vv', isset($row_->accidents_vv) ? $row_->accidents_vv : ''), true) ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "accidents_vp" class = "col-sm-2 control-label"><?= t('Vehicle/Pedestrian:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control" id="accidents_vp" name="accidents_vp">
                                <?php ?><?= getoption("SELECT
                                                                h.ID,
                                                                h.`Value`,
                                                                h.f
                                                        FROM
                                                                y_hmlu AS h ", "ID", "Value", set_value('accidents_vp', isset($row_->accidents_vp) ? $row_->accidents_vp : ''), true) ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "accidents_va" class = "col-sm-2 control-label"><?= t('Vehicle/Animal:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control" id="accidents_va" name="accidents_va">
                                <?php ?><?= getoption("SELECT
                                                                h.ID,
                                                                h.`Value`,
                                                                h.f
                                                        FROM
                                                                y_hmlu AS h ", "ID", "Value", set_value('accidents_va', isset($row_->accidents_va) ? $row_->accidents_va : ''), true) ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                </div>

            </div><!-- tabs ---------------->
        </div><!-- end body ----------------------------->

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg">
                <!--<button data-toggle="tooltip" data-placement="left" title="រក្សាទុក" name="submit" type="submit" class="btn btn-default glyphicon glyphicon-save" value="save"> <?= t('Save') ?></button>-->
                <button data-toggle="tooltip" data-placement="left" title="រក្សាទុក និងត្រលប់ក្រោយ" name="submit" type="submit" class="btn btn-default glyphicon glyphicon-circle-arrow-left" value="save_back">​ <?= t('Save') ?></button>
                <button data-toggle="tooltip" data-placement="left" title="ត្រលប់ក្រោយ" id="back" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left"> <?= t('Back') ?></button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function() {
        $("#tabs").tabs();

        $('#back').on('click', function() {
            window.location = "<?= site_url('rri/assessment/index') ?>";
        });

    }); // end ready fun. ====================
</script>