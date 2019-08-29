<!-- <div class="row" style="min-height:450px;">
  <input type="button" class="form-control btn btn-default" name="name" value="Click">
</div> -->


<!-- Ignite UI Required Combined CSS Files -->
<link href="<?= base_url('assets/bs/css/infragistics.theme.css'); ?>" rel="stylesheet"/>
<link href="<?= base_url('assets/bs/css/infragistics.css'); ?>" rel="stylesheet"/>
<style>
    #sampleContainer ol {
        padding: 0px 0px 0px 15px;
        margin: 0;
    }

    #sampleContainer input {
        margin: 10px 0;
    }

    #result {
        display: none;
        color: red;
    }

    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>
<!-- Ignite UI Required Combined JavaScript Files -->
<script src="<?= base_url('assets/bs/js/infragistics.core.js'); ?>"></script>
<script src="<?= base_url('assets/bs/js/infragistics.lob.js'); ?>"></script>
<!-- Javascript Excel Library -->
<script src="<?= base_url('assets/bs/js/infragistics.documents.core.js'); ?>"></script>
<script src="<?= base_url('assets/bs/js/infragistics.excel.js'); ?>"></script>


<form id="up_form" class="form-horizontal hidden" role="form" action="<?= site_url('csv/csv_importexcel/import_excel') ?>"
      method="post" enctype="multipart/form-data">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img
                        src="<?= base_url('assets/bs/css/images/new.gif') ?>"/> <?= t('បញ្ចូលពី Excel') ?></h3>
            <!--<input type="hidden" value="<?= set_value('id', isset($row->id) ? $row->id : '') ?>" name="id" >-->
            <!-- <input type="hidden" value="<?= set_value('road_id', $id) ?>"  id="road_id"  name="road_id" /> -->
        </div>

        <div class="panel-body">
            <div id="alert_msg"></div>
            <div class="form-group">
                <label for="unit" class="col-sm-2 control-label"><?= t('អង្គភាព') ?></label>
                <div class="col-sm-10">
                    <!-- <input type="text" class="form-control" id="unit" name="unit" placeholder="" data-toggle="tooltip" data-placement="top" title="បំពេញអង្គភាព" maxlength="255" value="<?= set_value('unit', isset($row_w->unit) ? $row_w->unit : '') ?>" /> -->
                    <?php #echo "<pre>";print_r($unituery->id.'='. $row->unit_code); ?>
                    <select class="form-control" name="u_name" id="u_name" required>
                        <option value=""></option>
                        <?php foreach ($unituery as $keyrow) { ?>
                            <!-- <option>ទីស្ដីការក្រសួង</option> -->

                            <option data-id="<?php echo @$keyrow->id; ?>"
                                    data-name="<?php echo @$keyrow->unit_english; ?>"
                                    value="<?php echo $keyrow->id; ?>"><?php echo @$keyrow->unit; ?></option>

                        <?php }; ?>
                        <input type="hidden" id="unit_english" name="unit_english" value="">
                    </select>

                </div>

            </div>
            <!-- <div class="form-group">
                <label for="common_official_code" class="col-sm-2 control-label"><?= t('លេខពិធីការ') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="common_official_code" id="common_official_code"  />
              </div>
            </div> -->
            <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label"><?= t('ជ្រើសរើសឯកសារ') ?></label>
                <div class="col-sm-10">
                    <input required type="file" class="form-control" placeholder="ជ្រើសរើសទីតាំងបញ្ចូល"
                           name="excel_file[]" id="excel_file" multiple="multiple" accept="application/vnd.ms-excel"/>
                </div>
            </div>
        </div>

        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg">
                <button name="submit" type="submit" class="btn btn-default" value="save"><?= t('បញ្ចូល') ?></button>
            </div>
        </div>
    </div>
</form>

<!-- upload excelFile -->
<script type="text/javascript">
    $(function () {
        // import ===========================
        $("#up_form").on('submit', (function (e) {
            $.ajax({
                url: "<?= site_url('csv/csv_importexcel/import_excel') ?>",
                type: "post",
                datatype: "json",
                data: new FormData(this),
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $("#alert_msg").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>" + data + "</strong></div>");
                    $("#excel_file").val('');
                },
                error: function (data) {
                    $("#alert_msg").html("<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>" + data + "</strong></div>");
                }
            });
            return false;
        }));


        // check extens =====================
        function checkfile(sender) {
            var validExts = new Array(".xls",".xlsx");
            var fileExt = sender.value;
            fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
            if (validExts.indexOf(fileExt) < 0) {
                alert("ជ្រើសរើសបានតែ xls !");
                $('#excel_file').val('');
                return false;
            } else {
                return true;
            }
        }

        $('#excel_file').on('change', function () {
            checkfile(this);
        });
    });
</script>
<!-- end upload excelFile -->

