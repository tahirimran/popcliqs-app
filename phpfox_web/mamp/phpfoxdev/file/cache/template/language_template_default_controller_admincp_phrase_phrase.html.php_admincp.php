<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: August 24, 2013, 8:45 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Language
 * @version 		$Id: phrase.html.php 4009 2012-03-13 16:21:32Z Raymond_Benc $
 */
 
 

?>
<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl("admincp.language.phrase"); ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
<div class="table_header">
<?php echo Phpfox::getPhrase('language.search_filter'); ?>
</div>
<div class="table">
	<div class="table_left">
<?php echo Phpfox::getPhrase('language.search_for_text'); ?>:
	</div>
	<div class="table_right">
<?php echo $this->_aVars['aFilters']['search']; ?>
		<div class="p_4">
<?php echo Phpfox::getPhrase('language.search'); ?>...
			<div class="p_4">
<?php echo $this->_aVars['aFilters']['search_type']; ?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div id="js_admincp_search_options" style="display:none;">
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('language.language_packages'); ?>:
		</div>
		<div class="table_right">
<?php echo $this->_aVars['aFilters']['language_id']; ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('language.phrases'); ?>:
		</div>
		<div class="table_right">
<?php echo $this->_aVars['aFilters']['translate_type']; ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('language.module'); ?>:
		</div>
		<div class="table_right">
<?php echo $this->_aVars['aFilters']['module_id']; ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('language.display'); ?>:
		</div>
		<div class="table_right">
<?php echo $this->_aVars['aFilters']['display']; ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('language.sort'); ?>:
		</div>
		<div class="table_right">
<?php echo $this->_aVars['aFilters']['sort']; ?> <?php echo $this->_aVars['aFilters']['sort_by']; ?>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="table_clear">	
	<div class="table_clear_more_options">
		<a href="#" onclick="$('#js_admincp_search_options').toggle(); return false;"><?php echo Phpfox::getPhrase('language.view_more_search_options'); ?></a>	
	</div>	
	<input type="submit" name="search[submit]" value="<?php echo Phpfox::getPhrase('core.submit'); ?>" class="button" />	
</div>

</form>


<?php if (count ( $this->_aVars['aRows'] )): ?>
<br />
<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager'); ?>
<div class="table_header">
Phrases
</div>
<form method="post" action="<?php if ($this->_aVars['bIsForceLanguagePackage']):  echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.language.phrase', array('search-id' => $this->_aVars['sSearchIdNormal'],'search-rid' => $this->_aVars['sSearchId'],'page' => $this->_aVars['iPage'],'lang-id' => $this->_aVars['iLangId']));  else:  echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.language.phrase', array('search-id' => $this->_aVars['sSearchIdNormal'],'search-rid' => $this->_aVars['sSearchId'],'page' => $this->_aVars['iPage']));  endif; ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th style="width:10px;"><input type="checkbox" name="val[id]" value="" id="js_check_box_all" /></th>
		<th style="width:20%;"><?php echo Phpfox::getPhrase('language.variable'); ?></th>
<?php if (! $this->_aVars['iLangId']): ?><th style="width:10%;"><?php echo Phpfox::getPhrase('language.language'); ?></th><?php endif; ?>
		<th style="width:30%;"><?php echo Phpfox::getPhrase('language.original'); ?></th>
		<th style="width:90%;"><?php echo Phpfox::getPhrase('language.text'); ?></th>
	</tr>
<?php if (count((array)$this->_aVars['aRows'])):  foreach ((array) $this->_aVars['aRows'] as $this->_aVars['iKey'] => $this->_aVars['aRow']): ?>
	<tr id="js_row<?php echo $this->_aVars['aRow']['phrase_id']; ?>" class="checkRow<?php if (is_int ( $this->_aVars['iKey'] / 2 )): ?> tr<?php else:  endif; ?>">
		<td><input type="checkbox" name="id[]" class="checkbox" value="<?php echo $this->_aVars['aRow']['phrase_id']; ?>" id="js_id_row<?php echo $this->_aVars['aRow']['phrase_id']; ?>" /></td>
		<td title="<?php echo $this->_aVars['aRow']['name']; ?>.<?php echo $this->_aVars['aRow']['var_name']; ?>">
			<input type="text" name="null" value="<?php echo $this->_aVars['aRow']['name']; ?>.<?php echo $this->_aVars['aRow']['var_name']; ?>" size="25" style="width:95%;" onfocus="tb_show('<?php echo Phpfox::getPhrase('language.phrase_variables', array('phpfox_squote' => true)); ?>', $.ajaxBox('language.sample', 'height=240&width=600&phrase=<?php echo $this->_aVars['aRow']['name']; ?>.<?php echo $this->_aVars['aRow']['var_name']; ?>'));" />					
		</td>
<?php if (! $this->_aVars['iLangId']): ?><td><?php echo $this->_aVars['aRow']['title']; ?></td><?php endif; ?>
		<td><?php echo $this->_aVars['aRow']['sample_text']; ?></td>
		<td class="t_center<?php if ($this->_aVars['aRow']['is_translated']): ?> is_translated<?php endif; ?>"><textarea cols="30" rows="6" name="text[<?php echo $this->_aVars['aRow']['phrase_id']; ?>]" class="text" style="width:95%;"><?php echo Phpfox::getLib('parse.output')->htmlspecialchars($this->_aVars['aRow']['text']); ?></textarea></td>
	</tr>
<?php endforeach; endif; ?>
	</table>
	<div class="table_bottom table_hover_action">	
		<input type="submit" name="save_selected" value="<?php echo Phpfox::getPhrase('language.save_selected'); ?>" class="button disabled sJsCheckBoxButton" disabled="true" />
		<input type="submit" name="delete" value="<?php echo Phpfox::getPhrase('language.delete_selected'); ?>" class="button sJsConfirm disabled sJsCheckBoxButton" disabled="true" />
		<input type="submit" name="revert_selected" value="<?php echo Phpfox::getPhrase('language.revert_selected_default'); ?>" class="button sJsConfirm disabled sJsCheckBoxButton" disabled="true" />
		<input type="submit" name="save" value="<?php echo Phpfox::getPhrase('language.save_all'); ?>" class="button" />
	</div>

</form>

<br />
<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager');  else: ?>
<div class="p_4 t_center">
<?php echo Phpfox::getPhrase('language.phrases_found'); ?>
</div>
<?php endif; ?>
