<?php 
  
class Popcliqsevents_Component_Block_Preferences extends Phpfox_Component 
{     
    public function process() 
    { 	
  		$aCategories = Phpfox::getService('event.category')->getForBrowse();


  		$aUsersEvtPrefs = Phpfox::getService('popcliqsevents')->getUsersEventPrefs(); 
  		foreach ($aCategories as  $aCategory){
  			
  			$matchFound=false; 
  			foreach ($aUsersEvtPrefs as  $aUsersEvtPref){
  				if(  $aCategory['category_id'] == $aUsersEvtPref['category_id']){
  					$matchFound = true;
  				}
  			}

  			// insert default pref value
  			if($matchFound == false){
  				$def_aUsersEvtPref = $array = array(
   									 "category_id" => $aCategory['category_id'] ,
   									 "pref_code" => "2",
				);
  				$aUsersEvtPrefs[] = $def_aUsersEvtPref;
			}
  		}
  		


		$this->template()->assign('aUsersEvtPrefs', $aUsersEvtPrefs);

		// Date of birth 
		$aUsersHomeZipCode = Phpfox::getService('popcliqsevents')->getUserHomeZipCode(); 
		$this->template()->assign('aUsersHomeZipCode', $aUsersHomeZipCode);

		//Home Zip Code 
		$aUsersDateOfBirth = Phpfox::getService('popcliqsevents')->getUsersDataofBirth(); 

		// $aForms['month'] = substr($aForms['birthday'], 0, 2);
		// $aForms['day'] = substr($aForms['birthday'],2,2);
		// $aForms['year'] = substr($aForms['birthday'],4);


		$aUsersDOBMonth = substr($aUsersDateOfBirth, 0, 2);
		$aUsersDOBDay 	= substr($aUsersDateOfBirth,2,2);
		$aUsersDOBYear 	= substr($aUsersDateOfBirth,4);

		$this->template()->assign('aUsersDOBMonth', $aUsersDOBMonth); 
		$this->template()->assign('aUsersDOBDay'  , $aUsersDOBDay);
		$this->template()->assign('aUsersDOBYear' , $aUsersDOBYear);

		// $this->template()->assign('aForms' , $aForms);
		

    } 
} 
  
?>