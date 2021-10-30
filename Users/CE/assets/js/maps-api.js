//DECLARATION OF TEMPORARY LOCATION(PUP) IN THE MAP
// VARIABLES FOR THEIR LOCATION 
// https://developer.tomtom.com/
var lati;    //NORTH
var long;  //EAST
var map;
var loc;
var daan;
var autocomplete;
var geojson
var route = [];
var APIKEY = "3VLMJaxNxqrL9irFAm0RJuJ8ELNry3v9";  
var i = 0;
var ruta = 1;
var max;
var hw_name;
var hw_address;
var hw_lat;
var hw_lng;
var hw_num;
var hw_url;



// GETTING USER COORDINATES 
function getLocation() {  
  document.getElementById('locator').value = '';

  if (navigator.geolocation) {  
    navigator.geolocation.getCurrentPosition(showPosition, errorCallback);     
  }
}
const errorCallback = (error)  => {
  alert ("Application needs access to location for the hardware locator to work");
}


//ASSIGNING LOCATION BASED ON GPS
function showPosition(position) {
  lati= position.coords.latitude; 
  long= position.coords.longitude;
  loc = { lat: lati, lng: long };
  // loc = { lat: '14.5979', lng: '121.0108' };
  console.log(loc)
  tomtom(); 
}


//ASSIGNING LOCATION BASED ON USER INPUT
function searchLocation() {
    i = 0;
    if (i==0){
      document.getElementById('prev-store').style.visibility = 'hidden';
    }
  
    tt.services.geocode( {
      key: APIKEY,
      query: document.getElementById('locator').value,
      countrySet: 'PH',
    }).then(function(result) { 
      console.log(result);
      

    max = result.results.length;   
    console.log(max); //undefined
    if (max==1 || max==0) {
      lati = '12.8797';
      long = '121.7740';
      document.getElementById('hw-desc').innerHTML = "<b class='text-warning'>NO AVAILABLE HARDWARE STORE NEARBY.</b>";       
    } 
    else{
      lati = result.results[0].position.lat;
      long = result.results[0].position.lng;
      
    }

    loc = { lat: lati, lng: long };
    tomtom();
      
    })
}





//INITIALIZING MAP
function tomtom() {
  map = tt.map({
      key: APIKEY,
      container: "map",
      center: loc,
      zoom: 17,                    
  });  
  search();
}





//FUNCTION FOR SHOWING NEXT & PREVIOUS BUTTONS ON DISPLAYING 
//HARDWARE STORES
function nextStore(){
  
  i++;  
  console.log(max);
  console.log(i);
  maxCount = max-1;
  console.log(maxCount);
  if (i>0) {
    document.getElementById('prev-store').style.visibility = 'visible';
    search();
  }
  if (i==maxCount) {
      document.getElementById('next-store').style.visibility = 'hidden';
      search();
  } 
}

function prevStore(){
  i--;
  if (i==0){
    document.getElementById('prev-store').style.visibility = 'hidden';
    search();
  }   
  if (i<max){
      document.getElementById('next-store').style.visibility = 'visible';
      search();
  }    
}






