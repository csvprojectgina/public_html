<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css"/>
<style media="screen">
    small {
        color: #ff6565;
        position: absolute;
    }

    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: blue;
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 4px;
    }

    #myBtn:hover {
        background-color: #555;
    }

    /*pdf view*/
    /* Style the second URL with a red border */
    /*body { padding-top:20px; }*/
    .panel-body .btn:not(.btn-block) {
        margin-bottom: 10px;
    }

    .btn-default {
        padding: 5px;
    }

    @media only screen and (max-width: 769px) {
        .ui-tabs .ui-tabs-nav li {
            width: 100%;
        }

        .ui-tabs .ui-tabs-nav .ui-tabs-anchor {
            width: 100%;
        }

        .btnpdf {
            left: 10px !important;
        }

        .container {
            width: 100% !important;
            padding-right: 0px;
            padding-left: 0px;
        }
    }

    @media only screen and (max-width: 500px) {
        .btn-group > .btn, .btn-group-vertical > .btn {
            font-size: 16px;
        }

        .btn-group-lg > .btn {
            padding: 5px;
        }

        .btnpdf {
            width: auto !important;
            height: auto !important;
            padding: 5px !important;
            top: -62px !important;
            font-size: 16px;
        }

        .panel-body .btn:not(.btn-block) {
            width: 100%;
        }
    }

    .navbar-collapse {
        padding-left: 0px;
        padding-right: 0
    }

    .ui-widget-header {
        border: 1px solid #fff;
        background: #fff;
        color: #222222;
        font-weight: bold;
    }

    .navbar {
        margin-bottom: 0px;
    }

    .modal-content {
        padding: 10px !important;
    }

    .modal-header {
        padding: 10px;
    }

    .nav-tabs > li {
        background-color: #eeeeee;
        border: 1px solid #ddd;
        border-bottom-width: 0;
        margin: 1px .2em 0 0;
        border-top-right-radius: 4px;
        border-top-left-radius: 4px;
    }

    .img-thumb {
        width: 20.333333%;
        background-color: blue;
    }

    .panel .panel-body p {
        display: inline-block;
    }

    .form-horizontal .control-label {
        margin-bottom: 4px;
    }

    .ui-widget-content a {
        float: left;
        color: blue;
    }

    .sl_gender {
        width: 65px !important;
    }

    .cl_p {
        color: #000000;
        line-height: 25px;
    }

    .panel-body .btn:not(.btn-block) {
        float: left;
        display: inline-block;
        color: #5890ff;
    }

    .btn-group > .btn:last-child:not(:first-child), .btn-group > .dropdown-toggle:not(:first-child) {
        font-size: 23px;
    }

    .panel .panel-body p {
        display: inline-block;
    }

    .img-center {
        margin-right: auto;
    }

    .form-horizontal .control-label {
        margin-bottom: 4px;
    }

    .sl_gender {
        width: 65px !important;
    }

    .cl_p {
        color: #000000;
        line-height: 25px;
    }

    #test-gdocsviewer {
        border: 5px red solid;
        padding: 20px;
        width: 650px;
        background: #ccc;
        text-align: center;
    }

    /* Style all gdocsviewer containers */

    .gdocsviewer {
        text-align: center;
        padding: 0px 10px 0px 0px;
        margin: 0px 20px -10px 10px;
        position: relative;
        padding-bottom: 100%; /* 16:9 */
        height: 0;
    }

    .gdocsviewer iframe {
        text-align: center;
        padding: 0px 10px 0px 0px;
        margin: 0px 20px 0px 10px;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .gdocsviewer {
        text-align: center;
        padding: 0px 10px 0px 0px;
        margin: 0px 20px -10px 10px;
        position: relative;
        padding-bottom: 100%; /* 16:9 */
        height: 0;
    }

    .gdocsviewer iframe {
        text-align: center;
        padding: 0px 10px 0px 0px;
        margin: 0px 20px 0px 10px;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    @media only screen
    and (min-device-width: 414px)
    and (max-device-width: 736px) {
        width:

        100%;
    }

    .required:after {
        color: #cc0000;
        content: "*";
        font-weight: bolder;
        margin-left: 5px;
    }
</style>
<script type="text/javascript">
    /*<![CDATA[*/
    $(document).ready(function () {
        $('#embedURL').gdocsViewer();
        $('a.embed').gdocsViewer({
            width: 860,
            height: 600
        });
    });
    /*]]>*/
</script>
<?php


$id = isset($id) ? $id : 0;
?>

<form class="form-horizontal f_save" role="form" method="post" id="f_save">
    <div class="panel panel-default ">
        <div class="panel-heading">
            <h3 class="panel-title">
                <!--<img src="<?= base_url('assets/bs/css/images/new.gif') ?>" />--> <?= t('ព័ត៌មានមន្ត្រីរាជការ') ?></h3>
            <input type="hidden" name="id" id="id" class="id" value="<?= $id ?>"/>
        </div>
        <div class="panel-body" ​​>
            <div id="tabs">
                <div id="custom-bootstrap-menu" class="navbar" role="navigation">
                    <div class="navbar-header navbar-default">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-menubuilder">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse navbar-menubuilder">
                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="#tabs-0"><?= t('ប្រវត្តិរូប') ?></a></li>
                            <li><a href="#tabs-1"><?= t('ព័ត៌មានផ្ទាល់ខ្លួន') ?></a></li>
                            <li><a href="#tabs-2"><?= t('ការងារ') ?></a></li>
                            <li><a href="#tabs-3"><?= t('បៀវត្ស') ?></a></li>
                            <li><a href="#tabs-4"><?= t('កម្រិតវប្បធម៌') ?></a></li>
                            <li><a href="#tabs-5"><?= t('ការបណ្តុះបណ្តាល') ?></a></li>
                            <li><a href="#tabs-6"><?= t('ភាសាបរទេស') ?></a></li>
                            <li><a href="#tabs-7"><?= t('គ្រឿងឥស្សរិយយស') ?></a></li>
                        </ul>
                    </div>
                </div>
                <!--background-->
                <div id="tabs-0"  style="margin: -15px -24px -18px -23px;">
                    <div class="tab-content">
                        <div id="tabss-1">
                            <div class="row">
                                <label class="col-sm-2 col-md-2 text-right" style="line-height: 35px">Reference Document
                                    PDF:</label>
                                <div class="col-sm-4 col-md-4">
                                    <div class="input-group">
                                        <input id="fieldID2" type="text" name="reference_file"
                                               value="<?= set_value('reference_file', isset($row->reference_file) ? $row->reference_file : '') ?>"
                                               class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <a href="<?php echo base_url() ?>/assets/filemanager/dialog.php?type=2&field_id=fieldID2&relative_url=1"
                                               class="btn btn-danger iframe-btn" type="button">Select PDF File</a>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="pad" id="document-refer">
                                <?php if (!isset($row->reference_file)) { ?>

                                    <a href="<?= base_url() . 'assets/csv/files/' . $id . '.pdf' ?>" class="embed"
                                       id="pdf"></a>

                                <?php } elseif (is_null($row->reference_file) || empty($row->reference_file)) { ?>
                                    <a href="<?= base_url() . 'assets/csv/files/' . $id . '.pdf' ?>" class="embed"
                                       id="pdf"></a>

                                <?php } else { ?>
                                    <a href="<?= base_url() . 'assets/csv/files/' . $row->reference_file ?>"
                                       class="embed" id="pdf"></a>

                                <?php } ?>


                            </div>

                        </div>
                    </div>
                </div>
                <!--end background-->
                <!-- personal info. -->
                <div id="tabs-1" style="margin: -10px -24px -18px -23px;" ​>
                    <div id="tabss" class="panel-heading">

                        <div class="tab-content">
                            <label for="address" class="text-info control-label" ​><?= t('ព័ត៌មានសាមីខ្លួន') ?></label>
                            <hr style="margin-top:0px;">
                            <div id="tabss-1" class="form-horizontal">
                                <div class="row">

                                    <div class="col-sm-8 ">

                                        <div class="form-group">
                                            <label for="lastname"
                                                   class="col-sm-3 control-label required"><?= t('គោត្តនាម') ?></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="lastname" name="lastname"
                                                       placeholder="" data-toggle="tooltip" data-placement="top"
                                                       title="បំពេញគោត្តនាម" maxlength="255"
                                                       value="<?= set_value('lastname', isset($row->lastname) ? $row->lastname : '') ?>"/>
                                            </div>


                                        </div>

                                        <div class="form-group">
                                            <label for="firstname"
                                                   class="col-sm-3 control-label required"><?= t('នាម') ?></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="firstname" name="firstname"
                                                       placeholder="" data-toggle="tooltip" data-placement="top"
                                                       title="បំពេញនាម" maxlength="255"
                                                       value="<?= set_value('firstname', isset($row->firstname) ? $row->firstname : '') ?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="english_full_name"
                                                   class="col-sm-3 control-label"><?= t('អក្សរឡាតាំង') ?></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control english_full_name"
                                                       id="english_full_name" name="english_full_name" placeholder=""
                                                       data-toggle="tooltip" data-placement="top"
                                                       title="បំពេញជាអក្សរឡាតាំង" maxlength="255"
                                                       value="<?= set_value('english_full_name', isset($row->english_full_name) ? $row->english_full_name : '') ?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="civil_servant_id"
                                                   class="col-sm-3 control-label"><?= t('តួនាទី') ?></label>
                                            <div class="col-sm-6">
                                                <label class="form-control" id="lb_unit" name="lb_unit"
                                                       data-toggle="tooltip" data-placement="top" title="តួនាទី"
                                                       maxlength="10"
                                                       number/><?= set_value('current_role', isset($row_w->current_role_in_khmer) ? $row_w->current_role_in_khmer : '') ?></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile_phone"
                                                   class="col-sm-3 control-label"><?= t('ទូរស័ព្ទ') ?></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" data-masked-input="999 999 9999"
                                                       id="mobile_phone" name="mobile_phone" placeholder=""
                                                       data-toggle="tooltip" data-placement="top"
                                                       title="បំពេញលេខទូរស័ព្ទ" maxlength="13" number
                                                       value="<?= set_value('mobile_phone', isset($row->mobile_phone) ? $row->mobile_phone : '') ?>"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-sm-4 ">

                                        <?php
                                        if (isset($row->photo)) {
                                            if ($row->photo == '' || is_null($row->photo) || $row->photo == '0') {
                                                ?>
                                             <!--   <input type="hidden" value="<?= $row->photo ?>" name="txtphotoupate"/>-->
                                                <img class="img  thumbnail img-center" id="img" width="150px"
                                                     height="170px"
                                                     src=""
                                                     onerror="this.src='<?= base_url() . 'assets/csv/blank-user.jpg'; ?>'"/>
                                                <input style="position: absolute; top: 0px; width: 150px; height: 170px; cursor: pointer; background: transparent; border: none !important; opacity: 0;"
                                                       type="file" id="photo" name="photo" accept="image/*"/>


                                            <?php } else { ?>
                                                <input type="hidden" value="<?= $row->photo ?>" name="txtphotoupate"/>
                                                <img class="img  thumbnail img-center" id="img" width="150px"
                                                     height="170px"
                                                     src="<?= base_url() . $row->photo ?>"
                                                     onerror="this.src='<?= base_url() . 'assets/csv/blank-user.jpg'; ?>'"/>
                                                <input style="position: absolute; top: 0px; width: 150px; height: 170px; cursor: pointer; background: transparent; border: none !important; opacity: 0;"
                                                       type="file" id="photo" name="photo" accept="image/*"/>
                                                       <?php
                                                   }
                                               } else {
                                                   ?>
                                            <img class="img  thumbnail img-center" id="img" width="150px" height="170px"
                                                 src="<?= base_url() . 'assets/csv/photos/' . $id . '.jpg' ?>"
                                                 onerror="this.src='<?= base_url() . 'assets/csv/blank-user.jpg'; ?>'"/>
                                            <input style="position: absolute; top: 0px; width: 150px; height: 170px; cursor: pointer; background: transparent; border: none !important; opacity: 0;"
                                                   type="file" id="photo" name="photo" accept="image/*"/>

                                        <?php }
                                        ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="civil_servant_id"
                                           class="col-sm-2 control-label"><?= t('អត្តលេខមន្ត្រីរាជការ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="civil_servant_id"
                                               name="civil_servant_id" placeholder="" data-toggle="tooltip"
                                               data-placement="top" title="បំពេញអត្តលេខមន្ត្រីរាជការ" maxlength="10"
                                               number
                                               value="<?= set_value('civil_servant_id', isset($row->civil_servant_id) ? $row->civil_servant_id : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nationality_id"
                                           class="col-sm-2 control-label"><?= t('លេខអត្តសញ្ញាណប័ណ្ណ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nationality_id"
                                               name="nationality_id" placeholder="" data-toggle="tooltip"
                                               data-placement="top" title="បំពេញលេខអត្តសញ្ញាណប័ណ្ណ" maxlength="9"
                                               number
                                               value="<?= set_value('nationality_id', isset($row->nationality_id) ? $row->nationality_id : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="common_official_code"
                                           class="col-sm-2 control-label"><?= t('លេខពិធីការ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="common_official_code"
                                               name="common_official_code" placeholder="" data-toggle="tooltip"
                                               data-placement="top" title="បំពេញលេខពិធីការ" maxlength="5" number
                                               value="<?= set_value('common_official_code', isset($row->common_official_code) ? $row->common_official_code : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="col-sm-2 control-label"><?= t('ភេទ') ?></label>
                                    <div class="col-sm-4">
                                        <select class="form-control"  id="gender" name="gender"
                                                data-toggle="tooltip" data-placement="top" title="ជ្រើសរើសភេទ"
                                                value="<?= set_value('gender', isset($row->gender) ? $row->gender : '') ?>"/>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dateofbirth"
                                           class="col-sm-2  control-label required"><?= t('ថ្ងៃ ខែ ឆ្នាំកំណើត') ?></label>
                                    <div class="col-sm-4">
                                        <input oninvalid="this.setCustomValidity('សូបបញ្ចូលថ្ងៃខែឆ្នាំកំនើត')"
                                               type="text" class="form-control" id="dateofbirth"
                                               name="dateofbirth" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip"
                                               data-placement="top" title="ជ្រើសរើសថ្ងៃ ខែ ឆ្នាំ"
                                               value="<?= set_value('dateofbirth', isset($row->dateofbirth) ? ($row->dateofbirth != '00-00-0000' ? date('d-m-Y', strtotime($row->dateofbirth)) : '') : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nationality"
                                           class="col-sm-2 control-label"><?= t('សញ្ជាតិ') ?></label>
                                    <div class="col-sm-4">
                                        <select class="form-control" type="text" id="nationality" name="nationality"
                                                data-toggle="tooltip" data-placement="top" title="ជ្រើសរើសសញ្ជាតិ"
                                                value="<?= set_value('nationality', isset($row->nationality) ? $row->nationality : '') ?>"/>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="work_phone"
                                           class="col-sm-2 control-label"><?= t('ទូរស័ព្ទកន្លែងធ្វើការ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="work_phone" name="work_phone"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញលេខទូរស័ព្ទ" maxlength="10" number
                                               value="<?= set_value('work_phone', isset($row->work_phone) ? $row->work_phone : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fax_number"
                                           class="col-sm-2 control-label"><?= t('លេខទូរសារ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="fax_number" name="fax_number"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញលេខទូរសារ" maxlength="10" number
                                               value="<?= set_value('fax_number', isset($row->fax_number) ? $row->fax_number : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label"><?= t('អ៊ីមែល') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="email" name="email"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញអ៊ីមែល" fax_number
                                               value="<?= set_value('email', isset($row->email) ? $row->email : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="website"
                                           class="col-sm-2 control-label"><?= t('បណ្តាញសង្គម') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="website" name="website"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញវិបសាយ​"
                                               value="<?= set_value('website', isset($row->website) ? $row->website : '') ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="skills"
                                           class="col-sm-2 control-label"><?= t('ជំនាញ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="skills" name="skills"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="ជំនាញ"
                                               value="<?= set_value('skills', isset($row->skills) ? $row->skills : '') ?>"/>
                                    </div>
                                </div>
                                
                                  <div class="form-group">
                                    <label for="degree"
                                           class="col-sm-2 control-label"><?= t('កម្រិតជំនាញ') ?></label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="cbodegree" id="cbo-degree"  class="form-control" data-live-search="true" data-live-search-style="" title=" "
                                        value="<?= set_value('cbodegree', isset($row->degree) ? $row->degree : '') ?>">
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <label for="address" class="text-info control-label"><?= t('ទីកន្លែងកំណើត') ?></label>
                                <hr style="margin-top:0px;">
                                <!-- </div>
                                <div id="tabss-2" class="tab-pane "> -->
                                
                               
                                
                                
                                <div class="form-group">
                                    <label for="house_no" class="col-sm-2 control-label"><?= t('ផ្ទះលេខ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="house_no" name="house_no"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញលេខផ្ទះ" maxlength="10"
                                               value="<?= set_value('house_no', isset($row->house_no) ? $row->house_no : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="street" class="col-sm-2 control-label"><?= t('ផ្លូវ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="street" name="street"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញផ្លូវ" maxlength="100"
                                               value="<?= set_value('street', isset($row->street) ? $row->street : '') ?>"/>
                                    </div>
                                </div>
                               

                                 <div class="form-group">
                                    <label for="province"
                                           class="col-sm-2 control-label"><?= t('រាជធានី/ខេត្ត') ?></label>
                                    <div class="col-sm-4">
                                        <select type="text" class="form-control" id="province" name="province"  class="form-control" data-live-search="true" data-live-search-style=""
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញខេត្ត ឫក្រុង" maxlength="255"
                                               value="<?= set_value('province', isset($row->province) ? $row->province : '') ?>"/>
                                        
                                    </select>
                                    </div>
                                </div>
                                
                                   <div class="form-group">
                                    <label for="district"
                                           class="col-sm-2 control-label"><?= t('ស្រុក/ខ័ណ្ឌ') ?></label>
                                    <div class="col-sm-4">
                                         <select type="text" class="form-control" id="district" name="district" class="form-control" data-live-search="true" data-live-search-style=""
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញស្រុក ឫខ័ណ្ឌ" maxlength="255"
                                               value="<?= set_value('district', isset($row->district) ? $row->district : '') ?>"/>
                                         </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="commune"
                                           class="col-sm-2 control-label"><?= t('ឃុំ/សង្កាត់') ?></label>
                                    <div class="col-sm-4">
                                        <select  type="text" class="form-control" id="commune" name="commune" class="form-control" data-live-search="true" data-live-search-style=""
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញឃុំ ឫសង្កាត់" maxlength="255"
                                               value="<?= set_value('commune', isset($row->commune) ? $row->commune : '') ?>"/>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="village" class="col-sm-2 control-label"><?= t('ភូមិ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="village" name="village"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញភូមិ" maxlength="255"
                                               value="<?= set_value('village', isset($row->village) ? $row->village : '') ?>"/>
                                    </div>
                                </div>
                                
                              <div class="form-group">
                                    <label for="group_no" class="col-sm-2 control-label"><?= t('ក្រុមទី') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="group_no" name="group_no"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញក្រុម" maxlength="5" number
                                               value="<?= set_value('group_no', isset($row->group_no) ? $row->group_no : '') ?>"/>
                                    </div>
                                </div>
                                
                                <!--</div>
                            </div>-->
                                <!-- <div id="tabss-3" class="tab-pane "> -->
                                <label for="address" class="text-info control-label"
                                       ​><?= t('អាសយដ្ឋានបច្ចុប្បន្ន') ?></label>
                                <hr style="margin-top:0px;">
                                <div class="form-group">
                                    <label for="current_house_no"
                                           class="col-sm-2 control-label"><?= t('ផ្ទះលេខ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="current_house_no"
                                               name="current_house_no" placeholder="" data-toggle="tooltip"
                                               data-placement="top" title="បំពេញលេខផ្ទះ" maxlength="10"
                                               value="<?= set_value('current_house_no', isset($row->current_house_no) ? $row->current_house_no : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="current_street"
                                           class="col-sm-2 control-label"><?= t('ផ្លូវ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="current_street"
                                               name="current_street" placeholder="" data-toggle="tooltip"
                                               data-placement="top" title="បំពេញផ្លូវ" maxlength="100"
                                               value="<?= set_value('current_street', isset($row->current_street) ? $row->current_street : '') ?>"/>
                                    </div>
                                </div>
                                
                               
                                   <div class="form-group">
                                    <label for="current_province"
                                           class="col-sm-2 control-label"><?= t('រាជធានី/ខេត្ត') ?></label>
                                    <div class="col-sm-4">
                                        <select type="text" class="form-control" id="current_province" name="current_province"  class="form-control" data-live-search="true" data-live-search-style=""
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញខេត្ត ឫក្រុង" maxlength="255"
                                               value="<?= set_value('current_province', isset($row->current_province) ? $row->current_province : '') ?>"/>
                                        
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="current_district"
                                           class="col-sm-2 control-label"><?= t('ស្រុក/ខ័ណ្ឌ') ?></label>
                                    <div class="col-sm-4">
                                        <select type="text" class="form-control" id="current_district"   data-live-search="true" data-live-search-style=""
                                               name="current_district" placeholder=" " data-toggle="tooltip"
                                               data-placement="top" title="បំពេញស្រុក ឫខ័ណ្ឌ" maxlength="255"
                                               value="<?= set_value('current_district', isset($row->current_district) ? $row->current_district : '') ?>"/>
                                    </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="current_commune"
                                           class="col-sm-2 control-label"><?= t('ឃុំ/សង្កាត់') ?></label>
                                    <div class="col-sm-4">
                                        <select type="text" class="form-control" id="current_commune"  class="form-control" data-live-search="true" data-live-search-style=""
                                               name="current_commune" placeholder=" " data-toggle="tooltip"
                                               data-placement="top" title="បំពេញឃុំ ឫសង្កាត់" maxlength="255"
                                               value="<?= set_value('current_commune', isset($row->current_commune) ? $row->current_commune : '') ?>"/>
                                   </select> 
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label for="current_village"
                                           class="col-sm-2 control-label"><?= t('ភូមិ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="current_village"
                                               name="current_village" placeholder="" data-toggle="tooltip"
                                               data-placement="top" title="បំពេញភូមិ" maxlength="255"
                                               value="<?= set_value('current_village', isset($row->current_village) ? $row->current_village : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="current_group_no"
                                           class="col-sm-2 control-label"><?= t('ក្រុមទី') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="current_group_no"
                                               name="current_group_no" placeholder="" data-toggle="tooltip"
                                               data-placement="top" title="បំពេញក្រុម" maxlength="5" number
                                               value="<?= set_value('current_group_no', isset($row->current_group_no) ? $row->current_group_no : '') ?>"/>
                                    </div>
                                </div>
                                <!-- </div>
                                <div id="tabss-4" class="tab-pane"> -->
                                <label for="address" class="text-info control-label"
                                       ​><?= t('ស្ថានភាពគ្រួសារ') ?></label>
                                <hr style="margin-top:0px;">
                                <div class="form-group">
                                    <label for="family_name"
                                           class="col-sm-2 control-label"><?= t('ឈ្មោះប្រពន្ធ ឬប្តី') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="family_name" name="family_name"
                                               placeholder=" " data-toggle="tooltip" data-placement="top"
                                               title="បំពេញឈ្មោះប្រពន្ធ ឬប្តី" maxlength="255"
                                               value="<?= set_value('family_name', isset($row->family_name) ? $row->family_name : '') ?>"/>
                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="family_dateofbirth"
                                           class="col-sm-2 control-label"><?= t('ថ្ងៃ ខែ ឆ្នាំកំណើត') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="family_dateofbirth"
                                               name="family_dateofbirth" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                                               data-toggle="tooltip"
                                               data-placement="top" title="បំពេញថ្ងៃ ខែ ឆ្នាំកំណើត" 
                                               value="<?= set_value('family_dateofbirth', isset($row->family_dateofbirth) ? ($row->family_dateofbirth != '00-00-0000' ? date('d-m-Y', strtotime($row->family_dateofbirth)) : '') : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="hus_or_wife"
                                           class="col-sm-2 control-label"><?= t('ប្រពន្ធ ឬប្តី') ?></label>
                                    <div class="col-sm-4">
                                        <select class="form-control" type="text" id="hus_or_wife" name="hus_or_wife"
                                                data-toggle="tooltip" data-placement="top"
                                                title="ជ្រើសរើសប្រពន្ធ ឬប្តី"
                                                value="<?= set_value('hus_or_wife', isset($row->hus_or_wife) ? $row->hus_or_wife : '') ?>">
                                        
                                                
                                        
                                        </select>
                                    </div>
                                </div>
                                
                                
                                
                               
                                
   
                                
                                
                                
                                
                                <div class="form-group">
                                    <label for="family_job"
                                           class="col-sm-2 control-label"><?= t('មុខរបរ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="family_job" name="family_job"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញមុខរបរ" maxlength="255"
                                               value="<?= set_value('family_job', isset($row->family_job) ? $row->family_job : '') ?>"/>
                                    </div>
                                </div>
                              <div class="form-group">
                                    <label for="date_enter_salary"
                                           class="col-sm-2 control-label"><?= t('ថ្ងៃខែឆ្នាំបញ្ចូលបៀវត្ស') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="date_enter_salary"
                                               name="date_enter_salary" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                                               data-toggle="tooltip"
                                               data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចូលបៀវត្ស" 
                                                value="<?= set_value('date_enter_salary', isset($row->date_enter_salary) ?  date('d-m-Y', strtotime($row->date_enter_salary))  : '') ?>"/>
                                               
                                  
                                               
                                              
          
                                    
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="note_family" class="col-sm-2 control-label"><?= t('សំគាល់') ?></label>
                                    <div class="col-sm-10">
                                        <textarea  type="text" class="form-control" id="note_family" name="note_family" rows="6" placeholder="" data-toggle="tooltip" data-placement="top" title="សំគាល់"><?= set_value('note_family', isset($row->note_family) ? $row->note_family : '') ?></textarea>
                                    </div>
                                </div> -->

                                <!--  father -->
                                <label for="address" class="text-info control-label" ><?= t('ឪពុក') ?></label>
                                <hr style="margin-top:0px;">
                                <div class="form-group">
                                    <label for="family_name"
                                           class="col-sm-2 control-label"><?= t('ឈ្មោះឪពុក') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="fathername" name="fathername"
                                               placeholder=" " data-toggle="tooltip" data-placement="top"
                                               title="បំពេញឈ្មោះម្ដាយ" maxlength="255"
                                               value="<?= set_value('father_name', isset($rowfather->father_name) ? $rowfather->father_name : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="family_dateofbirth"
                                           class="col-sm-2 control-label"><?= t('ថ្ងៃ ខែ ឆ្នាំកំណើត') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="father_dateofbirth"
                                               name="father_dateofbirth" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                                               data-toggle="tooltip"
                                               data-placement="top" title="បំពេញថ្ងៃ ខែ ឆ្នាំកំណើត" 
                                               value="<?= set_value('mother_dateOfBirth', isset($rowfather->father_dateOfBirth) ? ($rowfather->father_dateOfBirth != '00-00-0000' ? date('d-m-Y', strtotime($rowfather->father_dateOfBirth)) : '') : '') ?>"/>
          
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pobfather"
                                           class="col-sm-2 control-label"><?= t('ទីកន្លែងកំណើត') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control " id="pobfather" name="pobfather"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="ទីកន្លែងកំណើត"
                                               value="<?= set_value('mother_job', isset($rowfather->father_placeOfBirth) ? $rowfather->father_placeOfBirth : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="family_job"
                                           class="col-sm-2 control-label"><?= t('មុខរបរ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="father_job" name="father_job"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញមុខរបរ" maxlength="255"
                                               value="<?= set_value('mother_job', isset($rowfather->father_job) ? $rowfather->father_job : '') ?>"/>
                                    </div>
                                </div>

                                <!-- mother-->
                                <label for="address" class="text-info control-label" ><?= t('ម្ដាយ') ?></label>
                                <hr style="margin-top:0px;">
                                <div class="form-group">
                                    <label for="family_name"
                                           class="col-sm-2 control-label"><?= t('ឈ្មោះម្ដាយ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="mothername" name="mothername"
                                               placeholder=" " data-toggle="tooltip" data-placement="top"
                                               title="បំពេញឈ្មោះម្ដាយ" maxlength="255"
                                               value="<?= set_value('mother_name', isset($rowmother->mother_name) ? $rowmother->mother_name : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="family_dateofbirth"
                                           class="col-sm-2 control-label"><?= t('ថ្ងៃ ខែ ឆ្នាំកំណើត') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="mother_dateofbirth"
                                               name="mother_dateofbirth" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                                               data-toggle="tooltip"
                                               data-placement="top" title="បំពេញថ្ងៃ ខែ ឆ្នាំកំណើត"
                                               value="<?= set_value('mother_dateOfBirth', isset($rowmother->mother_dateOfBirth) ? ($rowmother->mother_dateOfBirth != '00-00-0000' ? date('d-m-Y', strtotime($rowmother->mother_dateOfBirth)) : '') : '') ?>"/>
                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pobmother"
                                           class="col-sm-2 control-label"><?= t('ទីកន្លែងកំណើត') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control " id="pobmother" name="pobmother"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="ទីកន្លែងកំណើត"
                                               value="<?= set_value('mother_job', isset($rowmother->mother_placeOfBirth) ? $rowmother->mother_placeOfBirth : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="family_job"
                                           class="col-sm-2 control-label"><?= t('មុខរបរ') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="mother_job" name="mother_job"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញមុខរបរ" maxlength="255"
                                               value="<?= set_value('mother_job', isset($rowmother->mother_job) ? $rowmother->mother_job : '') ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div id="dis_child" class="col-sm-4">
                                        <button type="button"
                                                class="btn btn-primary col-sm-12" data-toggle="modal"
                                                data-target="#childrened" id="btnchildren">បញ្ចូលកូន
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <!-- witnesses -->
                                    <label for="address" class="text-info control-label"
                                           ​><?= t('អ្នកដឹងព្ញ') ?></label>
                                    <hr style="margin-top:0px;">
                                    <div class="modal-body" style="padding:0px !important;">
                                        <table cellpadding="0" cellspacing="0" border="1" ​
                                               class="table table-striped table-bordered" id="tbl_witnesses">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                                    <th style="text-align: center;"><?= t('ឈ្មោះ') ?></th>
                                                    <th style="text-align: center;"><?= t('ភេទ') ?></th>
                                                    <th style="text-align: center;"><?= t(' ឆ្នាំ ខែ ថ្ងៃកំណើត') ?></th>
                                                    <th style="text-align: center;"><?= t('ការងារ') ?></th>
                                                    <th style="text-align: center;"><?= t('អាសយដ្ឋាន') ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td class="ch_no" style="text-align: center;" class="auto_id">ទី១</td>
                                                    <td>
                                                        <input type="hidden" value="<?php echo @$witnesses[0]->wit_id; ?>"
                                                               name="wit_id1"/>
                                                        <input type="text"
                                                               value="<?php echo @$witnesses[0]->wit_name; ?>"
                                                               class="form-control wit_name1 "
                                                               id="wit_name1" name="wit_name1"
                                                               placeholder=""
                                                               data-toggle="tooltip"
                                                               data-placement="top"
                                                               title="ឈ្មោះអ្នកដឹងឭ"
                                                               maxlength="255"/>
                                                    <td>
                                                        <!-- <select class="form-control" type="text" id="genderwit1" name="genderwit" data-toggle="tooltip" data-placement="top" title="ជ្រើសរើសភេទ" value="<?= set_value('gender', isset($witnesses[0]->gender) ? $witnesses[0]->gender : '') ?>">
                                                              </select> -->
                                                        <select class="form-control sl_gender" name="witgender1">
                                                            <option>
                                                            
                                                                <?php
                                                                foreach ($g_row

                                                                as $gender) {
                                                                    $is_selected = '';
                                                                    if ($gender->khmer_gender == @$witnesses[0]->gender) {
                                                                        $is_selected = "selected";
                                                                    }
                                                                    ?>
                                                                <option data-id="<?php echo @$gender->khmer_gender; ?>"
                                                                        data-name="<?php echo @$gender->khmer_gender; ?>"
                                                                        value="<?php echo $gender->khmer_gender; ?>" <?php echo $is_selected ?>><?php echo @$gender->khmer_gender; ?></option>
                                                                    <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" value="<?php if(@$witnesses[0]->dob=="") {}else { echo date('d-m-Y', strtotime(@$witnesses[0]->dob));} ?>"
                                                               class="form-control dobwit end_date " id="dobwit1"
                                                               name="dobwit1" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                                                               data-toggle="tooltip"
                                                               data-placement="top" title="ថ្ងៃ ខែ ឆ្នាំកំណើត"
                                                               maxlength="255"
                                                               />
                                                              
                                                            
                                                    </td>
                                                    <td>
                                                        <input type="text" value="<?php echo @$witnesses[0]->job; ?>"
                                                               class="form-control wit_job " id="job1" name="job1"
                                                               placeholder="" data-toggle="tooltip"
                                                               data-placement="top" title="ការងារ" maxlength="255"/>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <!-- home number -->
                                                            ផ្ទះលេខ: <p id="homenb" name="homenb"
                                                                        class="cl_p"> <?php echo @$witnesses[0]->num_home; ?></p>
                                                            <input type="hidden" class="form-control" id="home_nb"
                                                                   name="home_nb"
                                                                   value="<?php echo @$witnesses[0]->num_home; ?>">
                                                            <!-- street -->
                                                            , ផ្លូវលេខ: <p id="streetnb" name="homenb"
                                                                           class="cl_p"> <?php echo @$witnesses[0]->streets; ?></p>
                                                            <input type="hidden" class="form-control" id="str_nb"
                                                                   name="str_nb"
                                                                   value=" <?php echo @$witnesses[0]->streets; ?>">
                                                            <!-- village -->
                                                            , ភូមិ: <p id="villagenb" name="homenb"
                                                                       class="cl_p"><?php echo @$witnesses[0]->village; ?></p>
                                                            <input type="hidden" class="form-control" id="vil_nb"
                                                                   name="vil_nb"
                                                                   value="<?php echo @$witnesses[0]->village; ?>">
                                                            <!-- commune -->
                                                            , ឃុំ/សង្កាត់: <p id="communcenb" name="homenb"
                                                                              class="cl_p"> <?php echo @$witnesses[0]->commun; ?></p>
                                                            <input type="hidden" class="form-control" id="com_nb"
                                                                   name="com_nb"
                                                                   value="<?php echo @$witnesses[0]->commun; ?>">
                                                            <!--district  -->
                                                            , ស្រុក/ខ័ណ្ឌ: <p id="districtnb" name="homenb"
                                                                              class="cl_p"> <?php echo @$witnesses[0]->district; ?></p>
                                                            <input type="hidden" class="form-control" id="dis_nb"
                                                                   name="dis_nb"
                                                                   value="<?php echo @$witnesses[0]->district; ?>">
                                                            <!-- province  -->
                                                            , រាជធានី/ខេត្ត: <p id="provincenb" name="homenb"
                                                                                class="cl_p"> <?php echo @$witnesses[0]->province; ?></p>
                                                            <input type="hidden" class="form-control" id="pro_nb"
                                                                   name="pro_nb"
                                                                   value="<?php echo @$witnesses[0]->province; ?>">
                                                        </div>
                                                        <a href="#" data-placement="top" title="បន្ថែមអ្នកដឹងឭ" id=""
                                                           data-toggle="modal" data-target="#addModal"><img
                                                                src="<?= base_url('assets/bs/css/images/add.png') ?>"/>
                                                            បញ្ចូល...</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="ch_no" style="text-align: center;" class="auto_id">ទី២</td>
                                                    <td>
                                                        <input type="hidden" value="<?php echo @$witnesses[1]->wit_id; ?>"
                                                               name="wit_id2"/>
                                                        <input type="text"
                                                               value="<?php echo @$witnesses[1]->wit_name; ?>"
                                                               class="form-control wit_name "
                                                               id="wit_name2" name="wit_name2"
                                                               placeholder=""
                                                               data-toggle="tooltip"
                                                               data-placement="top"
                                                               title="ឈ្មោះអ្នកដឹងឭ"
                                                               maxlength="255"/>
                                                    <td>
                                                        <select class="form-control sl_gender" name="witgender2">
                                                            <option>
                                                            
                                                                <?php
                                                                foreach ($g_row

                                                                as $gender) {
                                                                    $is_selected = '';
                                                                    if ($gender->khmer_gender == @$witnesses[1]->gender) {
                                                                        $is_selected = "selected";
                                                                    }
                                                                    ?>
                                                                <option data-id="<?php echo @$gender->khmer_gender; ?>"
                                                                        data-name="<?php echo @$gender->khmer_gender; ?>"
                                                                        value="<?php echo $gender->khmer_gender; ?>" <?php echo $is_selected ?>><?php echo @$gender->khmer_gender; ?></option>
                                                                    <?php } ?>
                                                        </select>
                                                    </td>
                                                   
                                                    <td><input type="text" value="<?php if(@$witnesses[1]->dob=="") {}else { echo date('d-m-Y', strtotime(@$witnesses[1]->dob));} ?>"
                                                               class="form-control dobwit" id="dobwit2"
                                                               name="dobwit2" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                                                               data-toggle="tooltip"
                                                               data-placement="top" title="ថ្ងៃ ខែ ឆ្នាំកំណើត1"
                                                               maxlength="255"
                                                             />
                                                               </td>
                                                    <td><input type="text" value="<?php echo @$witnesses[1]->job; ?>"
                                                               class="form-control wit_job " id="job2" name="job2"
                                                               placeholder="" data-toggle="tooltip"
                                                               data-placement="top" title="ការងារ" maxlength="255"/></td>
                                                    <td>​
                                                        <div class="input-group">
                                                            <!-- home number -->
                                                            ផ្ទះលេខ: <p id="homenb1" name="homenb1"
                                                                        class="cl_p"> <?php echo @$witnesses[1]->num_home; ?></p>
                                                            <input type="hidden" class="form-control" id="home_nb1"
                                                                   name="home_nb1"
                                                                   value="<?php echo @$witnesses[1]->num_home; ?>">
                                                            <!-- street -->
                                                            , ផ្លូវលេខ: <p id="streetnb1" name="streetnb1"
                                                                           class="cl_p"> <?php echo @$witnesses[1]->streets; ?></p>
                                                            <input type="hidden" class="form-control" id="str_nb1"
                                                                   name="str_nb1"
                                                                   value=" <?php echo @$witnesses[1]->streets; ?>">
                                                            <!-- village -->
                                                            , ភូមិ: <p id="villagenb1" name="villagenb1"
                                                                       class="cl_p"> <?php echo @$witnesses[1]->village; ?></p>
                                                            <input type="hidden" class="form-control" id="vil_nb1"
                                                                   name="vil_nb1"
                                                                   value="<?php echo @$witnesses[1]->streets; ?>">
                                                            <!-- commune -->
                                                            , ឃុំ/សង្កាត់: <p id="communcenb1" name="communcenb1"
                                                                              class="cl_p"> <?php echo @$witnesses[1]->commun; ?></p>
                                                            <input type="hidden" class="form-control" id="com_nb1"
                                                                   name="com_nb1"
                                                                   value="<?php echo @$witnesses[1]->commun; ?>">
                                                            <!--district  -->
                                                            , ស្រុក/ខ័ណ្ឌ: <p id="districtnb1" name="districtnb1"
                                                                              class="cl_p"> <?php echo @$witnesses[1]->district; ?></p>
                                                            <input type="hidden" class="form-control" id="dis_nb1"
                                                                   name="dis_nb1"
                                                                   value="<?php echo @$witnesses[1]->district; ?>">
                                                            <!-- province  -->
                                                            , រាជធានី/ខេត្ត: <p id="provincenb1" name="provincenb1"
                                                                                class="cl_p"> <?php echo @$witnesses[1]->province; ?></p>
                                                            <input type="hidden" class="form-control" id="pro_nb1"
                                                                   name="pro_nb1"
                                                                   value="<?php echo @$witnesses[1]->province; ?>">
                                                        </div>
                                                        <a href="#" data-placement="top" title="" id="" data-toggle="modal"
                                                           data-target="#addModal1"><img
                                                                src="<?= base_url('assets/bs/css/images/add.png') ?>"/>
                                                            បញ្ចូល...</a></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- </div> -->

                                <!-- </fieldset> -->


                            </div>

                        </div>
                    </div>
                </div>
                <!--==============alert form witnesses=========  -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel"><span
                                        class="glyphicon glyphicon-plus"> </span> អាសយដ្ឋាន</h4>
                            </div>
                            <div class="modal-body">
                                <div class="bs-example">
                                    <!-- <form  class="form-horizontal f_save" role="form" method="post" id="f_save" > -->

                                    <div class="form-group">
                                        <label for="num_home"
                                               class="col-sm-4 control-label"><?= t('ផ្ទះលេខ') ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control num_home" id="num_home"
                                                   name="num_home" placeholder="" data-toggle="tooltip"
                                                   data-placement="top" title="ផ្ទះលេខ"
                                                   value="<?= set_value('num_home', isset($row->num_home) ? $row->num_home : '') ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="streets"
                                               class="col-sm-4 control-label"><?= t('ផ្លូវលេខ') ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control streets" id="streets" name="streets"
                                                   placeholder="" data-toggle="tooltip" data-placement="top"
                                                   title="ផ្លូវលេខ"
                                                   value="<?= set_value('streets', isset($row->streets) ? $row->streets : '') ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note_family"
                                               class="col-sm-4 control-label"><?= t('រាជធានី/ខេត្ត') ?></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" type="text" id="p_province" name="p_province" class="form-control" data-live-search="true" data-live-search-style=""
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="ជ្រើសរើសរាជធានី/ខេត្ត"
                                                    value="<?= set_value('province', isset($row->province) ? $row->province : '')
                                                                    ?>">
                                                
                                             
                                                
                                                <option value=""></option>
                                                <?php foreach ($p_row as $prow) { ?>
                                                    <option value="<?php echo $prow->id; ?>"
                                                            data-value="<?php echo $prow->khmer_name; ?>"> <?php echo $prow->khmer_name; ?></option>
                                                        <?php }; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note_family"
                                               class="col-sm-4 control-label"><?= t('ក្រុង/ស្រុក/ខ័ណ្ឌ') ?></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" type="text" id="d_district" name="d_district"
                                                    data-toggle="tooltip" data-placement="top" title="ក្រុង/ស្រុក/ខ័ណ្ឌ"
                                                    value="<?= set_value('district', isset($row->district) ? $row->district : '') ?>">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note_family"
                                               class="col-sm-4 control-label"><?= t('ឃុំ/សង្កាត់') ?></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" type="text" id="c_commun" name="c_commun"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    value="<?= set_value('commun', isset($row->commun) ? $row->commun : '') ?>">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note_family" class="col-sm-4 control-label"><?= t('ភូមិ') ?></label>
                                        <div class="col-sm-8">
                                            <!--select by district-->
                                            <!--                                             <select class="form-control" type="text" id="v_village" name="v_village"
                                                     data-toggle="tooltip" data-placement="top" title="ភូមិ"
                                                     value="<?= set_value('village', isset($row->village) ? $row->village : '') ?>">
                                             </select> -->
                                            <input type="text" class="form-control v_village" id="v_village"
                                                   name="v_village" placeholder="" data-toggle="tooltip"
                                                   data-placement="top" title="ភូមិ"
                                                   value=""/>
                                            <!--<input type="text" class="form-control " id="v_village" ng-model="v_village"​​ name="v_village" data-toggle="tooltip" data-placement="top" title="ភូមិ" maxlength="255" value="" />-->

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">

                                        </div>
                                        <div class="col-md-6 text-right  col-sm-6" style="padding:0px;">
                                            <div class="btn-group  btn-group-lg">
                                                <button class="btn btn-default" id="btnsubmitnb" data-dismiss="modal"
                                                        type="button"><i class=" fa  fa-floppy-o"></i>យល់ព្រម
                                                </button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                                        id="wit_back"><i class="fa fa-arrow-left"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel"><span
                                        class="glyphicon glyphicon-plus"> </span> អាស័យដ្ឋាន</h4>
                            </div>
                            <div class="modal-body">
                                <div class="bs-example">
                                    <!-- <form  class="form-horizontal f_save" role="form" method="post" id="f_save" > -->

                                    <div class="form-group">
                                        <label for="num_home1"
                                               class="col-sm-4 control-label"><?= t('ផ្ទះលេខ') ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control num_home1" id="num_home1"
                                                   name="num_home1" placeholder="" data-toggle="tooltip"
                                                   data-placement="top" title="ផ្ទះលេខ"
                                                   value="<?= set_value('num_home', isset($row->num_home) ? $row->num_home : '') ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="streets1"
                                               class="col-sm-4 control-label"><?= t('ផ្លូវលេខ') ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control streets" id="streets1"
                                                   name="streets1" placeholder="" data-toggle="tooltip"
                                                   data-placement="top" title="ផ្លូវលេខ"
                                                   value="<?= set_value('streets', isset($row->streets) ? $row->streets : '') ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note_family"
                                               class="col-sm-4 control-label"><?= t('រាជធានី/ខេត្ត1111') ?></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" type="text" id="p1_province" name="p1_province"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="ជ្រើសរើសរាជធានី/ខេត្ត"
                                                    value="<?= set_value('province', isset($row->province) ? $row->province : '') ?>">
                                                <option value=""></option>
                                                <?php foreach ($p_row as $prow) { ?>
                                                    <option value="<?php echo $prow->no; ?>"
                                                            data-value="<?php echo $prow->khmer_name; ?>"> <?php echo $prow->khmer_name; ?></option>
                                                        <?php }; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note_family"
                                               class="col-sm-4 control-label"><?= t('ក្រុង/ស្រុក/ខ័ណ្ឌ') ?></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" type="text" id="d1_district" name="d1_district"
                                                    data-toggle="tooltip" data-placement="top" title="ក្រុង/ស្រុក/ខ័ណ្ឌ"
                                                    value="<?= set_value('district', isset($row->district) ? $row->district : '') ?>">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note_family"
                                               class="col-sm-4 control-label"><?= t('ឃុំ/សង្កាត់') ?></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" type="text" id="c1_commun" name="c1_commun"
                                                    data-toggle="tooltip" data-placement="top" title=""
                                                    value="<?= set_value('commun', isset($row->commun) ? $row->commun : '') ?>">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note_family" class="col-sm-4 control-label"><?= t('ភូមិ') ?></label>
                                        <div class="col-sm-8">
                                            <!--                                            <select class="form-control" type="text" id="v1_village" name="v1_village"
                                                    data-toggle="tooltip" data-placement="top" title="ភូមិ"
                                                    value="<?= set_value('village', isset($row->village) ? $row->village : '') ?>">
                                            </select>-->
                                            <input type="text" class="form-control v1_village" id="v1_village"
                                                   name="v1_village" placeholder="" data-toggle="tooltip"
                                                   data-placement="top" title="ភូមិ"
                                                   value=""/>
                                        </div>
                                    </div>
                                    <!-- <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"> </span> បិត</button>
                                      <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-save"> </span> រក្សាទុក</button>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                        </div>
                                        <div class="col-md-6 text-right  col-sm-6" style="padding:0px;">
                                            <div class="btn-group  btn-group-lg">
                                                <button class="btn btn-default" id="btnsubmitnb1" data-dismiss="modal"
                                                        type="button"><i class=" fa  fa-floppy-o"></i>យល់ព្រម
                                                </button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                                        id="wit_back"><i class="fa fa-arrow-left"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- work -->
                <div id="tabs-2" style="padding: 20px 10px 10px 10px;">
                    <?php #echo $id;  ?>
                    <fieldset id="dis_ble" disabled="true">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading ">
                                        <h3 class="panel-title">
                                            <span class="glyphicon glyphicon-list-alt "></span> ឯកសារទាក់ទង</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12" col-lg-12>
                                                <a href="#" class="btn btn-default" role="button" data-toggle="modal"
                                                   data-target="#workhistory" id="btnworkhistory"><span
                                                        class="glyphicon glyphicon-list-alt"></span>
                                                    <br/><?php echo t('សម្រាប់ប្រវត្តិការងារ') ?></a>
                                                <!-- <a href="#" class="btn btn-default" role="button" data-toggle="modal" data-target="#workbydegree" id="btnworkbydegree"><span class="glyphicon glyphicon-certificate"></span> <br/>ការដំឡើងថ្នាក់តាមសញ្ញាបត្រ</a> -->
                                                <!-- <a href="#" class="btn btn-default" role="button" data-toggle="modal" data-target="#workpromotionhistory" id="btnworkpromotionhistory"><span class="glyphicon glyphicon-signal"></span> <br/>ប្រវត្តិការដំឡើងឋានន្តរស័ក្ត</a>
                                                <a href="#" class="btn btn-default" role="button" data-toggle="modal" data-target="#workclasspromotehistory" id="btnworkclasspromotehistory" ><span class="glyphicon glyphicon-book"></span> <br/>ប្រវត្តិការដំឡើងថ្នាក</a>
    
                                                <a href="#" class="btn btn-default" role="button" data-toggle="modal" data-target="#worktransfer" id="btnworktransfer"><span class="glyphicon glyphicon-export"></span> <br/>ការផ្ទេរការងារ</a>
                                                <a href="#" class="btn btn-default" role="button" data-toggle="modal" data-target="#workframeworkout" id="btnworkframeworkout"><span class="glyphicon glyphicon-tower"></span> <br/>មន្ត្រីក្រៅក្របខ័ណ្ឌដើម</a>
                                                <a href="#" class="btn btn-default" role="button" data-toggle="modal" data-target="#worknamedelete" id="btnworknamedelete"><span class="glyphicon glyphicon-trash"></span> <br/>ការលុបឈ្មោះ</a>
                                                <a href="#" class="btn btn-default" role="button" data-toggle="modal" data-target="#workfreesalary" id="btnworkfreesalary"><span class="glyphicon glyphicon-tag"></span> <br/>ភាពទំនេរគ្មានបៀវត្ស</a>
                                                <a href="#" class="btn btn-default" role="button" data-toggle="modal" data-target="#worktitlelevel" id="btnworktitlelevel"><span class="glyphicon glyphicon-tag"></span> <br/>កម្រិតមុខងារ</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div style="width: 100%; height: auto; padding: 10px;  margin: 1px 0px 10px 10px;"
                         class="form-horizontal">
                        <legend style="font-family: khmer mef2; color: #5890ff; padding-bottom: 15px;">
                            តួនាទីបច្ចុប្បន្ន
                        </legend>
                        <div class="form-group">
                            <label for="currentRole" class="col-sm-2 control-label required"><?= t('តួនាទី') ?></label>
                            <div class="col-sm-4">
                                <select oninvalid="this.setCustomValidity('សូមបញ្ចូលតួនាទី')" id="current_role_id"
                                        name="currentRole" class="selectpicker form-control" data-live-search="true"
                                        data-live-search-style="begins" title=" ">
                                    <option value=""></option>
                                    <?php
                                    foreach ($currentrole_rows as $keyrow) {
                                        $is_selected = '';
                                        if ($keyrow->id == @$row_w->current_role_id) {
                                            $is_selected = "selected";
                                        }
                                        ?>
                                        <option data-id="<?php echo @$keyrow->id; ?>"
                                                data-name="<?php echo @$keyrow->current_role_in_khmer; ?>"
                                                value="<?php echo $keyrow->id; ?>" <?php echo $is_selected ?>><?php echo @$keyrow->current_role_in_khmer; ?></option>
                                            <?php }; ?>
                                </select>
                            </div>
                            <label for="promote_date"
                                   class="col-sm-2 control-label"><?= t('ថ្ងៃខែឆ្នាំតែងតាំង') ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="promote_date" name="promote_date"
                                       placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip" data-placement="top"
                                       title="បំពេញថ្ងៃខែឆ្នាំតែងតាំង" 
                                       value="<?= set_value('promote_date', isset($row_w->promote_date) ? ($row_w->promote_date != '00-00-0000' ? date('d-m-Y', strtotime($row_w->promote_date)) : ''): '') ?>"/>
                                 
                            </div>
                        </div>
                        <!--                        <div class="form-group">
                                                    <label for="current_role" class="col-sm-2 control-label"><?= t('តួនាទី') ?></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="current_role" name="current_role"
                                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                                               title="បំពេញតួនាទីបច្ចុប្បន្ន" maxlength="255"
                                                               value="<?= set_value('current_role', isset($row_w->current_role) ? $row_w->current_role : '') ?>"/>
                                                    </div>
                                                </div>-->
                        <div class="form-group">
                            <input type="hidden" name="unitname" id="unitname"
                                   value="<?= set_value('second_role', isset($row_w->unit) ? $row_w->unit : '') ?>">
                            <label for="unit" class="col-sm-2 control-label required"><?= t('អង្គភាព') ?></label>
                            <div class="col-sm-4">
                                <select oninvalid="this.setCustomValidity('សូមបញ្ចូលអង្គភាព')" id="unit" name="unit"
                                        class="form-control" data-live-search="true" data-live-search-style="" title=" "
                                        value="<?= set_value('unit', isset($row_w->unit) ? $row_w->unit : '') ?>">
                                </select>
                            </div>


                            <label class="col-sm-2 col-md-2 text-right"
                                   style="line-height: 35px"><?= t('ឯកសារយោង') ?></label>
                            <div class="col-sm-4 col-md-4">
                                <div class="input-group" style=" margin-bottom: -10px;">
                                    <input id="fieldID3" type="text" name="reference_file_in"
                                           value="<?= set_value('reference_file_in', isset($row_w->reference_file_in) ? $row_w->reference_file_in : '') ?>"
                                          
                                           class="form-control iframe-btn" readonly>
                                    <span class="input-group-btn">
                                       
                                        <a href="<?php echo base_url() ?>/assets/filemanager/dialog.php?type=2&field_id=fieldID3&relative_url=1"
                                           class="btn btn-danger iframe-btn" type="button"><?= t('ស្វែងរក') ?></a>
                                    </span>

                                </div>
<!--                                <small><?= t('សំរាប់មន្ត្រីដែលធ្វើការផ្ទេរមកពីក្រសួងនានា') ?></small>-->
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="general_dep_id" class="col-sm-2 control-label"><?= t('អគ្គនាយកដ្ឋាន') ?></label>
                            <div class="col-sm-4">
                                <select id="general_dep_id" name="general_dep_name" class=" form-control"
                                        data-live-search="true" data-live-search-style=""
                                        data-toggle="tooltip" data-placement="top" title=""
                                        value="<?= set_value('general_department', isset($row_w->general_department) ? $row_w->general_department : '') ?>">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="d_id" class="col-sm-2 control-label"><?= t('នាយកដ្ឋាន') ?></label>
                            <div class="col-sm-4">
                                <select class=" form-control" type="text" id="d_id" name="d_name"
                                        data-toggle="tooltip" data-placement="top" data-live-search="true"
                                        data-live-search-style=""
                                        title=""
                                        value="<?= set_value('department', isset($row_w->department) ? $row_w->department : '') ?>"/>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="work_office" class="col-sm-2 control-label"><?= t('ការិយាល័យ') ?></label>
                            <div class="col-sm-4">
                                <select id="work_office" name="work_office" class="form-control" data-live-search="true"
                                        data-live-search-style="" title=" "
                                        value="<?= set_value('work_office', isset($row_w->work_office) ? $row_w->work_office : '') ?>">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="province_office"
                                   class="col-sm-2 control-label"><?= t('ការិយាល័យចំណុះមន្ទីរ ដ.ន.ស.ស /រាជធានី​ / ខេត្ត') ?></label>
                            <div class="col-sm-4">
                                <select id="province_office" name="province_office" class="form-control"
                                        data-live-search="true" data-live-search-style="" title=" "
                                        value="<?= set_value('province_office', isset($row_w->province_office) ? $row_w->province_office : '') ?>">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="land_official"
                                   class="col-sm-2 control-label"><?= t('ការិយាល័យ ដ.ន.ស.ភ ក្រុង/ស្រុក/ខណ្ឌ័') ?></label>
                            <div class="col-sm-4">
                                <select name="land_official" id="land_official" class="form-control"
                                        data-live-search="true" data-live-search-style="" title="ការិយាល័យភូមិបាល"
                                        value="<?= set_value('land_official', isset($row_w->land_official) ? $row_w->land_official : '') ?>"/>
                                </select>
                            </div>
                        </div>


                        <div class="form-group hidden">
                            <label for="date_out"
                                   class="col-sm-2 control-label"><?= t('ថ្ងៃខែឆ្នាំចូលនិវត្តន៍') ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control " id="date_out" name="date_out"
                                       placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip" data-placement="top"
                                       title="បំពេញថ្ងៃខែឆ្នាំចូលនិវត្តន៍" 
                                       value="<?= set_value('date_out', isset($row_w->date_out) ? $row_w->date_out : '') ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="attachment"
                                   class="col-sm-2 control-label"><?= t('លិខិតយោង') ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="attachment" name="attachment"
                                       placeholder="" data-toggle="tooltip" data-placement="top"
                                       title="បំពេញលិខិតយោង" maxlength="255"
                                       value="<?= set_value('attachment', isset($row_w->attachment) ? $row_w->attachment : '') ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type_of_framework"
                                   class="col-sm-2 control-label"><?= t('ប្រភេទក្របខ័ណ្ឌ') ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="type_of_framework" name="type_of_framework"
                                       placeholder="" data-toggle="tooltip" data-placement="top"
                                       title="បំពេញប្រភេទក្របខ័ណ្ឌ" maxlength="255"
                                       value="<?= set_value('type_of_framework', isset($row_w->type_of_framework) ? $row_w->type_of_framework : '') ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date_in"
                                   class="col-sm-2 control-label"><?= t('ថ្ងៃខែឆ្នាំចូលក្របខ័ណ្ឌរដ្ឋ') ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="date_in" name="date_in"
                                       placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip" data-placement="top"
                                       title="បំពេញថ្ងៃខែឆ្នាំចូលបម្រើការងារក្នុងក្របខ័ណ្ឌរដ្ឋ" 
                                       value="<?= set_value('date_in', isset($row_w->date_in) ? date('d-m-Y',strtotime($row_w->date_in)) : '') ?>"/>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="type_of_framework"
                                   class="col-sm-2 control-label"><?= t('ថ្ងៃខែឆ្នាំដំឡើងឋានន្តរស័ក្តិ ចុងក្រោយ') ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control  " id="date_late_promote"
                                       name="date_late_promote"
                                       placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip" data-placement="top"
                                       title="<?php echo t('បំពេញ ថ្ងៃខែឆ្នាំដំឡើងថ្នាក់ ឋានន្តរស័ក្តិ ចុងក្រោយ') ?>"
                                       maxlength="255"
                                       value="<?= set_value('date_late_promote', isset($row_w->date_late_promote) ? date('d-m-Y', strtotime($row_w->date_late_promote)) : ''); ?>"/>
                                <!--<small><?= t('សំរាប់មន្ត្រីដែលធ្វើការផ្ទេរមកពីក្រសួងនានា ឬ មន្ត្រីដែលត្រូវធ្វើបច្ចុប្បន្នភាព') ?></small>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type_of_framework"
                                   class="col-sm-2 control-label"><?= t('លេខព្រះរាជក្រឹត្យ អនុក្រឹត ឋានន្តរស័ក្តិ') ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="reference_promote" name="reference_promote"
                                       placeholder="" data-toggle="tooltip" data-placement="top"
                                       title="<?php echo t('បំពេញ លេខព្រះរាជក្រឹត្យ អនុក្រឹតនៃដំឡើង ឋានន្តរស័ក្តិចុងក្រោយ') ?>"
                                       maxlength="255"
                                       value="<?= set_value('reference_promote', isset($row_w->reference_promote) ? $row_w->reference_promote : '') ?>"/>
                                <!--<small><?= t('សំរាប់មន្ត្រីដែលធ្វើការផ្ទេរមកពីក្រសួងនានា ឬ មន្ត្រីដែលត្រូវធ្វើបច្ចុប្បន្នភាព') ?></small>-->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="real_promote_date"
                                   class="col-sm-2 control-label"><?= t('ថ្ងៃខែឆ្នាំតាំងស៊ប់') ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="real_promote_date"
                                       name="real_promote_date" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip"
                                       data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំតាំងស៊ប់" 
                                       value="<?= set_value('real_promote_date', isset($row_w->real_promote_date) ? date('d-m-Y', strtotime($row_w->real_promote_date)) : '') ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="general_dep_id"
                                   class="col-sm-2 control-label"><?= t('មកពីក្រសួង ឫស្ថាប័ន') ?></label>
                            <div class="col-sm-4">
                                <!-- value="<?= set_value('transfer_from', isset($row_w->transfer_from) ? $row_w->transfer_from : '') ?>"-->
                                <select id="transfer_from" name="transfer_from" class=" form-control"
                                        data-toggle="tooltip" data-placement="top" title="">
                                    <!--                                    <option value="0">--><?//= t('ផ្សេងៗ') ?><!--</option>-->
                                </select>

                            </div>

                        </div>
                        <div class="form-group">
                            <label for="physical_status" class="col-sm-2 control-label"><?= t('កាយសម្បទា') ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="physical_status" name="physical_status"
                                       placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាយសម្បទា"
                                       maxlength="255"
                                       value="<?= set_value('physical_status', isset($row_w->physical_status) ? $row_w->physical_status : '') ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="second_role" class="col-sm-2 control-label"><?= t('មុខងារទី ២') ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="second_role" name="second_role"
                                       placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញមុខងារទី ២"
                                       maxlength="255"
                                       value="<?= set_value('second_role', isset($row_w->second_role) ? $row_w->second_role : '') ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="equal_class" class="col-sm-2 control-label"><?= t('ឋានៈស្មើ') ?></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="equal_class" name="equal_class"
                                       placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញឋានៈស្មើ"
                                       maxlength="255"
                                       value="<?= set_value('equal_class', isset($row_w->equal_class) ? $row_w->equal_class : '') ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="note" class="col-sm-2 control-label"><?= t('សំគាល់') ?></label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control" id="note" name="note" placeholder=""
                                          data-toggle="tooltip" data-placement="top"
                                          title="សំគាល់"><?= set_value('note', isset($row_w->note) ? $row_w->note : '') ?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- sub work ---------------------->

                    <!-- <div style=" width: 300px; height: auto; padding: 10px; float: left;" id="my_div" >
                        <legend style="font-family: khmer mef2; color: #5890ff; padding-bottom: 15px; text-align: center;" >ឯកសារទាក់ទង</legend>
                        <button style="margin: 10px 20px 10px 30px; padding: 4px 70px;" type="button" class="btn btn-default btn-lg btn-default btncolor">ប្រវត្តិការងារ </button><br>
                        <button style="margin: 10px 20px 10px 30px; padding: 4px 17px;"  type="button" class="btn btn-default btn-lg btn-default btncolor1">ការដំឡើងថ្នាក់តាមសញ្ញាបត្រ</button><br>
                        <button style="margin: 10px 20px 10px 30px; padding: 4px 25px;" type="button" class="btn btn-default btn-lg btn-default btncolor">ប្រវត្តិការដំឡើងឋានន្តរស័ក្ត</button><br>
                        <button style="margin: 10px 20px 10px 30px; padding: 4px 46px;" type="button" class="btn btn-default btn-lg btn-default btncolor1">ប្រវត្តិការដំឡើងថ្នាក់</button><br>
                        <button style="margin: 10px 20px 10px 30px; padding: 4px 64px;" type="button" class="btn btn-default btn-lg btn-default btncolor">ការផ្ទេរការងារ</button><br>
                        <button style="margin: 10px 20px 10px 30px; padding: 4px 38px;" type="button" class="btn btn-default btn-lg btn-default btncolor1">មន្ត្រីក្រៅក្របខ័ណ្ឌដើម</button><br>
                        <button style="margin: 10px 20px 10px 30px; padding: 4px 64px;" type="button" class="btn btn-default btn-lg btn-default btncolor">ការលុបឈ្មោះ</button><br>
                        <button style="margin: 10px 20px 10px 30px; padding: 4px 44px;" type="button" class="btn btn-default btn-lg btn-default btncolor1">ភាពទំនេរគ្មានបៀវត្ស</button><br>
                        <button style="margin: 10px 20px 10px 30px; padding: 4px 68px;" type="button" class="btn btn-default btn-lg btn-default btncolor">កម្រិតមុខងារ</button>
                    </div> -->
                </div><!-- work ------------->

                <!-- salary ---------------------->
                <div id="tabs-3">
                    <!-- <fieldset id="salary_dis"> -->
                    <div class="row">
                        <label for="salary_level"
                               class="col-sm-2 control-label"><?= t('ក្របខណ្ឌឋានន្តរសកិ្ត/ថ្នាក់') ?></label>
                        <div class=" col-sm-10">
                            <!--                            <input type="text" class="form-control" id="salary_level" name="salary_level" placeholder="បំពេញកាំបៀវត្ស" data-toggle="tooltip" data-placement="top" title="បំពេញកាំបៀវត្ស" maxlength="255" value="<?= set_value('salary_level', isset($row_s->salary_level) ? $row_s->salary_level : '') ?>" />
                                <span class="input-group-addon"></span>-->
                            <select class="form-control salary_leve" type="text" id="salary_level" name="salary_level"
                                    data-toggle="tooltip" data-placement="top" title="ជ្រើសរើសភេទ"
                                    value="<?= set_value('salary_level', isset($row_s->salary_level) ? $row_s->salary_level : '') ?>"/>
                            </select>
                        </div>
                    </div>
                    <fieldset disabled>
                        <div class="row">
                            <label for="index_multiply"
                                   class=" col-sm-2 control-label"><?= t('សន្ទទស្សន៍​បៀរត្ស') ?></label>
                            <div class=" col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="index_multiply" name="index_multiply"
                                           placeholder="" data-toggle="tooltip" data-placement="top"
                                           title="បំពេញដោយស្វ័យប្រវត្តិមេគុណសន្ទទស្សន៍" number closekey maxlength="255"
                                           value="<?= set_value('index_multiply', isset($row_s->index_multiply) ? $row_s->index_multiply : '') ?>"/>
                                    <span class="input-group-addon">*</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset disabled>
                        <div class="row">
                            <label for="index_salary" class="col-sm-2 control-label"><?= t('ប្រាក់សន្ទស្សន៍') ?></label>
                            <div class=" col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="index_salary" name="index_salary"
                                           placeholder="" data-toggle="tooltip" data-placement="top"
                                           title="បំពេញដោយស្វ័យប្រវត្តិប្រាក់សន្ទស្សន៍ (៛)" maxlength="255" number
                                           closekey
                                           value="<?= set_value('index_salary', isset($row_s->index_salary) ? $row_s->index_salary : '') ?>"/>
                                    <span class="input-group-addon">៛</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <label for="pure_salary" class="col-sm-2 control-label"><?= t('បៀវត្សមូលដ្ឋាន') ?></label>
                        <div class=" col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" id="pure_salary" name="pure_salary"
                                       placeholder=" " data-toggle="tooltip" data-placement="top"
                                       title="គណនាស្វ័យប្រវត្តិ (បៀវត្សសុទ្ធសាធ = មេគុណសន្ទទស្សន៍ X ប្រាក់សន្ទស្សន៍)(៛)"
                                       closekey maxlength="255" number
                                       value="<?= set_value('pure_salary', isset($row_s->pure_salary) ? $row_s->pure_salary : '') ?>"/>
                                <span class="input-group-addon">៛</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="title_yearly" class="col-sm-2 control-label"><?= t('ប្រាក់បំណាច់មុខងារ') ?></label>
                        <div class=" col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" id="title_yearly" name="title_yearly"
                                       placeholder="" data-toggle="tooltip" data-placement="top"
                                       title="បំពេញបំណាច់មុខងារ (៛)" maxlength="255" number
                                       value="<?= set_value('title_yearly', isset($row_s->title_yearly) ? $row_s->title_yearly : '') ?>"/>
                                <span class="input-group-addon">៛</span>
                            </div>
                        </div>
                    </div>
                    <!--                    <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="less_than_child15" class="col-sm-3 control-label"><?= t('កូនអាយុតិចជាង ១៥ ឆ្នាំ') ?></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="less_than_child15" name="less_than_child15" placeholder="បំពេញកូនអាយុតិចជាង ១៥ ឆ្នាំ (៛)" data-toggle="tooltip" data-placement="top" title="បំពេញកូនអាយុតិចជាង ១៥ ឆ្នាំ (៛)" maxlength="255" number value="<?= set_value('less_than_child15', isset($row_s->less_than_child15) ? $row_s->less_than_child15 : '') ?>" />
                                                    <span class="input-group-addon">៛</span>
                                                </div>
                                            </div>
                                        </div>-->
                    <div class="row">
                        <label for="more_than_child15"
                               class=" col-sm-2 control-label"><?= t('កូនអាយុតិចជាង ២១ ឆ្នាំ') ?></label>
                        <div class=" col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" id="more_than_child15" name="more_than_child15"
                                       placeholder="" data-toggle="tooltip" data-placement="top"
                                       title="បំពេញកូនអាយុតិចជាង ២១ ឆ្នាំ (៛)" maxlength="255" number
                                       value="<?= set_value('more_than_child15', isset($row_s->more_than_child15) ? $row_s->more_than_child15 : '') ?>"/>
                                <span class="input-group-addon">៛</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="family_assistant"
                               class="col-sm-2 control-label"><?= t('ប្រាក់ឧបត្ថម្ភប្រពន្ធ') ?></label>
                        <div class=" col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" id="family_assistant" name="family_assistant"
                                       placeholder="" data-toggle="tooltip" data-placement="top"
                                       title="បំពេញប្រាក់ឧបត្ថម្ភប្រពន្ធ (៛)" maxlength="255" number
                                       value="<?= set_value('family_assistant', isset($row_s->family_assistant) ? $row_s->family_assistant : '') ?>"/>
                                <span class="input-group-addon">៛</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="additional_salary"
                               class="col-sm-2 control-label"><?= t('ប្រាក់លាភការជំនួយការ') ?></label>
                        <div class=" col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" id="additional_salary" name="additional_salary"
                                       placeholder="" data-toggle="tooltip" data-placement="top"
                                       title="បំពេញប្រាក់លាភការជំនួយការ (៛)" maxlength="255" number
                                       value="<?= set_value('additional_salary', isset($row_s->additional_salary) ? $row_s->additional_salary : '') ?>"/>
                                <span class="input-group-addon">៛</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="adviser_evidence"
                               class="col-sm-2 control-label"><?= t('ប្រាក់លាភការទីប្រឹក្សា') ?></label>
                        <div class=" col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" id="adviser_evidence" name="adviser_evidence"
                                       placeholder="" data-toggle="tooltip" data-placement="top"
                                       title="បំពេញប្រាក់លាភការទីប្រឹក្សា (៛)" maxlength="255" number
                                       value="<?= set_value('adviser_evidence', isset($row_s->adviser_evidence) ? $row_s->adviser_evidence : '') ?>"/>
                                <span class="input-group-addon">៛</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="additional_expire"
                               class="col-sm-2 control-label"><?= t('ប្រាក់បំណាច់បន្ថែម') ?></label>
                        <div class="  col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" id="additional_expire" name="additional_expire"
                                       placeholder="" data-toggle="tooltip" data-placement="top"
                                       title="បំពេញប្រាក់បំណាច់បន្ថែម (៛)" maxlength="255" number
                                       value="<?= set_value('additional_expire', isset($row_s->additional_expire) ? $row_s->additional_expire : '') ?>"/>
                                <span class="input-group-addon">៛</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="assistant_evidence"
                               class="col-sm-2 control-label"><?= t('ប្រាក់បង្គ្រប់') ?></label>
                        <div class=" col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" id="assistant_evidence"
                                       name="assistant_evidence" placeholder="" data-toggle="tooltip"
                                       data-placement="top" title="បំពេញប្រាក់បង្គ្រប់ (៛)" maxlength="255" number
                                       value="<?= set_value('assistant_evidence', isset($row_s->assistant_evidence) ? $row_s->assistant_evidence : '') ?>"/>
                                <span class="input-group-addon">៛</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="remind_salary" class="col-sm-2 control-label"><?= t('ប្រាក់រំលឹក') ?></label>
                        <div class=" col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" id="remind_salary" name="remind_salary"
                                       placeholder=" " data-toggle="tooltip" data-placement="top"
                                       title="បំពេញប្រាក់រលឹក (៛)" maxlength="255" number
                                       value="<?= set_value('remind_salary', isset($row_s->remind_salary) ? $row_s->remind_salary : '') ?>"/>
                                <span class="input-group-addon">៛</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="exchange"
                               class="col-sm-2 control-label"><?= t('អត្រាប្តូរប្រាក់ក្នុងមួយដុល្លារ') ?></label>
                        <div class=" col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" id="exchange" name="exchange" placeholder=""
                                       data-toggle="tooltip" data-placement="top"
                                       title="បំពេញអត្រាប្តូរប្រាក់ក្នុងមួយដុល្លារ" maxlength="255" number
                                       value="<?= set_value('exchange', isset($row_s->exchange) ? $row_s->exchange : '') ?>"/>
                                <span class="input-group-addon">៛</span>
                            </div>
                        </div>
                    </div>
                    <fieldset disabled>
                        <div class="row">
                            <label for="total" class="col-sm-2 control-label"><?= t('សរុបគិតជារៀល') ?></label>
                            <div class=" col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="total" name="total" placeholder=""
                                           data-toggle="tooltip" data-placement="top" title="សរុបគិតជារៀល (៛)"
                                           maxlength="255" closekey
                                           value="<?= set_value('total', isset($row_s->total) ? $row_s->total : '') ?>"/>
                                    <span class="input-group-addon">៛</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="total_in_dollar"
                                   class="col-sm-2 control-label"><?= t('សរុបគិតជាដុល្លារ') ?></label>
                            <div class=" col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="total_in_dollar" name="total_in_dollar"
                                           placeholder="" data-toggle="tooltip" data-placement="top"
                                           title="សរុបគិតជាដុល្លារ ($)" maxlength="255" closekey
                                           value="<?= set_value('total_in_dollar', isset($row_s->total_in_dollar) ? $row_s->total_in_dollar : '') ?>"/>
                                    <span class="input-group-addon">$</span>
                                </div>
                            </div>
                        </div>
                        <!-- </fieldset> -->
                </div>
                <!-- </div> -->
                <!-- degree ------------------------>
                <div id="tabs-4" style="padding-left: 0.600;  padding-right: 0.600;">
                    <!-- <fieldset id="grade_dis"> -->
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="1" ​ class="table table-striped table-bordered"
                               id="tbl_degree">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                    <th style="text-align: center;"><?= t('កម្រិត') ?></th>
                                    <th style="text-align: center;width: 10%;"><?= t('វគ្គឫកម្រិតសិក្សា') ?></th>
                                    <th style="text-align: center;"><?= t('គ្រឹះស្ថានសិក្សា') ?></th>
                                    <th style="text-align: center;"><?= t('ទីកន្លែងសិក្សា') ?></th>
                                    <th style="text-align: center;"><?= t('សញ្ញាបត្រឫជំនាញ') ?></th>
                                    <th style="text-align: center;"><?= t('ឆ្នាំចូលសិក្សា') ?></th>
                                    <th style="text-align: center;"><?= t('ឆ្នាំបញ្ចប់សិក្សា') ?></th>
                                    <th style="text-align: center;"><?= t('ប្រទេស') ?></th>
                                    <th style="text-align: center;width: 8%;"><a href="javascript:void(0)"
                                                                                 data-toggle="tooltip"
                                                                                 data-placement="top"
                                                                                 title="បន្ថែមកម្រិតវប្បធម៌"
                                                                                 id="lbl_addrow_degree"><img
                                                src="<?= base_url('assets/bs/css/images/add.png') ?>"/> បន្ថែម​</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($id - 0 == 0) {
                                    ?>
                                    <tr>
                                        <td class="d_no" style="text-align: center;" class="auto_id">1</td>
                                        <td><input type="text" class="form-control degree_level" id="degree_level"
                                                   name="degree_level[]" placeholder="" data-toggle="tooltip"
                                                   data-placement="top" title="បំពេញកម្រិត" maxlength="255"/></td>
                                        <td><input type="text" class="form-control " id="level" name="level[]"
                                                   placeholder="" data-toggle="tooltip" data-placement="top"
                                                   title="បំពេញវគ្គឫកម្រិតសិក្សា" maxlength="2" /></td>
                                        <td><input type="text" class="form-control school" id="school" name="school[]"
                                                   placeholder="" data-toggle="tooltip" data-placement="top"
                                                   title="បំពេញគ្រឹះស្ថានសិក្សា" maxlength="255"/></td>
                                        <td><input type="text" class="form-control study_place" id="study_place"
                                                   name="study_place[]" placeholder="" data-toggle="tooltip"
                                                   data-placement="top" title="បំពេញទីកន្លែងសិក្សា" maxlength="255"/></td>
                                        <td><input type="text" class="form-control skill" id="skill" name="skill[]"
                                                   placeholder="" data-toggle="tooltip" data-placement="top"
                                                   title="បំពេញសញ្ញាបត្រឫជំនាញ" maxlength="255"/></td>
                                        <td><input type="text" class="form-control " id="study_date"
                                                   name="study_date[]" placeholder="ឆ្នាំ" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="បំពេញឆ្នាំសិក្សា" maxlength="255"/></td>
                                        <td><input type="text" class="form-control" id="end_date"
                                                   name="end_date[]" placeholder="ឆ្នាំ" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="បំពេញឆ្នាំបញ្ចប់" maxlength="255" /></td>
                                        <td><input type="text" class="form-control country" id="country" name="country[]"
                                                   placeholder="" data-toggle="tooltip" data-placement="top"
                                                   title="បំពេញប្រទេស"
                                                   maxlength="255"/></td>
                                        <!--<td style="text-align: center;"><a href="javascript: void(0)" id="">លុប</a></td>-->
                                        <td style="text-align: center;"><a href="javascript:void(0)" data-degree_ids=""
                                                                           class="degree_ids" id="degree_ids">លុប</a><input
                                                                           type="hidden" name="degree_id[]" id="degree_id"/></td>
                                    </tr>
                                    <?php
                                } else {
                                    $qr_degree = query("SELECT
                                                                            *
                                                                    FROM
                                                                            degree AS d
                                                                    WHERE
                                                                            d.id = '{$id}'
                                                                    ORDER BY
                                                                            d.end_date ");
                                    if ($qr_degree->num_rows() > 0) {
                                        $i = 1;
                                        foreach ($qr_degree->result() as $rows) {
                                            echo '<tr>
                                                <td class="d_no" style="text-align: center;" class="auto_id">' . $i . '</td>
                                                <td><input type="text" class="form-control degree_level" id="degree_level" name="degree_level[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញកម្រិត" maxlength="255" value="' . $rows->degree_level . '" /></td>
                                                <td><input type="text" class="form-control level" id="level" name="level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញវគ្គឫកម្រិតសិក្សា" maxlength="2" number  value="' . $rows->level . '" /></td>
                                                <td><input type="text" class="form-control school" id="school" name="school[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញគ្រឹះស្ថានសិក្សា" maxlength="255"  value="' . $rows->school . '" /></td>
                                                <td><input type="text" class="form-control study_place" id="study_place" name="study_place[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញទីកន្លែងសិក្សា" maxlength="255"  value="' . $rows->study_place . '" /></td>
                                                <td><input type="text" class="form-control skill" id="skill" name="skill[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញសញ្ញាបត្រឫជំនាញ" maxlength="255"  value="' . $rows->skill . '" /></td>
                                                <td><input type="text" class="form-control study" id="study_date' . $i . ' " name="study_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញឆ្នាំសិក្សា" maxlength="255"   value="' . $rows->study_date  . '" /></td>
                                                <td><input type="text" class="form-control end" id="end_date' . $i . ' " name="end_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញឆ្នាំបញ្ចប់" maxlength="255"  value="' .  $rows->end_date  . '" /></td>
                                                <td><input type="text" class="form-control country" id="country" name="country[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញប្រទេស" maxlength="255"  value="' . $rows->country . '" /></td>
                                                <td style="text-align: center;"><a href="javascript:void(0)" data-degree_ids= "' . $rows->degree_id . '" class="degree_ids" id="degree_ids">លុប</a><input type="hidden" name="degree_id[]" id="degree_id" value="' . $rows->degree_id . '" /></td>
                                            </tr>';
                                            $i++;
                                        }
                                    } else {
                                        echo '<tr>
                                                <td class="d_no" style="text-align: center;" class="auto_id">1</td>
                                                <td><input type="text" class="form-control" id="degree_level" name="degree_level[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញកម្រិត" maxlength="255" /></td>
                                                <td><input type="text" class="form-control" id="level" name="level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញវគ្គឫកម្រិតសិក្សា" maxlength="2" number /></td>
                                                <td><input type="text" class="form-control" id="school" name="school[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញគ្រឹះស្ថានសិក្សា" maxlength="255" /></td>
                                                <td><input type="text" class="form-control" id="study_place" name="study_place[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញទីកន្លែងសិក្សា" maxlength="255" /></td>
                                                <td><input type="text" class="form-control" id="skill" name="skill[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញសញ្ញាបត្រឫជំនាញ" maxlength="255" /></td>
                                                <td><input type="text" class="form-control study" id="study_date" name="study_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញឆ្នាំសិក្សា"  maxlength="255" /></td>
                                                <td><input type="text" class="form-control " id="end_date" name="end_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញឆ្នាំបញ្ចប់"  maxlength="255" /></td>
                                                <td><input type="text" class="form-control" id="country" name="country[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញប្រទេស" maxlength="255" /></td>
                                                <td style="text-align: center;"><a href="javascript:void(0)" data-degree_ids="" class="degree_ids" id="degree_ids">លុប</a><input type="hidden" name="degree_id[]" id="degree_id"  /></td>
                                            </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                    <!-- </fieldset> -->
                </div>

                <!-- training ------------------>
                <div id="tabs-5" style="padding-left: 0.6px;  padding-right: 0.6px;">
                    <!-- <fieldset id="course_dis"> -->
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="1" ​ class="table table-striped table-bordered"
                               id="tbl_train">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                    <th style="text-align: center;"><?= t('វគ្គឫកម្រិត<br />សិក្សា') ?></th>
                                    <th style="text-align: center;"><?= t('គ្រឹះស្ថាន<br />សិក្សា') ?></th>
                                    <th style="text-align: center;"><?= t('ទីកន្លែង<br />សិក្សា') ?></th>
                                    <th style="text-align: center;"><?= t('សញ្ញាប័ត្រ<br />ឫជំនាញ') ?></th>
                                    <th style="text-align: center;"><?= t('ថ្ងៃ ខែ ឆ្នាំចូលសិក្សា') ?></th>
                                    <th style="text-align: center;"><?= t('ថ្ងៃ ខែ ឆ្នាំបញ្ចប់សិក្សា') ?></th>
                                    <th style="text-align: center;"><?= t('ប្រភេទ') ?></th>
                                    <th style="text-align: center;"><?= t('មុខវិជ្ជាសិក្សា<br />ឫប្រធានបទ') ?></th>
                                    <th style="text-align: center; width: 110px;"><a href="javascript: void(0)"
                                                                                     data-toggle="tooltip"
                                                                                     data-placement="top"
                                                                                     title="បន្ថែមការបណ្តុះបណ្តាល"
                                                                                     id="lbl_addrow_train"><img
                                                src="<?= base_url('assets/bs/css/images/add.png') ?>"/> បន្ថែម​</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($id - 0 == 0) {
                                    ?>
                                    <tr>
                                        <td class="t_no" style="text-align: center;" class="auto_id">1</td>
                                        <td><input style="width: 110px;" type="text" class="form-control tooltip-demo"
                                                   id="level_train" name="level_train[]" placeholder=""
                                                   data-toggle="tooltip"
                                                   data-placement="top" title="បំពេញវគ្គឫកម្រិតសិក្សា" maxlength="255"/>
                                        </td>
                                        <td><input style="width: 110px;" type="text" class="form-control" id="school_train"
                                                   name="school_train[]" placeholder="" data-toggle="tooltip"
                                                   data-placement="top" title="បំពេញគ្រឹះស្ថានសិក្សា" maxlength="255"/></td>
                                        <td><input style="width: 110px;" type="text" class="form-control" id="place_train"
                                                   name="place_train[]" placeholder="" data-toggle="tooltip"
                                                   data-placement="top" title="បំពេញទីកន្លែងសិក្សា" maxlength="255"/></td>
                                        <td><input style="width: 110px;" type="text" class="form-control" id="skill_train"
                                                   name="skill_train[]" placeholder="" data-toggle="tooltip"
                                                   data-placement="top" title="បំពេញសញ្ញាប័ត្រឫជំនាញ" maxlength="255"/></td>
                                        <td><input style="width: 110px;" type="text" class="form-control"
                                                   id="start_date_train" name="start_date_train[]"
                                                   placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                                                   data-toggle="tooltip" data-placement="top"
                                                   title="បំពេញថ្ងៃ ខែ ឆ្នាំចូលសិក្សា"
                                                   maxlength="255"/></td>
                                        <td><input style="width: 110px;" type="text" class="form-control"
                                                   id="stop_date_train" name="stop_date_train[]"
                                                   placeholder="ថ្ងៃ-ខែ-ឆ្នាំ"
                                                   data-toggle="tooltip" data-placement="top"
                                                   title="បំពេញថ្ងៃ ខែ ឆ្នាំបញ្ចប់សិក្សា"  maxlength="255"/></td>
                                        <td><input style="width: 100px;" type="text" class="form-control" id="type_train"
                                                   name="type_train[]" placeholder="" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="បំពេញប្រភេទ" maxlength="255"/></td>
                                        <td><input style="width: 100px;" type="text" class="form-control"
                                                   id="subject_course"
                                                   name="subject_course[]" placeholder="" data-toggle="tooltip"
                                                   data-placement="top" title="បំពេញមុខវិជ្ជាសិក្សាឫប្រធានបទ"
                                                   maxlength="255"/>
                                        </td>
                                        <!--<td style="text-align: center;"><a href="javascript: void(0)" data-train_id="" class="train_id" id="train_id">លុប</a></td>-->
                                        <td style="text-align: center;"><a href="javascript:void(0)" data-train_ids=""
                                                                           class="train_ids" id="train_ids">លុប</a><input
                                                                           type="hidden" name="train_id[]" id="train_id"/></td>
                                    </tr>
                                    <?php
                                } else {
                                    $qr_train = query("SELECT
                                                                                *
                                                                        FROM
                                                                                training AS t
                                                                        WHERE
                                                                                t.id = '{$id}'
                                                                        ORDER BY
                                                                                t.level_train ASC ");
                                    if ($qr_train->num_rows() > 0) {
                                        $i = 1;
                                        foreach ($qr_train->result() as $rows) {
                                            echo '<tr>
                                                        <td class="t_no" style="text-align: center;" class="auto_id">' . $i . '</td>
                                                        <td><input style="width: 110px;" type="text" class="form-control" id="level_train" name="level_train[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញវគ្គឫកម្រិតសិក្សា" maxlength="255" value="' . $rows->level_train . '" /></td>
                                                        <td><input style="width: 110px;" type="text" class="form-control" id="school_train" name="school_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញគ្រឹះស្ថានសិក្សា" maxlength="255" value="' . $rows->school_train . '" /></td>
                                                        <td><input style="width: 110px;" type="text" class="form-control" id="place_train" name="place_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញទីកន្លែងសិក្សា" maxlength="255" value="' . $rows->place_train . '" /></td>
                                                        <td><input style="width: 110px;" type="text" class="form-control" id="skill_train" name="skill_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញសញ្ញាប័ត្រឫជំនាញ" maxlength="255" value="' . $rows->skill_train . '" /></td>';
                                                        
                                                         if       ($rows->start_date_train=== NULL){ 
                                            echo'               <td><input style="width: 110px;" type="text" class="form-control" id="start_date_train' . $i . ' " name="start_date_train[]" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃ ខែ ឆ្នាំចូលសិក្សា"  maxlength="255"  /></td>';
                                        }else{      
                                            echo'               <td><input style="width: 110px;" type="text" class="form-control" id="start_date_train' . $i . ' " name="start_date_train[]" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃ ខែ ឆ្នាំចូលសិក្សា"  maxlength="255" value="' .date('d-m-Y', strtotime( $rows->start_date_train))  . '" /></td>';
                                        }        

                                           if       ($rows->stop_date_train=== NULL){ 
                                            echo'               <td><input style="width: 110px;" type="text" class="form-control" id="stop_date_train' . $i . ' " name="stop_date_train[]" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃ ខែ ឆ្នាំបញ្ចប់សិក្សា"  maxlength="255"  /></td>';
                                        }else{      
                                            echo'               <td><input style="width: 110px;" type="text" class="form-control" id="stop_date_train' . $i . ' " name="stop_date_train[]" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃ ខែ ឆ្នាំបញ្ចប់សិក្សា"  maxlength="255" value="' . date('d-m-Y', strtotime($rows->stop_date_train)) . '" /></td>';
                                        }        
                                                  echo'    
                                                        
                                                        <td><input style="width: 100px;" type="text" class="form-control" id="type_train" name="type_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញប្រភេទ" maxlength="255" value="' . $rows->type_train . '" /></td>
                                                        <td><input style="width: 100px;" type="text" class="form-control" id="subject_course" name="subject_course[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញមុខវិជ្ជាសិក្សាឫប្រធានបទ" maxlength="255" value="' . $rows->subject_course . '"  /></td>
                                                        <td style="text-align: center;"><a href="javascript:void(0)" data-train_ids="' . $rows->train_id . '" class="train_ids" id="train_ids">លុប</a><input type="hidden" name="train_id[]" id="train_id" value="' . $rows->train_id . '" /></td>
                                                    </tr>';
                                            $i++;
                                        }
                                    } else {
                                        echo '<tr>
                                    <td class="t_no" style="text-align: center;" class="auto_id">1</td>
                                    <td><input style="width: 110px;" type="text" class="form-control" id="level_train" name="level_train[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញវគ្គឫកម្រិតសិក្សា" maxlength="255" /></td>
                                    <td><input style="width: 110px;" type="text" class="form-control" id="school_train" name="school_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញគ្រឹះស្ថានសិក្សា" maxlength="255" /></td>
                                    <td><input style="width: 110px;" type="text" class="form-control" id="place_train" name="place_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញទីកន្លែងសិក្សា" maxlength="255" /></td>
                                    <td><input style="width: 110px;" type="text" class="form-control" id="skill_train" name="skill_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញសញ្ញាប័ត្រឫជំនាញ" maxlength="255" /></td>
                                    <td><input style="width: 110px;" type="text" class="form-control" id="start_date_train1" name="start_date_train[]" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃ ខែ ឆ្នាំចូលសិក្សា"  maxlength="255" /></td>
                                    <td><input style="width: 110px;" type="text" class="form-contro" id="stop_date_train1" name="stop_date_train[]" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃ ខែ ឆ្នាំបញ្ចប់សិក្សា"  maxlength="255" /></td>
                                    <td><input style="width: 100px;" type="text" class="form-control" id="type_train" name="type_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញប្រភេទ" maxlength="255" /></td>
                                    <td><input style="width: 100px;" type="text" class="form-control" id="subject_course" name="subject_course[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញមុខវិជ្ជាសិក្សាឫប្រធានបទ" maxlength="255" /></td>
                                    <td style="text-align: center;"><a href="javascript:void(0)" data-train_ids="" class="train_ids" id="train_ids">លុប</a><input type="hidden" name="train_id[]" id="train_id" /></td>
                                </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                    <!-- </fieldset> -->
                </div>

                <!-- Language ---------------------->
                <div id="tabs-6">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="1" ​ class="table table-striped table-bordered"
                               id="tbl_language">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                    <th style="text-align: center;"><?= t('ភាសាបរទេស') ?></th>
                                    <th style="text-align: center;"><?= t('ការអាន') ?></th>
                                    <th style="text-align: center;"><?= t('ការសន្ទនា') ?></th>
                                    <th style="text-align: center;"><?= t('ការសរសេរ') ?></th>
                                    <th style="text-align: center; width: 110px;"><a href="javascript: void(0)"
                                                                                     data-toggle="tooltip"
                                                                                     data-placement="top"
                                                                                     title="បន្ថែមភាសាបរទេស"
                                                                                     id="lbl_addrow_language"/><img
                                                                                     src="<?= base_url('assets/bs/css/images/add.png') ?>"/>បន្ថែម​</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($id - 0 == 0) {
                                    ?>
                                    <tr>
                                        <td class="l_no" style="text-align: center;" class="auto_id">1</td>
                                        <td><input type="text" class="form-control" id="language" name="language[]"
                                                   placeholder="" data-toggle="tooltip" data-placement="top"
                                                   title="បំពេញភាសាបរទេស" maxlength="255"/></td>
                                        <td><input type="text" class="form-control" id="read" name="read[]" placeholder=""
                                                   data-toggle="tooltip" data-placement="top" title="បំពេញការអាន"
                                                   maxlength="255"/></td>
                                        <td><input type="text" class="form-control" id="conversation" name="conversation[]"
                                                   placeholder="" data-toggle="tooltip" data-placement="top"
                                                   title="បំពេញការសន្ទនា" maxlength="255"/></td>
                                        <td><input type="text" class="form-control" id="write" name="write[]" placeholder=""
                                                   data-toggle="tooltip" data-placement="top" title="បំពេញការសរសេរ"
                                                   maxlength="255"/></td>
                                        <!--<td style="text-align: center;"><a href="javascript: void(0)"  data-language_id="" class="language_id" id="language_id">លុប</a></td>-->
                                        <td style="text-align: center;"><a href="javascript:void(0)" data-language_ids=""
                                                                           class="language_ids"
                                                                           id="language_ids">លុប</a><input
                                                                           type="hidden" name="language_id[]" id="language_id"/></td>
                                    </tr>
                                    <?php
                                } else {
                                    $qr_language = query("SELECT
                                                                                    *
                                                                            FROM
                                                                                    language AS l
                                                                            WHERE
                                                                                    l.id = '{$id}'
                                                                            ORDER BY
                                                                                    l.read ASC ");
                                    if ($qr_language->num_rows() > 0) {
                                        $i = 1;
                                        foreach ($qr_language->result() as $rows) {
                                            echo '<tr>
                                                        <td class="l_no" style="text-align: center;" class="auto_id">' . $i . '</td>
                                                        <td><input type="text" class="form-control" id="language" name="language[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញភាសាបរទេស" maxlength="255" value="' . $rows->language . '" /></td>
                                                        <td><input type="text" class="form-control" id="read" name="read[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការអាន" maxlength="255" value="' . $rows->read . '" /></td>
                                                        <td><input type="text" class="form-control" id="conversation" name="conversation[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការសន្ទនា" maxlength="255" value="' . $rows->conversation . '" /></td>
                                                        <td><input type="text" class="form-control" id="write" name="write[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការសរសេរ" maxlength="255" value="' . $rows->write . '" /></td>
                                                        <td style="text-align: center;"><a href="javascript:void(0)" data-language_ids = "' . $rows->language_id . '" class="language_ids" id="language_ids">លុប</a><input type="hidden" name="language_id[]" id="language_id" value="' . $rows->language_id . '" /></td>
                                                    </tr>';
                                            $i++;
                                        }
                                    } else {
                                        echo '<tr>
                                                    <td class="l_no" style="text-align: center;" class="auto_id">1</td>
                                                    <td><input type="text" class="form-control" id="language" name="language[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញភាសាបរទេស" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control" id="read" name="read[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការអាន" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control" id="conversation" name="conversation[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការសន្ទនា" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control" id="write" name="write[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការសរសេរ" maxlength="255" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-language_ids = "" class="language_ids" id="language_ids">លុប</a><input type="hidden" name="language_id[]" id="language_id" /></td>
                                                </tr> ';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- medal ------------------------>
                <div id="tabs-7">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="1" ​ class="table table-striped table-bordered"
                               id="tbl_medal">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                    <th style="text-align: center;"><?= t('ប្រភេទ') ?></th>
                                    <th style="text-align: center;"><?= t('ថ្នាក់') ?></th>
                                    <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំទទួល') ?></th>
                                    <th style="text-align: center; width: 110px;"><a href="javascript:void(0)"
                                                                                     data-toggle="tooltip"
                                                                                     data-placement="top"
                                                                                     title="បន្ថែមគ្រឿងឥស្សរិយស"
                                                                                     id="lbl_addrow_medal"><img
                                                src="<?= base_url('assets/bs/css/images/add.png') ?>"/> បន្ថែម​...</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($id - 0 == 0) {
                                    ?>
                                    <tr>
                                        <td class="m_no" style="text-align: center;" class="auto_id">1</td>
                                        <td><input type="text" class="form-control medal_type" id="medal_type"
                                                   name="medal_type[]" placeholder="" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="បំពេញប្រភេទ" maxlength="255"/></td>
                                        <td><input type="text" class="form-control class" id="class" name="class[]"
                                                   placeholder="" data-toggle="tooltip" data-placement="top"
                                                   title="បំពេញថ្នាក់"
                                                   maxlength="255"/></td>
                                        <td><input type="text" class="form-control " id="get_date1"
                                                   name="get_date[]" placeholder="ថ្ងៃ-ខែ-ឆ្នាំ" data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="បំពេញថ្ងៃខែឆ្នាំទទួល" maxlength="255"/></td>
                                        <td style="text-align: center;"><a href="javascript: void(0)" data-medal_ids=""
                                                                           class="medal_ids" id="medal_ids">លុប</a><input
                                                                           type="hidden" name="medal_id[]" id="medal_id"/></td>
                                    </tr>
                                    <?php
                                } else {
                                    $qr_medal = query("SELECT
                                                                            *
                                                                    FROM
                                                                            medal AS m
                                                                    WHERE
                                                                            m.id = '{$id}'
                                                                    ORDER BY
                                                                            m.get_date ASC ");
                                    if ($qr_medal->num_rows() > 0) {
                                        $i = 1;
                                        foreach ($qr_medal->result() as $rows) {
                                            echo '<tr>
                                                        <td class="m_no" style="text-align: center;" class="auto_id">' . $i . '</td>
                                                        <td><input type="text" class="form-control medal_type" id="medal_type" name="medal_type[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញប្រភេទ" maxlength="255" value="' . $rows->medal_type . '" /></td>
                                                        <td><input type="text" class="form-control class" id="class" name="class[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្នាក់" maxlength="255" value="' . $rows->class . '" /></td>';
                                        if       ($rows->get_date === NULL){ 
                                            echo'            <td><input type="text" class="form-control " id="get_date' . $i . ' " name="get_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំទទួល" maxlength="255"   /></td>';
                                        }else{      
                                            echo'            <td><input type="text" class="form-control " id="get_date' . $i . ' " name="get_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំទទួល" maxlength="255"  value="' . date('d-m-Y', strtotime($rows->get_date)) . '" /></td>';
                                        }
                                            echo'            <td style="text-align: center;"><a href="javascript: void(0)"  data-medal_ids="' . $rows->medal_id . '" class="medal_ids" id="medal_ids">លុប</a><input type="hidden" name="medal_id[]" id="medal_id" value="' . $rows->medal_id . '" /></td>
                                                    </tr>';
                                            $i++;
                                        }
                                    } else {
                                        echo '<tr>
                                                    <td class="m_no" style="text-align: center;" class="auto_id">1</td>
                                                    <td><input type="text" class="form-control medal_type" id="medal_type" name="medal_type[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញប្រភេទ" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control class" id="class" name="class[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្នាក់" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control " id="get_date1" name="get_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំទទួល" maxlength="255"  /></td>
                                                    <td style="text-align: center;"><a href="javascript: void(0)"  data-medal_ids="" class="medal_ids" id="medal_ids">លុប</a><input type="hidden" name="medal_id[]" id="medal_id" /></td>
                                                </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--reference-->
                <!--  <div id="tabs-8">
                     <table cellpadding="0" cellspacing="0" border="1"​ class="table table-striped table-bordered" id="tbl_absent" >
                         <thead>
                             <tr>
                                 <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                  <th style="text-align: center;"><?= t('ឈ្មោះលិខិត') ?></th>
                                 
                                 <th style="text-align: center; width: 110px;"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="បន្ថែមអវត្តមាន" id ="lbl_addrow_absent"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /> បន្ថែម​...</a></th>
                             </tr>
                         </thead>
                         <tbody>
                <?php if ($id - 0 == 0) { ?>
                    <?php
                } else {
                    $qr_absent = query("SELECT
                                                                            a.absentid,
                                                                            a.id,
                                                                            a.startdate,
                                                                            a.enddate,
                                                                            a.reason,
                                                                            a.numberofday
                                                                            FROM
                                                                                    absent AS a
                                                                            WHERE
                                                                                    a.id = '$id'
                                                                            ORDER BY
                                                                                    a.startdate ASC ");
                    if ($qr_absent->num_rows() > 0) {
                        $i = 1;
                        foreach ($qr_absent->result() as $rows) {
//                                        $startdate = $rows->startdate;
//                                        $enddate = $rows->enddate;
//
//                                        $diff = abs(strtotime($enddate) - strtotime($startdate));
//
//                                        $years = floor($diff / (365*60*60*24));
//                                        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
//                                        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                            echo '<tr>
                                                        <td class="a_no" style="text-align: center;" class="auto_id">' . $i . '</td>
                                                        <td><input type="text" class="form-control  startdate" id="startdate' . $i . '" name="startdate[]" placeholder="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម"  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម"  maxlength="255" value="' . ($rows->startdate != "00-00-0000" ? $rows->startdate : "") . '" /></td>
                                                        <td><input type="text" class="form-control  enddate" id="enddate' . $i . '" name="enddate[]" placeholder="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" value="' . ($rows->enddate != "00-00-0000" ? $rows->enddate : "") . '" /></td>
                                                        <td><input type="text" class="form-control numberofday" id="numberofday' . $i . '" name="numberofday[]" placeholder="ចំនួនថ្ងៃ" data-toggle="tooltip" data-placement="top" title="ចំនួនថ្ងៃ" maxlength="11" closekey value="' . $rows->numberofday . '" /></td>
                                                        <td><input type="text" class="form-control reason" id="reason" name="reason[]" placeholder="បំពេញមូលហេតុ" data-toggle="tooltip" data-placement="top" title="បំពេញមូលហេតុ" maxlength="255" value="' . $rows->reason . '" /></td>
                                                        <td style="text-align: center;"><a href="javascript: void(0)"  data-absentids="' . $rows->absentid . '" class="absentids" id="absentids">លុប</a><input type="hidden" name="absentid[]" id="absentid" value="' . $rows->absentid . '"  /></td>
                                                    </tr>';
                            $i++;
                        }
                    } else {
                        echo ' <tr>
                                                    <td class="a_no" style="text-align: center;" class="auto_id">1</td>
                                                    <td><input type="text" class="form-control  startdate" id="startdate1" name="startdate[]" placeholder="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម"  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control  enddate" id="enddate1" name="enddate[]" placeholder="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control numberofday" id="numberofday1" name="numberofday[]" placeholder="ចំនួនថ្ងៃ" data-toggle="tooltip" data-placement="top" title="ចំនួនថ្ងៃ" maxlength="11" closekey /></td>
                                                    <td><input type="text" class="form-control reason" id="reason" name="reason[]" placeholder="បំពេញមូលហេតុ" data-toggle="tooltip" data-placement="top" title="បំពេញមូលហេតុ" maxlength="255" /></td>
                                                    <td style="text-align: center;"><a href="javascript: void(0)"  data-absentids="" class="absentids" id="absentids">លុប</a><input type="hidden" name="absentid[]" id="absentid" /></td>
                                                </tr>';
                    }
                }
                ?>
                         </tbody>
                     </table>
                 </div>  -->
                <!--end references-->
                <!-- absent ------------------------->
                <!--                 <div id="tabs-8">
                                    <table cellpadding="0" cellspacing="0" border="1"​ class="table table-striped table-bordered" id="tbl_absent" >
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំចាប់ផ្តើម') ?></th>
                                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំបញ្ចប់') ?></th>
                                                <th style="text-align: center;"><?= t('ចំនួនថ្ងៃ') ?></th>
                                                <th style="text-align: center;"><?= t('មូលហេតុ') ?></th>
                                                <th style="text-align: center; width: 110px;"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="បន្ថែមអវត្តមាន" id ="lbl_addrow_absent"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /> បន្ថែម​...</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                <?php if ($id - 0 == 0) { ?>
                    <?php
                } else {
                    $qr_absent = query("SELECT
                                                                            a.absentid,
                                                                            a.id,
                                                                            a.startdate,
                                                                            a.enddate,
                                                                            a.reason,
                                                                            a.numberofday
                                                                            FROM
                                                                                    absent AS a
                                                                            WHERE
                                                                                    a.id = '$id'
                                                                            ORDER BY
                                                                                    a.startdate ASC ");
                    if ($qr_absent->num_rows() > 0) {
                        $i = 1;
                        foreach ($qr_absent->result() as $rows) {
//                                        $startdate = $rows->startdate;
//                                        $enddate = $rows->enddate;
//
//                                        $diff = abs(strtotime($enddate) - strtotime($startdate));
//
//                                        $years = floor($diff / (365*60*60*24));
//                                        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
//                                        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                            echo '<tr>
                                                        <td class="a_no" style="text-align: center;" class="auto_id">' . $i . '</td>
                                                        <td><input type="text" class="form-control  startdate" id="startdate' . $i . '" name="startdate[]" placeholder="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម"  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" value="' . ($rows->startdate != "00-00-0000" ? $rows->startdate : "") . '" /></td>
                                                        <td><input type="text" class="form-control  enddate" id="enddate' . $i . '" name="enddate[]" placeholder="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" value="' . ($rows->enddate != "00-00-0000" ? $rows->enddate : "") . '" /></td>
                                                        <td><input type="text" class="form-control numberofday" id="numberofday' . $i . '" name="numberofday[]" placeholder="ចំនួនថ្ងៃ" data-toggle="tooltip" data-placement="top" title="ចំនួនថ្ងៃ" maxlength="11" closekey value="' . $rows->numberofday . '" /></td>
                                                        <td><input type="text" class="form-control reason" id="reason" name="reason[]" placeholder="បំពេញមូលហេតុ" data-toggle="tooltip" data-placement="top" title="បំពេញមូលហេតុ" maxlength="255" value="' . $rows->reason . '" /></td>
                                                        <td style="text-align: center;"><a href="javascript: void(0)"  data-absentids="' . $rows->absentid . '" class="absentids" id="absentids">លុប</a><input type="hidden" name="absentid[]" id="absentid" value="' . $rows->absentid . '"  /></td>
                                                    </tr>';
                            $i++;
                        }
                    } else {
                        echo ' <tr>
                                                    <td class="a_no" style="text-align: center;" class="auto_id">1</td>
                                                    <td><input type="text" class="form-control  startdate" id="startdate1" name="startdate[]" placeholder="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម"  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control  enddate" id="enddate1" name="enddate[]" placeholder="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control numberofday" id="numberofday1" name="numberofday[]" placeholder="ចំនួនថ្ងៃ" data-toggle="tooltip" data-placement="top" title="ចំនួនថ្ងៃ" maxlength="11" closekey /></td>
                                                    <td><input type="text" class="form-control reason" id="reason" name="reason[]" placeholder="បំពេញមូលហេតុ" data-toggle="tooltip" data-placement="top" title="បំពេញមូលហេតុ" maxlength="255" /></td>
                                                    <td style="text-align: center;"><a href="javascript: void(0)"  data-absentids="" class="absentids" id="absentids">លុប</a><input type="hidden" name="absentid[]" id="absentid" /></td>
                                                </tr>';
                    }
                }
                ?>
                                        </tbody>
                                    </table>
                                </div> -->
            </div><!-- tabs ------------------->
        </div><!-- f. body ------------------>
        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group-lg">
               <!--<button  class="btn btn-default  " id="btnpdf" type="submit"><?= t('PDF') ?> <i class="fa fa-file-pdf-o" aria-hidden="true"></i></button>-->
                <button class="btn btn-default" id="btnreport" type="button"><?= t('ប្រវត្តិរូប') ?> <i
                        class="fa fa-print" aria-hidden="true"></i></button>
                <button class="btn btn-default" id="btnsave" type="submit"><?= t('រក្សាទុក') ?> <i
                        class="fa fa-floppy-o" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-default" id="back"><i class="fa fa-arrow-left fa-1x"
                                                                           aria-hidden="true"></i></button> 
            </div>
        </div>
    </div>
</form>
<form action="<?= site_url('csv/csv_info/pdf') ?>" method="post" role="form" >
    <input type="hidden" name="id_pdf" id="id_pdf" class="id_pdf" value="<?= $id ?>"/>
    <button style=" position: relative;  top: -80px;  left: 200px; font-size: 19px;"
            class="btn btn-default  " id="btnpdf" type="submit"><?= t('PDF') ?> <i class="fa fa-file-pdf-o"
                                                                                 aria-hidden="true"></i>
    </button>
</form>
<!--=======================================Work history=============================-->
<form class="form-horizontal" role="form" method="post" id="wh_save">
    <div class="modal fade" id="workhistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" style="width: 1100px;">
            <div class="modal-content">
                <div class="modal-header"
                     style="background-image: linear-gradient(to bottom,#f5f5f5 0,#ccc 100%); background-repeat: repeat-x;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">ប្រវត្តិការងារ</h4>
                    <input type="hidden" name="id_wh" id="id_wh" class="id_wh" value="<?= $id ?>"/>
                </div>
                <div class="modal-body">
                    <table cellpadding="0" cellspacing="0" border="1" ​ class="table table-striped table-bordered"
                           id="tbl_workhistory">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំផ្តើម') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំបញ្ចប់') ?></th>
                                <th style="text-align: center;"><?= t('ក្រសួង ឫស្ថាប័ន') ?></th>
                                <th style="text-align: center;"><?= t('នយដ ឫអង្គភាព') ?></th>
                                <th style="text-align: center;"><?= t('ការិយាល័យ') ?></th>
                                <th style="text-align: center;"><?= t('មុខតំណែង') ?></th>
                                <th style="text-align: center;width: 110px;"><a href="javascript:void(0)"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title="បន្ថែមប្រវត្តិការងារ"
                                                                                id="lbl_addrow_workhistory"><img
                                            src="<?= base_url('assets/bs/css/images/add.png') ?>"/> បន្ថែម​...</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($id - 0 == 0) {
                                ?>
                                <tr>
                                    <td class="wh_no" style="text-align: center;" class="auto_id">1</td>
                                    <td><input type="text" class="form-control" id="start_date" name="start_date[]"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញថ្ងៃខែឆ្នាំផ្តើម" maxlength="255"/></td>
                                    <td><input type="text" class="form-control" id="stop_date" name="stop_date[]"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255"/></td>
                                    <td><input type="text" class="form-control institution" id="institution"
                                               name="institution[]" placeholder="" data-toggle="tooltip"
                                               data-placement="top" title="បំពេញក្រសួង ឫស្ថាប័ន" maxlength="255"/></td>
                                    <td><input type="text" class="form-control department" id="department"
                                               name="department[]" placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញនាយកដ្ឋានឫអង្គភាព" maxlength="255"/></td>
                                    <td><input type="text" class="form-control officel" id="office" name="office[]"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញការិយាល័យ" maxlength="255"/></td>
                                    <td><input type="text" class="form-control position" id="position" name="position[]"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញមុខតំណែង" maxlength="255"/></td>
                                    <td style="text-align: center;"><a href="javascript:void(0)" data-work_history_ids=""
                                                                       class="work_history_ids"
                                                                       id="work_history_ids">លុប</a><input type="hidden"
                                                                       name="work_history_id[]"
                                                                       id="work_history_id"/>
                                    </td>
                                </tr>
                                <?php
                            } else {
                                $qr_w_history = query("SELECT
                                                                                        *
                                                                                FROM
                                                                                        workhistory AS wh
                                                                                WHERE
                                                                                        wh.id = '{$id}'
                                                                                ORDER BY
                                                                                        wh.institution");
                                if ($qr_w_history->num_rows() > 0) {
                                    $i = 1;
                                    foreach ($qr_w_history->result() as $rows) {
                                        echo '<tr>
                                                    <td class="wh_no" style="text-align: center;" class="auto_id">' . $i . '</td>
                                                    <td><input type="text" class="form-control" id="start_date ' . $i . '" name="start_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំផ្តើម" maxlength="255" value="' . (date('d-m-Y', strtotime($rows->start_date))) . '" /></td>
                                                    <td><input type="text" class="form-control" id="stop_date ' . $i . '" name="stop_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" value="' . (date('d-m-Y', strtotime( $rows->stop_date))) . '" /></td>
                                                    <td><input type="text" class="form-control institution" id="institution" name="institution[]" placeholder=" ឫស្ថាប័ន" data-toggle="tooltip" data-placement="top" title="បំពេញក្រសួង ឫស្ថាប័ន" maxlength="255" value="' . $rows->institution . '" /></td>
                                                    <td><input type="text" class="form-control department" id="department" name="department[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញនាយកដ្ឋានឫអង្គភាព" maxlength="255" value="' . $rows->department . '" /></td>
                                                    <td><input type="text" class="form-control officel" id="office" name="office[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការិយាល័យ" maxlength="255" value="' . $rows->office . '" /></td>
                                                    <td><input type="text" class="form-control position" id="position" name="position[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញមុខតំណែង" maxlength="255" value="' . $rows->position . '" /></td>
                                                   <td style="text-align: center;"><a href="javascript:void(0)" data-work_history_ids="' . $rows->work_history_id . '" class="work_history_ids" id="work_history_ids">លុប</a><input type="hidden" name="work_history_id[]" id="work_history_id" value="' . $rows->work_history_id . '"/></td>
                                                </tr>';
                                        $i++;
                                    }
                                } else {
                                    echo '<tr>
                                                    <td class="wh_no" style="text-align: center;" class="auto_id">1</td>
                                                    <td><input type="text" class="form-control" id="start_date" name="start_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំផ្តើម" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control" id="stop_date" name="stop_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control institution" id="institution" name="institution[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញក្រសួង ឫស្ថាប័ន" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control department" id="department" name="department[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញនាយកដ្ឋានឫអង្គភាព" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control officel" id="office" name="office[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការិយាល័យ" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control position" id="position" name="position[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញមុខតំណែង" maxlength="255" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-work_history_ids="" class="work_history_ids" id="work_history_ids" >លុប</a><input type="hidden" name="work_history_id[]" id="work_history_id" /></td>
                                                </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">រក្សាទុក</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">បិទ</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--=======================================Work by degree=============================================-->
<!-- <form class="form-horizontal" role="form" method="post" id="wbd_save">
    <div class="modal fade" id="workbydegree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1100px;" >
            <div class="modal-content">
                <div class="modal-header" style="background-image: linear-gradient(to bottom,#f5f5f5 0,#ccc 100%); background-repeat: repeat-x;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">ការដំឡើងថ្នាក់តាមសញ្ញាបត្រ</h4>
                    <input type="hidden" id="id_wbd" name="id_wbd" value="<?= $id ?>" />
                </div>
                <div class="modal-body">
                    <table cellpadding="0" cellspacing="0" border="1"​ class="table table-striped table-bordered" id="tbl_workbydegree">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                <th style="text-align: center;"><?= t('កាំប្រាក់ចាស់') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំ') ?></th>
                                <th style="text-align: center;"><?= t('កាំប្រាក់ថ្មី') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំ') ?></th>
                                <th style="text-align: center;width: 110px;"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="បន្ថែមការដំឡើងថ្នាក់តាមសញ្ញាបត្រ" id ="lbl_addrow_workbydegree"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /> បន្ថែម​...</a></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
if ($id - 0 == 0) {
    ?>
                                                                <tr>
                                                                            <td class="wbd_no" style="text-align: center;" class="auto_id">1</td>
                                                                            <td><input type="text" class="form-control old_level" id="old_level" name="old_level[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ចាស់" maxlength="255" /></td>
                                                                            <td><input type="text" class="form-control old_date datepick" id="old_date" name="old_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ"    maxlength="255" /></td>
                                                                            <td><input type="text" class="form-control new_level" id="new_level" name="new_level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ថ្មី" maxlength="255" /></td>
                                                                            <td><input type="text" class="form-control new_date datepick" id="new_date" name="new_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ"    maxlength="255" /></td>
                                                                            <td style="text-align: center;"><a href="javascript:void(0)" data-wkd_ids="" class="wkd_ids" id="wkd_ids" >លុប</a><input type="hidden" name="wkd_id[]" id="wkd_id" /></td>
                                                                        </tr>

                                                                    <tr>
                                                                        <td class="wbd_no" style="text-align: center;" class="auto_id">1</td>
                                                                        <td><input type="text" class="form-control old_level" id="old_level" name="old_level[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ចាស់" maxlength="255" /></td>
                                                                        <td><input type="text" class="form-control old_date datepick" id="old_date" name="old_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ"    maxlength="255" /></td>
                                                                        <td><input type="text" class="form-control new_level" id="new_level" name="new_level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ថ្មី" maxlength="255" /></td>
                                                                        <td><input type="text" class="form-control new_date datepick" id="new_date" name="new_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ"    maxlength="255" /></td>
                                                                        <td style="text-align: center;"><a href="javascript:void(0)" data-wkd_ids="" class="wkd_ids" id="wkd_ids" >លុប</a><input type="hidden" name="wkd_id[]" id="wkd_id" /></td>
                                                                    </tr>
    <?php
} else {
    $qr_workbydegree = query("SELECT
                                                                                        *
                                                                                FROM
                                                                                        workbydegree AS wbd
                                                                                WHERE
                                                                                        wbd.id = '{$id}'
                                                                                ORDER BY
                                                                                        wbd.new_level ");
    if ($qr_workbydegree->num_rows() > 0) {
        $i = 1;
        foreach ($qr_workbydegree->result() as $rows) {
            echo '<tr>
                                                    <td class="wbd_no" style="text-align: center;" class="auto_id">' . $i . '</td>
                                                    <td><input type="text" class="form-control old_level" id="old_level" name="old_level[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ចាស់" maxlength="255" value="' . $rows->old_level . '" /></td>
                                                    <td><input type="text" class="form-control old_date datepick" id="old_date' . $i . ' " name="old_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" value="' . ($rows->old_date != "00-00-0000" ? $rows->old_date : "") . '" /></td>
                                                    <td><input type="text" class="form-control new_level" id="new_level" name="new_level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ថ្មី" maxlength="255" value="' . $rows->new_level . '" /></td>
                                                    <td><input type="text" class="form-control new_date datepick" id="new_date' . $i . ' " name="new_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" value="' . ($rows->new_date != "00-00-0000" ? $rows->new_date : "") . '" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wkd_ids="' . $rows->wkd_id . '" class="wkd_ids" id="wkd_ids" >លុប</a><input type="hidden" name="wkd_id[]" id="wkd_id" value="' . $rows->wkd_id . '" /></td>
                                                    </tr>';
            $i++;
        }
    } else {
        echo '<tr>
                                                    <td class="wbd_no" style="text-align: center;" class="auto_id">1</td>
                                                    <td><input type="text" class="form-control old_level" id="old_level" name="old_level[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ចាស់" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control old_date datepick" id="old_date" name="old_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control new_level" id="new_level" name="new_level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ថ្មី" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control new_date datepick" id="new_date" name="new_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wkd_ids="" class="wkd_ids" id="wkd_ids" >លុប</a><input type="hidden" name="wkd_id[]" id="wkd_id" /></td>
                                                </tr>';
    }
}
?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">រក្សាទុក</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">បិទ</button>
                </div>
            </div>
        </div>
    </div>
</form> -->
<!--=======================================Work promotion history=============================================-->
<!-- <form class="form-horizontal" role="form" method="post" id="wph_save">
    <div class="modal fade" id="workpromotionhistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1100px;" >
            <div class="modal-content">
                <div class="modal-header" style="background-image: linear-gradient(to bottom,#f5f5f5 0,#ccc 100%); background-repeat: repeat-x;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">ប្រវត្តិការដំឡើងឋានន្តរស័ក្ត</h4>
                    <input type="hidden" id="id_wph" name="id_wph" value="<?= $id ?>" />
                </div>
                <div class="modal-body">
                    <table cellpadding="0" cellspacing="0" border="1"​ class="table table-striped table-bordered" id="tbl_workpromotionhistory">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                <th style="text-align: center;"><?= t('កាំប្រាក់ចាស់') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំ') ?></th>
                                <th style="text-align: center;"><?= t('កាំប្រាក់ថ្មី') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំ') ?></th>
                                <th style="text-align: center;width: 110px;"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="បន្ថែមប្រវត្តិការដំឡើងឋានន្តរស័ក្ត" id ="lbl_addrow_workpromotionhistory"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /> បន្ថែម​...</a></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
if ($id - 0 == 0) {
    ?>
                                                                            <tr>
                                                                                    <td class="wph_no" style="text-align: center;" class="auto_id">1</td>
                                                                                    <td><input type="text" class="form-control oldlevel" id="oldlevel" name="oldlevel[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ចាស់" maxlength="255" /></td>
                                                                                    <td><input type="text" class="form-control olddate datepick" id="olddate" name="olddate[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ"   maxlength="255" /></td>
                                                                                    <td><input type="text" class="form-control newlevel" id="newlevel" name="newlevel[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ថ្មី" maxlength="255" /></td>
                                                                                    <td><input type="text" class="form-control newdate datepick" id="newdate" name="newdate[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ"   maxlength="255" /></td>
                                                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wkph_is_ids="" class="wkph_is_ids" id="wkph_is_ids" >លុប</a><input  type="hidden" name="wkph_is_id[]" id="wkph_is_id" /></td>
                                                                            </tr>

                                                                    <tr>
                                                                            <td class="wph_no" style="text-align: center;" class="auto_id">1</td>
                                                                            <td><input type="text" class="form-control oldlevel" id="oldlevel" name="oldlevel[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ចាស់" maxlength="255" /></td>
                                                                            <td><input type="text" class="form-control olddate datepick" id="olddate" name="olddate[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ"   maxlength="255" /></td>
                                                                            <td><input type="text" class="form-control newlevel" id="newlevel" name="newlevel[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ថ្មី" maxlength="255" /></td>
                                                                            <td><input type="text" class="form-control newdate datepick" id="newdate" name="newdate[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ"   maxlength="255" /></td>
                                                                            <td style="text-align: center;"><a href="javascript:void(0)" data-wkph_is_ids="" class="wkph_is_ids" id="wkph_is_ids" >លុប</a><input  type="hidden" name="wkph_is_id[]" id="wkph_is_id" /></td>
                                                                    </tr>
                                                                   
    <?php
} else {
    $qr_w_p_history = query("SELECT
                                                                                        *
                                                                                FROM
                                                                                        workpromotionhistory AS wph
                                                                                WHERE
                                                                                        wph.id = '{$id}'
                                                                                ORDER BY
                                                                                        wph.newlevel");
    if ($qr_w_p_history->num_rows() > 0) {
        $i = 1;
        foreach ($qr_w_p_history->result() as $rows) {
            echo '<tr>
                                                    <td class="wph_no">' . $i . '</td>
                                                    <td><input type="text" class="form-control oldlevel" id="oldlevel" name="oldlevel[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ចាស់" maxlength="255" value="' . $rows->oldlevel . '" /></td>
                                                    <td><input type="text" class="form-control olddate datepick" id="olddate ' . $i . '" name="olddate[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" value="' . ($rows->olddate != "00-00-0000" ? $rows->olddate : "") . '" /></td>
                                                    <td><input type="text" class="form-control newlevel" id="newlevel" name="newlevel[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ថ្មី" maxlength="255" value="' . $rows->newlevel . '" /></td>
                                                    <td><input type="text" class="form-control newdate datepick" id="newdate ' . $i . '" name="newdate[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" value="' . ($rows->newdate != "00-00-0000" ? $rows->newdate : "") . '" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wkph_is_ids="' . $rows->wkph_is_id . '" class="wkph_is_ids" id="wkph_is_ids" >លុប</a><input  type="hidden" name="wkph_is_id[]" id="wkph_is_id" value="' . $rows->wkph_is_id . '" /></td>
                                                </tr>';
            $i++;
        }
    } else {
        echo '<tr>
                                                    <td class="wph_no" style="text-align: center;" class="auto_id">1</td>
                                                    <td><input type="text" class="form-control oldlevel" id="oldlevel" name="oldlevel[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ចាស់" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control olddate datepick" id="olddate" name="olddate[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control newlevel" id="newlevel" name="newlevel[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ថ្មី" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control newdate datepick" id="newdate" name="newdate[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wkph_is_ids="" class="wkph_is_ids" id="wkph_is_ids" >លុប</a><input  type="hidden" name="wkph_is_id[]" id="wkph_is_id" /></td>
                                                </tr>';
    }
}
?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">រក្សាទុក</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">បិទ</button>
                </div>
            </div>
        </div>
    </div>
</form> -->
<!--=======================================Work class promotion history=============================================-->
<!-- <form class="form-horizontal" role="form" method="post" id="wcph_save">
    <div class="modal fade" id="workclasspromotehistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1100px;" >
            <div class="modal-content">
                <div class="modal-header" style="background-image: linear-gradient(to bottom,#f5f5f5 0,#ccc 100%); background-repeat: repeat-x;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">ប្រវត្តិការដំឡើងថ្នាក់</h4>
                    <input type="hidden" id="id_wcph" name="id_wcph" value="<?= $id ?>" />
                </div>
                <div class="modal-body">
                    <table cellpadding="0" cellspacing="0" border="1"​ class="table table-striped table-bordered" id="tbl_workclasspromotehistory">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                <th style="text-align: center;"><?= t('មុខតំណែងឫឋានន្តរសក្តិ') ?></th>
                                <th style="text-align: center;"><?= t('ឋានន្តរសក្តិ') ?></th>
                                <th style="text-align: center;"><?= t('កាំប្រាក់') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំ') ?></th>
                                <th style="text-align: center;"><?= t('ក្របខ័ណ្ឌ') ?></th>
                                <th style="text-align: center;"><?= t('ថ្នាក់') ?></th>
                                <th style="text-align: center;width: 110px;"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="បន្ថែមប្រវត្តិការដំឡើងថ្នាក់" id ="lbl_addrow_workclasspromotehistory"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /> បន្ថែម​...</a></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
if ($id - 0 == 0) {
    ?>

                                                            <tr>
                                                            <td class="wcph_no" style="text-align: center;" class="auto_id">1</td>
                                                            <td><input type="text" class="form-control" id="title" name="title[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញមុខតំណែងឫឋានន្តរសក្តិ" maxlength="255" /></td>
                                                            <td><input type="text" class="form-control" id="level_cph" name="level_cph[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញឋានន្តរសក្តិ" maxlength="255" /></td>
                                                            <td><input type="text" class="form-control" id="rank" name="rank[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់" maxlength="255" /></td>
                                                            <td><input type="text" class="form-control datepick" id="date" name="date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>
                                                            <td><input type="text" class="form-control" id="framework" name="framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញក្របខ័ណ្ឌ" maxlength="255" /></td>
                                                            <td><input type="text" class="form-control" id="class_level" name="class_level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្នាក់" maxlength="255" /></td>
                                                            <td style="text-align: center;"><a href="javascript:void(0)" data-wkh_is_ids="" class="wkh_is_ids" id="wkh_is_ids">លុប</a><input class="form-control wkh_is_id" type="hidden" name="wkh_is_id[]" id="wkh_is_id" placeholder="លេខរៀង" maxlength="11" /></td>
                                                            </tr>

                                                            <tr>
                                                            <td class="wcph_no" style="text-align: center;" class="auto_id">1</td>
                                                            <td><input type="text" class="form-control" id="title" name="title[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញមុខតំណែងឫឋានន្តរសក្តិ" maxlength="255" /></td>
                                                            <td><input type="text" class="form-control" id="level_cph" name="level_cph[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញឋានន្តរសក្តិ" maxlength="255" /></td>
                                                            <td><input type="text" class="form-control" id="rank" name="rank[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់" maxlength="255" /></td>
                                                            <td><input type="text" class="form-control datepick" id="date" name="date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>
                                                            <td><input type="text" class="form-control" id="framework" name="framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញក្របខ័ណ្ឌ" maxlength="255" /></td>
                                                            <td><input type="text" class="form-control" id="class_level" name="class_level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្នាក់" maxlength="255" /></td>
                                                            <td style="text-align: center;"><a href="javascript:void(0)" data-wkh_is_ids="" class="wkh_is_ids" id="wkh_is_ids">លុប</a><input class="form-control wkh_is_id" type="hidden" name="wkh_is_id[]" id="wkh_is_id" placeholder="លេខរៀង" maxlength="11" /></td>
                                                            </tr>

    <?php
} else {
    $qr_workclasspromotehistory = query("SELECT
                                                                                                                        *
                                                                                                                FROM
                                                                                                                        workclasspromotehistory AS wcph
                                                                                                                WHERE
                                                                                                                        wcph.id = '{$id}'
                                                                                                                ORDER BY
                                                                                                                        wcph.title");
    if ($qr_workclasspromotehistory->num_rows() > 0) {
        $i = 1;
        foreach ($qr_workclasspromotehistory->result() as $rows) {
            echo '<tr>
                                                    <td class="wcph_no">' . $i . '</td>
                                                    <td><input type="text" class="form-control" id="title" name="title[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញមុខតំណែងឫឋានន្តរសក្តិ" maxlength="255" value="' . $rows->title . '" /></td>
                                                    <td><input type="text" class="form-control" id="level_cph" name="level_cph[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញឋានន្តរសក្តិ" maxlength="255" value="' . $rows->level_cph . '" /></td>
                                                    <td><input type="text" class="form-control" id="rank" name="rank[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់" maxlength="255" value="' . $rows->rank . '" /></td>
                                                    <td><input type="text" class="form-control datepick" id="date ' . $i . '" name="date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" value="' . ($rows->date != "00-00-0000" ? $rows->date : "") . '" /></td>
                                                    <td><input type="text" class="form-control" id="framework" name="framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញក្របខ័ណ្ឌ" maxlength="255" value="' . $rows->framework . '" /></td>
                                                    <td><input type="text" class="form-control" id="class_level" name="class_level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្នាក់" maxlength="255" value="' . $rows->class_level . '" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)"  data-wkh_is_ids="' . $rows->wkh_is_id . '" class="wkh_is_ids" id="wkh_is_ids">លុប</a><input class="wkh_is_id" type="hidden" name="wkh_is_id[]" id="wkh_is_id" value="' . $rows->wkh_is_id . '" /></td>
                                                </tr>';
            $i++;
        }
    } else {
        echo '<tr>
                                                    <td class="wcph_no" style="text-align: center;" class="auto_id">1</td>
                                                    <td><input type="text" class="form-control" id="title" name="title[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញមុខតំណែងឫឋានន្តរសក្តិ" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control" id="level_cph" name="level_cph[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញឋានន្តរសក្តិ" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control" id="rank" name="rank[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control datepick" id="date" name="date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control" id="framework" name="framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញក្របខ័ណ្ឌ" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control" id="class_level" name="class_level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្នាក់" maxlength="255" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)"  data-wkh_is_ids="" class="wkh_is_ids" id="wkh_is_ids">លុប</a><input class="wkh_is_id" type="hidden" name="wkh_is_id[]" id="wkh_is_id" /></td>
                                                </tr>';
    }
}
?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">រក្សាទុក</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">បិទ</button>
                </div>
            </div>
        </div>
    </div>
</form> -->

<!--=======================================Work transfer=============================================-->
<!-- <form class="form-horizontal" role="form" method="post" id="wt_save">
    <div class="modal fade" id="worktransfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1100px;" >
            <div class="modal-content">
                <div class="modal-header" style="background-image: linear-gradient(to bottom,#f5f5f5 0,#ccc 100%); background-repeat: repeat-x;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">ការផ្ទេរការងារ</h4>
                    <input type="hidden" id="id_wt" name="id_wt" value="<?= $id ?>" />
                </div>
                <div class="modal-body">
                    <table cellpadding="0" cellspacing="0" border="1"​ class="table table-striped table-bordered" id="tbl_worktransfer">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                <th style="text-align: center;"><?= t('តួនាទី') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំផ្ទេរ') ?></th>
                                <th style="text-align: center;"><?= t('ទៅតួនាទី') ?></th>
                                <th style="text-align: center;"><?= t('លក្ខណៈនៃការផ្ទេរ') ?></th>
                                <th style="text-align: center; width: 110px;"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="បន្ថែមការផ្ទេរការងារ" id="lbl_addrow_worktransfer"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /> បន្ថែម​...</a></th>
                            </tr>
                        </thead>
                        <tbody>
<?php if ($id - 0 == 0) { ?>
    <?php
} else {
    $qr_w_transfer = query("SELECT
                                                                                    *
                                                                            FROM
                                                                                    worktransfer AS wt
                                                                            WHERE
                                                                                    wt.id = '{$id}'
                                                                            ORDER BY
                                                                                    wt.role");
    if ($qr_w_transfer->num_rows() > 0) {
        $i = 1;
        foreach ($qr_w_transfer->result() as $rows) {
            echo '<tr>
                                                    <td class="wt_no">' . $i . '</td>
                                                    <td><input type="text" class="form-control role" id="role" name="role[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញតួនាទី" maxlength="255" value="' . $rows->role . '" /></td>
                                                    <td><input type="text" class="form-control date_transfer datepick" id="date_transfer ' . $i . '" name="date_transfer[]" placeholder="បំពេញថ្ងៃខែឆ្នាំផ្ទេរ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំផ្ទេរ" maxlength="255" value="' . ($rows->date_transfer != "" ? $rows->date_transfer : "") . '"/></td>
                                                    <td><input type="text" class="form-control to_role" id="to_role" name="to_role[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញទៅតួនាទី" maxlength="255" value="' . $rows->to_role . '" /></td>
                                                    <td><input type="text" class="form-control statusl" id="status" name="status[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញលក្ខណៈនៃការផ្ទេរ" maxlength="255" value="' . $rows->status . '" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wkt_ids="' . $rows->wkt_id . '" id="wkt_ids" class="wkt_ids">លុប</a><input class="form-control wkt_id" type="hidden" name="wkt_id[]" id="wkt_id" value="' . $rows->wkt_id . '" /></td>
                                                </tr>';
            $i++;
        }
    } else {
        echo '<tr>
                                                    <td class="wt_no">1</td>
                                                    <td><input type="text" class="form-control role" id="role" name="role[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញតួនាទី" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control date_transfer datepick" id="date_transfer" name="date_transfer[]" placeholder="បំពេញថ្ងៃខែឆ្នាំផ្ទេរ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំផ្ទេរ" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control to_role" id="to_role" name="to_role[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញទៅតួនាទី" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control statusl" id="status" name="status[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញលក្ខណៈនៃការផ្ទេរ" maxlength="255" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wkt_ids="" id="wkt_ids" class="wkt_ids">លុប</a><input class="form-control wkt_id" type="hidden" name="wkt_id[]" id="wkt_id"  /></td>
                                                </tr>';
    }
}
?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">រក្សាទុក</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">បិទ</button>
                </div>
            </div>
        </div>
    </div>
</form> -->

<!--=======================================Work Framework out=============================================-->
<!-- <form class="form-horizontal" role="form" method="post" id="wkfw_save">
    <div class="modal fade" id="workframeworkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1100px;" >
            <div class="modal-content">
                <div class="modal-header" style="background-image: linear-gradient(to bottom,#f5f5f5 0,#ccc 100%); background-repeat: repeat-x;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">មន្ត្រីក្រៅក្របខ័ណ្ឌដើម</h4>
                    <input type="hidden" id="id_wkfw" name="id_wkfw" value="<?= $id ?>" />
                </div>
                <div class="modal-body">
                    <table cellpadding="0" cellspacing="0" border="1"​ class="table table-striped table-bordered" id="tbl_workframeworkout">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំចាប់ផ្តើម') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំបញ្ចប់') ?></th>
                                <th style="text-align: center;"><?= t('តួនាទី') ?></th>
                                <th style="text-align: center;"><?= t('ស្ថាប័ន') ?></th>
                                <th style="text-align: center;"><?= t('សំគាល់') ?></th>
                                <th style="text-align: center;width: 110px;"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="បន្ថែមមន្ត្រីក្រៅក្របខ័ណ្ឌដើម" id ="lbl_addrow_workframeworkout"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /> បន្ថែម​...</a></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
if ($id - 0 == 0) {
    ?>                                                                                                                                                                                                                                                                                                    </tr>
    <?php
} else {
    $qr_workframeworkout = query("SELECT
                                                                                            *
                                                                                    FROM
                                                                                            workframeworkout AS wkfw
                                                                                    WHERE
                                                                                            wkfw.id = '{$id}'
                                                                                    ORDER BY
                                                                                            wkfw.institution_framework ");
    if ($qr_workframeworkout->num_rows() > 0) {
        $i = 1;
        foreach ($qr_workframeworkout->result() as $rows) {
            echo '<tr>
                                                    <td class="wkfw_no">' . $i . '</td>
                                                    <td><input type="text" class="form-control start_date2 datepick" id="start_date2 ' . $i . '" name="start_date2[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" value="' . ($rows->start_date2 != "00-00-0000" ? $rows->start_date2 : "") . '" /></td>
                                                    <td><input type="text" class="form-control stop_date2 datepick" id="stop_date2 ' . $i . '" name="stop_date2[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" value="' . ($rows->stop_date2 != "00-00-0000" ? $rows->stop_date2 : "") . '" /></td>
                                                    <td><input type="text" class="form-control title_framework" id="title_framework" name="title_framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញតួនាទី" maxlength="255" value="' . $rows->title_framework . '" /></td>
                                                    <td><input type="text" class="form-control institution_framework" id="institution_framework" name="institution_framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញស្ថាប័ន" maxlength="255" value="' . $rows->institution_framework . '" /></td>
                                                    <td><input type="text" class="form-control note_framework" id="note_framework" name="note_framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="សំគាល់" maxlength="255" value="' . $rows->note_framework . '" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wkfw_ids="' . $rows->wkfw_id . '" id="wkfw_ids" class="wkfw_ids" >លុប</a><input class="form-control wkfw_id" type="hidden" name="wkfw_id[]" id="wkfw_id" value="' . $rows->wkfw_id . '" /></td>
                                                </tr>';
            $i++;
        }
    } else {
        echo '<tr>
                                                    <td class="wkfw_no">1</td>
                                                    <td><input type="text" class="form-control start_date2 datepick" id="start_date2" name="start_date2[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control stop_date2 datepick" id="stop_date2" name="stop_date2[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control title_framework" id="title_framework" name="title_framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញតួនាទី" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control institution_framework" id="institution_framework" name="institution_framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញស្ថាប័ន" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control note_framework" id="note_framework" name="note_framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="សំគាល់" maxlength="255" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wkfw_ids="" id="wkfw_ids" class="wkfw_ids" >លុប</a><input class="form-control wkfw_id" type="hidden" name="wkfw_id[]" id="wkfw_id" /></td>
                                                </tr>';
    }
}
?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">រក្សាទុក</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">បិទ</button>
                </div>
            </div>
        </div>
    </div>
</form> -->

<!--=======================================Work Name Deleting=============================================-->
<!-- <form class="form-horizontal" role="form" method="post" id="wd_save">
    <div class="modal fade" id="worknamedelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1100px;" >
            <div class="modal-content">
                <div class="modal-header" style="background-image: linear-gradient(to bottom,#f5f5f5 0,#ccc 100%); background-repeat: repeat-x;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">ការដាប់បញ្ញត្តិ និងការលុបឈ្មោះ</h4>
                    <input type="hidden" id="id_wd" name="id_wd" value="<?= $id ?>" />
                </div>
                <div class="modal-body">
                    <table cellpadding="0" cellspacing="0" border="1"​ class="table table-striped table-bordered" id="tbl_worknamedeleting">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំចាប់ផ្តើមដាប់បញ្ញត្តិ') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំបញ្ចប់ដាប់បញ្ញត្តិ') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំប្រកាស') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំលុប') ?></th>
                                <th style="text-align: center;"><?= t('មូលហេតុ') ?></th>
                                <th style="text-align: center;width: 110px;"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="បន្ថែមការដាប់បញ្ញត្តិ និងការលុបឈ្មោះ" id ="lbl_addrow_worknamedeleting"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /> បន្ថែម​...</a></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
if ($id - 0 == 0) {
    ?>

                                                                            <tr>
                                                                                <td class="wnd_no">1</td>
                                                                                <td><input type="text" class="form-control regulation_start_date datepick" id="regulation_start_date" name="regulation_start_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើមដាប់បញ្ញត្តិ" maxlength="255" /></td>
                                                                                <td><input type="text" class="form-control regulation_stop_date datepick" id="regulation_stop_date" name="regulation_stop_date[]" placeholder=""    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់ដាប់បញ្ញត្តិ" maxlength="255" /></td>
                                                                                <td><input type="text" class="form-control deleting_accouncement_date datepick" id="deleting_accouncement_date" name="deleting_accouncement_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំប្រកាស" maxlength="255" /></td>
                                                                                <td><input type="text" class="form-control deleting_date datepick" id="deleting_date" name="deleting_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំលុប"   maxlength="255" /></td>
                                                                                <td><input type="text" class="form-control reason_deleting" id="reason_deleting" name="reason_deleting[]" placeholder="" data-toggle="tooltip" data-placement="top" title="មូលហេតុ" maxlength="255" /></td>
                                                                                <td style="text-align: center;"><a href="javascript:void(0)" data-wknd_ids="" id="wknd_ids" class="wknd_ids">លុប</a><input class="form-control wknd_id" type="hidden" name="wknd_id[]" id="wknd_id" placeholder="លេខរៀង" maxlength="11" /></td>
                                                                            </tr>

                                                                        <tr>
                                                                            <td class="wnd_no">1</td>
                                                                            <td><input type="text" class="form-control regulation_start_date datepick" id="regulation_start_date" name="regulation_start_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើមដាប់បញ្ញត្តិ" maxlength="255" /></td>
                                                                            <td><input type="text" class="form-control regulation_stop_date datepick" id="regulation_stop_date" name="regulation_stop_date[]" placeholder=""    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់ដាប់បញ្ញត្តិ" maxlength="255" /></td>
                                                                            <td><input type="text" class="form-control deleting_accouncement_date datepick" id="deleting_accouncement_date" name="deleting_accouncement_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំប្រកាស" maxlength="255" /></td>
                                                                            <td><input type="text" class="form-control deleting_date datepick" id="deleting_date" name="deleting_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំលុប"   maxlength="255" /></td>
                                                                            <td><input type="text" class="form-control reason_deleting" id="reason_deleting" name="reason_deleting[]" placeholder="" data-toggle="tooltip" data-placement="top" title="មូលហេតុ" maxlength="255" /></td>
                                                                            <td style="text-align: center;"><a href="javascript:void(0)" data-wknd_ids="" id="wknd_ids" class="wknd_ids">លុប</a><input class="form-control wknd_id" type="hidden" name="wknd_id[]" id="wknd_id" placeholder="លេខរៀង" maxlength="11" /></td>
                                                                        </tr>

    <?php
} else {
    $qr_wn_delete = query("SELECT
                                                                                *
                                                                        FROM
                                                                                worknamedeleting AS wd
                                                                        WHERE
                                                                                wd.id = '{$id}'
                                                                        ORDER BY
                                                                                wd.reason_deleting");
    if ($qr_wn_delete->num_rows() > 0) {
        $i = 0;
        foreach ($qr_wn_delete->result() as $rows) {
            $i++;
            echo '<tr>
                                                    <td class="wnd_no">' . $i . '</td>
                                                    <td><input type="text" class="form-control regulation_start_date datepick" id="regulation_start_date ' . $i . '" name="regulation_start_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើមដាប់បញ្ញត្តិ" maxlength="255" value="' . ($rows->regulation_start_date != "00-00-0000" ? $rows->regulation_start_date : "") . '" /></td>
                                                    <td><input type="text" class="form-control regulation_stop_date datepick" id="regulation_stop_date ' . $i . '" name="regulation_stop_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់ដាប់បញ្ញត្តិ" maxlength="255" value="' . ($rows->regulation_stop_date != "00-00-0000" ? $rows->regulation_stop_date : "") . '" /></td>
                                                    <td><input type="text" class="form-control deleting_accouncement_date datepick" id="deleting_accouncement_date ' . $i . '" name="deleting_accouncement_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំប្រកាស" maxlength="255" value="' . ($rows->deleting_accouncement_date != "00-00-0000" ? $rows->deleting_accouncement_date : "") . ' "/></td>
                                                    <td><input type="text" class="form-control deleting_date datepick" id="deleting_date ' . $i . '" name="deleting_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំលុប" maxlength="255" value="' . ($rows->deleting_date != "00-00-0000" ? $rows->deleting_date : "") . '" /></td>
                                                    <td><input type="text" class="form-control reason_deleting" id="reason_deleting" name="reason_deleting[]" placeholder="" data-toggle="tooltip" data-placement="top" title="មូលហេតុ" maxlength="255" value="' . $rows->reason_deleting . '" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wknd_ids="' . $rows->wknd_id . '" id="wknd_ids" class="wknd_ids">លុប</a><input class="form-control wknd_id" type="hidden" name="wknd_id[]" id="wknd_id" value="' . $rows->wknd_id . '" /></td>
                                                </tr>';
        }
    } else {
        echo '<tr>
                                                    <td class="wnd_no">1</td>
                                                    <td><input type="text" class="form-control regulation_start_date datepick" id="regulation_start_date" name="regulation_start_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើមដាប់បញ្ញត្តិ" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control regulation_stop_date datepick" id="regulation_stop_date" name="regulation_stop_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់ដាប់បញ្ញត្តិ" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control deleting_accouncement_date datepick" id="deleting_accouncement_date" name="deleting_accouncement_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំប្រកាស" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control deleting_date datepick" id="deleting_date" name="deleting_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំលុប"   maxlength="255" /></td>
                                                    <td><input type="text" class="form-control reason_deleting" id="reason_deleting" name="reason_deleting[]" placeholder="" data-toggle="tooltip" data-placement="top" title="មូលហេតុ" maxlength="255" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wknd_ids="" id="wknd_ids" class="wknd_ids">លុប</a><input class="form-control wknd_id" type="hidden" name="wknd_id[]" id="wknd_id" placeholder="លេខរៀង" maxlength="11" /></td>
                                                </tr>';
    }
}
?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">រក្សាទុក</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">បិទ</button>
                </div>
            </div>
        </div>
    </div>
</form> -->

<!--=======================================Work Free salary=============================================-->
<!-- <form class="form-horizontal" role="form" method="post" id="wkf_save">
    <div class="modal fade" id="workfreesalary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1100px;" >
            <div class="modal-content">
                <div class="modal-header" style="background-image: linear-gradient(to bottom,#f5f5f5 0,#ccc 100%); background-repeat: repeat-x;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">ភាពទំនេរគ្មានបៀវត្ស</h4>
                    <input type="hidden" id="id_wkf" name="id_wkf" value="<?= $id ?>" />
                </div>
                <div class="modal-body">
                    <table cellpadding="0" cellspacing="0" border="1"​ class="table table-striped table-bordered" id="tbl_workfreesalary">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំចាប់ផ្តើម') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំបញ្ចប់') ?></th>
                                <th style="text-align: center;"><?= t('សំគាល់') ?></th>
                                <th style="text-align: center;width: 110px;"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="បន្ថែមការដាប់បញ្ញត្តិ និងការលុបឈ្មោះ" id ="lbl_addrow_workfreesalary"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /> បន្ថែម​...</a></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
if ($id - 0 == 0) {
    ?>
                                                                    <<<<<<< HEAD
                                                                                                                                                                                                                                                                                                                                                                                            <tr>
                                                                                                                                                                                                                                                                                                                                                                                                <td class="wkf_no">1</td>
                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" class="form-control start_date3 datepick" id="start_date3" name="start_date3[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" class="form-control stop_date3 datepick" id="stop_date3" name="stop_date3[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់"  maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" class="form-control note_frees_alary" id="note_frees_alary" name="note_frees_alary[]" placeholder="" data-toggle="tooltip" data-placement="top" title="សំគាល់"  maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                                <td style="text-align: center;"><a href="javascript:void(0)" data-wkf_salary_ids="" id="wkf_salary_ids" class="wkf_salary_ids">លុប</a><input class="wkf_salary_id" type="hidden" name="wkf_salary_id[]" id="wkf_salary_id" /></td>
                                                                                                                                                                                                                                                                                                                                                                                            </tr>
                                                                    =======
                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                            <td class="wkf_no">1</td>
                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="form-control start_date3 datepick" id="start_date3" name="start_date3[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="form-control stop_date3 datepick" id="stop_date3" name="stop_date3[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់"  maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="form-control note_frees_alary" id="note_frees_alary" name="note_frees_alary[]" placeholder="" data-toggle="tooltip" data-placement="top" title="សំគាល់"  maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                            <td style="text-align: center;"><a href="javascript:void(0)" data-wkf_salary_ids="" id="wkf_salary_ids" class="wkf_salary_ids">លុប</a><input class="wkf_salary_id" type="hidden" name="wkf_salary_id[]" id="wkf_salary_id" /></td>
                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                    >>>>>>> c5212f457d40e5192fa0d5888c90aff61e04b202
    <?php
} else {
    $qr_wkf_salary = query("SELECT
                                                                                        *
                                                                                FROM
                                                                                        workfreesalary AS wkf
                                                                                WHERE
                                                                                        wkf.id = '{$id}'
                                                                                ORDER BY
                                                                                        wkf.start_date3");
    if ($qr_wkf_salary->num_rows() > 0) {
        $i = 1;
        foreach ($qr_wkf_salary->result() as $rows) {
            echo '<tr>
                                                    <td class="wkf_no">' . $i . '</td>
                                                    <td><input type="text" class="form-control start_date3 datepick" id="start_date3' . $i . '" name="start_date3[]" placeholder=""     data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" value="' . ($rows->start_date3 != "00-00-0000" ? $rows->start_date3 : "") . '" /></td>
                                                        <td><input type="text" class="form-control stop_date3 datepick" id="stop_date3' . $i . '" name="stop_date3[]" placeholder=""    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់"  maxlength="255" value="' . ($rows->stop_date3 != "00-00-0000" ? $rows->stop_date3 : "") . '" /></td>
                                                    <td><input type="text" class="form-control note_frees_alary" id="note_frees_alary" name="note_frees_alary[]" placeholder="" data-toggle="tooltip" data-placement="top" title="សំគាល់"  maxlength="255" value="' . $rows->note_frees_alary . '" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wkf_salary_ids="' . $rows->wkf_salary_id . '" id="wkf_salary_ids" class="wkf_salary_ids">លុប</a><input class="wkf_salary_id" type="hidden" name="wkf_salary_id[]" id="wkf_salary_id" value="' . $rows->wkf_salary_id . '" /></td>
                                                </tr>';
            $i++;
        }
    } else {
        echo '<tr>
                                                    <td class="wkf_no">1</td>
                                                    <td><input type="text" class="form-control start_date3 datepick" id="start_date3" name="start_date3[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control stop_date3 datepick" id="stop_date3" name="stop_date3[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់"  maxlength="255" /></td>
                                                    <td><input type="text" class="form-control note_frees_alary" id="note_frees_alary" name="note_frees_alary[]" placeholder="" data-toggle="tooltip" data-placement="top" title="សំគាល់"  maxlength="255" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wkf_salary_ids="" id="wkf_salary_ids" class="wkf_salary_ids">លុប</a><input class="wkf_salary_id" type="hidden" name="wkf_salary_id[]" id="wkf_salary_id" /></td>
                                                </tr>';
    }
}
?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">រក្សាទុក</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">បិទ</button>
                </div>
            </div>
        </div>
    </div>
</form> -->
<!--=======================================Work title level=============================================-->
<!-- <form class="form-horizontal" role="form" method="post" id="wkt_save">
    <div class="modal fade" id="worktitlelevel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 1100px;" >
            <div class="modal-content">
                <div class="modal-header" style="background-image: linear-gradient(to bottom,#f5f5f5 0,#ccc 100%); background-repeat: repeat-x;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">កម្រិតមុខងារ</h4>
                    <input type="hidden" id="id_wkt" name="id_wkt" value="<?= $id ?>" />
                </div>
                <div class="modal-body">
                    <table cellpadding="0" cellspacing="0" border="1"​ class="table table-striped table-bordered" id="tbl_worktitlelevel">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                <th style="text-align: center;"><?= t('មុខងារបច្ចុប្បន្ន') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំអតីតភាព') ?></th>
                                <th style="text-align: center;"><?= t('ចំនួនឆ្នាំអតីតភាព') ?></th>
                                <th style="text-align: center;"><?= t('កម្រិត') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំ') ?></th>
                                <th style="text-align: center;width: 110px;"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="បន្ថែមការដាប់បញ្ញត្តិ និងការលុបឈ្មោះ" id ="lbl_addrow_worktitlelevel"><img src="<?= base_url('assets/bs/css/images/add.png') ?>" /> បន្ថែម​...</a></th>
                            </tr>
                        </thead>
                        <tbody>
<?php
if ($id - 0 == 0) {
    ?>
                                                                    <<<<<<< HEAD
                                                                                                                                                                                                                                                                                                                                                                                            <tr>
                                                                                                                                                                                                                                                                                                                                                                                                <td class="wkt_no">1</td>
                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" class="form-control current_title" id="current_title" name="current_title[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញមុខងារបច្ចុប្បន្ន" maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" class="form-control seniority_date datepick" id="seniority_date" name="seniority_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំអតីតភាព" maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" class="form-control number_of_seniority" id="number_of_seniority" name="number_of_seniority[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញចំនួនឆ្នាំអតីតភាព" maxlength="11" number /></td>
                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" class="form-control level_title" id="level_title" name="level_title[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកម្រិត" maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" class="form-control date_title datepick" id="date_title" name="date_title[]" placeholder="" data-toggle="tooltip"    data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ"  maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                                <td style="text-align: center;"><a href="javascript:void(0)" data-wktl_ids="" id="wktl_ids" class="wktl_ids">លុប</a><input class="wktl_id" type="hidden" name="wktl_id[]" id="wktl_id" /></td>
                                                                                                                                                                                                                                                                                                                                                                                            </tr>
                                                                    =======
                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                            <td class="wkt_no">1</td>
                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="form-control current_title" id="current_title" name="current_title[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញមុខងារបច្ចុប្បន្ន" maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="form-control seniority_date datepick" id="seniority_date" name="seniority_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំអតីតភាព" maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="form-control number_of_seniority" id="number_of_seniority" name="number_of_seniority[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញចំនួនឆ្នាំអតីតភាព" maxlength="11" number /></td>
                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="form-control level_title" id="level_title" name="level_title[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកម្រិត" maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="form-control date_title datepick" id="date_title" name="date_title[]" placeholder="" data-toggle="tooltip"    data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ"  maxlength="255" /></td>
                                                                                                                                                                                                                                                                                                                                                                                            <td style="text-align: center;"><a href="javascript:void(0)" data-wktl_ids="" id="wktl_ids" class="wktl_ids">លុប</a><input class="wktl_id" type="hidden" name="wktl_id[]" id="wktl_id" /></td>
                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                    >>>>>>> c5212f457d40e5192fa0d5888c90aff61e04b202
    <?php
} else {
    $qr_wkt_level = query("SELECT
                                                                                    *
                                                                            FROM
                                                                                    worktitlelevel AS wkt
                                                                            WHERE
                                                                                    wkt.id = '{$id}'
                                                                            ORDER BY
                                                                                    wkt.date_title");
    if ($qr_wkt_level->num_rows() > 0) {
        $i = 1;
        foreach ($qr_wkt_level->result() as $rows) {
            echo '<tr>
                                                    <td class="wkt_no">' . $i . '</td>
                                                    <td><input type="text" class="form-control current_title" id="current_title" name="current_title[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញមុខងារបច្ចុប្បន្ន" maxlength="255" value="' . $rows->current_title . '" /></td>
                                                    <td><input type="text" class="form-control seniority_date datepick" id="seniority_date' . $i . '" name="seniority_date[]" placeholder="បំពេញថ្ងៃខែឆ្នាំអតីតភាព"  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំអតីតភាព" value="' . ($rows->seniority_date != "00-00-0000" ? $rows->seniority_date : "") . '" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control number_of_seniority" id="number_of_seniority" name="number_of_seniority[]" placeholder="បំពេញចំនួនឆ្នាំអតីតភាព" data-toggle="tooltip" data-placement="top" title="បំពេញចំនួនឆ្នាំអតីតភាព" maxlength="11" value="' . $rows->number_of_seniority . '" number /></td>
                                                    <td><input type="text" class="form-control level_title" id="level_title" name="level_title[]" placeholder="បំពេញកម្រិត" data-toggle="tooltip" data-placement="top" title="បំពេញកម្រិត" maxlength="255" value="' . $rows->level_title . '" /></td>
                                                    <td><input type="text" class="form-control date_title datepick" id="date_title' . $i . '" name="date_title[]" placeholder="បំពេញថ្ងៃខែឆ្នាំ"    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" value="' . ($rows->date_title != "00-00-0000" ? $rows->date_title : "") . '" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wktl_ids="' . $rows->wktl_id . '" id="wktl_ids" class="wktl_ids">លុប</a><input class="wktl_id" type="hidden" name="wktl_id[]" id="wktl_id" value="' . $rows->wktl_id . '" /></td>
                                                </tr>';
            $i++;
        }
    } else {
        echo '<tr>
                                                    <td class="wkt_no">1</td>
                                                    <td><input type="text" class="form-control current_title" id="current_title" name="current_title[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញមុខងារបច្ចុប្បន្ន" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control seniority_date datepick" id="seniority_date" name="seniority_date[]" placeholder="បំពេញថ្ងៃខែឆ្នាំអតីតភាព"    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំអតីតភាព" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control number_of_seniority" id="number_of_seniority" name="number_of_seniority[]" placeholder="បំពេញចំនួនឆ្នាំអតីតភាព" data-toggle="tooltip" data-placement="top" title="បំពេញចំនួនឆ្នាំអតីតភាព" maxlength="11" number /></td>
                                                    <td><input type="text" class="form-control level_title" id="level_title" name="level_title[]" placeholder="បំពេញកម្រិត" data-toggle="tooltip" data-placement="top" title="បំពេញកម្រិត" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control date_title datepick" id="date_title" name="date_title[]" placeholder="បំពេញថ្ងៃខែឆ្នាំ"  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-wktl_ids="" id="wktl_ids" class="wktl_ids">លុប</a><input class="wktl_id" type="hidden" name="wktl_id[]" id="wktl_id" /></td>
                                                </tr>';
    }
}
?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">រក្សាទុក</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">បិទ</button>
                </div>
            </div>
        </div>
    </div>
</form> -->

<!--==================form children=========-->
<form class="form-horizontal" role="form" method="post" id="child_save">
    <div class="modal fade" id="childrened" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" style="width: 1100px;">
            <div class="modal-content">
                <div class="modal-header"
                     style="background-image: linear-gradient(to bottom,#f5f5f5 0,#ccc 100%); background-repeat: repeat-x;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">បញ្ចូលកូន</h4>
                    <input type="hidden" id="id_ch" name="id_ch" value="<?= $id ?>"/>
                </div>
                <div class="modal-body">
                    <table cellpadding="0" cellspacing="0" border="1" ​ class="table table-striped table-bordered"
                           id="tbl_children">
                        <thead>
                            <tr>
                                <th style="text-align: center;"><?= t('ល.រ') ?></th>
                                <th style="text-align: center;"><?= t('ឈ្មោះកូន') ?></th>
                                <th style="text-align: center;"><?= t('ភេទ') ?></th>
                                <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំកំណើត') ?></th>
                                <!-- <th style="text-align: center;"><?= t('ថ្ងៃខែឆ្នាំបញ្ចូល') ?></th> -->
                                <th style="text-align: center;"><?= t('មុខរបរ') ?></th>
                                <th style="text-align: center;width: 110px;"><a href="javascript:void(0)"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title="បន្ថែមកូន​" id="lbl_addrow_children"><img
                                            src="<?= base_url('assets/bs/css/images/add.png') ?>"/> បន្ថែម​...</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($id - 0 == 0) {
                                ?>
                                <tr>
                                    <td class="ch_no1" style="text-align: center;" class="auto_id">1</td>
                                    <td><input type="text" class="form-control childname" id="childname" name="childname[]"
                                               placeholder="" data-toggle="tooltip" data-placement="top"
                                               title="បំពេញឈ្មោះកូន" maxlength="255"/></td>
                                    <!--<td><input type="text" class="form-control gender_child sex" id="gender_child" name="gender_child[]" placeholder="ជ្រើសរើសភេទ" data-toggle="tooltip" data-placement="top" title="ជ្រើសរើសភេទ" maxlength="255" /></td>-->
                                    <td><select class="form-control gender_child " id="gender_child1" name="gender_child[]" data-toggle="tooltip" data-placement="top"
                                               title="ជ្រើសរើសភេទ" value="<?= set_value('gender', isset($row->gender) ? $row->gender : '') ?>"></select></td>
                                    <td><input type="text" class="form-control dateofbirth_child "
                                               id="dateofbirth_child" name="dateofbirth_child[]" placeholder="" 
                                               data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំកំណើត"
                                               maxlength="255"/></td>

                                    <td><input type="text" class="form-control child_job" id="child_job" name="child_job[]"
                                               placeholder=""   data-toggle="tooltip" data-placement="top" title="មុខរបរ"
                                               maxlength="255"/></td>
                                    <td style="text-align: center;"><a href="javascript:void(0)" data-child_ids=""
                                                                       id="child_ids" class="child_ids">លុប</a><input
                                                                       class="child_id" type="hidden" name="child_id[]" id="child_id"/></td>
                                </tr>
                                <?php
                            } else {
                                $qr_children = query("SELECT
                                                                                *
                                                                        FROM
                                                                                children AS ch
                                                                        WHERE
                                                                                ch.id = '{$id}'
                                                                        ORDER BY
                                                                                ch.dateofbirth_child ");
                                if ($qr_children->num_rows() > 0) {
                                    $s = 1;
                                    foreach ($qr_children->result() as $rows) {
                                        echo '<tr>
                                                    <td class="ch_no1" style="text-align: center;" class="auto_id">' . $s. '</td>
                                                    <td><input type="text" class="form-control childname" id="childname' . $s. '" name="childname[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញឈ្មោះកូន" maxlength="255" value="' . $rows->childname . '" /></td>
                                                    <td><select class="form-control gender_child"  id="gender_child' . $s. '" name="gender_child[]" data-toggle="tooltip" data-placement="top"  placeholder="" title="ជ្រើសរើសភេទ"  ><option value="' . $rows->gender_child . '">' . $rows->gender_child . '</option><option value="ប្រុស">ប្រុស</option><option value="ស្រី">ស្រី</option>/></select></td>
                                                    <td><input type="text" class="form-control dateofbirth_child " id="dateofbirth_child ' . $s. ' " name="dateofbirth_child[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំកំណើត" maxlength="255" value="' .date('d-m-Y', strtotime($rows->dateofbirth_child)).'" /></td>
                                                    <td><input type="text" class="form-control child_job" id="child_job' . $s. '" name="child_job[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="មុខរបរ" maxlength="255" value="' . $rows->child_job . '" /></td>
                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-child_ids="' . $rows->child_id . '" id="child_ids" class="child_ids">លុប</a><input class="child_id" type="hidden" name="child_id[]" id="child_id" value="' . $rows->child_id . '" /></td>
                                                </tr>';
                                        $s++;
                                    }
                                } else {
                                    echo '<tr>
                                                    <td class="ch_no1" style="text-align: center;" class="auto_id">1</td>
                                                     <td><input type="text" class="form-control childname" id="childname' . $s. '" name="childname[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញឈ្មោះកូន" maxlength="255"  /></td>
                                                <td><select class="form-control gender_child"  id="gender_child' . $s. '" name="gender_child[]" data-toggle="tooltip" data-placement="top"  placeholder="" title="ជ្រើសរើសភេទ"  > <option value="ប្រុស">ប្រុស</option><option value="ស្រី">ស្រី</option>/></select></td>
                                                   <td><input class="form-control gender_child" type="text" id="gender_child1" name="gender_child" data-toggle="tooltip" data-placement="top" placeholder="" title="ជ្រើសរើសភេទ" gender   /></td>
                                                    <td><input type="text" class="form-control dateofbirth_child " id="dateofbirth_child1" name="dateofbirth_child" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំកំណើត222" maxlength="255" /></td>
                                                    <td><input type="text" class="form-control child_job" id="child_job" name="child_job" placeholder=""  data-toggle="tooltip" data-placement="top" title="មុខរបរ" maxlength="255" /></td>

                                                    <td style="text-align: center;"><a href="javascript:void(0)" data-child_ids="" id="child_ids" class="child_ids">លុប</a><input class="child_id" type="hidden" name="child_id[]" id="child_id" /></td>
                                                </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">រក្សាទុក</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">បិទ</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div style="display: none;" id="print_biology" class="print_biology" border="1px solid blue"></div>
<button onclick="topFunction()" id="myBtn" title="Go to top" ​ class="fa fa-angle-double-up"></button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<!-- js -->
<script type="text/javascript">
    //List salary level=================
    $('#salary_level').on('change', function () {
        var salary_level = $('#salary_level').val();
        $.ajax({
            url: "<?= site_url('csv/csv_info/index_miltiple_salary') ?>",
            type: "post",
            datatype: "json",
            // async: false,
            beforeSend: function () {
//                $('.xmodal').show();
            },
            data: {salary_level: salary_level},
            success: function (data) {
                if (data.length > 0) {
                    $.each(data, function (i, item) {
                        if (salary_level == item.type) {
                            $('#index_multiply').val(item.multiple);
                            $('#index_salary').val(item.multiple_money);
                            var t = 0;
                            t += Number($('#index_multiply').val()) * Number($('#index_salary').val());
                            $('#pure_salary').val(t);
                        } else {
                            $('#index_multiply').val(0);
                            $('#index_salary').val(0);
                            var t = 0;
                            t += Number($('#index_multiply').val()) * Number($('#index_salary').val());
                            $('#pure_salary').val(t);
                        }
                    });
                } else {
                    $('#index_multiply').val(0);
                    $('#index_salary').val(0);
                    var t = 0;
                    t += Number($('#index_multiply').val()) * Number($('#index_salary').val());
                    $('#pure_salary').val(t);
                }

            },
            error: function () {
            }
        });

//switch (value) {
//    case 'ក.១.១':
//         $('#index_multiply').val(550);
//     $('#index_salary').val(1520);
//         var t = 0;
//         t += Number($('#index_multiply').val()) * Number($('#index_salary').val());
//         $('#pure_salary').val(t);
//        break;
//     case 'ក.១.២':
//         $('#index_multiply').val(531);
//         $('#index_salary').val(1520);
//         var t = 0;
//         t += Number($('#index_multiply').val()) * Number($('#index_salary').val());
//         $('#pure_salary').val(t);
//        break;
//}
    });
    // phome number textbox mask
    // $('#mobile_phone').mask('(000) 000-0000');
    // load data on distict

    // selectload data to textbox
    $('#unit').change(function () {
        var element = $(this).find('option:selected');
        var uname = element.attr("data-name");
        document.getElementById('unitname').value = uname;

    });

    $('#btnsubmitnb').click(function () {
        var homenb = document.getElementById("num_home").value;
        document.getElementById("homenb").innerText = homenb + ' ';
        document.getElementById("home_nb").value = homenb + ' ';
        // street
        var streetnb = document.getElementById("streets").value;
        document.getElementById("streetnb").innerText = streetnb + ' ';
        document.getElementById("str_nb").value = streetnb + ' ';
        // village
        var villagenb = document.getElementById("v_village").value;
        document.getElementById("villagenb").innerText = villagenb + ' ';
        document.getElementById("vil_nb").value = villagenb + ' ';

    });

    $('#v_village').change(function () {
        var villagenb = this.options[this.selectedIndex].innerHTML;
        document.getElementById("villagenb").innerText = villagenb + ' ';
        document.getElementById("vil_nb").value = villagenb + ' ';
    });
    $('#p_province').change(function () {
        var id = document.getElementById("p_province").value;
        var provincenb = this.options[this.selectedIndex].innerHTML;
        document.getElementById("provincenb").innerText = provincenb;
        document.getElementById("pro_nb").value = provincenb;

        $.ajax({
            url: "<?php echo site_url('csv/csv_info/get_district'); ?>",
            data: {"id": id},
            type: 'POST',
            success: function (data) {
                var sc = '<option> </option>';
                $.each(data, function (key, val) {
                    sc += '<option value="' + val.id + '" data-dis"' + val.dis_khmer + '">' + val.dis_khmer + '</option>';
                });
                $("#d_district option").remove();
                $("#d_district").append(sc);
            }
        });
    });
    // load data on commune
    $('#d_district').change(function () {
        var id = document.getElementById("d_district").value;
        var districtnb = this.options[this.selectedIndex].innerHTML;
        document.getElementById("districtnb").innerText = districtnb + ' ';
        document.getElementById("dis_nb").value = districtnb + ' ';

        $.ajax({
            url: "<?php echo site_url('csv/csv_info/get_commun'); ?>",
            data: {"id": id},
            type: 'POST',
            success: function (data) {
                var sc = '<option> </option>';
                $.each(data, function (key, val) {
                    sc += '<option value="' + val.id + '" data-com="' + val.com_khmer + '">' + val.com_khmer + '</option>';
                });
                $("#c_commun option").remove();
                $("#c_commun").append(sc);
            }
        });
    });
    // load data on viilage
    $('#c_commun').change(function () {
        var id = document.getElementById("c_commun").value;
        var communcenb = this.options[this.selectedIndex].innerHTML;
        document.getElementById("communcenb").innerText = communcenb + ' ';
        document.getElementById("com_nb").value = communcenb + ' ';

        $.ajax({
            url: "<?php echo site_url('csv/csv_info/get_village'); ?>",
            data: {"id": id},
            type: 'POST',
            success: function (data) {
                var sc = '<option> </option>';
                $.each(data, function (key, val) {
                    sc += '<option value="' + val.id + '" data-vil="' + val.v_khmer + '">' + val.v_khmer + '</option>';
                });
                $("#v_village option").remove();
                $("#v_village").append(sc);
            }
        });
    });

    // address 1
    $('#btnsubmitnb1').click(function () {
        var homenb = document.getElementById("num_home1").value;
        document.getElementById("homenb1").innerText = homenb + ' ';
        document.getElementById("home_nb1").value = homenb + ' ';
        // street
        var streetnb = document.getElementById("streets1").value;
        document.getElementById("streetnb1").innerText = streetnb + ' ';
        document.getElementById("str_nb1").value = streetnb + ' ';
        // v1_village
        var streetnb = document.getElementById("v1_village").value;
        document.getElementById("villagenb1").innerText = streetnb + ' ';
        document.getElementById("vil_nb1").value = streetnb + ' ';
    });
    $('#v1_village').change(function () {
        var villagenb = this.options[this.selectedIndex].innerHTML;
        document.getElementById("villagenb1").innerText = villagenb + ' ';
        document.getElementById("vil_nb1").value = villagenb + ' ';
    });
    $('#p1_province').change(function () {
        var id = document.getElementById("p1_province").value;
        var provincenb1 = this.options[this.selectedIndex].innerHTML;
        document.getElementById("provincenb1").innerText = provincenb1;
        document.getElementById("pro_nb1").value = provincenb1;

        $.ajax({
            url: "<?php echo site_url('csv/csv_info/get_district'); ?>",
            data: {"id": id},
            type: 'POST',
            success: function (data) {
                var sc = '<option> </option>';
                $.each(data, function (key, val) {
                    sc += '<option value="' + val.id + '" data-dis"' + val.dis_khmer + '">' + val.dis_khmer + '</option>';
                });
                $("#d1_district option").remove();
                $("#d1_district").append(sc);
            }
        });
    });

    // load data on commune
    $('#d1_district').change(function () {
        var id = document.getElementById("d1_district").value;
        var districtnb = this.options[this.selectedIndex].innerHTML;
        document.getElementById("districtnb1").innerText = districtnb + ' ';
        document.getElementById("dis_nb1").value = districtnb + ' ';

        $.ajax({
            url: "<?php echo site_url('csv/csv_info/get_commun'); ?>",
            data: {"id": id},
            type: 'POST',
            success: function (data) {
                var sc = '<option> </option>';
                $.each(data, function (key, val) {
                    sc += '<option value="' + val.id + '" data-com="' + val.com_khmer + '">' + val.com_khmer + '</option>';
                });
                $("#c1_commun option").remove();
                $("#c1_commun").append(sc);
            }
        });
    });
    // load data on viilage
    $('#c1_commun').change(function () {
        var id = document.getElementById("c1_commun").value;
        var communcenb = this.options[this.selectedIndex].innerHTML;
        document.getElementById("communcenb1").innerText = communcenb + ',';
        document.getElementById("com_nb1").value = communcenb + ',';

        $.ajax({
            url: "<?php echo site_url('csv/csv_info/get_village'); ?>",
            data: {"id": id},
            type: 'POST',
            success: function (data) {
                var sc = '<option> </option>';
                $.each(data, function (key, val) {
                    sc += '<option value="' + val.id + '" data-vil="' + val.v_khmer + '">' + val.v_khmer + '</option>';
                });
                $("#v1_village option").remove();
                $("#v1_village").append(sc);
            }
        });
    });

 $('#current_province').change(function () {
 get_district1();
 });
 
  $('#current_district').change(function () {
 get_commune1();
 });
    $(function () {

         get_degree();
         get_province();
        get_province1();
        // gender =======
//         $("body").delegate("#gender", "focus", function(e) {
        $.ajax({
            url: "<?= site_url('csv/csv_info/gender') ?>",
            type: "post",
            datatype: "json",
            // async: false,
            beforeSend: function () {
                $('.xmodal').show();
            },
            data: {},
            success: function (data) {
                var value = $('#gender').attr('value');
                if (data.length > 0) {
                    var opt = "<option  value= > </option>";
                    opt += '';
                    $.each(data, function (i, item) {
                        if (item.gender === value) {
                            opt += "<option selected='selected' value='" + value + "'>" + value + "</option>";
                        } else if (item.gender !== value && item.gender !== '0' ) {
//                            if (item.gender != '' && item.gender != null) {
                            opt += "<option  value='" + item.gender + "'>" + item.gender + "</option>";
//                        }
                        }
                    });
                }
                $('#gender').html(opt);
                $('#genderwit').html(opt);
                $('#genderwit1').html(opt);
            },
            error: function () {
            }
        });


//        });
        // nationality =======
        $.ajax({
            url: "<?= site_url('csv/csv_info/nationality') ?>",
            type: "post",
            datatype: "json",
            // async: false,
            beforeSend: function () {
                $('.xmodal').show();
            },
            data: {},
            success: function (data) {
                var value = $('#nationality').attr('value');
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.nationality == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + value + "</option>";
                        } else if (item.nationality != value && item.nationality != '' && item.nationality != null) {
                            opt += "<option value='" + item.nationality + "'>" + item.nationality + "</option>";
                        }
                    });
                }
                $('#nationality').html(opt);
                $('.xmodal').hide();
            },
            error: function () {

            }
        });
        // hus_or_wife =======
        $.ajax({
            url: "<?= site_url('csv/csv_info/hus_or_wife') ?>",
            type: "post",
            datatype: "json",
            // async: false,
            beforeSend: function () {
                $('.xmodal').show();
            },
            data: {},
            success: function (data) {
                var value = $('#hus_or_wife').attr('value');
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    
                    $.each(data, function (i, item) {
                        if (item.hus_or_wife == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + value + "</option>";
                        } else if (item.hus_or_wife != value && item.hus_or_wife != '' && item.hus_or_wife != null) {
                            opt += "<option value='" + item.hus_or_wife + "'>" + item.hus_or_wife + "</option>";
                        }
                    });
                }
                $('#hus_or_wife').html(opt);
                $('.xmodal').hide();
            },
            error: function () {

            }
        });
        $('#back').on('click', function () {
            //window.location = 'javascript:history.go(-1)';
            window.location = 'javascript:history.back()';
        });
        // tabs ============
        $("#tabs").tabs({
            beforeLoad: function (event, ui) {
                ui.jqXHR.error(function () {
                    ui.panel.html(
                            "Couldn't load this tab. We'll try to fix this as soon as possible. " +
                            "If this wouldn't be a demo.");
                });
            }
        });
        // save csv===============


        $("#f_save").on('submit', function (e) {
            total = $("#total").val();

            e.preventDefault();

            var lastname = $('#lastname').val();
            var firstname = $('#firstname').val();
            var dateofbirth = $('#dateofbirth').val();
            //alert(dateofbirth);
            var unit = $('#unit').val();
            var promote_date = $('#promote_date').val();
             //alert(promote_date);
            if (lastname === '') {
                $('#lastname').parent().addClass('has-error');
                swal({
                    title: "ព័ត៌មានមិនគ្រប់គ្រាន",
                    text: "សូម ឆែកទិន្នន័យក្នុងទំរងចុះឈ្មោះ ដែលមាន សញ្ញាផ្កាយ",
                    type: "info"
                });
                return false;
            }
            if (firstname === '') {
                $('#firstname').parent().addClass('has-error');
                swal({
                    title: "ព័ត៌មានមិនគ្រប់គ្រាន",
                    text: "សូម ឆែកទិន្នន័យក្នុងទំរងចុះឈ្មោះ ដែលមាន សញ្ញាផ្កាយ",
                    type: "info"
                });
                return false;
            }


            if (dateofbirth === '') {
                $('#dateofbirth').parent().addClass('has-error');
                swal({
                    title: "ព័ត៌មានមិនគ្រប់គ្រាន",
                    text: "សូម ឆែកទិន្នន័យក្នុងទំរងចុះឈ្មោះ ដែលមាន សញ្ញាផ្កាយ",
                    type: "info"
                });
                return false;

            }

            if (unit === '') {
                $('#current_role_id').parent().addClass('has-error');
                $('#unit').parent().addClass('has-error');
                swal({
                    title: "ព័ត៌មានមិនគ្រប់គ្រាន",
                    text: "សូម ឆែកទិន្នន័យក្នុងទំរងចុះឈ្មោះ ដែលមាន សញ្ញាផ្កាយ",
                    type: "info"
                });
                return false;

            }
            //validate promote_date
//           if (promote_date === '') {
//              $('#promote_date').parent().addClass('has-error');
//                swal({
//                    title: "ព័ត៌មានមិនគ្រប់គ្រាន",
//                    text: "សូម ឆែកទិន្នន័យក្នុងទំរងចុះឈ្មោះ ដែលមាន សញ្ញាផ្កាយ",
//                    type: "info"
//                });
//                return false;
//            }
            $.ajax({
                url: "<?= site_url('csv/csv_info/insert_csv') ?>",
                type: "post",
                datatype: "json",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                enctype: 'multipart/form-data',

                beforeSend: function () {
                    $('.xmodal').html('<div style="position: relative;top: 50%;left: 51%;font-family:khmer mef1;font-size:16px;color:red;">កំពុងតែបញ្ចូល......</div>');
                    $('.xmodal').show();

                },

                success: function (data) {
                    // var id = data.id;
                    swal({
                        title: "ជោគជ័យ",
                        text: "ទិន្នន័យ ត្រូវបានរក្សាទុកដោយជោគជ័យ",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,  
                        timer: 2000
                    });
//                    setTimeout(function () {
//                        window.location.href = "<?php echo site_url('csv/csv_info/edit/') ?>/" + data.id;
//                    }, 3000);

                    /*   var records_d = data.re_d;
                     var records_t = data.re_t;
                     var records_l = data.re_l;
                     var records_m = data.re_m;
                     var records_a = data.re_a;
                     if (id > 0) {
                     $('#id').val(id);
                     }
                     //                      if (ids > 0) {
                     //                        $('#ids').val(ids);
                     //                    }
                     // re-update degree===============
                     /*  var tr = '';
                     if (records_d.length > 0) {
                     $.each(records_d, function (i, item) {
                     tr += '<tr>' +
                     '<td class="d_no">' + (i + 1) + '</td>' +
                     '<td><input type="text" class="form-control degree_level" id="degree_level" name="degree_level[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញកម្រិត" maxlength="255" value="' + item.degree_level + '" /></td>' +
                     '<td><input type="text" class="form-control level" id="level" name="level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញវគ្គឫកម្រិតសិក្សា" maxlength="2" number value="' + item.level + '" /></td>' +
                     '<td><input type="text" class="form-control school" id="school" name="school[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញគ្រឹះស្ថានសិក្សា" maxlength="255" value="' + item.school + '" /></td>' +
                     '<td><input type="text" class="form-control study_place" id="study_place" name="study_place[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញទីកន្លែងសិក្សា" maxlength="255" value="' + item.study_place + '" /></td>' +
                     '<td><input type="text" class="form-control skill" id="skill" name="skill[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញសញ្ញាបត្រឫជំនាញ" maxlength="255"  value="' + item.skill + '" /></td>' +
                     '<td><input type="text" class="form-control study_date datepick" id="study_date' + i + ' " name="study_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំសិក្សា" maxlength="255" value="' + (item.study_date !== "00-00-0000" ? item.study_date : "") + '" /></td>' +
                     '<td><input type="text" class="form-control end_date datepick" id="end_date' + i + ' " name="end_date[]" placeholder=""    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" value="' + (item.end_date !== "00-00-0000" ? item.end_date : "") + '" /></td>' +
                     '<td><input type="text" class="form-control country" id="country" name="country[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញប្រទេស" maxlength="255" value="' + item.country + '" /></td>' +
                     '<td style="text-align: center;"><a href="javascript:void(0)" data-degree_ids="' + item.degree_id + '" class="degree_ids" id="degree_ids">លុប</a><input type="hidden" name="degree_id[]" id="degree_id" value="' + item.degree_id + '" /></td>' +
                     '</tr>';
                     i++;
                     });
                     $('#tbl_degree tbody').html(tr);
                     }
                     // re-update training===============
                     var tr = '';
                     if (records_t.length > 0) {
                     $.each(records_t, function (i, item) {
                     tr += ' <tr>' +
                     '<td class="t_no">' + (i + 1) + '</td>' +
                     '<td><input style="width: 110px;" type="text" class="form-control" id="level_train" name="level_train[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញវគ្គឫកម្រិតសិក្សា" maxlength="255" value="' + item.level_train + '" /></td>' +
                     '<td><input style="width: 110px;" type="text" class="form-control" id="school_train" name="school_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញគ្រឹះស្ថានសិក្សា" maxlength="255" value="' + item.school_train + '" /></td>' +
                     '<td><input style="width: 110px;" type="text" class="form-control" id="place_train" name="place_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញទីកន្លែងសិក្សា" maxlength="255" value="' + item.place_train + '" /></td>' +
                     '<td><input style="width: 110px;" type="text" class="form-control" id="skill_train" name="skill_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញសញ្ញាប័ត្រឫជំនាញ" maxlength="255" value="' + item.skill_train + '" /></td>' +
                     '<td><input style="width: 110px;" type="text" class="form-control datepick" id="start_date_train' + i + ' " name="start_date_train[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចូលសិក្សា" maxlength="255" value="' + (item.start_date_train !== "00-00-0000" ? item.start_date_train : "") + '" /></td>' +
                     '<td><input style="width: 110px;" type="text" class="form-control datepick" id="stop_date_train' + i + ' " name="stop_date_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់សិក្សា" maxlength="255" value="' + (item.stop_date_train !== "00-00-0000" ? item.stop_date_train : "") + '" /></td>' +
                     '<td><input style="width: 100px;" type="text" class="form-control" id="type_train" name="type_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញប្រភេទ" maxlength="255" value="' + item.type_train + '" /></td>' +
                     '<td><input style="width: 100px;" type="text" class="form-control" id="subject_course" name="subject_course[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញមុខវិជ្ជាសិក្សាឫប្រធានបទ" maxlength="255" value="' + item.subject_course + '" /></td>' +
                     '<td style="text-align: center;"><a href="javascript:void(0)" data-train_ids="' + item.train_id + '" class="train_ids" id="train_ids">លុប</a><input type="hidden" name="train_id[]" id="train_id" value="' + item.train_id + '" /></td>' +
                     '</tr>';
                     i++;
                     });
                     $('#tbl_train tbody').html(tr);
                     }
                     // re-update language===============
                     var tr = '';
                     if (records_l.length > 0) {
                     $.each(records_l, function (i, item) {
                     tr += ' <tr>' +
                     '<td class="l_no">' + (i + 1) + '</td>' +
                     '<td><input type="text" class="form-control" id="language" name="language[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញភាសាបរទេស" maxlength="255" value="' + item.language + '" /></td>' +
                     '<td><input type="text" class="form-control" id="read" name="read[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការអាន" maxlength="255" value="' + item.read + '" /></td>' +
                     '<td><input type="text" class="form-control" id="conversation" name="conversation[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការសន្ទនា" maxlength="255" value="' + item.conversation + '" /></td>' +
                     '<td><input type="text" class="form-control" id="write" name="write[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការសរសេរ" maxlength="255" value="' + item.write + '" /></td>' +
                     '<td style="text-align: center;"><a href="javascript:void(0)" data-language_ids="' + item.language_id + '" class="language_ids" id="language_ids">លុប</a><input type="hidden" name="language_id[]" id="language_id" value="' + item.language_id + '" /></td>' +
                     '</tr>';
                     i++;
                     });
                     $('#tbl_language tbody').html(tr);
                     }
                     // re-update medal===============
                     var tr = '';
                     if (records_m.length > 0) {
                     $.each(records_m, function (i, item) {
                     tr += '<tr>' +
                     '<td class="m_no" style="text-align: center;">' + (i + 1) + '</td>' +
                     '<td><input type="text" class="form-control medal_type" id="medal_type" name="medal_type[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញប្រភេទ" maxlength="255" value="' + item.medal_type + '"  /></td>' +
                     '<td><input type="text" class="form-control class" id="class" name="class[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្នាក់" maxlength="255" value="' + item.class + '"  /></td>' +
                     '<td><input type="text" class="form-control get_date datepick" id="get_date' + i + ' " name="get_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំទទួល" maxlength="255" value="' + (item.get_date !== "00-00-0000" ? item.get_date : "") + '"  /></td>' +
                     '<td style="text-align: center;"><a href="javascript: void(0)"  data-medal_ids="' + item.medal_id + '" class="medal_ids" id="medal_ids">លុប</a><input type="hidden" name="medal_id[]" id="medal_id" value="' + item.medal_id + '" /></td>' +
                     '</tr>';
                     i++;
                     });
                     $('#tbl_medal tbody').html(tr);
                     }
                     // re-update absent===============
                     var tr = '';
                     if (records_a.length > 0) {
                     $.each(records_a, function (i, item) {
                     
                     tr += '<tr>' +
                     '<td class="a_no">' + (i + 1) + '</td>' +
                     '<td><input type="text" class="form-control datepick startdate" id="startdate' + i + ' " name="startdate[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255"  value="' + (item.startdate !== "00-00-0000" ? item.startdate : "") + '" /></td>' +
                     '<td><input type="text" class="form-control datepick enddate" id="enddate' + i + ' " name="enddate[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255"  value="' + (item.enddate !== "00-00-0000" ? item.enddate : "") + '" /></td>' +
                     '<td><input type="text" class="form-control numberofday" id="numberofday' + i + '" name="numberofday[]" placeholder="" data-toggle="tooltip" data-placement="top" title="ចំនួនថ្ងៃ" maxlength="11" closekey  value="' + item.numberofday + '" /></td>' +
                     '<td><input type="text" class="form-control reason" id="reason" name="reason[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញមូលហេតុ" maxlength="255"  value="' + item.reason + '" /></td>' +
                     '<td style="text-align: center;"><a href="javascript: void(0)"  data-absentids="' + item.absentid + '" class="absentids" id="absentids">លុប</a><input type="hidden" name="absentid[]" id="absentid" value="' + item.absentid + '" /></td></td>' +
                     '</tr>';
                     i++;
                     });
                     $('#tbl_absent tbody').html(tr);
                     }
                     //                    alert('បញ្ចូលរួចរាល់!');
                     */
                    $('.xmodal').hide();
                },
                error: function () {
                    alert("error");
                }
            }); // ajax ========
        });


        // save workhistory===============
        $("#wh_save").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('csv/csv_info/insert_workhistory') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').show();
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
//                    alert(data);
                    var id = data.id - 0;
                    var re_w_h = data.re_w_h;
//                    alert(re_w_h);
                    if (id > 0) {
                        $('#id').val(id);
                    }
//                     re-update work history===============
                    var tr = '';
                    if (re_w_h.length > 0) {
                        $.each(re_w_h, function (i, item) {
                            tr += '<tr>' +
                                    '<td class="wh_no">' + (i + 1) + '</td>' +
                                    '<td><input type="text" class="form-control start_date datepick" id="start_date' + i + ' " name="start_date[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំផ្តើម" maxlength="255" value="' + (item.start_date != "00-00-0000" ? item.start_date : "") + '"  /></td>' +
                                    '<td><input type="text" class="form-control stop_date datepick" id="stop_date' + i + ' " name="stop_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" value="' + (item.stop_date != "00-00-0000" ? item.stop_date : "") + '"  /></td>' +
                                    '<td><input type="text" class="form-control institution" id="institution" name="institution[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញក្រសួង ឫស្ថាប័ន" maxlength="255" value="' + item.institution + '"  /></td>' +
                                    '<td><input type="text" class="form-control department" id="department" name="department[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញនាយកដ្ឋានឫអង្គភាព" maxlength="255" value="' + item.department + '"  /></td>' +
                                    '<td><input type="text" class="form-control officel" id="office" name="office[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការិយាល័យ" maxlength="255" value="' + item.office + '"  /></td>' +
                                    '<td><input type="text" class="form-control position" id="position" name="position[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញមុខតំណែង" maxlength="255" value="' + item.position + '"  /></td>' +
                                    '<td style="text-align: center;"><a href="javascript:void(0)" data-work_history_ids="' + item.work_history_id + '" class="work_history_ids" id="work_history_ids" >លុប</a><input type="hidden" name="work_history_id[]" id="work_history_id" value="' + item.work_history_id + '"  /></td>' +
                                    '</tr>';
                            i++;
                        });
                        $('#tbl_workhistory tbody').html(tr);
                    }

                    alert('បញ្ចូលរួចរាល់!');
                    $('.xmodal').hide();
                },
                error: function () {
                }
            }); // ajax ========
        });
        // save workbydegree===============
        $("#wbd_save").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('csv/csv_info/insert_workbydegree') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').show();
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var id = data.id - 0;
                    var re_workbydegree = data.re_workbydegree;
                    if (id > 0) {
                        $('#id').val(id);
                    }
                    // re-update workbydegree===============
                    var tr = '';
                    if (re_workbydegree.length > 0) {
                        $.each(re_workbydegree, function (i, item) {
                            tr += '<tr>' +
                                    '<td class="wbd_no">' + (i + 1) + '</td>' +
                                    '<td><input type="text" class="form-control old_level" id="old_level" name="old_level[]" placeholder="បំពេញកាំប្រាក់ចាស់"  data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ចាស់" maxlength="255" value="' + item.old_level + '" /></td>' +
                                    '<td><input type="text" class="form-control old_date datepick" id="old_date' + i + ' " name="old_date[]" placeholder="បំពេញថ្ងៃខែឆ្នាំ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" value="' + (item.old_date !== "00-00-0000" ? item.old_date : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control new_level" id="new_level" name="new_level[]" placeholder="បំពេញកាំប្រាក់ថ្មី" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ថ្មី" maxlength="255" value="' + item.new_level + '"  /></td>' +
                                    '<td><input type="text" class="form-control new_date datepick" id="new_date' + i + ' " name="new_date[]" placeholder="បំពេញថ្ងៃខែឆ្នាំ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255"  value="' + (item.new_date !== "00-00-0000" ? item.new_date : "") + '" /></td>' +
                                    '<td style="text-align: center;"><a href="javascript:void(0)" data-wkd_ids="' + item.wkd_id + '" class="wkd_ids" id="wkd_ids" >លុប</a><input type="hidden" name="wkd_id[]" id="wkd_id"  value="' + item.wkd_id + '" /></td>' +
                                    '</tr>';
                            i++;
                        });
                        $('#tbl_workbydegree tbody').html(tr);
                    }
                    alert('បញ្ចូលរួចរាល់!');
                    $('.xmodal').hide();
                },
                error: function () {
                }
            }); // ajax ========
        });
        // save workpromotionhistory===============
        $("#wph_save").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('csv/csv_info/insert_workpromotionhistory') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').show();
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var id = data.id - 0;
                    var re_w_p_history = data.re_w_p_history;
                    if (id > 0) {
                        $('#id').val(id);
                    }
                    // re-update workpromotionhistory ===============
                    var tr = '';
                    if (re_w_p_history.length > 0) {
                        $.each(re_w_p_history, function (i, item) {
                            tr += '<tr>' +
                                    '<td class="wph_no">' + (i + 1) + '</td>' +
                                    '<td><input type="text" class="form-control oldlevel" id="oldlevel" name="oldlevel[]" placeholder="បំពេញកាំប្រាក់ចាស់"  data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ចាស់" maxlength="255" value="' + item.oldlevel + '" /></td>' +
                                    '<td><input type="text" class="form-control olddate datepick" id="olddate' + i + ' " name="olddate[]" placeholder="បំពេញថ្ងៃខែឆ្នាំ"    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" value="' + (item.olddate !== "00-00-0000" ? item.olddate : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control newlevel" id="newlevel" name="newlevel[]" placeholder="បំពេញកាំប្រាក់ថ្មី" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ថ្មី" maxlength="255" value="' + item.newlevel + '" /></td>' +
                                    '<td><input type="text" class="form-control newdate datepick" id="newdate' + i + ' " name="newdate[]" placeholder="បំពេញថ្ងៃខែឆ្នាំ"    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" value="' + (item.newdate !== "00-00-0000" ? item.newdate : "") + '" /></td>' +
                                    '<td style="text-align: center;"><a href="javascript:void(0)" data-wkph_is_ids="' + item.wkph_is_id + '" class="wkph_is_ids" id="wkph_is_ids">លុប</a><input  type="hidden" name="wkph_is_id[]" id="wkph_is_id" value="' + item.wkph_is_id + '" /></td>' +
                                    '</tr>';
                            i++;
                        });
                        $('#tbl_workpromotionhistory tbody').html(tr);
                    }
                    alert('បញ្ចូលរួចរាល់!');
                    $('.xmodal').hide();
                },
                error: function () {
                }
            }); // ajax ========
        });
        // save workclasspromotehistory===============
        $("#wcph_save").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('csv/csv_info/insert_workclasspromotehistory') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').show();
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var id = data.id - 0;
                    var re_workclasspromotehistory = data.re_workclasspromotehistory;
                    if (id > 0) {
                        $('#id').val(id);
                    }
                    // re-update workclasspromotehistory ===============
                    var tr = '';
                    if (re_workclasspromotehistory.length > 0) {
                        $.each(re_workclasspromotehistory, function (i, item) {
                            tr += '<tr>' +
                                    '<td class="wcph_no">' + (i + 1) + '</td>' +
                                    '<td><input type="text" class="form-control" id="title" name="title[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញមុខតំណែងឫឋានន្តរសក្តិ" maxlength="255" value="' + item.title + '" /></td>' +
                                    '<td><input type="text" class="form-control" id="level_cph" name="level_cph[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញឋានន្តរសក្តិ" maxlength="255" value="' + item.level_cph + '" /></td>' +
                                    '<td><input type="text" class="form-control" id="rank" name="rank[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់" maxlength="255" value="' + item.rank + '" /></td>' +
                                    '<td><input type="text" class="form-control datepick" id="date' + i + ' " name="date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" value="' + (item.date !== "00-00-0000" ? item.date : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control" id="framework" name="framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញក្របខ័ណ្ឌ" maxlength="255" value="' + item.framework + '" /></td>' +
                                    '<td><input type="text" class="form-control" id="class_level" name="class_level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្នាក់" maxlength="255" value="' + item.class_level + '" /></td>' +
                                    '<td style="text-align: center;"><a href="javascript:void(0)"  data-wkh_is_ids="' + item.wkh_is_id + '" class="wkh_is_ids" id="wkh_is_ids">លុប</a><input class="wkh_is_id" type="hidden" name="wkh_is_id[]" id="wkh_is_id" value="' + item.wkh_is_id + '" /></td>' +
                                    '</tr>';
                            i++;
                        });
                        $('#tbl_workclasspromotehistory tbody').html(tr);
                    }
                    alert('បញ្ចូលរួចរាល់!');
                    $('.xmodal').hide();
                },
                error: function () {
                }
            }); // ajax ========
        });
        // save worktranfer===============
        $("#wt_save").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('csv/csv_info/insert_worktransfer') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').show();
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var id = data.id - 0;
                    var re_worktransfer = data.re_worktransfer;
                    if (id > 0) {
                        $('#id').val(id);
                    }
                    // re-update worktransfer ===============
                    var tr = '';
                    if (re_worktransfer.length > 0) {
                        $.each(re_worktransfer, function (i, item) {
                            tr += '<tr>' +
                                    '<td class="wt_no">' + (i + 1) + '</td>' +
                                    '<td><input type="text" class="form-control role" id="role" name="role[]" placeholder="បំពេញតួនាទី"  data-toggle="tooltip" data-placement="top" title="បំពេញតួនាទី" maxlength="255" value="' + item.role + '" /></td>' +
                                    '<td><input type="text" class="form-control date_transfer datepick" id="date_transfer ' + i + ' " name="date_transfer[]" placeholder="បំពេញថ្ងៃខែឆ្នាំផ្ទេរ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំផ្ទេរ" maxlength="255" value="' + (item.date_transfer !== "00-00-0000" ? item.date_transfer : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control to_role" id="to_role" name="to_role[]" placeholder="បំពេញទៅតួនាទី" data-toggle="tooltip" data-placement="top" title="បំពេញទៅតួនាទី" maxlength="255" value="' + item.to_role + '" /></td>' +
                                    '<td><input type="text" class="form-control statusl" id="status" name="status[]" placeholder="បំពេញលក្ខណៈនៃការផ្ទេរ" data-toggle="tooltip" data-placement="top" title="បំពេញលក្ខណៈនៃការផ្ទេរ" maxlength="255" value="' + item.status + '" /></td>' +
                                    '<td style="text-align: center;"><a href="javascript:void(0)" data-wkt_ids="' + item.wkt_id + '" id="wkt_ids" class="wkt_ids">លុប</a><input class="form-control wkt_id" type="hidden" name="wkt_id[]" id="wkt_id"  value="' + item.wkt_id + '" /></td>' +
                                    '</tr>';
                            i++;
                        });
                        $('#tbl_worktransfer tbody').html(tr);
                    }
                    alert('បញ្ចូលរួចរាល់!');
                    $('.xmodal').hide();
                },
                error: function () {
                }
            }); // ajax ========
        });
        // save workframeworkout===============
        $("#wkfw_save").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('csv/csv_info/insert_workframeworkout') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').show();
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var id = data.id - 0;
                    var re_workframeworkout = data.re_workframeworkout;
                    if (id > 0) {
                        $('#id').val(id);
                    }
                    // re-update workframeworkout ===============
                    var tr = '';
                    if (re_workframeworkout.length > 0) {
                        $.each(re_workframeworkout, function (i, item) {
                            tr += '<tr>' +
                                    '<td class="wkfw_no">' + (i + 1) + '</td>' +
                                    '<td><input type="text" class="form-control start_date2 datepick" id="start_date2 ' + i + ' " name="start_date2[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" value="' + (item.start_date2 !== "00-00-0000" ? item.start_date2 : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control stop_date2 datepick" id="stop_date2 ' + i + ' " name="stop_date2[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" value="' + (item.stop_date2 !== "00-00-0000" ? item.stop_date2 : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control title_framework" id="title_framework" name="title_framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញតួនាទី" maxlength="255" value="' + item.title_framework + '" /></td>' +
                                    '<td><input type="text" class="form-control institution_framework" id="institution_framework" name="institution_framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញស្ថាប័ន" maxlength="255" value="' + item.institution_framework + '" /></td>' +
                                    '<td><input type="text" class="form-control note_framework" id="note_framework" name="note_framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="សំគាល់" maxlength="255" value="' + item.note_framework + '" /></td>' +
                                    '<td style="text-align: center;"><a href="javascript:void(0)" data-wkfw_ids="' + item.wkfw_id + '" id="wkfw_ids" class="wkfw_ids" >លុប</a><input class="form-control wkfw_id" type="hidden" name="wkfw_id[]" id="wkfw_id" value="' + item.wkfw_id + '" /></td>' +
                                    '</tr>';
                            i++;
                        });
                        $('#tbl_workframeworkout tbody').html(tr);
                    }
                    alert('បញ្ចូលរួចរាល់!');
                    $('.xmodal').hide();
                },
                error: function () {
                }
            }); // ajax ========
        });
        // save worknamedeleting===============
        $("#wd_save").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('csv/csv_info/insert_worknamedeleting') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').show();
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var id = data.id - 0;
                    var re_worknamedeleting = data.re_worknamedeleting;
                    if (id > 0) {
                        $('#id').val(id);
                    }
                    // re-update  worknamedeleting===============
                    var tr = '';
                    if (re_worknamedeleting.length > 0) {
                        $.each(re_worknamedeleting, function (i, item) {
                            tr += '<tr>' +
                                    '<td class="wnd_no">' + (i + 1) + '</td>' +
                                    '<td><input type="text" class="form-control regulation_start_date datepick" id="regulation_start_date' + i + ' " name="regulation_start_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើមដាប់បញ្ញត្តិ" maxlength="255" value="' + (item.regulation_start_date !== "00-00-0000" ? item.regulation_start_date : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control regulation_stop_date datepick" id="regulation_stop_date' + i + ' " name="regulation_stop_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់ដាប់បញ្ញត្តិ" maxlength="255" value="' + (item.regulation_stop_date !== "00-00-0000" ? item.regulation_stop_date : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control deleting_accouncement_date datepick" id="deleting_accouncement_date' + i + ' " name="deleting_accouncement_date[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំប្រកាស" maxlength="255" value="' + (item.deleting_accouncement_date !== "00-00-0000" ? item.deleting_accouncement_date : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control deleting_date datepick" id="deleting_date' + i + ' " name="deleting_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំលុប"    maxlength="255" value="' + (item.deleting_date !== "00-00-0000" ? item.deleting_date : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control reason_deleting" id="reason_deleting" name="reason_deleting[]" placeholder="" data-toggle="tooltip" data-placement="top" title="មូលហេតុ" maxlength="255" value="' + item.reason_deleting + '" /></td>' +
                                    ' <td style="text-align: center;"><a href="javascript:void(0)" data-wknd_ids="' + item.wknd_id + '" id="wknd_ids" class="wknd_ids">លុប</a><input class="form-control wknd_id" type="hidden" name="wknd_id[]" id="wknd_id" value="' + item.wknd_id + '" /></td>' +
                                    '</tr>';
                            i++;
                        });
                        $('#tbl_worknamedeleting tbody').html(tr);
                    }
                    alert('បញ្ចូលរួចរាល់!');
                    $('.xmodal').hide();
                },
                error: function () {
                }
            }); // ajax ========
        });
        // save workfreesalary===============
        $("#wkf_save").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('csv/csv_info/insert_workfreesalary') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').show();
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var id = data.id - 0;
                    var re_wkf_salary = data.re_wkf_salary;
                    if (id > 0) {
                        $('#id').val(id);
                    }
                    // re-update  workfreesalary===============
                    var tr = '';
                    if (re_wkf_salary.length > 0) {
                        $.each(re_wkf_salary, function (i, item) {
                            tr += '<tr>' +
                                    '<td class="wkf_no">' + (i + 1) + '</td>' +
                                    '<td><input type="text" class="form-control start_date3 datepick" id="start_date3' + i + ' " name="start_date3[]" placeholder=""    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" value="' + (item.start_date3 !== "00-00-0000" ? item.start_date3 : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control stop_date3 datepick" id="stop_date3' + i + ' " name="stop_date3[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់"  maxlength="255" value="' + (item.stop_date3 !== "00-00-0000" ? item.stop_date3 : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control note_frees_alary" id="note_frees_alary" name="note_frees_alary[]" placeholder="" data-toggle="tooltip" data-placement="top" title="សំគាល់"  maxlength="255" value="' + item.note_frees_alary + '" /></td>' +
                                    '<td style="text-align: center;"><a href="javascript:void(0)" data-wkf_salary_ids="' + item.wkf_salary_id + '" id="wkf_salary_ids" class="wkf_salary_ids">លុប</a><input class="wkf_salary_id" type="hidden" name="wkf_salary_id[]" id="wkf_salary_id" value="' + item.wkf_salary_id + '" /></td>' +
                                    '</tr>';
                            i++;
                        });
                        $('#tbl_workfreesalary tbody').html(tr);
                    }
                    alert('បញ្ចូលរួចរាល់!');
                    $('.xmodal').hide();
                },
                error: function () {
                }
            }); // ajax ========
        });
        // save worktitlelevel===============
        $("#wkt_save").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('csv/csv_info/insert_worktitlelevel') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').show();
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var id = data.id - 0;
                    var re_wkt_level = data.re_wkt_level;
                    if (id > 0) {
                        $('#id').val(id);
                    }
                    // re-update  worktitlelevel===============
                    var tr = '';
                    if (re_wkt_level.length > 0) {
                        $.each(re_wkt_level, function (i, item) {
                            tr += '<tr>' +
                                    '<td class="wkt_no">' + (i + 1) + '</td>' +
                                    '<td><input type="text" class="form-control current_title" id="current_title" name="current_title[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញមុខងារបច្ចុប្បន្ន" maxlength="255" value="' + item.current_title + '" /></td>' +
                                    '<td><input type="text" class="form-control seniority_date datepick" id="seniority_date' + i + ' " name="seniority_date[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំអតីតភាព" maxlength="255" value="' + (item.seniority_date !== "00-00-0000" ? item.seniority_date : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control number_of_seniority" id="number_of_seniority" name="number_of_seniority[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញចំនួនឆ្នាំអតីតភាព" maxlength="11" number value="' + item.number_of_seniority + '" /></td>' +
                                    '<td><input type="text" class="form-control level_title" id="level_title" name="level_title[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកម្រិត" maxlength="255" value="' + item.level_title + '" /></td>' +
                                    '<td><input type="text" class="form-control date_title datepick" id="date_title' + i + ' " name="date_title[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ"   maxlength="255" value="' + (item.date_title !== "00-00-0000" ? item.date_title : "") + '" /></td>' +
                                    '<td style="text-align: center;"><a href="javascript:void(0)" data-wktl_ids="' + item.wktl_id + '" id="wktl_ids" class="wktl_ids">លុប</a><input class="wktl_id" type="hidden" name="wktl_id[]" id="wktl_id" value="' + item.wktl_id + '" />' +
                                    '</tr>';
                            i++;
                        });
                        $('#tbl_worktitlelevel tbody').html(tr);
                    }
                    alert('បញ្ចូលរួចរាល់!');
                    $('.xmodal').hide();
                },
                error: function () {
                }
            }); // ajax ========
        });
        // save children===============
        $("#child_save").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('csv/csv_info/insert_children') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').show();
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    //alert('បញ្ចូលរួចរាល!');
//                    var id = data.id - 0;
//                    var re_childrened = data.re_childrened;
//                    if (id > 0) {
//                        $('#id').val(id);
//                    }
                    // re-update  children===============
//                    var tr = '';
//                    if (re_childrened.length > 0) {
//                        $.each(re_childrened, function (i, item) {
//                            var dateofbirth_child=(item.dateofbirth_child).toString('dd-MM-yyyy');
//                            tr += '<tr>' +
//                                    '<td class="ch_no" style="text-align: center;">' + (i + 1) + '</td>' +
//                                    '<td><input type="text" class="form-control childname" id="childname" name="childname[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញឈ្មោះកូន" maxlength="255" value="' + item.childname + '" /></td>' +
//                                    '<td><input class="form-control gender_child" type="text" id="gender_child' + i + '" name="gender_child[]" data-toggle="tooltip" data-placement="top" placeholder="" title="ជ្រើសរើសភេទ"   value="' + item.gender_child + '" /></td>' +
//                                    '<td><input type="text" class="form-control dateofbirth_child " id="dateofbirth_child' + i + ' " name="dateofbirth_child[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំកំណើត" maxlength="255" value="' + dateofbirth_child + '" /></td>' + 
//                                    '<td><input type="text" class="form-control child_job" id="child_job' + i + ' " name="child_job[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញមុខរបរ" maxlength="255" value="' + item.child_job + '" /></td>' +
//                                    '<td style="text-align: center;"><a href="javascript:void(0)" data-child_ids="' + item.child_id + '" id="child_ids" class="child_ids">លុប</a><input class="child_id" type="hidden" name="child_id[]" id="child_id" value="' + item.child_id + '" /></td>' +
//                                    '</tr>';
//                            i++;
//                        });
//                        $('#tbl_children tbody').html(tr);
//                    }
                    alert('បញ្ចូលរួចរាល់!');
                    $('.xmodal').hide();
                },
                error: function () {
                alert('បញ្ចូលNo!');
                 $('.xmodal').hide();
                }
            }); // ajax ========
        });

        // save witnesses===============
        $("#witnesses_save").on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('csv/csv_info/insert_witnesses') ?>",
                type: "post",
                datatype: "json",
                beforeSend: function () {
                    $('.xmodal').show();
                },
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var id = data.id - 0;
                    var re_childrened = data.re_childrened;
                    if (id > 0) {
                        $('#id').val(id);
                    }
                    // re-update  witnesses===============
                    var tr = '';
                    if (re_childrened.length > 0) {
                        $.each(re_childrened, function (i, item) {
                            tr += '<tr>' +
                                    '<td class="ch_no" style="text-align: center;">' + (i + 1) + '</td>' +
                                    '<td><input type="text" class="form-control dateofbirth_child datepick" id="wit_name' + i + ' " name="wit_name[]" placeholder="ឈ្មោះអ្នកដឹងឭ"  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំកំណើត" maxlength="255" value="' + (item.wit_name !== "00-00-000" ? item.wit_name : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control date_start_child datepick" id="job' + i + ' " name="job[]" placeholder="ការងារ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចូល" maxlength="255" value="' + (item.job !== "00-00-0000" ? item.date_start_child : "") + '" /></td>' +
                                    '<td><input type="text" class="form-control date_stop_child datepick" id="address' + i + ' " name="address[]" placeholder="អាសយដ្ឋាន"    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" value="' + (item.province !== "00-00-0000" ? item.date_stop_child : "") + '" /></td>' +
                                    '<td style="text-align: center;"><a href="javascript:void(0)" data-child_ids="' + item.wit_id + '" id="wit_id" class="wit_id">លុប</a><input class="wit_id" type="hidden" name="wit_id[]" id="wit_id" value="' + item.wit_id + '" /></td>' +
                                    '</tr>';
                            i++;
                        });
                        $('#tbl_witnesses tbody').html(tr);
                    }
                    alert('បញ្ចូលរួចរាល់!');
                    $('.xmodal').hide();
                },
                error: function () {
                }
            }); // ajax ========
        });
        // full name ==========
        $('#firstname').on('keyup', function (e) {
            var code = (e.keyCode || e.which);
//            alert(code);
            if (code == 9 || code == 8 || code == 16 || code == 27 || code == 32 || code == 35 || code == 36 || code == 37 || code == 38 || code == 39 || code == 40 || code == 46) {
                return;
            } else {
                var node = $(this);
                node.val(node.val().replace(/[a-z A-Z ;''"""0-9/*+-|}!#$%&()]/g, ''));
                $('#khmer_full_name').val(fullname());
            }
        });
        $('#lastname').on('keyup', function (e) {
            var code = (e.keyCode || e.which);
            if (code == 9 || code == 8 || code == 16 || code == 27 || code == 32 || code == 35 || code == 36 || code == 37 || code == 38 || code == 39 || code == 40 || code == 46) {
                return;
            } else {
                var node = $(this);
                node.val(node.val().replace(/[a-z A-Z ;''"""0-9/*+-|}!#$%&()]/g, ''));
                $('#khmer_full_name').val(fullname());
            }
        });

        // f. full name ========
        function fullname() {
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            return lastname + ' ' + firstname;
        }

        // f. english full name
        $('#english_full_name').keyup(function (e) {
            var code = (e.keyCode || e.which);
//            alert(code);
            if (code == 9 || code == 8 || code == 16 || code == 27 || code == 32 || code == 35 || code == 36 || code == 37 || code == 38 || code == 39 || code == 40 || code == 46) {
                return;
            } else {
                $(this).val($(this).val().toUpperCase());
                var node = $(this);
                node.val(node.val().replace(/[^A-Z ]/g, '-'));
            }
        });

        // add degree ===========
        $("#lbl_addrow_degree").on("click", function (e) {
            new_row_degree();
        });
        // add train ===========
        $("#lbl_addrow_train").on("click", function (e) {
            new_row_train();
        });
        // add language =========
        $("#lbl_addrow_language").on("click", function (e) {
            new_row_language();
        });
        // add medal ===========
        $("#lbl_addrow_medal").on("click", function (e) {
            new_row_medal();
        });
        // add absent ===========
        $("#lbl_addrow_absent").on("click", function (e) {
            new_row_absent();
        });
        // add work_history ===========
        $("#lbl_addrow_workhistory").on("click", function (e) {
            new_row_workhistory();
        });
        // add workbydegree ===========
        $("#lbl_addrow_workbydegree").on("click", function (e) {
            new_row_workbydegree();
        });
        // add workpromotionhistory ===========
        $("#lbl_addrow_workpromotionhistory").on("click", function (e) {
            new_row_workpromotionhistory();
        });
        // add workclasspromotehistory ===========
        $("#lbl_addrow_workclasspromotehistory").on("click", function (e) {
            new_row_workclasspromotehistory();
        });
        // add worktransfer ===========
        $("#lbl_addrow_worktransfer").on("click", function (e) {
            new_row_worktransfer();
        });
        // add workframeworkout ===========
        $("#lbl_addrow_workframeworkout").on("click", function (e) {
            new_row_workframeworkout();
        });
        // add worknamedeleting ===========
        $("#lbl_addrow_worknamedeleting").on("click", function (e) {
            new_row_worknamedeleting();
        });
        // add workfreesalary ===========
        $("#lbl_addrow_workfreesalary").on("click", function (e) {
            new_row_workfreesalary();
        });
        // add worktitlelevel ===========
        $("#lbl_addrow_worktitlelevel").on("click", function (e) {
            new_row_worktitlelevel();
        });
        // add children ===========
        $("#lbl_addrow_children").on("click", function (e) {
            new_row_children();
        });

        // add transfer ===========
        $("#lbl_addrow_transfer").on("click", function (e) {
            new_row_tranfer();
        });
        // add activity=============
        $("#lbl_addrow_activity").on("click", function (e) {
            new_row_activity();
        });
        // get district===============
        $('body').delegate("#province", "change", function () {
            f_district();
        });
        // get commune===============
        $('body').delegate("#district", "change", function () {
            f_commune();
        });
        // photo =============
        $("#pdf").on("change", function (e) {
            if ($(this).val() != '') {
                readURLPDF(this);
            } else {
                $('#file').removeAttr('src');
            }
        });
        // photo =============
        $("#photo").on("change", function (e) {
            if ($(this).val() != '') {
                readURL(this);
            } else {
                $('#img').removeAttr('src');
            }
        });
        // del. degree =========
        $('body').delegate(".degree_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var degree_ids = tr.find('.degree_ids').data('degree_ids') - 0;
            if (degree_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_degree') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {degree_ids: degree_ids},
                        success: function (d) {
                            // alert(d);
                            tr.remove();
                            $('.d_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {

                        }

                    });
                }
            } else {
                tr.remove();
                $('.d_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. train =========
        $('body').delegate(".train_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var train_ids = tr.find('.train_ids').data('train_ids') - 0;
            if (train_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_train') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {train_ids: train_ids},
                        success: function (d) {
                            // alert(d);
                            tr.remove();
                            $('.t_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {

                        }

                    });
                }
            } else {
                tr.remove();
                $('.t_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. language =========
        $('body').delegate(".language_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var language_ids = tr.find('.language_ids').data('language_ids') - 0;
            if (language_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_language') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {language_ids: language_ids},
                        success: function (d) {
                            // alert(d);
                            tr.remove();
                            $('.l_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {

                        }

                    });
                }
            } else {
                tr.remove();
                $('.l_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. medal =========
        $('body').delegate(".medal_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var medal_ids = tr.find('.medal_ids').data('medal_ids') - 0;
            if (medal_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_medal') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {medal_ids: medal_ids},
                        success: function (d) {
                            // alert(d);
                            tr.remove();
                            $('.m_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {

                        }

                    });
                }
            } else {
                tr.remove();
                $('.m_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. absent =========
        $('body').delegate(".absentids", "click", function (e) {
            var tr = $(this).parent().parent();
            var absentids = tr.find('.absentids').data('absentids') - 0;
            if (absentids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_absent') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {absentids: absentids},
                        success: function (d) {
                            // alert(d);
                            tr.remove();
                            $('.a_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {

                        }

                    });
                }
            } else {
                tr.remove();
                $('.a_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. work history =========
        $('body').delegate(".work_history_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var work_history_ids = tr.find('.work_history_ids').data('work_history_ids') - 0;
            if (work_history_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_workhistory') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {work_history_ids: work_history_ids},
                        success: function (d) {
                            // alert(d);
                            tr.remove();
                            $('.wh_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {

                        }

                    });
                }
            } else {
                tr.remove();
                $('.wh_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. workbydegree =========
        $('body').delegate(".wkd_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var wkd_ids = tr.find('.wkd_ids').data('wkd_ids') - 0;
            if (wkd_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_workbydegree') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {wkd_ids: wkd_ids},
                        success: function (d) {
                            // alert(d);
                            tr.remove();
                            $('.wbd_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {

                        }

                    });
                }
            } else {
                tr.remove();
                $('.wbd_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
// del. workpromotionhistory =========
        $('body').delegate(".wkph_is_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var wkph_is_ids = tr.find('.wkph_is_ids').data('wkph_is_ids') - 0;
            if (wkph_is_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_workpromotionhistory') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {wkph_is_ids: wkph_is_ids},
                        success: function (d) {
                            // alert(d);
                            tr.remove();
                            $('.wph_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {

                        }

                    });
                }
            } else {
                tr.remove();
                $('.wph_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. workclasspromotehistory =========
        $('body').delegate(".wkh_is_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var wkh_is_ids = tr.find('.wkh_is_ids').data('wkh_is_ids') - 0;
            if (wkh_is_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_workclasspromotehistory') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {wkh_is_ids: wkh_is_ids},
                        success: function (d) {
                            // alert(d);
                            tr.remove();
                            $('.wcph_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {

                        }

                    });
                }
            } else {
                tr.remove();
                $('.wcph_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. worktransfer =========
        $('body').delegate(".wkt_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var wkt_ids = tr.find('.wkt_ids').data('wkt_ids') - 0;
            if (wkt_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_worktransfer') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {wkt_ids: wkt_ids},
                        success: function (d) {
                            // alert(d);
                            tr.remove();
                            $('.wt_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {

                        }

                    });
                }
            } else {
                tr.remove();
                $('.wt_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. workframeworkout =========
        $('body').delegate(".wkfw_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var wkfw_ids = tr.find('.wkfw_ids').data('wkfw_ids') - 0;
            if (wkfw_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_workframeworkout') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {wkfw_ids: wkfw_ids},
                        success: function (d) {
                            tr.remove();
                            $('.wkfw_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {

                        }

                    });
                }
            } else {
                tr.remove();
                $('.wkfw_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. worknamedeleting =========
        $('body').delegate(".wknd_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var wknd_ids = tr.find('.wknd_ids').data('wknd_ids') - 0;
            if (wknd_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_worknamedeleting') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {wknd_ids: wknd_ids},
                        success: function (d) {
                            tr.remove();
                            $('.wnd_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {
                        }
                    });
                }
            } else {
                tr.remove();
                $('.wnd_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. workfreesalary =========
        $('body').delegate(".wkf_salary_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var wkf_salary_ids = tr.find('.wkf_salary_ids').data('wkf_salary_ids') - 0;
            if (wkf_salary_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_workfreesalary') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {wkf_salary_ids: wkf_salary_ids},
                        success: function (d) {
                            tr.remove();
                            $('.wkf_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {
                        }
                    });
                }
            } else {
                tr.remove();
                $('.wkf_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. worktitlelevel =========
        $('body').delegate(".wktl_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var wktl_ids = tr.find('.wktl_ids').data('wktl_ids') - 0;
            if (wktl_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_worktitlelevel') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {wktl_ids: wktl_ids},
                        success: function (d) {
                            tr.remove();
                            $('.wkt_no').each(function (i) {
                                $(this).html(i + 1);
                            });
                            $('.xmodal').hide();
                        },
                        error: function () {
                        }
                    });
                }
            } else {
                tr.remove();
                $('.wkt_no').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // del. children =========
        $('body').delegate(".child_ids", "click", function (e) {
            var tr = $(this).parent().parent();
            var child_ids = tr.find('.child_ids').data('child_ids') - 0;
            if (child_ids > 0) {
                if (confirm('តើអ្នកពិតជាលុប?')) {
                    $.ajax({
                        url: '<?= site_url('csv/csv_info/delete_children') ?>',
                        type: 'post',
                        datatype: 'html',
                        // async: false,
                        beforeSend: function () {
                            $('.xmodal').show();
                        },
                        data: {child_ids: child_ids},
                        success: function (d) {
                            tr.remove();
                            $('.ch_no1').each(function (i) {
                                //alert(i);
                                $(this).html(i + 1);
                            });
                          $('.xmodal').hide();
                        },
                        error: function () {
                        }
                    });
                }
            } else {
                tr.remove();
                $('.ch_no1').each(function (i) {
                    $(this).html(i + 1);
                });
            }
            return false;
        });
        // disable button===
        var id = $('#id').val() - 0;
        if (id == 0) {
            $('#my_div').find(':input').prop('disabled', true);
            $('#dis_child').find(':input').prop('disabled', true);
        }

        // disable button============
        $("#btnsave").on("click", function (e) {
            $('#my_div').find(':input').prop('disabled', false);
            $('#dis_child').find(':input').prop('disabled', false);
            var pure_salary = 0;
            pure_salary += Number($('#index_multiply').val()) * Number($('#index_salary').val());
            $('#pure_salary').val(pure_salary);
            var total = 0;
            total += Number($('#pure_salary').val()) +
                    Number($('#title_yearly').val()) +
                    Number($('#more_than_child15').val()) +
                    Number($('#family_assistant').val()) +
                    Number($('#additional_salary').val()) +
                    Number($('#assistant_evidence').val()) +
                    Number($('#adviser_evidence').val()) +
                    Number($('#additional_expire').val()) +
                    Number($('#remind_salary').val());
            $('#total').val(total);
            var total_dolar = 0;
            total_dolar += Number($('#total').val()) / Number($('#exchange').val());
            $('#total_in_dollar').val(total_dolar);
        });
        //====absent days======
        $('.enddate').on('change', function () {
            var end = 20;
            var star = 10;
            var minutes = 1000 * 60;
            var hours = minutes * 60;
            var days = hours * 24;
            var years = days * 365;
            $('.reason').each(function (i) {
                i++;
                var tr = $(this).parent().parent();
                end = tr.find('#enddate' + i + '').val();
                star = tr.find('#startdate' + i + '').val();
                var day = Date.parse(end) - Date.parse(star);
                var day_ab = day / days;
                $('#numberofday' + i + '').val(day_ab);
            });
        });

        $('#btnreport').on('click', function (e) {
            var id = $('#id').val();
            if (id - 0 > 0) {
                var params = [
                    'height=' + screen.height,
                    'width=' + screen.width,
                    'fullscreen=yes',
                    'modal=yes'
                ];
                var divToPrint = document.getElementById('print_biology');
                var popupWin = window.open('', '_blank', params); // var popupWin = window.open('', '_blank', 'width=800,height=600'); // width=800,height=500
                popupWin.moveTo(0, 0);
                popupWin.document.open();
                popupWin.document.write('<html><head><title></title></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
                popupWin.print();
                popupWin.close();
            }
        });
        // data-toggle tooltip============
        $("body").delegate("", "mouseover", function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        // datetime=========
        $('body').delegate(".datepick", "focus", function (e) {
            dateTimeall();
        });
        // effect==============
        $("#btneffectbirth").click(function () {
            runEffect();
            $("i", this).toggleClass("glyphicon glyphicon-circle-arrow-up glyphicon glyphicon-circle-arrow-down");
        });
        $("#btneffectplace").click(function () {
            runEffectplace();
            $("i", this).toggleClass("glyphicon glyphicon-circle-arrow-up glyphicon glyphicon-circle-arrow-down");
        });
        $("#btneffectfamily").click(function () {
            runEffectfamily();
            $("i", this).toggleClass("glyphicon glyphicon-circle-arrow-up glyphicon glyphicon-circle-arrow-down");
        });
        // get main id for workhistory============
        $("#btnworkhistory").on("click", function () {
            var id = $('#id').val();
            $('#id_wh').val(id);
        });
        // get main id for workbydegree============
        $("#btnworkbydegree").on("click", function () {
            var id = $('#id').val();
            $('#id_wbd').val(id);
        });
        // get main id for workpromotionhistory============
        $("#btnworkpromotionhistory").on("click", function () {
            var id = $('#id').val();
            $('#id_wph').val(id);
        });
        // get main id for workclasspromotehistory============
        $("#btnworkclasspromotehistory").on("click", function () {
            var id = $('#id').val();
            $('#id_wcph').val(id);
        });
        // get main id for worktransfer============
        $("#btnworktransfer").on("click", function () {
            var id = $('#id').val();
            $('#id_wt').val(id);
        });
        // get main id for workframeworkout============
        $("#btnworkframeworkout").on("click", function () {
            var id = $('#id').val();
            $('#id_wkfw').val(id);
        });
        // get main id for worknamedelete============
        $("#btnworknamedelete").on("click", function () {
            var id = $('#id').val();
            $('#id_wd').val(id);
        });
        // get main id for workfreesalary============
        $("#btnworkfreesalary").on("click", function () {
            var id = $('#id').val();
            $('#id_wkf').val(id);
        });
        // get main id for worktitlelevel============
        $("#btnworktitlelevel").on("click", function () {
            var id = $('#id').val();
            $('#id_wkt').val(id);
        });
        // get main id for children============
        $("#btnchildren").on("click", function () {
            var id = $('#id').val();
            $('#id_ch').val(id);
            
        });
        // get id for pdf
        $("#btnpdf").on("click", function () {
            var id = $('#id').val();
            $('#id_pdf').val(id);
        });
        // csv report==========
        $.ajax({
            url: '<?= site_url('csv/csv_report/print_biology') ?>',
            type: 'post',
            datatype: 'json',
            async: true,
            data: {id: id},
            success: function (data) {
                $('.print_biology').html(data);
            }
        });
        list_salary();
    }); // ready f. =============


//    // autocom gender_child ============
//    $("body").delegate(".gender_child", "focus", function (e) {
//        $(this).autocomplete({
//            minLength: 0,
//            autoFocus: true,
//            delay: 0,
//            source: function (request, response) {
//                $.ajax({
//                    url: "<?= site_url('csv/csv_info/gender_children') ?>",
//                    type: "post",
//                    datatype: "json",
//                    async: false,
////                    beforeSend: function() {
////                        $('.xmodal').show();
////                    },
//                    data: {
//                        q: request.term
//                    },
//                    success: function (data) {
//                        response($.map(data.slice(0, 15), function (i, item) {
//                            return {
//                                label: i.gender_child,
//                                value: item.gender_child
//                            };
//                        }));
//                    },
//                    error: function () {
//
//                    }
//                });
//            }
//        });
//    });
    //auto com corrent role============
    $("body").delegate("#current_role", "focus", function (e) {
        $(this).autocomplete({
            minLength: 0,
            autoFocus: true,
            delay: 0,
            source: function (request, response) {
                $.ajax({
                    url: "<?= site_url('csv/csv_info/current_role') ?>",
                    type: "post",
                    datatype: "json",
                    async: false,
//                    beforeSend: function() {
//                        $('.xmodal').show();
//                    },
                    data: {
                        q: request.term
                    },
                    success: function (data) {
                        response($.map(data.slice(0, 15), function (i, item) {
                            return {
                                label: i.current_role,
                                value: item.current_role
                            };
                        }));
                    },
                    error: function () {

                    }
                });
            }
        });
    });

    //auto com current role for biology============
    $("body").delegate("#current_role_for_biology", "focus", function (e) {
        $(this).autocomplete({
            minLength: 0,
            autoFocus: true,
            delay: 0,
            source: function (request, response) {
                $.ajax({
                    url: "<?= site_url('csv/csv_info/auto_current_role_for_biology') ?>",
                    type: "post",
                    datatype: "json",
                    async: false,
//                    beforeSend: function() {
//                        $('.xmodal').show();
//                    },
                    data: {
                        q: request.term
                    },
                    success: function (data) {
                        response($.map(data.slice(0, 15), function (i, item) {
                            return {
                                label: i.current_role_for_biology,
                                value: item.current_role_for_biology
                            };
                        }));
                    },
                    error: function () {

                    }
                });
            }
        });
    });
    /*delegate unit===============*/
    $('body').delegate("#unit", "change", function () {
        f_land_official();
        f_pro_office();
    });
    /*delegate unit===============*/
    // $('body').delegate("#unit", "change", function () {
    //
    // });
    /*delegate department===============*/
    $('body').delegate("#general_dep_id", "change", function () {
        f_department();
    });
    /*delegate department===============*/
    $('body').delegate("#d_id", "change", function () {
        f_office();
    });
    /*get unit*/
    $.ajax({
        url: "<?php echo site_url('csv/csv_info/opt_unit'); ?>",
        type: 'post',
        datatype: 'json',
        async: false,
        beforeSend: function () {
            $('.xmodal').show();
        },
        data: {},
        success: function (data) {
            var value = $('#unit').attr('value');
            if (data.length > 0) {
                var opt = '';
                opt += '<option></option>';
                $.each(data, function (i, item) {
                    if (item.id == value) {
                        opt += "<option selected='selected' value='" + value + "'>" + item.unit + "</option>";
                    } else if (item.id != value && item.id != '' && item.id != null) {
                        opt += '<option value="' + item.id + '">' + item.unit + '</option>';
                    }
                });
            }
            $('#unit').html(opt);
            f_land_official();
            f_pro_office();
            $('.xmodal').hide();
        },
        error: function () {
        }
    });
    /*get general department*/
    $.ajax({
        url: "<?php echo site_url('csv/csv_info/opt_gd'); ?>",
        type: 'post',
        datatype: 'json',
        async: false,
        beforeSend: function () {
            $('.xmodal').show();
        },
        data: {},
        success: function (data) {
            var value = $('#general_dep_id').attr('value');
            if (data.length > 0) {
                var opt = '';
                opt += '<option></option>';
                $.each(data, function (i, item) {
                    if (item.general_dep_id == value) {
                        opt += "<option selected='selected' value='" + value + "'>" + item.general_deps_name + "</option>";
                    } else if (item.general_dep_id != value && item.general_dep_id != '' && item.general_dep_id != null) {
                        opt += '<option value="' + item.general_dep_id + '">' + item.general_deps_name + '</option>';
                    }
                });
            }
            $('#general_dep_id').html(opt);
            f_department();
            $('.xmodal').hide();
        },
        error: function () {
        }
    });

    /*get deparment */
    function f_department() {
        var general_dep_id = $('#general_dep_id').val();
//        alert(general_dep_id);
        $.ajax({
            url: '<?= site_url('csv/csv_info/opt_dp') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {general_dep_id: general_dep_id},
            success: function (data) {
                var value = $('#d_id').attr('value');
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.d_id == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + item.d_name + "</option>";
                        } else {
                            opt += '<option value="' + item.d_id + '">' + item.d_name + '</option>';
                        }
                    });
                }
                $('#d_id').html(opt);
                f_office();
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            },
            error: function () {
            }
        });
    }

    /*get offfice */
    function f_office() {
        var d_id = $('#d_id').val();
        $.ajax({
            url: '<?= site_url('csv/csv_info/opt_offices') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {d_id: d_id},
            success: function (data) {
                var value = $('#work_office').attr('value');
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.id == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + item.office + "</option>";
                        } else {
                            opt += '<option value="' + item.id + '">' + item.office + '</option>';
                        }
                    });
                }
                $('#work_office').html(opt);
//               f_land_official();
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            },
            error: function () {
            }
        });
    }

    /*get province offfice */
    function f_pro_office() {
        var unit = $('#unit').val();
        $.ajax({
            url: '<?= site_url('csv/csv_info/opt_pro_offices') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {unit: unit},
            success: function (data) {
                var value = $('#province_office').attr('value');
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.id == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + item.office + "</option>";
                        } else {
                            opt += '<option value="' + item.id + '">' + item.office + '</option>';
                        }
                    });
                }
                $('#province_office').html(opt);
//               f_land_official();
                // var xtotal_display = $('#s_dis').val() - 0;
                // grid(1, xtotal_display);
            },
            error: function () {
            }
        });
    }

    /*get offfice */
    function f_land_official() {
        var unit = $('#unit').val();
        $.ajax({
            url: '<?= site_url('csv/csv_info/opt_land_official') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {unit: unit},
            success: function (data) {
                var value = $('#land_official').attr('value');
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.id == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + item.land_official + "</option>";
                        } else {
                            opt += '<option value="' + item.id + '">' + item.land_official + '</option>';
                        }
                    });
                }
                $('#land_official').html(opt);
//                var xtotal_display = $('#s_dis').val() - 0;
//                grid(1, xtotal_display);
            },
            error: function () {
            }
        });
    }

    // get provinces =============
    $.ajax({
        url: '<?= site_url('csv/csv_info/opt_province') ?>',
        type: 'post',
        datatype: 'json',
        async: false,
        beforeSend: function () {
            $('.xmodal').show();
        },
        data: {},
        success: function (data) {
            var value = $('#province').attr('value');
            if (data.length > 0) {
                var opt = '';
                opt += '<option></option>';
                $.each(data, function (i, item) {
                    if (item.id == value) {
                        opt += "<option selected='selected' value='" + value + "'>" + item.khmer_name + "</option>";
                    } else if (item.id != value && item.id != '' && item.id != null) {
                        opt += '<option value="' + item.id + '">' + item.khmer_name + '</option>';
                    }

                });
            }
            $('#province').html(opt);
            f_district();
            $('.xmodal').hide();
        },
        error: function () {
        }
    });

    function f_district() {
        //             var province = $('#province').val();
                    //alert("province: "& province);
        var province = $('#province').val();
        $.ajax({
            url: '<?= site_url('csv/csv_info/opt_district') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {province: province},
            success: function (data) {
                var value = $('#district').attr('value');
                //                               alert(value);
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.dis_code === value) {
                            opt += "<option selected='selected' value='" + value + "'>" + item.dis_khmer + "</option>";
                        } else {
                            opt += '<option value="' + item.dis_code + '">' + item.dis_khmer + '</option>';
                        }
                    });
                }
                $('#district').html(opt);
                f_commune();
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            },
            error: function () {
            }
        });
    }

    // f.commune========
    function f_commune() {
        var province = $('#province').val();
        var district = $('#district').val();
        $.ajax({
            url: '<?= site_url('csv/csv_info/opt_commune') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {province: province, district: district},
            success: function (data) {
                var value = $('#commune').attr('value');
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.com_code == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + item.com_khmer + "</option>";
                        } else {
                            opt += '<option value="' + item.com_code + '">' + item.com_khmer + '</option>';
                        }
                    });
                }
                $('#commune').html(opt);
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            },
            error: function () {
            }
        });
    }

    //auto com work_location============
    $("body").delegate("#work_location", "focus", function (e) {
        $(this).autocomplete({
            minLength: 0,
            autoFocus: true,
            delay: 0,
            source: function (request, response) {
                $.ajax({
                    url: "<?= site_url('csv/csv_info/auto_work_location') ?>",
                    type: "post",
                    datatype: "json",
                    async: false,
//                    beforeSend: function() {
//                        $('.xmodal').show();
//                    },
                    data: {
                        q: request.term
                    },
                    success: function (data) {
                        response($.map(data.slice(0, 15), function (i, item) {
                            return {
                                label: i.work_location,
                                value: item.work_location
                            };
                        }));
                    },
                    error: function () {

                    }
                });
            }
        });
    });

    //auto com type_of_framework============
    $("body").delegate("#type_of_framework", "focus", function (e) {
        $(this).autocomplete({
            minLength: 0,
            autoFocus: true,
            delay: 0,
            source: function (request, response) {
                $.ajax({
                    url: "<?= site_url('csv/csv_info/auto_type_of_framework') ?>",
                    type: "post",
                    datatype: "json",
                    async: false,
//                    beforeSend: function() {
//                        $('.xmodal').show();
//                    },
                    data: {
                        q: request.term
                    },
                    success: function (data) {
                        response($.map(data.slice(0, 15), function (i, item) {
                            return {
                                label: i.type_of_framework,
                                value: item.type_of_framework
                            };
                        }));
                    },
                    error: function () {

                    }
                });
            }
        });
    });

    //auto com unit============
    $("body").delegate("#unit", "focus", function (e) {
        $(this).autocomplete({
            minLength: 0,
            autoFocus: true,
            delay: 0,
            source: function (request, response) {
                $.ajax({
                    url: "<?= site_url('csv/csv_info/auto_unit') ?>",
                    type: "post",
                    datatype: "json",
                    async: false,
//                    beforeSend: function() {
//                        $('.xmodal').show();
//                    },
                    data: {
                        q: request.term
                    },
                    success: function (data) {
                        response($.map(data.slice(0, 15), function (i, item) {
                            return {
                                label: i.unit,
                                value: item.unit
                            };
                        }));
                    },
                    error: function () {

                    }
                });
            }
        });
    });

    //auto com work_office============
    //    $("body").delegate("#work_office", "focus", function (e) {
    //        $(this).autocomplete({
    //            minLength: 0,
    //            autoFocus: true,
    //            delay: 0,
    //            source: function (request, response) {
    //                $.ajax({
    //                    url: "<?= site_url('csv/csv_info/auto_work_office') ?>",
    //                    type: "post",
    //                    datatype: "json",
    //                    async: false,
    ////                    beforeSend: function() {
    ////                        $('.xmodal').show();
    ////                    },
    //                    data: {
    //                        q: request.term
    //                    },
    //                    success: function (data) {
    //                        response($.map(data.slice(0, 15), function (i, item) {
    //                            return {
    //                                label: i.work_office,
    //                                value: item.work_office
    //                            };
    //                        }));
    //                    },
    //                    error: function () {
    //
    //                    }
    //                });
    //            }
    //        });
    //    });

    //auto com second_role============
    $("body").delegate("#second_role", "focus", function (e) {
        $(this).autocomplete({
            minLength: 0,
            autoFocus: true,
            delay: 0,
            source: function (request, response) {
                $.ajax({
                    url: "<?= site_url('csv/csv_info/auto_second_role') ?>",
                    type: "post",
                    datatype: "json",
                    async: false,
//                    beforeSend: function() {
//                        $('.xmodal').show();
//                    },
                    data: {
                        q: request.term
                    },
                    success: function (data) {
                        response($.map(data.slice(0, 15), function (i, item) {
                            return {
                                label: i.second_role,
                                value: item.second_role
                            };
                        }));
                    },
                    error: function () {

                    }
                });
            }
        });
    });
    //auto com equal_class============
    $("body").delegate("#equal_class", "focus", function (e) {
        $(this).autocomplete({
            minLength: 0,
            autoFocus: true,
            delay: 0,
            source: function (request, response) {
                $.ajax({
                    url: "<?= site_url('csv/csv_info/auto_equal_class') ?>",
                    type: "post",
                    datatype: "json",
                    async: false,
//                    beforeSend: function() {
//                        $('.xmodal').show();
//                    },
                    data: {
                        q: request.term
                    },
                    success: function (data) {
                        response($.map(data.slice(0, 15), function (i, item) {
                            return {
                                label: i.equal_class,
                                value: item.equal_class
                            };
                        }));
                    },
                    error: function () {

                    }
                });
            }
        });
    });

    function list_salary() {
        //level salary==========
        $.ajax({
            url: "<?= site_url('csv/csv_info/level_salary') ?>",
            type: "post",
            datatype: "json",
            // async: false,
            beforeSend: function () {
                $('.xmodal').show();
            },
            data: {},
            success: function (data) {
                var value = $('#salary_level').attr('value');
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.type == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + value + "</option>";
                        } else if (item.type != value && item.type != '' && item.type != null) {
                            opt += "<option  value='" + item.type + "'>" + item.type + "</option>";
                        }
                    });
                }
                $('#salary_level').html(opt);
            },
            error: function () {
            }
        });
    }

    // f.datetime=========
    function dateTimeall() {
        $('.datepick').each(function () {
            $(this).datepicker({
                format: "dd-mm-yyyy",
                startDate: "01-01-1950",
                todayBtn: true,
                language: "kh",
                keyboardNavigation: false,
                calendarWeeks: true,
                autoclose: true,
                todayHighlight: true,
                toggleActive: true
            });
        });
    }

    // f.effect place of birth==========
    function runEffect() {
        $("#effect").toggle("clip", 500);
    }

    // f.effect current of birth==========
    function runEffectplace() {
        $("#effectplace").toggle('1000');
    }

    // f.effect family==========
    function runEffectfamily() {
        $("#effectfamily").toggle('1000');
    }

    // f. image dis. ========
    function readURLPDF(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#pdf')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(170);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // f. image dis. ========
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(170);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // f. new_row_degree ========
    function new_row_degree() {
        var i = $(".d_no").length + 1;
//        var degree_idl = $("#degree_id").val() - 0;
        var new_row = ' <tr>' +
                '<td class="d_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control degree_level" id="degree_level" name="degree_level[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញកម្រិត" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control level" id="level" name="level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញវគ្គឫកម្រិតសិក្សា" maxlength="2" number /></td>' +
                '<td><input type="text" class="form-control school" id="school" name="school[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញគ្រឹះស្ថានសិក្សា" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control study_place" id="study_place" name="study_place[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញទីកន្លែងសិក្សា" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control skill" id="skill" name="skill[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញសញ្ញាបត្រឫជំនាញ" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control " id="study_date' + i + ' " name="study_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញឆ្នាំសិក្សា" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control " id="end_date' + i + ' " name="end_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញឆ្នាំបញ្ចប់" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control country" id="country" name="country[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញប្រទេស" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript:void(0)" data-degree_ids="" class="degree_ids" id="degree_ids">លុប</a><input type="hidden" name="degree_id[]" id="degree_id" /></td>' +
                '</tr>';
        $("#tbl_degree tbody").append(new_row);
    }

    // f. new_row_train ==========
    function new_row_train() {
        var i = $(".t_no").length + 1;
        var new_row = ' <tr>' +
                '<td class="t_no" style="text-align: center;">' + i + '</td>' +
                '<td><input style="width: 110px;" type="text" class="form-control" id="level_train" name="level_train[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញវគ្គឫកម្រិតសិក្សា" maxlength="255" /></td>' +
                '<td><input style="width: 110px;" type="text" class="form-control" id="school_train" name="school_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញគ្រឹះស្ថានសិក្សា" maxlength="255" /></td>' +
                '<td><input style="width: 110px;" type="text" class="form-control" id="place_train" name="place_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញទីកន្លែងសិក្សា" maxlength="255" /></td>' +
                '<td><input style="width: 110px;" type="text" class="form-control" id="skill_train" name="skill_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញសញ្ញាប័ត្រឫជំនាញ" maxlength="255" /></td>' +
                '<td><input style="width: 110px;" type="text" class="form-control datepick" id="start_date_train' + i + ' " name="start_date_train[]" placeholder=""    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចូលសិក្សា" maxlength="255" /></td>' +
                '<td><input style="width: 110px;" type="text" class="form-control datepick" id="stop_date_train' + i + ' " name="stop_date_train[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់សិក្សា" maxlength="255" /></td>' +
                '<td><input style="width: 100px;" type="text" class="form-control" id="type_train" name="type_train[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញប្រភេទ" maxlength="255" /></td>' +
                '<td><input style="width: 100px;" type="text" class="form-control" id="subject_course" name="subject_course[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញមុខវិជ្ជាសិក្សាឫប្រធានបទ" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript:void(0)" data-train_ids="" class="train_ids" id="train_ids">លុប</a><input type="hidden" name="train_id[]" id="train_id" /></td>' +
                '</tr>';
        $("#tbl_train tbody").append(new_row);
    }

    // f. new_row_language =======
    function new_row_language() {
        var i = $(".l_no").length + 1;
        var new_row = ' <tr>' +
                '<td class="l_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control" id="language" name="language[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញភាសាបរទេស" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control" id="read" name="read[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការអាន" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control" id="conversation" name="conversation[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការសន្ទនា" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control" id="write" name="write[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការសរសេរ" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript:void(0)" data-language_ids="" class="language_ids" id="language_ids">លុប</a><input type="hidden" name="language_id[]" id="language_id" /></td>' +
                '</tr>';
        $("#tbl_language tbody").append(new_row);
    }

    // f. new_row_medal ========
    function new_row_medal() {
        var i = $(".m_no").length + 1;
        var new_row = '<tr>' +
                '<td class="m_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control medal_type" id="medal_type" name="medal_type[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញប្រភេទ" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control class" id="class" name="class[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្នាក់" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control get_date " id="get_date' + i + ' " name="get_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំទទួល" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript: void(0)"  data-medal_ids="" class="medal_ids" id="medal_ids">លុប</a><input type="hidden" name="medal_id[]" id="medal_id" /></td>' +
                '</tr>';
        $("#tbl_medal tbody").append(new_row);
    }

    // f .new_row_absent ========
    function new_row_absent() {
        var i = $(".a_no").length + 1;
        var new_row = '<tr>' +
                '<td class="a_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control datepick startdate" id="startdate' + i + ' " name="startdate[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control datepick enddate" id="enddate' + i + ' " name="enddate[]" placeholder=""    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control numberofday" id="numberofday' + i + '" name="numberofday[]" placeholder="" data-toggle="tooltip" data-placement="top" title="ចំនួនថ្ងៃ" maxlength="11" closekey /></td>' +
                '<td><input type="text" class="form-control reason" id="reason" name="reason[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញមូលហេតុ" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript: void(0)"  data-absentids="" class="absentids" id="absentids">លុប</a><input type="hidden" name="absentid[]" id="absentid" /></td>' +
                '</tr>';
        $("#tbl_absent tbody").append(new_row);
    }

    // f.new_row_workhistory
    function new_row_workhistory() {
        var i = $(".wh_no").length + 1;
        var new_row = '<tr>' +
                '<td class="wh_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control start_date " id="start_date' + i + ' " name="start_date[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំផ្តើម" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control stop_date " id="stop_date' + i + ' " name="stop_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control institution" id="institution" name="institution[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញក្រសួង ឫស្ថាប័ន" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control department" id="department" name="department[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញនាយកដ្ឋានឫអង្គភាព" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control officel" id="office" name="office[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញការិយាល័យ" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control position" id="position" name="position[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញមុខតំណែង" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript:void(0)" data-work_history_ids="" class="work_history_ids" id="work_history_ids" >លុប</a><input type="hidden" name="work_history_id[]" id="work_history_id" /></td>' +
                '</tr>';
        $("#tbl_workhistory tbody").append(new_row);
    }

    // f.new_row_workbydegree
    function new_row_workbydegree() {
        var i = $(".wbd_no").length + 1;
        var new_row = '<tr>' +
                '<td class="wbd_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control old_level" id="old_level" name="old_level[]" placeholder="បំពេញកាំប្រាក់ចាស់"  data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ចាស់" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control old_date datepick" id="old_date' + i + ' " name="old_date[]" placeholder="បំពេញថ្ងៃខែឆ្នាំ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control new_level" id="new_level" name="new_level[]" placeholder="បំពេញកាំប្រាក់ថ្មី" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ថ្មី" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control new_date datepick" id="new_date' + i + ' " name="new_date[]" placeholder="បំពេញថ្ងៃខែឆ្នាំ" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript:void(0)" data-wkd_ids="" class="wkd_ids" id="wkd_ids" >លុប</a><input type="hidden" name="wkd_id[]" id="wkd_id" /></td>' +
                '</tr>';
        $("#tbl_workbydegree tbody").append(new_row);
    }

    // f.new_row_workpromotionhistory
    function new_row_workpromotionhistory() {
        var i = $(".wph_no").length + 1;
        var new_row = '<tr>' +
                '<td class="wph_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control oldlevel" id="oldlevel" name="oldlevel[]" placeholder="បំពេញកាំប្រាក់ចាស់"  data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ចាស់" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control olddate datepick" id="olddate' + i + ' " name="olddate[]" placeholder="បំពេញថ្ងៃខែឆ្នាំ"    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control newlevel" id="newlevel" name="newlevel[]" placeholder="បំពេញកាំប្រាក់ថ្មី" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់ថ្មី" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control newdate datepick" id="newdate' + i + ' " name="newdate[]" placeholder="បំពេញថ្ងៃខែឆ្នាំ"    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript:void(0)" data-wkph_is_ids="" class="wkph_is_ids" id="wkph_is_ids">លុប</a><input  type="hidden" name="wkph_is_id[]" id="wkph_is_id" /></td>' +
                '</tr>';
        $("#tbl_workpromotionhistory tbody").append(new_row);
    }

    // f.new_row_workclasspromotehistory
    function new_row_workclasspromotehistory() {
        var i = $(".wcph_no").length + 1;
        var new_row = '<tr>' +
                '<td class="wcph_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control" id="title" name="title[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញមុខតំណែងឫឋានន្តរសក្តិ" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control" id="level_cph" name="level_cph[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញឋានន្តរសក្តិ" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control" id="rank" name="rank[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកាំប្រាក់" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control datepick" id="date' + i + ' " name="date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control" id="framework" name="framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញក្របខ័ណ្ឌ" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control" id="class_level" name="class_level[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្នាក់" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript:void(0)"  data-wkh_is_ids="" class="wkh_is_ids" id="wkh_is_ids">លុប</a><input class="wkh_is_id" type="hidden" name="wkh_is_id[]" id="wkh_is_id" /></td>' +
                '</tr>';
        $("#tbl_workclasspromotehistory tbody").append(new_row);
    }

    // f.new_row_worktransfer
    function new_row_worktransfer() {
        var i = $(".wt_no").length + 1;
        var new_row = '<tr>' +
                '<td class="wt_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control role" id="role" name="role[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញតួនាទី" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control date_transfer datepick" id="date_transfer' + i + ' " name="date_transfer[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំផ្ទេរ" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control to_role" id="to_role" name="to_role[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញទៅតួនាទី" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control statusl" id="status" name="status[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញលក្ខណៈនៃការផ្ទេរ" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript:void(0)" data-wkt_ids="" id="wkt_ids" class="wkt_ids">លុប</a><input class="form-control wkt_id" type="hidden" name="wkt_id[]" id="wkt_id"  /></td>' +
                '</tr>';
        $("#tbl_worktransfer tbody").append(new_row);
    }

    // f.new_row_workframeworkout
    function new_row_workframeworkout() {
        var i = $(".wkfw_no").length + 1;
        var new_row = '<tr>' +
                '<td class="wkfw_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control start_date2 datepick" id="start_date2' + i + ' " name="start_date2[]" placeholder=""     data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control stop_date2 datepick" id="stop_date2' + i + ' " name="stop_date2[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control title_framework" id="title_framework" name="title_framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញតួនាទី" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control institution_framework" id="institution_framework" name="institution_framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញស្ថាប័ន" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control note_framework" id="note_framework" name="note_framework[]" placeholder="" data-toggle="tooltip" data-placement="top" title="សំគាល់" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript:void(0)" data-wkfw_ids="" id="wkfw_ids" class="wkfw_ids" >លុប</a><input class="form-control wkfw_id" type="hidden" name="wkfw_id[]" id="wkfw_id" /></td>' +
                '</tr>';
        $("#tbl_workframeworkout tbody").append(new_row);
    }

    // f.new_row_workframeworkout
    function new_row_worknamedeleting() {
        var i = $(".wnd_no").length + 1;
        var new_row = '<tr>' +
                '<td class="wnd_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control regulation_start_date datepick" id="regulation_start_date' + i + ' " name="regulation_start_date[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើមដាប់បញ្ញត្តិ" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control regulation_stop_date datepick" id="regulation_stop_date' + i + ' " name="regulation_stop_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់ដាប់បញ្ញត្តិ" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control deleting_accouncement_date datepick" id="deleting_accouncement_date' + i + ' " name="deleting_accouncement_date[]" placeholder="បំពេញថ្ងៃខែឆ្នាំប្រកាស"  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំប្រកាស" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control deleting_date datepick" id="deleting_date' + i + ' " name="deleting_date[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំលុប"    maxlength="255" /></td>' +
                '<td><input type="text" class="form-control reason_deleting" id="reason_deleting" name="reason_deleting[]" placeholder="មូលហេតុ" data-toggle="tooltip" data-placement="top" title="មូលហេតុ" maxlength="255" /></td>' +
                ' <td style="text-align: center;"><a href="javascript:void(0)" data-wknd_ids="" id="wknd_ids" class="wknd_ids">លុប</a><input class="form-control wknd_id" type="hidden" name="wknd_id[]" id="wknd_id" placeholder="លេខរៀង" maxlength="11" /></td>' +
                '</tr>';
        $("#tbl_worknamedeleting tbody").append(new_row);
    }

    // f.new_row_workfreesalary
    function new_row_workfreesalary() {
        var i = $(".wkf_no").length + 1;
        var new_row = '<tr>' +
                '<td class="wkf_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control start_date3 datepick" id="start_date3' + i + ' " name="start_date3[]" placeholder=""    data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំចាប់ផ្តើម" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control stop_date3 datepick" id="stop_date3' + i + ' " name="stop_date3[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំបញ្ចប់"  maxlength="255" /></td>' +
                '<td><input type="text" class="form-control note_frees_alary" id="note_frees_alary" name="note_frees_alary[]" placeholder="" data-toggle="tooltip" data-placement="top" title="សំគាល់"  maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript:void(0)" data-wkf_salary_ids="" id="wkf_salary_ids" class="wkf_salary_ids">លុប</a><input class="wkf_salary_id" type="hidden" name="wkf_salary_id[]" id="wkf_salary_id" /></td>' +
                '</tr>';
        $("#tbl_workfreesalary tbody").append(new_row);
    }

    // f.new_row_worktitlelevel
    function new_row_worktitlelevel() {
        var i = $(".wkt_no").length + 1;
        var new_row = '<tr>' +
                '<td class="wkt_no" style="text-align: center;">' + i + '</td>' +
                '<td><input type="text" class="form-control current_title" id="current_title" name="current_title[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញមុខងារបច្ចុប្បន្ន" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control seniority_date datepick" id="seniority_date' + i + ' " name="seniority_date[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំអតីតភាព" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control number_of_seniority" id="number_of_seniority" name="number_of_seniority[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញចំនួនឆ្នាំអតីតភាព" maxlength="11" number /></td>' +
                '<td><input type="text" class="form-control level_title" id="level_title" name="level_title[]" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញកម្រិត" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control date_title datepick" id="date_title' + i + ' " name="date_title[]" placeholder=""   data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំ" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript:void(0)" data-wktl_ids="" id="wktl_ids" class="wktl_ids">លុប</a><input class="wktl_id" type="hidden" name="wktl_id[]" id="wktl_id" />' +
                '</tr>';
        $("#tbl_worktitlelevel tbody").append(new_row);
    }

    // f.new_row_children========
    function new_row_children() {
        var i = $(".ch_no1").length + 1;
        //alert($(".ch_no1").length);
        var new_row = '<tr>' +
                '<td class="ch_no1" style="text-align: center;" class="auto_id">' + i + '</td>' +
                '<td><input type="text" class="form-control childname" id="childname" name="childname[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញឈ្មោះកូន" maxlength="255" /></td>' +
                '<td><select class="form-control gender_child" id="gender_child' + i + ' " name="gender_child[]" data-toggle="tooltip" data-placement="top" placeholder="" title="ជ្រើសរើសភេទ" >  <option value="ប្រុស">ប្រុស</option><option value="ស្រី">ស្រី</option>/></select></td> ' +
                '<td><input type="text" class="form-control dateofbirth_child " id="dateofbirth_child' + i + ' " name="dateofbirth_child[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="បំពេញថ្ងៃខែឆ្នាំកំណើត3333" maxlength="255" /></td>' +
                '<td><input type="text" class="form-control child_job" id="child_job" name="child_job[]" placeholder=""  data-toggle="tooltip" data-placement="top" title="មុខរបរ" maxlength="255" /></td>' +
                '<td style="text-align: center;"><a href="javascript:void(0)" data-child_ids="" id="child_ids" class="child_ids">លុប</a><input class="child_id" type="hidden" name="child_id[]" id="child_id" /></td>' +
                '</tr>';
        $("#tbl_children tbody").append(new_row);
    }

    $(function () {
        //ui-tabs-vertical
        $("#tabss").tabs().addClass(" ui-helper-clearfix");
        $("#tabss li").removeClass("ui-corner-top").addClass("ui-corner-left");
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
 // php  vichiet hide and show 

        var idcsv = document.getElementById("id").value;

        if (idcsv == 0) {
            document.getElementById("dis_ble").disabled = true;
            // document.getElementById("salary_dis").disabled = true;
            document.getElementById("grade_dis").disabled = true;
            document.getElementById("course_dis").disabled = true;
        } else {
            document.getElementById("dis_ble").disabled = false;
            // document.getElementById("salary_dis").disabled = false;
            document.getElementById("grade_dis").disabled = false;
            document.getElementById("course_dis").disabled = false;
        }
    }
    );

    /*get department*/
    //    $('#general_dep_id').change(function () {
    //        var general_dep_id = document.getElementById("general_dep_id").value;
    //        $.ajax({
    //            url: "<?php echo site_url('csv/csv_info/opt_dp'); ?>",
    //            data: {"general_dep_id": general_dep_id},
    //            type: 'POST',
    //            success: function (data) {
    //                var sc = '<option> </option>';
    //                $.each(data, function (key, val) {
    //                    sc += '<option  value="' + val.d_id + '" data-dis"' + val.d_name + '">' + val.d_name + '</option>';
    //                });
    //                $("#d_id option").remove();
    //                $("#d_id").append(sc);
    //            }
    //        });
    //    });
    /*end get general dep*/
    /*get office*/
    //    $('#d_id').change(function () {
    //        var d_id = document.getElementById("d_id").value;
    //        $.ajax({
    //            url: "<?php echo site_url('csv/csv_info/opt_offices'); ?>",
    //            data: {"d_id": d_id},
    //            type: 'POST',
    //            success: function (data) {
    //                var sc = '<option> </option>';
    //                $.each(data, function (key, val) {
    //                    sc += '<option value="' + val.id + '" data-dis"' + val.office + '">' + val.office + '</option>';
    //                });
    //                $("#work_office option").remove();
    //                $("#work_office").append(sc);
    //            }
    //        });
    //    });
</script>
<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    $('.iframe-btn').fancybox({
        'width': 900,
        'height': 600,
        'type': 'iframe',
        'autoScale': false
    });

    function responsive_filemanager_callback(field_id) {
        console.log(field_id);
        var url = jQuery('#' + field_id).val();
        var filev = " <a  href='<?php echo base_url() ?>assets/csv/files/" + url + "'   class=' embed' id='pdf'></a>";
        $("#document-refer").html(filev);
        $('a.embed').gdocsViewer();
        $('#embedURL').gdocsViewer();
    }

    $('#unit').on('change', function () {
        var unit_id = $(this).val();
        if (unit_id === '1') {
            $('#province_office').parent().parent().hide();
            $('#land_official').parent().parent().hide();
            $('#general_dep_id').parent().parent().show();
            $('#d_id').parent().parent().show();
            $('#work_office').parent().parent().show();
        } else {
            $('#province_office').parent().parent().show();
            $('#land_official').parent().parent().show();
            $('#general_dep_id').parent().parent().hide();
            $('#d_id').parent().parent().hide();
            $('#work_office').parent().parent().hide();

        }
    });
    $(function () {
       
        $.ajax({
            url: '<?= site_url('csv/csv_info/get_ministry') ?>',
            type: 'post',
            datatype: 'json',
            beforeSend: function () {
                $('.xmodal').show();
            },
            data: {},

            success: function (data) {
                var record = data;
                var select = '';
                if (record.length > 0) {
                    select += "<option value='0'>ផ្សេងៗ</option>";
                    $.each(record, function (i, row) {
                        select += "<option value='" + row.id + "'>" + row.name_ministry + "</option>";
                    });
                    $('#transfer_from').html(select);
                }
                $('.xmodal').hide();
            }
        });
    });

    function get_province(){
    $.ajax({
            url: '<?= site_url('csv/csv_info/get_province') ?>',
            type: 'post',
            datatype: 'json',
            beforeSend: function () {
               // $('.xmodal').show();
            },
            data: {},

            success: function (data) {
                 var value = $('#province').attr('value');
                var record = data;
                var opt = '<option value> </option>';
                if (record.length > 0) {
                    
                    $.each(record, function (i, row) {
                        
                         if (row.id == value) {
                        opt += "<option selected='selected' value='" + value + "'>" + row.khmer_name + "</option>";
                    } else if (row.id != value && row.id != '' && row.id != null) {
                        opt += '<option value="' + row.id + '">' + row.khmer_name + '</option>';
                    }
                        
                        
                        
                    });
                }
               $('#province').html(opt);
              
              get_district();
           
            }
                
               // $('.xmodal').hide();
            });
        }
        
            function get_district() {
        //             var province = $('#province').val();
                   
        var province = $('#province').val();
         //alert('ddd' &  province);
        $.ajax({
            url: '<?= site_url('csv/csv_info/opt_district') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {province: province},
            success: function (data) {
                var value = $('#district').attr('value');
                //                               alert(value);
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.dis_code == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + item.dis_khmer + "</option>";
                        } else {
                            opt += '<option value="' + item.dis_code + '">' + item.dis_khmer + '</option>';
                        }
                    });
                }
                $('#district').html(opt);
                
                get_commune();
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            },
            error: function () {
            }
        });
    }

    // get.commune========
    function get_commune() {
        var province = $('#province').val();
        var district = $('#district').val();
        $.ajax({
            url: '<?= site_url('csv/csv_info/opt_commune') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {province: province, district: district},
            success: function (data) {
                var value = $('#commune').attr('value');
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.com_code == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + item.com_khmer + "</option>";
                        } else {
                            opt += '<option value="' + item.com_code + '">' + item.com_khmer + '</option>';
                        }
                    });
                }
                $('#commune').html(opt);
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            },
            error: function () {
            }
        });
    }
        
        function get_province1(){
    $.ajax({
            url: '<?= site_url('csv/csv_info/get_province1') ?>',
            type: 'post',
            datatype: 'json',
            beforeSend: function () {
               // $('.xmodal').show();
            },
            data: {},

            success: function (data) {
                 var value = $('#current_province').attr('value');
                 //alert(data);
                var record = data;
                var opt = '<option value> </option>';
                if (record.length > 0) {
                    
                    $.each(record, function (i, row) {
                        
                         if (row.id == value) {
                        opt += "<option selected='selected' value='" + value + "'>" + row.khmer_name + "</option>";
                            } else if (row.id != value && row.id != '' && row.id != null) {
                        opt += '<option value="' + row.id + '">' + row.khmer_name + '</option>';
                                                     }
                        
                        
                        
                    });
                }
               $('#current_province').html(opt);
              
              get_district1();
           
            }
                
               // $('.xmodal').hide();
            });
        }
        
            function get_district1() {
        //             var province = $('#province').val();
                    //alert("province: "& province);
        var current_province = $('#current_province').val();
         //alert(province);
        $.ajax({
            url: '<?= site_url('csv/csv_info/opt_district') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {province: current_province},
            success: function (data) {
                var value = $('#current_district').attr('value');
                                          // alert(value);
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.dis_code == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + item.dis_khmer + "</option>";
                        } else {
                            opt += '<option value="' + item.dis_code + '">' + item.dis_khmer + '</option>';
                        }
                    });
                }
                $('#current_district').html(opt);
                
                get_commune1();
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            },
            error: function () {
            }
        });
    }

    // get.commune========
    function get_commune1() {
        var current_province = $('#current_province').val();
        var current_district = $('#current_district').val();
        $.ajax({
            url: '<?= site_url('csv/csv_info/opt_commune') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {province: current_province, district: current_district},
            success: function (data) {
                var value = $('#current_commune').attr('value');
                if (data.length > 0) {
                    var opt = '';
                    opt += '<option></option>';
                    $.each(data, function (i, item) {
                        if (item.com_code == value) {
                            opt += "<option selected='selected' value='" + value + "'>" + item.com_khmer + "</option>";
                        } else {
                            opt += '<option value="' + item.com_code + '">' + item.com_khmer + '</option>';
                        }
                    });
                }
                $('#current_commune').html(opt);
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            },
            error: function () {
            }
        });
    }  
        
        
          function get_degree(){
    $.ajax({
            url: '<?= site_url('csv/csv_info/get_degree') ?>',
            type: 'post',
            datatype: 'json',
            beforeSend: function () {
               // $('.xmodal').show();
            },
            data: {},

            success: function (data) {
                 var value = $('#cbo-degree').attr('value');
                var record = data;
                var opt = '<option value> </option>';
                if (record.length > 0) {
                    
                    $.each(record, function (i, row) {
                        
                         if (row.id == value) {
                        opt += "<option selected='selected' value='" + value + "'>" + row.khmer_level + "</option>";
                    } else if (row.id != value && row.id != '' && row.id != null) {
                        opt += '<option value="' + row.id + '">' + row.khmer_level + '</option>';
                    }
                        
                        
                        
                    });
                }
                $('#cbo-degree').html(opt);
              
            }
                
               // $('.xmodal').hide();
            });
        }
    

