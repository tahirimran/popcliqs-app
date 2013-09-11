<?php

require('db.php');
require('popcliqs_functions.php');
require('user_event_class.php');

$event_id=$_GET["eventId"]; 
$user_id=$_GET["user_id"]; 

$tz = isset($_GET["tz"]) ? $_GET["tz"] : -330 ;

$conn = connect ($config);
$event_data = get_event_by_id($event_id , $conn , $tz );


$rsvp_id = user_event_rsvp_cd($event_id , $user_id , $conn  );

$user_zip = get_user_zip($conn , $user_id);
$distanceToEvent = get_distance_between_zips($conn, $event_data[0]->postal_code, $user_zip);

include ('event.layout.php');

?>