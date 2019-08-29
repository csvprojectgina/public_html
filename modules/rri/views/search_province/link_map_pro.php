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
                            art.road_id,
                            art.type_building_art,
                            art.dimension_building_art,
                            art.quality_building_art,
                            art.position_x_building_art,
                            art.position_y_building_art,
                            art.idtemp2,
                            tr.road_name,
                            tr.type
                    FROM
                            art_building AS art
                    INNER JOIN road_info AS tr ON art.road_id = tr.road_id
                    WHERE
                            art.pro_id = '{$pro_id}' ");
$post_art = '';
if ($qr_art->num_rows() > 0) {
    foreach ($qr_art->result() as $row_art) {
        $post_art .= '["' . $row_art->type_building_art . '", ' . $row_art->position_x_building_art . ', ' . $row_art->position_y_building_art . ', ' . $row_art->road_id . ', "' . $row_art->idtemp2 . '", "' . $row_art->road_name . '", ' . $row_art->type . ', "' . $row_art->dimension_building_art . '"],';
    }
}

// pu_building ==================================================
$qr_pub_b = query("SELECT
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
                                pub.pro_id = '{$pro_id}' ");
$post_pub = '';
if ($qr_pub_b->num_rows() > 0) {
    foreach ($qr_pub_b->result() as $row_p) {
        $post_pub .= '["' . $row_p->type_building . '", ' . $row_p->position_x . ', ' . $row_p->position_y . ', "' . $row_p->name_building . '", "' . $row_p->idtemp3 . '", "' . $row_p->road_name . '", ' . $row_p->type . '],';
        //$post_pub .= '["' . $row_p->type_building . ' (' . $row_p->name_building . ')", ' . $row_p->position_x . ', ' . $row_p->position_y . '],';
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
            /*html, body, #map-canvas {
                height: 95%;
                margin: 10px;
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
                margin-top: 32px;
                border: 1px solid #999;
            }*/

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
        <script type="text/javascript" src="<?= base_url("js/jquery-1.10.2.min.js") ?>"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAY0GGL4bv17otHQOPHgGD67PaLs-zhH_8&sensor=false"></script>
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
                var mapOptions = {
                    zoom: 9,
                    maxZoom: 16,
                    minZoom: 5,
                    center: new google.maps.LatLng(12.624696, 104.853481),
                    mapTypeId: google.maps.MapTypeId.HYBRID
                };
                var mapDiv = document.getElementById('map-canvas');
                map = new google.maps.Map(mapDiv, mapOptions);
                infoWindow = new google.maps.InfoWindow();
                infoWnd = new google.maps.InfoWindow();

                // function show or hide
                $("#myCheckbox").click(function() {
                    if (this.checked)
                    {
                        layer1.setMap(map);
                    } else
                    {
                        layer1.setMap(null);
                    }
                });
                $("#myCheckboxroad").click(function() {
                    if (this.checked)
                    {
                        layer.setMap(map);
                    } else
                    {
                        layer.setMap(null);
                    }
                });

                $("#myCheckboxwbridge").click(function() {
                    if (this.checked)
                    {
                        showschools(wbridges, map);
                    } else
                    {
                        showschools(wbridges, null);
                    }
                });

                $("#myCheckboxbbridge").click(function() {
                    if (this.checked)
                    {
                        showschools(bbridges, map);
                    } else
                    {
                        showschools(bbridges, null);
                    }
                });

                $("#myCheckboxculvert").click(function() {
                    if (this.checked)
                    {
                        showschools(culverts, map);
                    } else
                    {
                        showschools(culverts, null);
                    }
                });


                $("#myCheckboxother").click(function() {
                    if (this.checked)
                    {
                        showMarkers();
                    } else
                    {
                        clearMarkers();
                    }
                });

                $("#myCheckboxschool").click(function() {
                    if (this.checked)
                    {
                        showschools(schools, map);
                    } else
                    {
                        showschools(schools, null);
                    }
                });

                $("#myCheckboxmayor").click(function() {
                    if (this.checked)
                    {
                        showschools(mayors, map);
                    } else
                    {
                        showschools(mayors, null);
                    }
                });

                $("#myCheckboxpagoda").click(function() {
                    if (this.checked)
                    {
                        showschools(pagodas, map);
                    } else
                    {
                        showschools(pagodas, null);
                    }
                });

                $("#myCheckboxhospital").click(function() {
                    if (this.checked)
                    {
                        showschools(hospitals, map);
                    } else
                    {
                        showschools(hospitals, null);
                    }
                });

                $("#myCheckboxpublic").click(function() {
                    if (this.checked)
                    {
                        showschools(publics, map);
                    } else
                    {
                        showschools(publics, null);
                    }
                });


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


                function openInfoWindow(ftMouseEvt) {
                    var html = [];
                    html.push("<table class='ftTable'>");
                    for (var field in ftMouseEvt.row) {
                        html.push("<tr><th>" + field + "</th><td>" + ftMouseEvt.row[field].value + "</td></tr>");
                        //infoWindow.setContent(event.row['description'].value);
                    }
                    html.push("</table>");
                    infoWnd.setOptions({
                        content: html.join(""),
                        position: ftMouseEvt.latLng,
                        pixelOffset: ftMouseEvt.pixelOffset
                    });
                    infoWnd.open(map);
                }

                layer1 = new google.maps.FusionTablesLayer({
                    query: {
                        select: 'geometry',
                        from: '1R7HAFoX-GD3ltPq-y3BurL5FGflaFniu5_IUXnP9',
                        where: 'province=<?= $pro_id ?>'
                    },
                    styles: [{
                            polygonOptions: {
                                fillColor: "#00FF00",
                                fillOpacity: 0.15,
                                strokeColor: "#0000FF",
                                visible: "false"
                            },
                            suppressInfoWindows: true
                        }]
                });
                //layer1.setMap(map);


                layer = new google.maps.FusionTablesLayer({
                    query: {
                        select: 'geometry',
                        //from: '1THOKlu-_dNd3qkD3IbwBb0r7tBH_K5t7spGez8ez',
                        from: '15g7yOqueKggzfAffOaI5NHsyk5wzGeSVlR0xc6cs',
                        where: 'pro_id=<?= $pro_id ?>'
                    },
                    suppressInfoWindows: true
                });


                google.maps.event.addListener(layer, 'click', function(event) {

                    layer.set("styles", [{
                            where: "idtemp=" + event.row['idtemp'].value,
                            polylineOptions: {
                                strokeColor: "#00F000",
                                strokeWeight: "4"}
                        }]);

                    //this.setOptions({fillColor: "#00F000"});

                    //infoWindow.setContent(event.row['description'].value);
                    openInfoWindow(event);
                    //alert(event.row['description'].value);
                });

                function showInContentWindow(text) {
                    var sidediv = document.getElementById('content-window');
                    sidediv.innerHTML = text;
                }


                layer.setMap(map);

                // ========================================================
                var utm = "+proj=utm +zone=48";
                var wgs84 = "+proj=longlat +ellps=WGS84 +datum=WGS84 +no_defs";

                // art conv. & create marker =================================
                var position_art = [<?= $post_art ?>];
                var mystr_art = '';
                var all_arr_art = new Array();
                for (var i = 0; i < position_art.length; i++) {
                    mystr_art = proj4(utm, wgs84, [position_art[i][1], position_art[i][2]]);
                    all_arr_art[i] = [position_art[i][0], mystr_art[1], mystr_art[0], position_art[i][3], position_art[i][4], position_art[i][5], position_art[i][6], position_art[i][7]];
                }
                var Latlng_building = all_arr_art;
                //var marker_art=new Array();
                //var infoWindow=new Array();


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


                        google.maps.event.addListener(marker_art, 'click', function() {
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


                            google.maps.event.addListener(marker_art, 'click', function() {
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


                                google.maps.event.addListener(marker_art, 'click', function() {
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


                                google.maps.event.addListener(marker_art, 'click', function() {
                                    infoWindow.setContent(this.title);
                                    infoWindow.open(map, this);
                                });

                            }
                        }
                    }

                }

                // pub conv & create marker =================================
                var position_pub = [<?= $post_pub ?>];
                var mystr_pub = '';
                var all_arr_pub = new Array();
                for (var i = 0; i < position_pub.length; i++) {
                    mystr_pub = proj4(utm, wgs84, [position_pub[i][1], position_pub[i][2]]);
                    all_arr_pub[i] = [position_pub[i][0], mystr_pub[1], mystr_pub[0], position_pub[i][3], position_pub[i][4], position_pub[i][5], position_pub[i][6]];
                }
                var Latlng_pub_building = all_arr_pub;

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
                    google.maps.event.addListener(marker_pub, 'click', function() {
                        infoWindow.setContent(this.title);
                        infoWindow.open(map, this);
                    });

                    // art win. info. =====================================
                }

            }// end init. ===============================

            function setAllMap(markers, map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }
            function clearMarkers() {
                setAllMap(markers, null);
            }

            function showMarkers() {
                setAllMap(markers, map);
            }

            function showschools(a, b) {
                setAllMap(a, b);
            }

            function showNewRect(event) {
                infoWindow.setContent(alert(this.title));
                infoWindow.open(map, this);
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>

    <body style="margin-top: 40px;">
        <div id="panel">
            <input id="myCheckboxroad" type="checkbox" checked="checked" /><input type="image" src="<?= base_url("/assets/bs/css/images/map/line.png") ?>" ><label>ផ្លូវជនបទ </label><br>
            <input id="myCheckboxwbridge" type="checkbox" checked="checked" /><input type="image" src="<?= base_url("/assets/bs/css/images/map/bridge.png") ?>" ><label>ស្ពានឈើ</label><br>
            <input id="myCheckboxbbridge" type="checkbox" checked="checked" /><input type="image" src="<?= base_url("/assets/bs/css/images/map/bridge_g.png") ?>" ><label>ស្ពានបេតុង</label><br>
            <input id="myCheckboxculvert" type="checkbox" checked="checked" /><input type="image" src="<?= base_url("/assets/bs/css/images/map/tires.png") ?>" ><label>លូមូលមុខមួយ</label><br>
            <input id="myCheckboxother" type="checkbox" checked="checked" /><input type="image" src="<?= base_url("/assets/bs/css/images/map/red.png") ?>" ><label>សំណង់សិល្បការផ្សេងៗ</label><br>
            <input id="myCheckboxschool" type="checkbox" checked="checked" /><input type="image" src="<?= base_url("/assets/bs/css/images/map/pub_building.png") ?>" ><label>សាលារៀន</label><br>
            <input id="myCheckboxmayor" type="checkbox" checked="checked" /><input type="image" src="<?= base_url("/assets/bs/css/images/map/administration.png") ?>" ><label>សាលាឃុំ</label><br>
            <input id="myCheckboxpagoda" type="checkbox" checked="checked" /> <input type="image" src="<?= base_url("/assets/bs/css/images/map/preah.png") ?>" ><label>វត្ត</label><br>
            <input id="myCheckboxhospital" type="checkbox" checked="checked" /> <input type="image" src="<?= base_url("/assets/bs/css/images/map/hospital.png") ?>" ><label>មណ្ឌលសុខភាព</label><br>
            <input id="myCheckboxpublic" type="checkbox" checked="checked" /> <input type="image" src="<?= base_url("/assets/bs/css/images/map/pub_building - Copy.png") ?>" ><label>សំណង់សាធារណៈផ្សេងៗ</label><br>
        </div>
        <div id="map-canvas"></div>
    </body>
</html>