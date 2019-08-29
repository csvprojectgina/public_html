<?php
$pro_id = isset($pro_id) ? $pro_id : 0;

// tracks =================================================
$qr_track = query("SELECT
                                tr.lat,
                                tr.`long`
                        FROM
                                road_info AS rd
                        INNER JOIN trackpoint AS tr ON rd.road_id = tr.road_id
                        WHERE
                                rd.pro_id = '{$pro_id}' ");
$position = '';
$positions = '';
if ($qr_track->num_rows() > 0) {
    foreach ($qr_track->result() as $row) {
        $position .= 'new google.maps.LatLng(' . $row->lat . ',' . $row->long . '),';
    }
    $positions = substr($position, 0, strlen($position) - 1);
}

// art_building =================================================
$qr_art = query("SELECT
                            art.type_building_art,
                            art.dimension_building_art,
                            art.quality_building_art,
                            art.position_x_building_art,
                            art.position_y_building_art
                    FROM
                            art_building AS art
                    WHERE
                            art.pro_id = '{$pro_id}' ");
$post_art = '';
if ($qr_art->num_rows() > 0) {
    foreach ($qr_art->result() as $row_art) {
        $post_art .= '["' . $row_art->type_building_art . '", ' . $row_art->position_x_building_art . ', ' . $row_art->position_y_building_art . '],';
    }
}

// pu_building ==================================================
$qr_pub_b = query("SELECT
                                pub.type_building,
                                pub.name_building,
                                pub.position_x,
                                pub.position_y
                        FROM
                                public_building AS pub
                        WHERE
                                pub.pro_id = '{$pro_id}' ");
$post_pub = '';
if ($qr_pub_b->num_rows() > 0) {
    foreach ($qr_pub_b->result() as $row_p) {
        $post_pub .= '["' . $row_p->type_building . ' (' . $row_p->name_building . ')", ' . $row_p->position_x . ', ' . $row_p->position_y . '],';
    }
}
?>

<!--<script type="text/javascript">
    var pro_id = <?= $pro_id ?>;
    $(function() {
        //function my_track() {
        $.ajax({
            url: '<?= site_url('rri/link_map_province/map_by_pro') ?>',
            type: 'post',
            datatype: 'json',
            async: false,
            data: {pro_id: pro_id},
            success: function(d) {
                alert(d);
//                    $.each(d, function(i, item) {
//                        alert(item.lat);
//                    });
                // $('#dv_map_pro').html(d);
            },
            error: function() {

            }
        });
        //}
    });

</script>-->

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title></title>
        <style>
            html, body, #map-canvas {
                height: 100%;
                margin: 0px;
                padding: 0px
            }
        </style>
        <script type="text/javascript" src="<?= base_url("js/jquery-1.10.2.min.js") ?>"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAY0GGL4bv17otHQOPHgGD67PaLs-zhH_8&sensor=false"></script>
        <script src="<?= base_url('/assets/bs/js/proj4.js') ?>"></script>
        <script type="text/javascript">
            function initialize() {
                 var mapOptions = {
                    zoom: 9,
                    maxZoom: 15,
                    minZoom: 5,
                    center: new google.maps.LatLng(12.624696, 104.853481),
                    mapTypeId: google.maps.MapTypeId.HYBRID
                };
                var mapDiv = document.getElementById('map-canvas');
                var map = new google.maps.Map(mapDiv, mapOptions);
                

                // st ================================================
				// var flightPlanCoordinates = [<?= $positions ?>];
                // var flightPath = new google.maps.Polyline({
                    // path: flightPlanCoordinates,
                    // geodesic: true,
                    // strokeColor: 'blue',
                    // strokeOpacity: 1.0,
                    // strokeWeight: 5
                // });
                // flightPath.setMap(map);
				
					layer = new google.maps.FusionTablesLayer({
		query: {
		  select: 'geometry',
		  from: '1THOKlu-_dNd3qkD3IbwBb0r7tBH_K5t7spGez8ez'
		}
	  });
	  layer.setMap(map);

                // ========================================================
                var utm = "+proj=utm +zone=48";
                var wgs84 = "+proj=longlat +ellps=WGS84 +datum=WGS84 +no_defs";

                // art conv & create marker =================================
                var position_art = [<?= $post_art ?>];
                var mystr_art = '';
                var all_arr_art = new Array();
                for (var i = 0; i < position_art.length; i++) {
                    mystr_art = proj4(utm, wgs84, [position_art[i][1], position_art[i][2]]);
                    all_arr_art[i] = [position_art[i][0], mystr_art[1], mystr_art[0]];
                }
                var Latlng_building = all_arr_art;
                for (var i = 0; i < Latlng_building.length; i++) {
                    var myLatlng = new google.maps.LatLng(Latlng_building[i][1], Latlng_building[i][2]);
                    var marker_art = new google.maps.Marker({
                        position: myLatlng,
                        map: map
                        ,
                        title: Latlng_building[i][0]
                    });
                    // art win. info. =====================================
                    var infowindow = new google.maps.InfoWindow();
                    google.maps.event.addListener(marker_art, 'click', function() {
                        infowindow.setContent(Latlng_building[i][0]);
                        infowindow.open(map, this);
                    });
                }

                // pub conv & create marker =================================
                var position_pub = [<?= $post_pub ?>];
                var mystr_pub = '';
                var all_arr_pub = new Array();
                for (var i = 0; i < position_pub.length; i++) {
                    mystr_pub = proj4(utm, wgs84, [position_pub[i][1], position_pub[i][2]]);
                    all_arr_pub[i] = [position_pub[i][0], mystr_pub[1], mystr_pub[0]];
                }
                var Latlng_pub_building = all_arr_pub;
                var image = {url: '<?= base_url("/assets/bs/css/images/map/pub_building.png") ?>'};
                for (var i = 0; i < Latlng_pub_building.length; i++) {
                    var myLatlngs = new google.maps.LatLng(Latlng_pub_building[i][1], Latlng_pub_building[i][2]);
                    var marker_pub = new google.maps.Marker({
                        position: myLatlngs,
                        map: map,
                        icon: image
                        ,
                        title: Latlng_pub_building[i][0]
                    });

                }

            }// end init. =================================================

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>

    <body style="margin-top: -6px;">
        <div id="map-canvas"></div>
    </body>
</html>