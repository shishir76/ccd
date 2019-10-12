<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="col-sm-12 section-featured">
    <div class="row">
        <div class="container">
            <div id="featured">
                <div class="featured-left">
                    <!--Include Featured Slider-->
                    <?php if (!empty($slider_posts)): ?>
                        <?php $this->load->view('partials/_featured_slider'); ?>
                    <?php else: ?>
                        <img src="<?php echo base_url();?>assets/img/img_bg_sl_empty.jpg" alt="bg" class="img-responsive img-bg noselect img-no-slider" style="pointer-events: none"/>
                    <?php endif; ?>
                </div>
                <div class="featured-right">
                    <div class="featured-boxes-top">
                        <div class="featured-box box-1">
                            <div class="box-inner">
                                <?php $count = 1; ?>
                                <?php foreach ($featured_posts as $item): ?>
                                    <?php if ($count == 1): ?>
                                        <?php $category = get_post_category($item); ?>
                                        <a href="<?php echo lang_base_url(); ?>category/<?php echo html_escape($category['name_slug']); ?>">
                                            <span class="category-label"
                                                  style="background-color: <?php echo html_escape($category['color']); ?>"><?php echo html_escape($category['name']); ?></span>
                                        </a>
                                        <a href="<?php echo lang_base_url(); ?>post/<?php echo html_escape($item->title_slug); ?>">
                                            <?php $this->load->view("partials/_post_image", ["post" => $item, "icon_size" => "md", "bg_size" => "sl", "image_size" => "slider", "class" => "lazyload"]); ?>
                                            <div class="overlay"></div>
                                            <div class="caption">
                                                <h3 class="title">
                                                    <?php echo html_escape(character_limiter($item->title, 50, '...')); ?>
                                                </h3>

                                                <p class="post-meta">
                                                    <?php if ($general_settings->show_post_author == 1): ?>
                                                        <a href="<?php echo lang_base_url(); ?>profile/<?php echo html_escape($item->user_slug); ?>"><?php echo html_escape($item->username); ?></a>
                                                    <?php endif; ?>
                                                    <?php if ($general_settings->show_post_date == 1): ?>
                                                        <span><?php echo helper_date_format($item->created_at); ?></span>
                                                    <?php endif; ?>
                                                    <?php if ($general_settings->comment_system == 1): ?>
                                                        <span><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($item->id); ?></span>
                                                    <?php endif; ?>
                                                    <?php if ($general_settings->show_hits): ?>
                                                        <span><i class="fa fa-eye"></i><?php echo $item->hit; ?></span>
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="featured-box box-2">
                            <div class="box-inner">
                                <?php $count = 1; ?>
                                <?php foreach ($featured_posts as $item): ?>
                                    <?php if ($count == 2): ?>
                                        <?php $category = get_post_category($item); ?>
                                        <a href="<?php echo lang_base_url(); ?>category/<?php echo html_escape($category['name_slug']); ?>">
                                            <span class="category-label"
                                                  style="background-color: <?php echo html_escape($category['color']); ?>"><?php echo html_escape($category['name']); ?></span>
                                        </a>
                                        <a href="<?php echo lang_base_url(); ?>post/<?php echo html_escape($item->title_slug); ?>">
                                            <?php $this->load->view("partials/_post_image", ["post" => $item, "icon_size" => "md", "bg_size" => "sl", "image_size" => "slider", "class" => "lazyload"]); ?>
                                            <div class="overlay"></div>
                                            <div class="caption">
                                                <h3 class="title">
                                                    <?php echo html_escape(character_limiter($item->title, 50, '...')); ?>
                                                </h3>

                                                <p class="post-meta">
                                                    <?php if ($general_settings->show_post_author == 1): ?>
                                                        <a href="<?php echo lang_base_url(); ?>profile/<?php echo html_escape($item->user_slug); ?>"><?php echo html_escape($item->username); ?></a>
                                                    <?php endif; ?>
                                                    <?php if ($general_settings->show_post_date == 1): ?>
                                                        <span><?php echo helper_date_format($item->created_at); ?></span>
                                                    <?php endif; ?>
                                                    <?php if ($general_settings->comment_system == 1): ?>
                                                        <span><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($item->id); ?></span>
                                                    <?php endif; ?>
                                                    <?php if ($general_settings->show_hits): ?>
                                                        <span><i class="fa fa-eye"></i><?php echo $item->hit; ?></span>
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                    <div class="featured-boxes-bottom">
                        <div class="featured-box box-3">
                            <div class="box-inner">
                                <?php $count = 1; ?>
                                <?php foreach ($featured_posts as $item): ?>
                                    <?php if ($count == 3): ?>
                                        <?php $category = get_post_category($item); ?>
                                        <a href="<?php echo lang_base_url(); ?>category/<?php echo html_escape($category['name_slug']); ?>">
                                            <span class="category-label"
                                                  style="background-color: <?php echo html_escape($category['color']); ?>"><?php echo html_escape($category['name']); ?></span>
                                        </a>
                                        <a href="<?php echo lang_base_url(); ?>post/<?php echo html_escape($item->title_slug); ?>">
                                            <?php $this->load->view("partials/_post_image", ["post" => $item, "icon_size" => "md", "bg_size" => "sl", "image_size" => "slider", "class" => "lazyload"]); ?>
                                            <div class="overlay"></div>
                                            <div class="caption">
                                                <h3 class="title">
                                                    <?php echo html_escape(character_limiter($item->title, 50, '...')); ?>
                                                </h3>

                                                <p class="post-meta">
                                                    <?php if ($general_settings->show_post_author == 1): ?>
                                                        <a href="<?php echo lang_base_url(); ?>profile/<?php echo html_escape($item->user_slug); ?>"><?php echo html_escape($item->username); ?></a>
                                                    <?php endif; ?>
                                                    <?php if ($general_settings->show_post_date == 1): ?>
                                                        <span><?php echo helper_date_format($item->created_at); ?></span>
                                                    <?php endif; ?>
                                                    <?php if ($general_settings->comment_system == 1): ?>
                                                        <span><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($item->id); ?></span>
                                                    <?php endif; ?>
                                                    <?php if ($general_settings->show_hits): ?>
                                                        <span><i class="fa fa-eye"></i><?php echo $item->hit; ?></span>
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="featured-box box-4">
                            <div class="box-inner">
                                <?php $count = 1; ?>
                                <?php foreach ($featured_posts as $item): ?>
                                    <?php if ($count == 4): ?>
                                        <?php $category = get_post_category($item); ?>
                                        <a href="<?php echo lang_base_url(); ?>category/<?php echo html_escape($category['name_slug']); ?>">
                                            <span class="category-label"
                                                  style="background-color: <?php echo html_escape($category['color']); ?>"><?php echo html_escape($category['name']); ?></span>
                                        </a>
                                        <a href="<?php echo lang_base_url(); ?>post/<?php echo html_escape($item->title_slug); ?>">
                                            <?php $this->load->view("partials/_post_image", ["post" => $item, "icon_size" => "md", "bg_size" => "sl", "image_size" => "slider", "class" => "lazyload"]); ?>
                                            <div class="overlay"></div>
                                            <div class="caption">
                                                <h3 class="title">
                                                    <?php echo html_escape(character_limiter($item->title, 50, '...')); ?>
                                                </h3>

                                                <p class="post-meta">
                                                    <?php if ($general_settings->show_post_author == 1): ?>
                                                        <a href="<?php echo lang_base_url(); ?>profile/<?php echo html_escape($item->user_slug); ?>"><?php echo html_escape($item->username); ?></a>
                                                    <?php endif; ?>
                                                    <?php if ($general_settings->show_post_date == 1): ?>
                                                        <span><?php echo helper_date_format($item->created_at); ?></span>
                                                    <?php endif; ?>
                                                    <?php if ($general_settings->comment_system == 1): ?>
                                                        <span><i class="fa fa-comments-o"></i><?php echo get_post_comment_count($item->id); ?></span>
                                                    <?php endif; ?>
                                                    <?php if ($general_settings->show_hits): ?>
                                                        <span><i class="fa fa-eye"></i><?php echo $item->hit; ?></span>
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>