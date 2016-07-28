/* Map script file - gives us pincode from map and gives input to temp.php to retrieve mechanics data*/


//check if geolocation technology is available and call if it is.
var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
            //alert("getLocation wroking"); 
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}


/*fetches lat and lon and set mapholder options (zoom in, zoom out) and set map on mapholder
  and calling reversegeocoding func 
*/
function showPosition(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
    var latlon = new google.maps.LatLng(lat, lon);
    var mapholder = document.getElementById("mapholder"); //change double qoutes
    mapholder.style.height = '350px';
    mapholder.style.width = '1000px';
    var myOptions = {
        center:latlon,zoom:14,
        mapTypeId:google.maps.MapTypeId.ROADMAP,
        mapTypeControl:false,
        navigationControlOptions: {style:google.maps.NavigationControlStyle.SMALL}
    }
    var map = new google.maps.Map(document.getElementById("mapholder"),myOptions);  
    var marker = new google.maps.Marker({ position: latlon, map: map, title: "You are here!" });
    getReverseGeocodingData(lat,lon);  
}


/* Displayed when there is error in showing map */
function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    } //switch end
} //show error func end



/* Converts (lat,lon) to human-readable address format */
function getReverseGeocodingData(lat, lng) {  

    var latlng = new google.maps.LatLng(lat, lng);   // This is making the Geocode request
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
        if (status !== google.maps.GeocoderStatus.OK) {
            //alert("geo coding status");
        }
       
        // This is checking to see if the Geoeode Status is OK before proceeding
        if (status == google.maps.GeocoderStatus.OK) {
            console.log(results);
            var address = (results[0].formatted_address);    //returns exact address
            var arrAddress = results[0].address_components; 
            ac = arrAddress.length-1;
            postalcode = arrAddress[ac].long_name;  //returns pin code

            //Passing postalcode and exact user location to temp.php for further processing
            var strURL= "temp.php?name=" + postalcode+"&name2=" +address;
            var xmlhttp = false;   
            try { xmlhttp = new XMLHttpRequest(); }
            catch(e) {      
                try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
                catch(e){
                    try{ xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); }
                    catch(e1){ xmlhttp = false; }
                }
            }

            xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4)
                    {     // only if "OK"
                        if (xmlhttp.status == 200) {
                            document.getElementById('address').innerHTML=xmlhttp.responseText; } 
                        else { alert("There was a problem while using XMLHTTP:\n" + xmlhttp.statusText); }
                    }
                 }
    
                xmlhttp.open("GET", strURL, true);
                xmlhttp.send(null);

        } //if status == ok end
    }); //geocoder.geocode() end
}  //reversegeocoding func end 


// loading icon related
document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'complete') {
         document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
  }
}

