<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice
    {
        background-color: #3c8dbc;
        border: 1px solid #3c8dbc;
    }
</style>
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="box box-primary">
               <?php echo form_open('admin/preferences_post'); ?>
            <div class="box-header with-border">
                <div class="left">
                    <h3 class="box-title"><?php echo trans('preferences'); ?></h3>
                </div>
           <div class="right">
                    <button type="submit" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
                </div> </div><!-- /.box-header -->

            <!-- form start -->
         
            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('multilingual_system'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="multilingual_system" value="1" id="multilingual_system_1"
                                   class="square-purple" <?php echo ($general_settings->multilingual_system == 1) ? 'checked' : ''; ?>>
                            <label for="multilingual_system_1" class="option-label"><?php echo trans('enable'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="multilingual_system" value="0" id="multilingual_system_2"
                                   class="square-purple" <?php echo ($general_settings->multilingual_system != 1) ? 'checked' : ''; ?>>
                            <label for="multilingual_system_2" class="option-label"><?php echo trans('disable'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('registration_system'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="registration_system" value="1" id="registration_system_1"
                                   class="square-purple" <?php echo ($general_settings->registration_system == 1) ? 'checked' : ''; ?>>
                            <label for="registration_system_1" class="option-label"><?php echo trans('enable'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="registration_system" value="0" id="registration_system_2"
                                   class="square-purple" <?php echo ($general_settings->registration_system != 1) ? 'checked' : ''; ?>>
                            <label for="registration_system_2" class="option-label"><?php echo trans('disable'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('comment_system'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="comment_system" value="1" id="comment_system_1"
                                   class="square-purple" <?php echo ($general_settings->comment_system == 1) ? 'checked' : ''; ?>>
                            <label for="comment_system_1" class="option-label"><?php echo trans('enable'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="comment_system" value="0" id="comment_system_2"
                                   class="square-purple" <?php echo ($general_settings->comment_system != 1) ? 'checked' : ''; ?>>
                            <label for="comment_system_2" class="option-label"><?php echo trans('disable'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('facebook_comments'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="facebook_comment_active" value="1" id="facebook_comment_active_1"
                                   class="square-purple" <?php echo ($general_settings->facebook_comment_active == 1) ? 'checked' : ''; ?>>
                            <label for="facebook_comment_active_1" class="option-label"><?php echo trans('enable'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="facebook_comment_active" value="0" id="facebook_comment_active_2"
                                   class="square-purple" <?php echo ($general_settings->facebook_comment_active != 1) ? 'checked' : ''; ?>>
                            <label for="facebook_comment_active_2" class="option-label"><?php echo trans('disable'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('emoji_reactions'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="emoji_reactions_1" name="emoji_reactions" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="emoji_reactions_1" class="cursor-pointer" <?php echo ($general_settings->emoji_reactions == "1") ? 'checked' : ''; ?>><?php echo trans('enable'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="emoji_reactions_2" name="emoji_reactions" value="0" class="square-purple" <?php echo ($general_settings->emoji_reactions != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="emoji_reactions_2" class="cursor-pointer"><?php echo trans('disable'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('rss'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_rss_1" name="show_rss" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_rss_1" class="cursor-pointer" <?php echo ($general_settings->show_rss == "1") ? 'checked' : ''; ?>><?php echo trans('enable'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_rss_2" name="show_rss" value="0" class="square-purple" <?php echo ($general_settings->show_rss != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_rss_2" class="cursor-pointer"><?php echo trans('disable'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('newsletter'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="newsletter_1" name="newsletter" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="newsletter_1" class="cursor-pointer" <?php echo ($general_settings->newsletter == "1") ? 'checked' : ''; ?>><?php echo trans('enable'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="newsletter_2" name="newsletter" value="0" class="square-purple" <?php echo ($general_settings->newsletter != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="newsletter_2" class="cursor-pointer"><?php echo trans('disable'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_featured_section'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="show_featured_section" value="1" id="show_featured_section_1"
                                   class="square-purple" <?php echo ($general_settings->show_featured_section == 1) ? 'checked' : ''; ?>>
                            <label for="show_featured_section_1" class="option-label"><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="show_featured_section" value="0" id="show_featured_section_2"
                                   class="square-purple" <?php echo ($general_settings->show_featured_section != 1) ? 'checked' : ''; ?>>
                            <label for="show_featured_section_2" class="option-label"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_latest_posts_homepage'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="show_latest_posts" value="1" id="show_latest_posts_1"
                                   class="square-purple" <?php echo ($general_settings->show_latest_posts == 1) ? 'checked' : ''; ?>>
                            <label for="show_latest_posts_1" class="option-label"><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="show_latest_posts" value="0" id="show_latest_posts_2"
                                   class="square-purple" <?php echo ($general_settings->show_latest_posts != 1) ? 'checked' : ''; ?>>
                            <label for="show_latest_posts_2" class="option-label"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_news_ticker'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_newsticker_1" name="show_newsticker" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_newsticker_1" class="cursor-pointer" <?php echo ($general_settings->show_newsticker == "1") ? 'checked' : ''; ?>><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_newsticker_2" name="show_newsticker" value="0" class="square-purple" <?php echo ($general_settings->show_newsticker == "0" || $general_settings->show_newsticker == null) ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_newsticker_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_post_author'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="show_post_author" value="1" id="show_post_author_1"
                                   class="square-purple" <?php echo ($general_settings->show_post_author == 1) ? 'checked' : ''; ?>>
                            <label for="show_post_author_1" class="option-label"><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="show_post_author" value="0" id="show_post_author_2"
                                   class="square-purple" <?php echo ($general_settings->show_post_author != 1) ? 'checked' : ''; ?>>
                            <label for="show_post_author_2" class="option-label"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_post_dates'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="show_post_date" value="1" id="show_post_date_1"
                                   class="square-purple" <?php echo ($general_settings->show_post_date == 1) ? 'checked' : ''; ?>>
                            <label for="show_post_date_1" class="option-label"><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" name="show_post_date" value="0" id="show_post_date_2"
                                   class="square-purple" <?php echo ($general_settings->show_post_date != 1) ? 'checked' : ''; ?>>
                            <label for="show_post_date_2" class="option-label"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_post_view_counts'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_hits_1" name="show_hits" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_hits_1" class="cursor-pointer" <?php echo ($general_settings->show_hits == "1") ? 'checked' : ''; ?>><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_hits_2" name="show_hits" value="0" class="square-purple" <?php echo ($general_settings->show_hits != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_hits_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_copy_paste'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_copy_paste_1" name="show_copy_paste" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_copy_paste_1" class="cursor-pointer" <?php echo ($general_settings->show_copy_paste == "1") ? 'checked' : ''; ?>><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_copy_paste_2" name="show_copy_paste" value="0" class="square-purple" <?php echo ($general_settings->show_copy_paste != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_copy_paste_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('auto_refresh_theme'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="auto_refresh_theme_1" name="auto_refresh_theme" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="auto_refresh_theme_1" class="cursor-pointer" <?php echo ($general_settings->auto_refresh_theme == "1") ? 'checked' : ''; ?>><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="auto_refresh_theme_2" name="auto_refresh_theme" value="0" class="square-purple" <?php echo ($general_settings->auto_refresh_theme != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="auto_refresh_theme_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group" id="is_auto_refresh_time">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('auto_refresh_time'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                            <input type="text" class="form-control" name="auto_refresh_time" placeholder="<?php echo trans('auto_refresh_time'); ?>"
                               value="<?php echo html_escape($general_settings->auto_refresh_time); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?>>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_notification'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_notification_1" name="show_notification" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_notification_1" class="cursor-pointer" <?php echo ($general_settings->show_notification == "1") ? 'checked' : ''; ?>><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_notification_2" name="show_notification" value="0" class="square-purple" <?php echo ($general_settings->show_notification != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_notification_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_breaking_news'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_breaking_news_1" name="show_breaking_news" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_breaking_news_1" class="cursor-pointer" <?php echo ($general_settings->show_breaking_news == "1") ? 'checked' : ''; ?>><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_breaking_news_2" name="show_breaking_news" value="0" class="square-purple" <?php echo ($general_settings->show_breaking_news != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_breaking_news_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_social_sharing_link'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_social_sharing_link_1" name="show_social_sharing_link" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_social_sharing_link_1" class="cursor-pointer" <?php echo ($general_settings->show_social_sharing_link == "1") ? 'checked' : ''; ?>><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_social_sharing_link_2" name="show_social_sharing_link" value="0" class="square-purple" <?php echo ($general_settings->show_social_sharing_link != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_social_sharing_link_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_social_sharing_link_bottom'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_social_sharing_link_bottom_1" name="show_social_sharing_link_bottom" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_social_sharing_link_bottom_1" class="cursor-pointer" <?php echo ($general_settings->show_social_sharing_link_bottom == "1") ? 'checked' : ''; ?>><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_social_sharing_link_bottom_2" name="show_social_sharing_link_bottom" value="0" class="square-purple" <?php echo ($general_settings->show_social_sharing_link_bottom != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_social_sharing_link_bottom_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_android_app_url'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_android_app_url_1" name="show_android_app_url" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_android_app_url_1" class="cursor-pointer" <?php echo ($general_settings->show_android_app_url == "1") ? 'checked' : ''; ?>><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_android_app_url_2" name="show_android_app_url" value="0" class="square-purple" <?php echo ($general_settings->show_android_app_url != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_android_app_url_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_apple_app_url'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_apple_app_url_1" name="show_apple_app_url" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_apple_app_url_1" class="cursor-pointer" <?php echo ($general_settings->show_apple_app_url == "1") ? 'checked' : ''; ?>><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_apple_app_url_2" name="show_apple_app_url" value="0" class="square-purple" <?php echo ($general_settings->show_apple_app_url != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_apple_app_url" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_epaper_menu'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_epaper_menu_1" name="show_epaper_menu" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_epaper_menu_1" class="cursor-pointer" ><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_epaper_menu_2" name="show_epaper_menu" value="0" class="square-purple" <?php echo ($general_settings->show_epaper_menu != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_epaper_menu_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>   
                  <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('ad_blocker_script'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="ad_blocker_script" name="ad_blocker_script" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_epaper_menu_1" class="cursor-pointer" ><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="ad_blocker_script" name="ad_blocker_script" value="0" class="square-purple" <?php echo ($general_settings->ad_blocker_script != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_epaper_menu_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_weather_report'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_weather_report" name="show_weather_report" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_epaper_menu_1" class="cursor-pointer" ><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_weather_report" name="show_weather_report" value="0" class="square-purple" <?php echo ($general_settings->show_weather_report != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_epaper_menu_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_cricket_report'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_cricket_report" name="show_cricket_report" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_epaper_menu_1" class="cursor-pointer" ><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="show_cricket_report" name="show_cricket_report" value="0" class="square-purple" <?php echo ($general_settings->show_cricket_report != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_epaper_menu_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('show_navigation_post'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="navigation_post" name="navigation_post" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_epaper_menu_1" class="cursor-pointer" ><?php echo trans('yes'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="navigation_post" name="navigation_post" value="0" class="square-purple" <?php echo ($general_settings->navigation_post != "1") ? 'checked' : ''; ?>>&nbsp;&nbsp;
                            <label for="show_epaper_menu_2" class="cursor-pointer"><?php echo trans('no'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('top_menu_color'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                        <div class="input-group my-colorpicker">
                            <input type="text" class="form-control" name="top_menu_color" maxlength="200" placeholder="<?php echo trans('top_menu_color'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> value="<?php echo html_escape($general_settings->top_menu_color); ?>" required>
                            <div class="input-group-addon">
                                <i></i>
                            </div>
                        </div><!-- /.input group -->
                          
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('top_menu_bg_color'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                             <div class="input-group my-colorpicker">
                        <input type="text" class="form-control" name="top_menu_bg_color" maxlength="200" placeholder="<?php echo trans('top_menu_bg_color'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> value="<?php echo html_escape($general_settings->top_menu_bg_color); ?>" required>
                        <div class="input-group-addon">
                            <i></i>
                        </div>
                    </div><!-- /.input group -->
                          
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('navigation_color'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                          <div class="input-group my-colorpicker">
                        <input type="text" class="form-control" name="navigation_color" maxlength="200" placeholder="<?php echo trans('navigation_color'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> value="<?php echo html_escape($general_settings->navigation_color); ?>" required>
                        <div class="input-group-addon">
                            <i></i>
                        </div>
                    </div><!-- /.input group -->
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('navigation_bg_color'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                            <div class="input-group my-colorpicker">
                                <input type="text" class="form-control" name="navigation_bg_color" maxlength="200" placeholder="<?php echo trans('navigation_bg_color'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> value="<?php echo html_escape($general_settings->navigation_bg_color); ?>" required>
                                <div class="input-group-addon">
                                    <i></i>
                                </div>
                            </div><!-- /.input group -->
                          
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('navigation_active_bg_color'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                            <div class="input-group my-colorpicker">
                                <input type="text" class="form-control" name="navigation_active_bg_color" maxlength="200" placeholder="<?php echo trans('navigation_active_bg_color'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> value="<?php echo html_escape($general_settings->navigation_active_bg_color); ?>" required>
                                <div class="input-group-addon">
                                    <i></i>
                                </div>
                            </div><!-- /.input group -->
                          
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('footer_color'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                             <div class="input-group my-colorpicker">
                        <input type="text" class="form-control" name="footer_color" maxlength="200" placeholder="<?php echo trans('footer_color'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> value="<?php echo html_escape($general_settings->footer_color); ?>" required>
                        <div class="input-group-addon">
                            <i></i>
                        </div>
                    </div><!-- /.input group -->
                          
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('footer_bg_color'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                             <div class="input-group my-colorpicker">
                        <input type="text" class="form-control" name="footer_bg_color" maxlength="200" placeholder="<?php echo trans('footer_bg_color'); ?>" <?php echo ($rtl == true) ? 'dir="rtl"' : ''; ?> value="<?php echo html_escape($general_settings->footer_bg_color); ?>" required>
                        <div class="input-group-addon">
                            <i></i>
                        </div>
                    </div><!-- /.input group -->
                          
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('display_add_model'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="" name="add_model" value="2" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_newsticker_2" class="cursor-pointer"><?php echo trans('all_screen'); 
                            ?></label>
                        </div>
                       <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="" name="add_model" value="0" class="square-purple" <?php if($general_settings->show_ad_model == 0) {echo 'checked';}   ?>>&nbsp;&nbsp;
                            <label for="show_newsticker_2" class="cursor-pointer"><?php echo trans('desktop_only'); ?></label>
                        </div>
                     <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="" name="add_model" value="1" class="square-purple"  <?php if($general_settings->show_ad_model == 1) {echo 'checked';}   ?> >&nbsp;&nbsp;
                            <label for="show_newsticker_2" class="cursor-pointer"><?php echo trans('mobile_only'); ?></label>
                        </div>
                         
                    </div>
                </div>

                 <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('featured_image'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="featured_image" name="featured_image" value="2" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="show_newsticker_2" class="cursor-pointer" data-toggle="tooltip" data-placement="top" title="Hide Featured Image if more than one Image in a post ."><?php echo trans('auto'); 
                            ?></label>
                        </div>
                       <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="featured_image" name="featured_image" value="0" class="square-purple" <?php if($general_settings->featured_image == 0) {echo 'checked';}   ?>>&nbsp;&nbsp;
                            <label for="show_newsticker_2" class="cursor-pointer"><?php echo trans('hide'); ?></label>
                        </div>
                     <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="featured_image" name="featured_image" value="1" class="square-purple"  <?php if($general_settings->featured_image == 1) {echo 'checked';}   ?> >&nbsp;&nbsp;
                            <label for="show_newsticker_2" class="cursor-pointer"><?php echo trans('show'); ?></label>
                        </div>
                         
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label><?php echo trans('related_link_type'); ?></label>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="" name="related_link_type" value="1" class="square-purple" checked>&nbsp;&nbsp;
                            <label for="related_link_type2" class="cursor-pointer"><?php echo trans('hindi'); 
                            ?></label>
                        </div>
                       <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="" name="related_link_type" value="2" class="square-purple" <?php if($general_settings->related_link_type == 2) {echo 'checked';}   ?>>&nbsp;&nbsp;
                            <label for="show_newsticker_2" class="cursor-pointer"><?php echo trans('english'); ?></label>
                        </div>
                     <div class="col-md-2 col-sm-4 col-xs-12 col-lang">
                            <input type="radio" id="" name="related_link_type" value="0" class="square-purple"  <?php if($general_settings->related_link_type == 0) {echo 'checked';}   ?> >&nbsp;&nbsp;
                            <label for="show_newsticker_2" class="cursor-pointer"><?php echo trans('none'); ?></label>
                        </div>
                         
                    </div>
                </div>
             <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('home_style'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                            <select  class="form-control" name="home_buton_style" id="home_buton_style" required>
                                <option value="icon" selected><?php echo trans('icon_only'); ?></option>
                                <option value="english" <?php if($general_settings->home_buton_style == "english") {echo 'selected';}   ?> ><?php echo trans('english_home'); ?></option>
                                 <option value="icon_english" <?php if($general_settings->home_buton_style == "icon_english") {echo 'selected';}   ?> ><?php echo trans('icon_english'); ?></option>
                                <option value="hindi" <?php if($general_settings->home_buton_style == "hindi") {echo 'selected';}   ?> ><?php echo trans('hindi_home'); ?></option>
                                <option value="icon_hindi" <?php if($general_settings->home_buton_style == "icon_hindi") {echo 'selected';}   ?> ><?php echo trans('icon_hindi'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('featured_block'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                            <select  class="form-control" name="featured_block" id="featured_block" required>
                                <option value="0" selected><?php echo trans('enable_both_on_all_screen'); ?></option>
                                <option value="2" <?php if($general_settings->featured_block == 2) {echo 'selected';}   ?> ><?php echo trans('disable_both_on_all_screen'); ?></option>
                                <option value="1" <?php if($general_settings->featured_block == 1) {echo 'selected';}   ?> ><?php echo trans('disable_featured_slider_on_mobile'); ?></option>
                                <option value="3" <?php if($general_settings->featured_block == 3) {echo 'selected';}   ?> ><?php echo trans('disable_featured_post_on_mobile'); ?></option>
                                <option value="4" <?php if($general_settings->featured_block == 4) {echo 'selected';}   ?> ><?php echo trans('disable_both_on_desktop'); ?></option>
                                <option value="6" <?php if($general_settings->featured_block == 6) {echo 'selected';}   ?> ><?php echo trans('disable_both_on_mobile'); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
              
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('related_link_category'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                            <select  class="form-control" name="related_link_category" id="related_link_category" onchange="show_categories_to_exclude(this.value)" required>
                                <option value="0" <?php if($general_settings->related_link_category == 0) {echo 'selected';} else{echo"selected";}  ?>  >Post Category</option>
                                <option value="1" <?php if($general_settings->related_link_category == 1) {echo 'selected';}   ?> >Random Categories</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="exclude_categories">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('exclude_categories'); ?>
                                
                            </label>
                              </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 ">
                            <select name="related_link_excluded_cat[]" class="form-control select2" multiple="multiple" data-placeholder="<?php echo trans('select_category');?>" style="width:100%;">
                                <?php foreach ($top_categories as $item): ?>
                                    <option 
                                    <?php 
                                    $cat_ids=explode(",", $general_settings->related_link_excluded_cat);
                                    foreach ($cat_ids as $selected_id){
                                        if($item->id==$selected_id){
                                            echo "selected";   
                                        }
                                    }?> value="<?php echo html_escape($item->id); ?>"><?php echo html_escape($item->name); ?></option>
                                <?php endforeach; ?>
                            </select>  
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('number_of_links'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                            <input type="number" class="form-control" name="related_post_link_limit" value="<?php echo html_escape($general_settings->related_post_link_limit); ?>" min="0" required style="max-width: 450px;">
                        </div>
                    </div>
                </div>
                 <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('show_after_para'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                            <input type="number" class="form-control" name="paragraph_interval" value="<?php echo html_escape($general_settings->paragraph_interval); ?>" min="1" required style="max-width: 450px;">
                        </div>
                    </div>
                </div>
                  <!-- CHANGE POST LIMIT IN A PAGE -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('number_of_posts'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                            <input type="number" class="form-control" name="post_limit" value="<?php echo html_escape($general_settings->post_limit); ?>" min="0" required style="max-width: 450px;">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('pagination_number_posts'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                            <input type="number" class="form-control" name="pagination_per_page" value="<?php echo html_escape($general_settings->pagination_per_page); ?>" min="0" required style="max-width: 450px;">
                        </div>
                    </div>
                </div>

                 

                <!-- CHANGE DATABASE BACKUP PASSWORD -->
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-12 col-lang">
                            <label class="control-label"><?php echo trans('db_backup_password'); ?></label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                            <input type="password" class="form-control" name="db_backup_password_old" placeholder="<?php echo trans('form_old_password'); ?>" >
                        </div>
                         <div class="col-md-4 col-sm-4 col-xs-12 col-lang">
                            <input type="password" class="form-control" name="db_backup_password_new" placeholder="<?php echo trans('form_new_password'); ?>">
                        </div>
                    </div>
                </div>
                <!-- ./CHANGE DATABASE BACKUP PASSWORD -->

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><?php echo trans('save_changes'); ?></button>
            </div>
            <!-- /.box-footer -->

            <?php echo form_close(); ?><!-- form end -->
        </div>
        <!-- /.box -->
    </div>
</div>
<?php if($general_settings->related_link_category==0){ ?>
<script>
     $('#exclude_categories').hide();
</script>
<?php  }?>
<script type="text/javascript">
    $(document).ready(function () {
       

        // $('#auto_refresh_theme_1').on('ifChecked', function () {
        //     $("#is_auto_refresh_time").show();
        // });

        // $('#auto_refresh_theme_2').on('ifChecked', function () {
        //     $("#is_auto_refresh_time").hide();
        // });

        <?=isset($_POST['auto_refresh_theme']) || $general_settings->auto_refresh_theme ? '$("#auto_refresh_theme_1").iCheck("check");': '' ?>
        $('#auto_refresh_theme_1').on('ifChecked', function (e) {
            $('#is_auto_refresh_time').slideDown();
        });
        $('#auto_refresh_theme_2').on('ifChecked', function (e) {
            $('#is_auto_refresh_time').slideUp();
        });
    });
function show_categories_to_exclude(value){
    if(value==1){
        $('#exclude_categories').show();
    }
    else{
        $('#exclude_categories').hide();
    }


}
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>