<?php 
defined('PHPFOX') or exit('NO DICE!');

require('popcliqs_functions.php');
class Popcliqsevents_Component_Ajax_Ajax extends Phpfox_Ajax
{

  /**
  * Class constructor
  */   
  public function __construct()
  {  
    $this->_sTable = Phpfox::getT('event');
  }

  
  public function updateRsvp()
  {

    $event_id = $this->get('eventId'); 
   
    $aSql = array( 
              'user_id'     => Phpfox::getUserId(),
              'event_id'    => $event_id ,
              'rsvp_id'     =>  1 , 
              'time_stamp'  => PHPFOX_TIME
    );

    Phpfox::getLib('database')->insert(Phpfox::getT('event_invite'), $aSql);
    $this->alert(" Updated RSVP ... " . $event_id );
  }  
  
  public function addEvent()
  {

    
    $pieces = explode("/", $this->get('s_dt'));
    $iStartTime = Phpfox::getLib('date')->mktime( $this->get('st_hr') , 
          $this->get('st_min'), 0, $pieces[0], $pieces[1], $pieces[2]);

    $pieces = explode("/", $this->get('e_dt'));
    $iEndTime = Phpfox::getLib('date')->mktime( $this->get('et_hr') , 
          $this->get('e_min'), 0, $pieces[0], $pieces[1], $pieces[2]);


    if ($iStartTime > $iEndTime)
    if ($iStartTime >= $iEndTime)
    { 
        $this->alert(" Start time cannot be greater than the End time" );
    }
    
    $oParseInput = Phpfox::getLib('parse.input');   

    $etitle      = $this->get('etitle');
    $ecategory   = $this->get('ecategory');
    $eloc        = $this->get('eloc');
    $eaddress    = $this->get('eaddress');
    $ecity       = $this->get('ecity');
    $ezip        = $this->get('ezip');
    $eagelimit   = $this->get('eagelimit');
    $esizelimit  = $this->get('esizelimit');
    $edesc       = $this->get('edesc');
    
    $this->alert( " Event was  $etitle $edesc  " );
    

    $aSql = array(
          'view_id'            => '0',
          'privacy'            => '0',
          'privacy_comment'    => '0',
          'module_id'          => 'event',
          'item_id'            =>  0,
          'user_id'            => Phpfox::getUserId(),
          'title'              => $etitle,
          'location'           => $oParseInput->clean( $eloc , 255),
          'country_iso'        => (empty($aVals['country_iso']) ? Phpfox::getUserBy('country_iso') : $aVals['country_iso']),
          'country_child_id'   => (isset($aVals['country_child_id']) ? (int) $aVals['country_child_id'] : 0),
          'postal_code'        => (empty($ezip) ? null : Phpfox::getLib('parse.input')->clean($ezip, 20)),
          'city'               => (empty($ecity ) ? null : $oParseInput->clean($ecity , 255)),
          'age_limit'          => $eagelimit, 
          'time_stamp'         => PHPFOX_TIME,
          'start_time'         => Phpfox::getLib('date')->convertToGmt($iStartTime),
          'end_time'           => Phpfox::getLib('date')->convertToGmt($iEndTime),
          'start_gmt_offset'   => Phpfox::getLib('date')->getGmtOffset($iStartTime),
          'end_gmt_offset'     => Phpfox::getLib('date')->getGmtOffset($iEndTime),
          'address'            => (empty($eaddress) ? null : Phpfox::getLib('parse.input')->clean($eaddress))
    );
  //$this->alert('Event was ' . $iStartTime  . ' ' . $iEndTime );
  $iId = Phpfox::getLib('database')->insert($this->_sTable, $aSql);
  $this->alert('Event was successfully created !!! ');

  Phpfox::getLib('database')->insert(Phpfox::getT('event_text'), array(
          'event_id' => $iId,
          'description' => (empty($edesc) ? null : $edesc),
          'description_parsed' => (empty($edesc) ? null : $oParseInput->prepare($edesc))
       )
  ); 
  Phpfox::getLib('database')->insert(Phpfox::getT('event_category_data'), array('event_id' => $iId, 'category_id' => $ecategory));
  
  $aSql = array( 
              'user_id'     => Phpfox::getUserId(),
              'event_id'    => $iId,
              'rsvp_id'     =>  1 , 
              'time_stamp'  => PHPFOX_TIME
  );
  Phpfox::getLib('database')->insert(Phpfox::getT('event_invite'), $aSql);

 }

