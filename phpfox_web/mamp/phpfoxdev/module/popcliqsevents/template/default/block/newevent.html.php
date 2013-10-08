<div id="popupnewevent" class="popup">
    <div class="top">
      <span><h2>Create a New Event</h2></span>
        <a id="popupneweventClose" class="popupClose"><img src="./module/popcliqsevents/static/image/close_btn1.png" border="0" alt="Close" width="24" height="25"></a>
    </div>
<div class="foArea">
    <!-- Form Code Start -->
<form id='contactus'>

<fieldset >

<input type="hidden" id='eid' value="-1"></textarea>
<div class='formcontainer'>
    <label for='etitle' >Event Name :</label>
    <textarea rows="2" cols="45" id='etitle'></textarea>
</div>
<div class='formcontainer'>
    <label for='message' >Description :</label>
    <textarea rows="4" cols="45" id='edesc'></textarea>
</div>
<div class='formcontainer'>
    <label for='name' >Category : </label>
    <select id="ecategory">
    <option value="">[Select]</option>
    {foreach from=$aCategories item=aCategory}
       <option value="{$aCategory.category_id}">{$aCategory.name}</option>

    {/foreach}
   
    </select>
</div>

<div class='formcontainer'>
    <label for='loc' >Location :</label>
    <input type='text'  id='eloc' placeholder='Venue' maxlength='40' />
</div>
<div class='formcontainer'>
    <label for='address' >Address :</label>
    <input type='text'  id='eaddress' value='' maxlength='40' />
</div>
<div class='formcontainer'>
    <label for='city' >City :</label>
    <input type='text'  id='ecity' value='' maxlength='40' />
</div>
<div class='formcontainer'>
    <label for='state' >State :</label>
    <input type='text'  id='estate' value='' maxlength='40' />
</div>
<div class='formcontainer'>
    <label for='zip' >Zip Code :</label>
    <input type='text'  id='ezip' value='' maxlength='40' />
</div>
<div class='formcontainer'>
  <label for='agelimit' >Age Limit :</label>
    <input type="radio" name="eagelimit"  id="eagelimit1"  value="-1" style="display:inline" checked="checked">Anyone
    <input type="radio" name="eagelimit"  id="eagelimit2"  value="18" style="display:inline">Above 18
    <input type="radio" name="eagelimit"  id="eagelimit3"  value="21" style="display:inline">Above 21
</div>
<div class='formcontainer'>
    <label for='sizelimit' >Capacity limit :</label>
    <input type='text'  id='esizelimit' value='' maxlength='5' />
    
</div>
<div class='formcontainer'>
    <label for='message' >Start :</label>
    <input type='text'  id='startTime' placeholder="mm/dd/yyyy" value='' maxlength='10' style="width:80px;display:inline" />
    <select id="st_hr" style="width:95px;">
        <option value="00:00">12:00 AM</option>
        <option value="00:30">12:30 AM</option>
        <option value="01:00">1:00 AM</option>
        <option value="01:30">1:30 AM</option>
        <option value="02:00">2:00 AM</option>  
        <option value="02:30">2:30 AM</option>  
        <option value="03:00">3:00 AM</option>
        <option value="03:30">3:30 AM</option>
        <option value="04:00">4:00 AM</option>
        <option value="04:30">4:30 AM</option>
        <option value="05:00">5:00 AM</option>  
        <option value="05:30">5:30 AM</option>   
        <option value="06:00">6:00 AM</option>
        <option value="06:30">6:30 AM</option>
        <option value="07:00">7:00 AM</option>
        <option value="07:30">7:30 AM</option>
        <option value="08:00">8:00 AM</option>   
        <option value="08:30">8:30 AM</option>   
        <option value="09:00">9:00 AM</option>
        <option value="09:30">9:30 AM</option>   
        <option value="10:00">10:00 AM</option>
        <option value="10:30">10:30 AM</option>
        <option value="11:00">11:00 AM</option>
        <option value="11:30">11:30 AM</option>
        <option value="12:00">12:00 PM</option> 
        <option value="12:30">12:30 PM</option>  
        <option value="13:00">1:00 PM</option>
        <option value="13:30">1:30 PM</option>
        <option value="14:00">2:00 PM</option>
        <option value="14:30">2:30 PM</option>
        <option value="15:00">3:00 PM</option>
        <option value="15:30">3:30 PM</option>
        <option value="16:00">4:00 PM</option>
        <option value="16:30">4:30 PM</option>
        <option value="17:00">5:00 PM</option>
        <option value="17:30">5:30 PM</option>
        <option value="18:00">6:00 PM</option>
        <option value="18:30">6:30 PM</option>
        <option value="19:00">7:00 PM</option>
        <option value="19:30">7:30 PM</option>
        <option value="20:00">8:00 PM</option>
        <option value="20:30">8:30 PM</option>
        <option value="21:00">9:00 PM</option> 
        <option value="21:30">9:30 PM</option>
        <option value="22:00">10:00 PM</option>
        <option value="22:30">10:30 PM</option>
        <option value="23:00">11:00 PM</option>
        <option value="23:30">11:30 PM</option>
    </select>

