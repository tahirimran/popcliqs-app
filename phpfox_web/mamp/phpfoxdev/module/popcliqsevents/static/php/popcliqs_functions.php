<?php 

function getSplashEvent($conn , $start_t  , $end_t , $latlong , $search_term , $age  , $miles = 25 ){

	$milesperdegree = 69;
    $degreesdiff = $miles / $milesperdegree;

	$lat1 = $latlong['lat'] - $degreesdiff;
	$lat2 = $latlong['lat'] + $degreesdiff;
	$lon1 = $latlong['lon'] - $degreesdiff;
	$lon2 = $latlong['lon'] + $degreesdiff;

	$query = "SELECT * FROM 
			phpfox_event as evt , phpfox_event_category_data  as cat , zipgeo as zips , phpfox_event_text as e_txt
			WHERE  evt.start_time >= :st and evt.start_time <= :et  and evt.event_id = cat.event_id 
			and evt.postal_code = zips.zip5  and zips.lat between :lat1 and :lat2 and zips.lon between :lon1 and :lon2 
			and evt.event_id = e_txt.event_id and evt.age_limit < $age and evt.is_active = 1 
			and (
				evt.title LIKE :search_t or evt.location    LIKE :search_t or   
				evt.city  LIKE :search_t or evt.postal_code LIKE :search_t or 
				e_txt.description_parsed  LIKE :search_t 
			)
	";	
			

	$binding = array(
		'st' 	=> $start_t ,
		'et' 	=> $end_t, 
		'lat1'	=> $lat1,
		'lat2' 	=> $lat2,
		'lon1' 	=> $lon1,
		'lon2' 	=> $lon2,
		'search_t' 	=> '%'.$search_term.'%'
	);
	return query( $query, $conn , $binding);
}

function get_user_zip($conn , $user_id){

	$query = "select cf_home_zip_code from phpfox_user_custom where user_id = :uid LIMIT 1";

	$binding = array(
		'uid' => $user_id 
	);

	$results = query( $query, $conn , $binding);

	if ($results) { 
		return $results[0][0];
	}
	return false;
}

function get_user_cat_pref($conn , $user_id){

	$query = "select * from phpfox_user_category_pref where user_id = :uid and pref_code <> 0 ";

	$binding = array(
		'uid' => $user_id 
	);

	$results = query( $query, $conn , $binding);

	if ($results) { 
		return $results;
	}
	return false;
}

function get_user_events($results){

	$user_events = array();

	if($results){
		foreach( $results as $row){
			extract($row);
		
			$evt_hr = date('H', $start_time) ;
			$user_event 				= new User_Event();
			$user_event->event_id		= $event_id;
			$user_event->start_time 	= $evt_hr;
			$user_event->category_id	= $category_id;
			$user_event->lat			= $lat;
			$user_event->lon			= $lon;


			$user_events[] =  $user_event;
		}
	}
	return $user_events;
}

function assign_rank_to_events($user_events , $user_cat_pref , $user_lat_lon, $start_t, $end_t , $radius_mls ){
	
	//$st_hour = date('H', $start_t) ;
	//$ed_hour = date('H', $end_t) ;

	
	$ranked_events = array();
	$evt_hr_bucket = array();

	if($user_events){
		foreach( $user_events as $user_event){
			
			$pref_code = get_user_event_preffered($user_event->category_id , $user_cat_pref);
			
			if($pref_code){
				
				//$evt_hr = date('H', $start_time) ;
				$distance =  degrees_difference($user_event->lat , $user_event->lon , $user_lat_lon['lat'] , $user_lat_lon['lon'] );

				$distance_per = $radius_mls/($radius_mls - $distance) * 100;

				if( $distance_per > 75       &&   $pref_code ==2 ){
					$rank = 0;
				}else if( $distance_per > 75 &&   $pref_code ==1 ){
					$rank = 2;
				}else if( $distance_per > 50 &&   $pref_code ==2 ){
					$rank = 2;
				}else if( $distance_per > 50 &&   $pref_code ==1 ){
					$rank = 4;
				}else if( $distance_per > 50 &&   $pref_code ==2 ){
					$rank = 6;
				}else if( $distance_per > 50 &&   $pref_code ==1 ){
					$rank = 8;
				}else if( $distance_per > 25 &&   $pref_code ==2 ){
					$rank = 3;
				}else if( $distance_per > 25 &&   $pref_code ==1 ){
					$rank = 5; 	
				}

				//$user_event = new User_Event();
				/*
				$user_event->event_id		= $event_id;
				$user_event->pref_code 		= $pref_code;
				$user_event->distance 		= $distance;
				$user_event->start_time 	= $evt_hr;
				$user_event->category_id	= $category_id;
				$user_event->rank			= $rank;
				*/
				$user_event->distance 	= $distance;
				$user_event->rank   	= $rank;
				$user_event->pref_code 	= $pref_code;
				$ranked_events[]		= $user_event;
		
			}
		}
	}
	return $ranked_events;
}

