<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: -6.1663454, lng: 106.7278299};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14.25,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHWO3GoleABtByKJQPSgKOmVVVtjqGo00&callback=initMap">
    </script>
  </body>
</html>