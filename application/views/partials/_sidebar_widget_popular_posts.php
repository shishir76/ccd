<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Widget: Popular Posts-->
<div class="sidebar-widget">
     <div class="widget-head" style="background-color:<?php echo html_escape($widget->head_background_color); ?>;">
        <h4 class="title"  style="color:<?php echo html_escape($widget->head_color); ?>;"><?php echo html_escape($widget->title); ?></h4>
    </div>
    <div class="widget-body">
        <ul class="popular-posts">

            <!--Print Popular Posts-->
            <?php foreach ($popular_posts as $post): ?>
                <li>
                    <?php $this->load->view("partials/_post_item_small", ["post" => $post]); ?>
                </li>
            <?php endforeach; ?>

        </ul>
    </div>
</div>