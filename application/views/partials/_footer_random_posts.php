<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Partial: Footer Random Posts-->
<div class="footer-widget f-widget-random">
    <div class="col-sm-12">
        <div class="row">
            <h4 class="title"><?php echo html_escape(trans("footer_random_posts")); ?></h4>
            <div class="title-line"></div>
            <ul class="f-random-list">
                <!--List random posts-->
                <?php foreach ($footer_random_posts as $item): ?>
                    <li>
                        <div class="list-left">
                            <a href="<?php echo lang_base_url(); ?>post/<?php echo html_escape($item->title_slug); ?>">
                                <?php $this->load->view("partials/_post_image", ["post" => $item, "icon_size" => "sm", "bg_size" => "sm_footer", "image_size" => "small", "class" => "lazyload"]); ?>
                            </a>
                        </div>
                        <div class="list-right">
                            <h5 class="title">
                                <a href="<?php echo lang_base_url() . 'post/' . html_escape($item->title_slug); ?>">
                                    <?php echo html_escape(character_limiter($item->title, 55, '...')); ?>
                                </a>
                            </h5>
                        </div>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>
