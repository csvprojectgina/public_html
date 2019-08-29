<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on left">Tooltip on left</button>
<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Tooltip on top</button>
<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Tooltip on bottom</button>
<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Tooltip on right">Tooltip on right</button>

<!--------------------------------->
<input type="text" class="form-control" placeholder="Search" id="q">
<table class="table" id="grid">
    <thead>
        <tr>
            <th><a href="<?= site_url('admin/users/form') ?>">Add</a></th>
            <th>GISID</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<input type="text" id="da"/>

<script type="text/javascript">
    $(function () {
        // =========================
        $("#da").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "1950:2015",
            dateFormat: "yy-mm-dd",
            defaultDate: "2015-01-01"
        });

        // ==========================
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $("#q").autocomplete({
            minLength: 1,
            source: function (request, response) {
                $.ajax({
                    url: "<?= site_url('rri/test_pagination/autocomplete_') ?>",
                    type: "post",
                    datatype: "json",
                    async: false,
                    data: {
                        q: $("#q").val()
                    },
                    success: function (data) {
                        response($.map(data, function (value, key) {
                            return {
                                label: value.khmer_name,
                                value: key.khmer_name
                            };
                        }));
                    },
                    error: function () {

                    }
                });
            }
        });
    }); // ready fun. ===========================

</script>