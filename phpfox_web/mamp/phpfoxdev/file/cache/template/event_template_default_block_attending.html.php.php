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
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: attending.html.php 3342 2011-10-21 12:59:32Z Raymond_Benc $
 */
 
 

 if (count ( $this->_aVars['aInvites'] )): ?>
<ul class="block_listing">
<?php if (count((array)$this->_aVars['aInvites'])):  $this->_aPhpfoxVars['iteration']['invites'] = 0;  foreach ((array) $this->_aVars['aInvites'] as $this->_aVars['aInvite']):  $this->_aPhpfoxVars['iteration']['invites']++; ?>
	
	<li><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aInvite'],'suffix' => '_50_square','max_width' => 32,'max_height' => 32,'class' => 'v_middle')); ?> <?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aInvite']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aInvite']['user_name'], ((empty($this->_aVars['aInvite']['user_name']) && isset($this->_aVars['aInvite']['profile_page_id'])) ? $this->_aVars['aInvite']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten($this->_aVars['aInvite']['full_name'], Phpfox::getParam('user.maximum_length_for_full_name')) . '</a></span>'; ?></li>
<?php endforeach; endif; ?>
</ul>
<?php endif; ?>

<?php if (count ( $this->_aVars['aMaybeInvites'] )): ?>
<div class="title">
<?php echo $this->_aVars['iMaybeCnt']; ?> <?php echo Phpfox::getPhrase('event.maybe_attending'); ?>
</div>
<div class="block_listing_inline">
	<ul>
<?php if (count((array)$this->_aVars['aMaybeInvites'])):  $this->_aPhpfoxVars['iteration']['invites'] = 0;  foreach ((array) $this->_aVars['aMaybeInvites'] as $this->_aVars['aInvite']):  $this->_aPhpfoxVars['iteration']['invites']++; ?>
	
		<li><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aInvite'],'suffix' => '_50_square','max_width' => 24,'max_height' => 24,'class' => 'js_hover_title')); ?></li>
<?php endforeach; endif; ?>
	</ul>
	<div class="clear"></div>
</div>	
<?php endif; ?>

<?php if (count ( $this->_aVars['aAwaitingInvites'] )): ?>
<div class="title">
<?php echo $this->_aVars['iAwaitingCnt']; ?> <?php echo Phpfox::getPhrase('event.awaiting_reply'); ?>
</div>
<div class="block_listing_inline">
	<ul>
<?php if (count((array)$this->_aVars['aAwaitingInvites'])):  $this->_aPhpfoxVars['iteration']['invites'] = 0;  foreach ((array) $this->_aVars['aAwaitingInvites'] as $this->_aVars['aInvite']):  $this->_aPhpfoxVars['iteration']['invites']++; ?>
	
		<li><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aInvite'],'suffix' => '_50_square','max_width' => 24,'max_height' => 24,'class' => 'js_hover_title')); ?></li>
<?php endforeach; endif; ?>
	</ul>
	<div class="clear"></div>
</div>
<?php endif; ?>

<?php if (count ( $this->_aVars['aNotAttendingInvites'] )): ?>
<div class="title">
<?php echo $this->_aVars['iNotAttendingCnt']; ?> <?php echo Phpfox::getPhrase('event.not_attending'); ?>
</div>
<div class="block_listing_inline">
	<ul>
<?php if (count((array)$this->_aVars['aNotAttendingInvites'])):  $this->_aPhpfoxVars['iteration']['invites'] = 0;  foreach ((array) $this->_aVars['aNotAttendingInvites'] as $this->_aVars['aInvite']):  $this->_aPhpfoxVars['iteration']['invites']++; ?>
	
		<li><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aInvite'],'suffix' => '_50_square','max_width' => 24,'max_height' => 24,'class' => 'js_hover_title')); ?></li>
<?php endforeach; endif; ?>
	</ul>
	<div class="clear"></div>
</div>
<?php endif; ?>
<script type="text/javascript">
var sEventId = <?php echo $this->_aVars['aEvent']['event_id']; ?>;
<?php echo '
$Behavior.onClickEventGuestList = function()
{
	if ($Core.exists(\'#js_controller_event_view\')){
		$(\'#js_controller_event_view #js_block_bottom_link_1\').click(function()
		{
			$Core.box(\'event.browseList\', \'400\', \'id=\' + sEventId);

			return false;
		});		
	}
}
'; ?>

</script>

		
		
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
