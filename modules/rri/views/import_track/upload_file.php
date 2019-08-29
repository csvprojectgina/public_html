
<!--<html>
    <head>
        <title>PHP AJAX Image Upload</title>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $("#uploadForm").on('submit', (function(e) {
                    // e.preventDefault();
                    $.ajax({
                        url: "<?= site_url('rri/import_track/a_upload_file') ?>",
                        type: "post",
                        datatype: "json",
                        data: new FormData(this),
                        async: false,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            alert(data);
                            $("#targetLayer").html(data);
                        },
                        error: function() {
                        }
                    });
                    return false;
                }));
            });
        </script>
    </head>
    <body>
        <div class="bgColor">
            <form id="uploadForm" action="<?= site_url('rri/import_track/a_upload_file') ?>" method="post">
                <div id="targetLayer">No Image</div>
                <div id="uploadFormLayer">
                    <label>Upload Image File:</label><br/>
                    <input name="userImage" type="file" class="inputFile" />
                    <input type="submit" value="Submit" class="btnSubmit" />
            </form>
        </div>
    </div>
</body>
</html>-->

<!-- dialog -------------------------------->
<form id="uploadForm" action="<?= site_url('rri/import_track/a_upload_file') ?>" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="exampleModalLabel">បញ្ចូល Tracks</h3>
                    <input type="hidden" id="r_id" class="r_id" value="<?= set_value('road_id', isset($id) ? $id : '') ?>" />
                </div>
                <div class="modal-body">
                    <form>
                        <div style="display: none;" class="alert alert-success alert_msg" role="alert">
                        </div>
                        <div class="form-group">
                            <label for="track" class="control-label">ជ្រើសរើស Excel file...</label>
                            <input required type="file" class="form-control track" placeholder="ជ្រើសរើសទីតាំងបញ្ចូល" name="track[]" id="track" accept="application/vnd.ms-excel" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="imp_ok">នាំចូល</button>            
                    <button type="button" class="btn btn-default" data-dismiss="modal">បិទ</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function() {
        
        // diag. =========================
//        $('#imp_track').on('click', function() {
            $(".alert_msg").css({"display": "none"});
            $('#exampleModal').modal({
                backdrop: true
            });
//            return false;
//        });
        
        $("#uploadForm").on('submit', (function(e) {
            // e.preventDefault();
            $.ajax({
                url: "<?= site_url('rri/import_track/a_upload_file') ?>",
                type: "post",
                datatype: "json",
                data: new FormData(this),
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    alert(data);
                },
                error: function() {
                }
            });
            return false;
        }));
        return false;
        
        
        // ==========================        

        // import tracks ===================
        $('#imp_ok').on('click', function() {
            var r_id = $('.r_id').val();
            var pro_id = $('#pro_id').val();
            var track = $('.track').val();
            // ========================
            var file_data = $('#track').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            alert(form_data);
            return false;

            if (r_id - 0 > 0) {
                $.ajax({
                    url: "<?= site_url('rri/import_track/import_tracks') ?>",
                    type: "post",
                    datatype: "html",
                    async: false,
                    // contentType: "application/json;charset=utf-8;",
                    data: {r_id: r_id, pro_id: pro_id, track: track},
                    success: function(data) {
                        alert(data);
//                        $(".alert_msg").css({"display": "block"});
//                        $('.alert_msg').html(data);
                    },
                    error: function() {

                    }
                });
            }
        });
    });
</script>
