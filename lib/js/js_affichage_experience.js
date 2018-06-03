function initMap() {
  var $lat = $('.geo_pos.lat');
  var $lng = $('.geo_pos.lng');
  var uluru = {
    lat: parseFloat($lat.val()),
    lng: parseFloat($lng.val()),
  };
  console.log(uluru.lat + ':' + uluru.lng);
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: uluru,
  });
  var marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
