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

function add_new_event($conn , $user_id ,  $zip , $cat_cd , $st_time , $end_time ){

	//add event 
	$evt_id = add_event($conn , $user_id ,  $zip , $st_time , $end_time );

	echo $evt_id;
	//add event description
	add_event_desc($conn , 	$evt_id  );	
	
	//add event category
	add_event_cat($conn ,  $evt_id , $cat_cd);	

	//add event invite
	add_event_invite($conn , $user_id  , $evt_id );
}

function add_event_cat($conn ,  $evt_id , $cat_cd){

	$query = " 
				insert into phpfox_event_category_data( 
					event_id , category_id 
				)
				VALUES (
					 :eid , :catid
				) 
			";

	$binding = array( 
		'eid'   => $evt_id  ,
		'catid' => $cat_cd  
		
	);
	insert_query_execute ($query , $conn , $binding);
}

function add_event_invite($conn , $user_id  , $evt_id ){

	$query = " 
				insert into phpfox_event_invite ( 
					user_id ,  event_id , rsvp_id , time_stamp
				)
				VALUES (
					:uid , :eid , 1 , :time
				) 
			";

	$binding = array( 
		'uid' => $user_id  ,
		'eid' => $evt_id  ,
		'time' => time()  
	);
	insert_query_execute ($query , $conn , $binding);
}

function add_event_desc($conn , $evt_id  ){

    $query = " 
				insert into phpfox_event_text ( 
					event_id ,  description , description_parsed
				)
				VALUES (
					:eid , 'My simple description' , 'My simple description'
				) 
			";

	$binding = array( 
		'eid' => $evt_id  
	);

	insert_query_execute ($query , $conn , $binding);
}


function add_event($conn , $user_id ,  $zip , $st_time , $end_time){

	$query = " 
				insert into phpfox_event  ( 
					view_id   , privacy ,privacy_comment ,
					module_id , item_id , user_id , title , 
					location , country_iso , country_child_id , 
					postal_code , city , age_limit , 
					time_stamp , start_time , end_time , 
					start_gmt_offset , end_gmt_offset , address 

				)
				VALUES (
					'0', '0' , '0',
					'event' , 0 ,:uid , 'Simple title' ,
					'New location','US' , 0,
					:zip  , 'Cupertino' , '-1' , 
					:time , :st_time , :end_time,
					0 , 0 , '660 1st Street Northcross'

				) 
			";

	$binding = array( 
		'uid' 	  	=> $user_id  , 
		'zip' 	  	=> $zip      , 
		'time'   	=> time()  ,
		'st_time'   => $st_time ,
		'end_time'	=> $end_time 
	);

	return insert_query_execute ($query , $conn , $binding);

}

?>

