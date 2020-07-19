<!DOCTYPE html>
<html>
  <head>
    <title>ATLANTAS By Polres Depok</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY_mrUP7jZcUsmyuThxNljAMgVuzNqd-I&callback=initMap&libraries=visualization&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: "Roboto", "sans-serif";
        line-height: 30px;
        padding-left: 10px;
      }

      #floating-panel {
        background-color: #fff;
        border: 1px solid #999;
        left: 25%;
        padding: 5px;
        position: absolute;
        top: 10px;
        z-index: 5;
      }
    </style>
    <script>
        function test() {
            $.get('/get_maps', function(data){
                var dt = JSON.parse(data);
                console.log(dt);
                var arr = [];
                console.log(arr);
            });
        }
      (function(exports) {
        "use strict";

        // This example requires the Visualization library. Include the libraries=visualization
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=visualization">
        var heatmap;

        function initMap() {
            var l =  $('#length').val();
            var arr = [];
            for(let i = 0; i<l; i++){
                var j = i +1;
                arr.push({long: parseFloat($('#long'+j +'').val()), lat: parseFloat($('#lat'+j +'').val()), w: parseFloat($('#bobot'+j +'').val())*1000});
            }
            console.log(arr[2]);

            var ret = [
                {location: new google.maps.LatLng(arr[0].long, arr[0].lat), weight: arr[0].w},
                new google.maps.LatLng(arr[0].long, arr[0].lat),
                {location: new google.maps.LatLng(arr[1].long, arr[1].lat), weight: arr[1].w},
                new google.maps.LatLng(arr[1].long, arr[1].lat),
                {location: new google.maps.LatLng(arr[2].long, arr[2].lat), weight: arr[2].w},
                new google.maps.LatLng(arr[2].long, arr[2].lat),
                {location: new google.maps.LatLng(arr[3].long, arr[3].lat), weight: arr[3].w},
                new google.maps.LatLng(arr[3].long, arr[3].lat),
                {location: new google.maps.LatLng(arr[4].long, arr[4].lat), weight: arr[4].w},
                new google.maps.LatLng(arr[4].long, arr[4].lat),
            ];


            console.log(arr.length);
          exports.map = new google.maps.Map(document.getElementById("map"), {
            zoom: 10,
            center: {
              lat: -6.3944422,
              lng: 106.8213664
            },
          });
          heatmap = new google.maps.visualization.HeatmapLayer({
            data: ret,
            map: exports.map
          });
        }

        function toggleHeatmap() {
          heatmap.setMap(heatmap.getMap() ? null : exports.map);
        }

        function changeGradient() {
          var gradient = [
            "rgba(0, 255, 255, 0)",
            "rgba(0, 255, 255, 1)",
            "rgba(0, 191, 255, 1)",
            "rgba(0, 127, 255, 1)",
            "rgba(0, 63, 255, 1)",
            "rgba(0, 0, 255, 1)",
            "rgba(0, 0, 223, 1)",
            "rgba(0, 0, 191, 1)",
            "rgba(0, 0, 159, 1)",
            "rgba(0, 0, 127, 1)",
            "rgba(63, 0, 91, 1)",
            "rgba(127, 0, 63, 1)",
            "rgba(191, 0, 31, 1)",
            "rgba(255, 0, 0, 1)"
          ];
          heatmap.set("gradient", heatmap.get("gradient") ? null : gradient);
        }

        function changeRadius() {ipconfig
          heatmap.set("radius", heatmap.get("radius") ? null : 1500);
        }

        function changeOpacity() {
          heatmap.set("opacity", heatmap.get("opacity") ? null : 0);
        } // Heatmap data: 500 Points

        function getPoints() {
            var arr = [];
            $.get('/get_maps', function(data){
                var dt = JSON.parse(data);
                arr = [];
                for(let i = 0; i<dt.length; i++){
                    arr.push({
                        location: new google.maps.LatLng(dt[i].longitude, dt[i].latitude), weight: dt[i].nilai * 1000},
                    new google.maps.LatLng(dt[i].longitude, dt[i].latitude)
                    );
                }
            });

            var ret = [
                {location: new google.maps.LatLng(-6.3618361, 106.8569296), weight: 262},
                new google.maps.LatLng(-6.3618361, 106.8569296),
                {location: new google.maps.LatLng(-6.3664463, 106.8324152), weight: 233},
                new google.maps.LatLng(-6.3664463, 106.8324152),
                {location: new google.maps.LatLng(-6.3871428, 106.7407805), weight: 184},
                new google.maps.LatLng(-6.3871428, 106.7407805),
                {location: new google.maps.LatLng(-6.3795113, 106.8478382), weight: 162},
                new google.maps.LatLng(-6.3795113, 106.8478382),
                {location: new google.maps.LatLng(-6.3919866, 106.7751126), weight: 157},
                new google.maps.LatLng(-6.3919866, 106.7751126)
            ];
        }

        exports.changeGradient = changeGradient;
        exports.changeOpacity = changeOpacity;
        exports.changeRadius = changeRadius;
        exports.getPoints = getPoints;
        exports.initMap = initMap;
        exports.toggleHeatmap = toggleHeatmap;
      })((this.window = this.window || {}));
    </script>
  </head>
  <body>
    <div id="floating-panel">
    <input type="text" id="length" value="{{count($val)}}"/>
        @foreach($val as $v)
        <input type="text" id="long{{$v->id}}" value="{{$v->longitude}}"/>
        <input type="text" id="lat{{$v->id}}" value="{{$v->latitude}}"/>
        <input type="text" id="bobot{{$v->id}}" value="{{$v->nilai}}"/>
        @endforeach
    </div>
    <div id="map"></div>
  </body>
</html>
