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

            // ==============================
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

                //flightPath.setMap(map);
                layer = new google.maps.FusionTablesLayer({
                    query: {
                        select: 'geometry',
                        from: '1SX-566ouCecC_uSMgCbk7SZCIw9IBSj7BkMBtXau',
                        //where: "'type_pavement' = 'កៅស៊ូ ២ ជាន់'",  
                    },
                    styles: [
                        {where: "'type_pavement' = 'កៅស៊ូ ២ ជាន់'",
                            polylineOptions: {
                                strokeColor: "#00FF00",
                                strokeWeight: "4"}},
                        {where: "'type_pavement' = 'បេតុង'",
                            polylineOptions: {
                                strokeColor: "#00FF00",
                                strokeWeight: "4"}},
                        {where: "'type_pavement' = 'កៅស៊ូ ១ ជាន់'",
                            polylineOptions: {
                                strokeColor: "#00FF00",
                                strokeWeight: "4"}},
                        {where: "'type_pavement' = 'ដីស'",
                            polylineOptions: {
                                strokeColor: "#F0FF00",
                                strokeWeight: "1"}},
                        {where: "'type_pavement' = 'ក្រួសក្រហម'",
                            polylineOptions: {
                                strokeColor: "#00FFFF",
                                strokeWeight: "0.5"}},
                        {
                            polylineOptions: {
                                strokeColor: "#00FF00",
                                strokeWeight: "10"}}
                    ],
                    suppressInfoWindows: true
                });

                layer.setMap(map);

                //Load Markers from the XML File, Check (map_process.php)
                //$.get("http://localhost/rri/rri_db_2015-01-12/map_process.php", function (data) {

                $.get("<?= base_url("map_process.php") ?>", function(data) {
                    $(data).find("marker").each(function() {
                        var name = $(this).attr('name');
                        var address = $(this).attr('address');
                        var type = $(this).attr('type');
                        //var point 	= new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
                        var mystr_art1 = (proj4(utm, wgs84, [parseFloat($(this).attr('lat')), parseFloat($(this).attr('lng'))]));
                        //var point 	= new google.maps.LatLng((proj4(utm, wgs84, [(parseFloat($(this).attr('lat')), parseFloat($(this).attr('lng')))]))[1],(proj4(utm, wgs84, [parseFloat($(this).attr('lat')), parseFloat($(this).attr('lng'))]))[0]);
                        var point = new google.maps.LatLng(parseFloat(mystr_art1[1]), parseFloat(mystr_art1[0]));
                        //alert((proj4(utm, wgs84, [parseFloat($(this).attr('lat')), parseFloat($(this).attr('lng'))]))[1]);
                        //alert((proj4(utm, wgs84, [parseFloat($(this).attr('lat')), parseFloat($(this).attr('lng'))]))[0]);

                        create_marker(point, map, name, address, false, false, false, image);
                    });
                });

            }
            
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>

    <body style="margin-top: 50px;">
        <div id="map-canvas"></div>
    </body>
</html>
