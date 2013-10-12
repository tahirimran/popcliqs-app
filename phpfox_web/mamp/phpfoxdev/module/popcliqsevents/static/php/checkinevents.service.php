<?php 
	
	require('db.php');
	require('popcliqs_functions.php');
	require('user_event_class.php');
	require('mobile.functions.php');

	$_ERROR_AUTH = -1001;
	$_ERROR_ALL	 = -1000;
	$_SUCCESS    = 0;

	date_default_timezone_set("UTC");  


	$exit_cd = $_SUCCESS;
	$key  = isset($_GET["key"]) ? $_GET["key"] : null ;
	$tz   = isset($_GET["tz"]) ? $_GET["tz"] : 0 ;
	$demo   = isset($_GET["demo"]) ? $_GET["demo"] : false ;

	$start_t  = time();
	$start_t  = $start_t - (60 *  $tz);

	if($key === null  || $key === '' ){

		$exit_cd = $_ERROR_AUTH;
	}

	$keys = explode("$",$key);
	
	if(sizeof($keys)  < 2  ){
		$exit_cd = $_ERROR_AUTH;
	}

	$user_id = $keys[0];
	$pwd 	 = $keys[1];

	if($user_id === null  || $pwd  === null || $user_id === ''  || $pwd === '' ){

		$exit_cd = $_ERROR_AUTH;
	}

	$conn = connect ($config);
	$is_authorized =is_operation_authorised($conn ,$user_id, $pwd);

	$event_data_list = array();

	if( $is_authorized ){
		
		$checkin_eventid_list = fetch_checkin_event($conn ,$user_id , $start_t);
		
		foreach( $checkin_eventid_list as $checkin_eventid){
			$event_data = get_event_by_id($checkin_eventid , $conn , $tz);

			$event_data_list[] = $event_data[0];
			
		}

	}else{
		$exit_cd = $_ERROR_AUTH;
	} 

	if($demo){

		//var_dump($event_data_list);
		$user_event1 				= new User_Event();
		$user_event1->event_id   	= "100";
		$user_event1->start_time	= "21:00";
		$user_event1->end_time		= "23:00";
		$user_event1->title			= "Event 100 title";
		$user_event1->location		= "City Center";
		$user_event1->address		= "1 N street";
		$user_event1->city			= "Cupertino";
		$user_event1->postal_code	= "95014";
		$user_event1->category   	= "Professional";
		$user_event1->category_id   = "6";
		$user_event1->description   = "Event 100 description ";
		$user_event1->age_limit     = "-1";
		$user_event1->lat      		= "37.317363";
		$user_event1->lon      		= "-122.038604";
		$user_event1->start_dt      = "10/12/2013";
		$user_event1->end_dt      	= "10/12/2013";

		$event_data_list[] =  $user_event1; 

		$user_event2				= new User_Event();
		$user_event2->event_id   	= "101";
		$user_event2->start_time	= "10:00";
		$user_event2->end_time		= "14:00";
		$user_event2->title			= "Event 101 title";
		$user_event2->location		= "Town Center";
		$user_event2->address		= "1 N street";
		$user_event2->city			= "SJC";
		$user_event2->postal_code	= "95014";
		$user_event2->category   	= "Professional";
		$user_event2->category_id   = "6";
		$user_event2->description   = "Event 101 description ";
		$user_event2->age_limit     = "-1";
		$user_event2->lat      		= "37.317363";
		$user_event2->lon      		= "-122.038604";
		$user_event2->start_dt      = "10/12/2013";
		$user_event2->end_dt      	= "10/12/2013";

		$event_data_list[] =  $user_event2; 

		$user_event3				= new User_Event();
		$user_event3->event_id   	= "102";
		$user_event3->start_time	= "16:00";
		$user_event3->end_time		= "20:00";
		$user_event3->title			= "Event 102 title";
		$user_event3->location		= "Town Center";
		$user_event3->address		= "2nd N street";
		$user_event3->city			= "SFC";
		$user_event3->postal_code	= "95014";
		$user_event3->category   	= "Professional";
		$user_event3->category_id   = "6";
		$user_event3->description   = "Event 102 description ";
		$user_event3->age_limit     = "-1";
		$user_event3->lat      		= "37.317363";
		$user_event3->lon      		= "-122.038604";
		$user_event3->start_dt      = "10/12/2013";
		$user_event3->end_dt      	= "10/12/2013";

		$event_data_list[] =  $user_event2; 


	}
	//var_dump($event_data_list);
	include ('json.checkinevent.layout.php');

?>