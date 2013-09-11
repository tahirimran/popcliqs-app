<div id="popuppref" class="popup" style="">
    <div class="top">
        <span><h2>Prefererred Categories</h2></span>
        <a id="popupprefClose"  class="popupClose"><img src="./module/popcliqsevents/static/image/close_btn1.png" border="0" alt="Close" width="24" height="25"></a>
        </div>
    <div class="foArea">
     <form id='preferences'>
        <fieldset>

        <script>
            
        </script>

         <br/>
        {foreach from=$aCategories item=aCategory}   
        
             <?php $val_set =  "false"; ?>
            {foreach from=$aUsersEvtPrefs item=aUsersEvtPref} 
                {if $aUsersEvtPref.category_id == $aCategory.category_id }
                    <div class='formcontainer'>
                     <label for='message'>{$aCategory.name} :</label>
                    {if $aUsersEvtPref.pref_code == 2 }
                        <?php $val_set =  "true"; ?>
                        <img  id="{$aCategory.category_id}-cat-img" src="./module/popcliqsevents/static/image/star_gold_256.png" title="Won't Miss" alt="" height="22" width="22" style="position:relative;float:left;left:160px;" />
                    {elseif $aUsersEvtPref.pref_code == 1 }
                       <?php $val_set =  "true"; ?>
                        <img  id="{$aCategory.category_id}-cat-img" src="./module/popcliqsevents/static/image/images.jpg" alt="" title="Why Not" height="22" width="22" style="position:relative;float:left;left:160px;" />
                    { else }
                        <?php $val_set =  "true"; ?>
                        <img  id="{$aCategory.category_id}-cat-img" src="./module/popcliqsevents/static/image/delete_48.png" alt="" title="Not for me" height="22" width="22" style="position:relative;float:left;left:160px;" />
                    {/if}
                    <input id="{$aCategory.category_id}-cat" name="{$aCategory.category_id}" type="text" data-slider="true" data-slider-values="0,1,2" value="{$aUsersEvtPref.pref_code}" data-slider-equal-steps="true" data-slider-snap="false"  style="margin-left:100px;"/>
                    </div>
                    <br/>
                {/if}  
            {/foreach}
        {/foreach}
        <div class='formcontainer'>
            <label for='loc' >Home Zip Code :</label>
            <input type='text'  name='home_zip' id='home_zip'  value="{$aUsersHomeZipCode}" maxlength='40' />
        </div>
        <br/>
        <div class='formcontainer'>
            <label for='loc' >Date of Birth :</label>
            {select_date start_year='1900' end_year='2008' field_separator=' / ' field_order='MDY' bUseDatepicker=false sort_years='DESC' month='DEC' }
           
            <script> 
                $user_dob_mon   = {$aUsersDOBMonth};
                $user_dob_day   = {$aUsersDOBDay};
                $user_dob_yr    = {$aUsersDOBYear};
            </script>
        </div>
         <br/>
        </fieldset>
        <div class="foLeft">
            <a id="popupUpdatePref">
            <img src="./module/popcliqsevents/static/image/save_btn.png" align="left" alt="btn" width="112" height="46" border="0">      
            </a>  
            <br/> <br/> <br/> <br/> 
        </div> 

    </div>   
    </form>
</div> <!-- end of popuppref -->
