/***************************/
//@website: www.ZwebbieZ.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

//SETTING UP OUR POPUP
//0 means disabled; 1 means enabled;
var popupStatus = 0;
var popid; 

var $event_id; 
//loading popup with jQuery magic!
function loadPopup(id, evt_id , $user_id){
	
	if(evt_id != null){

		$.getJSON('./module/popcliqsevents/static/php/event.service.php?eventId='+ evt_id + "&user_id="+ $user_id, 
			function(data , status) {
  				$.each(data, function(i, eventobj){
  				
  					$event_id = evt_id;

      				$("#title").text(eventobj.title);
      				$("#type").text(eventobj.type); 
      				$("#stime").text(eventobj.st_time); 
      				$("#etime").text(eventobj.ed_time); 

      				$("#location").text(eventobj.location); 
      				$("#address").text(eventobj.address); 
      				$("#city").text(eventobj.city); 
      				$("#postal_code").text(eventobj.postal_code); 
      				$("#distance").text(eventobj.distance); 
      				if(eventobj.rsvp == 1 ){
      					$("#popupEventDetails").hide();
      				}
      				
    			});
    		}
	    );
	}
	if(id == 'popuppref'){
		
		$("[data-slider]")
            .each(function () {
            	
       			 
        }).bind("slider:ready slider:changed", function (event, data) {
        	
			if( data.value == 2)
			{
				imgsrc= "./module/popcliqsevents/static/image/star_gold_256.png";
				$title="Won't Miss";
				
			}else  if( data.value == 0){
				imgsrc= "./module/popcliqsevents/static/image/delete_48.png";
				$title="Not for me";
				
			}else{
				imgsrc= "./module/popcliqsevents/static/image/images.jpg";
				$title="Why Not";
			}
			
			$("#"+ event.target.id +"-img").attr( "src" , imgsrc );
			$("#"+ event.target.id +"-img").attr( "title" , $title );
		

		});

		//fetch prefernces.
		$("#month").val($user_dob_mon);
		$("#day").val($user_dob_day);
		$("#year").val($user_dob_yr);
	} 

	//loads popup only if it is disabled
	if(popupStatus==0){
		
		$("#backgroundPopup").css({
			"opacity": "10"
		});
		$("#backgroundPopup").fadeIn("slow");
		$("#"+id).fadeIn("slow");
		popupStatus = 1;
		popid = id;
	}
}

//disabling popup with jQuery magic!
function disablePopup(){
	//disables popup only if it is enabled
	if(popupStatus==1){
		$("#backgroundPopup").fadeOut("slow");
		$("#"+popid).fadeOut("slow");
		popupStatus = 0;
		
		if( poppedBubble != null ){
			poppedBubble.gotoAndStop('stand');
		}
		
	}
}

//centering popup
function centerPopup(id){
	//request data for centering
	var windowWidth = document.documentElement.clientWidth;
	var windowHeight = document.documentElement.clientHeight;
	var popupHeight = $("#"+id).height();
	var popupWidth = $("#"+id).width();

	//windowHeight/2-popupHeight/2
	//windowWidth/2-popupWidth/2
	//centering
	$("#"+id).css({
		"position": "absolute",
		"top":-50,
		"left":200
	});
	//only need force for IE6
	
	$("#backgroundPopup").css({
		"height": windowHeight
	});
	
}


