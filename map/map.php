<?php


$username = "id8364444_iiuctmdtest";
$password = "mgsr25657860";
$database = "id8364444_iiuctmdtest";


// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysqli_error());}

// Set the active MySQL database

$db_selected = mysqli_select_db($connection,$database);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error());
}

// Select all the rows in the markers table

$query = "SELECT * FROM markers ORDER BY `id` DESC LIMIT 1";
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}


        // output data of each row

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
   $stat = $row['stat'];
           
            if($stat=="1"){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['id']);
  $newnode->setAttribute("no",$row['no']);
  $newnode->setAttribute("pass", $row['pass']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  //$newnode->setAttribute("type", $row['type']);
  $newnode->setAttribute("des", $row['des']);
  $newnode->setAttribute("speed", $row['speed']);
  $newnode->setAttribute("time", $row['time']);
 
}
}
echo $dom->saveXML();

?>