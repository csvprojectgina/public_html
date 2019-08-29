<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />

<style media="screen">
    .panel-title > a{
        color: #498fcc !important;
        font-size: 16px;
        margin-top: -10px;
        margin-right: -16px;
        padding: 5px;
        border-top-left-radius: 0px;
        border-down-left-radius: 0px;
        /*background: #ddd;*/
    }
    .remove-file, #add-field{
        cursor: pointer;
    }
    .remove-file i{
        color: red;
    }
    .panel-title a
    {

    }

</style>

    <div class="panel panel-default">
        <div class="panel-heading thumbnail btn-group">
            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />? --><?= t('ព័ត៌មានមន្ត្រី ត្រូវសុំឡើងថ្នាក់ និង ឋានន្តរស័ក្តិ') ?></h3>
        </div>
        <div class="panel-body">
            <div style="margin: -10px 0 40px 0;vertical-align: middle;">
                <span style="float: left;margin: 5px 0 0 0;">
                    <select id="s_dis" style="height: 30px;"></select>
                    <label for="s_dis"><?= t('នាក់') ?></label>
                </span>
                <span class="pull-right">
                    <label for="year" > <?= t('តាមរយៈឆ្នាំ') ?>:</label>
                    <select name="retire_by_year" id="by_year" style="height: 30px;border-radius: 4px;line-height: 4px; width: 80px" >
                        <?php
                        $preyear = date("Y", strtotime("-20 year"));
                        $nowyear = date('Y',strtotime("5 year"));
                        while (strtotime($nowyear) >= strtotime($preyear)) {
                            
                            if($nowyear == date('Y')){
                                $selected = 'selected';
                            }else{
                                $selected = '';
                            }
                            
                            echo "<option value='{$nowyear}'  {$selected}>{$nowyear}</option>";
                            $nowyear -= 1;
                        }
                        ?>
                        <option value="0">--All--</option>

                    </select>
                    <label for="search"><?= t('ស្វែងរក') ?>:</label>

                    <input type="text" id="search" style="height: 30px;border-radius: 4px;line-height: 4px;" />

                    <button type="button" id="print-excel-file" class=" btn btn-info btn-sm" style="height: 30px;"><?= t('ទៅជា Excel') ?></button>
                </span>

            </div>
            <!--            <SPAN ID="BTN-POST" CLASS="BTN BTN-INFO">TEST</SPAN>-->
            <table cellpadding="0" cellspacing="0" border="1" class="table table-hover table-striped table-bordered dt-responsive nowrap" id="my_gr"  data-name="cool-table">
                <thead>
                    <?php
                    $dmid = $this->session->all_userdata()['dmid'];
                    ?>
                    <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">
                        <th style="text-align: center; width: 40px; vertical-align: middle;"><input type="checkbox" name="select-all" id="select-all">
                            <span></span>
                        </th>
                        <th style="text-align: center; width: 120px; vertical-align: middle;"><?= t('អត្តលេខមន្ត្រី') ?></th>
                        <th style="text-align: center; vertical-align: middle;"><?= t('នាម និងគោត្តនាម  ') ?></th>
                        <th style="text-align: center; vertical-align: middle; width: 80px"><?= t('ភេទ') ?></th>
                        <th style="text-align: center;  vertical-align: middle;"><?= t('មុខតំណែង') ?></th>
                        <th style="text-align: center; vertical-align: middle;width: 150px "><?= t('ថ្ងៃ​ ខែ ឆ្នាំ កំណើត') ?></th>
                        <th style="text-align: center;width: 150px"><?= t('ថ្ងៃ​ខែឆ្នាំ ដំឡើងថ្នាក់ ឋានន្តរស័ក្តិចុងក្រោយ') ?></th>
                        <th style="text-align: center; vertical-align: middle; width: 80px"><?= t('បច្ចុប្បន្ន') ?></th>
                        <th style="text-align: center; vertical-align: middle; width: 80px"><?= t('ស្នើសុំ') ?></th>
                        <th style="text-align: center;width:220px"><?= t('លេខព្រះរាជក្រឹត្យ អនុក្រឹត នៃដំឡើងថ្នាក់​ ឋានន្តរស័ក្តិ ចុងក្រោយ') ?></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <table cellpadding="0" cellspacing="0" style="width: 100%;vertical-align: middle;">
                <tr>
                    <td style="text-align: left;"><span id="disp"></span></td>
                    <td style="text-align: right;"><span><ul class="pagination" id="pagination-grid" style="margin-top: 5px;"></ul></span></td>
                </tr>
            </table>
        </div>
    </div>
