<?php get_header(); ?>

<?php

?>


<?php

$args= array(
  'post_type'=> 'post'
);

$loop= new WP_Query($args);

if ( $loop->have_posts() ) {
  $map_lat = array();
  $map_long = array();
  $mapContent = array();
  while ( $loop->have_posts() ) {
    $loop->the_post();
    
    /* loop markup here using the_content() etc */
    $location = get_field('location', $loop->ID);
    
    
    foreach ($loop->posts as $post) {
      $location = get_field('location', $loop->ID);
      $map_lat[] = $location['lat'];
      $map_long[] = $location['lng'];
      $mapContent[] = get_the_title($loop->ID);
    }
    
  }
}
?>

<?php wp_reset_postdata(); ?>

<div id="floating-panel">
<select id="mode">
  <option value="DRIVING">Driving</option>
  <option value="WALKING">Walking</option>
  <option value="BICYCLING">Bicycling</option>
  <option value="TRANSIT">Transit</option>
</select>
</div>
<div id="map-wrapper">
  <div id="map"></div>
</div>
<div id='info' class="">content here</div>


<script>
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(initialize);
  } else {
    var coords = 'nothing here';
  };


  function initialize(position) {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var lat = position.coords.latitude;
    var long = position.coords.longitude;
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var useragent = navigator.userAgent;
    
    var mapOptions = {
      center: new google.maps.LatLng(lat, long),
      mapTypeId: 'roadmap',
      zoom: 13,
    };
    
    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    directionsDisplay.setMap(map);
    
    var $map_lats = <?php echo json_encode($map_lat ); ?>;
    var $map_longs = <?php echo json_encode($map_long ); ?>;
    var $mapTitle = <?php echo json_encode($mapContent ); ?>;
    
    
    var $mapcos = '';
    var arr = [];
    var markers = [];
    var image = {
    url: 'https://burger-van-near-me-stevesnow1.c9users.io/wp-content/themes/blankslate/images/food-van-pin.png',
    // This marker is 20 pixels wide by 32 pixels high.
    size: new google.maps.Size(80, 128),
    // // The origin for this image is (0, 0).
    // origin: new google.maps.Point(0, 0),
    // // The anchor for this image is the base of the flagpole at (0, 32).
    // anchor: new google.maps.Point(0, 32)
  };
    
    
    // Info Window Content
    var infoWindowContent =  $mapTitle;
    
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map
    for( i = 0; i < $map_longs.length; i++ ) {
      
      var position = new google.maps.LatLng($map_lats[i], $map_longs[i]);
      bounds.extend(position);
      marker = new google.maps.Marker({
        position: position,
        map: map,
        icon: image
      });
      
      // Allow each marker to have an info window
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          
          var links = '';
          if(useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1) {
            // mobile google map link
            var links = ' <a href="comgooglemapsurl://maps.google.com/maps?saddr='+lat +','+ long+'&daddr='+$map_lats[i] + ',' + $map_longs[i] +'&sspn=0.2,0.1&nav=1&x-source=SourceApp&x-success=sourceapp://?resume=true">Mobile Map</a>';
          } else {
            // web google map link
            var links = ' <a id="web-link" href="https://maps.google.com/?saddr='+lat +','+ long+'&daddr='+$map_lats[i] + ',' + $map_longs[i] +'" target="_BLANK">Get Directions</a>';
          }
          
          jQuery('#info').addClass('open');
          document.getElementById("info").innerHTML = infoWindowContent[i] + links;
          
           var selectedMode = document.getElementById('mode').value;
           
           calculateAndDisplayRoute(directionsService, directionsDisplay, lat +','+ long, $map_lats[i] + ',' + $map_longs[i], selectedMode);
        }
      })(marker, i));
      
    }
    
    function calculateAndDisplayRoute(directionsService, directionsDisplay, from, to, selectedMode) {
      directionsService.route({
        origin: from,
        destination: to,
        travelMode: selectedMode
      }, function(response, status) {
        if (status === 'OK') {
          directionsDisplay.setDirections(response);
        } else {
          window.alert('Directions request failed due to ' + status);
        }
      });
    }
    
  }
    </script>



<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcJo0L0g0dSrV6mh8d1FU01gr4ecIcjko&callback=">
</script>
