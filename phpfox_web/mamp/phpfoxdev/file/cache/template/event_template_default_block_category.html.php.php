<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 1, 2013, 7:11 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: block.html.php 5476 2013-03-04 13:45:11Z Miguel_Espinoza $
 */
 
 

 if (( isset ( $this->_aVars['sHeader'] ) && ( ! PHPFOX_IS_AJAX || isset ( $this->_aVars['bPassOverAjaxCall'] ) || isset ( $this->_aVars['bIsAjaxLoader'] ) ) ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Phpfox ::getService('theme')->isInDnDMode())): ?>

<div class="block<?php if (( defined ( 'PHPFOX_IN_DESIGN_MODE' ) || Phpfox ::getService('theme')->isInDnDMode()) && ( ! isset ( $this->_aVars['bCanMove'] ) || ( isset ( $this->_aVars['bCanMove'] ) && $this->_aVars['bCanMove'] == true ) )): ?> js_sortable<?php endif;  if (isset ( $this->_aVars['sCustomClassName'] )): ?> <?php echo $this->_aVars['sCustomClassName'];  endif; ?>"<?php if (isset ( $this->_aVars['sBlockBorderJsId'] )): ?> id="js_block_border_<?php echo $this->_aVars['sBlockBorderJsId']; ?>"<?php endif;  if (defined ( 'PHPFOX_IN_DESIGN_MODE' ) && Phpfox ::getLib('module')->blockIsHidden('js_block_border_' . $this->_aVars['sBlockBorderJsId'] . '' )): ?> style="display:none;"<?php endif; ?>>
<?php if (! empty ( $this->_aVars['sHeader'] ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Phpfox ::getService('theme')->isInDnDMode())): ?>
		<div class="title <?php if (defined ( 'PHPFOX_IN_DESIGN_MODE' ) || Phpfox ::getService('theme')->isInDnDMode()): ?>js_sortable_header<?php endif; ?>">		
<?php if (isset ( $this->_aVars['sBlockTitleBar'] )): ?>
<?php echo $this->_aVars['sBlockTitleBar']; ?>
<?php endif; ?>
<?php if (( isset ( $this->_aVars['aEditBar'] ) && Phpfox ::isUser())): ?>
			<div class="js_edit_header_bar">
				<a href="#" title="<?php echo Phpfox::getPhrase('core.edit_this_block'); ?>" onclick="$.ajaxCall('<?php echo $this->_aVars['aEditBar']['ajax_call']; ?>', 'block_id=<?php echo $this->_aVars['sBlockBorderJsId'];  if (isset ( $this->_aVars['aEditBar']['params'] )):  echo $this->_aVars['aEditBar']['params'];  endif; ?>'); return false;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_edit.png','alt' => '','class' => 'v_middle')); ?></a>				
			</div>
<?php endif; ?>
<?php if (true || isset ( $this->_aVars['sDeleteBlock'] )): ?>
			<div class="js_edit_header_bar js_edit_header_hover" style="display:none;">
<?php if (Phpfox ::getService('theme')->isInDnDMode() && ( ( isset ( $this->_aVars['bCanMove'] ) && $this->_aVars['bCanMove'] ) || ! isset ( $this->_aVars['bCanMove'] ) )): ?>
					<a href="#" onclick="if (confirm('<?php echo Phpfox::getPhrase('core.are_you_sure', array('phpfox_squote' => true)); ?>')){
					$(this).parents('.block:first').remove(); $.ajaxCall('core.removeBlockDnD', 'sController=' + oParams['sController'] 
					+ '&amp;block_id=<?php if (isset ( $this->_aVars['sDeleteBlock'] )):  echo $this->_aVars['sDeleteBlock'];  else: ?> <?php echo $this->_aVars['sBlockBorderJsId'];  endif; ?>');} return false;"title="<?php echo Phpfox::getPhrase('core.remove_this_block'); ?>">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_delete.png','alt' => '','class' => 'v_middle')); ?>
					</a>
<?php else: ?>
<?php if (( ( isset ( $this->_aVars['bCanMove'] ) && $this->_aVars['bCanMove'] ) || ! isset ( $this->_aVars['bCanMove'] ) )): ?>
						<a href="#" onclick="if (confirm('<?php echo Phpfox::getPhrase('core.are_you_sure', array('phpfox_squote' => true)); ?>')) { $(this).parents('.block:first').remove();
						$.ajaxCall('core.hideBlock', '<?php if (isset ( $this->_aVars['sCustomDesignId'] )): ?>custom_item_id=<?php echo $this->_aVars['sCustomDesignId']; ?>&amp;<?php endif; ?>sController=' + oParams['sController'] + '&amp;type_id=<?php if (isset ( $this->_aVars['sDeleteBlock'] )):  echo $this->_aVars['sDeleteBlock'];  else: ?> <?php echo $this->_aVars['sBlockBorderJsId'];  endif; ?>&amp;block_id=' + $(this).parents('.block:first').attr('id')); } return false;" title="<?php echo Phpfox::getPhrase('core.remove_this_block'); ?>">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_delete.png','alt' => '','class' => 'v_middle')); ?>
						</a>				
