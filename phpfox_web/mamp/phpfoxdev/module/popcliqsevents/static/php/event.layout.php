{
	<?php 
	if( $event_data ){ 
		$startloop = true;
		foreach($event_data as $user_event) { ?>

			"event_<?php echo $user_event->event_id ?>" :{
				"id" : <?php echo $user_event->event_id ?> ,
				"size" : "S" ,
				"typeid" : <?php echo $user_event->category_id ?> ,
				"type" : "<?php echo $user_event->category ?>" ,
				"st_time" : "<?php echo $user_event->start_time ?>" ,
				"ed_time" : "<?php echo $user_event->end_time ?>" ,
				"title" : "<?php echo $user_event->title?>" ,
				"location" : "<?php echo $user_event->location ?>" ,
				"address" : "<?php echo $user_event->address ?>" ,
				"city" : "<?php echo $user_event->city ?>" ,
				"postal_code" : "<?php echo $user_event->postal_code ?>" ,
				"fillPCent" : 25 ,
				"mratio" : 0.5 ,
				"distance": "<?php echo $distanceToEvent ?> (miles)",
				"rsvp"  : <?php echo $rsvp_id ?>
			}
		<?php
		}
	}
	?>
}