</script>
<style>
    .ui-tabs-vertical {
        width: 79.2em;
    }

    .ui-autocomplete {
        position: absolute;
        z-index: 1060;

    }

    .btncolor1 {
        background-color: hsl(0, 0%, 80%) !important;
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#e5e5e5", endColorstr="#cccccc");
        background-image: -khtml-gradient(linear, left top, left bottom, from(#e5e5e5), to(#cccccc));
        background-image: -moz-linear-gradient(top, #e5e5e5, #cccccc);
        background-image: -ms-linear-gradient(top, #e5e5e5, #cccccc);
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #e5e5e5), color-stop(100%, #cccccc));
        background-image: -webkit-linear-gradient(top, #e5e5e5, #cccccc);
        background-image: -o-linear-gradient(top, #e5e5e5, #cccccc);
        background-image: linear-gradient(#e5e5e5, #cccccc);
        border-color: #cccccc #cccccc hsl(0, 0%, 77.5%);
        color: #333 !important;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.16);
        -webkit-font-smoothing: antialiased;
    }

    .btncolor {
        background-color: hsl(0, 0%, 78%) !important;
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#f9f9f9", endColorstr="#c6c6c6");
        background-image: -khtml-gradient(linear, left top, left bottom, from(#f9f9f9), to(#c6c6c6));
        background-image: -moz-linear-gradient(top, #f9f9f9, #c6c6c6);
        background-image: -ms-linear-gradient(top, #f9f9f9, #c6c6c6);
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f9f9f9), color-stop(100%, #c6c6c6));
        background-image: -webkit-linear-gradient(top, #f9f9f9, #c6c6c6);
        background-image: -o-linear-gradient(top, #f9f9f9, #c6c6c6);
        background-image: linear-gradient(#f9f9f9, #c6c6c6);
        border-color: #c6c6c6 #c6c6c6 hsl(0, 0%, 73%);
        color: #333 !important;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.33);
        -webkit-font-smoothing: antialiased;
    }

    #photo:hover {
        background: blue;
        position: absolute;
    }

</style>
<script type="text/javascript" src="<?= base_url('assets/bs/js/jquery.gdocsviewer.js') ?>"></script>