//CONTROLLING EVENTS IN jQuery
$(document).ready(function(){
	
	//CLOSING POPUP
	//Click the x event!
	$("#popupprefClose").click(function(){
		disablePopup();
	});
	
	$("#popuphistoryClose").click(function(){
		disablePopup();
	});
	
	$("#popupneweventClose").click(function(){
		disablePopup();
	});
	
	var queryStr =""; 

	
	// On click of May be 
	$("#popupEventDetails").click(function(){
		
		disablePopup();	
		$.ajaxCall('popcliqsevents.updateRsvp' , 
				'eventId= ' + $event_id  ); 
		
	});

	$("#popupUpdatePref").click(function(){
		var queryStr = "";
		
    	$("form :text").each(function(){

    		var obj_id = $(this).attr('id');
    		var obj_nm = $(this).attr('name');
    		var obj_vl = $(this).val();
    		if (obj_id.indexOf("-cat") >= 0){
    			queryStr = queryStr + obj_nm + ":" + obj_vl  + ";"; 
    		}		
		});
    	
		// Update zip 
		var home_zip = $('#home_zip').val();
		var bMon = $('#month').val();
		var bday = $('#day').val();
		var byr = $('#year').val();
		

		if(bMon.length < 2 ){
			bMon = "0"+bMon;
		}

		if(bday.length < 2 ){
			bday = "0"+bday;
		}


		birthday = bMon +  bday +  byr;
		//alert (birthday);

		if (home_zip == null || home_zip == " "  || home_zip.length  != 5){
	     	alert(" Invalid Zip" );
	     	return;
	    }
		
		disablePopup();
		
		$.ajaxCall('popcliqsevents.updateCatPref' , 
				'cat_pref_opt=' + queryStr + '&home_zip= ' + home_zip + '&birthday=' + birthday ); 

	});
	
	$("#popupneweventAdd").click(function(){
		
		if ( $('#etitle').val() == null || $('#etitle').val() == "" ){
	      alert(" Invalid Title" );
	      return;
	    }
	    if ($('#ecategory').val() == null || $('#ecategory').val() == "" ){
	      alert(" Invalid Category" );
	      return;
	    }

	    if ($('#startTime').val() == null || $('#startTime').val() == "" ){
	      alert(" Invalid Start time" );
	      return;
	    }

	    if ($('#endTime').val() == null || $('#endTime').val() == "" ){
	      alert(" Invalid End time" );
	      return;
	    }

	    if ($('#ezip').val() == null || $('#ezip').val() == ""  ){
	     	alert(" Invalid Zip" );
	     	return;
	    }

	    var st_parts 	= $('#st_hr').val().split(':');
		var $st_hour 	= st_parts[0];
		var $st_min   	= st_parts[1];


		var e_parts 	= $('#et_hr').val().split(':');
		var $e_hour 	= e_parts[0];
		var $e_min	 	= e_parts[1];
	    
		var $etitle		= $("#etitle").val();
		var $ecategory	= $('#ecategory').val();
		var $eloc		= $('#eloc').val();
		var $eaddress	= $('#eaddress').val();
		var $ecity		= $('#ecity').val();
		var $estate		= $('#estate').val();
		var $ezip		= $('#ezip').val();
		var $eagelimit	= $('#eagelimit').val();
		var $esizelimit	= $('#esizelimit').val();
		var $edesc		= $('#edesc').val();
		var $edesc		= $('#edesc').val();
		var $s_dt       = $('#startTime').val();
		var $e_dt       = $('#endTime').val();

		var $eagelimitVal = "";
		var eagelimit = $("input[type='radio'][name='eagelimit']:checked");
		if (eagelimit.length > 0){
    		$eagelimitVal = eagelimit.val();
		}
		
		disablePopup();
		$.ajaxCall('popcliqsevents.addEvent' , 
					'etitle='      + $etitle     + '&ecategory=' + $ecategory    +
					'&eloc='       + $eloc       + '&eaddress='  + $eaddress     +
					'&ecity='      + $ecity      + '&estate='    + $estate       +
					'&ezip='       + $ezip       + '&eagelimit=' + $eagelimitVal +
					'&esizelimit=' + $esizelimit + '&edesc='     + $edesc        +
					'&s_dt='       + $s_dt       +  '&st_hr='    + $st_hour      + '&st_min='   + $st_min   +
					'&e_dt='       + $e_dt       +  '&et_hr='    + $e_hour       + '&e_min='    + $e_min   
 		);		
	});
	
	
	$("#popupeventdetailsClose").click(function(){
		disablePopup();
	});
	
	
	//Click out event!
	$("#backgroundPopup").click(function(){
		disablePopup();
	});
	//Press Escape event!
	$(document).keypress(function(e){
		if(e.keyCode==27 && popupStatus==1){
			disablePopup();
		}
	});

});

function fetchIntEvt(){
	$.ajaxCall('popcliqsevents.fetchIntEvent' );
}


function delete_event(user_id, event_id){
	
	var queryStr = 'user_id='      + user_id     + '&event_id='      + event_id ;
	$.ajaxCall('popcliqsevents.deleteIntEvent' , queryStr  );
	setTimeout(fetchIntEvt() ,1000*10);
	
}