<!DOCTYPE html >
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
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
<div id="map"></div>

<script>
    var customLabel = {
        student: {
            label: 'S'
        },
        teacher: {
            label: 'T'
        }
    };




    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(22.4956389,91.7192852),
            zoom: 12

        });
        var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
        downloadUrl('http://localhost/iiuctmd/ad/min/admin/map/map.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var id = markerElem.getAttribute('id');
                var name = markerElem.getAttribute('no');
                var address = markerElem.getAttribute('pass');
                var type = markerElem.getAttribute('type');
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

                var text1 = document.createElement('text');
                text1.textContent = "Type :"+type
                infowincontent.appendChild(text);
                infowincontent.appendChild(document.createElement('br'));

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


                var icon = customLabel[type] || {};
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,

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
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);


    }

    var markersArray = [];

    function clearOverlays() {
        if (markersArray) {
            for (i in markersArray) {
                markersArray[i].setMap(null);
            }
        }
    }


    function doNothing() {}
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">



</script>
</body>
</html>