<script>
    $(function () {
        $("#input").on("change", function () {
            var excelFile,
                fileReader = new FileReader();
            $("#result").hide();

            fileReader.onload = function (e) {
                var buffer = new Uint8Array(fileReader.result);

                $.ig.excel.Workbook.load(buffer, function (workbook) {
                    var column, row, newRow, cellValue, columnIndex, i,
                        worksheet = workbook.worksheets(0),
                        columnsNumber = 0,
                        gridColumns = [],
                        data = [],
                        worksheetRowsCount;

                    // Both the columns and rows in the worksheet are lazily created and because of this most of the time worksheet.columns().count() will return 0
                    // So to get the number of columns we read the values in the first row and count. When value is null we stop counting columns:
                    while (worksheet.rows(0).getCellValue(columnsNumber)) {
                        columnsNumber++;
                    }

                    // Iterating through cells in first row and use the cell text as key and header text for the grid columns
                    for (columnIndex = 0; columnIndex < columnsNumber; columnIndex++) {
                        column = worksheet.rows(0).getCellText(columnIndex);
                        gridColumns.push({headerText: column, key: column});
                    }

                    // We start iterating from 1, because we already read the first row to build the gridColumns array above
                    // We use each cell value and add it to json array, which will be used as dataSource for the grid
                    for (i = 1, worksheetRowsCount = worksheet.rows().count(); i < worksheetRowsCount; i++) {
                        newRow = {};
                        row = worksheet.rows(i);

                        for (columnIndex = 0; columnIndex < columnsNumber; columnIndex++) {
                            cellValue = row.getCellText(columnIndex);
                            newRow[gridColumns[columnIndex].key] = cellValue;
                        }

                        data.push(newRow);
                    }

                    // we can also skip passing the gridColumns use autoGenerateColumns = true, or modify the gridColumns array
                    createGrid(data, gridColumns);
                }, function (error) {
                    $("#result").text("The excel file is corrupted.");
                    $("#result").show(1000);
                });
            }

            if (this.files.length > 0) {
                excelFile = this.files[0];
                if (excelFile.type === "application/vnd.ms-excel" || excelFile.type === "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || (excelFile.type === "" && (excelFile.name.endsWith("xls") || excelFile.name.endsWith("xlsx")))) {
                    fileReader.readAsArrayBuffer(excelFile);
                } else {
                    $("#result").text("The format of the file you have selected is not supported. Please select a valid Excel file ('.xls, *.xlsx').");
                    $("#result").show(1000);
                }
            }
        })
    })

    function createGrid(data, gridColumns) {
        if ($("#grid1").data("igGrid") !== undefined) {
            $("#grid1").igGrid("destroy");
        }

        $("#grid1").igGrid({
            columns: gridColumns,
            autoGenerateColumns: true,
            dataSource: data,
            width: "100%"
        });
    }
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('.thumbnail').click(function () {
            $('.modal-body').empty();
            var title = $(this).parent('a').attr("title");
            $('.modal-title').html(title);
            $($(this).parents('div').html()).appendTo('.modal-body');
            $('#myModal').modal({show: true});
        });
    });
</script>
<script type="text/javascript">
    // get unit
    $('#u_name').change(function () {
        var element = $(this).find('option:selected');
        var uname = element.attr("data-name");
        document.getElementById('unit_english').value = uname;

    });
    //tab js//
    $(document).ready(function (e) {


        $('.form').find('input, textarea').on('keyup blur focus', function (e) {

            var $this = $(this),
                label = $this.prev('label');

            if (e.type === 'keyup') {
                if ($this.val() === '') {
                    label.removeClass('active highlight');
                } else {
                    label.addClass('active highlight');
                }
            } else if (e.type === 'blur') {
                if ($this.val() === '') {
                    label.removeClass('active highlight');
                } else {
                    label.removeClass('highlight');
                }
            } else if (e.type === 'focus') {

                if ($this.val() === '') {
                    label.removeClass('highlight');
                } else if ($this.val() !== '') {
                    label.addClass('highlight');
                }
            }

        });

        $('.tab a').on('click', function (e) {

            e.preventDefault();

            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
            target = $(this).attr('href');

            $('.tab-content > div').not(target).hide();

            $(target).fadeIn(600);

        });
//canvas off js//
        $('#menu_icon').click(function () {
            if ($("#content_details").hasClass('drop_menu')) {
                $("#content_details").addClass('drop_menu1').removeClass('drop_menu');
            } else {
                $("#content_details").addClass('drop_menu').removeClass('drop_menu1');
            }


        });

//search box js//


        $("#flip").click(function () {
            $("#panel").slideToggle("5000");
        });

// sticky js//

        $(window).scroll(function () {
            if ($(window).scrollTop() >= 500) {
                $('nav').addClass('stick');
            } else {
                $('nav').removeClass('stick');
            }
        });


    });

</script>
