<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Post item small-->
<div class="post-item-small">
    <div class="left">
        <a href="<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>">
            <?php $this->load->view("partials/_post_image", ["post" => $post, "icon_size" => "sm", "bg_size" => "sm", "image_size" => "small", "class" => "lazyload"]); ?>
        </a>
    </div>

    <div class="right">
        <h3 class="title">
            <a href="<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>">
                <?php echo html_escape(character_limiter($post->title, 55, '...')); ?>
            </a>
        </h3>
        <p class="small-post-meta">
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
                <span class="m-r-0"><i class="fa fa-eye"></i><?php echo $post->hit; ?></span>
            <?php endif; ?>
        </p>

    </div>
</div>