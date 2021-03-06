<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Post row item-->
<div class="post-item">
    <?php if (isset($show_label)): ?>
        <?php $post_category = get_post_category($post); ?>
        <?php if (!empty($post_category['id'])): ?>
            <a href="#">
                <span class="category-label" style="background-color: <?php echo html_escape($post_category['color']); ?>"><?php echo html_escape($post_category['name']); ?></span>
            </a>
        <?php endif; ?>
    <?php endif; ?>
    <div class="post-item-image">
        <a href="#">
            <?php $this->load->view("partials/_post_image", ["post" => $post, "icon_size" => "md", "bg_size" => "md", "image_size" => "mid", "class" => "lazyload"]); ?>
        </a>
    </div>

    <h3 class="title">
        <a href="#">
            <?php echo html_escape(character_limiter($post->title, 55, '...')); ?>
        </a>
    </h3>

    <p class="post-meta">
        <?php if ($general_settings->show_post_author == 1): ?>
            <a href="#"><?php echo html_escape($post->username); ?></a>
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

    <p class="description">
        <?php echo html_escape(character_limiter($post->summary, 80, '...')); ?>
    </p>
</div>