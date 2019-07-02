<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/db_connenction_checker.php';


$sql = "SELECT id, staf_id, staf_pic, staf_name, staf_contact, staf_email FROM staf_info";
$result = mysqli_query($connection, $sql);


mysqli_close($connection);

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>TMD Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 90%;
			
			margin-top: 5.5%;
			margin-left: 22.2%;
			margin-right: 0%;
			
			
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


 <?php include('include/navbar.php') ?>


<script type="text/javascript">
    //<![CDATA[
    
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
            center: new google.maps.LatLng(22.5083151,91.7854283),
            zoom: 10,
            mapTypeId: 'roadmap'
        });

        infoWindow = new google.maps.InfoWindow;

        // Trigger downloadUrl at an interval
        intervalId = setInterval(triggerDownload, 1000);
    }


    var markersArray = [];

    function clearOverlays() {
        for (var i = 0; i < markersArray.length; i++ ) {
            markersArray[i].setMap(null);
        }
    }

    function triggerDownload() {
        function deleteMarkers() {
          if (marker && marker.setMap) {
    marker.setMap(null);
  }
        }

        // Change this depending on the name of your PHP file
        downloadUrl("http://localhost/iiuctest/map/map.php", function (data) {
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


<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js">
</script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="js/main.js"></script>
</body>
</html>
