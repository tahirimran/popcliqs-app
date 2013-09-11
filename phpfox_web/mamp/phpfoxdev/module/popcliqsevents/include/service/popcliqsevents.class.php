<?php 
  
class Popcliqsevents_Service_Popcliqsevents extends Phpfox_Service  
{ 
    public function getUsersEventPrefs() 
    { 
        return $this->database()->select('*') 
            ->from(Phpfox::getT('user_category_pref')) 
  		 	->where('user_id='.Phpfox::getUserId())
            ->execute('getRows'); 

    } 

    public function getEventPref(){


    		echo "just simple message" ; 

    }

   public function   getUserHomeZipCode(){

        //select cf_home_zip_code from phpfox_user_custom where  user_id = 1 
        $arr =  $this->database()->select('cf_home_zip_code') 
            ->from(Phpfox::getT('user_custom')) 
            ->where('user_id='.Phpfox::getUserId())
            ->execute('getRows'); 

        $row = $arr[0];
        return $row['cf_home_zip_code'];
   }

   public function  getUsersDataofBirth(){

        $aUser = Phpfox::getService('user')->get(Phpfox::getUserId(), true);
        return $aUser['birthday'];
   }
} 
  
?>