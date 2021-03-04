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

function submitcomment()
{
    
    var feedback = document.getElementById("feedback").value;
    var kodebooking = document.getElementById("kodebooking").value;
    var lokasibooking = document.getElementById("lokasibooking").value;
    var waktubooking = document.getElementById("waktubooking").value;

    document.getElementById("loader").style.display = "block";
    document.getElementById("buttonya").style.display = "none";
    document.getElementById("buttontidak").style.display = "none";
    
    var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    window.location = "https://booking.oper.co.id/customer/pesan.php?stats=1";
                   
                }
          };
        xhttp.open("POST", "submit_comment.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("feedback="+feedback+"&kodebooking="+kodebooking+"&lokasibooking="+lokasibooking+"&waktubooking="+waktubooking);
       
    
}

function batalkanbooking()
{
    
    var alasan = document.getElementById("reason").value;
    var kodebooking = document.getElementById("kodebooking").value;
    var idorderopertask = document.getElementById("idorderopertask").value;
    var idlokasi = document.getElementById("idlokasi").value;
    var bookingstats = document.getElementById("bookingstats").value;
    
    if(bookingstats == "0")
        {
    
    document.getElementById("loader_cancel").style.display = "block";
    document.getElementById("buttonyacancel").style.display = "none";
    document.getElementById("buttontidakcancel").style.display = "none";
    
    
   
    
    var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    
                    if(this.response == "1")
                        {
                            window.location = "https://booking.oper.co.id/customer/pesan.php?stats=4";    
                            
                        }
                    else if (this.response == "2")
                        {
                             document.getElementById("loader_cancel").style.display = "none";
                            document.getElementById("buttonyacancel").style.display = "block";
                            document.getElementById("buttontidakcancel").style.display = "block";
                            document.getElementById("confirm_popup_cancel").style.display = "none";
                            document.getElementById("bookingstats").value = "1";
                            document.getElementById("reason").value = "";
                            setTimeout( function ( ) { alert("Booking sudah dalam proses dan tidak dapat dibatalkan"); }, 1000 );
                            
                            
                            
                        }
                    else{
                         document.getElementById("loader_cancel").style.display = "none";
                            document.getElementById("buttonyacancel").style.display = "block";
                            document.getElementById("buttontidakcancel").style.display = "block";
                            document.getElementById("confirm_popup_cancel").style.display = "none";
                            document.getElementById("reason").value = "";
                        alert("Silahkan coba lagi");
                        
                    }
                      //
                   

                }
          };
        xhttp.open("POST", "booking_cancel.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.send("alasan="+alasan+"&kodebooking="+kodebooking+"&idopertask="+idorderopertask+"&idlokasi="+idlokasi);
}
    else{
        
         document.getElementById("loader_cancel").style.display = "none";
                            document.getElementById("buttonyacancel").style.display = "block";
                            document.getElementById("buttontidakcancel").style.display = "block";
                            document.getElementById("confirm_popup_cancel").style.display = "none";
                            document.getElementById("bookingstats").value = "1";
                            document.getElementById("reason").value = "";
                            setTimeout( function ( ) { alert("Booking sudah dalam proses dan tidak dapat dibatalkan"); }, 1000 );
        
        
    }
    
}
