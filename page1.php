<!DOCTYPE html>
<html>
  <head>
  <meta charset=utf-8 />
  <title>Draw &amp; animate a line on a map</title>
  <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
  <script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.js'></script>
  <link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.5/mapbox.css' rel='stylesheet' />
  <style>
    body { margin:0; padding:0; }
    #map { position:absolute; top:0; bottom:0; width:100%; }
  </style>
  </head>
  <body>
  <div id='map'></div>

  <script type="text/javascript">
    L.mapbox.accessToken = 'pk.eyJ1IjoibWFoZGVyIiwiYSI6Ik1KUXV5RDgifQ.fjpuAcnf6NvfA7RGEQ95xQ';
    var map = L.mapbox.map('map', 'examples.map-i86nkdio')
        .setView([0, 0], 3);

    // Add a new line to the map with no points.
    var polyline = L.polyline([]).addTo(map);

    // Keep a tally of how many points we've added to the map.
    var pointsAdded = 0;

    // Start drawing the polyline.
    add();

    function add() {

        // `addLatLng` takes a new latLng coordinate and puts it at the end of the
        // line. You optionally pull points from your data or generate them. Here
        // we make a sine wave with some math.
        polyline.addLatLng(
            L.latLng(
                Math.cos(pointsAdded / 30) * 30,
                pointsAdded));
            console.log('Points Added L ' + pointsAdded);
            //pointsAdded = 1;

        // Pan the map along with where the line is being added.
        map.setView([0, pointsAdded], 3);

        // Continue to draw and pan the map by calling `add()`
        // until `pointsAdded` reaches 360.
        if (++pointsAdded < 40){
            window.setTimeout(add, 100);
        }else{
            alert('That is my home country!');
        }
    }
  </script>
  </body>
</html>
