<?php
$id = $id - 0 > 0 ? $id : 0;
$query = query("SELECT * 
                        FROM
                            road_info
                        WHERE
                            road_id = '{$id}' ")->row();

// art_building =================================================
$query_art = query("SELECT
                                art.art_id,
                                art.road_id,
                                art.idtemp2,
                                art.type_building_art,
                                art.dimension_building_art,
                                art.quality_building_art,
                                art.position_x_building_art,
                                art.position_y_building_art,
                                art.pro_id,
                                art.dis_id,
                                art.dmid,
                                art.create_date,
                                art.is_status,
                                art.is_delete,
                                art.line_id,
							tr.road_name,
							tr.type
                        FROM
                               art_building AS art
							INNER JOIN road_info AS tr ON art.road_id = tr.road_id
                        WHERE
                                art.road_id = '{$id}' ");
$position_art = '';
if ($query_art->num_rows() > 0) {
    foreach ($query_art->result() as $row_art) {
        $position_art .= '["' . $row_art->type_building_art . '", ' . $row_art->position_x_building_art . ', ' . $row_art->position_y_building_art . ', ' . $row_art->road_id . ', "' . $row_art->idtemp2 . '", "' . $row_art->road_name . '", ' . $row_art->type . ', "' . $row_art->dimension_building_art . '"],';
    }
}

// pu_building ==================================================
$query_pub_building = query("SELECT
                                        pub.type_building,
                                pub.name_building,
                                pub.position_x,
                                pub.position_y,
								pub.idtemp3,
								tr.road_name,
								tr.type
                                FROM
                                        public_building AS pub
								INNER JOIN road_info AS tr ON pub.road_id = tr.road_id
                                WHERE
                                        pub.road_id = '{$id}' ");
$position_pub = '';
if ($query_pub_building->num_rows() > 0) {
    foreach ($query_pub_building->result() as $row_p) {
        $position_pub .= '["' . $row_p->type_building . '", ' . $row_p->position_x . ', ' . $row_p->position_y . ', "' . $row_p->name_building . '", "' . $row_p->idtemp3 . '", "' . $row_p->road_name . '", ' . $row_p->type . '],';
    }
}

// tracks ================================================
$qr_track = query("SELECT * FROM trackpoint AS tt WHERE tt.road_id= '{$id}' ");
$position = '';
if ($qr_track->num_rows() > 0) {
    foreach ($qr_track->result() as $row) {
        $position .= 'new google.maps.LatLng(' . $row->lat . ',' . $row->long . '),';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title></title>
        <style>
            html, body, #map-canvas {
                height: 95%;
                margin: 0px;
                padding: 0px
            }
            .gm-style-iw {
                overflow:hidden;
                width: 400px; 
                height: 300px;

            }

            #panel {
                height: 95%;
                top: 100px;
                left : 15%;
                width:200px; 
                float:left;
                z-index: 5;
                background-color: #fff;
                padding: 5px;
                margin-top: 0px;
                border: 1px solid #999;
            }

        </style>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script src="<?= base_url('/assets/bs/js/proj4.js') ?>"></script>
        <script type="text/javascript">

            var markers = [];
            var culverts = [];
            var wbridges = [];
            var bbridges = [];

            var schools = [];
            var mayors = [];
            var pagodas = [];
            var hospitals = [];
            var publics = [];
            var infoWnd;
            var map;
            var infoWindow;


            function initialize() {

                // ========================================================
                var utm = "+proj=utm +zone=48";
                var wgs84 = "+proj=longlat +ellps=WGS84 +datum=WGS84 +no_defs";

                // art conv & create marker =================================

                var position_art = [<?= $position_art ?>];
                var mystr_art = '';
                var all_arr_art = new Array();

                for (var i = 0; i < 2; i++) {
                    mystr_art = proj4(utm, wgs84, [position_art[i][1], position_art[i][2]]);
                    all_arr_art[i] = [position_art[i][0], mystr_art[1], mystr_art[0], position_art[i][3], position_art[i][4], position_art[i][5], position_art[i][6], position_art[i][7]];
                }
                var Latlng_building = all_arr_art;
                for (var i = 0; i < 2; i++) {
                    var myLatlng = new google.maps.LatLng(Latlng_building[i][1], Latlng_building[i][2]);

                }
                var mapOptions = {
                    zoom: 8,
                    center: myLatlng,
                    //center: new google.maps.LatLng(12.624696, 104.853481),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                var flightPlanCoordinates = [<?= $position ?>];
                infoWindow = new google.maps.InfoWindow();
                infoWnd = new google.maps.InfoWindow();

                // st ================================================
                var flightPath = new google.maps.Polyline({
                    path: flightPlanCoordinates,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 10
                });
                flightPath.setMap(map);



                for (var i = 0; i < position_art.length; i++) {
                    mystr_art = proj4(utm, wgs84, [position_art[i][1], position_art[i][2]]);
                    all_arr_art[i] = [position_art[i][0], mystr_art[1], mystr_art[0], position_art[i][3], position_art[i][4], position_art[i][5], position_art[i][6], position_art[i][7]];
                }
                var Latlng_building = all_arr_art;
                for (var i = 0; i < Latlng_building.length; i++) {
                    var myLatlng = new google.maps.LatLng(Latlng_building[i][1], Latlng_building[i][2]);

                    var title1 = "<center><b>សំណង់សិល្បការ</center></b><br>ប្រភេទ:  " + Latlng_building[i][0] + "<br>ប្រវែង/ទំហំ:  " + Latlng_building[i][7] + "<br><br>ព័ត៌មានផ្លូវ   <br>ឈ្មោះផ្លូវ:  " + Latlng_building[i][5] + "<br>ល.រ:  " + Latlng_building[i][4] + "<br><br>";

                    if (Latlng_building[i][0] == "ស្ពានឈើ") {
                        var image = {url: '<?= base_url("/assets/bs/css/images/map/bridge.png") ?>'};
                        marker_art = new google.maps.Marker({
                            position: myLatlng,
                            map: map,
                            icon: image,
                            title: title1
                                    //title: Latlng_building[i][0] . "   " . Latlng_building[i][3]
                        });
                        // art win. info. =====================================
                        wbridges.push(marker_art);


                        google.maps.event.addListener(marker_art, 'click', function () {
                            infoWindow.setContent(this.title);
                            infoWindow.open(map, this);
                        });
                    }

                    else {
                        if (Latlng_building[i][0] == "ស្ពានបេតុង") {
                            var image = {url: '<?= base_url("/assets/bs/css/images/map/bridge_g.png") ?>'};
                            marker_art = new google.maps.Marker({
                                position: myLatlng,
                                map: map,
                                icon: image,
                                title: title1
                            });
                            // art win. info. =====================================
                            bbridges.push(marker_art);


                            google.maps.event.addListener(marker_art, 'click', function () {
                                infoWindow.setContent(this.title);
                                infoWindow.open(map, this);
                            });
                        } else {

                            if (Latlng_building[i][0] == "លូមូលមុខមួយ") {
                                var image = {url: '<?= base_url("/assets/bs/css/images/map/tires.png") ?>'};

                                marker_art = new google.maps.Marker({
                                    position: myLatlng,
                                    map: map,
                                    icon: image,
                                    title: title1
                                });
                                // art win. info. =====================================
                                culverts.push(marker_art);


                                google.maps.event.addListener(marker_art, 'click', function () {
                                    infoWindow.setContent(this.title);
                                    infoWindow.open(map, this);
                                });
                            }
                            else
                            {
                                var image = {url: '<?= base_url("/assets/bs/css/images/map/tires.png") ?>'};

                                marker_art = new google.maps.Marker({
                                    position: myLatlng,
                                    map: map,
                                    title: title1
                                });
                                // art win. info. =====================================
                                markers.push(marker_art);


                                google.maps.event.addListener(marker_art, 'click', function () {
                                    infoWindow.setContent(this.title);
                                    infoWindow.open(map, this);
                                });

                            }
                        }
                    }

                }





                // pub conv & create marker =================================
                var position_pub = [<?= $position_pub ?>];
                var mystr_pub = '';
                var all_arr_pub = new Array();
                for (var i = 0; i < position_pub.length; i++) {
                    mystr_pub = proj4(utm, wgs84, [position_pub[i][1], position_pub[i][2]]);
                    all_arr_pub[i] = [position_pub[i][0], mystr_pub[1], mystr_pub[0], position_pub[i][3], position_pub[i][4], position_pub[i][5], position_pub[i][6]];
                }
                var Latlng_pub_building = all_arr_pub;
                var image = {url: '<?= base_url("/assets/bs/css/images/map/pub_building.png") ?>'};
                for (var i = 0; i < Latlng_pub_building.length; i++) {
                    var myLatlngs = new google.maps.LatLng(Latlng_pub_building[i][1], Latlng_pub_building[i][2]);


                    var title2 = "<center><b>សំណង់សាធារណៈ</center></b><br>ប្រភេទ:  " + Latlng_pub_building[i][0] + "<br>ឈ្មោះ	:  " + Latlng_pub_building[i][3] + "<br><br>ព័ត៌មានផ្លូវ   <br>ឈ្មោះផ្លូវ:  " + Latlng_pub_building[i][5] + "<br>ល.រ:  " + Latlng_pub_building[i][4] + "<br><br>";


                    if (Latlng_pub_building[i][0] == "សាលាឃុំ") {
                        var image = {url: '<?= base_url("/assets/bs/css/images/map/administration.png") ?>'};
                        var marker_pub = new google.maps.Marker({
                            position: myLatlngs,
                            map: map,
                            icon: image,
                            title: title2
                        });
                        mayors.push(marker_pub);
                    }
                    else {
                        if (Latlng_pub_building[i][0] == "វត្ត") {
                            var image = {url: '<?= base_url("/assets/bs/css/images/map/preah.png") ?>'};
                            var marker_pub = new google.maps.Marker({
                                position: myLatlngs,
                                map: map,
                                icon: image,
                                title: title2
                            });
                            pagodas.push(marker_pub);
                        }
                        else {
                            if (Latlng_pub_building[i][0] == "មណ្ឌលសុខភាព") {
                                var image = {url: '<?= base_url("/assets/bs/css/images/map/hospital.png") ?>'};
                                var marker_pub = new google.maps.Marker({
                                    position: myLatlngs,
                                    map: map,
                                    icon: image,
                                    title: title2
                                });
                                hospitals.push(marker_pub);
                            }
                            else {
                                if (Latlng_pub_building[i][0] == "សាលារៀន") {
                                    var image = {url: '<?= base_url("/assets/bs/css/images/map/pub_building.png") ?>'};
                                    var marker_pub = new google.maps.Marker({
                                        position: myLatlngs,
                                        map: map,
                                        icon: image,
                                        title: title2
                                    });
                                    schools.push(marker_pub);
                                }
                                else {

                                    if (Latlng_pub_building[i][0] == "វិហារឥស្លាម") {
                                        var image = {url: '<?= base_url("/assets/bs/css/images/map/mosque.png") ?>'};
                                        var marker_pub = new google.maps.Marker({
                                            position: myLatlngs,
                                            map: map,
                                            icon: image,
                                            title: title2
                                        });
                                        islams.push(marker_pub);
                                    }
                                    else {

                                        var image = {url: '<?= base_url("/assets/bs/css/images/map/pub_building - Copy.png") ?>'};
                                        var marker_pub = new google.maps.Marker({
                                            position: myLatlngs,
                                            map: map,
                                            icon: image,
                                            title: title2
                                        });
                                        publics.push(marker_pub);
                                    }
                                }
                            }
                        }
                    }
                    google.maps.event.addListener(marker_pub, 'click', function () {
                        infoWindow.setContent(this.title);
                        infoWindow.open(map, this);
                    });

                }


            }// end init. ==============================

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>

    <body style="margin-top: 50px;">
        <div id="panel">
            <input type="image" src="<?= base_url("/assets/bs/css/images/map/line.png") ?>" ><label>ផ្លូវជនបទ </label><br>
            <input type="image" src="<?= base_url("/assets/bs/css/images/map/bridge.png") ?>" ><label>ស្ពានឈើ</label><br>
            <input type="image" src="<?= base_url("/assets/bs/css/images/map/bridge_g.png") ?>" ><label>ស្ពានបេតុង</label><br>
            <input type="image" src="<?= base_url("/assets/bs/css/images/map/tires.png") ?>" ><label>លូមូលមុខមួយ</label><br>
            <input type="image" src="<?= base_url("/assets/bs/css/images/map/red.png") ?>" ><label>សំណង់សិល្បការ</label><br>
            <input type="image" src="<?= base_url("/assets/bs/css/images/map/pub_building.png") ?>" ><label>សាលារៀន</label><br>
            <input type="image" src="<?= base_url("/assets/bs/css/images/map/administration.png") ?>" ><label>សាលាឃុំ</label><br>
            <input type="image" src="<?= base_url("/assets/bs/css/images/map/preah.png") ?>" ><label>វត្ត</label><br>
            <input type="image" src="<?= base_url("/assets/bs/css/images/map/mosque.png") ?>" ><label>វិហារឥស្លាម</label><br>
            <input type="image" src="<?= base_url("/assets/bs/css/images/map/hospital.png") ?>" ><label>មណ្ឌលសុខភាព</label><br>
            <input type="image" src="<?= base_url("/assets/bs/css/images/map/pub_building - Copy.png") ?>" ><label>សំណង់សាធារណៈ</label><br>
        </div>
        <div id="map-canvas"></div>
    </body>
</html>
