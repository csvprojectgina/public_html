<?php
//PHP 5 +

// database settings 
$db_username = 'root';
$db_password = '111';
$db_name = 'rri_db1';
$db_host = 'localhost';

//mysqli
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
!$mysqli->set_charset("utf8");
if (mysqli_connect_errno()) 
{
	header('HTTP/1.1 500 Error: Could not connect to db!'); 
	exit();
}

################ Save & delete markers #################
if($_POST) //run only if there's a post data
{
	//make sure request is comming from Ajax
	$xhr = $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'; 
	if (!$xhr){ 
		header('HTTP/1.1 500 Error: Request must come from Ajax!'); 
		exit();	
	}
	
	// get marker position and split it for database
	$mLatLang	= explode(',',$_POST["latlang"]);
	$mLat 		= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
	$mLng 		= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
	
	//Delete Marker
	if(isset($_POST["del"]) && $_POST["del"]==true)
	{
		$results = $mysqli->query("DELETE FROM markers WHERE lat=$mLat AND lng=$mLng");
		if (!$results) {  
		  header('HTTP/1.1 500 Error: Could not delete Markers!'); 
		  exit();
		} 
		exit("Done!");
	}
	
	$mName 		= filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	$mAddress 	= filter_var($_POST["address"], FILTER_SANITIZE_STRING);
	$mType		= filter_var($_POST["type"], FILTER_SANITIZE_STRING);
	
	$results = $mysqli->query("INSERT INTO markers (name, address, lat, lng, type) VALUES ('$mName','$mAddress',$mLat, $mLng, '$mType')");
	if (!$results) {  
		  header('HTTP/1.1 500 Error: Could not create marker!'); 
		  exit();
	} 
	
	$output = '<h1 class="marker-heading">'.$mName.'</h1><p>'.$mAddress.'</p>';
	exit($output);
}


################ Continue generating Map XML #################

//Create a new DOMDocument object
$dom = new DOMDocument("1.0", 'utf-8');
//$node = $dom->createElement("markers"); //Create new element node
//$parnode = $dom->appendChild($node); //make the node show up 

// Select all the rows in the markers table
$results = $mysqli->query("SELECT * FROM art_building WHERE 1");
if (!$results) {  
	header('HTTP/1.1 500 Error: Could not get markers!'); 
	exit();
} 


//$result3 = $mysqli->query("set group_concat_max_len=8192000000");

// Select all the rows in the markers table
$results2 = $mysqli->query("SELECT GROUP_CONCAT(lng, ',', lat, ',', '100' separator ' ') AS coordinates,road_id FROM test_map group by Road_id ");
if (!$results2) {  
	header('HTTP/1.1 500 Error: Could not get markers!'); 
	exit();
} 





//set document header to text/xml
//header("Content-type: text/xml ;charset=UTF-8"); 
header("Content-type: text/html; charset=utf-8"); 
// Iterate through the rows, adding XML nodes for each
//while($obj = $results->fetch_object())
//{
//  $node = $dom->createElement("marker");  
//  $newnode = $parnode->appendChild($node);   
//  $newnode->setAttribute("name",$obj->type_building_art);
//  $newnode->setAttribute("address", $obj->road_id);  
//  $newnode->setAttribute("lat", $obj->position_x_building_art);  
//  $newnode->setAttribute("lng", $obj->position_y_building_art);  
//  $newnode->setAttribute("type", $obj->type_building_art);	
//}


// Start KML file, create parent node
//$dom = new DOMDocument('1.0','UTF-8');

//Create the root KML element and append it to the Document
$node = $dom->createElementNS('http://earth.google.com/kml/2.1','kml');
$parNode = $dom->appendChild($node);

//Create a Folder element and append it to the KML element
$fnode = $dom->createElement('Folder');
$folderNode = $parNode->appendChild($fnode);

//Iterate through the MySQL results
$row = @mysql_fetch_assoc($results2);



//Create a coordinates element and give it the value of the lng and lat columns from the results
$id=1;
while($obj = $results2->fetch_object())
{
    if ($id==1){
//Create a Placemark and append it to the document
$node = $dom->createElement('Placemark');
$placeNode = $folderNode->appendChild($node);

//Create an id attribute and assign it the value of id column
//$placeNode->setAttribute('id','road_id');

//Create name, description, and address elements and assign them the values of 
//the name, type, and address columns from the results

$nameNode = $dom->createElement('name',$obj->road_id);
$placeNode->appendChild($nameNode);

$descNode= $dom->createElement('description', 'Road Information <a href="http://localhost/rri/rri_db_2015-01-12/index.php/rri/roads/edit/'.$obj->road_id.'">view the road</a> Berkeley]]>');
$placeNode->appendChild($descNode);

//Create a LineString element
$lineNode = $dom->createElement('LineString');
$placeNode->appendChild($lineNode);

//$exnode = $dom->createElement('extrude', '1');
//$lineNode->appendChild($exnode);

//$almodenode =$dom->createElement(altitudeMode,'relativeToGround');
//$lineNode->appendChild($almodenode);

// $coorNode1 = $dom->createElement("road_id", $obj->road_id); 

// test optimization 

$pieces = explode(" ", $obj->coordinates);
$id1 =2 ;
$cood = "";
foreach ($pieces as $test){
    if ($id1 == 2) {
        $cood .= $test . " " ; 
        //$cood .= $id1 . " " ; 
            $id1 =0;    
    } else {
        //$cood .= "test" . " " ; 
        $id1 +=1 ;
    }
}
$coorNode = $dom->createElement("coordinates", $cood);
//$coorNode = $dom->createElement("coordinates", $obj->coordinates);
// $lineNode->appendChild($coorNode1);
$lineNode->appendChild($coorNode);
 
$id = 1; 
    } else {
        $id = 1;
    }
    
}

 //$coorNode= $dom->createElement('coordinates', $obj->coordinates);


echo $dom->saveXML();

if($dom->save('exemple_dom.kml')) echo "The simple document was created";
