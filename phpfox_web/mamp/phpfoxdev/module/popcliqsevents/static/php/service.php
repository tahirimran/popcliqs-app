<?php 

require('db.php');
require('popcliqs_functions.php');
require('user_event_class.php');

date_default_timezone_set("UTC");  
$user_id		= $_GET["userId"]; 	
$time_interval 	= $_GET["ti"];
$tz 			= isset($_GET["tz"]) ? $_GET["tz"] : 0 ;
$search_term    = isset($_GET["s"]) ? $_GET["s"] : false  ;


//echo  time();
$start_t  = time();
$start_t  = $start_t - (60 *  $tz);
$end_t 	  = $start_t + (60 * 60 * $time_interval );


$miles = 25;
$conn = connect ($config);

$user_zip = get_user_zip($conn , $user_id);

if( $user_zip){
	
	$age 			= get_user_age($conn , $user_id);
	$user_cat_pref  = get_user_cat_pref($conn , $user_id);
	$user_lat_log 	= get_lat_lon_zip( $user_zip ,  $conn);
	$results 		= getSplashEvent($conn , $start_t  , $end_t , $user_lat_log , $search_term , $age );

	$user_events 	= get_user_events($results);
	//var_dump($user_events);


	getNoOfMaybeAttendeeInfo($user_events , $conn);

	$ranked_events  = assign_rank_to_events($user_events , 
						$user_cat_pref , $user_lat_log, $start_t, $end_t, $miles);

	//echo " <br><br>";

	//var_dump($ranked_events);



}

//var_dump($ranked_events);
include ('json.layout.php');

?>