function get_user_event_preffered($evt_cat_id, $user_cat_prefs ) {

	if($user_cat_prefs ) {
		foreach( $user_cat_prefs as $user_cat_pref){
		
			extract($user_cat_pref);
			if($category_id === $evt_cat_id){
				return $pref_code;
			}
		}
	}
	return false;

}

function getTimeFrmStr($timeStr)
{
       
    $dateInfo = date_parse_from_format('m/d/Y:H:i', $timeStr);
       

    $ts = mktime(
          $dateInfo['hour'], $dateInfo['minute'], 0,
          $dateInfo['month'], $dateInfo['day'], $dateInfo['year']
    );

    return $ts;
       
}

function degrees_difference($lat1, $lon1, $lat2, $lon2)
{
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            cos(deg2rad($theta));

    $dist = acos($dist);
    $dist = rad2deg($dist);

    $distance = $dist * 60 * 1.1515;

    return $distance;
}

function get_distance_between_zips($conn, $zip1, $zip2){

	$latlong1  = get_lat_lon_zip( $zip1 ,  $conn );
	$latlong2  = get_lat_lon_zip( $zip2 ,  $conn );

	return round( degrees_difference($latlong1['lat'] , $latlong1['lon'] , 
		$latlong2['lat'] , $latlong2['lon']) , 2);
}

function get_zips_within($zip, $miles , $conn)
{
   

    $latlong  = get_lat_lon_zip( $zip ,  $conn );
	
	if ($latlong){
		return get_zips_within_lat_lon( $latlong['lat'] , $latlong['lon'] ,  $miles , $conn);
	}
    
}

function get_zips_within_lat_lon( $lat, $lon ,  $miles , $conn){

	$milesperdegree = 69;
    $degreesdiff = $miles / $milesperdegree;

	$lat1 = $lat - $degreesdiff;
	$lat2 = $lat + $degreesdiff;
	$lon1 = $lon - $degreesdiff;
	$lon2 = $lon + $degreesdiff;

	$query = "select * from zipgeo where lat between :lat1 and :lat2 and lon between :lon1 and :lon2 ";
	
	$binding = array(
		'lat1' => $lat1,
		'lat2' => $lat2,
		'lon1' => $lon1,
		'lon2' => $lon2 
	);

	$results = query( $query, $conn , $binding); 
	
	if( $results ){
		return $results;
	}
	return false;

}
function get_lat_lon_zip( $zip ,  $conn){

	$query = "select lat, lon from zipgeo where zip5 = :zip ";
   
    $binding = array(
		'zip' => $zip 
	);

	$results = query( $query, $conn , $binding);
	if( $results ){
		return $results[0];
	}
	return false;
}

function get_event_by_id($event_id , $conn , $tz){

	$event_data = array();

	$query = "select * from 
				phpfox_event as evt, phpfox_event_category_data  as cat ,
				phpfox_event_category as evt_cat , phpfox_event_text  as evt_desc
				where evt.event_id = :eid  and 
				evt.event_id = cat.event_id and 
				cat.category_id = evt_cat.category_id and 
				evt.event_id =  evt_desc.event_id
				";

	$binding = array(
		'eid' => $event_id 
	);
	$results = execute( $query, $conn , $binding );

	if($results){

		//var_dump($results);

		extract($results);

		$st_evt_hr = date('H', $start_time) ;
		$st_evt_mn = date('i', $start_time) ;
		$ed_evt_hr = date('H', $end_time) ;
		$ed_evt_mn = date('i', $end_time) ;

		$latlong  = get_lat_lon_zip( $postal_code ,  $conn );
		
		$user_event = new User_Event();
		$user_event->event_id   	= $event_id;
		$user_event->start_time		= $st_evt_hr . ':'. $st_evt_mn;
		$user_event->end_time		= $ed_evt_hr . ':'. $ed_evt_mn;
		$user_event->title			= $title;
		$user_event->location		= $location;
		$user_event->address		= $address;
		$user_event->city			= $city;
		$user_event->postal_code	= $postal_code;
		$user_event->category   	= $name;
		$user_event->category_id   	= $category_id;
		$user_event->description    = $description;
		$user_event->age_limit      = $age_limit;
		$user_event->lat      		= $latlong['lat'];
		$user_event->lon      		= $latlong['lon'];
		
		$user_event->start_dt       =  date('m', $start_time) .'/'. date('d', $start_time) . '/' . date('Y', $start_time);
		$user_event->end_dt         =  date('m', $end_time)   .'/'. date('d', $end_time)   . '/' . date('Y', $end_time);
		//var_dump($user_event);
		$event_data[] = $user_event;
		
	}
	return $event_data;
}


