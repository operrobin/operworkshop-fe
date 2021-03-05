function initMap()
{
    var latitude = parseFloat(document.getElementById("latdriver").value);
    var longitude = parseFloat(document.getElementById("longdriver").value);
    
    var locations = {lat: latitude, lng: longitude};
    var contentString = 'Posisi driver';
    var infowindow = new google.maps.InfoWindow({
      content: contentString,
      position: locations
    });
    var map = new google.maps.Map(
    document.getElementById('map_box'), {zoom: 4, center: locations});
    var marker = new google.maps.Marker({position: locations, map: map});
    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });
    map.setZoom(16);
   
}

try{
    document.getElementById('batalkan-btn').addEventListener('click', (e) => {
        $('#confirm_popup_cancel').modal('show');
    });
    
    document.getElementById('buttontidakcancel').addEventListener('click', (e) => {
        $('#confirm_popup_cancel').modal('hide');
    });
}catch(e){
    console.log(e);
}

try{
    document.getElementById('selesai-btn').addEventListener('click', (e) => {
        $('#confirm_popup').modal('show');
    });
    
    document.getElementById('buttontidak').addEventListener('click', (e) => {
        $('#confirm_popup').modal('hide');
    });
}catch(e){
    console.log(e);
}



