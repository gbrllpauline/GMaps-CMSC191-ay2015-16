<!DOCTYPE html>
<html>
    <head>
        <script src="http://maps.googleapis.com/maps/api/API_KEY"></script>
        <script>
        var places = "";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200){
                places = (xhttp.responseText).split('_');           
            }            
        };
        xhttp.open("GET", "connect.php", true);
        xhttp.send(); 
                
        var center;
        var markers = [];
        var mapProp;
        
        function initialize(){
           
            places.forEach(function(place){
               place = place.replace("array", "").
               var details = place.split('-');
               if(details[0] == "SM City Calamba"){
                   center = new google.maps.LatLng(parseFloat(details[1]), parseFloat(details[2]));
                   mapProp = {
                      center:center,
                      zoom:30,
                      mapTypeId:google.maps.MapTypeId.ROADMAP
                   };
               }
               markers.push(temp);
            });

            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

            var mainMarker=new google.maps.Marker({
              position:center,
            });    

            mainMarker.setMap(map);
            
            markers.forEach(function(marker){
                var tempCoordinate = new google.maps.LatLng(parseFloat(marker[1]), parseFloat(marker[2]));
                var mark = new google.maps.Marker({
                    position:tempCoordinate
                });
                
                mark.setMap(map);
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>

    <body>
    <div id="googleMap" style="width:1500px;height:1500px;"></div>
    </body>
</html>