<form class="form-horizontal"  role="form"  id="multi">
    <div class="panel-group" id="accordion" style=" margin-bottom: 30px">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
         <a data-toggle="collapse" data-parent="#accordion" href="#collapseone" style="color: #797979 !important; margin-left: -13px; margin-top: 3px;" class="collapsed"><?= t('បច្ចុប្បន្នភាព មន្ត្រី ត្រូវឡើងថ្នាក់ និង ឋានន្តរស័ក្តិ') ?></a>
                </h3>
            </div>
            <div class="panel-collapse collapse" id="collapseone">
                <div class="panel-body" >
                    <fieldset>
                        <div class="row">
                           <div class="col-lg-6 col-md-6 form-horizontal">
                                <div class="form-group">
                                    <label class="col-lg-4 col-md-4 text-right" >ថ្ងៃ​ខែឆ្នាំ ដំឡើងថ្នាក់ ឋានន្តរស័ក្តិ</label>
                                    <div class="col-sm-8 col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                                            <input type="text" value="" class="form-control datepick" id="txtdate" name="dateFrom">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-md-4 text-right" >លេខព្រះរាជក្រឹត្យ អនុក្រឹត</label>
                                    <div class="col-lg-8 col-md-8">
                                        <input type="text" class="form-control" id="txtNum" name="txtnum">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-md-4 text-right" ><?php echo t('កំណត់ចំណាំ') ?></label>
                                    <div class="col-lg-8 col-md-8">
                                        <textarea class="form-control" rows="8" name="remark" id="remark"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 col-md-4 text-right"></label>
                                    <div class="col-lg-8 col-md-8">
                                        <span class="btn btn-success" id="btn-submit" name="select-all"><?php echo t('បច្ចុប្បន្នភាព')?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 form-horizontal">
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-2 text-right">ឯកសារយោង</label>
                                    <div class="col-lg-9 col-md-9">
                                        <div class="input-group">
                                            <input id="fieldID2" type="text" name="reference_file[]" value="" class="form-control tag" readonly="">
                                            <span class="input-group-btn">
                                                <a href="<?php echo base_url('') ?>assets/filemanager/dialog.php?type=2&amp;field_id=fieldID2&amp;relative_url=1" class="btn btn-info iframe-btn" type="button">ស្វែងរក</a>
                                            </span>
                                        </div>
                                    </div>
                                    <label class="col-lg-1 col-md-1" id="add-field"><i class="fa fa-plus-circle fa-2x "></i></label>
                                </div>
                                <div id="more-file">
                                    <input type="hidden" value="3" id="fild-count">
                                </div>

                            </div>

                            <!--                            </form>-->
                        </div>

                    </fieldset>
                </div>
            </div>

        </div>
    </div>
</form>

<!--<script src="--><?php //echo base_url('')  ?><!--assets/js/bootstrap-datepicker.min.js"></script>-->
<!--<script src="--><?php //echo base_url('')  ?><!--assets/js/bootstrap-datepicker.kh.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

