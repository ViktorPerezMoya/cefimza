<div id="map"></div>

@push('scripts')
<script>
    function initMap() {
      var myLatLng = {lat: $wire.lat(), lng: $wire.lng()}; // Coordenadas del mapa

      var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 14 // Nivel de zoom del mapa
      });

      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Avenida Colon 100 - Ciudad - Mendoza' // Título del marcador
      });
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu8FkdZ_cGzqsce6uRpghKiR-iMhVqpok&callback=initMap" async defer></script>

@endpush

