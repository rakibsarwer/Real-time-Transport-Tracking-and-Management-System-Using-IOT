<html><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title> - jsFiddle demo</title>

    <script type="text/javascript" src="/js/lib/dummy.js"></script>




    <link rel="stylesheet" type="text/css" href="/css/result-light.css">

    <style type="text/css">

    </style>



    <script type="text/javascript">//<![CDATA[
        window.onload=function(){
            var watchID = null;

            // PhoneGap is ready
            //
            function f() {
                // Update every 1 ms seconds
                var options = {enableHighAccuracy: true,timeout: 5000,maximumAge: 0,desiredAccuracy: 0, frequency: 1 };
                watchID = navigator.geolocation.watchPosition(onSuccess, onError, options);
            }

            // onSuccess Geolocation
            //
            function onSuccess(position) {

                var str = 'Latitude: '  + position.coords.latitude      + '<br>' +
                    'Longitude: ' + position.coords.longitude     + '<br>' +
                    'Timestamp: ' + position.timestamp     + '<br>\r\n' ;
                document.getElementById('result').value += str;
            }

            // clear the watch that was started earlier
            //
            function clearWatch() {
                if (watchID != null) {
                    navigator.geolocation.clearWatch(watchID);
                    watchID = null;
                }
            }

            // onError Callback receives a PositionError object
            //
            function onError(error) {
                alert('code: '    + error.code    + '\n' +
                    'message: ' + error.message + '\n');
            }

            document.getElementById('button').addEventListener('click', f);
        }//]]>

    </script>


</head>
<body>
<p id="geolocation">Watching geolocation...</p>
<button id="button"> Watch</button>
<textarea id="result" cols="100" rows="10"></textarea>






</body></html>