</div>
<div class='formcontainer'>
    <label for='message' >End :</label>
    <input type='text'  id='endTime' placeholder="mm/dd/yyyy" value='' maxlength='20' style="width:80px;display:inline"/>
    <select id="et_hr" style="width:95px;">
        <option value="00:00">12:00 AM</option>
        <option value="00:30">12:30 AM</option>
        <option value="01:00">1:00 AM</option>
        <option value="01:30">1:30 AM</option>
        <option value="02:00">2:00 AM</option>  
        <option value="02:30">2:30 AM</option>  
        <option value="03:00">3:00 AM</option>
        <option value="03:30">3:30 AM</option>
        <option value="04:00">4:00 AM</option>
        <option value="04:30">4:30 AM</option>
        <option value="05:00">5:00 AM</option>  
        <option value="05:30">5:30 AM</option>   
        <option value="06:00">6:00 AM</option>
        <option value="06:30">6:30 AM</option>
        <option value="07:00">7:00 AM</option>
        <option value="07:30">7:30 AM</option>
        <option value="08:00">8:00 AM</option>   
        <option value="08:30">8:30 AM</option>   
        <option value="09:00">9:00 AM</option>
        <option value="09:30">9:30 AM</option>   
        <option value="10:00">10:00 AM</option>
        <option value="10:30">10:30 AM</option>
        <option value="11:00">11:00 AM</option>
        <option value="11:30">11:30 AM</option>
        <option value="12:00">12:00 PM</option> 
        <option value="12:30">12:30 PM</option>  
        <option value="13:00">1:00 PM</option>
        <option value="13:30">1:30 PM</option>
        <option value="14:00">2:00 PM</option>
        <option value="14:30">2:30 PM</option>
        <option value="15:00">3:00 PM</option>
        <option value="15:30">3:30 PM</option>
        <option value="16:00">4:00 PM</option>
        <option value="16:30">4:30 PM</option>
        <option value="17:00">5:00 PM</option>
        <option value="17:30">5:30 PM</option>
        <option value="18:00">6:00 PM</option>
        <option value="18:30">6:30 PM</option>
        <option value="19:00">7:00 PM</option>
        <option value="19:30">7:30 PM</option>
        <option value="20:00">8:00 PM</option>
        <option value="20:30">8:30 PM</option>
        <option value="21:00">9:00 PM</option> 
        <option value="21:30">9:30 PM</option>
        <option value="22:00">10:00 PM</option>
        <option value="22:30">10:30 PM</option>
        <option value="23:00">11:00 PM</option>
        <option value="23:30">11:30 PM</option>
    </select>
</div>


<div class='formcontainer'>
  <div align="right" style="padding-left: 283px">
  <a id="popupneweventAdd"> 
  <img src="./module/popcliqsevents/static/image/go_btn.png" align="left" alt="btn" width="112" height="46" border="0">
  </a>
  </div>
</div>

</fieldset>
</form>
  
     
</div>   
  
  
        
</div><!-- end of popupnewevent -->