<?php endif; ?>
<?php endif; ?>
			</div>
			
<?php endif; ?>
<?php if (empty ( $this->_aVars['sHeader'] )): ?>
<?php echo $this->_aVars['sBlockShowName']; ?>
<?php else: ?>
<?php echo $this->_aVars['sHeader']; ?>
<?php endif; ?>
		</div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aEditBar'] )): ?>
	<div id="js_edit_block_<?php echo $this->_aVars['sBlockBorderJsId']; ?>" class="edit_bar" style="display:none;"></div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aMenu'] ) && count ( $this->_aVars['aMenu'] )): ?>
	<div class="menu">
	<ul>
<?php if (count((array)$this->_aVars['aMenu'])):  $this->_aPhpfoxVars['iteration']['content'] = 0;  foreach ((array) $this->_aVars['aMenu'] as $this->_aVars['sPhrase'] => $this->_aVars['sLink']):  $this->_aPhpfoxVars['iteration']['content']++; ?>
 
		<li class="<?php if (count ( $this->_aVars['aMenu'] ) == $this->_aPhpfoxVars['iteration']['content']): ?> last<?php endif;  if ($this->_aPhpfoxVars['iteration']['content'] == 1): ?> first active<?php endif; ?>"><a href="<?php echo $this->_aVars['sLink']; ?>"><?php echo $this->_aVars['sPhrase']; ?></a></li>
<?php endforeach; endif; ?>
	</ul>
	<div class="clear"></div>
	</div>
<?php unset($this->_aVars['aMenu']); ?>
<?php endif; ?>
	<div class="content"<?php if (isset ( $this->_aVars['sBlockJsId'] )): ?> id="js_block_content_<?php echo $this->_aVars['sBlockJsId']; ?>"<?php endif; ?>>
<?php endif; ?>
		<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: category.html.php 1322 2009-12-15 19:31:26Z Miguel_Espinoza $
 */
 
 

 /* Cached: September 1, 2013, 7:11 am */ 
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Miguel Espinoza
 * @package 		Phpfox
 * @version 		$Id: category.html.php 890 2009-12-14 13:54:49Z Miguel_Espinoza $
 */



?>
<ul <?php if (isset ( $this->_aVars['sUlClass'] )): ?>class="<?php echo $this->_aVars['sUlClass']; ?>"<?php else: ?>class="action"<?php endif; ?>>
<?php if (count((array)$this->_aVars['aCategories'])):  foreach ((array) $this->_aVars['aCategories'] as $this->_aVars['iCategoryCount'] => $this->_aVars['aCategory']): ?>
    <li class="<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>category" style="position:relative;">	   	
		
<?php if (Phpfox ::getParam('core.categories_to_show_at_first') < 1 && count ( $this->_aVars['aCategory']['sub'] ) > 0): ?>
	    <span onclick="isClicked_<?php echo $this->_aVars['aCategory']['category_id']; ?>=true; $Core.toggleCategory('<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>subcategory_<?php echo $this->_aVars['aCategory']['category_id']; ?>',<?php echo $this->_aVars['aCategory']['category_id']; ?>);" id="show_more_<?php echo $this->_aVars['aCategory']['category_id']; ?>" class="category_show_more_less" style="text-align:left;vertical-align:middle;">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/plus.gif','class' => 'v_middle')); ?>
	    </span>
	    <span onclick="isClicked_<?php echo $this->_aVars['aCategory']['category_id']; ?>=true; $Core.toggleCategory('<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>subcategory_<?php echo $this->_aVars['aCategory']['category_id']; ?>',<?php echo $this->_aVars['aCategory']['category_id']; ?>)" id="show_less_<?php echo $this->_aVars['aCategory']['category_id']; ?>" class="category_show_more_less" style="display:none;text-align:left;vertical-align:middle;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/minus.gif','class' => 'v_middle')); ?></span>
<?php endif; ?>
		
	<a <?php if (Phpfox ::getParam('core.categories_to_show_at_first') < 1 && count ( $this->_aVars['aCategory']['sub'] ) > 0): ?>class="no_ajax_link category_show_more_less_link"<?php endif; ?> href="<?php echo $this->_aVars['aCategory']['url'];  if (Phpfox ::getLib('request')->get('view') != ''): ?>view_<?php echo Phpfox::getLib('request')->get('view'); ?>/<?php endif; ?>" id="<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>category_<?php echo $this->_aVars['aCategory']['category_id']; ?>">
	
