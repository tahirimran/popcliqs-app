<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 1, 2013, 7:11 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: link.html.php 5425 2013-02-25 14:16:35Z Raymond_Benc $
 */
 
 

 if (Phpfox ::getParam('like.allow_dislike') && isset ( $this->_aVars['aActions'] )): ?>
	
		<script type="text/javascript">
			
			var bIsLiked = <?php if ($this->_aVars['aLike']['like_is_liked']): ?>true<?php else: ?>false<?php endif; ?>;
			
			<?php echo '
			if (typeof $Core.Like == \'undefined\') $Core.Like = {};
			$Core.Like.Actions = 
			{
				doAction: function(sActionTypeId, sItemTypeId, iItemId, sModule, sIteration, iParentId, oObj)
				{
					$(oObj).parent().parent().parent().after(\'<div id="js_gen_display_action_\' + sItemTypeId + \'_\' + iItemId + \'"></div>\');
					window.oTempO = oObj;
					
					/* Figure out if this item has been liked */
					if ( $(oObj).parent().find(\'.js_like_link_unlike\').is(\':visible\') )
					{
						/* it has been liked, so we unlike it */
						$(oObj).parent().find(\'.js_like_link_unlike\').click();
					}
					
					$.ajaxCall(\'like.doAction\', \'action_type_id=\' + sActionTypeId + \'&item_type_id=\' + sItemTypeId + \'&item_id=\' + iItemId + \'&module_name=\' + sModule + \'&parent_id=\' + iParentId);
					/* $(\'.like_action_\' + sActionTypeId + \'_\' + sIteration).each(function(){$(this).toggle();});			*/
					$(oObj).parent().find(\'a.like_action\').toggle();
					
				},
				removeAction: function(sActionTypeId, sItemTypeId, iItemId, sModule, sIteration, iParentId, oObj)
				{
					
					$.ajaxCall(\'like.removeAction\', \'action_type_id=\' + sActionTypeId + \'&item_type_id=\' + sItemTypeId + \'&item_id=\' + iItemId + \'&module_name=\' + sModule + \'&parent_id=\' + iParentId);
					$(oObj).parent().find(\'a.like_action\').toggle();
				}
			};
		</script>
	'; ?>

<?php endif; ?>

<li class="li_action">
	<a href="#" onclick="if ( $(this).parent().find('.like_action_unmarked').is(':visible')){ $(this).parent().find('.like.action.unmarked').click(); }else{}$(this).parents('div:first').find('.js_like_link_unlike:first').show(); $(this).hide(); $.ajaxCall('like.add', 'type_id=<?php echo $this->_aVars['aLike']['like_type_id']; ?>&amp;item_id=<?php echo $this->_aVars['aLike']['like_item_id']; ?>&amp;parent_id=<?php if (isset ( $this->_aVars['aFeed']['feed_id'] )):  echo $this->_aVars['aFeed']['feed_id'];  else:  endif;  if ($this->_aVars['aLike']['like_is_custom']): ?>&amp;custom_inline=1<?php endif; ?>', 'GET'); return false;" class="js_like_link_like"<?php if ($this->_aVars['aLike']['like_is_liked']): ?> style="display:none;"<?php endif; ?>><?php echo Phpfox::getPhrase('feed.like'); ?></a><a href="#" onclick="$(this).parents('div:first').find('.js_like_link_like:first').show(); $(this).hide(); $.ajaxCall('like.delete', 'type_id=<?php echo $this->_aVars['aLike']['like_type_id']; ?>&amp;item_id=<?php echo $this->_aVars['aLike']['like_item_id']; ?>&amp;parent_id=<?php if (isset ( $this->_aVars['aFeed']['feed_id'] )):  echo $this->_aVars['aFeed']['feed_id'];  else:  endif;  if ($this->_aVars['aLike']['like_is_custom']): ?>&amp;custom_inline=1<?php endif; ?>', 'GET'); return false;" class="js_like_link_unlike"<?php if ($this->_aVars['aLike']['like_is_liked']):  else: ?> style="display:none;"<?php endif; ?>><?php echo Phpfox::getPhrase('feed.unlike'); ?></a><?php if (Phpfox ::getParam('like.allow_dislike') && isset ( $this->_aVars['aActions'] ) && is_array ( $this->_aVars['aActions'] ) && ! empty ( $this->_aVars['aActions'] )):  if (count((array)$this->_aVars['aActions'])):  $this->_aPhpfoxVars['iteration']['action'] = 0;  foreach ((array) $this->_aVars['aActions'] as $this->_aVars['aAction']):  $this->_aPhpfoxVars['iteration']['action']++;  if (isset ( $this->_aVars['aAction']['action_type_id'] )): ?>&nbsp;&middot;<a href="#" onclick="$Core.Like.Actions.doAction('<?php echo $this->_aVars['aAction']['action_type_id']; ?>', '<?php echo $this->_aVars['aAction']['item_type_id']; ?>', <?php echo $this->_aVars['aAction']['item_id']; ?>, '<?php echo $this->_aVars['aAction']['module_name']; ?>', <?php echo $this->_aVars['aAction']['iActionIteration']; ?>,  <?php echo $this->_aVars['aFeed']['feed_id']; ?>, this); return false;" class="like_action_<?php echo $this->_aVars['aAction']['action_type_id']; ?>_<?php echo $this->_aVars['aAction']['iActionIteration']; ?> like_action like_action_marked" <?php if ($this->_aVars['aAction']['is_marked']): ?>style="display:none;"<?php endif; ?>>&nbsp;<?php echo $this->_aVars['aAction']['phrase']; ?></a><a href="#" onclick="$Core.Like.Actions.removeAction('<?php echo $this->_aVars['aAction']['action_type_id']; ?>', '<?php echo $this->_aVars['aAction']['item_type_id']; ?>', <?php echo $this->_aVars['aAction']['item_id']; ?>, '<?php echo $this->_aVars['aAction']['module_name']; ?>', <?php echo $this->_aVars['aAction']['iActionIteration']; ?>,  <?php echo $this->_aVars['aFeed']['feed_id']; ?>, this); return false;" class="like_action_<?php echo $this->_aVars['aAction']['action_type_id']; ?>_<?php echo $this->_aVars['aAction']['iActionIteration']; ?> like_action like_action_unmarked" <?php if (! $this->_aVars['aAction']['is_marked']): ?>style="display:none;"<?php endif; ?>>&nbsp;<?php echo Phpfox::getPhrase('like.remove'); ?> <?php echo $this->_aVars['aAction']['phrase']; ?></a><?php endif;  endforeach; endif;  else: ?>

<?php endif; ?>
</li>
