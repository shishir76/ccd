<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--Widget: Tags-->
<div class="sidebar-widget">
     <div class="widget-head" style="background-color:<?php echo html_escape($widget->head_background_color); ?>;">
        <h4 class="title"  style="color:<?php echo html_escape($widget->head_color); ?>;"><?php echo html_escape($widget->title); ?></h4>
    </div>
    <div class="widget-body">
        <ul class="tag-list">
            <!--List tags-->
            <?php foreach ($tags as $item): ?>
                <li>
                    <a href="#">
                        <?php echo html_escape($item->tag); ?>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>
    </div>
</div>