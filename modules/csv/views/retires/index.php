<style media="screen">
    .panel-title > a{
        color: #498fcc !important;
        font-size: 16px;
        margin-top: -10px;
        margin-right: -16px;
        padding: 5px;
        border-top-left-radius: 0px;
       
        background: #ddd;}
    </style>
    <form class="form-horizontal" action="" role="form" method="post">


    <div class="panel panel-default">

        <div class="panel-heading thumbnail btn-group">
            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ --><?= t('ព័ត៌មានមន្ត្រីដែលត្រូវចួលនិវត្តន៍') ?></h3>
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
                            
                            echo "<option value='{$nowyear}' {$selected}>{$nowyear}</option>";
                            $nowyear -= 1;
                        }
                        ?>
                        <option value="0">--All--</option>

                    </select>
                    <label for="search"><?= t('ស្វែងរក') ?>:</label>

                    <input type="text" id="search" style="height: 30px;border-radius: 4px;line-height: 4px;" />

                    <button type="button" id="print-pdf-file" class=" btn btn-info btn-sm" style="height: 30px;">បោះពុម្ព</button>
                </span>

            </div>

            <table cellpadding="0" cellspacing="0" border="1" class="table table-hover table-striped table-bordered dt-responsive nowrap" id="my_gr">
                <thead>
                    <?php
                    $dmid = $this->session->all_userdata()['dmid'];
                    ?>
                    <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">
                        <th style="text-align: center; width: 120px"><?= t('អត្តលេខមន្ត្រី') ?></th>
                        <th style="text-align: center;"><?= t('នាម និងគោត្តនាម  ') ?></th>
                        <th style="text-align: center;"><?= t('ឈ្មោះឡាតាំង') ?></th>
                        <th style="text-align: center; width: 80px"><?= t('ភេទ') ?></th>
                        <th style="text-align: center;"><?= t('មុខងារ') ?></th>
                        <th style="text-align: center; width: 80px"><?= t('ក្របខ័ណ្ឌ') ?></th>
                        <th style="text-align: center;width: 150px"><?= t('ថ្ងៃ​ ខែ ឆ្នាំ កំណើត') ?></th>
                        <th style="text-align: center;width: 150px"><?= t('ថ្ងៃ​ ខែ ឆ្នាំ ចួលនិវត្តន៍') ?></th>
                        <th style="text-align: center;width: 100px"><?= t('លេខទូរស័ព្ទ') ?></th>
                    
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
</form>
<!-- js. -->
<script type="text/javascript">

    /*
     * Anil Singh
     */

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

        // edit by row ===========
        /*$("body").delegate("#my_gr tbody tr", "click", function () {
            var id = $(this).data('id');
            if (id - 0 > 0) {
                window.location = "<?= site_url('csv/csv_info/edit') ?>/" + id;
            } else {
                alert("អត់មានទិន្នន័យ!");
                return false;
            }
        });*/

        // row hover ===========
        $("body").delegate("#my_gr tbody tr", "mouseover", function () {
            $(this).css('cursor', 'pointer');
        });

    });// ready fun. ==========

    // grid ==========================
    function grid(current_page, total_display) {
        // var =============
        var limit = total_display - 0;
        var offset = (current_page - 1) * total_display;
        var search = $('#search').val();
        var by_year = $('#by_year').val();
        $.ajax({
            url: '<?= site_url('csv/csv_info/get_retires') ?>',
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
                        var retiredDate = new Date(row.retiredate);
                        tr += "<tr>" +
                                "<td style='text-align: left;'>" + row.civil_servant_id + "</td>" +
                                "<td style='text-align: left;'>" + row.lastname + " " + row.firstname + "</td>" +
                                "<td style='text-align: left;'>" + row.english_full_name + "</td>" +
                                "<td style='text-align: left;'>" + row.gender + "</td>" +
                                "<td style='text-align: left;'>" + row.current_role_in_khmer + "</td>" +
                                "<td style='text-align: left;'>" + row.levelsalary + "</td>" +
                                "<td style='text-align: left;'>" + row.dateofbirth + "</td>" +
                                "<td style='text-align: left;'>" + retiredDate.format("dd-mm-yyyy") + "</td>" +
                                "<td style='text-align: left;'>" + row.mobile_phone + "</td>" +
               
                                "</tr>";

                    });
                    $('#my_gr tbody').html(tr);
                    $('#disp').html(' ' + (offset + 1) + ' ទៅ ' + ((offset + total_display) - 0 > total_record ? total_record : (offset + total_display)) + ' នៃធាតុ ' + total_record);

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
                            "<td colspan='11' style='text-align: center;'>អត់មានទិន្ន័យ!</td>" +
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

    $("#print-pdf-file").click(function () {
       var year = $('#by_year').val(); 
       window.open('<?= site_url('csv/csv_info/view_pdf') ?>?year='+year, '_blank');
    });

</script>
