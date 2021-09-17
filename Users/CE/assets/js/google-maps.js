//DECLARATION OF TEMPORARY LOCATION(PUP) IN THE MAP
// VARIABLES FOR THEIR LOCATION 
var lati=14.5979;    //NORTH
var long=121.0108;  //EAST
var map;
var service;
var infowindow;


// GETTING USER COORDINATES 
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  }
}

function showPosition(position) {
  lati= position.coords.latitude; 
  long= position.coords.longitude;
  findStore();
}
        

// Initialize and add the map
function initMap() {
  // The location entry
  var loc = { lat: lati, lng: long };
  // The map, centered at location

  map = new google.maps.Map(
    document.getElementById("map"),
    {
      zoom: 18,
      center: loc,
    }
  );
}



// CAN GO TO THE LOCATION OF THE USER BUT STILL CANT FIND NEARBY HARDWARE STORES
//GOOGLE MAPS WANTS MONEY TO USE THIS SERVICE YAWA
function findStore() {
  var lugar = new google.maps.LatLng(lati, long);

  infowindow = new google.maps.InfoWindow();

  map = new google.maps.Map(
      document.getElementById('map'), {center: lugar, zoom: 20});

      var request = {
        location: lugar,
        radius: 200,
        types: ['construction', 'hardware store'] 
      };
      infowindow = new google.maps.InfoWindow();
      var service = new google.maps.places.PlacesService(map);
      service.nearbySearch(request, callback);
    }
    
    function callback(results, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
          createMarker(results[i]);
        }
      }
    }
    
    function createMarker(place) {
      var placeLoc = place.geometry.location;
      var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
      });
    
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
      });
    }
    
    google.maps.event.addDomListener(window, 'load', initialize);



