<div id="map-overlay">
  <h3><?php _e( 'Venue', 'view_source' );?></h3>
  <span class="address"><?php _e( 'Gerding Theater at the Armory', 'view_source' );?></span><br>
  <span><?php _e( '128 NW Eleventh Avenue', 'view_source' );?></span><br>
  <span><?php _e( 'Portland, OR 97209', 'view_source' );?></span>
  <a class="button" href="<?php _e( '/venue' );?>"><?php _e( 'Full Venue Info', 'view_source' );?></a>
</div>
<div id="map" style="height: 400px;width: 100%;"></div>

<script>
  function initMap(){var myLatLng = {lat:45.524167,lng: -122.6816826};var map = new google.maps.Map(document.getElementById('map'), {zoom: 14, center: myLatLng, scrollwheel: false});var marker = new google.maps.Marker({position: myLatLng, map: map, title: 'Gerding Theater at The Armory'});var contentString = '<div id="content">'+ '<p><strong>Gerding Theater at The Armory</strong></p>'+ '<p> ' + '128 NW 11th Ave Portland, OR 97209' + '</p>'+ '</div>';var infowindow = new google.maps.InfoWindow({content: contentString});marker.addListener('click', function() {infowindow.open(map, marker);});}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrGCYEv7uapMzPf1Mhs9bGkSr59SlL5hc&callback=initMap"></script>
