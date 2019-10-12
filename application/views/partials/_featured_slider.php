<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Featured Slider-->
<div class="owl-carousel featured-slider" id="featured-slider">

    <?php foreach ($slider_posts as $post): ?>

        <?php $category = get_post_category($post); ?>

        <div class="featured-slider-item">

            <a href="<?php echo lang_base_url(); ?>category/<?php echo html_escape($category['name_slug']); ?>">
                <span class="category-label"
                      style="background-color: <?php echo html_escape($category['color']); ?>"><?php echo html_escape($category['name']); ?></span>
            </a>
            <a href="<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>" class="img-link">
                <?php if ($post->post_type == "video"): ?>
                    <img src="<?php echo base_url(); ?>assets/img/icon_play.svg" alt="icon" class="post-icon post-icon-lg"/>
                <?php endif; ?>
                <?php if ($post->post_type == "audio"): ?>
                    <img src="<?php echo base_url(); ?>assets/img/icon_music.svg" alt="icon" class="post-icon post-icon-lg"/>
                <?php endif; ?>

                <img src="<?php echo $img_bg_sl; ?>" alt="bg" class="img-responsive img-bg"/>
                <div class="img-container">
                    <img src="<?php echo $img_bg_sl; ?>" data-src="<?php echo get_post_image($post, "slider"); ?>" alt="<?php echo html_escape($post->title); ?>" class="owl-lazy img-cover"/>
                </div>
            </a>
            <div class="caption">
                <h2 class="title">
                    <?php echo html_escape(character_limiter($post->title, 120, '...')); ?>
                </h2>

                <p class="post-meta">
                    <?php if ($general_settings->show_post_author == 1): ?>
                        <a href="<?php echo lang_base_url(); ?>profile/<?php echo html_escape($post->user_slug); ?>"><?php echo html_escape($post->username); ?></a>
                    <?php endif; ?>
                    <?php if ($general_settings->show_post_date == 1): ?>
                        <span><?php echo helper_date_format($post->created_at); ?></span>
                    <?php endif; ?>
                    <?php if ($general_settings->comment_system == 1): ?>
                        <span><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($post->id); ?></span>
                    <?php endif; ?>
                    <?php if ($general_settings->show_hits): ?>
                        <span><i class="fa fa-eye"></i><?php echo $post->hit; ?></span>
                    <?php endif; ?>
                </p>
            </div>


        </div>

    <?php endforeach; ?>

</div>