 public function updateCatPref()
 {
    $cat_pref_opts = $this->get('cat_pref_opt');
      

    $cat_array = array(); 
    $cat_pref_opt_list = explode( ";" , $cat_pref_opts);   
    foreach ($cat_pref_opt_list  as $cat_pref ) { 
       if(isset($cat_pref)  ){
          $cat_pref_item = explode( ":" , $cat_pref); 
          if(isset($cat_pref_item[0]) &&  isset($cat_pref_item[1]) ){
             $cat_array[ $cat_pref_item[0]] = $cat_pref_item[1];
          }
       }
    }
    foreach($cat_array as $category_id => $category_code) {

       $aSql = array(
          'user_id'      => Phpfox::getUserId(),
          'category_id'  =>  $category_id , 
          'pref_code'    =>  $category_code
       );
       
       $aRows = Phpfox::getLib('database')->select('*')
          ->from(Phpfox::getT('user_category_pref'))
          ->where('user_id='.Phpfox::getUserId() .' and category_id='.$category_id)
          ->execute('getRows');

       $count =  count($aRows);
       if(  $count < 1 ){
          $iId = Phpfox::getLib('database')->insert(Phpfox::getT('user_category_pref'), $aSql); 
       
       }else {
           $iId =  Phpfox::getLib('database')->update(Phpfox::getT('user_category_pref'), $aSql , 
             'user_id ='.Phpfox::getUserId() .' and category_id='.$category_id);
       }
    }

    // Update home zip 
    $aZipSql = array(
      'cf_home_zip_code'  =>  $this->get('home_zip')
    );
    $iId = Phpfox::getLib('database')->update(Phpfox::getT('user_custom'), $aZipSql , 
          'user_id ='.Phpfox::getUserId());
  
    // Update Birthdata.
    $aDOBSql = array(
      'birthday'  => $this->get('birthday')
    );
    $iId = Phpfox::getLib('database')->update(Phpfox::getT('user'), $aDOBSql , 
          'user_id ='.Phpfox::getUserId());


    $this->alert('Event Preference were successfully updated !!! ');
 }

public function fetchIntEvent()
{
  $aRows = Phpfox::getLib('database')->select('*')
            ->from(Phpfox::getT('event') , 'e'  )
            ->join(Phpfox::getT('event_category_data'), 'ec', 'e.event_id = ec.event_id')
            ->join(Phpfox::getT('event_category'), 'c', 'ec.category_id = c.category_id')
            ->where('e.user_id='.Phpfox::getUserId() . ' and  e.is_active = 1  Order by  start_time DESC ')
            ->limit(10)
            ->execute('getRows');

  $html_string = '      
         <table width="100%" border="0" cellspacing="2" cellpadding="8">
         <tr>
          <td width="16%" height="35" align="left" valign="middle" bgcolor="#009BCE" style="color:#FFF; font-weight:bold">Date</td>
          <td width="34%" height="35" align="left" valign="middle" bgcolor="#009BCE" style="color:#FFF; font-weight:bold">Event Desc</td>
          <td width="20%" height="35" align="left" valign="middle" bgcolor="#009BCE" style="color:#FFF; font-weight:bold">Maybes</td>
          <td width="20%" align="left" valign="middle" bgcolor="#009BCE" style="color:#FFF; font-weight:bold">Activities</td>
          <td width="25%" height="35" align="left" valign="middle" bgcolor="#009BCE" style="color:#FFF; font-weight:bold">Action</td>
         </tr>';

  foreach ($aRows as $iKey => $aRow) {
        
        $strs = Phpfox::getLib('date')->convertFromGmt($aRow['start_time'], $aRow['start_gmt_offset']);
        
        $dt_time_str = date('m', $strs) . "/" 
            . date('d', $strs) . "/" 
            . date('y', $strs) . "  " 
            . date('h', $strs) . ":00 " 
            . date('A', $strs) ;
        
        
         $html_string = $html_string . 
         '<tr>
          <td height="25" align="left" valign="middle" bgcolor="#8CDAFF">'.$dt_time_str.' </td>
          <td height="25" align="left" valign="middle" bgcolor="#8CDAFF">&nbsp; '.$aRow['title'].'</td>
          <td height="25" align="left" valign="middle" bgcolor="#8CDAFF">0</td>
          <td align="left" valign="middle" bgcolor="#8CDAFF">'.$aRow['name'].'</td>';

          //  and e.start_time >  '. PHPFOX_TIME  . 
          if($aRow['start_time']  > PHPFOX_TIME ){
            $html_string = $html_string . '<td height="25" align="left" valign="middle" bgcolor="#8CDAFF"><a href="#" onclick="delete_event('.Phpfox::getUserId() .','.$aRow['event_id'].')" >C</a></td>';
          
          }else{
            $html_string = $html_string . '<td height="25" align="left" valign="middle" bgcolor="#8CDAFF"></td>';
          }
          $html_string  = $html_string .  '</tr>';
      }
      $html_string = $html_string . '</table>'; 
      $this->html('#fetchIntEvent', $html_string);
   }
  
  public function deleteIntEvent(){

    $user_id = $this->get('user_id'); 
    $event_id = $this->get('event_id'); 

    $where_c =  "event_id = $event_id and user_id = $user_id "; 
    Phpfox::getLib('database')->update(Phpfox::getT('event'), array(
          'is_active' => '0'
        ), $where_c
      );
    
    $this->alert(" deleteIntEvent !!! ");
  }
} 
?>