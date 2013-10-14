<?php 
		

function is_operation_authorised( $conn  , $user_id, $pwd){

	$query = "select * from phpfox_user  where user_id = :uid 
				and password =  :pwd
			";
	$binding = array( 
		'uid' => $user_id ,
		'pwd' => $pwd
	);

	$results = query( $query, $conn , $binding );
	
	if($results){
		return true;
	}else{
		return false;
	}
}


function fetch_checkin_event($conn ,$user_id , $start_t){
	
	$checkin_eventid_list = array();

	$st_time = time();
	$query = " 
				select invt.event_id from phpfox_event_invite  as invt , phpfox_event as evt where invt.rsvp_id = 1 
				and invt.user_id = :uid 
				and invt.event_id = evt.event_id  
				and start_time >  :start_t 
				and evt.is_active = 1
			";

	$binding = array( 
		'uid' 	  => $user_id , 
		'start_t' => $start_t
	);

	$results = query( $query, $conn , $binding );
	
	if($results){
		foreach( $results as $row){
			extract($row);
			$checkin_eventid_list[] = $event_id;
			
		}
	}
	return $checkin_eventid_list ;
}

function authenticate_user($conn, $usernm , $pwd) {

	$key = null;

	$query = " 
				select user_id , password  , password_salt from phpfox_user where email = :usernm 	
			";

	$binding = array( 
		'usernm' => $usernm 
	);

	$results = query( $query, $conn , $binding );
	if($results){
		foreach( $results as $row){

			$pwd_hash_db 	= $row[1];
			$spwd   		= $row[2];
			$pwd_hash_in	= setHash($pwd , $spwd);

			if($pwd_hash_db === $pwd_hash_in){
				$key =  $row[0]. "$" . $row[1];
			}
		}
	}


	return $key;
}
	
function setHash($sPassword, $sSalt )
{
	if (!$sSalt)
	{
		$sSalt = "1d8063761ad359aee04db8acffc4b217";
	}
	return md5(md5($sPassword) . md5($sSalt));
}

function update_rsvp_status($conn ,$user_id , $event_id , $resp_cd){

	$query = " 
				update phpfox_event_invite set rsvp_id = :resp_cd , time_stamp = :time
				where user_id = :user_id and event_id = :event_id 
			";

	$binding = array( 
		'resp_cd' 	  => $resp_cd  , 
		'user_id' 	  => $user_id  , 
		'event_id'    => $event_id ,
		'time'        => time()
	);

	update_query_execute ($query , $conn , $binding);

}


function update_event_status($conn ,$user_id , $event_id , $resp_cd){

	$query = " 
				update phpfox_event set is_active = :resp_cd , time_stamp = :time
				where user_id = :user_id and event_id = :event_id 
			";

	$binding = array( 
		'resp_cd' 	  => $resp_cd  ,
		'user_id' 	  => $user_id  ,  
		'event_id'    => $event_id ,
		'time'        => time()
	);

	update_query_execute ($query , $conn , $binding);

}


?>
