<?php 
	
	require('db.php');
	require('popcliqs_functions.php');
	require('user_event_class.php');
	require('mobile.functions.php');
	require('exitcode.constants.php');
	
	date_default_timezone_set("UTC");  

	$exit_cd 	= $_SUCCESS;
	$key  		= isset($_GET["key"]) ? $_GET["key"] : null ;
	$tz   		= isset($_GET["tz"]) ? $_GET["tz"] : 0 ;
	$event_id   = isset($_GET["evtid"]) ? $_GET["evtid"] : null ;
	$resp_cd    = isset($_GET["rspcd"]) ? $_GET["rspcd"] : null ;

	if($key === null  || $key === '' ){

		$exit_cd = $_ERROR_AUTH;
		include ('json.login.layout.php');
		return;
	}

	$keys = explode("$",$key);
	
	if(sizeof($keys)  < 2  ){
	
		$exit_cd = $_ERROR_AUTH;
		include ('json.login.layout.php');
		return;
	}


	if($event_id === null  || $event_id === '' ){

		$exit_cd = $_ERROR_INVALID_EVENT_ID;
		include ('json.login.layout.php');
		return;
	}


	if($resp_cd === null  || ($resp_cd  !== '2' &&  $resp_cd  !== '-1' ) ){

		$exit_cd = $_ERROR_INVALID_RSP_CD;
		include ('json.login.layout.php');
		return;
	}

	$user_id = $keys[0];
	$pwd 	 = $keys[1];

	$conn = connect ($config);
	$is_authorized =is_operation_authorised($conn ,$user_id, $pwd);

	if( $is_authorized ){

		// if resp_cd == 2 ; update the rspv table as checked in.
		if($resp_cd  == '2' ){
			update_rsvp_status($conn ,$user_id , $event_id  , $resp_cd); 
		}else{
			update_event_status($conn ,$user_id , $event_id  , $resp_cd); 
		}
	} else {
		$exit_cd = $_ERROR_AUTH;
	}
	include ('json.login.layout.php');
?>