<script type="text/javascript">

    /*
     * Anil Singh
     */

    // /


    // $('#BTN-POST').click(function(){
    //     var val = [];
    //     $('input:checkbox[name=csvid]:checked').each(function(i){
    //         val[i] = $(this).val();
    //     });
    //     alert(val.join(','));
    // });
    $('#btn-submit').on('click', function () {
        update_csv_promote();
    });


    var dateFormat = function () {
        var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
                timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
                timezoneClip = /[^-+\dA-Z]/g,
                pad = function (val, len) {
                    val = String(val);
                    len = len || 2;
                    while (val.length < len)
                        val = "0" + val;
                    return val;
                };

        // Regexes and supporting functions are cached through closure
        return function (date, mask, utc) {
            var dF = dateFormat;

            // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
            if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
                mask = date;
                date = undefined;
            }

            // Passing date through Date applies Date.parse, if necessary
            date = date ? new Date(date) : new Date;
            if (isNaN(date))
                throw SyntaxError("invalid date");

            mask = String(dF.masks[mask] || mask || dF.masks["default"]);

            // Allow setting the utc argument via the mask
            if (mask.slice(0, 4) == "UTC:") {
                mask = mask.slice(4);
                utc = true;
            }

            var _ = utc ? "getUTC" : "get",
                    d = date[_ + "Date"](),
                    D = date[_ + "Day"](),
                    m = date[_ + "Month"](),
                    y = date[_ + "FullYear"](),
                    H = date[_ + "Hours"](),
                    M = date[_ + "Minutes"](),
                    s = date[_ + "Seconds"](),
                    L = date[_ + "Milliseconds"](),
                    o = utc ? 0 : date.getTimezoneOffset(),
                    flags = {
                        d: d,
                        dd: pad(d),
                        ddd: dF.i18n.dayNames[D],
                        dddd: dF.i18n.dayNames[D + 7],
                        m: m + 1,
                        mm: pad(m + 1),
                        mmm: dF.i18n.monthNames[m],
                        mmmm: dF.i18n.monthNames[m + 12],
                        yy: String(y).slice(2),
                        yyyy: y,
                        h: H % 12 || 12,
                        hh: pad(H % 12 || 12),
                        H: H,
                        HH: pad(H),
                        M: M,
                        MM: pad(M),
                        s: s,
                        ss: pad(s),
                        l: pad(L, 3),
                        L: pad(L > 99 ? Math.round(L / 10) : L),
                        t: H < 12 ? "a" : "p",
                        tt: H < 12 ? "am" : "pm",
                        T: H < 12 ? "A" : "P",
                        TT: H < 12 ? "AM" : "PM",
                        Z: utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
                        o: (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
                        S: ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
                    };

            return mask.replace(token, function ($0) {
                return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
            });
        };
    }();

    // Some common format strings
    dateFormat.masks = {
        "default": "ddd mmm dd yyyy HH:MM:ss",
        shortDate: "m/d/yy",
        mediumDate: "mmm d, yyyy",
        longDate: "mmmm d, yyyy",
        fullDate: "dddd, mmmm d, yyyy",
        shortTime: "h:MM TT",
        mediumTime: "h:MM:ss TT",
        longTime: "h:MM:ss TT Z",
        isoDate: "yyyy-mm-dd",
        isoTime: "HH:MM:ss",
        isoDateTime: "yyyy-mm-dd'T'HH:MM:ss",
        isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
    };

    // Internationalization strings
    dateFormat.i18n = {
        dayNames: [
            "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
            "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
        ],
        monthNames: [
            "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
            "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
        ]
    };

    // For convenience...
    Date.prototype.format = function (mask, utc) {
        return dateFormat(this, mask, utc);
    };



    $(function () {
        // get num. display ============
        $.ajax({
            url: '<?= site_url('csv/csv_info/get_num_dip') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            beforeSend: function () {
                $('.xmodal').show();
            },
            data: {},
            success: function (data) {
                if (data.length > 0) {
                    var opt = '';
                    $.each(data, function (i, item) {
                        opt += '<option>' + item.disp_num + '</option>';
                    });
                }
                $('#s_dis').html(opt);
                $('.xmodal').hide();
            },
            error: function () {

            }
        });

        // init. ===========
        var xtotal_display = $('#s_dis').val() - 0;
        grid(1, xtotal_display);

        // search =========
        $('#search').on('keyup', function () {
            if ($(this).val() != '' || $(this).val() != null) {
                var xtotal_display = $('#s_dis').val() - 0;
                grid(1, xtotal_display);
            }
        });

        // page ===========
        $('body').delegate('.a-pagination', 'click', function () {
            var xtotal_display = $('#s_dis').val() - 0;
            var currentpage = $(this).data('currentpage');
            grid(currentpage, xtotal_display);
        });

        // display ==========
        $('body').delegate("#s_dis", "change", function (e) {
            var xtotal_display = $('#s_dis').val() - 0;
            grid(1, xtotal_display);
        });

   
        $("body").delegate("#my_gr tbody tr", "mouseover", function () {
            $(this).css('cursor', 'pointer');
        });

    });// ready fun. ==========
 //Test
    function update_csv_promote() {
        var checkedVals = $('input:checkbox[name=csvid]:checked').map(function () {
            return this.value;
        }).get();
        var multiTags = $("#multi");
        var tags = multiTags.find("input.tag").map(function () {
            return $(this).val();
        }).get();
        var txtNum = $('#txtNum').val();
        var txtdate = $('#txtdate').val();
        var remark = $('#remark').val();

        $.ajax({
            type: 'post',
            url: '<?= site_url('csv/csv_update/update_promote_csv') ?>',
            datatype: 'json',
            data: {
                checkedVals: checkedVals,
                tags: tags,
                txtNum: txtNum,
                txtdate: txtdate,
                remark: remark
            },
            beforeSend: function () {
                $('.xmodal').show();
            },
            success: function (data) {
                $('.xmodal').hide();

                if (data.status === 'success') {
                    swal({
                        title:"ដោយជោគជ័យ",
                        text: "បច្ចុប្បន្នភាព ត្រូវបានរក្សាទុកដោយជោគជ័យ",
                        type:"success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        closeOnClickOutside: false
                    });
                    setTimeout(function () {
                        window.location.href = "<?php echo site_url('csv/csv_update/list_promoted_csv/') ?>/";
                    }, 3000);
                }
            }
        });
    }


    // grid ==========================
    function grid(current_page, total_display) {
        // var =============
        var limit = total_display - 0;
        var offset = (current_page - 1) * total_display;
        var search = $('#search').val();
        var by_year = $('#by_year').val();
        $.ajax({
            url: '<?= site_url('csv/csv_update/get_promoted_csv') ?>',
            type: 'post',
            datatype: 'json',
            // async: false,
            beforeSend: function () {
                $('.xmodal').show();
            },
            data: {offset: offset, limit: limit, search: search, year: by_year},
            success: function (data) {
                var total_page = data.total_page;
                var record = data.res;
                var total_record = data.total_record;
                var tr = "";
                var ri = 1;

                if (record.length > 0) {
                    $.each(record, function (i, row) {
                        // i++;
                        var idmd = '<?= $this->session->all_userdata()["dmid"] ?>';
                        var datepromoted = new Date(row.date_late_promote);
                        tr += "<tr>" +
                                "<TD style='text-align: center;'><input type=\"checkbox\" id='checkbox_" + row.id + "' value=" + row.id + " name='csvid'>\n" +
                                "   </TD>" +
                                "<td style='text-align: left;'>" + row.civil_servant_id + "</td>" +
                                "<td style='text-align: left;'>" + row.lastname + " " + row.firstname + "</td>" +
                                // "<td style='text-align: left;'>" + row.firstname+ "</td>" +
                                "<td style='text-align: left;'>" + row.gender + "</td>" +
                                "<td style='text-align: left;'>" + row.current_role_in_khmer + "</td>" +
                                "<td style='text-align: left;'>" + row.dateofbirth + "</td>" +
                                "<td style='text-align: left;'>" + datepromoted.format("dd-mm-yyyy") + "</td>" +
                                "<td style='text-align: left;'>" + row.levelsalary + "</td>" +
                                "<td style='text-align: left;'>" + row.prev_value + "</td>" +
                                "<td style='text-align: left;'>" + row.reference_promote + "</td>" +
                                //  "<td style='text-align: left;'>" + row.reason_deleting + "</td>" +

                                // "<td style='text-align: left;'>" + row.unit + "</td>" +
                                // "<td style='text-align: left;'>" + row.unit + "</td>" +
                                //                                "<td style='text-align: left;'>" + row.unit_official_code + "</td>" +
                                // "<td style='text-align: center;'><a href='javascript: void(0)' data-id=" + row.id +
                                // " class='delete'>???</a></td>" +
                                //                                "<td style='text-align: center;'> <a href='<= site_url('csv/csv_info/edit') ?>/" + row.id +
                                //                                "' class='editor' target='_parent'>?????</a> | <a href='javascript: void(0)' data-id=" + row.id +
                                //                                " class='delete'>???</a></td>" +
                                "</tr>";

                    });
                    $('#my_gr tbody').html(tr);
                    $('#disp').html(' ' + (offset + 1) + 'ទៅ ' + ((offset + total_display) - 0 > total_record ? total_record : (offset + total_display)) + 'នៃធាតុ ' + total_record);

                    var pagination = '<li><a class="a-pagination" href="javascript: void(0)" data-currentpage="1">&laquo;</a></li>';
                    for (var i = 1; i <= 4; i++) {
                        var p = 1;
                        if (current_page <= 5) {
                            p = i;
                        } else {
                            p = current_page - 5 + i;
                        }
                        if (p <= total_page) {
                            var active = current_page == p ? ' class= "active" ' : '';
                            pagination += '<li ' + active + '><a class="a-pagination" href="javascript: void(0)" data-currentpage="' + p + '">' + p + '</a></li>';
                        }
                    }
                    for (var i = 0; i <= 5; i++) {
                        var pr = 1;
                        if (current_page <= 5) {
                            pr = 5 + i;
                        } else {
                            pr = current_page + i;
                        }
                        if (pr <= total_page) {
                            var active = current_page == pr ? ' class= "active" ' : '';
                            pagination += '<li ' + active + '><a class="a-pagination" href="javascript: void(0)" data-currentpage="' + pr + '">' + pr + '</a></li>';
                        }
                    }
                    pagination += '<li><a class="a-pagination" href="javascript: void(0)" data-currentpage="' + total_page + '">&raquo;</a></li>';

                    $('#pagination-grid').html(pagination);

                } else {
                    tr += "<tr>" +
                            "<td colspan='11' style='text-align: center;'>អត់មានទិន្ន័យ</td>" +
                            "</tr>";
                    $('#my_gr tbody').html(tr);
                    $('#pagination-grid').html("");
                    $('#disp').html("");
                }
                $('.xmodal').hide();
            },
            error: function () {

            }
        });// ajax =============
    }

    $('body').delegate('#by_year', 'change', function () {
        var xtotal_display = $('#s_dis').val() - 0;
        grid(1, xtotal_display);
    });

    $("#print-excel-file").on('click', function () {
        var year = $('#by_year').val();
        $.ajax({
            url: '<?= site_url('csv/csv_update/action_excel') ?>',
            type: 'get',
            datatype: 'json',
            // async: false,
            beforeSend: function () {
                $('.xmodal').show();
                location.href = '<?= site_url('csv/csv_update/action_excel?year=') ?>' + year;
                $('.xmodal').hide();
            },
            data: {year: year},
            success: function (data) {
                $('.xmodal').hide();
            }
        });

    });

    $('#select-all').click(function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function () {
                this.checked = false;
            });
        }
    });
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
    $('body').delegate(".datepick", "focus", function (e) {
        dateTimeall();
    });
    $('#add-field').on('click', function () {
        var i = $('#fild-count').val();
        var inputform = '<div class="form-group">' +
                '<label class="col-lg-2 col-md-2 text-right"></label>' +
                '<div class="col-lg-9 col-md-9" >' +
                '<div class="input-group">' +
                '<input id="fieldID' + i + '" type="text" name="reference_file[]" value="" class="form-control tag" readonly>' +
                '<span class="input-group-btn">' +
                '<a href="<?php echo base_url() ?>/assets/filemanager/dialog.php?type=2&field_id=fieldID' + i + '&relative_url=1" class="btn btn-info iframe-btn" type="button">ស្វែងរក</a>' +
                '</span>' +
                '</div>' +
                '</div>' +
                '<label class="col-lg-1 col-md-1 remove-file" ><i class="fa fa-minus-circle fa-2x red"></i></label>' +
                '</div>';

        $("#more-file").fadeIn('slow').append(inputform);

        $('.iframe-btn').fancybox({
            'width': 900,
            'height': 600,
            'type': 'iframe',
            'autoScale': true
        });
        $('#fild-count').val(parseInt(i) + 1);
    });
    $('.iframe-btn').fancybox({
        'width': 900,
        'height': 600,
        'type': 'iframe',
        'autoScale': true
    });
    $('body').delegate(".remove-file", "click", function (e) {
        var fieldfile = $(this).parent();
        fieldfile.fadeOut('slow', function () {
            $(this).remove();
        });
    });




</script>
