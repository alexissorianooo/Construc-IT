//DECLARATION OF TEMPORARY LOCATION(PUP) IN THE MAP
// VARIABLES FOR THEIR LOCATION 
var lati;    //NORTH
var long;  //EAST
var dest_lati;
var dest_long;
var map;
var service;
var infowindow;
var loc;
var APIKEY = "3VLMJaxNxqrL9irFAm0RJuJ8ELNry3v9";  


// GETTING USER COORDINATES 
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  }
}

function showPosition(position) {
  lati= position.coords.latitude; 
  long= position.coords.longitude;
  loc = { lat: lati, lng: long };
  tomtom();
  // search();
}
        

// TOMTOM DEVS API 
function tomtom() {
  map = tt.map({
      key: APIKEY,
      container: "map",
      center: loc,
      zoom: 17,                    
  });
  search()
}


function search() {
  tt.services.fuzzySearch({
    key: APIKEY,
    query: "Hardware Store",
    relatedPois: 'all',
    countrySet: 'PH',
    container: "map",
    categorySet: '9361069',
    center: loc,
    radius: 500,
  })
  .then(function(result) {
    handleResults(result);
  });
}


function handleResults(result) {
  if(result.results) {
    console.log(result)
    var current = result.results[0].position
    if (loc == current){

      // IF THE CURRENT LOCATION IS AT A HARDWARE STORE THE 
      // MAP WILL REDIRECT THE USER TO THE OTHER NEAREST HARDWARE STORE
      moveMap(result.results[1].position)
    } 
    else 
      moveMap(result.results[0].position)
  }
}


function moveMap(lnglat) {
  var daan = [loc, lnglat]
  map.flyTo({
    center: lnglat,
    zoom: 20
  })
  tt.services.calculateRoute({
    key: APIKEY,
    locations: daan,
  }).then(function(routeData) {
    console.log(routeData.toGeoJson());
    var geojson = routeData.toGeoJson();
    map.addLayer({
        'id': 'route',
        'type': 'line',
        'source': {
            'type': 'geojson',
            'data': geojson
        },
        'paint': {
            'line-color': '#228B22',
            'line-width': 5
        }
    });
    var bounds = new tt.LngLatBounds();
    geojson.features[0].geometry.coordinates.forEach(function(point) {
        bounds.extend(tt.LngLat.convert(point));
    });
    map.fitBounds(bounds, {padding: 20});
  });
}



  // .then(function(routeData) {
  //   var geojson = routeData.toGeoJson();
  //   map.addLayer({
  //       'id': 'route',
  //       'type': 'line',
  //       'source': {
  //           'type': 'geojson',
  //           'data': geojson
  //       },
  //       'paint': {
  //           'line-color': '#00d7ff',
  //           'line-width': 8
  //       }
  //   });
  //   var bounds = new tt.LngLatBounds();
  //   geojson.features[0].geometry.coordinates.forEach(function(point) {
  //       bounds.extend(tt.LngLat.convert(point));
  //   });
  //   map.fitBounds(bounds, {padding: 20});
  // });









