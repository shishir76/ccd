<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Category Block Type 5-->
<div class="col-sm-12 col-xs-12">
    <div class="row">
        <section class="section section-block-5">
            <div class="section-head" style="background-color:<?php echo html_escape($category->color); ?>;border-bottom:2px solid <?php echo html_escape($category->color); ?>;">
                <h4 class="title" style="background-color: <?php echo html_escape($category->color); ?>">
                    <a href="#" style="color: <?php echo html_escape($category->color); ?>">
                        <?php echo html_escape($category->name); ?>
                    </a>
                </h4>
                <!--Include subcategories-->
                <?php $this->load->view('partials/_block_subcategories', ['category' => $category]); ?>
            </div>


            <div class="section-content">
                <div class="tab-content pull-left">

                    <div role="tabpanel" class="tab-pane fade in active" id="all-<?php echo html_escape($category->id); ?>">
                        <div class="row">
                            <?php
                            $count = 0;
                            $category_posts = helper_get_last_posts_by_category($category->id, 4);
                            foreach ($category_posts as $post):?>
                                <?php if ($count < 1): ?>
                                    <!--include post item-->
                                    <div class="col-sm-12 col-xs-12">

                                        <!--Post row item-->
                                        <?php $post_category = get_post_category($post); ?>
                                        <div class="post-item-video-big">
                                            <div class="post-item-image">
                                                <a href="<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>">
                                                    <?php $this->load->view("partials/_post_image", ["post" => $post, "icon_size" => "xl", "bg_size" => "lg", "image_size" => "big", "class" => "lazyload"]); ?>
                                                    <div class="overlay"></div>
                                                </a>
                                            </div>

                                            <div class="caption">
                                                <a href="<?php echo lang_base_url(); ?>category/<?php echo html_escape($post_category['name_slug']); ?>">
                                                    <span class="category-label"
                                                           style="background-color: <?php echo html_escape($post_category['color']); ?>"><?php echo html_escape($post_category['name']); ?></span>
                                                </a>
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
                                    </div>
                                <?php else: ?>
                                    <div class="col-sm-4 col-xs-12">
                                        <!--include post item-->
                                        <?php $this->load->view("partials/_post_item_mid", ["post" => $post]); ?>
                                    </div>
                                <?php endif;
                                $count++;
                            endforeach;
                            ?>
                        </div>
                    </div>

                    <?php foreach (helper_get_subcategories($category->id) as $subcategory): ?>
                        <div role="tabpanel" class="tab-pane fade in " id="<?php echo html_escape($subcategory->name_slug); ?>-<?php echo html_escape($subcategory->id); ?>">
                            <div class="row">


                                <?php
                                $count = 0;
                                $category_posts = helper_get_last_posts_by_subcategory($subcategory->id, 4);

                                foreach ($category_posts as $post):?>
                                    <?php if ($count < 1): ?>
                                        <!--include post item-->
                                        <div class="col-sm-12 col-xs-12">

                                            <!--Post row item-->
                                            <?php $post_category = get_post_category($post); ?>
                                            <div class="post-item-video-big">
                                                <div class="post-item-image">
                                                    <a href="<?php echo lang_base_url(); ?>post/<?php echo html_escape($post->title_slug); ?>">
                                                        <?php $this->load->view("partials/_post_image", ["post" => $post, "icon_size" => "xl", "bg_size" => "lg", "image_size" => "big", "class" => "lazyload"]); ?>
                                                        <div class="overlay"></div>
                                                    </a>
                                                </div>

                                                <div class="caption">
                                                    <a href="<?php echo lang_base_url(); ?>category/<?php echo html_escape($post_category['name_slug']); ?>">
                                                        <span class="category-label"
                                                               style="background-color: <?php echo html_escape($post_category['color']); ?>"><?php echo html_escape($post_category['name']); ?></span>
                                                    </a>
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
                                        </div>
                                    <?php else: ?>
                                        <div class="col-sm-4 col-xs-12">
                                            <!--include post item-->
                                            <?php $this->load->view("partials/_post_item_mid", ["post" => $post]); ?>
                                        </div>
                                    <?php endif;
                                    $count++;
                                endforeach;
                                ?>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>


        </section>
    </div>
</div>