<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 11, 2013, 3:27 pm */ ?>
<div id="popupeventdetails" class="popup">
<div class="top">
      <span><h2>Event Details</h2></span>
    <a id="popupeventdetailsClose" class="popupClose"><img src="./module/popcliqsevents/static/image/close_btn1.png" border="0" alt="Close" width="24" height="25"></a>
        </div>
        <div class="foArea">

    <!-- Form Code Start -->
<form id='contactus'>
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>

<fieldset >

<div class='formcontainer'>
    <label for='title' >Title :</label>
    <label id='title'></label><br>
</div>

<div class='formcontainer'>
    <label for='type' >Category :</label>
    <label id='type'></label><br>
</div>

<div class='formcontainer'>
    <label for='stime' >Start Time :</label>
    <label id='stime'></label><br>
</div>

<div class='formcontainer'>
    <label for='etime' >End Time :</label>
    <label id='etime'></label><br>
</div>

<div class='formcontainer'>
    <label for='location' >Location:</label>
    <label id='location'></label><br>
</div>
<div class='formcontainer'>
    <label for='address' >Address :</label>
    <label id='address'></label><br>
</div>

<div class='formcontainer'>
    <label for='city' >City :</label>
    <label id='city'></label><br>
</div>

<div class='formcontainer'>
    <label for='postal_code' >Postal Code :</label>
    <label id='postal_code'></label><br>
</div>
<div class='formcontainer'>
    <label for='distance' >Approx. distance :</label>
    <label id='distance'></label><br>
</div>


<div class='formcontainer bottomSpace'>
</div>

<div class='formcontainer'>
  <div align="right" style="padding-left: 165px">
   
    <a id="popupEventDetails">
       <img src="./module/popcliqsevents/static/image/pop_this_event_btn.png" align="left" alt="btn" width="231" height="46" border="0"> 
    </a>   
    </div> 
</div>

</fieldset>

</form>

 </div>   
<!-- save sort order here which can be retrieved on server on postback -->
<input name="list1SortOrder" type="hidden" />
  
        
  
        
</div><!-- end of popupeventdetails -->