function getNoOfMaybeAttendeeInfo( $user_events , $conn ){

	if($user_events){
		foreach( $user_events as $user_event){
			
			$user_event->no_of_maybe = getNoOfMayBeAttendeeCount($user_event->event_id , $conn) ; 

			
			$male_mayBe_count 	= getNoOfMayBeMaleAttendeeCount($user_event->event_id , $conn) ; 
 
			//echo " $user_event->no_of_maybe  $male_mayBe_count ";

			if($user_event->no_of_maybe == FALSE){
				$user_event->size = "S";
				$user_event->mratio = 2;
				return;
			}

			$user_event->mratio = 2 * $male_mayBe_count /  $user_event->no_of_maybe;

			if($user_event->no_of_maybe < 20 ){
				$user_event->size = "S";
				
			}else if($user_event->no_of_maybe < 50 ){
				$user_event->size = "M";

			}else{
				$user_event->size = "L";
				
			}
		}
	}

}

function getNoOfMayBeMaleAttendeeCount($event_id , $conn){

	$query = "select count(*) as count from 
			phpfox_event_invite as invite, phpfox_user as user  
			where  event_id = :eid  and rsvp_id = 1 and 
			invite.user_id = user.user_id  and user.gender = 1 
		";

	$binding = array(
		'eid' => $event_id 
	);
	$results = execute( $query, $conn , $binding );

	if($results){
		extract($results);
		return $count;
	}
	return 0;
}

function getNoOfMayBeAttendeeCount($event_id , $conn){
	
	$query = "select count(*) as count from phpfox_event_invite 
				where  event_id = :eid and rsvp_id = 1
			";

	$binding = array(
		'eid' => $event_id 
	);
	$results = execute( $query, $conn , $binding );

	if($results){
		extract($results);
		return $count;
	}
	return 0;

}

function execute( $query, $conn , $binding ){

	$results = query( $query, $conn , $binding);
	if( $results ){
		return $results[0];
	}
	return false;
}

function user_event_rsvp_cd($event_id , $user_id , $conn ){

	$query = "select rsvp_id  from phpfox_event_invite 
				where  event_id = :eid and user_id = :uid
			";

	$binding = array(
		'eid' => $event_id , 
		'uid' => $user_id 
	);
	$results = execute( $query, $conn , $binding );

	if($results){
		extract($results);
		return $rsvp_id;
	}
	return 0;
}

function get_user_age( $conn , $user_id  ){

	$query = "select birthday  from phpfox_user 
				where  user_id = :uid
			";
	$binding = array( 
		'uid' => $user_id 
	);
	$results = execute( $query, $conn , $binding );

	if($results){
		extract($results);
		
		$month   	= substr($birthday, 0, 2);
		$day 		= substr($birthday, 2, 2);
		$year 		= substr($birthday, 4, 4);
		
		$bday  = new DateTime("$day.$month.$year");
		$today = new DateTime('00:00:00');
		$diff  = $today->diff($bday);
		return $diff->y; 
	}

	return 100;
}
//$latlong = get_lat_lon_zip(95014 ,  $config );
//var_dump($latlong);
//$zips = get_zips_within( 95014 , 25 , $config);
//$zips = get_zips_within_lat_lon( 37.317363 , -122.038604  , 25 , $config);
//$zips = get_zips_within( 95014 , 1 , $config);
//var_dump($zips);



?>