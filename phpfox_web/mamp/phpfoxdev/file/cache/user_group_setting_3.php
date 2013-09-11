<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'ad.show_ads' => true,
  'ad.can_create_ad_campaigns' => false,
  'admincp.can_clear_site_cache' => false,
  'admincp.can_add_new_block' => false,
  'admincp.can_view_product_options' => false,
  'admincp.can_manage_modules' => false,
  'admincp.can_add_new_modules' => false,
  'admincp.has_admin_access' => false,
  'announcement.can_close_announcement' => false,
  'announcement.can_view_announcements' => true,
  'apps.can_add_app' => false,
  'apps.can_view_app' => false,
  'apps.apps_require_moderation' => true,
  'apps.can_moderate_apps' => false,
  'attachment.points_attachment' => 1,
  'attachment.can_attach_on_blog' => false,
  'attachment.attachment_limit' => '0',
  'attachment.delete_own_attachment' => false,
  'attachment.delete_user_attachment' => false,
  'attachment.can_attach_on_bulletin' => false,
  'attachment.item_max_upload_size' => 1,
  'blog.view_blogs' => true,
  'blog.edit_own_blog' => false,
  'blog.edit_user_blog' => false,
  'blog.delete_own_blog' => false,
  'blog.delete_user_blog' => false,
  'blog.search_blogs' => true,
  'blog.add_new_blog' => false,
  'blog.points_blog' => 1,
  'blog.blog_add_categories' => false,
  'blog.can_password_protect_blogs' => false,
  'blog.can_control_comments_on_blogs' => false,
  'blog.can_use_editor_on_blog' => false,
  'blog.can_post_comment_on_blog' => false,
  'blog.can_view_password_protected_blog' => false,
  'blog.blog_category_limit' => '0',
  'blog.show_drafts_count' => false,
  'blog.can_delete_other_blog_category' => false,
  'blog.can_delete_own_blog_category' => false,
  'blog.can_approve_blogs' => false,
  'blog.can_view_private_blogs' => false,
  'blog.approve_blogs' => false,
  'blog.flood_control_blog' => 0,
  'captcha.captcha_on_blog_add' => false,
  'captcha.captcha_on_comment' => true,
  'comment.wysiwyg_on_comments' => false,
  'comment.edit_own_comment' => false,
  'comment.edit_user_comment' => false,
  'comment.delete_own_comment' => false,
  'comment.delete_user_comment' => false,
  'comment.points_comment' => 1,
  'comment.can_vote_on_comments' => false,
  'comment.can_post_comments' => false,
  'comment.comment_post_flood_control' => 1,
  'comment.can_moderate_comments' => false,
  'comment.can_delete_comments_posted_on_own_profile' => false,
  'comment.can_comment_on_own_profile' => false,
  'comment.approve_all_comments' => false,
  'comment.can_delete_comment_on_own_item' => false,
  'core.can_view_update_info' => true,
  'core.can_view_private_items' => false,
  'core.can_add_new_setting' => false,
  'core.can_view_site_offline' => false,
  'core.user_is_banned' => false,
  'core.is_spam_free' => false,
  'core.can_view_twitter_updates' => false,
  'core.can_view_news_updates' => false,
  'core.can_design_dnd' => false,
  'core.can_gift_points' => false,
  'custom.can_edit_own_custom_field' => false,
  'custom.can_edit_other_custom_fields' => false,
  'custom.can_manage_custom_fields' => false,
  'custom.can_add_custom_fields' => false,
  'custom.can_add_custom_fields_group' => false,
  'custom.has_special_custom_fields' => false,
  'custom.custom_table_name' => '',
  'custom.can_have_relationship' => false,
  'event.can_edit_own_event' => false,
  'event.can_edit_other_event' => false,
  'event.can_post_comment_on_event' => false,
  'event.can_delete_own_event' => false,
  'event.can_delete_other_event' => false,
  'event.max_upload_size_event' => 500,
  'event.can_view_pirvate_events' => false,
  'event.can_approve_events' => false,
  'event.can_feature_events' => false,
  'event.event_must_be_approved' => false,
  'event.total_mass_emails_per_hour' => 60,
  'event.can_mass_mail_own_members' => false,
  'event.can_access_event' => true,
  'event.can_create_event' => false,
  'event.can_sponsor_event' => false,
  'event.can_purchase_sponsor' => false,
  'event.event_sponsor_price' => 'null',
  'event.auto_publish_sponsored_item' => false,
  'event.flood_control_events' => 0,
  'event.can_view_gmap' => false,
  'event.can_add_gmap' => false,
  'event.points_event' => 0,
  'feed.can_post_comment_on_feed' => false,
  'feed.can_remove_feeds_from_dashboard' => false,
  'feed.can_remove_feeds_from_profile' => false,
  'feed.can_delete_own_feed' => false,
  'feed.can_delete_other_feeds' => false,
  'forum.can_stick_thread' => false,
  'forum.can_close_a_thread' => false,
  'forum.can_post_announcement' => false,
  'forum.can_delete_own_post' => false,
  'forum.can_delete_other_posts' => false,
  'forum.can_add_new_forum' => false,
  'forum.can_edit_forum' => false,
  'forum.can_manage_forum_moderators' => false,
  'forum.can_delete_forum' => false,
  'forum.can_edit_own_post' => false,
  'forum.can_edit_other_posts' => false,
  'forum.can_move_forum_thread' => false,
  'forum.can_copy_forum_thread' => false,
  'forum.can_merge_forum_threads' => false,
  'forum.can_multi_quote_forum' => false,
  'forum.can_reply_to_own_thread' => false,
  'forum.can_reply_on_other_threads' => false,
  'forum.can_add_new_thread' => false,
  'forum.can_add_forum_attachments' => false,
  'forum.can_add_tags_on_threads' => false,
  'forum.enable_captcha_on_posting' => true,
  'forum.forum_thread_flood_control' => 50,
  'forum.forum_post_flood_control' => 50,
  'forum.points_forum' => 0,
  'forum.can_view_forum' => true,
  'forum.can_sponsor_thread' => false,
  'forum.can_purchase_sponsor' => false,
  'forum.forum_thread_sponsor_price' => 'null',
  'forum.auto_publish_sponsored_thread' => false,
  'forum.approve_forum_thread' => false,
  'forum.can_approve_forum_thread' => false,
  'forum.approve_forum_post' => false,
  'forum.can_approve_forum_post' => false,
  'forum.can_thank_on_forum_posts' => false,
  'forum.can_delete_thanks_by_other_users' => false,
  'forum.can_manage_forum_permissions' => false,
  'forum.can_add_poll_to_forum_thread' => false,
  'friend.can_add_friends' => false,
  'friend.can_add_folders' => false,
  'friend.total_folders' => 0,
  'friend.can_remove_friends_from_profile' => false,
  'friend.can_remove_friends_from_dashboard' => false,
  'friend.link_to_remove_friend_on_profile' => false,
  'help.show_tips' => true,
  'invite.points_invite' => 0,
  'language.can_manage_lang_packs' => false,
  'mail.total_folders' => 0,
  'mail.can_compose_message' => false,
  'mail.can_add_folders' => false,
  'mail.show_core_mail_folders_item_count' => false,
  'mail.can_add_attachment_on_mail' => false,
  'mail.mail_box_limit' => 0,
  'mail.override_mail_box_limit' => false,
  'mail.restrict_message_to_friends' => true,
  'mail.can_message_self' => false,
  'mail.override_restrict_message_to_friends' => false,
  'mail.mail_box_warning' => 1,
  'mail.allow_delete_every_message' => false,
  'mail.can_read_private_messages' => false,
  'mail.can_delete_others_messages' => false,
  'mail.enable_captcha_on_mail' => false,
  'mail.send_message_to_max_users_each_time' => 1,
  'marketplace.can_post_comment_on_listing' => false,
  'marketplace.can_edit_own_listing' => false,
  'marketplace.can_edit_other_listing' => false,
  'marketplace.can_delete_own_listing' => false,
  'marketplace.can_delete_other_listings' => false,
  'marketplace.max_upload_size_listing' => 500,
  'marketplace.can_feature_listings' => false,
  'marketplace.listing_approve' => false,
  'marketplace.can_approve_listings' => false,
  'marketplace.can_access_marketplace' => true,
  'marketplace.can_create_listing' => false,
  'marketplace.can_sponsor_marketplace' => false,
  'marketplace.can_purchase_sponsor' => false,
  'marketplace.marketplace_sponsor_price' => 'null',
  'marketplace.auto_publish_sponsored_item' => false,
  'marketplace.can_sell_items_on_marketplace' => false,
  'marketplace.flood_control_marketplace' => 0,
  'marketplace.points_marketplace' => 0,
  'marketplace.total_photo_upload_limit' => 6,
  'marketplace.can_view_expired' => false,
  'music.can_upload_music_public' => true,
  'music.can_add_comment_on_music_album' => false,
  'music.can_add_comment_on_music_song' => false,
  'music.can_edit_other_music_albums' => false,
  'music.can_edit_own_albums' => false,
  'music.can_delete_own_track' => false,
  'music.can_delete_other_tracks' => false,
  'music.can_delete_own_music_album' => false,
  'music.can_delete_other_music_albums' => false,
  'music.music_max_file_size' => 0,
  'music.can_feature_songs' => false,
  'music.can_approve_songs' => false,
  'music.music_song_approval' => false,
  'music.can_feature_music_albums' => false,
  'music.can_access_music' => true,
  'music.can_sponsor_song' => false,
  'music.can_sponsor_album' => false,
  'music.can_purchase_sponsor_album' => false,
  'music.can_purchase_sponsor_song' => false,
  'music.music_album_sponsor_price' => 'null',
  'music.music_song_sponsor_price' => 'null',
  'music.auto_publish_sponsored_album' => false,
  'music.auto_publish_sponsored_song' => false,
  'music.can_edit_own_song' => false,
  'music.can_edit_other_song' => false,
  'music.points_music_song' => 0,
  'newsletter.show_privacy' => false,
  'newsletter.can_create_newsletter' => false,
  'page.can_manage_custom_pages' => false,
  'pages.max_upload_size_pages' => 0,
  'pages.can_moderate_pages' => false,
  'pages.approve_pages' => false,
  'pages.points_pages' => 0,
  'pages.can_add_new_pages' => false,
  'pages.can_view_browse_pages' => true,
  'pages.can_design_pages' => false,
  'pages.can_claim_page' => false,
  'pages.can_add_cover_photo_pages' => false,
  'photo.can_create_photo_album' => false,
  'photo.max_number_of_albums' => '0',
  'photo.points_photo' => 0,
  'photo.can_upload_photos' => false,
  'photo.can_password_protect_albums' => false,
  'photo.can_use_privacy_settings' => false,
  'photo.max_images_per_upload' => 0,
  'photo.can_add_to_rating_module' => false,
  'photo.can_add_tags_on_photos' => false,
  'photo.can_control_comments_on_photos' => false,
  'photo.can_add_mature_images' => false,
  'photo.can_search_for_photos' => false,
  'photo.total_photos_displays' => 
  array (
    0 => '20',
    1 => '40',
    2 => '60',
  ),
  'photo.default_photo_display_limit' => 15,
  'photo.max_photo_display_limit' => 100,
  'photo.refresh_featured_photo' => '1 min',
  'photo.can_download_user_photos' => false,
  'photo.can_view_all_photo_sizes' => false,
  'photo.can_edit_own_photo_album' => false,
  'photo.can_edit_other_photo_albums' => false,
  'photo.can_view_hidden_photos' => false,
  'photo.can_delete_own_photo' => false,
  'photo.can_delete_other_photos' => false,
  'photo.can_edit_own_photo' => false,
  'photo.can_edit_other_photo' => false,
  'photo.photo_mature_age_limit' => 18,
  'photo.can_rate_on_photos' => false,
  'photo.can_edit_photo_categories' => false,
  'photo.can_add_public_categories' => false,
  'photo.photo_must_be_approved' => true,
  'photo.can_approve_photos' => false,
  'photo.can_feature_photo' => false,
  'photo.can_delete_own_photo_album' => false,
  'photo.can_delete_other_photo_albums' => false,
  'photo.can_tag_own_photo' => false,
  'photo.can_tag_other_photos' => false,
  'photo.how_many_tags_on_own_photo' => 0,
  'photo.how_many_tags_on_other_photo' => 0,
  'photo.photo_max_upload_size' => 500,
  'photo.can_view_photos' => true,
  'photo.can_view_private_photos' => false,
  'photo.can_post_on_photos' => false,
  'photo.can_sponsor_photo' => false,
  'photo.can_purchase_sponsor' => false,
  'photo.photo_sponsor_price' => 'null',
  'photo.auto_publish_sponsored_item' => false,
  'photo.can_view_photo_albums' => true,
  'photo.flood_control_photos' => 0,
  'photo.total_photo_display_profile' => 9,
  'poke.can_poke' => false,
  'poke.can_only_poke_friends' => true,
  'poll.poll_can_upload_image' => false,
  'poll.view_poll_results_before_vote' => false,
  'poll.poll_can_change_own_vote' => false,
  'poll.poll_flood_control' => 9999999,
  'poll.poll_requires_admin_moderation' => true,
  'poll.poll_can_moderate_polls' => false,
  'poll.poll_require_captcha_challenge' => true,
  'poll.poll_can_edit_own_polls' => false,
  'poll.poll_can_edit_others_polls' => false,
  'poll.poll_can_delete_own_polls' => false,
  'poll.poll_can_delete_others_polls' => false,
  'poll.can_post_comment_on_poll' => true,
  'poll.view_poll_results_after_vote' => false,
  'poll.maximum_answers_count' => 0,
  'poll.can_vote_in_own_poll' => false,
  'poll.points_poll' => 0,
  'poll.can_view_user_poll_results_own_poll' => false,
  'poll.can_view_user_poll_results_other_poll' => false,
  'poll.can_edit_title' => false,
  'poll.can_edit_question' => false,
  'poll.highlight_answer_voted_by_viewer' => false,
  'poll.can_access_polls' => true,
  'poll.can_create_poll' => false,
  'poll.can_view_hidden_poll_votes' => false,
  'privacy.can_set_allow_list_on_blogs' => false,
  'privacy.can_view_all_items' => false,
  'privacy.can_comment_on_all_items' => false,
  'profile.can_post_comment_on_profile' => false,
  'profile.can_custom_design_own_profile' => false,
  'profile.display_membership_info' => false,
  'profile.can_view_users_profile' => true,
  'profile.can_change_cover_photo' => false,
  'quiz.max_questions' => 0,
  'quiz.min_questions' => 9999999,
  'quiz.max_answers' => 1,
  'quiz.min_answers' => 999999,
  'quiz.can_answer_own_quiz' => false,
  'quiz.can_approve_quizzes' => false,
  'quiz.can_delete_others_quizzes' => false,
  'quiz.new_quizzes_need_moderation' => true,
  'quiz.can_delete_own_quiz' => false,
  'quiz.can_post_comment_on_quiz' => true,
  'quiz.can_edit_own_questions' => false,
  'quiz.can_edit_others_questions' => false,
  'quiz.can_edit_own_title' => false,
  'quiz.can_edit_others_title' => false,
  'quiz.points_quiz' => 0,
  'quiz.can_view_results_before_answering' => false,
  'quiz.can_upload_picture' => false,
  'quiz.is_picture_upload_required' => true,
  'quiz.can_access_quiz' => true,
  'quiz.can_create_quiz' => false,
  'quiz.flood_control_quiz' => 0,
  'report.can_report_comments' => false,
  'search.can_use_global_search' => true,
  'share.can_send_emails' => false,
  'share.total_emails_per_round' => 0,
  'share.emails_per_hour' => 0,
  'shoutbox.can_view_shoutbox' => true,
  'shoutbox.can_add_shoutout' => false,
  'shoutbox.can_delete_all_shoutbox_messages' => false,
  'tag.edit_own_tags' => false,
  'tag.edit_user_tags' => false,
  'tag.can_add_tags_on_blogs' => false,
  'theme.can_view_theme_sample' => true,
  'user.can_add_user_group_setting' => false,
  'user.can_control_profile_privacy' => false,
  'user.can_control_notification_privacy' => false,
  'user.can_override_user_privacy' => false,
  'user.require_profile_image' => false,
  'user.can_edit_gender_setting' => false,
  'user.custom_name_field' => '',
  'user.can_edit_dob' => false,
  'user.can_edit_users' => false,
  'user.can_stay_logged_in' => false,
  'user.can_change_other_user_picture' => false,
  'user.can_edit_other_user_privacy' => false,
  'user.can_change_own_user_name' => false,
  'user.total_times_can_change_user_name' => 3,
  'user.can_block_other_members' => false,
  'user.can_be_blocked_by_others' => true,
  'user.can_feature' => false,
  'user.can_change_email' => false,
  'user.can_verify_others_emails' => false,
  'user.can_delete_own_account' => false,
  'user.can_change_own_full_name' => false,
  'user.total_times_can_change_own_full_name' => 1,
  'user.can_delete_others_account' => false,
  'user.can_be_invisible' => false,
  'user.total_upload_space' => 0,
  'user.force_cropping_tool_for_photos' => false,
  'user.max_upload_size_profile_photo' => 500,
  'user.can_search_user_gender' => true,
  'user.can_search_user_age' => true,
  'user.can_browse_users_in_public' => true,
  'user.can_edit_user_group_membership' => false,
  'user.can_view_if_a_user_is_invisible' => false,
  'user.can_edit_currency' => false,
  'user.can_manage_user_group_settings' => false,
  'user.can_edit_user_group' => false,
  'user.can_delete_user_group' => false,
  'user.can_member_snoop' => false,
  'user.can_purchase_with_points' => false,
  'user.hide_from_browse' => false,
  'user.can_search_by_zip' => true,
  'video.can_add_comment_on_video' => false,
  'video.can_edit_own_video' => false,
  'video.can_edit_other_video' => false,
  'video.can_delete_own_video' => false,
  'video.can_delete_other_video' => false,
  'video.video_file_size_limit' => 0,
  'video.can_upload_videos' => false,
  'video.can_feature_videos_' => false,
  'video.approve_video_before_display' => false,
  'video.can_approve_videos' => false,
  'video.max_size_for_video_photos' => 500,
  'video.points_video' => 0,
  'video.can_access_videos' => true,
  'video.can_sponsor_video' => false,
  'video.can_purchase_sponsor' => false,
  'video.video_sponsor_price' => 'null',
  'video.auto_publish_sponsored_item' => false,
  'video.flood_control_videos' => 0,
); ?>