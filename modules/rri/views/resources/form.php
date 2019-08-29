<?php
$id = isset($id) ? $id : 0;
?>

<form class="form-horizontal" role="form" action="<?= site_url('rri/plan/insert') ?>" method="post">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php
            if ($id == 0) {
                ?>
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('') ?></h3>        
            <?php } else {
                ?>                
                <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/edit_road_detail.gif') ?>" /> <?= t('') . (isset($query_pro_id->khmer_name) ? t('​​ : ខេត្ត ') . $query_pro_id->khmer_name : '') ?></h3>
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
                                <select data-toggle="tooltip" data-placement="left" title="រាជធានី-ខេត្ត (ឧ.​ រាជធានីភ្នំពេញ...)" class="form-control"  id="pro_id" placeholder="" name="pro_id">
                                    <?php ?><?= getoption("SELECT * FROM province ORDER BY province_name", "id", "province_name", set_value('pro_id', isset($row->pro_id) ? $row->pro_id : ''), true) ?>
                                    <?php ?>
                                </select>                        
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "pro_id" class = "col-sm-2 control-label"><?= t('Road:') ?></label>
                            <div class="col-sm-10">
                                <input data-toggle="tooltip" data-placement="left" title="Road Name" type="text" class="form-control"  value="<?= set_value('road_name', isset($row->road_name) ? $row->road_name : '') ?>"  id="road_name" placeholder="Road Name" name="road_name">                      
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
                                <input data-toggle="tooltip" data-placement="left" title="លេខផ្លូវ" type="text" class="form-control"  value="<?= set_value('road_number', isset($row->road_number) ? $row->road_number : '') ?>"  id="road_number" placeholder="លេខផ្លូវ" name="road_number">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class = "form-group">
                            <label for = "road_number" class = "col-sm-2 control-label"><?= t('លេខផ្លូវ') ?></label>
                            <div class="col-sm-10">
                                <input data-toggle="tooltip" data-placement="left" title="លេខផ្លូវ" type="text" class="form-control"  value="<?= set_value('road_number', isset($row->road_number) ? $row->road_number : '') ?>"  id="road_number" placeholder="លេខផ្លូវ" name="road_number">
                            </div>
                        </div>
                    </td>

                </tr>
            </table>
            <!-- tabs ---------------------------------------------->
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1" data-toggle="tooltip" data-placement="left" title="Location"><?= t('Location') ?></a></li>
                    <li><a href = "#tabs-2" data-toggle="tooltip" data-placement="left" title="IQL4 Inventory Data"><?= t('IQL4 Inventory Data') ?></a></li>
                    <li><a href = "#tabs-3" data-toggle="tooltip" data-placement="left" title="IQL3 Inventory Data"><?= t('IQL3 Inventory Data') ?></a></li>
                    <li><a href = "#tabs-4" data-toggle="tooltip" data-placement="left" title="សំណង់សាធារណៈ"><?= t('Additional Data') ?></a></li>
                </ul>

                <!-- tab1 ------------------------>
                <div id = "tabs-1">
                    <div class = "form-group">
                        <label for = "pro_id" class = "col-sm-2 control-label"><?= t('Start:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="Start" type="text" class="form-control"  value="<?= set_value('start', isset($row_->start) ? $row_->start : '') ?>"  id="start" placeholder="start" name="start">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "end" class = "col-sm-2 control-label"><?= t('End:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="End" type="text" class="form-control"  value="<?= set_value('end', isset($row_->end) ? $row_->end : '') ?>"  id="end" placeholder="End" name="end">                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "pro_id" class = "col-sm-2 control-label"><?= t('From (km):') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="From" type="text" class="form-control"  value="<?= set_value('start_km', isset($row_->start_km) ? $row_->start_km : '') ?>"  id="from" placeholder="From" name="from">                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "to" class = "col-sm-2 control-label"><?= t('To (km):') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="To" type="text" class="form-control"  value="<?= set_value('end_km', isset($row_->end_km) ? $row_->end_km : '') ?>"  id="to" placeholder="To" name="to">
                        </div>
                    </div>
                    </td>
                    <!---------------------------->
                    <div class = "form-group">
                        <label for = "pro_id" class = "col-sm-2 control-label"><?= t('Road Class:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="Road_class" class="form-control"  id="road_class" placeholder="road_class" name="road_class">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                                rc.id,
                                                                rc.classification,
                                                                rc.description
                                                        FROM
                                                                y_road_class AS rc
                                                        ORDER BY rc.classification ", "id", "classification", set_value('road_class', isset($row_->road_class) ? $row_->road_class : ''), true);
                                ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "pro_id" class = "col-sm-2 control-label"><?= t('Surface Type:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="Surface Type" class="form-control"  id="surface_type" placeholder="Surface Type" name="surface_type">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                                st.TypeID,
                                                                st.LongName,
                                                                st.`Use?`
                                                        FROM
                                                                y_surfacetypes AS st
                                                        WHERE
                                                                st.`Use?` = '1' ", "TypeID", "LongName", set_value('surface_type', isset($row_->surface_type) ? $row_->surface_type : ''), true);
                                ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "pro_id" class = "col-sm-2 control-label"><?= t('District:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" disabled="disabled" data-placement="left" title="District" class="form-control"  id="district" placeholder="District" name="district">
                                <?php ?><?= getoption("SELECT
                                                                d.pro_code,
                                                                d.dis_code,
                                                                d.dis_khmer
                                                        FROM
                                                                district AS d
                                                        WHERE
                                                                d.pro_code = '{$row->pro_id}' AND d.dis_code = '{$row->dis_id}' ", "dis_code", "dis_khmer", set_value('dis_id', isset($row->dis_id) ? $row->dis_id : ''), true) ?>
                                <?php ?>
                            </select>                        
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "road_number" class = "col-sm-2 control-label"><?= t('Year Last Surface:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="Year Last Surface" type="text" class="form-control"  value="<?= set_value('year_last_surface', isset($row_->year_last_surface) ? $row_->year_last_surface : '') ?>"  id="year_last_surface" placeholder="Year Last Surface" name="year_last_surface">
                        </div>
                    </div>
                </div>

                <!-- tab2 ----------------------------->
                <div id = "tabs-2">
                    <div class = "form-group">
                        <label for = "to_b_area" class = "col-sm-2 control-label"><?= t('Bridge Deck Area:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('to_b_area', isset($row_->to_b_area) ? $row_->to_b_area : '') ?>"  id="to_b_area" placeholder="" name="to_b_area">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "to_t_clen" class = "col-sm-2 control-label"><?= t('Length of Culverting:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('to_t_clen', isset($row_->to_t_clen) ? $row_->to_t_clen : '') ?>"  id="to_t_clen" placeholder="" name="to_t_clen">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "rs_no" class = "col-sm-2 control-label"><?= t('Number of Road Signs:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('rs_no', isset($row_->rs_no) ? $row_->rs_no : '') ?>"  id="rs_no" placeholder="" name="rs_no">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "gr_len" class = "col-sm-2 control-label"><?= t('Length of Fencing:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('gr_len', isset($row_->gr_len) ? $row_->gr_len : '') ?>"  id="gr_len" placeholder="" name="gr_len">
                        </div>
                    </div>
                    <!--------------------------------->
                    <div class = "form-group">
                        <label for = "sec_w" class = "col-sm-2 control-label"><?= t('Average Width:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control"  id="sec_w" placeholder="" name="sec_w">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                        rw.Type,
                                                        rw.Classification,
                                                        rw.Discription,
                                                        rw.EffLanes,
                                                        rw.DWidth,
                                                        rw.WidthFactor,
                                                        rw.Lowerbound,
                                                        rw.Upperbound
                                                FROM
                                                        y_road_width AS rw ", "Type", "Classification", set_value('sec_w', isset($row_->sec_w) ? $row_->sec_w : ''), true);
                                ?>
                                <?php ?>
                            </select>
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "spl" class = "col-sm-2 control-label"><?= t('Strategic Priority:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control"  id="spl" placeholder="" name="spl">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            spi.`Index`,
                                                            spi.Classification,
                                                            spi.`Function`,
                                                            spi.SIFactor
                                                    FROM
                                                            y_socio_political_index AS spi ", "Index", "Classification", set_value('spl', isset($row_->spl) ? $row_->spl : ''), true);
                                ?>
                                <?php ?>
                            </select>
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "topo_zone" class = "col-sm-2 control-label"><?= t('Topography:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control"  id="topo_zone" placeholder="" name="topo_zone">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            tz.Zone,
                                                            tz.Classification,
                                                            tz.RiseAndFall,
                                                            tz.RAFrep,
                                                            tz.Altitude,
                                                            tz.Curvature,
                                                            tz.TopoFactor,
                                                            tz.TopoGravelLoss,
                                                            tz.RoadSignSpacingFactor
                                                    FROM
                                                            y_topographic_zones AS tz ", "Zone", "Classification", set_value('spl', isset($row_->spl) ? $row_->spl : ''), true);
                                ?>
                                <?php ?>
                            </select>
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "rain_zone" class = "col-sm-2 control-label"><?= t('Rainfall:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control"  id="rain_zone" placeholder="" name="rain_zone">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            rz.Zone,
                                                            rz.Classification,
                                                            rz.Discription,
                                                            rz.Representative,
                                                            rz.RainFactor,
                                                            rz.RZGravelLoss
                                                    FROM
                                                            y_rainfall_zones AS rz ", "Zone", "Classification", set_value('rain_zone', isset($row_->rain_zone) ? $row_->rain_zone : ''), true);
                                ?>
                                <?php ?>
                            </select>
                        </div>
                    </div>

                </div>

                <!-- tab3 ----------------------------->
                <div id = "tabs-3">
                    <div class = "form-group">
                        <label for = "number_of_lanes" class = "col-sm-2 control-label"><?= t('Number of Lanes:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('number_of_lanes', isset($row_->number_of_lanes) ? $row_->number_of_lanes : '') ?>"  id="number_of_lanes" placeholder="" name="number_of_lanes">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "shoulder_type_l" class = "col-sm-2 control-label"><?= t('Shoulder Type L:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control"  id="shoulder_type_l" placeholder="" name="shoulder_type_l">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                        s.ShoulderID,
                                                        s.ShoulderType
                                                FROM
                                                        y_shouldertypes AS s ", "ShoulderID", "ShoulderType", set_value('shoulder_type_l', isset($row_->shoulder_type_l) ? $row_->shoulder_type_l : ''), true);
                                ?>
                                <?php ?>
                            </select>
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "shoulder_length_l" class = "col-sm-2 control-label"><?= t('Shoulder Length L:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('shoulder_length_l', isset($row_->shoulder_length_l) ? $row_->shoulder_length_l : '') ?>"  id="shoulder_length_l" placeholder="" name="shoulder_length_l">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "shoulder_width_l" class = "col-sm-2 control-label"><?= t('Shoulder Width L:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('shoulder_width_l', isset($row_->shoulder_width_l) ? $row_->shoulder_width_l : '') ?>"  id="shoulder_width_l" placeholder="" name="shoulder_width_l">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "side_drain_type_l" class = "col-sm-2 control-label"><?= t('Side Drain Type L:') ?></label>
                        <div class="col-sm-10">                            
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control"  id="side_drain_type_l" placeholder="" name="side_drain_type_l">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            d.DrainTypeID,
                                                            d.DrainType
                                                    FROM
                                                            y_draintypes AS d ", "DrainTypeID", "DrainType", set_value('side_drain_type_l', isset($row_->side_drain_type_l) ? $row_->side_drain_type_l : ''), true);
                                ?>
                                <?php ?>
                            </select>
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "side_drain_length_l" class = "col-sm-2 control-label"><?= t('Side Drain Length L:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('side_drain_length_l', isset($row_->side_drain_length_l) ? $row_->side_drain_length_l : '') ?>"  id="side_drain_length_l" placeholder="" name="side_drain_length_l">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "reserve_width_l" class = "col-sm-2 control-label"><?= t('Reserve Width L:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('reserve_width_l', isset($row_->reserve_width_l) ? $row_->reserve_width_l : '') ?>"  id="reserve_width_l" placeholder="" name="reserve_width_l">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "guard_rail_type_l" class = "col-sm-2 control-label"><?= t('Side Fence Type L:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control"  id="guard_rail_type_l" placeholder="" name="guard_rail_type_l">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            r.RailTypeID,
                                                            r.RailType
                                                    FROM
                                                            y_railtypes AS r ", "RailTypeID", "RailType", set_value('guard_rail_type_l', isset($row_->guard_rail_type_l) ? $row_->guard_rail_type_l : ''), true);
                                ?>
                                <?php ?>
                            </select>
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "guard_rail_extent_l" class = "col-sm-2 control-label"><?= t('Side Fence Extent L:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('guard_rail_extent_l', isset($row_->guard_rail_extent_l) ? $row_->guard_rail_extent_l : '') ?>"  id="guard_rail_extent_l" placeholder="" name="guard_rail_extent_l">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "lane_width" class = "col-sm-2 control-label"><?= t('Avg. Lane Width:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('lane_width', isset($row_->lane_width) ? $row_->lane_width : '') ?>"  id="lane_width" placeholder="" name="lane_width">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "shoulder_type_r" class = "col-sm-2 control-label"><?= t('Shoulder Type R:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control"  id="shoulder_type_r" placeholder="" name="shoulder_type_r">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            s.ShoulderID,
                                                            s.ShoulderType
                                                    FROM
                                                            y_shouldertypes AS s ", "ShoulderID", "ShoulderType", set_value('shoulder_type_r', isset($row_->shoulder_type_r) ? $row_->shoulder_type_r : ''), true);
                                ?>
                                <?php ?>
                            </select>
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "shoulder_length_l" class = "col-sm-2 control-label"><?= t('Shoulder Length L:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('shoulder_length_l', isset($row_->shoulder_length_l) ? $row_->shoulder_length_l : '') ?>"  id="shoulder_length_l" placeholder="" name="shoulder_length_l">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "shoulder_width_l" class = "col-sm-2 control-label"><?= t('Shoulder Width R:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control"  value="<?= set_value('shoulder_width_l', isset($row_->shoulder_width_l) ? $row_->shoulder_width_l : '') ?>"  id="shoulder_width_l" placeholder="" name="shoulder_width_l">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "side_drain_type_r" class = "col-sm-2 control-label"><?= t('Side Drain Type R:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control"  id="side_drain_type_r" placeholder="" name="side_drain_type_r">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            d.DrainTypeID,
                                                            d.DrainType
                                                    FROM
                                                            y_draintypes AS d ", "DrainTypeID", "DrainType", set_value('side_drain_type_r', isset($row_->side_drain_type_r) ? $row_->side_drain_type_r : ''), true);
                                ?>
                                <?php ?>
                            </select>
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "side_drain_length_r" class = "col-sm-2 control-label"><?= t('Side Drain Length R:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('side_drain_length_r', isset($row_->side_drain_length_r) ? $row_->side_drain_length_r : '') ?>"  id="side_drain_length_r" placeholder="" name="side_drain_length_r">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "reserve_width_r" class = "col-sm-2 control-label"><?= t('Reserve Width R:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('reserve_width_r', isset($row_->reserve_width_r) ? $row_->reserve_width_r : '') ?>"  id="reserve_width_r" placeholder="" name="reserve_width_r">
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "guard_rail_type_r" class = "col-sm-2 control-label"><?= t('Side Fence Type R:') ?></label>
                        <div class="col-sm-10">
                            <select data-toggle="tooltip" data-placement="left" title="" class="form-control"  id="guard_rail_type_r" placeholder="" name="guard_rail_type_r">
                                <?php ?>
                                <?php
                                echo getoption("SELECT
                                                            r.RailTypeID,
                                                            r.RailType
                                                    FROM
                                                            y_railtypes AS r ", "RailTypeID", "RailType", set_value('guard_rail_type_r', isset($row_->guard_rail_type_r) ? $row_->guard_rail_type_r : ''), true);
                                ?>
                                <?php ?>
                            </select>
                        </div>
                    </div>
                    <div class = "form-group">
                        <label for = "guard_rail_extent_r" class = "col-sm-2 control-label"><?= t('Side Fence Extent R:') ?></label>
                        <div class="col-sm-10">
                            <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('guard_rail_extent_r', isset($row_->guard_rail_extent_r) ? $row_->guard_rail_extent_r : '') ?>"  id="guard_rail_extent_r" placeholder="" name="guard_rail_extent_r">
                        </div>
                    </div>
                </div>

                <!-- tab4 ----------------------------->                
                <div id = "tabs-4">
                    <div class = "form-group">
                        <div class="col-sm-10">
                            <input type="checkbox" value="1" <?= ($row_->use_gps == 1 ? "checked" : "") ?> id="use_gps" name="use_gps">
                            <label for = "use_gps"><?= t('Use GPS') ?></label><hr />
                        </div>
                    </div>
                    <?php
                    if ($row_->use_gps == '1') {
                        ?>
                        <div class = "form-group">
                            <label for = "start_gps_n" class = "col-sm-2 control-label"><?= t('Start Coord N:') ?></label>
                            <div class="col-sm-10">
                                <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('start_gps_n', isset($row_->start_gps_n) ? $row_->start_gps_n : '') ?>"  id="start_gps_n" placeholder="" name="start_gps_n">
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "end_gps_n" class = "col-sm-2 control-label"><?= t('End Coord N:') ?></label>
                            <div class="col-sm-10">
                                <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('end_gps_n', isset($row_->end_gps_n) ? $row_->end_gps_n : '') ?>"  id="end_gps_n" placeholder="" name="end_gps_n">
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "start_gps_e" class = "col-sm-2 control-label"><?= t('End Coord E:') ?></label>
                            <div class="col-sm-10">
                                <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('start_gps_e', isset($row_->start_gps_e) ? $row_->start_gps_e : '') ?>"  id="start_gps_e" placeholder="" name="start_gps_e">
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "end_gps_e" class = "col-sm-2 control-label"><?= t('Start Coord E:') ?></label>
                            <div class="col-sm-10">
                                <input data-toggle="tooltip" data-placement="left" title="" type="text" class="form-control" value="<?= set_value('end_gps_e', isset($row_->end_gps_e) ? $row_->end_gps_e : '') ?>"  id="end_gps_e" placeholder="" name="end_gps_e">
                            </div>
                        </div>
                        <?php
                    }
                    ?>                    
                </div><!-- tabs ------------------->

            </div>
        </div><!-- end body ----------------------------->

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg">
                <button data-toggle="tooltip" data-placement="left" title="រក្សាទុក" name="submit" type="submit" class="btn btn-default glyphicon glyphicon-save" value="save"> <?= t('រក្សាទុក') ?></button>
                <button data-toggle="tooltip" data-placement="left" title="រក្សាទុក និងត្រលប់ក្រោយ" name="submit" type="submit" class="btn btn-default glyphicon glyphicon-circle-arrow-left" value="save_back">​ <?= t('រក្សាទុក') ?></button>
                <button data-toggle="tooltip" data-placement="left" title="ត្រលប់ក្រោយ" id="back" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left"> <?= t('ថយក្រោយ') ?></button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function() {
        $("#tabs").tabs();

        $('#back').on('click', function() {
            window.location = "<?= site_url('rri/plan/index') ?>";
        });

    }); // end ready fun. ====================
</script>