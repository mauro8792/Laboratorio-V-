<?php echo "hola"; ?>



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
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
      
        <script>
          function initMap() {
            var uluru = {lat: -37.976901, lng: -57.5828187};
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 12,
              center: uluru
            });
         
          	
        </script>

       



    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTuazTT4ftRrTOscHQYPabgJPLiBS9YXc&callback=initMap">
    </script> 
  </body>
</html>