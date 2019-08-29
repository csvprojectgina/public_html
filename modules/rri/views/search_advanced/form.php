<meta charset="UTF-8">
<form class="form-horizontal" role="form"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ <?= t('ស្វែងរកតាមព័ត៌មានទូទៅ') ?></h3>
        </div>

        <div class="panel-body">        
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th style="text-align: center;"><?= t('ល.​រ') ?></th>
                        <th style="text-align: center;"><?= t('លេខ​ផ្លូវ') ?></th>
                        <th style="text-align: center;"><?= t('ឈ្មោះ​ផ្លូវ') ?></th>
                        <th style="text-align: center;"><?= t('ប្រភេទ​ផ្លូវ') ?></th>
                        <th width="120" style="text-align: center;"><a href="<?= site_url('rri/roads/form') ?>"><img src="<?= base_url('assets/bs/css/images/new.gif') ?>" /> <?= t('បញ្ចូល​ថ្មី') ?></a></th>            
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM road_info INNER JOIN public_building ON 
                            road_info.road_id = public_building.road_id WHERE road_info.road_id = '{$id}' ";
                    $query = query($sql);
                    echo $id;
                    $i = 1;
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $row) {
                            echo "<tr>" .
                            "<td style='text-align: center;'>" . $i . "</td>" .
                            "<td>" . $row->road_number . "</td>" .
                            "<td>" . $row->road_name . "</td>" .
                            "<td>" . $row->type . "</td>" .
                            "<td style='text-align: center;'>" . "<a href='javascript:void(0)' id='{$row->road_id}'>កែ</a>" . "</td>" .
                            "</tr>";
                            $i++;
                        }
                    }
                    ?> 
                </tbody>
            </table>
        </div>      
        <div class="panel-footer" style="text-align: right;">
            <div class="btn-group btn-group-lg" >
                <button id="back" type="button" class="btn btn-default glyphicon glyphicon-circle-arrow-left"> <?= t('ថយក្រោយ') ?></button>
            </div>
        </div>

    </div>
</form>

<script>

    $(function() {
        $('#back').on('click', function() {
            window.location = '<?= site_url('rri/search_advanced/index') ?>';
        });

    });
</script>