//FINDING NEAREST HARDWARE STORE NEAR THE USERS CURRENT LOCATION
// GETS THE LOCATION OF THE HARDWARE STORE 
// CAN SWITCH THROUGH DIFFERENT HARDWARE STORES
// let maxCount=0;
// console.log(maxCount);
function search() {  
  
  tt.services.fuzzySearch({
    key: APIKEY,
    query: "Hardware Store",
    relatedPois: 'all',
    countrySet: 'PH',
    container: "map",
    categorySet: '9361069',
    center: loc,
    radius: 800,
  }).then(function(result) {
    // handleResults(result); 
    //DISPLAYS RESULT OF SEARCH AND STORES NUMBER OF FOUND STORES
    document.getElementById('hardware-info').style.visibility = "visible";
    document.getElementById('mapApi').style.marginTop = "85px";
    console.log(result);
    max = result.results.length;

    console.log(max)
    if (max==1 || max==0) {
      loc = {lat: '12.8797', lng: '121.7740'};
      document.getElementById('next-store').style.visibility = 'hidden';    
      document.getElementById('hw-desc').innerHTML = "<b class='text-warning'>NO MUNICIPALITY FOUND, PLEASE CHECK FOR MISPELLED WORDS.</b>";  
    // } else {
    //   document.getElementById('next-store').style.visibility = 'visible';   

    //   // maxCount++;
    //   // console.log(maxCount);

    //   // else if(max==maxCount){
    //   //   document.getElementById('next-store').style.visibility = 'hidden';
    //   //   console.log(maxCount);
    //   // }
    // }
    } if (i==(max-1)) {
      document.getElementById('next-store').style.visibility = 'hidden';
      
    } else{
      document.getElementById('next-store').style.visibility = 'visible';   
    }

    hw_name = result.results[i].poi.name;
    hw_address = result.results[i].address.freeformAddress;
    hw_lat = result.results[i].position.lat;
    hw_lng = result.results[i].position.lng;
    hw_num = result.results[i].poi.phone;
    hw_url= result.results[i].poi.url;    
    ruta++;
    var r = route[route.length - 1];

        checker()
        moveMap(result.results[i].position); 
        map.removeLayer(r);        
        draw();
    

    // switch (i) {
    //   case 0:           
    //     checker()
    //     moveMap(result.results[0].position); 
    //     map.removeLayer(r);        
    //     draw();   
    //     break;  

    //   case 1:                
    //     checker()
    //     moveMap(result.results[1].position)       
    //     map.removeLayer(r);     
    //     draw(); 
    //     break;

    //   case 2:  
    //     checker()
    //     moveMap(result.results[2].position)  
    //     map.removeLayer(r);  
    //     draw();          
    //     break;
    // }
  });
}





//CHECKS WHETHER THE POI URL AND CONTACT NUMBER ARE AVAILABLE FOR OUTPUT 
function checker(){
  if (hw_num === undefined && hw_url === undefined) {
    document.getElementById('hw-desc').innerHTML = "<b class='text-warning'>HARDWARE STORE NAME: </b class='text-warning'>" + hw_name + "<br><b class='text-warning'>ADDRESS: </b class='text-warning'>" + hw_address + "<br><b class='text-warning'>COORDINATES: </b>" +hw_lat+" N, "+hw_lng+" E";
  }
  else if (hw_url === undefined) {
  document.getElementById('hw-desc').innerHTML = "<b class='text-warning'>HARDWARE STORE NAME: </b class='text-warning'>" + hw_name + "<br><b class='text-warning'>ADDRESS: </b class='text-warning'>" + hw_address + "<br><b class='text-warning'>COORDINATES: </b>" +hw_lat+" N, "+hw_lng+" E<br><b class='text-warning'>CONTACT NUMBER: </b>"+hw_num;
  }
  else if (hw_num === undefined) {
    document.getElementById('hw-desc').innerHTML = "<b class='text-warning'>HARDWARE STORE NAME: </b class='text-warning'>" + hw_name + "<br><b class='text-warning'>ADDRESS: </b class='text-warning'>" + hw_address + "<br><b class='text-warning'>COORDINATES: </b>" +hw_lat+" N, "+hw_lng+" E<br><b class='text-warning'>WEBSITE: </b>"+hw_url;
  } else {   
    document.getElementById('hw-desc').innerHTML = "<b class='text-warning'>HARDWARE STORE NAME: </b class='text-warning'>" + hw_name + "<br><b class='text-warning'>ADDRESS: </b class='text-warning'>" + hw_address + "<br><b class='text-warning'>COORDINATES: </b>" +hw_lat+" N, "+hw_lng+" E<br><b class='text-warning'>CONTACT NUMBER: </b>"+hw_num+"<br><b class='text-warning'>WEBSITE: </b>"+hw_url;
  }
}



// GETS THE LOCATION OF THE HARDWARE STORE 
// VALIDATES IF THE USER IS ALREADY AT THE HARDWARE STORE, RO RE ROUTING
// function handleResults(result) {
//   document.getElementById('hardware-info').style.visibility = "visible";
//   if(result.results) {
//     console.log(result)
//       moveMap(result.results[i].position)
//   }
// }




//SETS THE MAP TO BE AND DRAWS THE LOCATION OF THE USER AND THE HARDWARE STORE
function moveMap(lnglat) {
  daan = [loc, lnglat]
  map.flyTo({
    center: lnglat,
    zoom: 18
  });
}


function draw() { 
  route.push(ruta)
  tt.services.calculateRoute({
    key: APIKEY,
    locations: daan,
  }).then(function(routeData) {
    console.log(routeData.toGeoJson());
    geojson = routeData.toGeoJson();
    map.addLayer({
        'id': String(ruta),
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


 