<?php echo Phpfox::getLib('phpfox.parse.output')->clean(Phpfox::getLib('locale')->convert($this->_aVars['aCategory']['name'])); ?>
	</a>

<?php if (isset ( $this->_aVars['aCategory']['sub'] ) && count ( $this->_aVars['aCategory']['sub'] )): ?>
	<ul>
<?php if (count((array)$this->_aVars['aCategory']['sub'])):  foreach ((array) $this->_aVars['aCategory']['sub'] as $this->_aVars['iKey'] => $this->_aVars['aSubCategory']): ?>
	    <li <?php if ($this->_aVars['iKey'] >= Phpfox ::getParam('core.categories_to_show_at_first')): ?>style="display:none;" class="<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>subcategory_<?php echo $this->_aVars['aCategory']['category_id']; ?> special_subcategory"<?php endif; ?>>
		<a href="<?php echo $this->_aVars['aSubCategory']['url']; ?>" id="<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>subcategory_<?php echo $this->_aVars['aSubCategory']['category_id']; ?>">
<?php echo Phpfox::getLib('phpfox.parse.output')->clean(Phpfox::getLib('locale')->convert($this->_aVars['aSubCategory']['name'])); ?>
		</a>
	    </li>
<?php endforeach; endif; ?>

<?php if ($this->_aVars['iKey'] >= Phpfox ::getParam('core.categories_to_show_at_first') && Phpfox ::getParam('core.categories_to_show_at_first') > 0): ?>
	    <li onclick="$Core.toggleCategory('<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>subcategory_<?php echo $this->_aVars['aCategory']['category_id']; ?>',<?php echo $this->_aVars['aCategory']['category_id']; ?>)">
		<div id="show_more_<?php echo $this->_aVars['aCategory']['category_id']; ?>" style="text-align:right;vertical-align:middle;"><a href="#" onclick="return false;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/plus.gif','class' => 'v_middle'));  echo Phpfox::getPhrase('user.view_more'); ?></a></div>
		<div id="show_less_<?php echo $this->_aVars['aCategory']['category_id']; ?>" style="display:none;text-align:right;vertical-align:middle;"><a href="#" onclick="return false;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/minus.gif','class' => 'v_middle'));  echo Phpfox::getPhrase('core.view_less'); ?></a></div>
	    </li>
<?php endif; ?>
	</ul>
<?php endif; ?>
    </li>
<?php endforeach; endif; ?>
</ul>

		
		
<?php if (( isset ( $this->_aVars['sHeader'] ) && ( ! PHPFOX_IS_AJAX || isset ( $this->_aVars['bPassOverAjaxCall'] ) || isset ( $this->_aVars['bIsAjaxLoader'] ) ) ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Phpfox ::getService('theme')->isInDnDMode())): ?>
	</div>
<?php if (isset ( $this->_aVars['aFooter'] ) && count ( $this->_aVars['aFooter'] )): ?>
	<div class="bottom">
		<ul>
<?php if (count((array)$this->_aVars['aFooter'])):  $this->_aPhpfoxVars['iteration']['block'] = 0;  foreach ((array) $this->_aVars['aFooter'] as $this->_aVars['sPhrase'] => $this->_aVars['sLink']):  $this->_aPhpfoxVars['iteration']['block']++; ?>

				<li id="js_block_bottom_<?php echo $this->_aPhpfoxVars['iteration']['block']; ?>"<?php if ($this->_aPhpfoxVars['iteration']['block'] == 1): ?> class="first"<?php endif; ?>>
<?php if ($this->_aVars['sLink'] == '#'): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif','class' => 'ajax_image')); ?>
<?php endif; ?>
					<a href="<?php echo $this->_aVars['sLink']; ?>" id="js_block_bottom_link_<?php echo $this->_aPhpfoxVars['iteration']['block']; ?>"><?php echo $this->_aVars['sPhrase']; ?></a>
				</li>
<?php endforeach; endif; ?>
		</ul>
	</div>
<?php endif; ?>
</div>
<?php endif;  unset($this->_aVars['sHeader'], $this->_aVars['sModule'], $this->_aVars['sComponent'], $this->_aVars['aFooter'], $this->_aVars['sBlockBorderJsId'], $this->_aVars['bBlockDisableSort'], $this->_aVars['bBlockCanMove'], $this->_aVars['aEditBar'], $this->_aVars['sDeleteBlock'], $this->_aVars['sBlockTitleBar'], $this->_aVars['sBlockJsId'], $this->_aVars['sCustomClassName'], $this->_aVars['aMenu']); ?>

<?php if (isset ( $this->_aVars['sClass'] )): ?>
<?php Phpfox::getBlock('ad.inner', array('sClass' => $this->_aVars['sClass']));  endif; ?>
