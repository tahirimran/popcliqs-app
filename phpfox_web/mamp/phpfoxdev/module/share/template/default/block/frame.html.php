<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Share
 * @version 		$Id: frame.html.php 5474 2013-03-04 10:51:26Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="label_flow_menu">	
	<ul>
		{if Phpfox::isUser() && $iFeedId > 0}
		<li class="label_flow_menu_active"><a href="#share.post?type={$sBookmarkType}&amp;url={$sBookmarkUrl|urlencode}&amp;title={$sBookmarkTitle}&amp;feed_id={$iFeedId}&amp;is_feed_view=1&amp;sharemodule={$sShareModule}">{phrase var='share.post'}</a></li>
		{/if}
		{if !Phpfox::isMobile()}
	    {if Phpfox::isUser()}
		{if Phpfox::isModule('friend')}		
			<li {if Phpfox::isUser() && $iFeedId <= 0}class="label_flow_menu_active"{/if}><a href="#share.friend?type={$sBookmarkType}&amp;url={$sBookmarkUrl|urlencode}&amp;title={$sBookmarkTitle}">{phrase var='share.message'}</a></li>
		{/if}
		{if Phpfox::getUserParam('share.can_send_emails')}
		<li{if !Phpfox::getParam('share.enable_social_bookmarking')} class="last"{/if}><a href="#share.email?type={$sBookmarkType}&amp;url={$sBookmarkUrl|urlencode}&amp;title={$sBookmarkTitle}">{phrase var='share.e_mail'}</a></li>
		{/if}
		{/if}		
		{/if}
	{if Phpfox::getParam('share.enable_social_bookmarking') && $bShowSocialBookmarks}	
		<li {if !Phpfox::isUser() && $iFeedId <= 0}class="label_flow_menu_active"{else}class="last"{/if}><a href="#share.bookmark?type={$sBookmarkType}&amp;url={$sBookmarkUrl|urlencode}&amp;title={$sBookmarkTitle}">{phrase var='share.social_bookmarks'}</a></li>
{/if}
	</ul>
	<br class="clear" />
</div>	
<div class="labelFlowContent" id="js_share_content">
	{if Phpfox::isUser() && $iFeedId > 0}
	{module name='feed.share' type=$sBookmarkType url=$sBookmarkUrl}
	{else}
	{if Phpfox::getParam('share.enable_social_bookmarking') && $bShowSocialBookmarks == true}
		{module name='share.bookmark' type=$sBookmarkType url=$sBookmarkUrl title=$sBookmarkTitle}
		{else}
		{module name='share.friend' type=$sBookmarkType url=$sBookmarkUrl title=$sBookmarkTitle}
	{/if}
	{/if}
</div>
<script type="text/javascript">$Core.loadStaticFile('{jscript file='switch_legend.js'}');</script>
<script type="text/javascript">$Core.loadStaticFile('{jscript file='switch_menu.js'}');</script>
<script type="text/javascript">$Core.loadInit();</script>