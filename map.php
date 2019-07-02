<?php

require_once 'php_action/db_connect.php';










?>  

<!DOCTYPE html >
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 80%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div> 
<?php include('include/navbar.php') ?>
   
 </div>

<div id="map"></div>

<script type="text/javascript">
   
    
    var map, infoWindow, intervalId;

    var customLabel = {
        student: {
            label: 'S'
        },
        teacher: {
            label: 'T'
        }
    };


    function load() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(22.65, 91.75),
            zoom: 10,
            mapTypeId: 'roadmap'
        });

        infoWindow = new google.maps.InfoWindow;

        // Trigger downloadUrl at an interval
        intervalId = setInterval(triggerDownload, 1000);
    }


      var markersArray = [];

  
    function deleteMarkers() {
          if (marker && marker.setMap) {
    marker.setMap(null);
  }
        }

    function triggerDownload() {
         function clearOverlays() {
        for (var i = 0; i < markersArray.length; i++ ) {
            markersArray[i].setMap(null);
        }
    }


        // Change this depending on the name of your PHP file
        downloadUrl("https://iiuctmdtest.000webhostapp.com/map/map.php", function (data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var id = markerElem.getAttribute('id');
                var name = markerElem.getAttribute('no');
                var address = markerElem.getAttribute('pass');
                //var type = markerElem.getAttribute('type');
                var speed = markerElem.getAttribute('speed');
                var des = markerElem.getAttribute('des');
                var time = markerElem.getAttribute('time');


                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));

                var infowincontent = document.createElement('div');
                var strong = document.createElement('strong');
                strong.textContent = "IIUC Bus Number :"+name
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'));

                var text = document.createElement('text');
                text.textContent = "Passenger Count :"+address
                infowincontent.appendChild(text);
                infowincontent.appendChild(document.createElement('br'));

                // var text1 = document.createElement('text');
                // text1.textContent = "Type :"+type
                // infowincontent.appendChild(text);
                // infowincontent.appendChild(document.createElement('br'));

                var text2 = document.createElement('text');
                text2.textContent = "Destination :"+des
                infowincontent.appendChild(text2);
                infowincontent.appendChild(document.createElement('br'));

                var text3 = document.createElement('text');
                text3.textContent = "Speed :"+speed+"MPH"

                infowincontent.appendChild(text3);
                infowincontent.appendChild(document.createElement('br'));

                var text4 = document.createElement('text');
                text4.textContent = "Time :"+time
                infowincontent.appendChild(text4);
                infowincontent.appendChild(document.createElement('br'));


                var icon =  {};
                var marker = new google.maps.Marker({




                        map: map,
                    position: point,
                    gestureHandling: 'greedy',

                   label: icon.label
                });
                
      
                marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                });
            });

        });
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;

        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}

    //]]>

</script>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=&callback=load">



</script>
</body>
</html>
